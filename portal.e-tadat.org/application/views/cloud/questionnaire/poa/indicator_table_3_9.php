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
		<li class=""><a href="#dimension_b" data-toggle="tab"><strong>DIMENSION 2</strong></a></li>
		<li class=""><a id="uploader" href="#uploaded" data-url="http://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--START TAB PANEL -->
		<div class="tab-pane active in fade text-muted" id="dimension_a">
			
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '3.9.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_9_1_1, 'dimension_3_9_1_1', 'a', 'a1', '3.9.1.1 What methods, if any, are used to obtain feedback from taxpayers about the standard of tax administration services? Specifically, is feedback obtained by way of:');?>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">a) Perception surveys?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_9_1_2, 'dimension_3_9_1_2', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_3_9_1_2, 'dimension_3_9_1_2', '1', 'No');?>								
							</div>
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">b) Meetings with stakeholders (e.g., chambers of commerce; peak industry bodies; and tax intermediaries)?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_9_1_3, 'dimension_3_9_1_3', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_3_9_1_3, 'dimension_3_9_1_3', '1', 'No');?>								
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">c) Public Forums?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_9_1_4, 'dimension_3_9_1_4', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_3_9_1_4, 'dimension_3_9_1_4', '1', 'No');?>								
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">d) Surveys via e-mail?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_9_1_5, 'dimension_3_9_1_5', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_3_9_1_5, 'dimension_3_9_1_5', '1', 'No');?>								
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">e) Surveys via telephone?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_9_1_6, 'dimension_3_9_1_6', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_3_9_1_6, 'dimension_3_9_1_6', '1', 'No');?>								
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">f) Surveys via website?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_9_1_7, 'dimension_3_9_1_7', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_3_9_1_7, 'dimension_3_9_1_7', '1', 'No');?>								
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">g) Day-to-day interactions with taxpayers in public contact centers?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_9_1_8, 'dimension_3_9_1_8', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_3_9_1_8, 'dimension_3_9_1_8', '1', 'No');?>								
							</div>														
						</div>
						<?php form_create_notes_tadat($dimension_3_9_1_1, 'dimension_3_9_1_1');?>
					<?php end_accordion_panel();?>
					
					
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_9_1_9, 'dimension_3_9_1_9', 'a', 'a9', '3.9.1.9 How often are perception surveys conducted?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_9_1_9, 'dimension_3_9_1_9', '2', 'Every 1 to 3 years ');?>
									<?php form_create_radio_tadat($dimension_3_9_1_9, 'dimension_3_9_1_9', '1', 'Every 5 years ');?>									
									<?php form_create_radio_tadat($dimension_3_9_1_9, 'dimension_3_9_1_9', '3', 'On an ad-hoc basis');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_9_1_9_notes, 'dimension_3_9_1_9_notes');?>
					<?php end_accordion_panel();?>					


					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_9_1_10, 'dimension_3_9_1_10', 'a', 'a10', '3.9.1.10 How often are other feedback mechanisms (e.g., stakeholder meetings) employed?');?>
							<?php form_create_notes_tadat($dimension_3_9_1_10, 'dimension_3_9_1_10');?>
					<?php end_accordion_panel();?>										
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_9_1_11, 'dimension_3_9_1_11', 'a', 'a11', '3.9.1.11 Are perception surveys conducted by independent third parties? Or are they conducted by the tax administration itself?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_9_1_11, 'dimension_3_9_1_11', '2', 'Independent third parties');?>
									<?php form_create_radio_tadat($dimension_3_9_1_11, 'dimension_3_9_1_11', '1', 'Tax administration');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_9_1_11_notes, 'dimension_3_9_1_11_notes');?>
					<?php end_accordion_panel();?>					
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_9_1_12, 'dimension_3_9_1_12', 'a', 'a12', '3.9.1.12 Is performance feedback obtained from key taxpayer segments (e.g., large, medium-size, and small business segments, and non-business individuals)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_9_1_12, 'dimension_3_9_1_12', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_9_1_12, 'dimension_3_9_1_12', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_9_1_12_notes, 'dimension_3_9_1_12_notes');?>
					<?php end_accordion_panel();?>					
					</div>
					<!--END ACCORDION PANEL -->
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->
		
		<!-- ************************************************************ START TAB PANEL ************************************************************ -->
		<div class="tab-pane fade text-muted" id="dimension_b">
			
				<p><strong><?php $numCounter = 1; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '3.9.2 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
				<!--START ACCORDION -->
				<div class="panel-group accordion" id="accordion-b">
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_9_2_1, 'dimension_3_9_2_1', 'b', 'b1', '3.9.2.1 Does the tax administration take account of taxpayer input in the design of taxpayer service programs and products?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_9_2_1, 'dimension_3_9_2_1', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_9_2_1, 'dimension_3_9_2_1', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_9_2_1_notes, 'dimension_3_9_2_1_notes');?>
					<?php end_accordion_panel();?>
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_9_2_2, 'dimension_3_9_2_2', 'b', 'b2', '3.9.2.2 If so, is this done in a routine and systematic way (e.g., the tax administration regularly uses taxpayer focus groups to test form designs and other products and services)? Or is it done on an ad hoc basis?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_9_2_2, 'dimension_3_9_2_2', '2', 'Routine and systematic');?>
									<?php form_create_radio_tadat($dimension_3_9_2_2, 'dimension_3_9_2_2', '1', 'Routine but LESS systematic');?>									
									<?php form_create_radio_tadat($dimension_3_9_2_2, 'dimension_3_9_2_2', '3', 'Ad hoc');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_9_2_2_notes, 'dimension_3_9_2_2_notes');?>
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