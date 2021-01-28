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
          <h2>
            Новости<br />
            и события
          </h2>
        </div>
      </div>

      <div class="figure_1">
        <img
          class="img-svg native figure_41"
          src="../img_shared/figures/figure_41.svg"
        />
        <img class="figure_42" src="../img_shared/figures/figure_42.png" />
      </div>
    </section>

    <section class="news light blog_news">
      <div class="wrapper">
        <div class="cards">
          <div class="pages">
            <div class="page">

            <?php
              $posts = get_posts( [
                'post_type'    => 'blog',
                'post_status'  => 'publish',
                'posts_per_page'   => -1,
                'orderby' => 'date',
                'order' => 'DESC',
              ] );

              // создаем экземпляр
              $my_posts = new WP_Query;

              // делаем запрос
              $myposts = $my_posts->query( array(
                'post_type' => 'blog'
              ) );

              // обрабатываем результат
              foreach( $myposts as $pst ){
                echo esc_html( $pst->post_title );
              }

              foreach( $posts as $post ) {
                setup_postdata($post);

                $url = get_permalink();
                $img = get_field('banner');
                $date = get_the_date();
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
      </div>
    </section>

    <?php get_footer(); ?>
    <?php wp_footer(); ?>
  </body>
</html>
