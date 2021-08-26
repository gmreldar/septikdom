@extends('index')

@section('head')
    <title>{{ $work->title }}</title>
    <meta name="keywords" content="{{ $work->keywords }}">
    <meta name="description" content="{{ $work->description }}">
    @if($work->image)
        <meta property="og:image" content="{{ url($work->image) }}"/>
        <link rel="image_src" href="{{ url($work->image) }}"/>
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="og:title" content="{{ $work->title }}">
    <meta name="og:description" content="{{ $work->description }}">
@endsection

@section('content')
	<section class="popup video-popup">
			<div class="popup-overlay"></div>
			<svg class="popup-close">
					<use xlink:href="{{ asset('/img/svgdefs.svg#icon-cross') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
			</svg>
			<div class="popup-wrapper">
					<div class="video-box">
							<div class="video-height"></div>
							<div class="video-content">
									<iframe src="" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
									<div class="video-error">Нет видео</div>
							</div>
					</div>
			</div>
	</section>-->

	<section id="portfolio-single">
		<div class="wrapper">
			{{ Breadcrumbs::render('portfolio.project',  $work) }}
			<div class="portfolio-single-content">
				<div class="title">
					<h1>{{ $work->name }}</h1>
					<span>{{ $work->annotation }}</span>
				</div>
				{{-- @todo --}}
				<img class="lazy" data-src="/{{ $work->image }}" alt="{{ $work->alt }}">
                <div class="preparation">
				    {!! $work->text !!}

                    {{--
                    <div class="photos">
                        @for ($i = 0; $i < 4; $i++)
                            <a href="{{ asset('/img/portfolio/portfolio-single/photos/big/photo1.jpg') }}" class="photo"
                               data-fancybox="photos"
                               data-caption="<p>1 Подготовка к монтажу станции канализации для частного дома Юнилос Астра 5 Миди. Построение опалубки, т.к присутствует высокий уровень грунтовых вод</p>">
                                <img class="lazy" data-src="{{ asset('/img/portfolio/portfolio-single/photos/photo1.jpg') }}" alt="">
                            </a>
                        @endfor
                    </div>
                    <div class="photos">
                        @for ($i = 0; $i < 8; $i++)
                        <a href="{{ asset('/img/portfolio/portfolio-single/img1.jpg') }}" class="photo"
                           data-fancybox="photos-2"
                           data-caption="<p>1 Подготовка к монтажу станции канализации для частного дома Юнилос Астра 5 Миди. Построение опалубки, т.к присутствует высокий уровень грунтовых вод</p>">
                            <img class="lazy" data-src="{{ asset('/img/portfolio/portfolio-single/img1.jpg') }}" alt="">
                        </a>
                        @endfor
                    </div>
                    --}}

                    <div class="work-stats">
						<div class="stats-box">
							<div class="author-and-date">
								<div class="date">
									<svg>
										<use xlink:href="{{ asset('/img/svgdefs.svg#icon-calendar') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
									</svg>
									<span>{{ $work->created_at->format('d.m.Y') }}</span>
								</div>
							</div>
							<div class="work-views">
								<svg>
									<use xlink:href="{{ asset('/img/svgdefs.svg#icon-view') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
								</svg>
								<span>{{ $work->views }}</span>
							</div>
						</div>
						<hr>
						<div class="social-and-likes">
                            <div class="social">
                                <div class="social-title">Поделиться:</div>
                                <div class="social-icons">
                                    <a onclick="Share.facebook()">
                                        <svg>
                                            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-facebook') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                        </svg>
                                    </a>
                                    <a onclick="Share.vk()">
                                        <svg>
                                            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-vk') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                        </svg>
                                    </a>
                                </div>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

    <section id="eleven">
	    @include('blocks.reviews')
    </section>

	@include('blocks.videos')

	<section id="fourteen">
        @include('blocks.works')
	</section>
@endsection

@section('script')
    <script src="{{ asset('/js/share.js') }}"></script>
@endsection