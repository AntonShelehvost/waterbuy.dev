<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>waterbuy.net-заказ воды</title>
    <meta name="description" content="" />
    <meta name="author" content="templatemo">
	  <!-- The fav icon -->
	  <link rel="shortcut icon" href="/assets/img/favicon.ico">
    <link rel="apple-touch-icon" sizes="72x72" href="/assets/bower_components/main-page/apple-touch-icon-72x72.png">
    <!-- Bootstrap -->
    <link href="/assets/bower_components/main-page/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template  -->
    <link href="/assets/bower_components/main-page/css/templatemo_style.css" rel="stylesheet">
      <link href='/assets/bower_components/chosen/chosen.min.css' rel='stylesheet'>
      <!--      <link href='/assets/bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>-->
      <link href='/assets/bower_components/chosen/bootstrap-chosen.css' rel='stylesheet'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>


    <![endif]-->

      <script src="/assets/bower_components/jquery/jquery.min.js"></script>
      <script src="/assets/js/mainPage.js?<?=filemtime( './assets/js/mainPage.js' )?>"></script>
  </head>
<body>
    <div class="col-xs-12 visible-sm visible-xs" id="templatemo_mobile_menu_wap">
        <p id="mobile_menu_btn"> <a href="#"><span class="glyphicon glyphicon-align-justify"></span></a> </p>
        <div id="mobile_menu">
            <ul class="nav nav-pills nav-stacked">
                <li><a href="#templatemo_banner_top">Главная</a></li>
                <li><a href="#templatemo_upcomming_event">Типы воды</a></li>
                <li><a href="#templatemo_pricing">Цена</a></li>
                <li><a href="#templatemo_blog">Отзывы</a></li>
                <li><a href="#templatemo_order" class="external-link" target="_parent">Заказ</a></li>
                <li><a href="#templatemo_contact">Контакты</a></li>
            </ul>
        </div>
    </div>



    <!-- Модальное окно -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"><span class="blue"> Регистрация пользователя</span></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" form_url="/auth/ajax_registration">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 hidden-xs">&ensp;</div>
                                <div class="col-md-8 col-xs-12 text-center">
                                    <div class="col-md-12 alert alert-warning hide" role="alert"></div>
                                    <label for="inputEmail">Адрес email:</label>
                                    <input type="email" name="login" class="form-control" id="inputEmail" placeholder="Введите email">
                                </div>
                                <div class="col-md-2 hidden-xs">&ensp;</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 hidden-xs">&ensp;</div>
                                <div class="col-md-8 col-xs-12 text-center">
                                    <label class="radio-inline">
                                        <input type="radio" name="employees_groups" checked id="inlineRadio1" value="3"> Клиент
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="employees_groups" id="inlineRadio1" value="2"> Поставщик
                                    </label>
                                </div>
                                <div class="col-md-2 hidden-xs">&ensp;</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> Отмена</button>
                    <button type="button" class="btn btn-primary ajaxRegistrForm"> Регистрация</button>
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModal2Label"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel"><span class="blue"> Востановление пароля</span></h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="ResetForm" form_url="/auth/ajax_reset">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 hidden-xs">&ensp;</div>
                                <div class="col-md-8 col-xs-12 text-center">
                                    <div class="col-md-12 alert alert-warning hide" id="alertReset" role="alert"></div>
                                    <label for="inputEmail">Адрес email:</label>
                                    <input type="email" name="login" class="form-control" id="inputEmail"
                                           placeholder="Введите email почты на которую вы зарегистрированы">
                                </div>
                                <div class="col-md-2 hidden-xs">&ensp;</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2 hidden-xs">&ensp;</div>
                                <div class="col-md-8 col-xs-12 text-center">
                                    <label class="radio-inline">
                                        <input type="radio" name="employees_groups" checked id="inlineRadio1" value="3">
                                        Клиент
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="employees_groups" id="inlineRadio1" value="2">
                                        Поставщик
                                    </label>
                                </div>
                                <div class="col-md-2 hidden-xs">&ensp;</div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" class="btn btn-default" data-dismiss="modal"> Отмена</button>
                    <button type="button" class="btn btn-primary ajaxResetForm"> Отправить</button>
                </div>

            </div>
        </div>
    </div>

    <div id="templatemo_banner_top" class="container_wapper">
        <div class="container">
            <div class="row">
                <div class="col-md-4 hidden-xs hidden-sm">
                    <p><a href="www.waterbuy.net"> Менеджер</a> <a href="tel:380675103223">| <span class="glyphicon glyphicon-earphone"></span> 067-510-3223</a></p>
                </div>
                <div class="col-md-8 col-xs-12">
                    <div class="col-xs-6 col-md-6 text-center">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Вход <span class="glyphicon glyphicon-user"></span> <span class="caret"></span> </a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row bg-white">
                                    <div class="col-md-12">
                                        Войти через
                                        <div class="social-buttons">
                                            <a href="#" class="btn btn-tw"><i class="fa fa-twitter"></i> VK</a>
                                            <a href="#" class="btn btn-fb"><i class="fa fa-facebook"></i> Facebook</a>
                                        </div>
                                        или
                                        <form class="form" form_url="/auth/login_ajax" role="form" method="post" action="login" accept-charset="UTF-8" id="login-nav">
                                            <div class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio" name="employees_groups" id="inlineRadio1" checked value="3"> Клиент
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="employees_groups" id="inlineRadio1" value="2"> Поставщик
                                                </label>
                                            </div>

                                            <div class="col-md-12 alert alert-warning hide" role="alert"></div>
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputEmail2">Email адрес</label>
                                                <input type="email" name="login" class="form-control" id="exampleInputEmail2" placeholder="Email адрес" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputPassword2">Пароль</label>
                                                <input type="password"  name="password" class="form-control" id="exampleInputPassword2" placeholder="Пароль" required>
                                                <div class="help-block text-right"><a data-toggle="modal"
                                                                                      data-target="#myModal2"><span
                                                            class="blue"> Забыли пароль?</span></a></div>
                                            </div>
                                            <div class="form-group">
                                                <button type="button" data-loading-text="Проверка..."  class="btn btn-primary btn-block ajaxSubmitForm">Вход</button>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> Оставаться в системе
                                                </label>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="bottom text-center">
                                        Нет аккаунта? <a  data-toggle="modal" data-target="#myModal"> <span class="blue"> Регистрация</span></a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    </div>


                <div class="col-md-6 col-xs-6">
                    <p class="right"> <a  data-toggle="modal" data-target="#myModal"> Регистрация</a></p>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div id="templatemo_banner_logo" class="container_wapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-8 col-md-offset-4">
                    <img src="/assets/bower_components/main-page/images/100.png" alt="logo" class="min-height-120px"/>
                    <h1><a href="http://waterbuy.net">waterbuy</a></h1>
                    <br/>
                    <br/>
                    <br/>
                    <span>экспресс доставка воды</span>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="col-md-12">
        <div class="col-md-3">
            <img src="/assets/bower_components/main-page/images/taxi.jpg " class="img-responsive">
        </div>

        <div class="col-md-3">
            <img src="/assets/bower_components/main-page/images/taxi.jpg " class="img-responsive">
        </div>
    </div>-->

    <div class="banner" id="templatemo_banner_slide">

        <!-- <div id="block-1" class="fixed-btn hidden-sm hidden-xs hidden-md"><!--Кнопки на больших экранах-->
        <!-- <div class="container">
             <div class="row">
                 <div class="col-md-12">
                     <form>
                         <button type="button" class="btn btn-warning text-shadow-11"><span class="glyphicon glyphicon-shopping-cart"></span> Заказать сейчас</button>
                         <button type="button" class="btn btn-danger text-shadow-11"><span class="glyphicon glyphicon-share-alt"></span> Перейти в каталог</button>
                     </form>
                 </div>
             </div>
         </div>
     </div>
     <div id="block-1" class="fixed-btn hidden-sm hidden-xs hidden-lg visible-md fixed-btn-md"><!--Кнопки на средних экранах-->
        <!--  <div class="container">
              <div class="row">
                  <div class="col-sm-12">
                      <form>
                          <button type="button" class="btn btn-warning text-shadow-11"><span class="glyphicon glyphicon-shopping-cart"></span> Заказать сейчас</button>
                          <button type="button" class="btn btn-danger text-shadow-11"><span class="glyphicon glyphicon-share-alt"></span> Перейти в каталог</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>-->
        <ul>
            <li class="templatemo_banner_slide_01">
                <!-- <div class="slide_caption">
                    <h1>Заказ воды</h1>
                    <p>На этом сайте Вы можете заказать воду для дома, работы в удобном для вас формате и в удобное время.</p>
                </div>-->
            </li>
            <li class="templatemo_banner_slide_02">
                <!--<div class="slide_caption">
                   <h1>35 тонн воды за жизнь</h1>
                   <p>Без воды человек может прожить очень не долго. Потребность в воде стоит на втором месте после кислорода. Без еды человек может прожить около шести недель, а без воды – пять-семь суток. За всю свою жизнь человек выпивает примерно 35 т воды.</p>
               </div>-->
            </li>
            <li class="templatemo_banner_slide_03">
                <!--<div class="slide_caption">
                    <h1>Самая чистая вода в Финляндии</h1>
                    <p>По данным ЮНЕСКО, самая чистая вода находится в Финляндии. Всего в исследовании свежей природной воды принимало участие 122 страны. При этом 1 млрд людей по всему миру вообще не имеет доступа к безопасной воде.</p>
                </div>-->
            </li>
        </ul>

    </div>
    <!--<div id="block-1" class="fixed-btn visible-sm visible-xs"><!--Кнопки на маленьких экранах-->
    <!-- <div class="container">
         <div class="row">
             <div class="col-sm-12">
                 <form>
                     <div class="col-xs-12">
                    <button type="button" class="btn btn-warning text-shadow-11"><span class="glyphicon glyphicon-shopping-cart"></span> Заказать сейчас</button>
                     </div>
                     <div class="col-xs-12">
                    <button type="button" class="btn btn-danger margin-top-10 text-shadow-11"><span class="glyphicon glyphicon-share-alt"></span> Перейти в каталог</button>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>-->
    <div id="templatemo_main_menu" class="container_wapper hidden-sm hidden-xs">
        <div class="container">
                   <div class="row">
                       <div class="col-xs-12">
                           <ul class="nav nav-justified">
                               <li><a href="#templatemo_banner_top">Главная</a></li>
                               <li><a href="#templatemo_upcomming_event">Типы воды</a></li>
                               <li><a href="#templatemo_pricing">Цена</a></li>
                               <li><a href="#templatemo_blog">Отзывы</a></li>
                               <li><a href="#templatemo_order" class="external-link" target="_parent">
                                       Заказ</a></li>
                               <li><a href="#templatemo_contact">Контакты</a></li>
                           </ul>
                       </div>
                   </div>
        </div>
    </div>
    <div id="templatemo_upcomming_event" class="container_wapper">
        <div class="container">
            <div class="row">
                       <div class="col-xs-12 section_header">
                           <h1>Типы воды</h1>
                       </div>
                <div class="col-md-6 col-md-offset-3 col-md-offset-3">
                    <p>Вода одно из самых распространенных веществ в природе. Она является базовым элементом
                        жизнеобеспечения на нашей планете. </p>
                </div>
                       <div class="clearfix"></div>
                <div class="col-sm-12 col-md-3">
                    <div class="event_box event_animate_left">
                        <img src="/assets/bower_components/main-page/images/voda-1.jpg" alt="Артезианская вода"
                             class="img-responsive img-thumbnail"/>

                        <h2 class="text-center padding-10"><span class="blue"> Артезианская<br> вода </span></h2>
                        <p class="voda">На химический состав грунтовых обычных вод влияют условия формирования, кроме
                            того, руда, приближенная к воде, вносит изменения в состав.
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"> <span class="blue"> еще...</span></a>
                        </p>
                        <div class="panel-group" id="accordion">
                            <!-- 1 панель -->
                            <div class="panel panel-default my-panel">
                                <div id="collapseOne" class="panel-collapse collapse">
                                    <div class="panel-body padding-0">
                                        <p class="voda">
                                            Например, воды насыщаются соединениями железа, когда вблизи железной руды
                                            протекают. Также в составе появляются вредные и достаточно опасные
                                            соединения. Это значит, что без предварительной очистки воду такую
                                            использовать нельзя, ее следует обязательно очищать от всех примесей и
                                            опасных веществ.Артезианский вид насыщен необходимым кальцием, полезным
                                            магнием, а также железом и фтором. Отличаются такие воды уникальным
                                            сбалансированным составом и исключительными вкусовыми качествами. Полезный
                                            состав воды и такой необходимый показатель, как мягкость, не имеют ничего
                                            общего. После кипячения также может появляться осадок, аналогичный тому, что
                                            появляется от жесткой обычной воды.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="event_box event_animate_left">
                        <img src="/assets/bower_components/main-page/images/voda-miner.jpg" alt="Минеральные воды"
                             class="img-responsive img-thumbnail"/>
                        <h2 class="text-center padding-10"><span class="blue"> Минеральные<br> воды</span></h2>
                        <p class="voda">Разлив минвод в герметически закрытую посуду после предварительного газирования
                            углекислым газом позволяет сохранить их солевой состав и лечебные свойства.
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"> <span class="blue"> еще...</span></a>
                        </p>
                        <div class="panel-group" id="accordion">
                            <!-- 1 панель -->
                            <div class="panel panel-default my-panel">
                                <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body padding-0">
                                        <p class="voda">
                                            Это даёт возможность применять лечебно-питьевые воды и во внекурортной
                                            обстановке.
                                            а многих курортах для бутылочного разлива используется, как правило,
                                            небольшое количество источников. Но в торговую сеть поступают минеральные
                                            воды большого числа производителей. При выборе следует учитывать
                                            рекомендации на этикетке: «Применяется при заболеваниях желудка, кишечника,
                                            печени, желчевыводящих путей», или ещё короче: «Применяется при болезнях
                                            органов пищеварения». Ни то, ни другое не даёт возможности ориентироваться в
                                            выборе воды даже врачу. Чтобы подобрать нужную при данном заболевании
                                            лечебно-питьевую воду, необходимо знать, к какому типу она относится. А
                                            знание её аналогов поможет в случае отсутствия назначенной воды выбрать
                                            равноценную замену.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="event_box event_animate_right">
                        <img src="/assets/bower_components/main-page/images/voda-ochischena.jpg" alt="Очищенная вода"
                             class="img-responsive img-thumbnail"/>
                        <h2 class="text-center padding-10"><span class="blue"> Очищенная <br> вода</span></h2>
                        <p class="voda">Вода очищенная может быть получена из питьевой воды методами дистилляции
                            (дистиллированная вода), ионного обмена, обратного осмоса или электродиализа.
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> <span
                                    class="blue"> еще...</span></a></p>
                        <div class="panel-group" id="accordion">
                            <!-- 1 панель -->
                            <div class="panel panel-default my-panel">
                                <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body padding-0">
                                        <p class="voda">
                                            <strong>Предпочтительными и наиболее экономичными методами получения воды
                                                очищенной эксперты считают ионный обмен или обратный осмос.
                                                Вода очищенная должна приготовляться в специальном помещении, в котором
                                                запрещены другие виды работ. В помещении должны быть созданы
                                                асептические условия («чистое помещение»). Воздух помещения периодически
                                                стерилизуют бактерицидными ультрафиолетовыми лампами.
                                                Зачастую для получения воды очищенной природная или водопроводная вода
                                                должна пройти одну или несколько стадий предварительной водоподготовки.
                                                Это связано с нестабильностью качества водопроводной или другой исходной
                                                воды (колодезной, артезианской, речной).</strong></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3">
                    <div class="event_box event_animate_right">
                        <img src="/assets/bower_components/main-page/images/voda-rod.jpg" alt="Родниковая вода"
                             class="img-responsive img-thumbnail"/>
                        <h2 class="text-center padding-10"><span class="blue"> Родниковая <br> вода</span></h2>
                        <p class="voda">Пробиваясь на поверхность, родниковая вода проходит через слои гравия и песка,
                            что обеспечивает ей естественную природную фильтрацию.
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"> <span class="blue"> еще...</span></a>
                        </p>
                        <div class="panel-group" id="accordion">
                            <!-- 1 панель -->
                            <div class="panel panel-default my-panel">
                                <div id="collapseFour" class="panel-collapse collapse">
                                    <div class="panel-body padding-0">
                                        <p class="voda">
                                            То есть, фильтрация происходит на очень грубом уровне, вода очищается лишь
                                            от крупных механических примесей. Солевой и бактериальный состав воды
                                            остаётся тем же, что и был, когда вода вошла под землю.
                                            Одновременно с грубой механической фильтрацией происходит частичное
                                            растворение породы, через которую идёт вода. Соответственно, вода насыщается
                                            теми или иными микро- и макроэлементами. Поскольку каждая подземная вода
                                            проходит через свои слои камней, скал, песка и глины, то её насыщают
                                            различные вещества. </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- <div id="templatemo_blog" class="container_wapper">
         <div class="container">
             <div class="row">
                 <div class="col-xs-12 section_header">
                     <h1>Заказать <br> сейчас!</h1>
                 </div>
                 <div class="clearfix"></div>
                 <div class="col-sm-4 event_animate_left">
                     <img src="/assets/bower_components/main-page//images/step-1.png" alt="Blog Post 1" class="img-responsive img-rounded" />
                 </div>
                 <div class="col-sm-8 blog_text event_animate_right">
                     <h1 class="blue"><span class="glyphicon glyphicon-phone"></span> Шаг 1 из 3: Контактные данные</h1>
                     <div class="panel panel-default">
                         <div class="panel-body">
                             <form class="form-horizontal">
                                 <div class="form-group">
                                     <div class="col-xs-12 col-md-4">
                                         <label for="fatherName">Фамилия:*</label>
                                         <input type="text" class="form-control" id="fatherName" placeholder="Введите фамилию">
                                         <p class="help-block">Введите Вашу фамилию.</p>
                                     </div>

                                     <div class="col-xs-12 col-md-4">
                                         <label for="firstName">Имя:*</label>
                                         <input type="text" class="form-control" id="firstName" placeholder="Введите имя">
                                         <p class="help-block">Введите Ваше имя.</p>
                                     </div>

                                     <div class="col-xs-12 col-md-4">
                                         <label for="fatherName">Отчество:</label>
                                         <input type="text" class="form-control" id="fatherName" placeholder="Введите фамилию">
                                         <p class="help-block">Введите Ваше отчество.</p>
                                     </div>

                                 </div>
                                 <div class="form-group">
                                     <div class="col-xs-12 col-md-4"><!-- Обязательно для заполнения -->
    <!--<label for="phoneNumber">Телефон:*</label>
    <input type="tel"  name="tel" class="form-control" id="phoneNumber"
           placeholder="+38 (067)-510-32-23"  pattern="+38[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}">
    <p class="help-block">Введите Ваш телефон.</p>
