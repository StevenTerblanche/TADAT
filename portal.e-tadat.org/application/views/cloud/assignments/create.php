<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
	# If in UPDATE mode it gets the data from the db, creates and populates the field variable names and data via $arrAllAssignments 
	# if validation failed it re-populates from the posted information via $this->input->post(), 
	# otherwise it gets the field names as variables from $this->db->list_fields($this->tbl) and sets them to ''
	if($this->action === 'update'){
		foreach($arrAllAssignments as $field => $value){$$field = $value;}
	}elseif($this->input->post()){
		foreach($this->input->post() as $field => $value){$$field = $value;}
	}else{
		foreach($get_fields as $field){$$field = '';}
		if(!isset($get_dropdown_all_authorities)) $get_dropdown_all_authorities = ''; 
		if(!isset($fkidAuthority)) $fkidAuthority = ''; 
		if(!isset($get_dropdown_all_missions)) $get_dropdown_all_missions = ''; 
		if(!isset($fkidMission)) $fkidMission = ''; 
		if(!isset($get_dropdown_all_users)) $get_dropdown_all_users = ''; 
		if(!isset($fkidUser)) $fkidUser = ''; 
	}
				echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal', 'id'=>'formAssignment')); ?>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('revenue_authority');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-bank"></span></span>
							<?php echo form_dropdown("fkidAuthority", $get_dropdown_all_authorities, set_value("fkidAuthority",$fkidAuthority), array('id'=>'authority', 'required'=>'', 'class'=>'form-control')); ?>
						</div>
					</div>
				</div>
				<div id="mission_container" class="form-group" style="display:none">
					<label class="col-xs-3 control-label"><?php echo lang('mission');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-globe"></span></span>
							<?php echo form_dropdown("fkidMission", $get_dropdown_all_missions, set_value("fkidMission",$fkidMission), array('id'=>'mission', 'required'=>'', 'class'=>'form-control')); ?>
						</div>
					</div>
				</div>
				
				<div id="user_container" class="form-group" style="display:none">
					<label class="col-xs-3 control-label"><?php echo lang('user');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-user"></span></span>
							<?php echo form_dropdown("fkidUser", $get_dropdown_all_users, set_value("fkidUser",$fkidUser), array('id'=>'user', 'required'=>'', 'class'=>'form-control')); ?>
						</div>
					</div>
				</div>														
				<div id="poa_container" class="form-group" style="display:none">
					<label class="col-xs-3 control-label">&nbsp;</label>
					<div id="poa_data" class="col-xs-6"></div>
				</div>
				<div class="form-group">
					<div class="col-xs-12" style="text-align:center !important;">
					  <button type="submit" class="btn btn-primary white"><i class="<?php echo $this->panel_icon;?> mr5"></i><?php echo $submit_button; ?></button>
					</div>
				</div>
				<?php echo form_close(); ?>