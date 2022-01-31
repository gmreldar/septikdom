<div class="title-box" id="otzyvy">
    <div class="title-content">
        <h2 class="title">Отзывы</h2>
        <span>Что о нас говорят клиенты?</span>
    </div>
</div>
<div class="slider-comments-box">
    <div class="custom-prev-arrow slider2">
        <svg class="default-arrow">
            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
        </svg>
        <svg class="hover-arrow">
            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
        </svg>
    </div>
    <div class="slider-comments">
        @isset($reviews)
            @foreach($reviews as $review)

                    <div>
                        <div class="comment">
                            <div class="comment-inner">
                                <div class="comment-img">
                                    <img data-src="{{ asset($review->file) }}" alt="{{ $review->alt }}" class="lazy-img">
                                </div>
                                <div class="comment-text-wrap">
                                    <div class="comment-text">
                                        <h3>{{ $review->name }}</h3>
                                        <span class="datetime">{{ $review->created_at->format('d.m.Y') }}</span>
                                        <p><q>{{ $review->message }}</q></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

            @endforeach
        @endisset
    </div>
    <div class="custom-next-arrow slider2">
        <svg class="default-arrow">
            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
        </svg>
        <svg class="hover-arrow">
            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
        </svg>
    </div>
    <div class="custom-dots slider2"></div>
</div>
<div class="buttons">
    <div class="wrapper">
        <span class="button-submit add-review-button">Добавить отзыв</span>
    </div>
</div>