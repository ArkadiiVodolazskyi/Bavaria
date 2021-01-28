<?php
/*
 * Template Name: Bavaria | page-blog_inner
 * Template Post Type: page, post, blog
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
      <img src="<?= get_field('banner')['img']; ?>" class="banner_img" />
    </section>

    <section class="post">
      <div class="wrapper">
        <div class="date"><span>22 декабря 2020</span></div>
        <h2 class="blog_title">
          Chevrolet Camaro RS посетил нашу студию детейлинга для процедур
          по преображению
        </h2>
        <p class="accent">
          Оцените как раскрылся и “загорелся” глубокий вишневый металлик после
          полировки кузова и нанесения защитного покрытия
        </p>
        <p>
          Так же данный автомобиль мы оклеили в защитную антигравийную плёнку
          для защиты от сколов и царапин<br /><br />
          Запись в нашу студию детейлинга возможен через Direct или по номеру
          телефона +380731500115
        </p>
        <div class="gallery">
          <button class="tape_prev">
            <img src="../img_shared/icons/arrow.svg" class="img-svg" />
          </button>
          <div class="all mobwrapper">
            <div class="tape mobslider">
              <img src="../img_shared/service_gallery/service_gallery1.png" />
              <img src="../img_shared/service_gallery/service_gallery2.png" />
              <img src="../img_shared/service_gallery/service_gallery3.png" />
              <img src="../img_shared/service_gallery/service_gallery4.png" />
              <img src="../img_shared/service_gallery/service_gallery5.png" />
            </div>
          </div>
          <button class="tape_next">
            <img src="../img_shared/icons/arrow.svg" class="img-svg" />
          </button>
        </div>
        <p>
          Всё гениальное просто! Многие боятся переходить на AirPods c “тёплых
          ламповых” проводных наушников по разным причинам, но чаще всего это
          боязнь потери, ведь AirPods’ы действительно держатся в ухе не так
          хорошо как, например, спортивные внутриканальные наушники. Компания
          Elago, уже известная серией чехлов для зарядного футляра AirPods
          выпустила простой, но невероятно полезный аксессуар, который обрадует
          многих владельцев яблочных наушников, а кого-то, возможно, и склонит к
          отказу от проводной гарнитуры в пользу новых технологий.
        </p>
        <div class="list_wrapper">
          <h5 class="list_title">
            Компания Elago, уже известная серией чехлов для зарядного футляра
            AirPods выпустила простой, но невероятно полезный аксессуар, который
            обрадует многих:
          </h5>
          <ul class="list">
            <li>
              <img src="../img_shared/icons/single_line.svg" class="img-svg" />
              <span
                >Airpods Secure Fit изготовлены из качественного силикона</span
              >
            </li>
            <li>
              <img src="../img_shared/icons/single_line.svg" class="img-svg" />
              <span>Сделаны невероятно тонкими – всего 0,2 мм</span>
            </li>
            <li>
              <img src="../img_shared/icons/single_line.svg" class="img-svg" />
              <span
                >Такая толщина позволяет без какого-либо дискомфорта заряжать
                наушники</span
              >
            </li>
            <li>
              <img src="../img_shared/icons/single_line.svg" class="img-svg" />
              <span>Вот в ушах AirPods будут сидеть не в пример лучше</span>
            </li>
            <li>
              <img src="../img_shared/icons/single_line.svg" class="img-svg" />
              <span
                >Кроме того, за счет более плотного прилегания слегка улучшится
                и звукоизоляция</span
              >
            </li>
          </ul>
        </div>
        <p>
          Многие боятся переходить на AirPods c “тёплых ламповых” проводных
          наушников по разным причинам, но чаще всего это боязнь потери, ведь
          AirPods’ы действительно держатся в ухе не так хорошо как, например,
          спортивные внутриканальные наушники. Компания Elago, уже известная
          серией чехлов для зарядного футляра AirPods выпустила простой, но
          невероятно полезный аксессуар, который обрадует многих владельцев
          яблочных наушников, а кого-то, возможно, и склонит к отказу от
          проводной гарнитуры в пользу новых технологий.
        </p>

        <div class="share">
          <span>Поделитесь с друзьями:</span>
          <ul>
            <li>
              <a href="https://www.facebook.com/">
                <img
                  src="../img_shared/icons/share_facebook.svg"
                  class="img-svg"
                />
              </a>
            </li>
            <li>
              <a href="https://telegram.org/">
                <img
                  src="../img_shared/icons/share_telegram.svg"
                  class="img-svg"
                />
              </a>
            </li>
            <li>
              <button class="copyLink">
                <img
                  src="../img_shared/icons/share_link.svg"
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
        <h3>Читайте также</h3>

        <div class="cards">
          <div class="pages">
            <div class="page mobslider">
              <a
                href="./pages/page-blog_inner.html"
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
                href="./pages/page-blog_inner.html"
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
                href="./pages/page-blog_inner.html"
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
                href="./pages/page-blog_inner.html"
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
        </div>
      </div>

      <div class="figure_2" style="left: 74%">
        <div class="figure_21"></div>
        <img class="figure_22" src="../img_shared/figures/figure_22.png" />
        <div class="figure_23"></div>
      </div>

      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="figure_12"
        style="left: 8%"
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
        class="figure_12"
        style="left: 24%"
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
  </body>
</html>
