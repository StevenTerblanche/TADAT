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
			
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '9.25.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_25_1_1, 'dimension_9_25_1_1', 'a', 'a1', '9.25.1.1 Does the tax administration have an internal audit unit?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_1, 'dimension_9_25_1_1', '2', 'Yes', 'check_value_a');?>
										<?php form_create_radio_tadat($dimension_9_25_1_1, 'dimension_9_25_1_1', '1', 'No', 'check_value_a');?>
									</div>
								</div>
							<div id="show_checkedValueA"><!-- START show_checkedValueA -->

								<div class="answer-wrapper" style="margin-top:8px !important">
									<p><b>To whom does it report?</b></p>
								</div>
								<div class="answer-wrapper" style="margin-top:2px !important">									
									<div class="answer" style="width:250px !important">a) Tax administration head</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_1_a, 'dimension_9_25_1_1_a', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_1_a, 'dimension_9_25_1_1_a', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">b) The Board</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_1_b, 'dimension_9_25_1_1_b', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_1_b, 'dimension_9_25_1_1_b', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">c) Audit committee</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_1_c, 'dimension_9_25_1_1_c', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_1_c, 'dimension_9_25_1_1_c', '1', 'No');?>
									</div>
								</div>							
							</div><!-- END show_checkedValueA -->															

							<?php form_create_notes_tadat($dimension_9_25_1_1_notes, 'dimension_9_25_1_1_notes');?>	
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_25_1_2, 'dimension_9_25_1_2', 'a', 'a2', '9.25.1.2 Does the tax administration have an audit committee?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_2, 'dimension_9_25_1_2', '2', 'Yes', 'check_value_b');?>
										<?php form_create_radio_tadat($dimension_9_25_1_2, 'dimension_9_25_1_2', '1', 'No', 'check_value_b');?>
									</div>
								</div>
							<div id="show_checkedValueB"><!-- START show_checkedValueB -->
								<?php form_create_notes_tadat_validate($dimension_9_25_1_2_notes, 'dimension_9_25_1_2_notes','required-textarea-reason','What is its function and responsibilities?');?>								
							</div><!-- END show_checkedValueB -->																						
						<?php end_accordion_panel();?>


						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_25_1_3, 'dimension_9_25_1_3', 'a', 'a3', '9.25.1.3 Does the tax administration have a documented annual internal audit plan?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_3, 'dimension_9_25_1_3', '2', 'Yes', 'check_value_c');?>
										<?php form_create_radio_tadat($dimension_9_25_1_3, 'dimension_9_25_1_3', '1', 'No', 'check_value_c');?>
									</div>
								</div>
							<div id="show_checkedValueC"><!-- START show_checkedValueC -->
								<div class="answer-wrapper">
									<div class="answer" style="width:350px !important">a) Does it comprise of internal control checks?</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_3_a, 'dimension_9_25_1_3_a', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_3_a, 'dimension_9_25_1_3_a', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:350px !important">b) Does it comprise of operational performance audits?</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_3_b, 'dimension_9_25_1_3_b', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_3_b, 'dimension_9_25_1_3_b', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:350px !important">c) Does it comprise of information technology systems audits?</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_3_c, 'dimension_9_25_1_3_c', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_3_c, 'dimension_9_25_1_3_c', '1', 'No');?>
									</div>
								</div>							
								<div class="answer-wrapper">
									<div class="answer" style="width:350px !important">d) Does it comprise of financial audits?</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_3_d, 'dimension_9_25_1_3_d', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_3_d, 'dimension_9_25_1_3_d', '1', 'No');?>
									</div>
								</div>							
								<div class="answer-wrapper" style="margin-top:8px !important">
									<p><b>Referring to key operations, revenue accounting, and internal financial management:</b></p>
								</div>

								<div class="answer-wrapper">
									<div class="answer" style="width:320px !important">e) To what extent does it provide coverage and scrutiny?</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_3_e, 'dimension_9_25_1_3_e', '1', 'Large extent');?>
										<?php form_create_radio_tadat($dimension_9_25_1_3_e, 'dimension_9_25_1_3_e', '2', 'Medium extent');?>										
										<?php form_create_radio_tadat($dimension_9_25_1_3_e, 'dimension_9_25_1_3_e', '3', 'Low extent');?>
									</div>
								</div>							
								
							</div><!-- END show_checkedValueC -->																						
								<?php form_create_notes_tadat($dimension_9_25_1_3_notes, 'dimension_9_25_1_3_notes');?>	
						<?php end_accordion_panel();?>


						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_25_1_4, 'dimension_9_25_1_4', 'a', 'a4', '9.25.1.4 How many auditors are employed in the internal audit unit?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_4, 'dimension_9_25_1_4', '0', 'None', 'check_value_d');?>
										<?php form_create_radio_tadat($dimension_9_25_1_4, 'dimension_9_25_1_4', '1', '1-3', 'check_value_d');?>
										<?php form_create_radio_tadat($dimension_9_25_1_4, 'dimension_9_25_1_4', '2', '4-5', 'check_value_d');?>
										<?php form_create_radio_tadat($dimension_9_25_1_4, 'dimension_9_25_1_4', '3', '6-10', 'check_value_d');?>																				
										<?php form_create_radio_tadat($dimension_9_25_1_4, 'dimension_9_25_1_4', '4', 'More than 10', 'check_value_d');?>
									</div>
								</div>
							<div id="show_checkedValueD"><!-- START show_checkedValueD -->
								<?php form_create_notes_tadat_validate($dimension_9_25_1_4_a_notes, 'dimension_9_25_1_4_a_notes','required-textarea-reason','What audit skills do they have?');?>								
								<div class="answer-wrapper">
									<div class="answer" style="width:520px !important">On what basis is training of internal auditors in audit methodologies undertaken?</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_4_b, 'dimension_9_25_1_4_b', '1', 'Regular Training');?>
										<?php form_create_radio_tadat($dimension_9_25_1_4_b, 'dimension_9_25_1_4_b', '2', 'Ad-hoc Training');?>										
										<?php form_create_radio_tadat($dimension_9_25_1_4_b, 'dimension_9_25_1_4_b', '3', 'No Training');?>
									</div>
								</div>							
							</div><!-- END show_checkedValueD -->																						
								<?php form_create_notes_tadat($dimension_9_25_1_4_notes, 'dimension_9_25_1_4_notes');?>								
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_25_1_5, 'dimension_9_25_1_5', 'a', 'a5', '9.25.1.5 To what extent are internal audit findings and recommendations acted upon?');?>
								<div class="answer-wrapper">
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_5, 'dimension_9_25_1_5', '1', 'Large extent');?>
										<?php form_create_radio_tadat($dimension_9_25_1_5, 'dimension_9_25_1_5', '2', 'Medium extent');?>										
										<?php form_create_radio_tadat($dimension_9_25_1_5, 'dimension_9_25_1_5', '3', 'Low extent');?>
									</div>
								</div>							
								<?php form_create_notes_tadat($dimension_9_25_1_5_notes, 'dimension_9_25_1_5_notes');?>								
						<?php end_accordion_panel();?>
								
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_25_1_6, 'dimension_9_25_1_6', 'a', 'a6', '9.25.1.6 Are internal audit operations independently reviewed (e g , by the government auditor)?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_6, 'dimension_9_25_1_6', '2', 'Yes', 'check_value_e');?>
										<?php form_create_radio_tadat($dimension_9_25_1_6, 'dimension_9_25_1_6', '1', 'No', 'check_value_e');?>
									</div>
								</div>
							<div id="show_checkedValueE"><!-- START show_checkedValueE -->
								<div class="answer-wrapper" style="margin-top:15px !important">
									<div class="answer" style="width:380px !important">a) How often are internal audit operations independently reviewed?</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_6_a, 'dimension_9_25_1_6_a', '1', 'At least every 5 years');?>
										<?php form_create_radio_tadat($dimension_9_25_1_6_a, 'dimension_9_25_1_6_a', '2', 'At least every 7 years');?>
										<?php form_create_radio_tadat($dimension_9_25_1_6_a, 'dimension_9_25_1_6_a', '3', 'At least every 10 years');?>
									</div>
								</div>			
							</div><!-- END show_checkedValueE -->																						
							<?php form_create_notes_tadat($dimension_9_25_1_6_notes, 'dimension_9_25_1_6_notes');?>								
						<?php end_accordion_panel();?>


						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_25_1_7, 'dimension_9_25_1_7', 'a', 'a7', '9.25.1.7 Are the internal controls documented?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_7, 'dimension_9_25_1_7', '2', 'Yes', 'check_value_f');?>
										<?php form_create_radio_tadat($dimension_9_25_1_7, 'dimension_9_25_1_7', '1', 'No', 'check_value_f');?>
									</div>
								</div>
							<div id="show_checkedValueF" style="margin-top:15px !important"><!-- START show_checkedValueF -->
								<div class="answer-wrapper" style="margin-top:1px !important"><p><b>9.25.1.7.1 Do the internal controls cover the following key operations:</b></p></div>
								<div class="answer-wrapper" style="margin-top:1px !important">
									<div class="answer" style="width:200px !important">a) Registration?</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_7_b, 'dimension_9_25_1_7_b', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_7_b, 'dimension_9_25_1_7_b', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper" style="margin-top:1px !important">								
									<div class="answer" style="width:200px !important">b) Filing?</div>									
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_7_c, 'dimension_9_25_1_7_c', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_7_c, 'dimension_9_25_1_7_c', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper" style="margin-top:1px !important">								

									<div class="answer" style="width:200px !important">c) Declaration/return?</div>									
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_7_d, 'dimension_9_25_1_7_d', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_7_d, 'dimension_9_25_1_7_d', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper" style="margin-top:1px !important">								

									<div class="answer" style="width:200px !important">d) Payment processing?</div>									
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_7_e, 'dimension_9_25_1_7_e', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_7_e, 'dimension_9_25_1_7_e', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper" style="margin-top:1px !important">								

									<div class="answer" style="width:200px !important">e) Debt collection?</div>									
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_7_f, 'dimension_9_25_1_7_f', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_7_f, 'dimension_9_25_1_7_f', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper" style="margin-top:1px !important">								
									<div class="answer" style="width:200px !important">f) Taxpayer audit?</div>									
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_7_g, 'dimension_9_25_1_7_g', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_7_g, 'dimension_9_25_1_7_g', '1', 'No');?>
									</div>
								</div>								
								<div class="answer-wrapper" style="margin-top:1px !important">								

									<div class="answer" style="width:200px !important">g) Taxpayer accounting?</div>									
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_7_h, 'dimension_9_25_1_7_h', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_7_h, 'dimension_9_25_1_7_h', '1', 'No');?>
									</div>
								</div>								
								<div class="answer-wrapper" style="margin-top:1px !important">								
									<div class="answer" style="width:200px !important">h) Internal financial management?</div>									
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_7_i, 'dimension_9_25_1_7_i', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_7_i, 'dimension_9_25_1_7_i', '1', 'No');?>
									</div>																																																															
								</div>			
									<?php form_create_notes_tadat_validate($dimension_9_25_1_7_a_notes, 'dimension_9_25_1_7_a_notes','required-textarea-reason','9.25.1.7.2 What internal control policies, processes, and procedures exist?');?>								
									<?php form_create_notes_tadat_validate($dimension_9_25_1_7_b_notes, 'dimension_9_25_1_7_b_notes','required-textarea-reason','9.25.1.7.3 Who maintains the documentation — for example, is this role performed by the internal audit unit?');?>
							</div><!-- END show_checkedValueF -->																						
							<?php form_create_notes_tadat($dimension_9_25_1_7_notes, 'dimension_9_25_1_7_notes');?>								
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_25_1_8, 'dimension_9_25_1_8', 'a', 'a8', '9.25.1.8 Do the internal controls cover the following areas?');?>
							<div class="answer-wrapper" style="margin-top:1px !important">								
								<div class="answer-550-h-58">a) IT system controls, including controls to detect incidents that threaten the confidentiality and integrity of tax administration data?</div>
									<div class="answer-container-550-h-58" style="width:120px !important">
									<?php form_create_radio_tadat($dimension_9_25_1_8, 'dimension_9_25_1_8', '2', 'Yes', 'check_value_g');?>
									<?php form_create_radio_tadat($dimension_9_25_1_8, 'dimension_9_25_1_8', '1', 'No', 'check_value_g');?>
								</div>																																																															
							</div>			
							<div id="show_checkedValueG" style="margin-left:30px !important; margin-bottom:15px !important"><!-- START show_checkedValueG -->
								<div class="answer-wrapper" style="margin-top:8px !important"><p><b>Does these IT controls include:</b></p></div>
								<div class="answer-wrapper" style="margin-top:1px !important">								
									<div class="answer" style="width:300px !important">i) Audit trails of user access?</div>									
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_8_a, 'dimension_9_25_1_8_a', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_8_a, 'dimension_9_25_1_8_a', '1', 'No');?>
									</div>																																																															
								</div>			
								<div class="answer-wrapper" style="margin-top:1px !important">								
									<div class="answer" style="width:300px !important">ii) Logging of all interactions with the IT system?</div>									
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_8_b, 'dimension_9_25_1_8_b', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_8_b, 'dimension_9_25_1_8_b', '1', 'No');?>
									</div>																																																															
								</div>			
								<div class="answer-wrapper" style="margin-top:1px !important">								
									<div class="answer" style="width:300px !important">iii) Surveillance to identify inappropriate access?</div>									
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_8_c, 'dimension_9_25_1_8_c', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_8_c, 'dimension_9_25_1_8_c', '1', 'No');?>
									</div>																																																															
								</div>			
								<div class="answer-wrapper" style="margin-top:1px !important">								
									<div class="answer" style="width:300px !important">iv) The use of system-generated reports?</div>									
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_8_d, 'dimension_9_25_1_8_d', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_8_d, 'dimension_9_25_1_8_d', '1', 'No');?>
									</div>																																																															
								</div>			

								<div class="answer-wrapper" style="margin-top:1px !important">								
									<div class="answer" style="width:300px !important">v) Other audit tools?</div>									
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_1_8_e, 'dimension_9_25_1_8_e', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_8_e, 'dimension_9_25_1_8_e', '1', 'No');?>
									</div>																																																															
								</div>			
							</div><!-- END show_checkedValueG -->
								<div class="answer-wrapper" style="margin-top:1px !important">								
									<div class="answer-550">b) Functional separation of duties?</div>									
									<div class="answer-container-550" style="width:120px !important">
										<?php form_create_radio_tadat($dimension_9_25_1_9, 'dimension_9_25_1_9', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_9, 'dimension_9_25_1_9', '1', 'No');?>
									</div>
								</div>								
								<div class="answer-wrapper" style="margin-top:1px !important">								
									<div class="answer-550">c) Authorization of transactions?</div>									
									<div class="answer-container-550" style="width:120px !important">
										<?php form_create_radio_tadat($dimension_9_25_1_10, 'dimension_9_25_1_10', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_10, 'dimension_9_25_1_10', '1', 'No');?>
									</div>
								</div>								
								<div class="answer-wrapper" style="margin-top:1px !important">								
									<div class="answer-550">d) Accounting reconciliations?</div>									
									<div class="answer-container-550" style="width:120px !important">
										<?php form_create_radio_tadat($dimension_9_25_1_11, 'dimension_9_25_1_11', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_11, 'dimension_9_25_1_11', '1', 'No');?>
									</div>
								</div>								
								<div class="answer-wrapper" style="margin-top:1px !important">								
									<div class="answer-550">e) Physical safeguards to protect assets &amp; mechanisms to detect inappropriate use?</div>									
									<div class="answer-container-550" style="width:120px !important">
										<?php form_create_radio_tadat($dimension_9_25_1_12, 'dimension_9_25_1_12', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_12, 'dimension_9_25_1_12', '1', 'No');?>
									</div>
								</div>								
								<div class="answer-wrapper" style="margin-top:1px !important">								
									<div class="answer-550">f) Supervision and monitoring of operations?</div>									
									<div class="answer-container-550" style="width:120px !important">
										<?php form_create_radio_tadat($dimension_9_25_1_13, 'dimension_9_25_1_13', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_1_13, 'dimension_9_25_1_13', '1', 'No');?>
									</div>
								</div>								
	
							<?php form_create_notes_tadat($dimension_9_25_1_8_notes, 'dimension_9_25_1_8_notes');?>																													
						<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					</div>
					
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->

		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_b">
			
				<p><strong><?php $numCounter = 1; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '9.25.2 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-b">
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_25_1_1, 'dimension_9_25_2_1', 'b', 'b1', '9.25.1.1 Does the tax administration have an internal affairs unit?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_9_25_2_1, 'dimension_9_25_2_1', '2', 'Yes', 'check_value_h');?>
									<?php form_create_radio_tadat($dimension_9_25_2_1, 'dimension_9_25_2_1', '1', 'No', 'check_value_h');?>
								</div>
							</div>
							<div id="show_checkedValueH"><!-- START show_checkedValueH -->
								<div class="answer-wrapper" style="margin-top:8px !important">
									<p><b>To whom does it report?</b></p>
								</div>
								<div class="answer-wrapper" style="margin-top:2px !important">									
									<div class="answer" style="width:250px !important">a) Tax administration head</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_2_1_a, 'dimension_9_25_2_1_a', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_2_1_a, 'dimension_9_25_2_1_a', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">b) Tax administration deputy head</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_2_1_b, 'dimension_9_25_2_1_b', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_2_1_b, 'dimension_9_25_2_1_b', '1', 'No');?>
									</div>
								</div>
							</div><!-- END show_checkedValueH -->															
							<?php form_create_notes_tadat($dimension_9_25_2_1_notes, 'dimension_9_25_2_1_notes');?>	
						<?php end_accordion_panel();?>					
						
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_25_2_2, 'dimension_9_25_2_2', 'b', 'b2', '9.25.2.2 Does the tax internal affairs unit have investigative powers?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_9_25_2_2, 'dimension_9_25_2_2', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_9_25_2_2, 'dimension_9_25_2_2', '1', 'No');?>
								</div>
							</div>
							<?php form_create_notes_tadat($dimension_9_25_2_2_notes, 'dimension_9_25_2_2_notes');?>	
						<?php end_accordion_panel();?>					

						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_25_2_3, 'dimension_9_25_2_3', 'b', 'b3', '9.25.2.3 How many investigators are employed in the internal affairs unit?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_2_3, 'dimension_9_25_2_3', '0', 'None', 'check_value_i');?>
										<?php form_create_radio_tadat($dimension_9_25_2_3, 'dimension_9_25_2_3', '1', '1-3', 'check_value_i');?>
										<?php form_create_radio_tadat($dimension_9_25_2_3, 'dimension_9_25_2_3', '2', '4-5', 'check_value_i');?>
										<?php form_create_radio_tadat($dimension_9_25_2_3, 'dimension_9_25_2_3', '3', '6-10', 'check_value_i');?>																				
										<?php form_create_radio_tadat($dimension_9_25_2_3, 'dimension_9_25_2_3', '4', 'More than 10', 'check_value_i');?>
									</div>
								</div>
							<div id="show_checkedValueI"><!-- START show_checkedValueI -->
								<?php form_create_notes_tadat_validate($dimension_9_25_2_3_a_notes, 'dimension_9_25_2_3_a_notes','required-textarea-reason','What skills do they have?');?>								
								<div class="answer-wrapper">
									<div class="answer" style="width:520px !important">On what basis is training of investigators in the internal affairs unit undertaken?</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_2_3_b, 'dimension_9_25_2_3_b', '1', 'Regular Training');?>
										<?php form_create_radio_tadat($dimension_9_25_2_3_b, 'dimension_9_25_2_3_b', '2', 'Ad-hoc Training');?>										
										<?php form_create_radio_tadat($dimension_9_25_2_3_b, 'dimension_9_25_2_3_b', '3', 'No Training');?>
									</div>
								</div>							
							</div><!-- END show_checkedValueI -->																						
								<?php form_create_notes_tadat($dimension_9_25_2_3_notes, 'dimension_9_25_2_3_notes');?>								
						<?php end_accordion_panel();?>						

						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_25_2_4, 'dimension_9_25_2_4', 'b', 'b4', '9.25.2.4 Does the unit provide leadership in the formulation of integrity and ethics policy, including codes of conduct?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_9_25_2_4, 'dimension_9_25_2_4', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_9_25_2_4, 'dimension_9_25_2_4', '1', 'No');?>
								</div>
							</div>
							<?php form_create_notes_tadat($dimension_9_25_2_4_notes, 'dimension_9_25_2_4_notes');?>	
						<?php end_accordion_panel();?>					
						
						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_25_2_5, 'dimension_9_25_2_5', 'b', 'b5', '9.25.2.5  Does the unit cooperate with relevant agencies (e.g, anti-corruption agency, police and public prosecutor)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_9_25_2_5, 'dimension_9_25_2_5', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_9_25_2_5, 'dimension_9_25_2_5', '1', 'No');?>
								</div>
							</div>
							<?php form_create_notes_tadat($dimension_9_25_2_5_notes, 'dimension_9_25_2_5_notes');?>	
						<?php end_accordion_panel();?>					

						<?php start_accordion_panel($strFieldsetStatus, $dimension_9_25_2_6, 'dimension_9_25_2_6', 'b', 'b6', '9.25.2.6 Does the unit maintain integrity related statistics for the organization, while preserving confidentiality?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_9_25_2_6, 'dimension_9_25_2_6', '2', 'Yes', 'check_value_j');?>
									<?php form_create_radio_tadat($dimension_9_25_2_6, 'dimension_9_25_2_6', '1', 'No', 'check_value_j');?>
								</div>
							</div>
							<div id="show_checkedValueJ"><!-- START show_checkedValueJ -->							
								<div class="answer-wrapper">
									<div class="answer" style="width:250px !important">a)  Are the statistics made public?</div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_9_25_2_6_a, 'dimension_9_25_2_6_a', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_9_25_2_6_a, 'dimension_9_25_2_6_a', '1', 'No');?>
									</div>
								</div>
							</div><!-- END show_checkedValueJ -->								
							<?php form_create_notes_tadat($dimension_9_25_2_6_notes, 'dimension_9_25_2_6_notes');?>	
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
			<button type="button" id="score_button" class="btn btn-primary white-text" formnovalidate><i class="fa fa-save mr5"></i><?php echo $score_button; ?></button>			
		</div>
	</div>
<?php //}	?>
<?php echo form_close();?>
</div>