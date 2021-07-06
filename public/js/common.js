$(document).ready(function () {
    // Lazyloading iframe and img
    var iframes = $('iframe, img:not(.lasy)');
    iframes.addClass('lazy');

    iframes.each(function(i, elem) {
        elem = $(elem);
        if (elem.attr('src')) {
            var elemSrc = elem.attr('src');
            elem.attr('data-src', elemSrc);
            elem.removeAttr('src');
        }
    });

    $(function() {
        $('.lazy').Lazy();
    });


    $('img[data-lazy]').each(function(i, elem) {
        elem = $(elem);
        if (elem.attr('data-lazy')) {
            var elemSrc = elem.attr('data-lazy');
            elem.attr('src', elemSrc);
            elem.removeAttr('data-lazy');
        }
    });

    $('img').each(function(i, elem) {
        elem = $(elem);
        if (elem.attr('data-src')) {
            var elemSrc = elem.attr('data-src');
            elem.attr('src', elemSrc);
            elem.removeAttr('data-src');
        }
    });





    $('#one').show(0);
    $('.one-placeholder').css('display', 'none');



    // Загрузка аватрки в отзыв
    $('#uploaded_photo').change(function () {
        var files = this.files;
        var input = $(this);
        if (files[0].type.match('image.*')) {
            var reader = new FileReader();
            reader.onload = function (e) {
                input.parents('.photo').removeClass('error').find('#image-error-review').text('');
                input.parents('.photo').css('background-image', 'url(' + e.target.result + ')');
            };
            reader.readAsDataURL(files[0]);
        } else {
            input.val('');
            input.parents('.photo').addClass('error').find('#image-error-review').text('Неверный формат файла');
            setTimeout(function () {
                input.parents('.photo').removeClass('error').find('#image-error-review').text('');
            }, 4000);
        }
    });

    $(window).scroll(function () {
        //Фиксированное меню
        if ($(this).scrollTop() > 0) {
            $('header').addClass('scroll');
        } else {
            $('header').removeClass('scroll');
        }

        //Переворачивание тултипа
        if ($(this).scrollTop() > 50) {
            $('.tooltip-box .tooltip')
                .css({ position: 'absolute', transform: 'rotate(180deg)', top: '95px' });
            $('.tooltip-box .tooltip-inner').css({ flexDirection: 'column-reverse' });
            $('.tooltip-box .tooltip-header, .tooltip-box ul')
                .css({ transform: 'rotate(180deg)' });
        } else {
            $('.tooltip-box .tooltip')
                .css({ position: 'relative', transform: 'rotate(0)', top: '0' });
            $('.tooltip-box .tooltip-inner').css({ flexDirection: 'column' });
            $('.tooltip-box .tooltip-header, .tooltip-box ul')
                .css({ transform: 'rotate(0)' });
        }

        //Появление кнопки наверх
        if ($(this).scrollTop() > 400) {
            $('.button-up').addClass('button-up-active');
        } else {
            $('.button-up').removeClass('button-up-active');
        }
    });

    $('.tooltip-box').hover(function () {
        var self = $(this)
        setTimeout(function () {
            self.find('ul').css({ overflowY: 'auto' })
        }, 301)
    }, function () {
        $(this).find('ul').removeAttr('style')
    });

    //Мобильное меню
    $('.mobile-menu-open').on('click', function () {
        if (!$('#mobile-menu').hasClass('opened')) {
            $('#mobile-menu').addClass('opened');
            $('.mm-menu_offcanvas').addClass('active');
            $('body').css('overflow-y', 'hidden');
            $('header').addClass('mobile-active');
            $('.fix-buttons').removeClass('show')
        } else {
            $('#mobile-menu').removeClass('opened');
            $('body').css('overflow-y', '');
            $('.mm-menu_offcanvas').removeClass('active');
            $('header').removeClass('mobile-active');
            $('.fix-buttons').addClass('show')
        }
    });

    //Видео popup
    $('#eight iframe').on('load', function() {
        if (!$('#eight iframe')[0].src.includes('autoplay')) $('#eight iframe')[0].src += "&autoplay=1";
    })
    $('#new-comments iframe').on('load', function() {
        if (!$('#new-comments iframe')[0].src.includes('autoplay')) $('#new-comments iframe')[0].src += "&autoplay=1";
    })
    // Обёртка youtube видео
    $('.single-item-desc iframe, .article-text iframe').on('load', function() {
        // $(this).attr('width', '854');
        if ($(this).attr('src').includes('youtube') &&
            !$(this).attr('opened')) {
            var iframeSourceLink = $(this).attr('src').split('embed/')[1]
            var iframeWidth = $(this).attr('width')
            var iframeHeight = $(this).attr('height')
            $(this).css('height', '0')
            $(this).attr('src-reserved', $(this).attr('src'))
            $(this).attr('allow', 'accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture')
            $(this).attr('src', '')
            var divReplace = $(
                "<div class='iframe-preview' style='width: "+iframeWidth+"px; height: "+iframeHeight+"px'>"+
                    "<div class='iframe-preview-button'>"+
                        "<svg><use xlink:href='/img/svgdefs.svg#icon-play' xmlns:xlink='http://www.w3.org/1999/xlink'></use></svg>"+
                    "</div>"+
                    "<img src='https://i.ytimg.com/vi/"+iframeSourceLink+"/maxresdefault.jpg'/>"+
                "</div>")
            $(this).after(divReplace)
            $('.iframe-preview').click(function(e) {
                e.stopImmediatePropagation()
                var iframeCurr = $(this).prev()
                iframeCurr.attr('opened', 'true')
                $(this).css('height', '0')
                iframeCurr.css('height', '')
                iframeCurr.attr('src', iframeCurr.attr('src-reserved') + '?autoplay=1')
            })
        }
    })
    $('.post-img .post-img-overlay, .play-video, #eight .button').on('click', function () {
        var videoUrl = $(this).attr('data-video-url') + '?enablejsapi=1';
        if (videoUrl) {
            $('.video-popup .video-content iframe').attr('src', videoUrl);
            $('.video-popup .video-error').fadeOut(0);
            if ($('.video-popup').parent().attr('id') == 'eight') {
                $('#eight').css('background-size', '0');
                $('#eight').removeClass('grey-overlay');
                $('#eight').addClass('video-open');
                $('#eight .eight-content').css('display', 'none');
                // setTimeout(function() {$('#eight iframe')[0].src += "&autoplay=1"; }, 2000);
            }
        } else {
            $('.video-popup iframe').fadeOut(0);
            $('.video-popup .video-error').fadeIn();
        }
        $('.video-popup').addClass('popup-open');
        if ($('.video-popup').parent().attr('id') != 'eight')
            $('body').css('overflow-y', 'hidden');
    });

    $('.play-video-comment').on('click', function () {
        var videoUrl = $(this).attr('data-video-url') + '?enablejsapi=1';
        if (videoUrl) {
            $('.videos-video-popup .video-content iframe').attr('src', videoUrl);
            $('.videos-video-popup .video-error').fadeOut(0);
        } else {
            $('.videos-video-popup iframe').fadeOut(0);
            $('.videos-video-popup .video-error').fadeIn();
        }
        $('.videos-video-popup').addClass('popup-open');
        $('body').css('overflow-y', 'hidden');
    });
    $('.videos-video-popup .popup-close, .video-popup .popup-close, .popup-overlay').on('click', function () {
        $('.video-popup iframe, .videos-video-popup iframe')[0].contentWindow.postMessage('{"event":"command","func":"pauseVideo","args":""}', '*')
        $('.video-popup iframe, .videos-video-popup iframe').fadeIn();
        if ($('.video-popup, .videos-video-popup').parent().attr('id') == 'eight') {
            $('#eight').css('background-size', '');
            $('body').css('overflow-y', '')
            $('#eight').addClass('grey-overlay')
            $('#eight .eight-content').css('visibility', 'visible');
            $('#eight').removeClass('video-open');
        }

        if ($('.video-popup, .videos-video-popup').parent().attr('id') != 'eight')
            $('body').css('overflow-y', '');
        $('.video-popup, .videos-video-popup').removeClass('popup-open');
        $('.video-popup iframe, .videos-video-popup iframe').removeAttr('src');
    });

    //Фото popup
    $('.slider-docs img, .ddr .overlay-img').on('click', function () {
        var imgUrl = $(this).attr('data-full-img');
        var imgAlt = $(this).attr('alt');
        if (imgUrl) {
            $('.popup.photo-popup img').attr({ src: imgUrl, alt: imgAlt });
            $('.photo-popup .photo-error').fadeOut(0);
        } else {
            $('.photo-popup img').fadeOut(0);
            $('.photo-popup .photo-error').fadeIn();
        }
        $('.popup.photo-popup').addClass('popup-open');
        $('body').css('overflow-y', 'hidden');
    });
    $('.popup.photo-popup .popup-close, .popup-overlay').on('click', function () {
        $('.photo-popup img').fadeIn();
        $('body').css('overflow-y', '');
        $('.popup.photo-popup').removeClass('popup-open');
        $('.popup.photo-popup img').removeAttr('src');
    });

    //Characteristic popup
    $('.characteristic-svg-box').on('click', function () {
        var text = $(this).attr('data-text');
        $('.characteristic-modal p.text').html(text);
        $('.characteristic-modal').addClass('characteristic-modal-open');
        $('body').css('overflow-y', 'hidden');
        $('.content').on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
        });
    });




    $('.characteristic-modal .close, .characteristic-modal').on('click', function () {
        $('body').css('overflow-y', '');
        $('.characteristic-modal').removeClass('characteristic-modal-open');
    });

    $("a.block-scroll").click(function () {
        var elem = $(this).attr("href");
        var destination = $(elem).offset().top - 58;
        // jQuery("html:not(:animated),body:not(:animated)").animate({ scrollTop: destination }, 1000);
        scrollToTop('html:not(:animated), body:not(:animated)', destination, 1000);
        return false;
    });


    var interval;

    function stepInterval(str) {
        var currentStep = str;
        currentStep.removeClass('step-no-active').addClass('step-active')
        interval = setInterval(function () {
            currentStep.removeClass('step-active').addClass('step-no-active')
            currentStep.next().removeClass('step-no-active').addClass('step-active')
            currentStep = currentStep.next();
            if (!currentStep.length) {
                currentStep = null;
                currentStep = $('.step').first();
                currentStep.removeClass('step-no-active').addClass('step-active')
            }
        }, 15000)
    }

    // Скролл вверх
    function scrollToTop(node, scrollOffset, dur) {
        if (navigator.userAgent.match(/iPad|iPhone|iPod|Android|Windows Phone/i)) {

            function customScrollTo(to, duration) {
                var start = 0,
                    change = to - start,
                    currentTime = 0,
                    increment = 20;

                var animateScroll = function(){
                    currentTime += increment;
                    var val = Math.easeInOutQuad(currentTime, start, change, duration);
                    window.scrollTo(0,val);

                    if(currentTime < duration) {
                        setTimeout(animateScroll, increment);
                    }
                };
                animateScroll();
            }

            Math.easeInOutQuad = function (t, b, c, d) {
                t /= d/2;
                if (t < 1) return c/2*t*t + b;
                t--;
                return -c/2 * (t*(t-2) - 1) + b;
            };

            customScrollTo(scrollOffset, dur);
        }else{
            $(node).animate({
                scrollTop: scrollOffset
            }, dur, function(){
                $(node).clearQueue();
            });
        }
    }

    stepInterval($('.step').first());
    $('.step').hover(function () {
        clearInterval(interval);
        $('.step').removeClass('step-active').addClass('step-no-active')

        $(this).removeClass('step-no-active').addClass('step-active')

        stepInterval($(this));
    });

    //Делаем ссылки неактивными
    $('.article-link-visited a').on('click', function (e) {
        e.preventDefault();
    });

    // Модальные окна соглашения и реквизитов (в футере)

    // Реквизиты
    $('#requisites-modal').click(function() {
        $('.footer-modal-wrap.requisites-modal').toggleClass('footer-modal-active', true)
        $('body').css('overflow-y', 'hidden')
    })
    $('#requisites-modal-close-btn, #requisites-modal-close-cross').click(function() {
        $('.footer-modal-wrap.requisites-modal').toggleClass('footer-modal-active', false)
        $('body').css('overflow-y', '')
    })
    $('.footer-modal-wrap.requisites-modal').click(function(e) {
        if (typeof e.target.className == 'string') {
            if (e.target.className.includes('footer-modal-wrap')) {
                $('.footer-modal-wrap.requisites-modal').toggleClass('footer-modal-active', false)
                $('body').css('overflow-y', '')
            }
        }
    })

    // Privacy policy
    $('#privacy-policy-modal').click(function() {
        $('.footer-modal-wrap.privacy-policy-modal').toggleClass('footer-modal-active', true)
        $('body').css('overflow-y', 'hidden')
    })
    $('#privacy-policy-modal-close-btn, #privacy-policy-modal-close-cross').click(function() {
        $('.footer-modal-wrap.privacy-policy-modal').toggleClass('footer-modal-active', false)
        $('body').css('overflow-y', '')
    })
    $('.footer-modal-wrap.privacy-policy-modal').click(function(e) {
        if (typeof e.target.className == 'string') {
            if (e.target.className.includes('footer-modal-wrap')) {
                $('.footer-modal-wrap.privacy-policy-modal').toggleClass('footer-modal-active', false)
                $('body').css('overflow-y', '')
            }
        }
    })

    //Ховер на элементы списка в футере
    $('.footer-menu li:not(.footer-column-title) a').hover(function () {
        $(this).prev().css({ opacity: 1, visibility: 'visible' });
    }, function () {
        $(this).prev().css({ opacity: 0, visibility: 'hidden' });
    });

    $(document).mouseup(function (e) { // событие клика по веб-документу
        var div = $(".cd-dropdown"); // тут указываем ID элемента
        if (!div.is(e.target) // если клик был не по нашему блоку
            && div.has(e.target).length === 0) { // и не по его дочерним элементам
            div.removeClass('dropdown-is-active'); // скрываем его
        }
    });

    $('.add-review').click(function () { // ловим клик по ссылке с классом go_to
        var scroll_el = $(this).attr('href') || $(this).attr('scroll-to'); // возьмем содержимое атрибута href, должен быть селектором, т.е. например начинаться с # или .
        if ($(scroll_el).length != 0) { // проверим существование элемента чтобы избежать ошибки
            // $('html, body').animate({ scrollTop: $(scroll_el).offset().top }, 1000); // анимируем скроолинг к элементу scroll_el
            scrollToTop('html, body', $(scroll_el).offset().top, 1000);
        }
        return false; // выключаем стандартное действие
    });


    // Поиск Блог

    $("#search-input, #search-input-mobile").focus(function () {
        $(".icon-search").css("fill", "#151515");
    });

    $("#search-input, #search-input-mobile").blur(function () {
        $(".search-result, .search-result-mobile").removeClass("active");
        $(".icon-search").css("fill", "#abb2a7");
    });

    $(".search input, .search-input-mobile input").keyup(function (e) {
        search($(this).val());
    });

    function search(val) {
        if (val.length >= 3) {
            $.ajax({
                url: '/blogSearch',
                data: { words: val },
                type: 'post',
                success: function (data) {
                    $(".search-result, .search-result-mobile").html(data);
                    $(".search-result, .search-result-mobile").addClass("active");
                },
            });
        } else {
            $(".search-result, .search-result-mobile").removeClass("active");
        }
    }

    // popup Заказать обратный звонок
    $(".callback-click, .button-callback").click(function (e) {
        e.preventDefault();
        $('.modal-popup-callback').addClass('popup-open-callback');
        $('.callback-block').addClass('active');

        $(document).mouseup(function (e) {
            var div = $(".callback-block");
            if (!div.is(e.target)
                && div.has(e.target).length === 0) {
                $('.modal-popup-callback').removeClass('popup-open-callback');
                $('.callback-block').removeClass('active');
            }
        });
    });

    // popup Добавить отзыв
    $(".add-review-button").click(function (e) {
        e.preventDefault();
        $('.modal-popup').addClass('popup-open');
        $('.review-block').addClass('active');
        $(document).mouseup(function (e) {
            var div = $(".review-block");
            if (!div.is(e.target)
                && div.has(e.target).length === 0) {
                $('.modal-popup').removeClass('popup-open');
                $('.review-block').removeClass('active');
            }
        });
    });

    // popup Заказать услугу
    $(".add-service").click(function (e) {
        e.preventDefault();
        $('.modal-popup').addClass('popup-open');
        $('.add-service-block').addClass('active');
        $(document).mouseup(function (e) {
            var div = $(".form-order-block, .single-item-order-block, .thankyou-block, .thankyou-block-home, .calc-final-content");
            if (!div.is(e.target)
                && div.has(e.target).length === 0) {
                $('.modal-popup').removeClass('popup-open');
                $('.callback-block, .review-block, .add-service-block, .single-item-order-block, .thankyou-block, .form-order-block, .thankyou-block-home').removeClass('active');
            }
        });
    });

    // popup Заказать товар
    $(".single-item-order").click(function (e) {
        e.preventDefault();
        e.preventDefault();
        $('.modal-popup').addClass('popup-open');
        $('.single-item-order-block').addClass('active');
        $(".button-submit-order-popup").click(function () {
            timeOuts[4] = setTimeout(function () {
                $('.modal-popup').removeClass('popup-open');
                $('.single-item-order-block').removeClass('active');
            }, 6000);
        });
        $(document).mouseup(function (e) {
            var div = $(".form-order-block, .single-item-order-block, .thankyou-block, .thankyou-block-home, .calc-final-content");
            if (!div.is(e.target)
                && div.has(e.target).length === 0) {
                $('.modal-popup').removeClass('popup-open');
                $('.single-item-order-block').removeClass('active');
                clearTimeout(timeOuts[4])
            }
        });
    });



    // popup Узнать подробнее

    $(".window-call-read-more").click(function (e) {
        e.preventDefault();
        $('.modal-popup-read-more').addClass('popup-open-read-more');
        $('.read-more-block').addClass('active');

        $(document).mouseup(function (e) {
            var div = $(".read-more-block");
            if (!div.is(e.target)
                && div.has(e.target).length === 0) {
                $('.modal-popup-read-more').removeClass('popup-open-read-more');
                $('.read-more-block').removeClass('active');
            }
        });
    });

    $(".modal-popup-read-more .popup-close").click(function () {
        $('.modal-popup-read-more').removeClass('popup-open-read-more');
        $('.read-more-block').removeClass('active');
    });




    // popup Отзыв спасибо в заказе товара
    $(".button-submit-review").click(function () {
        setTimeout(function () {
            $('.modal-popup').removeClass('popup-open');
            $('.single-item-order-block, .comment-thankyou-block').removeClass('active');
        }, 6000);
    });

    // popup Заказать монтаж
    $(".calc-button").click(function (e) {
        e.preventDefault();
        $('.modal-popup').addClass('popup-open');
        $('.form-order-block').addClass('active');
        $(document).mouseup(function (e) {
            var divs = $(".form-order-block, .single-item-order-block, .thankyou-block:not(.order-thankyou-block), .thankyou-block-home, .calc-final-content");
            divs.each(function () {
                if ($(this).hasClass('active')) {
                    if (!$(this).is(e.target)
                        && $(this).has(e.target).length === 0) {
                        $('.modal-popup').removeClass('popup-open');
                        $('.callback-block, .review-block, .add-service-block, .single-item-order-block, .thankyou-block, .form-order-block, .thankyou-block-home').removeClass('active');
                    }
                }
            })

        });
    });


    $("#twelve .slick-slide").click(function () {
        $(document).mouseup(function (e) {
            var div = $(".photo-popup-about img");
            if (!div.is(e.target)
                && div.has(e.target).length === 0) {
                $('.modal-popup').removeClass('popup-open');
                $('.error-block').removeClass('active');
                $('.photo-popup').removeClass('popup-open');
                $('body').css('overflow-y', '');
            }
        });
    });

    // popup Ошибка калькулятор
    $(window).on('load', function (e) {
        $(document).mouseup(function (e) {
            var div = $("#calculator .error-block");
            if (!div.is(e.target)
                && div.has(e.target).length === 0) {
                $('#calculator .modal-popup').removeClass('popup-open-calculator-error');
                $('#calculator .error-block').removeClass('active');
            }
        });
        $("#calculator .error-block .button-submit").click(function () {
            $('#calculator .modal-popup').removeClass('popup-open-calculator-error');
            $('#calculator .error-block').removeClass('active');
        });
        $("#calculator .error-block .popup-close").click(function () {
            $('#calculator .modal-popup').removeClass('popup-open-calculator-error');
            $('#calculator .error-block').removeClass('active');
        });
    });


    // popup Закрытие окна
    $(".modal-popup .popup-close, .modal-popup-callback .popup-close").click(function () {
        $('.modal-popup').removeClass('popup-open');
        $('.modal-popup-callback').removeClass('popup-open-callback');
        $('.callback-block, .review-block, .add-service-block, .single-item-order-block, .thankyou-block, .form-order-block, .thankyou-block-home').removeClass('active');
    });


    $("#scrollbar").focus(function () {
        $(".icon-search").css("fill", "#151515");
    });


    $('.question-content').on('click', function () {
        $(this).children('.question-icon').children('.question-arrow').toggleClass('rotate-icon');
        $(this).children('.question-icon').children('.question-arrow-two').toggleClass('rotate-icon-two');
        $(this).next().slideToggle(300);
    });


    calculator();


    $('.tabs-box').on('click', '.tab:not(.tab-active)', function (e) {
        e.preventDefault();
        $(this)
            .addClass('tab-active').siblings().removeClass('tab-active')
            .closest('div.single-product-tabs').find('div.tab-content')
            .removeClass('tab-active').eq($(this).index()).addClass('tab-active');

        if ($(this).attr('id') === 'reviews') {
            window.location.hash = '#otzyvy';
            fullReview();
        } else if ($(this).attr('id') === 'install-price') {
            if(history.pushState)
                history.pushState(null, null, '#install-price');
            else window.location.hash = '#install-price';
        } else {
            removeHash();
        }
    });

    function openInstallPriceCalculator(node) {
        setTimeout(function() { window.scrollTo(0, 0); }, 1);
        node.addClass('tab-active').siblings().removeClass('tab-active')
            .closest('div.single-product-tabs').find('div.tab-content')
            .removeClass('tab-active').eq(node.index()).addClass('tab-active');
    }

    $('[data-fancybox]').fancybox({
        loop: true,
        idleTime: false,
        autoSize: false,
        infobar: false,
        animationEffect: "zoom-in-out",
        transitionEffect: "circular",
        buttons: ['close'],
        btnTpl: {
            close: "<svg data-fancybox-close class='fancybox-close'><use xlink:href='/img/svgdefs.svg#icon-cross' xmlns:xlink='http://www.w3.org/1999/xlink'></use></svg>",
            arrowLeft: "<div data-fancybox-prev class='fbx-prev-arrow'><svg class='default-svg'><use xlink:href='/img/svgdefs.svg#icon-arrow-two' xmlns:xlink='http://www.w3.org/1999/xlink'></use></svg><svg class='hover-svg'><use xlink:href='/img/svgdefs.svg#icon-arrow' xmlns:xlink='http://www.w3.org/1999/xlink'></use></svg></div>",
            arrowRight: "<div data-fancybox-next class='fbx-next-arrow'><svg class='default-svg'><use xlink:href='/img/svgdefs.svg#icon-arrow-two' xmlns:xlink='http://www.w3.org/1999/xlink'></use></svg><svg class='hover-svg'><use xlink:href='/img/svgdefs.svg#icon-arrow' xmlns:xlink='http://www.w3.org/1999/xlink'></use></svg></div>",
        },
        fitToView: false,
        onComplete: function () {
            $(".fancybox-image").css({
                "width": "auto",
                "height": "auto"
            });
            this.width = $(".fancybox-image").width();
            this.height = $(".fancybox-image").height();
        }
    });
    $(document).ready(function () {
        if (window.location.hash === '#otzyvy') {
            fullReview();
        }
        if (window.location.hash === '#install-price') {
            openInstallPriceCalculator($('#install-price'));
        }
    })


    //Кнопка наверх
    $('.button-up').on('click', function () {
        // $("html, body").animate({ scrollTop: 0 }, 1500);
        scrollToTop('html, body', 0, 1500);
    });

});

