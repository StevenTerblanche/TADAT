<?php defined('BASEPATH') OR exit('No direct script access allowed');  ?>
<div class="row" style="margin:0px !important; margin-top:15px !important">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl5 pr5">
<?
	if ($get_record_workshop_test_result_by_id){
		$workshopName = $get_record_workshop_test_result_by_id[0]['WorkshopName'];
	}else{$workshopName = '';}

?>
		<div class="panel panel-default panel-blue-margin mb0">
			<div class="panel-heading dark-blue-bg" id="id-custom-panel-bg"><h4 class="panel-title mb0"><i class="fa fa-graduation-cap"></i><?php echo (!empty($this->panel_title)) ? strtoupper($this->panel_title.' FOR '.$workshopName) : '';?></h4></div>
			<div class="panel-body">
				<?php
					if ($get_record_workshop_test_result_by_id){
						echo '<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">';
							echo '<thead>';
								echo '<tr>';
									echo '<th class="w250">WORKSHOP ATTENDEE</th>';
									echo '<th>TEST TAKEN</th>';
									echo '<th style="width:50px !important;">SCORE</th>';							
									echo '<th style="width:50px !important;">STATUS</th>';
									echo '<th style="width:200px !important;">TEST DURATION</th>';							
									echo '<th style="width:200px !important;">COMPLETED ON</th>';
									echo '<th class="force-width-145-px" style="text-align:center !important">' . strtoupper(lang('action')) . '</th>';									
								echo '</tr>';
							echo '</thead>';
						echo '<tbody>';
						foreach ($get_record_workshop_test_result_by_id as $key => $value){
							$strCertificateURI = base_url('workshop/certificate/?id=') . base64_encode($this->encrypt->encode($value['id']));
							if($value['test_status'] == 'f'){
								$test_status = 'Completed';
							}else{
								$test_status = 'In Progress';							
							}
							if($value['percentage'] >= $value['WorkshopPassmark']){
								$link_status = 1;
							}else{
								$link_status = 0;
							}
							echo "<tr class='va'>";
								echo "<td class='va'>" . $value['title']. ' ' . $value['name'] . ' ' . $value['surname'] . "</td>";
								echo "<td class='va'>" . $value['test_name'] . "</td>";
								echo "<td style='text-align:center !important' class='va'>" . $value['percentage'] . "%</td>";						
								echo "<td class='va'>" . $test_status . "</td>";
								echo "<td class='va'>" . $value['duration'] . "</td>";
								echo "<td class='va'>" . date('l j F Y', $value['time_finished']) . "</td>";
								echo '<td class="va center">';
									echo '<div class="btn-group mr0 mb0">';
										echo '<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-arrow-circle-down mr5"></i>' . lang('action') . '</button>';
										echo '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">' . lang('toggle_dropdown') . '</span></button>';
										echo '<ul class="dropdown-menu dropdown-blue-bg">';
											if($link_status == 1){
												echo '<li><a href="'.$strCertificateURI.'"><i class="fa fa-th-list"></i>View Certificate</a></li>';
											}else{
												echo '<li><a href="#"><i class="fa fa-th-list"></i>No Certificate Achieved</a></li>';
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
							echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>'.strtoupper(lang('no_').lang('workshop_results').lang('_found')).'</h4></div>';
							echo '<div class="panel-body center">'.lang('click_').'<a href="'.base_url('workshops/schedule').'">'.lang('here').'</a>'.lang('_to_create_a_').lang('workshop').'</div>';
							echo '</div>';				
						}
				?>
			</div>
		</div>
	</div>
</div>