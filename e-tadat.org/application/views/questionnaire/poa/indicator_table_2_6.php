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
		<div class="tab-pane fade active in text-muted" id="dimension_a">
			
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '2.6.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
				<!--START ACCORDION -->
				<div class="panel-group accordion" id="accordion-a">
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_6_1_1, 'dimension_2_6_1_1', 'a', 'a1', '2.6.1.1 Does the tax administration have a structured process in place to identify, assess, prioritize, and mitigate institutional risks?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_6_1_1, 'dimension_2_6_1_1', '2', 'Yes', 'check_value_a');?>
									<?php form_create_radio_tadat($dimension_2_6_1_1, 'dimension_2_6_1_1', '1', 'No', 'check_value_a');?>
								</div>
							</div>
							<div id="show_checkedValueA" style="margin-top:10px !important">
								<div class="answer-wrapper">
								<p style="margin-bottom:5px !important">2.6.1.1.1 Does it include the risk of IT system failure and loss of taxpayer data?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_2_6_1_1_a, 'dimension_2_6_1_1_a', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_2_6_1_1_a, 'dimension_2_6_1_1_a', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper" style="margin-top:10px !important">
								<p style="margin-bottom:5px !important">2.6.1.1.2 Does the process form part of the tax administration's planning process so that institutional risks and associated responses are determined in a context of the administration's broader objectives and capabilities?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_2_6_1_1_b, 'dimension_2_6_1_1_b', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_2_6_1_1_b, 'dimension_2_6_1_1_b', '1', 'No');?>
									</div>
								</div>									
								<div class="answer-wrapper" style="margin-top:10px !important">
								<p style="margin-bottom:5px !important">2.6.1.1.3 How often is the structured process to identify, assess, prioritize, and mitigate institutional risks applied ?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_2_6_1_1_c, 'dimension_2_6_1_1_c', '1', 'Every year');?>
										<?php form_create_radio_tadat($dimension_2_6_1_1_c, 'dimension_2_6_1_1_c', '2', 'Every two years');?>
										<?php form_create_radio_tadat($dimension_2_6_1_1_c, 'dimension_2_6_1_1_c', '3', 'Ad-hoc');?>
									</div>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_6_1_1_notes, 'dimension_2_6_1_1_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_6_1_2, 'dimension_2_6_1_2', 'a', 'a2', '2.6.1.2 Does the tax administration maintain an institutional risk register?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_6_1_2, 'dimension_2_6_1_2', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_6_1_2, 'dimension_2_6_1_2', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_6_1_2_notes, 'dimension_2_6_1_2_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_6_1_3, 'dimension_2_6_1_3', 'a', 'a3', '2.6.1.3 Is a business continuity (or disaster recovery) plan in place?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_6_1_3, 'dimension_2_6_1_3', '2', 'Yes', 'check_value_b');?>
									<?php form_create_radio_tadat($dimension_2_6_1_3, 'dimension_2_6_1_3', '1', 'No', 'check_value_b');?>
								</div>
							</div>
							<div id="show_checkedValueB" style="margin-top:10px !important">
								<div class="answer-wrapper">
								<p style="margin-bottom:5px !important">2.6.1.3.1 How often is the business continuity (disaster recovery) plan reviewed and updated? ?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_2_6_1_3_a, 'dimension_2_6_1_3_a', '1', 'Every year');?>
										<?php form_create_radio_tadat($dimension_2_6_1_3_a, 'dimension_2_6_1_3_a', '2', 'Every two years');?>
										<?php form_create_radio_tadat($dimension_2_6_1_3_a, 'dimension_2_6_1_3_a', '3', 'Ad-hoc');?>
									</div>
								</div>
							</div>							
								<?php form_create_notes_tadat($dimension_2_6_1_3_notes, 'dimension_2_6_1_3_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_6_1_4, 'dimension_2_6_1_4', 'a', 'a4', '2.6.1.4 Does the tax administration monitor progress and evaluate the impact of institutional risk mitigation initiatives?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_6_1_4, 'dimension_2_6_1_4', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_6_1_4, 'dimension_2_6_1_4', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_6_1_4_notes, 'dimension_2_6_1_4_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_6_1_5, 'dimension_2_6_1_5', 'a', 'a5', '2.6.1.5 Are regular reports on progress of risk mitigation actions monitored at senior management level in the tax administration?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_6_1_5, 'dimension_2_6_1_5', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_6_1_5, 'dimension_2_6_1_5', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_6_1_5_notes, 'dimension_2_6_1_5_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->

					

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_6_1_6, 'dimension_2_6_1_6', 'a', 'a6', '2.6.1.6 Does the tax administration test its capability to respond to unplanned internal or external disruptions to its business operations?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_6_1_6, 'dimension_2_6_1_6', '2', 'Yes', 'check_value_c');?>
									<?php form_create_radio_tadat($dimension_2_6_1_6, 'dimension_2_6_1_6', '1', 'No', 'check_value_c');?>
								</div>
							</div>
							<div id="show_checkedValueC" style="margin-top:10px !important">
								<div class="answer-wrapper">
								<p style="margin-bottom:5px !important">2.6.1.6.1 Does it include staff training in disaster simulation exercises?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_2_6_1_6_a, 'dimension_2_6_1_6_a', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_2_6_1_6_a, 'dimension_2_6_1_6_a', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper" style="margin-top:10px !important">
								<p style="margin-bottom:5px !important">2.6.1.6.2 Are any other staff training programs undertaken?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_2_6_1_6_b, 'dimension_2_6_1_6_b', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_2_6_1_6_b, 'dimension_2_6_1_6_b', '1', 'No');?>
									</div>
								</div>
							</div>							
								<?php form_create_notes_tadat($dimension_2_6_1_6_notes, 'dimension_2_6_1_6_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->

																																		
				<!--END ACCORDION -->
				</div>
				<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!--END TAB PANEL -->	
		
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