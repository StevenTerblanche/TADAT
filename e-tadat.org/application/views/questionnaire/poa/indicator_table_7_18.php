<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
	if(isset($this->action) && ($this->action === 'update' || $this->action === 'save' || $this->action === 'completed')){
		foreach($get_record_by_id as $field => $value){$$field = $value;}
	}elseif($this->input->post()){
		foreach($this->input->post() as $field => $value){$$field = $value;}
	}else{
		foreach($get_fields as $field){$$field = '';}
	}
	if(isset($this->action) && $this->action === 'completed'){
		$strFieldsetStatus = '';
//		$strFieldsetStatus = 'disabled="disabled"';
	}else{
		$strFieldsetStatus = '';
	}
	$counter = array();
	echo $this->load->view('upload/upload_dialog', '', true);
	$statusClass = 'question-red-panel';
	echo form_open($uri, array('class'=>'form-horizontal', 'id'=>'form-submit')); 
?>


<div class="tabs inside-panel">
	<ul id="myTabs" class="nav nav-tabs">
		<li class="active"><a href="#dimension_a" data-toggle="tab"><strong>DIMENSION 1</strong></a></li>
		<li class=""><a id="uploader" href="#uploaded" data-url="https://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--START TAB PANEL -->
		<div class="tab-pane active in fade text-muted" id="dimension_a">
			<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '7.18.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
			
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_7_18_1_1, 'dimension_7_18_1_1', 'a', 'a1', '7.18.1.1 Does the tax administration routinely monitor the time taken to determine objections?');?>
								<?php

									//$process_refunds = _get_field_by_id_single_row('db_b','pmq_table_10', 'fkidMission', $this->session->userdata('mission_id'), 'process_refunds', $numRecords = null);
									//$process_returns = _get_field_by_id_single_row('db_b','pmq_table_10', 'fkidMission', $this->session->userdata('mission_id'), 'process_returns', $numRecords = null);
									$process_objections = _get_field_by_id_single_row('db_b','pmq_table_10', 'fkidMission', $this->session->userdata('mission_id'), 'process_objections', $numRecords = null);
									//$process_correspond = _get_field_by_id_single_row('db_b','pmq_table_10', 'fkidMission', $this->session->userdata('mission_id'), 'process_correspond', $numRecords = null);									
									//$process_refunds = ($process_refunds != 0)? number_format($process_refunds,0).'%' : 'Not Recorded';
									//$process_returns = ($process_returns != 0)? number_format($process_returns,0).'%' : 'Not Recorded';
									$process_objections = ($process_objections != 0)? number_format($process_objections,0).'%' : 'Not Recorded';
									//$process_correspond = ($process_correspond != 0)? number_format($process_correspond,0).'%' : 'Not Recorded';																											

								?>
								<div class="answer-wrapper">
									<table class="table table-bordered table-striped" style="width:400px !important">
									<tr>
										<th>Procerssing Standard</th>
										<th class="center">Actual Result<sup>1</sup></th>
									</tr>
									<tr>
										<td>Processing of Objections</td>
										<td class="center"><?php echo $process_objections;?></td>
									</tr>
									</table>
									<p style="font-size:10px; font-style:italic">Note: <sup>1</sup>Actual result (Percentage of total cases where 30-day standard was met).</p>
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_7_18_1_1, 'dimension_7_18_1_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_7_18_1_1, 'dimension_7_18_1_1', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($dimension_7_18_1_1_notes, 'dimension_7_18_1_1_notes');?>
						<?php end_accordion_panel();?>
						<!--END ACCORDION -->			
						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_7_18_1_2, 'dimension_7_18_1_2', 'a', 'a2', '7.18.1.2 What percent of objections is processed within 30 calendar days?');?>
								<?php

									//$process_refunds = _get_field_by_id_single_row('db_b','pmq_table_10', 'fkidMission', $this->session->userdata('mission_id'), 'process_refunds', $numRecords = null);
									//$process_returns = _get_field_by_id_single_row('db_b','pmq_table_10', 'fkidMission', $this->session->userdata('mission_id'), 'process_returns', $numRecords = null);
									$process_objections = _get_field_by_id_single_row('db_b','pmq_table_10', 'fkidMission', $this->session->userdata('mission_id'), 'process_objections', $numRecords = null);
									//$process_correspond = _get_field_by_id_single_row('db_b','pmq_table_10', 'fkidMission', $this->session->userdata('mission_id'), 'process_correspond', $numRecords = null);									
									//$process_refunds = ($process_refunds != 0)? number_format($process_refunds,0).'%' : 'Not Recorded';
									//$process_returns = ($process_returns != 0)? number_format($process_returns,0).'%' : 'Not Recorded';
									$process_objections = ($process_objections != 0)? number_format($process_objections,0).'%' : 'Not Recorded';
									$dimension_7_18_1_3 = $process_objections;
									echo form_hidden('dimension_7_18_1_3', $dimension_7_18_1_3);
									//$process_correspond = ($process_correspond != 0)? number_format($process_correspond,0).'%' : 'Not Recorded';

								?>
								<div class="answer-wrapper">
									<p>The Tax Administration indicated that the ratio of objections processed within the 30-day standard is <strong><?php echo $process_objections; ?></strong>.</p>
									<p>Does your research confirm these findings?</p>
								</div>									
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_7_18_1_2, 'dimension_7_18_1_2', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_7_18_1_2, 'dimension_7_18_1_2', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($dimension_7_18_1_2_notes, 'dimension_7_18_1_2_notes');?>
						<?php end_accordion_panel();?>
						<!--END ACCORDION -->			
						
					</div>
					<!--END ACCORDION PANEL -->
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->


	
		<div class="tab-pane fade text-muted" id="uploaded"></div>
	</div>
	<div class="saving" style="display:none">SAVING TO DATABASE...</div>
</div>

<?php // if($this->action !== 'completed'){?>
	<div class="form-group mt15">
		<div class="col-xs-12" style="text-align:center !important;">
			<button type="button" id="save_button" class="btn btn-success white-text" formnovalidate><i class="fa fa-save mr5"></i><?php echo $save_button; ?></button>
			<button type="submit" id="submit_button" class="btn btn-primary white-text"><i class="fa fa-check-circle mr5"></i><?php echo $submit_button; ?></button>
		</div>
	</div>
<?php //}	?>
<?php echo form_close();?>
</div>