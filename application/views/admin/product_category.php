<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 25.01.2017
 * Time: 0:01
 */
?>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Категория товаров</h2>
            </div>
            <div class="box-content">
                <div class="col-md-12 alert alert-success hide alertCategory" role="alert"></div>
                <p>
                    <a href="#myModal20" data-toggle="modal" class="btn btn-default"><i
                            class="glyphicon glyphicon-plus"></i> Категория товаров</a>
                    <a href="#myModal23" data-toggle="modal" class="btn btn-default"><i
                            class="glyphicon glyphicon-plus"></i> Под-категория товаров</a>
                </p>
                <table id="category" class="table table-striped table-bordered responsive">
                    <thead>
                    <tr>
                        <th>Название категории</th>
                        <th>Название под-категории</th>
                        <th>Описание</th>
                        <th>Дата добавления</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Вода</td>
                        <td>Вода</td>
                        <th>Описание</th>
                        <td class="center">2012/03/01</td>
                        <td class="center">
                            <a class="btn btn-info" href="#myModal21" data-toggle="modal">
                                <i class="glyphicon glyphicon-edit icon-white"></i>
                                Редактировать
                            </a>
                            <a class="btn btn-danger" href="#myModal22" data-toggle="modal"">
                            <i class="glyphicon glyphicon-trash icon-white"></i>
                            Удалить
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="myModal20" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Добавить категорию</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="NewRootCategory">
                    <div class="form-group">
                        <label for="postalAddress">Новая категория товара:</label>
                        <input type="text" class="form-control" id="cat_name" name="cat_name" placeholder="Категория">
                        <input type="hidden" class="form-control" id="cat_pid" name="cat_pid" value="0">
                    </div>
                    <div class="form-group">
                        <label for="postalAddress">Описание:</label>
                        <input type="text" class="form-control" id="cat_description" name="cat_description"
                               placeholder="Категория">
                    </div>
                </form>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                    <a href="#" class="btn btn-primary addNewRootCategory" data-dismiss="modal">Сохранить</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal23" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Добавить под-категорию</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="NewSubCategory">
                    <div class="form-group">
                        <label for="postalAddress">Категория товара:</label>
                        <select name="cat_pid" class="form-control">
                            <?php foreach ($category as $cat) { ?>
                                <option value="<?= $cat->cat_id; ?>"><?= $cat->cat_name; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="postalAddress">Новая под-категория товара:</label>
                        <input type="text" name="cat_name" class="form-control" id="" placeholder="Категория">
                    </div>
                    <div class="form-group">
                        <label for="postalAddress">Описание:</label>
                        <input type="text" class="form-control" id="cat_description" name="cat_description"
                               placeholder="Категория">
                    </div>
                </form>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                    <a href="#" class="btn btn-primary addNewSubCategory" data-dismiss="modal">Сохранить</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal21" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Редактировать категорию</h3>
            </div>
            <div class="modal-body">
                <label for="postalAddress">Редактировать категорию товара:</label>
                <input type="" class="form-control" id="" placeholder="Категория">
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Сохранить</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal22" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h3>Удалить категорию</h3>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="deleteCategory">
                    <input type="hidden" class="form-control" id="cat_id" name="cat_id" value="0">
                    <p>Вы действительно хотите удалить категорию товара?</p>
                </form>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                    <a href="#" class="btn btn-danger ajaxDeleteCategory" data-dismiss="modal">Удалить</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    var table;
    $(document).ready(function () {
        //datatables
        table = $('#category').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('admin/ajax_category')?>", "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [0], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],

        });
    });
</script>

