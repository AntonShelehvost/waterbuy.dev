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
							<select value="<?php echo set_value('prd_id_providers'); ?>" name="prd_id_providers"
							        id="prd_id_providers" class="form-control">
								<?php foreach ($providers as $item) { ?>
									<option value="<?= $item->pro_id; ?>"><?= trim($item->pro_organization); ?></option>
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
						<label class="control-label col-xs-12 col-md-3" for="prd_description">Описание продукции:</label>
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
						<label class="control-label col-xs-12 col-md-3" for="postalAddress">Регионы, в которых осуществляется
							доставка:</label>
						<label class="control-label col-xs-12 col-md-9 text-left" for="postalAddress"><a href="#" class="btn btn-info btn-sm" title="добавить">
								<span class="glyphicon glyphicon-plus"></span> Добавить регион</a></label>
						<div class="col-xs-12 col-md-3">
							<label for="prd_id_country">Страна</label>
							<select class="form-control" name="prd_id_country">
								<?php foreach ($country as $item) { ?>
									<option value="<?= $item->cou_id; ?>"><?= trim($item->cou_name); ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="col-xs-12 col-md-6">
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
						<label class="control-label col-xs-12 col-md-3" for="postalAddress">Город:</label>
						<div class="col-xs-12 col-md-9">
							<div class="controls">
								<select id="selectError1" multiple class="form-control" data-rel="chosen">
									<?php foreach ($city as $item) { ?>
										<option value="<?= $item->cit_id; ?>"><?= trim($item->cit_name); ?></option>
									<?php } ?>
								</select>
								<input type="hidden" id="delivery_city" name="delivery_city">
							</div>
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
								<p class="help-block">Пример файла загрузки можно скачать <a href="#"> здесь</a></p>
							<? } ?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-12 col-md-3" for="exampleInputFile1">Загрузить сертификаты
							качества:</label>
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

</div>

<script>
	$(document).ready(function(){
		$('#selectError1').on('change',function(){
			$('#delivery_city').val($("#selectError1").chosen().val());
		});
	});
</script>
