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
    <div class="payment-shipping">
        <div class="wrapper">
            {{ Breadcrumbs::render('single.first_page', "Доставка и оплата", route("shipping")) }}
            <div class="payment-shipping-title">
                <h1 class="payment-shipping-title-h1">Оплата</h1>
            </div>
        </div>
        <div class="payment-shipping-line"></div>
        <div class="wrapper">
            <div class="single-item-pay">
                <div class="pay-box">
                    <div class="pay-title">Как оплатить?</div>
                    <div class="pay-items">

                      <div class="pay-item">
                        <svg>
                          <use xlink:href="{{ asset('/img/svgdefs.svg#icon-pay3') }}"
                          xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                        </svg>
                        <p>Наличными при доставке</p>
                      </div>

                        <div class="pay-item">
                            <svg>
                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-pay1') }}"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                            </svg>
                            <p>Банковской картой через сайт</p>
                        </div>

                        <div class="pay-item">
                          <svg style="margin-left: -14px;">
                            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-pay4') }}"
                            xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                          </svg>
                          <p>По счету - наш менеджер выставит счет как на физ. так и на юр. лицо</p>
                        </div>

                        <div class="pay-item">
                            <svg>
                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-pay2') }}"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                            </svg>
                            <p>Наличными или банковской картой у нас в офисе</p>
                        </div>
                    </div>
                    <div class="payment-shipping-title">
                        <h2 class="payment-shipping-title-h1">Доставка</h2>
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
                    <div class="payment-shipping-title">
                        <h2 class="payment-shipping-title-h1">Реквизиты</h2>
                    </div>
                    <div class="pay-questions-box">
                        <div class="pay-questions">
                            <div class="pay-question-box">
                                <div class="pay-question">
                                    <ul class="footer-modal-content-list">
                                        <li class="footer-modal-content-list-item">
                                            <svg class="footer-modal-content-list-item-icon">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <span class="footer-modal-content-list-item-text">Название организации ООО «Экосеть»</span>
                                        </li>
                                        <li class="footer-modal-content-list-item">
                                            <svg class="footer-modal-content-list-item-icon">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <span class="footer-modal-content-list-item-text">ИНН 7811638132</span>
                                        </li>
                                        <li class="footer-modal-content-list-item">
                                            <svg class="footer-modal-content-list-item-icon">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <span class="footer-modal-content-list-item-text">КПП 781101001</span>
                                        </li>
                                        <li class="footer-modal-content-list-item">
                                            <svg class="footer-modal-content-list-item-icon">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <span class="footer-modal-content-list-item-text">ОГРН 1177847061732</span>
                                        </li>
                                        <li class="footer-modal-content-list-item">
                                            <svg class="footer-modal-content-list-item-icon">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <span class="footer-modal-content-list-item-text">Юридический адрес 193079, Санкт-Петербург, Московское шоссе 25, корпус 1, литер А, оф 801 Г</span>
                                        </li>
                                        <li class="footer-modal-content-list-item">
                                            <svg class="footer-modal-content-list-item-icon">
                                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                            </svg>
                                            <span class="footer-modal-content-list-item-text">Фактический адрес 196158, г. Санкт-Петербург, ул. Ленсовета 97, ТРЦ "Континент", прямо у метро Звездная, Бизнес центр, оф. 502</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    <style>
        .mm-page {
            position: initial !important;
        }
    </style>
@endsection
