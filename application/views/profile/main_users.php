<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 19.01.2017
 * Time: 9:47
 */
$success = $this->session->flashdata('success');
?>
<div class="row">
    <?php if ($success) { ?>
        <div class="col-md-12 alert alert-success" role="alert"><?= $success ?></div>
    <?php } ?>

    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> Данные клиента</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">

                <form action="" method="post" class="form-horizontal">
                    <div class="form-group <?= (!empty(form_error('use_organization')) ? 'has-error' : '') ?>">
                        <!--Это поле показываем, если пользователь-поставщик-->
                        <label class="control-label col-xs-12 col-md-3" for="lastName">Организация/ЧП:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text" name="use_organization"
                                   value="<?= !empty(set_value('use_organization')) ? set_value('use_organization') : $clients->use_organization; ?>"
                                   class="form-control"
                                   id="lastName" placeholder="Введите название организации/ЧП">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('use_last_name')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="lastName">Фамилия*:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text" name="use_last_name"
                                   value="<?= !empty(set_value('use_last_name')) ? set_value('use_last_name') : $clients->use_last_name; ?>"
                                   class="form-control" id="lastName" placeholder="Введите фамилию">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('use_name')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="firstName">Имя*:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text" name="use_name"
                                   value="<?= !empty(set_value('use_name')) ? set_value('use_name') : $clients->use_name; ?>"
                                   class="form-control" id="firstName" placeholder="Введите имя">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3" for="fatherName">Отчество:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text" name="use_father_name"
                                   value="<?= !empty(set_value('use_father_name')) ? set_value('use_father_name') : $clients->use_father_name; ?>"
                                   class="form-control"
                                   id="fatherName" placeholder="Введите отчество">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3">Дата рождения:</label>
                        <div class="col-xs-12 col-md-3">
                            <label for="day">День:</label>
                            <select class="form-control" name="day">
                                <?php for ($i = 1; $i <= 30; $i++) { ?>
                                    <option value="<?= $i ?>"><?= number_format($i, 0, '', ''); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <label for="month">Месяц:</label>
                            <select class="form-control" name="month">
                                <?php
                                $month = array('января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
                                for ($i = 0; $i <= 11; $i++) {
                                    $month_name = $month[$i];
                                    ?>
                                    <option value="<?= $i ?>"><?= $month_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <label for="yaer">Год:</label>
                            <select class="form-control" name="yaer">
                                <?php for ($i = (int)date('Y') - 18; $i >= (int)date('Y') - 58; $i--) { ?>
                                    <option value="<?= $i ?>"><?= number_format($i, 0, '', ''); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('use_phone')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="phoneNumber">Телефон*:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="tel" name="use_phone"
                                   value="<?= !empty(set_value('use_phone')) ? set_value('use_phone') : $clients->use_phone; ?>"
                                   class="form-control" id="phoneNumber" placeholder="Введите номер телефона">
                        </div>
                    </div>
                    <br/>
                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-9">
                            <input type="submit" class="btn btn-primary" value="Сохранить">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-pencil"></i> Изменить пароль</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">

                <form action="" method="post" class="form-horizontal">
                    <div class="form-group <?= (!empty(form_error('use_email')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="inputEmail">Email*:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="email" name="use_email" value="<?php echo set_value('use_email'); ?>"
                                   class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('use_password')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="inputPassword">Пароль*:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="password" name="use_password" value="" class="form-control" id="inputPassword"
                                   placeholder="Введите пароль">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('passconf')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="confirmPassword">Подтвердите
                            пароль*:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="password" name="passconf" class="form-control" id="confirmPassword"
                                   placeholder="Введите пароль ещё раз">
                        </div>
                    </div>
                    <br/>
                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-9">
                            <input type="submit" class="btn btn-primary" value="Сохранить">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!--Раздел Адреса доставки-->
    <div class="col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-home"></i> Адреса доставки</h2>

                <div class="box-icon">

                </div>
            </div>
            <div class="box-content">
                <p class="text-left">Для добавления адреса нажмите кнопку <a href="#myModal1" class="btn btn-primary"
                                                                             data-toggle="modal">Добавить</a></p>
                <table class="table table-striped table-bordered responsive">
                    <thead>
                    <tr>
                        <th>Название адреса</th>
                        <th>Дата добавления</th>
                        <th>Адрес</th> <!--Складываем Город+Улица+дом+подъезд+район-->
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Дом Победа</td>
                        <td class="center">2012/03/01</td>
                        <td class="center">Украина, Днепропетровская обл, Днепр, Победы д.60, кв.17</td>
                        <td class="center">
                            <a class="btn btn-success" href="#myModal2" data-toggle="modal">
                                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                Просмотр
                            </a>
                            <a class="btn btn-info" href="#myModal3" data-toggle="modal">
                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                Редактировать
                            </a>
                            <a class="btn btn-danger" href="#myModal4" data-toggle="modal"">
                            <i class="glyphicon glyphicon-trash icon-white"></i>
                            Удалить
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>Офис центр</td>
                        <td class="center">2012/03/01</td>
                        <td class="center">Днепр, Победы д.60, кв.17</td>
                        <td class="center">
                            <a class="btn btn-success" href="#">
                                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                Просмотр
                            </a>
                            <a class="btn btn-info" href="#">
                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                Редактировать
                            </a>
                            <a class="btn btn-danger" href="#">
                                <i class="glyphicon glyphicon-trash icon-white"></i>
                                Удалить
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Добавить новый адрес</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-xs-12" for="lastName">Короткое название:</label>

                            <div class="col-xs-12">
                                <input type="text" class="form-control" id="lastName"
                                       placeholder="Введите название адреса для отображения в таблице (например: дом)">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Страна:</label>
                                <select class="form-control">
                                    <option>Австрия </option>
                                    <option>Андорра </option>
                                    <option>Албания </option>
                                    <option>Беларусь </option>
                                    <option>Бельгия </option>
                                    <option>Болгария </option>
                                    <option>Босния и Герцеговина </option>
                                    <option>Ватикан </option>
                                    <option>Великобритания </option>
                                    <option>Венгрия </option>
                                    <option>Германия </option>
                                    <option>Гибралтар </option>
                                    <option>Греция </option>
                                    <option>Дания </option>
                                    <option>Ирландия </option>
                                    <option>Исландия </option>
                                    <option>Испания </option>
                                    <option>Италия </option>
                                    <option>Латвия </option>
                                    <option>Литва </option>
                                    <option>Лихтенштейн </option>
                                    <option>Люксембург </option>
                                    <option>Македония </option>
                                    <option>Мальта </option>
                                    <option>Молдавия </option>
                                    <option>Монако </option>
                                    <option>Нидерланды </option>
                                    <option>Норвегия </option>
                                    <option>Польша </option>
                                    <option>Португалия </option>
                                    <option>Россия </option>
                                    <option>Румыния </option>
                                    <option>Сан-Марино </option>
                                    <option>Сербия и Черногория </option>
                                    <option>Словакия </option>
                                    <option>Словения </option>
                                    <option selected>Украина </option>
                                    <option>Фарерские острова </option>
                                    <option>Финляндия </option>
                                    <option>Франция </option>
                                    <option>Хорватия </option>
                                    <option>Черногория </option>
                                    <option>Чехия </option>
                                    <option>Швейцария </option>
                                    <option>Швеция </option>
                                    <option>«Шпицберген» Норвегия</option>
                                    <option>Эстония </option>

                                </select>
                            </div>
                            <div class="col-xs-12 col-md-8">
                                <label for="postalAddress">Область</label>
                                <select class="form-control">
                                    <option>Винницкая область</option>
                                    <option>Волынская область</option>
                                    <option selected>Днепропетровская область</option>
                                    <option>Донецкая область</option>
                                    <option>Житомирская область</option>
                                    <option>Закарпатская область</option>
                                    <option>Запорожская область</option>
                                    <option>Ивано-Франковская область</option>
                                    <option>Киевская область</option>
                                    <option>Кировоградская область</option>
                                    <option>Луганская область</option>
                                    <option>Львовская область</option>
                                    <option>Николаевская область</option>
                                    <option>Одесская область</option>
                                    <option>Полтавская область</option>
                                    <option>Ровенская область</option>
                                    <option>Сумская область</option>
                                    <option>Тернопольская область</option>
                                    <option>Харьковская область</option>
                                    <option>Херсонская область</option>
                                    <option>Хмельницкая область</option>
                                    <option>Черкасская область</option>
                                    <option>Черниговская область</option>
                                    <option>Черновицкая область</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Город:</label>
                                <select class="form-control">
                                    <option>Днепр</option>
                                </select>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Улица:</label>
                                <input type="" class="form-control" id="" placeholder="Улица">
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Номер дома:</label>
                                <input type="" class="form-control" id="" placeholder="Номер дома">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Кв./Офис:</label>
                                <input type="" class="form-control" id="" placeholder="Кв./Офис">
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Домофон:</label>
                                <input type="" class="form-control" id="" placeholder="Домофон">
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Заезд:</label>
                                <input type="" class="form-control" id="" placeholder="Заезд">
                            </div>
                        </div>
                        <div class=form-group>
                            <div class="col-md-12 col-xs-12">
                                <label for="postalAddress">Район:</label>
                                <div class="controls">
                                    <select data-placeholder="Выбирите район" id="selectError2" data-rel="chosen">
                                        <option value=""></option>
                                        <option>Солнечный</option>
                                        <option>New York Giants</option>
                                        <option>Philadelphia Eagles</option>
                                        <option>Washington Redskins</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                        <a href="#" class="btn btn-primary" data-dismiss="modal">Сохранить</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Просмотр</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-xs-12" for="lastName">Короткое название:</label>

                            <div class="col-xs-12">
                                <input type="text" class="form-control" id="lastName" disabled
                                       placeholder="Введите название адреса для отображения в таблице (например: дом)">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Страна:</label>
                                <select class="form-control" disabled>
                                    <option>Австрия </option>
                                    <option>Андорра </option>
                                    <option>Албания </option>
                                    <option>Беларусь </option>
                                    <option>Бельгия </option>
                                    <option>Болгария </option>
                                    <option>Босния и Герцеговина </option>
                                    <option>Ватикан </option>
                                    <option>Великобритания </option>
                                    <option>Венгрия </option>
                                    <option>Германия </option>
                                    <option>Гибралтар </option>
                                    <option>Греция </option>
                                    <option>Дания </option>
                                    <option>Ирландия </option>
                                    <option>Исландия </option>
                                    <option>Испания </option>
                                    <option>Италия </option>
                                    <option>Латвия </option>
                                    <option>Литва </option>
                                    <option>Лихтенштейн </option>
                                    <option>Люксембург </option>
                                    <option>Македония </option>
                                    <option>Мальта </option>
                                    <option>Молдавия </option>
                                    <option>Монако </option>
                                    <option>Нидерланды </option>
                                    <option>Норвегия </option>
                                    <option>Польша </option>
                                    <option>Португалия </option>
                                    <option>Россия </option>
                                    <option>Румыния </option>
                                    <option>Сан-Марино </option>
                                    <option>Сербия и Черногория </option>
                                    <option>Словакия </option>
                                    <option>Словения </option>
                                    <option selected>Украина </option>
                                    <option>Фарерские острова </option>
                                    <option>Финляндия </option>
                                    <option>Франция </option>
                                    <option>Хорватия </option>
                                    <option>Черногория </option>
                                    <option>Чехия </option>
                                    <option>Швейцария </option>
                                    <option>Швеция </option>
                                    <option>«Шпицберген» Норвегия</option>
                                    <option>Эстония </option>

                                </select>
                            </div>
                            <div class="col-xs-12 col-md-8">
                                <label for="postalAddress">Область</label>
                                <select class="form-control" disabled>
                                    <option>Винницкая область</option>
                                    <option>Волынская область</option>
                                    <option selected>Днепропетровская область</option>
                                    <option>Донецкая область</option>
                                    <option>Житомирская область</option>
                                    <option>Закарпатская область</option>
                                    <option>Запорожская область</option>
                                    <option>Ивано-Франковская область</option>
                                    <option>Киевская область</option>
                                    <option>Кировоградская область</option>
                                    <option>Луганская область</option>
                                    <option>Львовская область</option>
                                    <option>Николаевская область</option>
                                    <option>Одесская область</option>
                                    <option>Полтавская область</option>
                                    <option>Ровенская область</option>
                                    <option>Сумская область</option>
                                    <option>Тернопольская область</option>
                                    <option>Харьковская область</option>
                                    <option>Херсонская область</option>
                                    <option>Хмельницкая область</option>
                                    <option>Черкасская область</option>
                                    <option>Черниговская область</option>
                                    <option>Черновицкая область</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Город:</label>
                                <select class="form-control" disabled>
                                    <option>Днепр</option>
                                </select>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Улица:</label>
                                <input type="" class="form-control" disabled id="" placeholder="Улица">
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Номер дома:</label>
                                <input type="" class="form-control" disabled id="" placeholder="Номер дома">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Кв./Офис:</label>
                                <input type="" class="form-control" disabled id="" placeholder="Кв./Офис">
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Домофон:</label>
                                <input type="" class="form-control" disabled id="" placeholder="Домофон">
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Заезд:</label>
                                <input type="" class="form-control" disabled id="" placeholder="Заезд">
                            </div>
                        </div>
                        <div class=form-group>
                            <div class="col-md-12 col-xs-12">
                                <label for="postalAddress">Район:</label>
                                <div class="controls">
                                    <select data-placeholder="Выбирите район" disabled id="selectError2"
                                            data-rel="chosen">
                                        <option value=""></option>
                                        <option>Солнечный</option>
                                        <option>New York Giants</option>
                                        <option>Philadelphia Eagles</option>
                                        <option>Washington Redskins</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                        <a href="#" class="btn btn-primary" data-dismiss="modal">Сохранить</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/span-->
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Редактировать адрес</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-xs-12" for="lastName">Короткое название:</label>

                            <div class="col-xs-12">
                                <input type="text" class="form-control" id="lastName"
                                       placeholder="Введите название адреса для отображения в таблице (например: дом)">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Страна:</label>
                                <select class="form-control">
                                    <option>Австрия </option>
                                    <option>Андорра </option>
                                    <option>Албания </option>
                                    <option>Беларусь </option>
                                    <option>Бельгия </option>
                                    <option>Болгария </option>
                                    <option>Босния и Герцеговина </option>
                                    <option>Ватикан </option>
                                    <option>Великобритания </option>
                                    <option>Венгрия </option>
                                    <option>Германия </option>
                                    <option>Гибралтар </option>
                                    <option>Греция </option>
                                    <option>Дания </option>
                                    <option>Ирландия </option>
                                    <option>Исландия </option>
                                    <option>Испания </option>
                                    <option>Италия </option>
                                    <option>Латвия </option>
                                    <option>Литва </option>
                                    <option>Лихтенштейн </option>
                                    <option>Люксембург </option>
                                    <option>Македония </option>
                                    <option>Мальта </option>
                                    <option>Молдавия </option>
                                    <option>Монако </option>
                                    <option>Нидерланды </option>
                                    <option>Норвегия </option>
                                    <option>Польша </option>
                                    <option>Португалия </option>
                                    <option>Россия </option>
                                    <option>Румыния </option>
                                    <option>Сан-Марино </option>
                                    <option>Сербия и Черногория </option>
                                    <option>Словакия </option>
                                    <option>Словения </option>
                                    <option selected>Украина </option>
                                    <option>Фарерские острова </option>
                                    <option>Финляндия </option>
                                    <option>Франция </option>
                                    <option>Хорватия </option>
                                    <option>Черногория </option>
                                    <option>Чехия </option>
                                    <option>Швейцария </option>
                                    <option>Швеция </option>
                                    <option>«Шпицберген» Норвегия</option>
                                    <option>Эстония </option>

                                </select>
                            </div>
                            <div class="col-xs-12 col-md-8">
                                <label for="postalAddress">Область</label>
                                <select class="form-control">
                                    <option>Винницкая область</option>
                                    <option>Волынская область</option>
                                    <option selected>Днепропетровская область</option>
                                    <option>Донецкая область</option>
                                    <option>Житомирская область</option>
                                    <option>Закарпатская область</option>
                                    <option>Запорожская область</option>
                                    <option>Ивано-Франковская область</option>
                                    <option>Киевская область</option>
                                    <option>Кировоградская область</option>
                                    <option>Луганская область</option>
                                    <option>Львовская область</option>
                                    <option>Николаевская область</option>
                                    <option>Одесская область</option>
                                    <option>Полтавская область</option>
                                    <option>Ровенская область</option>
                                    <option>Сумская область</option>
                                    <option>Тернопольская область</option>
                                    <option>Харьковская область</option>
                                    <option>Херсонская область</option>
                                    <option>Хмельницкая область</option>
                                    <option>Черкасская область</option>
                                    <option>Черниговская область</option>
                                    <option>Черновицкая область</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Город:</label>
                                <select class="form-control">
                                    <option>Днепр</option>
                                </select>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Улица:</label>
                                <input type="" class="form-control" id="" placeholder="Улица">
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Номер дома:</label>
                                <input type="" class="form-control" id="" placeholder="Номер дома">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Кв./Офис:</label>
                                <input type="" class="form-control" id="" placeholder="Кв./Офис">
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Домофон:</label>
                                <input type="" class="form-control" id="" placeholder="Домофон">
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Заезд:</label>
                                <input type="" class="form-control" id="" placeholder="Заезд">
                            </div>
                        </div>
                        <div class=form-group>
                            <div class="col-md-12 col-xs-12">
                                <label for="postalAddress">Район:</label>
                                <div class="controls">
                                    <select data-placeholder="Выбирите район" id="selectError2" data-rel="chosen">
                                        <option value=""></option>
                                        <option>Солнечный</option>
                                        <option>New York Giants</option>
                                        <option>Philadelphia Eagles</option>
                                        <option>Washington Redskins</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                        <a href="#" class="btn btn-primary" data-dismiss="modal">Сохранить</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3> Удаление адреса</h3>
                </div>
                <div class="modal-body">
                    <p>Вы действительно хотите удалить адрес?</p>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-default" data-dismiss="modal">Да</a>
                        <a href="#" class="btn btn-primary" data-dismiss="modal">Нет</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!--/span-->
</div>