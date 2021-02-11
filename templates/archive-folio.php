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
          <h2 class="textAppear">
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

            <button class="appear"
                    style="animation-delay: <?= $key*0.1 + 0.1 ?>s"
                    data-term = "<?= $termSlug; ?>">
              <span><?= $termName; ?></span>
            </button>

          <?php } }; ?>
        </nav>

        <div class="other">

            <p class="noPosts">По такому запросу постов нет</p>

            <?php

              wp_reset_query();
              $my_posts = new WP_Query;
              $myposts = $my_posts->query([
                'post_type' => 'folio',
                'posts_per_page' => get_field('per_page', 'options')['folio'],
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1, // получить посты с текущей страницы, установить текущую страницу в 1, если не определена
              ]);

              foreach( $myposts as $key=>$post ) {
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

        <?php the_posts_pagination([
          'show_all'     => false, // показаны все страницы участвующие в пагинации
          'end_size'     => 1,     // количество страниц на концах
          'mid_size'     => 5,     // количество страниц вокруг текущей
          'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
          'prev_text'    => __('<img src="' . B_IMG_DIR . '/arrow.svg" class="img-svg" />'),
          'next_text'    => __('<img src="' . B_IMG_DIR . '/arrow.svg" class="img-svg" />'),
          'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
          'add_fragment' => '',     // Текст который добавится ко всем ссылкам.
          'screen_reader_text' => __( 'Posts navigation' ),
        ]); ?>

      </div>
    </section>

    <?php get_footer(); ?>
    <?php wp_footer(); ?>
  </body>
</html>
