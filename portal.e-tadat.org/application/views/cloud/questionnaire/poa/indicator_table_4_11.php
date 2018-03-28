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
		<li class=""><a href="#dimension_a" data-toggle="tab"><strong>DIMENSION 1</strong></a></li>
		<li class=""><a id="uploader" href="#uploaded" data-url="http://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--START TAB PANEL -->
		<div class="tab-pane active in fade text-muted" id="dimension_a">
			
				<?php $numCounter = 0;?>
					<!--START ACCORDION -->
					<div class="panel-group accordion" id="accordion-a">
						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_4_11_1_1, 'dimension_4_11_1_1', 'a', 'a1', '4.11.1.1 To what extent are electronic filing arrangements available and used for CIT?');?>
								<div class="answer-wrapper">
									<p>The Tax Administration indicated that the extent of electronic filing arrangements available and used for CIT is <strong>
										<?php 
										$dimension_4_11_1_percentage = _get_field_by_id_single_row('cloud_questions', 'pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'cit_electronic_filing_percent_3', '');
										echo $dimension_4_11_1_percentage;
										echo form_hidden('dimension_4_11_1_percentage', $dimension_4_11_1_percentage);
										?>%</strong>. 
									</p>
										<p>Does your research confirm these findings?</p>									
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_4_11_1_1, 'dimension_4_11_1_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_4_11_1_1, 'dimension_4_11_1_1', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($dimension_4_11_1_1_notes, 'dimension_4_11_1_1_notes');?>
						<?php end_accordion_panel();?>
						<!--END ACCORDION -->					


						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_4_11_1_2, 'dimension_4_11_1_2', 'a', 'a2', '4.11.1.2 To what extent are electronic filing arrangements available and used for PIT?');?>
								<div class="answer-wrapper">
									<p>The Tax Administration indicated that the extent of electronic filing arrangements available and used for PIT is <strong>
										<?php 
										$dimension_4_11_2_percentage = _get_field_by_id_single_row('cloud_questions', 'pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'pit_electronic_filing_percent_3', '');
										echo $dimension_4_11_2_percentage;
										echo form_hidden('dimension_4_11_2_percentage', $dimension_4_11_2_percentage);
										?>%</strong>. 
									</p>
										<p>Does your research confirm these findings?</p>									
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_4_11_1_2, 'dimension_4_11_1_2', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_4_11_1_2, 'dimension_4_11_1_2', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($dimension_4_11_1_2_notes, 'dimension_4_11_1_2_notes');?>
						<?php end_accordion_panel();?>
						<!--END ACCORDION -->					

						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_4_11_1_3, 'dimension_4_11_1_3', 'a', 'a3', '4.11.1.3 To what extent are electronic filing arrangements available and used for VAT?');?>
								<div class="answer-wrapper">
									<p>The Tax Administration indicated that the extent of electronic filing arrangements available and used for VAT is <strong>
										<?php 
										$dimension_4_11_3_percentage = _get_field_by_id_single_row('cloud_questions', 'pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'vat_electronic_filing_percent_3', '');
										echo $dimension_4_11_3_percentage;
										echo form_hidden('dimension_4_11_3_percentage', $dimension_4_11_3_percentage);
										?>%</strong>. 
									</p>
										<p>Does your research confirm these findings?</p>									
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_4_11_1_3, 'dimension_4_11_1_3', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_4_11_1_3, 'dimension_4_11_1_3', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($dimension_4_11_1_3_notes, 'dimension_4_11_1_3_notes');?>
						<?php end_accordion_panel();?>
						<!--END ACCORDION -->					


						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_4_11_1_4, 'dimension_4_11_1_4', 'a', 'a4', '4.11.1.4 To what extent are electronic filing arrangements available and used for PAYE?');?>
								<div class="answer-wrapper">
									<p>The Tax Administration indicated that the extent of electronic filing arrangements available and used for PAYE is <strong>
										<?php 
										$dimension_4_11_4_percentage = _get_field_by_id_single_row('cloud_questions', 'pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'paye_electronic_filing_percent_3', '');
										echo $dimension_4_11_4_percentage;
										echo form_hidden('dimension_4_11_4_percentage', $dimension_4_11_4_percentage);
										?>%</strong>. 
									</p>
										<p>Does your research confirm these findings?</p>									
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_4_11_1_4, 'dimension_4_11_1_4', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_4_11_1_4, 'dimension_4_11_1_4', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($dimension_4_11_1_4_notes, 'dimension_4_11_1_4_notes');?>
						<?php end_accordion_panel();?>
						<!--END ACCORDION -->					



					<?php start_accordion_panel($strFieldsetStatus, $dimension_4_11_2_1, 'dimension_4_11_2_1', 'a', 'a5', '4.11.2.1 Are electronic filing arrangements available and used by the following taxpayers?');?>
						<div class="answer-wrapper">
							<div class="answer" style="width:250px !important">a) Large taxpayers?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_4_11_2_1, 'dimension_4_11_2_1', '1', 'At least 100%');?>
								<?php form_create_radio_tadat($dimension_4_11_2_1, 'dimension_4_11_2_1', '2', 'At least 80%');?>								
								<?php form_create_radio_tadat($dimension_4_11_2_1, 'dimension_4_11_2_1', '3', 'At least 50%');?>
								<?php form_create_radio_tadat($dimension_4_11_2_1, 'dimension_4_11_2_1', '4', 'Less than 50%');?>
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:250px !important">b) Medium-size taxpayers?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_4_11_2_2, 'dimension_4_11_2_2', '1', 'At least 100%');?>
								<?php form_create_radio_tadat($dimension_4_11_2_2, 'dimension_4_11_2_2', '2', 'At least 80%');?>								
								<?php form_create_radio_tadat($dimension_4_11_2_2, 'dimension_4_11_2_2', '3', 'At least 50%');?>
								<?php form_create_radio_tadat($dimension_4_11_2_2, 'dimension_4_11_2_2', '4', 'Less than 50%');?>
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:250px !important">c) Small businesses?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_4_11_2_3, 'dimension_4_11_2_3', '1', 'At least 100%');?>
								<?php form_create_radio_tadat($dimension_4_11_2_3, 'dimension_4_11_2_3', '2', 'At least 80%');?>								
								<?php form_create_radio_tadat($dimension_4_11_2_3, 'dimension_4_11_2_3', '3', 'At least 50%');?>
								<?php form_create_radio_tadat($dimension_4_11_2_3, 'dimension_4_11_2_3', '4', 'Less than 50%');?>
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:250px !important">d) Non-business individuals?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_4_11_2_4, 'dimension_4_11_2_4', '1', 'At least 100%');?>
								<?php form_create_radio_tadat($dimension_4_11_2_4, 'dimension_4_11_2_4', '2', 'At least 80%');?>								
								<?php form_create_radio_tadat($dimension_4_11_2_4, 'dimension_4_11_2_4', '3', 'At least 50%');?>
								<?php form_create_radio_tadat($dimension_4_11_2_4, 'dimension_4_11_2_4', '4', 'Less than 50%');?>
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:250px !important">e) Tax intermediaries?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_4_11_2_5, 'dimension_4_11_2_5', '1', 'At least 100%');?>
								<?php form_create_radio_tadat($dimension_4_11_2_5, 'dimension_4_11_2_5', '2', 'At least 80%');?>								
								<?php form_create_radio_tadat($dimension_4_11_2_5, 'dimension_4_11_2_5', '3', 'At least 50%');?>
								<?php form_create_radio_tadat($dimension_4_11_2_5, 'dimension_4_11_2_5', '4', 'Less than 50%');?>
							</div>														
						</div>
						<?php form_create_notes_tadat($dimension_4_11_2_notes, 'dimension_4_11_2_notes');?>						
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->															
						

					<!--START ACCORDION -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_4_11_3_1, 'dimension_4_11_3_1', 'a', 'a6', '4.11.3.1 Does the tax administration actively promote use of electronic filing?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_4_11_3_1, 'dimension_4_11_3_1', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_4_11_3_1, 'dimension_4_11_3_1', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_4_11_3_notes, 'dimension_4_11_3_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION -->					
					
					<!--START ACCORDION -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_4_11_4_1, 'dimension_4_11_4_1', 'a', 'a7', '4.11.4.1 Is electronic filing mandatory for any classes of taxpayer?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_4_11_4_1, 'dimension_4_11_4_1', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_4_11_4_1, 'dimension_4_11_4_1', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_4_11_4_notes, 'dimension_4_11_4_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION -->					

					<!--START ACCORDION -->

						<?php form_create_memo_tadat($dimension_4_11_5_notes, 'dimension_4_11_5_notes', 'a', 'a8', '4.11.5.1 What plans does the tax administration have to expand use of electronic filing in the medium term (2-5 years)?','required-textarea-reason');?>

					<!--END ACCORDION -->					

					


					</div>
					
			
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
			<button type="button" id="score_button" class="btn btn-primary white-text" formnovalidate><i class="fa fa-save mr5"></i><?php echo $score_button; ?></button>			
		</div>
	</div>
<?php //}	?>
<?php echo form_close();?>
</div>