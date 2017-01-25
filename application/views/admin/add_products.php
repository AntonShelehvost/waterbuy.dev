<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 29.12.2016
 * Time: 23:02
 */
$success = $this->session->flashdata('success');
?>
<div class="row"><!--/row- Добавить товар-->
    <?php if ($success) { ?>
        <div class="col-md-12 alert alert-success" role="alert"><?= $success ?></div>
    <?php } ?>
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Добавить товар</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <?php echo validation_errors(); ?>
                <form action="/admin/add_products" class="form-horizontal" method="post" accept-charset="utf-8"
                      enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="">Выбирите категорию товара:</label>
                        <div class="col-xs-12 col-md-9">
                            <select class="form-control">
                                <option>Вода</option>
                                <option>Посуда одноразовая</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="prd_id_providers">Организация/ЧП(Поставщик):</label>
                        <div class="col-xs-12 col-md-9">
                            <select value="<?php echo set_value('prd_id_providers'); ?>" name="prd_id_user"
                                    id="prd_id_user" class="form-control">
                                <?php foreach ($providers as $item) { ?>
                                    <option value="<?= $item->use_id; ?>"><?= trim($item->use_organization); ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="prd_title">Наименование товара:</label>
                        <div class="col-xs-12 col-md-9">
                            <input value="<?php echo set_value('prd_title'); ?>" name="prd_title" type="text"
                                   class="form-control" id="prd_title" placeholder="Введите название товара">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="">Торговая марка:</label>
                        <div class="col-xs-12 col-md-9">
                            <input value="" name=""
                                   type="text" class="form-control" id="prd_title_producer"
                                   placeholder="Введите название торговой марки">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="prd_description">Описание
                            продукции:</label>
                        <div class="col-xs-12 col-md-9">
							<textarea rows="3" name="prd_description" class="form-control" id="prd_description"
                                      placeholder="Введите описание продукции"><?php echo set_value('prd_description'); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="prd_title_producer">Производитель:</label>
                        <div class="col-xs-12 col-md-9">
                            <input value="<?php echo set_value('prd_title_producer'); ?>" name="prd_title_producer"
                                   type="text" class="form-control" id="prd_title_producer"
                                   placeholder="Введите производителя">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="prd_comments">Коментарий:</label>
                        <div class="col-xs-12 col-md-9">
							<textarea rows="3" value="<?php echo set_value('prd_comments'); ?>" name="prd_comments"
                                      class="form-control" id="prd_comments"
                                      placeholder="Введите коментарий"><?php echo set_value('prd_comments'); ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3">Объем/цена:</label>
                        <div class="col-xs-12 col-md-3">
                            <label for="prd_volume_price">Объем литров</label>
                            <input value="<?php echo set_value('prd_volume_price'); ?>" name="prd_volume_price"
                                   type="text" class="form-control" id="fatherName" placeholder="Введите объем, литров">
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <label for="">Введите количество, шт</label>
                            <input value="" name=""
                                   type="text" class="form-control" id="" placeholder="Введите количество, шт">
                        </div>
                        <div class="col-xs-12 col-md-3">
                            <label for="prd_price">Введите цену,грн</label>
                            <input value="<?php echo set_value('prd_price'); ?>" name="prd_price" type="text"
                                   class="form-control" id="fatherName" placeholder="Введите цену,грн">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3">Минимальный заказ, шт</label>
                        <div class="col-xs-12 col-md-3">
                            <label for="">Минимальное количество, шт</label>
                            <input value="" name=""
                                   type="text" class="form-control" id="" placeholder="Введите количество, шт">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="postalAddress">Регионы, в которых
                            осуществляется
                            доставка:</label>
                        <div class="col-xs-12 col-md-9">
                            <a href="#myModal1" data-toggle="modal" class="btn btn-info"> <i
                                    class="glyphicon glyphicon-plus"></i> Добавить регион</a>
                            <table class=" responsive nowrap dataTable no-footer table-bordered
                            table-hover" id="Address1" width="100%" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>Страна</th>
                                    <th>Область</th>
                                    <th>Город</th>
                                    <th>Район</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>


                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="prd_file">Загрузить фото из файла:</label>
                        <div class="col-xs-12 col-md-9">
                            <label for="exampleInputFile">Выбирите файл</label>
                            <input name="prd_file" type="file" id="prd_file">
                            <?php if (isset($error)) { ?>
                                <p class="help-block"><?= implode(',', $error) ?></p>
                            <?php } else { ?>
                                <p class="help-block">Пример файла импорта товаров можно
                                    <a href="/upload/import.xls">скачать здесь</a>
                                </p>
                            <? } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-12 col-md-3" for="exampleInputFile1">Загрузить сертификаты
                            качества:
                        </label>
                        <div class="col-xs-12 col-md-9">
                            <label for="prd_file_certificates">Выбирите файл</label>
                            <input name="prd_file_certificates" type="file" id="prd_file_certificates">
                            <?php if (isset($error1)) { ?>
                                <p class="help-block"><?= implode(',', $error1) ?></p>
                            <?php } else { ?>
                                <p class="help-block">Файл должен иметь расширение jpg, jpeg, png</p>
                            <? } ?>
                        </div>
                    </div>
                    <br/>
                    <div class="form-group">
                        <div class="col-xs-offset-3 col-xs-6">
                            <input type="submit" class="btn btn-primary" value="Добавить">
                            <input type="reset" class="btn btn-default" value="Очистить форму">
                        </div>

                        <div class=" col-xs-3">
                            <label class="btn btn-success" for="my-file-selector">
                                <input id="my-file-selector" type="file" style="display:none;"
                                       onchange="$('#upload-file-info').html($(this).val().replace(/^.*[\\\/]/, ''));">
                                Импорт файла товаров
                            </label>
                            <span class='label label-warning' id="upload-file-info"></span>

                        </div>

                    </div>

                </form>

            </div>
        </div>
    </div>
    <!--/span-->

</div>

<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Добавить регион</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="addNewAddress">
                    <div class="form-group">
                        <div class="col-xs-12 col-md-4">
                            <label for="postalAddress">Страна:</label>
                            <select value="<?php echo set_value('del_id_country'); ?>" class="form-control country"
                                    name="del_id_country" <?= (!empty(form_error('del_id_country')) ? 'has-error' : '') ?>>
                                <?php foreach ($country as $item) { ?>
                                    <option value="<?= $item->cou_id; ?>"><?= trim($item->cou_name); ?></option>
                                <?php } ?>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 col-md-4">
                            <label for="postalAddress">Область:</label>
                            <select class="form-control region" name="del_id_region"></select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 col-md-4">
                            <label for="postalAddress">Город:</label>
                            <select class="form-control city" name="del_id_city"></select>
                        </div>
                    </div>
                    <input type="hidden" name="provider" id="provider" value=""/>
                    <input type="hidden" name="profile" value="saveNewAddress"/>
                </form>

                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                    <a href="#" class="btn btn-primary saveNewAddress" data-dismiss="modal">Сохранить</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3> Удаление адреса</h3>
            </div>
            <div class="modal-body">
                <p>Вы действительно хотите удалить адрес?</p>
                <form method="post" id="deleteFormAddress">
                    <input type="hidden" id="del_id" name="del_id" value=""/>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-default" data-dismiss="modal">Да</a>
                        <a href="#" class="btn btn-primary" data-dismiss="modal">Нет</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var table;
    $(document).ready(function () {

        $('#selectError1').on('change', function () {
            $('#delivery_city').val($("#selectError1").chosen().val());
        });
        //datatables

        table = $('#Address1').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "searching": false,
            "ordering": false,
            "paginate":false,
            "language": {
                "url": "http://cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Russian.json"
            },
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('admin/ajax_address_region')?>?provider="+$('#prd_id_user').val(), "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [0], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],

        });


        $('#prd_id_user').on('change', function () {
            $('#provider').val($('#prd_id_user').val());
            table.ajax.url('admin/ajax_address_region?provider='+$('#prd_id_user').val());
        });
    });
</script>
