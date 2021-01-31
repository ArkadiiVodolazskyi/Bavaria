<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset') ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
		<title>Портфолио</title>
		<?php wp_head(); ?>
  </head>
  <body class="loading">
		<?php get_header(); ?>

    <section class="banner blog_banner">
      <img src="<?= B_IMG_DIR ?>/folio_main_banner.png" class="banner_img" />

      <div class="slogan">
        <div class="wrapper">
          <h2>Портфолио</h2>
        </div>
      </div>

      <div class="figure_1 hidden_360">
        <img
          class="img-svg native figure_41"
          src="<?= B_IMG_DIR ?>/figure_41.svg"
        />
        <img class="figure_42" src="<?= B_IMG_DIR ?>/figure_42.png" />
      </div>
    </section>

    <section class="portfolio_main">
      <div class="wrapper">
        <nav>
          <p class="nav_arrow">
            <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
          </p>
          <button>
            <span>Все работы</span>
          </button>
          <button>
            <span>Техническое обслуживание</span>
          </button>
          <button>
            <span>Все работы</span>
          </button>
          <button>
            <span>Все работы</span>
          </button>
          <button>
            <span>Техническое обслуживание</span>
          </button>
          <button>
            <span>Все работы</span>
          </button>
        </nav>

        <div class="other">

            <?php
              $posts = get_posts( [
                'post_type' => 'folio',
                'numberposts' => -1
              ] );

              foreach( $posts as $post ) {
                setup_postdata($post);

                $url = get_permalink();
                $img = get_field('banner');
                $post_title = $post->post_title;
            ?>

            <a href="<?= $url; ?>" class="card">
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

        <ul class="navpages_2">
          <li>
            <button class="arrow page_prev">
              <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
            </button>
          </li>
          <li><button class="active">1</button></li>
          <li><button>2</button></li>
          <li><button>3</button></li>
          <li><button>4</button></li>
          <li><button>5</button></li>
          <li>...</li>
          <li><button>34</button></li>
          <li>
            <button class="arrow page_next active">
              <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
            </button>
          </li>
        </ul>
      </div>
    </section>

    <?php get_footer(); ?>
    <?php wp_footer(); ?>
  </body>
</html>
