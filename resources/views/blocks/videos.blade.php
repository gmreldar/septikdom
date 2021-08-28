<section id="new-comments">
    <div class="title-box">
        <div class="title-content">
            <h1 class="title">Видео отзывы</h1>
            <span>Видеоролики о нашей работе</span>
        </div>
    </div>
    <div class="slider-new-comments-box">
        <div class="custom-prev-arrow new-slider1">
            <svg class="default-arrow">
                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
            <svg class="hover-arrow">
                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
        </div>
        <div class="slider-new-comments lazy">
            @isset($videos)
            @foreach($videos as $video)
                <div class="video-comment">
                    <div class="video-box">
                    <div class="video-poster"><img data-src="/{{ $video->image }}" alt="{{ $video->alt }}" class="lazy"></div>
                        <div class="play-video-comment" data-video-url="{{ $video->link }}">
                            <svg>
                                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-play') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                            </svg>
                        </div>
                    </div>
                    <div class="video-footer">
                        <p class="video-comment-name">{{ $video->name }}</p>
                        <p class="video-comment-city">{{ $video->description }}</p>
                    </div>
                </div>
            @endforeach
            @endisset
            <!-- <div class="video-comment">
                <div class="video-box">
                <div class="video-poster"><img data-src="{{ asset('/img/5.jpg') }}" alt="asdfgg" class="lazy"></div>
                    <div class="play-video-comment" data-video-url="https://www.youtube.com/watch?v=YECikvPVvAs">
                        <svg>
                            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-play') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                        </svg>
                    </div>
                </div>
                <div class="video-footer">
                    <p class="video-comment-name">asdfsdfasdf</p>
                    <p class="video-comment-city">asdfasdfsadfasdfsadf</p>
                </div>
            </div>
            <div class="video-comment">
                <div class="video-box">
                <div class="video-poster"><img data-src="{{ asset('/img/bg-about.jpg') }}" alt="asdfgg" class="lazy"></div>
                    <div class="play-video-comment" data-video-url="https://www.youtube.com/embed/YECikvPVvAs">
                        <svg>
                            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-play') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                        </svg>
                    </div>
                </div>
                <div class="video-footer">
                    <p class="video-comment-name">asd</p>
                    <p class="video-comment-city">asdfasdfsadfasdfsadf</p>
                </div>
            </div>
            <div class="video-comment">
                <div class="video-box">
                <div class="video-poster"><img data-src="{{ asset('/img/bg1-2.jpg') }}" alt="asdfgg" class="lazy"></div>
                    <div class="play-video-comment" data-video-url="https://www.youtube.com/embed/YECikvPVvAs">
                        <svg>
                            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-play') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                        </svg>
                    </div>
                </div>
                <div class="video-footer">
                    <p class="video-comment-name">asdnnnfsdfasdf</p>
                    <p class="video-comment-city">asdfasdfsadfasdfsadf</p>
                </div>
            </div>
            <div class="video-comment">
                <div class="video-box">
                <div class="video-poster"><img data-src="{{ asset('/img/bg17.jpg') }}" alt="asdfgg" class="lazy"></div>
                    <div class="play-video-comment" data-video-url="https://www.youtube.com/embed/YECikvPVvAs">
                        <svg>
                            <use xlink:href="{{ asset('/img/svgdefs.svg#icon-play') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
                        </svg>
                    </div>
                </div>
                <div class="video-footer">
                    <p class="video-comment-name">ddddasdfsdfasdf</p>
                    <p class="video-comment-city">asdfasdfsadfasdfsadf</p>
                </div>
            </div> -->
        </div>
        <div class="custom-next-arrow new-slider1">
            <svg class="default-arrow">
                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow-two') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
            <svg class="hover-arrow">
                <use xlink:href="{{ asset('/img/svgdefs.svg#icon-arrow') }}" xmlns:xlink="http://www.w3.org/1999/xlink"></use>
            </svg>
        </div>
        <div class="custom-dots new-slider1"></div>
    </div>
    <section class="popup videos-video-popup">
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
</section>