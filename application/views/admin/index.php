<?php $this->load->view('/admin/header'); ?>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Моя страница</a>
        </li>
        <li>
            <a href="#">Оформить заказ</a>
        </li>
    </ul>
</div>
<div class=" row">
    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="6 new members." class="well top-block" href="#">
            <i class="glyphicon glyphicon-user blue"></i>

            <div>Всего заказов</div>
            <div>507</div>
            <span class="notification">6</span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="4 new pro members." class="well top-block" href="#">
            <i class="glyphicon glyphicon-star green"></i>

            <div>Избранное</div>
            <div>228</div>
            <span class="notification green">4</span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="$34 new sales." class="well top-block" href="#">
            <i class="glyphicon glyphicon-shopping-cart yellow"></i>

            <div>Корзина</div>
            <div>$13320</div>
            <span class="notification yellow">$34</span>
        </a>
    </div>

    <div class="col-md-3 col-sm-3 col-xs-6">
        <a data-toggle="tooltip" title="12 new messages." class="well top-block" href="#">
            <i class="glyphicon glyphicon-envelope red"></i>

            <div>Сообщения</div>
            <div>25</div>
            <span class="notification red">12</span>
        </a>
    </div>
</div>


<div class="ch-container">
    <div class="row">


        <noscript>
            &lt;div class="alert alert-block col-md-12"&gt;
            &lt;h4 class="alert-heading"&gt;Warning!&lt;/h4&gt;

            &lt;p&gt;You need to have &lt;a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank"&gt;JavaScript&lt;/a&gt;
            enabled to use this site.&lt;/p&gt;
            &lt;/div&gt;
        </noscript>

                    <div class="row"> <!--Категория товаров-->
                        <div class="box col-md-12">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-edit"></i> Категория товаров</h2>
                                </div>
                                <div class="box-content">
                                    <label for="postalAddress">Категория товаров:
                                        <div class="box-icon">
                                            <a href="#myModal20" data-toggle="modal" class="btn  btn-round btn-default"><i
                                                    class="glyphicon glyphicon-plus"></i></a>
                                        </div>
                                    </label>
                                    <table class="table table-striped table-bordered responsive">
                                        <thead>
                                        <tr>
                                            <th>Название категории</th>
                                            <th>Дата добавления</th>
                                            <th>Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Вода</td>
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

                                        <div class="modal fade" id="myModal20" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                                             aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                                        <h3>Добавить категорию</h3>
                                                    </div>
                                                    <div class="modal-body"> 
                                                        <label for="postalAddress">Новая категория товара:</label>
                                                        <input type="" class="form-control" id=""  placeholder="Категория">
                                                        <div class="modal-footer">
                                                            <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                                                            <a href="#" class="btn btn-primary" data-dismiss="modal">Сохранить</a>
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
                                                        <input type="" class="form-control" id=""  placeholder="Категория">
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
                                                        <p>Вы действительно хотите удалить категорию товара?</p>
                                                        <div class="modal-footer">
                                                            <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                                                            <a href="#" class="btn btn-primary" data-dismiss="modal">Сохранить</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    <div class="row"> <!--Локация-->
                        <div class="box col-md-12">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-edit"></i> Локация</h2>

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

                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-xs-12 col-md-12">
                                                <label for="postalAddress">Страна:
                                                    <div class="box-icon">
                                                        <a href="#myModal8" data-toggle="modal"
                                                           class="btn  btn-round btn-default"><i
                                                                class="glyphicon glyphicon-pencil"></i></a>
                                                        <a href="#myModal9" data-toggle="modal" class="btn  btn-round btn-default"><i
                                                                class="glyphicon glyphicon-plus"></i></a>
                                                        <a href="#myModal10" data-toggle="modal" class="btn  btn-round btn-default"><i
                                                                class="glyphicon glyphicon-minus"></i></a>
                                                    </div>
                                                </label>
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
                                            <div class="col-xs-12 col-md-12">
                                                <label for="postalAddress">Область:
                                                    <div class="box-icon">
                                                        <a href="#myModal11" data-toggle="modal" class="btn  btn-round btn-default"><i
                                                                class="glyphicon glyphicon-pencil"></i></a>
                                                        <a href="#myModal12" data-toggle="modal" class="btn  btn-round btn-default"><i
                                                                class="glyphicon glyphicon-plus"></i></a>
                                                        <a href="#myModal13" data-toggle="modal" class="btn  btn-round btn-default"><i
                                                                class="glyphicon glyphicon-minus"></i></a>
                                                    </div>
                                                </label>
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
                                            <div class="col-xs-12 col-md-12">
                                                <label for="postalAddress">Город:
                                                    <div class="box-icon">
                                                        <a href="#myModal14" data-toggle="modal" class="btn  btn-round btn-default"><i
                                                                class="glyphicon glyphicon-pencil"></i></a>
                                                        <a href="#myModal15" data-toggle="modal" class="btn  btn-round btn-default"><i
                                                                class="glyphicon glyphicon-plus"></i></a>
                                                        <a href="#myModal16" data-toggle="modal" class="btn  btn-round btn-default"><i
                                                                class="glyphicon glyphicon-minus"></i></a>
                                                    </div>
                                                </label>
                                                <select class="form-control">
                                                    <option>Днепр</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-md-12">
                                                <label for="postalAddress">Районы:
                                                    <div class="box-icon">
                                                        <a href="#myModal117" data-toggle="modal" class="btn  btn-round btn-default"><i
                                                                class="glyphicon glyphicon-pencil"></i></a>
                                                        <a href="#myModal18" data-toggle="modal" class="btn  btn-round btn-default"><i
                                                                class="glyphicon glyphicon-plus"></i></a>
                                                        <a href="#myModal119" data-toggle="modal" class="btn  btn-round btn-default"><i
                                                                class="glyphicon glyphicon-minus"></i></a>
                                                    </div>
                                                </label>
                                                <select class="form-control">
                                                    <option>Солнечный</option>
                                                </select>
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
                                        <label for="postalAddress">Страна:</label>
                                        <input type="" class="form-control" id=""  placeholder="Страна">
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                                            <a href="#" class="btn btn-primary" data-dismiss="modal">Сохранить</a>
                                        </div>
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
                                            <label for="postalAddress">Страна:</label>
                                            <input type="" class="form-control" id=""  placeholder="Страна">
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                                            <a href="#" class="btn btn-primary" data-dismiss="modal">Сохранить</a>
                                        </div>
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
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-default" data-dismiss="modal">Отмена</a>
                                            <a href="#" class="btn btn-primary" data-dismiss="modal">Да</a>
                                        </div>
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
                                        <label for="postalAddress">Введите название области:</label>
                                        <input type="" class="form-control" id=""  placeholder="Область">
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                                            <a href="#" class="btn btn-primary" data-dismiss="modal">Сохранить</a>
                                        </div>
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
                                        <label for="postalAddress">Введите название области:</label>
                                        <input type="" class="form-control" id=""  placeholder="Область">
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                                            <a href="#" class="btn btn-primary" data-dismiss="modal">Сохранить</a>
                                        </div>
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
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-default" data-dismiss="modal">Отмена</a>
                                            <a href="#" class="btn btn-primary" data-dismiss="modal">Да</a>
                                        </div>
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
                                        <label for="postalAddress">Область:</label>
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
                                        <label for="postalAddress">Введите название города:</label>
                                        <input type="" class="form-control" id=""  placeholder="Город">
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                                            <a href="#" class="btn btn-primary" data-dismiss="modal">Сохранить</a>
                                        </div>
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
                                        <label for="postalAddress">Область:</label>
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
                                        <label for="postalAddress">Введите название города:</label>
                                        <input type="" class="form-control" id=""  placeholder="Город">
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                                            <a href="#" class="btn btn-primary" data-dismiss="modal">Сохранить</a>
                                        </div>
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
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-default" data-dismiss="modal">Отмена</a>
                                            <a href="#" class="btn btn-primary" data-dismiss="modal">Да</a>
                                        </div>
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
                                        <label for="postalAddress">Область:</label>
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
                                        <label for="postalAddress">Город:</label>
                                        <select class="form-control">
                                            <option>Никополь</option>
                                        </select>
                                        <label for="postalAddress">Введите название района:</label>
                                        <input type="" class="form-control" id=""  placeholder="Район">
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                                            <a href="#" class="btn btn-primary" data-dismiss="modal">Сохранить</a>
                                        </div>
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
                                        <label for="postalAddress">Область:</label>
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
                                        <label for="postalAddress">Город:</label>
                                        <select class="form-control">
                                            <option>Никополь</option>
                                        </select>
                                        <label for="postalAddress">Введите название района:</label>
                                        <input type="" class="form-control" id=""  placeholder="Район">
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                                            <a href="#" class="btn btn-primary" data-dismiss="modal">Сохранить</a>
                                        </div>
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
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-default" data-dismiss="modal">Отмена</a>
                                            <a href="#" class="btn btn-primary" data-dismiss="modal">Да</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Локация-->

    <div class="row">
                        <div class="box col-md-12">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-edit"></i> Новый заказ</h2>

                                    <div class="box-icon">
                                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                                        <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">

                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label class="control-label col-xs-6 col-md-3" for="postalAddress">Адрес доставки:</label>
                                            <label class="control-label col-xs-6 col-md-9" for="postalAddress"><a href="#myModal6" class="btn btn-primary" data-toggle="modal">Выбрать адрес</a></label>
                                            <label class="control-label  col-md-3" for="postalAddress">&ensp;</label>


                                            <div class="col-xs-12 col-md-4">
                                                <label  for="postalAddress">Страна:</label>
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
                                            <div class="col-xs-12 col-md-5">
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
                                            <label class="control-label col-xs-12 col-md-3" for="postalAddress">&ensp;</label>
                                            <div class="col-xs-12 col-md-3">
                                                <label for="postalAddress">Город:</label>
                                                <select class="form-control">
                                                    <option>Днепр</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12  col-md-4">
                                                <label for="postalAddress">Улица:</label>
                                                <input type="" class="form-control" id="" placeholder="Улица">
                                            </div>
                                            <div class="col-xs-12 col-md-2">
                                                <label  for="postalAddress">Номер дома:</label>
                                                <input type="" class="form-control" id="" placeholder="Номер дома">
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label class="col-xs-0 col-md-3 text-right">&ensp;</label>
                                            <div class="col-xs-12 col-md-3">
                                                <label for="postalAddress">Кв./Офис:</label>
                                                <input type="" class="form-control" id="" placeholder="Кв./Офис">
                                            </div>
                                            <div class="col-xs-12 col-md-3">
                                                <label for="postalAddress">Домофон:</label>
                                                <input type="" class="form-control" id="" placeholder="Домофон">
                                            </div>
                                            <div class="col-xs-12 col-md-3">
                                                <label for="postalAddress">Заезд:</label>
                                                <input type="" class="form-control" id="" placeholder="Заезд">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-md-3" for="lastName">Наименование товара:</label>
                                            <div class="col-xs-12 col-md-6">
                                                <label for="lastName">Выбирите товар:</label>
                                                <select class="form-control">
                                                    <option>Вода негазована</option>
                                                    <option>Вода негазована</option>
                                                    <option>Вода негазована</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-md-3">
                                                <label for="lastName">Количество</label>
                                                <select class="form-control">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>1</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-md-3" for="lastName">Поставщик:</label>
                                            <div class="col-xs-12 col-md-9">
                                                <select class="form-control">
                                                    <option>Аляска</option>
                                                    <option>Вода негазована</option>
                                                    <option>Вода негазована</option>
                                                </select>
                                            </div>
                                        </div>


                                        <!-- Инициализация виджета "Bootstrap datetimepicker" -->
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-md-3" for="lastName">Дата/время доставки:</label>
                                            <!-- Элемент HTML с id равным datetimepicker1 -->
                                            <div class="col-xs-12 col-md-9">
                                                <div class="input-group datetime" id="datetimepicker1">
                                                    <input type="text" class="form-control" />
                                    <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-md-3" for="fatherName">Фамилия:</label>
                                            <div class="col-xs-12 col-md-9">
                                                <input type="text" class="form-control" id="fatherName" placeholder="Введите фамилию">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-md-3" for="firstName">Имя:</label>
                                            <div class="col-xs-12 col-md-9">
                                                <input type="text" class="form-control" id="firstName" placeholder="Введите имя">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-md-3" for="phoneNumber">Телефон:</label>
                                            <div class="col-xs-12 col-md-9">
                                                <input type="tel" class="form-control" id="phoneNumber" placeholder="Введите номер телефона">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-12 col-md-3" for="postalAddress">Примечание:</label>
                                            <div class="col-xs-12 col-md-3">
                                                <textarea rows="3" class="form-control" id="postalAddress" placeholder="Примечание"></textarea>
                                            </div>
                                        </div>


                                        <br />
                                        <div class="form-group">
                                            <div class="col-xs-offset-3 col-xs-9">
                                                <input type="submit" class="btn btn-primary" value="Оформить заказ">
                                                <input type="reset" class="btn btn-default" value="Очистить форму">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                             aria-hidden="true">

                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <h3>Добавить новый адрес</h3>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-striped table-bordered size-8">
                                            <thead>
                                            <tr>
                                                <th>Название адреса</th>
                                                <th>Дата добавления</th>
                                                <th>Адрес</th> <!--Складываем Город+Улица+дом+подъезд-->
                                                <th>Действия</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>Дом Победа</td>
                                                <td class="center">2012/03/01</td>
                                                <td class="center">Украина, Днепропетровская обл, Днепр, Победы д.60, кв.17</td>
                                                <td class="center">
                                                        <label class="text-center" for=""><input type="checkbox"> </label>
                                                </td>
                                            </tr>
                                            </tr>
                                            </tbody>
                                        </table>
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-default" data-dismiss="modal">Закрыть</a>
                                            <a href="#" class="btn btn-primary" data-dismiss="modal">Выбрать</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/span-->

                    </div><!--/row-новый заказ-->

                    <div class="row"> <!--Раздел Адреса доставки-->
                        <div class="box col-md-12">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-home"></i> Адреса доставки</h2>

                                    <div class="box-icon">

                                    </div>
                                </div>
                                <div class="box-content">
                                    <p class="text-left">Для добавления адреса нажмите кнопку <a href="#myModal1" class="btn btn-primary" data-toggle="modal">Добавить</a></p>
                                    <table class="table table-striped table-bordered responsive">
                                        <thead>
                                        <tr>
                                            <th>Название адреса</th>
                                            <th>Дата добавления</th>
                                            <th>Адрес</th> <!--Складываем Город+Улица+дом+подъезд-->
                                            <th>Действия</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Дом Победа</td>
                                            <td class="center">2012/03/01</td>
                                            <td class="center">Украина, Днепропетровская обл, Днепр, Победы д.60, кв.17</td>
                                            <td class="center">
                                                <a class="btn btn-success" href="#myModal2" data-toggle="modal">
                                                    <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                    Просмотр
                                                </a>
                                                <a class="btn btn-info" href="#myModal3" data-toggle="modal">
                                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                                    Редактировать
                                                </a>
                                                <a class="btn btn-danger" href="#myModal4" data-toggle="modal"">
                                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                                    Удалить
                                                </a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Офис центр</td>
                                            <td class="center">2012/03/01</td>
                                            <td class="center">Днепр, Победы д.60, кв.17</td>
                                            <td class="center">
                                                <a class="btn btn-success" href="#">
                                                    <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                                    Просмотр
                                                </a>
                                                <a class="btn btn-info" href="#">
                                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                                    Редактировать
                                                </a>
                                                <a class="btn btn-danger" href="#">
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
                        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                             aria-hidden="true">

                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">×</button>
                                        <h3>Добавить новый адрес</h3>
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
                                                    <label  for="postalAddress">Страна:</label>
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
                                                    <label  for="postalAddress">Кв./Офис:</label>
                                                    <input type="" class="form-control" id="" placeholder="Кв./Офис">
                                                </div>
                                                <div class="col-xs-12 col-md-4">
                                                    <label  for="postalAddress">Домофон:</label>
                                                    <input type="" class="form-control" id="" placeholder="Домофон">
                                                </div>
                                                <div class="col-xs-12 col-md-4">
                                                    <label for="postalAddress">Заезд:</label>
                                                    <input type="" class="form-control" id="" placeholder="Заезд">
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
                                                    <label  for="postalAddress">Страна:</label>
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
                                                <div class="col-xs-12 col-md-4" >
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
                                                    <label  for="postalAddress">Кв./Офис:</label>
                                                    <input type="" class="form-control" disabled id="" placeholder="Кв./Офис">
                                                </div>
                                                <div class="col-xs-12 col-md-4">
                                                    <label  for="postalAddress">Домофон:</label>
                                                    <input type="" class="form-control" disabled id="" placeholder="Домофон">
                                                </div>
                                                <div class="col-xs-12 col-md-4">
                                                    <label for="postalAddress">Заезд:</label>
                                                    <input type="" class="form-control" disabled id="" placeholder="Заезд">
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
                                                    <label  for="postalAddress">Страна:</label>
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
                                                    <label  for="postalAddress">Кв./Офис:</label>
                                                    <input type="" class="form-control" id="" placeholder="Кв./Офис">
                                                </div>
                                                <div class="col-xs-12 col-md-4">
                                                    <label  for="postalAddress">Домофон:</label>
                                                    <input type="" class="form-control" id="" placeholder="Домофон">
                                                </div>
                                                <div class="col-xs-12 col-md-4">
                                                    <label for="postalAddress">Заезд:</label>
                                                    <input type="" class="form-control" id="" placeholder="Заезд">
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
                                        <div class="modal-footer">
                                            <a href="#" class="btn btn-default" data-dismiss="modal">Да</a>
                                            <a href="#" class="btn btn-primary" data-dismiss="modal">Нет</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--/span-->
                    </div><!--Раздел Адреса доставки-->

            <div class="row"><!--/row- Добавить товар-->
                        <div class="box col-md-12">
                            <div class="box-inner">
                                <div class="box-header well" data-original-title="">
                                    <h2><i class="glyphicon glyphicon-edit"></i> Добавить товар</h2>

                                    <div class="box-icon">
                                        <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                                        <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                                    </div>
                                </div>
                                <div class="box-content">

                                    <form class="form-horizontal">
                                        <div class="form-group">
                                            <label class="control-label col-xs-3" for="lastName">Организация/ЧП(Поставщик):</label>
                                            <div class="col-xs-9">
                                                <select class="form-control">
                                                    <option>Вытягиваем зарег. поставщиков</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-3" for="lastName">Наименование товара:</label>
                                            <div class="col-xs-9">
                                                <input type="text" class="form-control" id="lastName" placeholder="Введите название товара">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-3" for="firstName">Описание продукции:</label>
                                            <div class="col-xs-9">
                                                <textarea rows="3" class="form-control" id="postalAddress" placeholder="Введите описание продукции"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-3" for="fatherName">Производитель:</label>
                                            <div class="col-xs-9">
                                                <input type="text" class="form-control" id="fatherName" placeholder="Введите производителя">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-3" for="firstName">Коментарий:</label>
                                            <div class="col-xs-9">
                                                <textarea rows="3" class="form-control" id="postalAddress" placeholder="Введите коментарий"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-3">Объем/цена:</label>
                                            <div class="col-xs-5">
                                                <input type="text" class="form-control" id="fatherName" placeholder="Введите объем, литров">
                                            </div>
                                            <div class="col-xs-4">
                                                    <input type="text" class="form-control" id="fatherName" placeholder="Введите цену,грн">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-3" for="postalAddress">Города, в которых осуществляется доставка:</label>
                                            <div class="col-xs-9">
                                                <div class="controls">
                                                    <select id="selectError1" multiple class="form-control" data-rel="chosen">
                                                        <option>Днепр</option>
                                                        <option selected>Никополь</option>
                                                        <option>Option 3</option>
                                                        <option>Option 4</option>
                                                        <option>Option 5</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-3" for="postalAddress">Загрузить из файла:</label>
                                                <div class="col-xs-9">
                                                        <label for="exampleInputFile">Выбирите файл</label>
                                                        <input type="file" id="exampleInputFile">

                                                        <p class="help-block">Пример файла загрузки можно скачать <a href="#"> здесь</a></p>
                                                </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-xs-3" for="postalAddress">Загрузить сертификаты качества:</label>
                                            <div class="col-xs-9">
                                                    <label for="exampleInputFile">Выбирите файл</label>
                                                    <input type="file" id="exampleInputFile">
                                                    <p class="help-block">Файл должен иметь расширение jpg, jpeg, png</p>
                                            </div>
                                        </div>
                                        <br />
                                        <div class="form-group">
                                            <div class="col-xs-offset-3 col-xs-9">
                                                <input type="submit" class="btn btn-primary" value="Добавить">
                                                <input type="reset" class="btn btn-default" value="Очистить форму">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--/span-->

                    </div><!--/row- Добавить товар-->

            <div class="row">
                <div class="box col-md-12">
                    <div class="box-inner">
                        <div class="box-header well" data-original-title="">
                            <h2><i class="glyphicon glyphicon-edit"></i> Добавить клиента</h2>

                            <div class="box-icon">
                                <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                                <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                                <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </div>
                        <div class="box-content">

                            <form class="form-horizontal">
                                <div class="form-group">
                                <label class="control-label col-xs-3" for="lastName">Организация/ЧП:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="lastName" placeholder="Введите название организации/ЧП">
                                </div>
                            </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="lastName">Фамилия:</label>
                                    <div class="col-xs-9">
                                        <input type="text" class="form-control" id="lastName" placeholder="Введите фамилию">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="firstName">Имя:</label>
                                    <div class="col-xs-9">
                                        <input type="text" class="form-control" id="firstName" placeholder="Введите имя">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="fatherName">Отчество:</label>
                                    <div class="col-xs-9">
                                        <input type="text" class="form-control" id="fatherName" placeholder="Введите отчество">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Дата рождения:</label>
                                    <div class="col-xs-3">
                                        <select class="form-control">
                                            <option>Дата</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-3">
                                        <select class="form-control">
                                            <option>Месяц</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-3">
                                        <select class="form-control">
                                            <option>Год</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="inputEmail">Email:</label>
                                    <div class="col-xs-9">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="inputPassword">Пароль:</label>
                                    <div class="col-xs-9">
                                        <input type="password" class="form-control" id="inputPassword" placeholder="Введите пароль">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="confirmPassword">Подтвердите пароль:</label>
                                    <div class="col-xs-9">
                                        <input type="password" class="form-control" id="confirmPassword" placeholder="Введите пароль ещё раз">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="phoneNumber">Телефон:</label>
                                    <div class="col-xs-9">
                                        <input type="tel" class="form-control" id="phoneNumber" placeholder="Введите номер телефона">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="postalAddress">Примечание:</label>
                                    <div class="col-xs-9">
                                        <textarea rows="3" class="form-control" id="postalAddress" placeholder="Примечание доступно только менеджеру"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3" for="postalAddress">Адрес:</label>
                                    <div class="col-xs-9">

                                        <div class="col-xs-4">
                                            <select class="form-control">
                                                <option>Днепр</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-4">
                                            <input type="" class="form-control" id="" placeholder="Улица">
                                        </div>
                                        <div class="col-xs-3">
                                            <input type="" class="form-control" id="" placeholder="Номер дома">
                                        </div>
                                    </div>
                                    </div>

                                    <div class="form-group">
                                    <label class="label col-xs-3" for="postalAddress">&nbsp;</label>
                                    <div class="col-xs-9">

                                        <div class="col-xs-3">
                                            <input type="" class="form-control" id="" placeholder="Кв./Офис">
                                        </div>
                                        <div class="col-xs-4">
                                            <input type="" class="form-control" id="" placeholder="Домофон">
                                        </div>
                                        <div class="col-xs-4">
                                            <input type="" class="form-control" id="" placeholder="Заезд">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-xs-3">Пол:</label>
                                    <div class="col-xs-2">
                                        <label class="radio-inline">
                                            <input type="radio" name="genderRadios" value="male"> Мужской
                                        </label>
                                    </div>
                                    <div class="col-xs-2">
                                        <label class="radio-inline">
                                            <input type="radio" name="genderRadios" value="female"> Женский
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-offset-3 col-xs-9">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" value="agree">  Я согласен с <a href="#">условиями</a>.
                                        </label>
                                    </div>
                                </div>
                                <br />
                                <div class="form-group">
                                    <div class="col-xs-offset-3 col-xs-9">
                                        <input type="submit" class="btn btn-primary" value="Регистрация">
                                        <input type="reset" class="btn btn-default" value="Очистить форму">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--/span-->

            </div><!--/row-->

            <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-edit"></i> Добавить менеджера</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </div>
                    <div class="box-content">

                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="lastName">Фамилия:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="lastName" placeholder="Введите фамилию">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="firstName">Имя:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="firstName" placeholder="Введите имя">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="fatherName">Отчество:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="fatherName" placeholder="Введите отчество">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">Дата рождения:</label>
                                <div class="col-xs-3">
                                    <select class="form-control">
                                        <option>Дата</option>
                                    </select>
                                </div>
                                <div class="col-xs-3">
                                    <select class="form-control">
                                        <option>Месяц</option>
                                    </select>
                                </div>
                                <div class="col-xs-3">
                                    <select class="form-control">
                                        <option>Год</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="inputEmail">Email:</label>
                                <div class="col-xs-9">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="inputPassword">Пароль:</label>
                                <div class="col-xs-9">
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Введите пароль">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="confirmPassword">Подтвердите пароль:</label>
                                <div class="col-xs-9">
                                    <input type="password" class="form-control" id="confirmPassword" placeholder="Введите пароль ещё раз">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="phoneNumber">Телефон:</label>
                                <div class="col-xs-9">
                                    <input type="tel" class="form-control" id="phoneNumber" placeholder="Введите номер телефона">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="postalAddress">Примечание:</label>
                                <div class="col-xs-9">
                                    <textarea rows="3" class="form-control" id="postalAddress" placeholder="Примечание доступно только менеджеру"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="postalAddress">Адрес:</label>
                                <div class="col-xs-9">

                                    <div class="col-xs-4">
                                        <select class="form-control">
                                            <option>Днепр</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="" class="form-control" id="" placeholder="Улица">
                                    </div>
                                    <div class="col-xs-3">
                                        <input type="" class="form-control" id="" placeholder="Номер дома">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="label col-xs-3" for="postalAddress">&nbsp;</label>
                                <div class="col-xs-9">

                                    <div class="col-xs-3">
                                        <input type="" class="form-control" id="" placeholder="Кв./Офис">
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="" class="form-control" id="" placeholder="Домофон">
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="" class="form-control" id="" placeholder="Заезд">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3">Пол:</label>
                                <div class="col-xs-2">
                                    <label class="radio-inline">
                                        <input type="radio" name="genderRadios" value="male"> Мужской
                                    </label>
                                </div>
                                <div class="col-xs-2">
                                    <label class="radio-inline">
                                        <input type="radio" name="genderRadios" value="female"> Женский
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-9">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="agree">  Я согласен с <a href="#">условиями</a>.
                                    </label>
                                </div>
                            </div>
                            <br />
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-9">
                                    <input type="submit" class="btn btn-primary" value="Регистрация">
                                    <input type="reset" class="btn btn-default" value="Очистить форму">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--/span-->

        </div><!--/row-->

         <div class="row">
            <div class="box col-md-12">
                <div class="box-inner">
                    <div class="box-header well" data-original-title="">
                        <h2><i class="glyphicon glyphicon-edit"></i> Добавить поставщика</h2>

                        <div class="box-icon">
                            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                            <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                        </div>
                    </div>
                    <div class="box-content">

                        <form class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="lastName">Организация/ЧП:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="lastName" placeholder="Введите название организации/ЧП">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="lastName">Фамилия руководителя:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="lastName" placeholder="Введите фамилию руководителя">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="firstName">Имя руководителя:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="firstName" placeholder="Введите имя руководителя">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="fatherName">Отчество руководителя:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="fatherName" placeholder="Введите отчество руководителя">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="phoneNumber">Телефон руководителя:</label>
                                <div class="col-xs-9">
                                    <input type="tel" class="form-control" id="phoneNumber" placeholder="Введите номер телефона">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="inputEmail">Email руководителя:</label>
                                <div class="col-xs-9">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="lastName">Фамилия логиста:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="lastName" placeholder="Введите фамилию логиста">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="firstName">Имя логиста:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="firstName" placeholder="Введите имя логиста">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="fatherName">Отчество логиста:</label>
                                <div class="col-xs-9">
                                    <input type="text" class="form-control" id="fatherName" placeholder="Введите отчество логиста">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="phoneNumber">Телефон логиста:</label>
                                <div class="col-xs-9">
                                    <input type="tel" class="form-control" id="phoneNumber" placeholder="Введите номер телефона">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="inputEmail">Email логиста:</label>
                                <div class="col-xs-9">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="inputPassword">Пароль:</label>
                                <div class="col-xs-9">
                                    <input type="password" class="form-control" id="inputPassword" placeholder="Введите пароль">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="confirmPassword">Подтвердите пароль:</label>
                                <div class="col-xs-9">
                                    <input type="password" class="form-control" id="confirmPassword" placeholder="Введите пароль ещё раз">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="postalAddress">Примечание:</label>
                                <div class="col-xs-9">
                                    <textarea rows="3" class="form-control" id="postalAddress" placeholder="Примечание доступно только менеджеру"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-xs-3" for="postalAddress">Адрес:</label>
                                <div class="col-xs-9">

                                    <div class="col-xs-4">
                                        <select class="form-control">
                                            <option>Днепр</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="" class="form-control" id="" placeholder="Улица">
                                    </div>
                                    <div class="col-xs-3">
                                        <input type="" class="form-control" id="" placeholder="Номер дома">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="label col-xs-3" for="postalAddress">&nbsp;</label>
                                <div class="col-xs-9">

                                    <div class="col-xs-3">
                                        <input type="" class="form-control" id="" placeholder="Кв./Офис">
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="" class="form-control" id="" placeholder="Домофон">
                                    </div>
                                    <div class="col-xs-4">
                                        <input type="" class="form-control" id="" placeholder="Заезд">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3" for="selectError1">Города доставки</label>
                                <div class="col-xs-9">
                                <div class="controls">
                                    <select id="selectError1" multiple class="form-control" data-rel="chosen">
                                        <option>Днепр</option>
                                        <option selected>Никополь</option>
                                        <option>Option 3</option>
                                        <option>Option 4</option>
                                        <option>Option 5</option>
                                    </select>
                                </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-9">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" value="agree">  Я согласен с <a href="#">условиями</a>.
                                    </label>
                                </div>
                            </div>
                            <br />
                            <div class="form-group">
                                <div class="col-xs-offset-3 col-xs-9">
                                    <input type="submit" class="btn btn-primary" value="Регистрация">
                                    <input type="reset" class="btn btn-default" value="Очистить форму">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--/span-->

        </div><!--/row-->   
            <!--/span-->

        </div><!--/row-->

            <div class="row">
                <div class="box col-md-12">
                    <div class="box-inner">
                        <div class="box-header well" data-original-title="">
                            <h2><i class="glyphicon glyphicon-edit"></i> Form Elements</h2>

                            <div class="box-icon">
                                <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
                                <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                                <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                            </div>
                        </div>
                        <div class="box-content">
                            <form role="form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">File input</label>
                                    <input type="file" id="exampleInputFile">

                                    <p class="help-block">Example block-level help text here.</p>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Check me out
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-default">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
                <!--/span-->

            </div><!--/row-->

            <!-- content ends -->

    </div><!--/fluid-row-->
