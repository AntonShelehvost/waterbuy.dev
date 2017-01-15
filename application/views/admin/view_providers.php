<?php
/**
 * Created by PhpStorm.
 * User: Антон
 * Date: 24.12.2016
 * Time: 18:41
 */
$success = $this->session->flashdata('success');
/*echo "<pre>";
var_dump($providers->delivery_city);
echo "</pre>";*/
?>
<div class="row">
    <?php if ($success){?>
        <div class="col-md-12 alert alert-success" role="alert"><?=$success?></div>
    <?php }?>
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-briefcase"></i>Просмотр данных поставщика</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                </div>
            </div>
            <div class="box-content">
                <?php echo validation_errors(); ?>
	            <?php if(!$providers){?>
		            <img src="/assets/img/not_found.png" class="img-rounded">
		            <span class="help-inline">  К сожелению по вашему запросу данные о поставщике отствуют.</span>
	            <?php }else{?>
                <form class="form-horizontal">
                    <div class="form-group <?= (!empty(form_error('pro_organization')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="lastName">Организация/ЧП:</label>
                        <div class="col-xs-9">
                            <p> <?=$providers->pro_organization; ?></p>
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_last_name')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="lastName">Фамилия руководителя:</label>
                        <div class="col-xs-9">
	                        <div class="span8"> <?=$providers->pro_last_name; ?></div>
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_name')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="firstName">Имя руководителя:</label>
                        <div class="col-xs-9">
	                        <p> <?=$providers->pro_name; ?></p>
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_father_name')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="fatherName">Отчество руководителя:</label>
                        <div class="col-xs-9">
	                        <p> <?=$providers->pro_father_name; ?></p>
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_phone')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="phoneNumber">Телефон руководителя:</label>
                        <div class="col-xs-9">
	                        <p> <?=$providers->pro_phone; ?></p>
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_email')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="inputEmail">Email руководителя:</label>
                        <div class="col-xs-9">
	                        <p> <?=$providers->pro_email; ?></p>
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_last_name_logist')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="lastName">Фамилия логиста:</label>
                        <div class="col-xs-9">
	                        <p> <?=$providers->pro_last_name_logist; ?></p>
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_name_logist')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="firstName">Имя логиста:</label>
                        <div class="col-xs-9">
	                        <p> <?=$providers->pro_name_logist; ?></p>
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_father_name_logist')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="fatherName">Отчество логиста:</label>
                        <div class="col-xs-9">
	                        <p> <?=$providers->pro_father_name_logist; ?></p>
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_phone_logist')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="phoneNumber">Телефон логиста:</label>
                        <div class="col-xs-9">
	                        <p> <?=$providers->pro_phone_logist; ?></p>
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_email_logist')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="inputEmail">Email логиста:</label>
                        <div class="col-xs-9">
	                        <p> <?=$providers->pro_email_logist; ?></p>
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_comments')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="postalAddress">Примечание:</label>
                        <div class="col-xs-9">
	                        <p> <?=$providers->pro_comments; ?></p>
                        </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_organization')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="postalAddress">Страна:</label>
                        <div class="col-xs-3">
	                        <p> <?=$providers->pro_organization; ?></p>
                        </div>
                    </div>
                    <div class="form-group ">
                        <label class="control-label col-xs-3" for="postalAddress">Адрес:</label>
	
	                    <div class="col-xs-9">
								<span class="control-label">г.<?php echo $providers->cit_name;?> ул.<?php echo $providers->pro_street;?> дом.<?php echo $providers->pro_building;?>
									кв/пом.<?php echo $providers->pro_room;?> домофон (<?php echo $providers->pro_intercom;?>)
								</span>
	                    </div>
                    </div>
                    <div class="form-group <?= (!empty(form_error('pro_organization')) ? 'has-error' : '') ?>">
                        <label class="control-label col-xs-3" for="selectError1">Города доставки</label>
                        <div class="col-xs-9">
                            <div class="controls">
	                            <p> <?=implode('|',$providers->delivery_city); ?></p>
                            </div>
                        </div>
                    </div>
                </form>
	            <?php }?>
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