</div>
<div class="col-xs-12 col-md-4"><!-- Обязательно для заполнения -->
    <!-- <label for="email">Email:*</label>
     <input type="email"  name="" class="form-control" id=""
            placeholder="Введите email">
     <p class="help-block">Введите Ваш email.</p>
 </div>
 <div class="col-xs-12 col-md-4">
     <a href="#step-2" class="btn btn-primary dalee"> Далее <span class="glyphicon glyphicon-arrow-right"></span></a>
 </div>
</div>
</div>
</form>
</div>
</div>
<div class="clearfix"></div>
<div class="col-sm-4 event_animate_left">
<img src="/assets/bower_components/main-page//images/step-2.png" alt="Blog Post 1" class="img-responsive img-rounded" />
</div>
<div class="col-sm-8 blog_text event_animate_right">
<h1 class="blue"><span class="glyphicon glyphicon-map-marker"></span> Шаг 2 из 3: Адрес доставки</h1>
<div class="panel panel-default">
<div class="panel-body">
<form class="form-horizontal">
<div class="form-group">
 <div class="col-xs-12 col-md-4">
     <label for="postalAddress">Страна:</label>
     <div class="controls">
         <select data-placeholder="Введите название страны" class="col-xs-12 col-md-12" id="selectError2" data-rel="chosen">
             <option value=""></option>
         </select>
     </div>
 </div>
 <div class="col-xs-12 col-md-4">
     <label for="postalAddress">Область</label>
     <div class="controls">
         <select data-placeholder="Введите название области" class="col-xs-12 col-md-12" id="selectError2" data-rel="chosen">
             <option value=""></option>
         </select>
     </div>
 </div>

 <div class="col-xs-12 col-md-4">
     <label for="postalAddress">Город:</label>
     <div class="controls">
         <select data-placeholder="Введите название города" class="col-xs-12 col-md-12" id="selectError2" data-rel="chosen">
             <option value=""></option>
         </select>
     </div>
 </div>
