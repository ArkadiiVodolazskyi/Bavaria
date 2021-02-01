
<div id="overlay"></div>

<button id="closeOverlay">
	<img src="<?= B_IMG_DIR ?>/cross.svg" class="img-svg" />
</button>

<div id="expandedMenu">
	<?php while(have_rows('footer_nav', 'options')): the_row(); ?>
		<div class="clients">
			<h5>
				<img
					src="<?= B_IMG_DIR ?>/single_line.svg"
					class="img-svg line"
				/>
					<?= get_sub_field('title'); ?>
				<button class="arrow">
					<img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
				</button>
			</h5>
			<ul>
				<?php while(have_rows('links')): the_row(); ?>
					<li><a href="<?= get_sub_field('link')['url']; ?>">
						<?= get_sub_field('link')['title']; ?>
					</a></li>
				<?php endwhile; ?>
			</ul>
		</div>
	<?php endwhile; ?>

	<ul class="contacts">
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
		<li>
			<div class="checkup openConnect">
				<button>Свяжитесь с нами</button>
			</div>
		</li>
		<li>
			<ul class="social">
				<?php while(have_rows('social', 'options')): the_row(); ?>
					<li>
						<a href="<?= get_sub_field('url'); ?>" class="social_link">
							<img src="<?= B_IMG_DIR ?>/<?= get_sub_field('type'); ?>.svg" class="img-svg" />
						</a>
					</li>
				<?php endwhile; ?>
			</ul>
		</li>
	</ul>

	<ul class="phones">
		<h5>
			<img src="<?= B_IMG_DIR ?>/single_line.svg" class="img-svg line" />
			Контакты
			<button class="arrow">
				<img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
			</button>
		</h5>
		<li>
			<img src="<?= B_IMG_DIR ?>/phone.svg" class="img-svg" />
			<div class="phone_list">

				<?php while(have_rows('phones', 'options')): the_row(); ?>
					<div class="phone">
						<a href="tel:<?= get_sub_field('number'); ?>">
							<?= get_sub_field('number'); ?>
						</a>
						<div class="phone_first">
							<span>
								<?= get_sub_field('workshop'); ?>
							</span>

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
					</div>
				<?php endwhile; ?>

			</div>
		</li>
	</ul>

	<ul class="languages">
		<img src="<?= B_IMG_DIR ?>/language.svg" class="img-svg" />
		<?php pll_the_languages(array(
			'show_names'=>0,
			'hide_if_empty'=>0,
			'hide_current'=>1,
		)); ?>
	</ul>
</div>

<div id="connect_wrapper">
	<h2>Свяжитесь с нами</h2>
	<?php echo do_shortcode( '[gravityform id=1 title=false description=false ajax=true]' ); ?>

	<img src="<?= B_IMG_DIR ?>/connect_img.png" class="connect_img" />
	<img
		src="<?= B_IMG_DIR ?>/figure_1.svg"
		class="img-svg native connect_figure"
	/>
	<button id="closeConnect">
		<img src="<?= B_IMG_DIR ?>/cross2.svg" class="img-svg" />
	</button>
</div>

<header>
	<div class="contacts">
		<div class="wrapper">
			<a href="<?= get_home_url(); ?>" class="logo_animate">
				<svg
					xmlns="http://www.w3.org/2000/svg"
					viewBox="35 24 87 169"
					class="line_1"
				>
					<path
						d="M42.26 0h43.105l-42.26 169.04H0z"
						transform="translate(36 24)"
					/>
				</svg>
				<svg
					xmlns="http://www.w3.org/2000/svg"
					viewBox="35 24 87 169"
					class="line_2"
				>
					<path
						d="M42.26 0h43.105l-42.26 169.04H0z"
						transform="translate(36 24)"
					/>
				</svg>
				<svg
					xmlns="http://www.w3.org/2000/svg"
					viewBox="35 24 87 169"
					class="line_3"
				>
					<path
						d="M42.26 0h43.105l-42.26 169.04H0z"
						transform="translate(36 24)"
					/>
				</svg>
				<img
					src="<?= B_IMG_DIR ?>/logo_text.svg"
					class="img-svg logo_text"
				/>
			</a>

			<button class="hamb_animate">
				<div class="line_1"></div>
				<div class="line_2"></div>
				<div class="line_3"></div>
			</button>

			<ul class="languages">
				<?php pll_the_languages(array(
					'show_names'=>0,
					'hide_if_empty'=>0,
					'hide_current'=>1,
				)); ?>
			</ul>

			<div class="empty" style="width: 10%"></div>

			<div class="time">
				<p>
					<?= get_field('schedule', 'options'); ?>
				</p>
				<span>График работы</span>
			</div>

			<div class="contact">
					<a href="tel:<?= get_field('phones', 'options')[0]['number']; ?>" class="tel">
						<?= get_field('phones', 'options')[0]['number']; ?>
					</a>
					<img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
				</p>
				<span>Обратный звонок</span>

				<ul class="additional">
					<?php while(have_rows('phones', 'options')): the_row(); ?>
						<li>
							<ul class="type">
								<?php $messengers = get_sub_field('messengers');
										foreach( $messengers as $messenger ): ?>
										<?php if ($messenger): ?>
											<li>
												<img
													src="<?= B_IMG_DIR ?>/type_<?= $messenger ?>.svg"
													class="img-svg native"
												/>
											</li>
										<?php endif; ?>
								<?php endforeach; ?>
							</ul>
							<a href="tel:<?= get_sub_field('number'); ?>" class="phone">
								<?= get_sub_field('number'); ?>
							</a>
							<span class="text">
								<?= get_sub_field('workshop'); ?>
							</span>
						</li>
					<?php endwhile; ?>
				</ul>

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

	<nav>
		<div class="wrapper">
			<ul class="links">
				<?php while(have_rows('header_nav', 'options')): the_row(); ?>
					<li><a href="<?= get_sub_field('link')['url']; ?>">
						<?= get_sub_field('link')['title']; ?>
					</a></li>
				<?php endwhile; ?>
			</ul>

			<div id="navCheckupBtn" class="checkup">
				<button class="openConnect">Записаться на осмотр</button>
			</div>
		</div>
	</nav>
</header>



