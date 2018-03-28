<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
	# If in UPDATE mode it gets the data from the db, creates and populates the field variable names and data via $get_record_by_id 
	# if validation failed it re-populates from the posted information via $this->input->post(), 
	# otherwise it gets the field names as variables from $this->db->list_fields($this->tbl) and sets them to ''
	if($this->action === 'update'){
		foreach($get_record_by_id as $field => $value){$$field = $value;}
	}elseif($this->input->post()){
		foreach($this->input->post() as $field => $value){$$field = $value;}
	}else{
		foreach($get_fields as $field){$$field = '';}
		if(!isset($get_dropdown_all_languages)) $get_dropdown_all_languages = ''; 
		if(!isset($fkidLanguage)) $fkidLanguage = ''; 

	}
				echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal')); ?>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('performance_indicator');?></label>
					<div class="col-xs-7">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-globe"></span></span>
							<?php echo form_dropdown("fkidPi", $get_dropdown_all_pi, set_value("fkidPi",$fkidPi), array('id'=>'role', 'required'=>'', 'class'=>'form-control')); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('mdt');?></label>
					<div class="col-xs-7">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-globe"></span></span>
							<?php echo form_dropdown("fkidDimensionType", $get_dropdown_all_mdt, set_value("fkidDimensionType",$fkidDimensionType), array('id'=>'role', 'required'=>'', 'class'=>'form-control')); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('md');?></label>
					<div class="col-xs-7">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-sliders"></span></span>
							<?php echo form_input(array('name'=>'dimensionName', 'value'=>$dimensionName, 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('md')));?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('sm');?></label>
					<div class="col-xs-7">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-globe"></span></span>
							<?php echo form_dropdown("fkidScoringMethod", $get_dropdown_all_sms, set_value("fkidScoringMethod",$fkidScoringMethod), array('id'=>'role', 'required'=>'', 'class'=>'form-control')); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('language');?></label>
					<div class="col-xs-7">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-comment"></span></span>
							<?php echo form_dropdown("fkidLanguage", $get_dropdown_all_languages, set_value("fkidLanguage",$fkidLanguage), array('id'=>'role', 'required'=>'', 'class'=>'form-control')); ?>
						</div>
					</div>
				</div>					
				<div class="form-group">
					<div class="col-xs-12" style="text-align:center !important;">
					  <button type="submit" class="btn btn-primary white"><i class="<?php echo $this->panel_icon;?> mr5"></i><?php echo $submit_button; ?></button>
					</div>
				</div>
				<?php echo form_close(); ?>