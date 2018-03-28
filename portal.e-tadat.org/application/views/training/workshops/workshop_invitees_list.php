<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row" style="margin:0px !important; margin-top:15px !important">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl5 pr5">
		<div class="panel panel-default panel-blue-margin mb0">
			<div class="panel-heading dark-blue-bg" id="id-custom-panel-bg"><h4 class="panel-title mb0"><i class="<?php echo (!empty($this->panel_icon)) ? $this->panel_icon : '';?>"></i><?php echo (!empty($this->panel_title)) ? strtoupper($this->panel_title) : '';?></h4></div>
			<div class="panel-body">
				<?php
				
					if ($get_record_all_workshop_invitees){
						echo '<table id="workshop-invitees-responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">';
							echo '<thead>';
								echo '<tr>';
									echo '<th style="text-align:center !important; width:180px !important">REFERENCE NUMBER</th>';
									echo '<th>TRAINING APPLICANT</th>';
									echo '<th style="width:250px !important">E-MAIL ADDRESS</th>';									
									echo '<th style="text-align:center !important; width:160px !important">DATE INVITED</th>';									
									echo '<th style="text-align:center !important; width:160px !important">STATUS</th>';									
									//echo '<th class="force-width-145-px" style="text-align:center !important">' . strtoupper(lang('action')) . '</th>';
								echo '</tr>';
							echo '</thead>';
						echo '<tbody>';
						foreach ($get_record_all_workshop_invitees as $key => $value){
								$workshopId = $value['WorkshopFkId'];
								if($value['acceptanceStatus'] ==='0'){
									$inviteeStatus = 'Awaiting Response';
								}elseif($value['acceptanceStatus'] ==='1'){
									$inviteeStatus = 'Accepted';
								}else{
									$inviteeStatus = 'Declined';
								}

								$strViewURI = base_url('users/awaiting/approval/profile/?id=') . base64_encode($this->encrypt->encode($value['id']));
								$strDisableURI = base_url('users/update/?a=disable&id=')  . base64_encode($this->encrypt->encode($value['id']));
								$strEnableURI = base_url('users/update/?a=enable&id=')  . base64_encode($this->encrypt->encode($value['id']));
								$strDeleteURI = base_url('users/update/?a=delete&id=')  . base64_encode($this->encrypt->encode($value['id']));
								echo "<tr class='va'>";

									echo "<td class='va' style='text-align:center !important;'>". $value['referenceNumber']."</td>";
									echo "<td class='va'>". _global_get_fields_by_id('Titles', 'id', $value['fkidTitle'], $out = array('title'), null, 'db_portal', $numRecords = null) .' '. $value['name'] . ' '. $value['surname']."</td>";
									echo "<td class='va'>". $value['email']."</td>";
									echo "<td class='va'>". $value['dateCreated']."</td>";
									echo "<td class='va'>". $inviteeStatus."</td>";																		
									/*
									echo '<td class="va center">';
										echo '<div class="btn-group mr0 mb0">';
											echo '<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-arrow-circle-down mr5"></i>' . lang('action') . '</button>';
											echo '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">' . lang('toggle_dropdown') . '</span></button>';
											echo '<ul class="dropdown-menu dropdown-blue-bg">';
												echo '<li><a href="'.$strViewURI.'"><i class="fa fa-th-list"></i>View Applicant Profile</a></li>';
											echo '</ul>';
										echo '</div>';
									echo '</td>';
									*/
								echo '</tr>';
						}
						echo '</tbody>';
						echo '</table>';
						$strAddAttendeesURI = base_url('workshops/invite/?id=') . base64_encode($this->encrypt->encode($workshopId));

						echo '<div style="margin:auto; text-align:center"><a href="'.$strAddAttendeesURI.'" class="btn btn-primary" role="button"><i class="fa fa-user"></i> Add another Attendee</a></div>';

					}else{
						echo '<div class="panel panel-info panelClose form-error">';
						echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>NO INVITEES CURRENTLY FOUND</h4></div>';
						echo '<div class="panel-body center">'.lang('click_').'<a href="'.base_url('training/dashboard').'">'.lang('here').' to return to the Training Dashboard.</a>'.'</div>';
						echo '<div class="panel-body center"></div>';						
						echo '</div>';				
					}

				?>
			</div>
		</div>
	</div>
</div>