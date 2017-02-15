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
                <h2><i class="glyphicon glyphicon-briefcase"></i> Локации</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <div class="row">
                    <div class="col-md-12">
                        <a href="/admin/add_location" class="btn btn-default btn-sm" title="Добавить локацию">
                            <span class="glyphicon glyphicon-plus"></span> Добавить локацию
                        </a>
                    </div>
                </div>
                <br>
                <table class="responsive nowrap dataTable no-footer table-bordered table-hover" id="clients" width="100%"
                       style="width: 100%;">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Страна</th>
                        <th>Область</th>
                        <th>Город</th>
                        <th>Район</th>

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
                "url": "<?php echo site_url('admin/ajax_location')?>", "type": "POST"
            },

            //Set column definition initialisation properties.
            "columnDefs": [
                {

                    "targets": [0], //first column / numbering column
                    "orderable": false, //set not orderable
                },
            ],
            "oLanguage": {
                "sProcessing": "<div id='Searching_Modal' class='modal' data-backdrop='static' data-keyboard='false' tabindex='-1' role='dialog' aria-hidden='true' style='display: block;padding-top:15%;overflow-y:visible;'><div class='modal-dialog modal-sm'><div class='modal-content'><div class='modal-header'><h3 style='margin:0;'>Загрузка данных...</h3></div><div class='modal-body' style='padding: 10px !important;'><div class='progress progress-striped active' style='margin-bottom:0;'><div class='progress-bar' style='width: 100%'></div></div></div></div></div></div>"
            }
        });

        var pos=0;
        $('#clients thead th').each(function () {
            pos++;
            var title = $(this).text();
            if (pos == 2 || pos == 3 || pos == 4 || pos == 5)$(this).html('<input type="text" class="full form-control input-sx" placeholder="' + title + '" />');
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
        /*table.columns().every(function () {
            var that = this;
            $(this.header()).find('input').bind('keyup', function (e) {
                if (e.keyCode == 13 && this.type != "checkbox") {

                    if (that.search() !== this.value) {
                        that
                            .search(this.value)

                            .draw();
                    }
                }
                return false;
            });
        });
*/

    });

</script>
