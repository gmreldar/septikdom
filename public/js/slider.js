//Слайдеры

$('.slider-video-comments').slick({
    infinite: false,
    slidesToShow: 1,
    // adaptiveHeight: true,
    arrows: true,
    lazyLoad: 'ondemand',
    prevArrow: $('.custom-prev-arrow.slider6'),
    nextArrow: $('.custom-next-arrow.slider6'),
    dots: true,
    appendDots: $('.custom-dots.slider6'),
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                arrows: false
            }
        },
        {
            breakpoint: 768,
            settings: {
                arrows: false
            }
        }
    ]
});

$('.slider-audio-comments').slick({
    infinite: false,
    slidesToShow: 2,
    // adaptiveHeight: true,
    arrows: true,
    lazyLoad: 'ondemand',
    prevArrow: $('.custom-prev-arrow.slider8'),
    nextArrow: $('.custom-next-arrow.slider8'),
    dots: true,
    appendDots: $('.custom-dots.slider8'),
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                arrows: false,
                slidesToShow: 2
            }
        },
        {
            breakpoint: 768,
            settings: {
                arrows: false,
                slidesToShow: 2
            }
        },
        {
            breakpoint: 560,
            settings: {
                arrows: false,
                slidesToShow: 1
            }
        }
    ]
});

$('.slider-text-comments').slick({
    infinite: false,
    slidesToShow: 2,
    // adaptiveHeight: true,
    arrows: true,
    lazyLoad: 'ondemand',
    prevArrow: $('.custom-prev-arrow.slider9'),
    nextArrow: $('.custom-next-arrow.slider9'),
    dots: true,
    appendDots: $('.custom-dots.slider9'),
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                arrows: false,
                slidesToShow: 2
            }
        },
        {
            breakpoint: 768,
            settings: {
                arrows: false,
                slidesToShow: 2
            }
        },
        {
            breakpoint: 560,
            settings: {
                arrows: false,
                slidesToShow: 1
            }
        }
    ]
});

$('.slider-container.first-screen-showoff').slick({
    infinite: true,
    slidesToShow: 1,
    arrows: true,
    lazyLoad: 'ondemand',
    prevArrow: $('.custom-prev-arrow.slider-main'),
    nextArrow: $('.custom-next-arrow.slider-main'),
    dots: true,
    appendDots: $('.custom-dots.slider-main')
}).on('setPosition', function (event, slick) {
    slick.$slides.find('.slide').css('height', slick.$slideTrack.height() + 'px');
});

$('.slider-container.first-screen-stations').slick({
    infinite: true,
    variableWidth: true,
    slidesToShow: 7,
    arrows: true,
    lazyLoad: 'ondemand',
    centerMode: true,
    centerPadding: $('.slider-container.first-screen-stations').find('.station').outerWidth() / 2,
    prevArrow: $('.custom-prev-arrow.slider-stations'),
    nextArrow: $('.custom-next-arrow.slider-stations'),
    dots: false
})

$('.slider-services').slick({
    infinite: false,
    slidesToShow: 3,
    arrows: true,
    lazyLoad: 'ondemand',
    prevArrow: $('.custom-prev-arrow.slider1'),
    nextArrow: $('.custom-next-arrow.slider1'),
    dots: true,
    appendDots: $('.custom-dots.slider1'),
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                arrows: false,
                slidesToShow: 2
            }
        },
        {
            breakpoint: 768,
            settings: {
                arrows: false,
                slidesToShow: 2
            }
        },
        {
            breakpoint: 560,
            settings: {
                arrows: false,
                slidesToShow: 1
            }
        }
    ]
});



$('.slider-comments').slick({
    infinite: false,
    slidesToShow: 1,
    // adaptiveHeight: true,
    arrows: true,
    lazyLoad: 'ondemand',
    prevArrow: $('.custom-prev-arrow.slider2'),
    nextArrow: $('.custom-next-arrow.slider2'),
    dots: true,
    appendDots: $('.custom-dots.slider2'),
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                arrows: false
            }
        },
        {
            breakpoint: 768,
            settings: {
                arrows: false
            }
        }
    ]
});

