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
			
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '5.13.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_5_13_1_1_a, 'dimension_5_13_1_1_a', 'a', 'a1', '5.13.1.1 Do withholding at source arrangements exist for:');?>
				<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">a) Employment income (salaries and wages)?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_5_13_1_1_a, 'dimension_5_13_1_1_a', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_5_13_1_1_a, 'dimension_5_13_1_1_a', '1', 'No');?>								
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">b) Interest income?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_5_13_1_1_b, 'dimension_5_13_1_1_b', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_5_13_1_1_b, 'dimension_5_13_1_1_b', '1', 'No');?>								
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">c) Dividend income paid by public companies to resident taxpayers?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_5_13_1_1_c, 'dimension_5_13_1_1_c', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_5_13_1_1_c, 'dimension_5_13_1_1_c', '1', 'No');?>								
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">d) Other types of income?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_5_13_1_1_d, 'dimension_5_13_1_1_d', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_5_13_1_1_d, 'dimension_5_13_1_1_d', '1', 'No');?>								
							</div>														
						</div>

									<?php form_create_notes_tadat($dimension_5_13_1_1_notes, 'dimension_5_13_1_1_notes');?>
						<?php end_accordion_panel();?>
						<!--END ACCORDION -->	
	<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_5_13_1_2_a, 'dimension_5_13_1_2_a', 'a', 'a2', '5.13.1.2 Are advance payment regimes used to collect income tax from businesses within the year the relevant income is earned?');?>
							<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">a) Are advance payment arrangements in place for CIT?</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_5_13_1_2_a, 'dimension_5_13_1_2_a', '2', 'Yes', 'check_value_a');?>
									<?php form_create_radio_tadat($dimension_5_13_1_2_a, 'dimension_5_13_1_2_a', '1', 'No', 'check_value_a');?>
								</div>
							</div>
							<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">b) Are advance payment arrangements in place for PIT?</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_5_13_1_2_b, 'dimension_5_13_1_2_b', '2', 'Yes', 'check_value_a');?>
									<?php form_create_radio_tadat($dimension_5_13_1_2_b, 'dimension_5_13_1_2_b', '1', 'No', 'check_value_a');?>
								</div>
								
							</div>
							<div id="show_checkedValueA" style="margin-top:10px !important">
										<?php form_create_notes_tadat($dimension_5_13_1_2_notes, 'dimension_5_13_1_2_notes','What is the scope and nature of the advance payment systems?');?>																
							</div>
								
					<?php end_accordion_panel();?>							
					<!--END ACCORDION PANEL -->										
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