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
                <div class="col-md-12 alert alert-success hide alertSaveClientForm" role="alert"><?= $success ?></div>
                <form action="" id="SaveClientForm" method="post" class="form-horizontal">
                    <div class="form-group <?= (!empty(form_error('use_organization')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="lastName">Организация/ЧП:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text"
                                   value="<?= !empty(set_value('use_organization')) ? set_value('use_organization') : $providers->use_organization; ?>"
                                   class="form-control"
                                   name="use_organization" id="lastName" placeholder="Введите название организации/ЧП">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('use_last_name')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="lastName">Фамилия руководителя:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text"
                                   value="<?= !empty(set_value('use_last_name')) ? set_value('use_last_name') : $providers->use_last_name; ?>"
                                   class="form-control"
                                   name="use_last_name" id="lastName" placeholder="Введите фамилию руководителя">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('use_name')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="firstName">Имя руководителя:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text"
                                   value="<?= !empty(set_value('use_name')) ? set_value('use_name') : $providers->use_name; ?>"
                                   class="form-control"
                                   name="use_name" id="firstName" placeholder="Введите имя руководителя">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('use_father_name')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="fatherName">Отчество руководителя:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text"
                                   value="<?= !empty(set_value('use_father_name')) ? set_value('use_father_name') : $providers->use_father_name; ?>"
                                   class="form-control"
                                   name="use_father_name" id="fatherName" placeholder="Введите отчество руководителя">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('use_phone')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="phoneNumber">Телефон руководителя:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="tel"
                                   value="<?= !empty(set_value('use_phone')) ? set_value('use_phone') : $providers->use_phone; ?>"
                                   class="form-control"
                                   name="use_phone" id="phoneNumber" placeholder="Введите номер телефона">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('use_email')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="inputEmail">Email руководителя:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="email"
                                   value="<?= !empty(set_value('use_email')) ? set_value('use_email') : $providers->use_email; ?>"
                                   class="form-control"
                                   name="use_email" id="inputEmail" readonly placeholder="Email">
                        </div>
                    </div>
                    <br/>
                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-9">
                            <a class="btn btn-primary ajaxSaveClientForm"> Сохранить</a>
                        </div>
                    </div>
                    <input type="hidden" name="profile" value="edit_user"/>
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
                <div class="col-md-12 alert alert-success hide alertSaveLogistForm" role="alert"><?= $success ?></div>
                <form action="" id="SaveLogistForm" method="post" class="form-horizontal">
                    <div class="form-group <?= (!empty(form_error('use_last_name_logist')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="lastName">Фамилия логиста:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text"
                                   value="<?= !empty(set_value('use_last_name_logist')) ? set_value('use_last_name_logist') : $providers->use_last_name_logist; ?>"
                                   class="form-control" name="use_last_name_logist" id="lastName"
                                   placeholder="Введите фамилию логиста">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('use_name_logist')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="firstName">Имя логиста:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text"
                                   value="<?= !empty(set_value('use_name_logist')) ? set_value('use_name_logist') : $providers->use_name_logist; ?>"
                                   class="form-control"
                                   name="use_name_logist" id="firstName" placeholder="Введите имя логиста">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('use_father_name_logist')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="fatherName">Отчество логиста:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text"
                                   value="<?= !empty(set_value('use_father_name_logist')) ? set_value('use_father_name_logist') : $providers->use_father_name_logist; ?>"
                                   class="form-control" name="use_father_name_logist" id="fatherName"
                                   placeholder="Введите отчество логиста">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('use_phone_logist')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="phoneNumber">Телефон логиста:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="tel"
                                   value="<?= !empty(set_value('use_phone_logist')) ? set_value('use_phone_logist') : $providers->use_phone_logist; ?>"
                                   class="form-control"
                                   name="use_phone_logist" id="phoneNumber" placeholder="Введите номер телефона">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('use_email_logist')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="inputEmail">Email логиста:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="email"
                                   value="<?= !empty(set_value('use_email_logist')) ? set_value('use_email_logist') : $providers->use_email_logist; ?>"
                                   class="form-control" name="use_email_logist" id="inputEmail" placeholder="Email">
                        </div>
                    </div>

                    <input type="hidden" name="profile" value="edit_user"/>
                    <br/>
                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-9">
                            <a class="btn btn-primary ajaxSaveLogistForm"> Сохранить</a>
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
                <div class="col-md-12 alert alert-success hide alertSaveSchedule" role="alert"><?= $success ?></div>
                <form action="" method="post" id="SaveSchedule" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="selectError1">Время приема заказов <i
                                class="glyphicon glyphicon-time"></i>:</label>
                        <div class="col-xs-12 col-md-4">
                            <label for="">Начало работы:</label>
                            <input type="time" name="use_time_receive_orders_begin" class="form-control"
                                   value="<?= !empty(set_value('use_time_receive_orders_begin')) ? set_value('use_time_receive_orders_begin') : $providers->use_time_receive_orders_begin; ?>">
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <label for="">Окончание работы</label>
                            <input type="time" name="use_time_receive_orders_end" class="form-control"
                                   value="<?= !empty(set_value('use_time_receive_orders_end')) ? set_value('use_time_receive_orders_end') : $providers->use_time_receive_orders_end; ?>">
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
                                            <input type="checkbox" name="use_days_reception_orders[]" value="1"> ПН
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="use_days_reception_orders[]" value="2"> ВТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="use_days_reception_orders[]" value="3"> СР
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="use_days_reception_orders[]" value="4"> ЧТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="use_days_reception_orders[]" value="5"> ПТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="use_days_reception_orders[]" value="6"> СБ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="use_days_reception_orders[]" value="7"> ВС
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
                            <input type="time" class="form-control"
                                   value="<?= !empty(set_value('use_time_delivery_orders_begin')) ? set_value('use_time_delivery_orders_begin') : $providers->use_time_delivery_orders_begin; ?>"
                                   name="use_time_delivery_orders_begin">
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <label for="">Окончание работы</label>
                            <input type="time" class="form-control"
                                   value="<?= !empty(set_value('use_time_delivery_orders_end')) ? set_value('use_time_delivery_orders_end') : $providers->use_time_delivery_orders_end; ?>"
                                   name="use_time_delivery_orders_end">
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
                                            <input
                                                type="checkbox" <? (strpos($providers->use_days_reception_orders, '1') > 0) ? 'checked' : ''; ?>
                                                name="use_days_delivery_orders[]" value="1"> ПН
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="use_days_delivery_orders[]" value="2"> ВТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="use_days_delivery_orders[]" value="3"> СР
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="use_days_delivery_orders[]" value="4"> ЧТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="use_days_delivery_orders[]" value="5"> ПТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="use_days_delivery_orders[]" value="6"> СБ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="use_days_delivery_orders[]" value="7"> ВС
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="profile" value="edit_schedule"/>
                    <br/>
                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-9">
                            <a class="btn btn-primary ajaxSaveSchedule">Сохранить</a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>