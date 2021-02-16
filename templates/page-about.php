<?php
/*
 * Template Name: Bavaria | page-about
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
      <video autoplay controls>
        <source src="<?= get_field('video_section')['video']; ?>" type="video/mp4">
      </video>
    </div>

    <section class="banner blog_banner">
      <img src="<?= get_field('banner'); ?>" class="banner_img" />

      <div class="slogan">
        <div class="wrapper">
          <h2 class="textAppear">
            <?= get_the_title(); ?>
          </h2>
        </div>
      </div>

      <div class="figure_1">
        <img
          class="img-svg native figure_41"
          src="<?= B_IMG_DIR ?>/figure_41.svg"
        />
        <img class="figure_42" src="<?= B_IMG_DIR ?>/figure_42.png" />
      </div>
    </section>

    <section class="info_about">
      <div class="wrapper">
        <div class="left_text">
          <p class="accent textAppear">
            <?= get_field('about')['par_bold']; ?>
          </p>
          <p class="wow textAppear">
            <?= get_field('about')['par']; ?>
          </p>
        </div>
        <div class="right_master">
          <div class="master">
            <div class="master_bg appear">
              <div class="master_name">
                <?php while ( have_rows('masters') ): the_row(); ?>
                  <div class="name">
                    <h5>
                      <?= get_sub_field('name'); ?>
                    </h5>
                    <span>
                      <?= get_sub_field('position'); ?>
                    </span>
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

              <div class="master_img">
                <?php while ( have_rows('masters') ): the_row(); ?>
                  <img src="<?= get_sub_field('img'); ?>" />
                <?php endwhile; ?>
              </div>
            </div>
          </div>

          <div class="figure_13 appear" style="right: 40px">
            <img
              class="img-svg figure_41"
              src="<?= B_IMG_DIR ?>/figure_41.svg"
            />
            <img class="figure_42" src="<?= B_IMG_DIR ?>/figure_43.png" />
          </div>
        </div>
      </div>
    </section>

    <section class="about_video">
      <div class="wrapper">
        <div class="video_left">
          <div class="img_bg appear">
            <img src="<?= get_field('video_section')['thumbnail']; ?>" >
          </div>
        </div>
        <div class="video_text">
          <h2 class="textAppear">
            <?= get_field('video_section')['text']; ?>
          </h2>
          <div class="video">
            <div class="figure">
              <span class="rect"></span>
              <span class="triangle"></span>
            </div>
            <button id="openVideo" class="video_btn">Посмотреть видео</button>
          </div>
        </div>
      </div>

      <div
        class="figure_7 red wow fadeInDown"
        style="width: 20rem; height: 22.5rem; left: 35%">
        <img
          class="img-svg figure_71"
          src="<?= B_IMG_DIR ?>/figure_71.svg"
        />
      </div>

      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="figure_12 appear"
        style="left: -2%; ; animation-delay: 1s"
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
        style="left: 32%; animation-delay: 1s"
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
        style="left: 64%; animation-delay: 1s"
        viewbox="0,0 140,270">
        <path
          fill="transparent"
          stroke="rgba(255, 255, 255, 0.04)"
          stroke-width="0.3px"
          d="M67.708 0h69.062L69.062 270.833H0z"
        />
      </svg>
    </section>

    <?php if (get_field('facts', 'options')): ?>
      <section class="facts">
        <div class="wrapper mobwrapper">
          <h2 class="facts_title textAppear">Факты о нас</h2>
          <div class="facts_cards mobslider mob100">

            <?php while ( have_rows('facts', 'options') ): the_row(); ?>
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

        <div class="figure_2 appear" style="left: 78%">
          <div class="figure_21"></div>
          <img class="figure_22" src="<?= B_IMG_DIR ?>/figure_22.png" />
          <div class="figure_23"></div>
        </div>

        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="figure_12 appear"
          style="left: 12%; animation-delay: 1s"
          viewbox="0,0 140,270"
        >
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
          viewbox="0,0 140,270"
        >
          <path
            fill="transparent"
            stroke="rgba(45, 86, 138, 0.04)"
            stroke-width="0.5px"
            d="M67.708 0h69.062L69.062 270.833H0z"
          />
        </svg>
      </section>
    <?php endif; ?>

    <?php get_footer(); ?>
    <?php wp_footer(); ?>

    <script>

      $(document).ready(function() {

        if (window.innerWidth < 421) {
          $(".facts_cards").slick({
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
          if (window.innerWidth < 421) {
            $(".facts_cards").slick({
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

        // $("section.info_about .master_img").slick({
        //   arrows: true,
        //   draggable: false,
        //   focusOnSelect: false,
        //   infinite: false,
        //   autoplay: false,
        //   dots: false,
        //   slidesToShow: 1,
        //   slidesToScroll: 1,
        //   variableWidth: true,
        // });

      });

    </script>
  </body>
</html>
