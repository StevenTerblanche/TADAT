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
		<li class=""><a id="uploader" href="#uploaded" data-url="http://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--START TAB PANEL -->
		<div class="tab-pane active in fade text-muted" id="dimension_a">
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '8.23.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_23_1_1, 'dimension_8_23_1_1', 'a', 'a1', '8.23.1.1 Does the tax administration have an automated accounting system that meets government accounting standards?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_23_1_1, 'dimension_8_23_1_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_8_23_1_1, 'dimension_8_23_1_1', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_8_23_1_1_notes, 'dimension_8_23_1_1_notes');?>
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_23_1_2, 'dimension_8_23_1_2', 'a', 'a2', '8.23.1.2 Does the tax administration\'s accounting system interface with the Ministry of Finance revenue accounting system?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_23_1_2, 'dimension_8_23_1_2', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_8_23_1_2, 'dimension_8_23_1_2', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_8_23_1_2_notes, 'dimension_8_23_1_2_notes');?>
						<?php end_accordion_panel();?>



						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_23_1_3, 'dimension_8_23_1_3', 'a', 'a3', '8.23.1.3 How long, on average, does it take the tax administration to post a payment to a taxpayer\'s account?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_23_1_3, 'dimension_8_23_1_3', '1', '1 Day');?>
										<?php form_create_radio_tadat($dimension_8_23_1_3, 'dimension_8_23_1_3', '2', '2 Days');?>
										<?php form_create_radio_tadat($dimension_8_23_1_3, 'dimension_8_23_1_3', '3', '3 Days');?>										
										<?php form_create_radio_tadat($dimension_8_23_1_3, 'dimension_8_23_1_3', '4', '4+ Days');?>																				
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_8_23_1_3_notes, 'dimension_8_23_1_3_notes');?>
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_23_1_4, 'dimension_8_23_1_4', 'a', 'a4', '8.23.1.4 Do documented procedures exist to routinely and systematically review the taxpayer ledger (especially in respect of accounts of taxpayers that contribute the bulk of core tax revenue) to correct accounting errors and omissions?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_23_1_4, 'dimension_8_23_1_4', '2', 'Yes', 'check_value_a');?>
										<?php form_create_radio_tadat($dimension_8_23_1_4, 'dimension_8_23_1_4', '1', 'No', 'check_value_a');?>
									</div>														
								</div>
							<div id="show_checkedValueA"><!-- START show_checkedValueA -->
								<?php form_create_notes_tadat_validate($dimension_8_23_1_4_a, 'dimension_8_23_1_4_a','required-textarea-reason','8.23.1.4 a) What account reconciliations are performed?');?>
								<?php form_create_notes_tadat_validate($dimension_8_23_1_4_b, 'dimension_8_23_1_4_b','required-textarea-reason','8.23.1.4 b) How often is the suspense account reviewed?');?>
								<?php form_create_notes_tadat_validate($dimension_8_23_1_4_c, 'dimension_8_23_1_4_c','required-textarea-reason','8.23.1.4 c) Is a report of credit balances produced periodically and reviewed?');?>

							</div><!-- END show_checkedValueA -->								
						<?php end_accordion_panel();?>
						
						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_23_1_5, 'dimension_8_23_1_5', 'a', 'a5', '8.23.1.5 For the core taxes, do taxpayers receive or have e-access to a monthly statement of tax liabilities and credit balances?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_23_1_5, 'dimension_8_23_1_5', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_8_23_1_5, 'dimension_8_23_1_5', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_8_23_1_5_notes, 'dimension_8_23_1_5_notes');?>
						<?php end_accordion_panel();?>						

						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_23_1_6, 'dimension_8_23_1_6', 'a', 'a6', '8.23.1.6 Is the tax administration\'s accounting system audited to ensure that it aligns with the tax laws (e.g., to ensure that the system correctly calculates tax liabilities, penalties, and interest) and government accounting standards?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_23_1_6, 'dimension_8_23_1_6', '2', 'Yes', 'check_value_b');?>
										<?php form_create_radio_tadat($dimension_8_23_1_6, 'dimension_8_23_1_6', '1', 'No', 'check_value_b');?>
									</div>														
								</div>
							<div id="show_checkedValueB"><!-- START show_checkedValueB -->
								<?php form_create_notes_tadat_validate($dimension_8_23_1_7, 'dimension_8_23_1_7','required-textarea-reason','8.23.1.7 What account reconciliations are performed?');?>								<div class="answer-wrapper" style="margin-top:25px !important">
									<div class="answer-550" style="width:320px !important">8.23.1.8 Who audits the accounting system?</div>
									<div class="answer-container-550" style="width:420px !important">
										<?php form_create_radio_tadat($dimension_8_23_1_8, 'dimension_8_23_1_8', '1', 'Government Auditor');?>
										<?php form_create_radio_tadat($dimension_8_23_1_8, 'dimension_8_23_1_8', '2', 'Internal Auditor');?>								
										<?php form_create_radio_tadat($dimension_8_23_1_8, 'dimension_8_23_1_8', '3', 'Both');?>																		
									</div>														
								</div>
							</div><!-- END show_checkedValueB -->								
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