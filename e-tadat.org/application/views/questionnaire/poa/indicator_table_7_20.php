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
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '7.20.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<?php start_accordion_panel($strFieldsetStatus, $dimension_7_20_1_1, 'dimension_7_20_1_1', 'a', 'a1', '7.20.1.1 Does the tax administration regularly monitor (e.g., monthly) the time taken to complete administrative reviews.?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_7_20_1_1, 'dimension_7_20_1_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_7_20_1_1, 'dimension_7_20_1_1', '1', 'No');?>
									</div>														
								</div>
								<?php form_create_notes_tadat($dimension_7_20_1_1_notes, 'dimension_7_20_1_1_notes');?>								
						<?php end_accordion_panel();?>


						<?php start_accordion_panel($strFieldsetStatus, $dimension_7_20_1_2, 'dimension_7_20_1_2', 'a', 'a2', '7.20.1.2 Administrative reviews completed within 30 calendar days.');?>
								<div class="answer-wrapper">
									<p>The Tax Administration indicated that the administrative reviews completed within 30 calendar days is <strong>
										<?php 
										$dimension_7_20_1_2_percentage = _get_field_by_id_single_row('db_b', 'pmq_table_12', 'fkidMission', $this->session->userdata('mission_id'), 'finalized_total_rate_30', '');
										echo $dimension_7_20_1_2_percentage;
										echo form_hidden('dimension_7_20_1_2_percentage', $dimension_7_20_1_2_percentage);
										?>%</strong>. 
									</p>
										<p>Does your research confirm these findings?</p>									
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_7_20_1_2, 'dimension_7_20_1_2', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_7_20_1_2, 'dimension_7_20_1_2', '1', 'No');?>
									</div>
								</div>
								<?php form_create_notes_tadat($dimension_7_20_1_2_notes, 'dimension_7_20_1_2_notes');?>
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_7_20_1_3, 'dimension_7_20_1_3', 'a', 'a3', '7.20.1.3 Administrative reviews completed within 60 calendar days.');?>
								<div class="answer-wrapper">
									<p>The Tax Administration indicated that the administrative reviews completed within 60 calendar days is <strong>
										<?php 
										$dimension_7_20_1_3_percentage = _get_field_by_id_single_row('db_b', 'pmq_table_12', 'fkidMission', $this->session->userdata('mission_id'), 'finalized_total_rate_60', '');
										echo $dimension_7_20_1_3_percentage;
										echo form_hidden('dimension_7_20_1_3_percentage', $dimension_7_20_1_3_percentage);
										?>%</strong>. 
									</p>
										<p>Does your research confirm these findings?</p>									
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_7_20_1_3, 'dimension_7_20_1_3', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_7_20_1_3, 'dimension_7_20_1_3', '1', 'No');?>
									</div>
								</div>
								<?php form_create_notes_tadat($dimension_7_20_1_3_notes, 'dimension_7_20_1_3_notes');?>
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_7_20_1_4, 'dimension_7_20_1_4', 'a', 'a4', '7.20.1.4 Administrative reviews completed within 90 calendar days.');?>
								<div class="answer-wrapper">
									<p>The Tax Administration indicated that the administrative reviews completed within 90 calendar days is <strong>
										<?php 
										$dimension_7_20_1_4_percentage = _get_field_by_id_single_row('db_b', 'pmq_table_12', 'fkidMission', $this->session->userdata('mission_id'), 'finalized_total_rate_90', '');
										echo $dimension_7_20_1_4_percentage;
										echo form_hidden('dimension_7_20_1_4_percentage', $dimension_7_20_1_4_percentage);
										?>%</strong>. 
									</p>
										<p>Does your research confirm these findings?</p>									
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_7_20_1_4, 'dimension_7_20_1_4', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_7_20_1_4, 'dimension_7_20_1_4', '1', 'No');?>
									</div>
								</div>
								<?php form_create_notes_tadat($dimension_7_20_1_4_notes, 'dimension_7_20_1_4_notes');?>
						<?php end_accordion_panel();?>
						
						
					</div><!--END ACCORDION PANEL -->
					
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->

	
		<div class="tab-pane fade text-muted" id="uploaded"></div>
	</div>
	<div class="saving" style="display:none">SAVING TO DATABASE...</div>
</div>
<?php //if($this->action !== 'completed'){?>
	<div class="form-group mt15">
		<div class="col-xs-12" style="text-align:center !important;">
			<button type="button" id="save_button" class="btn btn-success white-text" formnovalidate><i class="fa fa-save mr5"></i><?php echo $save_button; ?></button>
			<button type="button" id="score_button" class="btn btn-primary white-text" formnovalidate><i class="fa fa-save mr5"></i><?php echo $score_button; ?></button>			
		</div>
	</div>
<?php //}	?>
<?php echo form_close();?>
</div>