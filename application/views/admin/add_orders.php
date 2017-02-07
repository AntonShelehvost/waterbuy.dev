<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 23.12.2016
 * Time: 11:31
 */
?>

<div class="container-fluid">
            <div class="row bs-wizard" style="border-bottom:0;">

                <div class="col-xs-3 bs-wizard-step complete">

                    <div class="text-center bs-wizard-stepnum">Шаг 1</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#" class="bs-wizard-dot"></a>
                    <div class="bs-wizard-info text-center">Укажите Ваши контактные данные.</div>
                </div>

                <div class="col-xs-3 bs-wizard-step complete"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">Шаг 2</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#" class="bs-wizard-dot"></a>
                    <div class="bs-wizard-info text-center">Укажите куда и когда Вам удобней доставить товар.</div>
                </div>

                <div class="col-xs-3 bs-wizard-step active"><!-- complete -->
                    <div class="text-center bs-wizard-stepnum">Шаг 3</div>
                    <div class="progress">
                        <div class="progress-bar"></div>
                    </div>
                    <a href="#" class="bs-wizard-dot"></a>
                    <div class="bs-wizard-info text-center">Выбирите товар, доступный в вашем регионе и подтвердите
                        заказ!
                    </div>
                </div>

            </div>
        </div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <p class="panel-title"><span class="glyphicon glyphicon-phone"></span> Шаг 1 из 3: Контактные данные</p>
    </div>
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
                    <label for="phoneNumber">Телефон:*</label>
                    <input type="tel" name="tel" class="form-control" id="phoneNumber"
                           placeholder="+38 (067)-510-32-23" pattern="+38[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}">
                    <p class="help-block">Введите Ваш телефон.</p>
                </div>
                <div class="col-xs-12 col-md-4"><!-- Обязательно для заполнения -->
                    <label for="email">Email:*</label>
                    <input type="email" name="" class="form-control" id=""
                           placeholder="Введите email">
                    <p class="help-block">Введите Ваш email.</p>
                </div>
            </div>
    </div>
    <div class="panel-footer">
        <a href="#step-2" class="btn btn-primary"> Далее <span class="glyphicon glyphicon-arrow-right"></span></a>
    </div>
    </form>
