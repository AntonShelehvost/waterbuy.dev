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
    <?php if ($success) { ?>
        <div class="col-md-12 alert alert-success" role="alert"><?= $success ?></div>
    <?php } ?>
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Редактировать</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <?php echo validation_errors(); ?>
                <?php if (!$client) { ?>
                    <img src="/assets/img/not_found.png" class="img-rounded">
                    <span class="help-inline">  К сожелению по вашему запросу данные о клиенте отствуют</span>
                <?php } else { ?>
                    <form class="form-horizontal" method="post" action="">
                        <div class="form-group <?= (!empty(form_error('use_organization')) ? 'has-error' : '') ?>">
                            <label class="control-label col-xs-3" for="lastName">Организация/ЧП:</label>
                            <div class="col-xs-9">
                                <input type="text" name="use_organization"
                                       value="<?php echo $client->use_organization; ?>" class="form-control"
                                       id="lastName" placeholder="Введите название организации/ЧП">
                            </div>
                        </div>
                        <div class="form-group <?= (!empty(form_error('use_last_name')) ? 'has-error' : '') ?>">
                            <label class="control-label col-xs-3" for="lastName">Фамилия*:</label>
                            <div class="col-xs-9">
                                <input type="text" name="use_last_name" value="<?php echo $client->use_last_name; ?>"
                                       class="form-control" id="lastName" placeholder="Введите фамилию">
                            </div>
                        </div>
                        <div class="form-group <?= (!empty(form_error('use_name')) ? 'has-error' : '') ?>">
                            <label class="control-label col-xs-3" for="firstName">Имя*:</label>
                            <div class="col-xs-9">
                                <input type="text" name="use_name" value="<?php echo $client->use_name; ?>"
                                       class="form-control" id="firstName" placeholder="Введите имя">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" for="fatherName">Отчество:</label>
                            <div class="col-xs-9">
                                <input type="text" name="use_father_name"
                                       value="<?php echo $client->use_father_name; ?>" class="form-control"
                                       id="fatherName" placeholder="Введите отчество">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Дата рождения:</label>
                            <div class="col-xs-12 col-md-3">
                                <label for="day">День:</label>
                                <select class="form-control" name="day">
                                    <?php for ($i = 1; $i <= 31; $i++) { ?>
                                        <option <?= (isset($client->use_birthday) && (int)date('d', strtotime($client->use_birthday)) == $i) ? 'selected' : '' ?>
                                            value="<?= $i ?>"><?= number_format($i, 0, '', ''); ?>

                                        </option>
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
                                        <option <?= (isset($client->use_birthday) && (int)date('m', strtotime($client->use_birthday)) == $i + 1) ? 'selected' : '' ?>
                                            value="<?= $i + 1 ?>"><?= $month_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-xs-12 col-md-3">
                                <label for="yaer">Год:</label>
                                <select class="form-control" name="year">
                                    <?php for ($i = (int)date('Y') - 16; $i >= (int)date('Y') - 58; $i--) { ?>
                                        <option <?= (isset($client->use_birthday) && (int)date('Y', strtotime($client->use_birthday)) == $i) ? 'selected' : '' ?>
                                            value="<?= $i ?>"><?= number_format($i, 0, '', ''); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group <?= (!empty(form_error('use_email')) ? 'has-error' : '') ?>">
                            <label class="control-label col-xs-3" for="inputEmail">Email*:</label>
                            <div class="col-xs-9">
                                <span><?php echo $client->use_email; ?></span>
                            </div>
                        </div>
                        <div class="form-group <?= (!empty(form_error('use_phone')) ? 'has-error' : '') ?>">
                            <label class="control-label col-xs-3" for="phoneNumber">Телефон*:</label>
                            <div class="col-xs-9">
                                <input type="text" class="form-control" name="use_phone"
                                       value="<?php echo $client->use_phone; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" for="postalAddress">Примечание:</label>
                            <div class="col-xs-9">
                                <textarea rows="3" name="use_comments" value="<?php echo $client->use_comments; ?>"
                                          class="form-control" id="postalAddress"
                                          placeholder="Примечание доступно только менеджеру"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3" for="postalAddress">Адрес:</label>

                            <div class="col-xs-3">
                                <select class="form-control country"
                                        name="use_id_city" <?= (!empty(form_error('use_id_city')) ? 'has-error' : '') ?>>
                                    <?php foreach ($country as $item) { ?>
                                        <option <?php echo ($client->use_id_city == $item->cou_id) ? 'selected' : ''; ?>
                                            value="<?= $item->cou_id; ?>"><?= trim($item->cou_name); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <select class="form-control region"
                                        name="use_id_region" <?= (!empty(form_error('use_id_city')) ? 'has-error' : '') ?>>
                                </select>
                            </div>
                            <div class="col-xs-3">
                                <select class="form-control city"
                                        name="use_id_city" <?= (!empty(form_error('use_id_city')) ? 'has-error' : '') ?>>
                                </select>
                            </div>


                        </div>

                        <div class="form-group">
                            <label class="label col-xs-3" for="postalAddress">&nbsp;</label>

                            <div class="col-xs-3 <?= (!empty(form_error('use_street')) ? 'has-error' : '') ?>">
                                <input type="text" name="use_street" value="<?php echo $client->use_street; ?>"
                                       class="form-control" id="" placeholder="Улица*">
                            </div>
                            <div class="col-xs-3 <?= (!empty(form_error('use_building')) ? 'has-error' : '') ?>">
                                <input type="text" name="use_building" value="<?php echo $client->use_building; ?>"
                                       class="form-control" id="" placeholder="Номер дома*">
                            </div>
                            <div class="col-xs-3 <?= (!empty(form_error('use_room')) ? 'has-error' : '') ?>">
                                <input type="text" name="use_room" value="<?php echo $client->use_room; ?>"
                                       class="form-control" id="" placeholder="Кв./Офис*">
                            </div>

                        </div>
                        <div class="form-group">
                            <label class="label col-xs-3" for="postalAddress">&nbsp;</label>
                            <div class="col-xs-3">
                                <input type="text" name="use_intercom" value="<?php echo $client->use_intercom; ?>"
                                       class="form-control" id="" placeholder="Домофон">
                            </div>
                            <div class="col-xs-3">
                                <input type="text" name="use_destonation"
                                       value="<?php echo $client->use_destonation; ?>" class="form-control" id=""
                                       placeholder="Заезд">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-3">Пол*:</label>
                            <div class="col-xs-2">
                                <label class="radio-inline">
                                    <input type="radio"
                                           name="use_male" <?= ($client->use_male == 1) ? 'checked' : ""; ?> value="1">
                                    Мужской
                                </label>
                            </div>
                            <div class="col-xs-2">
                                <label class="radio-inline">
                                    <input type="radio"
                                           name="use_male" <?= ($client->use_male == 2) ? 'checked' : ""; ?> value="2">
                                    Женский
                                </label>
                            </div>
                        </div>

                        <br/>
                        <div class="form-group">
                            <div class="col-xs-offset-3 col-xs-9">
                                <input type="submit" class="btn btn-primary" value="Сохранить">
                                <input type="hidden" name="use_id" value="<?php echo $client->use_id; ?>">

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
        country =<?=$client->use_id_country?>;
        region =<?=$client->use_id_region?>;
        city =<?=$client->use_id_city?>;
        $('.country').change();
    });
</script>