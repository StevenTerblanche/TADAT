<?php defined('BASEPATH') OR exit('No direct script access allowed'); 



//		PerformanceIndicators.id, PerformanceIndicators.fkidPoa, PerformanceIndicators.indicatorNumber, PerformanceIndicators.indicatorName

echo 'USERID: '.$this->user->id.'<br>';

$arrGetAllAssignmentsByMissionId = _get_record_all_assignments($arrMissions = array());

$queryMe = $arrGetAllAssignmentsByMissionId;

echo '<pre>';
print_r($queryMe);
echo '</pre>';

/*

$objGetMissionDetails = _get_mission_by_assigned_id($missionId);


$arrPoaListing = _get_selected_records_poa(null,'cloud_questions');


*/

if(isset($arrPoaListing) && !empty($arrPoaListing)){
?>
				<div class="row profile">
					<div class="col-md-12">
						<div class="profile-name">
							<p><strong>Dear <?php echo _get_fields_by_id('Titles', 'id' ,$this->user->fkidTitle, array('title')).' '.$this->user->name.' '.$this->user->surname;?></strong></p>
							<p>You have been appointed in the role of <?php echo $this->user->Role;?> to assist the TADAT Secretariat in the assessment of the TADAT mission/s as displayed below.</p>
						</div>
					</div>
				</div>

<?php
}


