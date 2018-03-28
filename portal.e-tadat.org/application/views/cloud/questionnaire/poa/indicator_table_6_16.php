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

<!-- START TAB MAIN CONTAINER -->
<div class="tabs inside-panel">
	<ul id="myTabs" class="nav nav-tabs">
		<li class="active"><a href="#dimension_a" data-toggle="tab"><strong>DIMENSION 1</strong></a></li>
		<li class=""><a href="#dimension_b" data-toggle="tab"><strong>DIMENSION 2</strong></a></li>
		<li class=""><a id="uploader" href="#uploaded" data-url="http://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>

	<!--START TAB CONTENT CONTAINER -->
	<div id="myTabContent" class="tab-content question">

		<!--START INDIVIDUAL TAB CONTENT BY ID -->
		<div class="tab-pane active in fade text-muted" id="dimension_a">

				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '6.16.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!-- START ACCORDION -->
					<div class="panel-group accordion" id="accordion-a">
					
						<?php start_accordion_panel($strFieldsetStatus, $dimension_6_16_1_1, 'dimension_6_16_1_1', 'a', 'a1', '6.16.1.1 Does the tax administration have an annual tax audit program?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_16_1_1, 'dimension_6_16_1_1', '2', 'Yes', 'check_value_a');?>
										<?php form_create_radio_tadat($dimension_6_16_1_1, 'dimension_6_16_1_1', '1', 'No', 'check_value_a');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_6_16_1_1_notes, 'dimension_6_16_1_1_notes');?>
						<?php end_accordion_panel();?>								
						

					<!-- START show_checkedValueA -->
					<div id="show_checkedValueA" style="margin-top:5px !important;">
						<!-- START ACCORDION PANEL -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_6_16_1_2_a, 'dimension_6_16_1_2_a', 'a', 'a2', '6.16.1.2 Does the annual tax audit program cover the following core taxes?');?>
								<div class="answer-wrapper">
									<p style="margin-top:10px !important; font-weight:bold !important">a) Does the annual tax audit program cover CIT?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_16_1_2_a, 'dimension_6_16_1_2_a', '2', 'Yes','eneable-submit');?>
										<?php form_create_radio_tadat($dimension_6_16_1_2_a, 'dimension_6_16_1_2_a', '1', 'No','eneable-submit');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<p style="margin-top:10px !important; font-weight:bold !important">b) Does the annual tax audit program cover PIT?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_16_1_2_b, 'dimension_6_16_1_2_b', '2', 'Yes','eneable-submit');?>
										<?php form_create_radio_tadat($dimension_6_16_1_2_b, 'dimension_6_16_1_2_b', '1', 'No','eneable-submit');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<p style="margin-top:10px !important; font-weight:bold !important">c) Does the annual tax audit program cover VAT?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_16_1_2_c, 'dimension_6_16_1_2_c', '2', 'Yes','eneable-submit');?>
										<?php form_create_radio_tadat($dimension_6_16_1_2_c, 'dimension_6_16_1_2_c', '1', 'No','eneable-submit');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<p style="margin-top:10px !important; font-weight:bold !important">d) Does the annual tax audit program cover PAYE?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_16_1_2_d, 'dimension_6_16_1_2_d', '2', 'Yes','eneable-submit');?>
										<?php form_create_radio_tadat($dimension_6_16_1_2_d, 'dimension_6_16_1_2_d', '1', 'No','eneable-submit');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_6_16_1_2_notes, 'dimension_6_16_1_2_notes');?>								
						<?php end_accordion_panel();?>
						<?php start_accordion_panel($strFieldsetStatus, $dimension_6_16_1_3_a, 'dimension_6_16_1_3_a', 'a', 'a3', '6.16.1.3 Does the annual tax audit program cover the following taxpayer segments?');?>
								<div class="answer-wrapper">
									<p style="margin-top:10px !important; font-weight:bold !important">a) Does the annual tax audit program cover large business taxpayer segments?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_16_1_3_a, 'dimension_6_16_1_3_a', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_6_16_1_3_a, 'dimension_6_16_1_3_a', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<p style="margin-top:10px !important; font-weight:bold !important">b) Does the annual tax audit program cover medium-size business taxpayer segments?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_16_1_3_b, 'dimension_6_16_1_3_b', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_6_16_1_3_b, 'dimension_6_16_1_3_b', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<p style="margin-top:10px !important; font-weight:bold !important">c) Does the annual tax audit program cover small business taxpayer segments?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_16_1_3_c, 'dimension_6_16_1_3_c', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_6_16_1_3_c, 'dimension_6_16_1_3_c', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<p style="margin-top:10px !important; font-weight:bold !important">d) Does the annual tax audit program cover non-business individuals taxpayer segments?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_16_1_3_d, 'dimension_6_16_1_3_d', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_6_16_1_3_d, 'dimension_6_16_1_3_d', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_6_16_1_3_notes, 'dimension_6_16_1_3_notes');?>								
						<?php end_accordion_panel();?>								
				
						<?php start_accordion_panel($strFieldsetStatus, $dimension_6_16_1_4, 'dimension_6_16_1_4', 'a', 'a4', '6.16.1.4 Orient audit coverage towards areas of highest risk (e.g., large taxpayers and high wealth individuals and economic sectors)?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_16_1_4, 'dimension_6_16_1_4', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_6_16_1_4, 'dimension_6_16_1_4', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_6_16_1_4_notes, 'dimension_6_16_1_4_notes');?>
						<?php end_accordion_panel();?>

						<?php start_accordion_panel($strFieldsetStatus, $dimension_6_16_1_5, 'dimension_6_16_1_5', 'a', 'a5', '6.16.1.5 On what basis does the annual tax audit program select audit cases of assessed risks?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_16_1_5, 'dimension_6_16_1_5', '2', 'Centralized basis');?>
										<?php form_create_radio_tadat($dimension_6_16_1_5, 'dimension_6_16_1_5', '1', 'Decentralized basis');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_6_16_1_5_notes, 'dimension_6_16_1_5_notes');?>
						<?php end_accordion_panel();?>


						
						<?php start_accordion_panel($strFieldsetStatus, $dimension_6_16_1_6, 'dimension_6_16_1_6', 'a', 'a6', '6.16.1.6 Does the annual tax audit program use a range of audit types?');?>
								<div class="answer-wrapper">
									<p>Noting that audit types vary in nature, scope, and intensity and include, for example, comprehensive (multiple tax and multiple year) audits, single-issue audits, inspections of books and records, examination of VAT refund claims, and in-depth investigations of suspected tax fraud)?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_16_1_6, 'dimension_6_16_1_6', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_6_16_1_6, 'dimension_6_16_1_6', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_6_16_1_6_notes, 'dimension_6_16_1_6_notes');?>
						<?php end_accordion_panel();?>
						<?php start_accordion_panel($strFieldsetStatus, $dimension_6_16_1_7, 'dimension_6_16_1_7', 'a', 'a7', '6.16.1.7 On what basis does the annual tax audit program evaluate the impact of audits on taxpayer compliance?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_16_1_7, 'dimension_6_16_1_7', '2', 'Consistent Basis');?>
										<?php form_create_radio_tadat($dimension_6_16_1_7, 'dimension_6_16_1_7', '1', 'Ad-hoc Basis');?>
										<?php form_create_radio_tadat($dimension_6_16_1_7, 'dimension_6_16_1_7', '3', 'No Evaluation');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_6_16_1_7_notes, 'dimension_6_16_1_7_notes');?>
						<?php end_accordion_panel();?>																								

					<!-- END show_checkedValueA -->
					</div>		
				<!--END ACCORDION PANEL -->					
				</div>


			<!--START EVIDENTIARY PANEL -->
				<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
			<!--END EVIDENTIARY PANEL -->			
		
		</div><!--END TAB CONTENT BY ID -->



		<!--START INDIVIDUAL TAB CONTENT BY ID -->
		<div class="tab-pane in fade text-muted" id="dimension_b">

				<p><strong><?php $numCounter = 1; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '6.16.2 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!-- START ACCORDION -->
					<div class="panel-group accordion" id="accordion-b">
					
						<?php start_accordion_panel($strFieldsetStatus, $dimension_6_16_2_1, 'dimension_6_16_2_1', 'b', 'b1', '6.16.2.1 Does the tax administration use technology to crosscheck, on a large scale, amounts reported in tax declarations with information obtained from third parties?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_16_2_1, 'dimension_6_16_2_1', '2', 'Yes', 'check_value_b');?>
										<?php form_create_radio_tadat($dimension_6_16_2_1, 'dimension_6_16_2_1', '1', 'No', 'check_value_b');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_6_16_2_1_notes, 'dimension_6_16_2_1_notes');?>
						<?php end_accordion_panel();?>								
						
					<!-- START show_checkedValueA -->
					<div id="show_checkedValueB" style="margin-top:5px !important;">
						<!-- START ACCORDION PANEL -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_6_16_2_2_a, 'dimension_6_16_2_2_a', 'b', 'b2', '6.16.2.2 Is there large-scale automated crosschecking of amounts reported in PIT and CIT declarations with information from sources such as:');?>
								<div class="answer-wrapper">
									<p style="margin-top:10px !important; font-weight:bold !important">a) VAT declarations?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_16_2_2_a, 'dimension_6_16_2_2_a', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_6_16_2_2_a, 'dimension_6_16_2_2_a', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<p style="margin-top:10px !important; font-weight:bold !important">b) Banks/financial institutions?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_16_2_2_b, 'dimension_6_16_2_2_b', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_6_16_2_2_b, 'dimension_6_16_2_2_b', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<p style="margin-top:10px !important; font-weight:bold !important">c) Employers (for purposes of crosschecking reported employment income)?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_16_2_2_c, 'dimension_6_16_2_2_c', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_6_16_2_2_c, 'dimension_6_16_2_2_c', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<p style="margin-top:10px !important; font-weight:bold !important">d) Government agencies (responsible for government procurement of goods and services; registrar of companies; anti-money laundering regulator; and registrars of immovable property)?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_16_2_2_d, 'dimension_6_16_2_2_d', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_6_16_2_2_d, 'dimension_6_16_2_2_d', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<p style="margin-top:10px !important; font-weight:bold !important">e) Stock exchanges and/or shareholder registries of listed companies? </p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_16_2_2_e, 'dimension_6_16_2_2_e', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_6_16_2_2_e, 'dimension_6_16_2_2_e', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<p style="margin-top:10px !important; font-weight:bold !important">f) Social security agency or agencies (for purposes of crosschecking reported employment income)?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_16_2_2_f, 'dimension_6_16_2_2_f', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_6_16_2_2_f, 'dimension_6_16_2_2_f', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper">
									<p style="margin-top:10px !important; font-weight:bold !important">g) Internet-based vendors.</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_16_2_2_g, 'dimension_6_16_2_2_g', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_6_16_2_2_g, 'dimension_6_16_2_2_g', '1', 'No');?>
									</div>
								</div>
								
							<?php form_create_notes_tadat($dimension_6_16_2_2_notes, 'dimension_6_16_2_2_notes');?>								
						<?php end_accordion_panel();?>


					<!-- END show_checkedValueA -->
					</div>
				</div>
				<!--END ACCORDION PANEL -->					

			<!--START EVIDENTIARY PANEL -->
				<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
			<!--END EVIDENTIARY PANEL -->			
		
		</div><!--END TAB CONTENT BY ID -->



		<!-- THIS STARTS THE UPLOADED TAB WITH THE VIEW LOADED INTO IT -->	
		<div class="tab-pane fade text-muted" id="uploaded"></div>

	<!--END TAB CONTENT CONTAINER -->
	</div>
	
	<!--SHOWS THE SAVING CONTENT DIV -->
	<div class="saving" style="display:none">SAVING TO DATABASE...</div>

<!-- END TAB MAIN CONTAINER -->
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