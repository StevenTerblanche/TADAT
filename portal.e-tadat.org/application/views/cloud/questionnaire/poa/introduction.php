<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
/* PLAYGROUND */
//	echo 'USERID: '.$this->user->id.'<br>';
//		PerformanceIndicators.id, PerformanceIndicators.fkidPoa, PerformanceIndicators.indicatorNumber, PerformanceIndicators.indicatorName
	/* Get missions that this user is attached to
	   1 - Admin - all
	   2 - Sec all not tester
	   4 - Mtl (Missions - MTL)
	   5 - Assessor (RightsAssignments)
	 */

/* PLAYGROUND */

	/* START INITIAL PAGE STRING SETUP */
	/* Get the relevant display strings by User Role */
	switch ($this->user->fkidUserRole){
		case 1:
			$strIntroduction_1 = '<p>You have been appointed in the role of '. $this->user->Role .' to assist the TADAT Secretariat in the testing of the TADAT mission as displayed below.</p>';
			$strPoaAction = '';			
		break;
		case 2:
			$strIntroduction_1 = '<p>As the TADAT Secretariat, your role is to ensure that the Quality Assurance Standards of TADAT is adhered to, for the TADAT mission as displayed below.</p>';
			$strPoaAction = '';						
		break;
		case 4:
			$strIntroduction_1 = '<p>You have been appointed in the role of '. $this->user->Role .' to assist the TADAT Secretariat in the Assessment and Quality Assurance of the TADAT mission as displayed below.</p>';
			$strPoaAction = '';						
		break;
		case 5:
			$strIntroduction_1 = '<p>You have been appointed in the role of '. $this->user->Role .' to assist the TADAT Team Leader in the Assessment of the TADAT mission as displayed below.</p>';
			$strPoaAction = '';						
		break;
	}
	/* END INITIAL PAGE STRING SETUP */

	// First get all the Mission details from the passed id.
	$missionId = $this->missionId;
	
	// Assign the arrPoaAssigned array to indicate responsibility
	$arrPoaAssigned = array();
	// Check if user is MTL or Assessor to change status of arrPoaAssigned; else set as default for Secretariat
	if($this->user->fkidUserRole == 4 || $this->user->fkidUserRole == 5){
		$p1 = array('P1-1', 'P1-2');
		$p2 = array('P2-3', 'P2-4', 'P2-5', 'P2-6');
		$p3 = array('P3-7', 'P3-8', 'P3-9');
		$p4 = array('P4-10', 'P4-11');
		$p5 = array('P5-12', 'P5-13', 'P5-14', 'P5-15');
		$p6 = array('P6-16', 'P6-17', 'P6-18');
		$p7 = array('P7-19', 'P7-20', 'P7-21');
		$p8 = array('P8-22', 'P8-23', 'P8-24');
		$p9 = array('P9-25', 'P9-26', 'P9-27', 'P9-28');
		
		$checkedPOAnumber = '';
		$checkedPOA_1 = '';
		$checkedPOA_2 = '';
		$checkedPOA_3 = '';
		$checkedPOA_4 = '';
		$checkedPOA_5 = '';
		$checkedPOA_6 = '';
		$checkedPOA_7 = '';
		$checkedPOA_8 = '';
		$checkedPOA_9 = '';

		get_instance()->db->select('`P1-1`, `P1-2`, `P2-3`, `P2-4`, `P2-5`, `P2-6`, `P3-7`, `P3-8`, `P3-9`, `P4-10`, `P4-11`, `P5-12`, `P5-13`, `P5-14`, `P5-15`, `P6-16`, `P6-17`, `P6-18`, `P7-19`, `P7-20`, `P7-21`, `P8-22`, `P8-23`, `P8-24`, `P9-25`, `P9-26`, `P9-27`, `P9-28`');
		get_instance()->db->from('RightsAssignmentsIndicators');
		get_instance()->db->where('RightsAssignmentsIndicators.fkidMission', $missionId);
		get_instance()->db->where('RightsAssignmentsIndicators.fkidUser', $this->user->id);	
		$query = get_instance()->db->get();
        if ($query->num_rows()){
			$arrIndicatorsAssigned = $query->row_array();
			foreach($arrIndicatorsAssigned as $key => $value){
				if(in_array($key,$p1) && $value === '1') $checkedPOA_1 = '1,';
				if(in_array($key,$p2) && $value === '1') $checkedPOA_2 = '2,';
				if(in_array($key,$p3) && $value === '1') $checkedPOA_3 = '3,';	
				if(in_array($key,$p4) && $value === '1') $checkedPOA_4 = '4,';	
				if(in_array($key,$p5) && $value === '1') $checkedPOA_5 = '5,';	
				if(in_array($key,$p6) && $value === '1') $checkedPOA_6 = '6,';	
				if(in_array($key,$p7) && $value === '1') $checkedPOA_7 = '7,';	
				if(in_array($key,$p8) && $value === '1') $checkedPOA_8 = '8,';	
				if(in_array($key,$p9) && $value === '1') $checkedPOA_9 = '9,';						
			}			
			$checkedPOAnumber = rtrim($checkedPOA_1.$checkedPOA_2.$checkedPOA_3.$checkedPOA_4.$checkedPOA_5.$checkedPOA_6.$checkedPOA_7.$checkedPOA_8.$checkedPOA_9,',');
			$arrPoaAssigned = explode(',',$checkedPOAnumber);			
		}
	}else{
		$arrPoaAssigned = array(1,2,3,4,5,6,7,8,9);
	}

	if(isset($objGetMissionDetails) && !empty($objGetMissionDetails)){?>
		<div class="row profile">
			<div class="col-md-12">
				<div class="profile-name">
				<p><strong>Dear <?php echo _get_fields_by_id('Titles', 'id' ,$this->user->fkidTitle, array('title')).' '.$this->user->name.' '.$this->user->surname;?></strong></p>
				<?php
					echo $strIntroduction_1;
					echo '<p>The '.$objGetMissionDetails->missionName. ', covering the assessment periods of ' . $objGetMissionDetails->missionAssessmentPeriod . ', was created on behalf of the <a href="http://e-tadat.org/authorities/profile/?id='.base64_encode($this->encrypt->encode($objGetMissionDetails->authorityId)).'" target="_blank">'.$objGetMissionDetails->authorityName.'</a> Tax Administration, on '.date("j F Y", strtotime($objGetMissionDetails->missionDateCreated)).', by '
					.'<a href="http://e-tadat.org/users/profile/?id='.base64_encode($this->encrypt->encode($objGetMissionDetails->secId)).'" target="_blank">'.$objGetMissionDetails->secUserTitle.' '.$objGetMissionDetails->secUserName.' '.$objGetMissionDetails->secUserSurname.'</a> ('.$objGetMissionDetails->secUserRole.').' 
					.'</p>'; 
					echo '<p>The mission is situated in '.$objGetMissionDetails->authorityCity.', '.$objGetMissionDetails->authorityCountry.' ('.$objGetMissionDetails->authorityRegion.' ) and commences on '.date("j F Y", strtotime($objGetMissionDetails->missionDateStart)).' and concludes provisionally on '.date("j F Y", strtotime($objGetMissionDetails->missionDateEnd)).'.</p>';
					echo '<p>The primary contact person at the Tax Administration is <a href="http://e-tadat.org/users/profile/?id='.base64_encode($this->encrypt->encode($objGetMissionDetails->racId)).'" target="_blank">'.$objGetMissionDetails->racUserTitle.' '.$objGetMissionDetails->racUserName.' '.$objGetMissionDetails->racUserSurname.'</a> ('.$objGetMissionDetails->racUserRole.').'; 
					if($objGetMissionDetails->raId){
						echo ' Secondary contact may also be made to <a href="http://e-tadat.org/users/profile/?id='.base64_encode($this->encrypt->encode($objGetMissionDetails->raId)).'" target="_blank">'.$objGetMissionDetails->raUserTitle.' '.$objGetMissionDetails->raUserName.' '.$objGetMissionDetails->raUserSurname.'</a> ('.$objGetMissionDetails->raUserRole.').'; 
					}
					echo '</p>';
				?>
				</div>
			</div>
		</div>
				<div class="col-md-<?php echo (empty($this->columns))?'10':$this->columns;?> pl0 pr0">
					<div class="panel panel-default panel-blue-margin" style="margin-bottom:10px !important">
						<div class="panel-heading dark-blue-bg"><h4 class="panel-title mb0 pb0"><i class="fa fa-globe"></i><?php echo strtoupper($objGetMissionDetails->missionName);?></h4></div>		
						<div class="panel-body">
							<div class="row profile">
								<div class="col-md-12">
									<div class="profile-name">
										<table class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>PERFORMANCE OUTCOME AREAS</th>
													<th class="center w150">ASSIGNED TO YOU</th>
													<th class="center w150">STATUS</th>
													<th style="text-align:center !important; width:145px !important"><?php echo strtoupper(lang('action'));?></th>
												</tr>
											</thead>
											<tbody>		
<?php

	$arrPoaListing = _get_selected_records_poa(null,'cloud_questions');
	$arrGetAllAssignmentsByMissionId = _get_record_all_assignments($arrMissions = array());
		foreach($arrPoaListing as $poa_index => $poa_value){
				$strStatusType = (_get_status_by_id_all('cloud_questions', 'PerformanceIndicators', $missionId, $poa_value['id']));
				$strAssignedPoa = 0;
				$strAssignedPoaText = 'No';
				if(in_array($poa_value['poa_number'],$arrPoaAssigned)){
					$strAssignedPoa = 1;
					$strAssignedPoaText = '<span style="color:#3ebd00"><b>Yes</b></span>';					
				}
				# COMPLETED MAY BE VIEWED BY ALL
				if($strStatusType == 1){
					$strStatus = '<button class="btn btn-primary disabled dashboard-green-panel m0 mb0 p2" type="button">'.lang('completed').'</button>';
					$strLinkText = lang('view').lang('_table');
					$strCss = 'green-text';
					$strLinkText = 'View Assessment';
					$strUrl = base_url('questions/indicators') .'/'. base64_encode($this->encrypt->encode($missionId)).'/'. base64_encode($this->encrypt->encode($poa_value['id']));
				# IN PROGRESS BY LOGGED IN ASSESSOR
				}elseif($strStatusType == 0 && $strAssignedPoa == 1){
					$strStatus = '<button class="btn btn-primary disabled dashboard-orange-panel m0 mb0 p2" type="button">'.lang('in_progress').'</button>';
					$strLinkText = lang('complete').lang('_table');
					$strCss = 'orange-text';
					$strLinkText = 'Complete Assessment';
					$strUrl = base_url('questions/indicators') .'/'. base64_encode($this->encrypt->encode($missionId)).'/'. base64_encode($this->encrypt->encode($poa_value['id']));
				# IN PROGRESS BY NOT LOGGED-IN (ASSIGNED) ASSESSOR
				}elseif($strStatusType == 0 && $strAssignedPoa == 0){
					$strStatus = '<button class="btn btn-primary disabled dashboard-orange-panel m0 mb0 p2" type="button">'.lang('in_progress').'</button>';
					$strLinkText = lang('complete').lang('_table');
					$strCss = 'orange-text';
					$strLinkText = 'Assessment In-progress';
					$strUrl = '#';					
				}elseif($strStatusType == 90 && $strAssignedPoa == 1 && $this->user->fkidUserRole == 2){
				# NOT STARTED BY ASSIGNED LOGGED-IN ASSESSOR
					$strStatus = '<button class="btn btn-primary disabled dashboard-red-panel m0 mb0 p2" type="button">'.lang('incomplete').'</button>';
					$strLinkText = lang('complete').lang('_table');
					$strCss = 'red-text';
					$strLinkText = 'Not yet Assessed';									
					$strUrl = '#';
				}elseif($strStatusType == 90 && $strAssignedPoa == 1 && $this->user->fkidUserRole != 2){
				# NOT STARTED BY ASSIGNED LOGGED-IN ASSESSOR
					$strStatus = '<button class="btn btn-primary disabled dashboard-red-panel m0 mb0 p2" type="button">'.lang('incomplete').'</button>';
					$strLinkText = lang('complete').lang('_table');
					$strCss = 'red-text';
					$strLinkText = 'Complete Assessment';									
					$strUrl = base_url('questions/indicators') .'/'. base64_encode($this->encrypt->encode($missionId)).'/'. base64_encode($this->encrypt->encode($poa_value['id']));
				}elseif($strStatusType == 90 && $strAssignedPoa == 0){
				# NOT STARTED BY ANY ASSESSOR
					$strStatus = '<button class="btn btn-primary disabled dashboard-red-panel m0 mb0 p2" type="button">'.lang('incomplete').'</button>';
					$strLinkText = lang('complete').lang('_table');
					$strCss = 'red-text';
					$strLinkText = 'Not yet Assessed';
					$strUrl = '#';	
				}
				
				echo '<tr class="va">';
					echo '<td class="va">POA ' . $poa_value['poa_number']. ': '.$poa_value['poa'] . '</td>';
					echo '<td class="va center">'.$strAssignedPoaText.'</td>';
					echo '<td class="va center">'.$strStatus.'</td>';
					echo '<td class="va center">';
						echo '<div class="btn-group mr0 mb0">';
							echo '<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-arrow-circle-down mr5"></i>'.lang('action').'</button>';
							echo '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">'.lang('toggle_dropdown').'</span></button>';
							echo '<ul class="dropdown-menu dropdown-blue-bg">';
							echo '<li><a href="'.$strUrl.'"><i class="fa fa-table"></i>'.$strLinkText.'</a></li>';
							
							echo '</ul>';
						echo '</div>';
					echo '</td>';							
				echo '</tr>';
			} // ENDS POA Loop
		?>
											 </tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>									
	<?php
	}else{ 
		echo '<div class="panel panel-danger panelClose form-error">';
		echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>NO MISSION LINKED</h4></div>';
		echo '<div class="panel-body center">A Mission has not yet been assigned to this Mission Team Leader / Assesor!</div>';
		echo '</div>';				
	
	} // ENDS $arrPoaListing IF
?>