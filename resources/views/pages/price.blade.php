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
            {{ Breadcrumbs::render('single.first_page', "Прайс-лист") }}
            <div class="title-box">
                <div class="title-content">
                    <h1 class="title">Прайс-листы</h1>
                    <span>Ценообразование</span>
                </div>
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
                                        <td class="title-table"><p>Модель станции</p></td>
                                        <td><p>Самотечный способ</p></td>
                                        <td><p>Принудительный способ</p></td>
                                    </tr>
                                    @foreach($category->products as $product)
                                        <tr>
                                            <td><a href="{{route('catalog.product', [$category->link, $product->link])}}"><p>{{ $product->name }}</p></a></td>
                                            <td><p>от {{ number_format($product->price(0), 0, '.', ' ') }} руб</p></td>
                                            <td><p>от {{ number_format($product->price(1), 0, '.', ' ') }} руб</p></td>
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
                                            <td><a href="{{route('catalog.product', [$category->link, $product->link])}}"><p>{{ $product->name }}</p></a></td>
                                            <td><p>от {{ number_format($product->price(), 0, '.', ' ') }} руб</p></td>
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
