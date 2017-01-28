<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 22.01.2017
 * Time: 11:54
 */
?>

<div class="row">
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
                <div class="col-md-12 alert alert-success hide alertSaveFormNewPassword" role="alert"></div>
                <form action="" method="post" class="form-horizontal" id="saveFormNewPassword">
                    <div class="form-group <?= (!empty(form_error('use_email')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-12 col-md-3" for="inputEmail">Email*:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="email" readonly name="use_email"
                                   value="<?= !empty(set_value('use_email')) ? set_value('use_email') : $clients->use_email; ?>"
                                   class="form-control" id="inputEmail" placeholder="Email">
                        </div>

                    </div>
                    <div class="form-group <?= (!empty(form_error('use_password')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="inputPassword">Пароль*:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="password" name="old_password" value="" class="form-control" id="inputPassword"
                                   placeholder="Введите пароль">
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('use_password')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="inputPassword">Новый пароль*:</label>
                        <div class="col-xs-12 col-md-9">
                            <input type="password" name="new_password" value="" class="form-control" id="inputPassword"
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
                            <a href="#" class="btn btn-primary ajaxSaveNewPassword">Сохранить</a>
                        </div>
                    </div>
                    <input type="hidden" name="profile" value="saveNewPassword"/>
                </form>

            </div>
        </div>
    </div>
</div>