</div>
<div class="panel panel-primary" id="step-2">
    <div class="panel-heading">
        <p class="panel-title"><span class="glyphicon glyphicon-home"></span> Шаг 2 из 3: Адрес доставки</p>
    </div>
    <div class="panel-body">
        <form class="form-horizontal">
            <div class="form-group">
                <div class="col-xs-12 col-md-3">
                    <label for="postalAddress">Страна:</label>
                    <div class="controls">
                        <select data-placeholder="Введите название страны" class="col-xs-12 col-md-12 country"
                                id="selectError2"
                                data-rel="chosen">
                            <?php foreach ($country as $item) { ?>
                                <option value="<?= $item->cou_id; ?>"><?= trim($item->cou_name); ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-md-3">
                    <label for="postalAddress">Область</label>
                    <div class="controls">
                        <select data-placeholder="Введите название области" class="col-xs-12 col-md-12 region"
                                id="selectError2" data-rel="chosen">
                            <option value=""></option>
                        </select>
                    </div>
                </div>

                <div class="col-xs-12 col-md-3">
                    <label for="postalAddress">Город:</label>
                    <div class="controls">
                        <select data-placeholder="Введите название города" class="col-xs-12 col-md-12 city"
                                id="selectError2"
                                data-rel="chosen">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12  col-md-3">
                    <label for="postalAddress">Улица:</label>
                    <input type="" class="form-control" id="" placeholder="Улица">
                </div>
            </div>
            <div class="form-group">

                <div class="col-xs-12 col-md-3">
                    <label for="postalAddress">Номер дома:</label>
                    <input type="" class="form-control" id="" placeholder="Номер дома">
                </div>
                <div class="col-xs-12 col-md-3">
                    <label for="postalAddress">Кв./Офис:</label>
                    <input type="" class="form-control" id="" placeholder="Кв./Офис">
                </div>
                <div class="col-xs-12 col-md-3">
                    <label for="postalAddress">Домофон:</label>
                    <input type="" class="form-control" id="" placeholder="Домофон">
                </div>
                <div class="col-xs-12 col-md-3">
                    <div class="control-group">
                        <label for="">Район:</label><!--Поле обязательно для заполнения-->
                        <div class="controls">
                            <select data-placeholder="Введите название района" class="col-xs-12 col-md-12 district"
                                    id="selectError2" data-rel="chosen">
                                <option value=""></option>
                                <option>Dallas Cowboys</option>
                                <option>New York Giants</option>
                            </select>
                        </div>
                    </div>
                    <input type="hidden" id="delivery_city" name="delivery_city">
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12 col-md-4">
                    <label for="postalAddress">Заезд:</label>
                    <input type="" class="form-control" id="" placeholder="Заезд">
                </div>
                <div class="col-xs-12 col-md-4">
                    <label for="">Дата доставки:</label>
                    <div class="input-group" id="">
                        <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>"/>
                    </div>
                    <p class="help-block">Нажмите на поле для отображения календаря</p>
                </div>
                <div class="col-xs-12 col-md-4">
                    <label for="">Время доставки:</label>
                    <div class="input-group" id="">
                        <input type="time" class="form-control border-radius-3" value="<?= date("H:i"); ?>"/>
                    </div>
                    <p class="help-block">Нажмите на поле для ввода времени</p>
                </div>
            </div>
    </div>
    <div class="panel-footer">
        <a href="#step-3" class="btn btn-primary"> Далее <span class="glyphicon glyphicon-arrow-right"></span></a>
    </div>
    </form>
</div>
<div class="panel panel-primary" id="step-3">
    <div class="panel-heading">
        <p class="panel-title"><span class="glyphicon glyphicon-shopping-cart"></span> Шаг 3 из 3: Корзина</p>
    </div>
    <div class="panel-body">
        <form class="form-horizontal">
            <table class="table table-striped table-bordered responsive dataTable ">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Наименование товара</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Итог</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>№</td>
                    <td class="center">Вода питьевая</td>
                    <td class="center">30</td>
                    <td class="center">2</td>
                    <td class="center">60</td>
                    <td class="center">
                        <a class="btn btn-info btn-sm" href="#myModal21" data-toggle="modal">
                            <i class="glyphicon glyphicon-edit icon-white"></i>
                            <span class="hidden-xs">Редактировать</span>
                        </a>
                        <a class="btn btn-danger btn-sm">
                            <i class="glyphicon glyphicon-trash icon-white"></i>
                            <span class="hidden-xs">Удалить</span>
                        </a></td>
                </tr>
                <tr class="bold">
                    <td colspan="4" class="center">Итог</td>
                    <td colspan="2" class="center">60
                    </td>
                </tr>


                </tbody>
            </table>
    </div>
    <div class="panel-footer">
        <a href="#" class="btn btn-success"><i class="glyphicon glyphicon-ok icon-white"></i> Оформить заказ</a>
        <a href="#" class="btn btn-default"><i class="glyphicon glyphicon-share-alt icon-white"></i> Вернуться в каталог</a>
    </div>
    </form>
</div>

<div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> Новый заказ</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <div class="box-content">
        <form class="form-horizontal">


            <div class="row">
                <div class="box col-md-12">
                    <div class="box-inner">
                        <div class="box-header well" data-original-title="">
                            <h2><i class="glyphicon glyphicon-cog"></i> Фильтр </h2>

                            <div class="box-icon">
                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <div class="form-group">
                                <div class="col-xs-12 col-md-3">
                                    <label for="postalAddress">Страна:</label>
                                    <div class="controls">
                                        <select data-placeholder="Введите название страны"
                                                class="col-xs-12 col-md-12 country"
                                                id="selectError2" data-rel="chosen">
                                            <?php foreach ($country as $item) { ?>
                                                <option
                                                    value="<?= $item->cou_id; ?>"><?= trim($item->cou_name); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <label for="postalAddress">Область</label>
                                    <div class="controls">
                                        <select data-placeholder="Введите название области"
                                                class="col-xs-12 col-md-12 region"
                                                id="selectError2" data-rel="chosen">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-3">
                                    <label for="postalAddress">Город:</label>
                                    <div class="controls">
                                        <select data-placeholder="Введите название города"
                                                class="col-xs-12 col-md-12 city"
                                                id="selectError2" data-rel="chosen">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <div class="control-group">
                                        <label for="">Район:</label><!--Поле обязательно для заполнения-->
                                        <div class="controls">
                                            <select data-placeholder="Введите название района"
                                                    class="col-xs-12 col-md-12 district" id="selectError2"
                                                    data-rel="chosen">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                        </div>
                                    <input type="hidden" id="delivery_city" name="delivery_city">
                                    </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12 col-md-8">
                                    <!-- Нужна именно форма поиска, так как на мобильниках должна появляться клавиатура ля ввода названия товара (в форме как у клиента select), на мобильнике розрешено выбирать только из списка, ручной ввод не поддерживается -->
                                    <label for="">Введите название товара:</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Я ищу...">
                                    <span class="input-group-btn">
													<button class="btn btn-info" type="button">
                                                        <i class="glyphicon glyphicon-search"></i>
                                                    </button>
												  </span>
                                </div>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <label for="">Нажмите, для очистки фильтра:</label>
                                    <a href="#" class="btn btn-info"><i class="glyphicon glyphicon-trash"></i>
                                        Очистить фильтры</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12 col-md-3">
                                    <label for="">Выбирите категорию товара:</label>
                                    <div class="controls">
                                        <select data-placeholder="Выбирите категорию товара"
                                                class="col-xs-12 col-md-12" id="selectError2" data-rel="chosen">
                                            <option value=""></option>
                                            <?php foreach ($category as $item) { ?>
                                                <option
                                                    value="<?= $item['id']; ?>"><?= ($item['level']) ? '&nbsp&nbsp&nbsp&nbsp' : '' ?><?= trim($item['name']); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-3">
                                    <label for=""> Минимальный заказ</label>
                                    <!-- Вытягиваем поле минимальный заказ по выбраному региону -->
                                    <div class="controls">
                                        <select data-placeholder="Выбирите минимальный заказ"
                                                class="col-xs-12 col-md-12 min_order" id="selectError2"
                                                data-rel="chosen">
                                            <option value=""></option>
                                            <option>1 бутыль</option>
                                            <option>2 бутля</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-3">
                                    <!-- Вытягиваем меры объема по выбраному региону -->
                                    <label for=""> Объем</label>
                                    <div class="controls">
                                        <select data-placeholder="Выбирите необходимый объем"
                                                class="col-xs-12 col-md-12" id="selectError2" data-rel="chosen">
                                            <option value=""></option>
                                            <option>1 л</option>
                                            <option>2 л</option>
                                        </select>
                                </div>
                            </div>
                                <div class="col-xs-12 col-md-3">
                                    <!-- Вытягиваем меры объема по выбраному региону -->
                                    <label for=""> Цена</label>
                                    <div class="controls">
                                        <select data-placeholder="Выбирите сортировку цены"
                                                class="col-xs-12 col-md-12" id="selectError2" data-rel="chosen">
                                            <option value=""></option>
                                            <option>по возрастанию цены</option>
                                            <option>по убыванию цены</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="box col-md-12">
                    <div class="box-inner">
                        <div class="box-header well" data-original-title="">
                            <h2><i class="glyphicon glyphicon-shopping-cart"></i> Список товаров</h2>
                            <div class="box-icon">
                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <div id="panel1" class="tab-pane fade in active">
                                <h3>Список товаров</h3>
                                <div class="form-group">
                                    <div class="col-xs-12 col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Вода негазована/ТМ Аляска <span
                                                        class="float-right-1"> <i
                                                            class="glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i></span></h3>
                                                <!-- Вытягиваем наименование товара/Торговая марка-->
                                            </div>
                                            <div class="panel-body">
                                                <div class="img-responsive col-xs-12 col-md-2">
                                                    <img src="/assets/img/myrgorod.png" alt="Event 2"
                                                         class="img-responsive center-block">
                                                </div>
                                                <div class="col-xs-12 col-md-10">
                                                    <div class="col-xs-12 col-md-2">
                                                        <h5>Цена <span class="badge">25 грн</span></h5>
                                                        <h5>Объем <span class="badge">5 л</span></h5>
                                                    </div>
                                                    <div class="col-xs-12 col-md-4">
                                                        <h5>Поставщик <span class="badge">ЧП Лысый</span></h5>
                                                        <h5>Рейтинг поставщика <i class="glyphicon glyphicon-star"></i>
                                                        </h5>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6">
                                                        <label for=""> Количество </label>
                                                        <div class="input-group  col-md-4">
                                                                 <span class="input-group-btn">
                                                                 <button id="minus" class="btn btn-primary"
                                                                         type="button">-
                                                                 </button>
                                                                 </span>
                                                            <input id="calc" type="text"
                                                                   class="form-control text-center" value="1">
                                                    <span class="input-group-btn">
                                                                 <button id="plus" class="btn btn-info"
                                                                         type="button">+
                                                                 </button>
                                                                 </span>
                                                        </div><!-- /input-group -->
                                                        <script>
                                                            $('#minus').click(function () {
                                                                $("#calc").val(parseInt($("#calc").val()) - 1);
                                                            });
                                                            $('#plus').click(function () {
                                                                $("#calc").val(parseInt($("#calc").val()) + 1);
                                                            });
                                                        </script>
                                                    </div>
                                                    <div class=" col-xs-12 col-md-10">
                                                        Аляска — кристально чистая вода, в которой благодаря
                                                        бережному очищению сохраняется идеальный баланс полезных
                                                        минералов.
                                                    </div>
                                                    <div class="col-xs-12 col-md-12">
                                                        <a href="#" class="btn btn-primary" data-toggle="modal"><i
                                                                class="glyphicon glyphicon-shopping-cart"></i>Добавить
                                                            в заказ</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-12">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">Вода негазована/ТМ Аляска <span
                                                        class="float-right-1"> <i
                                                            class="glyphicon glyphicon-star"></i><i
                                                            class="glyphicon glyphicon-star"></i></span></h3>
                                                <!--Рейтинг товаров-->
                                                <!-- Вытягиваем наименование товара/Торговая марка-->
                                            </div>
                                            <div class="panel-body">
                                                <div class="img-responsive col-xs-12 col-md-2">
                                                    <img src="/assets/img/myrgorod.png" alt="Event 2"
                                                         class="img-responsive center-block">
                                                </div>
                                                <div class="col-xs-12 col-md-10">
                                                    <div class="col-xs-12 col-md-2">
                                                        <h5>Цена <span class="badge">25 грн</span></h5>
                                                        <h5>Объем <span class="badge">5 л</span></h5>
                                                    </div>
                                                    <div class="col-xs-12 col-md-4">
                                                        <h5>Поставщик <span class="badge">ЧП Лысый</span></h5>
                                                        <h5>Рейтинг поставщика <i class="glyphicon glyphicon-star"></i>
                                                        </h5>
                                                    </div>
                                                    <div class="col-xs-12 col-md-6">
                                                        <label for=""> Количество </label>
                                                        <div class="input-group  col-md-4">
                                                                 <span class="input-group-btn">
                                                                 <button id="minus" class="btn btn-primary"
                                                                         type="button">-
                                                                 </button>
                                                                 </span>
                                                            <input id="calc" type="text"
                                                                   class="form-control text-center" value="1">
                                                    <span class="input-group-btn">
                                                                 <button id="plus" class="btn btn-info"
                                                                         type="button">+
                                                                 </button>
                                                                 </span>
                                                        </div><!-- /input-group -->
                                                        <script>
                                                            $('#minus').click(function () {
                                                                $("#calc").val(parseInt($("#calc").val()) - 1);
                                                            });
                                                            $('#plus').click(function () {
                                                                $("#calc").val(parseInt($("#calc").val()) + 1);
                                                            });
                                                        </script>
                                                    </div>
                                                    <div class=" col-xs-12 col-md-12">
                                                        Аляска — кристально чистая вода, в которой благодаря
                                                        бережному очищению сохраняется идеальный баланс полезных
                                                        минералов.
                                                    </div>
                                                    <div class="col-xs-12 col-md-12">
                                                        <a href="#" class="btn btn-primary" data-toggle="modal"><i
                                                                class="glyphicon glyphicon-shopping-cart"></i>Добавить
                                                            в заказ</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="box col-md-12">
                    <div class="box-inner">
                        <div class="box-header well" data-original-title="">
                            <h2><i class="glyphicon glyphicon-shopping-cart"></i> Корзина</h2>
                            <div class="box-icon">
                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <table class="table table-striped table-bordered responsive dataTable ">
                                <thead>
                                <tr>
                                    <th>№</th>
                                    <th>Наименование товара</th>
                                    <th>Цена</th>
                                    <th>Количество</th>
                                    <th>Итог</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>№</td>
                                    <td class="center">Вода питьевая</td>
                                    <td class="center">30</td>
                                    <td class="center">2</td>
                                    <td class="center">60</td>
                                    <td class="center">
                                        <a class="btn btn-info btn-sm" href="#myModal21" data-toggle="modal">
                                            <i class="glyphicon glyphicon-edit icon-white"></i>
                                            <span class="hidden-xs">Редактировать</span>
                                        </a>
                                        <a class="btn btn-danger btn-sm">
                                            <i class="glyphicon glyphicon-trash icon-white"></i>
                                            <span class="hidden-xs">Удалить</span>
                                        </a></td>
                                </tr>
                                <tr class="bold">
                                    <td colspan="4" class="center">Итог</td>
                                    <td colspan="2" class="center">60
                                    </td>
                                </tr>


                                </tbody>
                            </table>
                            <br>
                            <div class="form-group">
                                <div class="col-xs-12 col-md-12">
                                    <!--Для менеджера клиентов вытягивает в выпадающий список со свеми клиентами/поле должно быть по типу в локации - с поиском -->
                                    <div class="control-group">
                                        <label for="prd_id_providers">Клиент:</label>
                                        <p class="help-block">Выбрать уже зарегистрированого клиента из списка</p>
                                            <div class="controls">
                                                <select data-placeholder="Введите ФИО клиента или название организации"
                                                        class="col-xs-12 col-md-12" id="selectError2" data-rel="chosen">
                                                    <option value=""></option>
                                                    <?php foreach ($client as $item) { ?>
                                                        <option
                                                            value="<?= $item->use_id; ?>"><?= trim($item->use_last_name) . ' ' . $item->use_name . ' ' . $item->use_father_name; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-md-4">
                                    <label for="fatherName">Фамилия:</label>
                                    <input type="text" class="form-control" id="fatherName"
                                           placeholder="Введите фамилию">
                                    <p class="help-block">Введите фамилию клиента, если он еще не зарегистрирован на
                                        сайте.</p>
                                </div>

                                <div class="col-xs-12 col-md-4">
                                    <label for="firstName">Имя:</label>
                                    <input type="text" class="form-control" id="firstName" placeholder="Введите имя">
                                    <p class="help-block">Введите имя клиента, если он еще не зарегистрирован на
                                        сайте.</p>
                                </div>

                                <div class="col-xs-12 col-md-4">
                                    <label for="fatherName">Отчество:</label>
                                    <input type="text" class="form-control" id="fatherName"
                                           placeholder="Введите фамилию">
                                    <p class="help-block">Введите отчество клиента, если он еще не зарегистрирован на
                                        сайте.</p>
                                </div>

                                </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-md-4"><!-- Обязательно для заполнения -->
                                    <label for="phoneNumber">Телефон:*</label>
                                    <input type="tel" name="tel" class="form-control" id="phoneNumber"
                                           placeholder="+38 (067)-510-32-23"
                                           pattern="+38[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}">
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <label for="">Дата доставки:</label>
                                    <div class="input-group" id="">
                                        <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>"/>
                                    </div>
                                    <p class="help-block">Нажмите на поле для отображения календаря</p>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <label for="">Время доставки:</label>
                                    <div class="input-group" id="">
                                        <input type="time" class="form-control border-radius-3"
                                               value="<?= date("H:i"); ?>"/>
                                    </div>
                                    <p class="help-block">Нажмите на поле для ввода времени</p>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-12 col-md-3">
                                    <label for="postalAddress">Номер дома:</label>
                                    <input type="" class="form-control" id="" placeholder="Номер дома">
                                    </div>
                                <div class="col-xs-12 col-md-3">
                                    <label for="postalAddress">Кв./Офис:</label>
                                    <input type="" class="form-control" id="" placeholder="Кв./Офис">
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <label for="postalAddress">Домофон:</label>
                                    <input type="" class="form-control" id="" placeholder="Домофон">
                                </div>
                                <div class="col-xs-12  col-md-3">
                                    <label for="postalAddress">Улица:</label>
                                    <input type="" class="form-control" id="" placeholder="Улица">
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-md-12">
                                    <label for="postalAddress">Заезд:</label>
                                    <input type="" class="form-control" id="" placeholder="Заезд">
                                </div>
                                </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-md-12">
                                    <label for="postalAddress">Примечание:</label>
                                        <textarea rows="3" class="form-control" id="postalAddress"
                                                  placeholder="Примечание"></textarea>
                                    </div>
                                </div>
                            <br>
                            <p class="text-left">
                                <a class="btn btn-success">
                                    <i class="glyphicon glyphicon-ok icon-white"></i>
                                    Оформить заказ
                                </a>
                            </p>

                        </div>
                        </div>
                    </div>
                </div>
        </form>

</div>
</div>






