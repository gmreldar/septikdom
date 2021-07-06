@if(!empty($works))
<link href="/css/portfolio_items.css" rel="stylesheet">
<section id="new-comments">
    <div class="title-box">
        <div class="title-content">
            <h2 class="title">Портфолио</h2>
            <span>Примеры наших работ</span>
        </div>
    </div>
    <div class="slider-new-comments-box">
        <div class="custom-prev-arrow new-slider1">
            <svg class="default-arrow">
                <use xlink:href="/img/svgdefs.svg#icon-arrow-two" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
            <svg class="hover-arrow">
                <use xlink:href="/img/svgdefs.svg#icon-arrow" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
        </div>
        <div class="slider-new-comments lazy">
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
        </div>
        <div class="custom-next-arrow new-slider1">
            <svg class="default-arrow">
                <use xlink:href="/img/svgdefs.svg#icon-arrow-two" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
            <svg class="hover-arrow">
                <use xlink:href="/img/svgdefs.svg#icon-arrow" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
        </div>
        <div class="custom-dots new-slider1"></div>
    </div>
    <section class="popup videos-video-popup">
		<div class="popup-overlay"></div>
            <svg class="popup-close">
                    <use xlink:href="/img/svgdefs.svg#icon-cross" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
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
</section>
@endif
