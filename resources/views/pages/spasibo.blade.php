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
    <section class="contact">
        <div class="wrapper">
            <div class="thankyou-block-home order-thankyou-block" style="max-width: 1000px;">
                <div class="callback-text" style="display: block;">
                    <div class="title-box">
                        <div class="title-content">
                            <h1 class="title" style="font-size: 50px;">Благодарим</h1>
                            <span style="font-size: 32px;">за оставленную заявку</span>
                        </div>
                        {{-- <span class="subtitle">Компания локальных очистных сооружений является одной из ведущих специалистов в области продажи и монтажа автономной канализации для загородного дома</span> --}}
                    </div>

                    <div class='container'>
                        <div class="node node27 widget widget-video pp">

                            <div class="wrapper1">
                                <div class="wrapper2">
                                    <div class="macros-video">
                                        <div class="pad-in">
                                            <div class="video video_720x405 video1">
                                                <iframe class="wrap" frameborder="0" allowfullscreen="true"
                                                        src="https://www.youtube.com/embed/WH66P0NcXaI?rel=0"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='pp' style='margin-top: 15px; vertical-align: top; padding: 20px;'>
                            <h4>Пока вы ожидаете нашего звонка...</h4>
                            <p style='margin: 13px 0; color: #B5B5B5; font-size: 15px;'>Посмотрите видео, как мы
                                выполняем монтаж септика, подпишитесь на наши соцсети.
                                И если вдруг мы не смогли вам перезвонить в течении 15 минут,
                                смело набирайте наш номер или пишите в мессенджеры!<br><br>МЫ В СОЦСЕТЯХ:</p>
                            <div class="w-menu-grid">
                                <div class="w-menu-grid__cell" style="padding-left: 7px; padding-right: 7px;">
                                    <div class="cont cell">
                                        <div class="node node22 widget widget-menu-button">
                                            <div class="wrapper1">
                                                <div class="wrapper2">
                                                    <div class="macros-button">
                                                        <div class="btn-out center xs-none"><a class="btn-inner"
                                                                                               href="https://vk.com/septikdom"
                                                                                               target="_blank">
                                                                <button class="btn font-text" id="uid10" data-id=""
                                                                        data-action="link" data-ym_goal=""
                                                                        data-ga_category="" data-ga_action=""
                                                                        need_hover="true"><img
                                                                            src="{{ asset('img/vk.png') }}"
                                                                            style="width: 36px;" class=""></button>
                                                            </a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-menu-grid__cell" style="padding-left: 7px; padding-right: 7px;">
                                    <div class="cont cell">
                                        <div class="node node23 widget widget-menu-button">
                                            <div class="wrapper1">
                                                <div class="wrapper2">
                                                    <div class="macros-button">
                                                        <div class="btn-out center xs-none"><a class="btn-inner"
                                                                                               href="https://api.whatsapp.com/send?phone=79312520131&amp;text=%D0%94%D0%BB%D1%8F%20%D1%80%D0%B0%D1%81%D1%87%D0%B5%D1%82%D0%B0%20%D1%81%D0%B5%D0%BF%D1%82%D0%B8%D0%BA%D0%B0%20%D0%BE%D1%82%D0%BF%D1%80%D0%B0%D0%B2%D1%8C%D1%82%D0%B5%20%D1%8D%D1%82%D0%BE%20%D1%81%D0%BE%D0%BE%D0%B1%D1%89%D0%B5%D0%BD%D0%B8%D0%B5"
                                                                                               target="_self">
                                                                <button class="btn font-text" id="uid11" data-id=""
                                                                        data-action="link" data-ym_goal=""
                                                                        data-ga_category="" data-ga_action=""
                                                                        need_hover="true"><img
                                                                            src="{{ asset('/img/whats-up.png') }}"
                                                                            style="width: 36px;" class=""></button>
                                                            </a></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-menu-grid__cell" style="padding-left: 7px; padding-right: 7px;">
                                    <div class="cont cell">
                                        <div class="node node24 widget widget-menu-button">
                                            <div class="wrapper1">
                                                <div class="wrapper2">
                                                    <div class="macros-button">
                                                        <div class="btn-out center xs-none"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-menu-grid__cell" style="padding-left: 7px; padding-right: 7px;">
                                    <div class="cont cell">
                                        <div class="node node25 widget widget-menu-button">
                                            <div class="wrapper1">
                                                <div class="wrapper2">
                                                    <div class="macros-button">
                                                        <div class="btn-out center xs-none"><a class="btn-inner"
                                                                                               href="https://telegram.im/@vgraspb"
                                                                                               target="_blank">
                                                                <button class="btn font-text" id="uid13" data-id=""
                                                                        data-action="link" data-ym_goal=""
                                                                        data-ga_category="" data-ga_action=""
                                                                        need_hover="true"><img
                                                                            src="{{ asset('img/telegram.jpeg') }}"
                                                                            style="width: 38px;" class=""></button>
                                                            </a></div>
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
        </div>
    </section>
@endsection
