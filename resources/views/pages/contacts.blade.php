@extends('index')

@section('head')
    <title>{{ $page->title }}</title>
    <meta name="keywords" content="{{ $page->keywords }}">
    <meta name="description" content="{{ $page->description }}">
    @if($page->image)
        <meta property="og:image" content="{{ url($page->image) }}"/>
        <link rel="image_src" href="{{ url($page->image) }}"/>
	@else
		{!! $defaultOGImage !!}
	@endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="og:title" content="{{ $page->title }}">
    <meta name="og:description" content="{{ $page->description }}">
@endsection

@section('content')
	<!-- @include('elements.preloader') -->
	<section class="contact">
		<div class="wrapper">
			<div class="wrapper-short">
				{{ Breadcrumbs::render('single.first_page', "Контакты", route('contacts')) }}
			</div>
			<div class="wrapper-short">
				<div class="title-box">
					<div class="title-content">
						<h1 class="title">Контакты</h1>
						<span>Как с нами связаться ?</span>
					</div>
					<span class="subtitle">Компания локальных очистных сооружений является одной из ведущих специалистов в области продажи и монтажа автономной канализации для загородного дома</span>
				</div>
				<div class="text-desc">
					{!! $text !!}
				</div>
				<div class="contact-content" itemscope="" itemtype="http://schema.org/Organization">
					<meta itemprop="name" content="Септикдом">
					<div class="block">
						<div class="block-wrap">
							<div class="address" itemprop="address">
								<span itemscope itemtype="http://schema.org/PostalAddress">
									<h4>Адрес офиса:</h4>
									<p itemprop="streetAddress">{!! $contact->address !!}</p>
								</span>
							</div>
							<div class="work-time">
								<h4>График работы:</h4>
								<p>{{ $contact->schedule }}</p>
							</div>
							<div class="telephone {{ $contact->phone_class }}" >
								<meta itemprop="telephone" content="{{ $contact->phone }}">
								<h4>Телефон:</h4>
								<a  href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
							</div>
							<div class="email">
								<meta itemprop="email" content="{{ $contact->email }}">
								<h4>Email:</h4>
								<a href="mailto:{{ $contact->email }}" target="_blank">{{ $contact->email }}</a>
							</div>
							<div class="social">
								<h4>Мы в соцсетях:</h4>
								<div class="social-links">
									<a class="wa" href="{{ $contact->wa }}" target="_blank">
										<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512px" height="512px"><g><path d="M256.064,0h-0.128C114.784,0,0,114.816,0,256c0,56,18.048,107.904,48.736,150.048l-31.904,95.104l98.4-31.456    C155.712,496.512,204,512,256.064,512C397.216,512,512,397.152,512,256S397.216,0,256.064,0z M405.024,361.504    c-6.176,17.44-30.688,31.904-50.24,36.128c-13.376,2.848-30.848,5.12-89.664-19.264C189.888,347.2,141.44,270.752,137.664,265.792    c-3.616-4.96-30.4-40.48-30.4-77.216s18.656-54.624,26.176-62.304c6.176-6.304,16.384-9.184,26.176-9.184    c3.168,0,6.016,0.16,8.576,0.288c7.52,0.32,11.296,0.768,16.256,12.64c6.176,14.88,21.216,51.616,23.008,55.392    c1.824,3.776,3.648,8.896,1.088,13.856c-2.4,5.12-4.512,7.392-8.288,11.744c-3.776,4.352-7.36,7.68-11.136,12.352    c-3.456,4.064-7.36,8.416-3.008,15.936c4.352,7.36,19.392,31.904,41.536,51.616c28.576,25.44,51.744,33.568,60.032,37.024    c6.176,2.56,13.536,1.952,18.048-2.848c5.728-6.176,12.8-16.416,20-26.496c5.12-7.232,11.584-8.128,18.368-5.568    c6.912,2.4,43.488,20.48,51.008,24.224c7.52,3.776,12.48,5.568,14.304,8.736C411.2,329.152,411.2,344.032,405.024,361.504z"/></g></svg>
									</a>
									<a class="tele" href="{{ $contact->tg }}" target="_blank">
										<svg>
											<use xlink:href="{{ asset('/img/svgdefs.svg#icon-telegram') }}"
													xmlns:xlink="http://www.w3.org/1999/xlink"></use>
										</svg>
									</a>
									<a class="fb" href="{{ $contact->fb }}" target="_blank">
										<svg>
											<use xlink:href="img/svgdefs.svg#icon-facebook"
												 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
										</svg>
									</a>
									<a class="inst" href="{{ $contact->in }}" target="_blank">
										<svg>
											<use xlink:href="img/svgdefs.svg#icon-instagram"
												 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
										</svg>
									</a>
									<a class="vk" href="{{ $contact->vk }}" target="_blank">
										<svg>
											<use xlink:href="img/svgdefs.svg#icon-vk"
												 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
										</svg>
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="block">
						<div class="form">
							<div class="input-group">
								<input type="text" class="name-input" id="name-input-feedback-contact" required>
								<span class="bar"></span>
								<label>Имя*</label>
								<span class="error-field" id="name-error-feedback-contact"></span>
							</div>
							<div class="input-group">
								<input type="tel" class="phone-input" id="phone-input-feedback-contact" required>
								<span class="bar"></span>
								<label>Телефон*</label>
								<span class="error-field" id="phone-error-feedback-contact"></span>
							</div>
							<div class="input-group">
								<textarea name="message" placeholder="Сообщение" class="message-input message-input-feedback-contact" id="textarea-scroll"></textarea>
								<span class="bar"></span>
								<span class="error-field" id="message-error-feedback-contact"></span>
							</div>
							<button class="button-submit" type="submit" id="button-submit-feedback-contact">Отправить</button>
						</div>
					</div>
				</div>
				<div class="contact-map">
					<div class="frame-container">
						<iframe src="https://yandex.ru/map-widget/v1/-/CCUmuSr6pC" width="100%" height="400" frameborder="0" allowfullscreen="true"></iframe>
					</div>
				</div>
			</div>
		</div>

	</section>

