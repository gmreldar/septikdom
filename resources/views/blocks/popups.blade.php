<div class="popup modal-popup">
    <div class="popup-overlay"></div>
    <div class="popup-wrapper">
        <div class="single-item-order-block">
            <svg class="popup-close">
                <use xlink:href="{{asset('/img/svgdefs.svg#icon-cross')}}"
                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
            <div class="single-item-order-answer">
                <h2>Оформление заказа</h2>
                <p>Название товара: <span class="item-title" id="product-name"></span></p>
                <div class="form">
                    <div class="input-group">
                        <input type="text" class="name-input" id="name-input" required>
                        <span class="bar"></span>
                        <label>Имя*</label>
                        <span class="name-error"></span>
                    </div>
                    <div class="input-group">
                        <input type="tel" class="phone-input" id="phone-input" required>
                        <span class="bar"></span>
                        <label>Телефон*</label>
                        <span class="phone-error"></span>
                    </div>
                    <div class="wrap">
                        <button class="button-submit button-submit-order-popup" id='button-submit' type="submit">
                            Оформить заказ
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="thankyou-block order-thankyou-block1">
            <svg class="popup-close">
                <use xlink:href="{{asset('/img/svgdefs.svg#icon-cross')}}"
                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
            <div class="callback-text">
                <div class="check-box">
                    <svg>
                        <use xlink:href="{{asset('/img/svgdefs.svg#icon-checkbox')}}"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                </div>
                <h2>Спасибо за оформление заказа №<span class="item-number"></span>!</h2>
                <p>Наш менеджер свяжется с вами в течение дня. Данное предложение действительно только 10
                    дней!</p>
                <button class="button-submit ok-button" type="submit">Ок</button>
            </div>
        </div>
        <div class="thankyou-block comment-thankyou-block">
            <svg class="popup-close">
                <use xlink:href="{{asset('/img/svgdefs.svg#icon-cross')}}"
                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
            <div class="callback-text">
                <div class="check-box">
                    <svg>
                        <use xlink:href="{{asset('/img/svgdefs.svg#icon-checkbox')}}"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                </div>
                <h2>Спасибо!</h2>
                <p>Ваш отзыв принят, он будет опубликован на сайте после прохождения модерации.</p>
                <button class="button-submit ok-button" type="submit">Ок</button>
            </div>
        </div>
        <div class="form-order-block">
            <svg class="popup-close">
                <use xlink:href="{{asset('/img/svgdefs.svg#icon-cross')}}"
                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
            <div class="form-order-text">
                <h2>
                    Рассчитать стоимость монтажа
                    @isset($category)
                        @if($category->type == 1)
                            септика
                        @elseif($category->type == 3)
                            погреба
                        @elseif($category->type == 4)
                            кессона
                        @endif
                    @endisset

                    <span class="item-title" id="product-name2"></span>
                </h2>

                {{--<p>Ваш расчёт готов! Стоимость монтажа:</p>--}}
                <div class="price-line">
                    <span id="montazh-price"></span> <span class="price-currency">руб.</span>
                </div>
                {{--<p>Чтобы заказать монтаж, заполните простую форму и мы перезвоним Вам в течение 15 минут, чтобы--}}
                {{--уточнить все детали</p>--}}
                <p>Для более точного расчета стоимости монтажных работ заполните простую
                    форму. Мы перезвоним в течении 15 минут.<br>
                    Не нужен монтаж? Узнайте подробнее про услугу <a href="/uslugi/shefmontazkanalizacii">Шеф-монтаж</a>
                </p>
            </div>
            <div class="form-order-form">
                <h2>Стоимость монтажа
                    @isset($category)
                        @if($category->type == 1)
                            [Септик]
                        @elseif($category->type == 3)
                            [Погреб]
                        @elseif($category->type == 4)
                            [Кессона]
                        @endif
                    @endisset</h2>
                <div class="form" id="popupFormCalc">
                    <div class="input-group">
                        <input type="text" class="name-input" required id="name-input-montazh">
                        <span class="bar"></span>
                        <label>Имя*</label>
                        <span class="error-field" id="name-error-montazh"></span>
                    </div>
                    <div class="input-group">
                        <input type="text" class="phone-input" required id="phone-input-montazh">
                        <span class="bar"></span>
                        <label>Телефон*</label>
                        <span class="error-field" id="phone-error-montazh"></span>
                    </div>
                    <button class="button-submit" id='button-submit-montazh'>Заказать монтаж</button>
                </div>
            </div>
        </div>
        <div class="thankyou-block-home order-thankyou-block" style="max-width: 1000px;">
            <svg class="popup-close">
                <use xlink:href="{{asset('/img/svgdefs.svg#icon-cross')}}"
                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
            <div class="callback-text" style="display: block;">
                <div class="check-box" style="margin: auto auto 40px;">
                    <svg>
                        <use xlink:href="{{asset('/img/svgdefs.svg#icon-checkbox')}}"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                </div>
                <div class="title-box">
                    <div class="title-content">
                        <h2 class="title" style="font-size: 50px;">Благодарим</h2>
                        <span style="font-size: 32px; line-height: 0;">за оставленную заявку</span>
                    </div>
                    {{-- <span class="subtitle">Компания локальных очистных сооружений является одной из ведущих специалистов в области продажи и монтажа автономной канализации для загородного дома</spa> --}}
                </div>
                {{-- <h2>Пока вы ожидаете нашего звонка...</h2>
                <p>Посмотрите видео, как мы выполняем монтаж септика,  подпишитесь на наши соцсети.
 И если вдруг мы не смогли вам перезвонить в течении 15 минут,
смело набирайте наш номер или пишите в мессенджеры!</p>
<div class="w-menu-grid center"><div class="w-menu-grid__cell" style="padding-left: 7px; padding-right: 7px;"><div class="cont cell"><div class="node node22 widget widget-menu-button"><div class="wrapper1"><div class="wrapper2"><div class="macros-button"><div class="btn-out center xs-none"><a class="btn-inner" href="https://vk.com/septikdom" target="_blank"><button class="btn font-text" id="uid10" data-id="" data-action="link" data-ym_goal="" data-ga_category="" data-ga_action="" need_hover="true"><img src="//u20.filesonload.ru/s/239lf4051/45fe5f3374476105fcbe36796d114c8d/82dbd230583fe2771348117e780bb1c5.png" style="width: 36px;" class=""></button></a></div></div></div></div></div></div></div><div class="w-menu-grid__cell" style="padding-left: 7px; padding-right: 7px;"><div class="cont cell"><div class="node node23 widget widget-menu-button"><div class="wrapper1"><div class="wrapper2"><div class="macros-button"><div class="btn-out center xs-none"><a class="btn-inner" href="https://api.whatsapp.com/send?phone=79119240656&amp;text=%D0%94%D0%BB%D1%8F%20%D1%80%D0%B0%D1%81%D1%87%D0%B5%D1%82%D0%B0%20%D1%81%D0%B5%D0%BF%D1%82%D0%B8%D0%BA%D0%B0%20%D0%BE%D1%82%D0%BF%D1%80%D0%B0%D0%B2%D1%8C%D1%82%D0%B5%20%D1%8D%D1%82%D0%BE%20%D1%81%D0%BE%D0%BE%D0%B1%D1%89%D0%B5%D0%BD%D0%B8%D0%B5" target="_self"><button class="btn font-text" id="uid11" data-id="" data-action="link" data-ym_goal="" data-ga_category="" data-ga_action="" need_hover="true"><img src="/img/whats-up.png" style="width: 36px;" class=""></button></a></div></div></div></div></div></div></div><div class="w-menu-grid__cell" style="padding-left: 7px; padding-right: 7px;"><div class="cont cell"><div class="node node24 widget widget-menu-button"><div class="wrapper1"><div class="wrapper2"><div class="macros-button"><div class="btn-out center xs-none"><a class="btn-inner" href="https://www.instagram.com/septikdom" target="_blank"><button class="btn font-text" id="uid12" data-id="" data-action="link" data-ym_goal="" data-ga_category="" data-ga_action="" need_hover="true"><img src="///img/instagram.png" style="width: 36px;" class=""></button></a></div></div></div></div></div></div></div><div class="w-menu-grid__cell" style="padding-left: 7px; padding-right: 7px;"><div class="cont cell"><div class="node node25 widget widget-menu-button"><div class="wrapper1"><div class="wrapper2"><div class="macros-button"><div class="btn-out center xs-none"><a class="btn-inner" href="https://telegram.im/@vgraspb" target="_blank"><button class="btn font-text" id="uid13" data-id="" data-action="link" data-ym_goal="" data-ga_category="" data-ga_action="" need_hover="true"><img src="//u20.filesonload.ru/s/23pp30051/e3eda9ecba97e2f8fd9d739bcfff0d95/e02f1d182b19df27cafd4a9c7161ad79.jpg" style="width: 38px;" class=""></button></a></div></div></div></div></div></div></div></div>
 --}}
                <div class="node node27 widget widget-video pp">
                    <div class="wrapper1">
                        <div class="wrapper2">
                            <div class="macros-video">
                                <div class="pad-in">
                                    <div class="video video_720x405 video1">
                                        <iframe class="wrap" frameborder="0" allowfullscreen="true"
                                                src="//www.youtube.com/embed/WH66P0NcXaI?rel=0"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="pp">
                    <h2>Пока вы ожидаете нашего звонка...</h2>
                    <p>Посмотрите видео, как мы выполняем монтаж септика, подпишитесь на наши соцсети.
                        И если вдруг мы не смогли вам перезвонить в течении 15 минут,
                        смело набирайте наш номер или пишите в мессенджеры!</p>
                    <div class="w-menu-grid center">
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
                                                                data-action="link" data-ym_goal="" data-ga_category=""
                                                                data-ga_action="" need_hover="true"><img
                                                                    src="//u20.filesonload.ru/s/239lf4051/45fe5f3374476105fcbe36796d114c8d/82dbd230583fe2771348117e780bb1c5.png"
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
                                                                                       href="https://api.whatsapp.com/send?phone=79119240656&amp;text=%D0%94%D0%BB%D1%8F%20%D1%80%D0%B0%D1%81%D1%87%D0%B5%D1%82%D0%B0%20%D1%81%D0%B5%D0%BF%D1%82%D0%B8%D0%BA%D0%B0%20%D0%BE%D1%82%D0%BF%D1%80%D0%B0%D0%B2%D1%8C%D1%82%D0%B5%20%D1%8D%D1%82%D0%BE%20%D1%81%D0%BE%D0%BE%D0%B1%D1%89%D0%B5%D0%BD%D0%B8%D0%B5"
                                                                                       target="_self">
                                                        <button class="btn font-text" id="uid11" data-id=""
                                                                data-action="link" data-ym_goal="" data-ga_category=""
                                                                data-ga_action="" need_hover="true"><img
                                                                    src="/img/whats-up.png"
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
                                                <div class="btn-out center xs-none"><a class="btn-inner"
                                                                                       href="https://www.instagram.com/septikdom"
                                                                                       target="_blank">
                                                        <button class="btn font-text" id="uid12" data-id=""
                                                                data-action="link" data-ym_goal="" data-ga_category=""
                                                                data-ga_action="" need_hover="true"><img
                                                                    src="///img/instagram.png"
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
                                <div class="node node25 widget widget-menu-button">
                                    <div class="wrapper1">
                                        <div class="wrapper2">
                                            <div class="macros-button">
                                                <div class="btn-out center xs-none"><a class="btn-inner"
                                                                                       href="https://telegram.im/@vgraspb"
                                                                                       target="_blank">
                                                        <button class="btn font-text" id="uid13" data-id=""
                                                                data-action="link" data-ym_goal="" data-ga_category=""
                                                                data-ga_action="" need_hover="true"><img
                                                                    src="//u20.filesonload.ru/s/23pp30051/e3eda9ecba97e2f8fd9d739bcfff0d95/e02f1d182b19df27cafd4a9c7161ad79.jpg"
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
                <button class="button-submit ok-button" type="submit">Ок</button>
            </div>
        </div>
        <div class="thankyou-block thankyou-block-review">
            <svg class="popup-close">
                <use xlink:href="/img/svgdefs.svg#icon-cross" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
            <div class="callback-text">
                <div class="check-box">
                    <svg>
                        <use xlink:href="/img/svgdefs.svg#icon-checkbox"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                </div>
                <h2>Спасибо!</h2>
                <p>Ваш отзыв будет добавлен на сайт, после проверки модератором.</p>
                <button class="button-submit ok-button" type="submit">Ок</button>
            </div>
        </div>
        <div class="subscribe-block">
            <svg class="popup-close">
                <use xlink:href="/img/svgdefs.svg#icon-cross" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
            <div class="callback-text">
                <div class="check-box">
                    <svg>
                        <use xlink:href="/img/svgdefs.svg#icon-checkbox"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                </div>
                <h2>Подписка на сезонные новости</h2>
                <p>Благодарим Вас! Подписавшись на нашу рассылку, Вы всегда будете в курсе последних новостей</p>
                <button class="button-submit" type="submit">Ок</button>
            </div>
        </div>
        <div class="review-block">
            <svg class="popup-close">
                <use xlink:href="/img/svgdefs.svg#icon-cross" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
            <div class="calculator-text">
                <h2>Добавить отзыв</h2>
            </div>
            <div>
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'PhotoReview')" id="defaultOpen">Фото</button>
                    {{--<button class="tablinks" onclick="openCity(event, 'VideoReview')">Видео</button>--}}
                    <button class="tablinks" onclick="openCity(event, 'AudioReview')">Аудио</button>
                    <button class="tablinks" onclick="openCity(event, 'TextReview')">Текст</button>
                </div>
            </div>
            <div class="calculator-answer">
                <div id="PhotoReview" class="tabcontent">
                    <form enctype="multipart/form-data" id="review_form" role="form">
                        <div class="block">
                            {{-- <div id="photo" class="photo" style="background-image: url(/img/icons/photo-min.png);">
                                <div class="add-block">
                                    <div class="plus">
                                        <input id="uploaded_photo" name="image" type="file" accept="image/jpg,image/jpeg,image/png">
                                    </div>
                                </div>
                                <p class="hover-block" id="image-error-review"></p>
                            </div> --}}
                            <label class="photo" style="background-image: url(/img/icons/photo-min.png);"
                                   for="uploaded_photo">
                                <div class="add-block">
                                    <div class="plus">
                                        <input id="uploaded_photo" name="file" type="file"
                                               accept="image/jpg,image/jpeg,image/png">
                                    </div>
                                </div>
                                <p class="hover-block" id="image-error-review"></p>
                            </label>
                            <div class="name">
                                <div class="form">
                                    <div class="input-group">
                                        <input type="text" class="name-input" name="name" required>
                                        <span class="bar"></span>
                                        <label>Имя*</label>
                                        <span class="error-field" id="name-error-review"></span>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="name-input" name="city" required>
                                        <span class="bar"></span>
                                        <label>Город*</label>
                                        <span class="error-field" id="city-error-review"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block">
                            <div class="form">
                                <div class="input-group">
                                    <textarea name="message" placeholder="Сообщение*" class="message-input"
                                              id="textarea-scroll" required></textarea>
                                    <span class="bar"></span>
                                    <span class="error-field" id="message-error-review"></span>
                                </div>
                                <div class="input-group">
                                    <div class="captcha-block">
                                        {{--<img src="/img/popup/captcha.png" alt="captcha">--}}
                                    </div>
                                    <div id="button-submit-review" class="button-submit-review button-submit">Отправить</div>
                                </div>
                            </div>
                        </div>
                        <input name="file_type" value="1" type="hidden">
                    </form>
                </div>

                {{--<div id="VideoReview" class="tabcontent">--}}
                    {{--<form enctype="multipart/form-data" id="review_video_form" role="form">--}}
                        {{--<div class="block">--}}
                            {{--<div class="name" style="margin-left: 0">--}}
                                {{--<div class="form">--}}
                                    {{--<div class="input-group">--}}
                                        {{--<input type="text" class="name-input" name="name" required>--}}
                                        {{--<span class="bar"></span>--}}
                                        {{--<label>Имя*</label>--}}
                                        {{--<span class="error-field" id="name-error-review"></span>--}}
                                    {{--</div>--}}
                                    {{--<div class="input-group">--}}
                                        {{--<input type="text" class="name-input" name="city" required>--}}
                                        {{--<span class="bar"></span>--}}
                                        {{--<label>Город*</label>--}}
                                        {{--<span class="error-field" id="city-error-review"></span>--}}
                                    {{--</div>--}}
                                    {{--<div class="input-group">--}}
                                        {{--<input type="text" class="name-input" name="link" required>--}}
                                        {{--<span class="bar"></span>--}}
                                        {{--<label>Ссылка на видео (Youtube)*</label>--}}
                                        {{--<span class="error-field" id="linl-error-review"></span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="block">--}}
                            {{--<div class="form">--}}
                                {{--<div class="input-group">--}}
                                    {{--<div class="captcha-block">--}}
                                        {{--<img src="/img/popup/captcha.png" alt="captcha">--}}
                                    {{--</div>--}}
                                    {{--<div id="button-submit-review" class="button-submit-review button-submit">Отправить</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<input name="file_type" value="2" type="hidden">--}}
                    {{--</form>--}}
                {{--</div>--}}

                <div id="AudioReview" class="tabcontent">
                    <form enctype="multipart/form-data" id="review_video_form" role="form">
                        <div class="block">
                            <label class="photo" style="background-image: url(/img/icons/audio-min.png);"
                                   for="uploaded_audio">
                                <div class="add-block">
                                    <div class="plus">
                                        <input id="uploaded_audio" name="file" type="file"
                                               accept="audio/mp3">
                                    </div>
                                </div>
                                <p class="hover-block" id="image-error-review"></p>
                            </label>
                            <div class="name">
                                <div class="form">
                                    <div class="input-group">
                                        <input type="text" class="name-input" name="name" required>
                                        <span class="bar"></span>
                                        <label>Имя*</label>
                                        <span class="error-field" id="name-error-review"></span>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="name-input" name="city" required>
                                        <span class="bar"></span>
                                        <label>Город*</label>
                                        <span class="error-field" id="city-error-review"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block">
                            <div class="form">
                                <div class="input-group">
                                    <div class="captcha-block">
                                        {{--<img src="/img/popup/captcha.png" alt="captcha">--}}
                                    </div>
                                    <div id="button-submit-review" class="button-submit-review button-submit">Отправить</div>
                                </div>
                            </div>
                        </div>
                        <input name="file_type" value="3" type="hidden">
                    </form>
                </div>
                <div id="TextReview" class="tabcontent">
                    <form enctype="multipart/form-data" id="review_text_form" role="form" method="post">
                        <div class="block">
                            <div class="name" style="margin-left: 0">
                                <div class="form">
                                    <div class="input-group">
                                        <input type="text" class="name-input" name="name" required>
                                        <span class="bar"></span>
                                        <label>Имя*</label>
                                        <span class="error-field" id="name-error-review"></span>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="name-input" name="city" required>
                                        <span class="bar"></span>
                                        <label>Город*</label>
                                        <span class="error-field" id="city-error-review"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block">
                            <div class="form">
                                <div class="input-group">
                                    <textarea name="message" placeholder="Сообщение*" class="message-input"
                                              id="textarea-scroll" required></textarea>
                                    <span class="bar"></span>
                                    <span class="error-field" id="message-error-review"></span>
                                </div>
                                <div class="input-group">
                                    <div class="captcha-block">
                                        {{--<img src="/img/popup/captcha.png" alt="captcha">--}}
                                    </div>
                                    <div id="button-submit-review" class="button-submit-review button-submit" onclick="$(this).parent().submit();">Отправить</div>
                                </div>
                            </div>
                        </div>
                        <input name="file_type" value="0" type="hidden">
                    </form>
                </div>
            </div>
        </div>

        <style>
            /* Style the tab */
            .tab {
                overflow: hidden;
                /*border: 1px solid #ccc;*/
                /*background-color: #f1f1f1;*/
            }

            /* Style the buttons that are used to open the tab content */
            .tab button {
                background-color: inherit;
                float: left;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 14px 16px;
                transition: 0.3s;
                position: relative;
            }

            .tab button:before {
                content: '';
                display: block;
                position: absolute;
                bottom: 0;
                width: 0%;
                left: 50%;
                transform: translateX(-50%);
                border-bottom: 1px solid #34a844;
                transition: 300ms width;
            }

            .tab button:hover:before {
                width: 40%;
            }

            .tab button:active:before {
                width: 70% !important;
            }

            /* Change background color of buttons on hover */
            .tab button:hover {
                background-color: #ddd;
            }

            /* Create an active/current tablink class */
            .tab button.active:before {
                width: 100%;
                /*border-bottom: 1px solid #34a844;*/
            }

            /* Style the tab content */
            .tabcontent {
                display: none;
                padding: 30px 0 0 0;
                border-top: none;
            }

            .tabcontent {
                animation: fadeEffect 1s; /* Fading effect takes 1 second */
            }

            /* Go from zero to full opacity */
            @keyframes fadeEffect {
                from {opacity: 0;}
                to {opacity: 1;}
            }

        </style>
        <script>
            function openCity(evt, cityName) {
                // Declare all variables
                var i, tabcontent, tablinks;

                // Get all elements with class="tabcontent" and hide them
                tabcontent = document.getElementsByClassName("tabcontent");
                for (i = 0; i < tabcontent.length; i++) {
                    tabcontent[i].style.display = "none";
                }

                // Get all elements with class="tablinks" and remove the class "active"
                tablinks = document.getElementsByClassName("tablinks");
                for (i = 0; i < tablinks.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace(" active", "");
                }

                // Show the current tab, and add an "active" class to the button that opened the tab
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " active";
            }
            document.getElementById("defaultOpen").click();
        </script>
    </div>
