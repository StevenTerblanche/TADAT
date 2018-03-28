<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//echo '<pre>';
//print_r($get_record_all_poas);
			if ($get_record_all_poas){
				echo '<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">';
					echo '<thead>';
						echo '<tr>';
							echo '<th>' . strtoupper(lang('performance_indicator')) . '</th>';
							echo '<th style="text-align:center !important">' . strtoupper(lang('_status')).'</th>';														
							echo '<th class="force-width-145-px" style="text-align:center !important">' . strtoupper(lang('action')) . '</th>';
						echo '</tr>';
					echo '</thead>';
				echo '<tbody>';
				foreach ($get_record_all_poas as $key => $value){
					$arrIndicatorTables = _get_fields_by_id_array_clean('db_b','PerformanceIndicators', 'fkidPoa', $value['id'], $out = array('questionTable'),10);	
					$strStatusCount = '';
					$strTblCount = '';
					$strScoreCount = 0;
					foreach ($arrIndicatorTables as $indicator => $indicators){
						$strTblCount++;
						$arrCount = _get_record_count_by_status($indicators['questionTable'], $field = 'fkidMission', $this->session->userdata('mission_id'), 'status', 'db_b');
						if($arrCount){
							foreach ($arrCount as $counts => $count){
								$strStatusCount += $count['status'];
							}
						}
					}
					if($strStatusCount == $strTblCount){$strStatus = '<button class="btn btn-primary disabled dashboard-green-panel m0 mb0 p2" type="button">'.lang('completed').'</button>';}
					if($strStatusCount !== '' && $strStatusCount != $strTblCount){$strStatus = '<button class="btn btn-primary disabled dashboard-orange-panel m0 mb0 p2" type="button">'.lang('in_progress').'</button>';}
					if($strStatusCount === ''){$strStatus = '<button class="btn btn-primary disabled dashboard-red-panel m0 mb0 p2" type="button">'.lang('incomplete').'</button>';}						

					$strViewURI = base_url('scores/pis') .'/'. base64_encode($this->encrypt->encode($value['id']));
					echo "<tr class='va'>";
						echo "<td class='va'>POA ". $value['poa_number'] .": ". $value['poa'] . "</td>";
						echo '<td class="va center">'.$strStatus.'</td>';						
						echo '<td class="va center">';
							echo '<div class="btn-group mr0 mb0">';
								echo '<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-arrow-circle-down mr5"></i>' . lang('action') . '</button>';
								echo '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">' . lang('toggle_dropdown') . '</span></button>';
								echo '<ul class="dropdown-menu dropdown-blue-bg">';
									echo '<li><a href="' . $strViewURI . '"><i class="fa fa-list"></i>' . lang('view_').lang('performance_indicators'). '</a></li>';
								echo '</ul>';
							echo '</div>';
						echo '</td>';
					echo '</tr>';
				}
				echo '</tbody>';
				echo '</table>';
				}else{
					echo '<div class="panel panel-danger panelClose form-error">';
					echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>'.strtoupper(lang('a_system_error').lang('_occurred')).'</h4></div>';
					echo '<div class="panel-body center">'.lang('no_').lang('performance_indicators').lang('_found').'!<br/>'.lang('click_').'<a href="'.base_url('pi/create').'">'.lang('here').'</a>'.lang('_to_create_a_').lang('performance_indicator').'</div>';
					echo '</div>';				
				}
?>