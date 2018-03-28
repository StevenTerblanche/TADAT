<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
	# If in UPDATE mode it gets the data from the db, creates and populates the field variable names and data via $get_record_by_id_rev_auth 
	# if validation failed it re-populates from the posted information via $this->input->post(), 
	# otherwise it gets the field names as variables from $this->db->list_fields($this->tbl) and sets them to ''

	if($this->action === 'update'){
		foreach($get_record_by_id_rev_auth as $field => $value){$$field = $value;}
	}elseif($this->input->post()){
		foreach($this->input->post() as $field => $value){$$field = $value;}
	}else{
		foreach($get_fields as $field){$$field = '';}
		if(!isset($get_dropdown_all_country)) $get_dropdown_all_country = ''; 
		if(!isset($fkidCountry)) $fkidCountry = ''; 
		if(!isset($get_dropdown_all_states)) $get_dropdown_all_states = ''; 
		if(!isset($fkidState)) $fkidState = ''; 
	}
			echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal')); ?>
				<div class="form-group">
					<label class="col-xs-4 control-label"><?php echo lang('revenue_authority');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-adn"></span></span>
							<?php echo form_input(array('name'=>'authority', 'value'=>$authority, 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('enter').lang('_a_').lang('descriptive_').lang('revenue_authority').lang('_name')));?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label"><?php echo lang('region');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
							<?php echo form_dropdown("fkidRegion", $get_dropdown_all_region, set_value("fkidRegion",$fkidRegion), array('id'=>'region', 'class'=>'form-control')); ?>
						</div>
					</div>
				</div>	
				<div id="country_container" class="form-group" style="display:none">
					<label class="col-xs-4 control-label"><?php echo lang('country');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-flag lh"></span></span>
								<?php 
								echo form_dropdown("fkidCountry", $get_dropdown_all_country, $fkidCountry, 'class="form-control" id="country" required');?>
						</div>
					</div>
				</div>	
				<div id="state_container" class="form-group" style="display:none">
					<label class="col-xs-4 control-label"><?php echo lang('federal').lang('_state');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-flag lh"></span></span>
								<?php 
								echo form_dropdown("fkidState", $get_dropdown_all_states, $fkidState, 'class="form-control" id="state" required');?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label"><?php echo lang('physical').lang('_address');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-home lh"></span></span>
							<?php echo form_input(array('name'=>'address', 'value'=>$address, 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('physical').lang('_address'))); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label"><?php echo lang('city');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-institution"></span></span>
							<?php echo form_input(array('name'=>'city', 'value'=>$city, 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('city'))); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label"><?php echo lang('postal').lang('_code');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-barcode"></span></span>
							<?php echo form_input(array('name'=>'code', 'value'=>$code, 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('postal').lang('_code'))); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label"><?php echo lang('office_').lang('telephone');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-earphone lh0"></span></span>
							<?php echo form_input(array('name'=>'telephone', 'value'=>$telephone, 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('eg_telephone'))); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label"><?php echo lang('office_').lang('fax');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-fax"></span></span>
							<?php echo form_input(array('name'=>'fax', 'value'=>$fax, 'class'=>'form-control', 'placeholder'=>lang('eg_fax'))); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label"><?php echo lang('website').lang('_address');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-link"></span></span>
							<?php echo form_input(array('name'=>'website', 'value'=>$website, 'class'=>'form-control', 'placeholder'=>lang('eg_website'))); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-4 control-label">Tax Administration Counterpart</label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-user"></span></span>
							<?php echo form_dropdown("fkidCounterpart", $get_dropdown_all_counterpart, $fkidCounterpart, 'class="form-control" required');?>
						</div>
					</div>
				</div>		
				<div class="form-group">
					<label class="col-xs-4 control-label">Tax Administration Contact Person</label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-user"></span></span>
							<?php echo form_dropdown("fkidUser", $get_dropdown_all_ram, $fkidUser, 'class="form-control" ');?>
						</div>
					</div>
				</div>		
				
				<div class="form-group">
					<div class="col-xs-12" style="text-align:center !important;">
					  <button type="submit" class="btn btn-primary white"><i class="<?php echo $this->panel_icon;?> mr5"></i><?php echo $submit_button; ?></button>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>