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
				<h2><i class="glyphicon glyphicon-phone"></i> Карточка клиента</h2>
				
				<div class="box-icon">
					<a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
				</div>
			</div>
			<div class="box-content">
				<?php echo validation_errors();?>
				<?php if(!$client){?>
					<img src="/assets/img/not_found.png" class="img-rounded">
					<span class="help-inline">  К сожелению по вашему запросу данные о клиенте отствуют</span>
				<?php }else{?>
				<form class="form-horizontal" method="post" action="">
					<div class="form-group ">
						<label class="control-label col-xs-3" for="lastName">Организация/ЧП:</label>
						<div class="col-xs-9">
							<p><?php echo $client->use_organization;?></p>
						</div>
					</div>
					<div class="form-group ">
						<label class="control-label col-xs-3" for="lastName">Фамилия*:</label>
						<div class="col-xs-9">
							<span><?php echo $client->use_last_name;?></span>
						</div>
					</div>
					<div class="form-group ">
						<label class="control-label col-xs-3" for="firstName">Имя*:</label>
						<div class="col-xs-9">
							<span><?php echo $client->use_name;?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="fatherName">Отчество:</label>
						<div class="col-xs-9">
							<span><?php echo $client->use_father_name;?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3">Дата рождения:</label>
						<div class="col-xs-3">
							<span><?php echo $client->use_birthday;?></span>
						
						</div>
						
					</div>
					<div class="form-group ">
						<label class="control-label col-xs-3" for="inputEmail">Email*:</label>
						<div class="col-xs-9">
							<span><?php echo $client->use_email;?></span>
						</div>
					</div>
					
					<div class="form-group ">
						<label class="control-label col-xs-3" for="phoneNumber">Телефон*:</label>
						<div class="col-xs-9">
							<span><?php echo $client->use_phone;?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="postalAddress">Примечание:</label>
						<div class="col-xs-9">
							<span><?php echo $client->use_comments;?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="postalAddress">Адрес:</label>
						
							<div class="col-xs-9">
								<span class="control-label">г.<?php echo $client->cit_name;?> ул.<?php echo $client->use_street;?> дом.<?php echo $client->use_building;?>
								кв/пом.<?php echo $client->use_room;?> домофон (<?php echo $client->use_intercom;?>)
								</span>
								
							</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3">Пол*:</label>
						<div class="col-xs-2">
							<label class="radio-inline">
								<input type="radio" name="use_male"  <?php ($client->use_male==1)?'checked':"";?>> Мужской
							</label>
						</div>
						<div class="col-xs-2">
							<label class="radio-inline">
								<input type="radio" name="use_male" <?php ($client->use_male==2)?'checked':"";?>> Женский
							</label>
						</div>
					</div>
				</form>
				<?php }?>
			</div>
		</div>
	</div>
	<!--/span-->

</div>
