<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
			if ($get_record_all){
				echo '<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">';
					echo '<thead>';
						echo '<tr>';
							echo '<th>' . strtoupper(lang('performance_outcome_area')).' - '.strtoupper(lang('evidentiary_documentation').lang('_example')) .'</th>';							
							echo '<th class="force-width-145-px" style="text-align:center !important">' . strtoupper(lang('action')) . '</th>';
						echo '</tr>';
					echo '</thead>';
				echo '<tbody>';
				foreach ($get_record_all as $key => $value){
					$arr = _get_fields_by_id_poa_ev($value['fkidDimension']);	
					$strEditURI = base_url('ev/update/?id=')  . base64_encode($this->encrypt->encode($value['id']));
					$strViewURI = base_url('ev/profile/?id=') . base64_encode($this->encrypt->encode($value['id']));
					$strDisableURI = base_url('ev/update/?a=disable&id=')  . base64_encode($this->encrypt->encode($value['id']));
					$strEnableURI = base_url('ev/update/?a=enable&id=')  . base64_encode($this->encrypt->encode($value['id']));
					$strDeleteURI = base_url('ev/update/?a=delete&id=')  . base64_encode($this->encrypt->encode($value['id']));
					echo "<tr class='va'>";
						echo '<td><strong>POA '.$arr[0]['poa'].'</strong><br>';
						echo $value['evidence'] . "</td>";						
						echo '<td class="va center">';
							echo '<div class="btn-group mr0 mb0">';
								echo '<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-arrow-circle-down mr5"></i>' . lang('action') . '</button>';
								echo '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">' . lang('toggle_dropdown') . '</span></button>';
								echo '<ul class="dropdown-menu dropdown-blue-bg">';
									//echo '<li><a href="' . $strViewURI . '"><i class="fa fa-sliders"></i>' . lang('view_').lang('missions').lang('_assigned').lang('_to'). '</a></li>';
									if($this->user->fkidUserRole < 14){
										echo '<li><a href="' . $strEditURI . '"><i class="fa fa-edit"></i>' . lang('update_').lang('this').lang('_example').'</a></li>';
											if($this->user->fkidUserRole > 200){
											if ($value['status'] === '1'){
												echo '<li><a href="' . $strDisableURI . '"><i class="fa fa-lock"></i>' . lang('disable_').lang('this').lang('_example').'</a></li>';

											}else{
												echo '<li><a href="' . $strEnableURI . '"><i class="fa fa-unlock"></i>' . lang('enable_').lang('this').lang('_example').'</a></li>';

											}

//												echo '<li><a href="' . $strDeleteURI .'"><i class="fa fa-trash"></i>' . lang('delete_').lang('this').lang('_example').'</a></li>';
											 }
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