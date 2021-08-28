@extends('index')

@section('head')
    <title>{{ $service->title }}</title>
    <meta name="keywords" content="{{ $service->keywords }}">
    <meta name="description" content="{{ $service->description }}">
    @if($service->image)
        <meta property="og:image" content="{{ url($service->seo_image) }}"/>
        <link rel="image_src" href="{{ url($service->seo_image) }}"/>
    @else
        {!! $defaultOGImage !!}
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="og:title" content="{{ $service->title }}">
    <meta name="og:description" content="{{ $service->description }}">
@endsection

@section('content')
    <section class="articles-services">
        <div class="wrapper">
            {{ Breadcrumbs::render('services.service', $service) }}
            <div class="articles-content">
                <h1>{{ $service->name }}</h1>
                <span class="description">{{ $service->annotation }}</span>
                <div class="articles-text">
                    {{--<div class="articles-pic first" style="background-image: url(/{{ $service->image }});"></div>--}}
                    <img class="articles-pic first lazy" data-src="{{ asset($service->image) }}" alt="">
                    {!! $service->text !!}

                    <div class="info">
                        <div class="info-main">
                            <div class="info-date">
                                <div class="block-svg">
                                    <svg class="icon-like">
                                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-calendar') }}"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                    </svg>
                                </div>
                                <span>{{ $service->created_at->format('d.m.Y') }}</span>
                            </div>
                            <div class="info-view">
                                <div class="block-svg">
                                    <svg class="icon-like">
                                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-view') }}"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                    </svg>
                                </div>
                                <span>{{ $service->views }}</span>
                            </div>
                        </div>
                        @include('blocks.share')
                    </div>
                </div>
                {{--<button class="button-submit add-service" type="submit">Заказать услугу</button>--}}
            </div>
        </div>
    </section>

    <section id="fourteen">
        @include('blocks.works')
    </section>
@endsection

@section('script')
    <script src="{{ asset('/js/share.js') }}"></script>
@endsection