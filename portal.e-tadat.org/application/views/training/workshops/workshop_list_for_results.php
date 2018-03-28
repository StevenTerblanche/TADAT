<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row" style="margin:0px !important; margin-top:15px !important">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl5 pr5">
		<div class="panel panel-default panel-blue-margin mb0">
			<div class="panel-heading dark-blue-bg" id="id-custom-panel-bg"><h4 class="panel-title mb0"><i class="<?php echo (!empty($this->panel_icon)) ? $this->panel_icon : '';?>"></i><?php echo (!empty($this->panel_title)) ? strtoupper($this->panel_title) : '';?></h4></div>
			<div class="panel-body">
				<?php
				//_show_array($get_record_all_workshops);
					if ($get_record_all_workshops){
						echo '<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">';
							echo '<thead>';
								echo '<tr>';
									echo '<th>' . strtoupper(lang('workshop') .' '. lang('name')) . '</th>';
									echo '<th>' . strtoupper(lang('workshop') .' '. lang('type')).'</th>';
									echo '<th>' . strtoupper(lang('start').' '.lang('date').' '.lang('and').' '.lang('time')) . '</th>';
									echo '<th>' . strtoupper(lang('end').' '.lang('date').' '.lang('and').' '.lang('time')) . '</th>';
									echo '<th>' . strtoupper(lang('city').', '.lang('country').lang('_and_').lang('region')) . '</th>';
									echo '<th style="text-align:center !important">' . strtoupper(lang('_status')).'</th>';							
									echo '<th class="force-width-145-px" style="text-align:center !important">' . strtoupper(lang('action')) . '</th>';
								echo '</tr>';
							echo '</thead>';
						echo '<tbody>';
						foreach ($get_record_all_workshops as $key => $value){
								$strWorkshopResultsURI = base_url('workshops/completed/results/?id=')  . base64_encode($this->encrypt->encode($value['id']));
								$strViewURI = base_url('users/profile/?id=') . base64_encode($this->encrypt->encode($value['id']));
								$strAddAttendeesURI = base_url('workshops/invite/?id=') . base64_encode($this->encrypt->encode($value['id']));								
								$strDisableURI = base_url('users/update/?a=disable&id=')  . base64_encode($this->encrypt->encode($value['id']));
								$strEnableURI = base_url('users/update/?a=enable&id=')  . base64_encode($this->encrypt->encode($value['id']));
								$strDeleteURI = base_url('users/update/?a=delete&id=')  . base64_encode($this->encrypt->encode($value['id']));
								/* WORKSHOP STATUS*/
								if($value['status'] === '1'){
									$workshopStatus = 'Scheduled';
								}else if($value['status'] === '2'){
									$workshopStatus = 'Completed';
								}else{
									$workshopStatus = 'Disabled';
								}
								echo "<tr class='va'>";
									echo "<td class='va'>". $value['WorkshopName']."</td>";
									echo "<td class='va'>"._global_get_fields_by_id('WorkshopTypes', 'id', $value['WorkshopTypeFkId'], $out = array('WorkshopType'), null, 'db_training', $numRecords = null)."</td>";							
									echo "<td class='va'>". $value['WorkshopStartDate']. " at ".$value['WorkshopStartTime']."</td>";
									echo "<td class='va'>". $value['WorkshopEndDate']. " at ".$value['WorkshopEndTime']."</td>";
									echo "<td class='va'>".$value['WorkshopCity'].", "._global_get_fields_by_id('Countries', 'id', $value['WorkshopCountryFkId'], $out = array('country'), null, 'db_portal', $numRecords = null).", "._global_get_fields_by_id('Regions', 'id', $value['WorkshopRegionFkId'], $out = array('region'), null, 'db_portal', $numRecords = null)."</td>";							
									echo "<td class='va center'>" .$workshopStatus."</td>";
									echo '<td class="va center">';
										echo '<div class="btn-group mr0 mb0">';
											echo '<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-arrow-circle-down mr5"></i>' . lang('action') . '</button>';
											echo '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">' . lang('toggle_dropdown') . '</span></button>';
											echo '<ul class="dropdown-menu dropdown-blue-bg">';
												echo '<li><a href="'.$strWorkshopResultsURI.'"><i class="fa fa-th-list"></i>View Results</a></li>';
											echo '</ul>';
										echo '</div>';
									echo '</td>';
								echo '</tr>';
						}
						echo '</tbody>';
						echo '</table>';
					}else{
						echo '<div class="panel panel-info panelClose form-error">';
						echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>'.strtoupper(lang('no_').'Workshops'.lang('_found')).'</h4></div>';
						echo '<div class="panel-body center">'.lang('click_').'<a href="'.base_url('workshops/schedule').'">'.lang('here').'</a>'.lang('_to_create_a_').'Workshop'.'</div>';
						echo '</div>';				
					}
				?>
			</div>
		</div>
	</div>
</div>