<?php defined('BASEPATH') OR exit('No direct script access allowed');  ?>
<div class="row" style="margin:0px !important; margin-top:15px !important">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl5 pr5">
		<div class="panel panel-default panel-blue-margin mb0">
			<div class="panel-heading dark-blue-bg" id="id-custom-panel-bg"><h4 class="panel-title mb0"><i class="fa fa-graduation-cap"></i><?php echo (!empty($this->panel_title)) ? strtoupper($this->panel_title) : '';?></h4></div>
			<div class="panel-body">
				<?php
				
$json_string_payload = '{"payload_type":"single_user_test_results_link","payload_status":"live","test":{"test_id":"722837","test_name":"DEVELOPER TEST - DO NOT ALTER"},"link":{"link_id":"345868","link_name":"DEVELOPER TEST LINK","link_url_id":"txr5826e818942e1"},"result":{"link_result_id":"16318365","first":"","last":"","email":"","percentage":50,"points_scored":"1.0","points_available":"2.0","requires_grading":"No","time_started":"1479370527","time_finished":"1479370541","duration":"00:00:14","percentage_passmark":"0","passed":true,"feedback":"","give_certificate_only_when_passed":"","certificate_url":"","access_code_question":"","access_code_used":"","extra_info_question":"","extra_info_answer":"","extra_info2_question":"","extra_info2_answer":"","extra_info3_question":"","extra_info3_answer":"","extra_info4_question":"","extra_info4_answer":"","extra_info5_question":"","extra_info5_answer":"","cm_user_id":"1iframe=1","ip_address":"196.34.18.253"}}';
$array_payload = json_decode($json_string_payload, true);				
_show_array($array_payload);

				
				
				
				
					if ($get_record_workshop_test_result){
						echo '<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">';
							echo '<thead>';
								echo '<tr>';
									echo '<th class="w250">WORKSHOP ATTENDEE</th>';
									echo '<th>TEST TAKEN</th>';
									echo '<th style="width:50px !important;">SCORE</th>';							
									echo '<th style="width:50px !important;">STATUS</th>';
									echo '<th style="width:200px !important;">TEST DURATION</th>';							
									echo '<th style="width:200px !important;">COMPLETED ON</th>';							
								echo '</tr>';
							echo '</thead>';
						echo '<tbody>';
						foreach ($get_record_workshop_test_result as $key => $value){
							if($value['test_status'] == 'f'){
								$test_status = 'Completed';
							}else{
								$test_status = 'In Progress';							
							}

							echo "<tr class='va'>";
								echo "<td class='va'>" . $value['title']. ' ' . $value['name'] . ' ' . $value['surname'] . "</td>";
								echo "<td class='va'>" . $value['test_name'] . "</td>";
								echo "<td style='text-align:center !important' class='va'>" . $value['percentage'] . "%</td>";						
								echo "<td class='va'>" . $test_status . "</td>";
								echo "<td class='va'>" . $value['duration'] . "</td>";
								echo "<td class='va'>" . date('l j F Y', $value['time_finished']) . "</td>";												
				
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