<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 08.02.2017
 * Time: 15:10
 */
?>
<div class="col-xs-12 col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title"><?= $prd_title ?> <span
                    class="float-right-1"> <i
                        class="glyphicon glyphicon-star"></i><i
                        class="glyphicon glyphicon-star"></i></span></h3>
            <!-- Вытягиваем наименование товара/Торговая марка-->
        </div>
        <div class="panel-body">
            <div class="img-responsive col-xs-12 col-md-2">
                <img width="220" src="<?= (!empty($prd_file)) ? '/uploads/' . $prd_file : '/assets/img/no_photo.png' ?>"
                     alt="Event 2"
                     class="img-responsive center-block">
            </div>
            <div class="col-xs-12 col-md-10">
                <div class="col-xs-12 col-md-2">
                    <h5>Цена <span class="badge"><?= $prd_price ?> грн</span></h5>
                    <h5>Объем <span class="badge"><?= $prd_volume_price ?> л</span></h5>
                </div>
                <div class="col-xs-12 col-md-4">
                    <h5>Поставщик <span class="badge">ЧП <?= $use_organization ?></span></h5>
                    <h5>Рейтинг поставщика <!--<i class="glyphicon glyphicon-star"></i>-->
                    </h5>
                </div>
                <div class="col-xs-12 col-md-6">
                    <label for=""> Количество </label>
                    <div class="input-group  col-md-4">
                         <span class="input-group-btn">
                             <button  class="btn btn-primary minus"
                                     type="button">-
                             </button>
                         </span>
                        <input id="" type="text" class="form-control text-center calc" value="1">
                        <span class="input-group-btn">
                            <button class="btn btn-info plus"
                             type="button">+
                            </button>
                        </span>
                    </div><!-- /input-group -->

                </div>
                <div class=" col-xs-12 col-md-10">
                    <?= $prd_description; ?>
                </div>
                <div class="col-xs-12 col-md-12">
                    <a href="#" class="btn btn-primary add_order_item" data-id="<?= $prd_id ?>" data-toggle="modal"><i
                            class="glyphicon glyphicon-shopping-cart"></i>Добавить
                        в заказ</a>
                </div>
            </div>
        </div>
    </div>
</div>
