@extends('index')

@section('head')
    <title>{{ $product->title }}</title>
    <meta name="keywords" content="{{ $product->keywords }}">
    <meta name="description" content="{{ $product->description }}">
    @if($product->image)

    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="og:title" content="{{ $product->title }}">
    <meta name="og:description" content="{{ $product->description }}">
    <style>
        .box-menu {
            /*top: 0px;*/
        }

        #calculator .calc-step .step-content {
            padding: 14px 50px;
        }

        #calculator .calc-step .step-header {
            padding: 10px 28px;
        }

        #calculator .calc-step .step-content .input-block {
            margin: 5px 10px 3px 10px;
        }

        #calculator .title-box {
            margin-top: 35px;
        }

        @media (min-width: 768px) {
            #card-one .single-item-desc {
                padding: 32px 52px;
                min-height: 450px;
            }
        }
    </style>
@endsection

@section('content')
    <!-- @include('elements.preloader') -->

    <div class="characteristic-modal">
        <div class="content">
            <div class="close-box">
                <svg class="close">
                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-cross') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                </svg>
            </div>
            <p class="text"></p>
        </div>
    </div>

    <section id="card-one">
        <div class="bg_layer"></div>

        <div class="box-main-menu">
            @include('blocks.menu_products')
            <div class="wrapper box-wrapper">
                <nav class="card-one-navigation" id="con1">

                    @include('blocks.catalog')

                    {{ Breadcrumbs::render('catalog.product', $category, $product) }}
                </nav>
                <div class="single-product">
                    <div class="single-product-title" itemscope itemtype="https://schema.org/Product">
                        <h1 itemprop="name">{{ $product->name }}</h1>
                    </div>
                    <div class="single-product-tabs">
                        <div class="tabs-box">
                            <div class="tab tab-active">О товаре</div>
                            <div class="tab">Описание</div>
                            <div class="tab" id="install-price">Стоимость монтажа</div>
                            <div class="tab" id="reviews">Отзывы <span>({{ $comments->total() }})</span></div>
                            <div class="tab">Доставка и оплата</div>
                            <div class="tab" id="documentation">Документация</div>
                        </div>
                        <div class="tab-content tab-active">
                            <div class="single-item-content">
                                <div class="single-item-slider-box">

                                    <div class="outer-slider-box">
                                        <div class="product-icons">
                                            <div class="product-icon">
                                                <div class="product-icon-circle">
                                                    {!! $icon['toilet'] !!}
                                                </div>
                                                <img src="{{ asset('/img/icons/product/toilet.png') }}">
                                            </div>
                                            <div class="product-icon">
                                                <div class="product-icon-circle">
                                                    {!! $icon['bath'] !!}
                                                </div>
                                                <img src="{{ asset('/img/icons/product/bath.png') }}">
                                            </div>
                                            <div class="product-icon">
                                                <div class="product-icon-circle">
                                                    {!! $icon['shower'] !!}
                                                </div>
                                                <img src="{{ asset('/img/icons/product/shower.png') }}">
                                            </div>
                                            <div class="product-icon">
                                                <div class="product-icon-circle">
                                                    {!! $icon['sink'] !!}
                                                </div>
                                                <img src="{{ asset('/img/icons/product/sink.png') }}">
                                            </div>
                                            <div class="product-icon">
                                                <div class="product-icon-circle">
                                                    {!! $icon['washing'] !!}
                                                </div>
                                                <img src="{{ asset('/img/icons/product/washing.png') }}">
                                            </div>
                                        </div>
                                        <div class="custom-prev-arrow slider5">
                                            <svg class="default-arrow">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <svg class="hover-arrow">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                        </div>

                                        <div class="single-item-slider">
                                            @php
                                                $ogImage = '';
                                            @endphp
                                            @foreach($product->images as $image)
                                                @if($image->carousels != 1)
                                                    @if ($ogImage == '')
                                                        @php
                                                            $ogImage = $image->image;
                                                        @endphp
                                                    @endif
                                                    <img data-lazy="/{{ $image->image }}" alt="{{ $image->alt }}">
                                                @endif
                                            @endforeach
                                        </div>

                                        <div class="custom-next-arrow slider5">
                                            <svg class="default-arrow">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <svg class="hover-arrow">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                        </div>
                                        <div class="custom-dots slider5"></div>
                                    </div>
                                </div>
                                <meta property="og:image" content="{{ url($ogImage) }}"/>
                                <link rel="image_src" href="{{ url($ogImage) }}"/>
                                <div class="single-item-info">
                                    <div class="single-item-type">
                                        <div class="type-title">
                                            <span>Глубина врезки</span>
                                            <div class="type-svg-box">
                                                <div class="type-svg-box-inner">
                                                    <svg>
                                                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                    </svg>
                                                </div>
                                                <div class="type-tooltip destination-tooltip">Глубина врезки - отличие
                                                    по
                                                    глубине присоединения, подводящей канализационной трубы к самому
                                                    септику.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="type-buttons">
                                            @foreach($modifications->where('destination', 0) as $modification)
                                                <div class="type-button">
                                                    <label>
                                                        <input type="radio" name="depth"
                                                               value="{{ $modification->glubina }}">
                                                        <div class="type-button-text">
                                                            <div class="type-button-text-inner">
                                                                <div class="circle-outer">
                                                                    <div class="circle-inner"></div>
                                                                </div>
                                                                <p>{{ $modification->modtitle }}</p>
                                                            </div>
                                                            <div class="type-button-tooltip">{{ $modification->glubina }}
                                                                см.
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="single-item-type">
                                        <div class="type-title">
                                            <span>Тип водоотвода</span>
                                            <div class="type-svg-box">
                                                <div class="type-svg-box-inner">
                                                    <svg>
                                                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                    </svg>
                                                </div>
                                                <div class="type-tooltip destination-tooltip">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="type-buttons">
                                            <div class="type-button">
                                                <label>
                                                    <input type="radio" name="water" value="0">
                                                    <div class="type-button-text">
                                                        <div class="type-button-text-inner">
                                                            <div class="circle-outer">
                                                                <div class="circle-inner"></div>
                                                            </div>
                                                            <p>Самотечный</p>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="type-button">
                                                <label>
                                                    <input type="radio" name="water" value="1">
                                                    <div class="type-button-text">
                                                        <div class="type-button-text-inner">
                                                            <div class="circle-outer">
                                                                <div class="circle-inner"></div>
                                                            </div>
                                                            <p>Принудительный</p>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-item-status">
                                        <div class="svg-box">
                                            <svg class="icon-in-stock">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-checkbox') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <svg class="icon-out-stock">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-cross') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="single-item-price-box">
                                        <div class="sigle-item-price-inner" id="price">
                                        </div>
                                        <div class="single-item-order-box">
                                            <div class="button-box-product">
                                                <div style="margin-bottom: 10px; margin-top: 10px">
                                                    <a href="#" class="single-item-order">Заказать</a>
                                                </div>
                                                <div style="margin-bottom: 10px; margin-top: 10px">
                                                    <a href="#" class="window-call-read-more">Узнать подробнее</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="popup modal-popup-read-more">
                                    <div class="popup-overlay"></div>
                                    <div class="popup-wrapper">
                                        <div class="read-more-block">
                                            <svg class="popup-close">
                                                <use xlink:href="{{asset('/img/svgdefs.svg#icon-cross')}}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <div class="read-more-answer">
                                                <h2>Узнать подробнее</h2>
                                                <div class="form">
                                                    <form method="post" action="/katalog/readMore">
                                                        {!! csrf_field() !!}
                                                        <input type="text" name="product_id" style="display: none"
                                                               value="{!! $product->id !!}">
                                                        <div class="input-group">
                                                            <input type="text" name="name" class="name-input"
                                                                   id="name-input" required>
                                                            <span class="bar"></span>
                                                            <label>Имя*</label>
                                                            <span class="name-error"></span>
                                                        </div>
                                                        <div class="input-group">
                                                            <input type="tel" name="phone" class="phone-input"
                                                                   id="phone-input" required>
                                                            <span class="bar"></span>
                                                            <label>Телефон*</label>
                                                            <span class="phone-error"></span>
                                                        </div>
                                                        <div class="wrap">
                                                            <button class="button-submit button-submit-order-popup"
                                                                    id='button-submit' type="submit">Узнать подробнее
                                                            </button>
                                                            {{--<button class="button-submit button-submit-order-popup">Узнать подробнее</button>--}}
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-item-stats">
                                    <div class="table-characteristics">
                                        <div class="table-characteristics-title">Характеристики</div>
                                        <div class="table-outer">
                                            <div class="table">
                                                <div class="table-row without-help">
                                                    <div class="characteristic-name">
                                                        <span>Модификация</span>
                                                        <div class="characteristic-svg-box"
                                                             data-text="">
                                                            <svg>
                                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <div class="characteristic-value" id="modtitle">
                                                    </div>
                                                </div>
                                                <div class="table-row with-help">
                                                    <div class="characteristic-name">
                                                        <span>Тип водоотвода</span>
                                                        <div class="type-svg-box">
                                                            <div class="type-svg-box-inner" id="table-water-tooltip">
                                                                <svg>
                                                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="type-tooltip destination-tooltip"></div>
                                                        </div>
                                                    </div>
                                                    <div class="characteristic-value" id="table-water">
                                                    </div>
                                                </div>
                                                <div class="table-row with-help with-sale">
                                                    <div class="characteristic-name">
                                                        <span>Цена</span>
                                                        <div class="type-svg-box">
                                                            <div class="type-svg-box-inner">
                                                                <svg>
                                                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="type-tooltip">Цена базовой комплектации без
                                                                учета
                                                                дополнительного оборудования. При принудительном
                                                                отведении
                                                                воды встроенная емкость и дренажный насос входят в
                                                                стоимость
                                                                оборудования.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="characteristic-value" id="table-price">
                                                    </div>
                                                </div>

                                                <div class="table-row with-help">
                                                    <div class="characteristic-name">
                                                        <span>Производительность</span>
                                                        <div class="type-svg-box">
                                                            <div class="type-svg-box-inner">
                                                                <svg>
                                                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="type-tooltip">Максимальный объем стоков,
                                                                перерабатываемый станцией очистки в сутки.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="characteristic-value" id="proizvoditelnost"></div>
                                                </div>
                                                <div class="table-row with-help">
                                                    <div class="characteristic-name">
                                                        <span>Залповый сброс</span>
                                                        <div class="type-svg-box">
                                                            <div class="type-svg-box-inner">
                                                                <svg>
                                                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="type-tooltip">Максимальное количество стоков,
                                                                которое можно сбросить в канализацию за короткий
                                                                промежуток
                                                                времени. Если в доме предполагается наличие
                                                                нестандартных
                                                                ванн и джакузи необходимо выбирать станцию по принципу
                                                                максимального залпового сброса.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="characteristic-value" id="volume"></div>
                                                </div>
                                                <div class="table-row with-help">
                                                    <div class="characteristic-name">
                                                        <span>Глубина врезки</span>
                                                        <div class="type-svg-box">
                                                            <div class="type-svg-box-inner">
                                                                <svg>
                                                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="type-tooltip">Максимальное расстояние от
                                                                реальной
                                                                поверхности земли до нижнего края трубы. Измеряется в
                                                                месте
                                                                врезки подводящей канализационной трубы в приемную
                                                                камеру
                                                                станции очистки.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="characteristic-value" id="glubina"></div>
                                                </div>
                                                <div class="table-row with-help">
                                                    <div class="characteristic-name">
                                                        <span>Размеры</span>
                                                        <div class="type-svg-box">
                                                            <div class="type-svg-box-inner">
                                                                <svg>
                                                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="type-tooltip">длина*ширина*высота</div>
                                                        </div>
                                                    </div>
                                                    <div class="characteristic-value" id="gabarit"></div>
                                                </div>
                                                <div class="table-row with-help">
                                                    <div class="characteristic-name">
                                                        <span>Потребление электроэнергии</span>
                                                        <div class="type-svg-box">
                                                            <div class="type-svg-box-inner">
                                                                <svg>
                                                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="type-tooltip">Суточный расход электроэнергии.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="characteristic-value" id="power"></div>
                                                </div>
                                                <div class="table-row with-help">
                                                    <div class="characteristic-name">
                                                        <span>Масса</span>
                                                        <div class="type-svg-box">
                                                            <div class="type-svg-box-inner">
                                                                <svg>
                                                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="type-tooltip">Вес оборудования.</div>
                                                        </div>
                                                    </div>
                                                    <div class="characteristic-value" id="massa"></div>
                                                </div>

                                                <div class="table-row with-help">
                                                    <div class="characteristic-name">
                                                        <span>Монтаж "под ключ"</span>
                                                        <div class="type-svg-box">
                                                            <div class="type-svg-box-inner">
                                                                <svg>
                                                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                                </svg>
                                                            </div>
                                                            <div id="tooltip-top" class="type-tooltip-top"
                                                                 style="top: -220px">Расчет выполнен исходя из
                                                                стандартных
                                                                условий, Монтаж септика в котлован, прокладка трубы
                                                                канализации 6 метров, укладка питающего кабеля,
                                                                пуско-наладочные работы. Для более точного расчета
                                                                пройдите
                                                                во вкладку “Стоимость монтажа”
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="characteristic-value">{!! number_format($estimated_cost,0,'', ' ') !!}
                                                        руб.
                                                    </div>
                                                </div>
                                                <div class="table-row without-help">
                                                    <div class="characteristic-name">
                                                        <span>Краткое описание</span>
                                                    </div>
                                                    <div class="characteristic-value" id="annotation">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if(App\Models\ProductImage::where('carousels', '=', 1)->where('product_id', '=', $product->id)->first())
                                    <div id="four"
                                         style="width: 100%; background: none;margin: 0; padding-bottom: 20px; padding-top: 0 !important;"
                                         class="carousel-product-photo">
                                        <h2 style="text-align: left; padding-left: 50px; margin-bottom: 30px;">Фото
                                            выполненных
                                            работ</h2>
                                        <div class="slider-services-box" style="margin-bottom: 50px;">
                                            <div class="custom-prev-arrow slider1">
                                                <svg class="default-arrow">
                                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                </svg>
                                                <svg class="hover-arrow">
                                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                </svg>
                                            </div>
                                            <div class="slider-services">
                                                @foreach($product->images as $image)
                                                    @if($image->carousels == 1)
                                                        <div>
                                                            <img data-lazy="/{{ $image->image }}"
                                                                 alt="{{ $image->alt }}">
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                            <div class="custom-next-arrow slider1">
                                                <svg class="default-arrow">
                                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                </svg>
                                                <svg class="hover-arrow">
                                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                </svg>
                                            </div>
                                            <div class="custom-dots slider1"></div>
                                        </div>
                                    </div>
                                @endif

                                <div class="div-button">
                                    <button class="ripple-button single-item-order">Заказать Монтаж</button>
                                    <button class="ripple-button single-item-order">Вызвать инженера</button>
                                </div>

                                <style>
                                    .div-button {
                                        width: 100%;
                                        display: flex;
                                        padding: 0 52px;
                                    }

                                    @media(max-width: 568px){
                                        .div-button {
                                            flex-direction: column;
                                            padding: 0;
                                        }
                                    }

                                    .ripple-button {
                                        margin: 10px;
                                        flex-grow: 1;
                                        position: relative;
                                        overflow: hidden;
                                        transition: background 400ms;
                                        /*color: #fff;*/
                                        /*background-color: #6200ee;*/
                                        color: white;
                                        background: #34a844;
                                        height: 46px;
                                        font-size: 16px;
                                        outline: 0;
                                        border: 0;
                                        border-radius: 23px;
                                        box-shadow: 0 0 0.5rem rgba(0, 0, 0, 0.3); /* black with 30% opacity */
                                        cursor: pointer;
                                    }

                                    .ripple-button:hover {
                                        background-color: rgb(56, 181, 73);
                                    }

                                    span.ripple {
                                        position: absolute;
                                        border-radius: 50%;
                                        transform: scale(0);
                                        animation: ripple 600ms linear;
                                        /*background-color: rgba(255, 255, 255, 0.7);*/
                                        background-color: rgba(0, 0, 0, 0.2);
                                    }

                                    @keyframes ripple {
                                        to {
                                            transform: scale(4);
                                            opacity: 0;
                                        }
                                    }

                                </style>

                                <script>
                                    function createRipple(event) {

                                        const button = event.currentTarget;

                                        //alert(button.offsetLeft);

                                        const circle = document.createElement("span");
                                        const diameter = Math.max(button.clientWidth, button.clientHeight);
                                        const radius = diameter / 2;

                                        circle.style.width = circle.style.height = `${diameter}px`;

                                        var viewportOffset = button.getBoundingClientRect();
                                        var top = viewportOffset.top;
                                        var left = viewportOffset.left;

                                        circle.style.left = `${event.clientX - left - radius}px`;
                                        circle.style.top = `${event.clientY - top  - radius}px`;
                                        circle.classList.add("ripple");

                                        const ripple = button.getElementsByClassName("ripple")[0];

                                        if (ripple) {
                                            ripple.remove();
                                        }

                                        button.appendChild(circle);
                                    }

                                    const buttons = document.getElementsByClassName("ripple-button");
                                    for (const button of buttons) {
                                        button.addEventListener("click", createRipple);
                                    }


                                </script>

                                <div class="single-item-social">
                                    <div class="social-title">Поделиться:</div>
                                    <div class="social-icons">
                                        <a onclick="Share.facebook()">
                                            <svg>
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-facebook') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                        </a>
                                        <a onclick="Share.vk()">
                                            <svg>
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-vk') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                                <div id="calculator" class="single-item-stats calculator-product-page">
                                    <div class="popup-calculator-error modal-popup">
                                        <div class="popup-overlay-calculator-error"></div>
                                        <div class="popup-wrapper">
                                            <div class="error-block">
                                                <svg class="popup-close">
                                                    <use xlink:href="img/svgdefs.svg#icon-cross"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                </svg>
                                                <div class="callback-text">
                                                    <div class="check-box">
                                                        <svg>
                                                            <use xlink:href="img/svgdefs.svg#icon-balloon"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                        </svg>
                                                    </div>
                                                    <h2>Ничего не найдено</h2>
                                                    <p>Уточните параметры поиска, либо округлите значения. Если все
                                                        данные Вы указали верно и Вам нужен точный ответ по подбору
                                                        станции очистки, свяжитесь с нами по телефону <a
                                                                href="tel:+78123857383">+7 (812) 385 73 83</a></p>
                                                    <button class="button-submit" type="submit">Ок</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrapper">
                                        <div class="title-box">
                                            <div class="title-content">
                                                <h2 class="title">Калькулятор</h2>
                                                <span>Рассчитать стоимость</span>
                                            </div>
                                            <span class="subtitle">Подбор станции очистки за 2 минуты</span>
                                        </div>
                                        <div class="calculator-box">
                                            <div class="calc-step calc-step-active calc-step-1">
                                                <div class="step-header">1. Информация об источниках водоснабжения в
                                                    Вашем доме
                                                </div>
                                                <div class="step-content">
                                                    <div class="input-block">
                                                        <div class="input-block-title">Количество жильцов в доме*</div>
                                                        <div class="input-block-content">
                                                            <svg class="input-icon">
                                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-peoples') }}"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                            </svg>
                                                            <div class="input-group">
                                                                <input type="text" class="select-input"
                                                                       id="quantityPeople" data-required="true"
                                                                       required>
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
                                                                <span class="error-field">Поле обязательно для заполнения</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="input-block">
                                                        <div class="input-block-title">Раковина на 15 литров</div>
                                                        <div class="input-block-content">
                                                            <svg class="input-icon">
                                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-kran') }}"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                            </svg>
                                                            <div class="input-group">
                                                                <input type="text" class="select-input salvoDump"
                                                                       id="sink" required>
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
                                                        <div class="input-block-title">Унитаз на 12 литров</div>
                                                        <div class="input-block-content">
                                                            <svg class="input-icon">
                                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-toilet') }}"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                            </svg>
                                                            <div class="input-group">
                                                                <input type="text" class="select-input salvoDump"
                                                                       id="toilet" value="0" required>
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
                                                                <input type="text" class="select-input salvoDump"
                                                                       id="bathSmall" value="0" required>
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
                                                                <input type="text" class="select-input salvoDump"
                                                                       id="bathBig" value="0" required>
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
                                                                <input type="text" class="select-input salvoDump"
                                                                       id="showerCabin" value="0" required>
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
                                                                <input type="text" class="select-input"
                                                                       id="pipeOutletDepth" data-required="true"
                                                                       data-prefix="см." required>
                                                                <span class="bar"></span>
                                                                <div class="select-field" data-step="10">
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
                                                        <div class="input-block-title">Расстояние от дома до станции*
                                                        </div>
                                                        <div class="input-block-content">
                                                            <svg class="input-icon">
                                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-kran') }}"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                            </svg>
                                                            <div class="input-group">
                                                                <input type="text" class="select-input"
                                                                       id="distanceFromHomeToStation"
                                                                       data-required="true" data-prefix="м." required>
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

                                                    <div class="input-block input-block-full-width heightDifference">
                                                        <div class="input-block-title">Перепад высоты между отметкой у
                                                            дома и станцией очистки
                                                        </div>
                                                        <div class="input-block-content">
                                                            <svg class="input-icon">
                                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-toilet') }}"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                            </svg>
                                                            <div class="input-group">
                                                                <input type="text" class="select-input"
                                                                       id="heightDifference" data-prefix="см." required>
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
                                                                <span class="error-field">Ошибка. Число должно быть кратно 10</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="input-block input-block-radio input-block-full-width">
                                                        <div class="input-block-title">Способ отведения очищенной воды
                                                        </div>
                                                        <div class="input-block-content">
                                                            <div class="radio1-input">
                                                                <label class="type-button">
                                                                    <input type="radio" id="gravity" value="0"
                                                                           name="step-2">
                                                                    <div class="type-button-text">
                                                                        <div class="circle-outer">
                                                                            <div class="circle-inner"></div>
                                                                        </div>
                                                                        <p>Самотечный</p>
                                                                    </div>
                                                                </label>
                                                            </div>
                                                            <div class="radio1-input">
                                                                <label class="type-button">
                                                                    <input type="radio" id="forced" value="1"
                                                                           name="step-2">
                                                                    <div class="type-button-text">
                                                                        <div class="circle-outer">
                                                                            <div class="circle-inner"></div>
                                                                        </div>
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
                                                    <div class="select-item-box" id="result">
                                                        {{--Results--}}
                                                    </div>
                                                    <div class="select-item-connect">
                                                        <h4>Связаться с нами</h4>
                                                        <p>Результаты подбора станции очистки приблизительные, чтобы
                                                            получить более точный ответ, заполните простую форму снизу,
                                                            и наш менеджер свяжется с Вами в ближайшее время</p>
                                                        <div class="select-item-inputs">
                                                            <div class="input-group required">
                                                                <input type="text" class="name-input"
                                                                       data-required="true" required
                                                                       id="name-input-feedback-calculator">
                                                                <span class="bar"></span>
                                                                <label>Имя</label>
                                                                <div class="required-field">*</div>
                                                                <span class="error-field"
                                                                      id="name-error-feedback-calculator"></span>
                                                            </div>
                                                            <div class="input-group required">
                                                                <input type="tel" class="phone-input"
                                                                       data-required="true" required
                                                                       id="phone-input-feedback-calculator">
                                                                <span class="bar"></span>
                                                                <label>Телефон</label>
                                                                <div class="required-field">*</div>
                                                                <span class="error-field"
                                                                      id="phone-error-feedback-calculator"></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="step-footer">
                                                    <div class="step-footer-buttons">
                                                        <div class="select-item-button-submit"
                                                             id="button-submit-feedback-calculator">
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
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="single-item-desc">
                                {!! $product->text !!}
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="single-item-calc">
                                <div class="calc-item">
                                    <div class="calc-title">Тип грунта</div>
                                    <div class="radio1-input">
                                        <label class="type-button">
                                            <input type="radio" name="grunt" id="glina" value="{{ $product->glina }}"
                                                   required="required" checked="checked">
                                            <div class="type-button-text">
                                                <div class="circle-outer">
                                                    <div class="circle-inner"></div>
                                                </div>
                                                <p>Глина</p>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="radio1-input">
                                        <label class="type-button">
                                            <input type="radio" name="grunt" id="suglinok"
                                                   value="{{ $product->suglinok }}"
                                                   required="required">
                                            <div class="type-button-text">
                                                <div class="circle-outer">
                                                    <div class="circle-inner"></div>
                                                </div>
                                                <p>Суглинок</p>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="radio1-input">
                                        <label class="type-button">
                                            <input type="radio" name="grunt" id="pesok" value="{{ $product->pesok }}"
                                                   required="required">
                                            <div class="type-button-text">
                                                <div class="circle-outer">
                                                    <div class="circle-inner"></div>
                                                </div>
                                                <p>Песок</p>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="radio1-input">
                                        <label class="type-button">
                                            <input type="radio" name="grunt" id="plyvun" value="{{ $product->plyvun }}"
                                                   required="required">
                                            <div class="type-button-text">
                                                <div class="circle-outer">
                                                    <div class="circle-inner"></div>
                                                </div>
                                                <p>Плывун</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="calc-item">
                                    <div class="calc-title">Расстояние от дома до станции</div>
                                    <div class="calc-inputs">
                                        <div class="input-group">
                                            <input type="text" class="select-input select-input-hot select-input-first"
                                                   data-required="true" data-prefix='м.' id="cable" required>
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
                                            <span class="error-field">Обязательно для заполнения</span>
                                        </div>
                                        <label class="radio-input">
                                            <input type="checkbox" class="hot_cable1" value="{{ $contact->hot_cable }}">
                                            <div class="radio-input-text">
                                                <div class="radio-input-input"></div>
                                                <div class="radio-input-icon">
                                                    <svg>
                                                    
                                                        <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-checkbox') }}"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                    </svg>
                                                </div>
                                                С греющим кабелем
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="calc-item">
                                    <div class="calc-title">Расстояние от станции до точки сброса</div>
                                    <div class="calc-inputs">
                                        <div class="input-group">
                                            <input type="text" class="select-input select-input-hot select-input-second"
                                                   data-required="true" data-prefix='м.' id="station-drop-distance"
                                                   required>
                                            <span class="bar"></span>
                                            <div class="select-field">
                                                <svg class="top-icon station-drop">
                                                
                                                    <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                </svg>
                                                <svg class="bottom-icon station-drop">
                                                
                                                    <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                </svg>
                                            </div>
                                            <span class="error-field">Обязательно для заполнения</span>
                                        </div>
                                        <label class="radio-input hint-container">
                                            <input type="checkbox" class="hot_cable2" value="{{ $contact->hot_cable }}">
                                            <div class="radio-input-text">
                                                <div class="radio-input-input"></div>
                                                <div class="radio-input-icon">
                                                    <svg>
                                                    
                                                        <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-checkbox') }}"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                    </svg>
                                                </div>
                                                С греющим кабелем
                                            </div>
                                            <div class="hint-right" id="station-drop-distance-hint">
                                                <svg class="close-hint">
                                                
                                                    <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-cross') }}"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                </svg>
                                                <p>В случае, если расстояние от станции до точки сброса больше 5 метров,
                                                    рекомендуется установка греющего кабеля</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="calc-item">
                                    <div class="calc-title">Дренажерный колодец</div>
                                    <div class="radio1-input">
                                        <label class="type-button">
                                            <input type="radio" name="well" value="0" checked="checked">
                                            <div class="type-button-text">
                                                <div class="circle-outer">
                                                    <div class="circle-inner"></div>
                                                </div>
                                                <p>Нет</p>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="radio1-input">
                                        <label class="type-button">
                                            <input type="radio" name="well" id="well_200"
                                                   value="{{ $contact->well_200 }}">
                                            <div class="type-button-text">
                                                <div class="circle-outer">
                                                    <div class="circle-inner"></div>
                                                </div>
                                                <p>Есть 2,0 м</p>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="radio1-input">
                                        <label class="type-button">
                                            <input type="radio" name="well" id="well_150"
                                                   value="{{ $contact->well_150 }}">
                                            <div class="type-button-text">
                                                <div class="circle-outer">
                                                    <div class="circle-inner"></div>
                                                </div>
                                                <p>Есть 1,5 м</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="calc-item">
                                    <div class="calc-title">Опалубка</div>
                                    <div class="radio1-input">
                                        <label class="type-button">
                                            <input type="radio" name="formwork" value="0" checked="checked">
                                            <div class="type-button-text">
                                                <div class="circle-outer">
                                                    <div class="circle-inner"></div>
                                                </div>
                                                <p>Нет</p>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="radio1-input">
                                        <label class="type-button">
                                            <input type="radio" name="formwork" id="formwork"
                                                   value="{{ $contact->formwork }}">
                                            <div class="type-button-text">
                                                <div class="circle-outer">
                                                    <div class="circle-inner"></div>
                                                </div>
                                                <p>Есть</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="calc-button-box">
                                    <a href="#" class="calc-button">Рассчитать стоимость</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="reviews-content" >
                            <div class="single-item-review" itemprop="review" itemscope itemtype="https://schema.org/Review">
                                <div class="review-info">
                                    <div class="review-count">Отзывы <span>({{ $comments->total() }})</span></div>
                                    <button scroll-to=".review-form-box" class="add-review">Добавить отзыв</button>
                                </div>
                                @foreach($comments as $comment)
                                    <div class="review">
                                        <h4 class="review-title" itemprop="author">{{ $comment->name }}</h4>
                                        <div class="review-rating">
                                            <span class="review-datetime">
                                                <meta itemprop="datePublished" content="{{ $comment->created_at->format('d.m.Y') }}">
                                                {{ $comment->created_at->format('d.m.Y') }}
                                            </span>
                                        </div>
                                        <p class="review-content">
                                            {{ $comment->text }}
                                        </p>
                                        <div class="review-link">
                                            <p>Читать полностью</p>
                                            <div class="icons">
                                                <svg class="default-icon">
                                                
                                                    <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                </svg>
                                                <svg class="hover-icon">
                                                
                                                    <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow') }}"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="pagination">
                                    {{ $comments->fragment('otzyvy')->links() }}
                                </div>
                                <div class="review-form-box">
                                    <div class="review-form-title">Добавить отзыв</div>
                                    <div class="review-form">
                                        <div class="input-row">
                                            <div class="input-group required">
                                                <input type="text" class="name-input" id="name-input-comment" required>
                                                <span class="bar"></span>
                                                <label>Имя</label>
                                                <div class="required-field">*</div>
                                                <span class="name-error-comment"></span>
                                            </div>
                                            <div class="input-group">
                                                <input type="text" class="email-input" id="contacts-input-comment"
                                                       required>
                                                <span class="bar"></span>
                                                <label>Email</label>
                                                <div class="required-field">*</div>
                                                <span class="contacts-error-comment"></span>
                                            </div>
                                        </div>
                                        <div class="input-group textarea">
                                            <textarea class="textarea-input" id="text-input-comment"
                                                      required></textarea>
                                            <span class="bar"></span>
                                            <label>Отзыв</label>
                                            <div class="required-field">*</div>
                                            <span class="text-error-comment"></span>
                                        </div>
                                        <div class="submit-box">
                                            <button class="button-submit button-submit-review"
                                                    id='button-submit-comment'
                                                    type="submit">Добавить
                                                отзыв
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="single-item-pay">
                                <div class="pay-box">
                                    <div class="pay-title">Как оплатить?</div>
                                    <div class="pay-items">
                                        <div class="pay-item">
                                            <svg>
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-pay1') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <p>Банковской картой через сайт</p>
                                        </div>

                                        <div class="pay-item">
                                            <svg>
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-pay2') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <p>Наличными или банковской картой у нас в офисе</p>
                                        </div>

                                        <div class="pay-item">
                                            <svg>
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-pay3') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <p>Наличными при доставке</p>
                                        </div>

                                        <div class="pay-item">
                                            <svg style="margin-left: -14px;">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-pay4') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <p>По счету - наш менеджер выставит счет как на физ. так и на юр. лицо</p>
                                        </div>
                                    </div>
                                    <div class="pay-questions-box">
                                        <div class="pay-questions">
                                            <div class="pay-question-box">
                                                <div class="pay-question">
                                                    <h4>Когда ждать доставку?</h4>
                                                    <p>Доставка осуществляется в течение 1-3х рабочих дней после
                                                        оформления
                                                        заказа, или в более поздние сроки по вашему желанию
                                                        (приобретенное у
                                                        нас оборудование может бесплатно храниться на нашем складе до
                                                        6-ти
                                                        месяцев по договору ответственного хранения). Приобретайте
                                                        выгодно
                                                        оборудование зимой.</p>
                                                </div>

                                                <div class="pay-question">
                                                    <h4>Возврат или обмен</h4>
                                                    <p>Наступил гарантийный случай? Хотите оформить возврат или обмен?
                                                        Обратитесь за помощью к нашему менеджеру мы незамедлительно все
                                                        исправим: бесплатно доставим новое оборудование взамен
                                                        бракованного
                                                        или вернем вам деньги.</p>
                                                </div>
                                            </div>
                                            <div class="pay-question-box">
                                                <div class="pay-question stretch">
                                                    <h4>Сколько стоит доставка?</h4>
                                                    <p>Доставка товара в пределах 80 км от КАД осуществляется бесплатно
                                                        в
                                                        течение 3-х рабочих дней с момента заказа.</p>
                                                    <p>Доставка товара дальше 80 км от КАД рассчитывается менеджером
                                                        после
                                                        оформления заказа и осуществляется также в сроки не более 3-х
                                                        рабочих дней с момента звонка менеджера.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="reviews-content">
                            <div class="single-item-pay">
                                <div class="pay-box">
                                    <div class="pay-questions-box">
                                        <div class="pay-questions">
                                            <div class="pay-question-box">
                                                <div class="pay-question">
                                                    <h3>Монтажная схема</h3>
                                                    <p>


                                                        @if($documentationToProducts)
                                                            @foreach( $documentationToProducts as $documentationToProduct)
                                                                @foreach( App\Models\Documentation::where('id', '=', $documentationToProduct->id_documentation)->get() as $documentation)
                                                                    @if($documentation->type == 1)
                                                                        {!! $documentation->text !!}
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        @endif


                                                    </p>
                                                </div>

                                                <div class="pay-question">
                                                    <h3>Инструкция по монтажу</h3>
                                                    <p>


                                                        @if($documentationToProducts)
                                                            @foreach( $documentationToProducts as $documentationToProduct)
                                                                @foreach( App\Models\Documentation::where('id', '=', $documentationToProduct->id_documentation)->get() as $documentation)
                                                                    @if($documentation->type == 2)
                                                                        {!! $documentation->text !!}
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        @endif


                                                    </p>
                                                </div>
                                            </div>
                                            <div class="pay-question-box">
                                                <div class="pay-question">
                                                    <h3>Инструкция по шеф-монтажу</h3>
                                                    <p>


                                                        @if($documentationToProducts)
                                                            @foreach( $documentationToProducts as $documentationToProduct)
                                                                @foreach( App\Models\Documentation::where('id', '=', $documentationToProduct->id_documentation)->get() as $documentation)
                                                                    @if($documentation->type == 3)
                                                                        {!! $documentation->text !!}
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        @endif

                                                    </p>
                                                </div>

                                                <div class="pay-question">
                                                    <h3>Технический паспорт</h3>
                                                    <p>


                                                        @if($documentationToProducts)
                                                            @foreach( $documentationToProducts as $documentationToProduct)
                                                                @foreach( App\Models\Documentation::where('id', '=', $documentationToProduct->id_documentation)->get() as $documentation)
                                                                    @if($documentation->type == 4)
                                                                        {!! $documentation->text !!}
                                                                    @endif
                                                                @endforeach
                                                            @endforeach
                                                        @endif


                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--<section id="endMenu" style="height: 2px"></section>-->
    @if(count($analogProducts))
        <section id="card-two">

            <div class="wrapper">
                <div class="title-box">
                    <div class="title-content">
                        <h2 class="header-bigtitle">Вам также могут подойти</h2>
                    </div>
                </div>
                <div class="analogs">
                    @foreach($analogProducts as $analogProduct)
                        @if($analogProduct->category)
                            @php($sale = $analogProduct->sale())
                            @php($image = $analogProduct->image())
                            <div class="analog @if($sale) analog-sale @endif">
                                <a href="{{route('catalog.product', [$analogProduct->category->link, $analogProduct->link])}}"
                                   class="analog-img">
                                    @if($image)
                                        <img class="lazy" data-src="{{ asset('/min/' . $image->image) }}" alt="{{ $image->alt }}">
                                    @endif
                                    @if($sale)
                                        <span class="sale">{{ $sale->discount }}% акция</span>
                                    @endif
                                </a>
                                <div class="analog-footer">
                                    <div class="analog-content">
                                        <a href="{{route('catalog.product', [$analogProduct->category->link, $analogProduct->link])}}"
                                           class="analog-title">{{ $analogProduct->name }}</a>
                                        <p class="analog-oldprice">
                                            @if($sale)
                                                <strike>{{ number_format($sale->price, 0, '.', ' ') }} руб.</strike>
                                            @endif
                                        </p>
                                        <div class="analog-price-box">
                                            <div class="analog-price-box-inner">
                                                <p class="analog-price">
                                                    от {{ number_format($analogProduct->price(), 0, '.', ' ') }}
                                                    руб.</p>
                                                <div class="reviews">
                                                    <a href="{{route('catalog.product', [$analogProduct->category->link, $analogProduct->link . '#otzyvy'])}}"
                                                       class="comments">
                                                        <svg>
                                                            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-dialog') }}"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                        </svg>
                                                        <span class="value">{{ $analogProduct->comments->count() }}</span>
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
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @isset($viewedProducts)
        <section id="card-three">
            <div class="title-box">
                <div class="title-content">
                    <h2 class="header-bigtitle">Вы уже смотрели</h2>
                </div>
            </div>
            <div class="slider-viewed-box">
                <div class="custom-prev-arrow slider4">
                    <svg class="default-arrow">
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                    <svg class="hover-arrow">
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                </div>
                <div class="slider-viewed">
                    @foreach($viewedProducts as $viewedProduct)
                        @isset($viewedProduct->category)
                            @php($sale = $viewedProduct->sale())
                            @php($image = $viewedProduct->image())
                            <div class="viewed-item @if($sale) viewed-item-sale @endif">
                                <a href="{{route('catalog.product', [$viewedProduct->category->link, $viewedProduct->link])}}"
                                   class="analog-img">
                                    @if($image)
                                        <img class="lazy" data-src="{{ asset('/min/' . $image->image) }}" alt="{{ $image->alt }}">
                                    @endif
                                    @if($sale)
                                        <span class="sale">{{ $sale->discount }}% акция</span>
                                    @endif
                                </a>
                                <div class="analog-footer">
                                    <div class="analog-content">
                                        <a href="{{route('catalog.product', [$viewedProduct->category->link, $viewedProduct->link])}}"
                                           class="analog-title">{{ $viewedProduct->name }}</a>
                                        <p class="analog-oldprice">
                                            @if($sale)
                                                <strike>{{ number_format($sale->price, 0, '.', ' ') }} руб.</strike>
                                            @endif
                                        </p>
                                        <div class="analog-price-box">
                                            <div class="analog-price-box-inner">
                                                <p class="analog-price">
                                                    от {{ number_format($viewedProduct->price(), 0, '.', ' ') }}
                                                    руб.</p>
                                                <div class="reviews">
                                                    <a href="{{route('catalog.product', [$viewedProduct->category->link, $viewedProduct->link . '#otzyvy'])}}"
                                                       class="comments">
                                                        <svg>
                                                            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-dialog') }}"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                        </svg>
                                                        <span class="value">{{ $viewedProduct->comments->count() }}</span>
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
                        @endisset
                    @endforeach
                </div>
                <div class="custom-next-arrow slider4">
                    <svg class="default-arrow">
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                    <svg class="hover-arrow">
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                </div>
                <div class="custom-dots slider4"></div>
            </div>
        </section>
    @endisset
    <section id="card-four">
        <div class="wrapper">
            <div class="title-box">
                <div class="title-content">
                    <h2 class="header-bigtitle">Наши автономные канализации прослужат и Вашим детям</h2>
                </div>
                <div class="subtitle">При качественном монтаже срок службы септика достигает 50 лет</div>
            </div>
        </div>
        <div class="card-four-outer">
            <div class="card-four-wrapper">
                <div class="masters">
                    <div class="card">
                        <div class="card-text">
                            <div class="card-title">
                                <span class="card-title-text">Сертифициро&shy;ванные мастера</span>
                            </div>
                            <p>В штате компании профессионалы своего дела с опытом более 7 лет. Сейчас у нас 3 бригады
                                по 5-7 человек. Поэтому мы можем осуществлять до 60 монтажей в месяц. Все мастера прошли
                                обучение и сертификацию и имеют опыт от 100 монтажей систем автономной канализации.</p>
                        </div>
                    </div>
                    <div class="master-img"><img class="lazy" data-src="{{ asset('/img/card/masters/master1.jpg') }}" alt=""></div>
                    <div class="master-img"><img class="lazy" data-src="{{ asset('/img/card/masters/master2.jpg') }}" alt=""></div>
                </div>
                <div class="instruments">
                    <div class="card">
                        <div class="card-text">
                            <div class="card-title">
                                <span class="card-title-text">Качественно&shy;е оборудование</span>
                            </div>
                            <p>Производим монтаж септиков строго в соответствии с предписаниями производителя и с учетом
                                всех технических особенностей участка. Мы используем качественные материалы при монтаже,
                                что обеспечивает надежность монтажа и позволяет нам с уверенностью давать гарантию на 3
                                года.</p>
                        </div>
                    </div>
                    <div class="instrument-img"><img class="lazy" data-src="{{ asset('/img/card/instruments/instrument1.jpg') }}"
                                                     alt=""></div>
                    <div class="instrument-img"><img class="lazy" data-src="{{ asset('/img/card/instruments/instrument2.jpg') }}"
                                                     alt=""></div>
                </div>
            </div>
        </div>
    </section>

    <section id="card-five" style="background-image: url('{{ asset('/img/5.jpg') }}');">
        <div class="card-five-content">
            <div class="card-five-title">
                <h2>Отлично работающая автономная канализация с гарантией</h2>
            </div>
            <span class="guarantee">36 месяцев гарантия на монтаж и оборудование</span>
            <span class="card-five-text">В случае обнаружения недостатков в течение всего гарантийного срока мы бесплатно приедем и исправим их за свой счет.</span>
            <a href="#" class="card-five-button button-callback">Оставить заявку</a>
        </div>
    </section>

    <section id="fourteen">
        @include('blocks.works')
    </section>

    @include('blocks.faq')

