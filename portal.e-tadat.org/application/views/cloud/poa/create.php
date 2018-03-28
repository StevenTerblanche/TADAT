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
		if(!isset($description)) $description = ''; 
		if(!isset($desiredOutcome)) $desiredOutcome = ''; 		
		if(!isset($background)) $background = ''; 				
		if(!isset($indicators)) $indicators = ''; 
	}
				echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal')); ?>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('performance_outcome_area');?></label>
					<div class="col-xs-7">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-sliders"></span></span>
							<?php echo form_input(array('name'=>'poa', 'value'=>$poa, 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('performance_outcome_area')));?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('description');?></label>
					<div class="col-xs-7">
						<div class="panelb">						
							<?php echo form_textarea(array('name'=>'description', 'value'=>$description, 'class'=>'form-control', 'required'=>'', 'id'=>'summernote_3'));?>
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
					<label class="col-xs-3 control-label"><?php echo lang('desired_outcome');?></label>
					<div class="col-xs-7">
						<div class="panelb">
							<?php echo form_textarea(array('name'=>'desiredOutcome', 'value'=>$desiredOutcome, 'class'=>'form-control', 'required'=>'', 'id'=>'summernote'));?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('background');?></label>
					<div class="col-xs-7">
						<div class="panelb">					
							<?php echo form_textarea(array('name'=>'background', 'value'=>$background, 'class'=>'form-control', 'required'=>'', 'id'=>'summernote_1'));?>
						</div>
					</div>
				</div>								
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('i_d_s');?></label>
					<div class="col-xs-7">
						<div class="panelb">					
							<?php echo form_textarea(array('name'=>'indicators', 'value'=>$indicators, 'class'=>'form-control', 'required'=>'', 'id'=>'summernote_2'));?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo 'Assessment Text';?></label>
					<div class="col-xs-7">
						<div class="panelb">					
							<?php echo form_textarea(array('name'=>'assessment_text', 'value'=>$assessment_text, 'class'=>'form-control', 'id'=>'summernote_4'));?>
						</div>						
					</div>
				</div>								
						
				<div class="form-group">
					<div class="col-xs-12" style="text-align:center !important;">
					  <button type="submit" class="btn btn-primary white"><i class="<?php echo $this->panel_icon;?> mr5"></i><?php echo $submit_button; ?></button>
					</div>
				</div>
				<?php echo form_close(); ?>