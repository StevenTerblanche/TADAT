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
		<li class=""><a href="#dimension_c" data-toggle="tab"><strong>DIMENSION 3</strong></a></li>		
		<li class=""><a id="uploader" href="#uploaded" data-url="http://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--START TAB PANEL -->
		<div class="tab-pane active in fade text-muted" id="dimension_a">
			
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '9.24.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_24_1_1, 'dimension_9_24_1_1', 'a', 'a1', '9.24.1.1 Are the internal controls adopted by the tax administration fully documented?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_1_1, 'dimension_9_24_1_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_1_1, 'dimension_9_24_1_1', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_9_24_1_1_notes, 'dimension_9_24_1_1_notes');?>
						<?php end_accordion_panel();?>
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_24_1_2_1, 'dimension_9_24_1_2_1', 'a', 'a2', '9.24.1.2 Do the internal controls cover the following key operations?');?>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">a) Registration</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_1_2_1, 'dimension_9_24_1_2_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_1_2_1, 'dimension_9_24_1_2_1', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">b) Filing</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_1_2_2, 'dimension_9_24_1_2_2', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_1_2_2, 'dimension_9_24_1_2_2', '1', 'No');?>
									</div>
								</div>

								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">c) Assessment</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_1_2_3, 'dimension_9_24_1_2_3', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_1_2_3, 'dimension_9_24_1_2_3', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">d) Payment processing</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_1_2_4, 'dimension_9_24_1_2_4', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_1_2_4, 'dimension_9_24_1_2_4', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">e) Debt Collection</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_1_2_5, 'dimension_9_24_1_2_5', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_1_2_5, 'dimension_9_24_1_2_5', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">f) Audits and investigations</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_1_2_6, 'dimension_9_24_1_2_6', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_1_2_6, 'dimension_9_24_1_2_6', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">g) Taxpayer accounting</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_1_2_7, 'dimension_9_24_1_2_7', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_1_2_7, 'dimension_9_24_1_2_7', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">h) Internal financial management</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_1_2_8, 'dimension_9_24_1_2_8', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_1_2_8, 'dimension_9_24_1_2_8', '1', 'No');?>
									</div>
								</div>
								
							<?php form_create_notes_tadat($dimension_9_24_1_2_notes, 'dimension_9_24_1_2_notes');?>
						<?php end_accordion_panel();?>
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_24_1_3_1, 'dimension_9_24_1_3_1', 'a', 'a3', '9.24.1.3 Are the internal controls comprehensive, i.e. are the following areas covered:');?>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">a) IT system controls</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_1_3_1, 'dimension_9_24_1_3_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_1_3_1, 'dimension_9_24_1_3_1', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">b) Functional separation of duties</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_1_3_2, 'dimension_9_24_1_3_2', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_1_3_2, 'dimension_9_24_1_3_2', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">c) Authorization of transactions</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_1_3_3, 'dimension_9_24_1_3_3', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_1_3_3, 'dimension_9_24_1_3_3', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">d) Accounting reconciliations</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_1_3_4, 'dimension_9_24_1_3_4', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_1_3_4, 'dimension_9_24_1_3_4', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">e) Physical safeguards to protect the tax administration's assets</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_1_3_5, 'dimension_9_24_1_3_5', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_1_3_5, 'dimension_9_24_1_3_5', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">f) Supervision and monitoring of operations</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_1_3_6, 'dimension_9_24_1_3_6', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_1_3_6, 'dimension_9_24_1_3_6', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_9_24_1_3_notes, 'dimension_9_24_1_3_notes');?>
						<?php end_accordion_panel();?>
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_24_1_4, 'dimension_9_24_1_4', 'a', 'a4', '9.24.1.4 How often is the internal control documentation reviewed and updated?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_1_4, 'dimension_9_24_1_4', '2', 'Continuously');?>
										<?php form_create_radio_tadat($dimension_9_24_1_4, 'dimension_9_24_1_4', '1', 'Annually');?>
										<?php form_create_radio_tadat($dimension_9_24_1_4, 'dimension_9_24_1_4', '3', 'Every 2 to 3 years');?>										
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_9_24_1_4_notes, 'dimension_9_24_1_4_notes');?>
						<?php end_accordion_panel();?>

						
					<!--END ACCORDION PANEL -->
					</div>
					
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->

		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_b">
			
				<p><strong><?php $numCounter = 1; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '9.24.2 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-b">
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_24_2_1, 'dimension_9_24_2_1', 'b', 'b1', '9.24.2.1 Does the tax administration have an organizationally independent and trained internal audit unit?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_2_1, 'dimension_9_24_2_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_2_1, 'dimension_9_13_2_1', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_9_24_2_1_notes, 'dimension_9_24_2_1_notes');?>
						<?php end_accordion_panel();?>
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_24_2_2_1, 'dimension_9_24_2_2_1', 'b', 'b2', '9.24.2.2 To whom does the tax administration internal audit unit report to?');?>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">a) Tax administration head</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_2_2_1, 'dimension_9_24_2_2_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_2_2_1, 'dimension_9_24_2_2_1', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">b) The Board</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_2_2_2, 'dimension_9_24_2_2_2', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_2_2_2, 'dimension_9_24_2_2_2', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">c) Audit committee</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_2_2_3, 'dimension_9_24_2_2_3', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_2_2_3, 'dimension_9_24_2_2_3', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_9_24_2_1_notes, 'dimension_9_24_2_1_notes');?>
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_24_2_3_1, 'dimension_9_24_2_3_1', 'b', 'b3', '9.24.2.3 Does the documented annual audit program comprise of:');?>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">a) Internal control checks</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_2_3_1, 'dimension_9_24_2_3_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_2_3_1, 'dimension_9_24_2_3_1', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">b) System based performance audits</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_2_3_2, 'dimension_9_24_2_3_2', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_2_3_2, 'dimension_9_24_2_3_2', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">c) Financial audits</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_2_3_3, 'dimension_9_24_2_3_3', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_2_3_3, 'dimension_9_24_2_3_3', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_9_24_2_3_notes, 'dimension_9_24_2_3_notes');?>
						<?php end_accordion_panel();?>						

						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_24_2_4_1, 'dimension_9_24_2_4_1', 'b', 'b4', '9.24.2.4 Does the annual audit program provide wide coverage and scrutiny of:');?>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">a) All key operations</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_2_4_1, 'dimension_9_24_2_4_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_2_4_1, 'dimension_9_24_2_4_1', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">b) Revenue accounting</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_2_4_2, 'dimension_9_24_2_4_2', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_2_4_2, 'dimension_9_24_2_4_2', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">c) Internal financial management</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_2_4_3, 'dimension_9_24_2_4_3', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_2_4_3, 'dimension_9_24_2_4_3', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_9_24_2_4_notes, 'dimension_9_24_2_4_notes');?>
						<?php end_accordion_panel();?>						

					
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_24_2_5, 'dimension_9_24_2_5', 'b', 'b5', '9.24.2.5 Does the tax administration have an audit committee?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_2_5, 'dimension_9_24_2_5', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_2_5, 'dimension_9_24_2_5', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_9_24_2_5_notes, 'dimension_9_24_2_5_notes');?>
						<?php end_accordion_panel();?>
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_24_2_6, 'dimension_9_24_2_6', 'b', 'b6', '9.24.2.6 Does the tax administration have a documented annual internal audit program?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_2_6, 'dimension_9_24_2_6', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_2_6, 'dimension_9_24_2_6', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_9_24_2_6_notes, 'dimension_9_24_2_6_notes');?>
						<?php end_accordion_panel();?>
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_24_2_7_notes, 'dimension_9_24_2_7_notes', 'b', 'b7', '9.24.2.7 How many auditors are employed in the internal audit unit? What audit skills do they have?');?>
							<?php form_create_notes_tadat($dimension_9_24_2_7_notes, 'dimension_9_24_2_7_notes');?>
						<?php end_accordion_panel();?>
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_24_2_8, 'dimension_9_24_2_8', 'b', 'b8', '9.24.2.8 To what extent are internal audit findings and recommendations acted upon?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_2_8, 'dimension_9_24_2_8', '2', 'Frequently');?>
										<?php form_create_radio_tadat($dimension_9_24_2_8, 'dimension_9_24_2_8', '1', 'Infrequently');?>
										<?php form_create_radio_tadat($dimension_9_24_2_8, 'dimension_9_24_2_8', '3', 'Never');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_9_24_2_8_notes, 'dimension_9_24_2_8_notes');?>
						<?php end_accordion_panel();?>
						

					</div>
					<!--END ACCORDION PANEL -->
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->
		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_c">
			
				<p><strong><?php $numCounter = 2; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '9.24.3 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-c">
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_24_3_1, 'dimension_9_24_3_1', 'c', 'c1', '9.24.3.1 Does the tax administration have an internal affairs unit?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_3_1, 'dimension_9_24_3_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_3_1, 'dimension_9_24_3_1', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_9_24_3_1_notes, 'dimension_9_24_3_1_notes');?>								
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_24_3_2, 'dimension_9_24_3_2', 'c', 'c2', '9.24.3.2 Does the internal affairs unit report directly to the tax administration head or deputy head?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_3_2, 'dimension_9_24_3_2', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_3_2, 'dimension_9_24_3_2', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_9_24_3_2_notes, 'dimension_9_24_3_2_notes');?>
						<?php end_accordion_panel();?>


						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_24_3_3, 'dimension_9_24_3_3', 'c', 'c3', '9.24.3.3 Does the internal affairs unit have investigative powers and exercises these powers with due process?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_3_3, 'dimension_9_24_3_3', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_3_3, 'dimension_9_24_3_3', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_9_24_3_3_notes, 'dimension_9_24_3_3_notes','What are these investigative powers?');?>
						<?php end_accordion_panel();?>
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_24_3_4, 'dimension_9_24_3_4', 'c', 'c4', '9.24.3.4 Does the internal affairs unit provide leadership in the formulation of integrity and ethics policy, including codes of conduct?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_3_4, 'dimension_9_24_3_4', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_3_4, 'dimension_9_24_3_4', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_9_24_3_4_notes, 'dimension_9_24_3_4_notes');?>								
						<?php end_accordion_panel();?>
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_24_3_5, 'dimension_9_24_3_5', 'c', 'c5', '9.24.3.5 Does the internal affairs unit cooperate with relevant agencies (e.g. anti-corruption commission, police, and public prosecutor)?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_3_5, 'dimension_9_24_3_5', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_3_5, 'dimension_9_24_3_5', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_9_24_3_5_notes, 'dimension_9_24_3_5_notes');?>																
						<?php end_accordion_panel();?>
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_24_3_6, 'dimension_9_24_3_6', 'c', 'c6', '9.24.3.6 Does the internal affairs unit maintain integrity related statistics for the organization, while preserving confidentiality?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_3_6, 'dimension_9_24_3_6', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_3_6, 'dimension_9_24_3_6', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_9_24_3_6_notes, 'dimension_9_24_3_6_notes');?>																
						<?php end_accordion_panel();?>
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_24_3_7, 'dimension_9_24_3_7', 'c', 'c7', '9.24.3.7 Are the integrity statistics are publicly reported?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_24_3_7, 'dimension_9_24_3_7', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_24_3_7, 'dimension_9_24_3_7', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_9_24_3_7_notes, 'dimension_9_24_3_7_notes');?>																
						<?php end_accordion_panel();?>
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_24_3_8, 'dimension_9_24_3_8', 'c', 'c8', '9.24.3.8 How many staff are employed in the internal affairs unit and what are their skills?');?>
							<?php form_create_notes_tadat($dimension_9_24_3_8, 'dimension_9_24_3_8');?>
						<?php end_accordion_panel();?>
					</div>
					<!--END ACCORDION PANEL -->
			
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