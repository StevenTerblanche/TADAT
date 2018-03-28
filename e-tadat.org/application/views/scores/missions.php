<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//echo '<pre>';
//print_r($get_record_all_missions);
			if ($get_record_all_missions){
				echo '<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">';
					echo '<thead>';
						echo '<tr>';
							echo '<th>' . strtoupper(lang('mission')) . '</th>';
							echo '<th style="text-align:center !important">' . strtoupper(lang('start_').lang('date')) . '</th>';
							echo '<th style="text-align:center !important">' . strtoupper(lang('end_').lang('date')) . '</th>';							
							echo '<th class="center">' . strtoupper(lang('mission').lang('_status')).'</th>';
							echo '<th class="force-width-145-px">' . strtoupper(lang('action')) . '</th>';
						echo '</tr>';
					echo '</thead>';
				echo '<tbody>';
				foreach ($get_record_all_missions as $key => $value){
					$strViewURI = base_url('scores/poas') .'/'. base64_encode($this->encrypt->encode($value['id']));
					if($value['fkidMissionStatus'] == 1){$strStatus = '<button class="btn btn-primary disabled dashboard-green-panel m0 mb0 p2" type="button">'.lang('completed').'</button>';}
					if($value['fkidMissionStatus'] == 2){$strStatus = '<button class="btn btn-primary disabled dashboard-orange-panel m0 mb0 p2" type="button">'.lang('in_progress').'</button>';}
					if($value['fkidMissionStatus'] == 3){$strStatus = '<button class="btn btn-primary disabled dashboard-orange-panel m0 mb0 p2" type="button">'.lang('in_progress').'</button>';}
//					if($value['fkidMissionStatus'] == 3){$strStatus = '<button class="btn btn-primary disabled dashboard-red-panel m0 mb0 p2" type="button">'.lang('incomplete').'</button>';}										
					echo "<tr class='va'>";
						echo "<td class='va'>" . $value['mission']. "</td>";
						echo "<td class='va center'>" . date("j F Y",strtotime($value['dateStart'])). "</td>";
						echo "<td class='va center'>" . date("j F Y",strtotime($value['dateEnd'])). "</td>";
						echo '<td class="va center">'.$strStatus.'</td>';
						echo '<td class="va center">';
							echo '<div class="btn-group mr0 mb0">';
								echo '<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-arrow-circle-down mr5"></i>' . lang('action') . '</button>';
								echo '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">' . lang('toggle_dropdown') . '</span></button>';
								echo '<ul class="dropdown-menu dropdown-blue-bg">';
									echo '<li><a href="' . $strViewURI . '"><i class="fa fa-sliders"></i>' . lang('view_').lang('outcome_areas'). '</a></li>';
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
					echo '<div class="panel-body center">'.lang('no_').lang('missions').lang('_found').'!<br/>'.lang('click_').'<a href="'.base_url('missions/create').'">'.lang('here').'</a>'.lang('_to_create_a_').lang('mission').'</div>';
					echo '</div>';				
				}
?>