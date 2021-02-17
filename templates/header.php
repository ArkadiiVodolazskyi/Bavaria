
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

<div id="callback_form">

<?php echo do_shortcode( '[gravityform id=4 description=false ajax=true]' ); ?>

<button id="closeCallBack">
		<img src="<?= B_IMG_DIR ?>/cross2.svg" class="img-svg" />
	</button>

</div>

<?php
	// Viber links are different for mobile and desktop
	function isMobileDevice(){
		$aMobileUA = array(
				'/iphone/i' => 'iPhone',
				'/ipod/i' => 'iPod',
				'/ipad/i' => 'iPad',
				'/android/i' => 'Android',
				'/blackberry/i' => 'BlackBerry',
				'/webos/i' => 'Mobile'
		);

		//Return true if Mobile User Agent is detected
		foreach($aMobileUA as $sMobileKey => $sMobileOS){
				if(preg_match($sMobileKey, $_SERVER['HTTP_USER_AGENT'])){
						return true;
				}
		}
		//Otherwise return false..
		return false;
	}
?>

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

			<ul class="languages" data-wow-duration="1s">
				<?php pll_the_languages(array(
					'show_names'=>0,
					'hide_if_empty'=>0,
					'hide_current'=>1,
				)); ?>
			</ul>

			<div class="empty"></div>

			<div class="time">
				<p>
					<?= get_field('schedule', 'options'); ?>
				</p>
				<span>
					График работы
				</span>
			</div>

			<div class="arm_head_contact">
				<div class="contact">
						<a href="tel:<?= get_field('phones', 'options')[0]['number']; ?>" class="tel">
							<?= get_field('phones', 'options')[0]['number']; ?>
						</a>
						<img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />

					<div class="additional">

						<div class="arm_head_callback ">Обратный звонок</div>

						<ul class="">
							<?php while(have_rows('phones', 'options')): the_row(); ?>
								<li>
									<a href="tel:<?= get_sub_field('number'); ?>" class="phone">
										<?= get_sub_field('number'); ?>
									</a>
									<span class="text">
										<?= get_sub_field('workshop'); ?>
									</span>
								</li>
							<?php endwhile; ?>
						</ul>

						<ul class="type">
							<?php while(have_rows('phones', 'options')): the_row();
								$messengers = get_sub_field('messengers');
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
							<?php }; endwhile; ?>
						</ul>

					</div>

				</div>

			  <div class="arm_head_callback">Обратный звонок</div>


			</div>
			<ul class="social">
				<?php while(have_rows('social', 'options')): the_row(); ?>
					<li class="wow fadeInRight" data-wow-delay="<?= get_row_index()*0.2?>s">
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
					<li class="appear" style="transition-delay: <?= get_row_index()*0.1 + 0.1?>s">
						<a href="<?= get_sub_field('link')['url']; ?>">
							<?= get_sub_field('link')['title']; ?>
						</a>
					</li>
				<?php endwhile; ?>
			</ul>

			<div class="checkup navCheckupBtn">
				<button class="openConnect">Записаться на осмотр</button>
			</div>

			<button class="smallCheckupBtn">
				<img src="<?= B_IMG_DIR ?>/checkup.svg" class="img-svg" >
			</button>
		</div>
	</nav>
</header>


