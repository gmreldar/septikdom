@extends('index')

@section('head')
    <title>{{ $article->title }}</title>
    <meta name="keywords" content="{{ $article->keywords }}">
    <meta name="description" content="{{ $article->description }}">
    @if($article->seo_image)
        <meta property="og:image" content="{{ url($article->seo_image) }}"/>
        <link rel="image_src" href="{{ url($article->seo_image) }}"/>
    @else
        {!! $defaultOGImage !!}
    @endif
    <meta name="twitter:card" content="summary_large_image">
    <meta name="og:title" content="{{ $article->title }}">
    <meta name="og:description" content="{{ $article->description }}">
@endsection

@section('content')
    <section class="articles">
        <div class="wrapper">
            {{ Breadcrumbs::render('blog.article', $activeCategory, $article) }}
            <div class="articles-content">
                <div class="search-mobile">
                    <div class="search-input-mobile">
                        <input type="text" placeholder="Поиск" autocomplete="off" id="search-input-mobile">
                        <svg class="icon-search">
                            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-search') }}"
                                 xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                        </svg>
                        <div class="search-result-mobile scrollbar-mobile" id="scrollbar-mobile">
                        </div>
                    </div>
                </div>
                <div class="articles-text">
                    <h1>
                        {{ $article->name }}
                    </h1>
                    <div class="articles-pic" style="background-image: url(/{{ $article->image }});"></div>
                    {!! $article->text !!}
                    <div class="info">
                        <div class="info-main">
                            <div class="info-date">
                                <div class="block-svg">
                                    <svg class="icon-like">
                                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-calendar') }}"
                                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                    </svg>
                                </div>
                                <span>{{ $article->created_at->format('d.m.Y') }}</span>
                            </div>
                        </div>
                        <div class="info-view">
                            <div class="block-svg">
                                <svg class="icon-like">
                                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-view') }}"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                            </div>
                            <span>{{ $article->views }}</span>
                        </div>
                    </div>
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
		@include('blocks.video_popup')
        @include('blocks.projects')
@endsection

@section('script')
    <script src="{{ asset('/js/share.js') }}"></script>
@endsection