$('.slider-docs').slick({
    infinite: false,
    slidesToShow: 5,
    arrows: true,
    lazyLoad: 'ondemand',
    prevArrow: $('.custom-prev-arrow.slider3'),
    nextArrow: $('.custom-next-arrow.slider3'),
    dots: true,
    appendDots: $('.custom-dots.slider3'),
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
                arrows: false
            }
        },
        {
            breakpoint: 960,
            settings: {
                centerMode: false,
                arrows: false,
                slidesToShow: 3
            }
        },
        {
            breakpoint: 768,
            settings: {
                arrows: false,
                slidesToShow: 2
            }
        },
        {
            breakpoint: 561,
            settings: {
                arrows: false,
                slidesToShow: 1
            }
        }
    ]
});

$('.slider-viewed').slick({
    centerMode: false,
    slidesToShow: 4,
    arrows: true,
    lazyLoad: 'ondemand',
    prevArrow: $('.custom-prev-arrow.slider4'),
    nextArrow: $('.custom-next-arrow.slider4'),
    dots: true,
    appendDots: $('.custom-dots.slider4'),
    infinite: false,
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 3,
                arrows: false
            }
        },
        {
            breakpoint: 960,
            settings: {
                centerMode: false,
                arrows: false,
                slidesToShow: 3
            }
        },
        {
            breakpoint: 768,
            settings: {
                arrows: false,
                slidesToShow: 2
            }
        },
        {
            breakpoint: 560,
            settings: {
                arrows: false,
                slidesToShow: 1
            }
        }
    ]
});

$('.single-item-slider').slick({
    infinite: false,
    slidesToShow: 1,
    arrows: true,
    lazyLoad: 'ondemand',
    prevArrow: $('.custom-prev-arrow.slider5'),
    nextArrow: $('.custom-next-arrow.slider5'),
    dots: true,
    appendDots: $('.custom-dots.slider5'),
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 1,
                arrows: false
            }
        }
    ]
});

$('.slider-new-comments').slick({
    infinite: false,
    slidesToShow: 3,
    arrows: true,
    lazyLoad: 'ondemand',
    prevArrow: $('.custom-prev-arrow.new-slider1'),
    nextArrow: $('.custom-next-arrow.new-slider1'),
    dots: true,
    appendDots: $('.custom-dots.new-slider1'),
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                slidesToShow: 2,
                arrows: false
            }
        },
        {
            breakpoint: 769,
            settings: {
                slidesToShow: 1,
                arrows: false
            }
        }
    ]
});

$('.slider-bestsellers').slick({
    infinite: false,
    slidesToShow: 4,
    arrows: true,
    lazyLoad: 'ondemand',
    prevArrow: $('.custom-prev-arrow.slider10'),
    nextArrow: $('.custom-next-arrow.slider10'),
    dots: true,
    appendDots: $('.custom-dots.slider10'),
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                arrows: false,
                slidesToShow: 3
            }
        },
        {
            breakpoint: 768,
            settings: {
                arrows: false,
                slidesToShow: 2
            }
        },
        {
            breakpoint: 560,
            settings: {
                arrows: false,
                slidesToShow: 1
            }
        }
    ]
});

$('.slider-promotions').slick({
    infinite: false,
    slidesToShow: 3,
    arrows: true,
    lazyLoad: 'ondemand',
    prevArrow: $('.custom-prev-arrow.slider11'),
    nextArrow: $('.custom-next-arrow.slider11'),
    dots: true,
    appendDots: $('.custom-dots.slider11'),
    responsive: [
        {
            breakpoint: 1200,
            settings: {
                arrows: false,
                slidesToShow: 2
            }
        },
        {
            breakpoint: 768,
            settings: {
                arrows: false,
                slidesToShow: 2
            }
        },
        {
            breakpoint: 560,
            settings: {
                arrows: false,
                slidesToShow: 1
            }
        }
    ]
});


//---------------------------