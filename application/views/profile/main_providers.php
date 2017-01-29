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
                            <input type="text" class="customer_phone"
                                   value="<?= !empty($clients->use_phone) ? $clients->use_phone : '38'; ?>" size="25"
                                   name="use_phone"><br>
                            <input type="checkbox" class="phone_mask" checked style="display: none;">
                            <label class="descr" for="phone_mask">Маска ввода</label>
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
                <h2><i class="glyphicon glyphicon-user"></i> Адрес поставщика</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="col-md-12 alert alert-success hide alertSaveAddressForm" role="alert"><?= $success ?></div>
                <form action="" id="SaveAddressForm" method="post" class="form-horizontal">
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="use_id_country">Страна</label>
                        <div class="col-xs-12 col-md-3">
                            <select value="<?php echo set_value('use_id_country'); ?>" class="form-control country"
                                    name="use_id_country" <?= (!empty(form_error('use_id_country')) ? 'has-error' : '') ?>>
                                <?php foreach ($country as $item) { ?>
                                    <option <?= ($providers->use_id_country == $item->cou_id) ? 'selected' : '' ?>
                                        value="<?= $item->cou_id; ?>"><?= trim($item->cou_name); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="use_id_region">Область</label>
                        <div class="col-xs-12 col-md-3">
                            <select name="use_id_region" class="form-control region"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="use_id_city">Город:</label>
                        <div class="col-xs-12 col-md-3">
                            <select value="<?php echo set_value('use_id_city'); ?>" class="form-control city"
                                    name="use_id_city" <?= (!empty(form_error('use_id_city')) ? 'has-error' : '') ?>>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="use_street">Улица:</label>
                        <div class="col-xs-12 col-md-3 <?= (!empty(form_error('use_street')) ? 'has-error' : '') ?>">
                            <input type="text"
                                   value="<?= !empty(set_value('use_street')) ? set_value('use_street') : $providers->use_street; ?>"
                                   class="form-control"
                                   name="use_street" id="" placeholder="Улица">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="use_building" class="control-label col-xs-12 col-md-3">Номер дома:</label>
                        <div class="col-xs-12 col-md-3 <?= (!empty(form_error('use_building')) ? 'has-error' : '') ?>">
                            <input type="text"
                                   value="<?= !empty(set_value('use_building')) ? set_value('use_building') : $providers->use_building; ?>"
                                   class="form-control"
                                   name="use_building" id="" placeholder="Номер дома">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="use_room" class="control-label col-xs-12 col-md-3">Кв./Офис:</label>
                        <div class="col-xs-12 col-md-3 <?= (!empty(form_error('use_room')) ? 'has-error' : '') ?>">
                            <input type="text"
                                   value="<?= !empty(set_value('use_room')) ? set_value('use_room') : $providers->use_room; ?>"
                                   class="form-control"
                                   name="use_room" id="" placeholder="Кв./Офис">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="use_intercom" class="control-label col-xs-12 col-md-3">Домофон:</label>
                        <div class="col-xs-12 col-md-3 <?= (!empty(form_error('use_intercom')) ? 'has-error' : '') ?>">
                            <input type="text"
                                   value="<?= !empty(set_value('use_intercom')) ? set_value('use_intercom') : $providers->use_intercom; ?>"
                                   class="form-control"
                                   name="use_intercom" id="" placeholder="Домофон">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="use_destonation" class="control-label col-xs-12 col-md-3">Заезд:</label>
                        <div
                            class="control-label col-xs-12 col-md-3 <?= (!empty(form_error('use_destonation')) ? 'has-error' : '') ?>">
                            <input type="text"
                                   value="<?= !empty(set_value('use_destonation')) ? set_value('use_destonation') : $providers->use_destonation; ?>"
                                   class="form-control"
                                   name="use_destonation" id="" placeholder="Заезд">
                        </div>
                    </div>
                    <input type="hidden" name="profile" value="edit_user"/>
                    <br/>
                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-9">
                            <a class="btn btn-primary ajaxSaveAddressForm"> Сохранить</a>
                        </div>
                    </div>
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
                            <input type="text" class="customer_phone"
                                   value="<?= !empty($clients->use_phone_logist) ? $clients->use_phone_logist : '38'; ?>"
                                   size="25" name="use_phone_logist"><br>
                            <input type="checkbox" class="phone_mask" checked style="display: none;">
                            <label class="descr" for="phone_mask1">Маска ввода</label>
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
                                            <input
                                                type="checkbox" <?= (strpos($providers->use_days_reception_orders, '1') > 0) ? 'checked' : ''; ?>
                                                name="use_days_reception_orders[]" value="1"> ПН
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input
                                                type="checkbox" <?= (strpos($providers->use_days_reception_orders, '2') > 0) ? 'checked' : ''; ?>
                                                name="use_days_reception_orders[]" value="2"> ВТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input
                                                type="checkbox" <?= (strpos($providers->use_days_reception_orders, '3') > 0) ? 'checked' : ''; ?>
                                                name="use_days_reception_orders[]" value="3"> СР
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input
                                                type="checkbox" <?= (strpos($providers->use_days_reception_orders, '4') > 0) ? 'checked' : ''; ?>
                                                name="use_days_reception_orders[]" value="4"> ЧТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input
                                                type="checkbox" <?= (strpos($providers->use_days_reception_orders, '5') > 0) ? 'checked' : ''; ?>
                                                name="use_days_reception_orders[]" value="5"> ПТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input
                                                type="checkbox" <?= (strpos($providers->use_days_reception_orders, '6') > 0) ? 'checked' : ''; ?>
                                                name="use_days_reception_orders[]" value="6"> СБ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input
                                                type="checkbox" <?= (strpos($providers->use_days_reception_orders, '7') > 0) ? 'checked' : ''; ?>
                                                name="use_days_reception_orders[]" value="7"> ВС
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
                                                type="checkbox" <?= (strpos($providers->use_days_delivery_orders, '1') > 0) ? 'checked' : ''; ?>
                                                name="use_days_delivery_orders[]" value="1"> ПН
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox"
                                                   <?= (strpos($providers->use_days_delivery_orders, '2') > 0) ? 'checked' : ''; ?>name="use_days_delivery_orders[]"
                                                   value="2"> ВТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input
                                                type="checkbox"<?= (strpos($providers->use_days_delivery_orders, '3') > 0) ? 'checked' : ''; ?>
                                                name="use_days_delivery_orders[]" value="3"> СР
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input
                                                type="checkbox" <?= (strpos($providers->use_days_delivery_orders, '4') > 0) ? 'checked' : ''; ?>
                                                name="use_days_delivery_orders[]" value="4"> ЧТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input
                                                type="checkbox" <?= (strpos($providers->use_days_delivery_orders, '5') > 0) ? 'checked' : ''; ?>
                                                name="use_days_delivery_orders[]" value="5"> ПТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input
                                                type="checkbox" <?= (strpos($providers->use_days_delivery_orders, '6') > 0) ? 'checked' : ''; ?>
                                                name="use_days_delivery_orders[]" value="6"> СБ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input
                                                type="checkbox" <?= (strpos($providers->use_days_delivery_orders, '7') > 0) ? 'checked' : ''; ?>
                                                name="use_days_delivery_orders[]" value="7"> ВС
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

<script>
    $(document).ready(function () {

        $('.region').on('chosen:ready', function (evt, params) {
            $(".region").val('<?=$providers->use_id_region?>').trigger("chosen:updated");
        });
        $('.city').on('chosen:ready', function (evt, params) {
            $(".city").val('<?=$providers->use_id_city?>').trigger("chosen:updated");
        });
    });
</script>
<script>
    $(document).ready(function () {
        var maskList = $.masksSort($.masksLoad("/assets/js/phone-codes.json.txt"), ['#'], /[0-9]|#/, "mask");
        var maskOpts = {
            inputmask: {
                definitions: {
                    '#': {
                        validator: "[0-9]",
                        cardinality: 1
                    }
                },
                //clearIncomplete: true,
                showMaskOnHover: false,
                autoUnmask: true
            },
            match: /[0-9]/,
            replace: '#',
            list: maskList,
            listKey: "mask",
            onMaskChange: function (maskObj, completed) {
                if (completed) {
                    var hint = maskObj.name_ru;
                    if (maskObj.desc_ru && maskObj.desc_ru != "") {
                        hint += " (" + maskObj.desc_ru + ")";
                    }
                    $(".descr").html(hint);
                } else {
                    $(".descr").html("Маска ввода");
                }
                $(this).attr("placeholder", $(this).inputmask("getemptymask"));
            }
        };

        $('.phone_mask').change(function () {
            if ($('.phone_mask').is(':checked')) {
                $('.customer_phone').inputmasks(maskOpts);
            } else {
                $('.customer_phone').inputmask("+[####################]", maskOpts.inputmask)
                    .attr("placeholder", $('.customer_phone').inputmask("getemptymask"));
                $(".descr").html("Маска ввода");
            }
        });


        $('.phone_mask').change();
    });
</script>