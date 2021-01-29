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
      <div class="banner_img map">
        <div class="map_overlay"></div>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2753.207173154689!2d30.713861115997297!3d46.36527747912191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40c7cb41dc502481%3A0x3394adabb5779b8!2z0LLRg9C70LjRhtGPINCc0LjQutC-0LvQuCDQotGA0L7Rl9GG0YzQutC-0LPQviwgMSwg0J7QtNC10YHQsCwg0J7QtNC10YHRjNC60LAg0L7QsdC70LDRgdGC0YwsIDY1MDAw!5e0!3m2!1sru!2sua!4v1611058761658!5m2!1sru!2sua"
        ></iframe>
      </div>

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
              <li>
                <a href="https://www.instagram.com/" class="social_link">
                  <img
                    src="<?= B_IMG_DIR ?>/instagram.svg"
                    class="img-svg"
                  />
                </a>
              </li>
              <li>
                <a href="https://www.facebook.com/" class="social_link">
                  <img src="<?= B_IMG_DIR ?>/facebook.svg" class="img-svg" />
                </a>
              </li>
              <li>
                <a href="https://www.youtube.com/" class="social_link">
                  <img src="<?= B_IMG_DIR ?>/youtube.svg" class="img-svg" />
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <?php get_footer(); ?>
    <?php wp_footer(); ?>
  </body>
</html>
