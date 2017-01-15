<?php

function quark_dump($var, $return = false, $use_xdebug = true) {
	$use_xdebug = $use_xdebug && function_exists('xdebug_var_dump');
	if ($return) {
		if ($use_xdebug && function_exists('ob_start')) {
			ob_start();
			xdebug_var_dump($var);
			$out = ob_get_contents();
			ob_end_clean();
		} else {
			$out = "<pre class='quark-dump'>" . htmlentities(var_export($var, $return), ENT_QUOTES, "utf-8") . "</pre>";
		}
		
		return $out;
	} else {
		if ($use_xdebug) {
			xdebug_var_dump($var);
		} else {
			echo "<pre class='quark-dump'>" . htmlentities(var_export($var, true), ENT_QUOTES, "utf-8") . "</pre>";
		}
	}
	
}

function buildFieldsFor($fields) {
	foreach ($fields as $field) {
		$data = array('name' => $field->name,'class'=>'form_input','type'=>'text');
		switch ($field->type) {
			case 'varchar':
				echo
				'<div class="form-group">
						<label class="control-label col-xs-3" for="'.$field->name.'">'.$field->name.':</label>
						<div class="col-xs-9">
							'.form_input($data).'
						</div>
					</div>';
				
				
				break;
			case 'datetime':
				$data['class'] = 'datepicker';
				'<div class="form-group">
						<label class="control-label col-xs-3" for="'.$field->name.'">'.$field->name.':</label>
						<div class="col-xs-9">
							'.form_input($data).'
						</div>
					</div>';
				break;
			case 'text':
				$data['rows'] = 5;
				$data['cols'] = 10;
				'<div class="form-group">
						<label class="control-label col-xs-3" for="'.$field->name.'">'.$field->name.':</label>
						<div class="col-xs-9">
							'.form_textarea($data).'
						</div>
					</div>';
				break;
		}
	}
}