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
		<li class=""><a id="uploader" href="#uploaded" data-url="http://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--START TAB PANEL -->
		<div class="tab-pane active in fade text-muted" id="dimension_a">
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '9.26.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_26_1_1, 'dimension_9_26_1_1', 'a', 'a1', '9.26.1.1 Is there an annual audit of the tax administration\'s financial statements by an external review body (e.g., government auditor or other independent entity)?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_26_1_1, 'dimension_9_26_1_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_26_1_1, 'dimension_9_26_1_1', '1', 'No');?>
									</div>
								</div>
								<?php form_create_notes_tadat($dimension_9_26_1_1_notes, 'dimension_9_26_1_1_notes');?>	
						<?php end_accordion_panel();?>								

						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_26_1_2, 'dimension_9_26_1_2', 'a', 'a2', '9.26.1.2 Is there an annual program of operational performance audits by an external review body (e.g., government auditor)?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_26_1_2, 'dimension_9_26_1_2', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_26_1_2, 'dimension_9_26_1_2', '1', 'No');?>
									</div>
								</div>
								<?php form_create_notes_tadat($dimension_9_26_1_2_notes, 'dimension_9_26_1_2_notes');?>	
						<?php end_accordion_panel();?>								

						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_26_1_3, 'dimension_9_26_1_3', 'a', 'a3', '9.26.1.3 Does the tax administration respond to findings and recommendations of the external review body?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_26_1_3, 'dimension_9_26_1_3', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_26_1_3, 'dimension_9_26_1_3', '1', 'No');?>
									</div>
								</div>
								<?php form_create_notes_tadat($dimension_9_26_1_3_notes, 'dimension_9_26_1_3_notes');?>	
						<?php end_accordion_panel();?>								

						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_26_1_4, 'dimension_9_26_1_4', 'a', 'a4', '9.26.1.4 Are the findings and recommendations of the external review body publicly reported?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_26_1_4, 'dimension_9_26_1_4', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_26_1_4, 'dimension_9_26_1_4', '1', 'No');?>
									</div>
								</div>
								<?php form_create_notes_tadat($dimension_9_26_1_4_notes, 'dimension_9_26_1_4_notes');?>	
						<?php end_accordion_panel();?>								

						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_26_1_5, 'dimension_9_26_1_5', 'a', 'a5', '9.26.1.5 Are the tax administration\'s responses publicly reported?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_26_1_5, 'dimension_9_26_1_5', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_26_1_5, 'dimension_9_26_1_5', '1', 'No');?>
									</div>
								</div>
								<?php form_create_notes_tadat($dimension_9_26_1_5_notes, 'dimension_9_26_1_5_notes');?>	
						<?php end_accordion_panel();?>								
				</div>
					
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->

		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_b">
				<p><strong><?php $numCounter = 1; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '9.26.2 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-b">
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_26_2_1, 'dimension_9_26_2_1', 'b', 'b1', '9.26.2.1 Do independent and impartial investigative bodies exist to safeguard the community in their dealings with the tax administration?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_26_2_1, 'dimension_9_26_2_1', '2', 'Yes', 'check_value_a');?>
										<?php form_create_radio_tadat($dimension_9_26_2_1, 'dimension_9_26_2_1', '1', 'No', 'check_value_a');?>
									</div>
								</div>
								<?php form_create_notes_tadat($dimension_9_26_2_1_notes, 'dimension_9_26_2_1_notes');?>									
						<div style="margin-top:5px !important;"></div>
						<div id="show_checkedValueA"><!-- START show_checkedValueA -->
								<div class="answer-wrapper" style="margin-top:10px !important"><p><b>9.26.2.1 a) Does a tax ombudsman or equivalent authority (e.g., taxpayer advocate) investigate unresolved complaints from taxpayers about the service and treatment they have received from the tax administration?</b></p></div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_26_2_1_a, 'dimension_9_26_2_1_a', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_26_2_1_a, 'dimension_9_26_2_1_a', '1', 'No');?>
									</div>
								</div>
								<?php form_create_notes_tadat($dimension_9_26_2_1_a_notes, 'dimension_9_26_2_1_a_notes');?>	
								<div class="answer-wrapper" style="margin-top:10px !important"><p><b>9.26.2.1 b) Does an anti-corruption agency oversee tax administration anti-corruption policies and investigate alleged corrupt conduct of tax officials?</b></p></div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_26_2_1_b, 'dimension_9_26_2_1_b', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_26_2_1_b, 'dimension_9_26_2_1_b', '1', 'No');?>
									</div>
								</div>
								<?php form_create_notes_tadat($dimension_9_26_2_1_b_notes, 'dimension_9_26_2_1_b_notes');?>	

						</div><!-- END show_checkedValueA -->	
						<?php end_accordion_panel();?>								
						
						<div style="margin-bottom:5px !important;"></div>						
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_26_2_2, 'dimension_9_26_2_2', 'b', 'b2', '9.26.2.2 Does the tax administration act on findings and recommendations of the tax ombudsman and anti-corruption agency?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_26_2_2, 'dimension_9_26_2_2', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_26_2_2, 'dimension_9_26_2_2', '1', 'No');?>
									</div>
								</div>
								<?php form_create_notes_tadat($dimension_9_26_2_2_notes, 'dimension_9_26_2_2_notes');?>	
						<?php end_accordion_panel();?>								

						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_26_2_3, 'dimension_9_26_2_3', 'b', 'b3', '9.26.2.3 Are systemic service and fairness problems, and recommended actions to fix them, reported to the minister and head of the tax administration?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_26_2_3, 'dimension_9_26_2_3', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_26_2_3, 'dimension_9_26_2_3', '1', 'No');?>
									</div>
								</div>
								<?php form_create_notes_tadat($dimension_9_26_2_3_notes, 'dimension_9_26_2_3_notes');?>	
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