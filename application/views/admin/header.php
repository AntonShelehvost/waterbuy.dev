<?php $this->load->view('/admin/config'); ?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Waterbuy - Админ панель</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Сервис заказа и доставки питьевой воды. Лучшая вода для дома и офиса. Золотой родник. Вкусно. Полезно. Выгодно.">
    <meta name="author" content="Антон Шелехвост(anton.shelehvost@gmail.com)">

    <!-- The styles -->
    <link id="bs-css" href="/assets/css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href="/assets/css/charisma-app.css" rel="stylesheet">
    <link href='/assets/bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='/assets/bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='/assets/bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='/assets/bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='/assets/bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='/assets/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='/assets/css/jquery.noty.css' rel='stylesheet'>
    <link href='/assets/css/noty_theme_default.css' rel='stylesheet'>
    <link href='/assets/css/elfinder.min.css' rel='stylesheet'>
    <link href='/assets/css/elfinder.theme.css' rel='stylesheet'>
    <link href='/assets/css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='/assets/css/uploadify.css' rel='stylesheet'>
    <link href='/assets/css/animate.min.css' rel='stylesheet'>
    <link href='/assets/bower_components/chosen/bootstrap-chosen.css' rel='stylesheet'>
    <link rel="stylesheet" href="/assets/css/phonecode.css">
    <link href='/assets/css/my-style.css' rel='stylesheet'>
    <!-- jQuery -->
    <script src="/assets/bower_components/jquery/jquery.min.js"></script>
    <!-- data table plugin -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
    <!--	<link rel="stylesheet" type="text/css" href="/assets/css/buttons.dataTables.min.css">-->
    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--	[if lt IE 9]-->
    <!--	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>-->
    <!--	[endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="/assets/img/favicon.ico">

</head>

</head>

<body>
<?php if (!isset($no_visible_elements1) || !$no_visible_elements1) { ?>
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"> <img alt="Waterbuy Logo" src="/assets/img/logo.png"
                                                   class="hidden-xs"/>
                <span>waterbuy</span></a>

            <?php if (($this->session->userdata('emp_employees_groups_id') > 0)) : ?>
                <!-- user dropdown starts -->
                <div class="btn-group pull-right">
                    <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="glyphicon glyphicon-user"></i><span
                            class="hidden-sm hidden-xs"> <?= $this->session->userdata('email') ?></span>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="/admin/profile">Профиль</a></li>
                        <?php if (($this->session->userdata('emp_employees_groups_id') == 4) || ($this->session->userdata('emp_employees_groups_id') == 5)) : ?>
                            <li><a href="/admin/add_clients">Добавить клиента</a></li>
                            <li><a href="/admin/add_providers">Добавить поставщика</a></li>
                            <?php if ($this->session->userdata('emp_employees_groups_id') == 5): ?>
                                <li><a href="/admin/add_managers">Добавить менеджера</a></li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <li class="divider"></li>
                        <li><a href="/auth/logout">Выход</a></li>
                    </ul>
                </div>
                <!-- user dropdown ends -->
            <?php endif; ?>
            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada hidden">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Change Theme / Skin</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>
            <!-- theme selector ends -->

            <div class="btn-group pull-right theme-container animated tada hidden">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <!--                    <i class="glyphicon glyphicon-tint"></i>-->RU
                    <span class="hidden-sm hidden-xs"> Выберите язык</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a href="#"><i class="whitespace"></i> Українська</a></li>
                    <li><a href="#"><i class="whitespace"></i> Руский</a></li>
                    <li><a href="#"><i class="whitespace"></i> English</a></li>
                </ul>
            </div>



        </div>
    </div>
    <!-- topbar ends -->
<?php } ?>
<div class="ch-container">
    <div class="row">
        <?php if (isset($profile)) { ?>
            <?php echo $this->load->view('/admin/profile_menu', null, true); ?>
        <?php } elseif (!isset($no_visible_elements) || !$no_visible_elements) { ?>

            <?php if (($this->session->userdata('emp_employees_groups_id') != 5)) : ?>
                <?php $this->load->view('/admin/profile_menu.php'); ?>
            <?php endif; ?>
            <?php if (($this->session->userdata('emp_employees_groups_id') == 5)) : ?>
                <!--left menu starts -->
                <div class="col-sm-2 col-lg-2">
                    <div class="sidebar-nav">
                        <div class="nav-canvas">
                            <div class="nav-sm nav nav-stacked">

                            </div>

                            <ul class="nav nav-pills nav-stacked main-menu">
                                <?php if (($this->session->userdata('emp_employees_groups_id') == 3) || ($this->session->userdata('emp_employees_groups_id') == 5)) : ?>

                                <?php endif; ?>
                                <?php if (($this->session->userdata('emp_employees_groups_id') == 2) || ($this->session->userdata('emp_employees_groups_id') == 5)) : ?>
                                    <li class="nav-header hidden-md">Поставщикам</li>
                                    <li>
                                        <a class="ajax-link" href="/admin/add_products">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span> Добавить товар</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="ajax-link" href="/admin/products">
                                            <i class="glyphicon glyphicon-list-alt"></i>
                                            <span> Мои товары</span>
                                        </a>
                                    </li>
                                    <li class="nav-header hidden-md">Все заказы</li>
                                    <li>
                                        <a href="/admin/add_orders">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span> Новый заказ</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="ajax-link" href="/admin/orders">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                            <span> Текущие заказы</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="ajax-link" href="/admin/orders_done">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                            <span> Выполненные заказы</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="ajax-link" href="/admin/order_history">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                            <span> История заказов</span>
                                        </a>
                                    </li>


                                <?php endif; ?>
                                <?php if (($this->session->userdata('emp_employees_groups_id') == 4) || ($this->session->userdata('emp_employees_groups_id') == 5)) : ?>
                                    <li class="nav-header hidden-md">Менеджеру</li>
                                    <li>
                                        <a href="/admin/clients">
                                            <i class="glyphicon glyphicon-phone"></i>
                                            <span> Список клиентов</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/providers">
                                            <i class="glyphicon glyphicon-briefcase"></i>
                                            <span> Список поставщиков</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="ajax-link" href="/admin/providers_delivery">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                            <span> Регионы доставки</span>
                                        </a>
                                    </li>
                                    <!--<li>
                                        <a class="ajax-link" href="icon.html">
                                            <i class="glyphicon glyphicon-stats"></i>
                                            <span> Рейтинг клиентов</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="error.html">
                                            <i class="glyphicon glyphicon-stats"></i>
                                            <span> Рейтинг поставщиков</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="login.html">
                                            <i class="glyphicon glyphicon-stats"></i>
                                            <span> Рейтинг товаров</span>
                                        </a>
                                    </li>
                                    <li class="accordion">
                                        <a href="#"><i
                                                class="glyphicon  glyphicon-align-justify"></i><span> Заказы</span></a>
                                        <ul class="nav nav-pills nav-stacked">
                                            <li><a href="#">Новые заказы</a></li>
                                            <li><a href="#">История заказов</a></li>
                                        </ul>
                                    </li>-->
                                <?php endif; ?>
                                <?php if ($this->session->userdata('emp_employees_groups_id') == 5) : ?>
                                    <li class="nav-header hidden-md">Слежебная</li>

                                    <!--<li>
                                        <a href="/admin/managers">
                                            <i class="glyphicon glyphicon-user"></i>
                                            <span> Список менеджеров</span>
                                        </a>
                                    </li>-->
                                    <li>
                                        <a href="/admin/location">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span> Районы</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/admin/product_category">
                                            <i class="glyphicon glyphicon-phone"></i>
                                            <span> Категория товаров</span>
                                        </a>
                                    </li>

                                    <!--<li>
                                        <a class="ajax-link" href="icon.html">
                                            <i class="glyphicon glyphicon-stats"></i>
                                            <span> Рейтинг клиентов</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="error.html">
                                            <i class="glyphicon glyphicon-stats"></i>
                                            <span> Рейтинг поставщиков</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="login.html">
                                            <i class="glyphicon glyphicon-stats"></i>
                                            <span> Рейтинг товаров</span>
                                        </a>
                                    </li>
                                    <li class="accordion">
                                        <a href="#"><i
                                                class="glyphicon  glyphicon-align-justify"></i><span> Заказы</span></a>
                                        <ul class="nav nav-pills nav-stacked">
                                            <li><a href="#">Новые заказы</a></li>
                                            <li><a href="#">История заказов</a></li>
                                        </ul>
                                    </li>-->
                                <?php endif; ?>
                                <?php if ($this->session->userdata('emp_employees_groups_id') == 5) : ?>
                                    <li class="nav-header hidden-md">Общая</li>
                                    <li>
                                        <a class="ajax-link" href="#">
                                            <i class="glyphicon glyphicon-home"></i>
                                            <span> Моя страница</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="ajax-link" href="#">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span> Оформить заказ</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="ajax-link" href="#">
                                            <i class="glyphicon glyphicon-eye-open"></i>
                                            <span> История заказов</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--/span-->
                <!-- left menu ends -->
            <?php endif; ?>
        <?php } ?>
        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->

