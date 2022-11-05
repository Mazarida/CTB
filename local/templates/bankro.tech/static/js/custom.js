// jQuery
$(function() {
    // modal experts
    // $('.expert-slider__btn').click(function (){
    //     $('.bn-overlay').fadeIn(200);
    //     $('.bn-modal-experts').fadeIn(200);
    //     window.scroll_hidden();
    // });
    //
    // // modal demo form
    // $('.btn--demo').click(function (){
    //     $('.bn-overlay').fadeIn(200);
    //     $('.bn-modal-request').fadeIn(200);
    //     window.scroll_hidden();
    // });
    //
    // // modal manager form
    // $('.btn--manager').click(function (){
    //     $('.bn-overlay').fadeIn(200);
    //     $('.bn-modal-request-manager').fadeIn(200);
    //     window.scroll_hidden();
    // });
    //
    // // modal close
    // $('.bn-btn-close').click(function (){
    //     $('.bn-overlay').fadeOut(100);
    //     $('.bn-modal').fadeOut(100);
    //     window.scroll_hidden();
    // });

	// set info_cookies
    $('.btn--cookies').on('click', function () {
        $.cookie('info_cookies', 'Y', { path: '/' });
        $('.info-cookies-block').remove();
    });

    // modal calc question form
    $('.btn--question').click(function (){
        $('.bn-overlay').fadeIn(200);
        $('.bn-modal-request-1').fadeIn(200);
        window.scroll_hidden();
    });

    // calculator show / hide
    // клик по области переключателя
    $('.bn-calc-box__btn').click(function () {
        if (!$(this).hasClass('active')) {
            var group = $(this).closest('[data-group]').attr('data-group');

            $('[data-group="'+group+'"] .bn-calc-box__btn').removeClass('active');
            $('[data-group="'+group+'"] .bn-calc-box__btn').find('input').prop('checked', false);
            $('[data-group="'+group+'"] .bn-calc-box__btn').next('.bn-calc-box__show').slideUp(200);

            $(this).find('input').prop('checked', true);
            $(this).addClass('active');
            $(this).next('.bn-calc-box__show').slideDown(200);
            $('.bn-calc-img-check[data-calc="'+ $(this).data('icon') +'"]' ).addClass('active');
            sendCalcRequest($(this).closest('form'));
        } else {
            $(this).find('input').prop('checked', false);
            $(this).removeClass('active');
            $(this).next('.bn-calc-box__show').slideUp(200);
            sendCalcRequest($(this).closest('form'));
        }

        $('.bn-calc-box__btn').each(function () {
            if ($(this).hasClass('active') && !$('.bn-calc-img-check[data-calc="'+ $(this).data('icon') +'"]' ).hasClass('active')) {
                $('.bn-calc-img-check[data-calc="'+ $(this).data('icon') +'"]' ).addClass('active')
            }
            if (!$(this).hasClass('active') && $('.bn-calc-img-check[data-calc="'+ $(this).data('icon') +'"]' ).hasClass('active')) {
                $('.bn-calc-img-check[data-calc="'+ $(this).data('icon') +'"]' ).removeClass('active')
            }
        });

    });

    // клик по иконке
    $('.bn-calc-img-check').click(function () {
        $('.bn-calc-box__btn[data-icon="'+$(this).data('calc')+'"]').click()
    });

    // calculator - range slider
    $('.bn-calc-box__number').on("input change", function() {
        $(this).next('.bn-range-slider').find('.bn-range-slider__handler').val(this.value);
        $(this).next('.bn-range-slider').find('.bn-range-slider__track').val(this.value);
        sendCalcRequest($(this).closest('form'));
    });

    $('.bn-range-slider__handler').on("input", function() {
        $(this).parent('.bn-range-slider').prev('.bn-calc-box__number').val(this.value);
        $(this).next('.bn-range-slider__track').val(this.value);
        sendCalcRequest($(this).closest('form'));
    });

    $('.bn-calc-box__box').on('click', '.bn-checked-square', function () {
        if ($(this).find('input[type="checkbox"]').is(':checked')) {
            $(this).closest('.bn-calc-box__box').find('.bn-calc-box__number').prop('disabled', false);
            $(this).closest('.bn-calc-box__box').find('.bn-range-slider__handler').prop('disabled', false);
        } else {
            $(this).closest('.bn-calc-box__box').find('.bn-calc-box__number').prop('disabled', true);
            $(this).closest('.bn-calc-box__box').find('.bn-range-slider__handler').prop('disabled', true);
        }
        sendCalcRequest($(this).closest('form'));
    });

    // формирование pdf-файла с расчетом
    $('.js-calc-pdf').on('click', function () {
        let form = $(this).closest('.bn-calc__main').find('form');
        let now = Date.now();

        $.ajax({
            url: '/ajax/calc.php',
            type: "POST",
            data: form.serialize() + '&to_pdf=1&date=' + now,
            success: function (data) {
                //console.log(data);
                if (data !== '') {
                    window.open(data,'_blank');
                    window.setTimeout(function () { //Через 5 секунд удаляем файл
                        $.ajax({
                            type: 'post',
                            url: '/ajax/delete_pdf.php',
                            data: {filename: data},
                        });
                    }, 5000);
                }
            }
        })
    });

    // формирование pdf-файла со счетом-офертой
    $('.js-invoice-pdf').on('click', function (e) {
        e.preventDefault();
        let form = $(this).closest('form');
        let form_calc = $('.bn-calc__main').find('form');
        let now = Date.now();

        $.ajax({
            url: '/ajax/calc.php',
            type: "POST",
            data: form_calc.serialize() + '&' + form.serialize() + '&to_pdf=2&date=' + now,
            dataType: "json",
            success: function (data) {
                //console.log(data);

                try {
                    if (data.status == 'error') {
                        $('.js-invoice-msg').html(data.error_msg).show();
                    } else if (data.status == 'success') {
                        $('.js-invoice-msg').html('').hide();
                        window.open(data.filename, '_blank');
                        window.setTimeout(function () { //Через 5 секунд удаляем файл
                            $.ajax({
                                type: 'post',
                                url: '/ajax/delete_pdf.php',
                                data: {filename: data.filename},
                            });
                        }, 5000);
                    } else {
                        $('.js-invoice-msg').html('Возникла непредвиденная ошибка.').show();
                    }
                }
                catch (err) {}
            }
        })
    });

    function sendCalcRequest(form) {
        if (typeof window.ajxCalcRequset !== "undefined") {
            window.ajxCalcRequset.abort();
        }

        window.ajxCalcRequset = $.ajax({
            url: '/ajax/calc.php',
            type: "POST",
            data: form.serialize(),
            dataType: "json",
            success: function (data) {
                //console.log(data);

                try {
                    form.find('.js-calc-automation-org-quarter-price').html(data.automation.org.price_quarter);
                    form.find('.js-calc-automation-org-year-price').html(data.automation.org.price_year);
                    form.find('.js-calc-automation-ind-quarter-price').html(data.automation.ind.price_quarter);
                    form.find('.js-calc-automation-ind-year-price').html(data.automation.ind.price_year);

                    //data.monitoring.price && form.find('.js-calc-monitoring-price').html(data.monitoring.price_per_one);
                    form.find('.js-calc-monitoring-price').html(data.monitoring.price_per_one);

                    form.find('.js-calc-meetings-org-quarter-price').html(data.meetings.org.price_quarter);
                    form.find('.js-calc-meetings-org-year-price').html(data.meetings.org.price_year);
                    form.find('.js-calc-meetings-ind-quarter-price').html(data.meetings.ind.price_quarter);
                    form.find('.js-calc-meetings-ind-year-price').html(data.meetings.ind.price_year);

                    form.find('.js-calc-api-org-quarter-price').html(data.api.org.price_quarter);
                    form.find('.js-calc-api-org-year-price').html(data.api.org.price_year);
                    form.find('.js-calc-api-ind-quarter-price').html(data.api.ind.price_quarter);
                    form.find('.js-calc-api-ind-year-price').html(data.api.ind.price_year);

                    form.find('.bn-calc__text u').html(data.count_text);
                    form.find('.bn-calc__price').html(data.total_text);

                    if (data.show_consult_btn == 1) {
                        $('.js-calc-pdf').hide();
                        form.find('.bn-btn--invoice').hide();
                        form.find('.btn--question').show();
                    } else {
                        $('.js-calc-pdf').show();
                        form.find('.btn--question').hide();
                        form.find('.bn-btn--invoice').show();
                    }
                }
                catch (err) {}
            }
        });
    }
});