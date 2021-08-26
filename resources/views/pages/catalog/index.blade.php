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
    <!-- @include('elements.preloader') -->
    <section id="catalog-one">
        <div class="box-main-menu">
            @include('blocks.menu_products')
            <div class="wrapper box-wrapper" id="septics">
            {{ Breadcrumbs::render('single.first_page', "Каталог", route('catalog')) }}
            <div class="title-box">
                <div class="title-content">
                    <h1 style="visibility: hidden;margin: 0;width: 0;height: 0">Септики</h1>
                    <h2 class="title">Септики</h2>
                    <span>Автономные канализации</span>
                </div>
            </div>
            <div class="catalog-content catalog-content-w">
                @if(isset($septics_text))
                    {!! $septics_text->text !!}
                @endif
            </div>
            <div id="five">
                <div class="septic-items">
                    @foreach($septics as $category)
                        <a href="{{route('catalog.category', $category->link)}}" class="septic-item-link">
                            <div class="septic-item">
                                <div class="septic-img">
                                    @if ($category->image)
                                    {{-- @todo --}}
                                        <img class="lazy" data-src="/min/{{ $category->image }}"
                                             alt="{{ $category->alt }}">
                                    @else
                                        <img alt="{{ $category->alt }}">
                                    @endif
                                </div>
                                <div class="septic-footer">
                                    <div class="septic-content">
                                        <p class="septic-title">{{ $category->name }}</p>
                                        <p class="septic-text">{{ strip_tags(html_entity_decode($category->annotation)) }}</p>
                                    </div>
                                    <div class="septic-footer-inner">
                                        <div class="septic-footer-text">
                                            <a href="{{route('catalog.category', $category->link)}}">Подробнее</a>
                                            <p class="septic-title-default">{{ $category->name }}</p>
                                        </div>
                                        <div class="icon">
                                            <svg class="default-svg">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <svg class="hover-svg">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

        </div>
        </div>
        <div id="cellars"></div>
    </section>

    @isset($cellars)
        <section id="five" class="section-border-top">
            <div class="wrapper box-wrapper2">
                <div class="title-box">
                    <div class="title-content">
                        <h2 class="title">Погреб</h2>
                        <span>пластиковый</span>
                    </div>
                </div>
                <div class="catalog-content catalog-content-w">
                    @if(isset($cellars_text))
                        {!! $cellars_text->text !!}
                    @endif
                </div>
                <div class="septic-items">
                    @foreach($cellars as $category)
                        <a href="{{route('catalog.category', $category->link)}}" class="septic-item-link">
                            <div class="septic-item">
                                <div class="septic-img">
                                    @if ($category->image)
                                    {{-- @todo --}}
                                        <img class="lazy" data-src="/min/{{ $category->image }}"
                                             alt="{{ $category->alt }}">
                                    @else
                                        <img alt="{{ $category->alt }}">
                                    @endif
                                </div>
                                <div class="septic-footer">
                                    <div class="septic-content">
                                        <p class="septic-title">{{ $category->name }}</p>
                                        <p class="septic-text">{{ strip_tags(html_entity_decode($category->annotation)) }}</p>
                                    </div>
                                    <div class="septic-footer-inner">
                                        <div class="septic-footer-text">
                                            <a href="{{route('catalog.category', $category->link)}}">Подробнее</a>
                                            <p class="septic-title-default">{{ $category->name }}</p>
                                        </div>
                                        <div class="icon">
                                            <svg class="default-svg">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <svg class="hover-svg">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <div id="caissons"></div>
        </section>
    @endisset

    @isset($caissons)
        <section id="five" class="section-border-top">
            <div class="wrapper box-wrapper2">
                <div class="title-box">
                    <div class="title-content">
                        <h2 class="title">Кессоны</h2>
                        <span>для скважин</span>
                    </div>
                </div>
                <div class="catalog-content catalog-content-w">
                    @if(isset($caissons_text))
                        {!! $caissons_text->text !!}
                    @endif
                </div>
                <div class="septic-items">
                    @foreach($caissons as $category)
                        <a href="{{route('catalog.category', $category->link)}}" class="septic-item-link">
                            <div class="septic-item">
                                <div class="septic-img">
                                    @if ($category->image)
                                    {{-- @todo --}}
                                        <img class="lazy" data-src="/min/{{ $category->image }}"
                                             alt="{{ $category->alt }}">
                                    @else
                                        <img alt="{{ $category->alt }}">
                                    @endif
                                </div>
                                <div class="septic-footer">
                                    <div class="septic-content">
                                        <p class="septic-title">{{ $category->name }}</p>
                                        <p class="septic-text">{{ strip_tags(html_entity_decode($category->annotation)) }}</p>
                                    </div>
                                    <div class="septic-footer-inner">
                                        <div class="septic-footer-text">
                                            <a href="{{route('catalog.category', $category->link)}}">Подробнее</a>
                                            <p class="septic-title-default">{{ $category->name }}</p>
                                        </div>
                                        <div class="icon">
                                            <svg class="default-svg">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <svg class="hover-svg">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endisset

    @isset($accessories)
        <section id="five" class="section-border-top">
            <div class="wrapper box-wrapper2">
                <div class="title-box">
                    <div class="title-content">
                        <h2 class="title">Комплектую&shy;щие</h2>
                        <span>Прочие товары</span>
                    </div>
                </div>
                <div class="septic-items">
                    @foreach($accessories as $category)
                        <a href="{{route('catalog.category', $category->link)}}" class="septic-item-link">
                            <div class="septic-item">
                                <div class="septic-img">
                                    @if ($category->image)
                                    {{-- @todo --}}
                                        <img class="lazy" data-src="/min/{{ $category->image }}"
                                             alt="{{ $category->alt }}">
                                    @else
                                        <img alt="{{ $category->alt }}">
                                    @endif
                                </div>
                                <div class="septic-footer">
                                    <div class="septic-content">
                                        <p class="septic-title">{{ $category->name }}</p>
                                        <p class="septic-text">{{ strip_tags(html_entity_decode($category->annotation)) }}</p>
                                    </div>
                                    <div class="septic-footer-inner">
                                        <div class="septic-footer-text">
                                            <a href="{{route('catalog.category', $category->link)}}">Подробнее</a>
                                            <p class="septic-title-default">{{ $category->name }}</p>
                                        </div>
                                        <div class="icon">
                                            <svg class="default-svg">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <svg class="hover-svg">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endisset
    <section id="endMenu" style="height: 2px"> </section>
@endsection

