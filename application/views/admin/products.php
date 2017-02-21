<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 20.12.2016
 * Time: 13:27
 */
?>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-briefcase"></i> Список товаров</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="col-md-12 alert alert-success hide alertProducts" role="alert"></div>
                <div class="row">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="control-label col-xs-12 col-md-4" for="prd_id_providers">Организация/ЧП(Поставщик):</label>
                            <div class="col-xs-12 col-md-4">
                                <select value="<?php echo set_value('prd_id_providers'); ?>" name="prd_id_user"
                                        id="prd_id_user2" class="form-control prd_id" data-rel="chosen">
                                    <option value="-1"></option>
                                    <?php foreach ($providers as $item) { ?>
                                        <option
                                            value="<?= $item->use_id; ?>"><?= trim($item->use_organization); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-xs-12 col-md-4" for="">Выбирите категорию товара:</label>
                            <div class="col-xs-12 col-md-4">
                                <select data-placeholder="Выбирите категорию товара"
                                        name="category"
                                        class="form-control cat_id" id="selectError2"
                                        data-rel="chosen">
                                    <option value=""></option>
                                    <?php foreach ($category as $item) { ?>
                                        <option
                                            value="<?= $item['id']; ?>"><?= ($item['level']) ? '&nbsp&nbsp&nbsp&nbsp' : '' ?><?= trim($item['name']); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>

                <br>
                <div class="row">
                    <div class="col-md-4 controls">
                        <a href="/<?= $this->uri->segment(1) ?>/add_products" class="btn btn-default btn-sm"
                           title="добавить">
                            <span class="glyphicon glyphicon-plus"></span> Добавить
                        </a>
                    </div>
                </div>
                <table class="table table-striped table-bordered responsive" id="clients">
                    <thead>
                    <tr>
                        <th>Поставщик</th>
                        <th>Наименование товара</th>
                        <th>Производитель</th>
                        <th>Коментарий</th>
                        <th>Объем</th>
                        <th>Цену,грн</th>
                        <th>Локация</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/span-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Удаление товара</h3>
                </div>
                <div class="modal-body"> <!--Пишем название страны-->
                    <p>Вы действительно хотите удалить запись?</p>
                    <form id="deleteProducts">
                        <input type="hidden" name="prd_id" id="prd_id">
                        <div class="modal-footer">
                            <a href="#" class="btn btn-default" data-dismiss="modal">Отмена</a>
                            <a href="#" class="btn btn-primary ajaxDeleteProducts" data-dismiss="modal">Да</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var table;
    $(document).ready(function () {
        //datatables
        table = $('#clients').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('admin/ajax_products')?>", "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [0], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],

        });
        var pos = 0;
        $('#clients thead th').each(function () {
            pos++;
            var title = $(this).text();
            if (pos != 8 && pos != 1 && pos != 7)
                $(this).html('<input type="text" class="full form-control input-sx" placeholder="' + title + '" />');
        });

        $('#clients tr input[type="text"]').click(function () {
            return false;
        });
        table.columns().every(function () {
            var that = this;

            $('input', this.header()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });

        $('.prd_id,.cat_id').on('change', function () {
            table.ajax.url("<?php echo site_url('admin/ajax_products')?>?prd_id=" + $('.prd_id').val() + '&cat_id=' + $('.cat_id').val());
            table.ajax.reload();
        })

    });
</script>
