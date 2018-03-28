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
		<li class=""><a id="uploader" href="#uploaded" data-url="http://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--START TAB PANEL -->
		<div class="tab-pane active in fade text-muted" id="dimension_a">
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '9.27.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_27_1_1, 'dimension_9_27_1_1', 'a', 'a1', '9.27.1.1 Are levels of public confidence in the tax administration monitored?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_27_1_1, 'dimension_9_27_1_1', '2', 'Yes', 'check_value_a');?>
										<?php form_create_radio_tadat($dimension_9_27_1_1, 'dimension_9_27_1_1', '1', 'No', 'check_value_a');?>
									</div>
								</div>
								<?php form_create_notes_tadat($dimension_9_27_1_1_notes, 'dimension_9_27_1_1_notes');?>									
						<div style="margin-top:5px !important;"></div>
						<div id="show_checkedValueA"><!-- START show_checkedValueA -->
								<div class="answer-wrapper" style="margin-top:10px !important"><p><b>Which of the following monitoring mechanisms are used?</b></p></div>
								<div class="answer-wrapper">
									<div class="answer" style="width:200px !important">9.27.1.1 a) Independent surveys?</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_27_1_1_a, 'dimension_9_27_1_1_a', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_27_1_1_a, 'dimension_9_27_1_1_a', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:200px !important">9.27.1.1 b) Direct feedback from taxpayers?</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_27_1_1_b, 'dimension_9_27_1_1_b', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_27_1_1_b, 'dimension_9_27_1_1_b', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:200px !important">9.27.1.1 c) Formal studies?</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_27_1_1_c, 'dimension_9_27_1_1_c', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_27_1_1_c, 'dimension_9_27_1_1_c', '1', 'No');?>
									</div>
								</div>
						</div><!-- END show_checkedValueA -->	
						<?php end_accordion_panel();?>								
						<div style="margin-top:5px !important"></div>
						<div id="show_checkedValueB"><!-- START show_checkedValueA -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_27_1_2, 'dimension_9_27_1_2', 'a', 'a2', '9.27.1.2 Are the surveys based on valid statistical sampling techniques?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_27_1_2, 'dimension_9_27_1_2', '2', 'Yes', 'check_value_b');?>
										<?php form_create_radio_tadat($dimension_9_27_1_2, 'dimension_9_27_1_2', '1', 'No', 'check_value_b');?>
									</div>
								</div>
						<div style="margin-top:5px !important;"></div>
						<div id="show_checkedValueC"><!-- START show_checkedValueC -->
								<div class="answer-wrapper" style="margin-top:10px !important"><p><b>Is the validity of the sampling externally verified (e.g., by the government statistician)?</b></p></div>
								<div class="answer-wrapper">
									<div class="answer">Answer:</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_27_1_2_a, 'dimension_9_27_1_2_a', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_27_1_2_a, 'dimension_9_27_1_2_a', '1', 'No');?>
									</div>
								</div>
						</div><!-- END show_checkedValueC -->														
								<?php form_create_notes_tadat($dimension_9_27_1_2_notes, 'dimension_9_27_1_2_notes');?>							
						<?php end_accordion_panel();?>
						
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_27_1_3, 'dimension_9_27_1_3', 'a', 'a3', '9.27.1.3 How often are monitoring activities (surveys, studies etc.) undertaken?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_27_1_3, 'dimension_9_27_1_3', '1', 'Every 2 years');?>
										<?php form_create_radio_tadat($dimension_9_27_1_3, 'dimension_9_27_1_3', '2', 'Every 3 years');?>										
										<?php form_create_radio_tadat($dimension_9_27_1_3, 'dimension_9_27_1_3', '3', 'Every 4 years');?>										
										<?php form_create_radio_tadat($dimension_9_27_1_3, 'dimension_9_27_1_3', '4', 'More than 5 years');?>
										<?php form_create_radio_tadat($dimension_9_27_1_3, 'dimension_9_27_1_3', '5', 'Never');?>
									</div>
								</div>				
								<?php form_create_notes_tadat($dimension_9_27_1_3_notes, 'dimension_9_27_1_3_notes');?>							
						<?php end_accordion_panel();?>										
						
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_27_1_4, 'dimension_9_27_1_4', 'a', 'a4', '9.27.1.4 Whithin what timeframe are the results of monitoring activities made public?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_27_1_4, 'dimension_9_27_1_4', '1', 'Within 6 months');?>
										<?php form_create_radio_tadat($dimension_9_27_1_4, 'dimension_9_27_1_4', '2', 'Within 9 months');?>
										<?php form_create_radio_tadat($dimension_9_27_1_4, 'dimension_9_27_1_4', '3', 'Within 12 months');?>
										<?php form_create_radio_tadat($dimension_9_27_1_4, 'dimension_9_27_1_4', '4', 'Not made public');?>
									</div>
								</div>				
								<?php form_create_notes_tadat($dimension_9_27_1_4_notes, 'dimension_9_27_1_4_notes');?>							
						<?php end_accordion_panel();?>										
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_27_1_5, 'dimension_9_27_1_5', 'a', 'a5', '9.27.1.5 Does the tax administration take account of the results of monitoring activities when reviewing its integrity framework?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_27_1_5, 'dimension_9_27_1_5', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_27_1_5, 'dimension_9_27_1_5', '1', 'No');?>
									</div>
								</div>
								<?php form_create_notes_tadat($dimension_9_27_1_5_notes, 'dimension_9_27_1_5_notes');?>									
						<?php end_accordion_panel();?>																
						</div><!-- END show_checkedValueB -->							
						
						
						
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