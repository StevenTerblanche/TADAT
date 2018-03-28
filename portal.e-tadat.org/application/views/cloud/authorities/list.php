<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
			if ($get_record_all_rev_auth){
				echo '<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">';
					echo '<thead>';
						echo '<tr>';
							echo '<th class="w250">' . strtoupper(lang('revenue_authorities')) . '</th>';
							echo '<th>' . strtoupper(lang('city').', '.lang('country').lang('_and_').lang('region')) . '</th>';
							echo '<th>' . strtoupper(lang('authority').lang('_contact')).'</th>';
							echo '<th style="text-align:center !important">' . strtoupper(lang('_status')).'</th>';							
							echo '<th class="force-width-145-px" style="text-align:center !important">' . strtoupper(lang('action')) . '</th>';
						echo '</tr>';
					echo '</thead>';
				echo '<tbody>';
				foreach ($get_record_all_rev_auth as $key => $value){
					$strEditURI = base_url('authorities/update/?id=')  . base64_encode($this->encrypt->encode($value['id']));
					$strViewURI = base_url('authorities/profile/?id=') . base64_encode($this->encrypt->encode($value['id']));
					$strDisableURI = base_url('authorities/update/?a=disable&id=')  . base64_encode($this->encrypt->encode($value['id']));
					$strEnableURI = base_url('authorities/update/?a=enable&id=')  . base64_encode($this->encrypt->encode($value['id']));
					$strDeleteURI = base_url('authorities/update/?a=delete&id=')  . base64_encode($this->encrypt->encode($value['id']));
					echo "<tr class='va'>";
						echo "<td class='va'>". $value['authority']. "</td>";
						echo "<td class='va'>",$value['city'],($value['fkidState'] !== '0') ? ', '. _global_get_fields_by_id('FederalStates', 'id' ,$value['fkidState'], array('state'),null,'db_portal') : '',' in ', _global_get_fields_by_id('Countries', 'id' ,$value['fkidCountry'], array('country'),null,'db_portal'),", ",_global_get_fields_by_id('Regions', 'id' ,$value['fkidRegion'], array('region'),null,'db_portal'),"</td>";
						if($value['fkidCounterpart'] != 0){
							echo "<td class='va'>"._global_get_fields_by_id('Users', 'id' ,$value['fkidCounterpart'], array('title', 'name', 'surname'), ' ','db_portal')."</td>";
						}else{
							echo "<td class='va'>"._global_get_fields_by_id('Users', 'id' ,$value['fkidUser'], array('title', 'name', 'surname'), ' ','db_portal')."</td>";
						}
						echo "<td class='va center'>", ($value['status'] === '1')? lang('enabled'): lang('disabled') ,"</td>";
						echo '<td class="va center">';
							echo '<div class="btn-group mr0 mb0">';
								echo '<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-arrow-circle-down mr5"></i>' . lang('action') . '</button>';
								echo '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">' . lang('toggle_dropdown') . '</span></button>';
								echo '<ul class="dropdown-menu dropdown-blue-bg">';
									echo '<li><a href="' . $strViewURI . '"><i class="fa fa-bank"></i>' . lang('view').lang('_this').lang('_revenue_authority'). '</a></li>';

									echo '<li><a href="' . $strEditURI . '"><i class="fa fa-edit"></i>' . lang('update_').lang('revenue_authority') . '</a></li>';																

									if($this->user->fkidUserRole > 200){
										if ($value['status'] === '1'){
										echo '<li><a href="' . $strDisableURI . '"><i class="fa fa-lock"></i>' . lang('disable_').lang('revenue_authority') .'</a></li>';
											}else{
											echo '<li><a href="' . $strEnableURI . '"><i class="fa fa-unlock"></i>' . lang('enable_').lang('revenue_authority') .'</a></li>';
										}


										echo '<li><a href="' . $strDeleteURI .'"><i class="fa fa-trash"></i>' . lang('delete_').lang('revenue_authority') .'</a></li>';
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
					echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>'.strtoupper(lang('no_').lang('revenue_authorities').lang('_found')).'</h4></div>';
					echo '<div class="panel-body center">'.lang('click_').'<a href="'.base_url('authorities/create').'">'.lang('here').'</a>'.lang('_to_create_a_').lang('revenue_authority').'</div>';
					echo '</div>';				
				}
?>