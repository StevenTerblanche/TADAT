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
		if(!isset($get_dropdown_all_missions)) $get_dropdown_all_missions = ''; $get_dropdown_all_poas = '';
		if(!isset($fkidMission)) $fkidMission = ''; $fkidPoa = '';
	}
?>
<div class="col-md-8">
	<div class="panel panel-default panel-blue-margin">
		<div class="panel-heading dark-blue-bg"><h4 class="panel-title mb0"><i class="<?php echo $panel_icon;?>"></i><?php echo strtoupper($panel_title);?></h4></div>
			<div class="panel-body">
			<?php
			if ($this->session->flashdata('error') || validation_errors() || $this->session->flashdata('message')){
				echo '<div class="panel panel-danger panelClose form-error">';
					if ($this->session->flashdata('error')){
						echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>'.strtoupper(lang('a_system_error').lang('_occurred')).'!</h4></div>';
						echo '<div class="panel-body">'.$this->session->flashdata('error').'</div>';
					}elseif (validation_errors()){
						echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>'.strtoupper(lang('a_validation_error').lang('_occurred')).'!</h4></div>';
						echo '<div class="panel-body">'.validation_errors().'</div>';
					}
				echo '</div>';
			}
			?>
			<?php echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal')); ?>

				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('mission');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-user"></span></span>
							<?php echo form_dropdown("fkidPoa", $get_dropdown_all_poas, $fkidPoa, 'class="form-control" required');?>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('mission');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-user"></span></span>
							<?php echo form_dropdown("fkidMission", $get_dropdown_all_missions, $fkidMission, 'class="form-control" required');?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12" style="text-align:center !important;">
					  <button type="submit" class="btn btn-primary white"><i class="<?php echo $panel_icon;?> mr5"></i><?php echo $submit_button; ?></button>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>