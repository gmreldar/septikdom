<script>
    $(document).ready(function () {
        if (window.location.hash === '#otzyvy') {
            reviewActive();
        }
        $('.single-product-title .comments .value').on('click', reviewActive);
        radioProduct();
        checkBoxControl();
        $('#product-name').html('{{ $product->name }}');
        $('#product-name2').html('{{ $product->name }}');
    });

    function reviewActive() {
        //window.location.hash = null
        $('.tabs-box .tab').removeClass('tab-active');
        $('.tab-content').removeClass('tab-active');
        $('.tabs-box .tab#reviews').addClass('tab-active');
        $('.tab-content#reviews-content').addClass('tab-active');
    }

    $('.ok-button').click(function () {
        $(".modal-popup .popup-close").click();
        for(var i=0; i<timeOuts.length; i++) {
            clearTimeout(timeOuts[i])
        }
    });

    $('#button-submit').click(function () {
        order();
    });

    $('#button-submit-montazh').click(function () {
        orderMontazh();
    });

    $('#button-submit-comment').click(function () {
        comment();
    });

    var modification_id = 0;

    function order() {
        var values = ['name', 'phone'];
        $.ajax({
            url: '/katalog/order',
            data: {
                product_id: modification_id,
                name: $("#name-input").val(),
                phone: $("#phone-input").val()
            },
            type: 'post',
            success: function (data) {
                $.each(values, function (key, value) {
                    $('.' + value + '-error').html('');
                    $('.' + value + '-error').parent().removeClass("error");
                });
                $('.feedback .block:not(.success)').fadeOut(500, function () {
                    $('.feedback .block.success').fadeIn(500);
                });
                $('.item-number').html(data['id']);
                $('.single-item-order-block').removeClass('active');
                $('.modal-popup').removeClass('popup-open');
                setTimeout(function () {
                    window.location = '/spasibo'
                    // $('.order-thankyou-block').addClass('active');
                    // $('.modal-popup').addClass('popup-open');
                    // timeOuts[5] = setTimeout(function () {
                    //     $('.modal-popup').removeClass('popup-open');
                    //     $('.order-thankyou-block').removeClass('active');
                    // }, 6000);
                }, 300);

                $(document).mouseup(function (e) {
                    window.location = '/spasibo'
                    // var thankBlock = $('.order-thankyou-block');
                    // if (thankBlock.hasClass('active')) {
                    //     if (!thankBlock.is(e.target)
                    //         && thankBlock.has(e.target).length === 0) {
                    //         $('.modal-popup').removeClass('popup-open');
                    //         thankBlock.removeClass('active');
                    //         clearTimeout(timeOuts[5])
                    //     }
                    // }
                });
                $('#name-input').val('');
                $('#phone-input').val('');
            },
            error: function (data) {
                $.each(values, function (key, value) {
                    $('.' + value + '-error').html('');
                    $('.' + value + '-error').parent().removeClass("error");
                });
                $.each(data.responseJSON.errors, function (key, value) {
                    $('.' + key + '-error').html(value);
                    $('.' + key + '-error').parent().addClass("error");
                });
            }
        })
    }

    function orderMontazh() {
        var values = ['name', 'phone'];
        $.ajax({
            url: '/katalog/order',
            data: {
                product_id: modification_id,
                name: $("#name-input-montazh").val(),
                phone: $("#phone-input-montazh").val(),
                montazh: 1
            },
            type: 'post',
            success: function (data) {
              location.href="http://septikdom.paradigma.in.ua/spasibo";
                // $.each(values, function (key, value) {
                //     $('#' + value + '-error-montazh').html('');
                //     $('#' + value + '-error-montazh').parent().removeClass("error");
                //     $('#' + value + '-input-montazh').val('');
                // });
                // $('.feedback .block:not(.success)').fadeOut(500, function () {
                //     $('.feedback .block.success').fadeIn(500);
                // });
                // $('.item-number').html(data['id']);
                // $('.form-order-block').removeClass('active');
                // $('.modal-popup').removeClass('popup-open');
                // setTimeout(function () {
                //     $('.order-thankyou-block').addClass('active');
                //     $('.modal-popup').addClass('popup-open');
                //     timeOuts[6] = setTimeout(function () {
                //         $('.modal-popup').removeClass('popup-open');
                //         $('.order-thankyou-block').removeClass('active');
                //     }, 6000);
                // }, 300);
                //
                // $(document).mouseup(function (e) {
                //     var thankBlock = $('.order-thankyou-block');
                //
                //     if (thankBlock.hasClass('active')) {
                //         console.log('eeeeeee')
                //         if (!thankBlock.is(e.target)
                //             && thankBlock.has(e.target).length === 0) {
                //             $('.modal-popup').removeClass('popup-open');
                //             thankBlock.removeClass('active');
                //             clearTimeout(timeOuts[6])
                //         }
                //     }
                // });
                // $('#name-input-montazh').val('');
                // $('#phone-input-montazh').val('');
                // function resetForm($form) {
                //     $form.find('input:text, input:password, input:file, select, textarea').val('');
                //     $form.find('input:radio, input:checkbox')
                //         .removeAttr('checked').removeAttr('selected');
                // }
                // function resetMontazhForm() {
                //     var form = $('.single-item-calc');
                //     form.find('input:text').val('0 м.').css('color', 'rgba(21,21,21,.4)');
                //     form.find('input:checkbox').prop('checked', false);
                //     $('#formwork, #plyvun, #well_150').prop("checked", true);
                // }
                //
                // resetMontazhForm()
                // // to call, use:
                // resetForm($('#popupFormCalc')); // by id, recommended
            },
            error: function (data) {
                $.each(values, function (key, value) {
                    $('#' + value + '-error-montazh').html('');
                    $('#' + value + '-error-montazh').parent().removeClass("error");
                });
                $.each(data.responseJSON.errors, function (key, value) {
                    $('#' + key + '-error-montazh').html(value);
                    $('#' + key + '-error-montazh').parent().addClass("error");
                });
            }
        })
    }

    function comment() {
        var values = ['name', 'contacts', 'text'];
        $.ajax({
            url: '/katalog/comment',
            data: {
                product_id: {{ $product->id }},
                name: $("#name-input-comment").val(),
                contacts: $("#contacts-input-comment").val(),
                text: $("#text-input-comment").val()
            },
            type: 'post',
            success: function (data) {
                $.each(values, function (key, value) {
                    $('.' + value + '-error-comment').html('');
                    $('.' + value + '-error-comment').parent().removeClass("error");
                });
                $('.modal-popup').addClass('popup-open');
                $('.comment-thankyou-block').addClass('active');

                $(document).mouseup(function (e) {
                    var thankBlock = $('.comment-thankyou-block');
                    if (thankBlock.hasClass('active')) {
                        if (!thankBlock.is(e.target)
                            && thankBlock.has(e.target).length === 0) {
                            $('.modal-popup').removeClass('popup-open');
                            thankBlock.removeClass('active');
                        }
                    }
                });
                $('#name-input-comment').val('');
                $('#contacts-input-comment').val('');
                $('#text-input-comment').val('');
            },
            error: function (data) {
                $.each(values, function (key, value) {
                    $('.' + value + '-error-comment').html('');
                    $('.' + value + '-error-comment').parent().removeClass("error");
                });
                $.each(data.responseJSON.errors, function (key, value) {
                    $('.' + key + '-error-comment').html(value);
                    $('.' + key + '-error-comment').parent().addClass("error");
                });
            }
        })
    }
</script>
