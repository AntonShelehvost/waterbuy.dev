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
				<h2><i class="glyphicon glyphicon-edit"></i> Редактировать товар</h2>
				
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
				<?php if(!$products){?>
				<img src="/assets/img/not_found.png" class="img-rounded">
				<span class="help-inline">  К сожелению по вашему запросу данные о товаре отствуют.</span>
				<?}else{?>
				<form action="/admin/edit_products" class="form-horizontal" method="post" accept-charset="utf-8"
				      enctype="multipart/form-data">
					<div class="form-group">
						<label class="control-label col-xs-3" for="prd_id_providers">Организация/ЧП(Поставщик):</label>
						<div class="col-xs-9">
							<select value="<?php echo set_value('prd_id_providers'); ?>" name="prd_id_providers"
							        id="prd_id_providers" class="form-control">
								<?php foreach ($providers as $item) { ?>
									<option value="<?= $item->pro_id; ?>"><?= trim($item->pro_organization); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="prd_title">Наименование товара:</label>
						<div class="col-xs-9">
							<input  value="<?= !empty(set_value('prd_title'))?set_value('prd_title'):$products->prd_title; ?>" name="prd_title" type="text"
							       class="form-control" id="prd_title" placeholder="Введите название товара">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="prd_description">Описание продукции:</label>
						<div class="col-xs-9">
							<textarea rows="3" name="prd_description" class="form-control" id="prd_description"
							          placeholder="Введите описание продукции"><?= !empty(set_value('prd_description'))?set_value('prd_description'):$products->prd_description; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="prd_title_producer">Производитель:</label>
						<div class="col-xs-9">
							<input  value="<?= !empty(set_value('prd_title_producer'))?set_value('prd_title_producer'):$products->prd_title_producer; ?>" name="prd_title_producer"
							       type="text" class="form-control" id="prd_title_producer"
							       placeholder="Введите производителя">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="prd_comments">Коментарий:</label>
						<div class="col-xs-9">
							<textarea rows="3" name="prd_comments"
							          class="form-control" id="prd_comments"
							          placeholder="Введите коментарий"><?= !empty(set_value('prd_comments'))?set_value('prd_comments'):$products->prd_comments; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3">Объем/цена:</label>
						<div class="col-xs-5">
							<input  value="<?= !empty(set_value('prd_volume_price'))?set_value('prd_volume_price'):$products->prd_volume_price;?>" name="prd_volume_price"
							       type="text" class="form-control" id="fatherName" placeholder="Введите объем, литров">
						</div>
						<div class="col-xs-4">
							<input  value="<?= !empty(set_value('prd_price'))?set_value('prd_price'):$products->prd_price;?>" name="prd_price" type="text"
							       class="form-control" id="fatherName" placeholder="Введите цену,грн">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="postalAddress">Страна:</label>
						<div class="col-xs-3">
							<select class="form-control" name="prd_id_country">
								<?php foreach ($country as $item) { ?>
									<option value="<?= $item->cou_id; ?>"><?= trim($item->cou_name); ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="postalAddress">Города, в которых осуществляется
							доставка:</label>
						<div class="col-xs-9">
							<div class="controls">
								<select id="selectError1" multiple class="form-control" data-rel="chosen">
									<?php foreach ($city as $item) { ?>
										<option <?=(in_array($item->cit_id,$products->delivery_city))?'selected':''?> value="<?= $item->cit_id; ?>"><?= trim($item->cit_name); ?></option>
									<?php } ?>
								</select>
								<input type="hidden" id="delivery_city" name="delivery_city">
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="prd_file">Загрузить фото из файла:</label>
						<div class="col-xs-9">
							<?php if(!empty($products->prd_file)){ ?>
								<div class="thumbnail">
									<img width="48" src="/uploads/<?php echo $products->prd_file; ?>">
								</div>
								<div class="caption">
									<p align="center">
										<a href="/admin/brand/delete_products_image/<?php echo $products->prd_file; ?>/true" class="btn btn-primary btn-xs" role="button">Удалить фото</a>
									</p>
								</div>
							<?php }  ?>
							<input  class="thumbnail" name="prd_file_certificates" type="file" id="prd_file_certificates">
							<?php if (isset($error1)) { ?>
								<p class="help-block"><?= implode(',', $error1) ?></p>
							<?php } else { ?>
								<p class="help-block">Файл должен иметь расширение jpg, jpeg, png</p>
							<? } ?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="exampleInputFile1">Загрузить сертификаты
							качества:</label>
						<div class="col-xs-9">
							<?php if(!empty($products->prd_file_certificates)){ ?>
							<div class="thumbnail">
									<img width="48" src="/uploads/<?php echo $products->prd_file_certificates; ?>">
							</div>
							<div class="caption">
								<p align="center">
									<a href="/admin/brand/delete_products_image/<?php echo $products->prd_file_certificates; ?>/true" class="btn btn-primary btn-xs" role="button">Удалить фото</a>
								</p>
							</div>
							<?php }  ?>
							<input  class="thumbnail" name="prd_file_certificates" type="file" id="prd_file_certificates">
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
							<input type="submit" class="btn btn-primary" value="Сохранить">
							<input type="reset" class="btn btn-default" value="Очистить форму">
						</div>
					</div>
				</form>
			<?}?>
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
