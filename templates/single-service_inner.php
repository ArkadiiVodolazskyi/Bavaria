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
          <h2 class="textAppear">
            <?= get_the_title(); ?>
          </h2>
        </div>
      </div>
    </section>

    <?php

      wp_reset_query();

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

    <?php
      // Get current page
      $pageTitle = get_the_title();
      $pageTerm = get_the_terms( get_post(), 'service_type')[0]->slug;
    ?>

    <section class="workshop">
      <div class="figure_1 hidden_360" style="bottom: unset; top: -8.5rem">
        <img
          class="img-svg native figure_41"
          src="<?= B_IMG_DIR ?>/figure_41.svg"
        />
        <img class="figure_42" src="<?= B_IMG_DIR ?>/figure_42.png" />
      </div>

      <div class="wrapper">

          <aside>
            <button class="navExpand">
              <img alt="" src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
            </button>
            <ul class="list">
              <?php
                foreach($mainPosts as $key=>$mainPost) {
                  $mainTitle = $mainPost->post_title;
                  $mainLink = $mainPost->guid;
                  $mainTerm = $mainPost->post_name; // For main items term equals name (because real term is 'main')
              ?>
                <li class="wow fadeInUp <?php echo $mainTerm == $pageTerm || $mainTitle == get_the_title() ? 'active' : ''; ?>"
                    data-wow-delay="<?= $key*0.2?>s">
                  <img
                    src="<?= B_IMG_DIR ?>/triple-square.svg"
                    class="img-svg native stripes"
                  />
                  <?php if ( $mainTitle == $pageTitle ): ?>
                    <a href="<?= $mainLink; ?>"
                    class="current"
                    style="color: #d63d37;">
                  <?php else: ?>
                    <a href="<?= $mainLink; ?>">
                  <?php endif; ?>
                    <?= $mainTitle; ?>
                  </a>
                  <button class="arrow">
                    <img alt="" src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
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
                        <?php if ( $subTitle == $pageTitle ): ?>
                          <a href="<?= $subLink; ?>" style="color: #d63d37;" class="current">
                        <?php else: ?>
                          <a href="<?= $subLink; ?>">
                        <?php endif; ?>
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
                <p class="accent wow fadeInUp">
                  <?= get_sub_field('text'); ?>
                </p>
              <?php endwhile; ?>

              <?php while ( have_rows('par') ): the_row(); ?>
                <p  class="wow fadeInUp">
                  <?= get_sub_field('text'); ?>
                </p>
              <?php endwhile; ?>

              <?php while ( have_rows('cards') ): the_row(); ?>
                <div class="brands">

                  <h2 class="facts_title textAppear">
                    <?= get_sub_field('title'); ?>
                  </h2>

                  <div class="facts_cards">
                    <?php while ( have_rows('cards1') ): the_row(); ?>
                      <div class="card appear" style="animation-delay: <?= get_row_index()*0.1?>s">
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
              <img alt="" src="<?= B_IMG_DIR ?>/figure_111.png" />
            </div>

            <div class="cards">
              <?php while ( have_rows('cards') ): the_row(); ?>
                <div class="card" style="animation-delay: <?= get_row_index()*0.2?>s; animation-duration: <?= 0.8 - get_row_index()*0.1?>s">
                  <div class="card_image">
                    <img alt="" src="<?= get_sub_field('img'); ?>" />
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
                    <img alt="" src="<?= get_sub_field('logo'); ?>" class="brand">
                  </h2>
                  <?php foreach( get_sub_field('imgs') as $image ): ?>
                    <img alt="" src="<?= $image['url']; ?>" class="wow fadeIn">
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
            <img
              src="<?= B_IMG_DIR ?>/mob_workplan.svg"
              class="img-svg native figure_101_mob figure_101_mob"
            />
          </div>
        </section>
      <?php endif; ?>

      <?php if ( get_sub_field('workexamps') ): ?>
        <?php while ( have_rows('workexamps') ): the_row(); ?>
          <section class="workexamps">
            <div class="wrapper">
              <h2>
                <?= get_sub_field('title'); ?>
              </h2>
              <div class="exampscards">

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
                      <img alt="" src="<?= $img; ?>">
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
            <div class="wrapper">
              <h2 class="textAppear">Примеры работ</h2>
              <div class="gallery lightbox">
                <?php foreach( get_sub_field('imgs') as $key=>$image ): ?>
                  <img alt="" src="<?= $image; ?>" class="wow fadeInRight" data-wow-delay="<?= $key*0.2?>s">
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
            $paddings = $currentTerm == 'main' ? '9rem 0 12rem' : '7rem 0';
          ?>

          <section class="request" style="background-color: <?= $sectionBG; ?>; padding: <?= $paddings; ?>">
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

                <img alt="" src="<?= get_sub_field('img'); ?>" class="connect_img" />
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
              <div class="quote_cards mobslider wow fadeInUp">
                <?php while ( have_rows('cards') ): the_row(); ?>
                  <div class="quote_card">
                    <span class="date"><?= get_sub_field('name'); ?>, <?= get_sub_field('date'); ?></span>
                    <p class="quote">
                      <img alt="" src="<?= B_IMG_DIR ?>/quote.svg"  class="img-svg">
                      <?= get_sub_field('text'); ?>
                    </p>
                  </div>
                <?php endwhile; ?>
              </div>
            </div>

            <div
              class="figure_7 red wow fadeInDown"
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
                        <img alt="" src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
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
                                <img alt="" src="<?= B_IMG_DIR ?>/single_line.svg" class="img-svg" />
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
              <img alt="" src="<?= B_IMG_DIR ?>/figure_111.png"
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
                <h2 class="textAppear">
                  <?= get_sub_field('title'); ?>
                </h2>
                <p class="textAppear">
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
                          <img alt="" src="<?= B_IMG_DIR ?>/single_line.svg" class="img-svg" />
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
                <img alt="" src="<?= get_sub_field('img'); ?>" class="wow fadeInRight" data-wow-delay="1.8s">
                <img alt="" src="<?= B_IMG_DIR ?>/service_adv2.png" class="shard wow fadeInLeft" data-wow-delay="2s">
              </div>
            </div>
          </section>
        <?php endwhile; ?>
      <?php endif; ?>

    <?php endwhile; ?>

    <?php get_footer(); ?>
    <?php wp_footer(); ?>

    <script>

      $(document).ready(function() {

        $("section.reviews .quote_cards").slick({
          arrows: true,
          draggable: false,
          focusOnSelect: false,
          infinite: false,
          autoplay: false,
          dots: false,
          variableWidth: true,
          vertical: false,
          verticalSwiping: false,
          slidesToShow: 2,
          slidesToScroll: 2,
          prevArrow: `
            <button type="button">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="7.996" viewBox="0 0 14 7.996">
                <path d="M-692 165l-7-8h2.406l4.594 5.247 4.594-5.247H-685l-7 8z" transform="translate(699 -157)"/>
              </svg>
            </button>
          `,
          nextArrow: `
            <button type="button">
              <svg xmlns="http://www.w3.org/2000/svg" width="14" height="7.996" viewBox="0 0 14 7.996">
                <path d="M-692 165l-7-8h2.406l4.594 5.247 4.594-5.247H-685l-7 8z" transform="translate(699 -157)"/>
              </svg>
            </button>
          `,
          responsive: [
            {
              breakpoint: 1000,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: true,
                draggable: true,
                touchThreshold: 300,
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                dots: true,
                draggable: true,
                touchThreshold: 300,
              }
            },
          ]
        });

        if (window.innerWidth < 1600) {
          $(".exampscards, .gallery").slick({
            arrows: false,
            focusOnSelect: false,
            infinite: false,
            autoplay: false,
            variableWidth: true,
            slidesToShow: 3,
            slidesToScroll: 3,
            dots: true,
            draggable: true,
            touchThreshold: 300,
            responsive: [
              {
                breakpoint: 1280,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2,
                  dots: true,
                  draggable: true,
                  touchThreshold: 300,
                }
              },
              {
                breakpoint: 960,
                settings: {
                  slidesToShow: 2,
                  slidesToScroll: 2,
                  dots: true,
                  draggable: true,
                  touchThreshold: 300,
                }
              },
              {
                breakpoint: 600,
                settings: {
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  dots: true,
                  draggable: true,
                  touchThreshold: 300,
                }
              },
            ]
          });
        }

        if (window.innerWidth > 1000) {
          $("section.popular .cards").slick({
            arrows: true,
            draggable: false,
            focusOnSelect: false,
            infinite: false,
            autoplay: false,
            dots: false,
            variableWidth: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            vertical: false,
            verticalSwiping: false,
            prevArrow: `
              <button type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="7.996" viewBox="0 0 14 7.996">
                  <path d="M-692 165l-7-8h2.406l4.594 5.247 4.594-5.247H-685l-7 8z" transform="translate(699 -157)"/>
                </svg>
              </button>
            `,
            nextArrow: `
              <button type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="7.996" viewBox="0 0 14 7.996">
                  <path d="M-692 165l-7-8h2.406l4.594 5.247 4.594-5.247H-685l-7 8z" transform="translate(699 -157)"/>
                </svg>
              </button>
            `,
          });
        }

        // services-inner - section popular - vertical slider
        if (window.innerWidth <= 1000) {
          const popularTape = document.querySelector("section.popular .wrapper .cards");
          const popularCards = [...popularTape.querySelectorAll(".card")];

          // Initial
          const shift = popularCards[0].offsetHeight;
          let currentShift = 0;
          let firstSlide = 0;
          let lastSlide = 3;
          function reSlide(firstSlide, lastSlide) {
            for (let i = 0; i < popularCards.length; i++) {
              popularCards[i].style.opacity = "0";
            }
            for (let i = firstSlide; i <= lastSlide; i++) {
              popularCards[i].style.opacity = "1";
            }
          }
          reSlide(firstSlide, lastSlide);

          const popularPrev = document.querySelector("section.popular .wrapper .master_arrows .master_prev");
          const popularNext = document.querySelector("section.popular .wrapper .master_arrows .master_next");
          if (lastSlide + 1 > popularCards.length - 1) {
            popularNext.style.opacity = "0.5";
          } else {
            popularNext.style.opacity = "1";
          }

          popularPrev.addEventListener("click", () => {
            if (!(firstSlide - 1 < 0)) {
              firstSlide--;
              lastSlide--;
              currentShift += shift;
              popularTape.style.transform = `translateY(${currentShift}px)`;
              reSlide(firstSlide, lastSlide);
            }
            if (firstSlide - 1 < 0) {
              popularPrev.style.opacity = "0.5";
            } else {
              popularPrev.style.opacity = "1";
            }
            if (lastSlide + 1 > popularCards.length - 1) {
              popularNext.style.opacity = "0.5";
            } else {
              popularNext.style.opacity = "1";
            }
          });
          popularNext.addEventListener("click", () => {
            if (!(lastSlide + 1 > popularCards.length - 1)) {
              firstSlide++;
              lastSlide++;
              currentShift -= shift;
              popularTape.style.transform = `translateY(${currentShift}px)`;
              reSlide(firstSlide, lastSlide);
            }
            if (firstSlide - 1 < 0) {
              popularPrev.style.opacity = "0.5";
            } else {
              popularPrev.style.opacity = "1";
            }
            if (lastSlide + 1 > popularCards.length - 1) {
              popularNext.style.opacity = "0.5";
            } else {
              popularNext.style.opacity = "1";
            }
          });
        }

        if (window.innerWidth < 421) {
          $("section.workshop .brands .facts_cards").slick({
            arrows: false,
            draggable: true,
            focusOnSelect: false,
            infinite: false,
            autoplay: false,
            dots: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            variableWidth: true,
          });
        }

        window.addEventListener("resize", () => {

          if (window.innerWidth < 1600) {
            $(".exampscards, .gallery").slick({
              arrows: false,
              focusOnSelect: false,
              infinite: false,
              autoplay: false,
              variableWidth: true,
              slidesToShow: 3,
              slidesToScroll: 3,
              dots: true,
              draggable: true,
              touchThreshold: 300,
              responsive: [
                {
                  breakpoint: 1280,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: true,
                    draggable: true,
                    touchThreshold: 300,
                  }
                },
                {
                  breakpoint: 960,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: true,
                    draggable: true,
                    touchThreshold: 300,
                  }
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    draggable: true,
                    touchThreshold: 300,
                  }
                },
              ]
            });
          }

          // services-inner - section popular - vertical slider
          if (window.innerWidth <= 1000) {
            const popularTape = document.querySelector("section.popular .wrapper .cards");
            const popularCards = [...popularTape.querySelectorAll(".card")];

            // Initial
            const shift = popularCards[0].offsetHeight;
            let currentShift = 0;
            let firstSlide = 0;
            let lastSlide = 3;
            function reSlide(firstSlide, lastSlide) {
              for (let i = 0; i < popularCards.length; i++) {
                popularCards[i].style.opacity = "0";
              }
              for (let i = firstSlide; i <= lastSlide; i++) {
                popularCards[i].style.opacity = "1";
              }
            }
            reSlide(firstSlide, lastSlide);

            const popularPrev = document.querySelector("section.popular .wrapper .master_arrows .master_prev");
            const popularNext = document.querySelector("section.popular .wrapper .master_arrows .master_next");
            if (lastSlide + 1 > popularCards.length - 1) {
              popularNext.style.opacity = "0.5";
            } else {
              popularNext.style.opacity = "1";
            }

            popularPrev.addEventListener("click", () => {
              if (!(firstSlide - 1 < 0)) {
                firstSlide--;
                lastSlide--;
                currentShift += shift;
                popularTape.style.transform = `translateY(${currentShift}px)`;
                reSlide(firstSlide, lastSlide);
              }
              if (firstSlide - 1 < 0) {
                popularPrev.style.opacity = "0.5";
              } else {
                popularPrev.style.opacity = "1";
              }
              if (lastSlide + 1 > popularCards.length - 1) {
                popularNext.style.opacity = "0.5";
              } else {
                popularNext.style.opacity = "1";
              }
            });
            popularNext.addEventListener("click", () => {
              if (!(lastSlide + 1 > popularCards.length - 1)) {
                firstSlide++;
                lastSlide++;
                currentShift -= shift;
                popularTape.style.transform = `translateY(${currentShift}px)`;
                reSlide(firstSlide, lastSlide);
              }
              if (firstSlide - 1 < 0) {
                popularPrev.style.opacity = "0.5";
              } else {
                popularPrev.style.opacity = "1";
              }
              if (lastSlide + 1 > popularCards.length - 1) {
                popularNext.style.opacity = "0.5";
              } else {
                popularNext.style.opacity = "1";
              }
            });
          }

          if (window.innerWidth < 421) {
            $("section.workshop .brands .facts_cards").slick({
              arrows: false,
              draggable: true,
              focusOnSelect: false,
              infinite: false,
              autoplay: false,
              dots: true,
              slidesToShow: 1,
              slidesToScroll: 1,
              variableWidth: true,
            });
          }

        });

      });

    </script>
  </body>
</html>
