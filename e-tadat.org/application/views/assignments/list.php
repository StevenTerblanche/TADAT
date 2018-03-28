<?php defined('BASEPATH') OR exit('No direct script access allowed'); 


if ($arrAllAssignments){
	$arrIndicatorString = array('P1-1','P1-2','P2-3','P2-4','P2-5','P2-6','P3-7','P3-8','P3-9','P4-10','P4-11','P5-12','P5-13','P5-14','P5-15','P6-16','P6-17','P6-18','P7-19','P7-20','P7-21','P8-22','P8-23','P8-24','P9-25','P9-26','P9-27','P9-28');
	$arrPoas = _get_records_array('db_b', 'Poa', 'status', '1', $out = array('poa_number','poa'), 'all');					
	$arrIndicators = _get_records_array('db_b', 'PerformanceIndicators', 'status', '1', $out = array('indicatorNumber','indicatorName'), 'all');
	$arrIndicatorsByPoa = _get_record_all_indicators_by_poa();	
	$arrIndicatorCheckPoa = array('P1','P2','P3','P4','P5','P6','P7','P8','P9');


$arrPoaString = array(
	'P1' => 'POA 1 - Integrity of the Registered Taxpayer Base', 
	'P2' => 'POA 2 - Effective Risk Management', 
	'P3' => 'POA 3 - Supporting Voluntary Compliance', 
	'P4' => 'POA 4 - Timely Filing of Tax Declarations', 
	'P5' => 'POA 5 - Timely Payment of Taxes', 
	'P6' => 'POA 6 - Accurate Reporting in Declarations', 
	'P7' => 'POA 7 - Effective Tax Dispute Resolution', 
	'P8' => 'POA 8 - Efficient Revenue Management', 
	'P9' => 'POA 9 - Accountability and Transparency'
);



	foreach($arrAllAssignments as $key => $available){
		$arrUsers[] = $available['fkidUser'];
	}
	$arrUsers = array_unique($arrUsers);
	
	foreach($arrAllAssignments as $assignments){
		foreach($arrUsers as $Users){
			if ($assignments['fkidUser'] == $Users){
				$arrUniqueRow = array('id' => $assignments['id'],'fkidAuthority' => $assignments['fkidAuthority'], 'fkidMission' => $assignments['fkidMission'],'fkidUser' => $assignments['fkidUser']);				
				foreach($assignments as $key => $value){
					if(in_array($key,$arrIndicatorString)){	
						if($value == 1){
							 array_push($arrUniqueRow,$key);
						}
					}
				}
				$arrUserAssignments[] = $arrUniqueRow; 
				$arrUniqueRow = array();
			}
		}
	}		


				echo '<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">';
					echo '<thead>';
						echo '<tr>';
							echo '<th>' . strtoupper(lang('revenue_authority')) . '</th>';
							//echo '<th>' . strtoupper(lang('missions')) . '</th>';
							echo '<th>' . strtoupper(lang('assessor')).'</th>';							
							echo '<th>' . strtoupper(lang('user_').lang('assignments')).'</th>';
							echo '<th class="force-width-145-px" style="text-align:center !important">' . strtoupper(lang('action')) . '</th>';
						echo '</tr>';
					echo '</thead>';
				echo '<tbody>';

				foreach ($arrUserAssignments as $key => $value){
					$strEditURI = base_url('assignments/update') .'/update/'. base64_encode($this->encrypt->encode($value['id']));
					$strViewURI = base_url('assignments/profile/view') .'/'. base64_encode($this->encrypt->encode($value['id']));
					$strDisableURI = base_url('assignments/update/disable') .'/'. base64_encode($this->encrypt->encode($value['id']));
					$strEnableURI = base_url('assignments/update/enable') .'/'. base64_encode($this->encrypt->encode($value['id']));
					$strDeleteURI = base_url('assignments/update/delete') .'/'. base64_encode($this->encrypt->encode($value['id']));


					echo "<tr class='va'>";
							echo '<td class="va">'._get_fields_by_id('RevenueAuthorities', 'id', $value['fkidAuthority'], $out = array('authority')).'</td>';
						//	echo '<td>'._get_fields_by_id('Missions', 'id', $value['fkidMission'], $out = array('mission')).'</td>';
							echo '<td class="va">'._get_fields_by_id('Users', 'id', $value['fkidUser'], $out = array('title','name','surname'), ' ').'</td>';							
							echo '<td class="va">';
							
							$cntPoa = 0;
							$strPoa_1_Assigned = 0;
							$strPoa_2_Assigned = 0;
							$strPoa_3_Assigned = 0;
							$strPoa_4_Assigned = 0;
							$strPoa_5_Assigned = 0;
							$strPoa_6_Assigned = 0;
							$strPoa_7_Assigned = 0;
							$strPoa_8_Assigned = 0;
							$strPoa_9_Assigned = 0;																																																	
							foreach($value as $indicator => $indicators){
								$cntIndicators = 0;
								if(in_array($indicators,$arrIndicatorString)){
								
									$strAssignedPoas =  _get_fields_by_id('PerformanceIndicators', 'indicatorNumber', $indicators, array('indicatorNumber','indicatorName'), ' - ', 'db_b').'';
									$strIndicatorStarter = substr($strAssignedPoas,0,2);
									$cntPoa = 0;
									
										if($strIndicatorStarter === 'P1' && $strPoa_1_Assigned == 0){
												echo '<b>POA 1 - Integrity of the Registered Taxpayer Base</b><br>';
												$strPoa_1_Assigned = 1;
										}
										if($strIndicatorStarter === 'P2' && $strPoa_2_Assigned == 0){
												echo '<b>POA 2 - Effective Risk Management</b><br>';
												$strPoa_2_Assigned = 1;
										}
										if($strIndicatorStarter === 'P3' && $strPoa_3_Assigned == 0){
												echo '<b>POA 3 - Supporting Voluntary Compliance</b><br>';
												$strPoa_3_Assigned = 1;
										}
										if($strIndicatorStarter === 'P4' && $strPoa_4_Assigned == 0){
												echo '<b>POA 4 - Timely Filing of Tax Declarations</b><br>';
												$strPoa_4_Assigned = 1;
										}
										if($strIndicatorStarter === 'P5' && $strPoa_5_Assigned == 0){
												echo '<b>POA 5 - Timely Payment of Taxes</b><br>';
												$strPoa_5_Assigned = 1;
										}										
										if($strIndicatorStarter === 'P6' && $strPoa_6_Assigned == 0){
												echo '<b>POA 6 - Accurate Reporting in Declarations</b><br>';
												$strPoa_6_Assigned = 1;
										}										
										if($strIndicatorStarter === 'P7' && $strPoa_7_Assigned == 0){
												echo '<b>POA 7 - Effective Tax Dispute Resolution</b><br>';
												$strPoa_7_Assigned = 1;
										}										
										if($strIndicatorStarter === 'P8' && $strPoa_8_Assigned == 0){
												echo '<b>POA 8 - Efficient Revenue Management</b><br>';
												$strPoa_8_Assigned = 1;
										}										
										if($strIndicatorStarter === 'P9' && $strPoa_9_Assigned == 0){
												echo '<b>POA 9 - Accountability and Transparency</b><br>';
												$strPoa_9_Assigned = 1;
										}										
 										echo '&nbsp;&nbsp;&nbsp;&nbsp;&#8226;&nbsp;'.$strAssignedPoas.'<br>';										
								}
							}

//							$strPmq = $get_record_all[$key]['pmq'];
							echo '</td>';
							echo '<td class="va center">';
							echo '<div class="btn-group mr0 mb0">';
								echo '<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-arrow-circle-down mr5"></i>' . lang('action') . '</button>';
								echo '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">' . lang('toggle_dropdown') . '</span></button>';
								echo '<ul class="dropdown-menu dropdown-blue-bg">';
										echo '<li><a href="' . $strEditURI . '"><i class="fa fa-edit"></i>Change assignments for this user.</a></li>';
											if($this->user->fkidUserRole < 2){
//												echo '<li><a href="' . $strDeleteURI .'"><i class="fa fa-trash"></i>' . lang('delete_').lang('assignment') .'</a></li>';

									}
								echo '</ul>';
							echo '</div>';
						echo '</td>';
					echo '</tr>';
				}
				echo '</tbody>';
				echo '</table>';
?>
				<div class="form-group">
					<div class="col-xs-12" style="text-align:center !important; margin-top:50px !important">
					  <button type="button" id="create_assignment" class="btn btn-primary white"><i class="<?php echo $this->panel_icon;?> mr5"></i>Assign another Assessor / Team Leader</button>
					</div>
				</div>

<?php
				}else{
					echo '<div class="panel panel-info panelClose form-error">';
					echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>'.strtoupper(lang('no_').lang('assignments').lang('_found')).'</h4></div>';
					echo '<div class="panel-body center">'.lang('click_').'<a href="'.base_url('assignments/create').'">'.lang('here').'</a>'.lang('_to_create_an_').lang('assignment').'</div>';
					echo '</div>';				

				}
?>

