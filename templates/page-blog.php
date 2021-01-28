<?php
/*
 * Template Name: Bavaria | page-blog
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
              <a
                href="./page-blog_inner.html"
                class="card"
                style="
                  background-image: url(../img_shared/service_gallery/service_gallery1.png);
                "
              >
                <div class="block_overlay">
                  <span class="date">
                    22 декабря 2020
                    <img
                      src="../img_shared/icons/arrow.svg"
                      class="img-svg arrow"
                    />
                  </span>
                  <p class="text">
                    Chevrolet Camaro RS посетил нашу студию детейлинга для
                    процедур по преображению
                  </p>
                </div>
              </a>

              <a
                href="./page-blog_inner.html"
                class="card"
                style="
                  background-image: url(../img_shared/service_gallery/service_gallery2.png);
                "
              >
                <div class="block_overlay">
                  <span class="date">
                    22 декабря 2020
                    <img
                      src="../img_shared/icons/arrow.svg"
                      class="img-svg arrow"
                    />
                  </span>
                  <p class="text">
                    Chevrolet Camaro RS посетил нашу студию детейлинга для
                    процедур по преображению
                  </p>
                </div>
              </a>

              <a
                href="./page-blog_inner.html"
                class="card"
                style="
                  background-image: url(../img_shared/service_gallery/service_gallery3.png);
                "
              >
                <div class="block_overlay">
                  <span class="date">
                    22 декабря 2020
                    <img
                      src="../img_shared/icons/arrow.svg"
                      class="img-svg arrow"
                    />
                  </span>
                  <p class="text">
                    Chevrolet Camaro RS посетил нашу студию детейлинга для
                    процедур по преображению
                  </p>
                </div>
              </a>

              <a
                href="./page-blog_inner.html"
                class="card"
                style="
                  background-image: url(../img_shared/service_gallery/service_gallery4.png);
                "
              >
                <div class="block_overlay">
                  <span class="date">
                    22 декабря 2020
                    <img
                      src="../img_shared/icons/arrow.svg"
                      class="img-svg arrow"
                    />
                  </span>
                  <p class="text">
                    Chevrolet Camaro RS посетил нашу студию детейлинга для
                    процедур по преображению
                  </p>
                </div>
              </a>
            </div>

            <div class="page">
              <a
                href="./page-blog_inner.html"
                class="card"
                style="
                  background-image: url(../img_shared/service_gallery/service_gallery1.png);
                "
              >
                <div class="block_overlay">
                  <span class="date">
                    22 декабря 2020
                    <img
                      src="../img_shared/icons/arrow.svg"
                      class="img-svg arrow"
                    />
                  </span>
                  <p class="text">
                    Chevrolet Camaro RS посетил нашу студию детейлинга для
                    процедур по преображению
                  </p>
                </div>
              </a>

              <a
                href="./page-blog_inner.html"
                class="card"
                style="
                  background-image: url(../img_shared/service_gallery/service_gallery2.png);
                "
              >
                <div class="block_overlay">
                  <span class="date">
                    22 декабря 2020
                    <img
                      src="../img_shared/icons/arrow.svg"
                      class="img-svg arrow"
                    />
                  </span>
                  <p class="text">
                    Chevrolet Camaro RS посетил нашу студию детейлинга для
                    процедур по преображению
                  </p>
                </div>
              </a>

              <a
                href="./page-blog_inner.html"
                class="card"
                style="
                  background-image: url(../img_shared/service_gallery/service_gallery3.png);
                "
              >
                <div class="block_overlay">
                  <span class="date">
                    22 декабря 2020
                    <img
                      src="../img_shared/icons/arrow.svg"
                      class="img-svg arrow"
                    />
                  </span>
                  <p class="text">
                    Chevrolet Camaro RS посетил нашу студию детейлинга для
                    процедур по преображению
                  </p>
                </div>
              </a>

              <a
                href="./page-blog_inner.html"
                class="card"
                style="
                  background-image: url(../img_shared/service_gallery/service_gallery4.png);
                "
              >
                <div class="block_overlay">
                  <span class="date">
                    22 декабря 2020
                    <img
                      src="../img_shared/icons/arrow.svg"
                      class="img-svg arrow"
                    />
                  </span>
                  <p class="text">
                    Chevrolet Camaro RS посетил нашу студию детейлинга для
                    процедур по преображению
                  </p>
                </div>
              </a>
            </div>
          </div>
          <ul class="navpages_2">
            <li>
              <button class="arrow page_prev">
                <img src="../img_shared/icons/arrow.svg" class="img-svg" />
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
                <img src="../img_shared/icons/arrow.svg" class="img-svg" />
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
