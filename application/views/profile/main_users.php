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
                <h2><i class="glyphicon glyphicon-user"></i> Основное</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="col-md-12 alert alert-success hide alertSaveClientForm" role="alert"><?= $success ?></div>
                <form action="" method="post" id="SaveClientForm" class="form-horizontal">
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
                        <label class="control-label col-xs-12 col-md-3" for="fatherName">Отчество:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text" name="use_father_name"
                                   value="<?= !empty(set_value('use_father_name')) ? set_value('use_father_name') : $clients->use_father_name; ?>"
                                   class="form-control"
                                   id="fatherName" placeholder="Введите отчество">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3">Пол*:</label>
                        <div class="col-xs-12 col-md-2">
                            <label class="radio-inline">
                                <input type="radio"
                                       name="use_male"
                                    <?php if (!empty(set_value('use_male'))) {
                                        echo set_value('use_male');
                                    } elseif ($clients->use_male == 1) echo 'checked'; ?>

                                       value="1"> Мужской
                            </label>
                        </div>
                        <div class="col-xs-1 col-md-2">
                            <label class="radio-inline">
                                <input type="radio"
                                       name="use_male"
                                    <?php if (!empty(set_value('use_male'))) {
                                        echo set_value('use_male');
                                    } elseif ($clients->use_male == 2) echo 'checked'; ?>
                                       value="2"> Женский
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3">Дата рождения:</label>
                        <div class="col-xs-12 col-md-3">
                            <label for="day">День:</label>
                            <select class="form-control" name="day">
                                <?php for ($i = 1; $i <= 31; $i++) { ?>
                                    <option <?= (isset($clients->use_birthday) && (int)date('d', strtotime($clients->use_birthday)) == $i) ? 'selected' : '' ?>
                                        value="<?= $i ?>"><?= number_format($i, 0, '', ''); ?></option>
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
                                    <option <?= (isset($clients->use_birthday) && (int)date('m', strtotime($clients->use_birthday)) == $i + 1) ? 'selected' : '' ?>
                                        value="<?= $i + 1 ?>"><?= $month_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <label for="yaer">Год:</label>
                            <select class="form-control" name="year">
                                <?php for ($i = (int)date('Y') - 16; $i >= (int)date('Y') - 58; $i--) { ?>
                                    <option <?= (isset($clients->use_birthday) && (int)date('Y', strtotime($clients->use_birthday)) == $i) ? 'selected' : '' ?>
                                        value="<?= $i ?>"><?= number_format($i, 0, '', ''); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('use_phone')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="phoneNumber">Телефон*:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text" class="customer_phone"
                                   value="<?= !empty($clients->use_phone) ? $clients->use_phone : '38'; ?>" size="25"
                                   name="use_phone"><br>
                            <input type="checkbox" class="phone_mask" checked style="display: none;">
                            <label class="descr" for="phone_mask">Маска ввода</label>
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('use_phone')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="phoneNumber">Телефон доп.:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="text" class="customer_phone"
                                   value="<?= !empty($clients->use_phone_addon) ? $clients->use_phone_addon : '38'; ?>"
                                   size="25"
                                   name="use_phone_addon"><br>
                            <input type="checkbox" class="phone_mask" checked style="display: none;">
                            <label class="descr" for="phone_mask">Маска ввода</label>
                        </div>
                    </div>
                    <br/>
                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-9">
                            <a class="btn btn-primary ajaxSaveClientForm">Сохранить</a>
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
                <h2><i class="glyphicon glyphicon-user"></i> Адрес </h2>
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
                                    <option <?= ($clients->use_id_country == $item->cou_id) ? 'selected' : '' ?>
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
                                   value="<?= !empty(set_value('use_street')) ? set_value('use_street') : $clients->use_street; ?>"
                                   class="form-control"
                                   name="use_street" id="" placeholder="Улица">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="use_building" class="control-label col-xs-12 col-md-3">Номер дома:</label>
                        <div class="col-xs-12 col-md-3 <?= (!empty(form_error('use_building')) ? 'has-error' : '') ?>">
                            <input type="text"
                                   value="<?= !empty(set_value('use_building')) ? set_value('use_building') : $clients->use_building; ?>"
                                   class="form-control"
                                   name="use_building" id="" placeholder="Номер дома">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="use_room" class="control-label col-xs-12 col-md-3">Кв./Офис:</label>
                        <div class="col-xs-12 col-md-3 <?= (!empty(form_error('use_room')) ? 'has-error' : '') ?>">
                            <input type="text"
                                   value="<?= !empty(set_value('use_room')) ? set_value('use_room') : $clients->use_room; ?>"
                                   class="form-control"
                                   name="use_room" id="" placeholder="Кв./Офис">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="use_intercom" class="control-label col-xs-12 col-md-3">Домофон:</label>
                        <div class="col-xs-12 col-md-3 <?= (!empty(form_error('use_intercom')) ? 'has-error' : '') ?>">
                            <input type="text"
                                   value="<?= !empty(set_value('use_intercom')) ? set_value('use_intercom') : $clients->use_intercom; ?>"
                                   class="form-control"
                                   name="use_intercom" id="" placeholder="Домофон">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="use_destonation" class="control-label col-xs-12 col-md-3">Заезд:</label>
                        <div
                            class="control-label col-xs-12 col-md-3 <?= (!empty(form_error('use_destonation')) ? 'has-error' : '') ?>">
                            <input type="text"
                                   value="<?= !empty(set_value('use_destonation')) ? set_value('use_destonation') : $clients->use_destonation; ?>"
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

</div>

<?php if (!empty($clients->use_id_region)) { ?>
    <script>
        $(document).ready(function () {

            $('.region').on('chosen:ready', function (evt, params) {
                $(".region").val('<?=$clients->use_id_region?>').trigger("chosen:updated");
            });
            $('.city').on('chosen:ready', function (evt, params) {
                $(".city").val('<?=$clients->use_id_city?>').trigger("chosen:updated");
            });
        });
    </script>
<?php } ?>

<script>

</script>
