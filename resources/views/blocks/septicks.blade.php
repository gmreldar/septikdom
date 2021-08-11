<div class="wrapper septicks-block">
    <div class="title-box">
        <div class="title-content">
            @isset($is_main)
                <h2 class="title"><a href="{{route('catalog')}}">Автономная канализация</a></h2>
            @else
                <h2 class="title"><a href="{{route('catalog')}}">Септики</a></h2>
            @endif
            <span>Каталог</span>
        </div>
    </div>
    @isset($is_main)
        <div class="catalog-content">
            <div style="text-align:justify">
                {!! $SeoText_catg !!}
            </div>
        </div>
    @endif
    <div class="septic-items">
        @isset($septics)
        @foreach($septics as $septic)
            <a href="{{route('catalog.category', $septic->link)}}" class="septic-item-link">
                <div class="septic-item">
                    <div class="septic-img">
                        <img class="lazy" data-src="/min/{{ $septic->image }}" alt="{{ $septic->alt }}">
                    </div>
                    <div class="septic-footer">
                        <div class="septic-content">
                            <p class="septic-title">{{ $septic->name }}</p>
                            <p class="septic-text">{!! $septic->annotation !!}</p>
                        </div>
                        <div class="septic-footer-inner">
                            <div class="septic-footer-text">
                                <a href="{{route('catalog.category', $septic->link)}}">Подробнее</a>
                                <p class="septic-title-default">{{ $septic->name }}</p>
                            </div>
                            <div class="icon">
                                <svg class="default-svg">
                                    <use xlink:href="/img/svgdefs.svg#icon-arrow"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                                <svg class="hover-svg">
                                    <use xlink:href="/img/svgdefs.svg#icon-arrow-two"
                                         xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
        @endisset
    </div>
    @isset($is_main)
        <div class="catalog-content under-items">
            <div style="text-align:justify">
                {!! $SeoText_ads !!}
            </div>
        </div>
    @endif
</div>
