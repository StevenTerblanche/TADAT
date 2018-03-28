<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

// First get all the Mission details from the passed id.
	$missionId = $this->session->userdata('mission_id');
//	echo 'Mission ID: '.$this->session->userdata('mission_id').'<br>';
//	echo 'POA ID: '.$this->session->userdata('poa_id').'<br>';
	
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
			$arrPoaIndicatorsAssigned = array();
			$checkedPOAIndicatorNumber = '';
			foreach($arrIndicatorsAssigned as $key => $value){
				$arrCheckstr = substr($key, 1,1);
				if ($value === '1'){
					$checkedPOAIndicatorNumber .= $key.',';
				}
			}			
			$checkedPOAIndicatorNumber = rtrim($checkedPOAIndicatorNumber,',');
			$arrPoaIndicatorsAssigned = explode(',',$checkedPOAIndicatorNumber);			
		}
	}else{
		$arrPoaIndicatorsAssigned = array('P1-1', 'P1-2', 'P2-3', 'P2-4', 'P2-5', 'P2-6', 'P3-7', 'P3-8', 'P3-9', 'P4-10', 'P4-11', 'P5-12', 'P5-13', 'P5-14', 'P5-15', 'P6-16', 'P6-17', 'P6-18', 'P7-19', 'P7-20', 'P7-21', 'P8-22', 'P8-23', 'P8-24', 'P9-25', 'P9-26', 'P9-27', 'P9-28');
	}
//echo '<pre>';
//print_r($arrPoaIndicatorsAssigned);

