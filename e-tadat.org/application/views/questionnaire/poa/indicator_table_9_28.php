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
		<li class=""><a href="#dimension_b" data-toggle="tab"><strong>DIMENSION 2</strong></a></li>		
		<li class=""><a id="uploader" href="#uploaded" data-url="https://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--START TAB PANEL -->
		<div class="tab-pane active in fade text-muted" id="dimension_a">
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '9.28.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_28_1_1, 'dimension_9_28_1_1', 'a', 'a1', '9.28.1.1 Does the tax administration prepare an annual report outlining the full financial and operational performance of the tax administration for the immediate past fiscal year?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_28_1_1, 'dimension_9_28_1_1', '2', 'Yes', 'check_value_a');?>
										<?php form_create_radio_tadat($dimension_9_28_1_1, 'dimension_9_28_1_1', '1', 'No', 'check_value_a');?>
									</div>
								</div>
						<div style="margin-top:5px !important;"></div>
						<div id="show_checkedValueA"><!-- START show_checkedValueA -->
								<div class="answer-wrapper" style="margin-top:10px !important"><p><b>9.28.1.2 Is the report presented to the parliament/legislature and made available to the public?</b></p></div>
								<div class="answer-wrapper">
									<div class="answer">Answer:</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_28_1_2, 'dimension_9_28_1_2', '2', 'Yes', 'check_value_b');?>
										<?php form_create_radio_tadat($dimension_9_28_1_2, 'dimension_9_28_1_2', '1', 'No', 'check_value_b');?>
									</div>
								</div>
								<div id="show_checkedValueB" class=""><!-- START show_checkedValueB -->
									<div class="answer-wrapper" style="margin-top:10px !important"><p><b>9.28.1.3 Within what timeframe is this done?</b></p></div>
									<div class="answer-wrapper">
									<div class="answer">Answer:</div>
										<div class="answer-container">
											<?php form_create_radio_tadat($dimension_9_28_1_3, 'dimension_9_28_1_3', '1', '6 Months');?>
											<?php form_create_radio_tadat($dimension_9_28_1_3, 'dimension_9_28_1_3', '2', '9 Months');?>
											<?php form_create_radio_tadat($dimension_9_28_1_3, 'dimension_9_28_1_3', '3', '12 Months');?>
										</div>
									</div>
							</div><!-- END show_checkedValueB -->	
								
						</div><!-- END show_checkedValueA -->	
							<?php form_create_notes_tadat($dimension_9_28_1_1_notes, 'dimension_9_28_1_1_notes');?>															
						<?php end_accordion_panel();?>								
				</div>
					
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->

	<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_b">
				<p><strong><?php $numCounter = 1; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '9.28.2 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-b">
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_28_2_1, 'dimension_9_28_2_1', 'b', 'b1', '9.28.2.1 Does the tax administration prepare and make public future plans including, for example, a multi-year strategic (or reform) plan and annual operational plans?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_28_2_1, 'dimension_9_28_2_1', '2', 'Yes', 'check_value_c');?>
										<?php form_create_radio_tadat($dimension_9_28_2_1, 'dimension_9_28_2_1', '1', 'No', 'check_value_c');?>
									</div>
								</div>
						<div style="margin-top:5px !important;"></div>
						<div id="show_checkedValueC"><!-- START show_checkedValueC -->
								<div class="answer-wrapper" style="margin-top:10px !important"><p><b>9.28.2.2 Which parts of the plan are made public?</b></p></div>
								<div class="answer-wrapper">
									<div class="answer">Answer:</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_28_2_2, 'dimension_9_28_2_2', '1', 'Strategic and operational parts');?>
										<?php form_create_radio_tadat($dimension_9_28_2_2, 'dimension_9_28_2_2', '2', 'Only certain elements of the plan');?>
									</div>
								</div>
								<div class="answer-wrapper" style="margin-top:10px !important"><p><b>9.28.2.3 When are the plans made public?</b></p></div>
								<div class="answer-wrapper">
									<div class="answer">Answer:</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_28_2_3, 'dimension_9_28_2_3', '1', 'In advance of the period covered by the plans');?>
										<?php form_create_radio_tadat($dimension_9_28_2_3, 'dimension_9_28_2_3', '2', 'Within 3 months of the period covered by the plans');?>
									</div>
								</div>
						</div><!-- END show_checkedValueC -->	
							<?php form_create_notes_tadat($dimension_9_28_2_1_notes, 'dimension_9_28_2_1_notes');?>															
						<?php end_accordion_panel();?>								
				</div>

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