//Отзывы
function fullReview() {
    $('.review-content').each(function () {
        $(this).next().off('click');
        var number = $(this).outerHeight();
        var maxHeight = 0;

        if ($(window).width() > 560) {
            number = Math.round(number / 28);
            maxHeight = 28 * 3;
        } else {
            number = Math.round(number / 26);
            maxHeight = 26 * 3;
        }
        if (number <= 3) {
            $(this).next().fadeOut(0);
        } else {
            $(this).css('max-height', maxHeight + 'px');
        }
        function handler(context) {
            var self = $(context);
            self.prev().scrollTop(0);
            self.prev().toggleClass('open-review')
            self.children('.icons').children('.default-icon')
                .toggleClass('default-rotate');
            self.children('.icons').children('.hover-icon')
                .toggleClass('hover-rotate');
            if (self.children('p').html() === 'Читать полностью') {
                self.children('p').html('Свернуть описание')
            } else {
                self.children('p').html('Читать полностью')
            }
        }

        $(this).next().on('click', function () {
            handler(this);
        });
    });
}

//Выпадающий каталог
$(".toggleMenu").css("display", "none");
$(".nav li").hover(function () {
    $(this).addClass('hover');
}, function () {
    $(this).removeClass('hover');
});

//Читать далее
$('.show-text').click(function () {
    $('.readmore').addClass('active');
    $(this).css('display', 'none');
})

