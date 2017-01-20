<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 19.01.2017
 * Time: 18:05
 */
?>

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
