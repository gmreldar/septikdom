<section id="mobile-menu">
    <nav id="mobile-menu-canvas">
        <ul id="mm-0">
            <li class="static-item"><a href="mailto:{{ $contact->email }}" target="_blank">{{ $contact->email }}</a>
            </li>
            <li class="static-item {{ $contact->phone_class }}"><a
                        href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></li>

            <li class="{{ Request::url() === route('index') ? 'active' : '' }}"><a
                        href="{!! route('index') !!}">Главная</a></li>
            <li class="{{ Request::url() === route('about') ? 'active' : '' }}">
                <a href="#" onclick="toggle('#vipad2');">О нас</a>
            </li>

            <div id="vipad2" class="vipad">
                <a href="{{route('about')}}" aria-owns="mm-1" aria-haspopup="true">О нас</a>
                <a href="{{route('pages.reviews')}}" aria-owns="mm-2" aria-haspopup="true">Отзывы</a>
            </div>

            </li>
            <li class="{{ in_array(Route::currentRouteName(), ['services', 'services.item']) ? 'active' : '' }}"><a
                        href="{!! route('services') !!}">Услуги</a></li>
            <li>
                <a href="#" onclick="toggle('#vipad');">Каталог</a>
            </li>

            <div id="vipad" class="vipad">
                <a href="#mm-1" aria-owns="mm-1" aria-haspopup="true">Септики</a>
                <a href="#mm-2" aria-owns="mm-2" aria-haspopup="true">Погребы</a>
                <a href="#mm-3" aria-owns="mm-3" aria-haspopup="true" style="margin-bottom: 20px;">Кессоны</a>
            </div>
            <li style="display: none"><span>Каталог</span>
                <svg class="hover">
                    <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow')}}"
                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                </svg>
                <ul id="mm-1">
                    <li class="static-item"><a href="mailto:{{ $contact->email }}"
                                               target="_blank">{{ $contact->email }}</a></li>
                    <li class="static-ite {{ $contact->phone_class }}"><a
                                href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></li>
                    <li class="breadcrumbs"><a href="#mm-0">Меню</a><a href="#mm-1">Септики</a></li>
                    <li><a href="{!! route('catalog') !!}">Все категории</a></li>
                    @foreach(App\Models\ProductCategory::where('type', '=', 1)->where('is_active', '=', 1)->orderBy('ord')->get() as $productCategory)
                        <li>
                            <a href="{{ route('catalog.category', $productCategory->link) }}">{{ $productCategory->short_name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li style="display: none"><span>Каталог</span>
                <svg class="hover">
                
                    <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow') }}"
                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                </svg>
                <ul id="mm-2">
                    <li class="static-item"><a href="mailto:{{ $contact->email }}"
                                               target="_blank">{{ $contact->email }}</a></li>
                    <li class="static-ite {{ $contact->phone_class }}"><a
                                href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></li>
                    <li class="breadcrumbs"><a href="#mm-0">Меню</a><a href="#mm-2">Погребы</a></li>
                    <li><a href="{!! route('catalog') !!}">Все категории</a></li>
                    @foreach(App\Models\ProductCategory::where('type', '=', 3)->where('is_active', '=', 1)->orderBy('ord')->get() as $productCategory)
                        <li>
                            <a href="{{ route('catalog.category', $productCategory->link) }}">{{ $productCategory->short_name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li style="display: none"><span>Каталог</span>
                <svg class="hover">
                
                    <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow') }}"
                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                </svg>
                <ul id="mm-3">
                    <li class="static-item"><a href="mailto:{{ $contact->email }}"
                                               target="_blank">{{ $contact->email }}</a></li>
                    <li class="static-ite {{ $contact->phone_class }}"><a
                                href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a></li>
                    <li class="breadcrumbs"><a href="#mm-0">Меню</a><a href="#mm-3">Кессоны</a></li>
                    <li><a href="{!! route('catalog') !!}">Все категории</a></li>
                    @foreach(App\Models\ProductCategory::where('type', '=', 4)->where('is_active', '=', 1)->orderBy('ord')->get() as $productCategory)
                        <li>
                            <a href="{{ route('catalog.category', $productCategory->link) }}">{{ $productCategory->short_name }}</a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <li class="{{ in_array(Route::currentRouteName(), ['price', 'price.category']) ? 'active' : '' }}"><a
                        onclick="toggle('#vipad2');">Прайс-лист</a></li>
            <div id="vipad2" class="vipad">
                <a href="{!! route('price') !!}">Септики</a>
                <a href="{{route('price.category', 3)}}">Погребы</a>
                <a href="{{route('price.category', 4)}}" style="margin-bottom: 20px;">Кессоны</a>
            </div>

            <li class="{{ Request::url() === route('shipping') ? 'active' : '' }}"><a href="{!! route('shipping') !!}">Доставка
                    и оплата</a></li>
        {{-- <li class="{{ Request::url() === route('payment-shipping') ? 'active' : '' }}"><a href="{!! route('payment-shipping') !!}">Оплата</a></li> --}}
        <!-- <li class="{{ in_array(Route::currentRouteName(), ['blog', 'blog.category', 'blog.article']) ? 'active' : '' }}"><a href="{!! route('blog') !!}">Блог</a></li> -->
            <li class="{{ in_array(Route::currentRouteName(), ['portfolio', 'portfolio.item']) ? 'active' : '' }}"><a
                        href="{!! route('portfolio') !!}">Портфолио</a></li>
            <li class="{{ Request::url() === route('contacts') ? 'active' : '' }}"><a href="{!! route('contacts') !!}">Контакты</a>
            </li>
        </ul>
    </nav>
</section>

<header>
    <div class="white-line">
        <div class="wrapper">
            <div class="white-line-inner">
                <a href="{{ asset('/') }}" class="logo">
                    <img src="{{ asset('/img/logo.svg') }}" width="178" height="29" alt="Логотип">
                </a>
                <nav class="scroll-menu">
                    <ul style="list-style:none;">
                        <li class="{{ Request::url() === route('index') ? 'active' : '' }}"><a
                                    href="{!! route('index') !!}">Главная</a></li>

                        <li class="{{ in_array(Route::currentRouteName(), ['about', 'pages.reviews']) ? 'active' : '' }} dropdown">
                            <a href="{!! route('about') !!}">О нас</a>
                            {{--<a href="#">Каталог</a>--}}
                            <ul class="dropdown-content">
                                <li><a href="{{ route('pages.reviews') }}">Отзывы</a></li>
                            </ul>
                        </li>

                        <li class="{{ in_array(Route::currentRouteName(), ['services', 'services.item']) ? 'active' : '' }}">
                            <a
                                    href="{!! route('services') !!}">Услуги</a></li>
                        <li class="{{ in_array(Route::currentRouteName(), ['catalog', 'catalog.category', 'catalog.product']) ? 'active' : '' }} dropdown">
                            <a href="{!! route('catalog') !!}">Каталог</a>
                            {{--<a href="#">Каталог</a>--}}
                            <ul class="dropdown-content">
                                <li><a href="{{url('/katalog')}}">Септики</a></li>
                                <li><a href="{{url('/katalog/cellars')}}">Погреба</a></li>
                                <li><a href="{{url('/katalog/caissons')}}">Кессоны</a></li>
                            </ul>
                        </li>
                        <li class="{{ in_array(Route::currentRouteName(), ['price', 'price.category']) ? 'active' : '' }} dropdown">
                            <a href="{!! route('price') !!}">Прайс-лист</a>
                            <ul class="dropdown-content">
                                <li class="{{ Request::url() === route('price') ? 'active' : '' }}"><a
                                            href="{{ route('price') }}">Септики</a></li>
                                <li class="{{ Request::url() === route('price.category', 3) ? 'active' : '' }}"><a
                                            href="{{ route('price.category', 3) }}">Погреба</a></li>
                                <li class="{{ Request::url() === route('price.category', 4) ? 'active' : '' }}"><a
                                            href="{{ route('price.category', 3) }}">Кессоны</a></li>
                            </ul>
                        </li>
                        <li class="{{ Request::url() === route('shipping') ? 'active' : '' }}"><a
                                    href="{!! route('shipping') !!}">Доставка и оплата</a></li>
                        {{-- <li class="{{ Request::url() === route('payment-shipping') ? 'active' : '' }}"><a
                                    href="{!! route('payment-shipping') !!}">Оплата</a></li> --}}
                        <li class="{{ in_array(Route::currentRouteName(), ['portfolio', 'portfolio.item']) ? 'active' : '' }}">
                            <a
                                    href="{!! route('portfolio') !!}">Портфолио</a></li>
                        <li class="{{ Request::url() === route('contacts') ? 'active' : '' }}"><a
                                    href="{!! route('contacts') !!}">Контакты</a></li>
                    </ul>
                </nav>
                <div class="white-line-info">
                    @include('blocks.search_block')
                    <a href="mailto:{{ $contact->email }}" class="email" target="_blank">{{ $contact->email }}</a>
                    <div class="vertical-line"></div>
                    <a href="tel:{{ $contact->phone }}"
                       class="phone {{ $contact->phone_class }}">{{ $contact->phone }}</a>
                </div>
                <div class="social-mobile">
                    <div class="whatsapp-mobile">
                        <a href="{{ $contact->wa }}" target="_blank" class="whatsapp-social">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512"
                                 style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512px"
                                 height="512px"><g>
                                    <path d="M256.064,0h-0.128C114.784,0,0,114.816,0,256c0,56,18.048,107.904,48.736,150.048l-31.904,95.104l98.4-31.456    C155.712,496.512,204,512,256.064,512C397.216,512,512,397.152,512,256S397.216,0,256.064,0z M405.024,361.504    c-6.176,17.44-30.688,31.904-50.24,36.128c-13.376,2.848-30.848,5.12-89.664-19.264C189.888,347.2,141.44,270.752,137.664,265.792    c-3.616-4.96-30.4-40.48-30.4-77.216s18.656-54.624,26.176-62.304c6.176-6.304,16.384-9.184,26.176-9.184    c3.168,0,6.016,0.16,8.576,0.288c7.52,0.32,11.296,0.768,16.256,12.64c6.176,14.88,21.216,51.616,23.008,55.392    c1.824,3.776,3.648,8.896,1.088,13.856c-2.4,5.12-4.512,7.392-8.288,11.744c-3.776,4.352-7.36,7.68-11.136,12.352    c-3.456,4.064-7.36,8.416-3.008,15.936c4.352,7.36,19.392,31.904,41.536,51.616c28.576,25.44,51.744,33.568,60.032,37.024    c6.176,2.56,13.536,1.952,18.048-2.848c5.728-6.176,12.8-16.416,20-26.496c5.12-7.232,11.584-8.128,18.368-5.568    c6.912,2.4,43.488,20.48,51.008,24.224c7.52,3.776,12.48,5.568,14.304,8.736C411.2,329.152,411.2,344.032,405.024,361.504z"/>
                                </g></svg>
                        </a>
                    </div>
                    <svg class="mobile-menu-open">
                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-menu') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="black-line">
        <div class="wrapper">
            <div class="black-line-inner">
                <nav class="menu">
                    <ul>
                        <li class="{{ Request::url() === route('index') ? 'active' : '' }}"><a
                                    href="{!! route('index') !!}">Главная</a></li>

                        <li class="{{ in_array(Route::currentRouteName(), ['about', 'pages.reviews']) ? 'active' : '' }} dropdown">
                            <a href="{!! route('about') !!}">О нас</a>
                            {{--<a href="#">Каталог</a>--}}
                            <ul class="dropdown-content">
                                <li><a href="{{ route('pages.reviews') }}">Отзывы</a></li>
                            </ul>
                        </li>

                        <li class="{{ in_array(Route::currentRouteName(), ['services', 'services.item']) ? 'active' : '' }}">
                            <a
                                    href="{!! route('services') !!}">Услуги</a></li>
                        <li class="{{ in_array(Route::currentRouteName(), ['catalog', 'catalog.category', 'catalog.product']) ? 'active' : '' }} dropdown">
                            <a href="{!! route('catalog') !!}">Каталог</a>
                            {{--<a href="#">Каталог</a>--}}
                            <ul class="dropdown-content">
                                <li><a href="{{url('/katalog')}}">Септики</a></li>
                                <li><a href="{{url('/katalog/cellars')}}">Погреба</a></li>
                                <li><a href="{{url('/katalog/caissons')}}">Кессоны</a></li>
                            </ul>
                        </li>
                        <li class="{{ in_array(Route::currentRouteName(), ['price', 'price.category']) ? 'active' : '' }} dropdown">
                            <a href="{!! route('price') !!}">Прайс-лист</a>
                            <ul class="dropdown-content">
                                <li class="{{ Request::url() === route('price') ? 'active' : '' }}"><a
                                            href="{{ route('price') }}">Септики</a></li>
                                <li class="{{ Request::url() === route('price.category', 3) ? 'active' : '' }}"><a
                                            href="{{ route('price.category', 3) }}">Погреба</a></li>
                                <li class="{{ Request::url() === route('price.category', 4) ? 'active' : '' }}"><a
                                            href="{{ route('price.category', 3) }}">Кессоны</a></li>
                            </ul>
                        </li>
                        {{--<li class="{{ Request::url() === route('price') ? 'active' : '' }}"><a--}}
                        {{--href="{!! route('price') !!}">Прайс-лист</a></li>--}}
                        <li class="{{ Request::url() === route('shipping') ? 'active' : '' }}"><a
                                    href="{!! route('shipping') !!}">Доставка и оплата</a></li>
                        {{-- <li class="{{ Request::url() === route('payment-shipping') ? 'active' : '' }}"><a
                                    href="{!! route('payment-shipping') !!}">Оплата</a></li> --}}
                        <li class="{{ in_array(Route::currentRouteName(), ['portfolio', 'portfolio.item']) ? 'active' : '' }}">
                            <a
                                    href="{!! route('portfolio') !!}">Портфолио</a></li>
                        <li class="{{ Request::url() === route('contacts') ? 'active' : '' }}"><a
                                    href="{!! route('contacts') !!}">Контакты</a></li>
                    </ul>
                </nav>
                <div class="social-links">
                    <div class="social-links-inner">
                        <a href="{{ $contact->wa }}" target="_blank" class="whatsapp-social">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512"
                                 style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512px"
                                 height="512px"><g>
                                    <path d="M256.064,0h-0.128C114.784,0,0,114.816,0,256c0,56,18.048,107.904,48.736,150.048l-31.904,95.104l98.4-31.456    C155.712,496.512,204,512,256.064,512C397.216,512,512,397.152,512,256S397.216,0,256.064,0z M405.024,361.504    c-6.176,17.44-30.688,31.904-50.24,36.128c-13.376,2.848-30.848,5.12-89.664-19.264C189.888,347.2,141.44,270.752,137.664,265.792    c-3.616-4.96-30.4-40.48-30.4-77.216s18.656-54.624,26.176-62.304c6.176-6.304,16.384-9.184,26.176-9.184    c3.168,0,6.016,0.16,8.576,0.288c7.52,0.32,11.296,0.768,16.256,12.64c6.176,14.88,21.216,51.616,23.008,55.392    c1.824,3.776,3.648,8.896,1.088,13.856c-2.4,5.12-4.512,7.392-8.288,11.744c-3.776,4.352-7.36,7.68-11.136,12.352    c-3.456,4.064-7.36,8.416-3.008,15.936c4.352,7.36,19.392,31.904,41.536,51.616c28.576,25.44,51.744,33.568,60.032,37.024    c6.176,2.56,13.536,1.952,18.048-2.848c5.728-6.176,12.8-16.416,20-26.496c5.12-7.232,11.584-8.128,18.368-5.568    c6.912,2.4,43.488,20.48,51.008,24.224c7.52,3.776,12.48,5.568,14.304,8.736C411.2,329.152,411.2,344.032,405.024,361.504z"/>
                                </g></svg>
                        </a>
                        {{--<a href="{{ $contact->tg }}" target="_blank" class="telegram-social">--}}
                        {{--<svg>--}}
                        {{--<use xlink:href="/img/svgdefs.svg#icon-telegram"--}}
                        {{--xmlns:xlink="http://www.w3.org/1999/xlink"></use>--}}
                        {{--</svg>--}}
                        {{--</a>     --}}
                        <a href="{{ $contact->yt }}" target="_blank" class="telegram-social">
                            <svg>
                            
                                <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-youtube') }}"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                            </svg>
                        </a>
                        <a href="{{ $contact->vk }}" target="_blank" class="vk-social">
                            <svg>
                            
                                <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-vk') }}"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
