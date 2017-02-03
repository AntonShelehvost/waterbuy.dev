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
					<div class="col-md-12">
						<a href="/<?= $this->uri->segment(1) ?>/add_products" class="btn btn-default btn-sm"
						   title="добавить">
							<span class="glyphicon glyphicon-plus"></span> Добавить
						</a>
					</div>
				</div>
				<br>
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
	});
</script>
