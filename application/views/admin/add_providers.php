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
                <h2><i class="glyphicon glyphicon-edit"></i> Добавить поставщика</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <?php echo validation_errors(); ?>
                <form action="" method="post" class="form-horizontal">
                    <div class="form-group <?= (!empty(form_error('pro_organization')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="lastName">Организация/ЧП:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text" value="<?php echo set_value('pro_organization'); ?>" class="form-control"
                                   name="pro_organization" id="lastName" placeholder="Введите название организации/ЧП">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_last_name')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="lastName">Фамилия руководителя:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text" value="<?php echo set_value('pro_last_name'); ?>" class="form-control"
                                   name="pro_last_name" id="lastName" placeholder="Введите фамилию руководителя">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_name')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="firstName">Имя руководителя:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text" value="<?php echo set_value('pro_name'); ?>" class="form-control"
                                   name="pro_name" id="firstName" placeholder="Введите имя руководителя">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_father_name')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="fatherName">Отчество руководителя:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text" value="<?php echo set_value('pro_father_name'); ?>" class="form-control"
                                   name="pro_father_name" id="fatherName" placeholder="Введите отчество руководителя">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_phone')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="phoneNumber">Телефон руководителя:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="tel" value="<?php echo set_value('pro_phone'); ?>" class="form-control"
                                   name="pro_phone" id="phoneNumber" placeholder="Введите номер телефона">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_email')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="inputEmail">Email руководителя:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="email" value="<?php echo set_value('pro_email'); ?>" class="form-control"
                                   name="pro_email" id="inputEmail" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_last_name_logist')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="lastName">Фамилия логиста:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text" value="<?php echo set_value('pro_last_name_logist'); ?>"
                                   class="form-control" name="pro_last_name_logist" id="lastName"
                                   placeholder="Введите фамилию логиста">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_name_logist')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="firstName">Имя логиста:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text" value="<?php echo set_value('pro_name_logist'); ?>" class="form-control"
                                   name="pro_name_logist" id="firstName" placeholder="Введите имя логиста">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_father_name_logist')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="fatherName">Отчество логиста:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text" value="<?php echo set_value('pro_father_name_logist'); ?>"
                                   class="form-control" name="pro_father_name_logist" id="fatherName"
                                   placeholder="Введите отчество логиста">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_phone_logist')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="phoneNumber">Телефон логиста:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="tel" value="<?php echo set_value('pro_phone_logist'); ?>" class="form-control"
                                   name="pro_phone_logist" id="phoneNumber" placeholder="Введите номер телефона">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_email_logist')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="inputEmail">Email логиста:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="email" value="<?php echo set_value('pro_email_logist'); ?>"
                                   class="form-control" name="pro_email_logist" id="inputEmail" placeholder="Email">
                        </div>
                    </div><!--
                    <div class="form-group <?/*= (!empty(form_error('pro_password')) ? 'has-error' : '') */?>">
                        <label class="control-label col-xs-12 col-md-3" for="inputPassword">Пароль:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="password" class="form-control" name="pro_password" id="inputPassword"
                                   placeholder="Введите пароль">
                        </div>
                    </div>
                    <div class="form-group <?/*= (!empty(form_error('passconf')) ? 'has-error' : '') */?>">
                        <label class="control-label col-xs-12 col-md-3" for="confirmPassword">Подтвердите
                            пароль:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="password" class="form-control" name="passconf" id="confirmPassword"
                                   placeholder="Введите пароль ещё раз">
                        </div>
                    </div>-->
                    <div class="form-group <?= (!empty(form_error('pro_comments')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="postalAddress">Примечание:</label>
                        <div class="col-xs-12 col-md-9">
                            <textarea rows="3" class="form-control" name="pro_comments" id="postalAddress"
                                      placeholder="Примечание доступно только менеджеру"></textarea>
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_organization')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="postalAddress">Адрес поставщика:</label>
                        <div class="col-xs-12 col-md-4">
                            <label for="pro_id_country">Страна</label>
                            <select value="<?php echo set_value('pro_id_country'); ?>" class="form-control country"
                                    name="pro_id_country" <?= (!empty(form_error('pro_id_city')) ? 'has-error' : '') ?>>
                                <?php foreach ($country as $item) { ?>
                                    <option value="<?= $item->cou_id; ?>"><?= trim($item->cou_name); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-5">
                            <label for="postalAddress">Область</label>
                            <select class="form-control region">

                            </select>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-xs-12 col-md-3" for="postalAddress">&nbsp;</label>

                        <div class="col-xs-12 col-md-3">
                            <label for="pro_id_city">Город:</label>
                            <select value="<?php echo set_value('pro_id_city'); ?>" class="form-control city"
                                    name="pro_id_city" <?= (!empty(form_error('pro_id_city')) ? 'has-error' : '') ?>>
                                <?php foreach ($city as $item) { ?>
                                    <option value="<?= $item->cit_id; ?>"><?= trim($item->cit_name); ?></option>
                                <?php } ?>
                            </select>
                        </div>
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

                    <!--                    <div class="form-group -->
                    <? //= (!empty(form_error('pro_organization')) ? 'has-error' : '') ?><!--">-->
                    <!--                        <label class="control-label col-xs-12 col-md-3" for="selectError1">Регионы доставки:</label>-->
                    <!--                        <label class="control-label col-xs-12 col-md-9 text-left" for="postalAddress">-->
                    <!--                            <a href="#myModalregion" data-toggle="modal" class="btn btn-info">  <i class="glyphicon glyphicon-plus"></i> Добавить регион</a></a>-->
                    <!--                        </label>-->
                    <!--                    </div>-->
                    <!--                    <div class="form-group">-->
                    <!--                        <div class="col-xs-12">-->
                    <!--                        <table class=" responsive nowrap dataTable no-footer table-bordered table-hover-->
                    <!--                        " id="clients" width="100%"-->
                    <!--                        style="width: 100%;">-->
                    <!--                        <thead>-->
                    <!--                        <tr>-->
                    <!--                            <th>Страна</th>-->
                    <!--                            <th>Область</th>-->
                    <!--                            <th>Город</th>-->
                    <!--                            <th>Район</th>-->
                    <!--                        </tr>-->
                    <!--                        </thead>-->
                    <!--                        <tbody>-->
                    <!--                        </tbody>-->
                    <!--                        </table>-->
                    <!--                    </div>-->
                    <!--            </div>-->
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
                                            <input type="checkbox" name="pro_days_reception_orders[]" value="3"> ВТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_reception_orders[]" value="5"> СР
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_reception_orders[]" value="7"> ЧТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_reception_orders[]" value="9"> ПТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_reception_orders[]" value="11"> СБ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_reception_orders[]" value="13"> ВС
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
                                            <input type="checkbox" name="pro_days_delivery_orders[]" value="3"> ВТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_delivery_orders[]" value="5"> СР
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_delivery_orders[]" value="7"> ЧТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_delivery_orders[]" value="9"> ПТ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_delivery_orders[]" value="11"> СБ
                                        </label>
                                    </div>
                                    <div class="checkbox col-xs-12 col-md-1">
                                        <label>
                                            <input type="checkbox" name="pro_days_delivery_orders[]" value="13"> ВС
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('agree')) ? 'has-error' : '') ?>">
                        <div class="col-xs-offset-3 col-xs-9">
                            <label class="checkbox-inline">
                                <input type="checkbox" name="agree" value="agree"> Я согласен с <a
                                    href="#">условиями</a>.
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
                    <input type="hidden" name="delivery_city">
                </form>
            </div>
        </div>
    </div>
    <!--/span-->

