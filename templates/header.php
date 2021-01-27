
<div id="overlay"></div>

<button id="closeOverlay">
	<img src="<?= B_IMG_DIR ?>/cross.svg" class="img-svg" />
</button>

<div id="expandedMenu">
	<div class="clients">
		<h5>
			<img src="<?= B_IMG_DIR ?>/single_line.svg" class="img-svg line" />
			Клиентам
			<button class="arrow">
				<img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
			</button>
		</h5>
		<ul>
			<li><a href="./pages/page-about_us.html">О нас</a></li>
			<li><a href="./pages/page-folio_main.html">Портфолио</a></li>
			<li><a href="./pages/page-blog_main.html">Блог</a></li>
			<li><a href="./pages/page-vacancies.html">Вакансии</a></li>
			<li><a href="./pages/page-contacts.html">Контакты</a></li>
		</ul>
	</div>
	<div class="services">
		<h5>
			<img src="<?= B_IMG_DIR ?>/single_line.svg" class="img-svg line" />
			Услуги
			<button class="arrow">
				<img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
			</button>
		</h5>
		<ul>
			<li><a href="./pages/page-services_inner.html">Диагностика</a></li>
			<li>
				<a href="./pages/page-services_inner.html"
					>Техническое обслуживание</a
				>
			</li>
			<li><a href="./pages/page-services_inner.html">Ремонт</a></li>
			<li><a href="./pages/page-services_malyarka.html">Малярка</a></li>
			<li><a href="./pages/page-services_deteiling.html">Детейлинг</a></li>
		</ul>
	</div>
	<ul class="contacts">
		<li>
			<img src="<?= B_IMG_DIR ?>/address.svg" class="img-svg" />
			<a href=""> Одесса, ул. Николая Троицкого, 1а </a>
		</li>
		<li>
			<img src="<?= B_IMG_DIR ?>/telegram.svg" class="img-svg" />
			<a href="office@bavaria.od.ua">office@bavaria.od.ua</a>
		</li>
		<li>
			<img src="<?= B_IMG_DIR ?>/time.svg" class="img-svg" />
			<span>Пн-Сб, 9:00-19:00</span>
		</li>
		<li>
			<div class="checkup openConnect">
				<button>Свяжитесь с нами</button>
			</div>
		</li>
		<li>
			<ul class="social">
				<li>
					<a href="https://www.instagram.com/" class="social_link">
						<img src="<?= B_IMG_DIR ?>/instagram.svg" class="img-svg" />
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
				<div class="phone">
					<a href="+38 048 794-56-54"> +38 048 794-56-54 </a>
					<div class="phone_first">
						<span>Ресепшн</span>
						<div class="phone_type">
							<img
								src="<?= B_IMG_DIR ?>/type_telegram.svg"
								class="img-svg native"
							/>
							<img
								src="<?= B_IMG_DIR ?>/type_viber.svg"
								class="img-svg native"
							/>
							<img
								src="<?= B_IMG_DIR ?>/type_whatsapp.svg"
								class="img-svg native"
							/>
						</div>
					</div>
				</div>

				<div class="phone">
					<div class="phone_first">
						<a href="+38 048 794-56-54"> +38 048 794-56-54 </a>
						<div class="phone_type"></div>
					</div>
					<span>Детейлинг</span>
				</div>

				<div class="phone">
					<div class="phone_first">
						<a href="+38 048 794-56-54"> +38 048 794-56-54 </a>
						<div class="phone_type"></div>
					</div>
					<span>Малярка</span>
				</div>
			</div>
		</li>
	</ul>

	<ul class="languages">
		<li>
			<img src="<?= B_IMG_DIR ?>/language.svg" class="img-svg" />
			<a href=""> На українській </a>
		</li>
	</ul>
</div>

