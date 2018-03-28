<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//echo '<pre>';
//print_r($get_record_all);
			if ($get_record_all){
				echo '<table id="responsive-datatables" class="table table-bordered table-striped table-hover non-responsive mb10" cellspacing="0" width="100%">';
				echo '<thead>';
						echo '<tr>';
							echo '<th colspan="3">' . strtoupper(lang('measurement_dimension')) .'</th>';
						echo '</tr>';
				echo '</thead>';
				echo '<tbody>';
				$strChecker = 0;
				foreach ($get_record_all as $key => $value){
					if ($strChecker == $value['fkidMd']){
						$cntScores = 1;
					}else{
						$cntScores = 0;
					}

					if ($cntScores == 0){
						$cntRows = $value['fkidMd'];
						echo "<tr class='va'>";
							echo "<td colspan='3' class='va'>". _get_record_by_id_build_poa($value['fkidMd'], '','db_b') . "</td>";
						echo '</tr>';
						echo "<tr class='va'>";						
							echo '<td style="width:150px !important;"><strong>' . strtoupper(lang('scoring_scale')) .'</strong></td>';
							echo '<td><strong>' . strtoupper(lang('scoring_criteria')) .'</strong></td>';
							echo '<td style="text-align:center !important; width:150px !important;"><strong>' . strtoupper(lang('action')) . '</strong></td>';
						echo '</tr>';
					}
					$strChecker = $value['fkidMd'];
					$strEditURI = base_url('scoring/update/?id=')  . base64_encode($this->encrypt->encode($value['id']));
					$strViewURI = base_url('scoring/profile/?id=') . base64_encode($this->encrypt->encode($value['id']));
					$strDisableURI = base_url('scoring/update/?a=disable&id=')  . base64_encode($this->encrypt->encode($value['id']));
					$strEnableURI = base_url('scoring/update/?a=enable&id=')  . base64_encode($this->encrypt->encode($value['id']));
					$strDeleteURI = base_url('scoring/update/?a=delete&id=')  . base64_encode($this->encrypt->encode($value['id']));
					echo "<tr class='va'>";
						echo "<td class='va center'><strong>" . strtoupper(_get_fields_by_id('ScoringScales', 'id' ,$value['fkidScore'], array('score'),'','db_b')) . "</strong></td>";
						echo '<td>'.$value['criteria'] . "</td>";						
						echo '<td class="va center"">';
							echo '<div class="btn-group mr0 mb0">';
								echo '<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-arrow-circle-down mr5"></i>' . lang('action') . '</button>';
								echo '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">' . lang('toggle_dropdown') . '</span></button>';
								echo '<ul class="dropdown-menu dropdown-blue-bg">';
									//echo '<li><a href="' . $strViewURI . '"><i class="fa fa-sliders"></i>' . lang('view_').lang('missions').lang('_assigned').lang('_to'). '</a></li>';

										echo '<li><a href="' . $strEditURI . '"><i class="fa fa-edit"></i>' . lang('update_').lang('this_').lang('scoring_criteria') . '</a></li>';
											if($this->user->fkidUserRole > 200){
											if ($value['status'] === '1'){
												echo '<li><a href="' . $strDisableURI . '"><i class="fa fa-lock"></i>' . lang('disable_').lang('this_').lang('scoring_criteria') .'</a></li>';
											}else{
												echo '<li><a href="' . $strEnableURI . '"><i class="fa fa-unlock"></i>' . lang('enable_').lang('this_').lang('scoring_criteria') .'</a></li>';
											}

//												echo '<li><a href="' . $strDeleteURI .'"><i class="fa fa-trash"></i>' . lang('delete_').lang('scoring_criteria') .'</a></li>';
										}
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