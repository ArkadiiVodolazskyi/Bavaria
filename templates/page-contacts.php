<?php
/*
 * Template Name: Bavaria | page-contacts
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

    <!-- Initialize 2GIS -->
    <script src="https://maps.api.2gis.ru/2.0/loader.js?pkg=full"></script>

		<?php wp_head(); ?>
  </head>
  <body>
		<?php get_header(); ?>

    <section class="banner blog_banner map_banner">
      <div id="map" class="banner_img map wow fadeIn"></div>

      <div class="wrapper">
        <div class="contact_info">
          <h2>
						<?= get_the_title(); ?>
					</h2>

          <ul class="contacts">
            <li>
              <img src="<?= B_IMG_DIR ?>/phone.svg" class="img-svg" />
              <div class="phone_list">

								<?php while(have_rows('phones', 'options')): the_row(); ?>
									<div class="phone">
										<div class="phone_first">
											<a href="tel:<?= get_sub_field('number'); ?>">
												<?= get_sub_field('number'); ?>
											</a>

											<ul class="phone_type type">
                        <?php $messengers = get_sub_field('messengers');
                              $number = str_replace([' ', '-', '+'], '', get_sub_field('number')); // remove _, -, +

                          foreach ($messengers as $messenger) {
                            // Form call link dependong on messger
                            if ($messenger == 'telegram') {
                              $link = 'https://telegram.me/' . get_sub_field('telegram_username');
                            } else if ($messenger == 'viber') {
                              $link = 'viber://' . (isMobileDevice() ? 'add?number=' : 'chat?number=+') . $number;
                            } else if ($messenger == 'whatsapp') {
                              $link = 'https://api.whatsapp.com/send?phone=' . $number;
                            }
                          ?>
                          <li class="<?= $messenger ?>">
                            <a href="<?= $link; ?>">
                              <img
                                src="<?= B_IMG_DIR ?>/type_<?= $messenger ?>.svg"
                                class="img-svg native"
                              />
                            </a>
                          </li>
                        <?php }; ?>
                      </ul>

										</div>
										<span>
											<?= get_sub_field('workshop'); ?>
										</span>
									</div>
								<?php endwhile; ?>

              </div>
            </li>
            <li>
              <img src="<?= B_IMG_DIR ?>/address.svg" class="img-svg" />
              <a href="<?= get_field('contacts', 'options')['address']['url']; ?>">
								<?= get_field('contacts', 'options')['address']['title']; ?>
							</a>
            </li>
            <li>
              <img src="<?= B_IMG_DIR ?>/telegram.svg" class="img-svg" />
              <a href="mailto:<?= get_field('contacts', 'options')['email']; ?>">
								<?= get_field('contacts', 'options')['email']; ?>
							</a>
            </li>
            <li>
              <img src="<?= B_IMG_DIR ?>/time.svg" class="img-svg" />
              <span>
								<?= get_field('schedule', 'options'); ?>
							</span>
            </li>
          </ul>

          <div class="below">
            <div class="checkup">
              <button class="openConnect">Свяжитесь с нами</button>
            </div>

            <ul class="social">
              <?php while(have_rows('social', 'options')): the_row(); ?>
                <li>
                  <a href="<?= get_sub_field('url'); ?>" class="social_link">
                    <img src="<?= B_IMG_DIR ?>/<?= get_sub_field('type'); ?>.svg" class="img-svg" />
                  </a>
                </li>
              <?php endwhile; ?>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <script>
      const marker_image = `<?= get_field('mark'); ?>`;

      // Initialize 2GIS
      var map;
      DG.then(function () {
          map = DG.map('map', {
            center: [
              <?= get_field('coords')['lat']; ?>,
              <?= get_field('coords')['lng']; ?>
            ],
            zoom: 17
          });
          DG.marker([
            <?= get_field('coords')['lat']; ?>,
            <?= get_field('coords')['lng']; ?>
          ]).addTo(map);
      });
    </script>


    <?php get_footer(); ?>
    <?php wp_footer(); ?>
  </body>
</html>
