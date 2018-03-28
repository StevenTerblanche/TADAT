<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	if(isset($this->action) && ($this->action === 'update' || $this->action === 'save' || $this->action === 'completed')){
		foreach($get_record_by_id as $field => $value){$$field = $value;}
	}elseif($this->input->post()){

		foreach($this->input->post() as $field => $value){
			$$field = $value;
			if(!isset($$field)){$$field = '';}
		}
		foreach($get_fields as $field){
		}
	}else{
		foreach($get_fields as $field){$$field = '';}
	}
	if(isset($this->action) && $this->action === 'completed'){
		$strFieldsetStatus = '';
		$strFieldsetStatus = 'disabled="disabled"';
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
		<li class=""><a id="uploader" href="#uploaded" data-url="http://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<div class="tab-pane active in fade text-muted" id="dimension_a">
				<?php $numCounter = 0;?>
					<div class="panel-group accordion" id="accordion-a">
						<?php form_create_memo_tadat($background_a, 'background_a', 'a', 'a1', 'a) Who must register in respect of the core taxes under the country\'s tax laws?','required-textarea-reason');?>
						<?php form_create_memo_tadat($background_b, 'background_b', 'a', 'a2', 'b) Who can register voluntarily under the country\'s tax laws?','required-textarea-reason');?>
						<?php form_create_memo_tadat($background_c, 'background_c', 'a', 'a3', 'c) Who is not permitted to register under the country\'s tax laws?','required-textarea-reason');?>
						<?php form_create_memo_tadat($background_d, 'background_d', 'a', 'a4', 'd) What, if any, other government agencies are involved in the process of registering businesses and individuals for tax purposes? What is their role? What interaction is there between these agencies and the tax administration?','required-textarea-reason');?>
						<?php form_create_memo_tadat($background_e, 'background_e', 'a', 'a5', 'e) What organizational unit/s of the tax administration is/are responsible for registering businesses and individuals and maintaining the taxpayer registration database?','required-textarea-reason');?>
					</div>
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		
		<div class="tab-pane fade text-muted" id="dimension_b">

				<p><strong><?php $numCounter = 1; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '1.1.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
				<!--START ACCORDION -->
				<div class="panel-group accordion" id="accordion-b">
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_1_1_1_1, 'dimension_1_1_1_1', 'b', 'b1', '1.1.1.1 For individuals, does the registration database include, for example, the taxpayer\'s:');?>
							<ul>
								<li>Full name?</li>
								<li>Address?</li>
								<li>Contact details (e g , telephone number of the taxpayer and/or intermediary)?</li>
								<li>Date of birth?</li>
								<li>Filing and payment obligations applicable to the core taxes for which the taxpayer is registered?</li>
							</ul>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_1_1_1_1, 'dimension_1_1_1_1', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_1_1_1_1, 'dimension_1_1_1_1', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_1_1_1_1_notes, 'dimension_1_1_1_1_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
				
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_1_1_1_2, 'dimension_1_1_1_2', 'b', 'b2', '1.1.1.2 For businesses, does the registration database include, for example, the following taxpayer information:');?>
								<ul>
									<li>Full name?</li>
									<li>Business and postal address?</li>
									<li>Contact details (e g , telephone number/s of the taxpayer and/or intermediary)?</li>
									<li>Filing and payment obligations applicable to the core taxes for which the taxpayer is registered?</li>									
									<li>Date of incorporation for companies or date of business registration for other entities?</li>
									<li>Nature of business activity and/or economic or industry sector classified according to government or other recognized coding systems (e g , International Standard Industrial Classification)?</li>
									<li>Taxpayer segment (e g , whether the taxpayer is a small, medium or large taxpayer, as defined by the segmentation criteria applied by the tax administration)?</li>
									<li>Identity of associated entities and related  parties of the taxpayer (e g , details of subsidiary companies and corporate grouping arrangements)</li>
								</ul>				
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_1_1_1_2, 'dimension_1_1_1_2', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_1_1_1_2, 'dimension_1_1_1_2', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_1_1_1_2_notes, 'dimension_1_1_1_2_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_1_1_1_3, 'dimension_1_1_1_3', 'b', 'b3', '1.1.1.3 Is the taxpayer registration database computerized or manual?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_1_1_1_3, 'dimension_1_1_1_3', '2', 'Computerised');?>
									<?php form_create_radio_tadat($dimension_1_1_1_3, 'dimension_1_1_1_3', '1', 'Manual');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_1_1_1_3_notes, 'dimension_1_1_1_3_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_1_1_1_4, 'dimension_1_1_1_4', 'b', 'b4', '1.1.1.4 Is the taxpayer registration database centralized (i.e. there is a single national taxpayer registration database for the country\'s entire taxpayer population) or decentralized (e.g., separate decentralized databases exist for taxpayers located in different geographic regions within the country)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_1_1_1_4, 'dimension_1_1_1_4', '2', 'Centralized');?>
									<?php form_create_radio_tadat($dimension_1_1_1_4, 'dimension_1_1_1_4', '1', 'Decentralized');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_1_1_1_4_notes, 'dimension_1_1_1_4_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->					
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_1_1_1_5, 'dimension_1_1_1_5', 'b', 'b5', '1.1.1.5 What type of numbering system is used to identify taxpayers?');?>
							<div class="answer-wrapper">
							<p>Does each registered taxpayer have a unique identification number—either a TIN or other high integrity number (e g , a national citizen/ business identification number)—that is used for key compliance obligations (such as filing, payment, and assessment) in respect of all core taxes?</p>
							<p>OR</p>
							<p>Do registered taxpayers have more than one identification number (e g , there are separate identification numbers for income tax and VAT)? If so, are the separate identification numbers linked within the registration database?</p>							
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_1_1_1_5, 'dimension_1_1_1_5', '2', 'Unique Number', 'check_value_a');?>
									<?php form_create_radio_tadat($dimension_1_1_1_5, 'dimension_1_1_1_5', '1', 'Separate Numbers', 'check_value_a');?>
								</div>
							</div>
							<div id="show_checkedValueA" style="margin-top:10px !important">
								<div class="answer-wrapper">
								<p>Are the separate identification numbers linked within the registration database?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_1_1_1_5_a, 'dimension_1_1_1_5_a', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_1_1_1_5_a, 'dimension_1_1_1_5_a', '1', 'No');?>
									</div>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_1_1_1_5_notes, 'dimension_1_1_1_5_notes');?>							
					<?php end_accordion_panel();?>							
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_1_1_1_6, 'dimension_1_1_1_6', 'b', 'b6', '1.1.1.6 Does the tax administration\'s registration IT sub-system interface with other IT sub-systems (e g , filing and payment processing)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_1_1_1_6, 'dimension_1_1_1_6', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_1_1_1_6, 'dimension_1_1_1_6', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_1_1_1_6_notes, 'dimension_1_1_1_6_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_1_1_1_7, 'dimension_1_1_1_7', 'b', 'b7', '1.1.1.7 Does the tax administration\'s registration IT sub-system provide frontline staff with a whole-of-taxpayer view of a taxpayer\'s identifying and other details (e g , filing and payment obligations)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_1_1_1_7, 'dimension_1_1_1_7', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_1_1_1_7, 'dimension_1_1_1_7', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_1_1_1_7_notes, 'dimension_1_1_1_7_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_1_1_1_7, 'dimension_1_1_1_8', 'b', 'b8', '1.1.1.8 Does the tax administration\'s registration IT sub-system allow for the deactivation of dormant registrations to suspend generation of tax declarations, reminders, estimated assessments, and other actions in respect of taxpayers who are temporarily inactive?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_1_1_1_8, 'dimension_1_1_1_8', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_1_1_1_8, 'dimension_1_1_1_8', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_1_1_1_8_notes, 'dimension_1_1_1_8_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_1_1_1_9, 'dimension_1_1_1_9', 'b', 'b9', '1.1.1.9 Does the tax administration\'s registration IT sub-system allow for deregistration of taxpayers and archiving of information in a way that can be restored if needed?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_1_1_1_9, 'dimension_1_1_1_9', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_1_1_1_9, 'dimension_1_1_1_9', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_1_1_1_9_notes, 'dimension_1_1_1_9_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_1_1_1_10, 'dimension_1_1_1_10', 'b', 'b10', '1.1.1.10 Does the tax administration\'s registration IT sub-system generate registration-related management information (e g , statistics of registered taxpayers by entity type, location, and economic sector) and provide an audit trail of user access and changes made to taxpayer registration data?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_1_1_1_10, 'dimension_1_1_1_10', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_1_1_1_10, 'dimension_1_1_1_10', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_1_1_1_10_notes, 'dimension_1_1_1_10_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_1_1_1_11, 'dimension_1_1_1_11', 'b', 'b11', '1.1.1.11 Does the tax administration\'s registration IT sub-system use taxpayer registration details to generate tax declarations?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_1_1_1_11, 'dimension_1_1_1_11', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_1_1_1_11, 'dimension_1_1_1_11', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_1_1_1_11_notes, 'dimension_1_1_1_11_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_1_1_1_12, 'dimension_1_1_1_12', 'b', 'b12', '1.1.1.12 Does the tax administration\'s registration IT sub-system provide secure online access to businesses and individuals to register for core taxes and, once registered, to update details held in the database (e g , a taxpayer\'s postal or business address)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_1_1_1_12, 'dimension_1_1_1_12', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_1_1_1_12, 'dimension_1_1_1_12', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_1_1_1_12_notes, 'dimension_1_1_1_12_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					
				</div>
				<!--END ACCORDION -->
				<?php $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<div class="tab-pane fade text-muted" id="dimension_c">
				<p><strong><?php $numCounter = 2; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '1.1.2 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
				<div class="panel-group accordion" id="accordion-c">
				<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_1_1_2_1, 'dimension_1_1_2_1', 'c', 'c1', '1.1.2.1 Do documented national procedures exist to identify and remove inactive taxpayers (e g , deceased persons and defunct businesses), duplicated records, and false/invalid registrants from the active taxpayer registration database and deactivate and flag dormant registrations (i e  taxpayers that are temporarily inactive)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_1_1_2_1, 'dimension_1_1_2_1', '2', 'Yes', 'check_value_b');?>
									<?php form_create_radio_tadat($dimension_1_1_2_1, 'dimension_1_1_2_1', '1', 'No', 'check_value_b');?>
								</div>
							</div>
							<div id="show_checkedValueB" style="margin-top:10px !important">
								<div class="answer-wrapper">
								<p>Are the procedures applied routinely (i e  performed regularly in a planned or scheduled manner), or on an ad hoc basis (i e  unplanned or performed infrequently)?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_1_1_2_1_a, 'dimension_1_1_2_1_a', '2', 'Routinely');?>
										<?php form_create_radio_tadat($dimension_1_1_2_1_a, 'dimension_1_1_2_1_a', '1', 'Ad-hoc');?>
									</div>
								</div>
							</div>

								<?php form_create_notes_tadat($dimension_1_1_2_1_notes, 'dimension_1_1_2_1_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->



					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_1_1_2_2, 'dimension_1_1_2_2', 'c', 'c2', '1.1.2.2 Do documented national procedures exist to ensure that applications for registration are authentic and all applicants meet the legal requirements for registration?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_1_1_2_2, 'dimension_1_1_2_2', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_1_1_2_2, 'dimension_1_1_2_2', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_1_1_2_2_notes, 'dimension_1_1_2_2_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_1_1_2_3, 'dimension_1_1_2_3', 'c', 'c3', '1.1.2.3 Is proof of the applicant\'s identity verified to ensure that bogus entities are prevented from registering, given that both VAT and income tax are targets for refund fraud?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_1_1_2_3, 'dimension_1_1_2_3', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_1_1_2_3, 'dimension_1_1_2_3', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_1_1_2_3_notes, 'dimension_1_1_2_3_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_1_1_2_4, 'dimension_1_1_2_4', 'c', 'c4', '1.1.2.4 Do documented national procedures exist to verify the accuracy of information held in the registration database?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
									<div class="answer-container" style="width:180px !important">
									<?php form_create_radio_tadat($dimension_1_1_2_4, 'dimension_1_1_2_4', '2', 'Yes', 'check_value_c');?>
									<?php form_create_radio_tadat($dimension_1_1_2_4, 'dimension_1_1_2_4', '1', 'No', 'check_value_c');?>
								</div>
							</div>
							<div id="show_checkedValueC" style="margin-top:10px !important">
								<div class="answer-wrapper">
								<p>1.1.2.4.1 Is information crosschecked against third party information sources (e g , other government agencies such as the registrar of companies) to ensure information held is up-to-date?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container" style="width:180px !important">
										<?php form_create_radio_tadat($dimension_1_1_2_4_a, 'dimension_1_1_2_4_a', '2', 'Yes', 'check_value_d');?>
										<?php form_create_radio_tadat($dimension_1_1_2_4_a, 'dimension_1_1_2_4_a', '1', 'No', 'check_value_d');?>
									</div>
								</div>
							<div id="show_checkedValueD" style="margin-top:10px !important">
								<div class="answer-wrapper">
									<p>1.1.2.4.2 Is this done on a routine or ad hoc basis?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container" style="width:180px !important">
										<?php form_create_radio_tadat($dimension_1_1_2_4_b, 'dimension_1_1_2_4_b', '2', 'Routinely');?>
										<?php form_create_radio_tadat($dimension_1_1_2_4_b, 'dimension_1_1_2_4_b', '1', 'Ad-hoc');?>
									</div>
								</div>
								<div class="answer-wrapper" style="margin-top:10px !important">
									<p>1.1.2.4.3 To what extent is information crosschecking done using automated processes?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container" style="width:350px !important">
										<?php form_create_radio_tadat($dimension_1_1_2_4_c, 'dimension_1_1_2_4_c', '2', 'Large extent');?>
										<?php form_create_radio_tadat($dimension_1_1_2_4_c, 'dimension_1_1_2_4_c', '3', 'Lesser extent');?>										
										<?php form_create_radio_tadat($dimension_1_1_2_4_c, 'dimension_1_1_2_4_c', '1', 'No crosschecked');?>
									</div>
								</div>
								</div>
							</div>
							<div id="show_checkedValueE" style="margin-top:10px !important">
								<?php form_create_notes_tadat($dimension_1_1_2_4_notes, 'dimension_1_1_2_4_notes');?>
							</div>
							<div id="show_checkedValueF" style="margin-top:0px !important">
								<?php form_create_notes_tadat($dimension_1_1_2_4_notes, 'dimension_1_1_2_4_notes','1.1.2.4.1 Where no documented procedures exist, what actions are taken by the tax administration to improve the accuracy of information held in the registration database?');?>
							</div>							
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_1_1_2_5_a, 'dimension_1_1_2_5_a', 'c', 'c5', '1.1.2.5 To what extent does the registration database provide certainty to the tax administration as to the number of active taxpayers (i e  businesses and individuals with current tax obligations) for each core tax?');?>
							<div class="answer-wrapper">
								<div class="answer">a) CIT </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_1_1_2_5_a, 'dimension_1_1_2_5_a', '2', 'Large extent');?>
									<?php form_create_radio_tadat($dimension_1_1_2_5_a, 'dimension_1_1_2_5_a', '1', 'Lesser / no extent');?>
								</div>
							</div>
							<div class="answer-wrapper">
								<div class="answer">b) PIT </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_1_1_2_5_b, 'dimension_1_1_2_5_b', '2', 'Large extent');?>
									<?php form_create_radio_tadat($dimension_1_1_2_5_b, 'dimension_1_1_2_5_b', '1', 'Lesser / no extent');?>
								</div>
							</div>
							<div class="answer-wrapper">
								<div class="answer">c) VAT </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_1_1_2_5_c, 'dimension_1_1_2_5_c', '2', 'Large extent');?>
									<?php form_create_radio_tadat($dimension_1_1_2_5_c, 'dimension_1_1_2_5_c', '1', 'Lesser / no extent');?>
								</div>
							</div>
							<div class="answer-wrapper">
								<div class="answer">d) PAYE </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_1_1_2_5_d, 'dimension_1_1_2_5_d', '2', 'Large extent');?>
									<?php form_create_radio_tadat($dimension_1_1_2_5_d, 'dimension_1_1_2_5_d', '1', 'Lesser / no extent');?>
								</div>
							</div>
							<?php form_create_notes_tadat($dimension_1_1_2_5_notes, 'dimension_1_1_2_5_notes','To what extent has this issue been examined by tax administration management?');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_1_1_2_6, 'dimension_1_1_2_6', 'c', 'c6', '1.1.2.6 Have management or internal audit reports been prepared during the past 1-2 years in relation to the accuracy of information held in the registration database?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_1_1_2_6, 'dimension_1_1_2_6', '2', 'Yes', 'check_value_g');?>
									<?php form_create_radio_tadat($dimension_1_1_2_6, 'dimension_1_1_2_6', '1', 'No', 'check_value_g');?>
								</div>
							</div>
							<div id="show_checkedValueG" style="margin-top:10px !important">
								<div class="answer-wrapper">
									<p>1.1.2.6.1 Has the external auditor examined this issue in recent times?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container" style="width:180px !important">
										<?php form_create_radio_tadat($dimension_1_1_2_6_a, 'dimension_1_1_2_6_a', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_1_1_2_6_a, 'dimension_1_1_2_6_a', '1', 'No');?>
									</div>
								</div>
								<?php form_create_notes_tadat($dimension_1_1_2_6_notes, 'dimension_1_1_2_6_notes','What are the findings, conclusions, and recommendations of these reports?');?>
							</div>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					
				</div>				
		<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<div class="tab-pane fade text-muted" id="uploaded"></div>
	</div>
	<div class="saving" style="display:none">SAVING TO DATABASE...</div>
</div>

<?php if($this->action !== 'completed'){?>
	<div class="form-group mt15">
		<div class="col-xs-12" style="text-align:center !important;">
			<button type="button" id="save_button" class="btn btn-success white-text" formnovalidate><i class="fa fa-save mr5"></i><?php echo $save_button; ?></button>
			<button type="button" id="score_button" class="btn btn-primary white-text" formnovalidate><i class="fa fa-save mr5"></i><?php echo $score_button; ?></button>			
		</div>
	</div>
<?php }	?>
<?php echo form_close();?>
</div>