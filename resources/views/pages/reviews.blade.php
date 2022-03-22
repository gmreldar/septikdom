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
    <meta name="og:title" content="{{ $page->title }}">
    <meta name="og:description" content="{{ $page->description }}">
@endsection

@section('content')
    @include('blocks.licenses_popups')
    @include('blocks.video_popup')
    <section class="about">
        <div class="wrapper">
            {{ Breadcrumbs::render('single.first_page', "Отзывы", route("pages.reviews")) }}
        </div>

        @include('blocks.videos')

        <section id="eleven">
            <div class="title-box" id="otzyvy">
                <div class="title-content">
                    <span>Фото отзывы</span>
                </div>
            </div>
            <div class="slider-comments-box">
                <div class="custom-prev-arrow slider2">
                    <svg class="default-arrow">
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                    <svg class="hover-arrow">
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                </div>
                <div class="slider-comments">
                    @isset($photoReviews)
                        @foreach($photoReviews as $review)

                            <div>
                                <div class="comment">
                                    <div class="comment-inner">
                                        <div class="comment-img">
                                            <img data-src="{{ asset($review->file) }}" alt="{{ $review->alt }}"
                                                 class="lazy-img">
                                        </div>
                                        <div class="comment-text-wrap">
                                            <div class="comment-text">
                                                <h3>{{ $review->name }}</h3>
                                                <span class="datetime">{{ $review->created_at->format('d.m.Y') }}</span>
                                                <p><q>{{ $review->message }}</q></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>
                <div class="custom-next-arrow slider2">
                    <svg class="default-arrow">
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                    <svg class="hover-arrow">
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                </div>
                <div class="custom-dots slider2"></div>
            </div>
        </section>

        <section id="eleven">
            <div class="title-box" id="otzyvy">
                <div class="title-content">
                    <span>Аудио отзывы</span>
                </div>
            </div>
            <div class="slider-audio-comments-box">
                <div class="custom-prev-arrow slider8">
                    <svg class="default-arrow">
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                    <svg class="hover-arrow">
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                </div>
                <div class="slider-audio-comments">
                    @isset($audioReviews)
                        @foreach($audioReviews as $review)

                            <div>
                                <div class="comment">
                                    <div class="comment-inner">
                                        <div class="comment-text-wrap">
                                            <div class="comment-text">
                                                <h3>{{ $review->name }}</h3>
                                                <span class="datetime">{{ $review->created_at->format('d.m.Y') }}</span>
                                                <div style="height: 60px; display: flex;">
                                                    <div id="wave{{$review->id}}" style="height: 60px"
                                                         class="waveform"></div>
                                                    <button class="wavePlay" disabled id="controls_wave{{$review->id}}">
                                                        <img class="play"
                                                             src="{{ asset('/img/icons/play-audio-min.png') }}"/>
                                                        <img class="pause"
                                                             src="{{ asset('/img/icons/pause-audio-min.png') }}"/>
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>
                <div class="custom-next-arrow slider8">
                    <svg class="default-arrow">
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                    <svg class="hover-arrow">
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                </div>
                <div class="custom-dots slider8"></div>
            </div>
        </section>

        <section id="eleven">
            <div class="title-box" id="otzyvy">
                <div class="title-content">
                    <span>Текстовые отзывы</span>
                </div>
            </div>
            <div class="slider-text-comments-box">
                <div class="custom-prev-arrow slider9">
                    <svg class="default-arrow">
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                    <svg class="hover-arrow">
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                </div>
                <div class="slider-text-comments">
                    @isset($textReviews)
                        @foreach($textReviews as $review)

                            <div>
                                <div class="comment">
                                    <div class="comment-inner">
                                        <div class="comment-text-wrap">
                                            <div class="comment-text">
                                                <h3>{{ $review->name }}</h3>
                                                <span class="datetime">{{ $review->created_at->format('d.m.Y') }}</span>
                                                <p><q>{{ $review->message }}</q></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>
                <div class="custom-next-arrow slider9">
                    <svg class="default-arrow">
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                    <svg class="hover-arrow">
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                </div>
                <div class="custom-dots slider9"></div>
            </div>
            <div class="buttons">
                <div class="wrapper">
                    <span class="button-submit add-review-button">Добавить отзыв</span>
                </div>
            </div>
        </section>
    </section>

    <style>
        #eleven .slider-text-comments .comment .comment-inner .comment-text-wrap {
            width: 100%;
        }

        #eleven .slider-audio-comments .comment .comment-inner .comment-text-wrap {
            width: 100%;
        }

        .wavePlay {
            width: 50px;
            height: 40px;
            margin: 10px;
            border-radius: 50px;
            background-color: #34a844;
            border: none;
            transition: background-color 300ms;
        }

        .wavePlay:hover {
            background-color: #38b549;
        }

        .wavePlay img {
            width: 30px;
            transform: translateX(-5px)
        }

        .wavePlay .play {
            display: block !important;
        }

        .wavePlay .pause {
            display: none !important;
        }

        .wavePlay.playing .play {
            display: none !important;
        }

        .wavePlay.playing .pause {
            display: block !important;
        }
    </style>

    {{--@include('blocks.services')--}}

    {{--<section id="five">--}}
    {{--@include('blocks.septicks')--}}
    {{--</section>--}}

    {{--<section id="twelve" class="twelve-about">--}}
    {{--@include('blocks.licenses')--}}
    {{--</section>--}}

    {{--<section id="fourteen" class="fourteen-about">--}}
    {{--@include('blocks.works')--}}
    {{--</section>--}}


@endsection

@section('script')
    <script defer src="{{ asset('/js/slick.min.js') }}"></script>
    <script src="{{ asset('/js/wavesurfer.js') }}"></script>
    <script defer src="{{ asset('/js/slider.js') }}"></script>
    <script>
        var waves = [];
        var surfers = [];
        @isset($audioReviews)
        @foreach($audioReviews as $review)
        waves.push('/{{$review->file}}');
        @endforeach
        @endisset

        document.addEventListener('DOMContentLoaded', function () {
            var wave = 0;
            $('.waveform').toArray().forEach(function (item) {
                var wavesurfer = WaveSurfer.create({
                    container: '#' + item.id,
                    height: 60,
                    // waveColor: 'violet',
                    progressColor: '#34a844'
                });

                wavesurfer.load(waves[wave++]);
                surfers.push(wavesurfer);

                wavesurfer.on('ready', function () {
                    document.getElementById('controls_' + item.id).removeAttribute('disabled');
                });

                wavesurfer.on('finish', function () {
                    document.getElementById('controls_' + item.id).classList.toggle('playing');
                });

                document.getElementById('controls_' + item.id).addEventListener('click', function () {
                    wavesurfer.playPause();
                    this.classList.toggle('playing');
                });
            });


        })
    </script>
@endsection