</div>


    <hr>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>


</div>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Новый заказ</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                    <h1>Charisma <br>
                        <small>free, premium quality, responsive, multiple skin admin template.</small>
                    </h1>
                    <p>It's a live demo of the template. I have created Charisma to ease the repeat work I have to do on my
                        projects. Now I re-use Charisma as a base for my admin panel work and I am sharing it with you
                        :)</p>

                    <p><b>All pages in the menu are functional, take a look at all, please share this with your
                            followers.</b></p>

                    <p class="center-block download-buttons">
                        <a href="http://usman.it/free-responsive-admin-template/" class="btn btn-primary btn-lg"><i
                                class="glyphicon glyphicon-chevron-left glyphicon-white"></i> Back to article</a>
                        <a href="http://usman.it/free-responsive-admin-template/" class="btn btn-default btn-lg"><i
                                class="glyphicon glyphicon-download-alt"></i> Download Page</a>
                    </p>
                </div>


            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="box col-md-4">
        <div class="box-inner homepage-box">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-th"></i> Tabs</h2>

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
                <ul class="nav nav-tabs" id="myTab">
                    <li class="active"><a href="#info">Info</a></li>
                    <li><a href="#custom">Custom</a></li>
                    <li><a href="#messages">Messages</a></li>
                </ul>

                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane active" id="info">
                        <h3>Charisma
                            <small>a full featured template</small>
                        </h3>
                        <p>It's a full featured, responsive template for your admin panel. It's optimized for tablets
                            and mobile phones.</p>

                        <p>Check how it looks on different devices:</p>
                        <a href="http://www.responsinator.com/?url=usman.it%2Fthemes%2Fcharisma"
                           target="_blank"><strong>Preview on iPhone size.</strong></a>
                        <br>
                        <a href="http://www.responsinator.com/?url=usman.it%2Fthemes%2Fcharisma"
                           target="_blank"><strong>Preview on iPad size.</strong></a>
                    </div>
                    <div class="tab-pane" id="custom">
                        <h3>Custom
                            <small>small text</small>
                        </h3>
                        <p>Sample paragraph.</p>

                        <p>Your custom text.</p>
                    </div>
                    <div class="tab-pane" id="messages">
                        <h3>Messages
                            <small>small text</small>
                        </h3>
                        <p>Sample paragraph.</p>

                        <p>Your custom text.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/span-->

    <div class="box col-md-4">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-user"></i> Member Activity</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="box-content">
                    <ul class="dashboard-list">
                        <li>
                            <a href="#">
                                <img class="dashboard-avatar" alt="Usman"
                                     src="http://www.gravatar.com/avatar/f0ea51fa1e4fae92608d8affee12f67b.png?s=50"></a>
                            <strong>Name:</strong> <a href="#">Usman
                            </a><br>
                            <strong>Since:</strong> 17/05/2014<br>
                            <strong>Status:</strong> <span class="label-success label label-default">Approved</span>
                        </li>
                        <li>
                            <a href="#">
                                <img class="dashboard-avatar" alt="Sheikh Heera"
                                     src="http://www.gravatar.com/avatar/3232415a0380253cfffe19163d04acab.png?s=50"></a>
                            <strong>Name:</strong> <a href="#">Sheikh Heera
                            </a><br>
                            <strong>Since:</strong> 17/05/2014<br>
                            <strong>Status:</strong> <span class="label-warning label label-default">Pending</span>
                        </li>
                        <li>
                            <a href="#">
                                <img class="dashboard-avatar" alt="Abdullah"
                                     src="http://www.gravatar.com/avatar/46056f772bde7c536e2086004e300a04.png?s=50"></a>
                            <strong>Name:</strong> <a href="#">Abdullah
                            </a><br>
                            <strong>Since:</strong> 25/05/2014<br>
                            <strong>Status:</strong> <span class="label-default label label-danger">Banned</span>
                        </li>
                        <li>
                            <a href="#">
                                <img class="dashboard-avatar" alt="Sana Amrin"
                                     src="http://www.gravatar.com/avatar/hash"></a>
                            <strong>Name:</strong> <a href="#">Sana Amrin</a><br>
                            <strong>Since:</strong> 17/05/2014<br>
                            <strong>Status:</strong> <span class="label label-info">Updates</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--/span-->

    <div class="box col-md-4">
        <div class="box-inner homepage-box">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-list-alt"></i> Keep in touch</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">
                <h3>Stay updated with my projects and blog posts</h3>
                <!-- Begin MailChimp Signup Form -->
                <div class="mc_embed_signup">
                    <form action="//halalit.us3.list-manage.com/subscribe/post?u=444b176aa3c39f656c66381f6&amp;id=eeb0c04e84" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <div>
                            <label>Please enter your email</label>
                            <input type="email" value="" name="EMAIL" class="email" placeholder="Email address" required>

                            <div class="power_field"><input type="text" name="b_444b176aa3c39f656c66381f6_eeb0c04e84" tabindex="-1" value=""></div>
                            <div class="clear"><input type="submit" value="Subscribe" name="subscribe" class="button"></div>
                        </div>
                    </form>
                </div>

                <!--End mc_embed_signup-->
                <br/>

                <p>You may like my other open source work, check my profile on <a href="http://github.com/usmanhalalit"
                                                                                  target="_blank">GitHub</a>.</p>

            </div>
        </div>
    </div>
    <!--/span-->