$(".hide-text").click(function () {
    $('.readmore').removeClass('active');
    $('.show-text').css('display', 'flex');
})



//Блок сортировки
$('.sorting-click').on('click', function () {
    var $this = $(this);

    if (!$this.hasClass('active')) {
        $this.addClass('active');
    } else {
        $this.removeClass('active');
    }
});

$(document).mouseup(function (e) {
    var div = $(".sorting-click");
    if (!div.is(e.target)) {
        div.removeClass('active');
    }
});

//Фильтр категорий
$('.filter-icon.table').click(function () {
    $(this).addClass('active');
    $('.filter-icon.list').removeClass('active');
    $('.category-table').addClass('active');
    $('.category-list').removeClass('active');
});

$(".filter-icon.list").click(function () {
    $(this).addClass('active');
    $('.filter-icon.table').removeClass('active');
    $('.category-list').addClass('active');
    $('.category-table').removeClass('active');
});

$(".sorting-arrow").click(function () {
    var $this = $(this);

    if (!$this.hasClass('active')) {
        $this.addClass('active');
    } else {
        $this.removeClass('active');
    }
});

$(document).ready(function (e) {
    // Меню выбора категорий
    var trig = false;
    $('.catalog-dropdown').on('click', function () {
        if (!trig) {
            $('.bg_layer').fadeIn(300);
            $('.cd-dropdown').fadeIn(0).addClass('dropdown-is-active');
            $('.cd-dropdown-wrapper').addClass('active');
            $("body").css("overflow-y", "hidden");
        } else {
            $('.bg_layer').fadeOut(300);
            $('.cd-dropdown').removeClass('dropdown-is-active').fadeOut(300);
            $('.my-dropdown-list').fadeOut(300);
            $('.cd-dropdown-wrapper').removeClass('active');
            $("body").css("overflow-y", "");
        }
        trig = !trig;
    });

    $('.bg_layer').on('click', function () {
        $('.bg_layer').fadeOut(300);
        $('.my-dropdown-list').fadeOut(300);
        $('.cd-dropdown').removeClass('dropdown-is-active').fadeOut(300);
        $('.cd-dropdown-wrapper').removeClass('active');
        $("body").css("overflow-y", "");
        trig = !trig;
    });
});

