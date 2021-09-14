@extends('index')

@section('head')
    <title>{{ $product->title }}</title>
    <meta name="keywords" content="{{ $product->keywords }}">
    <meta name="description" content="{{ $product->description }}">
    @if($product->image)
        <meta property="og:image" content="{{ url($product->image) }}"/>
        <link rel="image_src" href="{{ url($product->image) }}"/>
    @else
        {!! $defaultOGImage !!}
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="og:title" content="{{ $product->title }}">
    <meta name="og:description" content="{{ $product->description }}">
    <style>
        .box-menu{ top:0px; }
    </style>
@endsection

@section('content')

    <!-- @include('elements.preloader') -->
	<style>
@media (min-width: 768px) {
	#card-one .single-item-desc {
    padding: 32px 52px;
    min-height: 450px;
	}
}
	</style>

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
                <div class="single-product-title">
                    <h1 itemprop="name">{{ $product->name }}</h1>
                </div>
                <div class="single-product-tabs">
                    <div class="tabs-box">
                        <div class="tab tab-active">О товаре</div>
                        <div class="tab">Описание</div>
                        <div class="tab" id="install-price">Стоимость монтажа</div>
                        <div class="tab" id="reviews">Отзывы <span>({{ $comments->total() }})</span></div>
                        <div class="tab">Доставка и оплата</div>
                    </div>
                    <div class="tab-content tab-active">
                        <div class="single-item-content">
                            <div class="single-item-slider-box">
                                <div class="outer-slider-box">
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
                                        @foreach($product->images as $image)
                                            <img data-lazy="/{{ $image->image }}" alt="{{ $image->alt }}">
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
                            <div class="single-item-info">
                                <div class="single-item-type">
                                    <div class="type-title">
                                        <span>Модификация</span>
                                    </div>
                                    <div class="type-buttons">
                                        @foreach($modifications as $modification)
                                            <div class="type-button">
                                                <label>
                                                    <input type="radio" name="modification_id"
                                                           value="{{ $modification->id }}">
                                                    <div class="type-button-text">
                                                        <div class="type-button-text-inner">
                                                            <div class="circle-outer">
                                                                <div class="circle-inner"></div>
                                                            </div>
                                                            <p>{{ $modification->modtitle }}</p>
                                                        </div>
                                                    </div>
                                                </label>
                                            </div>
                                        @endforeach
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
                                                        <div class="type-tooltip">Цена базовой комплектации без учета
                                                            дополнительного оборудования. При принудительном отведении
                                                            воды встроенная емкость и дренажный насос входят в стоимость
                                                            оборудования.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="characteristic-value" id="table-price">
                                                </div>
                                            </div>

                                            <div class="table-row with-help">
                                                <div class="characteristic-name">
                                                    <span>Габариты</span>
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
                                                    <span>Размер входа</span>
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
                                                <div class="characteristic-value" id="entry"></div>
                                            </div>

                                            <div class="table-row without-help">
                                                <div class="characteristic-name">
                                                    <span>Вес</span>
                                                    <div class="characteristic-svg-box" data-text="">
                                                        <svg>
                                                            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="characteristic-value" id="weight">
                                                </div>
                                            </div>

                                            <div class="table-row without-help">
                                                <div class="characteristic-name">
                                                    <span>Полезный объем</span>
                                                    <div class="characteristic-svg-box" data-text="">
                                                        <svg>
                                                            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="characteristic-value" id="useful_volume">
                                                </div>
                                            </div>
                                            <div class="table-row without-help">
                                                <div class="characteristic-name">
                                                    <span>Комплектация</span>
                                                    <div class="characteristic-svg-box" data-text="">
                                                        <svg>
                                                            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="characteristic-value" id="equipment">
                                                </div>
                                            </div>

                                            <div class="table-row without-help">
                                                <div class="characteristic-name">
                                                    <span>Удлиненная горловина</span>
                                                    <div class="characteristic-svg-box" data-text="">
                                                        <svg>
                                                            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="characteristic-value" id="extended_neck">
                                                </div>
                                            </div>

                                            <div class="table-row without-help">
                                                <div class="characteristic-name">
                                                    <span>Якорение</span>
                                                    <div class="characteristic-svg-box" data-text="">
                                                        <svg>
                                                            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="characteristic-value" id="fasteners">
                                                </div>
                                            </div>

                                            <div class="table-row without-help">
                                                <div class="characteristic-name">
                                                    <span>Краткое описание</span>
                                                    <div class="characteristic-svg-box" data-text="">
                                                        <svg>
                                                            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-info') }}"
                                                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div class="characteristic-value" id="annotation">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        <input type="radio" name="grunt" id="suglinok" value="{{ $product->suglinok }}"
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
                                <div class="calc-title">Бетонная плита</div>
                                <div class="radio1-input">
                                    <label class="type-button">
                                        <input type="radio" name="concrete_slab" value="0" checked="checked">
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
                                        <input type="radio" name="concrete_slab" id="concrete_slab"
                                               value="{{ $contact->concrete_slab }}">
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
                                <a href="#" class="calc-button" id="cul2">Рассчитать стоимость</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="reviews-content">
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
                                            <input type="text" class="email-input" id="contacts-input-comment" required>
                                            <span class="bar"></span>
                                            <label>Email</label>
                                            <div class="required-field">*</div>
                                            <span class="contacts-error-comment"></span>
                                        </div>
                                    </div>
                                    <div class="input-group textarea">
                                        <textarea class="textarea-input" id="text-input-comment" required></textarea>
                                        <span class="bar"></span>
                                        <label>Отзыв</label>
                                        <div class="required-field">*</div>
                                        <span class="text-error-comment"></span>
                                    </div>
                                    <div class="submit-box">
                                        <button class="button-submit button-submit-review" id='button-submit-comment' type="submit">Добавить
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
                                                <p>Доставка осуществляется в течение 1-3х рабочих дней после оформления заказа, или в более поздние сроки по вашему желанию (приобретенное у нас оборудование может бесплатно храниться на нашем складе до 6-ти месяцев по договору ответственного хранения). Приобретайте выгодно оборудование зимой.</p>
                                            </div>

                                            <div class="pay-question">
                                                <h4>Возврат или обмен</h4>
                                                <p>Наступил гарантийный случай? Хотите оформить возврат или обмен? Обратитесь за помощью к нашему менеджеру мы незамедлительно все исправим: бесплатно доставим новое оборудование взамен бракованного или вернем вам деньги.</p>
                                            </div>
                                        </div>
                                        <div class="pay-question-box">
                                            <div class="pay-question stretch">
                                                <h4>Сколько стоит доставка?</h4>
                                                <p>Доставка товара в пределах 80 км от КАД осуществляется бесплатно в течение 3-х рабочих дней с момента заказа.</p>
                                                <p>Доставка товара дальше 80 км от КАД рассчитывается менеджером после оформления заказа и осуществляется также в сроки не более 3-х рабочих дней с момента звонка менеджера.</p>
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
                                                от {{ number_format($analogProduct->price(), 0, '.', ' ') }} руб.</p>
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
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
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
                                        <img data-lazy="/min/{{ $image->image }}" alt="{{ $image->alt }}">
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
                                                    от {{ number_format($viewedProduct->price(), 0, '.', ' ') }} руб.</p>
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
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
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
                            <p>В штате компании профессионалы своего дела с опытом более 7 лет. Сейчас у нас 3 бригады по 5-7 человек. Поэтому мы можем осуществлять до 60 монтажей в месяц. Все мастера прошли обучение и сертификацию и имеют опыт от 100 монтажей систем автономной канализации.</p>
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
                            <p>Производим монтаж септиков строго в соответствии с предписаниями производителя и с учетом всех технических особенностей участка. Мы используем качественные материалы при монтаже, что обеспечивает надежность монтажа и позволяет нам с уверенностью давать гарантию на 3 года.</p>
                        </div>
                    </div>
                    <div class="instrument-img"><img class="lazy" data-src="{{ asset('/img/card/instruments/instrument1.jpg') }}" alt=""></div>
                    <div class="instrument-img"><img class="lazy" data-src="{{ asset('/img/card/instruments/instrument2.jpg') }}" alt=""></div>
                </div>
            </div>
        </div>
    </section>

    <section id="card-five" style="background-image: url('{{ asset('/img/bg2.jpg') }}');">
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

    @isset($questions)
        <section id="card-six">
            <div class="wrapper">
                <div class="title-box">
                    <div class="title-content">
                        <h2 class="title">FAQ</h2>
                        <span>Часто задаваемые вопросы</span>
                    </div>
                    <div class="subtitle">Здесь собраны самые популярные вопросы о септиках для загородного дома</div>
                </div>
                <ol class="questions">
                    @foreach($questions as $question)
                        <li class="question">
                            <div class="question-content">
                                <div class="question-title">{{ $question->name }}</div>
                                <div class="question-icon">
                                    <svg class="question-arrow-two">
                                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                    </svg>
                                    <svg class="question-arrow">
                                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                    </svg>
                                </div>
                            </div>
                            <div class="answer">{{ $question->text }}</div>
                        </li>
                    @endforeach
                </ol>
            </div>
        </section>
    @endisset
