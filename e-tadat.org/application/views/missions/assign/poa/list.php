<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

echo '<pre>';
print_r($get_record_all_poas);
echo '</pre>';

echo '<div class="col-md-10">';
	echo '<div class="panel panel-default panel-blue-margin">';
		echo '<div class="panel-heading dark-blue-bg"><h4 class="panel-title mb0"><i class="' . $panel_icon . '"></i>' . strtoupper($panel_title) . '</h4></div>';
			echo '<div class="panel-body">';
			if ($get_record_all_poas){
				echo '<table id="responsive-datatables-poa" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">';
					echo '<thead>';
						echo '<tr>';
							echo '<th>' . strtoupper(lang('performance_indicator')) . '</th>';
							echo '<th style="text-align:center !important">' . strtoupper(lang('instances').lang('_assigned')).'</th>';
							echo '<th style="text-align:center !important">' . strtoupper(lang('_status')).'</th>';							
							echo '<th style="text-align:center !important">' . strtoupper(lang('date').lang('_created')) . '</th>';
							echo '<th class="force-width-145-px" style="text-align:center !important">' . strtoupper(lang('action')) . '</th>';
						echo '</tr>';
					echo '</thead>';
				echo '<tbody>';
				foreach ($get_record_all_poas as $key => $value){
					$strEditURI = base_url('missions/assign/poa/update/?t=mpi&id=')  . base64_encode($this->encrypt->encode($value['id']));
					$strViewURI = base_url('missions/assign/poa/profile/?t=mpi&id=') . base64_encode($this->encrypt->encode($value['id']));
					$strDisableURI = base_url('missions/update/?a=disable&t=mpi&id=')  . base64_encode($this->encrypt->encode($value['id']));
					$strEnableURI = base_url('missions/update/?a=enable&t=mpi&id=')  . base64_encode($this->encrypt->encode($value['id']));
					$strDeleteURI = base_url('missions/update/?a=delete&t=mpi&id=')  . base64_encode($this->encrypt->encode($value['id']));
					echo "<tr class='va'>";
						echo "<td class='va'>POA ". $value['poa_number'] .": ". $value['poa'] . "</td>";
						echo "<td class='va center'>" . _get_record_count_by_id('MissionPoa', 'fkidPoa', $value['id']) . "</td>";
						echo "<td class='va center'>", ($value['status'] === '1')? lang('enabled'): lang('disabled') ,"</td>";
						echo "<td class='va center'>" . date("j F Y",strtotime($value['dateCreated'])). "</td>";
						echo '<td class="va center">';
							echo '<div class="btn-group mr0 mb0">';
								echo '<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-arrow-circle-down mr5"></i>' . lang('action') . '</button>';
								echo '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">' . lang('toggle_dropdown') . '</span></button>';
								echo '<ul class="dropdown-menu dropdown-blue-bg">';
									echo '<li><a href="' . $strViewURI . '"><i class="fa fa-eye"></i>' . lang('view_').lang('missions').lang('_assigned').lang('_to'). '</a></li>';
									if($this->user->fkidUserRole < 4){
									echo '<li><a href="' . $strEditURI . '"><i class="fa fa-pencil"></i>' . lang('update_').lang('this_').lang('performance_indicator') . '</a></li>';																
										if ($value['status'] === '1'){
											echo '<li><a href="' . $strDisableURI . '"><i class="fa fa-ban"></i>' . lang('disable_').lang('this_').lang('performance_indicator') .'</a></li>';
										}else{
											echo '<li><a href="' . $strEnableURI . '"><i class="fa fa-check-circle"></i>' . lang('enable_').lang('this_').lang('performance_indicator') .'</a></li>';
										}
									} 
									if($this->user->fkidUserRole < 2){
										echo '<li><a href="' . $strDeleteURI .'"><i class="fa fa-trash"></i>' . lang('delete_').lang('performance_indicator') .'</a></li>';
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
					echo '<div class="panel-body center">'.lang('no_').lang('users').lang('_found').'!<br/>'.lang('click_').'<a href="'.base_url('users/create').'">'.lang('here').'</a>'.lang('_to_create_a_').lang('user').'</div>';
					echo '</div>';				
				}
	echo '</div> </div> </div> </div>';
?>