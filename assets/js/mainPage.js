/**
 * Created by Антон on 17.01.2017.
 */

$(document).ready(function () {

    $('button.ajaxSubmitForm').on('click', function () {
        $('.alert').addClass('hide');
        var that = $(this).parent().parent();
        var url = $(that).attr('form_url');
        $.post(url, $(that).serialize(), function (data) {
            if(data.auth){
                location.href='/profile';
            }else{
                $('.alert').html(data.message);
                $('.alert').removeClass('hide');
            }
            }, 'json')
            .fail(function (xhr, status, error) {
                console.log(xhr, status, error);
            });
    })

    $('button.ajaxRegistrForm').on('click', function () {
        $('.alert').addClass('hide');
        var that = $(this).parent().parent().find('div form');
        var url = $(that).attr('form_url');
        $.post(url, $(that).serialize(), function (data) {
            if(data.registration){
                $('.alert').html(data.message);
                $('.alert').removeClass('hide');
            }else{
                $('.alert').html(data.message);
                $('.alert').removeClass('hide');
            }
            }, 'json')
            .fail(function (xhr, status, error) {
                console.log(xhr, status, error);
            });
    });
});