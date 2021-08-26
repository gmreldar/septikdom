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
    <section class="price">
        <div class="wrapper">
            {{ Breadcrumbs::render('single.first_page', "Прайс-лист", route("price")) }}
            <div class="title-box">
                <div class="title-content">
                    <h1 class="title prices">{{ $page->name }}</h1>
                    <span>Ценообразование</span>
                </div>
            </div>
            <div id="five">
                <div class="septic-items" style="display: flex; justify-content: center">
                    @if($type != 1)
                        <a href="{{route('price')}}" class="septic-item-link">
                            <div class="septic-item-price">
                                <div class="septic-img-price" style="width: 150px">
                                    <img class="lazy" data-src="{{ asset('/img/prays/septics.png') }}">
                                </div>
                                <div class="septic-footer-price">
                                    <div class="septic-footer-inner-price">
                                        <div class="septic-footer-text">
                                            <h3><a href="{{route('price')}}" style="color: black">Септики</a></h3>
                                        </div>
                                        <div class="icon-price">
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
                    @endif

                    @if($type != 3)
                        <a href="{{route('price.category', 3)}}" class="septic-item-link">
                            <div class="septic-item-price">
                                <div class="septic-img-price" style="width: 150px">
                                    <img class="lazy" data-src="{{ asset('/img/prays/cellars.png') }}">
                                </div>
                                <div class="septic-footer-price">
                                    <div class="septic-footer-inner-price">
                                        <div class="septic-footer-text">
                                            <h3><a href="{{route('price.category', 3)}}"
                                                   style="color: black">Погреба</a></h3>
                                        </div>
                                        <div class="icon-price">
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
                        {{--<a href="{{route('price.category', 3)}}" class="septic-item-link">--}}
                        {{--<div class="septic-item" style="height: 340px;">--}}
                        {{--<div class="septic-img" style="height: calc(100% - 90px);">--}}
                        {{--<img class="lazy" data-src="/img/prays/cellars.png">--}}
                        {{--</div>--}}
                        {{--<div class="septic-footer" style=" height: 90px;">--}}
                        {{--<div class="septic-footer-inner">--}}
                        {{--<div class="septic-footer-text">--}}
                        {{--<a href="{{route('price.category', 3)}}">Подробнее</a>--}}
                        {{--<p class="septic-title-default">Погреба</p>--}}
                        {{--</div>--}}
                        {{--<div class="icon">--}}
                        {{--<svg class="default-svg">--}}
                        {{--<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"--}}
                        {{--xmlns:xlink="http://www.w3.org/1999/xlink"></use>--}}
                        {{--</svg>--}}
                        {{--<svg class="hover-svg">--}}
                        {{--<use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"--}}
                        {{--xmlns:xlink="http://www.w3.org/1999/xlink"></use>--}}
                        {{--</svg>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</a>--}}
                    @endif

                    @if($type != 4)
                        <a href="{{route('price.category', 4)}}" class="septic-item-link">
                            <div class="septic-item-price">
                                <div class="septic-img-price" style="width: 150px">
                                    <img class="lazy" data-src="{{ asset('/img/prays/caissons.png') }}">
                                </div>
                                <div class="septic-footer-price">
                                    <div class="septic-footer-inner-price">
                                        <div class="septic-footer-text">
                                            <h3><a href="{{route('price.category', 4)}}"
                                                   style="color: black">Кессоны</a></h3>
                                        </div>
                                        <div class="icon-price">
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

                    @endif
                </div>
            </div>
            <div class="title-box">
                <span class="subtitle">Автономная канализация и цены. Стоимость монтажа и шефмонтажа на Юнилос и Топас</span>
            </div>
        </div>
        <div class="price-content">

            <div class="single-product-tabs">
                <div class="tabs-box">
                    <div class="wrapper-tabs">
                        @isset($septics)
                            @foreach($septics as $key => $category)
                                <div class="tab @if($key == 0) tab-active @endif">{{ $category->name }}</div>
                            @endforeach
                        @endisset
                        @isset($accessories)
                            @foreach($accessories as $category)
                                <div class="tab">{{ $category->name }}</div>
                            @endforeach
                        @endisset
                    </div>
                </div>
                <div class="wrapper">
                    @isset($septics)
                        @foreach($septics as $key => $category)
                            <div class="tab-content @if($key == 0) tab-active @endif">
                                {!! $category->price_list_text !!}
                                <div class="table-container" id="table-container">
                                    <table>
                                        <tbody id="scroll-table">
                                        <tr>
                                            <td class="title-table"><p>Модель</p></td>
                                            @if($type == 1)
                                                <td><p>Самотечный способ</p></td>
                                                <td><p>Принудительный способ</p></td>
                                            @else
                                                <td><p>Цена</p></td>
                                            @endif
                                        </tr>
                                        @foreach($category->products as $product)
                                            <tr>
                                                <td>
                                                    <a href="{{route('catalog.product', [$category->link, $product->link])}}">
                                                        <p>{{ $product->name }}</p></a></td>
                                                @if($type == 1)
                                                    <td><p>от {{ number_format($product->price(0), 0, '.', ' ') }}
                                                            руб</p>
                                                    </td>
                                                    <td><p>от {{ number_format($product->price(1), 0, '.', ' ') }}
                                                            руб</p>
                                                    </td>
                                                @else
                                                    <td><p>от {{ number_format($product->price(), 0, '.', ' ') }}
                                                            руб</p>
                                                    </td>
                                                @endif

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                    @isset($accessories)
                        @foreach($accessories as $category)
                            <div class="tab-content">
                                {!! $category->price_list_text !!}
                                <div class="table-container" id="table-container">
                                    <table>
                                        <tbody id="scroll-table">
                                        <tr>
                                            <td class="title-table"><p>Название</p></td>
                                            <td><p>Цена</p></td>
                                        </tr>
                                        @foreach($category->products as $product)
                                            <tr>
                                                <td>
                                                    <a href="{{route('catalog.product', [$category->link, $product->link])}}">
                                                        <p>{{ $product->name }}</p></a></td>
                                                <td><p>от {{ number_format($product->price(), 0, '.', ' ') }} руб</p>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endforeach
                    @endisset
                </div>
            </div>
        </div>
    </section>

@endsection
