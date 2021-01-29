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

    <section class="banner blog_banner">
      <img src="<?= get_field('banner'); ?>" class="banner_img" />

      <div class="slogan">
        <div class="wrapper">
          <h2>
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
          <p class="accent">
            <?= get_field('about')['par_bold']; ?>
          </p>
          <p>
            <?= get_field('about')['par']; ?>
          </p>
        </div>
        <div class="right_master">
          <div class="master">
            <div class="master_bg">
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

          <div class="figure_13" style="right: 40px">
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
          <div class="img_bg">
            <?= get_field('video_section')['video']; ?>
          </div>
        </div>
        <div class="video_text">
          <h2>
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
        class="figure_7 red"
        style="width: 20rem; height: 22.5rem; left: 35%"
      >
        <img
          class="img-svg figure_71"
          src="<?= B_IMG_DIR ?>/figure_71.svg"
        />
      </div>
    </section>

    <?php if (get_field('facts', 'options')): ?>
      <section class="facts">
        <div class="wrapper mobwrapper">
          <h2 class="facts_title">Факты о нас</h2>
          <div class="facts_cards mobslider">

            <?php while ( have_rows('facts', 'options') ): the_row(); ?>
              <div class="card">
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

        <div class="figure_2" style="left: 78%">
          <div class="figure_21"></div>
          <img class="figure_22" src="<?= B_IMG_DIR ?>/figure_22.png" />
          <div class="figure_23"></div>
        </div>

        <svg
          xmlns="http://www.w3.org/2000/svg"
          class="figure_12"
          style="left: 12%"
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
          class="figure_12"
          style="left: 26%"
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
  </body>
</html>
