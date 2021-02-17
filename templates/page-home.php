<?php
/*
 * Template Name: Bavaria | page-home
 * Template Post Type: page
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

    <!-- Fullscreen video -->
    <div id="video">
      <video loop controls>
        <source src="<?= get_field('banner')['video']['file']; ?>" type="video/mp4">
      </video>
    </div>

    <?php while ( have_rows('banner') ): the_row(); ?>
      <section class="banner">

        <img src="<?= get_sub_field('banner_img'); ?>" class="banner_img img" />
        <video autoplay muted loop src="<?= get_sub_field('banner_video'); ?>" class="banner_img video"></video>

        <div class="slogan">
          <div class="wrapper">
            <h2 class="wow fadeInLeft" data-wow-duration="0.5s">
              <?= get_sub_field('text'); ?>
            </h2>
            <div class="video">
              <div class="figure">
                <span class="rect"></span>
                <span class="triangle openVideo"></span>
              </div>
              <button id="openVideo" class="video_link">
                <?= get_field('banner')['video']['text']; ?>
              </button>
            </div>
          </div>
        </div>

        <div class="figure_1 hidden_360">
          <img
            class="img-svg native figure_41"
            src="<?= B_IMG_DIR ?>/figure_41.svg"
          />
          <img src="<?= B_IMG_DIR ?>/figure_42.png" class="figure_42" />
        </div>

        <a href="#services" class="next">
          <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
        </a>
      </section>
    <?php endwhile; ?>

    <?php while ( have_rows('page_home') ): the_row(); ?>

      <?php while ( have_rows('services') ): the_row(); ?>
        <section id="services" class="services dark">

          <?php while ( have_rows('link') ): the_row(); ?>
            <button class="signup fadeInRight openConnect" data-wow-duration="0.5s">
              <?= get_sub_field('text'); ?>
            </button>
          <?php endwhile; ?>

          <div class="wrapper">
            <h3 class="wow fadeInLeft" data-wow-duration="0.5s">
              <?= get_sub_field('title'); ?>
            </h3>

            <div class="figure_11 appear" style="z-index: 0; left: 0%;">
              <img src="<?= B_IMG_DIR ?>/figure_1111.png" />
            </div>

            <div class="cards">
              <?php while ( have_rows('cards') ): the_row(); ?>
                <div class="card appear" style="animation-delay: <?= get_row_index()*0.1?>s; animation-duration: 0.3s">
                  <div class="card_image">
                    <img src="<?= get_sub_field('img'); ?>" />
                  </div>
                  <a href="<?= get_sub_field('group')['link']; ?>" class="card_title">
                    <h4>
                      <?= get_sub_field('group')['title']; ?>
                    </h4>
                    <p class="card_text">
                      <?= get_sub_field('group')['text']; ?>
                    </p>
                  </a>
                </div>
              <?php endwhile; ?>
            </div>
          </div>

          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="figure_12 appear"
            style="left: 36%; animation-delay: 1s"
            viewbox="0,0 140,270">
            <path
              fill="transparent"
              stroke="rgba(255, 255, 255, 0.04)"
              stroke-width="0.5px"
              d="M67.708 0h69.062L69.062 270.833H0z"
            />
          </svg>

          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="figure_12 appear"
            style="left: 58%; animation-delay: 1.5s"
            viewbox="0,0 140,270">
            <path
              fill="transparent"
              stroke="rgba(255, 255, 255, 0.04)"
              stroke-width="0.5px"
              d="M67.708 0h69.062L69.062 270.833H0z"
            />
          </svg>

          <a href="#news" class="next" >
            <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
          </a>
        </section>
      <?php endwhile; ?>

      <?php while ( have_rows('news') ): the_row(); ?>
        <section id="news" class="news light p-5">

          <?php while ( have_rows('link') ): the_row(); ?>
            <a href="<?= get_sub_field('url'); ?>" class="signup fadeInRight">
              <?= get_sub_field('text'); ?>
            </a>
          <?php endwhile; ?>

          <div class="wrapper">
            <h3 class="fadeInLeft">
              <?= get_sub_field('title'); ?>
            </h3>

            <div class="cards">
              <div class="pages">
                <div class="page">

                  <?php
                    $posts = get_posts( [
                      'post_type' => 'blog',
                      'numberposts' => -1
                    ] );

                    foreach( $posts as $key=>$post ) {
                      setup_postdata($post);

                      $url = get_permalink();
                      $img = get_field('banner');
                      $date = get_the_date('j F Y', $post->id);
                      $post_title = $post->post_title;
                    ?>

                      <a
                        href="<?= $url; ?>"
                        class="card"
                        style="background-image: url(<?= $img; ?>); ">

                        <div class="block_overlay">
                          <span class="date">
                            <?= $date; ?>
                            <img
                              src="<?= B_IMG_DIR ?>/arrow.svg"
                              class="img-svg arrow"
                            />
                          </span>
                          <p class="text">
                            <?= $post_title; ?>
                          </p>
                        </div>
                      </a>

                  <?php }; wp_reset_postdata(); ?>

                </div>
              </div>
            </div>
          </div>

          <div class="figure_2 appear" style="left: 38%">
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
            style="left: 24%; animation-delay: 1.5s"
            viewbox="0,0 140,270">
            <path
              fill="transparent"
              stroke="rgba(45, 86, 138, 0.04)"
              stroke-width="0.5px"
              d="M67.708 0h69.062L69.062 270.833H0z"
            />
          </svg>

          <a href="#portfolio" class="next dark">
            <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
          </a>
        </section>
      <?php endwhile; ?>

      <?php while ( have_rows('portfolio') ): the_row(); ?>
        <section id="portfolio" class="portfolio dark p-4">

          <?php while ( have_rows('link') ): the_row(); ?>
            <a href="<?= get_sub_field('url'); ?>" class="signup fadeInRight" data-wow-duration="0.5s">
              <?= get_sub_field('text'); ?>
            </a>
          <?php endwhile; ?>

          <div class="wrapper">
            <h3 class="wow fadeInLeft" data-wow-duration="0.5s">
              <?= get_sub_field('title'); ?>
            </h3>

            <div class="main">
              <?php while ( have_rows('central') ): the_row(); ?>
                <div class="main_img appear">
                  <img src="<?= get_sub_field('img'); ?>" />
                </div>
                <?php while ( have_rows('description') ): the_row(); ?>
                  <div class="text">
                    <h4 class="wow fadeInUp" data-wow-duration="0.5s">
                      <?= get_sub_field('title'); ?>
                    </h4>
                    <div class="wow fadeInUp" data-wow-duration="0.5s">
                      <?= get_sub_field('text'); ?>
                    </div>
                  </div>
                <?php endwhile; ?>
              <?php endwhile; ?>
            </div>


            <div class="other">

              <?php
                $posts = get_posts( [
                  'post_type' => 'folio',
                  'numberposts' => 3
                ] );

                foreach( $posts as $key=>$post ) {
                  setup_postdata($post);

                  $url = get_permalink();
                  $img = get_field('banner');
                  $post_title = $post->post_title; ?>

                <a href="<?= $url; ?>"
                  class="card">
                  <img
                    src="<?= $img; ?>"
                    class="card_bg"
                  />
                  <h5>
                    <img
                      src="<?= B_IMG_DIR ?>/figure_5.svg"
                      class="img-svg native"
                    />
                    <p><span>
                      <?= $post_title; ?>
                    </span></p>
                  </h5>
                </a>

              <?php }; wp_reset_postdata(); ?>

            </div>
          </div>

          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="figure_12 appear"
            style="left: -2%; animation-delay: 1s"
            viewbox="0,0 140,270">
            <path
              fill="transparent"
              stroke="rgba(255, 255, 255, 0.04)"
              stroke-width="0.3px"
              d="M67.708 0h69.062L69.062 270.833H0z"
            />
          </svg>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="figure_12 appear"
            style="left: 32%; animation-delay: 1.3s"
            viewbox="0,0 140,270">
            <path
              fill="transparent"
              stroke="rgba(255, 255, 255, 0.04)"
              stroke-width="0.3px"
              d="M67.708 0h69.062L69.062 270.833H0z"
            />
          </svg>
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="figure_12 appear"
            style="left: 54%; animation-delay: 1.5s"
            viewbox="0,0 140,270">
            <path
              fill="transparent"
              stroke="rgba(255, 255, 255, 0.04)"
              stroke-width="0.3px"
              d="M67.708 0h69.062L69.062 270.833H0z"
            />
          </svg>
          <div class="figure_3 appear">
            <div class="figure_31"></div>
            <div class="figure_32"></div>
            <div class="figure_33"></div>
          </div>
          <div class="figure_4 appear">
            <img
              class="img-svg native figure_41"
              src="<?= B_IMG_DIR ?>/figure_41.svg"
            />
            <img class="figure_42" src="<?= B_IMG_DIR ?>/figure_42.png" />
          </div>

          <a href="#info" class="next">
            <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
          </a>
        </section>
      <?php endwhile; ?>

      <?php while ( have_rows('about') ): the_row(); ?>
        <section id="info" class="info light">

          <?php while ( have_rows('link') ): the_row(); ?>
            <a href="<?= get_sub_field('url'); ?>" class="signup fadeInRight">
              <?= get_sub_field('text'); ?>
            </a>
          <?php endwhile; ?>

          <div class="wrapper">
            <h3 class="wow fadeInLeft" data-wow-duration="0.5s">
              <?= get_sub_field('title'); ?>
            </h3>

            <div class="main">
              <div class="text">
                <div class="figure_14 appear">
                  <div class="figure_31"></div>
                  <div class="figure_32"></div>
                  <div class="figure_33"></div>
                </div>
                <div class="wow fadeInUp" data-wow-duration="0.5s">
                  <?php while ( have_rows('group') ): the_row(); ?>
                    <?= get_sub_field('text'); ?>
                  <?php endwhile; ?>
                </div>
              </div>
              <div class="imgs">
                <img src="<?= B_IMG_DIR ?>/red_shard.png" class="shard appear" />

                <?php while ( have_rows('group') ): the_row(); ?>
                  <img src="<?= get_sub_field('img'); ?>" class="photo fadeInRight" />
                <?php endwhile; ?>

                <div class="pros fadeInUp">
                  <div class="pro_arrows">
                    <button class="pro_prev">
                      <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
                    </button>
                    <button class="pro_next">
                      <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
                    </button>
                  </div>

                  <div class="pro_cards">
                    <?php while ( have_rows('facts', 'options') ): the_row(); ?>
                      <div class="pro_card">
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
              </div>
            </div>
          </div>

          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="figure_12"
            style="left: 25%; height: 45%"
            viewbox="0,0 140,273"
          >
            <path
              fill="transparent"
              stroke="rgba(214, 61, 55, 0.1)"
              stroke-width="1px"
              d="M67.708 0h69.062L69.062 270.833H0z"
            />
          </svg>
        </section>
      <?php endwhile; ?>


    <?php endwhile; ?>

		<?php get_footer(); ?>
    <?php wp_footer(); ?>

    <script>

      $(document).ready(function() {

        $("section.news .wrapper .cards .pages .page").slick({
          arrows: false,
          draggable: true,
          focusOnSelect: false,
          infinite: false,
          autoplay: false,
          dots: true,
          slidesToShow: 4,
          slidesToScroll: 4,
          variableWidth: true,
          responsive: [
            {
              breakpoint: 1600,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
              }
            },
            {
              breakpoint: 980,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                draggable: true,
                touchThreshold: 300,
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                draggable: true,
                touchThreshold: 300,
              }
            },
          ]
        });

        if (window.innerWidth < 601) {
          $(".other").slick({
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

        if (window.innerWidth < 421) {
          $("section.info .wrapper .main .imgs .pro_cards").slick({
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

          if (window.innerWidth < 601) {
            $(".other").slick({
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

          if (window.innerWidth < 421) {
            $("section.info .wrapper .main .imgs .pro_cards").slick({
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

        deleteExtraSlides(
          width = 980,
          sliderSelector = 'section.news .wrapper .cards .pages .page',
          leaveSlides = 4
        );

      });

    </script>
  </body>
</html>
