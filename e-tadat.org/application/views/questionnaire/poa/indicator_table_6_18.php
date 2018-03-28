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
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '6.18.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						
						<?php start_accordion_panel($strFieldsetStatus, $dimension_6_18_1_1, 'dimension_6_18_1_1', 'a', 'a1', '6.18.1.1 Does the tax administration monitor tax revenue losses resulting from inaccurate reporting in declarations?');?>
						<div class="answer-wrapper">
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_6_18_1_1, 'dimension_6_18_1_1', '2', 'Yes', 'check_value_a');?>
								<?php form_create_radio_tadat($dimension_6_18_1_1, 'dimension_6_18_1_1', '1', 'No', 'check_value_a');?>
							</div>														
						</div>
						<div id="show_checkedValueA"><!-- START show_checkedValueA -->
							<div class="answer-wrapper" style="margin-top:10px !important">
								<p><b>What analytical models and methodologies are used to do this? For example, does the tax administration:</b></p>
							</div>
							<div class="answer-wrapper">
								<div class="answer" style="width:450px !important">a) Estimate the VAT compliance gap at a macro level?</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_18_1_1_a, 'dimension_6_18_1_1_a', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_6_18_1_1_a, 'dimension_6_18_1_1_a', '1', 'No');?>								
									</div>														
							</div>
							<div class="answer-wrapper">
								<div class="answer" style="width:450px !important">b) Estimate the compliance gap of income taxes at a macro level?</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_6_18_1_1_b, 'dimension_6_18_1_1_b', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_6_18_1_1_b, 'dimension_6_18_1_1_b', '1', 'No');?>								
								</div>														
							</div>
							<div class="answer-wrapper">
								<div class="answer" style="width:450px !important">c) Estimate losses based on random audit program results?</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_6_18_1_1_c, 'dimension_6_18_1_1_c', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_6_18_1_1_c, 'dimension_6_18_1_1_c', '1', 'No');?>								
								</div>														
							</div>
							<div class="answer-wrapper">
								<div class="answer" style="width:450px !important">d) Estimate losses based on results from third party data matching?</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_6_18_1_1_d, 'dimension_6_18_1_1_d', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_6_18_1_1_d, 'dimension_6_18_1_1_d', '1', 'No');?>								
								</div>														
							</div>
							<div class="answer-wrapper">
								<div class="answer" style="width:450px !important">e) Engage in advanced analytics of large data sets (e.g., predictive modeling)?</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_6_18_1_1_e, 'dimension_6_18_1_1_e', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_6_18_1_1_e, 'dimension_6_18_1_1_e', '1', 'No');?>								
								</div>														
							</div>
	
							<div class="answer-wrapper" style="margin-top:10px !important">
								<p><b>With regard to the model/s used, are the following core taxes covered?</b></p>
							</div>
							<div class="answer-wrapper">
								<div class="answer" style="width:450px !important">a) CIT</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_6_18_1_2_a, 'dimension_6_18_1_2_a', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_6_18_1_2_a, 'dimension_6_18_1_2_a', '1', 'No');?>								
								</div>														
							</div>
							<div class="answer-wrapper">
								<div class="answer" style="width:450px !important">b) PIT</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_6_18_1_2_b, 'dimension_6_18_1_2_b', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_6_18_1_2_b, 'dimension_6_18_1_2_b', '1', 'No');?>								
								</div>														
							</div>
							<div class="answer-wrapper">
								<div class="answer" style="width:450px !important">c) VAT</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_6_18_1_2_c, 'dimension_6_18_1_2_c', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_6_18_1_2_c, 'dimension_6_18_1_2_c', '1', 'No');?>								
								</div>														
							</div>
							<div class="answer-wrapper">
								<div class="answer" style="width:450px !important">d) PAYE</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_6_18_1_2_d, 'dimension_6_18_1_2_d', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_6_18_1_2_d, 'dimension_6_18_1_2_d', '1', 'No');?>								
								</div>														
							</div>																		

							<div class="answer-wrapper" style="margin-top:10px !important">
								<p><b>Are the models applied at least once every:</b></p>
							</div>
							<div class="answer-wrapper">

								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_6_18_1_3_a, 'dimension_6_18_1_3_a', '1', '2 Years');?>
									<?php form_create_radio_tadat($dimension_6_18_1_3_a, 'dimension_6_18_1_3_a', '2', '4 Years');?>								
									<?php form_create_radio_tadat($dimension_6_18_1_3_a, 'dimension_6_18_1_3_a', '3', '5 Years');?>																	
								</div>														
							</div>
							<div class="answer-wrapper" style="margin-top:10px !important">
								<p><b>What does the tax administration do to ensure the credibility of the results?</b></p>
							</div>
							<div class="answer-wrapper">
								<div class="answer" style="width:450px !important">a) Are the results subjected to credibility tests and independent review?</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_6_18_1_4_a, 'dimension_6_18_1_4_a', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_6_18_1_4_a, 'dimension_6_18_1_4_a', '1', 'No');?>
								</div>														
							</div>
							<div class="answer-wrapper">
								<div class="answer" style="width:450px !important">b) Are the results made public?</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_6_18_1_4_b, 'dimension_6_18_1_4_b', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_6_18_1_4_b, 'dimension_6_18_1_4_b', '1', 'No');?>								
								</div>														
							</div>



							<div class="answer-wrapper" style="margin-top:10px !important">
								<p><b>Are the results systematically used in designing tax administration interventions to improve accuracy of reporting?</b></p>
							</div>
							<div class="answer-wrapper">
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_6_18_1_5_a, 'dimension_6_18_1_5_a', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_6_18_1_5_a, 'dimension_6_18_1_5_a', '1', 'No');?>
								</div>														
							</div>
						</div><!-- END show_checkedValueA -->
							<?php form_create_notes_tadat($dimension_6_18_1_1_notes, 'dimension_6_18_1_1_notes');?>
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