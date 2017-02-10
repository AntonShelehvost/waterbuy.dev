$(document).ready(function () {
    //themes, change CSS with JS
    //default theme(CSS) is cerulean, change it if needed
    var defaultTheme = 'cerulean';

    var currentTheme = $.cookie('currentTheme') == null ? defaultTheme : $.cookie('currentTheme');
    var msie = navigator.userAgent.match(/msie/i);
    $.browser = {};
    $.browser.msie = {};
    switchTheme(currentTheme);

    $('.navbar-toggle').click(function (e) {
        e.preventDefault();
        $('.nav-sm').html($('.navbar-collapse').html());
        $('.sidebar-nav').toggleClass('active');
        $(this).toggleClass('active');
    });

    var $sidebarNav = $('.sidebar-nav');

    // Hide responsive navbar on clicking outside
    $(document).mouseup(function (e) {
        if (!$sidebarNav.is(e.target) // if the target of the click isn't the container...
            && $sidebarNav.has(e.target).length === 0
            && !$('.navbar-toggle').is(e.target)
            && $('.navbar-toggle').has(e.target).length === 0
            && $sidebarNav.hasClass('active')
        )// ... nor a descendant of the container
        {
            e.stopPropagation();
            $('.navbar-toggle').click();
        }
    });


    $('#themes a').click(function (e) {
        e.preventDefault();
        currentTheme = $(this).attr('data-value');
        $.cookie('currentTheme', currentTheme, {expires: 365});
        switchTheme(currentTheme);
    });


    function switchTheme(themeName) {
        if (themeName == 'classic') {
            $('#bs-css').attr('href', 'bower_components/bootstrap/dist/css/bootstrap.min.css');
        } else {
            $('#bs-css').attr('href', '/assets/css/bootstrap-' + themeName + '.min.css');
        }

        $('#themes i').removeClass('glyphicon glyphicon-ok whitespace').addClass('whitespace');
        $('#themes a[data-value=' + themeName + ']').find('i').removeClass('whitespace').addClass('glyphicon glyphicon-ok');
    }

    //ajax menu checkbox
    $('#is-ajax').click(function (e) {
        $.cookie('is-ajax', $(this).prop('checked'), {expires: 365});
    });
    $('#is-ajax').prop('checked', $.cookie('is-ajax') === 'true' ? true : false);

    //disbaling some functions for Internet Explorer
    if (msie) {
        $('#is-ajax').prop('checked', false);
        $('#for-is-ajax').hide();
        $('#toggle-fullscreen').hide();
        $('.login-box').find('.input-large').removeClass('span10');

    }


    //highlight current / active link
    $('ul.main-menu li a').each(function () {
        if ($($(this))[0].href == String(window.location))
            $(this).parent().addClass('active');
    });

    //establish history variables
    var
        History = window.History, // Note: We are using a capital H instead of a lower h
        State = History.getState(),
        $log = $('#log');

    //bind to State Change
    History.Adapter.bind(window, 'statechange', function () { // Note: We are using statechange instead of popstate
        var State = History.getState(); // Note: We are using History.getState() instead of event.state
        $.ajax({
            url: State.url,
            success: function (msg) {
                $('#content').html($(msg).find('#content').html());
                $('#loading').remove();
                $('#content').fadeIn();
                var newTitle = $(msg).filter('title').text();
                $('title').text(newTitle);
                docReady();
            }
        });
    });

    //ajaxify menus
    $('a.ajax-link').click(function (e) {
        if (msie) e.which = 1;
        if (e.which != 1 || !$('#is-ajax').prop('checked') || $(this).parent().hasClass('active')) return;
        e.preventDefault();
        $('.sidebar-nav').removeClass('active');
        $('.navbar-toggle').removeClass('active');
        $('#loading').remove();
        $('#content').fadeOut().parent().append('<div id="loading" class="center">Loading...<div class="center"></div></div>');
        var $clink = $(this);
        History.pushState(null, null, $clink.attr('href'));
        $('ul.main-menu li.active').removeClass('active');
        $clink.parent('li').addClass('active');
    });

    $('.accordion > a').click(function (e) {
        e.preventDefault();
        var $ul = $(this).siblings('ul');
        var $li = $(this).parent();
        if ($ul.is(':visible')) $li.removeClass('active');
        else                    $li.addClass('active');
        $ul.slideToggle();
    });

    $('.accordion li.active:first').parents('ul').slideDown();


    //other things to do on document ready, separated for ajax calls
    docReady();
});

function set_country_value(value) {
    var lists = $('div.modal-body > form > div.form-group > select.country')
    $.each(lists, function (ind, list) {
        $(list).val(value);
        $(list).chosen({width: '100%!important'});
        $(list).trigger("chosen:updated");
    })
}


