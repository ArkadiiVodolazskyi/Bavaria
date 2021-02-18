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

              wp_reset_query();
              $my_posts = new WP_Query;
              $myposts = $my_posts->query([
                'hide_empty' => false,
                'post_type' => 'blog',
                'posts_per_page' => get_field('per_page', 'options')['blog'],
                'paged' => get_query_var('paged') ? get_query_var('paged') : 1, // получить посты с текущей страницы, установить текущую страницу в 1, если не определена
              ]);

              foreach( $myposts as $key=>$post ) {
                setup_postdata($post);

                $url = get_permalink();
                $img = get_field('banner');
                $date = get_the_date('j F Y', $post->id);
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

              <?php }; wp_reset_postdata(); ?>

            </div>
          </div>

          <?php

          function custom_page_navi( $totalpages, $page, $end_size, $mid_size ) {
            $bignum = 999999999;

            if ( $totalpages <= 1 || $page > $totalpages ) return;

            return paginate_links( array(
                'base'          => str_replace( $bignum, '%#%', esc_url( get_pagenum_link( $bignum ) ) ),
                'format'        => '',
                'current'       => max( 1, $page ),
                'total'         => $totalpages,
                'prev_text'    => __('<img src="' . B_IMG_DIR . '/arrow.svg" class="img-svg" />'),
                'next_text'    => __('<img src="' . B_IMG_DIR . '/arrow.svg" class="img-svg" />'),
                'type'          => 'list',
                'show_all'      => false,
                'end_size'      => $end_size,
                'mid_size'      => $mid_size
              )
            );
          }

          // Edit:
          $taxonomy = 'service_type';
          $number   = get_field('per_page', 'options')['blog']; // number of terms to display per page

          // Setup:
          $page         = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
          $totalterms   = wp_count_terms( $taxonomy, array( 'hide_empty' => false ) );
          $totalpages   = ceil( $totalterms / $number );

          // Show custom page navigation
          printf( '<nav class="pagination">%s</nav>',
            custom_page_navi( $totalpages, $page, 1, 5 )
          );

          ?>

        </div>
      </div>
    </section>

    <?php get_footer(); ?>
    <?php wp_footer(); ?>
  </body>
</html>