$(document).ready(function () {
    (function () {
        var timeout;
        $('.my-dropdown-list-content').each(function () {
            if ($(this).find('*').length === 0) {
                $(this).parent('li').removeClass('has-children')
            }
        });

        $('.ul-hover li').hover(function () {
            var self = $(this);
            var begin = new Date().getTime();
            if ($(this).parent().next().css('display') === 'none') {
                $(this).parent().next().fadeIn(0).addClass('scale-active');
            }
            if ($(this).hasClass('has-children')) {
                timeout = setTimeout(function () {
                    $('.my-dropdown-list').attr('data-children', self.index())
                    if (new Date().getTime() - begin >= 500) {
                        var content = self.children('.my-dropdown-list-content').html();
                        self.parent().next().children('ul').html(content);
                    }
                }, 500)
            } else {
                $('.my-dropdown-list').removeClass('scale-active').fadeOut(0);
            }
        }, function () {
            clearTimeout(timeout);
        });

        $('.my-dropdown-list').hover(function () {
            var index = parseInt($(this).attr('data-children'))
            $('.ul-hover .has-children').each(function () {
                if ($(this).index() === index) {
                    $(this).find('a').addClass('active-hover')
                }
            });
        }, function () {
            $('.ul-hover .has-children a').removeClass('active-hover')
        });

        $('.all-categories').hover(function () {
            $('.my-dropdown-list').removeClass('scale-active').fadeOut(200);
        });
        $('.bg_layer').hover(function () {
            $('.my-dropdown-list').removeClass('scale-active').fadeOut(200);
        });

        $('.ul-hover a').on('click', function () {
            $('.ul-hover a').removeClass('active')
            $(this).addClass('active')
        })
    })();
});


