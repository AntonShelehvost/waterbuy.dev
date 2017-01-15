<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 24.12.2016
 * Time: 18:41
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
                <h2><i class="glyphicon glyphicon-edit"></i> Редактировать поставщика</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <?= validation_errors(); ?>
                <?php if (!$providers) { ?>
                    <img src="/assets/img/not_found.png" class="img-rounded">
                    <span class="help-inline">  К сожелению по вашему запросу данные о поставщике отствуют.</span>
                <?php } else { ?>
                    <form action="" method="post" class="form-horizontal">
                        <div class="form-group <?= (!empty(form_error('pro_organization')) ? 'has-error' : '') ?>">
                            <label class="control-label col-xs-3" for="lastName">Организация/ЧП:</label>
                            <div class="col-xs-9">
                                <input type="text"
                                       value="<?= !empty(set_value('pro_organization')) ? set_value('pro_organization') : $providers->pro_organization; ?>"
                                       class="form-control" name="pro_organization" id="lastName"
                                       placeholder="Введите название организации/ЧП">
                            </div>
                        </div>
                        <div class="form-group <?= (!empty(form_error('pro_last_name')) ? 'has-error' : '') ?>">
                            <label class="control-label col-xs-3" for="lastName">Фамилия руководителя:</label>
                            <div class="col-xs-9">
                                <input type="text"
                                       value="<?= !empty(set_value('pro_last_name')) ? set_value('pro_last_name') : $providers->pro_last_name; ?>"
                                       class="form-control" name="pro_last_name" id="lastName"
                                       placeholder="Введите фамилию руководителя">
                            </div>
                        </div>
                        <div class="form-group <?= (!empty(form_error('pro_name')) ? 'has-error' : '') ?>">
                            <label class="control-label col-xs-3" for="firstName">Имя руководителя:</label>
                            <div class="col-xs-9">
                                <input type="text"
                                       value="<?= !empty(set_value('pro_name')) ? set_value('pro_name') : $providers->pro_name; ?>"
                                       class="form-control" name="pro_name" id="firstName"
                                       placeholder="Введите имя руководителя">
                            </div>
                        </div>
                        <div class="form-group <?= (!empty(form_error('pro_father_name')) ? 'has-error' : '') ?>">
                            <label class="control-label col-xs-3" for="fatherName">Отчество руководителя:</label>
                            <div class="col-xs-9">
                                <input type="text"
                                       value="<?= !empty(set_value('pro_father_name')) ? set_value('pro_father_name') : $providers->pro_father_name; ?>"
                                       class="form-control" name="pro_father_name" id="fatherName"
                                       placeholder="Введите отчество руководителя">
                            </div>
                        </div>
                        <div class="form-group <?= (!empty(form_error('pro_phone')) ? 'has-error' : '') ?>">
                            <label class="control-label col-xs-3" for="phoneNumber">Телефон руководителя:</label>
                            <div class="col-xs-9">
                                <input type="tel"
                                       value="<?= !empty(set_value('pro_phone')) ? set_value('pro_phone') : $providers->pro_phone; ?>"
                                       class="form-control" name="pro_phone" id="phoneNumber"
                                       placeholder="Введите номер телефона">
                            </div>
                        </div>
                        <div class="form-group <?= (!empty(form_error('pro_email')) ? 'has-error' : '') ?>">
                            <label class="control-label col-xs-3" for="inputEmail">Email руководителя:</label>
                            <div class="col-xs-9">
                                <input type="email"
                                       value="<?= !empty(set_value('pro_email')) ? set_value('pro_email') : $providers->pro_email; ?>"
                                       class="form-control" name="pro_email" id="inputEmail" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group <?= (!empty(form_error('pro_last_name_logist')) ? 'has-error' : '') ?>">
                            <label class="control-label col-xs-3" for="lastName">Фамилия логиста:</label>
                            <div class="col-xs-9">
                                <input type="text"
                                       value="<?= !empty(set_value('pro_last_name_logist')) ? set_value('pro_last_name_logist') : $providers->pro_last_name_logist; ?>"
                                       class="form-control" name="pro_last_name_logist" id="lastName"
                                       placeholder="Введите фамилию логиста">
                            </div>
                        </div>
                        <div class="form-group <?= (!empty(form_error('pro_name_logist')) ? 'has-error' : '') ?>">
                            <label class="control-label col-xs-3" for="firstName">Имя логиста:</label>
                            <div class="col-xs-9">
                                <input type="text"
                                       value="<?= !empty(set_value('pro_name_logist')) ? set_value('pro_name_logist') : $providers->pro_name_logist; ?>"
                                       class="form-control" name="pro_name_logist" id="firstName"
                                       placeholder="Введите имя логиста">
                            </div>
                        </div>
                        <div
                            class="form-group <?= (!empty(form_error('pro_father_name_logist')) ? 'has-error' : '') ?>">
                            <label class="control-label col-xs-3" for="fatherName">Отчество логиста:</label>
                            <div class="col-xs-9">
                                <input type="text"
                                       value="<?= !empty(set_value('pro_father_name_logist')) ? set_value('pro_father_name_logist') : $providers->pro_father_name_logist; ?>"
                                       class="form-control" name="pro_father_name_logist" id="fatherName"
                                       placeholder="Введите отчество логиста">
                            </div>
                        </div>
                        <div class="form-group <?= (!empty(form_error('pro_phone_logist')) ? 'has-error' : '') ?>">
                            <label class="control-label col-xs-3" for="phoneNumber">Телефон логиста:</label>
                            <div class="col-xs-9">
                                <input type="tel"
                                       value="<?= !empty(set_value('pro_phone_logist')) ? set_value('pro_phone_logist') : $providers->pro_phone_logist; ?>"
                                       class="form-control" name="pro_phone_logist" id="phoneNumber"
                                       placeholder="Введите номер телефона">
                            </div>
                        </div>
                        <div class="form-group <?= (!empty(form_error('pro_email_logist')) ? 'has-error' : '') ?>">
                            <label class="control-label col-xs-3" for="inputEmail">Email логиста:</label>
                            <div class="col-xs-9">
                                <input type="email"
                                       value="<?= !empty(set_value('pro_email_logist')) ? set_value('pro_email_logist') : $providers->pro_email_logist; ?>"
                                       class="form-control" name="pro_email_logist" id="inputEmail" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group <?= (!empty(form_error('pro_comments')) ? 'has-error' : '') ?>">
                            <label class="control-label col-xs-3" for="postalAddress">Примечание:</label>
                            <div class="col-xs-9">
                                <textarea rows="3" class="form-control" name="pro_comments" id="postalAddress"
                                          placeholder="Примечание доступно только менеджеру"><?= !empty(set_value('pro_comments')) ? set_value('pro_comments') : trim($providers->pro_comments); ?></textarea>
                            </div>
                        </div>
                        <div class="form-group <?= (!empty(form_error('pro_organization')) ? 'has-error' : '') ?>">
                            <label class="control-label col-xs-3" for="postalAddress">Страна:</label>
                            <div class="col-xs-12 col-md-3">

                                <select
                                    value="<?= !empty(set_value('pro_id_country')) ? set_value('pro_id_country') : $providers->pro_id_city; ?>"
                                    class="form-control country"
                                    name="pro_id_country" <?= (!empty(form_error('pro_id_country')) ? 'has-error' : '') ?>>
                                    <?php foreach ($country as $item) { ?>
                                        <option value="<?= $item->cou_id; ?>"><?= trim($item->cou_name); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-xs-12 col-md-3">
                                <label for="postalAddress">Область</label>
                                <select name="pro_id_region" class="form-control region"></select>
                            </div>
                            <div class="col-xs-12 col-md-3">
                                <label for="pro_id_city">Город:</label>
                                <select
                                    value="<?= !empty(set_value('pro_id_city')) ? set_value('pro_id_city') : $providers->pro_id_city; ?>"
                                    class="form-control city"
                                    name="pro_id_city" <?= (!empty(form_error('pro_id_city')) ? 'has-error' : '') ?>>
                                </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label class="control-label col-xs-3" for="postalAddress">Адрес:</label>

                            <div class="col-xs-3 <?= (!empty(form_error('pro_street')) ? 'has-error' : '') ?>">
                                <input type="text"
                                       value="<?= !empty(set_value('pro_street')) ? set_value('pro_street') : $providers->pro_street; ?>"
                                       class="form-control" name="pro_street" id="" placeholder="Улица">
                            </div>
                            <div class="col-xs-3 <?= (!empty(form_error('pro_building')) ? 'has-error' : '') ?>">
                                <input type="text"
                                       value="<?= !empty(set_value('pro_building')) ? set_value('pro_building') : $providers->pro_building; ?>"
                                       class="form-control" name="pro_building" id="" placeholder="Номер дома">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="label col-xs-3" for="postalAddress">&nbsp;</label>
                            <div class="col-xs-3 <?= (!empty(form_error('pro_room')) ? 'has-error' : '') ?>">
                                <input type="text"
                                       value="<?= !empty(set_value('pro_room')) ? set_value('pro_room') : $providers->pro_room; ?>"
                                       class="form-control" name="pro_room" id="" placeholder="Кв./Офис">
                            </div>
                            <div class="col-xs-3 <?= (!empty(form_error('pro_intercom')) ? 'has-error' : '') ?>">
                                <input type="text"
                                       value="<?= !empty(set_value('pro_intercom')) ? set_value('pro_intercom') : $providers->pro_intercom; ?>"
                                       class="form-control" name="pro_intercom" id="" placeholder="Домофон">
                            </div>
                            <div class="col-xs-3 <?= (!empty(form_error('pro_destonation')) ? 'has-error' : '') ?>">
                                <input type="text"
                                       value="<?= !empty(set_value('pro_destonation')) ? set_value('pro_destonation') : $providers->pro_destonation; ?>"
                                       class="form-control" name="pro_destonation" id="" placeholder="Заезд">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-12 col-md-3" for="selectError1">Время приема заказов <i
                                    class="glyphicon glyphicon-time"></i>:</label>
                            <div class="col-xs-12 col-md-4">
                                <label for="">Начало работы:</label>
                                <input type="time" name="pro_time_receive_orders_begin" class="form-control"
                                       value="<?= !empty(set_value('pro_time_receive_orders_begin')) ? date('H:i', strtotime(set_value('pro_time_receive_orders_begin'))) : date('H:i', strtotime($providers->pro_time_receive_orders_begin)); ?>">
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <label for="">Окончание работы</label>
                                <input type="time" name="pro_time_receive_orders_end" class="form-control"
                                       value="<?= !empty(set_value('pro_time_receive_orders_end')) ? date('H:i', strtotime(set_value('pro_time_receive_orders_end'))) : date('H:i', strtotime($providers->pro_time_receive_orders_end)); ?>">
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
                                                <input type="checkbox"
                                                       name="pro_days_reception_orders[]" <?= (strpos($providers->pro_days_reception_orders, '1') !== false) ? 'checked' : '' ?>
                                                       value="1"> ПН</label>
                                        </div>
                                        <div class="checkbox col-xs-12 col-md-1">
                                            <label>
                                                <input type="checkbox"
                                                       name="pro_days_reception_orders[]" <?= (strpos($providers->pro_days_reception_orders, '2') !== false) ? 'checked' : '' ?>
                                                       value="2"> ВТ
                                            </label>
                                        </div>
                                        <div class="checkbox col-xs-12 col-md-1">
                                            <label>
                                                <input type="checkbox"
                                                       name="pro_days_reception_orders[]" <?= (strpos($providers->pro_days_reception_orders, '3') !== false) ? 'checked' : '' ?>
                                                       value="3"> СР
                                            </label>
                                        </div>
                                        <div class="checkbox col-xs-12 col-md-1">
                                            <label>
                                                <input type="checkbox"
                                                       name="pro_days_reception_orders[]" <?= (strpos($providers->pro_days_reception_orders, '4') !== false) ? 'checked' : '' ?>
                                                       value="4"> ЧТ
                                            </label>
                                        </div>
                                        <div class="checkbox col-xs-12 col-md-1">
                                            <label>
                                                <input type="checkbox"
                                                       name="pro_days_reception_orders[]" <?= (strpos($providers->pro_days_reception_orders, '5') !== false) ? 'checked' : '' ?>
                                                       value="5"> ПТ
                                            </label>
                                        </div>
                                        <div class="checkbox col-xs-12 col-md-1">
                                            <label>
                                                <input type="checkbox"
                                                       name="pro_days_reception_orders[]" <?= (strpos($providers->pro_days_reception_orders, '6') !== false) ? 'checked' : '' ?>
                                                       value="6"> СБ
                                            </label>
                                        </div>
                                        <div class="checkbox col-xs-12 col-md-1">
                                            <label>
                                                <input type="checkbox"
                                                       name="pro_days_reception_orders[]" <?= (strpos($providers->pro_days_reception_orders, '7') !== false) ? 'checked' : '' ?>
                                                       value="7"> ВС
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
                                       value="<?= !empty(set_value('pro_time_delivery_orders_begin')) ? date('H:i', strtotime(set_value('pro_time_delivery_orders_begin'))) : date('H:i', strtotime($providers->pro_time_delivery_orders_begin)); ?>"
                                       name="pro_time_delivery_orders_begin">
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <label for="">Окончание работы</label>
                                <input type="time" class="form-control"
                                       value="<?= !empty(set_value('pro_time_delivery_orders_end')) ? date('H:i', strtotime(set_value('pro_time_delivery_orders_end'))) : date('H:i', strtotime($providers->pro_time_delivery_orders_end)); ?>"
                                       name="pro_time_delivery_orders_end">
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
                                                <input type="checkbox"
                                                       name="pro_days_delivery_orders[]" <?= (strpos($providers->pro_days_delivery_orders, '1') !== false) ? 'checked' : '' ?>
                                                       value="1"> ПН
                                            </label>
                                        </div>
                                        <div class="checkbox col-xs-12 col-md-1">
                                            <label>
                                                <input type="checkbox"
                                                       name="pro_days_delivery_orders[]" <?= (strpos($providers->pro_days_delivery_orders, '2') !== false) ? 'checked' : '' ?>
                                                       value="2"> ВТ
                                            </label>
                                        </div>
                                        <div class="checkbox col-xs-12 col-md-1">
                                            <label>
                                                <input type="checkbox"
                                                       name="pro_days_delivery_orders[]" <?= (strpos($providers->pro_days_delivery_orders, '3') !== false) ? 'checked' : '' ?>
                                                       value="3"> СР
                                            </label>
                                        </div>
                                        <div class="checkbox col-xs-12 col-md-1">
                                            <label>
                                                <input type="checkbox"
                                                       name="pro_days_delivery_orders[]" <?= (strpos($providers->pro_days_delivery_orders, '4') !== false) ? 'checked' : '' ?>
                                                       value="4"> ЧТ
                                            </label>
                                        </div>
                                        <div class="checkbox col-xs-12 col-md-1">
                                            <label>
                                                <input type="checkbox"
                                                       name="pro_days_delivery_orders[]" <?= (strpos($providers->pro_days_delivery_orders, '5') !== false) ? 'checked' : '' ?>
                                                       value="5"> ПТ
                                            </label>
                                        </div>
                                        <div class="checkbox col-xs-12 col-md-1">
                                            <label>
                                                <input type="checkbox"
                                                       name="pro_days_delivery_orders[]" <?= (strpos($providers->pro_days_delivery_orders, '6') !== false) ? 'checked' : '' ?>
                                                       value="6"> СБ
                                            </label>
                                        </div>
                                        <div class="checkbox col-xs-12 col-md-1">
                                            <label>
                                                <input type="checkbox"
                                                       name="pro_days_delivery_orders[]" <?= (strpos($providers->pro_days_delivery_orders, '7') !== false) ? 'checked' : '' ?>
                                                       value="7"> ВС
                                            </label>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-offset-3 col-xs-9">
                                <input type="submit" class="btn btn-primary" value="Сохранить">
                                <input type="reset" class="btn btn-default" value="Очистить форму">
                            </div>
                        </div>
                    </form>
                <?php } ?>
            </div>
        </div>
    </div>
    <!--/span-->

</div>
<script>
    $(document).ready(function () {
        var set_value = false;
        $('#selectError1').on('change', function () {
            $('#delivery_city').val($("#selectError1").chosen().val());
        });
        if (set_value == false) {
            $('.country').on('change', function () {
                if (set_value == false) {
                    $(this).val(<?=$providers->pro_id_country?>);
                    $(this).trigger("chosen:updated");
                }
            });


            $('.region').on('change', function () {
                if (set_value == false) {
                    $(this).val(<?=$providers->pro_id_region?>);
                    $(this).trigger("chosen:updated");
                }
            });

            $('.city').on('change', function () {
                if (set_value == false) {
                    $(this).val(<?=$providers->pro_id_city?>);
                    $(this).trigger("chosen:updated");
                    set_value = true;
                }
            });

        }




    });
</script>