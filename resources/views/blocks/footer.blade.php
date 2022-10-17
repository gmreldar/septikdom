<section id="fiveteen">
{{--	<img data-src="{{ asset('/img/bg-about.jpg') }}" alt="Img" class="bgi lazy-img">--}}
	<div class="wrapper">
		<h2>Узнайте точную стоимость всех работ за 1 минуту</h2>
		<p>Получите годовое обслуживание бесплатно при обращении сегодня! Позвоните прямо сейчас <a
					class="phone-number {{ $contact->phone_class }}">{{ $contact->phone }}</a> или Мы перезвоним сами. В течении 5 минут</p>
	</div>
</section>
<footer>
	<img data-src="{{ asset('/img/bg2.jpg') }}" alt="Img" class="bgi lazy-img">
	<div class="footer-wrap">
		<div class="form-box">
			<div class="wrapper">
				<div class="form">
					<div class="input-group">
						<input type="text" class="name-input" required id="name-input-feedback-footer">
						<span class="bar"></span>
						<label>Имя*</label>
						<span class="error-field" id="name-error-feedback-footer"></span>
					</div>
					<div class="input-group">
						<input type="tel" class="phone-input" required id="phone-input-feedback-footer">
						<span class="bar"></span>
						<label>Телефон*</label>
						<span class="error-field" id="phone-error-feedback-footer"></span>
					</div>
					<button class="button-submit" type="submit" id="button-submit-feedback-footer">Отправить</button>
				</div>
			</div>
		</div>
		<div class="wrapper">
			<div class="footer-content">
				<div class="footer-first-sec">
					<a href="{{ asset('/') }}" class="logo">
						<img class="lazy" data-src="{{ asset('/img/logo_footer.svg') }}" width="178" height="29" alt="Логотип">
					</a>
					<ul class="footer-menu-first">
						<li class="footer-menu-first-item">
							<svg class="footer-menu-first-item-icon">
								<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
									xmlns:xlink="http://www.w3.org/1999/xlink"></use>
							</svg>
							<a class="white-color" href="{!! route('privacy.policy') !!}">Политика конфиденциальности</a>
						</li>

					</ul>
				</div>
				<nav class="footer-menu">
					<ul>
						<div class="footer-item-wrap">
							<li class="footer-column-title">
								<svg>
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
										xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<span class="footer-title">О компании</span>
							</li>
							<li>
								<svg>
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
										xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<a href="{!! route('index') !!}">Главная</a>
							</li>
							<li>
								<svg>
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
										xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<a href="{!! route('about') !!}">О нас</a>
							</li>
							<li>
								<svg>
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
										xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<a href="{!! route('portfolio') !!}">Портфолио</a>
							</li>
							<li>
								<svg>
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
										xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<a href="{!! route('shipping') !!}">Доставка</a>
							</li>
							<li>
								<svg>
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
										xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<a href="{!! route('shipping') !!}">Оплата</a>
							</li>
							<li>
								<svg>
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
										xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<a href="{!! route('contacts') !!}">Контакты</a>
							</li>
						</div>
						<div class="footer-item-wrap">
							<li class="footer-column-title">
								<svg>
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
										xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<span class="footer-title">Информация</span>
							</li>
							<li>
								<svg>
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
										 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<a href="{!! route('pages.map') !!}">Карта выполненных работ</a>
							</li>
							<li>
								<svg>
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
										 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<a href="{!! route('faq') !!}">Часто задаваемые вопросы</a>
							</li>
							<li>
								<svg>
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
										 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<a href="{!! route('services') !!}">Услуги</a>
							</li>
							<li>
								<svg>
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
										xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<a href="{!! route('catalog') !!}">Каталог</a>
							</li>
							<li>
								<svg>
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
										xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<a href="{!! route('price') !!}">Прайс лист</a>
							</li>
							<li>
								<svg>
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
										xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<a href="{!! route('blog') !!}">Блог</a>
							</li>
							<li>
								<svg>
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
										xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<a href="{!! route('sitemap') !!}">Карта сайта</a>
							</li>
						</div>
						<div class="footer-item-wrap">
							<li class="footer-column-title">
								<svg>
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-phone') }}"
										xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<span class="footer-title">Контакты</span>
							</li>
							<li class="lh-contacts {{ $contact->phone_class }}">
								<a href="tel:{{ $contact->phone }}">
									<svg>
										<use xlink:href="{{ asset('/img/svgdefs.svg#icon-phone') }}"
											xmlns:xlink="http://www.w3.org/1999/xlink"></use>
									</svg>
									{{ $contact->phone }}
								</a>
							</li>
							<li class="lh-contacts">
								<a href="mailto:{{ $contact->email }}">
									<svg>
										<use xlink:href="{{ asset('/img/svgdefs.svg#icon-email') }}"
											xmlns:xlink="http://www.w3.org/1999/xlink"></use>
									</svg>
									{{ $contact->email }}
								</a>
							</li>
							<li class="lh-contacts">
								<a href="javascript: void(0);" class="work-grafik">
									<svg>
										<use xlink:href="{{ asset('/img/svgdefs.svg#icon-clock') }}"
											xmlns:xlink="http://www.w3.org/1999/xlink"></use>
									</svg>
									{{ $contact->schedule }}
								</a>
							</li>
						</div>
					</ul>
				</nav>
			</div>
			<div class="bottom-content">
				<p class="copyright">© 2012-{{ date('Y') }} Канализация в частном доме и на даче</p>
				<div class="social-links">
					<p>Присоединяйтесь к нам в социальных сетях:</p>
					<div class="social-links-inner">
						<a href="{{ $contact->wa }}" target="_blank">
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512px" height="512px"><g><path d="M256.064,0h-0.128C114.784,0,0,114.816,0,256c0,56,18.048,107.904,48.736,150.048l-31.904,95.104l98.4-31.456    C155.712,496.512,204,512,256.064,512C397.216,512,512,397.152,512,256S397.216,0,256.064,0z M405.024,361.504    c-6.176,17.44-30.688,31.904-50.24,36.128c-13.376,2.848-30.848,5.12-89.664-19.264C189.888,347.2,141.44,270.752,137.664,265.792    c-3.616-4.96-30.4-40.48-30.4-77.216s18.656-54.624,26.176-62.304c6.176-6.304,16.384-9.184,26.176-9.184    c3.168,0,6.016,0.16,8.576,0.288c7.52,0.32,11.296,0.768,16.256,12.64c6.176,14.88,21.216,51.616,23.008,55.392    c1.824,3.776,3.648,8.896,1.088,13.856c-2.4,5.12-4.512,7.392-8.288,11.744c-3.776,4.352-7.36,7.68-11.136,12.352    c-3.456,4.064-7.36,8.416-3.008,15.936c4.352,7.36,19.392,31.904,41.536,51.616c28.576,25.44,51.744,33.568,60.032,37.024    c6.176,2.56,13.536,1.952,18.048-2.848c5.728-6.176,12.8-16.416,20-26.496c5.12-7.232,11.584-8.128,18.368-5.568    c6.912,2.4,43.488,20.48,51.008,24.224c7.52,3.776,12.48,5.568,14.304,8.736C411.2,329.152,411.2,344.032,405.024,361.504z"/></g></svg>
						</a>
						<a href="{{ $contact->tg }}" target="_blank">
							<svg>
								<use xlink:href="{{ asset('/img/svgdefs.svg#icon-telegram') }}"
									 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
							</svg>
						</a>
						<a href="{{ $contact->yt }}" target="_blank">
							<svg>
								<use xlink:href="{{ asset('/img/svgdefs.svg#icon-youtube') }}"
									 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
							</svg>
						</a>
						<a href="{{ $contact->vk }}" target="_blank">
							<svg>
								<use xlink:href="{{ asset('/img/svgdefs.svg#icon-vk') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
							</svg>
						</a>
					</div>
				</div>
			</div>
		</div>
{{--		<div class="egc">--}}
{{--			<a class="egc-logo" href="https://egc.fi" target="_blank"><img alt="egc" src="https://api.egc.fi/EGC_watermark.svg" style="display: inline-block;height: .23em;stroke: currentColor;fill: white;stroke-width: 0;font-size: 10rem;"></a>--}}
{{--		</div>--}}
	</div>
	<div class="footer-modal-wrap requisites-modal">
		<div class="footer-modal">
			<div class="footer-modal-top">
				<div class="footer-modal-top-close" id="requisites-modal-close-cross">
					<svg class="footer-modal-top-close-icon">
						<use xlink:href="{{ asset('/img/svgdefs.svg#icon-cross') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
					</svg>
				</div>
			</div>
			<div class="footer-modal-content">
				<h3 class="footer-modal-content-title">Реквиизты ООО «Экосеть»</h3>
				<ul class="footer-modal-content-list">
					<li class="footer-modal-content-list-item">
						<svg class="footer-modal-content-list-item-icon">
							<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
								xmlns:xlink="http://www.w3.org/1999/xlink"></use>
						</svg>
						<span class="footer-modal-content-list-item-text">Название организации ООО «Экосеть»</span>
					</li>
					<li class="footer-modal-content-list-item">
						<svg class="footer-modal-content-list-item-icon">
							<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
								xmlns:xlink="http://www.w3.org/1999/xlink"></use>
						</svg>
						<span class="footer-modal-content-list-item-text">ИНН 7811638132</span>
					</li>
					<li class="footer-modal-content-list-item">
						<svg class="footer-modal-content-list-item-icon">
							<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
								xmlns:xlink="http://www.w3.org/1999/xlink"></use>
						</svg>
						<span class="footer-modal-content-list-item-text">КПП 781101001</span>
					</li>
					<li class="footer-modal-content-list-item">
						<svg class="footer-modal-content-list-item-icon">
							<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
								xmlns:xlink="http://www.w3.org/1999/xlink"></use>
						</svg>
						<span class="footer-modal-content-list-item-text">ОГРН 1177847061732</span>
					</li>
					<li class="footer-modal-content-list-item">
						<svg class="footer-modal-content-list-item-icon">
							<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
								xmlns:xlink="http://www.w3.org/1999/xlink"></use>
						</svg>
						<span class="footer-modal-content-list-item-text">Юридический адрес 193079, г. Санкт-Петербург, проспект Большевиков, дом 79, корпус 4, литера А, помещение 4-Н</span>
					</li>
					<li class="footer-modal-content-list-item">
						<svg class="footer-modal-content-list-item-icon">
							<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
								xmlns:xlink="http://www.w3.org/1999/xlink"></use>
						</svg>
						<span class="footer-modal-content-list-item-text">Фактический адрес 196158, г. Санкт-Петербург, Московское шоссе 25 к 1 оф 813</span>
					</li>
				</ul>
			</div>
			<div class="footer-modal-nav">
				<button class="footer-modal-nav-button" id="requisites-modal-close-btn">Закрыть</button>
			</div>
		</div>
	</div>
	<div class="footer-modal-wrap privacy-policy-modal">
		<div class="footer-modal">
			<div class="footer-modal-top">
				<div class="footer-modal-top-close" id="privacy-policy-modal-close-cross">
					<svg class="footer-modal-top-close-icon">
						<use xlink:href="{{ asset('/img/svgdefs.svg#icon-cross') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
					</svg>
				</div>
			</div>
			<div class="footer-modal-content">
				<h3 class="footer-modal-content-title">Политика конфиденциальности персональных данных</h3>
				<p class="footer-modal-content-p">Настоящая Политика конфиденциальности персональных данных (далее – Политика конфиденциальности) действует в отношении всей информации, которую сайт <strong>Системы автономной канализации "Septikdom"</strong>, (далее – Сайт) расположенный на доменном имени <strong>septikdom.ru</strong> (а также его субдоменах), может получить о Пользователе во время использования сайта <strong>septikdom.ru</strong> (а также его субдоменов), его программ и его продуктов.</p>
				<ol class="footer-modal-content-list ordered">
					<li class="footer-modal-content-list-item">
						<div class="footer-modal-content-list-item-container">
							<span class="footer-modal-content-list-item-num">1.</span>
							<span class="footer-modal-content-list-item-text">Определение терминов</span>
						</div>
						<ol class="footer-modal-content-list ordered">
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">1.1.</span>
									<span class="footer-modal-content-list-item-text">В настоящей Политике конфиденциальности используются следующие термины:</span>
								</div>
								<ol class="footer-modal-content-list ordered">
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">1.1.1.</span>
											<span class="footer-modal-content-list-item-text">«Администрация сайта» (далее – Администрация) – уполномоченные сотрудники на управление сайтом Системы автономной канализации "Septikdom", действующие от имени ООО "Экосеть", которые организуют и (или) осуществляют обработку персональных данных, а также определяет цели обработки персональных данных, состав персональных данных, подлежащих обработке, действия (операции), совершаемые с персональными данными.</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">1.1.2.</span>
											<span class="footer-modal-content-list-item-text">«Персональные данные» - любая информация, относящаяся к прямо или косвенно определенному, или определяемому физическому лицу (субъекту персональных данных).</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">1.1.3.</span>
											<span class="footer-modal-content-list-item-text">«Обработка персональных данных» - любое действие (операция) или совокупность действий (операций), совершаемых с использованием средств автоматизации или без использования таких средств с персональными данными, включая сбор, запись, систематизацию, накопление, хранение, уточнение (обновление, изменение), извлечение, использование, передачу (распространение, предоставление, доступ), обезличивание, блокирование, удаление, уничтожение персональных данных.</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">1.1.4.</span>
											<span class="footer-modal-content-list-item-text">«Конфиденциальность персональных данных» - обязательное для соблюдения Оператором или иным получившим доступ к персональным данным лицом требование не допускать их распространения без согласия субъекта персональных данных или наличия иного законного основания.</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">1.1.5.</span>
											<span class="footer-modal-content-list-item-text">«Сайт Системы автономной канализации "Septikdom"» - это совокупность связанных между собой веб-страниц, размещенных в сети Интернет по уникальному адресу (URL): septikdom.ru, а также его субдоменах.</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">1.1.6.</span>
											<span class="footer-modal-content-list-item-text">«Субдомены» - это страницы или совокупность страниц, расположенные на доменах третьего уровня, принадлежащие сайту Системы автономной канализации "Septikdom", а также другие временные страницы, внизу который указана контактная информация Администрации.</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">1.1.7.</span>
											<span class="footer-modal-content-list-item-text">«Пользователь сайта Системы автономной канализации "Septikdom" » (далее Пользователь) – лицо, имеющее доступ к сайту Системы автономной канализации "Septikdom", посредством сети Интернет и использующее информацию, материалы и продукты сайта Системы автономной канализации "Septikdom".</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">1.1.8.</span>
											<span class="footer-modal-content-list-item-text">«Cookies» — небольшой фрагмент данных, отправленный веб-сервером и хранимый на компьютере пользователя, который веб-клиент или веб-браузер каждый раз пересылает веб-серверу в HTTP-запросе при попытке открыть страницу соответствующего сайта.</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">1.1.9.</span>
											<span class="footer-modal-content-list-item-text">«IP-адрес» — уникальный сетевой адрес узла в компьютерной сети, через который Пользователь получает доступ на Сайт.</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">1.1.10.</span>
											<span class="footer-modal-content-list-item-text">«Товар» - продукт, который Пользователь заказывает на сайте и оплачивает через платёжные системы.</span>
										</div>
									</li>
								</ol>
							</li>
						</ol>
					</li>
				</ol>
				<ol class="footer-modal-content-list ordered">
					<li class="footer-modal-content-list-item">
						<div class="footer-modal-content-list-item-container">
							<span class="footer-modal-content-list-item-num">2.</span>
							<span class="footer-modal-content-list-item-text">Общие положения</span>
						</div>
						<ol class="footer-modal-content-list ordered">
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">2.1.</span>
									<span class="footer-modal-content-list-item-text">Использование сайта Системы автономной канализации "Septikdom" Пользователем означает согласие с настоящей Политикой конфиденциальности и условиями обработки персональных данных Пользователя.</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">2.2.</span>
									<span class="footer-modal-content-list-item-text">В случае несогласия с условиями Политики конфиденциальности Пользователь должен прекратить использование сайта Системы автономной канализации "Septikdom".</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">2.3.</span>
									<span class="footer-modal-content-list-item-text">Настоящая Политика конфиденциальности применяется к сайту Системы автономной канализации "Septikdom". Сайт не контролирует и не несет ответственность за сайты третьих лиц, на которые Пользователь может перейти по ссылкам, доступным на сайте Системы автономной канализации "Septikdom".</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">2.4.</span>
									<span class="footer-modal-content-list-item-text">Администрация не проверяет достоверность персональных данных, предоставляемых Пользователем.</span>
								</div>
							</li>
						</ol>
					</li>
					<li class="footer-modal-content-list-item">
						<div class="footer-modal-content-list-item-container">
							<span class="footer-modal-content-list-item-num">3.</span>
							<span class="footer-modal-content-list-item-text">Предмет политики конфиденциальности</span>
						</div>
						<ol class="footer-modal-content-list ordered">
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">3.1.</span>
									<span class="footer-modal-content-list-item-text">Настоящая Политика конфиденциальности устанавливает обязательства Администрации по неразглашению и обеспечению режима защиты конфиденциальности персональных данных, которые Пользователь предоставляет по запросу Администрации при регистрации на сайте Системы автономной канализации "Septikdom", при подписке на информационную e-mail рассылку или при оформлении заказа.</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">3.2.</span>
									<span class="footer-modal-content-list-item-text">Персональные данные, разрешённые к обработке в рамках настоящей Политики конфиденциальности, предоставляются Пользователем путём заполнения форм на сайте Системы автономной канализации "Septikdom" и включают в себя следующую информацию:</span>
								</div>
								<ol class="footer-modal-content-list ordered">
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">3.2.1.</span>
											<span class="footer-modal-content-list-item-text">фамилию, имя, отчество Пользователя;</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">3.2.2</span>
											<span class="footer-modal-content-list-item-text">контактный телефон Пользователя;</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">3.2.3</span>
											<span class="footer-modal-content-list-item-text">адрес электронной почты (e-mail)</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">3.2.4.</span>
											<span class="footer-modal-content-list-item-text">место жительство Пользователя (при необходимости)</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">3.2.5.</span>
											<span class="footer-modal-content-list-item-text">адрес доставки Товара (при необходимости)</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">3.2.6.</span>
											<span class="footer-modal-content-list-item-text">фотографию (при необходимости).</span>
										</div>
									</li>
								</ol>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">3.3.</span>
									<span class="footer-modal-content-list-item-text">Сайт защищает Данные, которые автоматически передаются при посещении страниц:
										<br>- IP адрес;
										<br>- информация из cookies;
										<br>- информация о браузере
										<br>- время доступа;
										<br>- реферер (адрес предыдущей страницы).</span>
								</div>
									<ol class="footer-modal-content-list ordered">
										<li class="footer-modal-content-list-item lv-3">
											<div class="footer-modal-content-list-item-container">
												<span class="footer-modal-content-list-item-num">3.3.1.</span>
												<span class="footer-modal-content-list-item-text">Отключение cookies может повлечь невозможность доступа к частям сайта , требующим авторизации.</span>
											</div>
										</li>
										<li class="footer-modal-content-list-item lv-3">
											<div class="footer-modal-content-list-item-container">
												<span class="footer-modal-content-list-item-num">3.3.2</span>
												<span class="footer-modal-content-list-item-text">Сайт осуществляет сбор статистики об IP-адресах своих посетителей. Данная информация используется с целью предотвращения, выявления и решения технических проблем.</span>
											</div>
										</li>
									</ol>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">3.4.</span>
									<span class="footer-modal-content-list-item-text">Любая иная персональная информация неоговоренная выше (история посещения, используемые браузеры, операционные системы и т.д.) подлежит надежному хранению и нераспространению, за исключением случаев, предусмотренных в п.п. 5.2. и 5.3. настоящей Политики конфиденциальности.</span>
								</div>
							</li>
						</ol>
					</li>
				</ol>
				<ol class="footer-modal-content-list ordered">
					<li class="footer-modal-content-list-item">
						<div class="footer-modal-content-list-item-container">
							<span class="footer-modal-content-list-item-num">4.</span>
							<span class="footer-modal-content-list-item-text">Цели сбора персональной информации пользователя</span>
						</div>
						<ol class="footer-modal-content-list ordered">
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">4.1.</span>
									<span class="footer-modal-content-list-item-text">Персональные данные Пользователя Администрация может использовать в целях:</span>
								</div>
								<ol class="footer-modal-content-list ordered">
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">4.1.1.</span>
											<span class="footer-modal-content-list-item-text">Идентификации Пользователя, зарегистрированного на сайте Системы автономной канализации "Septikdom" для его дальнейшей авторизации, оформления заказа и других действий.</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">4.1.2</span>
											<span class="footer-modal-content-list-item-text">Предоставления Пользователю доступа к персонализированным данным сайта Системы автономной канализации "Septikdom".</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">4.1.3</span>
											<span class="footer-modal-content-list-item-text">Установления с Пользователем обратной связи, включая направление уведомлений, запросов, касающихся использования сайта Системы автономной канализации "Septikdom", оказания услуг и обработки запросов и заявок от Пользователя.</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">4.1.4.</span>
											<span class="footer-modal-content-list-item-text">Определения места нахождения Пользователя для обеспечения безопасности, предотвращения мошенничества.</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">4.1.5.</span>
											<span class="footer-modal-content-list-item-text">Подтверждения достоверности и полноты персональных данных, предоставленных Пользователем.</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">4.1.6.</span>
											<span class="footer-modal-content-list-item-text">Создания учетной записи для использования частей сайта Системы автономной канализации "Septikdom", если Пользователь дал согласие на создание учетной записи.</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">4.1.7.</span>
											<span class="footer-modal-content-list-item-text">Уведомления Пользователя по электронной почте.</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">4.1.8.</span>
											<span class="footer-modal-content-list-item-text">Предоставления Пользователю эффективной технической поддержки при возникновении проблем, связанных с использованием сайта Системы автономной канализации "Septikdom".</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">4.1.9.</span>
											<span class="footer-modal-content-list-item-text">Предоставления Пользователю с его согласия специальных предложений, информации о ценах, новостной рассылки и иных сведений от имени сайта Системы автономной канализации "Septikdom".</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">4.1.10.</span>
											<span class="footer-modal-content-list-item-text">Осуществления рекламной деятельности с согласия Пользователя.</span>
										</div>
									</li>
								</ol>
							</li>
						</ol>
					</li>
				</ol>
				<ol class="footer-modal-content-list ordered">
					<li class="footer-modal-content-list-item">
						<div class="footer-modal-content-list-item-container">
							<span class="footer-modal-content-list-item-num">5.</span>
							<span class="footer-modal-content-list-item-text">Способы и сроки обработки персональной информации</span>
						</div>
						<ol class="footer-modal-content-list ordered">
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">5.1.</span>
									<span class="footer-modal-content-list-item-text">Обработка персональных данных Пользователя осуществляется без ограничения срока, любым законным способом, в том числе в информационных системах персональных данных с использованием средств автоматизации или без использования таких средств.</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">5.2.</span>
									<span class="footer-modal-content-list-item-text">Пользователь соглашается с тем, что Администрация вправе передавать персональные данные третьим лицам, в частности, курьерским службам, организациями почтовой связи (в том числе электронной), операторам электросвязи, исключительно в целях выполнения заказа Пользователя, оформленного на сайте Системы автономной канализации "Septikdom", включая доставку Товара, документации или e-mail сообщений.</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">5.3.</span>
									<span class="footer-modal-content-list-item-text">Персональные данные Пользователя могут быть переданы уполномоченным органам государственной власти Российской Федерации только по основаниям и в порядке, установленным законодательством Российской Федерации.</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">5.4.</span>
									<span class="footer-modal-content-list-item-text">При утрате или разглашении персональных данных Администрация вправе не информировать Пользователя об утрате или разглашении персональных данных.</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">5.5.</span>
									<span class="footer-modal-content-list-item-text">Администрация принимает необходимые организационные и технические меры для защиты персональной информации Пользователя от неправомерного или случайного доступа, уничтожения, изменения, блокирования, копирования, распространения, а также от иных неправомерных действий третьих лиц.</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">5.6.</span>
									<span class="footer-modal-content-list-item-text">Администрация совместно с Пользователем принимает все необходимые меры по предотвращению убытков или иных отрицательных последствий, вызванных утратой или разглашением персональных данных Пользователя.</span>
								</div>
							</li>
						</ol>
					</li>
				</ol>
				<ol class="footer-modal-content-list ordered">
					<li class="footer-modal-content-list-item">
						<div class="footer-modal-content-list-item-container">
							<span class="footer-modal-content-list-item-num">6.</span>
							<span class="footer-modal-content-list-item-text">Права и обязанности сторон</span>
						</div>
						<ol class="footer-modal-content-list ordered">
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">6.1.</span>
									<span class="footer-modal-content-list-item-text">Пользователь вправе:</span>
								</div>
								<ol class="footer-modal-content-list ordered">
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">6.1.1.</span>
											<span class="footer-modal-content-list-item-text">Принимать свободное решение о предоставлении своих персональных данных, необходимых для использования сайта Системы автономной канализации "Septikdom", и давать согласие на их обработку.</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">6.1.2</span>
											<span class="footer-modal-content-list-item-text">Обновить, дополнить предоставленную информацию о персональных данных в случае изменения данной информации.</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">6.1.3</span>
											<span class="footer-modal-content-list-item-text">Пользователь имеет право на получение у Администрации информации, касающейся обработки его персональных данных, если такое право не ограничено в соответствии с федеральными законами. Пользователь вправе требовать от Администрации уточнения его персональных данных, их блокирования или уничтожения в случае, если персональные данные являются неполными, устаревшими, неточными, незаконно полученными или не являются необходимыми для заявленной цели обработки, а также принимать предусмотренные законом меры по защите своих прав.</span>
										</div>
									</li>
								</ol>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">6.2.</span>
									<span class="footer-modal-content-list-item-text">Администрация обязана:</span>
								</div>
								<ol class="footer-modal-content-list ordered">
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">6.2.1.</span>
											<span class="footer-modal-content-list-item-text">Использовать полученную информацию исключительно для целей, указанных в п. 4 настоящей Политики конфиденциальности.</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">6.2.2</span>
											<span class="footer-modal-content-list-item-text">Обеспечить хранение конфиденциальной информации в тайне, не разглашать без предварительного письменного разрешения Пользователя, а также не осуществлять продажу, обмен, опубликование, либо разглашение иными возможными способами переданных персональных данных Пользователя, за исключением п.п. 5.2 и 5.3. настоящей Политики Конфиденциальности.</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">6.2.3</span>
											<span class="footer-modal-content-list-item-text">Принимать меры предосторожности для защиты конфиденциальности персональных данных Пользователя согласно порядку, обычно используемого для защиты такого рода информации в существующем деловом обороте.</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">6.2.4</span>
											<span class="footer-modal-content-list-item-text">Осуществить блокирование персональных данных, относящихся к соответствующему Пользователю, с момента обращения или запроса Пользователя, или его законного представителя либо уполномоченного органа по защите прав субъектов персональных данных на период проверки, в случае выявления недостоверных персональных данных или неправомерных действий.</span>
										</div>
									</li>
								</ol>
							</li>
						</ol>
					</li>
				</ol>
				<ol class="footer-modal-content-list ordered">
					<li class="footer-modal-content-list-item">
						<div class="footer-modal-content-list-item-container">
							<span class="footer-modal-content-list-item-num">7.</span>
							<span class="footer-modal-content-list-item-text">Ответственность сторон</span>
						</div>
						<ol class="footer-modal-content-list ordered">
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">7.1.</span>
									<span class="footer-modal-content-list-item-text">Администрация, не исполнившая свои обязательства, несёт ответственность за убытки, понесённые Пользователем в связи с неправомерным использованием персональных данных, в соответствии с законодательством Российской Федерации, за исключением случаев, предусмотренных п.п. 5.2., 5.3. и 7.2. настоящей Политики Конфиденциальности.</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">7.2.</span>
									<span class="footer-modal-content-list-item-text">В случае утраты или разглашения Конфиденциальной информации Администрация не несёт ответственность, если данная конфиденциальная информация:</span>
								</div>
								<ol class="footer-modal-content-list ordered">
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">7.2.1.</span>
											<span class="footer-modal-content-list-item-text">Стала публичным достоянием до её утраты или разглашения.</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">7.2.2</span>
											<span class="footer-modal-content-list-item-text">Была получена от третьей стороны до момента её получения Администрацией Ресурса.</span>
										</div>
									</li>
									<li class="footer-modal-content-list-item lv-3">
										<div class="footer-modal-content-list-item-container">
											<span class="footer-modal-content-list-item-num">7.2.3</span>
											<span class="footer-modal-content-list-item-text">Была разглашена с согласия Пользователя.</span>
										</div>
									</li>
								</ol>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">7.3.</span>
									<span class="footer-modal-content-list-item-text">Пользователь несет полную ответственность за соблюдение требований законодательства РФ, в том числе законов о рекламе, о защите авторских и смежных прав, об охране товарных знаков и знаков обслуживания, но не ограничиваясь перечисленным, включая полную ответственность за содержание и форму материалов.</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">7.4.</span>
									<span class="footer-modal-content-list-item-text">Пользователь признает, что ответственность за любую информацию (в том числе, но не ограничиваясь: файлы с данными, тексты и т. д.), к которой он может иметь доступ как к части сайта Системы автономной канализации "Septikdom", несет лицо, предоставившее такую информацию.</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">7.5.</span>
									<span class="footer-modal-content-list-item-text">Пользователь соглашается, что информация, предоставленная ему как часть сайта Системы автономной канализации "Septikdom", может являться объектом интеллектуальной собственности, права на который защищены и принадлежат другим Пользователям, партнерам или рекламодателям, которые размещают такую информацию на сайте Системы автономной канализации "Septikdom".</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">7.6.</span>
									<span class="footer-modal-content-list-item-text">Пользователь не вправе вносить изменения, передавать в аренду, передавать на условиях займа, продавать, распространять или создавать производные работы на основе такого Содержания (полностью или в части), за исключением случаев, когда такие действия были письменно прямо разрешены собственниками такого Содержания в соответствии с условиями отдельного соглашения.</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">7.7.</span>
									<span class="footer-modal-content-list-item-text">В отношение текстовых материалов (статей, публикаций, находящихся в свободном публичном доступе на сайте Системы автономной канализации "Septikdom") допускается их распространение при условии, что будет дана ссылка на Сайт.</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">7.8.</span>
									<span class="footer-modal-content-list-item-text">Администрация не несет ответственности перед Пользователем за любой убыток или ущерб, понесенный Пользователем в результате удаления, сбоя или невозможности сохранения какого-либо Содержания и иных коммуникационных данных, содержащихся на сайте Системы автономной канализации "Septikdom" или передаваемых через него.</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">7.9.</span>
									<span class="footer-modal-content-list-item-text">Администрация не несет ответственности за любые прямые или косвенные убытки, произошедшие из-за: использования либо невозможности использования сайта, либо отдельных сервисов; несанкционированного доступа к коммуникациям Пользователя; заявления или поведение любого третьего лица на сайте.</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">7.10.</span>
									<span class="footer-modal-content-list-item-text">Администрация не несет ответственность за какую-либо информацию, размещенную пользователем на сайте Системы автономной канализации "Septikdom", включая, но не ограничиваясь: информацию, защищенную авторским правом, без прямого согласия владельца авторского права.</span>
								</div>
							</li>
						</ol>
					</li>
				</ol>
				<ol class="footer-modal-content-list ordered">
					<li class="footer-modal-content-list-item">
						<div class="footer-modal-content-list-item-container">
							<span class="footer-modal-content-list-item-num">8.</span>
							<span class="footer-modal-content-list-item-text">Разрешение споров</span>
						</div>
						<ol class="footer-modal-content-list ordered">
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">8.1.</span>
									<span class="footer-modal-content-list-item-text">До обращения в суд с иском по спорам, возникающим из отношений между Пользователем и Администрацией, обязательным является предъявление претензии (письменного предложения или предложения в электронном виде о добровольном урегулировании спора).</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">8.2.</span>
									<span class="footer-modal-content-list-item-text">Получатель претензии в течение 30 календарных дней со дня получения претензии, письменно или в электронном виде уведомляет заявителя претензии о результатах рассмотрения претензии.</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">8.3.</span>
									<span class="footer-modal-content-list-item-text">При не достижении соглашения спор будет передан на рассмотрение Арбитражного суда г. Санкт-Петербуг.</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">8.4.</span>
									<span class="footer-modal-content-list-item-text">К настоящей Политике конфиденциальности и отношениям между Пользователем и Администрацией применяется действующее законодательство Российской Федерации.</span>
								</div>
							</li>
						</ol>
					</li>
				</ol>
				<ol class="footer-modal-content-list ordered">
					<li class="footer-modal-content-list-item">
						<div class="footer-modal-content-list-item-container">
							<span class="footer-modal-content-list-item-num">9.</span>
							<span class="footer-modal-content-list-item-text">Дополнительные условия</span>
						</div>
						<ol class="footer-modal-content-list ordered">
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">9.1.</span>
									<span class="footer-modal-content-list-item-text">Администрация вправе вносить изменения в настоящую Политику конфиденциальности без согласия Пользователя.</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
								<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">9.2.</span>
									<span class="footer-modal-content-list-item-text">Новая Политика конфиденциальности вступает в силу с момента ее размещения на сайте Системы автономной канализации "Septikdom", если иное не предусмотрено новой редакцией Политики конфиденциальности.</span>
								</div>
							</li>
							<li class="footer-modal-content-list-item lv-2">
							<div class="footer-modal-content-list-item-container">
									<span class="footer-modal-content-list-item-num">9.3.</span>
									<span class="footer-modal-content-list-item-text">Все предложения или вопросы касательно настоящей Политики конфиденциальности следует сообщать по адресу:
										<br><a class="footer-modal-content-list-item-link" href="mailto:info@septikdom.ru">info@septikdom.ru</a></span>
									</div>
							</li>
						</ol>
					</li>
				</ol>
				<p class="footer-modal-content-p">Обновлено: 31 Мая 2018 года</p>
				<p class="footer-modal-content-p">г. Санкт-Петербуг, ООО, Экосеть, ОГРН 1177847061732</p>
			</div>
			<div class="footer-modal-nav">
				<button class="footer-modal-nav-button" id="privacy-policy-modal-close-btn">Закрыть</button>
			</div>
		</div>
	</div>
</footer>
