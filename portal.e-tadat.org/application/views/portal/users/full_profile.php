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
			$arrUserLanguages = get_selected_languages($profile->fkid_language);
			$valFullName = $profile->title.' '.$profile->name.' '.$profile->middle_name.' '.$profile->surname;
//			_show_array($profile);					
			
			?>
			<div class="row profile">
				<div class="col-md-12">
					<div class="profile-name">
						<h3 class="mb0 ml10 mt10">APPLICANT INFORMATION</h3>
					</div>
				</div>
			</div>
			<div class="col-md-12 pl0 pr0 ml10 mr0 bt">
				<div class="col-md-6 pl0 pr0 text-muted mt10">
					<div class="col-md-3 pl0 pr0 text-muted">Title</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->title ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted">First Name</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->name ?>&nbsp;</div>
					<? if($profile->middle_name !== ''){?><div class="col-md-3 pl0 pr0 text-muted">Middle Name</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->middle_name ?>&nbsp;</div><? } ?>
					<div class="col-md-3 pl0 pr0 text-muted">Surname</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->surname ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted">Personal E-mail</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->email ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted">Telephone</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->telephone ?>&nbsp;</div>
				</div>
				<div class="col-md-6 pl0 pr0 text-muted mt10">
					<div class="col-md-3 pl0 pr0 text-muted">Language</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->language ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted">Birth Date</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->dob ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted">Gender</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->gender ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted">Country of Citizenship</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->CountryResidence ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted">Country of Residence</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->CountryCitizen ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted"></div><div class="col-md-9 pl0 pr0 text-muted">&nbsp;</div>
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
					<div class="col-md-3 pl0 pr0 text-muted">Agency or Organization</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->current_organization ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted">Organization Type</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->organization_type ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted">Department</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->current_department ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted">Business Address</div><div class="col-md-9 pl0 pr0 text-muted"><? if($profile->current_business_address_1){echo $profile->current_business_address_1.', '.$profile->current_business_address_2; }else{echo '';} ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted"></div><div class="col-md-9 pl0 pr0 text-muted"><? if($profile->current_business_address_city){echo $profile->current_business_address_city.', '.$profile->CountryBusinessCurrent; }else{echo '';} ?>&nbsp;</div>
					
				</div>
				<div class="col-md-6 pl0 pr0 text-muted mt10">
					<div class="col-md-3 pl0 pr0 text-muted">Job title</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->current_job_title ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted">Start Date</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->current_start_date ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted">Business email</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->current_business_email ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted">Business phone</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->current_business_telephone ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted">Current Duties</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->current_duties ?>&nbsp;</div>
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
					<?
					if($arrTaxAdminExperience){
						echo '<p><strong>Tax Administration functions in which the candidate have experience:</strong></p>';
						echo '<ul>';
						$show_experience = 0;
						foreach($arrTaxAdminExperience as $type){
							if($type['experience'] !== 'Other'){
								echo '<li>'.$type['experience'].'</li>';
							}else{
								$show_experience = 1;
							}
						}
						echo '</ul>';
						
						if($show_experience === 1){
							echo '<p><strong>Other Tax Administration functions in which the candidate has experience:</strong></p>';
							echo '<ul><li>'.$profile->tax_administration_experience_other.'</li></ul>';
						}
					}else{
							echo '<p><strong>No Tax Administration functions in which the candidate have experience supplied.</strong></p>';
						
						}
						if($profile->diagnostic_program == 1){
							echo '<p><strong>The candidate has worked on similar institutional diagnostic programs such as PEFA or the WCO diagnostic tool for Customs Administration as listed below:</strong></p>';
							echo '<ul><li>'. $profile->diagnostic_program_details.'</li></ul>';
						}else{
							echo '<p><strong>The candidate has not worked on similar institutional diagnostic programs such as PEFA or the WCO diagnostic tool for Customs Administration.</strong></p>';					
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
				<div class="col-md-12 pl10 pr0 text-muted mt10">
					<? if($profile->degree){?>
					<p>The candidate obtained a <? echo $profile->degree ?> (<? echo $profile->degree_name_1 ?>) from <? echo $profile->university_1 ?> (<? echo $profile->CountryAcademicCurrent ?>) during the period between <? echo $profile->academic_start_date_1 ?>  and <? echo $profile->academic_end_date_1 ?>.</p>
					<? }else{ ?>
					<p>No Educational Information supplied.</p>
					<? } ?>					
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
					
					<?
					if($profile->fkid_language){
						echo '<p><strong>The candidate is proficient on a professional level and able to work in the following official UN languages:</strong></p>';
						echo '<ul>';
						foreach($arrUserLanguages as $type){echo '<li>'.$type['language'].'</li>';}
						echo '</ul>';
						
						if($profile->language_other !== ''){
							echo '<p><strong>The candidate is proficient on a professional level and able to work in the following other languages:</strong></p>';
							echo '<ul><li>'.$profile->language_other.'</li></ul>';
						}
					}else{
						echo '<p><strong>The candidate has not indicated any Official UN Languages.</strong></p>';
						
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
					<div class="col-md-3 pl0 pr0 text-muted">Name and Surname</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->reference_name_surname_1 ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted">Position</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->reference_position_1 ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted">Phone number</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->reference_phone_1 ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted">E-mail address</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->reference_email_1 ?>&nbsp;</div>
				</div>
				<div class="col-md-5 pl0 pr0 text-muted mt10">
					<p style="margin-bottom:2px !important"><strong>REFERENCE 2</strong></p>
					<div class="col-md-3 pl0 pr0 text-muted">Name and Surname</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->reference_name_surname_2 ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted">Position</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->reference_position_2 ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted">Phone number</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->reference_phone_2 ?>&nbsp;</div>
					<div class="col-md-3 pl0 pr0 text-muted">E-mail address</div><div class="col-md-9 pl0 pr0 text-muted"><? echo $profile->reference_email_2 ?>&nbsp;</div>
				</div>
			</div>


	<? if($profile->status !== 'Approved'){ ?>
			<div class="row profile">
				<div class="col-md-12">
					<div class="profile-name">
						<h3 class="mb0 ml10 mt20">ACTION</h3>
					</div>
				</div>
			</div>
			<div class="col-md-12 pl0 pr0 ml10 mr0 bt">
				<? echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal')); ?>
					<input name="FkidUserId" value="<? echo $profile->UserID ?>" type="hidden">
					<div class="form-group">
						<div class="col-md-12 pl10 pr0 text-muted mt10">
						<? 
						
						
						if($profile->fkidUserRole !== '5' && $profile->fkidUserRole !== '10'){ ?>
							<p><strong><a href="https://courses.edx.org/register" target="_blank">Register this trainee on EDX</a></strong></p>
							<p><strong>Kindly select a new status to be applied to this applicant.</strong></p>
							<div class="col-md-2">
								<div class="input-group">
									<span class="input-group-addon"></span>
									<?php echo form_dropdown("fkidUserStatus", $get_dropdown_all_training_user_status, set_value("fkidUserStatus",''), array('id'=>'UserStatus', 'required'=>'', 'class'=>'form-control')); ?>
								</div>
							</div>
							<? }else{ ?>
							<p><strong>Kindly select a new status to be applied to this applicant.</strong></p>
							<div class="col-md-2">
								<div class="input-group">
									<span class="input-group-addon"></span>
									<?php echo form_dropdown("fkidUserStatus", $get_dropdown_all_normal_user_status, set_value("fkidUserStatus",''), array('id'=>'UserStatus', 'required'=>'', 'class'=>'form-control')); ?>
								</div>
							</div>
							
							
							
							<? } ?>
						</div>	
						<input name="FkidUserRole" value="<? echo $profile->fkidUserRole; ?>" type="hidden">
						<div class="col-md-12 pl10 pr0 text-muted mt10">
								<div id="message_container" class="col-md-5">
								<p><strong>Enter a message below that will be sent to the applicant.</strong></p>
								<?php echo form_textarea(array('name'=>'applicant_message', 'value'=>'', 'class'=>'form-control', 'rows'=>'4'));?>
								</div>
								<div class="col-md-7">&nbsp;</div>
							</div>
						</div>
					</div>
					<div class="col-md-12 pl10 pr0 text-muted mt10">					
						<div class="form-group">
							<div class="col-xs-2" style="text-align:center !important;">
								<button type="submit" id="submit_status_button" class="btn btn-primary white"><i class="<?php echo $this->panel_icon;?> mr5"></i>UPDATE STATUS</button>
							</div>
						</div>
					</div>
				<? echo form_close(); ?>
			</div>
			<div class="col-md-12 mt20 pt30 pb20 bt center"><button type="button" id="back_to_applicant_listing" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i><?php echo lang('back_to_').lang('users').lang('_listing'); ?></button></div>					
<? }else{ ?>
			<div class="col-md-12 mt20 pt30 pb20 bt center"><button type="button" id="back_to_approved_listing" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i><?php echo lang('back_to_').lang('users').lang('_listing'); ?></button></div>					

<? } ?>

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
							