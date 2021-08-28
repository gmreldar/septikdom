<section id="promotions_vertical" style="
    padding: 0;
">
    <section id="four" style="    background: white;     padding-bottom: 0;">
        <div class="wrapper">
            <div class="title-box">
                <div class="title-content">
                    <h2 class="header-bigtitle"><a href="{{route('blog.category', 'akcii')}}">Акции</a></h2>
                </div>
            </div>
        </div>
        <div class="slider-services-box">
            <div class="custom-prev-arrow slider11">
                <svg class="default-arrow">
                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                </svg>
                <svg class="hover-arrow">
                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                </svg>
            </div>
            <div class="slider-promotions">
                @isset($promotions)
                    @foreach($promotions as $promotion)
                        <div>
                            <div class="item" style="width: 100%; display: inline-block; min-height: 280px; height: 280px;">
                                <a href="{{route('blog.article', [$promotion->category->link, $promotion->link])}}">
                                    <div class="img" style="height: 100%;"><img style="height: 100%;" data-src="{{ asset('/min/' . $promotion->discount_slider_img ? $promotion->discount_slider_img : $promotion->image) }}"
                                                          alt="{{ $promotion->alt }}"
                                                          class="lazy-img"></div>
                                </a>
                            </div>
                        </div>

                        {{--                    <div class="item">--}}
                        {{--                        <a href="{{route('services.item', $service->link)}}">--}}
                        {{--                            <div class="img"><img data-src="/min/{{ $service->image }}" alt="{{ $service->alt }}" class="lazy-img"></div>--}}
                        {{--                            <div class="item-text">--}}
                        {{--                                <div class="item-text-inner">--}}
                        {{--                                    <h3>{{ $service->name }}</h3>--}}
                        {{--                                    <p>{{ $service->annotation }}</p>--}}
                        {{--                                </div>--}}
                        {{--                                <a href="{{route('services.item', $service->link)}}" class="item-link">Подробнее</a>--}}
                        {{--                                <div class="svg-box">--}}
                        {{--                                    <svg class="no-hover-svg">--}}
                        {{--                                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}"--}}
                        {{--                                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>--}}
                        {{--                                    </svg>--}}
                        {{--                                    <svg class="hover-svg">--}}
                        {{--                                        <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}"--}}
                        {{--                                             xmlns:xlink="http://www.w3.org/1999/xlink"></use>--}}
                        {{--                                    </svg>--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        </a>--}}
                        {{--                    </div>--}}
                    @endforeach
                @endisset
            </div>
            <div class="custom-next-arrow slider11">
                <svg class="default-arrow">
                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                </svg>
                <svg class="hover-arrow">
                    <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                </svg>
            </div>
            <div class="custom-dots slider11"></div>
        </div>
    </section>

    <style>
        .post {
            color: black;
            border-radius: 5px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            flex-direction: column;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            margin-bottom: 25px;
            height: 308px;
            overflow: hidden;
        }

        .post .post-img_wrapper {
            border-radius: 5px;
            overflow: hidden;
            width: 100%;
        }

        .post .post-img:hover {
            -webkit-transform: scale(1.1);
            -ms-transform: scale(1.1);
            transform: scale(1.1);
        }

        .post .post-img {
            position: relative;
            width: 100%;
            height: 308px;
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            border-radius: 5px;
            -webkit-transition: .3s ease-out;
            transition: .3s ease-out;
        }
    </style>
</section>