<?php
/*
 * Template Name: Bavaria | page-home
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

    <section class="banner">
      <img src="<?= B_IMG_DIR ?>/main_banner_orig.png" class="banner_img" />

      <div class="slogan">
        <div class="wrapper">
          <h2>
            Новый уровень ухода<br />
            за вашим автомобилем
          </h2>
          <div class="video">
            <div class="figure">
              <span class="rect"></span>
              <span class="triangle"></span>
            </div>
            <a href="./pages/page-about_us.html" class="video_link"
              >Посмотреть видео</a
            >
          </div>
        </div>
      </div>

      <div class="figure_1 hidden_360">
        <img
          class="img-svg native figure_41"
          src="<?= B_IMG_DIR ?>/figure_41.svg"
        />
        <img class="figure_42" src="<?= B_IMG_DIR ?>/figure_42.png" />
      </div>

      <a href="#services" class="next">
        <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
      </a>
    </section>

    <section id="services" class="services dark">
      <a href="./pages/page-services_inner.html" class="signup">
        Записаться<br />
        онлайн
      </a>

      <div class="wrapper">
        <h3>Услуги</h3>

        <div class="figure_11" style="z-index: 0; left: 0%">
          <img src="<?= B_IMG_DIR ?>/figure_111.png" />
        </div>

        <div class="cards">
          <div class="card">
            <div class="card_image">
              <img src="<?= B_IMG_DIR ?>/detailing.png" />
            </div>
            <a href="./pages/page-services_deteiling.html" class="card_title">
              <h4>Детейлинг</h4>
              <p class="card_text">
                Полировка позволяет восстановить первозданное лакокрасочное
                покрытие автомобиля
              </p>
            </a>
          </div>

          <div class="card">
            <div class="card_image">
              <img src="<?= B_IMG_DIR ?>/painting.png" />
            </div>
            <a href="./pages/page-services_deteiling.html" class="card_title">
              <h4>Малярка</h4>
              <p class="card_text">
                Малярка позволяет восстановить первозданное лакокрасочное
                покрытие автомобиля
              </p>
            </a>
          </div>

          <div class="card">
            <div class="card_image">
              <img src="<?= B_IMG_DIR ?>/repairing.png" />
            </div>
            <a href="./pages/page-services_deteiling.html" class="card_title">
              <h4>Ремонт</h4>
              <p class="card_text">
                Малярка позволяет восстановить первозданное лакокрасочное
                покрытие автомобиля
              </p>
            </a>
          </div>

          <div class="card">
            <div class="card_image">
              <img src="<?= B_IMG_DIR ?>/services.png" />
            </div>
            <a href="./pages/page-services_deteiling.html" class="card_title">
              <h4>Техническое обслуживание</h4>
              <p class="card_text">
                Малярка позволяет восстановить первозданное лакокрасочное
                покрытие автомобиля
              </p>
            </a>
          </div>

          <div class="card">
            <div class="card_image">
              <img src="<?= B_IMG_DIR ?>/diagnostics.png" />
            </div>
            <a href="./pages/page-services_deteiling.html" class="card_title">
              <h4>Диагностика</h4>
              <p class="card_text">
                Малярка позволяет восстановить первозданное лакокрасочное
                покрытие автомобиля
              </p>
            </a>
          </div>
        </div>
      </div>

      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="figure_12"
        style="left: 42%"
        viewbox="0,0 140,270"
      >
        <path
          fill="transparent"
          stroke="rgba(255, 255, 255, 0.04)"
          stroke-width="0.5px"
          d="M67.708 0h69.062L69.062 270.833H0z"
        />
      </svg>

      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="figure_12"
        style="left: 58%"
        viewbox="0,0 140,270"
      >
        <path
          fill="transparent"
          stroke="rgba(255, 255, 255, 0.04)"
          stroke-width="0.5px"
          d="M67.708 0h69.062L69.062 270.833H0z"
        />
      </svg>

      <a href="#news" class="next">
        <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
      </a>
    </section>

    <section id="news" class="news light p-5">
      <a href="./pages/page-blog_main.html" class="signup">
        Будь в курсе<br />
        Всех новостей
      </a>

      <div class="wrapper mobwrapper">
        <h3>
          Новости<br />
          и события
        </h3>

        <div class="cards">
          <div class="pages">
            <div class="page mobslider">
              <a
                href="./pages/page-blog_inner.html"
                class="card"
                style="
                  background-image: url(<?= B_IMG_DIR ?>/service_gallery1.png);
                "
              >
                <div class="block_overlay">
                  <span class="date">
                    22 декабря 2020
                    <img
                      src="<?= B_IMG_DIR ?>/arrow.svg"
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
                  background-image: url(<?= B_IMG_DIR ?>/service_gallery2.png);
                "
              >
                <div class="block_overlay">
                  <span class="date">
                    22 декабря 2020
                    <img
                      src="<?= B_IMG_DIR ?>/arrow.svg"
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
                  background-image: url(<?= B_IMG_DIR ?>/service_gallery3.png);
                "
              >
                <div class="block_overlay">
                  <span class="date">
                    22 декабря 2020
                    <img
                      src="<?= B_IMG_DIR ?>/arrow.svg"
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
                  background-image: url(<?= B_IMG_DIR ?>/service_gallery4.png);
                "
              >
                <div class="block_overlay">
                  <span class="date">
                    22 декабря 2020
                    <img
                      src="<?= B_IMG_DIR ?>/arrow.svg"
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

      <div class="figure_2" style="left: 38%">
        <div class="figure_21"></div>
        <img class="figure_22" src="<?= B_IMG_DIR ?>/figure_22.png" />
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

      <a href="#portfolio" class="next dark">
        <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
      </a>
    </section>

    <section id="portfolio" class="portfolio dark p-4">
      <a href="./pages/page-folio_main.html" class="signup"
        >Смотреть<br />все работы</a
      >

      <div class="wrapper mobwrapper">
        <h3>Наши работы</h3>

        <div class="main">
          <div class="main_img">
            <img src="<?= B_IMG_DIR ?>/our_works.png" />
          </div>
          <div class="text">
            <h4>Детейлинг Chevrolet Camaro RS</h4>
            <div>
              <p>
                Chevrolet Camaro RS посетил нашу студию детейлинга для процедур
                по преображению
              </p>
              <p>
                Оцените как раскрылся и “загорелся” глубокий вишневый металлик
                после полировки кузова и нанесения защитного покрытия
              </p>
              <p>
                Так же мы наклеили антигравийную плёнку для защиты от сколов и
                царапин
              </p>
            </div>
          </div>
        </div>

        <div class="other mobslider">
          <a href="./pages/page-folio_inner.html" class="card">
            <img
              src="<?= B_IMG_DIR ?>/service_gallery1.png"
              class="card_bg"
            />
            <h5>
              <img
                src="<?= B_IMG_DIR ?>/figure_5.svg"
                class="img-svg native"
              />
              <p><span>Детейлинг BMW X5</span></p>
            </h5>
          </a>
          <a href="./pages/page-folio_inner.html" class="card">
            <img
              src="<?= B_IMG_DIR ?>/service_gallery2.png"
              class="card_bg"
            />
            <h5>
              <img
                src="<?= B_IMG_DIR ?>/figure_5.svg"
                class="img-svg native"
              />
              <p>
                <span
                  >Техническое обслуживание<br />
                  Lexus RX350</span
                >
              </p>
            </h5>
          </a>
          <a href="./pages/page-folio_inner.html" class="card">
            <img
              src="<?= B_IMG_DIR ?>/service_gallery3.png"
              class="card_bg"
            />
            <h5>
              <img
                src="<?= B_IMG_DIR ?>/figure_5.svg"
                class="img-svg native"
              />
              <p>
                <span
                  >Диагностика и ремонт<br />
                  Brabus G-Wagen</span
                >
              </p>
            </h5>
          </a>
        </div>
      </div>

      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="figure_12"
        style="left: -2%"
        viewbox="0,0 140,270"
      >
        <path
          fill="transparent"
          stroke="rgba(255, 255, 255, 0.04)"
          stroke-width="0.3px"
          d="M67.708 0h69.062L69.062 270.833H0z"
        />
      </svg>

      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="figure_12"
        style="left: 32%"
        viewbox="0,0 140,270"
      >
        <path
          fill="transparent"
          stroke="rgba(255, 255, 255, 0.04)"
          stroke-width="0.3px"
          d="M67.708 0h69.062L69.062 270.833H0z"
        />
      </svg>

      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="figure_12"
        style="left: 64%"
        viewbox="0,0 140,270"
      >
        <path
          fill="transparent"
          stroke="rgba(255, 255, 255, 0.04)"
          stroke-width="0.3px"
          d="M67.708 0h69.062L69.062 270.833H0z"
        />
      </svg>

      <div class="figure_3" style="left: 60%">
        <div class="figure_31"></div>
        <div class="figure_32"></div>
        <div class="figure_33"></div>
      </div>

      <div class="figure_4">
        <img
          class="img-svg native figure_41"
          src="<?= B_IMG_DIR ?>/figure_41.svg"
        />
        <img class="figure_42" src="<?= B_IMG_DIR ?>/figure_42.png" />
      </div>

      <a href="#info" class="next">
        <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
      </a>
    </section>

    <section id="info" class="info light">
      <a href="./pages/page-about_us.html" class="signup">
        подробнее<br />
        Об автоцентре
      </a>

      <div class="wrapper mobwrapper">
        <h3>
          Автоцентр<br />
          BMW Bavaria
        </h3>

        <div class="main">
          <div class="text">
            <img
              src="<?= B_IMG_DIR ?>/triple_shared.svg"
              class="img-svg native"
            />
            <div>
              <p>
                Мы занимаемся преображением автомобилей на высочайшем уровне,
                используя лучшие материалы на рынке автомобильной химии
                и составов
              </p>
              <p>
                В нашей студии Ваш автомобиль ждёт только бережный подход и
                пристальное внимание к мелочам
              </p>
              <p>Выбирайте исключительно профессионалов в своём деле</p>
            </div>
          </div>
          <div class="imgs">
            <img src="<?= B_IMG_DIR ?>/red_shard.png" class="shard" />
            <img src="<?= B_IMG_DIR ?>/autocenter.png" class="photo" />
            <div class="pros">
              <div class="pro_arrows">
                <button class="pro_prev">
                  <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
                </button>
                <button class="pro_next">
                  <img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
                </button>
              </div>

              <div class="pro_cards mobslider">
                <div class="pro_card">
                  <img
                    src="<?= B_IMG_DIR ?>/pro_icon1.svg"
                    class="img-svg native pro_icon"
                  />
                  <p class="pro_text">
                    Доступные цены для каждого клиента. Бережный подход
                    и гарантия качества
                  </p>
                </div>
                <div class="pro_card">
                  <img
                    src="<?= B_IMG_DIR ?>/pro_icon1.svg"
                    class="img-svg native pro_icon"
                  />
                  <p class="pro_text">
                    Доступные цены для каждого клиента. Бережный подход
                    и гарантия качества
                  </p>
                </div>
                <div class="pro_card">
                  <img
                    src="<?= B_IMG_DIR ?>/pro_icon1.svg"
                    class="img-svg native pro_icon"
                  />
                  <p class="pro_text">
                    Доступные цены для каждого клиента. Бережный подход
                    и гарантия качества
                  </p>
                </div>
                <div class="pro_card">
                  <img
                    src="<?= B_IMG_DIR ?>/pro_icon1.svg"
                    class="img-svg native pro_icon"
                  />
                  <p class="pro_text">
                    Доступные цены для каждого клиента. Бережный подход
                    и гарантия качества
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <svg
        xmlns="http://www.w3.org/2000/svg"
        class="figure_12"
        style="left: 25%; height: 45%"
        viewbox="0,0 140,273"
      >
        <path
          fill="transparent"
          stroke="rgba(214, 61, 55, 0.1)"
          stroke-width="1px"
          d="M67.708 0h69.062L69.062 270.833H0z"
        />
      </svg>
		</section>

		<?php get_footer(); ?>
    <?php wp_footer(); ?>
  </body>
</html>
