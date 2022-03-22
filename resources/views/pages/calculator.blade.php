@extends('index')

@section('head')
    {{--<title>{{ $page->seo_title }}</title>--}}
    {{--<meta name="keywords" content="{{ $page->seo_key }}">--}}
    {{--<meta name="description" content="{{ $page->seo_desc }}">--}}
    {{--@if($page->image)--}}
    {{--<meta property="og:image" content="{{ url($page->image) }}"/>--}}
    {{--<link rel="image_src" href="{{ url($page->image) }}"/>--}}
    {{--@endif--}}
    {{--<meta name="og:title" content="{{ $page->seo_title }}">--}}
    {{--<meta name="og:description" content="{{ $page->seo_desc }}">--}}
@endsection

@section('content')
	<section id="calc-final-popup">
		<div class="calc-final-content">
			<div class="calc-final-close">
				<svg class="default-svg">
					<use xlink:href="{{ asset('/img/svgdefs.svg#icon-cross') }}"
								xmlns:xlink="http://www.w3.org/1999/xlink"></use>
				</svg>
			</div>
			<div class="calc-final-icon">
				<svg>
					<use xlink:href="{{ asset('/img/svgdefs.svg#icon-checkbox') }}"
								xmlns:xlink="http://www.w3.org/1999/xlink"></use>
				</svg>
			</div>
			<div class="thanks">Спасибо!</div>
			<p>Ваш запрос принят в обработку! Наш менеджер свяжется с Вами в ближайшее время</p>
			<div class="button-ok">Ок</div>
		</div>
	</section>
	<section id="calculator">
		<div class="popup-calculator-error modal-popup">
			<div class="popup-overlay-calculator-error"></div>
			<div class="popup-wrapper">
				<div class="error-block">
					<svg class="popup-close">
						<use xlink:href="img/svgdefs.svg#icon-cross" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
					</svg>
					<div class="callback-text">
						<div class="check-box">
							<svg>
								<use xlink:href="img/svgdefs.svg#icon-balloon"
									 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
							</svg>
						</div>
						<h2>Ничего не найдено</h2>
						<p>Уточните параметры поиска, либо округлите значения</p>
						<button class="button-submit" type="submit">Ок</button>
					</div>
				</div>
			</div>
		</div>
		<div class="wrapper">
			{{ Breadcrumbs::render('single.first_page', "Калькулятор стоимости") }}
			<div class="title-box">
				<div class="title-content">
					<h1 class="title">Калькулятор</h1>
					<span>Рассчитать стоимость</span>
				</div>
				<span class="subtitle">Подбери себе станцию очистки за 2 минуты</span>
			</div>
			<div class="calculator-box">
				<div class="calc-step calc-step-active calc-step-1">
					<div class="step-header">1. Информация об источниках водоснабжения в Вашем доме</div>
					<div class="step-content">
						<div class="input-block">
							<div class="input-block-title">Количество жильцов в доме*</div>
							<div class="input-block-content">
								<svg class="input-icon">
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-peoples') }}"
												xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<div class="input-group">
									<input type="text" class="select-input" data-required="true" required>
									<span class="bar"></span>
									<div class="select-field">
											<svg class="top-icon top-icon1">
													<use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
																xmlns:xlink="http://www.w3.org/1999/xlink"></use>
											</svg>
											<svg class="bottom-icon bottom-icon1">
													<use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
																xmlns:xlink="http://www.w3.org/1999/xlink"></use>
											</svg>
									</div>
									<span class="error-field">Поле обязательно для заполнения</span>
                </div>
							</div>
						</div>

						<div class="input-block">
							<div class="input-block-title">Раковина на 30 литров</div>
							<div class="input-block-content">
								<svg class="input-icon">
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-kran') }}"
												xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<div class="input-group">
									<input type="text" class="select-input" required>
									<span class="bar"></span>
									<div class="select-field">
											<svg class="top-icon top-icon1">
													<use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
																xmlns:xlink="http://www.w3.org/1999/xlink"></use>
											</svg>
											<svg class="bottom-icon bottom-icon1">
													<use xlink:href="{{ asset('/dist//img/svgdefs.svg#icon-arrow-two') }}"
																xmlns:xlink="http://www.w3.org/1999/xlink"></use>
											</svg>
									</div>
									<span class="error-field">Ошибка</span>
                </div>
							</div>
						</div>

						<div class="input-block">
							<div class="input-block-title">Унитаз на 20 литров</div>
							<div class="input-block-content">
								<svg class="input-icon">
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-toilet') }}"
												xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<div class="input-group">
									<input type="text" class="select-input" value="0" required>
									<span class="bar"></span>
									<div class="select-field">
											<svg class="top-icon top-icon1">
													<use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}"
																xmlns:xlink="http://www.w3.org/1999/xlink"></use>
											</svg>
											<svg class="bottom-icon bottom-icon1">
													<use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}"
																xmlns:xlink="http://www.w3.org/1999/xlink"></use>
											</svg>
									</div>
									<span class="error-field">Ошибка</span>
                </div>
							</div>
						</div>

						<div class="input-block">
							<div class="input-block-title">Ванна до 200 литров</div>
							<div class="input-block-content">
								<svg class="input-icon">
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-vann2') }}"
												xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<div class="input-group">
									<input type="text" class="select-input" value="0" required>
									<span class="bar"></span>
									<div class="select-field">
											<svg class="top-icon top-icon1">
													<use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}"
																xmlns:xlink="http://www.w3.org/1999/xlink"></use>
											</svg>
											<svg class="bottom-icon bottom-icon1">
													<use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}"
																xmlns:xlink="http://www.w3.org/1999/xlink"></use>
											</svg>
									</div>
									<span class="error-field">Ошибка</span>
                </div>
							</div>
						</div>

						<div class="input-block">
							<div class="input-block-title">Ванна более 200 литров</div>
							<div class="input-block-content">
								<svg class="input-icon">
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-vann') }}"
												xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<div class="input-group">
									<input type="text" class="select-input" value="0" required>
									<span class="bar"></span>
									<div class="select-field">
											<svg class="top-icon top-icon1">
													<use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}"
																xmlns:xlink="http://www.w3.org/1999/xlink"></use>
											</svg>
											<svg class="bottom-icon bottom-icon1">
													<use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}"
																xmlns:xlink="http://www.w3.org/1999/xlink"></use>
											</svg>
									</div>
									<span class="error-field">Ошибка</span>
                </div>
							</div>
						</div>

						<div class="input-block">
							<div class="input-block-title">Душевая кабина</div>
							<div class="input-block-content">
								<svg class="input-icon">
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-shower') }}"
												xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<div class="input-group">
									<input type="text" class="select-input" value="0" required>
									<span class="bar"></span>
									<div class="select-field">
											<svg class="top-icon top-icon1">
													<use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}"
																xmlns:xlink="http://www.w3.org/1999/xlink"></use>
											</svg>
											<svg class="bottom-icon bottom-icon1">
													<use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}"
																xmlns:xlink="http://www.w3.org/1999/xlink"></use>
											</svg>
									</div>
									<span class="error-field">Ошибка</span>
                </div>
							</div>
						</div>
					</div>
					<div class="step-footer">
						<div class="step-footer-buttons">
							<div class="button-prev button-disabled">
								<svg class="default-svg">
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
												xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<svg class="hover-svg">
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
												xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
							</div>
							<div class="button-next button-disabled">
								<svg class="default-svg">
										<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
													xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<svg class="hover-svg">
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
												xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
							</div>
							<!--
							<div class="button-next button-error">
								<svg class="default-svg">
										<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
													xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<svg class="hover-svg">
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
												xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
							</div> -->
						</div>
						<div class="step-footer-progress">
							<span class="current-step">1</span>
							<span>/</span>
							<span class="all-steps">3</span>
						</div>
					</div>
				</div> 
				<div class="calc-step calc-step-2">
					<div class="step-header">2. Основная информация</div>
					<div class="step-content">
						<div class="input-block">
							<div class="input-block-title">Глубина выхода трубы*</div>
							<div class="input-block-content">
								<svg class="input-icon">
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-peoples') }}"
												xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<div class="input-group">
									<input type="text" class="select-input" data-required="true" data-prefix="см." required>
									<span class="bar"></span>
									<div class="select-field">
											<svg class="top-icon">
													<use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}"
																xmlns:xlink="http://www.w3.org/1999/xlink"></use>
											</svg>
											<svg class="bottom-icon">
													<use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}"
																xmlns:xlink="http://www.w3.org/1999/xlink"></use>
											</svg>
									</div>
									<span class="error-field">Поле обязательно для заполнения</span>
                </div>
							</div>
						</div>

						<div class="input-block">
							<div class="input-block-title">Расстояние от дома до станции*</div>
							<div class="input-block-content">
								<svg class="input-icon">
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-kran') }}"
												xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<div class="input-group">
									<input type="text" class="select-input" data-required="true" data-prefix="м." required>
									<span class="bar"></span>
									<div class="select-field">
											<svg class="top-icon">
													<use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}"
																xmlns:xlink="http://www.w3.org/1999/xlink"></use>
											</svg>
											<svg class="bottom-icon">
													<use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}"
																xmlns:xlink="http://www.w3.org/1999/xlink"></use>
											</svg>
									</div>
									<span class="error-field">Поле обязательно для заполнения</span>
                </div>
							</div>
						</div>

						<div class="input-block input-block-full-width">
							<div class="input-block-title">Перепад высоты между отметкой у дома и станцией очистки</div>
							<div class="input-block-content">
								<svg class="input-icon">
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-toilet') }}"
												xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<div class="input-group">
									<input type="text" class="select-input" data-prefix="см." required>
									<span class="bar"></span>
									<div class="select-field" data-step="10">
											<svg class="top-icon top-icon1">
													<use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}"
																xmlns:xlink="http://www.w3.org/1999/xlink"></use>
											</svg>
											<svg class="bottom-icon bottom-icon1">
													<use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}"
																xmlns:xlink="http://www.w3.org/1999/xlink"></use>
											</svg>
									</div>
									<span class="error-field">Ошибка</span>
                </div>
							</div>
						</div>

						<div class="input-block input-block-radio input-block-full-width">
							<div class="input-block-title">Способ отведения очищенной воды</div>
							<div class="input-block-content">
								<div class="radio1-input">
									<label class="type-button">
										<input type="radio" name="step-2">
										<div class="type-button-text">
												<div class="circle-outer"><div class="circle-inner"></div></div>
												<p>Самотечный</p>
										</div>
									</label>
								</div>
								<div class="radio1-input">
									<label class="type-button">
										<input type="radio" name="step-2">
										<div class="type-button-text">
												<div class="circle-outer"><div class="circle-inner"></div></div>
												<p>Принудительный</p>
										</div>
									</label>
								</div>
							</div>
						</div>
					</div>
					<div class="step-footer">
						<div class="step-footer-buttons">
							<div class="button-prev">
								<svg class="default-svg">
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
												xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<svg class="hover-svg">
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
												xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
							</div>
							<!--
							<div class="button-select-station button-select-station-disabled">
								Подобрать станцию очистки
							</div> -->
							<div class="button-select-station button-select-station-disabled">
								Подобрать станцию
							</div>
						</div>
						<div class="step-footer-progress">
							<span class="current-step">2</span>
							<span>/</span>
							<span class="all-steps">3</span>
						</div>
					</div>
				</div> 
				<div class="calc-step calc-step-3">
					<div class="step-header">3. Результат подбора</div>
					<div class="step-content">
						<div class="select-item-box">
							<div class="select-item-photo">
								<div><img class="lazy" data-src="{{ asset('/img/card/card-photos/photo1.png') }}" alt=""></div>
							</div>
							<div class="select-item-text">
								<h3>Биодека 3</h3>
								<span class="select-item-price">63 750 руб.</span>
								<p>Юнилос Астра 7 с самотечным способом отведения очищенной воды способна перерабатывать стоки от проживания семьи до 7 человек. Может устанавливаться при отсутствии грунтовых вод и расположения трубы, выходящей из дома на уровне 85 см и меньше от поверхности.</p>
								<p>Аналоги: <a href="#">Топас 8</a>, <a href="#">Топас-С 8</a></p>
								<div class="select-item-link-box">
									<a href="#" class="select-item-link">
										<span>Подробнее о системе</span>
										<div class="svg-box">
											<svg class="default-svg">
												<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
															xmlns:xlink="http://www.w3.org/1999/xlink"></use>
											</svg>
											<svg class="hover-svg">
												<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
															xmlns:xlink="http://www.w3.org/1999/xlink"></use>
											</svg>
										</div>
									</a>
								</div>
							</div>
						</div>
						<div class="select-item-connect">
							<h4>Связаться с нами</h4>
							<p>Результаты подбора станции очистки приблизительные, чтобы получить более точный ответ, заполните простую форму снизу, и наш менеджер свяжется с Вами в ближайшее время</p>
							<div class="select-item-inputs">
								<div class="input-group required">
									<input type="text" class="name-input" data-required="true" required>
									<span class="bar"></span>
									<label>Имя</label>
									<div class="required-field">*</div>
									<span class="error-field">Введите Ваше имя</span>
								</div>
								<div class="input-group required">
									<input type="text" class="phone-input" data-required="true" required>
									<span class="bar"></span>
									<label>Телефон</label>
									<div class="required-field">*</div>
									<span class="error-field">Введите Ваш телефон</span>
								</div>
							</div>
						</div>
					</div>
					<div class="step-footer">
						<div class="step-footer-buttons">
							<div class="select-item-button-submit">
								Отправить
							</div>
						</div>
						<div class="step-footer-progress">
							<span class="current-step">3</span>
							<span>/</span>
							<span class="all-steps">3</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

@section('script')
    <script>
        // $(document).ready(function () {
        //     $('#menu_7').addClass('active');
				// });
				
				// document.body.style.overflow = 'visible';
    </script>
@endsection