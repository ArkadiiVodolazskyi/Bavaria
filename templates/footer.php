<footer>
	<div class="wrapper">
		<div class="copyright">
			<div class="logowrap">
				<a href="#" class="logo">
					<img src="<?= B_IMG_DIR ?>/logo.svg" class="img-svg native" />
				</a>
				<span class="slogan">
					<?= get_field('slogan', 'options'); ?>
				</span>
			</div>
			<div class="creators">
				<p>© Bavaria 2010 — <?= date('Y'); ?></p>
				<p>Создание сайта — DevPro</p>
			</div>
		</div>

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
				<img src="<?= B_IMG_DIR ?>/phone.svg" class="img-svg" />
				<div class="phone_list">
					<?php while(have_rows('contacts', 'options')): the_row();
								while(have_rows('phones')): the_row(); ?>
						<a href="tel:<?= get_sub_field('phone'); ?>">
							<?= get_sub_field('phone'); ?>
						</a>
					<?php endwhile; endwhile; ?>
				</div>
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
	</div>
</footer>