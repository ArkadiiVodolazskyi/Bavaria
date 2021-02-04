<?php
/*
 * Template Name: Bavaria | page-vacancies
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

    <div id="resume_wrapper">
      <h2>Отправить резюме</h2>
      <?php echo do_shortcode( '[gravityform id=2 title=false description=false ajax=true]' ); ?>

      <img src="<?= B_IMG_DIR ?>/connect_img.png" class="connect_img" />
      <img
        src="<?= B_IMG_DIR ?>/figure_1.svg"
        class="img-svg native connect_figure"
      />
      <button id="closeResume">
        <img src="<?= B_IMG_DIR ?>/cross2.svg" class="img-svg" />
      </button>
    </div>

    <section class="banner blog_banner">
      <img
        src="<?= get_field('banner'); ?>"
        class="banner_img"
      />

      <div class="figure_1">
        <img
          class="img-svg native figure_41"
          src="<?= B_IMG_DIR ?>/figure_41.svg"
        />
        <img class="figure_42" src="<?= B_IMG_DIR ?>/figure_42.png" />
      </div>

      <div class="slogan">
        <div class="wrapper">
          <h2 class="textAppear" data-delay="2">
           <?= get_the_title(); ?>
          </h2>
        </div>
      </div>
    </section>

    <section class="vacancies">
      <div class="wrapper">

        <?php while ( have_rows('vacancy') ): the_row(); ?>
          <div class="vacancy wow fadeInLeft">
            <h3>
              <?= get_sub_field('title'); ?>
              <button class="expand">
                <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
              </button>
            </h3>

            <?php while ( have_rows('additional') ): the_row(); ?>
              <?php while ( have_rows('paragraph') ): the_row(); ?>
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
                          <?= get_sub_field('text'); ?>
                        </span>
                      </li>
                    <?php endwhile; ?>
                  </ul>
                </div>
              <?php endwhile; ?>
            <?php endwhile; ?>

            <button class="send resume">
              <span>Отправить резюме</span>
            </button>
          </div>
        <?php endwhile; ?>

      </div>
    </section>

    <?php if (get_field('facts', 'options')): ?>
      <section class="facts">
        <div class="wrapper mobwrapper">
          <h2 class="facts_title textAppear" data-delay="1">Факты о нас</h2>
          <div class="facts_cards mobslider">

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
  </body>
</html>
