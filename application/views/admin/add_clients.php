<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 20.12.2016
 * Time: 13:27
 */
$success = $this->session->flashdata('success');
?>
<div class="row">
    <?php if ($success){?>
    <div class="col-md-12 alert alert-success" role="alert"><?=$success?></div>
    <?php }?>
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Добавить клиента</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="col-xs-12 col-md-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#panel1">Физ.лицо</a></li>
                        <li><a data-toggle="tab" href="#panel2">Организация/ЧП</a></li>
                    </ul>
                </div>
                    <div class="tab-content">
                        <div id="panel1" class="tab-pane fade in active">
                            <div class="col-xs-12">&ensp;</div>
                            <?php echo validation_errors(); ?>
                            <form class="form-horizontal" method="post" action="">
                                <input type="hidden" name="use_id_country" value="null" />
                                <div class="form-group <?= (!empty(form_error('use_last_name')) ? 'has-error' : '') ?>">
                                    <label class="control-label col-xs-3" for="lastName">Фамилия*:</label>
                                    <div class="col-xs-12 col-md-9">
                                        <input type="text" name="use_last_name" value="<?php echo set_value('use_last_name'); ?>"
                                               class="form-control" id="lastName" placeholder="Введите фамилию">
                                    </div>
                                </div>
                                <div class="form-group <?= (!empty(form_error('use_name')) ? 'has-error' : '') ?>">
                                    <label class="control-label col-xs-3" for="firstName">Имя*:</label>
                                    <div class="col-xs-12 col-md-9">
                                        <input type="text" name="use_name" value="<?php echo set_value('use_name'); ?>"
                                               class="form-control" id="firstName" placeholder="Введите имя">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="fatherName">Отчество:</label>
                                    <div class="col-xs-12 col-md-9">
                                        <input type="text" name="use_father_name"
                                               value="<?php echo set_value('use_father_name'); ?>" class="form-control"
                                               id="fatherName" placeholder="Введите отчество">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-md-3">Дата рождения:</label>
                                    <div class="col-xs-12 col-md-3">
                                        <label for="day">День:</label>
                                        <select class="form-control" name="day">
                                            <?php for ($i = 1; $i <= 30; $i++) { ?>
                                                <option value="<?=$i?>"><?= number_format($i, 0, '', ''); ?></option>
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
                                                <option value="<?=$i?>"><?= $month_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <label for="yaer">Год:</label>
                                        <select class="form-control" name="yaer">
                                            <?php for ($i = (int)date('Y') - 18; $i >= (int)date('Y') - 58; $i--) { ?>
                                                <option value="<?=$i?>"><?= number_format($i, 0, '', ''); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
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
                                    <label class="control-label col-xs-12 col-md-3" for="confirmPassword">Подтвердите пароль*:</label>
                                    <div class="col-xs-12 col-md-9">
                                        <input type="password" name="passconf" class="form-control" id="confirmPassword"
                                               placeholder="Введите пароль ещё раз">
                                    </div>
                                </div>
                                <div class="form-group <?= (!empty(form_error('use_phone')) ? 'has-error' : '') ?>">
                                    <label class="control-label col-xs-3" for="phoneNumber">Телефон*:</label>
                                    <div class="col-xs-12 col-md-9">
                                        <input type="tel" name="use_phone" value="<?php echo set_value('use_phone'); ?>"
                                               class="form-control" id="phoneNumber" placeholder="Введите номер телефона">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="postalAddress">Примечание:</label>
                                    <div class="col-xs-12 col-md-9">
                            <textarea rows="3" name="use_comments" value="<?php echo set_value('use_comments'); ?>"
                                      class="form-control" id="postalAddress"
                                      placeholder="Примечание доступно только менеджеру"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-md-3" for="postalAddress">Адрес клиента</label>
                                    <div class="col-xs-12 col-md-4">
                                        <label for="use_id_country">Страна:</label>
                                        <select value="<?php echo set_value('use_id_country'); ?>" class="form-control"
                                                name="use_id_country" <?= (!empty(form_error('use_id_city')) ? 'has-error' : '') ?>>
                                            <?php foreach ($country as $item) { ?>
                                                <option value="<?= $item->cou_id; ?>"><?= trim($item->cou_name); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-md-5">
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
                                    <label class="control-label col-xs-12 col-md-3" for="postalAddress">&ensp;</label>


                                    <div class="col-xs-12 col-md-3">
                                        <label for="use_id_city">Город:</label>
                                        <select value="<?php echo set_value('use_id_city'); ?>" class="form-control"
                                                name="use_id_city" <?= (!empty(form_error('use_id_city')) ? 'has-error' : '') ?>>
                                            <?php foreach ($city as $item) { ?>
                                                <option value="<?= $item->cit_id; ?>"><?= trim($item->cit_name); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-md-3 <?= (!empty(form_error('use_street')) ? 'has-error' : '') ?>">
                                        <label for="use_street">Улица:</label>
                                        <input type="text" name="use_street" value="<?php echo set_value('use_street'); ?>"
                                               class="form-control" id="" placeholder="Улица*">
                                    </div>
                                    <div class="col-xs-12 col-md-3 <?= (!empty(form_error('use_building')) ? 'has-error' : '') ?>">
                                        <label for="use_building">Номер дома:</label>
                                        <input type="text" name="use_building" value="<?php echo set_value('use_building'); ?>"
                                               class="form-control" id="" placeholder="Номер дома*">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="label col-xs-3" for="postalAddress">&nbsp;</label>


                                    <div class="col-xs-12 col-md-3 <?= (!empty(form_error('use_room')) ? 'has-error' : '') ?>">
                                        <label for="use_room">Кв./Офис*:</label>
                                        <input type="text" name="use_room" value="<?php echo set_value('use_room'); ?>"
                                               class="form-control" id="" placeholder="Кв./Офис*">
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <label for="use_intercom">Домофон:</label>
                                        <input type="text" name="use_intercom" value="<?php echo set_value('use_intercom'); ?>"
                                               class="form-control" id="" placeholder="Домофон">
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <label for="use_destonation">Заезд:</label>
                                        <input type="text" name="use_destonation"
                                               value="<?php echo set_value('use_destonation'); ?>" class="form-control" id=""
                                               placeholder="Заезд">
                                    </div>
                                    <label class="control-label col-xs-12 col-md-3" for="postalAddress">&nbsp;</label>
                                   <div class="col-xs-12 col-md-9">
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
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-md-3">Пол*:</label>
                                    <div class="col-xs-12 col-md-2">
                                        <label class="radio-inline">
                                            <input type="radio"
                                                   name="use_male" <?php (set_value('use_male') == 1) ? 'checked' : ""; ?>
                                                   value="1"> Мужской
                                        </label>
                                    </div>
                                    <div class="col-xs-1 col-md-2">
                                        <label class="radio-inline">
                                            <input type="radio"
                                                   name="use_male" <?php (set_value('use_male') == 2) ? 'checked' : ""; ?>
                                                   value="2"> Женский
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group <?= (!empty(form_error('agree')) ? 'has-error' : '') ?>">
                                    <div class="col-xs-offset-3 col-xs-12 col-md-9">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="agree" value="1"> Я согласен с <a href="#">условиями</a>.
                                        </label>
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <div class="col-xs-offset-3 col-xs-9">
                                        <input type="submit" class="btn btn-primary" value="Регистрация">
                                        <input type="reset" class="btn btn-default" value="Очистить форму">
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div id="panel2" class="tab-pane fade">
                            <div class="col-xs-12">&ensp;</div>
                            <?php echo validation_errors(); ?>
                            <form class="form-horizontal" method="post" action="">
                                <input type="hidden" name="use_id_country" value="null" />
                                <div class="form-group <?= (!empty(form_error('use_organization')) ? 'has-error' : '') ?>">
                                    <label class="control-label col-xs-12 col-md-3" for="lastName">Организация/ЧП:</label>
                                    <div class="col-xs-12 col-md-9">
                                        <input type="text" name="use_organization"
                                               value="<?php echo set_value('use_organization'); ?>" class="form-control"
                                               id="lastName" placeholder="Введите название организации/ЧП">
                                    </div>
                                </div>
                                <div class="form-group <?= (!empty(form_error('use_last_name')) ? 'has-error' : '') ?>">
                                    <label class="control-label col-xs-3" for="lastName">Фамилия*:</label>
                                    <div class="col-xs-12 col-md-9">
                                        <input type="text" name="use_last_name" value="<?php echo set_value('use_last_name'); ?>"
                                               class="form-control" id="lastName" placeholder="Введите фамилию">
                                    </div>
                                </div>
                                <div class="form-group <?= (!empty(form_error('use_name')) ? 'has-error' : '') ?>">
                                    <label class="control-label col-xs-3" for="firstName">Имя*:</label>
                                    <div class="col-xs-12 col-md-9">
                                        <input type="text" name="use_name" value="<?php echo set_value('use_name'); ?>"
                                               class="form-control" id="firstName" placeholder="Введите имя">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="fatherName">Отчество:</label>
                                    <div class="col-xs-12 col-md-9">
                                        <input type="text" name="use_father_name"
                                               value="<?php echo set_value('use_father_name'); ?>" class="form-control"
                                               id="fatherName" placeholder="Введите отчество">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-md-3">Дата рождения:</label>
                                    <div class="col-xs-12 col-md-3">
                                        <label for="day">День:</label>
                                        <select class="form-control" name="day">
                                            <?php for ($i = 1; $i <= 30; $i++) { ?>
                                                <option value="<?=$i?>"><?= number_format($i, 0, '', ''); ?></option>
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
                                                <option value="<?=$i?>"><?= $month_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <label for="yaer">Год:</label>
                                        <select class="form-control" name="yaer">
                                            <?php for ($i = (int)date('Y') - 18; $i >= (int)date('Y') - 58; $i--) { ?>
                                                <option value="<?=$i?>"><?= number_format($i, 0, '', ''); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
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
                                    <label class="control-label col-xs-12 col-md-3" for="confirmPassword">Подтвердите пароль*:</label>
                                    <div class="col-xs-12 col-md-9">
                                        <input type="password" name="passconf" class="form-control" id="confirmPassword"
                                               placeholder="Введите пароль ещё раз">
                                    </div>
                                </div>
                                <div class="form-group <?= (!empty(form_error('use_phone')) ? 'has-error' : '') ?>">
                                    <label class="control-label col-xs-3" for="phoneNumber">Телефон*:</label>
                                    <div class="col-xs-12 col-md-9">
                                        <input type="tel" name="use_phone" value="<?php echo set_value('use_phone'); ?>"
                                               class="form-control" id="phoneNumber" placeholder="Введите номер телефона">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="postalAddress">Примечание:</label>
                                    <div class="col-xs-12 col-md-9">
                            <textarea rows="3" name="use_comments" value="<?php echo set_value('use_comments'); ?>"
                                      class="form-control" id="postalAddress"
                                      placeholder="Примечание доступно только менеджеру"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-md-3" for="postalAddress">Адрес клиента:</label>
                                    <div class="col-xs-12 col-md-4">
                                        <label for="use_id_country">Страна:</label>
                                        <select value="<?php echo set_value('use_id_country'); ?>" class="form-control"
                                                name="use_id_country" <?= (!empty(form_error('use_id_city')) ? 'has-error' : '') ?>>
                                            <?php foreach ($country as $item) { ?>
                                                <option value="<?= $item->cou_id; ?>"><?= trim($item->cou_name); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-md-5">
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
                                    <label class="label col-xs-3 col-md-3" for="postalAddress">&nbsp;</label>
                                    <div class="col-xs-12 col-md-3">
                                        <label for="use_id_city">Город:</label>
                                        <select value="<?php echo set_value('use_id_city'); ?>" class="form-control"
                                                name="use_id_city" <?= (!empty(form_error('use_id_city')) ? 'has-error' : '') ?>>
                                            <?php foreach ($city as $item) { ?>
                                                <option value="<?= $item->cit_id; ?>"><?= trim($item->cit_name); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-xs-12 col-md-3 <?= (!empty(form_error('use_street')) ? 'has-error' : '') ?>">
                                        <label for="use_street">Улица:</label>
                                        <input type="text" name="use_street" value="<?php echo set_value('use_street'); ?>"
                                               class="form-control" id="" placeholder="Улица*">
                                    </div>
                                    <div class="col-xs-12 col-md-3 <?= (!empty(form_error('use_building')) ? 'has-error' : '') ?>">
                                        <label for="use_building">Номер дома:</label>
                                        <input type="text" name="use_building" value="<?php echo set_value('use_building'); ?>"
                                               class="form-control" id="" placeholder="Номер дома*">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label class="label col-xs-3 col-md-3" for="postalAddress">&nbsp;</label>
                                    <div class="col-xs-12 col-md-3 <?= (!empty(form_error('use_room')) ? 'has-error' : '') ?>">
                                        <label for="use_room">Кв./Офис*:</label>
                                        <input type="text" name="use_room" value="<?php echo set_value('use_room'); ?>"
                                               class="form-control" id="" placeholder="Кв./Офис*">
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <label for="use_intercom">Домофон:</label>
                                        <input type="text" name="use_intercom" value="<?php echo set_value('use_intercom'); ?>"
                                               class="form-control" id="" placeholder="Домофон">
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <label for="use_destonation">Заезд:</label>
                                        <input type="text" name="use_destonation"
                                               value="<?php echo set_value('use_destonation'); ?>" class="form-control" id=""
                                               placeholder="Заезд">
                                    </div>
                                    <label class="label col-xs-12 col-md-3" for="postalAddress">&nbsp;</label>
                                    <div class="col-xs-12 col-md-9">
                                        <label for="">Район:</label><!--Поле обязательно для заполнения-->
                                        <div class="controls">
                                            <select id="selectError1" multiple class="form-control" data-rel="chosen">
                                                <option>Солнечный</option>
                                                <option>2</option>
                                            </select>
                                            <input type="hidden" id="delivery_city" name="delivery_city">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-12 col-md-3">Пол*:</label>
                                    <div class="col-xs-12 col-md-2">
                                        <label class="radio-inline">
                                            <input type="radio"
                                                   name="use_male" <?php (set_value('use_male') == 1) ? 'checked' : ""; ?>
                                                   value="1"> Мужской
                                        </label>
                                    </div>
                                    <div class="col-xs-1 col-md-2">
                                        <label class="radio-inline">
                                            <input type="radio"
                                                   name="use_male" <?php (set_value('use_male') == 2) ? 'checked' : ""; ?>
                                                   value="2"> Женский
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group <?= (!empty(form_error('agree')) ? 'has-error' : '') ?>">
                                    <div class="col-xs-offset-3 col-xs-12 col-md-9">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="agree" value="1"> Я согласен с <a href="#">условиями</a>.
                                        </label>
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <div class="col-xs-offset-3 col-xs-9">
                                        <input type="submit" class="btn btn-primary" value="Регистрация">
                                        <input type="reset" class="btn btn-default" value="Очистить форму">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

<!--                --><?php //echo validation_errors(); ?>
<!--                <form class="form-horizontal" method="post" action="">-->
<!--	                <input type="hidden" name="use_id_country" value="null" />-->
<!--                    <div class="form-group --><?//= (!empty(form_error('use_organization')) ? 'has-error' : '') ?><!--">-->
<!--                        <label class="control-label col-xs-3" for="lastName">Организация/ЧП:</label>-->
<!--                        <div class="col-xs-9">-->
<!--                            <input type="text" name="use_organization"-->
<!--                                   value="--><?php //echo set_value('use_organization'); ?><!--" class="form-control"-->
<!--                                   id="lastName" placeholder="Введите название организации/ЧП">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="form-group --><?//= (!empty(form_error('use_last_name')) ? 'has-error' : '') ?><!--">-->
<!--                        <label class="control-label col-xs-3" for="lastName">Фамилия*:</label>-->
<!--                        <div class="col-xs-9">-->
<!--                            <input type="text" name="use_last_name" value="--><?php //echo set_value('use_last_name'); ?><!--"-->
<!--                                   class="form-control" id="lastName" placeholder="Введите фамилию">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="form-group --><?//= (!empty(form_error('use_name')) ? 'has-error' : '') ?><!--">-->
<!--                        <label class="control-label col-xs-3" for="firstName">Имя*:</label>-->
<!--                        <div class="col-xs-9">-->
<!--                            <input type="text" name="use_name" value="--><?php //echo set_value('use_name'); ?><!--"-->
<!--                                   class="form-control" id="firstName" placeholder="Введите имя">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label class="control-label col-xs-3" for="fatherName">Отчество:</label>-->
<!--                        <div class="col-xs-9">-->
<!--                            <input type="text" name="use_father_name"-->
<!--                                   value="--><?php //echo set_value('use_father_name'); ?><!--" class="form-control"-->
<!--                                   id="fatherName" placeholder="Введите отчество">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label class="control-label col-xs-3">Дата рождения:</label>-->
<!--                        <div class="col-xs-3">-->
<!--                            <select class="form-control" name="day">-->
<!--                                --><?php //for ($i = 1; $i <= 30; $i++) { ?>
<!--                                    <option value="--><?//=$i?><!--">--><?//= number_format($i, 0, '', ''); ?><!--</option>-->
<!--                                --><?php //} ?>
<!--                            </select>-->
<!--                        </div>-->
<!--                        <div class="col-xs-3">-->
<!--                            <select class="form-control" name="month">-->
<!--                                --><?php
//                                $month = array('января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря');
//                                for ($i = 0; $i <= 11; $i++) {
//                                    $month_name = $month[$i];
//                                    ?>
<!--                                    <option value="--><?//=$i?><!--">--><?//= $month_name; ?><!--</option>-->
<!--                                --><?php //} ?>
<!--                            </select>-->
<!--                        </div>-->
<!--                        <div class="col-xs-3">-->
<!--                            <select class="form-control" name="yaer">-->
<!--                                --><?php //for ($i = (int)date('Y') - 18; $i >= (int)date('Y') - 58; $i--) { ?>
<!--                                    <option value="--><?//=$i?><!--">--><?//= number_format($i, 0, '', ''); ?><!--</option>-->
<!--                                --><?php //} ?>
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="form-group --><?//= (!empty(form_error('use_email')) ? 'has-error' : '') ?><!--">-->
<!--                        <label class="control-label col-xs-3" for="inputEmail">Email*:</label>-->
<!--                        <div class="col-xs-9">-->
<!--                            <input type="email" name="use_email" value="--><?php //echo set_value('use_email'); ?><!--"-->
<!--                                   class="form-control" id="inputEmail" placeholder="Email">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="form-group --><?//= (!empty(form_error('use_password')) ? 'has-error' : '') ?><!--">-->
<!--                        <label class="control-label col-xs-3" for="inputPassword">Пароль*:</label>-->
<!--                        <div class="col-xs-9">-->
<!--                            <input type="password" name="use_password" value="" class="form-control" id="inputPassword"-->
<!--                                   placeholder="Введите пароль">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="form-group --><?//= (!empty(form_error('passconf')) ? 'has-error' : '') ?><!--">-->
<!--                        <label class="control-label col-xs-3" for="confirmPassword">Подтвердите пароль*:</label>-->
<!--                        <div class="col-xs-9">-->
<!--                            <input type="password" name="passconf" class="form-control" id="confirmPassword"-->
<!--                                   placeholder="Введите пароль ещё раз">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="form-group --><?//= (!empty(form_error('use_phone')) ? 'has-error' : '') ?><!--">-->
<!--                        <label class="control-label col-xs-3" for="phoneNumber">Телефон*:</label>-->
<!--                        <div class="col-xs-9">-->
<!--                            <input type="tel" name="use_phone" value="--><?php //echo set_value('use_phone'); ?><!--"-->
<!--                                   class="form-control" id="phoneNumber" placeholder="Введите номер телефона">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label class="control-label col-xs-3" for="postalAddress">Примечание:</label>-->
<!--                        <div class="col-xs-9">-->
<!--                            <textarea rows="3" name="use_comments" value="--><?php //echo set_value('use_comments'); ?><!--"-->
<!--                                      class="form-control" id="postalAddress"-->
<!--                                      placeholder="Примечание доступно только менеджеру"></textarea>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label class="control-label col-xs-3" for="postalAddress">Страна:</label>-->
<!--                        <div class="col-xs-3">-->
<!--                            <select value="--><?php //echo set_value('use_id_country'); ?><!--" class="form-control"-->
<!--                                    name="use_id_country" --><?//= (!empty(form_error('use_id_city')) ? 'has-error' : '') ?><!--<!-->
<!--                                --><?php //foreach ($country as $item) { ?>
<!--                                    <option value="--><?//= $item->cou_id; ?><!--">--><?//= trim($item->cou_name); ?><!--</option>-->
<!--                                --><?php //} ?>
<!--                            </select>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label class="control-label col-xs-3" for="postalAddress">Адрес:</label>-->
<!---->
<!---->
<!--                        <div class="col-xs-3">-->
<!--                            <select value="--><?php //echo set_value('use_id_city'); ?><!--" class="form-control"-->
<!--                                    name="use_id_city" --><?//= (!empty(form_error('use_id_city')) ? 'has-error' : '') ?><!--<!-->
<!--                                --><?php //foreach ($city as $item) { ?>
<!--                                    <option value="--><?//= $item->cit_id; ?><!--">--><?//= trim($item->cit_name); ?><!--</option>-->
<!--                                --><?php //} ?>
<!--                            </select>-->
<!--                        </div>-->
<!--                        <div class="col-xs-3 --><?//= (!empty(form_error('use_street')) ? 'has-error' : '') ?><!--">-->
<!--                            <input type="text" name="use_street" value="--><?php //echo set_value('use_street'); ?><!--"-->
<!--                                   class="form-control" id="" placeholder="Улица*">-->
<!--                        </div>-->
<!--                        <div class="col-xs-3 --><?//= (!empty(form_error('use_building')) ? 'has-error' : '') ?><!--">-->
<!--                            <input type="text" name="use_building" value="--><?php //echo set_value('use_building'); ?><!--"-->
<!--                                   class="form-control" id="" placeholder="Номер дома*">-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!---->
<!--                    <div class="form-group">-->
<!--                        <label class="label col-xs-3" for="postalAddress">&nbsp;</label>-->
<!---->
<!---->
<!--                        <div class="col-xs-3 --><?//= (!empty(form_error('use_room')) ? 'has-error' : '') ?><!--">-->
<!--                            <input type="text" name="use_room" value="--><?php //echo set_value('use_room'); ?><!--"-->
<!--                                   class="form-control" id="" placeholder="Кв./Офис*">-->
<!--                        </div>-->
<!--                        <div class="col-xs-3">-->
<!--                            <input type="text" name="use_intercom" value="--><?php //echo set_value('use_intercom'); ?><!--"-->
<!--                                   class="form-control" id="" placeholder="Домофон">-->
<!--                        </div>-->
<!--                        <div class="col-xs-3">-->
<!--                            <input type="text" name="use_destonation"-->
<!--                                   value="--><?php //echo set_value('use_destonation'); ?><!--" class="form-control" id=""-->
<!--                                   placeholder="Заезд">-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                    <div class="form-group">-->
<!--                        <label class="control-label col-xs-3">Пол*:</label>-->
<!--                        <div class="col-xs-2">-->
<!--                            <label class="radio-inline">-->
<!--                                <input type="radio"-->
<!--                                       name="use_male" --><?php //(set_value('use_male') == 1) ? 'checked' : ""; ?>
<!--                                       value="1"> Мужской-->
<!--                            </label>-->
<!--                        </div>-->
<!--                        <div class="col-xs-2">-->
<!--                            <label class="radio-inline">-->
<!--                                <input type="radio"-->
<!--                                       name="use_male" --><?php //(set_value('use_male') == 2) ? 'checked' : ""; ?>
<!--                                       value="2"> Женский-->
<!--                            </label>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="form-group --><?//= (!empty(form_error('agree')) ? 'has-error' : '') ?><!--">-->
<!--                        <div class="col-xs-offset-3 col-xs-9">-->
<!--                            <label class="checkbox-inline">-->
<!--                                <input type="checkbox" name="agree" value="1"> Я согласен с <a href="#">условиями</a>.-->
<!--                            </label>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <br/>-->
<!--                    <div class="form-group">-->
<!--                        <div class="col-xs-offset-3 col-xs-9">-->
<!--                            <input type="submit" class="btn btn-primary" value="Регистрация">-->
<!--                            <input type="reset" class="btn btn-default" value="Очистить форму">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </form>-->
            </div>
        </div>
    </div>
    <!--/span-->

</div>