</div><!--/row-->

<div class="row">
    <div class="box col-md-4">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-list"></i> Buttons</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content buttons">
                <p class="btn-group">
                    <button class="btn btn-default">Left</button>
                    <button class="btn btn-default">Middle</button>
                    <button class="btn btn-default">Right</button>
                </p>
                <p>
                    <button class="btn btn-default btn-sm"><i class="glyphicon glyphicon-star"></i> Icon button</button>
                    <button class="btn btn-primary btn-sm">Small button</button>
                    <button class="btn btn-danger btn-sm">Small button</button>
                </p>
                <p>
                    <button class="btn btn-warning btn-sm">Small button</button>
                    <button class="btn btn-success btn-sm">Small button</button>
                    <button class="btn btn-info btn-sm">Small button</button>
                </p>
                <p>
                    <button class="btn btn-inverse btn-default btn-sm">Small button</button>
                    <button class="btn btn-primary btn-round btn-lg">Round button</button>
                    <button class="btn btn-round btn-default btn-lg"><i class="glyphicon glyphicon-ok"></i></button>
                    <button class="btn btn-primary"><i class="glyphicon glyphicon-edit glyphicon-white"></i></button>
                </p>
                <p>
                    <button class="btn btn-default btn-xs">Mini button</button>
                    <button class="btn btn-primary btn-xs">Mini button</button>
                    <button class="btn btn-danger btn-xs">Mini button</button>
                    <button class="btn btn-warning btn-xs">Mini button</button>
                </p>
                <p>
                    <button class="btn btn-info btn-xs">Mini button</button>
                    <button class="btn btn-success btn-xs">Mini button</button>
                    <button class="btn btn-inverse btn-default btn-xs">Mini button</button>
                </p>
            </div>
        </div>
    </div>
    <!--/span-->

    <div class="box col-md-4">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-list"></i> Buttons</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content  buttons">
                <p>
                    <button class="btn btn-default btn-lg">Large button</button>
                    <button class="btn btn-primary btn-lg">Large button</button>
                </p>
                <p>
                    <button class="btn btn-danger btn-lg">Large button</button>
                    <button class="btn btn-warning btn-lg">Large button</button>
                </p>
                <p>
                    <button class="btn btn-success btn-lg">Large button</button>
                    <button class="btn btn-info btn-lg">Large button</button>
                </p>
                <p>
                    <button class="btn btn-inverse btn-default btn-lg">Large button</button>
                </p>
                <div class="btn-group">
                    <button class="btn btn-default btn-lg">Large Dropdown</button>
                    <button class="btn dropdown-toggle btn-default btn-lg" data-toggle="dropdown"><span
                            class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="glyphicon glyphicon-star"></i> Action</a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-tag"></i> Another action</a></li>
                        <li><a href="#"><i class="glyphicon glyphicon-download-alt"></i> Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#"><i class="glyphicon glyphicon-tint"></i> Separated link</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <!--/span-->

    <div class="box col-md-4">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-list"></i> Weekly Stat</h2>

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
                <ul class="dashboard-list">
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-arrow-up"></i>
                            <span class="green">92</span>
                            New Comments
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-arrow-down"></i>
                            <span class="red">15</span>
                            New Registrations
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-minus"></i>
                            <span class="blue">36</span>
                            New Articles
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-comment"></i>
                            <span class="yellow">45</span>
                            User reviews
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-arrow-up"></i>
                            <span class="green">112</span>
                            New Comments
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-arrow-down"></i>
                            <span class="red">31</span>
                            New Registrations
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-minus"></i>
                            <span class="blue">93</span>
                            New Articles
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="glyphicon glyphicon-comment"></i>
                            <span class="yellow">254</span>
                            User reviews
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/span-->
</div><!--/row-->
<?php $this->load->view('/admin/footer'); ?>