</div>
<div class="form-group">
 <div class="col-xs-12  col-md-4">
     <label for="postalAddress">Улица:</label>
     <input type="" class="form-control" id="" placeholder="Улица">
 </div>
 <div class="col-xs-12 col-md-4">
     <label for="postalAddress">Номер дома:</label>
     <input type="" class="form-control" id="" placeholder="Номер дома">
 </div>
 <div class="col-xs-12 col-md-4">
     <label for="postalAddress">Кв./Офис:</label>
     <input type="" class="form-control" id="" placeholder="Кв./Офис">
 </div>

</div>
<div class="form-group">
 <div class="col-xs-12 col-md-4">
     <label for="postalAddress">Домофон:</label>
     <input type="" class="form-control" id="" placeholder="Домофон">
 </div>
 <div class="col-xs-12 col-md-4">
     <div class="control-group">
         <label for="">Район:</label><!--Поле обязательно для заполнения-->
    <!-- <div class="controls">
                                                <select data-placeholder="Введите название района" class="col-xs-12 col-md-12" id="selectError2" data-rel="chosen">
                                                    <option value=""></option>
                                                    <option>Dallas Cowboys</option>
                                                    <option>New York Giants</option>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="hidden" id="delivery_city" name="delivery_city">
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <a href="#step-2" class="btn btn-primary dalee"> Далее <span class="glyphicon glyphicon-arrow-right"></span></a>
                                    </div>

                                </div>

                        </div>


                    </div>
                    </form>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-4 event_animate_left">
                    <img src="/assets/bower_components/main-page//images/step-3.png" alt="Blog Post 1" class="img-responsive img-rounded" />
                </div>
                <div class="col-sm-8 blog_text event_animate_right">
                    <h1 class="blue"><span class="glyphicon glyphicon-calendar"></span> Шаг 3 из 3: Время доставки</h1>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-6">
                                        <label for="">Дата доставки:</label>
                                        <div class="input-group" id="">
                                            <input type="date" class="form-control"  value="<?= date('Y-m-d'); ?>"/>
                                        </div>
                                        <p class="help-block">Нажмите на поле для отображения календаря</p>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <label for="">Время доставки:</label>
                                        <div class="input-group" id="">
                                            <input type="time" class="form-control border-radius-3" />
                                        </div>
                                        <p class="help-block">Нажмите на поле для ввода времени</p>
                                    </div>
                                    <div class="col-xs-12 col-md-12">
                                        <a href="#step-2" class="btn btn-primary dalee"> Перейти к товарам <span class="glyphicon glyphicon-arrow-right"></span></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>-->


    <div id="templatemo_pricing" class="container_wapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 section_header">
                    <h1>Цены</h1>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-4 pricing_icon_wapper">
                    <p class="cycle_icon"><span><img src="/assets/bower_components/main-page/images/watermelon-1.png"
                                                     class="img-responsive"></span></p>
                    <div class="clearfix"></div>
                    <h1>Факт №1</h1>
                    <p> Один из самых водянистых продуктов – это арбуз. Арбуз на 93% состоит из воды.</p>
                </div>
                <div class="col-md-4 pricing_icon_wapper">
                    <p class="cycle_icon"><span><img src="/assets/bower_components/main-page/images/sckale.png"
                                                     class="img-responsive"></span></p>
                    <div class="clearfix"></div>
                    <h1>Пейте воду</h1>
                    <p> 2-ух процентное сокращение уровня воды в теле может привести к 20%-ому уменьшению в умственных и
                        физических показателях.</p>
                </div>
                <div class="col-md-4 pricing_icon_wapper">
                    <p class="cycle_icon"><span><img src="/assets/bower_components/main-page/images/planet.png"
                                                     class="img-responsive"></span></p>
                    <div class="clearfix"></div>
                    <h1>Берегите воду</h1>
                    <p> Примерно 70 процентов Земли покрыто водой. Но только 1 процент из этой воды годен для питья!</p>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-3">
                    <div class="price_table_box">
                        <h1>ОТ 25 ГРН</h1>
                        <ul>
                            <li>
                                <h4 class="text-center"> Артезианская<br> вода</h4>
                                <p class="min-height">Артезиа́нские во́ды (от Artesium, латинского названия французской
                                    провинции Артуа, где эти воды использовались с XII века) — напорные подземные воды,
                                    заключённые в водоносных пластах горных пород между водоупорными слоями.</p></li>
                        </ul>
                        <div><p><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Заказать</a></p>
                        </div>
                    </div>
                       </div>
                <div class="col-md-3">
                    <div class="price_table_box">
                        <h1>ОТ 25 ГРН</h1>
                        <ul>
                            <li>
                                <h4 class="text-center"> Минеральные<br> воды</h4>
                                <p class="min-height">Минеральные воды – это подземные воды с повышенным содержанием
                                    минеральных или органических компонентов. Они обладают специфическими
                                    физико-химическими свойствами, на этом основано их действие на организм человека и
                                    лечебное применение.</p></li>
                        </ul>
                        <div><p><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Заказать</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="price_table_box">
                        <h1>ОТ 20 ГРН</h1>
                        <ul>
                            <li>
                                <h4 class="text-center"> Очищенная <br> вода</h4>
                                <p class="min-height">Очищенная вода, это единственная вода которую нужно пить тем, кто
                                    заботится о собственном здоровье и здоровье своей семьи.</p></li>
                        </ul>
                        <div><p><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Заказать</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="price_table_box">
                        <h1>ОТ 25 ГРН</h1>
                        <ul>
                            <li>
                                <h4 class="text-center"> Родниковая <br> вода</h4>
                                <p class="min-height">Родники, как выходы грунтовых и подземных вод на поверхность,
                                    являются уникальными естественными водоёмами. Они имеют большое значение в питании и
                                    других поверхностных водоёмов, поддержании водного баланса и сохранении стабильности
                                    окружающих их биоценозов.</p></li>
                        </ul>
                        <div><p><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span> Заказать</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="templatemo_blog" class="container_wapper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 section_header">
                    <h1>Отзывы</h1>
                </div>
                <div class="clearfix"></div>
                <p class="text-center">К сожалению, здесь пока нет ни одного отзыва...</p>
                <!--<div class="col-sm-4 event_animate_left">
                    <img src="/assets/bower_components/main-page//images/templatemo_blog_01.jpg" alt="Blog Post 1" class="img-responsive" />
                </div>
                <div class="col-sm-8 blog_text event_animate_right">
                    <h1>Quis nostrud exercitation ullamco laboris</h1>
                    <p>
                        <span class="glyphicon glyphicon-user"></span> posted by <a href="#">Kelly</a>  &nbsp;&nbsp;
                        <span class="glyphicon glyphicon-calendar"></span> 5<sup>th</sup> September 2084 &nbsp;&nbsp;
                        <span class="glyphicon glyphicon-bookmark"></span> <a href="#">HTML5</a>, <a href="#">CSS3</a>, <a href="#">Responsive</a>
                    </p>
                    <p>Architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Lorem ipsum dolor Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm amet aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-4 event_animate_left">
                    <img src="/assets/bower_components/main-page//images/templatemo_blog_02.jpg" alt="Blog Post 2" class="img-responsive" />
                </div>
                <div class="col-sm-8 blog_text event_animate_right">
                    <h1>Eaque ipsa quae ab illo inventore veritatis</h1>
                    <p>
                        <span class="glyphicon glyphicon-user"></span> posted by <a href="#">George</a> &nbsp;&nbsp;
                        <span class="glyphicon glyphicon-calendar"></span> 12<sup>th</sup> July 2084 &nbsp;&nbsp;
                        <span class="glyphicon glyphicon-bookmark"></span> <a href="#">Web Design</a>, <a href="#">New Trend</a>
                    </p>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque lorem ipsum dolor Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusm amet architecto beatae vitae dicta sunt explicabo. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                </div>-->
             </div>
         </div>
     </div>
    <div id="templatemo_order" class="container_wapper">
        <div class="container">
            <div class="col-xs-12 section_header">
                <h1> Заказ</h1>
            </div>
            <div class="col-md-6 col-md-offset-3 col-md-offset-3">
                <p class="text-center"> Оставляйте заявку и наш менеджер обязательно свяжется с Вами!</p>
            </div>
            <div class="clearfix"></div>
            <div class="row bs-wizard" style="border-bottom:0;">

                <div class="col-xs-6 bs-wizard-step complete">

                    <div class="text-center bs-wizard-stepnum">Шаг 1</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#" class="bs-wizard-dot"></a>
                    <div class="bs-wizard-info text-center">Укажите Ваши контактные данные.</div>
                </div>

                <!-- <div class="col-xs-4 bs-wizard-step complete"><!-- complete -->
                <!--<div class="text-center bs-wizard-stepnum">Шаг 2</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="#" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Укажите, куда Вам  доставить товар.</div>
            </div>-->

                <div class="col-xs-6 bs-wizard-step active"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">Шаг 2</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#" class="bs-wizard-dot"></a>
                    <div class="bs-wizard-info text-center"> Введите время доставки и подтвердите
                        заказ!
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="col-xs-12 col-md-6">
                    <div class="panel panel-primary min-height-order">
                        <div class="panel-heading">
                            <p class="panel-title"><span class="glyphicon glyphicon-phone"></span> Шаг 1 из 2:
                                Контактные данные</p>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal">
                                <div class="form-horizontal">
                                    <div class="form-group">
                                        <div class="col-xs-12 col-md-6">
                                            <label for="fatherName">Фамилия:*</label>
                                            <input type="text" class="form-control" id="fatherName"
                                                   placeholder="Введите фамилию">
                                        </div>

                                        <div class="col-xs-12 col-md-6">
                                            <label for="firstName">Имя:*</label>
                                            <input type="text" class="form-control" id="firstName"
                                                   placeholder="Введите имя">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12 col-md-6"><!-- Обязательно для заполнения -->
                                            <label for="phoneNumber">Телефон:*</label>
                                            <input type="tel" name="tel" class="form-control" id="phoneNumber"
                                                   placeholder="+38 (067)-510-32-23"
                                                   pattern="+38[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}">
                                        </div>
                                        <div class="col-xs-12 col-md-6"><!-- Обязательно для заполнения -->
                                            <label for="email">Email:*</label>
                                            <input type="email" name="" class="form-control" id=""
                                                   placeholder="Введите email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-xs-12 col-md-6">
                                            <label for="postalAddress">Страна:</label>
                                            <div class="controls">
                                                <select data-placeholder="Введите название страны"
                                                        class="col-xs-12 col-md-12 country" id="selectError2"
                                                        data-rel="chosen">
                                                    <?php foreach ($country as $item) { ?>
                                                        <option
                                                            value="<?= $item->cou_id; ?>"><?= trim($item->cou_name); ?>
                                                            Украина
                                                        </option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-6">
                                            <label for="postalAddress">Область</label>
                                            <div class="controls">
                                                <select data-placeholder="Введите название области"
                                                        class="col-xs-12 col-md-12 region"
                                                        id="selectError2" data-rel="chosen">
                                                    <option value="">Днепропетровская</option>
                                                    <option value="">Днепропетровская</option>
                                                    <option value="">Днепропетровская</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-xs-12 col-md-12">
                                            <label for="postalAddress">Город:</label>
                                            <div class="controls">
                                                <select data-placeholder="Введите название города"
                                                        class="col-xs-12 col-md-12 city" id="selectError2"
                                                        data-rel="chosen">
                                                    <option value="">Днепр</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="panel panel-primary min-height-order" id="step-2">
                        <div class="panel-heading">
                            <p class="panel-title"><span class="glyphicon glyphicon-map-marker"></span> Шаг 2 из 2:
                                Адрес доставки</p>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-xs-12  col-md-6">
                                    <label for="postalAddress">Улица:</label>
                                    <input type="" class="form-control" id="" placeholder="Улица">
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <label for="postalAddress">Номер дома:</label>
                                    <input type="" class="form-control" id="" placeholder="Номер дома">
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <label for="postalAddress">Кв./Офис:</label>
                                    <input type="" class="form-control" id="" placeholder="Кв./Офис">
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <label for="postalAddress">Домофон:</label>
                                    <input type="" class="form-control" id="" placeholder="Домофон">
                                </div>
                                <div class="col-xs-12 col-md-6">
                                    <div class="control-group">
                                        <label for="">Район:</label><!--Поле обязательно для заполнения-->
                                        <div class="controls">
                                            <select data-placeholder="Введите название района"
                                                    class="col-xs-12 col-md-12 district"
                                                    id="selectError2" data-rel="chosen">
                                                <option value=""></option>
                                                <option>Dallas Cowboys</option>
                                                <option>New York Giants</option>
                                            </select>
                                        </div>
                                    </div>
                                    <input type="hidden" id="delivery_city" name="delivery_city">
                                </div>

                                <div class="col-xs-12 col-md-6">
                                    <label for="postalAddress">Заезд:</label>
                                    <input type="" class="form-control" id="" placeholder="Заезд">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-md-6"><span class="glyphicon glyphicon-calendar"></span>
                                    <label for="">Дата доставки:</label>
                                    <div class="input-group" id="">
                                        <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>"/>
                                    </div>
                                    <p class="help-block help-order">Нажмите на поле для отображения календаря</p>
                                </div>
                                <div class="col-xs-12 col-md-6"><span class="glyphicon glyphicon-time"></span>
                                    <label for="">Время доставки:</label>
                                    <div class="input-group" id="">
                                        <input type="time" class="form-control border-radius-3"/>
                                    </div>
                                    <p class="help-block help-order">Нажмите на поле для ввода времени</p>
                                </div>
                                <div class="col-xs-12 col-md-12">
                                    <a href="#step-2" class="btn btn-success orange-btn"><span
                                            class="glyphicon glyphicon-share-alt"></span> Перейтив каталог товаров </a>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <div id="templatemo_contact" class="container_wapper">
         <div class="container">
             <div class="row">
                 <div class="col-xs-12 section_header">
                     <h1>Обратная связь</h1>
                 </div>
                 <div class="col-md-6 col-md-offset-3 col-md-offset-3">
                     <p> Свяжитесь с нами, используя эту форму</p>
                 </div>
                 <!--<div id="templatemo_contact_map_wapper">
                     <div id="templatemo_contact_map"></div>
                 </div>-->
                <form action="#" method="post">
                    <div class="col-md-4">
                        <p> Ваше имя</p>
                        <input type="text" name="name" id="name" placeholder="Ваше имя" />
                    </div>
                    <div class="col-md-4">
                        <p>Ваш Email</p>
                        <input type="text" name="email" id="email" placeholder="Ваш Email" />
                    </div>
                    <div class="col-md-4">
                        <p>Тема письма</p>
                        <input type="text" name="subject" id="subject" placeholder="Тема письма" />
                    </div>
                    <div class="col-xs-12">
                        <p>Текст сообщения</p>
                        <textarea name="message" id="message" placeholder="Введите Ваше сообщение..." ></textarea>
                    </div>
                    <div class="col-md-4 col-xs-8">
                        <button> Отправить сообщение</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="templatemo_footer" class="container_wapper">
        <div class="container">
            <div class="row">
                <div class="col-md-1 hidden-sm">
                    &ensp;
                </div>
                <div class="col-md-3 col-sm-4">
                    <ul class="center-block">
                        <li><a href="#"> Главная</a></li>
                        <li><a href="#"> Типы воды</a></li>
                        <li><a href="#"> Цены</a></li>
                        <li><a href="#"> Отзывы</a></li>
                    </ul>
                </div><!--/.col-md-3-->

                <div class="col-md-1 hidden-sm">
                    &ensp;
                </div>
                <div class="col-md-3 col-sm-4">
                    <ul class="center-block">
                        <li><a href="#"> Обратная связь</a></li>
                        <li><a href="#"> Сотрудничество</a></li>
                        <li><a href="#"> Доставка воды</a></li>
                        <li><a href="#"> Оплата</a></li>
                    </ul>
                </div><!--/.col-md-3-->
                <div class="col-md-1 hidden-sm">
                    &ensp;
                </div>
                <div class="col-md-3 col-sm-4">
                    <ul>
                        <li><a href="#"> Условия пользования</a></li>
                        <li><a href="#"> Правовая база</a></li>
                    </ul>
                </div><!--/.col-md-3-->

                <div class="col-xs-12">
                    <p>Copyright © 2017 Waterbuy</p>
                </div>
            </div>
        </div>
    </div>
    <!-- select or dropdown enhancer -->
    <script src="/assets/bower_components/chosen/chosen.jquery.min.js"></script>
    <script src="/assets/bower_components/main-page/js/jquery.min.js"></script>
    <script src="/assets/bower_components/main-page/js/bootstrap.min.js"></script>
    <script src="/assets/bower_components/main-page/js/jquery.easing.1.3.js"></script>
    <script src="/assets/bower_components/main-page/js/jquery.mobile.customized.min.js"></script>
    <script src="/assets/bower_components/main-page/js/unslider.min.js"></script>
    <script src="/assets/bower_components/main-page/js/jquery.singlePageNav.min.js"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false"></script>-->
    <script src="/assets/bower_components/main-page/js/templatemo_script.js"></script>
    <!-- templatemo 404 reactive -->
  </body>
</html>