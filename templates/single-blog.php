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
          <h2 class="blog_title textAppear">
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
              <div class="all">
                <div class="tape">
                  <?php $images = get_sub_field('imgs');
                        foreach( $images as $image ): ?>
                    <img src="<?= $image; ?>" />
                  <?php endforeach; ?>
                </div>
              </div>
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
              <li class="wow fadeInUp" data-wow-delay="0.2s">
                <button class="shareFacebook">
                  <img
                    src="<?= B_IMG_DIR ?>/share_facebook.svg"
                    class="img-svg"
                  />
                </button>
              </li>
              <li class="wow fadeInUp" data-wow-delay="0.4s">
                <a href="<?= $tgLink; ?>" class="shareTelegram">
                  <img
                    src="<?= B_IMG_DIR ?>/share_telegram.svg"
                    class="img-svg"
                  />
                </a>
              </li>
              <li class="wow fadeInUp" data-wow-delay="0.6s">
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
        <h3 class="textAppear">Читайте также</h3>

        <div class="cards">
          <div class="pages">
            <div class="page">

              <?php
                $posts = get_posts( [
                  'post_type' => 'blog',
                  'numberposts' => -1
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
                    class="card"
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

      $(document).ready(function() {

        document.querySelector(".shareFacebook").addEventListener("click", () => {
          window.open('<?= $fbLink; ?>','popUpWindow','height=400, width=600, left=10, top=10, , scrollbars=yes, menubar=no');
          return false;
        });

        $("section.news .wrapper .cards .pages .page").slick({
          arrows: false,
          draggable: false,
          focusOnSelect: false,
          infinite: false,
          autoplay: false,
          dots: true,
          slidesToShow: 4,
          slidesToScroll: 4,
          variableWidth: true,
          responsive: [
            {
              breakpoint: 1600,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
              }
            },
            {
              breakpoint: 980,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
                draggable: true,
                touchThreshold: 300,
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                draggable: true,
                touchThreshold: 300,
              }
            },
          ]
        });

        setTimeout(() => {
          $("section.post .wrapper .gallery .tape").slick({
            arrows: true,
            draggable: false,
            focusOnSelect: false,
            infinite: false,
            autoplay: false,
            dots: false,
            slidesToShow: 4,
            slidesToScroll: 2,
            vertical: true,
            verticalSwiping: true,
            prevArrow: `
              <button type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="7.996" viewBox="0 0 14 7.996">
                  <path d="M-692 165l-7-8h2.406l4.594 5.247 4.594-5.247H-685l-7 8z" transform="translate(699 -157)"/>
                </svg>
              </button>
            `,
            nextArrow: `
              <button type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="7.996" viewBox="0 0 14 7.996">
                  <path d="M-692 165l-7-8h2.406l4.594 5.247 4.594-5.247H-685l-7 8z" transform="translate(699 -157)"/>
                </svg>
              </button>
            `,
            responsive: [
              {
                breakpoint: 800,
                settings: {
                  arrows: false,
                  draggable: true,
                  focusOnSelect: false,
                  infinite: false,
                  autoplay: false,
                  dots: true,
                  slidesToShow: 1,
                  slidesToScroll: 2,
                  vertical: false,
                  verticalSwiping: false,
                }
              },
              {
                breakpoint: 768,
                settings: {
                  arrows: false,
                  draggable: true,
                  focusOnSelect: false,
                  infinite: false,
                  autoplay: false,
                  dots: true,
                  slidesToShow: 3,
                  slidesToScroll: 2,
                  vertical: false,
                  verticalSwiping: false,
                }
              },
              {
                breakpoint: 600,
                settings: {
                  arrows: false,
                  draggable: true,
                  focusOnSelect: false,
                  infinite: false,
                  autoplay: false,
                  dots: true,
                  slidesToShow: 2,
                  slidesToScroll: 2,
                  vertical: false,
                  verticalSwiping: false,
                }
              },
              {
                breakpoint: 450,
                settings: {
                  arrows: false,
                  draggable: true,
                  focusOnSelect: false,
                  infinite: false,
                  autoplay: false,
                  dots: true,
                  slidesToShow: 1,
                  slidesToScroll: 1,
                  vertical: false,
                  verticalSwiping: false,
                }
              },
            ]
          });
        }, 500);

      });

    </script>
  </body>
</html>
