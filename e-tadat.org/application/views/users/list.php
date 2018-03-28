<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
			if ($get_record_all_users){
				echo '<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">';
					echo '<thead>';
						echo '<tr>';
							echo '<th>' . strtoupper(lang('user').lang('_name')) . '</th>';
							echo '<th>' . strtoupper(lang('user').lang('_role')).'</th>';
							echo '<th>' . strtoupper(lang('city').', '.lang('country').lang('_and_').lang('region')) . '</th>';
							echo '<th style="text-align:center !important">' . strtoupper(lang('_status')).'</th>';							
							echo '<th class="force-width-145-px" style="text-align:center !important">' . strtoupper(lang('action')) . '</th>';
						echo '</tr>';
					echo '</thead>';
				echo '<tbody>';
				foreach ($get_record_all_users as $key => $value){
						$strEditURI = base_url('users/update/?id=')  . base64_encode($this->encrypt->encode($value['id']));
						$strViewURI = base_url('users/profile/?id=') . base64_encode($this->encrypt->encode($value['id']));
						$strDisableURI = base_url('users/update/?a=disable&id=')  . base64_encode($this->encrypt->encode($value['id']));
						$strEnableURI = base_url('users/update/?a=enable&id=')  . base64_encode($this->encrypt->encode($value['id']));
						$strDeleteURI = base_url('users/update/?a=delete&id=')  . base64_encode($this->encrypt->encode($value['id']));
						echo "<tr class='va'>";
							echo "<td class='va'>". _get_fields_by_id('Titles', 'id' ,$value['fkidTitle'], array('title')) . ' ' . $value['name']. ' ' . $value['surname'] . "</td>";
							echo "<td class='va'>" . _get_fields_by_id('UserRoles', 'id' ,$value['fkidUserRole'], array('role')) . "</td>";
							echo "<td class='va'>",$value['city'] . lang('_in_') . _get_fields_by_id('Countries', 'id' ,$value['fkidCountry'], array('country')) . ", " . _get_fields_by_id('Regions', 'id' ,$value['fkidRegion'], array('region')),"</td>";						
							echo "<td class='va center'>", ($value['status'] === '1')? lang('enabled'): lang('disabled') ,"</td>";
							echo '<td class="va center">';
								echo '<div class="btn-group mr0 mb0">';
									echo '<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-arrow-circle-down mr5"></i>' . lang('action') . '</button>';
									echo '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">' . lang('toggle_dropdown') . '</span></button>';
									echo '<ul class="dropdown-menu dropdown-blue-bg">';
										echo '<li><a href="' . $strViewURI . '"><i class="fa fa-user"></i>' . lang('view').lang('_this').lang('_user').lang('_profile'). '</a></li>';
										if($this->user->fkidUserRole < 4){
										echo '<li><a href="' . $strEditURI . '"><i class="fa fa-edit"></i>' . lang('update_').lang('this').lang('_user') . '</a></li>';																
											if ($value['status'] === '1'){
												echo '<li><a href="' . $strDisableURI . '"><i class="fa fa-lock"></i>' . lang('disable_').lang('this').lang('_user') .'</a></li>';
											}else{
												echo '<li><a href="' . $strEnableURI . '"><i class="fa fa-unlock"></i>' . lang('enable_').lang('this').lang('_user') .'</a></li>';
											}
										} 
										if($this->user->fkidUserRole < 2){
	//										echo '<li><a href="' . $strDeleteURI .'"><i class="fa fa-trash"></i>' . lang('delete_').lang('this').lang('_user') .'</a></li>';
										 } 								
									echo '</ul>';
								echo '</div>';
							echo '</td>';
						echo '</tr>';
				}
				echo '</tbody>';
				echo '</table>';
				}else{
					echo '<div class="panel panel-info panelClose form-error">';
					echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>'.strtoupper(lang('no_').lang('users').lang('_found')).'</h4></div>';
					echo '<div class="panel-body center">'.lang('click_').'<a href="'.base_url('users/create').'">'.lang('here').'</a>'.lang('_to_create_a_').lang('user').'</div>';
					echo '</div>';				
				}
?>