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
                            <select class="form-control" name="year">
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
                            <a class="btn btn-primary ajaxSaveClientForm">Сохранить</a>
                        </div>
                    </div>
                    <input type="hidden" name="profile" value="edit_user"/>
                </form>

            </div>
        </div>
    </div>



</div>

