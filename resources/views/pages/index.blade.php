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
    <meta name="twitter:card" content="summary_large_image">
    <meta name="og:title" content="{{ $page->title }}">
    <meta name="og:description" content="{{ $page->description }}">

@endsection

@section('content')
    <!-- @include('elements.preloader') -->
    @include('blocks.licenses_popups')

    <nav class="blocks-pagination">
        <a href="#one" class="block block-scroll block-active">
            <div class="block-circle"></div>
            <div class="block-tooltip">Главная</div>
        </a>
        <a href="#two" class="block block-scroll">
            <div class="block-circle"></div>
            <div class="block-tooltip">О нас</div>
        </a>
        <a href="#four" class="block block-scroll">
            <div class="block-circle"></div>
            <div class="block-tooltip">Услуги</div>
        </a>
        <a href="#five" class="block block-scroll">
            <div class="block-circle"></div>
            <div class="block-tooltip">Септики</div>
        </a>
        <a href="#seven" class="block block-scroll">
            <div class="block-circle"></div>
            <div class="block-tooltip">Как мы работаем?</div>
        </a>
        <a href="#eleven" class="block block-scroll">
            <div class="block-circle"></div>
            <div class="block-tooltip">Отзывы</div>
        </a>
        <a href="#thirteen" class="block block-scroll">
            <div class="block-circle"></div>
            <div class="block-tooltip">Блог</div>
        </a>
        <a href="#fourteen" class="block block-scroll">
            <div class="block-circle"></div>
            <div class="block-tooltip">Портфолио</div>
        </a>
    </nav>
    <section class="one-placeholder"></section>
    <section id="one" style="display: none;">
        <div class="slider-container first-screen-showoff first-section">
            @isset($headSlider)
                @foreach($headSlider as $slide)
                    <div class="slide">
                        <div class="wrapper">
                            <div class="slide-info">
                                <div class="slide-content">
                                    <p class="slide-title">{{ $slide->text1 }}</p>
                                    <p class="slide-desc">{{ $slide->text2 }}</p>
                                    {{-- <button class="slide-button button-green" onclick="location.href='{{ route('recall') }}'">Заказать обратный звонок</button> --}}
                                    <button class="slide-button button-green callback-click" onclick>Заказать обратный
                                        звонок
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="bgs">
                            <div class="slide-bg-1" style="background-image: url('{{ asset('/img/gray-bg.jpg') }}')">
                                <div class="slider-bg-1-fade"></div>
                            </div>
                            <div class="slide-bg-2" style="background-image: url('/{{ asset($slide->image) }}');">
                                <div class="slider-bg-2-fade"></div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
        <div class="slider-controls first-screen-showoff">
            <div class="wrapper">
                <div class="controls-arrows">
                    <div class="custom-prev-arrow slider-main">
                        <svg class="default-arrow">
                            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                        </svg>
                        <svg class="hover-arrow">
                            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                        </svg>
                    </div>
                    <div class="custom-next-arrow slider-main">
                        <svg class="default-arrow">
                            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                        </svg>
                        <svg class="hover-arrow">
                            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                        </svg>
                    </div>
                </div>
                <div class="custom-dots slider-main"></div>
            </div>
        </div>
        <div class="stations">
            <div class="slider-container first-screen-stations lazy">
                @isset($logoSlider)
                    @foreach($logoSlider as $slide)
                        <div class="station">
                            <a class="station-item" href="{{ $slide->url }}"><img src="{{ asset($slide->image) }}"
                                                                                  alt="{{ $slide->alt }}"></a>
                        </div>
                    @endforeach
                @endisset
            </div>
            <div class="slider-controls first-screen-stations lazy">
                <div class="wrapper">
                    <div class="controls-arrows">
                        <div class="custom-prev-arrow slider-stations">
                            <svg class="default-arrow">
                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                            </svg>
                            <svg class="hover-arrow">
                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                            </svg>
                        </div>
                        <div class="custom-next-arrow slider-stations">
                            <svg class="default-arrow">
                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                            </svg>
                            <svg class="hover-arrow">
                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="two">
        <img data-src="{{ asset('/img/bg2.jpg') }}" alt="Img" class="bgi lazy-img">
        <div class="wrapper">
            <div class="title-box">
                <div class="title-content">
                    <span class="title"><a href="{{route('about')}}">Септики</a></span>
                    <span>О нас</span>
                </div>
            </div>
            <div class="we-table">
                <div class="we-tooltip order-9 text-right">
                    <p>За 12 лет работы мы сформировали большую экспертность в монтаже септиков, знаем какое
                        оборудование надежнее, проще в эксплуатации, дешевле в обслуживании. Являемся официальными
                        представителями заводов.</p>
                    <div class="triangle triangle-bottom"></div>
                </div>
                <div class="we-number order-2">
                    <div class="we-number-content">
                        <mark>Уже 12 лет</mark>
                        <p>устанавливаем системы автономных канализаций</p>
                    </div>
                </div>
                <div class="we-tooltip order-3 text-left">
                    <p>С 2006 года занимаемся установкой септиков для загородных домов. Мы были первыми на Дальнем
                        Востоке, начиная с одной бригады. На текущий момент уже более 6 лет работаем в
                        Санкт-Петербурге.</p>
                    <div class="triangle triangle-left"></div>
                </div>
                <div class="we-price order-8 text-right">
                    <div class="we-price-content">
                        <mark>20 000 руб.</mark>
                        <div class="line block-right"></div>
                        <p>со сметы в среднем мы экономим для Вас за счет опыта и дилерских скидок</p>
                    </div>
                </div>
                <img class="order-1 lazy" data-src="img/logo-circle.png" alt="Логотип">
                <div class="we-price order-4 text-left">
                    <div class="we-price-content">
                        <mark>от 500 монтажей</mark>
                        <div class="line"></div>
                        <p>мы успеваем выполнить за один год. <a href="{{route('portfolio')}}">Портфолио</a></p>
                    </div>
                </div>
                <div class="we-tooltip order-7 text-right">
                    <p>Часто монтаж системы автономной канализации занимает не больше 1 дня. Однако мы готовы
                        гарантировать качество монтажа на 3 года, а еще около 40% новых клиентов приходят к нам по
                        рекомендации, что говорит о подходе к работе. <a href="#otzyvy">Отзывы</a>
                    </p>
                    <div class="triangle triangle-right"></div>
                </div>
                <div class="we-number order-6">
                    <div class="we-number-content">
                        <mark>90% монтажей</mark>
                        <p>мы выполняем за один день, так как наша команда имеет большой опыт в данной сфере</p>
                    </div>
                </div>
                <div class="we-tooltip order-5 text-left">
                    <p>На данный момент у нас есть 3 штатных бригады и свой транспорт, мы выполняем по 45 монтажей в
                        месяц. Посмотрите наши работы в разделе <a href="{{route('portfolio')}}">Портфолио</a></p>
                    <div class="triangle triangle-top"></div>
                </div>
            </div>
        </div>
    </section>

    @include('blocks.services')

    <section id="five">
        @include('blocks.septicks', ['is_main'=>true,'SeoText_catg' => $SeoText_catg,'SeoText_ads' => $SeoText_ads,])
    </section>

    <section id="six">
        <img data-src="img/bg6.jpg" alt="Img" class="bgi lazy-img">
        <div class="six-content">
            <h2>Расчитать полную стоимость монтажа</h2>
            <a href="{{route('calculator')}}" class="button button-transparent">
                <div class="button-content">
                    <span>Калькулятор стоимости</span>
                    <div class="button-svg">
                        <svg class="button-svg-default">
                            <use xlink:href="img/svgdefs.svg#icon-arrow"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                        </svg>
                        <svg class="button-svg-hover">
                            <use xlink:href="img/svgdefs.svg#icon-arrow-two"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                        </svg>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <section id="seven">
        <div class="wrapper">
            <div class="title-box">
                <div class="title-content">
                    <h2 class="header-bigtitle">Этапы работы по установке септика</h2>
                </div>
                <span class="subtitle">Обычно от первого звонка до установки септика на участке проходит не более 3-х дней</span>
            </div>
            <div class="steps">
                <div class="step step-no-active odd">
                    <div class="step-active-box">
                        <p>Позвоните по телефону <a href="tel:+78123857383">+7(812)385-73-83</a> или отправьте заявку
                            через форму на сайте. Мы свяжемся с Вами в течение 5 минут в рабочее время с 10:00 до 19:00
                        </p>
                    </div>
                    <div class="step-title-and-content">
                        <div class="step-title">Обращение</div>
                        <div class="step-content">
                            <div class="step-svg">
                                <div class="before-svg"></div>
                                <svg>
                                    <use xlink:href="img/svgdefs.svg#icon-arrow-two"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                            </div>
                            <div class="step-circle"></div>
                        </div>
                    </div>
                </div>

                <div class="step step-no-active">
                    <div class="step-active-box">
                        <p>В течение 10-15 минут мы определяем задачу, которую будет решать септик, выясняем важные
                            детали, влияющие на монтаж, такие как тип грунта, уровень грунтовых вод, подвод
                            коммуникаций</p>
                    </div>
                    <div class="step-title-and-content">
                        <div class="step-title">Консультация</div>
                        <div class="step-content">
                            <div class="step-svg">
                                <div class="before-svg"></div>
                                <svg>
                                    <use xlink:href="img/svgdefs.svg#icon-arrow-two"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                            </div>
                            <div class="step-circle"></div>
                        </div>
                    </div>
                </div>

                <div class="step step-no-active odd">
                    <div class="step-active-box">
                        <p>Подбираем необходимое оборудование под конкретную задачу и рассчитываем точную стоимость
                            монтажа оборудования. Вы получаете подробную смету.</p>
                    </div>
                    <div class="step-title-and-content">
                        <div class="step-title">Оборудование</div>
                        <div class="step-content">
                            <div class="step-svg">
                                <div class="before-svg"></div>
                                <svg>
                                    <use xlink:href="img/svgdefs.svg#icon-arrow-two"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                            </div>
                            <div class="step-circle"></div>
                        </div>
                    </div>
                </div>

                <div class="step step-no-active">
                    <div class="step-active-box">
                        <p>Наш инженер выезжает на объект для подтверждения всех параметров, которые мы выяснили по
                            телефону и согласуем удобный Вам день для проведения монтажных работ (в простых случаях это
                            не требуется)</p>
                    </div>
                    <div class="step-title-and-content">
                        <div class="step-title">Выезд</div>
                        <div class="step-content">
                            <div class="step-svg">
                                <div class="before-svg"></div>
                                <svg>
                                    <use xlink:href="img/svgdefs.svg#icon-arrow-two"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                            </div>
                            <div class="step-circle"></div>
                        </div>
                    </div>
                </div>

                <div class="step step-no-active odd">
                    <div class="step-active-box">
                        <p>В 90% случаев мы приезжаем с утра, делаем установку септика и уже вечером Вы можете ощутить
                            удобство автономной канализации</p>
                    </div>
                    <div class="step-title-and-content">
                        <div class="step-title">Монтаж</div>
                        <div class="step-content">
                            <div class="step-svg">
                                <div class="before-svg"></div>
                                <svg>
                                    <use xlink:href="img/svgdefs.svg#icon-arrow-two"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                            </div>
                            <div class="step-circle"></div>
                        </div>
                    </div>
                </div>

                <div class="step step-no-active">
                    <div class="step-active-box">
                        <p>На участке работает ваша автономная канализация, установленная по всем нормам и техническим
                            требованиям с гарантией на 3 года</p>
                    </div>
                    <div class="step-title-and-content">
                        <div class="step-title">Результат</div>
                        <div class="step-content">
                            <div class="step-svg">
                                <div class="before-svg"></div>
                            </div>
                            <div class="step-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="eight" class="grey-overlay">
        <img data-src="img/5.jpg" alt="Img" class="bgi lazy-img">
        @include('blocks.video_popup')
        <div class="eight-content">
            <h2>Как происходит монтаж септика?</h2>
            <div class="button button-grey" data-video-url="https://www.youtube.com/embed/FsjauCgNyb4?enablejsapi=1">
                <div class="button-content">
                    <div class="play">
                        <svg>
                            <use xlink:href="img/svgdefs.svg#icon-play"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                        </svg>
                    </div>
                    <div class="watch">
                        <p>Смотреть видео</p>
                        <span>длительность 12 мин</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="ten">
        <div class="wrapper">
            <div class="title-box">
                <div class="title-content">
                    <h2 class="header-bigtitle">Что влияет на стоимость монтажа септика?</h2>
                </div>
            </div>
            <div class="lists">
                <div class="list">
                    <h3>Всё, что нужно, это предоставить информацию о технических характеристиках объекта</h3>
                    <ul>
                        <li>Глубина трубы, которая выходит из дома</li>
                        <li>Тип грунта</li>
                        <li>Есть ли грунтовые воды на участке</li>
                        <li>Место установки септика</li>
                        <li>Расстояние от самой станции к дому</li>
                        <li>Расстояние от станции до точки сброса</li>
                        <li>Какой характер точки сброса</li>
                    </ul>
                </div>

                <div class="list">
                    <h3>Исходя из полученной информации, мы</h3>
                    <ul>
                        <li>Подберем правильно оборудование</li>
                        <li>Расчитаем сумму оборудования и услуги</li>
                        <li>Выполним качественный монтаж в запланированный срок</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="eleven">
        @include('blocks.reviews')
    </section>

    @include('blocks.videos')

    <section id="twelve">
        @include('blocks.licenses')
    </section>

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
                            <img class="article-img lazy" src="{{ asset('/min/' . $article->image) }}"></img>
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

    <!--<section id="sub-news" style="background-image: url(img/bg-sub-news.jpg);">
        <div class="content">
            <div class="content-text">
                <h2>Оформить подписку на сезонные новости</h2>
                <span>Еженедельный розыгрыш скидки на монтажные работы до 20 000 руб</span>
            </div>
            <form>
                <div class="input-group">
                    <input type="text" class="email-input" required>
                    <span class="bar"></span>
                    <label>Email</label>
                    <span class="error-field">Ошибка</span>
                </div>
                <button type="submit">Отправить</button>
            </form>
        </div>
    </section> -->

        <section id="fourteen">
        @include('blocks.works')
    </section>

    @include('blocks.promotions_horizontal')

    @include('blocks.bestsellers')

    <section id="three">
        <div class="wrapper">
            <div class="title-box">
                <div class="title-content">
                    <h2 class="title">Почему мы?</h2>
                    <span>Наши преимущества</span>
                </div>
            </div>
            <div class="advantages">
                <div class="advantage">
                    <object type="image/svg+xml" data="img/advantages/advantage1.svg"></object>
                    <p>3 штатных бригады</p>
                    <div class="overlay">
                        <div class="overlay-inner">
                            <div class="overlay-line"></div>
                            <p class="overlay-desc">Имеем в наличии 3 штатных бригады сертифицированных специалистов</p>
                        </div>
                    </div>
                </div>
                <div class="advantage">
                    <svg>
                        <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-advantage2') }}"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                    <p>Безопасная экономия</p>
                    <div class="overlay">
                        <div class="overlay-inner">
                            <div class="overlay-line"></div>
                            <p class="overlay-desc">Мы точно знаем, на чем можно сэкономить</p>
                        </div>
                    </div>
                </div>
                <div class="advantage">
                    <svg>
                        <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-advantage3') }}"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                    <p>Мы дилеры вам выгодно</p>
                    <div class="overlay">
                        <div class="overlay-inner">
                            <div class="overlay-line"></div>
                            <p class="overlay-desc">Мы экономим для Вас деньги за счет опыта и дилерских скидок</p>
                        </div>
                    </div>
                </div>
                <div class="advantage">
                    <svg>
                        <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-advantage4') }}"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                    <p>Бесплатный выезд</p>
                    <div class="overlay">
                        <div class="overlay-inner">
                            <div class="overlay-line"></div>
                            <p class="overlay-desc">Бесплатный выезд инженера на Ваш участок для замера</p>
                        </div>
                    </div>
                </div>
                <div class="advantage">
                    <svg>
                        <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-advantage7') }}"
                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                    <p>Гарантия - 36 месяцев</p>
                    <div class="overlay">
                        <div class="overlay-inner">
                            <div class="overlay-line"></div>
                            <p class="overlay-desc">Гарантия на оборудование и монтаж – 36 месяцев</p>
                        </div>
                    </div>
                </div>
                <div class="advantage">
                    <svg>
                        <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-rezult1') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                    <p>Ответы на вопросы</p>
                    <div class="overlay">
                        <div class="overlay-inner">
                            <div class="overlay-line"></div>
                            <p class="overlay-desc">Свяжитесь с нами, и мы ответим на все Ваши вопросы</p>
                        </div>
                    </div>
                </div>
                <div class="advantage">
                    <svg>
                        <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-rezult2') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                    <p>Адекватные сроки</p>
                    <div class="overlay">
                        <div class="overlay-inner">
                            <div class="overlay-line"></div>
                            <p class="overlay-desc">Монтаж и наладка до 10 часов</p>
                        </div>
                    </div>
                </div>
                <div class="advantage">
                    <svg>
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-rezult3') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                        <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-rezult3') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                    <p>Качественный монтаж</p>
                    <div class="overlay">
                        <div class="overlay-inner">
                            <div class="overlay-line"></div>
                            <p class="overlay-desc">Мы найдем для Вам самое оптимальное решение и выполним все работы за
                                кратчайшие сроки кратчайшие сроки кратчайшие сроки кратчайшие сроки кратчайшие сроки</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script defer src="{{ asset('/js/slick.min.js') }}"></script>

    <script defer src="{{ asset('/js/slider.js') }}"></script>
@endsection
