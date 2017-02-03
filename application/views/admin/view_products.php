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
				<h2><i class="glyphicon glyphicon-edit"></i> Товар</h2>
				
				<div class="box-icon">
					<a href="#" class="btn btn-minimize btn-round btn-default"><i
							class="glyphicon glyphicon-chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<?php echo validation_errors(); ?>
				<form action="/admin/add_products" class="form-horizontal" method="post" accept-charset="utf-8"
				      enctype="multipart/form-data">
					<div class="form-group">
						<label class="control-label col-xs-3" for="prd_id_providers">Организация/ЧП(Поставщик):</label>
						<div class="col-xs-9">
							<p><?php print_r($products->user->use_organization); ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="prd_title">Наименование товара:</label>
						<div class="col-xs-9">
							<p><?php echo $products->prd_title; ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="prd_description">Описание продукции:</label>
						<div class="col-xs-9">
							<p><?php echo $products->prd_description; ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="prd_title_producer">Производитель:</label>
						<div class="col-xs-9">
							<p><?php echo $products->prd_title_producer; ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="prd_comments">Коментарий:</label>
						<div class="col-xs-9">
							<p><?php echo $products->prd_comments; ?></p>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3">Объем/цена:</label>
						<div class="col-xs-5">
							<p><?php echo $products->prd_volume_price; ?>/<?php echo $products->prd_price; ?></p>
						
						</div>
					
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="postalAddress">Города, в которых осуществляется
							доставка:</label>
						<div class="col-xs-9">
							<div class="controls">
								<p><?php echo $products->prd_title; ?></p>
							
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="prd_file">Фото из файла:</label>
						<div class="col-xs-9">
							<?php if(!empty($products->prd_file)){ ?>
								<img width="48" src="/uploads/<?php echo $products->prd_file; ?>">
							<?}else{?>
								<span >Отсутствует</span>
							<?}?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="exampleInputFile1">Загрузить сертификаты
							качества:</label>
						<div class="col-xs-9">
							<?php if(!empty($products->prd_file_certificates)){ ?>
							<img width="48" src="/uploads/<?php echo $products->prd_file_certificates; ?>">
							<?}else{?>
							<span >Отсутствует</span>
							<?}?>
						</div>
					</div>
					<br/>
					<div class="form-group">
						<div class="col-xs-offset-3 col-xs-9">
							<a class="btn btn-default" href="/<?= $this->uri->segment(1) ?>/products"><i
									class="	glyphicon glyphicon-arrow-left"></i> Назад</a>
						</div>
					</div>
				</form>
			
			</div>
		</div>
	</div>
	<!--/span-->

</div>
