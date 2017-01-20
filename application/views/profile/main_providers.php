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
                <h2><i class="glyphicon glyphicon-user"></i> Данные руководителя</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">

                <form action="" method="post" class="form-horizontal">
                    <div class="form-group <?= (!empty(form_error('pro_organization')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="lastName">Организация/ЧП:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text"
                                   value="<?= !empty(set_value('pro_organization')) ? set_value('pro_organization') : $providers->pro_organization; ?>"
                                   class="form-control"
                                   name="pro_organization" id="lastName" placeholder="Введите название организации/ЧП">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_last_name')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="lastName">Фамилия руководителя:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text"
                                   value="<?= !empty(set_value('pro_last_name')) ? set_value('pro_last_name') : $providers->pro_last_name; ?>"
                                   class="form-control"
                                   name="pro_last_name" id="lastName" placeholder="Введите фамилию руководителя">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_name')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="firstName">Имя руководителя:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text"
                                   value="<?= !empty(set_value('pro_name')) ? set_value('pro_name') : $providers->pro_name; ?>"
                                   class="form-control"
                                   name="pro_name" id="firstName" placeholder="Введите имя руководителя">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_father_name')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="fatherName">Отчество руководителя:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text"
                                   value="<?= !empty(set_value('pro_father_name')) ? set_value('pro_father_name') : $providers->pro_father_name; ?>"
                                   class="form-control"
                                   name="pro_father_name" id="fatherName" placeholder="Введите отчество руководителя">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_phone')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="phoneNumber">Телефон руководителя:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="tel"
                                   value="<?= !empty(set_value('pro_phone')) ? set_value('pro_phone') : $providers->pro_phone; ?>"
                                   class="form-control"
                                   name="pro_phone" id="phoneNumber" placeholder="Введите номер телефона">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_email')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="inputEmail">Email руководителя:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="email"
                                   value="<?= !empty(set_value('pro_email')) ? set_value('pro_email') : $providers->pro_email; ?>"
                                   class="form-control"
                                   name="pro_email" id="inputEmail" placeholder="Email">
                        </div>
                    </div>
                    <br/>
                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-9">
                            <input type="submit" class="btn btn-primary" value="Сохранить">
                        </div>
                    </div>
                    <input type="hidden" name="profile" value="edit_providers">
                </form>

            </div>
        </div>
    </div>

    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> Данные логиста</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">

                <form action="" method="post" class="form-horizontal">
                    <div class="form-group <?= (!empty(form_error('pro_last_name_logist')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="lastName">Фамилия логиста:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text"
                                   value="<?= !empty(set_value('pro_last_name_logist')) ? set_value('pro_last_name_logist') : $providers->pro_last_name_logist; ?>"
                                   class="form-control" name="pro_last_name_logist" id="lastName"
                                   placeholder="Введите фамилию логиста">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_name_logist')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="firstName">Имя логиста:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text"
                                   value="<?= !empty(set_value('pro_name_logist')) ? set_value('pro_name_logist') : $providers->pro_name_logist; ?>"
                                   class="form-control"
                                   name="pro_name_logist" id="firstName" placeholder="Введите имя логиста">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_father_name_logist')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="fatherName">Отчество логиста:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text"
                                   value="<?= !empty(set_value('pro_father_name_logist')) ? set_value('pro_father_name_logist') : $providers->pro_father_name_logist; ?>"
                                   class="form-control" name="pro_father_name_logist" id="fatherName"
                                   placeholder="Введите отчество логиста">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_phone_logist')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="phoneNumber">Телефон логиста:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="tel"
                                   value="<?= !empty(set_value('pro_phone_logist')) ? set_value('pro_phone_logist') : $providers->pro_phone_logist; ?>"
                                   class="form-control"
                                   name="pro_phone_logist" id="phoneNumber" placeholder="Введите номер телефона">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_email_logist')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="inputEmail">Email логиста:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="email"
                                   value="<?= !empty(set_value('pro_email_logist')) ? set_value('pro_email_logist') : $providers->pro_email_logist; ?>"
                                   class="form-control" name="pro_email_logist" id="inputEmail" placeholder="Email">
                        </div>
                    </div>

                    <input type="hidden" name="profile" value="edit_logist">
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
                    <div class="form-group <? /*= (!empty(form_error('pro_password')) ? 'has-error' : '') */ ?>">
                        <label class="control-label col-xs-12 col-md-3" for="inputPassword">Пароль:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="password" class="form-control" name="pro_password" id="inputPassword"
                                   placeholder="Введите пароль">
                        </div>
                    </div>
                    <div class="form-group <? /*= (!empty(form_error('passconf')) ? 'has-error' : '') */ ?>">
                        <label class="control-label col-xs-12 col-md-3" for="confirmPassword">Подтвердите
                            пароль:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="password" class="form-control" name="passconf" id="confirmPassword"
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

    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-home"></i> Адрес поставщика</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">

                <form action="" method="post" class="form-horizontal">
                    <div class="form-group <?= (!empty(form_error('pro_organization')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="postalAddress">Адрес поставщика:</label>
                        <div class="col-xs-12 col-md-3">
                            <label for="pro_id_country">Страна</label>
                            <select value="<?php echo set_value('pro_id_country'); ?>" class="form-control country"
                                    name="pro_id_country" <?= (!empty(form_error('pro_id_city')) ? 'has-error' : '') ?>>
                                <?php foreach ($country as $item) { ?>
                                    <option value="<?= $item->cou_id; ?>"><?= trim($item->cou_name); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <label for="postalAddress">Область</label>
                            <select name="pro_region" class="form-control region"></select>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <label for="pro_id_city">Город:</label>
                            <select value="<?php echo set_value('pro_id_city'); ?>" class="form-control city"
                                    name="pro_id_city" <?= (!empty(form_error('pro_id_city')) ? 'has-error' : '') ?>>
                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-xs-12 col-md-3" for="postalAddress">&nbsp;</label>
                        <div class="col-xs-12 col-md-3 <?= (!empty(form_error('pro_street')) ? 'has-error' : '') ?>">
                            <label for="pro_street">Улица:</label>
                            <input type="text" value="<?php echo set_value('pro_street'); ?>" class="form-control"
                                   name="pro_street" id="" placeholder="Улица">
                        </div>
                        <div class="col-xs-12 col-md-3 <?= (!empty(form_error('pro_building')) ? 'has-error' : '') ?>">
                            <label for="pro_building">Номер дома:</label>
                            <input type="text" value="<?php echo set_value('pro_building'); ?>" class="form-control"
                                   name="pro_building" id="" placeholder="Номер дома">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label col-xs-12 col-md-3" for="postalAddress">&nbsp;</label>

                        <div class="col-xs-12 col-md-3 <?= (!empty(form_error('pro_room')) ? 'has-error' : '') ?>">
                            <label for="pro_room">Кв./Офис:</label>
                            <input type="text" value="<?php echo set_value('pro_room'); ?>" class="form-control"
                                   name="pro_room" id="" placeholder="Кв./Офис">
                        </div>
                        <div class="col-xs-12 col-md-3 <?= (!empty(form_error('pro_intercom')) ? 'has-error' : '') ?>">
                            <label for="pro_intercom">Домофон:</label>
                            <input type="text" value="<?php echo set_value('pro_intercom'); ?>" class="form-control"
                                   name="pro_intercom" id="" placeholder="Домофон">
                        </div>
                        <div
                            class="col-xs-12 col-md-3 <?= (!empty(form_error('pro_destonation')) ? 'has-error' : '') ?>">
                            <label for="pro_destonation">Заезд:</label>
                            <input type="text" value="<?php echo set_value('pro_destonation'); ?>" class="form-control"
                                   name="pro_destonation" id="" placeholder="Заезд">
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
                <h2><i class="glyphicon glyphicon-flag"></i> Регионы доставки</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <form action="" method="post" class="form-horizontal">


                    <? //= (!empty(form_error('pro_organization')) ? 'has-error' : '') ?>
                    <label for="postalAddress">
                        <a href="#myModalregion" data-toggle="modal" class="btn btn-info"> <i
                                class="glyphicon glyphicon-plus"></i> Добавить регион</a>
                    </label>

                    <div class="form-group">
                        <div class="col-xs-12">
                            <table class=" responsive nowrap dataTable no-footer table-bordered table-hover
                            " id="clients" width="100%"
                                   style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>Страна</th>
                                    <th>Область</th>
                                    <th>Город</th>
                                    <th>Район</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
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
                <h2><i class="glyphicon glyphicon-time"></i> График работы</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">

                <form action="" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="selectError1">Время приема заказов <i
                                class="glyphicon glyphicon-time"></i>:</label>
                        <div class="col-xs-12 col-md-4">
                            <label for="">Начало работы:</label>
                            <input type="time" name="pro_time_receive_orders_begin" class="form-control" value="09:30">
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <label for="">Окончание работы</label>
                            <input type="time" name="pro_time_receive_orders_end" class="form-control" value="16:30">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="selectError1">Дни приема заказов <i
                                class="glyphicon glyphicon-calendar"></i>:</label>
                        <div class="col-xs-12 col-md-9">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_reception_orders[]" value="1"> ПН
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_reception_orders[]" value="2"> ВТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_reception_orders[]" value="3"> СР
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_reception_orders[]" value="4"> ЧТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_reception_orders[]" value="5"> ПТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_reception_orders[]" value="6"> СБ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_reception_orders[]" value="7"> ВС
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="selectError1">Время доставки заказов <i
                                class="glyphicon glyphicon-time"></i>:</label>
                        <div class="col-xs-12 col-md-4">
                            <label for="">Начало работы:</label>
                            <input type="time" class="form-control" value="09:30" name="pro_time_delivery_orders_begin">
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <label for="">Окончание работы</label>
                            <input type="time" class="form-control" value="16:30" name="pro_time_delivery_orders_end">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="selectError1">Дни доставки заказов <i
                                class="glyphicon glyphicon-calendar"></i>:</label>
                        <div class="col-xs-12 col-md-9">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_delivery_orders[]" value="1"> ПН
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_delivery_orders[]" value="2"> ВТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_delivery_orders[]" value="3"> СР
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_delivery_orders[]" value="4"> ЧТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_delivery_orders[]" value="5"> ПТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_delivery_orders[]" value="6"> СБ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_delivery_orders[]" value="7"> ВС
                                        </label>
                                    </div>

                                </div>
                            </div>
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

</div>