<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

?>
<div class="row" style="margin:0px !important; margin-top:15px !important">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl5 pr5">
		<div class="panel panel-default panel-blue-margin mb0">
			<div class="panel-heading dark-blue-bg" id="id-custom-panel-bg"><h4 class="panel-title mb0"><i class="<?php echo (!empty($this->panel_icon)) ? $this->panel_icon : '';?>"></i><?php echo (!empty($this->panel_title)) ? strtoupper($this->panel_title) : '';?></h4></div>
			<div class="panel-body">
		<?php 

		if ($profile){
			$arrTaxAdminExperience = get_tax_administration_experience($profile->fkid_tax_administration_experience);
			$arrInterests = get_tax_administration_interests($profile->fkid_interests);	
			$arrUserLanguages = get_selected_languages($profile->fkid_language);
			$valFullName = $profile->title.' '.$profile->name.' '.$profile->middle_name.' '.$profile->surname;
			//_show_array($profile);					
			
			?>
			
			<div class="row profile">
				<div class="col-md-12">
					<div class="profile-name">
						<h3 class="mb0 ml10 mt10">EDIT CANDIDATE INFORMATION</h3>
					</div>
				</div>
			</div>
			<? echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal')); ?>
			<input name="FkidUserId" value="<? echo $profile->UserID; ?>" type="hidden">
			<input name="edit_mode" value="<? echo $edit_mode; ?>" type="hidden">
			
			
			<div class="col-md-12 pl0 pr0 ml10 mr0 bt">
				<div class="col-md-6 pl0 pr0 text-muted mt10">
					<div class="col-md-3 pl0 pr0 text-muted">Title</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_dropdown("fkidTitle", $get_dropdown_all_titles, set_value("fkidTitle",$profile->fkidTitle), array('id'=>'role', 'required'=>'', 'class'=>'form-control')); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">First Name</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'name', 'value'=>$profile->name, 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('firstname'))); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">Middle Name</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'middle_name', 'value'=>$profile->middle_name, 'class'=>'form-control', 'placeholder'=>lang('middle_name'))); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">Surname</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'surname', 'value'=>$profile->surname, 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('surname'))); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">Personal E-mail</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'email', 'value'=>$profile->email, 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('email'))); ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted">Telephone</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'telephone', 'value'=>$profile->telephone, 'class'=>'form-control', 'placeholder'=>lang('telephone'))); ?>&nbsp;</div>
				</div>
				<div class="col-md-6 pl0 pr0 text-muted mt10">
					<div class="col-md-3 pl0 pr0 text-muted">Language</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_dropdown("fkidLanguage", $get_dropdown_all_languages, set_value("fkidLanguage",$profile->fkidLanguage), array('id'=>'role', 'required'=>'', 'class'=>'form-control')); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">Birth Date</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'dob', 'value'=>$profile->dob, 'class'=>'form-control', 'id'=>'dob',  'placeholder'=>lang('birth_').lang('date'))); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">Gender</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_dropdown("fkid_gender", $get_dropdown_all_genders, set_value("fkid_gender",$profile->fkid_gender), array('id'=>'role', 'required'=>'', 'class'=>'form-control')); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">Country of Citizenship</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_dropdown("fkid_country_citizen", $get_dropdown_all_countries, set_value("fkid_country_citizen",$profile->fkid_country_citizen), array('id'=>'role', 'required'=>'', 'class'=>'form-control')); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">Country of Residence</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_dropdown("fkid_country_residence", $get_dropdown_all_countries, set_value("fkid_country_residence",$profile->fkid_country_residence), array('id'=>'role', 'required'=>'', 'class'=>'form-control')); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted"></div><div class="col-md-8 pl0 pr0 text-muted"></div>
				</div>
			</div>
			<div class="row profile">
				<div class="col-md-12">
					<div class="profile-name">
						<h3 class="mb0 ml10 mt20">PROFESSIONAL INFORMATION</h3>
					</div>
				</div>
			</div>
			<div class="col-md-12 pl0 pr0 ml10 mr0 bt">
				<div class="col-md-6 pl0 pr0 text-muted mt10">
					<div class="col-md-3 pl0 pr0 text-muted">Agency or Organization</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'current_organization', 'value'=>$profile->current_organization, 'class'=>'form-control', 'placeholder'=>lang('current_organization'))); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">Organization Type</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_dropdown("current_fkid_organization_type", $get_dropdown_all_organization_types, set_value("fkid_gender",$profile->current_fkid_organization_type), array('id'=>'role', 'class'=>'form-control')); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">Department</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'current_department', 'value'=>$profile->current_department, 'class'=>'form-control', 'placeholder'=>lang('current_department'))); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">Business Address</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'current_business_address_1', 'value'=>$profile->current_business_address_1, 'class'=>'form-control', 'placeholder'=>'Business Address')); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">Business Address</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'current_business_address_2', 'value'=>$profile->current_business_address_2, 'class'=>'form-control', 'placeholder'=>'Business Address')); ?></div>					
					<div class="col-md-3 pl0 pr0 text-muted">Business City</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'current_business_address_city', 'value'=>$profile->current_business_address_city, 'class'=>'form-control', 'placeholder'=>'Business Address City')); ?></div>					
					<div class="col-md-3 pl0 pr0 text-muted">Business Country</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_dropdown("current_fkid_country_business", $get_dropdown_all_countries, set_value("current_fkid_country_business",$profile->current_fkid_country_business), array('id'=>'role', 'class'=>'form-control')); ?></div>

					
				</div>
				<div class="col-md-6 pl0 pr0 text-muted mt10">
					<div class="col-md-3 pl0 pr0 text-muted">Job title</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'current_job_title', 'value'=>$profile->current_job_title, 'class'=>'form-control', 'placeholder'=>'Job Title')); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">Occupation</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_dropdown("fkid_occupation", $get_dropdown_all_occupation, set_value("fkid_occupation",$profile->fkid_occupation), array('id'=>'role', 'class'=>'form-control')); ?></div>

					<div class="col-md-3 pl0 pr0 text-muted">Start Date</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'current_start_date', 'value'=>$profile->current_start_date, 'class'=>'form-control', 'id'=>'current_start_date')); ?></div>					
					<div class="col-md-3 pl0 pr0 text-muted">Business email</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'current_business_email', 'value'=>$profile->current_business_email, 'class'=>'form-control', 'placeholder'=>'Business Email')); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">Business phone</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'current_business_telephone', 'value'=>$profile->current_business_telephone, 'class'=>'form-control', 'placeholder'=>'Business Phone')); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">Current Duties</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_textarea(array('name'=>'current_duties', 'value'=>$profile->current_duties, 'class'=>'form-control', 'rows'=>'2', 'placeholder'=>lang('current_duties')));?></div>
				</div>
			</div>
			<div class="row profile">
				<div class="col-md-12">
					<div class="profile-name">
						<h3 class="mb0 ml10 mt20">DOCUMENTATION SUPPLIED</h3>
					</div>
				</div>
			</div>
			<div class="col-md-12 pl0 pr0 ml0 mr0 bt">
				<div class="col-md-12 pr0 text-muted mt10">
					<?
						$arrDocuments = _get_documents_by_reference_or_id('', $profile->UserID);
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
								$table_row .=  '<td class="va">'.$value['documentTitle'].'</td>';
								$table_row .=  '<td class="va">'.strtoupper($value['documentDescription']).'</td>';
								$table_row .=  '<td class="va">'.formatBytes($value['documentSize']).'</td>';
								$table_row .=  '<td><img src="'. $strIconPath . '"></td>';															
								$table_row .=  '<td class="va center"><a '.$dataGallery.' href="'. base_url().$value['documentPath'] . '" target="_blank">Click to View</a></td>';			
								$table_row .= '</tr>';			
							}
							echo $table_start.$thead.$table_row.$table_end;
						}
					?>
				</div>
			</div>
			<div class="row profile">
				<div class="col-md-12">
					<div class="profile-name">
						<h3 class="mb0 ml10 mt20">TAX ADMINISTRATION EXPERIENCE</h3>
					</div>
				</div>
			</div>
			
			<div class="col-md-12 pl0 pr0 ml0 mr0 bt">
				<div class="col-md-12 pl10 pr0 text-muted mt10">
					<p><strong>Tax Administration functions in which the candidate have experience:</strong></p>
					<?

					 if($profile->fkid_tax_administration_experience){
						$arr_tax_exp = explode(',', $profile->fkid_tax_administration_experience);
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

					$show_experience = 0;
					
					if($arrTaxAdminExperience){
						foreach($arrTaxAdminExperience as $type){
							if($type['experience'] === 'Other'){
								$show_experience = 1;
							}
						}
					}
						
						if($show_experience === 1){
							echo '<p><strong>Other Tax Administration functions in which the candidate has experience:</strong></p>';
							echo form_input(array('name'=>'tax_administration_experience_other', 'value'=>$profile->tax_administration_experience_other, 'class'=>'form-control', 'required'=>'', 'placeholder'=>'Other Tax Administration Experience')).'';
						}
						if($profile->diagnostic_program == 1){
							echo '<p style="margin-top:15px !important"><strong>The candidate has worked on similar institutional diagnostic programs such as PEFA or the WCO diagnostic tool for Customs Administration as listed below:</strong></p>';
							echo form_input(array('name'=>'diagnostic_program_details', 'value'=>$profile->diagnostic_program_details, 'class'=>'form-control', 'required'=>'', 'placeholder'=>'Other Experience')).'';
						}else{
							echo '<p><strong>The candidate has not worked on similar institutional diagnostic programs such as PEFA or the WCO diagnostic tool for Customs Administration.</strong></p>';					
						}
					?>
				</div>
			</div>

			<div class="row profile">
				<div class="col-md-12">
					<div class="profile-name">
						<h3 class="mb0 ml10 mt20">TAX ADMINISTRATION INTERESTS</h3>
					</div>
				</div>
			</div>
			
			<div class="col-md-12 pl0 pr0 ml0 mr0 bt">
				<div class="col-md-12 pl10 pr0 text-muted mt10">
					<p><strong>Tax Administration functions in which the candidate is interested:</strong></p>
					<?

					 if($profile->fkid_interests){
						$arr_tax_exp = explode(',', $profile->fkid_interests);
						$arrExperience = _get_checkboxes_all_interests();
						foreach($arrExperience as $index => $exp){
							$show_selected = '';																	
							if (in_array($exp['id'], $arr_tax_exp)) {
								$show_selected = ' checked';
							}
							echo '<label class="col-xs-12"><input type="checkbox" id="experience_selector" name="fkid_interests[]" class="administration-experience" value="'.$exp['id'].'"'.$show_selected.'/>'.$exp['interests'].'</label>';
						}																
					 }else{
						$arrExperience = _get_checkboxes_all_interests();
						foreach($arrExperience as $index => $exp){
							echo '<label class="col-xs-12"><input type="checkbox" id="experience_selector" name="fkid_interests[]" class="administration-experience" value="'.$exp['id'].'"/>'.$exp['interests'].'</label>';
						}
					}																

					$show_interest = 0;
					
					if($arrInterests){
						foreach($arrInterests as $type){
							if($type['interests'] === 'Other'){
								$show_interest = 1;
							}
						}
					}
						if($show_interest === 1){
							echo '<p><strong>Other Tax Administration functions in which the candidate has experience:</strong></p>';
							echo form_input(array('name'=>'interests_other', 'value'=>$profile->interests_other, 'class'=>'form-control', 'required'=>'', 'placeholder'=>'Other Tax Administration Interests')).'';
						}
					?>
				</div>
			</div>

			<div class="row profile">
				<div class="col-md-12">
					<div class="profile-name">
						<h3 class="mb0 ml10 mt20">ACADEMIC QUALIFICATIONS</h3>
					</div>
				</div>
			</div>
			<div class="col-md-12 pl0 pr0 ml0 mr0 bt">
				<div class="col-md-6 pl0 pr0 text-muted mt10">
					<div class="col-md-3 pl0 pr0 text-muted">Degree</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_dropdown("fkid_academic_degree_1", $get_dropdown_all_degrees, set_value("fkid_academic_degree_1",$profile->fkid_academic_degree_1), array('id'=>'role', 'class'=>'form-control')); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">Degree Name</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'degree_name_1', 'value'=>$profile->degree_name_1 , 'class'=>'form-control', 'placeholder'=>'Degree Name')); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">University</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'university_1', 'value'=>$profile->university_1 , 'class'=>'form-control', 'placeholder'=>'Business Email')); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">Country</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_dropdown("fkid_academic_country_1", $get_dropdown_all_countries, set_value("fkid_academic_country_1",$profile->fkid_academic_country_1), array('id'=>'role', 'class'=>'form-control')); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">Date Started</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'academic_start_date_1', 'value'=>$profile->academic_start_date_1 , 'class'=>'form-control', 'id'=>'academic_start_date_1')); ?></div>					
					<div class="col-md-3 pl0 pr0 text-muted">Date Ended</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'academic_end_date_1', 'value'=>$profile->academic_end_date_1 , 'class'=>'form-control', 'id'=>'academic_end_date_1')); ?></div>										
				</div>
			</div>

			<div class="row profile">
				<div class="col-md-12">
					<div class="profile-name">
						<h3 class="mb0 ml10 mt20">LANGUAGE ABILITY AND SKILL</h3>
					</div>
				</div>
			</div>
			<div class="col-md-12 pl0 pr0 ml0 mr0 bt">
				<div class="col-md-12 pl10 pr0 text-muted mt10">
					<p><strong>The candidate is proficient on a professional level and able to work in the following official UN languages:</strong></p>
					<?
						$arrLanguages = _get_checkboxes_all_languages();
						 if($profile->fkid_language){
							$arr_language = explode(',', $profile->fkid_language);
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

						if($profile->language_other !== ''){
							echo '<p><strong>The candidate is proficient on a professional level and able to work in the following other languages:</strong></p>';
							echo form_input(array('name'=>'language_other', 'value'=>$profile->language_other, 'class'=>'form-control', 'placeholder'=>'Other Language')).'';
						}
					?>
				</div>
			</div>
			<div class="row profile">
				<div class="col-md-12">
					<div class="profile-name">
						<h3 class="mb0 ml10 mt20">REFERENCES</h3>
					</div>
				</div>
			</div>
			<div class="col-md-12 pl0 pr0 ml0 mr0 bt">
				<div class="col-md-6 pl0 pr0 text-muted mt10 ml10">
					<p style="margin-bottom:2px !important"><strong>REFERENCE 1</strong></p>
					<div class="col-md-3 pl0 pr0 text-muted">Name and Surname</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'reference_name_surname_1', 'value'=>$profile->reference_name_surname_1, 'class'=>'form-control', 'placeholder'=>'Name and Surname')); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">Position</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'reference_position_1', 'value'=>$profile->reference_position_1, 'class'=>'form-control', 'placeholder'=>lang('position'))); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">Phone Number</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'reference_phone_1', 'value'=>$profile->reference_phone_1, 'class'=>'form-control', 'placeholder'=>lang('phone'))); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">E-mail address</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'reference_email_1', 'value'=>$profile->reference_email_1, 'class'=>'form-control', 'placeholder'=>lang('email'))); ?></div>
				</div>
				<div class="col-md-5 pl0 pr0 text-muted mt10">
					<p style="margin-bottom:2px !important"><strong>REFERENCE 2</strong></p>
					<div class="col-md-3 pl0 pr0 text-muted">Name and Surname</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'reference_name_surname_2', 'value'=>$profile->reference_name_surname_2, 'class'=>'form-control', 'placeholder'=>'Name and Surname')); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">Position</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'reference_position_2', 'value'=>$profile->reference_position_2, 'class'=>'form-control', 'placeholder'=>lang('position'))); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">Phone Number</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'reference_phone_2', 'value'=>$profile->reference_phone_2, 'class'=>'form-control', 'placeholder'=>lang('phone'))); ?></div>
					<div class="col-md-3 pl0 pr0 text-muted">E-mail address</div><div class="col-md-8 pl0 pr0 text-muted"><?php echo form_input(array('name'=>'reference_email_2', 'value'=>$profile->reference_email_2, 'class'=>'form-control', 'placeholder'=>lang('email'))); ?></div>
				</div>
			</div>
		
		<? 
		
		if($edit_mode && $edit_mode === 'self'){
			echo '<div class="col-md-12 mt20 pt30 pb20 bt center"><button type="submit" class="btn btn-primary white"><i class="<?php echo $this->panel_icon;?> mr5"></i>UPDATE PROFILE</button></div>';		
		}else{
			echo '<div class="col-md-12 mt20 pt30 pb20 bt center"><button type="submit" class="btn btn-primary white"><i class="<?php echo $this->panel_icon;?> mr5"></i>UPDATE PROFILE</button></div>';		
			echo '<div class="col-md-12 mt20 pt30 pb20 bt center"><button type="button" id="back_to_approved_listing" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i>' . lang('back_to_').lang('users').lang('_listing').'</button></div>';
		}
		
		?>			
			



			<?php
			}else{
				echo '<div class="panel panel-danger panelClose form-error">';
				echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>'.strtoupper(lang('a_system_error').lang('_occurred')).'</h4></div>';
				echo '<div class="panel-body center">'.lang('no_').lang('users').lang('_found').'!<br/>'.lang('click_').'<a href="'.base_url('users/create').'">'.lang('here').'</a>'.lang('_to_create_a_').lang('user').'</div>';
				echo '</div>';				
			}
// _show_array($profile);		
			?>

			</div>
		</div>
	</div>
</div>
							