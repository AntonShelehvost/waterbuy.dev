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
				<h2><i class="glyphicon glyphicon-briefcase"></i> Список Поставщиков</h2>
				
				<div class="box-icon">
					<a href="#" class="btn btn-minimize btn-round btn-default"><i
							class="glyphicon glyphicon-chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<div class="row">
					<div class="col-md-12">
						<a href="/admin/add_providers" class="btn btn-default btn-sm" title="добавить">
							<span class="glyphicon glyphicon-plus"></span> Добавить
						</a>
					</div>
				</div>
				<br>
				<table class="table table-striped table-bordered responsive" id="clients">
					<thead>
					<tr>
						<th>№</th>
						<th>Организация</th>
						<th>Руководитель</th>
						<th>Телефон</th>
						<th>Логист</th>
						<th>Телефон логиста</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!--/span-->

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
				"url": "<?php echo site_url('admin/ajax_providers')?>", "type": "POST"
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
