<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 19.01.2017
 * Time: 18:05
 */
?>

<div class="row">
    <div class="col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-home"></i> Адреса доставки</h2>

                <div class="box-icon">

                </div>
            </div>
            <div class="box-content">

                <div class="col-md-12 alert alert-success hide alertSaveNewAddress" role="alert"></div>
                <p class="text-left">Для добавления адреса нажмите кнопку
                    <a href="#myModal1" class="btn btn-primary" data-toggle="modal">Добавить</a>
                </p>
                <table id="Address" class="table table-striped table-bordered responsive">
                    <thead>
                    <tr>
                        <th>Название адреса</th>
                        <th>Страна</th>
                        <th>Область</th>
                        <th>Город</th>
                        <th>Район</th>
                        <th>Адрес</th> <!--Складываем Город+Улица+дом+подъезд+район-->
                        <th>Дата добавления</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Добавить новый адрес</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" id="addNewAddress">
                        <div class="form-group">
                            <label class="col-xs-12" for="lastName">Короткое название:</label>

                            <div class="col-xs-12">
                                <input type="text" name="del_name" class="form-control" id="lastName"
                                       placeholder="Введите название адреса для отображения в таблице (например: дом)">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-md-6">
                                <label for="postalAddress">Страна:</label>
                                <select value="<?php echo set_value('del_id_country'); ?>" class="form-control country"
                                        name="del_id_country" <?= (!empty(form_error('del_id_country')) ? 'has-error' : '') ?>>
                                    <?php foreach ($country as $item) { ?>
                                        <option value="<?= $item->cou_id; ?>"><?= trim($item->cou_name); ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-xs-12 col-md-6 pull-right">
                                <label for="postalAddress">Область</label>
                                <select class="form-control region" name="del_id_region"></select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-md-6">
                                <label for="postalAddress">Город:</label>
                                <select class="form-control city" name="del_id_city"></select>
                            </div>

                            <div class="col-xs-12 col-md-6">
                                <label for="postalAddress">Район:</label>
                                <select data-placeholder="Выбирите район" name="del_id_district"
                                        class="form-control district">
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Улица:</label>
                                <input type="text" class="form-control" name="del_street" id="" placeholder="Улица">
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Номер дома:</label>
                                <input type="text" class="form-control" name="del_building" id=""
                                       placeholder="Номер дома">
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Кв./Офис:</label>
                                <input type="text" class="form-control" name="del_room" id="" placeholder="Кв./Офис">
                            </div>
                        </div>
                        <div class=form-group>
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Домофон:</label>
                                <input type="text" class="form-control" name="del_intercom" id="" placeholder="Домофон">
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Заезд:</label>
                                <input type="text" class="form-control" name="del_destonation" id=""
                                       placeholder="Заезд">
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

    <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Просмотр</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-xs-12" for="lastName">Короткое название:</label>

                            <div class="col-xs-12">
                                <input type="text" class="form-control" id="lastName" disabled
                                       placeholder="Введите название адреса для отображения в таблице (например: дом)">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Страна:</label>
                                <select class="form-control" disabled>
                                    <option>Австрия </option>
                                    <option>Андорра </option>
                                    <option>Албания </option>
                                    <option>Беларусь </option>
                                    <option>Бельгия </option>
                                    <option>Болгария </option>
                                    <option>Босния и Герцеговина </option>
                                    <option>Ватикан </option>
                                    <option>Великобритания </option>
                                    <option>Венгрия </option>
                                    <option>Германия </option>
                                    <option>Гибралтар </option>
                                    <option>Греция </option>
                                    <option>Дания </option>
                                    <option>Ирландия </option>
                                    <option>Исландия </option>
                                    <option>Испания </option>
                                    <option>Италия </option>
                                    <option>Латвия </option>
                                    <option>Литва </option>
                                    <option>Лихтенштейн </option>
                                    <option>Люксембург </option>
                                    <option>Македония </option>
                                    <option>Мальта </option>
                                    <option>Молдавия </option>
                                    <option>Монако </option>
                                    <option>Нидерланды </option>
                                    <option>Норвегия </option>
                                    <option>Польша </option>
                                    <option>Португалия </option>
                                    <option>Россия </option>
                                    <option>Румыния </option>
                                    <option>Сан-Марино </option>
                                    <option>Сербия и Черногория </option>
                                    <option>Словакия </option>
                                    <option>Словения </option>
                                    <option selected>Украина </option>
                                    <option>Фарерские острова </option>
                                    <option>Финляндия </option>
                                    <option>Франция </option>
                                    <option>Хорватия </option>
                                    <option>Черногория </option>
                                    <option>Чехия </option>
                                    <option>Швейцария </option>
                                    <option>Швеция </option>
                                    <option>«Шпицберген» Норвегия</option>
                                    <option>Эстония </option>

                                </select>
                            </div>
                            <div class="col-xs-12 col-md-8">
                                <label for="postalAddress">Область</label>
                                <select class="form-control" disabled>
                                    <option>Винницкая область</option>
                                    <option>Волынская область</option>
                                    <option selected>Днепропетровская область</option>
                                    <option>Донецкая область</option>
                                    <option>Житомирская область</option>
                                    <option>Закарпатская область</option>
                                    <option>Запорожская область</option>
                                    <option>Ивано-Франковская область</option>
                                    <option>Киевская область</option>
                                    <option>Кировоградская область</option>
                                    <option>Луганская область</option>
                                    <option>Львовская область</option>
                                    <option>Николаевская область</option>
                                    <option>Одесская область</option>
                                    <option>Полтавская область</option>
                                    <option>Ровенская область</option>
                                    <option>Сумская область</option>
                                    <option>Тернопольская область</option>
                                    <option>Харьковская область</option>
                                    <option>Херсонская область</option>
                                    <option>Хмельницкая область</option>
                                    <option>Черкасская область</option>
                                    <option>Черниговская область</option>
                                    <option>Черновицкая область</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Город:</label>
                                <select class="form-control" disabled>
                                    <option>Днепр</option>
                                </select>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Улица:</label>
                                <input type="" class="form-control" disabled id="" placeholder="Улица">
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Номер дома:</label>
                                <input type="" class="form-control" disabled id="" placeholder="Номер дома">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Кв./Офис:</label>
                                <input type="" class="form-control" disabled id="" placeholder="Кв./Офис">
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Домофон:</label>
                                <input type="" class="form-control" disabled id="" placeholder="Домофон">
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Заезд:</label>
                                <input type="" class="form-control" disabled id="" placeholder="Заезд">
                            </div>
                        </div>
                        <div class=form-group>
                            <div class="col-md-12 col-xs-12">
                                <label for="postalAddress">Район:</label>
                                <div class="controls">
                                    <select data-placeholder="Выбирите район" disabled id="selectError2"
                                            data-rel="chosen">
                                        <option value=""></option>
                                        <option>Солнечный</option>
                                        <option>New York Giants</option>
                                        <option>Philadelphia Eagles</option>
                                        <option>Washington Redskins</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                        <a href="#" class="btn btn-primary" data-dismiss="modal">Сохранить</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/span-->
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Редактировать адрес</h3>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="form-group">
                            <label class="col-xs-12" for="lastName">Короткое название:</label>

                            <div class="col-xs-12">
                                <input type="text" class="form-control" id="lastName"
                                       placeholder="Введите название адреса для отображения в таблице (например: дом)">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Страна:</label>
                                <select class="form-control">
                                    <option>Австрия </option>
                                    <option>Андорра </option>
                                    <option>Албания </option>
                                    <option>Беларусь </option>
                                    <option>Бельгия </option>
                                    <option>Болгария </option>
                                    <option>Босния и Герцеговина </option>
                                    <option>Ватикан </option>
                                    <option>Великобритания </option>
                                    <option>Венгрия </option>
                                    <option>Германия </option>
                                    <option>Гибралтар </option>
                                    <option>Греция </option>
                                    <option>Дания </option>
                                    <option>Ирландия </option>
                                    <option>Исландия </option>
                                    <option>Испания </option>
                                    <option>Италия </option>
                                    <option>Латвия </option>
                                    <option>Литва </option>
                                    <option>Лихтенштейн </option>
                                    <option>Люксембург </option>
                                    <option>Македония </option>
                                    <option>Мальта </option>
                                    <option>Молдавия </option>
                                    <option>Монако </option>
                                    <option>Нидерланды </option>
                                    <option>Норвегия </option>
                                    <option>Польша </option>
                                    <option>Португалия </option>
                                    <option>Россия </option>
                                    <option>Румыния </option>
                                    <option>Сан-Марино </option>
                                    <option>Сербия и Черногория </option>
                                    <option>Словакия </option>
                                    <option>Словения </option>
                                    <option selected>Украина </option>
                                    <option>Фарерские острова </option>
                                    <option>Финляндия </option>
                                    <option>Франция </option>
                                    <option>Хорватия </option>
                                    <option>Черногория </option>
                                    <option>Чехия </option>
                                    <option>Швейцария </option>
                                    <option>Швеция </option>
                                    <option>«Шпицберген» Норвегия</option>
                                    <option>Эстония </option>

                                </select>
                            </div>
                            <div class="col-xs-12 col-md-8">
                                <label for="postalAddress">Область</label>
                                <select class="form-control">
                                    <option>Винницкая область</option>
                                    <option>Волынская область</option>
                                    <option selected>Днепропетровская область</option>
                                    <option>Донецкая область</option>
                                    <option>Житомирская область</option>
                                    <option>Закарпатская область</option>
                                    <option>Запорожская область</option>
                                    <option>Ивано-Франковская область</option>
                                    <option>Киевская область</option>
                                    <option>Кировоградская область</option>
                                    <option>Луганская область</option>
                                    <option>Львовская область</option>
                                    <option>Николаевская область</option>
                                    <option>Одесская область</option>
                                    <option>Полтавская область</option>
                                    <option>Ровенская область</option>
                                    <option>Сумская область</option>
                                    <option>Тернопольская область</option>
                                    <option>Харьковская область</option>
                                    <option>Херсонская область</option>
                                    <option>Хмельницкая область</option>
                                    <option>Черкасская область</option>
                                    <option>Черниговская область</option>
                                    <option>Черновицкая область</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Город:</label>
                                <select class="form-control">
                                    <option>Днепр</option>
                                </select>
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Улица:</label>
                                <input type="" class="form-control" id="" placeholder="Улица">
                            </div>

                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Номер дома:</label>
                                <input type="" class="form-control" id="" placeholder="Номер дома">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Кв./Офис:</label>
                                <input type="" class="form-control" id="" placeholder="Кв./Офис">
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Домофон:</label>
                                <input type="" class="form-control" id="" placeholder="Домофон">
                            </div>
                            <div class="col-xs-12 col-md-4">
                                <label for="postalAddress">Заезд:</label>
                                <input type="" class="form-control" id="" placeholder="Заезд">
                            </div>
                        </div>
                        <div class=form-group>
                            <div class="col-md-12 col-xs-12">
                                <label for="postalAddress">Район:</label>
                                <div class="controls">
                                    <select data-placeholder="Выбирите район" id="selectError2" data-rel="chosen">
                                        <option value=""></option>
                                        <option>Солнечный</option>
                                        <option>New York Giants</option>
                                        <option>Philadelphia Eagles</option>
                                        <option>Washington Redskins</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                        <a href="#" class="btn btn-primary" data-dismiss="modal">Сохранить</a>
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
                        <input type="hidden" name="profile" value="deleteAddress"/>
                        <div class="modal-footer">
                            <a href="#" class="btn btn-default deleteId" data-dismiss="modal">Да</a>
                            <a href="#" class="btn btn-primary" data-dismiss="modal">Нет</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--/span-->
</div>

<script type="text/javascript">
    var table;
    $(document).ready(function () {
        //datatables
        table = $('#Address').DataTable({

            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('admin/ajax_address')?>", "type": "POST"
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