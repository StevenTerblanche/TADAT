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
		if(!isset($evidence)) $evidence = ''; 
		if(!isset($fkidDimension)) $fkidDimension = ''; 

	}
				echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal')); ?>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('md');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-cubes"></span></span>
							<?php echo form_dropdown("fkidDimension", $get_dropdown_all_mds, set_value("fkidDimension",$fkidDimension), array('id'=>'role', 'class'=>'form-control')); ?>
						</div>
					</div>
				</div>				
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('language');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-comment"></span></span>
							<?php echo form_dropdown("fkidLanguage", $get_dropdown_all_languages, set_value("fkidLanguage",$fkidLanguage), array('id'=>'role', 'class'=>'form-control')); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"></label>
					<div class="col-xs-6">
						<div class="panelb">
							<?php echo form_textarea(array('name'=>'evidence', 'value'=>$evidence, 'class'=>'form-control', 'id'=>'summernote'));?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12" style="text-align:center !important;">
					  <button type="submit" class="btn btn-primary white"><i class="<?php echo $this->panel_icon;?> mr5"></i><?php echo $submit_button; ?></button>
					</div>
				</div>
				<?php echo form_close(); ?>