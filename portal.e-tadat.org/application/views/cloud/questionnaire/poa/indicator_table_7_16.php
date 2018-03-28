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
		<li class="active"><a href="#dimension_a" data-toggle="tab"><strong>BACKGROUND QUESTIONS</strong></a></li>
		<li class=""><a href="#dimension_b" data-toggle="tab"><strong>DIMENSION 1</strong></a></li>
		<li class=""><a href="#dimension_c" data-toggle="tab"><strong>DIMENSION 2</strong></a></li>				
		<li class=""><a href="#dimension_d" data-toggle="tab"><strong>DIMENSION 3</strong></a></li>						
		<li class=""><a id="uploader" href="#uploaded" data-url="http://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--STATR TAB PANEL -->
		<div class="tab-pane active in fade text-muted" id="dimension_a">
			
				<?php $numCounter = 0;?>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<?php form_create_memo_tadat($background_a, 'background_a', 'a', 'a1', 'a) Under the law, what rights and procedures are available to taxpayers who wish to challenge a tax assessment resulting from a tax audit?','required-textarea-reason');?>
					</div>
					<!--END ACCORDION PANEL -->
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!--END TAB PANEL -->
		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_b">
			
				<p><strong><?php $numCounter = 1; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '7.16.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
				<!--START ACCORDION -->
				<div class="panel-group accordion" id="accordion-b">
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_7_16_1_1, 'dimension_7_16_1_1', 'b', 'b1', '7.16.1.1 To what extent is the mechanism for reviewing objections independent of the audit process?');?>
							<?php form_create_notes_tadat($dimension_7_16_1_1, 'dimension_7_16_1_1');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_7_16_1_2, 'dimension_7_16_1_2', 'b', 'b2', '7.16.1.2 Is there an objection unit that is physically and organizationally separate from the audit department (i.e. a unit located outside the tax audit department with a separate reporting line to senior management)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_7_16_1_2, 'dimension_7_16_1_2', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_7_16_1_2, 'dimension_7_16_1_2', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_7_16_1_2_notes, 'dimension_7_16_1_2_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_7_16_1_3, 'dimension_7_16_1_3', 'b', 'b3', '7.16.1.3 Are objections determined by designated review officers (i.e. appeals officers as opposed to auditors) located in the audit department?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_7_16_1_3, 'dimension_7_16_1_3', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_7_16_1_3, 'dimension_7_16_1_3', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_7_16_1_3_notes, 'dimension_7_16_1_3_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_7_16_1_4, 'dimension_7_16_1_4', 'b', 'b4', '7.16.1.4 Do auditors—separate from those who conducted the audit of the taxpayer—determine the taxpayer\'s objection?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_7_16_1_4, 'dimension_7_16_1_4', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_7_16_1_4, 'dimension_7_16_1_4', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_7_16_1_4_notes, 'dimension_7_16_1_4_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_7_16_1_5, 'dimension_7_16_1_5', 'b', 'b5', '7.16.1.5 Do the auditors who conducted the audit of the taxpayer determine the taxpayer\'s objection?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_7_16_1_5, 'dimension_7_16_1_5', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_7_16_1_5, 'dimension_7_16_1_5', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_7_16_1_5_notes, 'dimension_7_16_1_5_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_7_16_1_6, 'dimension_7_16_1_6', 'b', 'b6', '7.16.1.6 Are objective review procedures applied in the determination of objections?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_7_16_1_6, 'dimension_7_16_1_6', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_7_16_1_6, 'dimension_7_16_1_6', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_7_16_1_6_notes, 'dimension_7_16_1_6_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					
				<!--END ACCORDION -->
				</div>
				<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
			
		</div>
		<!--END TAB PANEL -->	
		
		<!-- ************************************************************ START TAB PANEL ************************************************************ -->
		<div class="tab-pane fade text-muted" id="dimension_c">
			
				<p><strong><?php $numCounter = 2; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '17.6.2 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
				<!--START ACCORDION -->
				<div class="panel-group accordion" id="accordion-c">
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_7_16_2_1, 'dimension_7_16_2_1', 'c', 'c1', '7.16.2.1 Does an independent process within the tax administration for determining objections (generally a single review) or variant thereof exist?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_7_16_2_1, 'dimension_7_16_2_1', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_7_16_2_1, 'dimension_7_16_2_1', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_7_16_2_1_notes, 'dimension_7_16_2_1_notes');?>
					<?php end_accordion_panel();?>
				<!--END ACCORDION -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_7_16_2_2, 'dimension_7_16_2_2', 'c', 'c2', '7.16.2.2 Does a specialist tax disputes tribunal that is external to the tax administration to review cases where the taxpayer is dissatisfied with the outcome of the objection process (an alternative fast-track dispute resolution process involving arbitration may also be in place) or variant thereof exist?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_7_16_2_2, 'dimension_7_16_2_2', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_7_16_2_2, 'dimension_7_16_2_2', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_7_16_2_2_notes, 'dimension_7_16_2_2_notes');?>
					<?php end_accordion_panel();?>
				<!--END ACCORDION -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_7_16_2_3, 'dimension_7_16_2_3', 'c', 'c3', '7.16.2.3 Does a full judicial process to resolve remaining matters of legal interpretation and facts or variant thereof exist?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_7_16_2_3, 'dimension_7_16_2_3', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_7_16_2_3, 'dimension_7_16_2_3', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_7_16_2_3_notes, 'dimension_7_16_2_3_notes');?>
					<?php end_accordion_panel();?>
				<!--END ACCORDION -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_7_16_2_4, 'dimension_7_16_2_4', 'c', 'c4', '7.16.2.4 Is the graduated mechanism of administrative and judicial review <strong>available</strong> to all taxpayers');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_7_16_2_4, 'dimension_7_16_2_4', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_7_16_2_4, 'dimension_7_16_2_4', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_7_16_2_4_notes, 'dimension_7_16_2_4_notes');?>
					<?php end_accordion_panel();?>
				<!--END ACCORDION -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_7_16_2_5, 'dimension_7_16_2_5', 'c', 'c5', '7.16.2.5 Is the graduated mechanism of administrative and judicial review <strong>used</strong> by all taxpayers?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_7_16_2_5, 'dimension_7_16_2_5', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_7_16_2_5, 'dimension_7_16_2_5', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_7_16_2_5_notes, 'dimension_7_16_2_5_notes');?>
					<?php end_accordion_panel();?>
				<!--END ACCORDION -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_7_16_2_6, 'dimension_7_16_2_6', 'c', 'c6', '7.16.2.6 If the dispute mechanism is rarely used, what is the underlying reason for this?');?>
						<div class="answer-wrapper">
							<p>Reasons may include, for example, prohibitive costs of challenging an assessment through the courts; excessive delays in getting a hearing and decision on the matters in dispute; or lack of taxpayer confidence that a fair hearing will be given. On the other hand, the reason may be that the high standards exercised by auditors minimize the causes of dispute (e.g., high level of competency in collecting evidence, correctly applying the law, and providing a clear explanation of the audit findings to the taxpayer including the facts and tax law upon which the assessment is based).</p>
						</div>
						<?php form_create_notes_tadat($dimension_7_16_2_6, 'dimension_7_16_2_6');?>
					<?php end_accordion_panel();?>
				<!--END ACCORDION -->																				
				</div>
				<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
			
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->
		<!-- ************************************************************ START TAB PANEL ************************************************************ -->
		<div class="tab-pane fade text-muted" id="dimension_d">
			
				<p><strong><?php $numCounter = 3; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '17.6.3 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
				<!--START ACCORDION -->
				<div class="panel-group accordion" id="accordion-d">
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_7_16_3_1, 'dimension_7_16_3_1', 'd', 'd1', '7.16.3.1 Is information on the dispute process published?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_7_16_3_1, 'dimension_7_16_3_1', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_7_16_3_1, 'dimension_7_16_3_1', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_7_16_3_1_notes, 'dimension_7_16_3_1_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->					
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_7_16_3_2, 'dimension_7_16_3_2', 'd', 'd2', '7.16.3.2 Are taxpayers explicitly made aware of the dispute process?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_7_16_3_2, 'dimension_7_16_3_2', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_7_16_3_2, 'dimension_7_16_3_2', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_7_16_3_2_notes, 'dimension_7_16_3_2_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->					
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_7_16_3_3, 'dimension_7_16_3_3', 'd', 'd3', '7.16.3.3 Do auditors explicitly inform taxpayers of their right of objection, and dispute procedures, following completion of a tax audit?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_7_16_3_3, 'dimension_7_16_3_3', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_7_16_3_3, 'dimension_7_16_3_3', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_7_16_3_3_notes, 'dimension_7_16_3_3_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->					
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_7_16_3_4, 'dimension_7_16_3_4', 'd', 'd4', '7.16.3.4 Is information on objection rights and dispute procedures included in notices of assessment and/or audit finalization letters sent to taxpayers?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_7_16_3_4, 'dimension_7_16_3_4', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_7_16_3_4, 'dimension_7_16_3_4', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_7_16_3_4_notes, 'dimension_7_16_3_4_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->					
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_7_16_3_5, 'dimension_7_16_3_5', 'd', 'd5', '7.16.3.5 Is information publicly available (e.g., on the tax administration\'s web site)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_7_16_3_5, 'dimension_7_16_3_5', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_7_16_3_5, 'dimension_7_16_3_5', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_7_16_3_5_notes, 'dimension_7_16_3_5_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->																									
				<!--END ACCORDION -->
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
			<button type="submit" id="submit_button" class="btn btn-primary white-text"><i class="fa fa-check-circle mr5"></i><?php echo $submit_button; ?></button>
		</div>
	</div>
<?php //}	?>
<?php echo form_close();?>
</div>