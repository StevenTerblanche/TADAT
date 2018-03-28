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
		<li class="active"><a href="#dimension_a" data-toggle="tab"><strong>BACKGROUND</strong></a></li>
		<li class=""><a href="#dimension_b" data-toggle="tab"><strong>DIMENSION 1</strong></a></li>
		<li class=""><a href="#dimension_c" data-toggle="tab"><strong>DIMENSION 2</strong></a></li>
		<li class=""><a href="#dimension_d" data-toggle="tab"><strong>DIMENSION 3</strong></a></li>
		<li class=""><a href="#dimension_e" data-toggle="tab"><strong>DIMENSION 4</strong></a></li>				
		<li class=""><a id="uploader" href="#uploaded" data-url="http://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--START TAB PANEL -->
		<div class="tab-pane active in fade text-muted" id="dimension_a">
			
				<?php $numCounter = 0;?>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<!--START ACCORDION PANEL -->
						<?php form_create_memo_tadat($background_a, 'background_a', 'a', 'a1', 'a) What are the statutory filing requirements (frequency, due dates, filing methods) for each of CIT, PIT, VAT, and PAYE withholding?','required-textarea-reason');?>
						<!--END ACCORDION PANEL -->
						<!--START ACCORDION PANEL -->
						<?php start_accordion_panel($strFieldsetStatus, $background_b1, 'background_b1', 'a', 'a2', 'b) is there any \'period of grace\' applied to the statutory due date by the tax administration as a matter of administrative policy?');?>
								<div class="answer-wrapper">
									<p>In the data provided in tables 4-8 (on-time filing) is there any 'period of grace' applied to the statutory due date by the tax administration as a matter of administrative policy (e.g., extra filing days granted after the statutory due date to take into account delays in mail delivery, intervening weekends and public holidays, or more serious events such as natural disasters)</p>
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($background_b1, 'background_b1', '2', 'Yes');?>
										<?php form_create_radio_tadat($background_b1, 'background_b1', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($background_b1_notes, 'background_b1_notes');?>

						<?php end_accordion_panel();?>
						<!--END ACCORDION PANEL -->
						<!--START ACCORDION PANEL -->
						<?php form_create_memo_tadat($background_a, 'background_b', 'a', 'a3', 'c) What organizational unit/s of the tax administration is/are responsible for filing enforcement?','required-textarea-reason');?>
						<!--END ACCORDION PANEL -->
						
					</div>
					
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->

		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_b">
			
				<p><strong><?php $numCounter = 1; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '4.10.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-b">
						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_4_10_1_1, 'dimension_4_10_1_1', 'b', 'b1', '4.10.1.1 What is the on-time filing rate for CIT returns filed for by all taxpayers for the fiscal year?');?>
								<div class="answer-wrapper">
									<p>The Tax Administration indicated that the on-time filing rate for all CIT returns filed for the fiscal year is <strong>
										<?php 
										$dimension_4_10_1_percentage = _get_field_by_id_single_row('cloud_questions', 'pmq_table_4', 'fkidMission', $this->session->userdata('mission_id'), 'filing_cit_percentage_all', '');
										echo $dimension_4_10_1_percentage;
										echo form_hidden('dimension_4_10_1_percentage', $dimension_4_10_1_percentage);
										?>%</strong>. 
									</p>
										<p>Does your research confirm these findings?</p>									
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_4_10_1_1, 'dimension_4_10_1_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_4_10_1_1, 'dimension_4_10_1_1', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($dimension_4_10_1_1_notes, 'dimension_4_10_1_1_notes');?>
						<?php end_accordion_panel();?>
						<!--END ACCORDION -->					
						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_4_10_1_2, 'dimension_4_10_1_2', 'b', 'b2', '4.10.1.2 What is the on-time filing rate for CIT returns filed by large taxpayers for the fiscal year?');?>
								<div class="answer-wrapper">
									<p>The Tax Administration indicated that the on-time filing rate for CIT returns filed by large taxpayers for the fiscal year is <strong>
										<?php 
										$dimension_4_10_2_1_percentage = _get_field_by_id_single_row('cloud_questions', 'pmq_table_4', 'fkidMission', $this->session->userdata('mission_id'), 'filing_cit_percentage_large', '');
										echo $dimension_4_10_2_1_percentage;
										echo form_hidden('dimension_4_10_2_1_percentage', $dimension_4_10_2_1_percentage);
										?>%</strong>. 
									</p>
										<p>Does your research confirm these findings?</p>									
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_4_10_1_2, 'dimension_4_10_1_2', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_4_10_1_2, 'dimension_4_10_1_2', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($dimension_4_10_1_2_notes, 'dimension_4_10_1_2_notes');?>
						<?php end_accordion_panel();?>
						<!--END ACCORDION -->											
					</div>
					<!--END ACCORDION PANEL -->
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->

		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_c">
			
				<p><strong><?php $numCounter = 2; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '4.10.2 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-c">
						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_4_10_2_1, 'dimension_4_10_2_1', 'c', 'c1', '4.10.2.1 What is the on-time filing rate for PIT returns filed for the fiscal year?');?>
								<div class="answer-wrapper">
									<p>The Tax Administration indicated that the on-time filing rate for PIT returns filed for the fiscal year is <strong>
										<?php 
										$dimension_4_10_2_percentage = _get_field_by_id_single_row('cloud_questions', 'pmq_table_5', 'fkidMission', $this->session->userdata('mission_id'), 'filing_pit_percentage_all', '');
										echo $dimension_4_10_2_percentage;
										echo form_hidden('dimension_4_10_2_percentage', $dimension_4_10_2_percentage);
										?>
										%</strong>. 
										</p>
										<p>Does your research confirm these findings?</p>									
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_4_10_2_1, 'dimension_4_10_2_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_4_10_2_1, 'dimension_4_10_2_1', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($dimension_4_10_2_1_notes, 'dimension_4_10_2_1_notes');?>
						<?php end_accordion_panel();?>
						<!--END ACCORDION -->					
					</div>
					<!--END ACCORDION PANEL -->
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->

		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_d">
			
				<p><strong><?php $numCounter = 3; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '4.10.3 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-d">
						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_4_10_3_1, 'dimension_4_10_3_1', 'd', 'd1', '4.10.3.1 What is the on-time filing rate for VAT returns filed by all taxpayers during the 12-month period?');?>
								<div class="answer-wrapper">
									<p>The Tax Administration indicated that the on-time filing rate for VAT returns filed by all taxpayers during the 12-month period is <strong>
										<?php 
										$dimension_4_10_3_percentage = _get_field_by_id_single_row('cloud_questions', 'pmq_table_6', 'fkidMission', $this->session->userdata('mission_id'), 'filing_vat_rate_total', '');
										echo $dimension_4_10_3_percentage;
										echo form_hidden('dimension_4_10_3_percentage', $dimension_4_10_3_percentage);
										?>
										%</strong>. </p>
										<p>Does your research confirm these findings?</p>									
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_4_10_3_1, 'dimension_4_10_3_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_4_10_3_1, 'dimension_4_10_3_1', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($dimension_4_10_3_1_notes, 'dimension_4_10_3_1_notes');?>
						<?php end_accordion_panel();?>
						<!--END ACCORDION -->					

						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_4_10_3_2, 'dimension_4_10_3_2', 'd', 'd2', '4.10.3.2 What is the on-time filing rate for VAT returns filed by large taxpayers during the 12-month period?');?>
								<div class="answer-wrapper">
									<p>The Tax Administration indicated that the on-time filing rate for VAT returns filed by large taxpayers during the 12-month period is <strong>
										<?php 
										$dimension_4_10_3_2_percentage = _get_field_by_id_single_row('cloud_questions', 'pmq_table_7', 'fkidMission', $this->session->userdata('mission_id'), 'filing_vat_large_rate_total', '');
										echo $dimension_4_10_3_2_percentage;
										echo form_hidden('dimension_4_10_3_2_percentage', $dimension_4_10_3_2_percentage);
										?>
										%</strong>. </p>
										<p>Does your research confirm these findings?</p>									
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_4_10_3_2, 'dimension_4_10_3_2', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_4_10_3_2, 'dimension_4_10_3_2', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($dimension_4_10_3_2_notes, 'dimension_4_10_3_2_notes');?>
						<?php end_accordion_panel();?>
						<!--END ACCORDION -->					
						
					</div>
					<!--END ACCORDION PANEL -->
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->
		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_e">
			
				<p><strong><?php $numCounter = 4; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '4.10.4 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-e">
						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_4_10_4_1, 'dimension_4_10_4_1', 'e', 'e1', '4.10.4.1 What is the on-time filing rate for PAYE withholding returns filed during the 12-month period?');?>
								<div class="answer-wrapper">
									<p>The Tax Administration indicated that the on-time filing rate for PAYE withholding returns filed during the 12-month period is <strong>
									<?php 
										$dimension_4_10_4_percentage = _get_field_by_id_single_row('cloud_questions', 'pmq_table_8', 'fkidMission', $this->session->userdata('mission_id'), 'filing_paye_rate_total', '');
										echo form_hidden('dimension_4_10_4_percentage', $dimension_4_10_4_percentage);
										echo $dimension_4_10_4_percentage ;?>%</strong>. 
									</p>
										<p>Does your research confirm these findings?</p>									
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_4_10_4_1, 'dimension_4_10_4_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_4_10_4_1, 'dimension_4_10_4_1', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($dimension_4_10_4_1_notes, 'dimension_4_10_4_1_notes');?>
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
			<button type="button" id="score_button" class="btn btn-primary white-text" formnovalidate><i class="fa fa-save mr5"></i><?php echo $score_button; ?></button>			
		</div>
	</div>
<?php //}	?>
<?php echo form_close();?>
</div>