<div id="connect_wrapper">
	<form id="connect_form">
		<h2>Свяжитесь с нами</h2>
		<input type="text" id="connect_name" placeholder="Ваше имя" />
		<input type="tel" id="connect_tel" placeholder="Номер телефона" />
		<textarea id="connect_msg" placeholder="Ваше сообщение"></textarea>
		<div class="checkup">
			<input
				id="connect_submit"
				type="submit"
				value="Отправить сообщение"
			/>
		</div>
	</form>
	<img src="<?= B_IMG_DIR ?>/connect_img.png" class="connect_img" />
	<img
		src="<?= B_IMG_DIR ?>/figures/figure_1.svg"
		class="img-svg native connect_figure"
	/>
	<button id="closeConnect">
		<img src="<?= B_IMG_DIR ?>/cross2.svg" class="img-svg" />
	</button>
</div>

<header>
	<div class="contacts">
		<div class="wrapper">
			<a href="./pages/page-main.html" class="logo_animate">
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
					src="./img_shared/icons/logo_text.svg"
					class="img-svg logo_text"
				/>
			</a>

			<button class="hamb_animate">
				<div class="line_1"></div>
				<div class="line_2"></div>
				<div class="line_3"></div>
			</button>

			<ul class="languages">
				<li>
					<a href=""> На українській </a>
				</li>
			</ul>

			<div class="empty" style="width: 10%"></div>

			<div class="time">
				<p>Пн-Сб, 9:00-19:00</p>
				<span>График работы</span>
			</div>

			<div class="contact">
				<p>
					<a href="+38 048 794-56-54" class="tel">+38 048 794-56-54</a>
					<img src="<?= B_IMG_DIR ?>/arrow.svg" class="img-svg" />
				</p>
				<span>Обратный звонок</span>
				<ul class="additional">
					<li>
						<ul class="type">
							<li>
								<img
									src="<?= B_IMG_DIR ?>/type_telegram.svg"
									class="img-svg native"
								/>
							</li>
							<li>
								<img
									src="<?= B_IMG_DIR ?>/type_viber.svg"
									class="img-svg native"
								/>
							</li>
							<li>
								<img
									src="<?= B_IMG_DIR ?>/type_whatsapp.svg"
									class="img-svg native"
								/>
							</li>
						</ul>
						<a href="+38 048 794-56-54" class="phone">+38 048 794-56-54</a>
						<span class="text">Ресепшн</span>
					</li>

					<li>
						<a href="+38 048 794-56-54" class="phone">+38 048 794-56-54</a>
						<span class="text">Детейлинг</span>
					</li>

					<li>
						<a href="+38 048 794-56-54" class="phone">+38 048 794-56-54</a>
						<span class="text">Малярка</span>
					</li>
				</ul>
			</div>

			<ul class="social">
				<li>
					<a href="https://www.instagram.com/" class="social_link">
						<img src="<?= B_IMG_DIR ?>/instagram.svg" class="img-svg" />
					</a>
				</li>
				<li>
					<a href="https://www.facebook.com/" class="social_link">
						<img src="<?= B_IMG_DIR ?>/facebook.svg" class="img-svg" />
					</a>
				</li>
			</ul>
		</div>
	</div>

	<nav>
		<div class="wrapper">
			<ul class="links">
				<li><a href="./pages/page-folio_main.html">Портфолио</a></li>
				<li><a href="./pages/page-services_inner.html">Диагностика</a></li>
				<li>
					<a href="./pages/page-services_inner.html"
						>Техническое обслуживание</a
					>
				</li>
				<li><a href="./pages/page-services_inner.html">Ремонт</a></li>
				<li><a href="./pages/page-services_malyarka.html">Малярка</a></li>
				<li>
					<a href="./pages/page-services_deteiling.html">Детейлинг</a>
				</li>
			</ul>

			<div id="navCheckupBtn" class="checkup">
				<button class="openConnect">Записаться на осмотр</button>
			</div>
		</div>
	</nav>
</header>