$('footer .phone-input').mask('+7 (999) 999-99-99');
$(".phone-input").mask("+7(999) 999-9999");




//Calculator
function calculator() {
    var step = 1;
    var lastStep = 3;
    var isValid;
    var otherInput = $('.calc-step .select-input.valid');
    var heightDifference;
    function multipleOfTen() {
        heightDifference = parseInt($('#heightDifference').val());
        pipeOutletDepth = parseInt($('#pipeOutletDepth').val());

        if (heightDifference % 10) {
            if (heightDifference > 4) {
                $('#heightDifference').val(Math.round(heightDifference / 10) * 10);
            } else {
                $('#heightDifference').val('10 м.');
            }
        }

        if (pipeOutletDepth % 10) {
            if (pipeOutletDepth > 4) {
                $('#pipeOutletDepth').val(Math.round(pipeOutletDepth / 10) * 10);
            } else {
                $('#pipeOutletDepth').val('10 м.');
            }
        }
    }
    $('.calc-step input').change(function () {
        dataCollection()
    });
    var quantityPeople, sink, toilet, bathSmall, bathBig, showerCabin, solvoDump, pipeOutletDepth, distanceFromHomeToStation, gravity, forced, destination, glubina, roundedSolvoDump;
    function dataCollection() {
        // step 1
        quantityPeople = parseInt($('#quantityPeople').val());
        sink = parseInt($('#sink').val()) * 15;
        toilet = parseInt($('#toilet').val()) * 12;
        bathSmall = parseInt($('#bathSmall').val()) * 120;
        bathBig = parseInt($('#bathBig').val()) * 200;
        showerCabin = parseInt($('#showerCabin').val()) * 70;
        solvoDump = sink + toilet + bathSmall + bathBig + showerCabin;
        roundedSolvoDump = Math.floor(solvoDump / 30)*30;
        roundedSolvoDump = roundedSolvoDump - (roundedSolvoDump / 100 * 20);

        // step 2
        pipeOutletDepth = parseInt($('#pipeOutletDepth').val());
        distanceFromHomeToStation = parseInt($('#distanceFromHomeToStation').val()) * 2;
        multipleOfTen();
        gravity = parseInt($('#gravity:checked').val()); // 0
        forced = parseInt($('#forced:checked').val()); // 1
        if (gravity === 0) {
            destination = 0;
        } else if (forced === 1) {
            destination = 1;
        };
        destination;
        glubina = pipeOutletDepth + distanceFromHomeToStation + heightDifference;
    }

    $('.button-select-station').click(function () {
        var self = $(this)
        if (glubina > 140) {
            $('.popup-calculator-error').addClass('popup-open-calculator-error');
            $('.error-block').addClass('active');
            preventDefault();
            stopPropagation();
        } else {
            $.ajax({
                url: '/calculator',
                data: {
                    destination: destination,
                    chel: quantityPeople,
                    volume: roundedSolvoDump,
                    glubina: glubina
                },
                type: 'post',
                success: function (data) {
                    toggleStep('next', self)
                    $("#result").html(data);
                },
                error: function () {
                    $('.popup-calculator-error').addClass('popup-open-calculator-error');
                    $('.error-block').addClass('active');
                    setTimeout(function () {
                        $('.popup-calculator-error').removeClass('popup-open-calculator-error');
                        $('.error-block').removeClass('active');
                    }, 12000)
                }
            });
        }
    });



    $('.calc-step .name-input, .calc-step .phone-input').val('');
    $('.calc-step .select-input').css({ color: 'rgba(21,21,21,.4)' });
    $(".calc-step input[type='radio']").removeProp('checked').first().prop('checked', true);
    $('.calc-step .button-next').addClass('button-disabled');
    $('.calc-step .button-select-station').addClass('button-select-station-disabled');
    $('.select-input').removeClass('valid')

    function validationStep(context) {

        var required = context.attr('data-required');
        if (required === 'true') {
            if (step === 1) {
                if (!parseInt(context.val())) {
                    context.parents('.input-group').addClass('error')
                    context.parents('.calc-step').find('.button-next').addClass('button-error')
                    isValid = false
                } else {
                    isValid = true
                    context.parents('.input-group').removeClass('error')
                    context.parents('.calc-step').find('.button-next').removeClass('button-error')
                }
            } else if (step === 2) {
                if (!parseInt(context.val())) {
                    context.parents('.input-group').addClass('error')
                    context.removeClass('valid')
                    context.parents('.calc-step').find('.button-select-station')
                    .addClass('button-select-station-error');
                } else {
                    context.parents('.input-group').removeClass('error')
                    context.addClass('valid')
                    context.parents('.calc-step').find('.button-select-station')
                    .removeClass('button-select-station-error');
                }
            }
        } else {
            if (step === 1) {
                if (parseInt(context.val())) {
                    if (!context.hasClass('valid')) {
                        context.addClass('valid')
                    }
                } else {
                    context.removeClass('valid')
                }
            }
        }

        otherInput = $('.calc-step-' + step + ' .select-input.valid');

        if (step === 1) {
            if (isValid === true && otherInput.length) {
                context.parents('.calc-step').find('.button-next').removeClass('button-disabled');
            } else {
                context.parents('.calc-step').find('.button-next').addClass('button-disabled');
            }
        } else if (step === 2) {
            if (otherInput.length >= 2) {
                context.parents('.calc-step').find('.button-select-station')
                    .removeClass('button-select-station-disabled');
            } else {
                context.parents('.calc-step').find('.button-select-station')
                    .addClass('button-select-station-disabled');
            }
        }

    }

    function toggleStep(direction, context) {
        var scrollUpSpeed = 700;
        var calcBoxCoordinates = $('.calculator-box').offset().top
            - ($('header').height() + 15);
        if (direction === 'next') {
            console.log(context)
            step++;
            if (step <= lastStep) {
                context.parents('.calc-step').removeClass('calc-step-active').addClass('calc-step-viewed')
                    .next().removeClass('calc-step-viewed-prev').addClass('calc-step-active');
                isValid = false;
                otherInput = $('.calc-step-' + step + '.select-input.valid');
                if ($(window).scrollTop() > calcBoxCoordinates)
                    // $("html, body").animate({ scrollTop: calcBoxCoordinates }, scrollUpSpeed);
                    scrollToTop('html, body', calcBoxCoordinates, scrollUpSpeed);
            }
        } else {
            step--;
            if (step >= 0) {
                context.parents('.calc-step').removeClass('calc-step-active').addClass('calc-step-viewed-prev')
                    .prev().removeClass('calc-step-viewed').addClass('calc-step-active');
                isValid = true;
                otherInput = $('.calc-step-' + step + '.select-input.valid');
                if ($(window).scrollTop() > calcBoxCoordinates)
                    // $("html, body, window").animate({ scrollTop: calcBoxCoordinates }, scrollUpSpeed);
                    scrollToTop('html, body', calcBoxCoordinates, scrollUpSpeed);
            }
        }
    }

    function quantityProducts() {
        var arrayInputs = $('.select-input');
        if (arrayInputs) {
            arrayInputs.each(function () {
                var $quantityArrowPlus = $(this).parent().find('.top-icon');
                var $quantityArrowMinus = $(this).parent().find('.bottom-icon');
                var step = parseInt($(this).parent().find('.select-field').data('step')) || 1;
                var $quantityNum = $(this);
                var prefix = $(this).attr('data-prefix');

                $quantityArrowMinus.off('click');
                $quantityArrowPlus.off('click');
                $quantityNum.off('blur').off('focus').off('keydown');

                if (prefix) {
                    var defaultPrefix = 0 + ' ' + prefix;
                    $(this).val(defaultPrefix);
                } else {
                    var defaultPrefix = 0;
                    prefix = '';
                    $(this).val(defaultPrefix);
                }

                $quantityArrowMinus.on('click', quantityMinus);
                $quantityArrowPlus.on('click', quantityPlus);

                function quantityMinus() {
                    var val;
                    if (prefix.length) {
                        val = parseInt($quantityNum.val().substring(-1, prefix.length + 1));
                    } else {
                        val = parseInt($quantityNum.val());
                    }

                    if (val > 0) {
                        if (prefix) {
                            $quantityNum.val((+val - step) + ' ' + prefix);
                        } else {
                            $quantityNum.val((+val - step));
                        }
                    }

                    if ((val - 1) === 0) {
                        $(this).parents('.input-group').children('input').css({ color: 'rgba(21,21,21,.4)' });
                    }

                    validationStep($quantityNum);
                    validateCalc();
                    multipleOfTen();
                    dataCollection()
                }

                function quantityPlus() {
                    console.log(step)
                    var val;
                    if (prefix.length) {
                        val = parseInt($quantityNum.val().substring(-1, prefix.length + 1));
                        $quantityNum.val((+val + step) + ' ' + prefix);
                    } else {
                        val = parseInt($quantityNum.val());
                        $quantityNum.val((+val + step));
                    }

                    if (++val) {
                        $(this).parents('.input-group').children('input').css({ color: '#151515' });
                    }
                    validationStep($quantityNum);
                    validateCalc();
                    multipleOfTen();
                    dataCollection()
                }

                $(this).on('focus', function (e) {
                    $(this).css('color', '#151515');
                    var val = $(this).val().substring(0, 1);

                    if (val === '0') {
                        if (prefix) {
                            $(this).val(' ' + prefix);
                        } else {
                            $(this).val('');
                        }
                        setTimeout(function () {
                            e.target.selectionStart = 0;
                            e.target.selectionEnd = 0;
                        }, 1);
                    } else {
                        setTimeout(function () {
                            if (prefix) {
                                e.target.selectionStart = e.target.value.length - (prefix.length + 1);
                                e.target.selectionEnd = e.target.value.length - (prefix.length + 1);
                            } else {
                                e.target.selectionStart = e.target.value.length;
                                e.target.selectionEnd = e.target.value.length;
                            }
                        }, 1);
                    }
                });

                $(this).on('blur', function (e) {
                    var regExp;
                    var val = $(this).val();
                    var arrString = parseInt(val).toString();
                    // console.log(arrString)
                    if (prefix) {
                        regExp = new RegExp('^[0-9]{1,3} [а-я]{1,2}[.]{1}$');
                        $(this).val(arrString + " " + prefix)
                        // console.log(val)
                    } else {
                        regExp = new RegExp('^[0-9]{1,3}$');
                        $(this).val(arrString)
                        // console.log(val)
                    }

                    val = $(this).val();
                    if (!regExp.test(val) || val === '0' || val === '0 ' + prefix) {
                        $(this).val(defaultPrefix).css({ color: 'rgba(21,21,21,.4)' });
                    }


                    validationStep($(this));
                });

                $(this).on('keydown', function (e) {
                    if ((e.which >= 48 && e.which <= 57)  // цифры
                        || (e.which >= 96 && e.which <= 105)  // num lock
                        || (e.which >= 37 && e.which <= 40)) {
                        if (prefix.length) {
                            if ($(this).val().length > prefix.length + 3) {
                                $(this).val(' ' + prefix);
                                e.target.selectionStart = 0;
                                e.target.selectionEnd = 0;
                            }
                        } else {
                            if ($(this).val().length > prefix.length + 2) {
                                $(this).val('');
                            }
                        }
                        return true;
                    } else if (e.which == 8) { //delete
                        return true;
                    }
                    else {
                        return false;
                    }
                });
            })
        }
    }

    $('.calc-step .button-prev').on('click', function () {
        toggleStep('prev', $(this));
    });
    $('.calc-step .button-next').on('click', function () {
        toggleStep('next', $(this))
    });

    quantityProducts();

    //Валидация 3 шага
    (function () {
        $('.calc-step .name-input, .calc-step .phone-input').on('blur', function () {
            if ($(this).val()) {
                $(this).parent().removeClass('error');
                $(this).nextAll('.error-field').text('')
            } else {
                $(this).parent().addClass('error');
                $(this).nextAll('.error-field').text('Поле обязательно для заполнения')

            }
        });
    })();
}
//--------

