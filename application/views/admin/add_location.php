<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 24.12.2016
 * Time: 18:41
 */
$success = $this->session->flashdata('success');
?>
<div class="row"> <!--Локация-->
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Локация</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>

                </div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" id="Form_main">
                    <div class="form-group">
                        <div class="col-xs-12 col-md-12">
                            <label class="control-label" for="postalAddress">Страна:
                                <div class="box-icon">
                                    <a href="#myModal8" data-toggle="modal"
                                       class="btn  btn-round btn-default"><i
                                            class="glyphicon glyphicon-pencil" id="button_edit_country"></i></a>
                                    <a href="#myModal9" data-toggle="modal" class="btn  btn-round btn-default"><i
                                            class="glyphicon glyphicon-plus"></i></a>
                                    <a href="#myModal10" data-toggle="modal" class="btn  btn-round btn-default"><i
                                            class="glyphicon glyphicon-minus" id="button_delete_country"></i></a>
                                </div>
                            </label>
                            <select class="form-control country">
                                <?php foreach ($country as $item) { ?>
                                    <option value="<?= $item->cou_id; ?>"><?= trim($item->cou_name); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 col-md-12">
                            <label for="postalAddress">Область:
                                <div class="box-icon">
                                    <a href="#myModal11" data-toggle="modal" class="btn  btn-round btn-default"><i
                                            class="glyphicon glyphicon-pencil" id="button_edit_region"></i></a>
                                    <a href="#myModal12" data-toggle="modal" class="btn  btn-round btn-default"><i
                                            class="glyphicon glyphicon-plus"></i></a>
                                    <a href="#myModal13" data-toggle="modal" class="btn  btn-round btn-default"><i
                                            class="glyphicon glyphicon-minus" id="button_delete_region"></i></a>
                                </div>
                            </label>
                            <select class="form-control region"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 col-md-12">
                            <label for="postalAddress">Город:
                                <div class="box-icon">
                                    <a href="#myModal14" data-toggle="modal" class="btn  btn-round btn-default"><i
                                            class="glyphicon glyphicon-pencil" id="button_edit_city"></i></a>
                                    <a href="#myModal15" data-toggle="modal" class="btn  btn-round btn-default"><i
                                            class="glyphicon glyphicon-plus"></i></a>
                                    <a href="#myModal16" data-toggle="modal" class="btn  btn-round btn-default"><i
                                            class="glyphicon glyphicon-minus" id="button_delete_city"></i></a>
                                </div>
                            </label>
                            <select class="form-control city "></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 col-md-12">
                            <label for="postalAddress">Районы:
                                <div class="box-icon">
                                    <a href="#myModal117" data-toggle="modal" class="btn  btn-round btn-default"><i
                                            class="glyphicon glyphicon-pencil" id="button_edit_district"></i></a>
                                    <a href="#myModal18" data-toggle="modal" class="btn  btn-round btn-default"><i
                                            class="glyphicon glyphicon-plus"></i></a>
                                    <a href="#myModal119" data-toggle="modal" class="btn  btn-round btn-default"><i
                                            class="glyphicon glyphicon-minus"  id="button_delete_district"></i></a>
                                </div>
                            </label>
                            <select class="form-control district"></select>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--/Страна-->
    <div class="modal fade" id="myModal9" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Добавить страну</h3>
                </div>
                <div class="modal-body"> <!--Пишем название страны-->
                    <form id="Form_country">
                        <div class="form-group">
                            <label for="postalAddress">Страна:</label>
                            <input type="text" name="cou_name" class="form-control" id="postalAddress"
                                   placeholder="Страна">
                            <div class="modal-footer">
                                <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                                <a href="#" id="Form_country_submit" class="btn btn-primary" data-dismiss="modal">Сохранить</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal8" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Редактировать страну</h3>
                </div>
                <div class="modal-body"> <!--вытягиваем название выбраной страны-->
                    <form>
                        <label for="postalAddress">Страна:</label>
                        <input type="text" class="form-control" name="cou_name" id="edit_country" placeholder="Страна">
                        <input type="hidden" name="cou_id" id="edit_cou_id">
                        <div class="modal-footer">
                            <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                            <a href="#" class="btn btn-primary ajaxSubmitForm" form_url="/admin/add_location"
                               data-dismiss="modal">Сохранить</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Удаление страны</h3>
                </div>
                <div class="modal-body"> <!--Пишем название страны-->
                    <p>Вы действительно хотите удалить запись?</p>
                    <form>
                        <input type="hidden" name="cou_id" id="delete_cou_id">
                        <div class="modal-footer">
                            <a href="#" class="btn btn-default" data-dismiss="modal">Отмена</a>
                            <a href="#" class="btn btn-primary ajaxSubmitForm" form_url="/admin/delete_location"
                               data-dismiss="modal">Да</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--/Область-->
    <div class="modal fade" id="myModal11" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Редактировать область</h3>
                </div>
                <div class="modal-body"> <!--вытягиваем название выбраной страны-->
                    <form>
                        <label for="postalAddress">Название области:</label>
                        <input type="text" class="form-control" id="edit_region" name="reg_name" placeholder="Область">
                        <input type="hidden" name="reg_id" id="edit_reg_id">
                        <div class="modal-footer">
                            <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                            <a href="#" class="btn btn-primary ajaxSubmitForm" form_url="/admin/add_location"
                               data-dismiss="modal">Сохранить</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal12" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Добавить область</h3>
                </div>
                <div class="modal-body"> <!--Пишем название страны-->
                    <form id="Form_region">
                        <div class="form-group">
                            <label for="postalAddress">Страна:</label>
                            <select class="form-control country" name="reg_id_country">
                                <?php foreach ($country as $item) { ?>
                                    <option value="<?= $item->cou_id; ?>"><?= trim($item->cou_name); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="postalAddress">Введите название области:</label>
                            <input type="text" name="reg_name" class="form-control" id="reg_name" placeholder="Область">
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                            <a href="#" id="Form_region_submit" class="btn btn-primary"
                               data-dismiss="modal">Сохранить</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal13" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Удаление области</h3>
                </div>
                <div class="modal-body"> <!--Пишем название страны-->
                    <p>Вы действительно хотите удалить запись?</p>
                    <form>
                        <input type="hidden" name="reg_id" id="delete_reg_id">
                        <div class="modal-footer">
                            <a href="#" class="btn btn-default" data-dismiss="modal">Отмена</a>
                            <a href="#" class="btn btn-primary ajaxSubmitForm" form_url="/admin/delete_location"
                               data-dismiss="modal">Да</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--/Город-->
    <div class="modal fade" id="myModal14" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Редактировать город</h3>
                </div>
                <div class="modal-body"> <!--вытягиваем название выбраной страны-->
                    <form>
                        <label for="postalAddress">Введите название города:</label>
                        <input type="text" class="form-control" name="cit_name" id="edit_city" placeholder="Город">
                        <input type="hidden" name="cit_id" id="edit_cit_id">
                        <div class="modal-footer">
                            <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                            <a href="#" class="btn btn-primary ajaxSubmitForm" form_url="/admin/add_location"
                               data-dismiss="modal">Сохранить</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal15" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Добавить город</h3>
                </div>
                <div class="modal-body"> <!--Пишем название страны-->
                    <form id="Form_city">
                        <div class="form-group">
                            <label for="postalAddress">Страна:</label>
                            <select class="form-control country" name="cit_id_country">
                                <?php foreach ($country as $item) { ?>
                                    <option value="<?= $item->cou_id; ?>"><?= trim($item->cou_name); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="postalAddress">Область:</label>
                            <select class="form-control region" name="cit_id_region"></select>
                        </div>
                        <div class="form-group">
                            <label for="postalAddress">Введите название города:</label>
                            <input type="text" class="form-control" name="cit_name" id="" placeholder="Город">
                        </div>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                            <a href="#" class="btn btn-primary" id="Form_city_submit" data-dismiss="modal">Сохранить</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="myModal16" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Удаление города</h3>
                </div>
                <div class="modal-body"> <!--Пишем название страны-->
                    <p>Вы действительно хотите удалить запись?</p>
                    <form>
                        <input type="hidden" name="cit_id" id="delete_cit_id">
                        <div class="modal-footer">
                            <a href="#" class="btn btn-default" data-dismiss="modal">Отмена</a>
                            <a href="#" class="btn btn-primary ajaxSubmitForm" form_url="/admin/delete_location"
                               data-dismiss="modal">Да</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/span-->
    <!--/Район-->
    <div class="modal fade" id="myModal117" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Редактировать район</h3>
                </div>
                <div class="modal-body"> <!--вытягиваем название выбраной страны-->
                    <form>
                        <label for="postalAddress">Введите название района:</label>
                        <input type="text" class="form-control" name="dis_name" id="edit_district" placeholder="Район">
                        <input type="hidden" name="dis_id" id="edit_dis_id">
                        <div class="modal-footer">
                            <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                            <a href="#" class="btn btn-primary ajaxSubmitForm" form_url="/admin/add_location"
                               data-dismiss="modal">Сохранить</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal18" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Добавить район</h3>
                </div>
                <div class="modal-body"> <!--Пишем название страны-->
                    <form id="Form_district">
                        <div class="form-group">
                            <label for="country">Страна:</label>
                            <select class="form-control country" id="country" name="dis_id_country">
                                <?php foreach ($country as $item) { ?>
                                    <option value="<?= $item->cou_id; ?>"><?= trim($item->cou_name); ?></option>
                                <?php } ?>
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
                            <input type="text" name="dis_name" class="form-control" id="region" placeholder="Район">
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


    <div class="modal fade" id="myModal119" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Удаление района</h3>
                </div>
                <div class="modal-body"> <!--Пишем название страны-->
                    <p>Вы действительно хотите удалить запись?</p>
                    <form>
                        <input type="hidden" name="dis_id" id="delete_dis_id">
                        <div class="modal-footer">
                            <a href="#" class="btn btn-default" data-dismiss="modal">Отмена</a>
                            <a href="#" class="btn btn-primary ajaxSubmitForm" form_url="/admin/delete_location"
                               data-dismiss="modal">Да</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Локация-->

</div>
<script>
    $(document).ready(function () {
        $('#selectError1').on('change', function () {
            $('#delivery_city').val($("#selectError1").chosen().val());
        });
    });
</script>