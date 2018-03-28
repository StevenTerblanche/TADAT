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
			
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '2.5.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
				<!--START ACCORDION -->
				<div class="panel-group accordion" id="accordion-a">
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_5_1_1, 'dimension_2_5_1_1', 'a', 'a1', '2.5.1.1 Does the tax administration monitor progress and evaluate the impact of risk mitigation initiatives?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_5_1_1, 'dimension_2_5_1_1', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_5_1_1, 'dimension_2_5_1_1', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_5_1_1_notes, 'dimension_2_5_1_1_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_5_1_2, 'dimension_2_5_1_2', 'a', 'a2', '2.5.1.2 Are regular reports on progress of risk mitigation actions monitored at senior management level in the tax administration?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_5_1_2, 'dimension_2_5_1_2', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_5_1_2, 'dimension_2_5_1_2', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_5_1_2_notes, 'dimension_2_5_1_2_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_5_1_3, 'dimension_2_5_1_3', 'a', 'a3', '2.5.1.3 Has the tax administration quantified the compliance impact—including the impact on tax revenue collections and compliance behavior of taxpayers—of the main risk mitigation activities undertaken during the past 1-2 years?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_5_1_3, 'dimension_2_5_1_3', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_5_1_3, 'dimension_2_5_1_3', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_5_1_3_notes, 'dimension_2_5_1_3_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_5_1_4, 'dimension_2_5_1_4', 'a', 'a4', '2.5.1.4 Does the tax administration alert policy makers routinely or on an ad-hoc basis of weaknesses in the law that have exposed the tax system to high levels of risk (e.g., aggressive tax planning practices involving contrived schemes to avoid tax) during the past 1-2 years?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_5_1_4, 'dimension_2_5_1_4', '2', 'Routinely');?>
									<?php form_create_radio_tadat($dimension_2_5_1_4, 'dimension_2_5_1_4', '1', 'Ad-hoc');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_5_1_4_notes, 'dimension_2_5_1_4_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_5_1_5, 'dimension_2_5_1_5', 'a', 'a5', '2.5.1.5 Is it usual practice to document findings from compliance risk mitigation activities and feed the findings back into the process of developing future compliance improvement programs?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_5_1_5, 'dimension_2_5_1_5', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_5_1_5, 'dimension_2_5_1_5', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_5_1_5_notes, 'dimension_2_5_1_5_notes');?>
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