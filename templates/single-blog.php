<?php
/*
 * Template Name: Bavaria | single-blog
 * Template Post Type: blog
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
  <body class="loading">
		<?php get_header(); ?>

    <section class="banner blog_banner">
      <img src="<?= get_field('banner'); ?>" class="banner_img" />
    </section>

      <section class="post">
        <div class="wrapper">
          <div class="date appear"><span>
            <?= date_i18n( 'j F Y', get_the_date(), false ); ?>
          </span></div>
          <h2 class="blog_title textAppear" data-delay="1">
            <?= get_the_title(); ?>
          </h2>

          <?php while ( have_rows('page-blog_inner') ): the_row(); ?>

          <?php while ( have_rows('paragraph_accent') ): the_row(); ?>
            <p class="accent wow fadeInUp">
              <?= get_sub_field('text'); ?>
            </p>
          <?php endwhile; ?>

          <?php while ( have_rows('paragraph') ): the_row(); ?>
            <p class="wow fadeInUp">
              <?= get_sub_field('text'); ?>
            </p>
          <?php endwhile; ?>

          <?php while ( have_rows('gallery') ): the_row(); ?>
            <div class="gallery wow fadeInUp">
              <button class="tape_prev">
                <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
              </button>
              <div class="all mobwrapper">
                <div class="tape mobslider">
                  <?php $images = get_sub_field('imgs');
                        foreach( $images as $image ): ?>
                    <img src="<?= $image; ?>" />
                  <?php endforeach; ?>
                </div>
              </div>
              <button class="tape_next">
                <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
              </button>
            </div>
          <?php endwhile; ?>

          <?php while ( have_rows('list') ): the_row(); ?>
            <div class="list_wrapper">
              <h5 class="list_title wow fadeInUp">
                <?= get_sub_field('title'); ?>
              </h5>
              <ul class="list">
                <?php while ( have_rows('points') ): the_row(); ?>
                  <li class="wow fadeInUp" data-wow-delay="<?= get_row_index()*0.2?>s">
                    <img src="<?= B_IMG_DIR ?>/single_line.svg" class="img-svg" />
                    <span><?= get_sub_field('text'); ?></span>
                  </li>
                <?php endwhile; ?>
              </ul>
            </div>
          <?php endwhile; ?>

          <?php endwhile; ?>


          <?php
            $url = urlencode(get_permalink());
            $title = urlencode('Зацени новость на сайте bavaria!');

            $tgLink = 'tg://msg_url?url=' . $url . '&text=' . $title;
            $fbLink = 'https://www.facebook.com/sharer/sharer.php?u=' . $url;
          ?>


          <div class="share">
            <span class="wow fadeInUp">Поделитесь с друзьями:</span>
            <ul>
              <li class="wow fadeInUp" data-wow-delay="0.5s">
                <button class="shareFacebook">
                  <img
                    src="<?= B_IMG_DIR ?>/share_facebook.svg"
                    class="img-svg"
                  />
                </button>
              </li>
              <li class="wow fadeInUp" data-wow-delay="0.8s">
                <a href="<?= $tgLink; ?>" class="shareTelegram">
                  <img
                    src="<?= B_IMG_DIR ?>/share_telegram.svg"
                    class="img-svg"
                  />
                </a>
              </li>
              <li class="wow fadeInUp" data-wow-delay="1.2s">
                <button class="copyLink">
                  <img
                    src="<?= B_IMG_DIR ?>/share_link.svg"
                    class="img-svg native"
                  />
                </button>
                <div class="savedMsg">Page link copied to clipboard</div>
              </li>
            </ul>
          </div>
        </div>
      </section>

    <section class="news light p-5 also_news">
      <div class="wrapper mobwrapper">
        <h3 class="textAppear" data-delay="1">Читайте также</h3>

        <div class="cards">
          <div class="pages">
            <div class="page mobslider">

              <?php
                $posts = get_posts( [
                  'post_type' => 'blog',
                  'numberposts' => 4
                ] );

                foreach( $posts as $key=>$post ) {
                  setup_postdata($post);

                  $url = get_permalink();
                  $img = get_field('banner');
                  $date = get_the_date();
                  $post_title = $post->post_title;
                ?>

                  <a
                    href="<?= $url; ?>"
                    class="card wow fadeInRight"
                    data-wow-delay="<?= $key*0.2?>s"
                    style="background-image: url(<?= $img; ?>); ">

                    <div class="block_overlay">
                      <span class="date">
                        <?= date_i18n( 'j F Y', $date, false ); ?>
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

      <div class="figure_2 appear" style="left: 74%">
        <div class="figure_21"></div>
        <img class="figure_22" src="<?= B_IMG_DIR ?>/figure_22.png" />
        <div class="figure_23"></div>
      </div>

      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="figure_12 appear"
        style="left: 8%; animation-delay: 1s"
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
        style="left: 24%; animation-delay: 1.5s"
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

    <?php get_footer(); ?>
    <?php wp_footer(); ?>

    <script>
      document.querySelector(".shareFacebook").addEventListener("click", () => {
        window.open('<?= $fbLink; ?>','popUpWindow','height=400, width=600, left=10, top=10, , scrollbars=yes, menubar=no');
        return false;
      });
    </script>
  </body>
</html>
