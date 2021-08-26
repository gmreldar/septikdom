<section id="four">
    <div class="wrapper">
        <div class="title-box">
            <div class="title-content">
                <h2 class="header-bigtitle"><a href="{{route('services')}}">Услуги</a></h2>
            </div>
        </div>
    </div>
    <div class="slider-services-box">
        <div class="custom-prev-arrow slider1">
            <svg class="default-arrow">
            {{-- @todo folder dist --}}
                <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow-two') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
            <svg class="hover-arrow">
            {{-- @todo folder dist --}}
                <use xlink:href="{{ asset('/dist/img/svgdefs.svg#icon-arrow') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
        </div>
        <div class="slider-services">
            @isset($services)
                @foreach($services as $service)
                    <div>
                        <div class="item" style="width: 100%; display: inline-block;">
                            <a href="{{route('services.item', $service->link)}}">
                            {{-- @todo --}}
                                <div class="img"><img data-src="/min/{{ $service->image }}" alt="{{ $service->alt }}"
                                                      class="lazy-img"></div>
                            </a>
                            <div class="item-text">
                                <a href="{{route('services.item', $service->link)}}">
                                    <div class="item-text-inner">
                                        <h3>{{ $service->name }}</h3>
                                        <p>{{ $service->annotation }}</p>
                                    </div>
                                </a><a href="{{route('services.item', $service->link)}}" class="item-link">Подробнее</a>
                                <div class="svg-box">
                                    <svg class="no-hover-svg">
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
        <div class="custom-next-arrow slider1">
            <svg class="default-arrow">
                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
            <svg class="hover-arrow">
                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
        </div>
        <div class="custom-dots slider1"></div>
    </div>
</section>