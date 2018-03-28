<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

		if ($get_mission_details){?>
			<div class="row profile">
				<div class="col-md-12">
					<div class="profile-name">
						<h3 class="mb10"><?php echo $get_mission_details->missionName; ?></h3>
					</div>
				</div>
			</div>
			<div class="col-md-12 pl0 pr0 ml0 mr0 bt">
				<div class="col-md-12 pl0 pr0 text-muted">
					<h4 class="text-muted mb0 pb5 bld"><?php echo lang('mission').lang('_details');?></h4>
					<div class="col-md-12 pl0 pr0 text-muted">
					<?php 
echo '<p>The '.$get_mission_details->missionName. ', covering the assessment periods of ' . $get_mission_details->missionAssessmentPeriod . ', was created on behalf of the <a href="https://e-tadat.org/authorities/profile/?id='.base64_encode($this->encrypt->encode($get_mission_details->authorityId)).'" target="_blank">'.$get_mission_details->authorityName.'</a> Tax Administration, on '.date("j F Y", strtotime($get_mission_details->missionDateCreated)).', by '
.'<a href="https://e-tadat.org/users/profile/?id='.base64_encode($this->encrypt->encode($get_mission_details->secId)).'" target="_blank">'.$get_mission_details->secUserTitle.' '.$get_mission_details->secUserName.' '.$get_mission_details->secUserSurname.'</a> ('.$get_mission_details->secUserRole.').' 
.'</p>'; 
echo '<p>The mission is situated in '.$get_mission_details->authorityCity.', '.$get_mission_details->authorityCountry.' ('.$get_mission_details->authorityRegion.' ) and commences on '.date("j F Y", strtotime($get_mission_details->missionDateStart)).' and concludes provisionally on '.date("j F Y", strtotime($get_mission_details->missionDateEnd)).'.</p>';
echo '<p>The primary contact person at the Tax Administration is <a href="https://e-tadat.org/users/profile/?id='.base64_encode($this->encrypt->encode($get_mission_details->racId)).'" target="_blank">'.$get_mission_details->racUserTitle.' '.$get_mission_details->racUserName.' '.$get_mission_details->racUserSurname.'</a> ('.$get_mission_details->racUserRole.').'; 
if($get_mission_details->raId){
	echo ' Secondary contact may also be made to <a href="https://e-tadat.org/users/profile/?id='.base64_encode($this->encrypt->encode($get_mission_details->raId)).'" target="_blank">'.$get_mission_details->raUserTitle.' '.$get_mission_details->raUserName.' '.$get_mission_details->raUserSurname.'</a> ('.$get_mission_details->raUserRole.').'; 
}
echo '</p>';							
/*

$get_mission_details->missionName

$get_mission_details->missionDateStart
$get_mission_details->missionDateEnd
$get_mission_details->missionAssessmentPeriod
$get_mission_details->missionEnabledStatus
$get_mission_details->missionStatus

$get_mission_details->authorityCity
$get_mission_details->authorityRegion
$get_mission_details->authorityCountry
$get_mission_details->authorityState





*/							
					
					?>
					
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

			<div class="col-md-12 mt20 pt30 pb20 bt center"><button type="button" id="back_button" class="btn btn-primary white"><i class="fa fa-arrow-circle-left mr5"></i><?php echo lang('back_to_').lang('mission').lang('_listing'); ?></button></div>					
			<?php
			}else{
				echo '<div class="panel panel-danger panelClose form-error">';
				echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>'.strtoupper(lang('a_system_error').lang('_occurred')).'</h4></div>';
				echo '<div class="panel-body center">'.lang('no_').lang('missions').lang('_found').'!<br/>'.lang('click_').'<a href="'.base_url('missions/create').'">'.lang('here').'</a>'.lang('_to_create_a_').lang('mission').'</div>';
				echo '</div>';				
			}
echo '************  MTL MANAGE MISSION ***************';
echo '<pre>';
print_r($get_mission_details);
echo '</pre>';

			?>
