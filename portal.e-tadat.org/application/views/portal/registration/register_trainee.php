<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	# If in UPDATE mode it gets the data from the db, creates and populates the field variable names and data via $get_record_by_id 
	# if validation failed it re-populates from the posted information via $this->input->post(), 
	# otherwise it gets the field names as variables from $this->db->list_fields($this->tbl) and sets them to ''

	if(isset($action)){
		if($action === 'resume'){
			foreach($get_record_by_id as $field => $value){$$field = $value;}
				// echo $dob.'<br>';
				// $dob = date('d F, Y', strtotime($dob));
				// echo strtotime($dob).'<br>';
				//$dateEnd = date('l, F d, Y', strtotime($dateEnd));				
		}
		if(isset($get_fields_user) && isset($get_fields_profile) && $action === 'new'){
			$get_fields = array_merge($get_fields_user,$get_fields_profile); 
			foreach($get_fields as $field){$$field = '';}
			$fkidUserRole = $fkidUserRolePassed;
			$referenceNumber = $passed_referenceNumber;
		}

		$passed_referenceNumber = $referenceNumber;
		$arrData['referenceNumber'] = $referenceNumber; 
		$arrData['passed_referenceNumber'] = $referenceNumber; 		
		echo $this->load->view('portal/registration/upload_dialog', $arrData, true);		
		
	}else{
		redirect(base_url('register'));	
	}

