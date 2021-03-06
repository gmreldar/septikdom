@extends('index')

@section('head')
    <title>{{ $product->title }}</title>
    <meta name="keywords" content="{{ $product->keywords }}">
    <meta name="description" content="{{ $product->description }}">
    @if($product->image)

    @endif
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
                <div class="single-product" itemscope itemtype="https://schema.org/Product">
                    <div class="single-product-title" >
                        <h1 itemprop="name">{{ $product->name }}</h1>
                        <meta itemprop="name" content="{{ $product->name }}" />
                        <meta itemprop="description" content="{{ $product->description }}" />
                        <div itemprop="offers" itemtype="https://schema.org/Offer" itemscope>
                            <link itemprop="url" href="{{url()->current()}}" />
                            <meta itemprop="priceCurrency" content="RUB" />
                            @if ($product->price)
                                <meta itemprop="price" content="{{ $product->price }}" />
                            @endif
                        </div>
                    </div>
                    <div class="single-product-tabs">
                        <div class="tabs-box">
                            <div class="tab tab-active">?? ????????????</div>
                            <div class="tab">????????????????</div>
                            <div class="tab" id="install-price">?????????????????? ??????????????</div>
                            <div class="tab" id="reviews">???????????? <span>({{ $comments->total() }})</span></div>
                            <div class="tab">???????????????? ?? ????????????</div>
                            <div class="tab" id="documentation">????????????????????????</div>
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
                                                    <link itemprop="image" href="{{ asset($image->image) }}" />
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
                                            <span>?????????????? ????????????</span>
                                            <div class="type-svg-box">
                                                <div class="type-svg-box-inner">
                                                    <svg>
                                                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                    </svg>
                                                </div>
                                                <div class="type-tooltip destination-tooltip">?????????????? ???????????? - ??????????????
                                                    ????
                                                    ?????????????? ??????????????????????????, ???????????????????? ?????????????????????????????? ?????????? ?? ????????????
                                                    ??????????????.
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
                                                                ????.
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="single-item-type">
                                        <div class="type-title">
                                            <span>?????? ????????????????????</span>
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
                                                            <p>????????????????????</p>
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
                                                            <p>????????????????????????????</p>
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
                                                    <a href="#" class="single-item-order">????????????????</a>
                                                </div>
                                                <div style="margin-bottom: 10px; margin-top: 10px">
                                                    <a href="#" class="window-call-read-more">???????????? ??????????????????</a>
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
                                                <h2>???????????? ??????????????????</h2>
                                                <div class="form">
                                                    <form method="post" action="/katalog/readMore">
                                                        {!! csrf_field() !!}
                                                        <input type="text" name="product_id" style="display: none"
                                                               value="{!! $product->id !!}">
                                                        <div class="input-group">
                                                            <input type="text" name="name" class="name-input"
                                                                   id="name-input" required>
                                                            <span class="bar"></span>
                                                            <label>??????*</label>
                                                            <span class="name-error"></span>
                                                        </div>
                                                        <div class="input-group">
                                                            <input type="tel" name="phone" class="phone-input"
                                                                   id="phone-input" required>
                                                            <span class="bar"></span>
                                                            <label>??????????????*</label>
                                                            <span class="phone-error"></span>
                                                        </div>
                                                        <div class="wrap">
                                                            <button class="button-submit button-submit-order-popup"
                                                                    id='button-submit' type="submit">???????????? ??????????????????
                                                            </button>
                                                            {{--<button class="button-submit button-submit-order-popup">???????????? ??????????????????</button>--}}
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-item-stats">
                                    <div class="table-characteristics">
                                        <div class="table-characteristics-title">????????????????????????????</div>
                                        <div class="table-outer">
                                            <div class="table">
                                                <div class="table-row without-help">
                                                    <div class="characteristic-name">
                                                        <span>??????????????????????</span>
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
                                                        <span>?????? ????????????????????</span>
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
                                                        <span>????????</span>
                                                        <div class="type-svg-box">
                                                            <div class="type-svg-box-inner">
                                                                <svg>
                                                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="type-tooltip">???????? ?????????????? ???????????????????????? ??????
                                                                ??????????
                                                                ?????????????????????????????? ????????????????????????. ?????? ????????????????????????????
                                                                ??????????????????
                                                                ???????? ???????????????????? ?????????????? ?? ?????????????????? ?????????? ???????????? ??
                                                                ??????????????????
                                                                ????????????????????????.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="characteristic-value" id="table-price">
                                                    </div>
                                                </div>

                                                <div class="table-row with-help">
                                                    <div class="characteristic-name">
                                                        <span>????????????????????????????????????</span>
                                                        <div class="type-svg-box">
                                                            <div class="type-svg-box-inner">
                                                                <svg>
                                                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="type-tooltip">???????????????????????? ?????????? ????????????,
                                                                ???????????????????????????????? ???????????????? ?????????????? ?? ??????????.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="characteristic-value" id="proizvoditelnost"></div>
                                                </div>
                                                <div class="table-row with-help">
                                                    <div class="characteristic-name">
                                                        <span>???????????????? ??????????</span>
                                                        <div class="type-svg-box">
                                                            <div class="type-svg-box-inner">
                                                                <svg>
                                                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="type-tooltip">???????????????????????? ???????????????????? ????????????,
                                                                ?????????????? ?????????? ???????????????? ?? ?????????????????????? ???? ????????????????
                                                                ????????????????????
                                                                ??????????????. ???????? ?? ???????? ???????????????????????????? ??????????????
                                                                ??????????????????????????
                                                                ???????? ?? ?????????????? ???????????????????? ???????????????? ?????????????? ???? ????????????????
                                                                ?????????????????????????? ?????????????????? ????????????.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="characteristic-value" id="volume"></div>
                                                </div>
                                                <div class="table-row with-help">
                                                    <div class="characteristic-name">
                                                        <span>?????????????? ????????????</span>
                                                        <div class="type-svg-box">
                                                            <div class="type-svg-box-inner">
                                                                <svg>
                                                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="type-tooltip">???????????????????????? ???????????????????? ????
                                                                ????????????????
                                                                ?????????????????????? ?????????? ???? ?????????????? ???????? ??????????. ???????????????????? ??
                                                                ??????????
                                                                ???????????? ???????????????????? ?????????????????????????????? ?????????? ?? ????????????????
                                                                ????????????
                                                                ?????????????? ??????????????.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="characteristic-value" id="glubina"></div>
                                                </div>
                                                <div class="table-row with-help">
                                                    <div class="characteristic-name">
                                                        <span>??????????????</span>
                                                        <div class="type-svg-box">
                                                            <div class="type-svg-box-inner">
                                                                <svg>
                                                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="type-tooltip">??????????*????????????*????????????</div>
                                                        </div>
                                                    </div>
                                                    <div class="characteristic-value" id="gabarit"></div>
                                                </div>
                                                <div class="table-row with-help">
                                                    <div class="characteristic-name">
                                                        <span>?????????????????????? ????????????????????????????</span>
                                                        <div class="type-svg-box">
                                                            <div class="type-svg-box-inner">
                                                                <svg>
                                                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="type-tooltip">???????????????? ???????????? ????????????????????????????.
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="characteristic-value" id="power"></div>
                                                </div>
                                                <div class="table-row with-help">
                                                    <div class="characteristic-name">
                                                        <span>??????????</span>
                                                        <div class="type-svg-box">
                                                            <div class="type-svg-box-inner">
                                                                <svg>
                                                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                                </svg>
                                                            </div>
                                                            <div class="type-tooltip">?????? ????????????????????????.</div>
                                                        </div>
                                                    </div>
                                                    <div class="characteristic-value" id="massa"></div>
                                                </div>

                                                <div class="table-row with-help">
                                                    <div class="characteristic-name">
                                                        <span>???????????? "?????? ????????"</span>
                                                        <div class="type-svg-box">
                                                            <div class="type-svg-box-inner">
                                                                <svg>
                                                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                                </svg>
                                                            </div>
                                                            <div id="tooltip-top" class="type-tooltip-top"
                                                                 style="top: -220px">???????????? ???????????????? ???????????? ????
                                                                ??????????????????????
                                                                ??????????????, ???????????? ?????????????? ?? ????????????????, ?????????????????? ??????????
                                                                ?????????????????????? 6 ????????????, ?????????????? ?????????????????? ????????????,
                                                                ??????????-???????????????????? ????????????. ?????? ?????????? ?????????????? ??????????????
                                                                ????????????????
                                                                ???? ?????????????? ????????????????????? ?????????????????
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="characteristic-value">{!! number_format($estimated_cost,0,'', ' ') !!}
                                                        ??????.
                                                    </div>
                                                </div>
                                                <div class="table-row without-help">
                                                    <div class="characteristic-name">
                                                        <span>?????????????? ????????????????</span>
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
                                        <h2 style="text-align: left; padding-left: 50px; margin-bottom: 30px;">????????
                                            ??????????????????????
                                            ??????????</h2>
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
                                                            <img src="{{ asset($image->image) }}"
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
                                    <button class="ripple-button single-item-order">???????????????? ????????????</button>
                                    <button class="ripple-button single-item-order">?????????????? ????????????????</button>
                                </div>

                                <style>
                                    .rating-area {
                                        overflow: hidden;
                                        margin-left: 70%;
                                        margin-top: -5px;
                                    }
                                    .rating-area:not(:checked) > input {
                                        display: none;
                                    }
                                    .rating-area:not(:checked) > label {
                                        float: right;
                                        width: 25px;
                                        padding: 0;
                                        cursor: default;
                                        font-size: 20px;
                                        /*line-height: 32px;*/
                                        color: gold;
                                        text-shadow: 1px 1px #bbb;
                                    }
                                    .rating-area:not(:checked) > label:before {
                                        content: '???';
                                    }
                                    .rating-area > input:checked ~ label {
                                        color: gold;
                                        text-shadow: 1px 1px #c60;
                                    }
                                    .rating-area:not(:checked) > label:hover,
                                    .rating-area:not(:checked) > label:hover ~ label {
                                        color: gold;
                                    }
                                    .rating-area > input:checked + label:hover,
                                    .rating-area > input:checked + label:hover ~ label,
                                    .rating-area > input:checked ~ label:hover,
                                    .rating-area > input:checked ~ label:hover ~ label,
                                    .rating-area > label:hover ~ input:checked ~ label {
                                        color: gold;
                                        text-shadow: 1px 1px goldenrod;
                                    }
                                    .rate-area > label:active {
                                        position: relative;
                                    }
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
                                    <div class="social-title">????????????????????:</div>
                                    <div class="social-icons">
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
                                                    <h2>???????????? ???? ??????????????</h2>
                                                    <p>???????????????? ?????????????????? ????????????, ???????? ?????????????????? ????????????????. ???????? ??????
                                                        ???????????? ???? ?????????????? ?????????? ?? ?????? ?????????? ???????????? ?????????? ???? ??????????????
                                                        ?????????????? ??????????????, ?????????????????? ?? ???????? ???? ???????????????? <a
                                                                href="tel:+78123857383">+7 (812) 385 73 83</a></p>
                                                    <button class="button-submit" type="submit">????</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wrapper">
                                        <div class="title-box">
                                            <div class="title-content">
                                                <h2 class="title">??????????????????????</h2>
                                                <span>???????????????????? ??????????????????</span>
                                            </div>
                                            <span class="subtitle">???????????? ?????????????? ?????????????? ???? 2 ????????????</span>
                                        </div>
                                        <div class="calculator-box">
                                            <div class="calc-step calc-step-active calc-step-1">
                                                <div class="step-header">1. ???????????????????? ???? ???????????????????? ?????????????????????????? ??
                                                    ?????????? ????????
                                                </div>
                                                <div class="step-content">
                                                    <div class="input-block">
                                                        <div class="input-block-title">???????????????????? ?????????????? ?? ????????*</div>
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
                                                                <span class="error-field">???????? ?????????????????????? ?????? ????????????????????</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="input-block">
                                                        <div class="input-block-title">???????????????? ???? 15 ????????????</div>
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
                                                                <span class="error-field">????????????</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="input-block">
                                                        <div class="input-block-title">???????????? ???? 12 ????????????</div>
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
                                                                <span class="error-field">????????????</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="input-block">
                                                        <div class="input-block-title">?????????? ???? 200 ????????????</div>
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
                                                                <span class="error-field">????????????</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="input-block">
                                                        <div class="input-block-title">?????????? ?????????? 200 ????????????</div>
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
                                                                <span class="error-field">????????????</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="input-block">
                                                        <div class="input-block-title">?????????????? ????????????</div>
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
                                                                <span class="error-field">????????????</span>
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
                                                <div class="step-header">2. ???????????????? ????????????????????</div>
                                                <div class="step-content">
                                                    <div class="input-block">
                                                        <div class="input-block-title">?????????????? ???????????? ??????????*</div>
                                                        <div class="input-block-content">
                                                            <svg class="input-icon">
                                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-peoples') }}"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                            </svg>
                                                            <div class="input-group">
                                                                <input type="text" class="select-input"
                                                                       id="pipeOutletDepth" data-required="true"
                                                                       data-prefix="????." required>
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
                                                                <span class="error-field">???????? ?????????????????????? ?????? ????????????????????</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="input-block">
                                                        <div class="input-block-title">???????????????????? ???? ???????? ???? ??????????????*
                                                        </div>
                                                        <div class="input-block-content">
                                                            <svg class="input-icon">
                                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-kran') }}"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                            </svg>
                                                            <div class="input-group">
                                                                <input type="text" class="select-input"
                                                                       id="distanceFromHomeToStation"
                                                                       data-required="true" data-prefix="??." required>
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
                                                                <span class="error-field">???????? ?????????????????????? ?????? ????????????????????</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="input-block input-block-full-width heightDifference">
                                                        <div class="input-block-title">?????????????? ???????????? ?????????? ???????????????? ??
                                                            ???????? ?? ???????????????? ??????????????
                                                        </div>
                                                        <div class="input-block-content">
                                                            <svg class="input-icon">
                                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-toilet') }}"
                                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                            </svg>
                                                            <div class="input-group">
                                                                <input type="text" class="select-input"
                                                                       id="heightDifference" data-prefix="????." required>
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
                                                                <span class="error-field">????????????. ?????????? ???????????? ???????? ???????????? 10</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="input-block input-block-radio input-block-full-width">
                                                        <div class="input-block-title">???????????? ?????????????????? ?????????????????? ????????
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
                                                                        <p>????????????????????</p>
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
                                                                        <p>????????????????????????????</p>
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
                                                            ?????????????????? ?????????????? ??????????????
                                                        </div> -->
                                                        <div class="button-select-station button-select-station-disabled">
                                                            ?????????????????? ??????????????
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
                                                <div class="step-header">3. ?????????????????? ??????????????</div>
                                                <div class="step-content">
                                                    <div class="select-item-box" id="result">
                                                        {{--Results--}}
                                                    </div>
                                                    <div class="select-item-connect">
                                                        <h4>?????????????????? ?? ????????</h4>
                                                        <p>???????????????????? ?????????????? ?????????????? ?????????????? ??????????????????????????????, ??????????
                                                            ???????????????? ?????????? ???????????? ??????????, ?????????????????? ?????????????? ?????????? ??????????,
                                                            ?? ?????? ???????????????? ???????????????? ?? ???????? ?? ?????????????????? ??????????</p>
                                                        <div class="select-item-inputs">
                                                            <div class="input-group required">
                                                                <input type="text" class="name-input"
                                                                       data-required="true" required
                                                                       id="name-input-feedback-calculator">
                                                                <span class="bar"></span>
                                                                <label>??????</label>
                                                                <div class="required-field">*</div>
                                                                <span class="error-field"
                                                                      id="name-error-feedback-calculator"></span>
                                                            </div>
                                                            <div class="input-group required">
                                                                <input type="tel" class="phone-input"
                                                                       data-required="true" required
                                                                       id="phone-input-feedback-calculator">
                                                                <span class="bar"></span>
                                                                <label>??????????????</label>
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
                                                            ??????????????????
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
                                    <div class="calc-title">?????? ????????????</div>
                                    <div class="radio1-input">
                                        <label class="type-button">
                                            <input type="radio" name="grunt" id="glina" value="{{ $product->glina }}"
                                                   required="required" checked="checked">
                                            <div class="type-button-text">
                                                <div class="circle-outer">
                                                    <div class="circle-inner"></div>
                                                </div>
                                                <p>??????????</p>
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
                                                <p>????????????????</p>
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
                                                <p>??????????</p>
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
                                                <p>????????????</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="calc-item">
                                    <div class="calc-title">???????????????????? ???? ???????? ???? ??????????????</div>
                                    <div class="calc-inputs">
                                        <div class="input-group">
                                            <input type="text" class="select-input select-input-hot select-input-first"
                                                   data-required="true" data-prefix='??.' id="cable" required>
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
                                            <span class="error-field">?????????????????????? ?????? ????????????????????</span>
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
                                                ?? ?????????????? ??????????????
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="calc-item">
                                    <div class="calc-title">???????????????????? ???? ?????????????? ???? ?????????? ????????????</div>
                                    <div class="calc-inputs">
                                        <div class="input-group">
                                            <input type="text" class="select-input select-input-hot select-input-second"
                                                   data-required="true" data-prefix='??.' id="station-drop-distance"
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
                                            <span class="error-field">?????????????????????? ?????? ????????????????????</span>
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
                                                ?? ?????????????? ??????????????
                                            </div>
                                            <div class="hint-right" id="station-drop-distance-hint">
                                                <svg class="close-hint">

                                                    <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-cross') }}"
                                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                </svg>
                                                <p>?? ????????????, ???????? ???????????????????? ???? ?????????????? ???? ?????????? ???????????? ???????????? 5 ????????????,
                                                    ?????????????????????????? ?????????????????? ???????????????? ????????????</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="calc-item">
                                    <div class="calc-title">?????????????????????? ??????????????</div>
                                    <div class="radio1-input">
                                        <label class="type-button">
                                            <input type="radio" name="well" value="0" checked="checked">
                                            <div class="type-button-text">
                                                <div class="circle-outer">
                                                    <div class="circle-inner"></div>
                                                </div>
                                                <p>??????</p>
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
                                                <p>???????? 2,0 ??</p>
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
                                                <p>???????? 1,5 ??</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>

                                <div class="calc-item">
                                    <div class="calc-title">????????????????</div>
                                    <div class="radio1-input">
                                        <label class="type-button">
                                            <input type="radio" name="formwork" value="0" checked="checked">
                                            <div class="type-button-text">
                                                <div class="circle-outer">
                                                    <div class="circle-inner"></div>
                                                </div>
                                                <p>??????</p>
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
                                                <p>????????</p>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="calc-button-box">
                                    <a href="#" class="calc-button">???????????????????? ??????????????????</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="reviews-content" >
                            <div class="single-item-review">
                                <div class="review-info" @if(!$comments->isEmpty()) itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating" @else @endif>
                                    <div class="review-count">???????????? <span>({{ $comments->total() }})</span></div>
                                    @if (!$comments->isEmpty())
                                        <span style="display:none;" itemprop="reviewCount">{{ $comments->total() }}</span>
                                        <span style="display:none;" itemprop="ratingValue">5</span>
                                    @endif
                                    <button scroll-to=".review-form-box" class="add-review">???????????????? ??????????</button>
                                </div>
                                @foreach($comments as $comment)
                                    <div class="review" itemprop="review" itemscope itemtype="https://schema.org/Review">
                                        <h4 class="review-title" itemtype="https://schema.org/Person" itemprop="author">{{ $comment->name }}</h4>
                                        <div style="display: none" itemprop="reviewRating" itemtype="https://schema.org/Rating" itemscope>
                                            <meta itemprop="ratingValue" content="5" />
                                            <meta itemprop="bestRating" content="5" />
                                        </div>
                                        <div class="review-rating">
                                            <span class="review-datetime">
                                                <meta itemprop="datePublished" content="{{ $comment->created_at->format('d.m.Y') }}">
                                                {{ $comment->created_at->format('d.m.Y') }}
                                            </span>
                                            <div class="rating-area">
                                                <input type="radio" id="star-5" name="rating" value="5">
                                                <label for="star-5" title="???????????? ??5??"></label>
                                                <input type="radio" id="star-4" name="rating" value="4">
                                                <label for="star-4" title="???????????? ??4??"></label>
                                                <input type="radio" id="star-3" name="rating" value="3">
                                                <label for="star-3" title="???????????? ??3??"></label>
                                                <input type="radio" id="star-2" name="rating" value="2">
                                                <label for="star-2" title="???????????? ??2??"></label>
                                                <input type="radio" id="star-1" name="rating" value="1">
                                                <label for="star-1" title="???????????? ??1??"></label>
                                            </div>
                                        </div>
                                        <p class="review-content" itemprop="reviewBody">
                                            {{ $comment->text }}
                                        </p>
                                        <div class="review-link">
                                            <p>???????????? ??????????????????</p>
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
                                    <div class="review-form-title">???????????????? ??????????</div>
                                    <div class="review-form">
                                        <div class="input-row">
                                            <div class="input-group required">
                                                <input type="text" class="name-input" id="name-input-comment" required>
                                                <span class="bar"></span>
                                                <label>??????</label>
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
                                            <label>??????????</label>
                                            <div class="required-field">*</div>
                                            <span class="text-error-comment"></span>
                                        </div>
                                        <div class="submit-box">
                                            <button class="button-submit button-submit-review"
                                                    id='button-submit-comment'
                                                    type="submit">????????????????
                                                ??????????
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="single-item-pay">
                                <div class="pay-box">
                                    <div class="pay-title">?????? ?????????????????</div>
                                    <div class="pay-items">
                                        <div class="pay-item">
                                            <svg>
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-pay1') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <p>???????????????????? ???????????? ?????????? ????????</p>
                                        </div>

                                        <div class="pay-item">
                                            <svg>
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-pay2') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <p>?????????????????? ?????? ???????????????????? ???????????? ?? ?????? ?? ??????????</p>
                                        </div>

                                        <div class="pay-item">
                                            <svg>
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-pay3') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <p>?????????????????? ?????? ????????????????</p>
                                        </div>

                                        <div class="pay-item">
                                            <svg style="margin-left: -14px;">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-pay4') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <p>???? ?????????? - ?????? ???????????????? ???????????????? ???????? ?????? ???? ??????. ?????? ?? ???? ????. ????????</p>
                                        </div>
                                    </div>
                                    <div class="pay-questions-box">
                                        <div class="pay-questions">
                                            <div class="pay-question-box">
                                                <div class="pay-question">
                                                    <h4>?????????? ?????????? ?????????????????</h4>
                                                    <p>???????????????? ???????????????????????????? ?? ?????????????? 1-3?? ?????????????? ???????? ??????????
                                                        ????????????????????
                                                        ????????????, ?????? ?? ?????????? ?????????????? ?????????? ???? ???????????? ??????????????
                                                        (?????????????????????????? ??
                                                        ?????? ???????????????????????? ?????????? ?????????????????? ?????????????????? ???? ?????????? ???????????? ????
                                                        6-????
                                                        ?????????????? ???? ???????????????? ???????????????????????????? ????????????????). ????????????????????????
                                                        ??????????????
                                                        ???????????????????????? ??????????.</p>
                                                </div>

                                                <div class="pay-question">
                                                    <h4>?????????????? ?????? ??????????</h4>
                                                    <p>???????????????? ?????????????????????? ????????????? ???????????? ???????????????? ?????????????? ?????? ???????????
                                                        ???????????????????? ???? ?????????????? ?? ???????????? ?????????????????? ???? ?????????????????????????????? ??????
                                                        ????????????????: ?????????????????? ???????????????? ?????????? ???????????????????????? ????????????
                                                        ????????????????????????
                                                        ?????? ???????????? ?????? ????????????.</p>
                                                </div>
                                            </div>
                                            <div class="pay-question-box">
                                                <div class="pay-question stretch">
                                                    <h4>?????????????? ?????????? ?????????????????</h4>
                                                    <p>???????????????? ???????????? ?? ???????????????? 80 ???? ???? ?????? ???????????????????????????? ??????????????????
                                                        ??
                                                        ?????????????? 3-?? ?????????????? ???????? ?? ?????????????? ????????????.</p>
                                                    <p>???????????????? ???????????? ???????????? 80 ???? ???? ?????? ???????????????????????????? ????????????????????
                                                        ??????????
                                                        ???????????????????? ???????????? ?? ???????????????????????????? ?????????? ?? ?????????? ???? ?????????? 3-??
                                                        ?????????????? ???????? ?? ?????????????? ???????????? ??????????????????.</p>
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
                                                    <h3>?????????????????? ??????????</h3>
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
                                                    <h3>???????????????????? ???? ??????????????</h3>
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
                                                    <h3>???????????????????? ???? ??????-??????????????</h3>
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
                                                    <h3>?????????????????????? ??????????????</h3>
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

            <div class="wrapper wrapper__analog">
                <div class="title-box">
                    <div class="title-content">
                        <h2 class="header-bigtitle">?????? ?????????? ?????????? ??????????????</h2>
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
                                        <span class="sale">{{ $sale->discount }}% ??????????</span>
                                    @endif
                                </a>
                                <div class="analog-footer">
                                    <div class="analog-content">
                                        <a href="{{route('catalog.product', [$analogProduct->category->link, $analogProduct->link])}}"
                                           class="analog-title">{{ $analogProduct->name }}</a>
                                        <p class="analog-oldprice">
                                            @if($sale)
                                                <strike>{{ number_format($sale->price, 0, '.', ' ') }} ??????.</strike>
                                            @endif
                                        </p>
                                        <div class="analog-price-box">
                                            <div class="analog-price-box-inner">
                                                <p class="analog-price">
                                                    ???? {{ number_format($analogProduct->price(), 0, '.', ' ') }}
                                                    ??????.</p>
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
                    <h2 class="header-bigtitle">???? ?????? ????????????????</h2>
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
                                        <span class="sale">{{ $sale->discount }}% ??????????</span>
                                    @endif
                                </a>
                                <div class="analog-footer">
                                    <div class="analog-content">
                                        <a href="{{route('catalog.product', [$viewedProduct->category->link, $viewedProduct->link])}}"
                                           class="analog-title">{{ $viewedProduct->name }}</a>
                                        <p class="analog-oldprice">
                                            @if($sale)
                                                <strike>{{ number_format($sale->price, 0, '.', ' ') }} ??????.</strike>
                                            @endif
                                        </p>
                                        <div class="analog-price-box">
                                            <div class="analog-price-box-inner">
                                                <p class="analog-price">
                                                    ???? {{ number_format($viewedProduct->price(), 0, '.', ' ') }}
                                                    ??????.</p>
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
                    <h2 class="header-bigtitle">???????? ???????????????????? ?????????????????????? ?????????????????? ?? ?????????? ??????????</h2>
                </div>
                <div class="subtitle">?????? ???????????????????????? ?????????????? ???????? ???????????? ?????????????? ?????????????????? 50 ??????</div>
            </div>
        </div>
        <div class="card-four-outer">
            <div class="card-four-wrapper">
                <div class="masters">
                    <div class="card">
                        <div class="card-text">
                            <div class="card-title">
                                <span class="card-title-text">??????????????????????&shy;???????????? ??????????????</span>
                            </div>
                            <p>?? ?????????? ???????????????? ?????????????????????????? ???????????? ???????? ?? ???????????? ?????????? 7 ??????. ???????????? ?? ?????? 3 ??????????????
                                ???? 5-7 ??????????????. ?????????????? ???? ?????????? ???????????????????????? ???? 60 ???????????????? ?? ??????????. ?????? ?????????????? ????????????
                                ???????????????? ?? ???????????????????????? ?? ?????????? ???????? ???? 100 ???????????????? ???????????? ???????????????????? ??????????????????????.</p>
                        </div>
                    </div>
                    <div class="master-img"><img class="lazy" data-src="{{ asset('/img/card/masters/master1.jpg') }}" alt=""></div>
                    <div class="master-img"><img class="lazy" data-src="{{ asset('/img/card/masters/master2.jpg') }}" alt=""></div>
                </div>
                <div class="instruments">
                    <div class="card">
                        <div class="card-text">
                            <div class="card-title">
                                <span class="card-title-text">??????????????????????&shy;?? ????????????????????????</span>
                            </div>
                            <p>???????????????????? ???????????? ???????????????? ???????????? ?? ???????????????????????? ?? ?????????????????????????? ?????????????????????????? ?? ?? ????????????
                                ???????? ?????????????????????? ???????????????????????? ??????????????. ???? ???????????????????? ???????????????????????? ?????????????????? ?????? ??????????????,
                                ?????? ???????????????????????? ???????????????????? ?????????????? ?? ?????????????????? ?????? ?? ???????????????????????? ???????????? ???????????????? ???? 3
                                ????????.</p>
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
                <h2>?????????????? ???????????????????? ???????????????????? ?????????????????????? ?? ??????????????????</h2>
            </div>
            <span class="guarantee">36 ?????????????? ???????????????? ???? ???????????? ?? ????????????????????????</span>
            <span class="card-five-text">?? ???????????? ?????????????????????? ?????????????????????? ?? ?????????????? ?????????? ???????????????????????? ?????????? ???? ?????????????????? ?????????????? ?? ???????????????? ???? ???? ???????? ????????.</span>
            <a href="#" class="card-five-button button-callback">???????????????? ????????????</a>
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
                    data['massa'] ? $('#massa').html(data['massa'] + ' ????.') : $('#massa').html('-');
                    data['power'] ? $('#power').html(data['power'] + ' ??????/??????') : $('#power').html('-');
                    data['gabarit'] ? $('#gabarit').html(data['gabarit'] + ' ????.') : $('#gabarit').html('-');
                    data['glubina'] ? $('#glubina').html(data['glubina'] + ' ????.') : $('#glubina').html('-');
                    data['volume'] ? $('#volume').html(data['volume'] + ' ??.') : $('#volume').html('-');
                    data['proizvoditelnost'] ? $('#proizvoditelnost').html(data['proizvoditelnost'] + ' ??3/??????.') : $('#proizvoditelnost').html('-');
                    var oldPrice = new Intl.NumberFormat('ru-RU').format(data["price"]);
                    if (data['discount'] != 0) {
                        var price = new Intl.NumberFormat('ru-RU').format(parseInt(data["price"] * ((100 - data["discount"]) / 100)));
                        $('#table-price').html('<div class="sale"><span>' + price + ' ??????.</span> / <strike>' + oldPrice + ' ??????.</strike></div>');
                        $('#price').html('<div class="single-item-sales"><strike>' + oldPrice + ' ??????.</strike><div class="sale">?????????? <span class="sale-value">' + data["discount"] + '%</span></div></div><div class="single-item-price">' + price + ' ??????.</div>');
                    } else {
                        let newPrice = new Intl.NumberFormat('ru-RU').format(data["price"]);
                        $('#table-price').html('<div class="value">' + newPrice + ' ??????.</div>');
                        $('#price').html('<div class="single-item-price">' + newPrice + ' ??????.</div>');
                    }
                    if (data['destination'] == 0) {
                        var text = '???????????????????? ???????????? - ?????????????????? ?????????????????? ???????? ??????????????????. ???????????? ???????????????? ???? ?????????????? 50-60 ????. ???? ???????? ???????????????????? ?????? ?????????????????? ??????????????.';
                        $('.destination-tooltip').html(text);
                        $('#table-water-tooltip').attr('data-text', text);
                        $('#table-water').html('C?????????????????? ????????????');
                    } else {
                        var text = '???????????????????????????? ???????????? - ?????????????????? ?????????????????? ???????? ?????? ???????????? ???????????????????? ????????????, ???? ???????????????????????????? ?????????????? ???????????? ??????????????. ?????? ?????????? ?????????????? ???????? ???????????????? ???? ?????????????????????? ?? ???????????????????????? ????????????????????????, ?????? ?????????????????? ?? ???????????? ?????????? ???????????????? ???????? ???? ??????????.';
                        $('.destination-tooltip').html(text);
                        $('#table-water-tooltip').attr('data-text', text);
                        $('#table-water').html('???????????????????????????? ????????????');
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

        // popup ???????????? ??????????????????

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
