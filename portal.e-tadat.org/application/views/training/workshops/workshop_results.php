<?php defined('BASEPATH') OR exit('No direct script access allowed');  ?>
<div class="row" style="margin:0px !important; margin-top:15px !important">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl5 pr5">
		<div class="panel panel-default panel-blue-margin mb0">
			<div class="panel-heading dark-blue-bg" id="id-custom-panel-bg"><h4 class="panel-title mb0"><i class="fa fa-graduation-cap"></i><?php echo (!empty($this->panel_title)) ? strtoupper($this->panel_title) : '';?></h4></div>
			<div class="panel-body">
				<?php
					if (isset($get_classmarker_results)){
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
						foreach ($get_classmarker_results as $key => $value){
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