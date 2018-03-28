<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

			if ($get_record_all_missions){
				echo '<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">';
					echo '<thead>';
						echo '<tr>';
							echo '<th>' . strtoupper(lang('mission')) . '</th>';
							echo '<th>' . strtoupper(lang('mission').lang('_status')).'</th>';							
							echo '<th style="text-align:center !important">' . strtoupper(lang('start_').lang('date')) . '</th>';
							echo '<th style="text-align:center !important">' . strtoupper(lang('end_').lang('date')) . '</th>';							
//							echo '<th>' . strtoupper(lang('revenue_authority')).'</th>';
							echo '<th class="force-width-145-px">' . strtoupper(lang('action')) . '</th>';
						echo '</tr>';
					echo '</thead>';
				echo '<tbody>';
				foreach ($get_record_all_missions as $key => $value){
					$strEditURI = base_url('missions/update/?id=')  . base64_encode($this->encrypt->encode($value['id']));
					$strViewURI = base_url('missions/profile/?id=') . base64_encode($this->encrypt->encode($value['id']));
					$strManageURI = base_url('questions/introduction/?id=') . base64_encode($this->encrypt->encode($value['id']));
					$strDisableURI = base_url('missions/update/?a=disable&id=')  . base64_encode($this->encrypt->encode($value['id']));
					$strEnableURI = base_url('missions/update/?a=enable&id=')  . base64_encode($this->encrypt->encode($value['id']));
					$strDeleteURI = base_url('missions/update/?a=delete&id=')  . base64_encode($this->encrypt->encode($value['id']));
					$strChartURI = base_url('chart/?id=')  . base64_encode($this->encrypt->encode($value['id']));
					$strParURI = base_url('reporting/toc/?id=')  . base64_encode($this->encrypt->encode($value['id']));
					$strGenerateParURI = base_url('reporting/pdf/?id=')  . base64_encode($this->encrypt->encode($value['id']));	
										
					
					echo "<tr class='va'>";
						echo "<td class='va w275'>" . $value['mission']. "</td>";
						echo "<td class='va'>"._global_get_fields_by_id('MissionStatus', 'id' ,$value['fkidMissionStatus'], array('status', ' '),null,'db_cloud_main')."</td>";
						echo "<td class='va center'>" . date("j F Y",strtotime($value['dateStart'])). "</td>";
						echo "<td class='va center'>" . date("j F Y",strtotime($value['dateEnd'])). "</td>";
			//			echo "<td class='va'>"._get_fields_by_id('RevenueAuthorities', 'id' ,$value['fkidRevenueAuthority'], array('authority', ' '))."</td>";
						echo '<td class="va center">';
							echo '<div class="btn-group mr0 mb0">';
								echo '<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-arrow-circle-down mr5"></i>' . lang('action') . '</button>';
								echo '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">' . lang('toggle_dropdown') . '</span></button>';
								echo '<ul class="dropdown-menu dropdown-blue-bg">';
									echo '<li><a href="' . $strManageURI . '"><i class="fa fa-globe"></i>' . lang('manage').lang('_this').lang('_mission'). '</a></li>';
									echo '<li><a href="' . $strViewURI . '"><i class="fa fa-globe"></i>' . lang('view').lang('_this').lang('_mission').lang('_profile'). '</a></li>';
									if($this->user->fkidUserRole == 1 || $this->user->fkidUserRole == 2 || $this->user->fkidUserRole == 4){
//										echo '<li><a href="' . $strEditURI . '"><i class="fa fa-edit"></i>' . lang('update_').lang('_this').lang('_mission') . '</a></li>';																
									}
									if($this->user->fkidUserRole == 1 || $this->user->fkidUserRole == 4 || $this->user->fkidUserRole == 5 || $this->user->fkidUserRole == 2){

/*
										if ($value['status'] === '1'){
											echo '<li><a href="' . $strDisableURI . '"><i class="fa fa-lock"></i>' . lang('disable_').lang('_this').lang('_mission') .'</a></li>';
										}else{
											echo '<li><a href="' . $strEnableURI . '"><i class="fa fa-unlock"></i>' . lang('enable_').lang('_this').lang('_mission') .'</a></li>';
										}
										*/
//										echo '<li><a href="' . $strDeleteURI .'"><i class="fa fa-trash"></i>' . lang('delete_').lang('mission') .'</a></li>';
										echo '<li><a href="' . $strChartURI . '"><i class="fa  fa-sitemap"></i>View Spider Diagram</a></li>';										
										echo '<li><a href="' . $strParURI . '"><i class="fa  fa-sitemap"></i>View Draft PAR</a></li>';
										echo '<li><a href="' . $strGenerateParURI. '"><i class="fa  fa-sitemap"></i>Generate Draft PAR</a></li>';
										
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
					echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>' . strtoupper(lang('no_').lang('missions').lang('_found')).'</h4></div>';					
					if($this->user->fkidUserRole == 1 || $this->user->fkidUserRole == 2){
						echo '<div class="panel-body center">'.lang('click_').'<a href="'.base_url('missions/create').'">'.lang('here').'</a>'.lang('_to_create_a_').lang('mission').'</div>';
					}else{
						echo '<div class="panel-body center"></div>';	
					}
					echo '</div>';				
				}
?>