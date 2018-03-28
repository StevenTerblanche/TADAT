<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	# If in UPDATE mode it gets the data from the db, creates and populates the field variable names and data via $get_record_by_id 
	# if validation failed it re-populates from the posted information via $this->input->post(), 
	# otherwise it gets the field names as variables from $this->db->list_fields($this->tbl) and sets them to ''

	if(isset($action)){
		if(isset($get_fields_user) && isset($get_fields_profile) && $action === 'resume'){
			$get_fields = array_merge($get_fields_user,$get_fields_profile); 
			foreach($get_fields as $field){$$field = '';}
			foreach($get_record_by_id as $field => $value){$$field = $value;}
			$referenceNumber = $passed_referenceNumber;
		}

		$passed_referenceNumber = $referenceNumber;
		$arrData['referenceNumber'] = $referenceNumber; 
		$arrData['passed_referenceNumber'] = $referenceNumber; 		
		
	}else{
		redirect(base_url('register'));	
	}
?>
<div class="container" id="login-block">
	<div class="row">
		<div class="col-xs-2"></div>		
		<div class="col-xs-8">
		<div class="register-box clearfix animated flipInY">
			<div class="page-icon animated bounceInDown"><img src="/themes/core/img/user-icon.png" alt="<?php echo lang('lock_icon');?>"></div>
			<div class="login-logo"><img src="/themes/core/img/login-logo.png" alt="<?php echo $this->config->item('application_name').' '.lang('logo'); ?>"></div>

			<div class="login-form">
				<div class="col-xs-1"></div>
					<div class="col-xs-10">
						<div class="panel panel-default panel-blue-margin mb0">
							<div class="panel-heading dark-blue-bg" id="id-custom-panel-bg"><h4 class="panel-title mb0"><i class="<?php echo (!empty($this->panel_icon)) ? $this->panel_icon : '';?>"></i><?php echo (!empty($this->panel_title)) ? strtoupper($this->panel_title) : '';?></h4></div>		
							<div class="panel-body">
											<div class="col-xs-12">
									<div id="rootwizard">
										<div class="navbar">
										  <div class="navbar-inner">
											<div class="register-container">
										<ul>
											<li style="width:100px !important"><a href="#tab1" data-toggle="tab">Introduction</a></li>
											<li style="width:100px !important"><a href="#tab2" data-toggle="tab">Step 1</a></li>
											<li style="width:100px !important"><a href="#tab3" data-toggle="tab">Step 2</a></li>
											<li style="width:100px !important"><a href="#tab4" data-toggle="tab">Step 3</a></li>
											<li style="width:100px !important"><a href="#tab5" data-toggle="tab">Step 4</a></li>
											<li style="width:100px !important"><a href="#tab6" data-toggle="tab">Finish</a></li>
										</ul>
										 </div>
										  </div>
										</div>
										<div id="bar" class="progress">
										  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
										</div>
										<?php echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal', 'id'=>'register-form')); ?>
										<?php echo form_hidden('fkidUserRole', '12'); ?>
										<?php echo form_hidden('WorkshopFkId', $WorkshopFkId); ?>										
										<input name="progress" id="progress_indicator" value="" type="hidden" class="hidden-progress">
										<input name="referenceNumber" value="<? echo $referenceNumber ?>" type="hidden">
										
										<div class="tab-content" style="margin-top:30px !important">
											<div class="tab-pane" id="tab1">
												<div style="margin:auto !important; text-align:center !important">
													<h2>REGISTRATION REQUIREMENTS</h2>
												</div>
												<div class="form-group" style="margin-left:40px !important; margin-right:40px !important; color:#3B3B3B; text-align:left !important">
													<p>Registration will allow access to the following TADAT Portal functions:</p>
													<div class="input-group checkboxes-left">
													<ul>
														<li>TADAT Workshops in your region</li>
														<li>TADAT Connect - The TADAT social media platform for Tax Administrators</li>
														<li>TADAT Surveys - A TADAT platform to gauge your views on TADAT related activities</li>
													</ul>
													</div>
													<p>The following information is required for eligibility to the above mentioned TADAT Portal functionality:</p>
													<div class="input-group checkboxes-left">
													<ul>
														<li>Personal Information</li>
														<li>Professional Information</li>
														<li>Tax Administration Experience</li>
														<li>UN Language Ability</li>
													</ul>
													</div>
													<p>Click on the 'Next' button to complete your registration.</p>
												</div>
											</div>
											<div class="tab-pane" id="tab2">
												<div style="margin:auto !important; text-align:center !important">
													<h2>PERSONAL INFORMATION</h2>
													<p>Please enter the information below before moving to the next step.</p>
												 </div>
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('title');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_dropdown("fkidTitle", $get_dropdown_all_titles, set_value("fkidTitle", $fkidTitle), array('id'=>'role', 'class'=>'form-control')); ?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('firstname');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'name', 'value'=>$name, 'class'=>'form-control',  'placeholder'=>lang('firstname'))); ?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('middlename');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'middle_name', 'value'=>$middle_name, 'class'=>'form-control',  'placeholder'=>lang('middlename'))); ?>
														</div>
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('surname');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'surname', 'value'=>$surname, 'class'=>'form-control',  'placeholder'=>lang('surname')));?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('personal_email');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'email', 'value'=>$email, 'class'=>'form-control',  'placeholder'=>lang('personal_email'))); ?>
														</div>
													</div>
												</div>

												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('telephone');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'telephone', 'value'=>$telephone, 'class'=>'form-control',  'placeholder'=>lang('telephone')));?>
														</div>
													</div>
												</div>												
											<div class="form-group">
												<label class="col-xs-3 control-label"><?php echo lang('language');?></label>
												<div class="col-xs-6">
													<div class="input-group">
														<span class="input-group-addon"><span class="fa fa-comment"></span></span>
														<?php echo form_dropdown("fkidLanguage", $get_dropdown_all_languages, $fkidLanguage, array('id'=>'role', 'required'=>'', 'class'=>'form-control personal-language')); ?>
													</div>
												</div>
											</div>														
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('birth_').lang('date');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
															<?php echo form_input(array('name'=>'dob', 'value'=>$dob, 'class'=>'form-control', 'id'=>'dob',  'placeholder'=>lang('birth_').lang('date'))); ?>
														</div>
													</div>
												</div>				
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('gender');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_dropdown("fkid_gender", $get_dropdown_all_genders, $fkid_gender, array('id'=>'role',  'class'=>'form-control')); ?>
														</div>
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('country_citizen');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_dropdown("fkid_country_citizen", $get_dropdown_all_countries, $fkid_country_citizen, array('id'=>'role',  'class'=>'form-control')); ?>
														</div>
													</div>
												</div>				
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('country_residence');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_dropdown("fkid_country_residence", $get_dropdown_all_countries, $fkid_country_residence, array('id'=>'role',  'class'=>'form-control')); ?>
														</div>
													</div>
												</div>
											</div>


											<div class="tab-pane" id="tab3">
												<div style="margin:auto !important; text-align:center !important">
													<h2>PROFESSIONAL INFORMATION</h2>
													<p>Please enter information on your current position before moving to the next step.</p>
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
													<label class="col-xs-3 control-label"><?php echo lang('organization_type');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_dropdown("current_fkid_organization_type", $get_dropdown_all_organization_types, $current_fkid_organization_type, array('id'=>'organization_id',  'class'=>'form-control current-organization-type')); ?>
														</div>
													</div>
												</div>
												<div class="form-group show-other-organization-input">
													<label class="col-xs-3 control-label">Other <?php echo lang('organization_type');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'current_organization_type_other', 'value'=>$current_organization_type_other, 'class'=>'form-control',  'placeholder'=>'Enter another type of organization')); ?>
														</div>
													</div>
												</div>
												
												
												
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('current_department');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'current_department', 'value'=>$current_department, 'class'=>'form-control',  'placeholder'=>lang('current_department'))); ?>
														</div>
													</div>
												</div>
											<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('current_business_address_1');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'current_business_address_1', 'value'=>$current_business_address_1, 'class'=>'form-control',  'placeholder'=>lang('current_business_address_1'))); ?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('current_business_address_2');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'current_business_address_2', 'value'=>$current_business_address_2, 'class'=>'form-control',  'placeholder'=>lang('current_business_address_2'))); ?>
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
								
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('country');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_dropdown("current_fkid_country_business", $get_dropdown_all_countries, $current_fkid_country_business, array('id'=>'role',  'class'=>'form-control')); ?>
														</div>
													</div>
												</div>				
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('current_job_title');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'current_job_title', 'value'=>$current_job_title, 'class'=>'form-control',  'placeholder'=>lang('current_job_title'))); ?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-xs-3 control-label">Start Date</label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
															<?php echo form_input(array('name'=>'current_start_date', 'value'=>$current_start_date, 'class'=>'form-control', 'id'=>'current_start_date',  'placeholder'=>lang('start_date_current_position'))); ?>
														</div>
													</div>
												</div>				
												
												<div class="form-group">
													<label class="col-xs-3 control-label pt25"><?php echo lang('current_duties');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-file-text"></span></span>
															<?php echo form_textarea(array('name'=>'current_duties', 'value'=>$current_duties, 'class'=>'form-control', 'rows'=>'2', 'placeholder'=>lang('current_duties')));?>
								
														</div>
													</div>
												</div>

												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('current_business_email');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'current_business_email', 'value'=>$current_business_email, 'class'=>'form-control',  'placeholder'=>lang('current_business_email'))); ?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('current_business_telephone');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'current_business_telephone', 'value'=>$current_business_telephone, 'class'=>'form-control',  'placeholder'=>lang('current_business_telephone'))); ?>
														</div>
													</div>
												</div>
											</div>

											<div class="tab-pane" id="tab4">
												<div style="margin:auto !important; text-align:center !important">
													<h2>TAX ADMINISTRATION EXPERIENCE</h2>
												 </div>    	
												<div class="form-group">
													<p style="text-align:left !important">Please indicate the tax administration functions in which you have experience. (Select all that apply)</p>				 					
														<div class="input-group checkboxes-left">
														<?php
															 if($fkid_tax_administration_experience){
																$arr_tax_exp = explode(',', $fkid_tax_administration_experience);
																$arrExperience = _get_checkboxes_all_experience();
																foreach($arrExperience as $index => $exp){
																	$show_selected = '';																	
																	if (in_array($exp['id'], $arr_tax_exp)) {
																		$show_selected = ' checked';
																	}
																	echo '<label class="col-xs-12"><input type="checkbox" id="experience_selector" name="fkid_tax_administration_experience[]" class="administration-experience" value="'.$exp['id'].'"'.$show_selected.'/>'.$exp['experience'].'</label>';
																}																
															 }else{
																$arrExperience = _get_checkboxes_all_experience();
																foreach($arrExperience as $index => $exp){
																	echo '<label class="col-xs-12"><input type="checkbox" id="experience_selector" name="fkid_tax_administration_experience[]" class="administration-experience" value="'.$exp['id'].'"/>'.$exp['experience'].'</label>';
																}
															}																
														?>
														</div>
												<div class="hider-administration-experience-other">
													<div class="col-xs-1"></div>
													<div class="col-xs-10" style="margin-left:5px !important; margin-bottom:20px !important">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-file-text"></span></span>
															<?php echo form_input(array('name'=>'tax_administration_experience_other', 'value'=>$tax_administration_experience_other, 'class'=>'form-control', 'rows'=>'2', 'placeholder'=>'Enter other tax administration functions in which you have experience.'));?>
														</div>
													</div>
													<div class="col-xs-1"></div>
												</div>
														
													<p style="text-align:left !important; margin-top:15px !important">Have you worked on a similar institutional diagnostic program previously such as PEFA or the WCO diagnostic tool for Customs Administration?</p>										
														<div class="input-group checkboxes-left">
															<? 
																if($diagnostic_program === '1'){
																	$show_ticked = ' checked="checked"';
																}else{
																	$show_ticked = '';
																}
															
															
															?>
															<label class="col-xs-12"><input class="diagnostic-program" type="radio" name="diagnostic_program" <? echo $show_ticked;?> value="1"/>Yes</label>
															<label class="col-xs-12"><input class="diagnostic-program" type="radio" name="diagnostic_program" value="0"/>No</label>
													</div>
												</div>
												<div class="form-group hider-diagnostic-program-details">
													<div class="col-xs-1"></div>
													<div class="col-xs-10">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-file-text"></span></span>
															<?php echo form_textarea(array('name'=>'diagnostic_program_details', 'value'=>$diagnostic_program_details, 'class'=>'form-control', 'rows'=>'2', 'placeholder'=>'Enter a brief description of the institutional diagnostic programs you previously worked on.'));?>
														</div>
													</div>
													<div class="col-xs-1"></div>
												</div>
											</div>
								
											<div class="tab-pane" id="tab5">
												<div style="margin:auto !important; text-align:center !important">
													<h2>LANGUAGE ABILITY AND SKILL</h2>
												 </div>    	
												<div class="form-group">
													<div class="col-xs-1"></div>					
													<div class="col-xs-11">
													<p>Please indicate the Official UN languages in which you are proficient on a professional level and able to work. (select all that apply)</p>				 					
														<div class="input-group checkboxes-left">
															<?php
															$arrLanguages = _get_checkboxes_all_languages();
															 if($fkid_language){
																$arr_language = explode(',', $fkid_language);
																foreach($arrLanguages as $index => $language){
																	$show_selected = '';																	
																	if (in_array($language['id'], $arr_language)) {
																		$show_selected = ' checked';
																	}
																	echo '<label class="col-xs-12"><input type="checkbox" name="fkid_language[]" value="'.$language['id'].'"'.$show_selected.'/>'.$language['language'].'</label>';
																}
															 }else{
																foreach($arrLanguages as $index => $language){
																	echo '<label class="col-xs-12"><input type="checkbox" name="fkid_language[]" value="'.$language['id'].'"/>'.$language['language'].'</label>';
																}
															}										
														?>							
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-xs-1"></div>									
													<div class="col-xs-11">
														<p>Please list the other languages in which you are proficient on a professional level (reading, speaking and writing)</p>					
														<div class="input-group smaller-text-field">
															<span class="input-group-addon"><span class="fa fa-file-text"></span></span>
															<?php echo form_textarea(array('name'=>'language_other', 'value'=>$language_other, 'class'=>'form-control', 'rows'=>'2', 'placeholder'=>lang('language_other ')));?>
														</div>
													</div>
												</div>				
											</div>
											<div class="tab-pane" id="tab6">
												<div style="margin:auto !important; text-align:center !important">
													<h2>CONFIRMATION</h2>
												 </div>  
												<div style="margin:auto !important; text-align:left !important; margin-left:80px !important">
													<p>Thank you for completing the registration form.</p>
													<p>Click on 'Register Now' to submit your information to the TADAT Portal.</p>
													<p>You will shortly receive an e-mail with your login credentials to access the TADAT Portal.</p>
												</div>		
												<div class="form-group">
													<div class="col-xs-12" style="text-align:center !important;">
													  <button type="submit" id="submit_application_button" class="btn btn-primary white"><i class="<?php echo $this->panel_icon;?> mr5"></i>REGISTER NOW</button>
													</div>
												</div>
											</div>			
								
											<ul class="pager wizard">
												<li class="previous first" style="display:none;"><a href="#">First</a></li>
												<li class="previous"><a href="#">Previous</a></li>
												<li class="next last" style="display:none;"><a href="#">Last</a></li>
												<li class="next"><a href="#">Next</a></li>
											</ul>
										</div>
													  										
											<?php echo form_close(); ?>		
									</div>
								</div>
							</div>			
				<div class="col-xs-1"></div>
			</div>
		</div>
	</div>
</div>
		</div>
		<div class="col-xs-2"></div>		
</div>
</div>
<? // _show_array($get_record_by_id);	?>