if (!$arrPoaListing){

	foreach($getarrObject as $key => $key_values){
		if ($key_values['so']){
			foreach($key_values['so'] as $so => $so_values){
	?>
				<div class="col-md-<?php echo (empty($this->columns))?'10':$this->columns;?> pl0 pr0">
					<div class="panel panel-default panel-blue-margin" style="margin-bottom:10px !important">
						<div class="panel-heading dark-blue-bg"><h4 class="panel-title mb0 pb0"><i class="fa fa-globe"></i><?php echo strtoupper($so_values['mission_name']);?></h4></div>		
						<div class="panel-body">
							<div class="row profile">
								<div class="col-md-12">
									<div class="profile-name">
										<p>In preparation for the TADAT assessment (<?php echo $so_values['mission_name'];?>) which will be undertaken on behalf of the <?php echo $so_values['ra_name'];?>, from <span class="bld"><?php echo date("l jS \of F Y", strtotime($so_values['mission_start']));?></span> to <span class="bld"><?php echo date("l jS \of F Y", strtotime($so_values['mission_end']));?></span> 
										you have been tasked by the Mission team leader, <?php echo _get_fields_by_id('Titles', 'id' ,$so_values['mtl_title'], array('title')).' '.$so_values['mtl_name'].' '.$so_values['mtl_surname'];?>, to assess the Perofrmance Outcome Areas, as listed below, by <span class="bld"><?php echo date("l jS \of F Y", strtotime($so_values['mission_end'].'-2 days'));?></span>. 
										</p>
									</div>
								</div>
							</div>
							<div class="col-md-12 pl0 pr0 ml0 mr0 bt">
								<div class="col-md-4 pl0 pr0 text-muted">
									<h5 class="text-muted mb0 pb5 bld"><?php echo lang('revenue_authority').lang('_details');?></h5>
									<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('revenue_authority'), ': '. $so_values['ra_name']; ?></div>
									<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('city') . ': ',$so_values['ra_city']; ?></div>
									<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('federal') , lang('_state') ,  ': ', ($so_values['ra_state'] ? $so_values['ra_state']: 'None');?></div>					
									<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('country') . ': ',$so_values['ra_country'] .', '.$so_values['ra_region']; ?></div>					
								</div>
								<div class="col-md-4 pl0 pr0 text-muted">
									<h5 class="text-muted mb0 pb5 bld"><?php echo lang('mission').lang('_details');?></h5>
									<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('mission'), ': '. $so_values['mission_name']; ?></div>
									<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('assessment_period') . ': ',$so_values['mission_period']; ?></div>
									<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('start_').lang('date') . ': ' . date("l jS \of F Y", strtotime($so_values['mission_start']));?></div>
									<div class="col-md-12 pl0 pr0 text-muted"><?php echo lang('end_').lang('date') . ': ' . date("l jS \of F Y", strtotime($so_values['mission_end']));?></div>					
				
								</div>
								<div class="col-md-4 pl0 pr0 text-muted">
									<h5 class="text-muted mb0 pb5 bld"><?php echo lang('further_').lang('information');?></h5>
									<div class="col-md-12 pl0 pr0 text-muted"><?php echo '<a href="' . base_url('missions/profile/?id=') . base64_encode($this->encrypt->encode($so_values['mission_id'])) . '">' . lang('view').lang('_the_').lang('mission').lang('_profile'). '</a>'; ?></div>
									<div class="col-md-12 pl0 pr0 text-muted"><?php echo '<a href="' . base_url('authorities/profile/?id=') . base64_encode($this->encrypt->encode($so_values['ra_id'])) . '">' . lang('view').lang('_the_').lang('revenue_authority').lang('_profile'). '</a>'; ?></div>
									<div class="col-md-12 pl0 pr0 text-muted"><?php echo '<a href="' . base_url('users/profile/?id=') . base64_encode($this->encrypt->encode($so_values['mtl_id'])) . '">' . lang('view').lang('_the_').lang('mission_').lang('team_leader_').lang('_profile'). '</a>'; ?></div>
									<div class="col-md-12 pl0 pr0 text-muted"><?php echo '<a href="' . base_url('users/profile/?id=') . base64_encode($this->encrypt->encode($so_values['ram_id'])) . '">' . lang('view').lang('_the_').lang('revenue_authority').lang('_manager').lang('_profile'). '</a>'; ?></div>					
				
								</div>
							</div>
							<div class="col-md-12 pl0 pr0 ml0 mr0">
								<div class="col-md-12 pl0 pr0 text-muted">
									<div class="col-md-12 pl0 pr0 text-muted">
		<?php 
			} // Ends SO Loop
		} // Ends SO If
		if ($key !== 'poa'){
		?>
										<table class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">
											<thead>
												<tr>
													<th>PERFORMANCE OUTCOME AREAS</th>
													<th class="center w150">STATUS</th>
													<th style="text-align:center !important; width:145px !important"><?php echo strtoupper(lang('action'));?></th>
												</tr>
											</thead>
											<tbody>		
		<?php	
			foreach($key_values['poa'] as $poa => $poa_values){
				$strStatusType = (_get_status_by_id_all('cloud_questions', 'PerformanceIndicators', $so_values['mission_id'], $poa_values['id']));
				if($strStatusType == 1){
					$strStatus = '<button class="btn btn-primary disabled dashboard-green-panel m0 mb0 p2" type="button">'.lang('completed').'</button>';
					$strLinkText = lang('view').lang('_table');
					$strCss = 'green-text';
					$strLinkText = 'View Assessment';
					$strUrl = base_url('questions/indicators') .'/'. base64_encode($this->encrypt->encode($so_values['mission_id'])).'/'. base64_encode($this->encrypt->encode($poa_values['id']));
				# IN PROGRESS
				}elseif($strStatusType == 0){
					$strStatus = '<button class="btn btn-primary disabled dashboard-orange-panel m0 mb0 p2" type="button">'.lang('in_progress').'</button>';
					$strLinkText = lang('complete').lang('_table');
					$strCss = 'orange-text';
					$strLinkText = 'Complete Assessment';
					$strUrl = base_url('questions/indicators') .'/'. base64_encode($this->encrypt->encode($so_values['mission_id'])).'/'. base64_encode($this->encrypt->encode($poa_values['id']));
				}elseif($strStatusType == 90){
				# NOT STARTED
					$strStatus = '<button class="btn btn-primary disabled dashboard-red-panel m0 mb0 p2" type="button">'.lang('incomplete').'</button>';
					$strLinkText = lang('complete').lang('_table');
					$strCss = 'red-text';
					$strLinkText = 'Complete Assessment';									
					$strUrl = base_url('questions/indicators') .'/'. base64_encode($this->encrypt->encode($so_values['mission_id'])).'/'. base64_encode($this->encrypt->encode($poa_values['id']));
				}
				echo '<tr class="va">';
					echo '<td class="va">POA ' . $poa_values['poa_number']. ': '.$poa_values['poa'] . '</td>';
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
		} // ENDS POA IF
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
	} // END MAIN LOOP
}else{
	echo '<div class="panel panel-danger panelClose form-error">';
	echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>NO MISSION LINKED</h4></div>';
	echo '<div class="panel-body center">A Mission has not yet been assigned to this Mission Team Leader / Assesor!</div>';
	echo '</div>';				

}
?>