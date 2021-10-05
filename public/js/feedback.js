var timeOuts = [];
$('.ok-button').click(function () {
    $(".modal-popup .popup-close").click();
    for(var i=0; i<timeOuts.length; i++) {
        clearTimeout(timeOuts[i])
    }
});
$('#button-submit-feedback').click(function () {
    feedback();
});
$('.button-submit-review').click(function () {
    review(this);
});
$('#button-submit-feedback-footer').click(function () {
    feedbackFooter();
});
$('#button-submit-feedback-calculator').click(function () {
    feedbackCalculator();
});
function feedback() {
    var values = ['name', 'phone', 'message'];
    $.ajax({
        url: '/feedback',
        data: {
            name: $("#name-input-feedback").val(),
            phone: $("#phone-input-feedback").val(),
            text: $(".message-input-feedback").val()
        },
        type: 'post',
        success: function (data) {
          location.href="https://septikdom.com/spasibo";
            // $.each(values, function (key, value) {
            //     $('#' + value + '-error-feedback').html('');
            //     $('#' + value + '-error-feedback').parent().removeClass("error");
            // });
            // $('.callback-block').removeClass('active');
            // $('.modal-popup-callback').removeClass('popup-open-callback');
            // $('.modal-popup').addClass('popup-open');
            // $('.thankyou-block-home').addClass('active');
            // timeOuts[0] = setTimeout(function () {
            //     $('.modal-popup').removeClass('popup-open');
            //     $('.thankyou-block-review').removeClass('active');
            // }, 6000);
            // $(document).mouseup(function (e) {
            //     var div = $(".thankyou-block-home");
            //     if (div.hasClass('active')) {
            //         if (!div.is(e.target)
            //             && div.has(e.target).length === 0) {
            //             div.removeClass('active');
            //             $('.modal-popup').removeClass('popup-open');
            //             clearTimeout(timeOuts[0])
            //         }
            //     }
            // });
            // $("#name-input-feedback").val('');
            // $("#phone-input-feedback").val('');
            // $(".message-input-feedback").val('');
        },
        error: function (data) {
            $.each(values, function (key, value) {
                $('#' + value + '-error-feedback').html('');
                $('#' + value + '-error-feedback').parent().removeClass("error");
            });
            $.each(data.responseJSON.errors, function (key, value) {
                $('#' + key + '-error-feedback').html(value);
                $('#' + key + '-error-feedback').parent().addClass("error");
            });
        }
    })
}
function review(btn) {
    var form = $(btn).parent().parent().parent().parent();
    console.log(form);
    var values = ['name', 'city', 'message', 'image'];
    $.ajax({
        url: '/review',
        data: new FormData(form[0]),
        dataType: 'json',
        async: false,
        type: 'post',
        processData: false,
        contentType: false,
        success: function (data) {
            $.each(values, function (key, value) {
                $('.' + value + '-error-review').html('');
                $('.' + value + '-error-review').parent().removeClass("error");
            });
            $('.modal-popup').removeClass('popup-open');
            $('.review-block').removeClass('active');
            setTimeout(function () {
                $('.thankyou-block-review').addClass('active');
                $('.modal-popup').addClass('popup-open');
            }, 300)
            timeOuts[1] = setTimeout(function () {
                $('.modal-popup').removeClass('popup-open');
                $('.thankyou-block-review').removeClass('active');
            }, 6000);
            $(document).mouseup(function (e) {
                var div = $(".thankyou-block-review");
                if (div.hasClass('active')) {
                    if (!div.is(e.target)
                        && div.has(e.target).length === 0) {
                        div.removeClass('active');
                        clearTimeout(timeOuts[1])
                    }
                }

            });
            $("#review_form").find("input[type=text], textarea, input[type=file]").val("");
            $('#review_form .photo').css('background-image', 'url(/img/icons/photo-min.png)');
        },
        error: function (data) {
            $.each(values, function (key, value) {
                $('.' + value + '-error-review').html('');
                $('.' + value + '-error-review').parent().removeClass("error");
            });
            $.each(data.responseJSON.errors, function (key, value) {
                console.log(key)
                $('.' + key + '-error-review').html(value);
                $('.' + key + '-error-review').parent().addClass("error");
            });
        }
    });
}
function feedbackFooter() {
    var values = ['name', 'phone'];
    $.ajax({
        url: '/feedback',
        data: {
            name: $("#name-input-feedback-footer").val(),
            phone: $("#phone-input-feedback-footer").val(),
        },
        type: 'post',
        success: function (data) {
          location.href="https://septikdom.com/spasibo";
            // $.each(values, function (key, value) {
            //     $('#' + value + '-error-feedback-footer').html('');
            //     $('#' + value + '-error-feedback-footer').parent().removeClass("error");
            // });
            // $('.modal-popup').addClass('popup-open');
            // $('.thankyou-block-home').addClass('active');
            // timeOuts[2] = setTimeout(function () {
            //     $('.modal-popup').removeClass('popup-open');
            //     $('.thankyou-block-home').removeClass('active');
            // }, 6000);
            // $(document).mouseup(function (e) {
            //     var div = $(".thankyou-block-home");
            //     if (div.hasClass('active')) {
            //         if (!div.is(e.target)
            //             && div.has(e.target).length === 0) {
            //             $('.modal-popup').removeClass('popup-open');
            //             div.removeClass('active');
            //             clearTimeout(timeOuts[2])
            //         }
            //     }
            //
            // });
            // $("#name-input-feedback-footer").val('');
            // $("#phone-input-feedback-footer").val('');
        },
        error: function (data) {
            $.each(values, function (key, value) {
                $('#' + value + '-error-feedback-footer').html('');
                $('#' + value + '-error-feedback-footer').parent().removeClass("error");
            });
            $.each(data.responseJSON.errors, function (key, value) {
                $('#' + key + '-error-feedback-footer').html(value);
                $('#' + key + '-error-feedback-footer').parent().addClass("error");
            });
        }
    })
}
function feedbackCalculator() {
    var values = ['name', 'phone'];
    $.ajax({
        url: '/feedback',
        data: {
            name: $("#name-input-feedback-calculator").val(),
            phone: $("#phone-input-feedback-calculator").val(),
        },
        type: 'post',
        success: function (data) {
          location.href="https://septikdom.com/spasibo";
            // $.each(values, function (key, value) {
            //     $('#' + value + '-error-feedback-calculator').html('');
            //     $('#' + value + '-error-feedback-calculator').parent().removeClass("error");
            // });
            // $('.modal-popup').addClass('popup-open');
            // $('.thankyou-block-home').addClass('active');
            // timeOuts[3] = setTimeout(function () {
            //     $('.modal-popup').removeClass('popup-open');
            //     $('.thankyou-block-home').removeClass('active');
            // }, 6000);
            // $(document).mouseup(function (e) {
            //     var div = $(".thankyou-block-home");
            //     if (div.hasClass('active')) {
            //         if (!div.is(e.target)
            //             && div.has(e.target).length === 0) {
            //             $('.modal-popup').removeClass('popup-open');
            //             div.removeClass('active');
            //             clearTimeout(timeOuts[3])
            //         }
            //     }
            // });
            // $("#name-input-feedback-calculator").val('');
            // $("#phone-input-feedback-calculator").val('');
        },
        error: function (data) {
            $.each(values, function (key, value) {
                $('#' + value + '-error-feedback-calculator').html('');
                $('#' + value + '-error-feedback-calculator').parent().removeClass("error");
            });
            $.each(data.responseJSON.errors, function (key, value) {
                $('#' + key + '-error-feedback-calculator').html(value);
                $('#' + key + '-error-feedback-calculator').parent().addClass("error");
            });
        }
    })
}
