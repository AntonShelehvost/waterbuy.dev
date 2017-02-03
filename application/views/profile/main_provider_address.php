<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 22.01.2017
 * Time: 13:33
 */
?>

<div class="box col-md-12">
    <div class="box-inner">
        <div class="box-header well" data-original-title="">
            <h2><i class="glyphicon glyphicon-flag"></i> Регионы доставки</h2>
            <div class="box-icon">
                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                        class="glyphicon glyphicon-chevron-up"></i></a>
            </div>
        </div>
        <div class="box-content">
            <div class="col-md-12 alert alert-success hide alertSaveNewAddress" role="alert"></div>
            <form action="" method="post" class="form-horizontal">


                <? //= (!empty(form_error('use_organization')) ? 'has-error' : '') ?>
                <label for="postalAddress">
                    <a href="#myModal1" data-toggle="modal" class="btn btn-info"> <i
                            class="glyphicon glyphicon-plus"></i> Добавить регион</a>
                </label>

                <div class="form-group">
                    <div class="col-xs-12">
                        <table class=" responsive nowrap dataTable no-footer table-bordered table-hover
                            " id="Address1" width="100%"
                               style="width: 100%;">
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
            </form>
        </div>
    </div>
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
                    <div class=form-group>
                        <div class="col-md-12 col-xs-12">
                            <label for="postalAddress">Район:</label>
                            <div class="controls">
                                <select data-placeholder="Выбирите район" name="del_id_district" id="selectError2"
                                        class="district" data-rel="chosen">
                                </select>
                            </div>
                        </div>
                    </div>
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
                    <input type="hidden" id="del_id" name="id" value=""/>
                    <input type="hidden" name="profile" value="deleteAddress"/>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-default deleteId" id="deleteId" data-dismiss="modal">Да</a>
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
        //datatables
        table = $('#Address1').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('admin/ajax_address_region')?>", "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [0], //first column / numbering column
                    "orderable": true, //set not orderable
                },
            ],
            "scrollCollapse": true,
            "scroller": true
        });

    });
</script>