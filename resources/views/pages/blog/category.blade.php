@extends('index')

@section('head')
    <title>{{ $activeCategory->title }}</title>
    <meta name="keywords" content="{{ $activeCategory->keywords }}">
    <meta name="description" content="{{ $activeCategory->description }}">
    @if($activeCategory->seo_image)
        <meta property="og:image" content="{{ url($activeCategory->seo_image) }}"/>
        <link rel="image_src" href="{{ url($activeCategory->seo_image) }}"/>
    @else
        {!! $defaultOGImage !!}
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="og:title" content="{{ $activeCategory->title }}">
		<meta name="og:description" content="{{ $activeCategory->description }}">
@endsection

@section('content')
    <section class="blog">
        <div class="wrapper">
            {{ Breadcrumbs::render('blog.category', $activeCategory) }}
            <div class="title-box">
                <div class="title-content">
                    <h1 class="title">{{ $activeCategory->name }}</h1>
                    <span>Блог</span>
                </div>
            </div>
            <div class="blog-list">
                <div class="search-mobile">
                    <div class="search-input-mobile">
                        <input type="text" placeholder="Поиск" autocomplete="off" id="search-input-mobile">
                        <svg class="icon-search">
                            <use xlink:href="img/svgdefs.svg#icon-search"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                        </svg>

                        <div class="search-result-mobile scrollbar-mobile" id="scrollbar-mobile"></div>
                    </div>
                </div>

                @include('pages.blog.blocks.articles')

                <div class="pagination pagination-mobile">
                    {{ $articles->links() }}
                </div>


                <div class="tags">
                    <div class="search">
                        <div class="search-input">
                            <input type="text" placeholder="Поиск" autocomplete="off" id="search-input">
                            <svg class="icon-search">
                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-search') }}"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                            </svg>
                        </div>
                        <div class="search-result scrollbar" id="scrollbar"></div>
                    </div>

                    <div class="category-tags">
                        <ul>
                            <li class="{{ Request::url() === route('blog') ? 'active' : '' }}"><a
                                        href="{{route('blog')}}">Все</a></li>
                            @isset($categories)
                                @foreach($categories as $category)
                                    <li @isset($activeCategory) class="{{ $activeCategory->id == $category->id ? 'active' : '' }}" @endisset>
                                        <a href="{{route('blog.category', $category->link)}}">
                                            {{ $category->name }}
                                        </a>
                                    </li>
                                @endforeach
                            @endisset
                        </ul>
                    </div>
                    <div class="social">
                        <div class="share">
                            <p>Поделиться:</p>
                            <div class="social-links">
                                <a class="fb" onclick="Share.facebook()">
                                    <svg>
                                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-facebook') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                    </svg>
                                </a>
                                <a class="vk" onclick="Share.vk()">
                                    <svg>
                                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-vk') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        {{--<div class="like">--}}
                            {{--<p>Нравиться:</p>--}}
                            {{--<div class="like-hearth">--}}
                                {{--<a href="#">--}}
                                    {{--<svg class="icon-like">--}}
                                        {{--<use xlink:href="/img/svgdefs.svg#icon-like"--}}
                                             {{--xmlns:xlink="http://www.w3.org/1999/xlink"></use>--}}
                                    {{--</svg>--}}
                                    {{--<span>12</span>--}}
                                {{--</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="popup video-popup">
        <div class="popup-overlay"></div>
        <svg class="popup-close">
            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-cross') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
        </svg>
        <div class="popup-wrapper">
            <div class="video-box">
                <div class="video-height"></div>
                <div class="video-content">
										<iframe src="" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
                    <div class="video-error">Нет видео</div>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('script')
    <script>
        // document.body.style.overflow = 'visible';
    </script>
@endsection
