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
				<h2><i class="glyphicon glyphicon-phone"></i> Список клиентов</h2>
				
				<div class="box-icon">
					<a href="#" class="btn btn-minimize btn-round btn-default"><i
							class="glyphicon glyphicon-chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<div class="row">
					<div class="col-md-12">
						<a href="/admin/add_clients" class="btn btn-default btn-sm" title="добавить">
							<span class="glyphicon glyphicon-plus"></span> Добавить
						</a>
					</div>
				</div>
				<br>
				<table class="table table-striped table-bordered responsive" id="clients">
					<thead>
					<tr>
						<th>№</th>
						<th>ФИО</th>
						<th>Телефон</th>
						<th>Адрес</th>
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

<div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Удаление заказа</h3>
			</div>
			<div class="modal-body"> <!--Пишем название страны-->
				<p>Вы действительно хотите удалить Клиента?</p>
				<form>
					<input type="hidden" name="cli_id" id="cli_id">
					<div class="modal-footer">
						<a href="#" class="btn btn-default" data-dismiss="modal">Отмена</a>
						<a href="#" class="btn btn-primary ajaxDelete_cli" form_url="/admin/delete_cli"
						   data-dismiss="modal">Да</a>
					</div>
				</form>
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
				"url": "<?php echo site_url('admin/ajax_clients')?>", "type": "POST"
			},
			
			//Set column definition initialisation properties.
			"columnDefs": [
				{
					"targets": [0, 3, 4], //first column / numbering column
					"orderable": false, //set not orderable
				},
			]
		});

		var pos = 0;
		$('#clients thead th').each(function () {
			pos++;
			var title = $(this).text();
			if (pos == 2 || pos == 3)$(this).html('<input type="text" class="full form-control input-sx" placeholder="' + title + '" />');
		});

		$('#clients tr input[type="text"]').click(function () {
			return false;
		});
		table.columns().every(function () {
			var that = this;

			$('input', this.header()).on('keyup change', function () {
				if (that.search() !== this.value) {
					that
						.search(this.value)
						.draw();
				}
			});
		});
	});
</script>