function set_region_value(value) {
    var lists = $('div.modal-body > form > div.form-group > select.region')
    $.each(lists, function (ind, list) {
        $(list).val(value);
        $(list).chosen({width: '100%!important'});
        $(list).chosen({width: '100%!important'}).trigger("chosen:updated");
    })
}

function set_city_value(value) {
    var lists = $('div.modal-body > form > div.form-group > select.city')
    $.each(lists, function (ind, list) {
        $(list).val(value);
        $(list).chosen({width: '100%!important'});
        $(list).trigger("chosen:updated");
    })
}

function docReady() {
    //prevent # links from moving to top
    $('a[href="#"][data-top!=true]').click(function (e) {
        e.preventDefault();
    });

    //notifications
    $('.noty').click(function (e) {
        e.preventDefault();
        var options = $.parseJSON($(this).attr('data-noty-options'));
        noty(options);
    });

    $('#Form_country_submit').on('click', function () {
        $.post('/admin/add_location', $('#Form_country').serialize(), function (data) {
            if (data.success !== false) {
                $('#Form_main').before('<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + data.success + '</div>')
            }
            else {
                $('#Form_main').before('<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Ошибка обработки запроса. Обратитесь к администратору сайта.</div>')
            }
        }, 'json');
    });

    $('#Form_region_submit').on('click', function () {
        $.post('/admin/add_location', $('#Form_region').serialize(), function (data) {
            if (data.success !== false) {
                $('#Form_main').before('<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + data.success + '</div>')
            }
            else {
                $('#Form_main').before('<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Ошибка обработки запроса. Обратитесь к администратору сайта.</div>')
            }
        }, 'json');
    });

    $('#Form_city_submit').on('click', function () {
        $.post('/admin/add_location', $('#Form_city').serialize(), function (data) {
            if (data.success !== false) {
                $('#Form_main').before('<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + data.success + '</div>')
            }
            else {
                $('#Form_main').before('<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Ошибка обработки запроса. Обратитесь к администратору сайта.</div>')
            }
        }, 'json');
    });
    $(document).on('click', '.minus', function () {
        var count = $(this).parent().parent().find('.calc');
        $(count).val(parseInt($(count).val()) - 1);
    });
    $(document).on('click', '.plus', function () {
        var count = $(this).parent().parent().find('.calc');
        $(count).val(parseInt($(count).val()) + 1);
    });


    $(document).on('click', '.update_order', function () {

        $.post('/admin/update_order',
            {
                'ord_father_name': $('input[name="ord_father_name"]').val(),
                'ord_name': $('input[name="ord_name"]').val(),
                'ord_last_name': $('input[name="ord_last_name"]').val(),
                'ord_phone': $('input[name="ord_phone"]').val(),
                'ord_comments': $('input[name="ord_comments"]').val(),
                'ord_delivery_datetime': $('input[name="ord_delivery_datetime"]').val(),
                'ord_id_country': $('input[name="ord_id_country"]').val(),
                'ord_id_region': $('input[name="ord_id_region"]').val(),
                'ord_id_city': $('input[name="ord_id_city"]').val(),
                'ord_id_district': $('input[name="ord_id_district"]').val(),
                'ord_street': $('input[name="ord_street"]').val(),
                'ord_building': $('input[name="ord_building"]').val(),
                'ord_room': $('input[name="ord_room"]').val(),
                'ord_intercom': $('input[name="ord_intercom"]').val(),
                'ord_destonation': $('input[name="ord_destonation"]').val(),
                'order_id': $('#order_id').val()
            },
            function (data) {
                if (data.message !== false) {
                    $('.alert-success').removeClass('hide');
                    $('.alert-success').html(data.message);
                    $('input[name="ord_father_name"]').val(''),
                    $('input[name="ord_name"]').val(''),
                    $('input[name="ord_last_name"]').val(''),
                    $('input[name="ord_phone"]').val(''),
                    $('input[name="ord_comments"]').val(''),
                    $('input[name="ord_street"]').val(''),
                    $('input[name="ord_building"]').val(''),
                    $('input[name="ord_room"]').val(''),
                    $('input[name="ord_intercom"]').val(''),
                    $('input[name="ord_destonation"]').val(''),
                    $('#order_id').val(0);
                    table.ajax.url('/admin/get_order_items?id=' + $('#order_id').val());
                    table.ajax.reload();

                }
                console.log(data);
            }, 'json');
    });
    $(document).on('click', '.add_order_item', function () {
        $.post('/admin/add_order_item',
            {
                order_id: $('#order_id').val(),
                product_id: $(this).attr('data-id'),
                amount: $(this).parent().parent().find('.calc').val()
            },
            function (data) {
                if (data.success !== false) {
                    $('#order_id').val(data.order_id);
                    table.ajax.url('/admin/get_order_items?id=' + $('#order_id').val());
                    table.ajax.reload();

                }
                console.log(data);
            }, 'json');
    });

    $('#Form_district_submit').on('click', function () {
        $.post('/admin/add_location', $('#Form_district').serialize(), function (data) {
            if (data.success !== false) {
                $('#Form_main').before('<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + data.success + '</div>')
            }
            else {
                $('#Form_main').before('<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Ошибка обработки запроса. Обратитесь к администратору сайта.</div>')
            }
        }, 'json');
    });

    $('#button_edit_country').on('click', function () {
        $('#edit_cou_id').val($('#Form_main select.form-control.country').val());
        $('#edit_country').val($('#Form_main select.form-control.country :selected').text());
    });

    $('#button_edit_region').on('click', function () {
        $('#edit_reg_id').val($('#Form_main select.form-control.region').val());
        $('#edit_region').val($('#Form_main select.form-control.region :selected').text());
    });

    $('#button_edit_city').on('click', function () {
        $('#edit_cit_id').val($('#Form_main select.form-control.city').val());
        $('#edit_city').val($('#Form_main select.form-control.city :selected').text());
    });

    $('#button_edit_district').on('click', function () {
        $('#edit_dis_id').val($('#Form_main select.form-control.district').val());
        $('#edit_district').val($('#Form_main select.form-control.district :selected').text());
    });

    $('#button_delete_country').on('click', function () {
        $('#delete_cou_id').val($('#Form_main select.form-control.country').val());

    });

    $('#button_delete_region').on('click', function () {
        $('#delete_reg_id').val($('#Form_main select.form-control.region').val());

    });

    $('#button_delete_city').on('click', function () {
        $('#delete_cit_id').val($('#Form_main select.form-control.city').val());

    });

    $('#button_delete_district').on('click', function () {
        $('#delete_dis_id').val($('#Form_main select.form-control.district').val());

    });


    $('a.ajaxSubmitForm').on('click', function () {
        var url = $(this).attr('form_url');
        var that = $(this).parent().parent();
        $.post(url, $(that).serialize(), function (data) {
                if (data.success !== false) {
                    $('#Form_main').before('<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' + data.success + '</div>')
                }
                else {
                    $('#Form_main').before('<div class="alert alert-danger alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Ошибка обработки запроса. Обратитесь к администратору сайта.</div>')
                }
            }, 'json')
            .fail(function (xhr, status, error) {
                $('#Form_main').before('<div class="alert alert-success alert-dismissable"> <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Ошибка обработки запроса. Обратитесь к администратору сайта.</div>');
            });

        if (url == '/admin/add_location') {
            $('.country').change();
            $('.country').trigger("chosen:updated");
        }
    });

    $('.country').on('change', function (e) {
        var value = $(this).val();
        $.ajax({
            url: "/admin/get_region",
            data: {country: $(this).val()},
            type: 'GET',
            context: document.body,
            dataType: "json",
            success: function (data) {
                if (data !== false) {
                    var lists = $('.region');
                    $.each(lists, function (ind, list) {
                        $(list).empty();
                        $.each(data, function (index, item) {
                            $(list).append(new Option(item.reg_name, item.reg_id));
                        });
                        $(list).chosen({width: '100%!important'});
                        $(list).trigger("chosen:updated");
                        $('.region').change();
                    });
                } else console.log('Something wrong in answer');
            }
        });
        set_country_value(value);
    });

    $('.region').on('change', function (e) {
        var value = $(this).val();
        $.ajax({
            url: "/admin/get_city",
            data: {country: $('.country').val(), region: $(this).val()},
            type: 'GET',
            context: document.body,
            dataType: "json",
            success: function (data) {
                if (data !== false) {
                    var lists = $('.city');
                    $.each(lists, function (ind, list) {
                        $(list).empty();
                        $.each(data, function (index, item) {
                            $(list).append(new Option(item.cit_name, item.cit_id));
                        });
                        $(list).chosen({width: '100%!important'});
                        $(list).trigger("chosen:updated");
                        $('.city').change();
                    });
                } else console.log('Something wrong in answer');
            }
        });
        set_region_value(value);
    });

    $('.city').on('change', function (e) {
        var value = $(this).val();
        $.ajax({
            url: "/admin/get_district",
            data: {country: $('.country').val(), region: $('.region').val(), city: $(this).val()},
            type: 'GET',
            context: document.body,
            dataType: "json",
            success: function (data) {
                if (data !== false) {
                    var lists = $('.district');
                    $.each(lists, function (ind, list) {
                        $(list).empty();
                        $(list).append(new Option('- ВСЕ -', -1));
                        $.each(data, function (index, item) {
                            $(list).append(new Option(item.dis_name, item.dis_id));
                        });
                        $(list).chosen({width: '100%!important'});
                        $(list).trigger("chosen:updated");
                    });
                } else console.log('Something wrong in answer');
            }
        });
        /*if ($(".min_order").length) {
         $.ajax({
         url: "/admin/get_min_order",
         data: {country: $('.country').val(), region: $('.region').val(), city: $(this).val()},
         type: 'GET',
         context: document.body,
         dataType: "json",
         success: function (data) {
         if (data !== false) {
         var lists = $('.district');
         $.each(lists, function (ind, list) {
         $(list).empty();
         $(list).append(new Option('- ВСЕ -', -1));
         $.each(data, function (index, item) {
         $(list).append(new Option(item.dis_name, item.dis_id));
         });
         $(list).chosen({width: '100%'});
         $(list).trigger("chosen:updated");
         });
         } else console.log('Something wrong in answer');
         }
         });
         }*/
        set_city_value(value);
    });


    $('.min_order').on('change', function (e) {
        var value = $(this).val();

        set_city_value(value);
    });

    $('.country').chosen({width: '100%!important'});
    $('.country').change();

    //chosen - improves select
    $('[data-rel="chosen"],[rel="chosen"]').chosen();

    //tabs
    $('#myTab a:first').tab('show');
    $('#myTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
    });


    //tooltip
    $('[data-toggle="tooltip"]').tooltip();

    //auto grow textarea
    $('textarea.autogrow').autogrow();

    //popover
    $('[data-toggle="popover"]').popover();

    //iOS / iPhone style toggle switch
    $('.iphone-toggle').iphoneStyle();

    //star rating
    $('.raty').raty({
        score: 4 //default stars
    });

    //uploadify - multiple uploads
    $('#file_upload').uploadify({
        'swf': 'misc/uploadify.swf',
        'uploader': 'misc/uploadify.php'
        // Put your options here
    });

    //gallery controls container animation
    $('ul.gallery li').hover(function () {
        $('img', this).fadeToggle(1000);
        $(this).find('.gallery-controls').remove();
        $(this).append('<div class="well gallery-controls">' +
            '<p><a href="#" class="gallery-edit btn"><i class="glyphicon glyphicon-edit"></i></a> <a href="#" class="gallery-delete btn"><i class="glyphicon glyphicon-remove"></i></a></p>' +
            '</div>');
        $(this).find('.gallery-controls').stop().animate({'margin-top': '-1'}, 400);
    }, function () {
        $('img', this).fadeToggle(1000);
        $(this).find('.gallery-controls').stop().animate({'margin-top': '-30'}, 200, function () {
            $(this).remove();
        });
    });


    //gallery image controls example
    //gallery delete
    $('.thumbnails').on('click', '.gallery-delete', function (e) {
        e.preventDefault();
        //get image id
        //alert($(this).parents('.thumbnail').attr('id'));
        $(this).parents('.thumbnail').fadeOut();
    });
    //gallery edit
    $('.thumbnails').on('click', '.gallery-edit', function (e) {
        e.preventDefault();
        //get image id
        //alert($(this).parents('.thumbnail').attr('id'));
    });

    //gallery colorbox
    $('.thumbnail a').colorbox({
        rel: 'thumbnail a',
        transition: "elastic",
        maxWidth: "95%",
        maxHeight: "95%",
        slideshow: true
    });

    //gallery fullscreen
    $('#toggle-fullscreen').button().click(function () {
        var button = $(this), root = document.documentElement;
        if (!button.hasClass('active')) {
            $('#thumbnails').addClass('modal-fullscreen');
            if (root.webkitRequestFullScreen) {
                root.webkitRequestFullScreen(
                    window.Element.ALLOW_KEYBOARD_INPUT
                );
            } else if (root.mozRequestFullScreen) {
                root.mozRequestFullScreen();
            }
        } else {
            $('#thumbnails').removeClass('modal-fullscreen');
            (document.webkitCancelFullScreen ||
            document.mozCancelFullScreen ||
            $.noop).apply(document);
        }
    });

    //tour
    if ($('.tour').length && typeof(tour) == 'undefined') {
        var tour = new Tour();
        tour.addStep({
            element: "#content", /* html element next to which the step popover should be shown */
            placement: "top",
            title: "Custom Tour", /* title of the popover */
            content: "You can create tour like this. Click Next." /* content of the popover */
        });
        tour.addStep({
            element: ".theme-container",
            placement: "left",
            title: "Themes",
            content: "You change your theme from here."
        });
        tour.addStep({
            element: "ul.main-menu a:first",
            title: "Dashboard",
            content: "This is your dashboard from here you will find highlights."
        });
        tour.addStep({
            element: "#for-is-ajax",
            title: "Ajax",
            content: "You can change if pages load with Ajax or not."
        });
        tour.addStep({
            element: ".top-nav a:first",
            placement: "bottom",
            title: "Visit Site",
            content: "Visit your front end from here."
        });

        tour.restart();
    }


    function post(url, data, callback, type) {
        $.post(url, data, callback, type)
            .fail(function (xhr, status, error) {
                console.log(xhr, status, error);
                return false;
            });
        return true;
    }

    $('a.ajaxSaveClientForm').on('click', function () {
        var data = $('#SaveClientForm').serialize();
        post('/profile', data, function (data) {
            $('.alertSaveClientForm').addClass('hide');
            $('.alertSaveClientForm').removeClass('alert-warning');
            $('.alertSaveClientForm').removeClass('alert-success');
            if (data.success) {
                $('.alertSaveClientForm').addClass('alert-success');
                $('.alertSaveClientForm').html(data.message);
                $('.alertSaveClientForm').removeClass('hide');
            } else {
                $('.alertSaveClientForm').addClass('alert-warning');
                $('.alertSaveClientForm').html(data.message);
                $('.alertSaveClientForm').removeClass('hide');
            }
            setTimeout(function () {
                $('.alert').addClass('hide');
                $('.alert').removeClass('alert-warning');
                $('.alert').removeClass('alert-success');
            }, 50000);
            console.log('/profile', data);
        }, 'json');

    });

    $('a.ajaxSaveLogistForm').on('click', function () {
        var data = $('#SaveLogistForm').serialize();
        post('/profile', data, function (data) {
            $('.alertSaveLogistForm').addClass('hide');
            $('.alertSaveLogistForm').removeClass('alert-warning');
            $('.alertSaveLogistForm').removeClass('alert-success');
            if (data.success) {
                $('.alertSaveLogistForm').addClass('alert-success');
                $('.alertSaveLogistForm').html(data.message);
                $('.alertSaveLogistForm').removeClass('hide');
            } else {
                $('.alertSaveLogistForm').addClass('alert-warning');
                $('.alertSaveLogistForm').html(data.message);
                $('.alertSaveLogistForm').removeClass('hide');
            }
            setTimeout(function () {
                $('.alert').addClass('hide');
                $('.alert').removeClass('alert-warning');
                $('.alert').removeClass('alert-success');
            }, 50000);
            console.log('/profile', data);
        }, 'json');

    });

    $('a.saveNewAddress').on('click', function () {
        var data = $('#addNewAddress').serialize();
        post('/profile', data, function (data) {
            $('.alertSaveNewAddress').addClass('hide');
            $('.alertSaveNewAddress').removeClass('alert-warning');
            $('.alertSaveNewAddress').removeClass('alert-success');
            if (data.success) {
                $('.alertSaveNewAddress').addClass('alert-success');
                $('.alertSaveNewAddress').html(data.message);
                $('.alertSaveNewAddress').removeClass('hide');
            } else {
                $('.alertSaveNewAddress').addClass('alert-warning');
                $('.alertSaveNewAddress').html(data.message);
                $('.alertSaveNewAddress').removeClass('hide');
            }
            setTimeout(function () {
                $('.alert').addClass('hide');
                $('.alert').removeClass('alert-warning');
                $('.alert').removeClass('alert-success');
            }, 50000);
            table.ajax.reload();
            console.log('/profile', data);
        }, 'json');

    });

    $('a.ajaxSaveAddressForm').on('click', function () {
        var data = $('#SaveAddressForm').serialize();
        post('/profile', data, function (data) {
            $('.alertSaveAddressForm').addClass('hide');
            $('.alertSaveAddressForm').removeClass('alert-warning');
            $('.alertSaveAddressForm').removeClass('alert-success');
            if (data.success) {
                $('.alertSaveAddressForm').addClass('alert-success');
                $('.alertSaveAddressForm').html(data.message);
                $('.alertSaveAddressForm').removeClass('hide');
            } else {
                $('.alertSaveAddressForm').addClass('alert-warning');
                $('.alertSaveAddressForm').html(data.message);
                $('.alertSaveAddressForm').removeClass('hide');
            }
            setTimeout(function () {
                $('.alert').addClass('hide');
                $('.alert').removeClass('alert-warning');
                $('.alert').removeClass('alert-success');
            }, 50000);
            table.ajax.reload();
            console.log('/profile', data);
        }, 'json');

    });

    $(document).on('click', 'a.addNewRootCategory', function () {
        var data = $('#NewRootCategory').serialize();
        post('/admin/addCategory', data, function (data) {
            $('.alertCategory').addClass('hide');
            $('.alertCategory').removeClass('alert-warning');
            $('.alertCategory').removeClass('alert-success');
            if (data.success) {
                $('.alertCategory').addClass('alert-success');
                $('.alertCategory').html(data.message);
                $('.alertCategory').removeClass('hide');
            } else {
                $('.alertCategory').addClass('alert-warning');
                $('.alertCategory').html(data.message);
                $('.alertCategory').removeClass('hide');
            }
            setTimeout(function () {
                $('.alert').addClass('hide');
                $('.alert').removeClass('alert-warning');
                $('.alert').removeClass('alert-success');
            }, 10000);
            table.ajax.reload();
            console.log('/profile', data);
        }, 'json');

    });

    $(document).on('click', 'a.addNewSubCategory', function () {
        var data = $('#NewSubCategory').serialize();
        post('/admin/addCategory', data, function (data) {
            $('.alertCategory').addClass('hide');
            $('.alertCategory').removeClass('alert-warning');
            $('.alertCategory').removeClass('alert-success');
            if (data.success) {
                $('.alertCategory').addClass('alert-success');
                $('.alertCategory').html(data.message);
                $('.alertCategory').removeClass('hide');
            } else {
                $('.alertCategory').addClass('alert-warning');
                $('.alertCategory').html(data.message);
                $('.alertCategory').removeClass('hide');
            }
            setTimeout(function () {
                $('.alert').addClass('hide');
                $('.alert').removeClass('alert-warning');
                $('.alert').removeClass('alert-success');
            }, 10000);
            table.ajax.reload();
            console.log('/profile', data);
        }, 'json');

    });

    $('a.ajaxSaveNewPassword').on('click', function () {
        var data = $('#saveFormNewPassword').serialize();
        post('/profile', data, function (data) {
            $('.alertSaveFormNewPassword').addClass('hide');
            $('.alertSaveFormNewPassword').removeClass('alert-warning');
            $('.alertSaveFormNewPassword').removeClass('alert-success');
            if (data.success) {
                $('.alertSaveFormNewPassword').addClass('alert-success');
                $('.alertSaveFormNewPassword').html(data.message);
                $('.alertSaveFormNewPassword').removeClass('hide');
            } else {
                $('.alertSaveFormNewPassword').addClass('alert-warning');
                $('.alertSaveFormNewPassword').html(data.message);
                $('.alertSaveFormNewPassword').removeClass('hide');
            }
            setTimeout(function () {
                $('.alert').addClass('hide');
                $('.alert').removeClass('alert-warning');
                $('.alert').removeClass('alert-success');
            }, 50000);
            //table.ajax.reload();
            console.log('/profile', data);
        }, 'json');

    });

    $(document).on('click', 'a.deleteId', function () {
        var data = $('#deleteFormAddress').serialize();
        post('/profile/deleteAddress', data, function (data) {
            $('.alertSaveNewAddress').addClass('hide');
            $('.alertSaveNewAddress').removeClass('alert-warning');
            $('.alertSaveNewAddress').removeClass('alert-success');
            if (data.success) {
                $('.alertSaveNewAddress').addClass('alert-success');
                $('.alertSaveNewAddress').html(data.message);
                $('.alertSaveNewAddress').removeClass('hide');
            } else {
                $('.alertSaveNewAddress').addClass('alert-warning');
                $('.alertSaveNewAddress').html(data.message);
                $('.alertSaveNewAddress').removeClass('hide');
            }
            table.ajax.reload();
            console.log('/profile', data);
        }, 'json');
    });


    $(document).on('click', '.deleteAddress', function () {
        $('#del_id').val($(this).attr('id'));
    });

    $(document).on('click', '.delete_item', function () {
        $('#delete_ori_id').val($(this).attr('id'));
    });

    $('a.ajaxDelete_ori').on('click', function () {
        var url = $(this).attr('form_url');
        var that = $(this).parent().parent();
        $.post(url, $(that).serialize(), function (data) {
            if (data.success !== false) {
                $('alert-mess').html(data.success)
                $('alert-mess').removeClass('hide');
                table.ajax.url('/admin/get_order_items?id=' + $('#order_id').val());
                table.ajax.reload();
            }

        }, 'json')
            .fail(function (xhr, status, error) {
                $('alert-mess').html('Ошибка обработки запроса. Обратитесь к администратору сайта.');
                $('alert-mess').removeClass('hide');

            });
    });
    $(document).on('change', '.calc-amount', function () {
        console.log($(this).attr('id') + '/' + $(this).val());
        var that = $(this).parent().parent().find('.calc-amount')
        $.post('change_amount_order_items', {
            'ori_id': $(that).attr('id'),
            'ori_count': $(that).val()
        }, function (data) {
        }, 'json');
    });

    $(document).on('click', '.minus-amount', function () {
        var count = $(this).parent().parent().find('.calc-amount');
        $(count).val(parseInt($(count).val()) - 1);
        $(count).change();
        table.ajax.url('/admin/get_order_items?id=' + $('#order_id').val());
        table.ajax.reload();
    });

    $(document).on('click', '.plus-amount', function () {
        var count = $(this).parent().parent().find('.calc-amount');
        $(count).val(parseInt($(count).val()) + 1);
        $(count).change();
        table.ajax.url('/admin/get_order_items?id=' + $('#order_id').val());
        table.ajax.reload();
    });

    $(document).on('click', '.ajaxDeleteProducts', function () {
        var that = $(this);
        var data = $('#deleteProducts').serialize();
        post('/admin/deleteProducts', data, function (data) {
            $('.alertProducts').addClass('hide');
            $('.alertProducts').removeClass('alert-warning');
            $('.alertProducts').removeClass('alert-success');
            if (data.success) {
                $('.alertProducts').addClass('alert-success');
                $('.alertProducts').html(data.message);
                $('.alertProducts').removeClass('hide');
                table.ajax.reload();
            } else {
                $('.alertProducts').addClass('alert-warning');
                $('.alertProducts').html(data.message);
                $('.alertProducts').removeClass('hide');
            }
            table.ajax.reload();
            console.log(data);
        }, 'json');
    });
    $(document).on('change', "#formFilter select", function () {
        var that = $(this);
        post('/admin/filter_product', $('#formFilter').serialize(), function (data) {
            $('#panel1 > div').html(data.html);
            console.log(data);
        }, 'json');
    });

    $(document).on('click', '.deleteCategory', function () {
        $('#cat_id').val($(this).attr('id'));
    });

    $(document).on('click', '.delete_product', function () {
        $('#prd_id').val($(this).attr('id'));
    });

    $(document).on('click', '.ajaxDeleteProducts', function () {
        var that = $(this);
        var data = $('#deleteProducts').serialize();
        post('/admin/deleteProducts', data, function (data) {
            $('.alertProducts').addClass('hide');
            $('.alertProducts').removeClass('alert-warning');
            $('.alertProducts').removeClass('alert-success');
            if (data.success) {
                $('.alertProducts').addClass('alert-success');
                $('.alertProducts').html(data.message);
                $('.alertProducts').removeClass('hide');
                table.ajax.reload();
            } else {
                $('.alertProducts').addClass('alert-warning');
                $('.alertProducts').html(data.message);
                $('.alertProducts').removeClass('hide');
            }
            table.ajax.reload();
            console.log(data);
        }, 'json');
    });


    $(document).on('click', '.ajaxDeleteCategory', function () {
        var that = $(this);
        var data = $('#deleteCategory').serialize();
        post('/admin/deleteCategory', data, function (data) {
            $('.alertSaveNewAddress').addClass('hide');
            $('.alertSaveNewAddress').removeClass('alert-warning');
            $('.alertSaveNewAddress').removeClass('alert-success');
            if (data.success) {
                $('.alertSaveNewAddress').addClass('alert-success');
                $('.alertSaveNewAddress').html(data.message);
                $('.alertSaveNewAddress').removeClass('hide');
                table.ajax.reload();
            } else {
                $('.alertSaveNewAddress').addClass('alert-warning');
                $('.alertSaveNewAddress').html(data.message);
                $('.alertSaveNewAddress').removeClass('hide');
            }
            setTimeout(function () {
                $('.alert').addClass('hide');
                $('.alert').removeClass('alert-warning');
                $('.alert').removeClass('alert-success');
            }, 50000);
            table.ajax.reload();
            console.log(data);
        }, 'json');
    });

    //datatable
    $('.datatable').dataTable({
        "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-12'i><'col-md-12 center-block'p>>",
        "sPaginationType": "bootstrap",
        "oLanguage": {
            "sLengthMenu": "_MENU_ records per page"
        }
    });
    $('.btn-close').click(function (e) {
        e.preventDefault();
        $(this).parent().parent().parent().fadeOut();
    });
    $('.btn-minimize').click(function (e) {
        e.preventDefault();
        var $target = $(this).parent().parent().next('.box-content');
        if ($target.is(':visible')) $('i', $(this)).removeClass('glyphicon-chevron-up').addClass('glyphicon-chevron-down');
        else                       $('i', $(this)).removeClass('glyphicon-chevron-down').addClass('glyphicon-chevron-up');
        $target.slideToggle();
    });
    $('.btn-setting').click(function (e) {
        e.preventDefault();
        $('#myModal').modal('show');
    });


    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        defaultDate: '2014-06-12',
        events: [
            {
                title: 'All Day Event',
                start: '2014-06-01'
            },
            {
                title: 'Long Event',
                start: '2014-06-07',
                end: '2014-06-10'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2014-06-09T16:00:00'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2014-06-16T16:00:00'
            },
            {
                title: 'Meeting',
                start: '2014-06-12T10:30:00',
                end: '2014-06-12T12:30:00'
            },
            {
                title: 'Lunch',
                start: '2014-06-12T12:00:00'
            },
            {
                title: 'Birthday Party',
                start: '2014-06-13T07:00:00'
            },
            {
                title: 'Click for Google',
                url: 'http://google.com/',
                start: '2014-06-28'
            }
        ]
    });


    /* $('.phone').phonecode({
     preferCo: 'ru'
     });*/
}


//additional functions for data table
$.fn.dataTableExt.oApi.fnPagingInfo = function (oSettings) {
    return {
        "iStart": oSettings._iDisplayStart,
        "iEnd": oSettings.fnDisplayEnd(),
        "iLength": oSettings._iDisplayLength,
        "iTotal": oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
    };
}
$.extend($.fn.dataTableExt.oPagination, {
    "bootstrap": {
        "fnInit": function (oSettings, nPaging, fnDraw) {
            var oLang = oSettings.oLanguage.oPaginate;
            var fnClickHandler = function (e) {
                e.preventDefault();
                if (oSettings.oApi._fnPageChange(oSettings, e.data.action)) {
                    fnDraw(oSettings);
                }
            };

            $(nPaging).addClass('pagination').append(
                '<ul class="pagination">' +
                '<li class="prev disabled"><a href="#">&larr; ' + oLang.sPrevious + '</a></li>' +
                '<li class="next disabled"><a href="#">' + oLang.sNext + ' &rarr; </a></li>' +
                '</ul>'
            );
            var els = $('a', nPaging);
            $(els[0]).bind('click.DT', {action: "previous"}, fnClickHandler);
            $(els[1]).bind('click.DT', {action: "next"}, fnClickHandler);
        },

        "fnUpdate": function (oSettings, fnDraw) {
            var iListLength = 5;
            var oPaging = oSettings.oInstance.fnPagingInfo();
            var an = oSettings.aanFeatures.p;
            var i, j, sClass, iStart, iEnd, iHalf = Math.floor(iListLength / 2);

            if (oPaging.iTotalPages < iListLength) {
                iStart = 1;
                iEnd = oPaging.iTotalPages;
            }
            else if (oPaging.iPage <= iHalf) {
                iStart = 1;
                iEnd = iListLength;
            } else if (oPaging.iPage >= (oPaging.iTotalPages - iHalf)) {
                iStart = oPaging.iTotalPages - iListLength + 1;
                iEnd = oPaging.iTotalPages;
            } else {
                iStart = oPaging.iPage - iHalf + 1;
                iEnd = iStart + iListLength - 1;
            }

            for (i = 0, iLen = an.length; i < iLen; i++) {
                // remove the middle elements
                $('li:gt(0)', an[i]).filter(':not(:last)').remove();

                // add the new list items and their event handlers
                for (j = iStart; j <= iEnd; j++) {
                    sClass = (j == oPaging.iPage + 1) ? 'class="active"' : '';
                    $('<li ' + sClass + '><a href="#">' + j + '</a></li>')
                        .insertBefore($('li:last', an[i])[0])
                        .bind('click', function (e) {
                            e.preventDefault();
                            oSettings._iDisplayStart = (parseInt($('a', this).text(), 10) - 1) * oPaging.iLength;
                            fnDraw(oSettings);
                        });
                }

                // add / remove disabled classes from the static elements
                if (oPaging.iPage === 0) {
                    $('li:first', an[i]).addClass('disabled');
                } else {
                    $('li:first', an[i]).removeClass('disabled');
                }

                if (oPaging.iPage === oPaging.iTotalPages - 1 || oPaging.iTotalPages === 0) {
                    $('li:last', an[i]).addClass('disabled');
                } else {
                    $('li:last', an[i]).removeClass('disabled');
                }
            }
        }
    }
});
