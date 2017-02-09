<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 08.02.2017
 * Time: 14:33
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
