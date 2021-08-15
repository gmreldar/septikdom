<div class="wrapper">
    <div class="title-box">
        <div class="title-content">
            <h1 class="title"><a href="{{route('portfolio')}}">Портфолио</a></h1>
            <span>Примеры наших работ</span>
        </div>
    </div>
    <div class="work-items">
        @isset($works)
        @foreach($works as $work)
            <div class="work-item">
                <a href="{{route('portfolio.item', $work->link)}}">
										<div class="work-img"><img class="lazy" data-src="/min/{{ $work->image }}" alt=""></div>
                    <div class="work-footer">
                        <div class="work-footer-text">
                            <p>{{ $work->name }}</p>
                            <span>{{ $work->annotation }}</span>
                        </div>
                        <div class="icon">
                            <svg class="default-svg">
                                <use xlink:href="/dist/img/svgdefs.svg#icon-arrow"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                            </svg>
                            <svg class="hover-svg">
                                <use xlink:href="/dist/img/svgdefs.svg#icon-arrow-two"
                                     xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
        @endisset
    </div>
    <a href="{{route('portfolio')}}" class="view-all-items">
        <p>Смотреть все работы</p>
        <div class="svg-box">
            <svg class="hover-icon">
                <use xlink:href="/img/svgdefs.svg#icon-arrow-two" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
            <svg class="default-icon">
                <use xlink:href="/img/svgdefs.svg#icon-arrow" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
        </div>
    </a>
</div>