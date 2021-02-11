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
		<?php wp_head(); ?>
  </head>
  <body>
		<?php get_header(); ?>

    <section class="banner blog_banner map_banner">
      <div class="banner_img map wow fadeIn"></div>

      <div class="wrapper">
        <div class="contact_info">
          <h2 class="textAppear">
						<?= get_the_title(); ?>
					</h2>

          <ul class="contacts">
            <li>
              <img src="<?= B_IMG_DIR ?>/phone.svg" class="img-svg" />
              <div class="phone_list">

								<?php while(have_rows('phones', 'options')): the_row(); ?>
									<div class="phone">
										<div class="phone_first">
											<a href="tel:<?= get_sub_field('number'); ?>" class="textAppear">
												<?= get_sub_field('number'); ?>
											</a>
											<div class="phone_type">
												<?php $messengers = get_sub_field('messengers');
													foreach( $messengers as $messenger ): ?>
													<?php if ($messenger): ?>
														<img
															src="<?= B_IMG_DIR ?>/type_<?= $messenger ?>.svg"
															class="img-svg native" />
													<?php endif; ?>
												<?php endforeach; ?>
											</div>
										</div>
										<span class="textAppear">
											<?= get_sub_field('workshop'); ?>
										</span>
									</div>
								<?php endwhile; ?>

              </div>
            </li>
            <li>
              <img src="<?= B_IMG_DIR ?>/address.svg" class="img-svg" />
              <a href="<?= get_field('contacts', 'options')['address']['url']; ?>" class="textAppear">
								<?= get_field('contacts', 'options')['address']['title']; ?>
							</a>
            </li>
            <li>
              <img src="<?= B_IMG_DIR ?>/telegram.svg" class="img-svg" />
              <a href="mailto:<?= get_field('contacts', 'options')['email']; ?>" class="textAppear">
								<?= get_field('contacts', 'options')['email']; ?>
							</a>
            </li>
            <li>
              <img src="<?= B_IMG_DIR ?>/time.svg" class="img-svg" />
              <span class="textAppear">
								<?= get_field('schedule', 'options'); ?>
							</span>
            </li>
          </ul>

          <div class="below">
            <div class="checkup appear">
              <button class="openConnect">Свяжитесь с нами</button>
            </div>

            <ul class="social">
              <?php while(have_rows('social', 'options')): the_row(); ?>
                <li class="wow fadeInRight">
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
      // Initialize GMaps
      function initMap() {
        const coordinates = { lat: <?= get_field('coords')['lat']; ?>, lng: <?= get_field('coords')['lng']; ?> };
        const map = new google.maps.Map(document.querySelector(".map"), {
          center: coordinates,
          zoom: 17,
          disableDefaultUI: true,
          scrollwheel: true,
        });
        const marker = new google.maps.Marker({
          position: coordinates,
          map: map,
          icon: '<?= get_field('mark'); ?>',
        });
      }
    </script>

    <script defer src="https://maps.googleapis.com/maps/api/js?key=<?= get_field('gmaps_api_key', 'options'); ?>&callback=initMap"></script>

    <?php get_footer(); ?>
    <?php wp_footer(); ?>
  </body>
</html>
