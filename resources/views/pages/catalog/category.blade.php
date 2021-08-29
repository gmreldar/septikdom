@extends('index')

@section('head')
    <title>{{ $category->title }}</title>
    <meta name="keywords" content="{{ $category->keywords }}">
    <meta name="description" content="{{ $category->description }}">
    @if($category->image)
        <meta property="og:image" content="{{ url($category->image) }}"/>
        <link rel="image_src" href="{{ url($category->image) }}"/>
    @else
        {!! $defaultOGImage !!}
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="og:title" content="{{ $category->title }}">
    <meta name="og:description" content="{{ $category->description }}">
@endsection

@section('content')
    <!-- @include('elements.preloader') -->
    <div style="height: 30px"></div>
    <section class="category">
        <div class="box-main-menu">
            @include('blocks.menu_products')
            <div class="wrapper box-wrapper">
                <div class="bg_layer"></div>

                <div class="wrapper-line">

                    @include('blocks.catalog')

                {{ Breadcrumbs::render('catalog.category', $category) }}
            </div>
            <div class="category-text">
                <h1>{{ $category->name }}</h1>
                <p>{!! $category->annotation !!}</p>
                <!-- @if ($category->text)
                    <div class="show-text">
                        <div class="show-text_block">
                            <span>Читать полностью</span>
                            <svg class="hover">
                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                            </svg>
                            <svg class="unhover">
                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                            </svg>
                        </div>
                    </div>
                    <div class="readmore">
                        {!! $category->text !!}
                        <div class="hide-text">
                            <div class="hide-text_block">
                                <span>Свернуть описание</span>
                                <svg>
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                @endif -->
                </div>
            </div>
        </div>
        <div class="category-data">
            <div class="category-filter">
                <div class="wrapper-filter box-wrapper-filter">
                    <div class="block">
                        <div class="filter-icon table active">
                            <svg>
                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-filter-table') }}"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                            </svg>
                            <p class="hover-block">Таблица</p>
                        </div>
                        <div class="filter-icon list">
                            <svg>
                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-filter-list') }}"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                            </svg>
                            <p class="hover-block">Список</p>
                        </div>
                    </div>
                    {{--<div class="block">
                        <div class="sorting">
                            <p>Сортировать по:</p>
                            <div class="sorting-click">
                                <span>Названию</span>
                                <div class="sorting-active">
                                    <ul>
                                        <li>Позиции
                                            <svg>
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                        </li>
                                        <li class="active">Названию
                                            <svg>
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                        </li>
                                        <li>Цене
                                            <svg>
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sorting-arrow">
                                <svg>
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="sorting">
                            <p>Отображать по:</p>
                            <div class="sorting-click">
                                <span>12</span>
                                <div class="sorting-active">
                                    <ul>
                                        <li>16
                                            <svg>
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                        </li>
                                        <li class="active">32
                                            <svg>
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                        </li>
                                        <li>64
                                            <svg>
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                </div>
            </div>
            <div class="wrapper box-wrapper2">
                <div class="category-list">
                    <div class="table-container" id="table-container">
                        <table>
                            <tbody id="scroll-table">
                            @isset($products)
                                @foreach($products as $product)
                                    <tr>
                                        <td>
                                            <a href="{{route('catalog.product', [$category->link, $product->link])}}">{{ $product->name }}</a>
                                        </td>
                                        <td>от {{ number_format($product->price(), 0, '.', ' ') }} руб.</td>
                                    </tr>
                                @endforeach
                            @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="category-table active">
                    <div class="analogs">
                        @isset($products)
                            @foreach($products as $product)
                                @php($sale = $product->sale())
                                @php($image = $product->image())
                                @php($modification = App\Models\Modification::where('product_id', '=', $product->id)->first())
                                <div class="analog @if($sale) analog-sale @endif">
                                    <a href="{{route('catalog.product', [$category->link, $product->link])}}"
                                       class="analog-img">
                                        @if($image)
                                            <img class="lazy" data-src="{{ asset('' . $image->image) }}"
                                                 alt="{{ $image->alt }}">
                                        @endif
                                        @if($sale)
                                            <span class="sale">{{ $sale->discount }}% акция</span>
                                        @endif
                                    </a>
                                    <div class="analog-footer">
                                        <div class="analog-content">
                                            <p style="font-size: 12px">
                                                @isset($modification->proizvoditelnost)
                                                    Производительность {{ $modification->proizvoditelnost }} куб/сут
                                                @endisset
                                            </p>
                                            <p style="font-size: 12px">
                                                @isset($modification->volume)
                                                    Залповый сброс {{ $modification->volume }}л
                                                @endisset
                                            </p>
                                            <p style="font-size: 12px">
                                                @isset($modification->massa)
                                                    Масса {{ $modification->massa }}кг
                                                @endisset
                                            </p>
                                            <a href="{{route('catalog.product', [$category->link, $product->link])}}"
                                               class="analog-title">{{ $product->name }}</a>
                                            <p class="analog-oldprice">
                                                @if($sale)
                                                    <strike>{{ number_format($sale->price, 0, '.', ' ') }} руб.</strike>
                                                @endif
                                            </p>
                                            <div class="analog-price-box">
                                                <div class="analog-price-box-inner">
                                                    <p class="analog-price">
                                                        от {{ number_format($product->price(), 0, '.', ' ') }} руб.</p>
                                                    <div class="reviews">
                                                        <a href="{{route('catalog.product', [$category->link, $product->link . '#otzyvy'])}}"
                                                           class="comments">
                                                            <svg>
                                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-dialog') }}"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                            </svg>
                                                            <span class="value">{{ $product->comments->where('is_active', 1)->count() }}</span>
                                                        </a>
                                                    </div>
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
                                </div>
                            @endforeach
                        @endisset
                    </div>
                </div>
                @include('blocks.bestsellers')
                <style>

                </style>
                <section id="fourteen" style="background: white">
                    @include('blocks.works')
                </section>
                <div class="category-text in-catalogue">
                    @if ($category->text)
                        {!! $category->text !!}
                    @endif
                </div>
                <section id="thirteen">
                    <div class="wrapper">
                        <div class="title-box">
                            <div class="title-content">
                                <h1 class="title"><a href="{{route('blog')}}">Блог</a></h1>
                                <span>«Интересные материалы»</span>
                            </div>
                        </div>
                        <div class="articles">
                            @isset($articles)
                                @foreach($articles as $article)
                                    <div class="article">
                                        <div class="article-img lazy-img" data-bg="url({{ asset('/min/' . $article->image) }})"></div>
                                        <div class="article-footer">
                                            <div class="article-content">
                                                <div class="article-title">{{ $article->name }}</div>
                                                <div class="article-text">{{ $article->annotation }}</div>
                                            </div>
                                            <a href="{{route('blog.article', [$article->category->link, $article->link])}}"
                                               class="article-link">Подробнее</a>
                                            <div class="article-svg">
                                                <svg class="article-svg-default">
                                                    <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow') }}"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                </svg>
                                                <svg class="article-svg-hover">
                                                    <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endisset
                        </div>
                        <a href="{{route('blog')}}" class="view-all-articles">
                            <p>Читать все статьи</p>
                            <div class="svg-box">
                                <svg class="hover-icon">
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                                <svg class="default-icon">
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                            </div>
                        </a>
                    </div>
                </section>
            </div>
        </div>
        {{--
        <div class="wrapper">
            <div class="pagination">
                <ul class="pagination-block">
                    <li><a href="#" class="arrow">❮</a></li>
                    <li><a href="#" class="active">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#" class="not-active">...</a></li>
                    <li><a href="#" class="not-active arrow">❯</a></li>
                </ul>
            </div>
        </div>
        --}}
    </section>
    <section id="endMenu" style="height: 2px"></section>
@endsection

@section('script')
    <script>
        // $(document).ready(function () {
        //     $('#menu_7').addClass('active');
        // });
    </script>
@endsection