if($get_poa_by_id){
	foreach($get_poa_by_id as $question => $questions){
		
		$arrIndicators = _get_indicators_by_poa_pi($questions['id'],'','db_b');

?>
<div class="row profile">
	<div class="col-md-12">
		<div class="profile-name">
			<div class="tabs inside-panel">	
				<ul id="myTab5" class="nav nav-tabs">
					<li class="active"><a href="#home5" data-toggle="tab"><strong>Introduction</strong></a></li>
					<li class=""><a href="#profile5" data-toggle="tab"><strong>Background</strong></a></li>
					<li class=""><a href="#settings5" data-toggle="tab"><strong>Performance Indicators</strong></a></li>
				</ul>
				<div id="myTabContent5" class="tab-content">		
					<div class="tab-pane fade active in text-muted" id="home5">			
						<h5 class="text-muted mb0 pb5 bld"><?php echo'POA '.$questions['poa_number'].': '.strtoupper($questions['poa'])?></h5>
						<?php echo $questions['description']; ?>
						<table class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">
							<thead>
								<tr>
									<th class="w150"><?php echo strtoupper(lang('indicators'));?></th>
									<th class="center"><?php echo strtoupper(lang('measurement_dimension'));?></th>
									<th class="w100 center">METHOD</th>
									<th class="center w150">ASSIGNED TO YOU</th>
									<th class="center"><?php echo strtoupper(lang('status'));?></th>
									<th style="text-align:center !important; width:145px !important"><?php echo strtoupper(lang('action'));?></th>
								</tr>
							</thead>
							<tbody>						
						<?php 
						$footnote = '';
						$footnote_count = 0;
						foreach($arrIndicators as $indicator => $indicators){
							if($indicators['footnote'] && strlen($indicators['footnote']) > 20){
								$footnote_count++;
								$footnote_notice = '<br><span style="font-size:12px !important"><i>See footnote '.$footnote_count.'</i></span>';	
								$footnote .= '<strong>FOOTNOTE '.$footnote_count.':</strong><br>'.$indicators['footnote'];
							}else{
								$footnote_notice = '';	
								$footnote .= '';
							}
							# Get type of question from DB
							# Get the table name this question relates to
							if($indicators["questionTable"] !== ''){
								$strAssignedPoaText = 'No';
								$strPoaIndicatorNumber = 'P'.$this->session->userdata('poa_id').'-'.$indicators['piId'];
								$strAssignedIndicator = 0;
								$strAssignedPoaText = 'No';
//								echo 'POA Indicator ID: '.$strPoaIndicatorNumber.'<br>';
								if(in_array($strPoaIndicatorNumber,$arrPoaIndicatorsAssigned)){
									$strAssignedIndicator = 1;
									$strAssignedPoaText = '<span style="color:#3ebd00"><b>Yes</b></span>';
								}
								# Get the question status
								$strStatusType = _get_status_by_id('db_b', $indicators["questionTable"], $this->session->userdata('mission_id'), 'fkidMission');
								$strTable = $indicators["questionTable"];
								$strCompletedId = ($strStatusType) ? $strStatusType['id'] : '';
								$strIndicatorId = $indicators['piId'];
								$strLink = base64_encode($this->encrypt->encode($strTable)).'/'.base64_encode($this->encrypt->encode($strIndicatorId)).'/'.base64_encode($this->encrypt->encode($strCompletedId));
								$strScoreLink = base64_encode($this->encrypt->encode($strCompletedId)).'/'. base64_encode($this->encrypt->encode($this->session->userdata('mission_id'))).'/'. base64_encode($this->encrypt->encode($this->session->userdata('poa_id'))).'/'. base64_encode($this->encrypt->encode($strIndicatorId));
								if(!empty($strStatusType)){
									# COMPLETED MAY BE VIEWED BY ALL
									if($strStatusType['status'] == 1){
										$strStatus = '<button class="btn btn-primary disabled dashboard-green-panel m0 mb0 p2" type="button">'.lang('completed').'</button>';
										$strLinkText = lang('view').lang('_assessment');
										$strCss = 'green-text';
										$strUrl = base_url('/questions/dimensions/completed/'. $strLink);
										$strScoreLinkText = lang('view_').lang('scores');									
										$strScoreUrl = base_url('/questions/score/'. $strScoreLink);									
									# IN PROGRESS BY LOGGED IN ASSESSOR
									}elseif($strStatusType['status'] == 0 && $strAssignedIndicator == 1){
										$strStatus = '<button class="btn btn-primary disabled dashboard-orange-panel m0 mb0 p2" type="button">'.lang('in_progress').'</button>';
										$strCss = 'orange-text';
										$strLinkText = lang('complete').lang('_assessment');
										$strUrl = base_url('/questions/dimensions/update/'. $strLink);
									# IN PROGRESS BY NOT LOGGED-IN (ASSIGNED) ASSESSOR
									}elseif($strStatusType['status'] == 0 && $strAssignedIndicator == 0){
										$strStatus = '<button class="btn btn-primary disabled dashboard-orange-panel m0 mb0 p2" type="button">'.lang('in_progress').'</button>';
										$strCss = 'orange-text';
										$strLinkText = 'Assessment In-progress';
										$strUrl = "#";
									}
								}else{									
									# NOT STARTED BY ASSIGNED LOGGED-IN ASSESSOR - SECRETARIAT
									if($strAssignedIndicator == 1 && $this->user->fkidUserRole == 2){
										$strStatus = '<button class="btn btn-primary disabled dashboard-orange-panel m0 mb0 p2" type="button">'.lang('in_progress').'</button>';
										$strCss = 'orange-text';
										$strLinkText = "Not yet Assessed";
										$strUrl = "#";
									}
									# NOT STARTED AND ASSIGNED BUT NOT SECRETARIAT
									if($strAssignedIndicator == 1 && $this->user->fkidUserRole != 2){
										$strStatus = '<button class="btn btn-primary disabled dashboard-red-panel m0 mb0 p2" type="button">'.lang('incomplete').'</button>';
										$strLinkText = lang('complete').lang('_assessment');
										$strCss = 'red-text';
										$strUrl = base_url('/questions/dimensions/create/'. $strLink);						
									}
									# NOT STARTED AND NOT ASSIGNED BUT NOT SECRETARIAT
									if($strAssignedIndicator == 0 && $this->user->fkidUserRole != 2){
										$strStatus = '<button class="btn btn-primary disabled dashboard-red-panel m0 mb0 p2" type="button">'.lang('incomplete').'</button>';
										$strLinkText = 'Not yet Assessed';
										$strCss = 'red-text';
										$strUrl = "#";						
									}									
								}
							}
							$arrDimensions = _get_record_by_fkid_md($indicators['piId'],'','db_b');
								echo '<tr class="va">';
									echo '<td class="va">'.$indicators['indicatorNumber'].': '.$indicators['indicatorName'].'</td>';
									echo '<td class="va"><ul class="mb0 ml0 pl10">';	foreach($arrDimensions as $dimension => $dimensions){if($dimensions['fkidDimensionType'] != 1){echo '<li>'.$dimensions['dimensionName'].'</li>';}} echo '</td>';
									echo '<td class="va center">'.$indicators['methodType'].$footnote_notice.'</td>';
									echo '<td class="va center">'.$strAssignedPoaText.'</td>';
									echo '<td class="va center">'.$strStatus.'</td>';
									echo '<td class="va center">';
										echo '<div class="btn-group mr0 mb0">';
											echo '<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-arrow-circle-down mr5"></i>'.lang('action').'</button>';
											echo '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">'.lang('toggle_dropdown').'</span></button>';
											echo '<ul class="dropdown-menu dropdown-blue-bg">';
													echo '<li><a href="'.$strUrl.'"><i class="fa fa-table"></i>'.$strLinkText.'</a></li>';
													if(!empty($strStatusType) && $strStatusType['status'] == 1){
														echo '<li><a href="'.$strScoreUrl.'"><i class="fa fa-table"></i>'.$strScoreLinkText.'</a></li>';
													}
											echo '</ul>';
										echo '</div>';
									echo '</td>';							
								echo '</tr>';
						}
							if($footnote !== ''){
								echo '<tr class="va">';
									echo '<td colspan="6" class="va" style="font-size:12px !important"><i>'.$footnote.'</i></td>';
									echo '</td>';							
								echo '</tr>';
							}	
					?>
					</tbody></table>
					</div>			
					<div class="tab-pane fade text-muted" id="profile5">
						<h5 class="text-muted mb0 pb5 bld"><?php echo strtoupper(lang('desired_outcome'));?></h5>
						<?php echo $questions['desiredOutcome']; ?>
						<h5 class="text-muted mb0 pb5 bld"><?php echo strtoupper(lang('background'));?></h5>
						<?php echo $questions['background']; ?>
					</div>
					<div class="tab-pane fade text-muted" id="settings5">
						<h5 class="text-muted mb0 pb5 bld"><?php echo strtoupper(lang('indicators'));?></h5>
						<?php echo $questions['indicators']; ?>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>		
<div style="margin:auto !important; padding-top:25px !important; width:400px !important; text-align:center !important"><button type="button" id="id_show_poas" class="btn btn-primary white"><i class="fa fa-user mr5"></i>Back to POA Listing</button></div>
<script type="text/javascript">
    document.getElementById("id_show_poas").onclick = function () {
        location.href = "<? echo base_url('questions/introduction/?id=') . base64_encode($this->encrypt->encode($missionId));?>";
    };
</script>
<?php }} ?>