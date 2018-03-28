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


		$get_missions = _get_current_missions_by_id($this->user->id, $this->user->fkidUserRole);
		$periodsID = _get_field_by_id_single_row('db', 'Missions', 'id', $this->session->userdata('mission_id'), 'fkidAssessmentPeriod', '');
		$periods = _get_field_by_id_single_row('db', 'AssessmentPeriod', 'id', $periodsID, 'period', '');

?>

<div class="tabs inside-panel">
	<ul id="myTabs" class="nav nav-tabs">
		<li class="active"><a href="#dimension_a" data-toggle="tab"><strong>BACKGROUND</strong></a></li>
		<li class=""><a href="#dimension_b" data-toggle="tab"><strong>DIMENSION 1</strong></a></li>
		<li class=""><a id="uploader" href="#uploaded" data-url="http://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--START TAB PANEL -->
		<div class="tab-pane active in fade text-muted" id="dimension_a">
			
				<?php $numCounter = 0;?>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<?php form_create_memo_tadat($background_a, 'background_a', 'a', 'a1', 'a) What are the statutory payment requirements (frequency, due dates, payment methods) for each of the core taxes and taxpayer segments?','required-textarea-reason');?>
						<?php form_create_memo_tadat($background_b, 'background_b', 'a', 'a2', 'b) What are the general tax administration laws relating to the recovery of unpaid taxes?','required-textarea-reason');?>
						<?php form_create_memo_tadat($background_c, 'background_c', 'a', 'a3', 'c) What organizational unit/s of the tax administration is/are responsible for collection enforcement?','required-textarea-reason');?>
					</div>
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->

		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_b">
			
				<p><strong><?php $numCounter = 1; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '5.12.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-b">
						<!--START ACCORDION -->
										<?php start_accordion_panel($strFieldsetStatus, $dimension_5_12_1_1_a, 'dimension_5_12_1_1_a', 'b', 'b1', '5.12.1.1 To what extent are the following types of electronic payment arrangements available and used:');?>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">a) Blanket 'direct debit' authority for payment of all or some core tax liabilities?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_5_12_1_1_a, 'dimension_5_12_1_1_a', '1', 'Large Extent');?>
								<?php form_create_radio_tadat($dimension_5_12_1_1_a, 'dimension_5_12_1_1_a', '2', 'Lesser Extent');?>								
								<?php form_create_radio_tadat($dimension_5_12_1_1_a, 'dimension_5_12_1_1_a', '3', 'No Extent');?>																
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">b) Direct debit authority for payment on a liability-by-liability basis?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_5_12_1_1_b, 'dimension_5_12_1_1_b', '1', 'Large Extent');?>
								<?php form_create_radio_tadat($dimension_5_12_1_1_b, 'dimension_5_12_1_1_b', '2', 'Lesser Extent');?>								
								<?php form_create_radio_tadat($dimension_5_12_1_1_b, 'dimension_5_12_1_1_b', '3', 'No Extent');?>																							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">c) Internet or other online payment methods (e.g., via electronic funds transfer or online payment by debit/credit card)?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_5_12_1_1_c, 'dimension_5_12_1_1_c', '1', 'Large Extent');?>
								<?php form_create_radio_tadat($dimension_5_12_1_1_c, 'dimension_5_12_1_1_c', '2', 'Lesser Extent');?>								
								<?php form_create_radio_tadat($dimension_5_12_1_1_c, 'dimension_5_12_1_1_c', '3', 'No Extent');?>																							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">d) Telephone banking (including mobile telephony and apps)?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_5_12_1_1_d, 'dimension_5_12_1_1_d', '1', 'Large Extent');?>
								<?php form_create_radio_tadat($dimension_5_12_1_1_d, 'dimension_5_12_1_1_d', '2', 'Lesser Extent');?>								
								<?php form_create_radio_tadat($dimension_5_12_1_1_d, 'dimension_5_12_1_1_d', '3', 'No Extent');?>																							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">e) Automatic teller machines?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_5_12_1_1_e, 'dimension_5_12_1_1_e', '1', 'Large Extent');?>
								<?php form_create_radio_tadat($dimension_5_12_1_1_e, 'dimension_5_12_1_1_e', '2', 'Lesser Extent');?>								
								<?php form_create_radio_tadat($dimension_5_12_1_1_e, 'dimension_5_12_1_1_e', '3', 'No Extent');?>																							</div>														
						</div>
						<?php form_create_notes_tadat($dimension_5_12_1_1_notes, 'dimension_5_12_1_1_notes','Are any other types of electronic payment arrangements available and used?');?>	
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->		

						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_5_12_1_2_a, 'dimension_5_12_1_2_a', 'b', 'b2', '5.12.1.2 The extent electronic payment arrangements are available and used for:');?>
							<div class="answer-wrapper">
									<p style="padding-top:12px !important; font-weight:bold !important">5.12.1.2 a) The Tax Administration indicated that the electronic payment arrangements available and used for CIT during the combined periods of <?php echo $periods;?> is  
										<?php 
										$dimension_5_12_1_2_a_percentage_1 = _get_field_by_id_single_row('cloud_questions', 'pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'cit_electronic_payments_value_1', '');
										$dimension_5_12_1_2_a_percentage_2 = _get_field_by_id_single_row('cloud_questions', 'pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'cit_electronic_payments_value_2', '');
										$dimension_5_12_1_2_a_percentage_3 = _get_field_by_id_single_row('cloud_questions', 'pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'cit_electronic_payments_value_3', '');																				
										$dimension_5_12_1_2_a_percentage = number_format(($dimension_5_12_1_2_a_percentage_1 + $dimension_5_12_1_2_a_percentage_2 + $dimension_5_12_1_2_a_percentage_3)/3,2);
										echo form_hidden('dimension_5_12_1_2_a_percentage', $dimension_5_12_1_2_a_percentage);
										echo $dimension_5_12_1_2_a_percentage;
										?>
										%</strong>.</p>
										<p>Does your research confirm these findings?</p>									
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_5_12_1_2_a, 'dimension_5_12_1_2_a', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_5_12_1_2_a, 'dimension_5_12_1_2_a', '1', 'No');?>
									</div>
								</div>
							<div class="answer-wrapper">
									<p style="padding-top:12px !important; font-weight:bold !important">5.12.1.2 b) The Tax Administration indicated that the electronic payment arrangements available and used for PIT during the combined periods of <?php echo $periods;?> is  
										<?php 
										$dimension_5_12_1_2_b_percentage_1 = _get_field_by_id_single_row('cloud_questions', 'pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'pit_electronic_payments_value_1', '');
										$dimension_5_12_1_2_b_percentage_2 = _get_field_by_id_single_row('cloud_questions', 'pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'pit_electronic_payments_value_2', '');
										$dimension_5_12_1_2_b_percentage_3 = _get_field_by_id_single_row('cloud_questions', 'pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'pit_electronic_payments_value_3', '');																				
										$dimension_5_12_1_2_b_percentage = number_format(($dimension_5_12_1_2_b_percentage_1 + $dimension_5_12_1_2_b_percentage_2 + $dimension_5_12_1_2_b_percentage_3)/3,2);
										echo form_hidden('dimension_5_12_1_2_b_percentage', $dimension_5_12_1_2_b_percentage);
										echo $dimension_5_12_1_2_b_percentage;
										?>
										%</strong>.</p>
										<p>Does your research confirm these findings?</p>									
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_5_12_1_2_b, 'dimension_5_12_1_2_b', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_5_12_1_2_b, 'dimension_5_12_1_2_b', '1', 'No');?>
									</div>
								</div>
							<div class="answer-wrapper">
									<p style="padding-top:12px !important; font-weight:bold !important">5.12.1.2 c) The Tax Administration indicated that the electronic payment arrangements available and used for VAT during the combined periods of <?php echo $periods;?> is  
										<?php 
										$dimension_5_12_1_2_c_percentage_1 = _get_field_by_id_single_row('cloud_questions', 'pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'vat_electronic_payments_value_1', '');
										$dimension_5_12_1_2_c_percentage_2 = _get_field_by_id_single_row('cloud_questions', 'pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'vat_electronic_payments_value_2', '');
										$dimension_5_12_1_2_c_percentage_3 = _get_field_by_id_single_row('cloud_questions', 'pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'vat_electronic_payments_value_3', '');																				
										$dimension_5_12_1_2_c_percentage = number_format(($dimension_5_12_1_2_c_percentage_1 + $dimension_5_12_1_2_c_percentage_2 + $dimension_5_12_1_2_c_percentage_3)/3,2);
										echo form_hidden('dimension_5_12_1_2_c_percentage', $dimension_5_12_1_2_c_percentage);
										echo $dimension_5_12_1_2_c_percentage;
										?>
										%</strong>.</p>
										<p>Does your research confirm these findings?</p>									
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_5_12_1_2_c, 'dimension_5_12_1_2_c', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_5_12_1_2_c, 'dimension_5_12_1_2_c', '1', 'No');?>
									</div>
								</div>
							<div class="answer-wrapper">
									<p style="padding-top:12px !important; font-weight:bold !important">5.12.1.2 d) The Tax Administration indicated that the electronic payment arrangements available and used for PAYE witholding during the combined periods of <?php echo $periods;?> is  
										<?php 
										$dimension_5_12_1_2_d_percentage_1 = _get_field_by_id_single_row('cloud_questions', 'pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'paye_electronic_payments_value_1', '');
										$dimension_5_12_1_2_d_percentage_2 = _get_field_by_id_single_row('cloud_questions', 'pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'paye_electronic_payments_value_2', '');
										$dimension_5_12_1_2_d_percentage_3 = _get_field_by_id_single_row('cloud_questions', 'pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'paye_electronic_payments_value_3', '');																				
										$dimension_5_12_1_2_d_percentage = number_format(($dimension_5_12_1_2_d_percentage_1 + $dimension_5_12_1_2_d_percentage_2 + $dimension_5_12_1_2_d_percentage_3)/3,2);
										echo form_hidden('dimension_5_12_1_2_d_percentage', $dimension_5_12_1_2_d_percentage);
										echo $dimension_5_12_1_2_d_percentage;
										?>
										%</strong>.</p>
										<p>Does your research confirm these findings?</p>									
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_5_12_1_2_d, 'dimension_5_12_1_2_d', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_5_12_1_2_d, 'dimension_5_12_1_2_d', '1', 'No');?>
									</div>
								</div>
								
									<?php form_create_notes_tadat($dimension_5_12_1_2_notes, 'dimension_5_12_1_2_notes');?>
						<?php end_accordion_panel();?>
						<!--END ACCORDION -->					

					<?php start_accordion_panel($strFieldsetStatus, $dimension_5_12_1_3_a, 'dimension_5_12_1_3_a', 'b', 'b3', '5.12.1.3 To what extent are electronic payment arrangements available and used by:');?>
						<div class="answer-wrapper">
							<div class="answer" style="width:250px !important">a) Large taxpayers?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_5_12_1_3_a, 'dimension_5_12_1_3_a', '1', 'At least 100%');?>
								<?php form_create_radio_tadat($dimension_5_12_1_3_a, 'dimension_5_12_1_3_a', '2', 'At least 80%');?>								
								<?php form_create_radio_tadat($dimension_5_12_1_3_a, 'dimension_5_12_1_3_a', '3', 'At least 50%');?>
								<?php form_create_radio_tadat($dimension_5_12_1_3_a, 'dimension_5_12_1_3_a', '4', 'Less than 50%');?>
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:250px !important">b) Medium-size taxpayers?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_5_12_1_3_b, 'dimension_5_12_1_3_b', '1', 'At least 100%');?>
								<?php form_create_radio_tadat($dimension_5_12_1_3_b, 'dimension_5_12_1_3_b', '2', 'At least 80%');?>								
								<?php form_create_radio_tadat($dimension_5_12_1_3_b, 'dimension_5_12_1_3_b', '3', 'At least 50%');?>
								<?php form_create_radio_tadat($dimension_5_12_1_3_b, 'dimension_5_12_1_3_b', '4', 'Less than 50%');?>
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:250px !important">c) Small businesses?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_5_12_1_3_c, 'dimension_5_12_1_3_c', '1', 'At least 100%');?>
								<?php form_create_radio_tadat($dimension_5_12_1_3_c, 'dimension_5_12_1_3_c', '2', 'At least 80%');?>								
								<?php form_create_radio_tadat($dimension_5_12_1_3_c, 'dimension_5_12_1_3_c', '3', 'At least 50%');?>
								<?php form_create_radio_tadat($dimension_5_12_1_3_c, 'dimension_5_12_1_3_c', '4', 'Less than 50%');?>
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:250px !important">d) Non-business individuals?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_5_12_1_3_d, 'dimension_5_12_1_3_d', '1', 'At least 100%');?>
								<?php form_create_radio_tadat($dimension_5_12_1_3_d, 'dimension_5_12_1_3_d', '2', 'At least 80%');?>								
								<?php form_create_radio_tadat($dimension_5_12_1_3_d, 'dimension_5_12_1_3_d', '3', 'At least 50%');?>
								<?php form_create_radio_tadat($dimension_5_12_1_3_d, 'dimension_5_12_1_3_d', '4', 'Less than 50%');?>
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:250px !important">e) Tax intermediaries?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_5_12_1_3_e, 'dimension_5_12_1_3_e', '1', 'At least 100%');?>
								<?php form_create_radio_tadat($dimension_5_12_1_3_e, 'dimension_5_12_1_3_e', '2', 'At least 80%');?>								
								<?php form_create_radio_tadat($dimension_5_12_1_3_e, 'dimension_5_12_1_3_e', '3', 'At least 50%');?>
								<?php form_create_radio_tadat($dimension_5_12_1_3_e, 'dimension_5_12_1_3_e', '4', 'Less than 50%');?>
							</div>														
						</div>
						<?php form_create_notes_tadat($dimension_5_12_1_3_notes, 'dimension_5_12_1_3_notes');?>						
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->															
						

					<!--START ACCORDION -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_5_12_1_4, 'dimension_5_12_1_4', 'b', 'b4', '5.12.1.4 Does the tax administration pay tax refunds electronically (i.e. via direct credits to taxpayer bank accounts)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_5_12_1_4, 'dimension_5_12_1_4', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_5_12_1_4, 'dimension_5_12_1_4', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_5_12_1_4_notes, 'dimension_5_12_1_4_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION -->					
					
					<!--START ACCORDION -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_5_12_1_5, 'dimension_5_12_1_5', 'b', 'b5', '5.12.1.5 Does the tax administration actively promote use of electronic payment?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_5_12_1_5, 'dimension_5_12_1_5', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_5_12_1_5, 'dimension_5_12_1_5', '1', 'No');?>
								</div>
							</div>
							<?php form_create_notes_tadat($dimension_5_12_1_5_notes, 'dimension_5_12_1_5_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION -->					

					<!--START ACCORDION -->

						<?php form_create_memo_tadat($dimension_5_12_1_6, 'dimension_5_12_1_6', 'b', 'b6', '5.12.1.6 What plans does the tax administration have to expand use of electronic payment in the medium term (2-5 years)?','required-textarea-reason');?>
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
			<button type="button" id="score_button" class="btn btn-primary white-text" formnovalidate><i class="fa fa-save mr5"></i><?php echo $score_button; ?></button>			
		</div>
	</div>
<?php //}	?>
<?php echo form_close();?>
</div>