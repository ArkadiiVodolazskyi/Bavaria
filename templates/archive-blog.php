<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset') ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="profile" href="https://gmpg.org/xfn/11" />
		<title>Новости и события</title>
		<?php wp_head(); ?>
  </head>
  <body class="loading">
		<?php get_header(); ?>

    <section class="banner blog_banner">
      <img src="<?= B_IMG_DIR ?>/blog_banner.png" class="banner_img" />

      <div class="slogan">
        <div class="wrapper">
          <h2 class="textAppear">
            Новости<br />
            и события
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

    <section class="news light blog_news">
      <div class="wrapper">
        <div class="cards">
          <div class="pages">
            <div class="page">

            <?php

              // Navpages count fix
              $all_posts = new WP_Query;
              $all_posts = $all_posts->query([
                'post_type' => 'blog',
                'posts_per_page' => -1
              ]);
              $all_posts = count($all_posts);
              $pages = $all_posts / get_field('per_page', 'options')['blog'];
              // echo $pages;

              wp_reset_query();

              $my_posts = new WP_Query;
              $myposts = $my_posts->query([
                'post_type' => 'blog',
                'posts_per_page' => get_field('per_page', 'options')['blog'],
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1, // получить посты с текущей страницы, установить текущую страницу в 1, если не определена
              ]);

              foreach( $myposts as $key=>$post ) {
                setup_postdata($post);

                $url = get_permalink();
                $img = get_field('banner');
                $date = date_i18n( 'j F Y', get_the_date(), false );
                $post_title = $post->post_title;
              ?>

                <a
                  href="<?= $url; ?>"
                  class="card wow fadeInUp"
                  data-wow-delay="<?= $key*0.2?>s"
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

              <?php } wp_reset_query(); ?>

            </div>
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
      </div>
    </section>

    <?php get_footer(); ?>
    <?php wp_footer(); ?>
  </body>
</html>
