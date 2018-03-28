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
		<div class="tab-pane active in fade text-muted" id="dimension_a">
			
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '9.25.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_25_1_1, 'dimension_9_25_1_1', 'a', 'a1', '9.25.1.1 Are levels of public confidence in the tax administration measured (e.g., by way of independent surveys, feedback directly from taxpayers and intermediaries, and formal studies)?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_1, 'dimension_9_25_1_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_1, 'dimension_9_25_1_1', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_9_25_1_1_notes, 'dimension_9_25_1_1_notes');?>
						<?php end_accordion_panel();?>
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_25_1_2, 'dimension_9_25_1_2', 'a', 'a2', '9.25.1.2 What level of confidence was expressed by survey respondents in the most recent survey?');?>
								<div class="answer-wrapper">
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_2, 'dimension_9_25_1_2', '1', 'High level of confidence (greater than 75%)');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer-container">									
										<?php form_create_radio_tadat($dimension_9_25_1_2, 'dimension_9_25_1_2', '2', 'Moderate level of confidence (greater than 50% but lower than 75%)');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer-container">									
										<?php form_create_radio_tadat($dimension_9_25_1_2, 'dimension_9_25_1_2', '3', 'Low level of confidence (greater than 25% but lower than 50%)');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer-container">									
										<?php form_create_radio_tadat($dimension_9_25_1_2, 'dimension_9_25_1_2', '4', 'Not measured at all');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_9_25_1_2_notes, 'dimension_9_25_1_2_notes');?>
						<?php end_accordion_panel();?>
						
					<!--END ACCORDION PANEL -->
					</div>
					
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		
		<div class="tab-pane fade text-muted" id="uploaded"></div>
	</div>
	<div class="saving" style="display:none">SAVING TO DATABASE...</div>
</div>
<?php // if($this->action !== 'completed'){?>
	<div class="form-group mt15">
		<div class="col-xs-12" style="text-align:center !important;">
			<button type="button" id="save_button" class="btn btn-success white-text" formnovalidate><i class="fa fa-save mr5"></i><?php echo $save_button; ?></button>
			<button type="submit" id="submit_button" class="btn btn-primary white-text"><i class="fa fa-check-circle mr5"></i><?php echo $submit_button; ?></button>
		</div>
	</div>
<?php //}	?>
<?php echo form_close();?>
</div>