@endsection

@section('script')
    @include('pages.catalog.product_script')
    <script>
        var plyvun = {{ $product->plyvun ?? 0}};
        var pesok = {{ $product->pesok ?? 0}};
        var suglinok = {{ $product->suglinok ?? 0}};
        var glina = {{ $product->glina ?? 0}};
        var well_150 = {{ $contact->well_150 ?? 0}};
        var well_200 = {{ $contact->well_200 ?? 0}};
        var formwork = {{ $contact->formwork ?? 0}};
        var cable = {{ $contact->cable ?? 0}};
        var cable2 = {{ $contact->cable2 ?? 0}};
        var hot_cable = {{ $contact->hot_cable ?? 0}};

        var isStationDropDistanceHintShowed = false;
        var hintTimeout;

        function checkForHintLaunch() {
            var hotCable1Check = $('.hot_cable1');
            var hotCable2Check = $('.hot_cable2');
            var stationDropDistanceHint = $('#station-drop-distance-hint');
            var hotCableRecommendMeters = 5;
            var hintVisibilityTimeMillis = 7000;

            if (isStationDropDistanceHintShowed
                && !hotCable2Check.is(':checked'))
                hotCable2Check.first().prop('checked', true);
            if (!isStationDropDistanceHintShowed
                && !hotCable2Check.is(':checked'))
                if ($('#station-drop-distance').val().match(/\d+/g))
                    if ($('#station-drop-distance').val().match(/\d+/g).join('') > hotCableRecommendMeters) {
                        hotCable2Check.first().prop('checked', true);
                        stationDropDistanceHint.toggleClass('hint-visible', true);
                        isStationDropDistanceHintShowed = true;
                        hintTimeout = setTimeout(function () {
                            stationDropDistanceHint.toggleClass('hint-visible', false);
                            isStationDropDistanceHintShowed = false;
                        }, hintVisibilityTimeMillis);
                    }
        }

        function checkBoxControl() {
            $('#station-drop-distance').on('change', function () {
                checkForHintLaunch();
            });
            $('.top-icon.station-drop').on('click', function () {
                checkForHintLaunch();
            });
            $('.bottom-icon.station-drop').on('click', function () {
                checkForHintLaunch();
            });
            $('#station-drop-distance-hint .close-hint').on('click', function (e) {
                e.preventDefault();
                clearTimeout(hintTimeout);
                $('#station-drop-distance-hint').toggleClass('hint-visible', false);
                isStationDropDistanceHintShowed = false;
            });
        }

        function radioProduct() {
            var group1 = $('.single-item-type input[name="depth"]');
            var group2 = $('.single-item-type input[name="water"]');


            group1.first().prop('checked', true);
            group2.first().prop('checked', true);

            updateTable($(this));

            group1.on('change', function () {
                updateTable($(this));
            });

            group2.on('change', function () {
                updateTable($(this));
            });
        }

        function updateTable() {
            $.ajax({
                url: '/katalog',
                data: {
                    product_id: {{ $product->id }},
                    destination: $("input[name='water']:checked").val(),
                    glubina: $("input[name='depth']:checked").val()
                },
                type: 'post',
                success: function (data) {
                    data['annotation'] ? $('#annotation').html(data['annotation']) : $('#annotation').html('-');
                    data['massa'] ? $('#massa').html(data['massa'] + ' кг.') : $('#massa').html('-');
                    data['power'] ? $('#power').html(data['power'] + ' кВт/сут') : $('#power').html('-');
                    data['gabarit'] ? $('#gabarit').html(data['gabarit'] + ' мм.') : $('#gabarit').html('-');
                    data['glubina'] ? $('#glubina').html(data['glubina'] + ' см.') : $('#glubina').html('-');
                    data['volume'] ? $('#volume').html(data['volume'] + ' л.') : $('#volume').html('-');
                    data['proizvoditelnost'] ? $('#proizvoditelnost').html(data['proizvoditelnost'] + ' м3/сут.') : $('#proizvoditelnost').html('-');
                    var oldPrice = new Intl.NumberFormat('ru-RU').format(data["price"]);
                    if (data['discount'] != 0) {
                        var price = new Intl.NumberFormat('ru-RU').format(parseInt(data["price"] * ((100 - data["discount"]) / 100)));
                        $('#table-price').html('<div class="sale"><span>' + price + ' руб.</span> / <strike>' + oldPrice + ' руб.</strike></div>');
                        $('#price').html('<div class="single-item-sales"><strike>' + oldPrice + ' руб.</strike><div class="sale">Акция <span class="sale-value">' + data["discount"] + '%</span></div></div><div class="single-item-price">' + price + ' руб.</div>');
                    } else {
                        $('#table-price').html('<div class="value">' + oldPrice + ' руб.</div>');
                        $('#price').html('<div class="single-item-price">' + oldPrice + ' руб.</div>');
                    }
                    if (data['destination'] == 0) {
                        var text = 'Самотечный способ - отведение очищенной воды самотеком. Выброс возможен на глубине 50-60 см. на поля фильтрации или дренажный колодец.';
                        $('.destination-tooltip').html(text);
                        $('#table-water-tooltip').attr('data-text', text);
                        $('#table-water').html('Cамотечный способ');
                    } else {
                        var text = 'Принудительный способ - отведение очищенной воды при помощи дренажного насоса, из дополнительной емкости внутри станции. При таком способе вода попадает на поверхность с максимальной температурой, что позволяет в зимнее время отводить воду на грунт.';
                        $('.destination-tooltip').html(text);
                        $('#table-water-tooltip').attr('data-text', text);
                        $('#table-water').html('Принудительный способ');
                    }
                    $('#modtitle').html(data['modtitle']);
                    modification_id = data['id'];
                }
            })
        }

        $(document).ready(function () {
            var search = window.location.search;
            console.log('ok')
            if (search) {
                search = search.slice(1).split('&');
                search.forEach(function (item, i) {
                    var value = item.split('=');
                    if (i === 0) {
                        $('input[name=depth][value=' + value[1] + ']').prop('checked', true)
                    } else {
                        $('input[name=water][value=' + value[1] + ']').prop('checked', true).hide(0)
                    }
                })
            }
        })

        // popup Узнать подробнее

        $(".window-call-read-more").click(function (e) {
            e.preventDefault();
            $('.modal-popup-read-more').addClass('popup-open-read-more');
            $('.read-more-block').addClass('active');

            $(document).mouseup(function (e) {
                var div = $(".read-more-block");
                if (!div.is(e.target)
                    && div.has(e.target).length === 0) {
                    $('.modal-popup-read-more').removeClass('popup-open-read-more');
                    $('.read-more-block').removeClass('active');
                }
            });
        });

        $(".modal-popup-read-more .popup-close").click(function () {
            $('.modal-popup-read-more').removeClass('popup-open-read-more');
            $('.read-more-block').removeClass('active');
        });

        $(window).resize(function () {
            if ($(window).width() <= 960) {
                $('#tooltip-top').css('top', 'initial');
                $('#tooltip-top').removeClass('type-tooltip-top');
                $('#tooltip-top').addClass('type-tooltip');
            }
        });

    </script>
    <script src="{{ asset('/js/share.js') }}"></script>
@endsection