@endsection

@section('script')
	<script>
        $('.ok-button').click(function () {
            $(".modal-popup .popup-close").click();
        });
        $('#button-submit-feedback-contact').click(function () {
            feedbackContact();
        });
        function feedbackContact() {
            var values = ['name', 'phone', 'message'];
            $.ajax({
                url: '/feedback',
                data: {
                    name: $("#name-input-feedback-contact").val(),
                    phone: $("#phone-input-feedback-contact").val(),
                    text: $(".message-input-feedback-contact").val()
                },
                type: 'post',
                success: function (data) {
                  location.href="https://septikdom.com/spasibo";
                    // $.each(values, function (key, value) {
                    //     $('#' + value + '-error-feedback-contact').html('');
                    //     $('#' + value + '-error-feedback-contact').parent().removeClass("error");
                    // });
                    // $('.modal-popup').addClass('popup-open');
                    // $('.thankyou-block-home').addClass('active');
                    // var timeOut = setTimeout(function () {
                    //     $('.modal-popup').removeClass('popup-open');
                    //     $('.thankyou-block-home').removeClass('active');
                    // }, 6000);
                    // $(document).mouseup(function (e) {
                    //     var div = $(".thankyou-block-home");
                    //     if (div.hasClass('active')) {
                    //         if (!div.is(e.target)
                    //             && div.has(e.target).length === 0) {
                    //             $('.modal-popup').removeClass('popup-open');
                    //             $('.thankyou-block-home').removeClass('active');
                    //             clearTimeout(timeOut)
                    //         }
                    //     }
                    //
                    // });
                    // $("#name-input-feedback-contact").val('');
                    // $("#phone-input-feedback-contact").val('');
                    // $(".message-input-feedback-contact").val('');
                },
                error: function (data) {
                    $.each(values, function (key, value) {
                        $('#' + value + '-error-feedback-contact').html('');
                        $('#' + value + '-error-feedback-contact').parent().removeClass("error");
                    });
                    $.each(data.responseJSON.errors, function (key, value) {
                        $('#' + key + '-error-feedback-contact').html(value);
                        $('#' + key + '-error-feedback-contact').parent().addClass("error");
                    });
                }
            })
        }
	</script>
@endsection
