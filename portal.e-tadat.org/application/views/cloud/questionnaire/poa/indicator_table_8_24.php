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
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '8.24.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_24_1_1, 'dimension_8_24_1_1', 'a', 'a1', '8.24.1.1 Do net credit VAT declarations automatically trigger an entitlement to refund or are taxpayers required to file a separate refund claim?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_24_1_1, 'dimension_8_24_1_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_8_24_1_1, 'dimension_8_24_1_1', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_8_24_1_1_notes, 'dimension_8_24_1_1_notes');?>
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_24_1_2, 'dimension_8_24_1_2', 'a', 'a2', '8.24.1.2 Are claims automatically assessed and ranked against predetermined risk criteria?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_24_1_2, 'dimension_8_24_1_2', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_8_24_1_2, 'dimension_8_24_1_2', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_8_24_1_2_notes, 'dimension_8_24_1_2_notes','How does the tax administration assess the risk attached to individual VAT refund claims?');?>
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_24_1_3, 'dimension_8_24_1_3', 'a', 'a3', '8.24.1.3 Are special arrangements in place for managing VAT refund claims of regular exporters?');?>
								<div class="answer-wrapper">
									<p>For example, are exporters categorized according to their compliance history and perceived level of risk (such that low risk claimants receive automatic refunds, while selected higher risk taxpayers are required to substantiate their claims).</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_24_1_3, 'dimension_8_24_1_3', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_8_24_1_3, 'dimension_8_24_1_3', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_8_24_1_3_notes, 'dimension_8_24_1_3_notes');?>
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_24_1_4, 'dimension_8_24_1_4', 'a', 'a4', '8.24.1.4 What percentage of VAT refund claims is subjected to pre-issue verification?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_24_1_4, 'dimension_8_24_1_4', '1', '80% - 100%');?>
										<?php form_create_radio_tadat($dimension_8_24_1_4, 'dimension_8_24_1_4', '2', '60% - 79%');?>
										<?php form_create_radio_tadat($dimension_8_24_1_4, 'dimension_8_24_1_4', '3', '40% - 59%');?>
										<?php form_create_radio_tadat($dimension_8_24_1_4, 'dimension_8_24_1_4', '4', '20% - 39%');?>
										<?php form_create_radio_tadat($dimension_8_24_1_4, 'dimension_8_24_1_4', '5', '1% - 19%');?>										
										<?php form_create_radio_tadat($dimension_8_24_1_4, 'dimension_8_24_1_4', '6', '0%');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_8_24_1_4_notes, 'dimension_8_24_1_4_notes','How is this verification done?');?>
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_24_1_5, 'dimension_8_24_1_5', 'a', 'a5', '8.24.1.5 Is interest paid to taxpayers on delayed refunds?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_24_1_5, 'dimension_8_24_1_5', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_8_24_1_5, 'dimension_8_24_1_5', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_8_24_1_5_notes, 'dimension_8_24_1_5_notes');?>
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_24_1_6, 'dimension_8_24_1_6', 'a', 'a6', '8.24.1.6 Are excess VAT credits offset against other tax liabilities (e.g., income tax)?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_24_1_6, 'dimension_8_24_1_6', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_8_24_1_6, 'dimension_8_24_1_6', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_8_24_1_6_notes, 'dimension_8_24_1_6_notes');?>
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_24_1_7, 'dimension_8_24_1_7', 'a', 'a7', '8.24.1.7 Where are VAT refunds paid from?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_24_1_7, 'dimension_8_24_1_7', '1', 'Consolidated revenue');?>
										<?php form_create_radio_tadat($dimension_8_24_1_7, 'dimension_8_24_1_7', '2', 'Special budget appropriation');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_8_24_1_7_notes, 'dimension_8_24_1_7_notes','If the latter, what happens if insufficient funds have been appropriated to meet all legitimate refund claims?');?>
						<?php end_accordion_panel();?>

						
						
				</div><!--END ACCORDION PANEL -->					
					
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->


		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_b">
				<p><strong><?php $numCounter = 1; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '8.24.2 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-b">
						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_24_2_1, 'dimension_8_24_2_1', 'b', 'b1', '8.24.2.1 Does the tax administration routinely monitor (e.g., each month) the time taken to pay (or offset) VAT refunds?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_24_2_1, 'dimension_8_24_2_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_8_24_2_1, 'dimension_8_24_2_1', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_8_24_2_1_notes, 'dimension_8_24_2_1_notes');?>
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_24_2_2, 'dimension_8_24_2_2', 'b', 'b2', '8.24.2.2 Are there instances when VAT refunds have been approved for payment or offset but remain unpaid (or not offset) due to insufficient funds or for other reasons such as the need to achieve revenue targets?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_24_2_2, 'dimension_8_24_2_2', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_8_24_2_2, 'dimension_8_24_2_2', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_8_24_2_2_notes, 'dimension_8_24_2_2_notes','How does the tax administration assess the risk attached to individual VAT refund claims?');?>
						<?php end_accordion_panel();?>


						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_24_2_3, 'dimension_8_24_2_3', 'b', 'b3', '8.24.2.3 What percentage of VAT refund claims, by number of cases and value, is paid (or offset) within 30 calendar days?');?>
								<div class="answer-wrapper">

								<?php
									$dimension_8_24_3_number = _get_field_by_id_single_row('cloud_questions', 'pmq_table_13', 'fkidMission', $this->session->userdata('mission_id'), 'paid_within_30_number', '');
									$dimension_8_24_3_value = _get_field_by_id_single_row('cloud_questions', 'pmq_table_13', 'fkidMission', $this->session->userdata('mission_id'), 'paid_within_30_value', '');									
									echo form_hidden('dimension_8_24_3_number', $dimension_8_24_3_number);
									echo form_hidden('dimension_8_24_3_value', $dimension_8_24_3_value);									
								 ?>

									<p>The Tax Administration indicated that the percentage of VAT refund claims, by number of cases (<b><?php echo $dimension_8_24_3_number;?></b>) and value (<b><?php echo $dimension_8_24_3_value;?></b> - in millions), paid (or offset) within 30 calendar days is <strong>
										<?php 
										$dimension_8_24_2_3_percentage = _get_field_by_id_single_row('cloud_questions', 'pmq_table_13', 'fkidMission', $this->session->userdata('mission_id'), 'claims_ratio_number', '');
										echo $dimension_8_24_2_3_percentage;

										echo form_hidden('dimension_8_24_2_3_percentage', $dimension_8_24_2_3_percentage);
										?>%</strong>. 
									</p>
										<p>Does your research confirm these findings?</p>									
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_24_2_3, 'dimension_8_24_2_3', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_8_24_2_3, 'dimension_8_24_2_3', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($dimension_8_24_2_3_notes, 'dimension_8_24_2_3_notes');?>
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