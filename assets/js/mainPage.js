/**
 * Created by Антон on 17.01.2017.
 */

$(document).ready(function () {

    $('a.ajaxSubmitForm').on('click', function () {
        var that = $(this).parent().parent();
        var url = $(that).attr('form_url');
        $.post(url, $(that).serialize(), function (data) {
                console.log(data);
            if(data.auth){
                location.href='/profile';
            }
            }, 'json')
            .fail(function (xhr, status, error) {
                console.log(xhr, status, error);
            });
    })
});