//Montage calculator
var firstInput, secondInput;
$('.calc-button-box .calc-button').addClass('disabled');

function validateCalc() {
    firstInput = parseInt($.trim($('.calc-item .select-input-first').val()));
    secondInput = parseInt($.trim($('.calc-item .select-input-second').val()));
    if (firstInput > 0 && secondInput > 0) {
        $('.calc-button-box .calc-button').removeClass('disabled');
    } else {
        $('.calc-button-box .calc-button').addClass('disabled');
    }
}
$('.calc-item input').keyup(function (e) {
    validateCalc()
});

$('.calc-button-box .calc-button').click(function () {
    if ($('.hot_cable1').is(':checked')) {
        var valHot_cable1 = hot_cable;
    } else {
        var valHot_cable1 = 0;
    }
    if ($('.hot_cable2').is(':checked')) {
        var valHot_cable2 = hot_cable;
    } else {
        var valHot_cable2 = 0;
    }
    var radioData = 0;
    $(".radio1-input input:checked").each(function () {
        radioData += parseInt($(this).val());
    });
    var firstInput = 0;
    $(".select-input-first").each(function () {
        firstInput += (valHot_cable1 + cable) * parseInt(($(this).val()));
    });
    var secondInput = 0;
    $(".select-input-second").each(function () {
        secondInput += (valHot_cable2 + cable2) * parseInt(($(this).val()));
    });
    valData = (radioData + firstInput + secondInput).toLocaleString('ru');
    $("#montazh-price").html(valData);
});





