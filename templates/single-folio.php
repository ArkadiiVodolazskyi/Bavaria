<?php
/*
 * Template Name: Bavaria | single-folio
 * Template Post Type: folio
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
  <body class="loading single-folio">
		<?php get_header(); ?>

    <section class="banner blog_banner">
      <img src="<?= get_field('banner'); ?>" class="banner_img" />
    </section>

    <section class="post service_post">
      <div class="wrapper">
        <h2 class="blog_title textAppear">
          <?= get_the_title(); ?>
        </h2>

        <?php while ( have_rows('single-folio') ): the_row(); ?>

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

          <?php while ( have_rows('result') ): the_row(); ?>
            <div class="result">

              <?php if ( get_sub_field('text') ): ?>
                <div class="left_text wow fadeInLeft">
                  <?= get_sub_field('text'); ?>
                </div>
              <?php endif; ?>

              <div class="right_works">

                <?php while ( have_rows('list') ): the_row(); ?>
                  <div class="list_wrapper">
                    <h5 class="list_title wow fadeInRight">
                      <?= get_sub_field('title'); ?>
                    </h5>
                    <ul class="list">
                      <?php while ( have_rows('points') ): the_row(); ?>
                        <li class="wow fadeInRight" data-wow-delay="<?= get_row_index()*0.2?>s">
                          <img src="<?= B_IMG_DIR ?>/single_line.svg" class="img-svg" />
                          <span><?= get_sub_field('text'); ?></span>
                        </li>
                      <?php endwhile; ?>
                    </ul>
                  </div>
                <?php endwhile; ?>

                <div class="checkup openConnect appear">
                  <button>Записаться на осмотр</button>
                </div>

                <div
                  class="figure_8"
                  style="height: 95%; width: 170%; top: 3rem; left: 3.5rem">
                  <div class="figure_9 wow fadeInRight"
                    style="width: 15%; left: 60%">
                    <img
                      src="<?= B_IMG_DIR ?>/figure_91.png"
                      class="figure_91"
                    />
                  </div>
                  <img
                    class="figure_42 appear"
                    src="<?= B_IMG_DIR ?>/figure_42.png"
                    style="height: 55%; left: 65%; bottom: -4rem"
                  />
                </div>
              </div>

            </div>
          <?php endwhile; ?>

        <?php endwhile; ?>

        <?php
          $url = urlencode(get_permalink());
          $title = urlencode('Зацени новость на сайте bavaria!');

          $tgLink = 'tg://msg_url?url=' . $url . '&text=' . $title;
          $fbLink = 'https://www.facebook.com/sharer/sharer.php?&p[url]=' . $url;
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
              <a href="<?= $tgLink; ?>">
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

    <section class="news p-5">
      <div class="wrapper">
        <h3 class="textAppear">Смотреть ещё</h3>

        <div class="other">
          <?php
            $posts = get_posts( [
              'post_type' => 'folio',
              'numberposts' => -1
            ] );

            foreach( $posts as $key=>$post ) {
              setup_postdata($post);

              $url = get_permalink();
              $img = get_field('banner');
              $post_title = $post->post_title; ?>

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
                breakpoint: 1700,
                settings: {
                  arrows: true,
                  draggable: false,
                  focusOnSelect: false,
                  infinite: false,
                  autoplay: false,
                  dots: false,
                  slidesToShow: 3,
                  slidesToScroll: 1,
                  vertical: true,
                  verticalSwiping: true,
                }
              },
              {
                breakpoint: 1400,
                settings: {
                  arrows: true,
                  draggable: false,
                  focusOnSelect: false,
                  infinite: false,
                  autoplay: false,
                  dots: false,
                  slidesToShow: 4,
                  slidesToScroll: 1,
                  vertical: true,
                  verticalSwiping: true,
                }
              },
              {
                breakpoint: 1280,
                settings: {
                  arrows: true,
                  draggable: false,
                  focusOnSelect: false,
                  infinite: false,
                  autoplay: false,
                  dots: false,
                  slidesToShow: 3,
                  slidesToScroll: 1,
                  vertical: true,
                  verticalSwiping: true,
                }
              },
              {
                breakpoint: 960,
                settings: {
                  arrows: true,
                  draggable: false,
                  focusOnSelect: false,
                  infinite: false,
                  autoplay: false,
                  dots: false,
                  slidesToShow: 2,
                  slidesToScroll: 1,
                  vertical: true,
                  verticalSwiping: true,
                }
              },
              {
                breakpoint: 850,
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
                  variableWidth: true,
                }
              },
              {
                breakpoint: 700,
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
                  variableWidth: true,
                }
              },
            ]
          });
        }, 500);

        $(".other").slick({
          arrows: false,
          draggable: false,
          focusOnSelect: false,
          infinite: false,
          autoplay: false,
          dots: true,
          slidesToShow: 3,
          slidesToScroll: 3,
          variableWidth: true,
          responsive: [
            {
              breakpoint: 1400,
              settings: {
                arrows: false,
                draggable: true,
                focusOnSelect: false,
                infinite: false,
                autoplay: false,
                dots: true,
                slidesToShow: 2,
                slidesToScroll: 2,
              }
            },
            {
              breakpoint: 700,
              settings: {
                arrows: false,
                draggable: true,
                focusOnSelect: false,
                infinite: false,
                autoplay: false,
                dots: true,
                slidesToShow: 1,
                slidesToScroll: 1,
              }
            },
          ]
        });

      });
    </script>
  </body>
</html>
