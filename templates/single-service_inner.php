<?php
/*
 * Template Name: Bavaria | single-service_inner
 * Template Post Type: service_inner
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset') ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
		<title><?php the_title(); ?></title>
		<?php wp_head(); ?>
  </head>
  <body>
		<?php get_header(); ?>

    <section class="banner blog_banner">
      <img src="<?= get_field('banner'); ?>" class="banner_img" />

      <div class="slogan">
        <div class="wrapper">
          <h2 class="textAppear" data-delay="2">
            <?= get_the_title(); ?>
          </h2>
        </div>
      </div>
    </section>

    <?php

      // Получить главные категории услуг - название и url
      $mainPosts = get_posts(
        array(
          'posts_per_page' => -1,
          'post_type' => 'service_inner',
          'tax_query' => array(
            array(
              'taxonomy' => 'service_type',
              'field' => 'name',
              'terms' => 'Главная',
            )
          )
        )
      );

    ?>

    <section class="workshop">
      <div class="figure_1 hidden_360" style="bottom: unset; top: -7rem">
        <img
          class="img-svg native figure_41"
          src="<?= B_IMG_DIR ?>/figure_41.svg"
        />
        <img class="figure_42" src="<?= B_IMG_DIR ?>/figure_42.png" />
      </div>

      <div class="wrapper">

          <aside>
            <button class="navExpand">
              <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
            </button>
            <ul class="list">
              <?php
                foreach($mainPosts as $key=>$mainPost) {
                  $mainTitle = $mainPost->post_title;
                  $mainLink = $mainPost->guid;
              ?>
                <li class="wow fadeInUp" data-wow-delay="<?= $key*0.2?>s">
                  <img
                    src="<?= B_IMG_DIR ?>/triple-square.svg"
                    class="img-svg native stripes"
                  />
                  <a href="<?= $mainLink; ?>">
                    <?= $mainTitle; ?>
                  </a>
                  <button class="arrow">
                    <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
                  </button>

                  <ul class="sublist">
                    <?php
                      // Get posts by cat title: subTitle, subLink
                      $subPosts = get_posts(
                        array(
                          'posts_per_page' => -1,
                          'post_type' => 'service_inner',
                          'tax_query' => array(
                            array(
                              'taxonomy' => 'service_type',
                              'field' => 'name',
                              'terms' => $mainTitle,
                            )
                          )
                        )
                      );

                      foreach($subPosts as $subPost) {
                        $subTitle = $subPost->post_title;
                        $subLink = $subPost->guid;
                    ?>
                      <li>
                        <a href="<?= $subLink; ?>">
                          <?= $subTitle; ?>
                        </a>
                      </li>
                    <?php }; ?>
                  </ul>

                </li>
              <?php }; ?>
            </ul>
          </aside>

        <main>
          <?php while ( have_rows('page-services_inner') ): the_row(); ?>
            <?php while ( have_rows('about') ): the_row(); ?>

              <?php while ( have_rows('par_bold') ): the_row(); ?>
                <p class="accent wow fadeInUp" data-wow-delay="1s">
                  <?= get_sub_field('text'); ?>
                </p>
              <?php endwhile; ?>

              <?php while ( have_rows('par') ): the_row(); ?>
                <p  class="wow fadeInUp" data-wow-delay="1s">
                  <?= get_sub_field('text'); ?>
                </p>
              <?php endwhile; ?>

              <?php while ( have_rows('cards') ): the_row(); ?>
                <div class="brands mobwrapper">

                  <h2 class="facts_title textAppear" data-delay="1">
                    <?= get_sub_field('title'); ?>
                  </h2>

                  <div class="facts_cards mobslider">
                    <?php while ( have_rows('cards1') ): the_row(); ?>
                      <div class="card appear" style="animation-delay: <?= get_row_index()*0.2?>s">
                        <img
                          src="<?= get_sub_field('icon'); ?>"
                          class="img-svg native pro_icon"
                        />
                        <p class="pro_text">
                          <?= get_sub_field('text'); ?>
                        </p>
                      </div>
                    <?php endwhile; ?>
                  </div>
                </div>
              <?php endwhile; ?>

              <?php while ( have_rows('pricelist') ): the_row(); ?>
                <table class="pricelist">
                  <thead>
                    <tr class="wow fadeInUp">
                      <td>Услуга</td>
                      <td>Стандарт</td>
                      <td>★ Премиум</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ( have_rows('rows') ): the_row(); ?>
                      <tr class="wow fadeInUp" data-wow-delay="<?= get_row_index()*0.05?>s">
                        <td><?= get_sub_field('name'); ?></td>
                        <td><?= get_sub_field('standard'); ?> грн</td>
                        <td><?= get_sub_field('premium'); ?> грн</td>
                      </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              <?php endwhile; ?>

              <?php while ( have_rows('btn') ): the_row(); ?>
                <div class="checkup openConnect appear">
                  <button>
                    <?= get_sub_field('text'); ?>
                  </button>
                </div>
              <?php endwhile; ?>

            <?php endwhile; ?>
          <?php endwhile; ?>
        </main>
      </div>
    </section>

    <?php while ( have_rows('page-services_inner') ): the_row(); ?>

      <?php while ( have_rows('popular') ): the_row(); ?>
        <section class="services dark popular">
          <div class="wrapper">
            <h3 class="wow fadeInLeft">
              <?= get_sub_field('title'); ?>
            </h3>

            <div class="figure_11 appear" style="z-index: 0; left: 0%">
              <img src="<?= B_IMG_DIR ?>/figure_111.png" />
            </div>

            <div class="cards">
              <?php while ( have_rows('cards') ): the_row(); ?>
                <div class="card appear" style="animation-delay: <?= get_row_index()*0.4?>s; animation-duration: <?= 0.8 - get_row_index()*0.1?>s">
                  <div class="card_image">
                    <img src="<?= get_sub_field('img'); ?>" />
                  </div>
                  <a href="<?= get_sub_field('link')['url']; ?>" class="card_title">
                    <h4>
                      <?= get_sub_field('link')['title']; ?>
                    </h4>
                    <p class="card_text">
                      <?= get_sub_field('text'); ?>
                    </p>
                  </a>
                </div>
              <?php endwhile; ?>
            </div>

            <div class="master_arrows">
              <button class="master_prev">
                <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
              </button>
              <button class="master_next">
                <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
              </button>
            </div>
          </div>
        </section>
      <?php endwhile; ?>

      <?php if ( get_sub_field('workplan') ): ?>
        <section class="workplan">
          <div class="wrapper">
            <?php while ( have_rows('workplan') ): the_row(); ?>

              <?php while ( have_rows('par') ): the_row(); ?>
                <div class="left_text wow fadeInLeft">
                  <p>
                    <?= get_sub_field('text'); ?>
                  </p>
                </div>
              <?php endwhile; ?>

              <?php while ( have_rows('photo') ): the_row(); ?>
                <div class="up_photos">
                  <h2>
                    <?= get_sub_field('title'); ?>
                    <img src="<?= get_sub_field('logo'); ?>" class="brand">
                  </h2>
                  <?php foreach( get_sub_field('imgs') as $image ): ?>
                    <img src="<?= $image['url']; ?>" class="wow fadeIn">
                  <?php endforeach; ?>
                </div>
              <?php endwhile; ?>

              <?php while ( have_rows('list') ): the_row(); ?>
                <div class="right_text">
                  <h3>
                    <?= get_sub_field('title'); ?>
                  </h3>
                  <ol type="1" start="1">
                    <?php while ( have_rows('points') ): the_row(); ?>
                      <li class="wow fadeInUp">
                        <?= get_sub_field('text'); ?>
                      </li>
                    <?php endwhile; ?>
                  </ul>
                </div>
              <?php endwhile; ?>

            <?php endwhile; ?>
          </div>

          <div class="figure_8" style="width: 40%; height: 40%; top: 0; left: 30%; "></div>

          <div class="figure_10" style="top: -3rem; left: 68%;">
            <img
              src="<?= B_IMG_DIR ?>/figure_101.svg"
              class="img-svg native figure_101"
            />
          </div>
        </section>
      <?php endif; ?>

      <?php if ( get_sub_field('workexamps') ): ?>
        <?php while ( have_rows('workexamps') ): the_row(); ?>
          <section class="workexamps">
            <div class="wrapper mobwrapper">
              <h2>
                <?= get_sub_field('title'); ?>
              </h2>
              <div class="exampscards mobslider">


                <?php
                  // If this page is main
                  $currentTerm = get_the_terms( get_the_ID(), 'service_type' )[0]->slug;
                  // Find this page slug
                  $currentSlug = basename( get_permalink() );

                  $posts = get_posts( [
                    'post_type' => 'folio',
                    'numberposts' => -1
                  ] );

                  foreach( $posts as $key=>$post ) {
                    setup_postdata($post);

                    $url = get_permalink();
                    $img = get_field('banner');
                    $post_title = $post->post_title;
                    $postTerm = get_the_terms( $post, 'service_type' )[0]->slug;

                    if ($currentTerm == 'main' && $postTerm == $currentSlug) {
                ?>
                  <a href="<?= $url; ?>" class="card wow fadeInRight" data-wow-delay="<?= get_row_index()*0.2?>s">
                    <div class="img_wrapper">
                      <img src="<?= $img; ?>">
                    </div>
                    <span>
                      <?= $post_title; ?>
                    </span>
                  </a>
                <?php }};
                    wp_reset_postdata(); ?>

              </div>
            </div>

            <div class="figure_2" style="left: 75%">
              <div class="figure_21"></div>
              <img class="figure_22" src="<?= B_IMG_DIR ?>/figure_22.png" />
              <div class="figure_23"></div>
            </div>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="figure_12"
              style="left: 12%"
              viewbox="0,0 140,270">
              <path
                fill="transparent"
                stroke="rgba(45, 86, 138, 0.04)"
                stroke-width="0.5px"
                d="M67.708 0h69.062L69.062 270.833H0z"
              />
            </svg>
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="figure_12"
              style="left: 26%"
              viewbox="0,0 140,270">
              <path
                fill="transparent"
                stroke="rgba(45, 86, 138, 0.04)"
                stroke-width="0.5px"
                d="M67.708 0h69.062L69.062 270.833H0z"
              />
            </svg>
          </section>
        <?php endwhile; ?>
      <?php endif; ?>

      <?php if ( get_sub_field('galleryexamps') ): ?>
        <?php while ( have_rows('galleryexamps') ): the_row(); ?>
          <section class="galleryexamps">
            <div class="wrapper mobwrapper">
              <h2 class="textAppear" data-delay="1">Примеры работ</h2>
              <div class="gallery lightbox mobslider">
                <?php foreach( get_sub_field('imgs') as $key=>$image ): ?>
                  <img src="<?= $image; ?>" class="wow fadeInRight" data-wow-delay="<?= $key*0.2?>s">
                <?php endforeach; ?>
              </div>
            </div>

            <div class="figure_2 appear" style="left: 75%">
              <div class="figure_21"></div>
              <img class="figure_22" src="<?= B_IMG_DIR ?>/figure_22.png" />
              <div class="figure_23"></div>
            </div>

            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="figure_12 appear"
              style="left: 8%; animation-delay: 1s"
              viewbox="0,0 140,270">
              <path
                fill="transparent"
                stroke="rgba(45, 86, 138, 0.04)"
                stroke-width="0.5px"
                d="M67.708 0h69.062L69.062 270.833H0z"
              />
            </svg>

            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="figure_12 appear"
              style="left: 26%; animation-delay: 1.5s"
              viewbox="0,0 140,270">
              <path
                fill="transparent"
                stroke="rgba(45, 86, 138, 0.04)"
                stroke-width="0.5px"
                d="M67.708 0h69.062L69.062 270.833H0z"
              />
            </svg>
          </section>
        <?php endwhile; ?>
      <?php endif; ?>

      <?php if ( get_sub_field('request') ): ?>
        <?php while ( have_rows('request') ): the_row(); ?>

          <?php
            // If this page is main
            $currentTerm = get_the_terms( get_the_ID(), 'service_type' )[0]->slug;
            $sectionBG = $currentTerm == 'main' ? '#f1f2f3' : '#fff';
            $figure_8BG = $currentTerm == 'main' ? '#fff' : 'rgba(141, 193, 251, 0.3)';
          ?>

          <section class="request" style="background-color: <?= $sectionBG; ?>">
            <div class="wrapper">
              <div class="left_text wow fadeInLeft">
                <h2>
                  <?= get_sub_field('title'); ?>
                </h2>
                <p>
                  <?= get_sub_field('text'); ?>
                </p>
              </div>
              <div class="right_form appear">

                <?php echo do_shortcode( '[gravityform id=3 title=false description=false ajax=true]' ); ?>

                <img src="<?= get_sub_field('img'); ?>" class="connect_img" />
                <img
                  src="<?= B_IMG_DIR ?>/figure_1.svg"
                  class="img-svg native connect_figure"
                />
                <div class="figure_8" style="background-color: <?= $figure_8BG; ?>"></div>
              </div>
            </div>
          </section>
        <?php endwhile; ?>
      <?php endif; ?>

      <?php if ( get_sub_field('reviews') ): ?>
        <?php while ( have_rows('reviews') ): the_row(); ?>
          <section class="reviews">
            <div class="wrapper mobwrapper">
              <div class="quote_cards mobslider wow fadeInUp" data-wow-delay="1s">
                <?php while ( have_rows('cards') ): the_row(); ?>
                  <div class="quote_card">
                    <span class="date"><?= get_sub_field('name'); ?>, <?= get_sub_field('date'); ?></span>
                    <p class="quote">
                      <img src="<?= B_IMG_DIR ?>/quote.svg"  class="img-svg">
                      <?= get_sub_field('text'); ?>
                    </p>
                  </div>
                <?php endwhile; ?>
              </div>
              <div class="arrows wow fadeInUp" data-wow-delay="1.5s">
                <button class="quote_prev">
                  <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
                </button>
                <button class="quote_next">
                  <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
                </button>
              </div>
            </div>

            <div
              class="figure_7 red wow fadeInDown"
              data-wow-delay="1.5s"
              style="width: 20rem; height: 22.5rem; left: 35%"
            >
              <img
                class="img-svg figure_71"
                src="<?= B_IMG_DIR ?>/figure_71.svg"
              />
            </div>
          </section>
        <?php endwhile; ?>
      <?php endif; ?>

      <?php if ( get_sub_field('faq') ): ?>
        <?php while ( have_rows('faq') ): the_row(); ?>
          <section class="faq">
            <div class="wrapper">
              <div class="faq_list">
                <?php while ( have_rows('cards') ): the_row(); ?>
                  <div class="vacancy faq_item wow fadeInRight" data-wow-delay="<?= get_row_index()*0.2?>s">
                    <h3>
                      <?= get_sub_field('question'); ?>
                      <button class="expand">
                        <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
                      </button>
                    </h3>

                    <?php while ( have_rows('answer') ): the_row(); ?>

                      <?php while ( have_rows('par') ): the_row(); ?>
                        <p>
                          <?= get_sub_field('text'); ?>
                        </p>
                      <?php endwhile; ?>

                      <?php while ( have_rows('list') ): the_row(); ?>
                        <div class="list_wrapper">
                          <h5 class="list_title">
                            <?= get_sub_field('title'); ?>
                          </h5>
                          <ul class="list">
                            <?php while ( have_rows('points') ): the_row(); ?>
                              <li>
                                <img src="<?= B_IMG_DIR ?>/single_line.svg" class="img-svg" />
                                <span>
                                  <?= get_sub_field('point'); ?>
                                </span>
                              </li>
                            <?php endwhile; ?>
                          </ul>
                        </div>
                      <?php endwhile; ?>

                    <?php endwhile; ?>

                  </div>
                <?php endwhile; ?>
              </div>
            </div>

            <div class="figure_11 appear" style="height: 672px; left: 20%;">
              <img src="<?= B_IMG_DIR ?>/figure_111.png"
                style="width: 220%; height: 170%;"
              />
            </div>
          </section>
        <?php endwhile; ?>
      <?php endif; ?>

      <?php if ( get_sub_field('adv') ): ?>
        <?php while ( have_rows('adv') ): the_row(); ?>
          <section class="adv">
            <div class="wrapper">
              <div class="left_text">
                <h2 class="textAppear" data-delay="1">
                  <?= get_sub_field('title'); ?>
                </h2>
                <p class="textAppear" data-delay="1">
                  <?= get_sub_field('par'); ?>
                </p>

                <?php while ( have_rows('list') ): the_row(); ?>
                  <div class="list_wrapper">
                    <h5 class="list_title wow fadeInUp">
                      <?= get_sub_field('title'); ?>
                    </h5>
                    <ul class="list">
                     <?php while ( have_rows('points') ): the_row(); ?>
                        <li class="wow fadeInRight" data-wow-delay="<?= get_row_index()*0.2?>s">
                          <img src="<?= B_IMG_DIR ?>/single_line.svg" class="img-svg" />
                          <span>
                            <?= get_sub_field('point'); ?>
                          </span>
                        </li>
                      <?php endwhile; ?>
                    </ul>
                  </div>
                <?php endwhile; ?>

              </div>

              <div class="right_img">
                <img src="<?= get_sub_field('img'); ?>" class="wow fadeInRight" data-wow-delay="1.8s">
                <img src="<?= B_IMG_DIR ?>/service_adv2.png" class="shard wow fadeInLeft" data-wow-delay="2s">
              </div>
            </div>
          </section>
        <?php endwhile; ?>
      <?php endif; ?>

    <?php endwhile; ?>

    <?php get_footer(); ?>
    <?php wp_footer(); ?>
  </body>
</html>