// Cache selectors
var lastId,
    topMenu = $(".blocks-pagination"),
    topMenuHeight = topMenu.outerHeight() + 15,
    // All list items
    menuItems = topMenu.find("a"),
    // Anchors corresponding to menu items
    scrollItems = menuItems.map(function () {
        var item = $($(this).attr("href"));
        if (item.length) {
            return item;
        }
    });

// Bind to scroll
$(window).scroll(function () {
    // Get container scroll position
    var fromTop = $(this).scrollTop() + topMenuHeight;

    // Get id of current scroll item
    var cur = scrollItems.map(function () {
        if ($(this).offset().top < fromTop)
            return this;
    });

    // Get the id of the current element
    cur = cur[cur.length - 1];
    var id = cur && cur.length ? cur[0].id : "";

    if (lastId !== id) {
        lastId = id;
        // Set/remove active class
        menuItems
            .removeClass("block-active")
            .filter("[href='#" + id + "']").addClass("block-active");
    }
});

function removeHash() {
    var scrollV, scrollH, loc = window.location;
    if ("pushState" in history)
        history.pushState("", document.title, loc.pathname + loc.search);
    else {
        // Prevent scrolling by storing the page's current scroll offset
        scrollV = document.body.scrollTop;
        scrollH = document.body.scrollLeft;

        loc.hash = "";

        // Restore the scroll offset, should be flicker free
        document.body.scrollTop = scrollV;
        document.body.scrollLeft = scrollH;
    }
}

// скролл таблиц
$(function(){
    var curDown = false,
        curXPos = 0,
        curScroll = 0,
        tables = $('table');

    tables.each(function () {
        $(this).mousemove(function(m){
            if(curDown === true){
                $(this).scrollLeft(curScroll + (curXPos - m.screenX));
            }
        });

        $(this).mousedown(function(m){
            curDown = true;
            curXPos = m.screenX;
            curScroll = $(this).scrollLeft();
        });

        $(this).mouseup(function(){
            curDown = false;
        });
    });
})

//load
$(window).on('load', function () {
    $('#mobile-menu-canvas').mmenu();
    if ($("section").is(".error-page")) {
        $("#fiveteen").remove();
        $("footer").remove();
    }

    setTimeout(function () {
        if (!$('#mobile-menu').hasClass('opened')) {
            $('.fix-buttons').addClass('show');
        }
    }, 2000);

    if (window.location.pathname == '/') {
        $('.fix-buttons').addClass('fix-buttons-home');
    }
    $('.preloader').fadeOut('slow', function () {
        // $('body').css('overflow', 'visible');
    });
});

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
