<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 23.12.2016
 * Time: 11:31
 */
?>

<div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-edit"></i> Новый заказ</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
        </div>
    </div>
    <input type="hidden" name="order_id" id="order_id" value="0">
    <div class="box-content">
        <div class="col-md-12 alert alert-success hide" role="alert"></div>
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-shopping-cart"></i> Клиент</h2>
                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <form id="order_data" class="form-horizontal">
                            <div class="form-group">
                                <div class="col-xs-12 col-md-12">
                                    <!--Для менеджера клиентов вытягивает в выпадающий список со свеми клиентами/поле должно быть по типу в локации - с поиском -->
                                    <div class="control-group">
                                        <label for="prd_id_providers">Клиент:</label>
                                        <p class="help-block">Выбрать уже зарегистрированого клиента из списка</p>
                                        <div class="controls">
                                            <select data-placeholder="Введите ФИО клиента или название организации"
                                                    class="col-xs-12 col-md-12" id="selectError2" data-rel="chosen">
                                                <option value=""></option>
                                                <?php foreach ($client as $item) { ?>
                                                    <option value="<?= $item->use_id; ?>">
                                                        <?= trim($item->use_last_name) . ' ' . $item->use_name . ' ' . $item->use_father_name; ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-md-4">
                                    <label for="fatherName">Фамилия:</label>
                                    <input name="ord_father_name" type="text" class="form-control" id="fatherName"
                                           placeholder="Введите фамилию">
                                    <p class="help-block">Введите фамилию клиента, если он еще не зарегистрирован на
                                        сайте.</p>
                                </div>

                                <div class="col-xs-12 col-md-4">
                                    <label for="firstName">Имя:</label>
                                    <input name="ord_name" type="text" class="form-control" id="firstName" placeholder="Введите имя">
                                    <p class="help-block">Введите имя клиента, если он еще не зарегистрирован на
                                        сайте.</p>
                                </div>

                                <div class="col-xs-12 col-md-4">
                                    <label for="fatherName">Отчество:</label>
                                    <input name="ord_last_name" type="text" class="form-control" id="fatherName"
                                           placeholder="Введите фамилию">
                                    <p class="help-block">Введите отчество клиента, если он еще не зарегистрирован на
                                        сайте.</p>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="col-xs-12 col-md-4"><!-- Обязательно для заполнения -->
                                    <label for="phoneNumber">Телефон:*</label>
                                    <input type="tel" name="ord_phone" class="form-control" id="phoneNumber"
                                           placeholder="+38 (067)-510-32-23"
                                           pattern="+38[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-cog"></i> Фильтр </h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <form id="formFilter" class="form-horizontal" method="post">
                            <div class="form-group">
                                <div class="col-xs-12 col-md-3">
                                    <label for="postalAddress">Страна:</label>
                                    <div class="controls">
                                        <select data-placeholder="Введите название страны" name="ord_id_country"
                                                class="col-xs-12 col-md-12 country"
                                                id="selectError2" data-rel="chosen">
                                            <?php foreach ($country as $item) { ?>
                                                <option
                                                    value="<?= $item->cou_id; ?>"><?= trim($item->cou_name); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <label for="postalAddress">Область</label>
                                    <div class="controls">
                                        <select data-placeholder="Введите название области" name="ord_id_region"
                                                class="col-xs-12 col-md-12 region"
                                                id="selectError2" data-rel="chosen">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-3">
                                    <label for="postalAddress">Город:</label>
                                    <div class="controls">
                                        <select data-placeholder="Введите название города" name="ord_id_city"
                                                class="col-xs-12 col-md-12 city"
                                                id="selectError2" data-rel="chosen">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <div class="control-group">
                                        <label for="">Район:</label><!--Поле обязательно для заполнения-->
                                        <div class="controls">
                                            <select data-placeholder="Введите название района" name="ord_id_district"
                                                    class="col-xs-12 col-md-12 district" id="selectError2"
                                                    data-rel="chosen">
                                                <option value=""></option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12 col-md-8">
                                    <!-- Нужна именно форма поиска, так как на мобильниках должна появляться клавиатура ля ввода названия товара (в форме как у клиента select), на мобильнике розрешено выбирать только из списка, ручной ввод не поддерживается -->
                                    <label for="">Введите название товара:</label>
                                    <div class="input-group">
                                        <input type="text" name="title" class="form-control"
                                               placeholder="Я ищу...">
                                        <span class="input-group-btn">
													<button class="btn btn-info" type="button">
                                                        <i class="glyphicon glyphicon-search"></i>
                                                    </button>
												  </span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-4">
                                    <label for="">Нажмите, для очистки фильтра:</label>
                                    <a href="#" class="btn btn-info"><i class="glyphicon glyphicon-trash"></i>
                                        Очистить фильтры</a>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12 col-md-3">
                                    <label for="">Выбирите категорию товара:</label>
                                    <div class="controls">
                                        <select data-placeholder="Выбирите категорию товара"
                                                name="category"
                                                class="col-xs-12 col-md-12 category" id="selectError2"
                                                data-rel="chosen">
                                            <option value=""></option>
                                            <?php foreach ($category as $item) { ?>
                                                <option
                                                    value="<?= $item['id']; ?>"><?= ($item['level']) ? '&nbsp&nbsp&nbsp&nbsp' : '' ?><?= trim($item['name']); ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-3">
                                    <label for=""> Минимальный заказ</label>
                                    <!-- Вытягиваем поле минимальный заказ по выбраному региону -->
                                    <div class="controls">
                                        <select data-placeholder="Выбирите минимальный заказ"
                                                name="min_order"
                                                class="col-xs-12 col-md-12 min_order" id="selectError2"
                                                data-rel="chosen">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-md-3">
                                    <!-- Вытягиваем меры объема по выбраному региону -->
                                    <label for=""> Объем</label>
                                    <div class="controls">
                                        <select data-placeholder="Выбирите необходимый объем"
                                                name="min_liytov"
                                                class="col-xs-12 col-md-12" id="selectError2" data-rel="chosen">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <!-- Вытягиваем меры объема по выбраному региону -->
                                    <label for=""> Цена</label>
                                    <div class="controls">
                                        <select data-placeholder="Выбирите сортировку цены"
                                                name="order_price"
                                                class="col-xs-12 col-md-12" id="selectError2" data-rel="chosen">
                                            <option value=""></option>
                                            <option value="asc">по возрастанию цены</option>
                                            <option value="desc">по убыванию цены</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <form class="form-horizontal">
                <div class="box col-md-12">
                    <div class="box-inner">
                        <div class="box-header well" data-original-title="">
                            <h2><i class="glyphicon glyphicon-shopping-cart"></i> Список товаров</h2>
                            <div class="box-icon">
                                <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                        class="glyphicon glyphicon-chevron-up"></i></a>
                            </div>
                        </div>
                        <div class="box-content">

                            <div id="panel1" class="tab-pane fade in active">
                                <h3>Список товаров</h3>
                                <div class="form-group">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-shopping-cart"></i> Корзина</h2>
                        <div class="box-icon">
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                    class="glyphicon glyphicon-chevron-up"></i></a>
                        </div>
                    </div>
                    <div class="box-content">
                        <table id="order_items" class="table table-striped table-bordered responsive dataTable ">
                            <thead>
                            <tr>
                                <th>Наименование товара</th>
                                <th>Цена</th>
                                <th>Количество</th>
                                <th>Итог</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                        <br>
                        <div class="form-group">
                            <div class="col-xs-12 col-md-4">
                                <label for="">Дата доставки:</label>
                                <div class="input-group" id="">
                                    <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>"/>
                                </div>
                                <p class="help-block">Нажмите на поле для отображения календаря</p>
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <label for="">Время доставки:</label>
                                <div class="input-group" id="">
                                    <input name="ord_delivery_datetime" type="time" class="form-control border-radius-3"
                                           value="<?= date("H:i"); ?>"/>
                                </div>
                                <p class="help-block">Нажмите на поле для ввода времени</p>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-xs-12 col-md-3">
                                <label for="postalAddress">Номер дома:</label>
                                <input name="ord_building" type="" class="form-control" id="" placeholder="Номер дома">
                            </div>
                            <div class="col-xs-12 col-md-3">
                                <label for="postalAddress">Кв./Офис:</label>
                                <input type="" class="form-control" name="ord_room" id="" placeholder="Кв./Офис">
                            </div>
                            <div class="col-xs-12 col-md-3">
                                <label for="postalAddress">Домофон:</label>
                                <input type="" class="form-control" name="ord_intercom" id="" placeholder="Домофон">
                            </div>
                            <div class="col-xs-12  col-md-3">
                                <label for="postalAddress">Улица:</label>
                                <input type="" class="form-control" name="ord_street" id="" placeholder="Улица">
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-md-12">
                                <label for="postalAddress">Заезд:</label>
                                <input type="" class="form-control" id="" name="ord_destonation" placeholder="Заезд">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-md-12">
                                <label for="postalAddress">Примечание:</label>
                                <textarea rows="3" name="ord_comments" class="form-control" id="postalAddress"
                                          placeholder="Примечание"></textarea>
                            </div>
                        </div>
                        <br><br>
                        <div class="form-group">
                            <p class="text-left">
                                <a class="btn btn-success update_order">
                                    <i class="glyphicon glyphicon-ok icon-white"></i>
                                    Оформить заказ
                                </a>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>


    </div>
</div>


<script type="text/javascript">
    var table;
    $(document).ready(function () {
        //datatables
        table = $('#order_items').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('admin/get_order_items?id=')?>"+$('#order_id').val(), "type": "POST"
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




