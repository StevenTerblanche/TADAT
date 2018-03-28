<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	# If in UPDATE mode it gets the data from the db, creates and populates the field variable names and data via $get_record_by_id 
	# if validation failed it re-populates from the posted information via $this->input->post(), 
	# otherwise it gets the field names as variables from $this->db->list_fields($this->tbl) and sets them to ''
	if($this->action === 'update'){
		foreach($get_record_by_id as $field => $value){$$field = $value;}
		
		
				$dateStart = date('l, F d, Y', strtotime($dateStart));
				$dateEnd = date('l, F d, Y', strtotime($dateEnd));				
		
		
		
		
	}elseif($this->input->post()){
		foreach($this->input->post() as $field => $value){$$field = $value;}
	}else{
		foreach($get_fields as $field){$$field = '';}
		if(!isset($get_dropdown_all_country)) $get_dropdown_all_country = ''; 
		if(!isset($rfkidCountry)) $rfkidCountry = ''; 
	}
			echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal')); ?>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('revenue_authority');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-user"></span></span>
							<?php echo form_dropdown("fkidRevenueAuthority", $get_dropdown_all_rev_auth, $fkidRevenueAuthority, 'class="form-control" required');?>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('mission').lang('_name');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-adn"></span></span>
							<?php echo form_input(array('name'=>'mission', 'value'=>$mission, 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('mission').lang('_name').' i.e Rwanda 2015'));?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('mission_') . lang('team_leader');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-user"></span></span>
							<?php echo form_dropdown("fkidTeamLeader", $get_dropdown_all_team_leaders, $fkidTeamLeader, 'class="form-control" required');?>
						</div>
					</div>
				</div>		
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('start_').lang('date');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<?php echo form_input(array('name'=>'dateStart', 'value'=>$dateStart, 'class'=>'form-control', 'id'=>'mission-start', 'required'=>'', 'placeholder'=>lang('start_').lang('date'))); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('end_').lang('date');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<?php echo form_input(array('name'=>'dateEnd', 'value'=>$dateEnd, 'class'=>'form-control', 'id'=>'mission-end', 'placeholder'=>lang('end_').lang('date'))); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('assessment').lang('_period');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-user"></span></span>
							<?php echo form_dropdown("fkidAssessmentPeriod", $get_dropdown_all_period, $fkidAssessmentPeriod, 'class="form-control" required');?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('mission').lang('_status');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-user"></span></span>
							<?php echo form_dropdown("fkidMissionStatus", $get_dropdown_all_status, $fkidMissionStatus, 'class="form-control" required');?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12" style="text-align:center !important;">
					  <button type="submit" class="btn btn-primary white"><i class="<?php echo $this->panel_icon;?> mr5"></i><?php echo $submit_button; ?></button>
					</div>
				</div>
				<?php echo form_close(); ?>