@extends('index')

@section('head')
    <title>{{ $page->title }}</title>
    <meta name="keywords" content="{{ $page->keywords }}">
    <meta name="description" content="{{ $page->description }}">
    @if($page->image)
        <meta property="og:image" content="{{ url($page->image) }}"/>
        <link rel="image_src" href="{{ url($page->image) }}"/>
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="og:title" content="{{ $page->title }}">
    <meta name="og:description" content="{{ $page->description }}">
@endsection

@section('content')
    <section id="services">
        <div class="wrapper">
            {{ Breadcrumbs::render('single.first_page', "Услуги", route('services')) }}
            <div class="title-box">
                <div class="title-content">
                    <h1 class="title">Услуги</h1>
                    <span>Что мы умеем делать?</span>
                </div>
            </div>
            <div class="services">
                @isset($services)
                @foreach($services as $service)
                    <div class="item">
                        <a href="{{route('services.item', $service->link)}}">
                        {{-- @todo --}
                            <div class="img"><img class="lazy" data-src="/min/{{ $service->image }}" alt="{{ $service->alt }}"></div>
                            <div class="item-text">
                                <div class="item-text-inner">
                                    <h3>{{ $service->name }}</h3>
                                    <p>{{ $service->annotation }}</p>
                                </div>
                                <a href="{{route('services.item', $service->link)}}" class="item-link">Подробнее</a>
                                <div class="svg-box">
                                    <svg class="no-hover-svg">
                                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                    </svg>
                                    <svg class="hover-svg">
                                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                @endisset
            </div>
        </div>
    </section>

@endsection