@endsection

@section('script')
    @include('pages.catalog.product_script')
    <script>

        if ($(".calc-button").is("#cul2")) {
            $(' .calc-button').removeClass('disabled');
            var radioData = 0;
            $(".radio1-input input:checked").each(function () {
                radioData += parseInt($(this).val());
            });
            valData = radioData.toLocaleString('ru');
            $("#montazh-price").html(valData);
        }




        function radioProduct() {
            var group1 = $('.single-item-type input[name="modification_id"]');

            group1.first().prop('checked', true);

            updateTable($(this));

            group1.on('change', function () {
                updateTable($(this));
            });
        }

        function updateTable() {
            $.ajax({
                url: '/katalog',
                data: {
                    modification_id: $("input[name='modification_id']:checked").val()
                },
                type: 'post',
                success: function (data) {
                    data['annotation'] ? $('#annotation').html(data['annotation']) : $('#annotation').html('-');
                    var oldPrice = new Intl.NumberFormat('ru-RU').format(data["price"]);
                    if (data['discount'] != 0) {
                        var price = new Intl.NumberFormat('ru-RU').format(parseInt(data["price"] * ((100 - data["discount"]) / 100)));
                        $('#table-price').html('<div class="sale"><span>' + price + ' руб.</span> / <strike>' + oldPrice + ' руб.</strike></div>');
                        $('#price').html('<div class="single-item-sales"><strike>' + oldPrice + ' руб.</strike><div class="sale">Акция <span class="sale-value">' + data["discount"] + '%</span></div></div><div class="single-item-price">'+ price +' руб.</div>');
                    } else {
                        $('#table-price').html('<div class="value">' + oldPrice + ' руб.</div>');
                        $('#price').html('<div class="single-item-price">'+ oldPrice +' руб.</div>');
                    }
                    data['useful_volume'] ? $('#useful_volume').html(data['useful_volume'] + ' куб/м') : $('#useful_volume').html('-');
                    data['gabarit'] ? $('#gabarit').html(data['gabarit'] + ' мм.') : $('#gabarit').html('-');
                    data['weight'] ? $('#weight').html(data['weight'] + ' кг.') : $('#weight').html('-');
                    data['entry'] ? $('#entry').html(data['entry'] + ' мм.') : $('#entry').html('-');
                    $('#equipment').html(data['equipment']);
                    data['extended_neck'] == 1 ? $('#extended_neck').html('Да') : $('#extended_neck').html('Нет');
                    data['fasteners'] == 1 ? $('#fasteners').html('Да') : $('#fasteners').html('Нет');
                    $('#modtitle').html(data['modtitle']);
                    modification_id = data['id'];
                }
            })
        }

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
