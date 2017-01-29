/**
 * Created by Антон on 29.01.2017.
 */
$(document).ready(function () {
    var maskList = $.masksSort($.masksLoad("/assets/js/phone-codes.json.txt"), ['#'], /[0-9]|#/, "mask");
    var maskOpts = {
        inputmask: {
            definitions: {
                '#': {
                    validator: "[0-9]",
                    cardinality: 1
                }
            },
            //clearIncomplete: true,
            showMaskOnHover: false,
            autoUnmask: true
        },
        match: /[0-9]/,
        replace: '#',
        list: maskList,
        listKey: "mask",
        onMaskChange: function (maskObj, completed) {
            if (completed) {
                var hint = maskObj.name_ru;
                if (maskObj.desc_ru && maskObj.desc_ru != "") {
                    hint += " (" + maskObj.desc_ru + ")";
                }
                $(this).parent().find('.descr').html(hint);
            } else {
                $(this).parent().find('.descr').html("Маска ввода");
            }
            $(this).attr("placeholder", $(this).inputmask("getemptymask"));
        }
    };

    $('.phone_mask').change(function () {
        if ($('.phone_mask').is(':checked')) {
            $('.customer_phone').inputmasks(maskOpts);
        } else {
            $('.customer_phone').inputmask("+[####################]", maskOpts.inputmask)
                .attr("placeholder", $('.customer_phone').inputmask("getemptymask"));
            $(".descr").html("Маска ввода");
        }
    });

    $('.phone_mask').change();
});