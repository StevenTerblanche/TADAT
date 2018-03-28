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
		<li class=""><a id="uploader" href="#uploaded" data-url="http://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--START TAB PANEL -->
		<div class="tab-pane fade active in text-muted" id="dimension_a">
			
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '2.4.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
				<!--START ACCORDION -->
				<div class="panel-group accordion" id="accordion-a">
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_4_1_1, 'dimension_2_4_1_1', 'a', 'a1', '2.4.1.1 Does the tax administration have a compliance improvement program to mitigate the effects of identified risks to the tax system?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_4_1_1, 'dimension_2_4_1_1', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_4_1_1, 'dimension_2_4_1_1', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_4_1_1_notes, 'dimension_2_4_1_1_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_4_1_2, 'dimension_2_4_1_2', 'a', 'a2', '2.4.1.2 Does the compliance program include planned mitigation actions in respect of CIT?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_4_1_2, 'dimension_2_4_1_2', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_4_1_2, 'dimension_2_4_1_2', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_4_1_2_notes, 'dimension_2_4_1_2_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_4_1_3, 'dimension_2_4_1_3', 'a', 'a3', '2.4.1.3  Does the compliance program include planned mitigation actions in respect of PIT?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_4_1_3, 'dimension_2_4_1_3', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_4_1_3, 'dimension_2_4_1_3', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_4_1_3_notes, 'dimension_2_4_1_3_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_4_1_4, 'dimension_2_4_1_4', 'a', 'a4', '2.4.1.4  Does the compliance program include planned mitigation actions in respect of VAT?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_4_1_4, 'dimension_2_4_1_4', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_4_1_4, 'dimension_2_4_1_4', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_4_1_4_notes, 'dimension_2_4_1_4_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_4_1_5, 'dimension_2_4_1_5', 'a', 'a5', '2.4.1.5  Does the compliance program include planned mitigation actions in respect of PAYE?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_4_1_5, 'dimension_2_4_1_5', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_4_1_5, 'dimension_2_4_1_5', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_4_1_5_notes, 'dimension_2_4_1_5_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->


















					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_4_1_6, 'dimension_2_4_1_6', 'a', 'a6', '2.4.1.6 Does the compliance program include planned mitigation actions in respect of the major taxpayer segments, including (as a minimum) large, medium-size, and small businesses?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_4_1_6, 'dimension_2_4_1_6', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_4_1_6, 'dimension_2_4_1_6', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_4_1_6_notes, 'dimension_2_4_1_6_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_4_1_7, 'dimension_2_4_1_7', 'a', 'a7', '2.4.1.7 Does the compliance program include planned mitigation actions in respect of risks associated with the four main compliance obligations of taxpayers (registration, filing, payment, and accurate reporting in returns)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_4_1_7, 'dimension_2_4_1_7', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_4_1_7, 'dimension_2_4_1_7', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_4_1_7_notes, 'dimension_2_4_1_7_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_4_1_8, 'dimension_2_4_1_8', 'a', 'a8', '2.4.1.8 Does the compliance program include planned mitigation actions in respect of all risks assessed as \'high\'?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_4_1_8, 'dimension_2_4_1_8', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_4_1_8, 'dimension_2_4_1_8', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_4_1_8_notes, 'dimension_2_4_1_8_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_4_1_9, 'dimension_2_4_1_9', 'a', 'a9', '2.4.1.9 Does the compliance program also cover less serious risks where a watching brief, rather than active management, is appropriate to ensure that any further erosion of compliance is quickly identified and reconsidered?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_4_1_9, 'dimension_2_4_1_9', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_4_1_9, 'dimension_2_4_1_9', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_4_1_9_notes, 'dimension_2_4_1_9_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_4_1_10, 'dimension_2_4_1_10', 'a', 'a10', '2.4.1.10 Does the compliance program cover multiple years or a single year only?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_4_1_10, 'dimension_2_4_1_10', '2', 'Multiple Years');?>
									<?php form_create_radio_tadat($dimension_2_4_1_10, 'dimension_2_4_1_10', '1', 'Single Years');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_4_1_10_notes, 'dimension_2_4_1_10_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_4_1_11, 'dimension_2_4_1_11', 'a', 'a11', '2.4.1.11 Is the compliance program current?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer:</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_4_1_11, 'dimension_2_4_1_11', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_4_1_11, 'dimension_2_4_1_11', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_4_1_11_notes, 'dimension_2_4_1_11_notes');?>
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