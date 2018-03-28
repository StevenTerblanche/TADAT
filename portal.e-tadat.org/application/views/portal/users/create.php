<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
	# If in UPDATE mode it gets the data from the db, creates and populates the field variable names and data via $get_record_by_id_user 
	# if validation failed it re-populates from the posted information via $this->input->post(), 
	# otherwise it gets the field names as variables from $this->db->list_fields($this->tbl) and sets them to ''

	if($this->action === 'update'){
		foreach($get_record_by_id_user as $field => $value){$$field = $value;}
	}elseif($this->input->post()){
		foreach($this->input->post() as $field => $value){$$field = $value;}
	}else{
		foreach($get_fields as $field){$$field = '';}
		if(!isset($get_dropdown_all_country)) $get_dropdown_all_country = ''; 
		if(!isset($fkidCountry)) $fkidCountry = ''; 
		if(!isset($get_dropdown_all_states)) $get_dropdown_all_states = ''; 
		if(!isset($fkidState)) $fkidState = ''; 
	}

?>

<div class="row" style="margin:0px !important; margin-top:15px !important">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl5 pr5">
		<div class="panel panel-default panel-blue-margin mb0">
			<div class="panel-heading dark-blue-bg" id="id-custom-panel-bg"><h4 class="panel-title mb0"><i class="<?php echo (!empty($this->panel_icon)) ? $this->panel_icon : '';?>"></i><?php echo (!empty($this->panel_title)) ? strtoupper($this->panel_title) : '';?></h4></div>
			<div class="panel-body">

<?php

		 echo form_open($uri, array('role'=>'form','id'=>'passwordForm','class'=>'form-horizontal')); 
			# Only show password and password confirm fields if user logged in and is own account
			if($mode === 'p'){?>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('current_password');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-lock"></span></span>
							<?php echo form_password(array('name'=>'current_password', 'value'=>'', 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('current_password')));?>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('New_').lang('password');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-lock"></span></span>
							<?php echo form_password(array('name'=>'password', 'value'=>'', 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('password')));?>
						</div>
						<div class="progress password-progress">
                			<div id="strengthBar" class="progress-bar" role="progressbar" style="width: 0;"></div>
            			</div>
            			<div class="input-group"><p><strong>Rule 1 – Password Length:</strong> Passwords must be between 8 and 20 characters in length. The more character in the passwords is better, as the time taken to crack the password by an attacker will be longer.<br>
            				<strong>Rule 2 – Password Complexity:</strong> Should contain at least one character from each of the following group. Characters in your passwords should consist of the following:</p>
							<ol>
								<li>Lower case alphabets</li>
								<li>Upper case alphabets</li>
								<li>Numbers</li>
								<li>Special Characters</li>
							</ol>
            			</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('confirm_password');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-lock"></span></span>
							<?php echo form_password(array('name'=>'passconf', 'value'=>'', 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('confirm_password')));?>
						</div>
					</div>
				</div>
			<?php }else{?>
			<?php if($mode !== 's'){?>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('user').lang('_role');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
							<?php echo form_dropdown("fkidUserRole", $get_dropdown_all_roles, set_value("fkidUserRole",$fkidUserRole), array('id'=>'role', 'required'=>'', 'class'=>'form-control')); ?>
						</div>
					</div>
				</div>
				<?php }?>					

				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('title');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-user"></span></span>
							<?php echo form_dropdown("fkidTitle", $get_dropdown_all_titles, set_value("fkidTitle",$fkidTitle), array('id'=>'role', 'required'=>'', 'class'=>'form-control')); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('firstname');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-user"></span></span>
							<?php echo form_input(array('name'=>'name', 'value'=>$name, 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('firstname'))); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('surname');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-user"></span></span>
							<?php echo form_input(array('name'=>'surname', 'value'=>$surname, 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('surname')));?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('language');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-comment"></span></span>
							<?php echo form_dropdown("fkidLanguage", $get_dropdown_all_languages, set_value("fkidLanguage",$fkidLanguage), array('id'=>'role', 'required'=>'', 'class'=>'form-control')); ?>
						</div>
					</div>
				</div>					
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('email').lang('_address');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-envelope"></span></span>
							<?php echo form_input(array('name'=>'email', 'value'=>$email, 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('email').lang('_address'))); ?>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('office_').lang('telephone');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-earphone lh0"></span></span>
							<?php echo form_input(array('name'=>'current_business_telephone', 'value'=>$current_business_telephone, 'class'=>'form-control', 'placeholder'=>lang('eg_telephone'))); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('mobile');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-phone lh0"></span></span>
							<?php echo form_input(array('name'=>'telephone', 'value'=>$telephone, 'class'=>'form-control', 'placeholder'=>lang('eg_mobile'))); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('current_organization');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-user"></span></span>
							<?php echo form_input(array('name'=>'current_organization', 'value'=>$current_organization, 'class'=>'form-control',  'placeholder'=>lang('current_organization'))); ?>
						</div>
					</div>
				</div>
							
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('region');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
							<?php echo form_dropdown("fkid_region_residence", $get_dropdown_all_region, set_value("fkid_region_residence",$fkid_region_residence), array('id'=>'region', 'required'=>'', 'class'=>'form-control')); ?>
						</div>
					</div>
				</div>	
				<div id="country_container" style="display:none">
					<div class="form-group">
						<label class="col-xs-3 control-label"><?php echo lang('country');?></label>
						<div class="col-xs-6">
							<div class="input-group">
								<span class="input-group-addon"><span class="glyphicon glyphicon-flag lh"></span></span>
									<?php 
									echo form_dropdown("fkid_country_residence", $get_dropdown_all_country, $fkid_country_residence, 'class="form-control" id="country" required');?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-xs-3 control-label"><?php echo lang('current_business_address_city');?></label>
						<div class="col-xs-6">
							<div class="input-group">
								<span class="input-group-addon"><span class="fa fa-user"></span></span>
								<?php echo form_input(array('name'=>'current_business_address_city', 'value'=>$current_business_address_city, 'class'=>'form-control',  'placeholder'=>lang('current_business_address_city'))); ?>
							</div>
						</div>
					</div>
					
				</div>

				
				<?php }?>				
				<div class="form-group">
					<div class="col-xs-12" style="text-align:center !important;">
					  <button type="submit" class="btn btn-primary white" id="show_submit"><i class="<?php echo $this->panel_icon;?> mr5"></i><?php echo $submit_button; ?></button>
					</div>
				</div>
				<?php 
				echo form_close(); ?>
				

			</div>
		</div>
	</div>
</div>
				