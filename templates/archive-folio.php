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
          <h2 class="textAppear" data-delay="2">
            Портфолио
          </h2>
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

    <?php

      // Получить названия таксономий service_type
      $taxonomies = get_terms( [
        'taxonomy' => 'service_type',
        'hide_empty' => false,
      ] );

    ?>

    <section class="portfolio_main">
      <div class="wrapper">
        <nav>
          <p class="nav_arrow">
            <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
          </p>
          <button data-term = "all">
            <span>Все работы</span>
          </button>

          <?php
            foreach ($taxonomies as $key=>$term) {
              $termName = $term->name;
              $termSlug = $term->slug;

              if ($termName != 'Главная') {
          ?>

            <button class="wow fadeInRight"
                    data-wow-delay="<?= $key*0.2 + 1; ?>s"
                    data-term = "<?= $termSlug; ?>">
              <span><?= $termName; ?></span>
            </button>

          <?php } }; ?>
        </nav>

        <div class="other">

            <p class="noPosts">По такому запросу постов нет</p>

            <?php
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
            ?>

            <a href="<?= $url; ?>"
              class="card"
              data-term = "<?= $postTerm; ?>">
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