//echo 'VIEW: retreivedFkidUserId:'.$retreivedFkidUserId.'<br>';
	
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
											<li><a href="#tab1" data-toggle="tab">Introduction</a></li>
											<li><a href="#tab2" data-toggle="tab">Step 1</a></li>
											<li><a href="#tab3" data-toggle="tab">Step 2</a></li>
											<li><a href="#tab4" data-toggle="tab">Step 3</a></li>
											<li><a href="#tab5" data-toggle="tab">Step 4</a></li>
											<li><a href="#tab6" data-toggle="tab">Step 5</a></li>
											<li><a href="#tab7" data-toggle="tab">Step 6</a></li>
											<li><a href="#tab8" data-toggle="tab">Step 7</a></li>
											<li><a href="#tab9" data-toggle="tab">Step 8</a></li>											

										</ul>
										 </div>
										  </div>
										</div>
										<div id="bar" class="progress">
										  <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
										</div>
										<?php echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal', 'id'=>'register-form')); ?>
										<?php echo form_hidden('fkidUserRole', $fkidUserRole); ?>
										<input name="progress" id="progress_indicator" value="" type="hidden" class="hidden-progress">
										<input name="referenceNumber" value="<? echo $referenceNumber ?>" type="hidden">										
										<input name="retreivedFkidUserId" value="<? echo $retreivedFkidUserId ?>" type="hidden">
										
										<div class="tab-content" style="margin-top:30px !important">
											<div class="tab-pane" id="tab1">
												<div style="margin:auto !important; text-align:center !important">
													<h2>ELIGIBILITY AND QUALIFICATION REQUIREMENTS</h2>
												</div>
												<div class="form-group" style="margin-left:40px !important; margin-right:40px !important; color:#3B3B3B; text-align:left !important">
													<p> The TADAT secretariat in cooperation with IMF’s Institute for Capacity Development and edX, a non-profit online learning initiative by MIT and Harvard, created an online training course that will help experienced tax administrators become either:</p>
													<div class="input-group checkboxes-left">
													<ul>
														<li>“Trained TADAT Assessors”, who will be certified to conduct TADAT assessments in any country;</li>
														<li>“TADAT Trained”, who will be able to participate in their country’s own benchmarking exercise, or be informed counterparts when their tax administration is undergoing TADAT assessment, or participate in regional peer-to-peer review.</li>
													</ul>
													</div>
													<p>The online course is the same for both levels, but because of the difference in the nature of expertise needed, the eligibility requirements for the two levels are slightly different. For being certified as “Trained TADAT assessor”, the person passing the exam must have experience providing technical assistance in a developing country. For being “TADAT trained” this requirement is absent, although the requirement for 5 years’ experience working on tax issues exists for both.						</p>
													<p>Eligibility and qualification requirements for Trained TADAT Assessors:</p>
													<div class="input-group checkboxes-left">
													<ul>
														<li>At least 5 years experience working on tax/revenue issues in any of the following:						
															<ul>
																<li>A national or sub-national revenue/tax authority;</li>
																<li>The ministry of finance or other government ministry or department dealing with revenue/tax issues;</li>
																<li>A university or research institution with teaching or research work on revenue/tax issues;</li>
																<li>An international or regional or bilateral development institution, working on projects related to revenue/tax/public finance reform issues;</li>
																<li>A consulting firm, tax accounting firm, or tax law firm, working on tax reform advisory service.</li>
															</ul>
														</li>
														<li>Experience in providing technical assistance in a developing country</li>
														<li>University degree or equivalent professional education.</li>
													</ul>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab2">
												<div style="margin:auto !important; text-align:center !important">
													<h2>CANDIDATE INFORMATION</h2>
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
												<div style="margin:auto !important; text-align:left !important; color:#3B3B3B !important">

													<h2 style="text-align:center !important">REQUIRED DOCUMENTATION</h2>
													
													<p>Kindly click on the 'Upload Documents' button below to upload the following required documents:</p>

													<p> - Most recent Resumé or Curriculum Vitae<br> - Recent profile photograph</p>
													

												 </div>  




												<div style="margin:auto !important; text-align:left !important; margin-left:0px !important; color:#000000">
														<div id="uploaded-documents">
														<?
														if($fkidUserId){
															$arrDocuments = _get_documents_by_reference_or_id('', $fkidUserId);
															//_show_array($arrDocuments);
															$table_start = '<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">';
															$thead = '<thead>
																		<tr>
																			<th>DOCUMENT NAME</th>
																			<th>CATEGORY</th>
																			<th>SIZE</th>
																			<th>TYPE</th>
																			<th>ACTION</th>
														
																		</tr>
																	</thead><tbody>';
															$table_end = '</tbody></table>';
															$table_row = '';		
															$arrImageTypes=array(	array('jpg', 'jpeg','type' => 'jpg'),
																					array('png','type' => 'png'),
																					array('gif', 'type' => 'gif'),
																					array('bmp','type' => 'bmp'),
																					array('powerpoint', 'presentation','type' => 'presentation'),
																					array('wordprocessingml','msword','type' => 'document'),
																					array('spreadsheetml','excel','type' => 'spreadsheet'),
																					array('plain','type' => 'text'),
																					array('csv','type' => 'csv'),
																					array('pdf','type' => 'pdf'),
																					array('zip','type' => 'zip'),
																					array('rar','type' => 'rar')
																				);
														
															if($arrDocuments){
																foreach($arrDocuments as $row => $value){
																	$strIconPath = base_url().'themes/core/img/icons/unknown.png';
																	$strFileType ='';
																	$target = '';
																	$needle = $value['documentType'];
																	$stringtocheck = $value['documentType'];
																	foreach($arrImageTypes as $item =>$items){	
																		foreach($items as $key =>$keys){
																			if(is_int($key) && strpos($needle, $keys) !== FALSE){
																				$strFileType = $items['type'];
																				if ($strFileType === 'text' || $strFileType === 'pdf'){
																					$target = 'target="_blank"';
																				}
																				if ($strFileType === 'jpg' || $strFileType === 'png' || $strFileType === 'gif'|| $strFileType === 'bmp'){
																					$strIconPath = base_url().'themes/core/img/icons/'.$strFileType.'.png';
																					$dataGallery = 'data-gallery=""';
																				}else{
																					$strIconPath = base_url().'themes/core/img/icons/'.$strFileType.'.png';
																					$dataGallery = '';				
																				}
																			}
																		}
																	}
																	
																	$table_row .= '<tr>';
																	$table_row .=  '<td>'.$value['documentTitle'].'</td>';
																	$table_row .=  '<td>'.strtoupper($value['documentDescription']).'</td>';
																	$table_row .=  '<td>'.formatBytes($value['documentSize']).'</td>';
																	$table_row .=  '<td><img src="'. $strIconPath . '"></td>';															
																	$table_row .=  '<td class="va center"><a '.$dataGallery.' href="'. base_url().$value['documentPath'] . '" target="_blank">Click to View</a></td>';			
																	$table_row .= '</tr>';			
																}
																echo $table_start.$thead.$table_row.$table_end;
															}
														}
														?>
													</div>												
												</div>		
												<div class="form-group">
													<div class="col-xs-12" style="text-align:center !important;">
														<button style="margin-left:30px !important" type="button" id="upload_button" class="btn btn-success white-text mt20" data-toggle="modal" data-target="#modal-style2"><i class="fa fa-cloud-upload mr5"></i>Upload Documents</button>														
													</div>
												</div>
											</div>



											<div class="tab-pane" id="tab4">
												<div style="margin:auto !important; text-align:center !important">
													<h2>PROFESSIONAL INFORMATION</h2>
													<p>Please enter information on your current position before moving to the next step.</p>
												 </div>
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('occupation');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_dropdown("fkid_occupation", $get_dropdown_all_occupation, $fkid_occupation, array('id'=>'fkid_occupation_id',  'class'=>'form-control current-organization-type')); ?>
														</div>
													</div>
												</div>
												<div class="form-group show-other-occupation-input">
													<label class="col-xs-3 control-label">Other <?php echo lang('occupation');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'occupation_other', 'value'=>$occupation_other, 'class'=>'form-control',  'placeholder'=>'Enter another type of occupation')); ?>
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

											<div class="tab-pane" id="tab5">
												<div style="margin:auto !important; text-align:center !important">
													<h2>TAX ADMINISTRATION INTERESTS</h2>
												 </div>    	


												<div class="form-group">
													<p style="text-align:left !important">Please indicate any tax administration interests. (Select all that apply)</p>				 					
														<div class="input-group checkboxes-left">
														<?php
															 if($fkid_interests){
																$arr_interests = explode(',', $fkid_interests);
																$arrInterest = _get_checkboxes_all_interests();
																foreach($arrInterest as $index => $interest){
																	$show_selected = '';																	
																	if (in_array($interest['id'], $arr_interests)) {
																		$show_selected = ' checked';
																	}
																	echo '<label class="col-xs-12"><input type="checkbox" id="interest_selector" name="fkid_interests[]" class="administration-interest" value="'.$interest['id'].'"'.$show_selected.'/>'.$interest['interests'].'</label>';
																}																
															 }else{
																$arrInterest = _get_checkboxes_all_interests();
																foreach($arrInterest as $index => $interest){
																	echo '<label class="col-xs-12"><input type="checkbox" id="interest_selector" name="fkid_interests[]" class="administration-interest" value="'.$interest['id'].'"/>'.$interest['interests'].'</label>';
																}
															}																
														?>
														</div>
													<div class="hider-interest-other">
														<div class="col-xs-1"></div>
														<div class="col-xs-10" style="margin-left:5px !important; margin-bottom:20px !important">
															<div class="input-group">
																<span class="input-group-addon"><span class="fa fa-file-text"></span></span>
																<?php echo form_input(array('name'=>'interests_other', 'value'=>$interests_other, 'class'=>'form-control', 'rows'=>'2', 'placeholder'=>'Enter other tax administration interests.'));?>
															</div>
														</div>
														<div class="col-xs-1"></div>
													</div>
												</div>


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
											<div class="tab-pane" id="tab6">
												<div style="margin:auto !important; text-align:center !important">
													<h2>ACADEMIC QUALIFICATIONS</h2>
													<p>Please enter information on your acedemic qualifications.</p>
												 </div>  			
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('degree');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_dropdown("fkid_academic_degree_1", $get_dropdown_all_degrees, $fkid_academic_degree_1, array('id'=>'role',  'class'=>'form-control')); ?>
														</div>
													</div>
												</div>				
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('degree_name');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'degree_name_1', 'value'=>$degree_name_1, 'class'=>'form-control',  'placeholder'=>lang('degree_name'))); ?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('university');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'university_1', 'value'=>$university_1, 'class'=>'form-control',  'placeholder'=>lang('university'))); ?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('country');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_dropdown("fkid_academic_country_1", $get_dropdown_all_countries, $fkid_academic_country_1, array('id'=>'role',  'class'=>'form-control')); ?>
														</div>
													</div>
												</div>				
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('from_year');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
															<?php echo form_input(array('name'=>'academic_start_date_1', 'value'=>$academic_start_date_1, 'class'=>'form-control', 'id'=>'academic_start_date_1',  'placeholder'=>lang('from_year'))); ?>
														</div>
													</div>
												</div>				
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('to_year');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
															<?php echo form_input(array('name'=>'academic_end_date_1', 'value'=>$academic_end_date_1, 'class'=>'form-control', 'id'=>'academic_end_date_1',  'placeholder'=>lang('to_year'))); ?>
														</div>
													</div>
												</div>				
											</div>
								
											<div class="tab-pane" id="tab7">
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
											<div class="tab-pane" id="tab8">
												<div style="margin:auto !important; text-align:center !important">
													<h2>REFERENCES</h2>
													<p>Please provide contact information for two referees, one of whom must be a senior revenue official, who are both familiar with your work and whom we may contact if needed.</p>
												 </div>  
												<p style="font-weight:bold !important; text-align:center !important">REFERENCE 1</p>
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('reference_name_surname');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'reference_name_surname_1', 'value'=>$reference_name_surname_1, 'class'=>'form-control',  'placeholder'=>lang('reference_name_surname'))); ?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('position');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'reference_position_1', 'value'=>$reference_position_1, 'class'=>'form-control',  'placeholder'=>lang('position'))); ?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('phone');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'reference_phone_1', 'value'=>$reference_phone_1, 'class'=>'form-control',  'placeholder'=>lang('phone'))); ?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('email');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'reference_email_1', 'value'=>$reference_email_1, 'class'=>'form-control',  'placeholder'=>lang('email'))); ?>
														</div>
													</div>
												</div>
												<p style="font-weight:bold !important; text-align:center !important">REFERENCE 2</p>
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('reference_name_surname');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'reference_name_surname_2', 'value'=>$reference_name_surname_2, 'class'=>'form-control',  'placeholder'=>lang('reference_name_surname'))); ?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('position');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'reference_position_2', 'value'=>$reference_position_2, 'class'=>'form-control',  'placeholder'=>lang('position'))); ?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('phone');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'reference_phone_2', 'value'=>$reference_phone_2, 'class'=>'form-control',  'placeholder'=>lang('phone'))); ?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="col-xs-3 control-label"><?php echo lang('email');?></label>
													<div class="col-xs-6">
														<div class="input-group">
															<span class="input-group-addon"><span class="fa fa-user"></span></span>
															<?php echo form_input(array('name'=>'reference_email_2', 'value'=>$reference_email_2, 'class'=>'form-control',  'placeholder'=>lang('email'))); ?>
														</div>
													</div>
												</div>
												
											</div>
											<div class="tab-pane" id="tab9">
												<div style="margin:auto !important; text-align:center !important">
													<h2>CONFIRMATION</h2>
												 </div>  
												<div style="margin:auto !important; text-align:left !important; margin-left:80px !important">
												<p>Thank you for applying to enter the TADAT Training Program.</p>
												<p>Registration is not an acknowledgement of acceptance into the program. You will be advised shortly about the status of your application and what further information may be required. </p>
												<p>If you fulfill the requirement criteria, you’ll be provided access to the TADAT Portal, online courses and exams.</p>
												<p>Click on 'Register Now' to submit your application to the TADAT Secretariat.</p>												
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
												<li class=""><button id="save_button_display" type="submit" class="btn btn-info white save-progress"><i class="fa fa-save mr5"></i>SAVE MY PROGRESS</button></li>
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