</div>

<div class="popup modal-popup-callback">
    <div class="popup-overlay"></div>
    <div class="popup-wrapper">
        <div class="callback-block">
            <svg class="popup-close">
                <use xlink:href="/img/svgdefs.svg#icon-cross" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
            <div class="callback-answer">
                <h2>Заказать обратный звонок</h2>
                <p>После обработки запроса, наш менеджер свяжется с Вами</p>
                <div class="form">
                    <div class="input-group">
                        <input type="text" class="name-input" id="name-input-feedback" required>
                        <span class="bar"></span>
                        <label>Имя*</label>
                        <span class="error-field" id="name-error-feedback"></span>
                    </div>
                    <div class="input-group">
                        <input type="tel" class="phone-input" id="phone-input-feedback" required>
                        <span class="bar"></span>
                        <label>Телефон*</label>
                        <span class="error-field" id="phone-error-feedback"></span>
                    </div>
                    <div class="input-group">
                        <textarea name="message" placeholder="Сообщение" class="message-input message-input-feedback"
                                  id="textarea-scroll"></textarea>
                        <span class="bar"></span>
                        <span class="error-field" id="message-error-feedback"></span>
                    </div>
                    <button class="button-submit" type="submit" id="button-submit-feedback">Заказать обратный звонок
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="fix-buttons">
    <div class="fix-buttons-block">
        <a href="{{route('calculator')}}" class="fix-button">
            <svg>
                <use xlink:href="/img/svgdefs.svg#icon-calc" xmlns:xlink="http://www.w3.org/1999/xlink"
                     style="width: 100%;height:100%;"></use>
            </svg>
            <div class="block-tooltip">Подбор станции онлайн</div>
        </a>
    </div>
    <div class="fix-buttons-block">
        <a href="tel:+78123857383" class="fix-button button-callback">
            {{-- <a href="{{route('recall')}}" class="fix-button"> --}}
            <div class="block-tooltip">Заказать обратный звонок</div>
            <svg>
                <use xlink:href="/img/svgdefs.svg#icon-phone" xmlns:xlink="http://www.w3.org/1999/xlink"
                     style="width: 100%;height:100%;"></use>
            </svg>
        </a>
    </div>
</div>