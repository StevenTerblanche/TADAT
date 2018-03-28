<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row" style="margin:0px !important; margin-top:15px !important">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl5 pr5">
		<div class="panel panel-default panel-blue-margin mb0">
			<div class="panel-heading dark-blue-bg" id="id-custom-panel-bg"><h4 class="panel-title mb0"><i class="<?php echo (!empty($this->panel_icon)) ? $this->panel_icon : '';?>"></i><?php echo (!empty($this->panel_title)) ? strtoupper($this->panel_title) : '';?></h4></div>
			<div class="panel-body">
				<?php
				
//_show_array($get_record_all_awaiting_approval);

					if ($get_record_all_awaiting_approval){
						echo '<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">';
							echo '<thead>';
								echo '<tr>';
									echo '<th style="text-align:center !important; width:170px !important">REFERENCE NUMBER</th>';
									echo '<th>USER</th>';
									echo '<th>COUNTRY</th>';
									echo '<th>E-MAIL ADDRESS</th>';									
									echo '<th style="text-align:center !important; width:140px !important">DATE REGISTERED</th>';									
									echo '<th>APPLIED AS</th>';
									echo '<th style="text-align:center !important; width:140px !important">STATUS</th>';									
									echo '<th class="force-width-145-px" style="text-align:center !important">' . strtoupper(lang('action')) . '</th>';
								echo '</tr>';
							echo '</thead>';
						echo '<tbody>';
						foreach ($get_record_all_awaiting_approval as $key => $value){
								$strViewURI = base_url('users/awaiting/approval/profile/?id=') . base64_encode($this->encrypt->encode($value['id']));
								$strEditURI = base_url('users/awaiting/approval/profile/edit/?id=') . base64_encode($this->encrypt->encode($value['id']));								
								
								$strDisableURI = base_url('users/update/?a=disable&id=')  . base64_encode($this->encrypt->encode($value['id']));
								$strEnableURI = base_url('users/update/?a=enable&id=')  . base64_encode($this->encrypt->encode($value['id']));
								$strDeleteURI = base_url('users/update/?a=delete&id=')  . base64_encode($this->encrypt->encode($value['id']));
								echo "<tr class='va'>";

									echo "<td class='va'>". $value['referenceNumber']."</td>";
									echo "<td class='va'>". $value['title'] .' '. $value['name'] . ' '. $value['surname']."</td>";
									echo "<td class='va'>". $value['country']."</td>";
									echo "<td class='va'>". $value['email']."</td>";
									echo "<td class='va'>". $value['dateCreated']."</td>";
									echo "<td class='va'>". $value['role']."</td>";
									echo "<td class='va'>". $value['status']."</td>";																		
//									echo "<td class='va'>"._global_get_fields_by_id('WorkshopTypes', 'id', $value['WorkshopTypeFkId'], $out = array('WorkshopType'), null, 'db_training', $numRecords = null)."</td>";							
//									echo "<td class='va'>". $value['WorkshopStartDate']. " at ".$value['WorkshopStartTime']."</td>";

//									echo "<td class='va'>".$value['WorkshopCity'].", "._global_get_fields_by_id('Countries', 'id', $value['WorkshopCountryFkId'], $out = array('country'), null, 'db_portal', $numRecords = null).", "._global_get_fields_by_id('Regions', 'id', $value['WorkshopRegionFkId'], $out = array('region'), null, 'db_portal', $numRecords = null)."</td>";							
//									echo "<td class='va center'>", ($value['status'] === '1')? lang('enabled'): lang('disabled') ,"</td>";
									echo '<td class="va center">';
										echo '<div class="btn-group mr0 mb0">';
											echo '<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-arrow-circle-down mr5"></i>' . lang('action') . '</button>';
											echo '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">' . lang('toggle_dropdown') . '</span></button>';
											echo '<ul class="dropdown-menu dropdown-blue-bg">';
												echo '<li><a href="'.$strViewURI.'"><i class="fa fa-th-list"></i>View Applicant Profile</a></li>';
												echo '<li><a href="'.$strEditURI.'"><i class="fa fa-th-list"></i>Edit Applicant Profile</a></li>';												
											echo '</ul>';
										echo '</div>';
									echo '</td>';
								echo '</tr>';
						}
						echo '</tbody>';
						echo '</table>';
					}else{
						echo '<div class="panel panel-info panelClose form-error">';
						echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>NO TRAINEES CURRENTLY FOUND</h4></div>';
						echo '<div class="panel-body center">'.lang('click_').'<a href="'.base_url('training/dashboard').'">'.lang('here').' to return to the Training Dashboard.</a>'.'</div>';
						echo '<div class="panel-body center"></div>';						
						echo '</div>';				
					}

				?>
			</div>
		</div>
	</div>
</div>