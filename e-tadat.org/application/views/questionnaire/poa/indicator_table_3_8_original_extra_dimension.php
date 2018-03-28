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
		<li class=""><a id="uploader" href="#uploaded" data-url="https://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--START TAB PANEL -->
		<div class="tab-pane active in fade text-muted" id="dimension_a">
			
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '3.8.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_8_1_1, 'dimension_3_8_1_1', 'a', 'a1', '3.8.1.1 Are simplified record keeping and reporting arrangements available to small taxpayers?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_8_1_1, 'dimension_3_8_1_1', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_8_1_1, 'dimension_3_8_1_1', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_8_1_1_notes, 'dimension_3_8_1_1_notes');?>
					<?php end_accordion_panel();?>
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_8_1_2, 'dimension_3_8_1_2', 'a', 'a2', '3.8.1.2 Are simplified filing arrangements in place for individuals with relatively simple tax obligations (e.g., employees, retirees, and passive investors)?');?>
							<div class="answer-wrapper">
							<p>An example of simplified filing arrangements may be pre-filled tax declarations and notification of 'nil' tax declarations via automated telephone systems or online) and/or systems that eliminate the need to file (e.g., where income tax withheld at source is treated as a final tax)</p>
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_8_1_2, 'dimension_3_8_1_2', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_8_1_2, 'dimension_3_8_1_2', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_8_1_2_notes, 'dimension_3_8_1_2_notes');?>
					<?php end_accordion_panel();?>					

					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_8_1_3, 'dimension_3_8_1_3', 'a', 'a3', '3.8.1.3 Are taxpayers and their authorized agents able to access registration and tax account details online (e.g., via a taxpayer portal)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_8_1_3, 'dimension_3_8_1_3', '2', 'Yes', 'check_value_a');?>
									<?php form_create_radio_tadat($dimension_3_8_1_3, 'dimension_3_8_1_3', '1', 'No', 'check_value_a');?>
								</div>
							</div>
							<div id="show_checkedValueA" style="margin-top:10px !important">
									<?php form_create_notes_tadat_validate($dimension_3_8_1_3_notes, 'dimension_3_8_1_3_notes','tadat-notes','3.8.1.3.1 What mechanisms are in place to protect the integrity and confidentiality of taxpayer data that is accessible online?');?>
							</div>
					<?php end_accordion_panel();?>
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_8_1_4, 'dimension_3_8_1_4', 'a', 'a4', '3.8.1.4 Are frequently asked questions and common misunderstandings of the law detected through verification and other outreach activities monitored to help target and refine taxpayer information products and services?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_8_1_4, 'dimension_3_8_1_4', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_8_1_4, 'dimension_3_8_1_4', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_8_1_4_notes, 'dimension_3_8_1_4_notes');?>
					<?php end_accordion_panel();?>
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_8_1_5, 'dimension_3_8_1_5', 'a', 'a5', '3.8.1.5 Are the design and content of tax declarations and other taxpayer forms reviewed regularly to ensure that obsolete and superfluous data items are removed?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_8_1_5, 'dimension_3_8_1_5', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_8_1_5, 'dimension_3_8_1_5', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_8_1_5_notes, 'dimension_3_8_1_5_notes');?>
					<?php end_accordion_panel();?>

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_8_1_6, 'dimension_3_8_1_6', 'a', 'c6', '3.8.1.6 What other measures are taken to reduce or minimize taxpayer compliance costs (e.g., use of electronic payment facilities; publication of tax rulings; and/or inter-agency data sharing to reduce taxpayer reporting burdens)?');?>
							<?php form_create_notes_tadat_validate($dimension_3_8_1_6, 'dimension_3_8_1_6','required-textarea-reason');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					
					
					</div>
					<!--END ACCORDION PANEL -->
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->
		
		<!-- ************************************************************ START TAB PANEL ************************************************************ -->
		<div class="tab-pane fade text-muted" id="dimension_b">
			
				<p><strong><?php $numCounter = 1; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '3.8.2 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
				<!--START ACCORDION -->
				<div class="panel-group accordion" id="accordion-b">
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_8_2_1, 'dimension_3_8_2_1', 'b', 'b1', '3.8.2.1 In what percentage of cases are substantive replies to written enquiries (received via letter and email) sent to taxpayers and intermediaries within 30 calendar days?');?>
							<div class="answer-wrapper">
							<?php //$dimension_3_8_2_2 = _get_field_by_id_single_row('db_b', 'pmq_table_10', 'fkidMission', $this->session->userdata('mission_id'), 'process_correspond', '');?>
							<?php $dimension_3_8_2_2 = 0;?>
							<p>The Tax Administration indicated that this percentage is <strong><?php echo $dimension_3_8_2_2; ?>%</strong> over a period of 30 calendar days. Does your research confirm these findings</p>
								<?php echo form_hidden('dimension_3_8_2_2', $dimension_3_8_2_2);?>
							</div>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_8_2_1, 'dimension_3_8_2_1', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_8_2_1, 'dimension_3_8_2_1', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_8_2_1_notes, 'dimension_3_8_2_1_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
			
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