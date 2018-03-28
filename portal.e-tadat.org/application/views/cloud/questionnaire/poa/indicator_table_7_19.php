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
		<li class="active"><a href="#dimension_a" data-toggle="tab"><strong>BACKGROUND QUESTIONS</strong></a></li>
		<li class=""><a href="#dimension_b" data-toggle="tab"><strong>DIMENSION 1</strong></a></li>
		<li class=""><a href="#dimension_c" data-toggle="tab"><strong>DIMENSION 2</strong></a></li>
		<li class=""><a href="#dimension_d" data-toggle="tab"><strong>DIMENSION 3</strong></a></li>				
		<li class=""><a id="uploader" href="#uploaded" data-url="http://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--START TAB PANEL -->
		<div class="tab-pane active in fade text-muted" id="dimension_a">
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '6.18.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<?php form_create_memo_tadat($background_a, 'background_a', 'a', 'a1', 'a) What legal rights and review processes are available to taxpayers who wish to dispute a tax assessment resulting from an audit?','required-textarea-reason');?>
						<?php form_create_memo_tadat($background_b, 'background_b', 'a', 'a2', 'b) Do taxpayers exercise their legal rights in practice?','required-textarea-reason');?>
					</div><!--END ACCORDION PANEL -->
					
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->


		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_b">
				<p><strong><?php $numCounter = 1; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '7.19.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-b">
						<?php start_accordion_panel($strFieldsetStatus, $dimension_7_19_1_1_a, 'dimension_7_19_1_1_a', 'b', 'b1', '7.19.1.1 Does a First Stage tiered review mechanism of the following kind (or variant thereof) exist:');?>
								<div class="answer-wrapper">
									<div class="answer" style="width:450px !important">a) Administrative review (i.e. independent review within the tax administration)?</div>
									<div class="answer-container" style="width:250px !important">
										<?php form_create_radio_tadat($dimension_7_19_1_1_a, 'dimension_7_19_1_1_a', '2', 'Yes', 'check_value_a');?>
										<?php form_create_radio_tadat($dimension_7_19_1_1_a, 'dimension_7_19_1_1_a', '1', 'No', 'check_value_a');?>						
									</div>														
								</div>
							<div id="show_checkedValueA"><!-- START show_checkedValueA -->
								<div class="answer-wrapper">
									<div class="answer" style="width:450px !important">b) Is the review process:</div>
									<div class="answer-container" style="width:250px !important">
										<?php form_create_radio_tadat($dimension_7_19_1_1_b, 'dimension_7_19_1_1_b', '2', 'Single-layered');?>
										<?php form_create_radio_tadat($dimension_7_19_1_1_b, 'dimension_7_19_1_1_b', '1', 'Multi-layered');?>								
									</div>														
								</div>
							</div><!-- END show_checkedValueA -->
								<?php form_create_notes_tadat($dimension_7_19_1_1_notes, 'dimension_7_19_1_1_notes');?>
						<?php end_accordion_panel();?>


						<?php start_accordion_panel($strFieldsetStatus, $dimension_7_19_1_2_a, 'dimension_7_19_1_2_a', 'b', 'b2', '7.19.1.2 Does a Second Stage tiered review mechanism of the following kind (or variant thereof) exist:');?>
								<div class="answer-wrapper">
									<div class="answer-550-h-58">a) An independent specialist tax tribunal, review board or committee, or court where the taxpayer is dissatisfied with the outcome of an administrative review?</div>
									<div class="answer-container-550-h-58">
										<?php form_create_radio_tadat($dimension_7_19_1_2_a, 'dimension_7_19_1_2_a', '2', 'Yes', 'check_value_a');?>
										<?php form_create_radio_tadat($dimension_7_19_1_2_a, 'dimension_7_19_1_2_a', '1', 'No', 'check_value_a');?>						
									</div>														
								</div>
								<div class="answer-wrapper">
									<div class="answer-550">b) Is an alternative fast-track dispute resolution process involving arbitration in place?</div>
									<div class="answer-container-550">
										<?php form_create_radio_tadat($dimension_7_19_1_2_b, 'dimension_7_19_1_2_b', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_7_19_1_2_b, 'dimension_7_19_1_2_b', '1', 'No');?>								
									</div>														
								</div>
								<?php form_create_notes_tadat($dimension_7_19_1_2_notes, 'dimension_7_19_1_2_notes');?>
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_7_19_1_3_a, 'dimension_7_19_1_3_a', 'b', 'b3', '7.19.1.3 Does a Final Stage tiered review mechanism of the following kind (or variant thereof) exist:');?>
								<div class="answer-wrapper">
									<div class="answer-550">c) A higher appellate court to resolve remaining disputes concerning legal interpretation and facts?</div>
									<div class="answer-container-550">
										<?php form_create_radio_tadat($dimension_7_19_1_3_a, 'dimension_7_19_1_3_a', '2', 'Yes', 'check_value_a');?>
										<?php form_create_radio_tadat($dimension_7_19_1_3_a, 'dimension_7_19_1_3_a', '1', 'No', 'check_value_a');?>						
									</div>														
								</div>
								<?php form_create_notes_tadat($dimension_7_19_1_3_notes, 'dimension_7_19_1_3_notes');?>
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_7_19_1_4, 'dimension_7_19_1_4', 'b', 'b4', '7.19.1.4 Is the graduated mechanism of administrative and judicial review available to all taxpayers, and is it used?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer:</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_7_19_1_4, 'dimension_7_19_1_4', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_7_19_1_4, 'dimension_7_19_1_4', '1', 'No');?>								
									</div>														
								</div>
								<?php form_create_notes_tadat($dimension_7_19_1_4_notes, 'dimension_7_19_1_4_notes');?>								
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_7_19_1_5, 'dimension_7_19_1_5', 'b', 'b5', '7.19.1.5 Is the administrative review process perceived by taxpayers to be sound?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer:</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_7_19_1_5, 'dimension_7_19_1_5', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_7_19_1_5, 'dimension_7_19_1_5', '1', 'No');?>								
									</div>														
								</div>
								<?php form_create_notes_tadat($dimension_7_19_1_5_notes, 'dimension_7_19_1_5_notes');?>								
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_7_19_1_6, 'dimension_7_19_1_6', 'b', 'b6', '7.19.1.6 If the dispute mechanism is rarely used, what is the underlying reason for this?');?>
							<?php form_create_notes_tadat($dimension_7_19_1_6, 'dimension_7_19_1_6','Reasons may include, for example, prohibitive costs of challenging an assessment through the courts; excessive delays in getting a hearing and decision on the matters in dispute; or lack of taxpayer confidence that a fair hearing will be given. On the other hand, the reason may be that the high standards exercised by auditors minimize the causes of dispute (e.g., high level of competency in collecting evidence, correctly applying the law, and providing a clear explanation of the audit findings to the taxpayer including the facts and tax law upon which the assessment is based).');?>								
						<?php end_accordion_panel();?>
					
					</div><!--END ACCORDION PANEL -->
					
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->

		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_c">
				<p><strong><?php $numCounter = 2; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '7.19.2 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-c">
						<?php start_accordion_panel($strFieldsetStatus, $dimension_7_19_2_1_a, 'dimension_7_19_2_1_a', 'c', 'c1', '7.19.2.1 To what extent is the administrative review process independent of the audit process?');?>
								<div class="answer-wrapper">
									<div class="answer-550-h-78">a) Is there an administrative review unit that is physically and organizationally separate from the audit department (i.e. a unit located outside the tax audit department with a separate reporting line to senior management)?</div>
									<div class="answer-container-550-h-78">
										<?php form_create_radio_tadat($dimension_7_19_2_1_a, 'dimension_7_19_2_1_a', '1', 'Yes');?>	
									</div>														
								</div>
								<div style="width:625px !important; margin-top:10px !important; margin-bottom:10px !important; line-height:20px !important; text-align:center !important; font-weight:bold !important">OR</div>
								<div class="answer-wrapper">
									<div class="answer-550-h-58">b) Are administrative reviews undertaken by designated review officers (i.e. as opposed to auditors) located in the audit department?</div>
									<div class="answer-container-550-h-58">
										<?php form_create_radio_tadat($dimension_7_19_2_1_a, 'dimension_7_19_2_1_a', '2', 'Yes');?>	
									</div>														
								</div>
								<div style="width:625px !important; margin-top:10px !important; margin-bottom:10px !important; line-height:20px !important; text-align:center !important; font-weight:bold !important">OR</div>
								<div class="answer-wrapper">
									<div class="answer-550-h-58">c) Do auditors — separate from those who conducted the audit of the taxpayer — conduct administrative reviews?</div>
									<div class="answer-container-550-h-58">
										<?php form_create_radio_tadat($dimension_7_19_2_1_a, 'dimension_7_19_2_1_a', '3', 'Yes');?>	
									</div>														
								</div>
								<div style="width:625px !important; margin-top:10px !important; margin-bottom:10px !important; line-height:20px !important; text-align:center !important; font-weight:bold !important">OR</div>
								<div class="answer-wrapper">
									<div class="answer-550-h-58">d) Does the auditor who conducted the audit of the taxpayer also undertake the administrative review of the taxpayer?</div>
									<div class="answer-container-550-h-58">
										<?php form_create_radio_tadat($dimension_7_19_2_1_a, 'dimension_7_19_2_1_a', '4', 'Yes');?>	
									</div>														
								</div>
							<?php form_create_notes_tadat($dimension_7_19_2_1_notes, 'dimension_7_19_2_1_notes');?>
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_7_19_2_b, 'dimension_7_19_2_b', 'c', 'c2', '7.19.2.2 Are objective review procedures applied in administrative reviews?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer:</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_7_19_2_b, 'dimension_7_19_2_b', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_7_19_2_b, 'dimension_7_19_2_b', '1', 'No');?>								
									</div>														
								</div>
								<?php form_create_notes_tadat($dimension_7_19_2_2_notes, 'dimension_7_19_2_2_notes');?>								
						<?php end_accordion_panel();?>
				
					</div><!--END ACCORDION PANEL -->
					
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->
		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_d">
				<p><strong><?php $numCounter = 3; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '7.19.3 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-d">
						<?php start_accordion_panel($strFieldsetStatus, $dimension_7_19_3_1, 'dimension_7_19_3_1', 'd', 'd1', '7.19.3.1 Is information on the dispute resolution process published?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer:</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_7_19_3_1, 'dimension_7_19_3_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_7_19_3_1, 'dimension_7_19_3_1', '1', 'No');?>						
									</div>														
								</div>
								<?php form_create_notes_tadat($dimension_7_19_3_1_notes, 'dimension_7_19_3_1_notes');?>
						<?php end_accordion_panel();?>





						<?php start_accordion_panel($strFieldsetStatus, $dimension_7_19_3_2, 'dimension_7_19_3_2', 'd', 'd2', '7.19.3.2 Are taxpayers explicitly made aware of the dispute resolution process?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer:</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_7_19_3_2, 'dimension_7_19_3_2', '2', 'Yes', 'check_value_b');?>
										<?php form_create_radio_tadat($dimension_7_19_3_2, 'dimension_7_19_3_2', '1', 'No', 'check_value_b');?>						
									</div>														
								</div>
							<div id="show_checkedValueB" style="margin-top:28px !important"><!-- START show_checkedValueB -->

								<div class="answer-wrapper">
									<div class="answer-550-h-58">a) Do auditors explicitly inform taxpayers of their right of dispute, and dispute resolution procedures, following completion of a tax audit?</div>
									<div class="answer-container-550-h-58">
										<?php form_create_radio_tadat($dimension_7_19_3_2_a, 'dimension_7_19_3_2_a', '2', 'Yes');?>	
										<?php form_create_radio_tadat($dimension_7_19_3_2_a, 'dimension_7_19_3_2_a', '1', 'No');?>											
									</div>														
								</div>
								<div style="width:625px !important; margin-top:10px !important; margin-bottom:10px !important; line-height:20px !important; text-align:center !important; font-weight:bold !important">AND/OR</div>
								<div class="answer-wrapper">
									<div class="answer-550-h-58">b) Is information on dispute rights and dispute resolution procedures included in notices of assessment and/or audit finalization letters sent to taxpayers?</div>
									<div class="answer-container-550-h-58">
										<?php form_create_radio_tadat($dimension_7_19_3_2_b, 'dimension_7_19_3_2_b', '2', 'Yes');?>	
										<?php form_create_radio_tadat($dimension_7_19_3_2_b, 'dimension_7_19_3_2_b', '1', 'No');?>											
									</div>														
								</div>
								<div style="width:625px !important; margin-top:10px !important; margin-bottom:10px !important; line-height:20px !important; text-align:center !important; font-weight:bold !important">AND/OR</div>
								<div class="answer-wrapper">
									<div class="answer-550-h-58" style="line-height:50px !important">c) Is information publicly available (e.g., on the tax administration's web site)?</div>
									<div class="answer-container-550-h-58">
										<?php form_create_radio_tadat($dimension_7_19_3_2_c, 'dimension_7_19_3_2_c', '2', 'Yes');?>	
										<?php form_create_radio_tadat($dimension_7_19_3_2_c, 'dimension_7_19_3_2_c', '1', 'No');?>											
									</div>														
								</div>
							</div><!-- END show_checkedValueB -->
								<?php form_create_notes_tadat($dimension_7_19_3_2_notes, 'dimension_7_19_3_2_notes');?>
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