<div id="spinner">

	<div class="line_1"></div>
	<div class="line_2"></div>
	<div class="line_3"></div>

	<div class="text_wrapper">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 695.884 190.826" class="logo_text">
			<path xmlns="http://www.w3.org/2000/svg" d="M226,577.1H854v4H226Zm30.843-98.305h2.731a106.076,106.076,0,0,1,13.538.583,16.189,16.189,0,0,1,5.9,1.8,6.331,6.331,0,0,1,2.758,3.835,24.675,24.675,0,0,1,.872,7.444q0,7.969-3.748,10.615t-21,2.645H208.673V478.794h48.17Zm33.236,25.328q3.079-3.866,3.08-12.824,0-7.618-1.714-11.661a13.582,13.582,0,0,0-5.666-6.427,24.625,24.625,0,0,0-9.035-2.966,121.231,121.231,0,0,0-17.054-.873H197.924v86.6h59.732q23.475,0,30.912-4.3t7.438-15.815v-9.19q0-8.49-4.009-12.329a14.892,14.892,0,0,0-5.433-3.373,22.047,22.047,0,0,0-7.7-1.221q8.136-1.75,11.215-5.617Zm-8.193,14.657q3.777,2.938,3.777,13.112,0,8.608-3.922,11.4t-16.473,2.792h-56.6V515.843h56.6Q278.11,515.843,281.886,518.78Zm82.245-40.822,29.41,49.807H335.189Zm-45.219,78L329.9,536.9h68.885l11.346,19.064,11.366.013-50.318-86.6h-14.3l-50.2,86.6Zm150.8.015,48.053-86.6-12.237.013-42.806,77.386-42.617-77.4-12.144.008L456,555.972h13.713Zm91.957-78.014,29.411,49.807H532.727l10.392-17.884Zm-45.218,78L527.434,536.9h68.885l11.346,19.064,11.367.013-50.318-86.6H554.42l-50.2,86.6Zm199.456-74.225q3.805,2.937,3.806,11.6v4.129q0,8.783-3.806,11.661T700.48,512h-54.5v-33.21h54.5q11.62,0,15.427,2.938Zm-69.93,40.275h52.47a65.493,65.493,0,0,1,11.156.756,13.093,13.093,0,0,1,6.043,2.326q3.717,3.141,3.719,11.574v19.309h10.749V534.511q0-7.56-3.632-11.864t-10.662-5q8.6-1.919,11.912-5.583t3.312-11.69V489.96q0-11.811-6.741-16.2t-27.309-4.391H635.228v86.6h10.749V522.008Zm116.468-52.635H751.7v86.6h10.749v-86.6Zm74,8.585,29.41,49.807H807.5Zm-45.219,78L802.21,536.9h68.885l11.346,19.064,11.367.013-50.319-86.6h-14.3l-50.2,86.6Zm51.048,73.74q-3.99,2.674-16.5,2.674H795.883v20.69h-6.5v-52.4H825.77q12.444,0,16.47,2.656t4.026,9.8v6.862q0,7.038-3.995,9.712Zm-2.97-14.534q0-5.348-2.3-7.073t-9.369-1.725H795.883v20.093h31.746q7.03,0,9.351-1.689t2.321-7.107v-2.5Zm-85.024,37.9h-6.5V606.508H721.862v-5.841h58.325v5.841h-25.91v46.554Zm-48.112-24.139H658.739v24.139h-6.5v-52.4h6.5v22.556h47.426V600.667h6.5v52.4h-6.5V628.923ZM590.82,600.666h51.575v5.841H597.181v16.434h43.312v5.841H597.181v18.439h45.211v5.84H590.817v-52.4ZM577.1,652.3H517V600.121h6.9v46.273h46.309V600.121h6.9v46.273H584v13.783h-6.9Zm-74.521-2.264a15.252,15.252,0,0,1-6.5,2.851,40.81,40.81,0,0,1-5.063.6q-3.129.212-7.382.211h-17.4a67.135,67.135,0,0,1-12.463-.827,15.324,15.324,0,0,1-6.486-2.833,12.56,12.56,0,0,1-4.025-5.894,30.155,30.155,0,0,1-1.284-9.659V620.2a35.572,35.572,0,0,1,1.213-10.417,12.543,12.543,0,0,1,4.026-6.088,15.9,15.9,0,0,1,6.556-2.78,64.355,64.355,0,0,1,12.393-.88h17.473a66.359,66.359,0,0,1,12.339.845,15.886,15.886,0,0,1,6.7,2.868,12.06,12.06,0,0,1,3.867,5.876,32.1,32.1,0,0,1,1.283,9.941v14.6a32.118,32.118,0,0,1-1.266,9.923,12.32,12.32,0,0,1-3.978,5.946Zm-1.79-17.385V619.039a29.951,29.951,0,0,0-.44-6.07,8.758,8.758,0,0,0-1.529-3.361,8.627,8.627,0,0,0-4.324-2.885,26.091,26.091,0,0,0-7.77-.915h-23.66a27.275,27.275,0,0,0-7.84.862,8.268,8.268,0,0,0-4.254,2.938,8.979,8.979,0,0,0-1.582,3.589,34.625,34.625,0,0,0-.457,6.651v13.759a35.627,35.627,0,0,0,.44,6.774,8.5,8.5,0,0,0,1.6,3.465,8.619,8.619,0,0,0,4.325,2.886,26.076,26.076,0,0,0,7.769.915h23.66a27.239,27.239,0,0,0,7.84-.862,8.255,8.255,0,0,0,4.254-2.939,8.611,8.611,0,0,0,1.512-3.413,29.61,29.61,0,0,0,.457-6.017v-1.766Zm-92.31,20.409h-6.5V606.508h-25.91v-5.841h58.324v5.841h-25.91v46.554Zm-62.233,0h-36.14V600.667h37.371a73.441,73.441,0,0,1,10.318.527,14.9,14.9,0,0,1,5.467,1.795,8.22,8.22,0,0,1,3.428,3.889,18.78,18.78,0,0,1,1.037,7.056q0,5.419-1.864,7.759t-6.785,3.4a13.329,13.329,0,0,1,4.659.74,9.021,9.021,0,0,1,3.287,2.041q2.426,2.321,2.425,7.46v5.559q0,6.968-4.5,9.572t-18.7,2.6Zm12.85-32q2.268-1.6,2.267-6.422a14.916,14.916,0,0,0-.527-4.5,3.826,3.826,0,0,0-1.67-2.322,9.78,9.78,0,0,0-3.568-1.091,64.244,64.244,0,0,0-8.192-.352h-30.8v16.292h29.777q10.446,0,12.717-1.6Zm1.81,9.5q-2.285-1.776-10.054-1.777H316.61v18.3h34.242q7.593,0,9.967-1.69t2.373-6.9q0-6.155-2.286-7.933ZM288,641.52H246.326l-6.646,11.533-7.4.009,30.375-52.4H271.3l30.445,52.4-6.878-.008Zm-20.96-35.66L249.529,636h35.305Z" transform="translate(-196.924 -468.35)"/>
		</svg>
	</div>

</div>