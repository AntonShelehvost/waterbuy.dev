<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 23.12.2016
 * Time: 11:31
 */
?>
<div class="row">
	<div class="box col-md-12">
		<div class="box-inner">
			<div class="box-header well" data-original-title="">
				<h2><i class="glyphicon glyphicon-edit"></i> Новый заказ</h2>
				
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
						<!--Для менеджера клиентов вытягивает в выпадающий список со свеми клиентами/поле должно быть по типу в локации - с поиском -->
							<div class="control-group">
								<label for="prd_id_providers">Клиент:</label>
								<p class="help-block">Выбрать уже зарегистрированого клиента из списка</p>
								<div class="controls">
									<select data-placeholder="Введите ФИО клиента или название организации" class="col-xs-12 col-md-12" id="selectError2" data-rel="chosen">
										<option value=""></option>
										<optgroup label="Физ.лица">
											<option>Dallas Cowboys</option>
											<option>New York Giants</option>
											<option>Philadelphia Eagles</option>
											<option>Washington Redskins</option>
										</optgroup>
										<optgroup label="ЧП/Организации">
											<option>Chicago Bears</option>
											<option>Detroit Lions</option>
											<option>Green Bay Packers</option>
											<option>Minnesota Vikings</option>
										</optgroup>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-md-6">
							<label for="fatherName">Фамилия:</label>
							<input type="text" class="form-control" id="fatherName" placeholder="Введите фамилию">
							<p class="help-block">Введите фамилию клиента, если он еще не зарегистрирован на сайте.</p>
						</div>

						<div class="col-xs-12 col-md-6">
							<label for="firstName">Имя:</label>
							<input type="text" class="form-control" id="firstName" placeholder="Введите имя">
							<p class="help-block">Введите имя клиента, если он еще не зарегистрирован на сайте.</p>
						</div>
					</div>

					<div class="form-group">
						<div class="col-xs-12 col-md-6"><!-- Обязательно для заполнения -->
							<label for="phoneNumber">Телефон:*</label>
							<input type="tel" class="form-control" id="phoneNumber"
								   placeholder="Введите номер телефона">
						</div>
						<div class="col-xs-12 col-md-6">
							<label for="">Дата/время доставки:</label>
							<div class="input-group datetime" id="">
								<input type="datetime-local" class="form-control"/>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-xs-12 col-md-12">
							<label for="postalAddress">Примечание:</label>
								<textarea rows="3" class="form-control" id="postalAddress"
										  placeholder="Примечание"></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-md-3" for="postalAddress">Итого к оплате:</label>
						<div class="col-xs-12 col-md-2">
							<label for="lastName" >Сумма, грн:</label>
							<input type="" disabled class="form-control"  placeholder="Сумма, грн">
						</div>
					</div>
					<div class="row">
						<div class="box col-md-12">
						<div class="box-inner">
							<div class="box-header well" data-original-title="">
								<h2><i class="glyphicon glyphicon-home"></i> Адрес доставки</h2>
								<div class="box-icon">
									<a href="#" class="btn btn-minimize btn-round btn-default"><i
												class="glyphicon glyphicon-chevron-up"></i></a>
								</div>
							</div>
							<div class="box-content">

									<div class="form-group">
										<div class="col-xs-12 col-md-12">

											<p class="help-block"> <a href="#myModal6" class="btn btn-primary" data-toggle="modal">Выбрать адрес</a> Нажмите "Выбрать адрес" для выбора адреса из списка адресов</p>
										</div>
										<div class="col-xs-12 col-md-4">
											<label for="postalAddress">Страна:</label>
											<div class="controls">
												<select data-placeholder="Введите название страны" class="col-xs-12 col-md-12" id="selectError2" data-rel="chosen">
													<option value=""></option>
												</select>
											</div>
										</div>
										<div class="col-xs-12 col-md-4">
											<label for="postalAddress">Область</label>
											<div class="controls">
												<select data-placeholder="Введите название области" class="col-xs-12 col-md-12" id="selectError2" data-rel="chosen">
													<option value=""></option>
												</select>
											</div>
										</div>

										<div class="col-xs-12 col-md-4">
											<label for="postalAddress">Город:</label>
											<div class="controls">
												<select data-placeholder="Введите название города" class="col-xs-12 col-md-12" id="selectError2" data-rel="chosen">
													<option value=""></option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12  col-md-4">
											<label for="postalAddress">Улица:</label>
											<input type="" class="form-control" id="" placeholder="Улица">
										</div>
										<div class="col-xs-12 col-md-2">
											<label for="postalAddress">Номер дома:</label>
											<input type="" class="form-control" id="" placeholder="Номер дома">
										</div>
										<div class="col-xs-12 col-md-3">
											<label for="postalAddress">Кв./Офис:</label>
											<input type="" class="form-control" id="" placeholder="Кв./Офис">
										</div>
										<div class="col-xs-12 col-md-3">
											<label for="postalAddress">Домофон:</label>
											<input type="" class="form-control" id="" placeholder="Домофон">
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12 col-md-6">
											<label for="postalAddress">Заезд:</label>
											<input type="" class="form-control" id="" placeholder="Заезд">
										</div>
										<div class="col-xs-12 col-md-6">
											<div class="control-group">
												<label for="">Район:</label><!--Поле обязательно для заполнения-->
												<div class="controls">
													<select data-placeholder="Введите название района" class="col-xs-12 col-md-12" id="selectError2" data-rel="chosen">
														<option value=""></option>
														<option>Dallas Cowboys</option>
														<option>New York Giants</option>
													</select>
												</div>
											</div>
											<input type="hidden" id="delivery_city" name="delivery_city">
										</div>
									</div>
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
									<div class="form-group">
										<div class="col-xs-12 col-md-5">
											<label for="">Выбирите категорию товара:</label>
											<select class="form-control"><!--поле должно быть по типу в локации - с поиском -->
												<option>Вода</option>
												<option>Посуда одноразовая</option>
											</select>
										</div>

										<div class="col-xs-12 col-md-5"><!-- Нужна именно форма поиска, так как на мобильниках должна появляться клавиатура ля ввода названия товара (в форме как у клиента select), на мобильнике розрешено выбирать только из списка, ручной ввод не поддерживается -->
											<label for="">Введите название товара:</label>
											<div class="input-group">
												<input type="text" class="form-control" placeholder="">
												  <span class="input-group-btn">
													<button class="btn btn-info" type="button">
														<i class="glyphicon glyphicon-search"></i>
													</button>
												  </span>
											</div>
										</div>
										<div class="col-xs-12 col-md-2">
											<label for="">&ensp;</label>
											<a href="#" class="btn btn-info" data-toggle="modal"><i class="glyphicon glyphicon-trash"></i> Очистить фильтры</a>
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12 col-md-3">
											<label for=""> Минимальный заказ</label><!-- Вытягиваем поле минимальный заказ по выбраному региону -->
											<div class="checkbox">
												<label class="col-xs-12">
													<input type="checkbox" value="">
													1 бутыль
												</label>
												<label class="col-xs-12">
													<input type="checkbox" value="">
													2 бутли
												</label>
												<label class="col-xs-12">
													<input type="checkbox" value="">
													3 бутли
												</label>
											</div>
										</div>

										<div class="col-xs-12 col-md-3"><!-- Вытягиваем меры объема по выбраному региону -->
											<label for=""> Объем</label>
											<div class="checkbox">
												<label class="col-xs-12">
													<input type="checkbox" value="">
													1 л
												</label>
												<label class="col-xs-12">
													<input type="checkbox" value="">
													2 л
												</label>
												<label class="col-xs-12">
													<input type="checkbox" value="">
													3 л
												</label>

											</div>
										</div>

										<div class="col-xs-12 col-md-3">
											<label for=""> Торговая марка</label><!-- Вытягиваем торговые марки по выбраному региону -->
											<div class="checkbox">
												<label class="col-xs-12">
													<input type="checkbox" value="">
													Тест
												</label>
												<label class="col-xs-12">
													<input type="checkbox" value="">
													Аляска
												</label>
												<label class="col-xs-12">
													<input type="checkbox" value="">
													Миргород
												</label>
											</div>
										</div>
										<div class="col-xs-12 col-md-3">
											<label for=""> Поставщик</label><!-- Вытягиваем поставщиков по выбраному региону у кого есть выбранный товар-->
											<div class="checkbox">
												<label class="col-xs-12">
													<input type="checkbox" value="">
													Тестовый поставщик
												</label>
												<label class="col-xs-12">
													<input type="checkbox" value="">
													ЧП Иванов
												</label>
												<label class="col-xs-12">
													<input type="checkbox" value="">
													ЧП Пупкин
												</label>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--/span-->
					</div><!--/row-->




					<div class="col-xs-12 col-md-12">
						<ul class="nav nav-tabs">
							<li class="active"><a data-toggle="tab" href="#panel1">Список товаров</a></li>
							<li><a data-toggle="tab" href="#panel2">Корзина</a></li>
						</ul>

						<div class="tab-content">
							<div id="panel1" class="tab-pane fade in active">
								<h3>Список товаров</h3>
								<div class="form-group">
									<div class="col-xs-12 col-md-12">
										<div class="panel panel-primary">
											<div class="panel-heading">
												<h3 class="panel-title">Вода негазована/ТМ Аляска </h3><!-- Вытягиваем наименование товара/Торговая марка-->
											</div>
											<div class="panel-body">
												<div class="img-responsive col-xs-12 col-md-2">
													<img src="/assets/img/myrgorod.png" alt="Event 2" class="img-responsive center-block">
												</div>
												<div class="col-xs-12 col-md-10">
													<div class="col-xs-12 col-md-6">
														<h5>Цена <span class="badge">25 грн</span></h5>
														<h5>Объем <span class="badge">5 л</span></h5>
													</div>
													<div class="col-xs-12 col-md-6">
														<label for=""> Количество </label>
														<div class="input-group  col-md-4">
													 <span class="input-group-btn">
													 <button id="minus" class="btn btn-primary" type="button">-</button>
													 </span>
															<input id="calc" type="text" class="form-control" value="1">
													 <span class="input-group-btn">
													 <button id="plus" class="btn btn-info" type="button">+</button>
													 </span>
														</div><!-- /input-group -->
														<script>
															$('#minus').click(function(){
																$("#calc").val(parseInt($("#calc").val())-1);
															});
															$('#plus').click(function(){
																$("#calc").val(parseInt($("#calc").val())+1);
															});
														</script>
													</div>
													<div class=" col-xs-12 col-md-10">
														Аляска — кристально чистая вода, в которой благодаря бережному очищению сохраняется идеальный баланс полезных минералов.
													</div>
													<div class="col-xs-12 col-md-12">
														<a href="#" class="btn btn-primary" data-toggle="modal"><i class="glyphicon glyphicon-shopping-cart"></i>Добавить в заказ</a>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-xs-12 col-md-12">
										<div class="panel panel-primary">
											<div class="panel-heading">
												<h3 class="panel-title">Вода негазована/ТМ Аляска </h3><!-- Вытягиваем наименование товара/Торговая марка-->
											</div>
											<div class="panel-body">
												<div class="img-responsive col-xs-12 col-md-2">
													<img src="/assets/img/myrgorod.png" alt="Event 2" class="img-responsive center-block">
												</div>
												<div class="col-xs-12 col-md-10">
													<div class="col-xs-12 col-md-6">
														<h5>Цена <span class="badge">25 грн</span></h5>
														<h5>Объем <span class="badge">5 л</span></h5>
													</div>
													<div class="col-xs-12 col-md-6">
														<label for=""> Количество </label>
														<div class="input-group  col-md-4">
													 <span class="input-group-btn">
													 <button id="minus" class="btn btn-primary" type="button">-</button>
													 </span>
															<input id="calc" type="text" class="form-control" value="1">
													 <span class="input-group-btn">
													 <button id="plus" class="btn btn-info" type="button">+</button>
													 </span>
														</div><!-- /input-group -->
														<script>
															$('#minus').click(function(){
																$("#calc").val(parseInt($("#calc").val())-1);
															});
															$('#plus').click(function(){
																$("#calc").val(parseInt($("#calc").val())+1);
															});
														</script>
													</div>
													<div class=" col-xs-12 col-md-10">
														Аляска — кристально чистая вода, в которой благодаря бережному очищению сохраняется идеальный баланс полезных минералов.
													</div>
													<div class="col-xs-12 col-md-12">
														<a href="#" class="btn btn-primary" data-toggle="modal"><i class="glyphicon glyphicon-shopping-cart"></i>Добавить в заказ</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="panel2" class="tab-pane fade">
								<h3>Панель 2</h3>
								<p>Содержимое 2 панели...</p>
							</div>
						</div>
					</div>


					<br/>
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

</div>