</div>

<!--<div class="modal fade" id="myModalregion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Удаление района</h3>
            </div>
            <div class="modal-body"> 
                <form id="Form_provider_district">
                    <div class="form-group">
                        <label for="country">Страна:</label>
                        <select class="form-control country" id="country" name="dis_id_country">
                            <?php /*foreach ($country as $item) { */ ?>
                                <option value="<? /*= $item->cou_id; */ ?>"><? /*= trim($item->cou_name); */ ?></option>
                            <?php /*} */ ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="region">Область:</label>
                        <select class="form-control region" id="region" name="dis_id_region">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="city">Город:</label>
                        <select class="form-control city" id="city" name="dis_id_city">
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="region">Введите название района:</label>
                        <select class="form-control district" id="city" name="dis_id_city">
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                        <a href="#" class="btn btn-primary" id="Form_district_submit"
                           data-dismiss="modal">Сохранить</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
-->
<script>
    $(document).ready(function () {
        $('#selectError1').on('change', function () {
            $('#delivery_city').val($("#selectError1").chosen().val());
        });

        var table;
        //datatables
        table = $('#clients').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('admin/ajax_location')?>", "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {

                    "targets": [0], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],
            "oLanguage": {
                "sProcessing": "<div id='Searching_Modal' class='modal' data-backdrop='static' data-keyboard='false' tabindex='-1' role='dialog' aria-hidden='true' style='display: block;padding-top:15%;overflow-y:visible;'><div class='modal-dialog modal-sm'><div class='modal-content'><div class='modal-header'><h3 style='margin:0;'>Загрузка данных...</h3></div><div class='modal-body' style='padding: 10px !important;'><div class='progress progress-striped active' style='margin-bottom:0;'><div class='progress-bar' style='width: 100%'></div></div></div></div></div></div>"
            }
        });

    });
</script>