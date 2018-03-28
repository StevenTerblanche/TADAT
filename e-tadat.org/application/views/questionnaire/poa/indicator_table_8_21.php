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
		<li class=""><a href="#dimension_d" data-toggle="tab"><strong>DIMENSION 4</strong></a></li>						

		<li class=""><a id="uploader" href="#uploaded" data-url="https://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--STATR TAB PANEL -->
		<div class="tab-pane active in fade text-muted" id="dimension_a">
			
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '8.21.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>				
				<!--START ACCORDION PANEL -->
				<div class="panel-group accordion" id="accordion-a">
					<!--START ACCORDION -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_8_21_1_1_1, 'dimension_8_21_1_1_1', 'a', 'a1', '8.21.1.1 Do withholding at source arrangements exist for:');?>
							<div class="answer-wrapper">
								<div class="answer" style="width:400px !important">a) Employment income (salaries and wages)</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_8_21_1_1_1, 'dimension_8_21_1_1_1', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_8_21_1_1_1, 'dimension_8_21_1_1_1', '1', 'No');?>
								</div>
							</div>
							<div class="answer-wrapper">
								<div class="answer" style="width:400px !important">b) Interest income</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_8_21_1_1_2, 'dimension_8_21_1_1_2', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_8_21_1_1_2, 'dimension_8_21_1_1_2', '1', 'No');?>
								</div>
							</div>
							<div class="answer-wrapper">
								<div class="answer" style="width:400px !important">c) Dividend income paid by public companies to resident taxpayers</div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_8_21_1_1_3, 'dimension_8_21_1_1_3', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_8_21_1_1_3, 'dimension_8_21_1_1_3', '1', 'No');?>
								</div>
							</div>
							
							<?php form_create_notes_tadat($dimension_8_21_1_1_notes, 'dimension_8_21_1_1_notes','For what other types of income does withholding at source arrangements exist?');?>
					<?php end_accordion_panel();?>
				<!--END ACCORDION -->																				
					<?php start_accordion_panel($strFieldsetStatus, $dimension_8_21_1_2, 'dimension_8_21_1_2', 'a', 'a2', '8.21.1.2 What third party reporting exists?');?>
							<?php form_create_notes_tadat($dimension_8_21_1_2, 'dimension_8_21_1_2','Specifically, to what extent is there a mandatory requirement on prescribed third parties (businesses, financial institutions, and government agencies) to report payments of income, other transactions, and payee details including a TIN to the tax administration?');?>
					<?php end_accordion_panel();?>
				<!--END ACCORDION -->																				
					<?php start_accordion_panel($strFieldsetStatus, $dimension_8_21_1_3, 'dimension_8_21_1_3', 'a', 'a3', '8.21.1.3 To what extent is third party information used by the tax administration to verify the information reported by taxpayers in their tax returns?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_8_21_1_3, 'dimension_8_21_1_3', '2', 'Large extent');?>
									<?php form_create_radio_tadat($dimension_8_21_1_3, 'dimension_8_21_1_3', '1', 'Minor extent');?>
									<?php form_create_radio_tadat($dimension_8_21_1_3, 'dimension_8_21_1_3', '3', 'No extent');?>
								</div>
							</div>
							<?php form_create_notes_tadat($dimension_8_21_1_3_notes, 'dimension_8_21_1_3_notes','What other third party information is used by the tax administration?');?>
					<?php end_accordion_panel();?>
				<!--END ACCORDION -->											
					<?php start_accordion_panel($strFieldsetStatus, $dimension_8_21_1_4, 'dimension_8_21_1_4', 'a', 'a4', '8.21.1.4 How is third party information used by the tax administration to pre-fill income tax returns?');?>
							<div class="answer-wrapper">
								<div class="answer-container" style="width:500px !important">
									<?php form_create_radio_tadat($dimension_8_21_1_4, 'dimension_8_21_1_4', '2', 'Used for pre-filling of most fields');?>
								</div>
							</div>
							<div class="answer-wrapper">
								<div class="answer-container" style="width:500px !important">
									<?php form_create_radio_tadat($dimension_8_21_1_4, 'dimension_8_21_1_4', '1', 'Used for pre-filling of only employment income and interest earned on savings');?>
								</div>
							</div>
							<div class="answer-wrapper">
								<div class="answer-container" style="width:500px !important">
									<?php form_create_radio_tadat($dimension_8_21_1_4, 'dimension_8_21_1_4', '3', 'Not used');?>
								</div>
							</div>

							<?php form_create_notes_tadat($dimension_8_21_1_4_notes, 'dimension_8_21_1_4_notes');?>
					<?php end_accordion_panel();?>
				
				</div>
				<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
			
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->
		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_b">
			
				<p><strong><?php $numCounter = 1; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '8.21.2 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
				<!--START ACCORDION -->
				<div class="panel-group accordion" id="accordion-b">
					<?php start_accordion_panel($strFieldsetStatus, $dimension_8_21_2_1_1, 'dimension_8_21_2_1_1', 'b', 'b1', '8.21.2.1 Is the design, of filing and payment cycles of core taxes, based on the size, revenue contribution, and costs of compliance for the following core taxes?');?>
						<div class="answer-wrapper">
							<div class="answer" style="width:150px !important">a) CIT?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_2_1_1, 'dimension_8_21_2_1_1', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_8_21_2_1_1, 'dimension_8_21_2_1_1', '1', 'No');?>								
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:150px !important">b) PIT?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_2_1_2, 'dimension_8_21_2_1_2', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_8_21_2_1_2, 'dimension_8_21_2_1_2', '1', 'No');?>								
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:150px !important">c) VAT?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_2_1_3, 'dimension_8_21_2_1_3', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_8_21_2_1_3, 'dimension_8_21_2_1_3', '1', 'No');?>								
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:150px !important">d) PAYE?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_2_1_4, 'dimension_8_21_2_1_4', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_8_21_2_1_4, 'dimension_8_21_2_1_4', '1', 'No');?>								
							</div>														
						</div>							
						<?php form_create_notes_tadat($dimension_8_21_2_1_notes, 'dimension_8_21_2_1_notes');?>
					<?php end_accordion_panel();?>							

					<?php start_accordion_panel($strFieldsetStatus, $dimension_8_21_2_2_1, 'dimension_8_21_2_2_1', 'b', 'b2', '8.21.2.2 Is the design, of filing and payment cycles of core taxes, based on the size, revenue contribution, and costs of compliance for the following taxpayer segments?');?>
						<div class="answer-wrapper">
							<div class="answer" style="width:300px !important">a) Large business taxpayer segments</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_2_2_1, 'dimension_8_21_2_2_1', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_8_21_2_2_1, 'dimension_8_21_2_2_1', '1', 'No');?>								
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:300px !important">b) Medium-size business taxpayer segments</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_2_2_2, 'dimension_8_21_2_2_2', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_8_21_2_2_2, 'dimension_8_21_2_2_2', '1', 'No');?>								
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:300px !important">c)  Small business taxpayer segments</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_2_2_3, 'dimension_8_21_2_2_3', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_8_21_2_2_3, 'dimension_8_21_2_2_3', '1', 'No');?>								
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:300px !important">d) Non-business individuals taxpayer segments</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_2_2_4, 'dimension_8_21_2_2_4', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_8_21_2_2_4, 'dimension_8_21_2_2_4', '1', 'No');?>								
							</div>														
						</div>							
					<?php form_create_notes_tadat($dimension_8_21_2_2_notes, 'dimension_8_21_2_2_notes');?>
					<?php end_accordion_panel();?>							
					<?php start_accordion_panel($strFieldsetStatus, $dimension_8_21_2_3_1, 'dimension_8_21_2_3_1', 'b', 'b3', '8.21.2.3 Is the design, of filing and payment cycles of core taxes, based on the flow of revenue to Government to facilitate budget management for the following core taxes?');?>
						<div class="answer-wrapper">
							<div class="answer" style="width:150px !important">a) CIT?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_2_3_1, 'dimension_8_21_2_3_1', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_8_21_2_3_1, 'dimension_8_21_2_3_1', '1', 'No');?>								
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:150px !important">b) PIT?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_2_3_2, 'dimension_8_21_2_3_2', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_8_21_2_3_2, 'dimension_8_21_2_3_2', '1', 'No');?>								
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:150px !important">c) VAT?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_2_3_3, 'dimension_8_21_2_3_3', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_8_21_2_3_3, 'dimension_8_21_2_3_3', '1', 'No');?>								
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:150px !important">d) PAYE?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_2_3_4, 'dimension_8_21_2_3_4', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_8_21_2_3_4, 'dimension_8_21_2_3_4', '1', 'No');?>								
							</div>														
						</div>							
						<?php form_create_notes_tadat($dimension_8_21_2_3_notes, 'dimension_8_21_2_3_notes');?>
					<?php end_accordion_panel();?>							

					<?php start_accordion_panel($strFieldsetStatus, $dimension_8_21_2_4_1, 'dimension_8_21_2_4_1', 'b', 'b4', '8.21.2.4 Is the design, of filing and payment cycles of core taxes, based on the flow of revenue to Government to facilitate budget management for the following taxpayer segments?');?>
						<div class="answer-wrapper">
							<div class="answer" style="width:300px !important">a) Large business taxpayer segments</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_2_4_1, 'dimension_8_21_2_4_1', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_8_21_2_4_1, 'dimension_8_21_2_4_1', '1', 'No');?>								
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:300px !important">b) Medium-size business taxpayer segments</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_2_4_2, 'dimension_8_21_2_4_2', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_8_21_2_4_2, 'dimension_8_21_2_4_2', '1', 'No');?>								
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:300px !important">c)  Small business taxpayer segments</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_2_4_3, 'dimension_8_21_2_4_3', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_8_21_2_4_3, 'dimension_8_21_2_4_3', '1', 'No');?>								
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:300px !important">d) Non-business individuals taxpayer segments</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_2_4_4, 'dimension_8_21_2_4_4', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_8_21_2_4_4, 'dimension_8_21_2_4_4', '1', 'No');?>								
							</div>														
						</div>							
					<?php form_create_notes_tadat($dimension_8_21_2_4_notes, 'dimension_8_21_2_4_notes');?>
					<?php end_accordion_panel();?>							

					<?php start_accordion_panel($strFieldsetStatus, $dimension_8_21_2_5, 'dimension_8_21_2_5', 'b', 'b5', '8.21.2.5 To what extent is the amount of CIT collected by advance payment regimes within the year the relevant income is earned?');?>
						<div class="answer-wrapper">
							<div class="answer">Answer: </div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_2_5, 'dimension_8_21_2_5', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_2_5, 'dimension_8_21_2_5', '1', 'Lesser extent');?>
								<?php form_create_radio_tadat($dimension_8_21_2_5, 'dimension_8_21_2_5', '1', 'Minor or no extent');?>	
							</div>
						</div>							
					<?php form_create_notes_tadat($dimension_8_21_2_5_notes, 'dimension_8_21_2_5_notes');?>
					<?php end_accordion_panel();?>							

					<?php start_accordion_panel($strFieldsetStatus, $dimension_8_21_2_6, 'dimension_8_21_2_6', 'b', 'b6', '8.21.2.6 To what extent is the amount of PIT collected by advance payment regimes within the year the relevant income is earned?');?>
						<div class="answer-wrapper">
							<div class="answer">Answer: </div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_2_6, 'dimension_8_21_2_6', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_2_6, 'dimension_8_21_2_6', '1', 'Lesser extent');?>
								<?php form_create_radio_tadat($dimension_8_21_2_6, 'dimension_8_21_2_6', '1', 'Minor or no extent');?>	
							</div>														
						</div>							
					<?php form_create_notes_tadat($dimension_8_21_2_6_notes, 'dimension_8_21_2_6_notes');?>
					<?php end_accordion_panel();?>							

				<!--END ACCORDION -->
				</div>
				<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!--END TAB PANEL -->	
		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_c">
			<p><strong><?php $numCounter = 2; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '8.21.3 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
				<!--START ACCORDION PANEL -->
				<div class="panel-group accordion" id="accordion-c">
					<!--START ACCORDION -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_8_21_3_1_1, 'dimension_8_21_3_1_1', 'c', 'c1', '8.21.3.1 To what extent does the following core taxes allow electronic filing?');?>
						<div class="answer-wrapper">
							<div class="answer" style="width:150px !important">a) CIT</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_3_1_1, 'dimension_8_21_3_1_1', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_3_1_1, 'dimension_8_21_3_1_1', '1', 'Minor or no extent');?>	
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:150px !important">b) PIT</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_3_1_2, 'dimension_8_21_3_1_2', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_3_1_2, 'dimension_8_21_3_1_2', '1', 'Minor or no extent');?>	
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:150px !important">c) VAT</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_3_1_3, 'dimension_8_21_3_1_3', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_3_1_3, 'dimension_8_21_3_1_3', '1', 'Minor or no extent');?>	
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:150px !important">d) PAYE</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_3_1_4, 'dimension_8_21_3_1_4', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_3_1_4, 'dimension_8_21_3_1_4', '1', 'Minor or no extent');?>	
							</div>														
						</div>							
						<?php form_create_notes_tadat($dimension_8_21_3_1_notes, 'dimension_8_21_3_1_notes');?>
					<?php end_accordion_panel();?>							
				<!--END ACCORDION -->											
					<!--START ACCORDION -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_8_21_3_2_1, 'dimension_8_21_3_2_1', 'c', 'c2', '8.21.3.2 To what extent does the following main taxpayer segments allow electronic filing?');?>
						<div class="answer-wrapper">
							<div class="answer" style="width:300px !important">a) Large business taxpayer segments</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_3_2_1, 'dimension_8_21_3_2_1', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_3_2_1, 'dimension_8_21_3_2_1', '1', 'Minor or no extent');?>	
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:300px !important">b) Medium-size business taxpayer segments</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_3_2_2, 'dimension_8_21_3_2_2', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_3_2_2, 'dimension_8_21_3_2_2', '1', 'Minor or no extent');?>	
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:300px !important">c)  Small business taxpayer segments</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_3_2_3, 'dimension_8_21_3_2_3', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_3_2_3, 'dimension_8_21_3_2_3', '1', 'Minor or no extent');?>	
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:300px !important">d) Non-business individuals taxpayer segments</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_3_2_4, 'dimension_8_21_3_2_4', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_3_2_4, 'dimension_8_21_3_2_4', '1', 'Minor or no extent');?>	
							</div>														
						</div>									
						<?php form_create_notes_tadat($dimension_8_21_3_2_notes, 'dimension_8_21_3_2_notes');?>
					<?php end_accordion_panel();?>							
				<!--END ACCORDION -->									
				
						
<!--START ACCORDION -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_8_21_3_3, 'dimension_8_21_3_3', 'c', 'c3', '8.21.3.3 The extent that core taxes use electronic filing.');?>
								<?php
									$period_1 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'period_year_1', $numRecords = null);
									$period_2 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'period_year_2', $numRecords = null);
									$period_3 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'period_year_3', $numRecords = null);
									
									$cit_1 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'cit_electronic_filing_percent_1', $numRecords = null);
									$cit_2 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'cit_electronic_filing_percent_2', $numRecords = null);
									$cit_3 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'cit_electronic_filing_percent_3', $numRecords = null);
									$cit_total = $cit_1 + $cit_2 + $cit_3;

									$pit_1 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'pit_electronic_filing_percent_1', $numRecords = null);
									$pit_2 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'pit_electronic_filing_percent_2', $numRecords = null);
									$pit_3 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'pit_electronic_filing_percent_3', $numRecords = null);
									$pit_total = $pit_1 + $pit_2 + $pit_3;

									$vat_1 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'vat_electronic_filing_percent_1', $numRecords = null);
									$vat_2 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'vat_electronic_filing_percent_2', $numRecords = null);
									$vat_3 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'vat_electronic_filing_percent_3', $numRecords = null);
									$vat_total = $vat_1 + $vat_2 + $vat_3;

									$paye_1 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'paye_electronic_filing_percent_1', $numRecords = null);
									$paye_2 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'paye_electronic_filing_percent_2', $numRecords = null);
									$paye_3 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'paye_electronic_filing_percent_3', $numRecords = null);
									$paye_total = $paye_1 + $paye_2 + $paye_3;
									$average_period_1 = ($cit_1 + $pit_1 + $vat_1 + $paye_1) / 4;
									$average_period_2 = ($cit_2 + $pit_2 + $vat_2 + $paye_2) / 4;
									$average_period_3 = ($cit_3 + $pit_3 + $vat_3 + $paye_3) / 4;
									$overall_average = ($average_period_1 + $average_period_2 + $average_period_3)/3;
									
								?>
								<div class="answer-wrapper">
									<p>The Tax Administration indicated that over the past 3 years of <?php echo $period_1;?>, <?php echo $period_2;?>, <?php echo $period_3;?> 
									 that the average usage of electronic filing for all core taxes was <strong><?php  echo number_format($overall_average,2);?>%</strong>:</p>
								</div>
								<div class="answer-wrapper">
									<table class="table table-bordered table-striped" style="width:400px !important">
										<tr>
											<th>&nbsp;</th>
											<th class="center"><?php echo $period_1; ?></th>
											<th class="center"><?php echo $period_2; ?></th>
											<th class="center"><?php echo $period_3; ?></th>
										</tr>
										<tr>
											<td>CIT</td>
											<td class="center"><?php echo number_format($cit_1,0);?>%</td>
											<td class="center"><?php echo number_format($cit_2,0);?>%</td>
											<td class="center"><?php echo number_format($cit_3,0);?>%</td>
										</tr>
										<tr>
											<td>PIT</td>
											<td class="center"><?php echo number_format($pit_1,0);?>%</td>
											<td class="center"><?php echo number_format($pit_2,0);?>%</td>
											<td class="center"><?php echo number_format($pit_3,0);?>%</td>
										</tr>										
										<tr>
											<td>VAT</td>
											<td class="center"><?php echo number_format($vat_1,0);?>%</td>
											<td class="center"><?php echo number_format($vat_2,0);?>%</td>
											<td class="center"><?php echo number_format($vat_3,0);?>%</td>
										</tr>										
										<tr>
											<td>PAYE</td>
											<td class="center"><?php echo number_format($paye_1,0);?>%</td>
											<td class="center"><?php echo number_format($paye_2,0);?>%</td>
											<td class="center"><?php echo number_format($paye_3,0);?>%</td>
										</tr>
										<tr>
											<td>Average Ratio</td>
											<td class="center"><?php echo number_format($average_period_1,2);?>%</td>
											<td class="center"><?php echo number_format($average_period_2,2);?>%</td>
											<td class="center"><?php echo number_format($average_period_2,2);?>%</td>
										</tr>
									</table>
								</div>
								<?php

									$dimension_8_21_3_3_1 = $cit_3;
									echo form_hidden('dimension_8_21_3_3_1', $dimension_8_21_3_3_1);
									$dimension_8_21_3_3_2 = $pit_3;
									echo form_hidden('dimension_8_21_3_3_2', $dimension_8_21_3_3_2);
									$dimension_8_21_3_3_3 = $vat_3;
									echo form_hidden('dimension_8_21_3_3_3', $dimension_8_21_3_3_3);
									$dimension_8_21_3_3_4 = $paye_3;
									echo form_hidden('dimension_8_21_3_3_4', $dimension_8_21_3_3_4);																											

								?>
								<div class="answer-wrapper">

								</div>
						<div class="answer-wrapper">
									<p>Does your research confirm these findings?</p>
							<div class="answer" style="width:100px !important">Answer: </div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_3_3, 'dimension_8_21_3_3', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_8_21_3_3, 'dimension_8_21_3_3', '1', 'No');?>
							</div>														
						</div>							
						<?php form_create_notes_tadat($dimension_8_21_3_3_notes, 'dimension_8_21_3_3_notes');?>
					<?php end_accordion_panel();?>							
				<!--END ACCORDION -->	
					<!--START ACCORDION -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_8_21_3_4, 'dimension_8_21_3_4', 'c', 'c4', '8.21.3.4 Does the tax administration actively promote use of electronic filing?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_8_21_3_4, 'dimension_8_21_3_4', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_8_21_3_4, 'dimension_8_21_3_4', '1', 'No');?>
								</div>
							</div>
							<?php form_create_notes_tadat($dimension_8_21_3_4_notes, 'dimension_8_21_3_4_notes');?>							
					<?php end_accordion_panel();?>
				<!--END ACCORDION -->											
					<!--START ACCORDION -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_8_21_3_5_notes, 'dimension_8_21_3_5_notes', 'c', 'c5', '8.21.3.5 What plans does the tax administration have to expand use of electronic filing in the medium term (2-5 years)?');?>
							<?php form_create_notes_tadat($dimension_8_21_3_5_notes, 'dimension_8_21_3_5_notes',' ');?>							
					<?php end_accordion_panel();?>
				<!--END ACCORDION -->											
				
				</div>
				<!--END ACCORDION PANEL-->				
				<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
			
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->
		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_d">
			
				<!--START ACCORDION -->
				<div class="panel-group accordion" id="accordion-d">
				<p><strong><?php $numCounter = 3; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '8.21.4 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					
					<!--START ACCORDION -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_8_21_4_1_1, 'dimension_8_21_4_1_1', 'd', 'd1', '8.21.4.1 To what extent are the following types of electronic payment facilities available and used:');?>
						<div class="answer-wrapper">
							<div class="answer" style="width:300px !important">a) Blanket 'direct debit' authority for payment of core tax liabilities?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_4_1_1, 'dimension_8_21_4_1_1', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_4_1_1, 'dimension_8_21_4_1_1', '1', 'Minor or no extent');?>	
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:300px !important">b) Direct debit authority for payment on a liability-by-liability basis?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_4_1_2, 'dimension_8_21_4_1_2', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_4_1_2, 'dimension_8_21_4_1_2', '1', 'Minor or no extent');?>	
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:300px !important">c) Internet payment methods (e.g., via electronic funds transfer or on-line payment by credit card)?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_4_1_3, 'dimension_8_21_4_1_3', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_4_1_3, 'dimension_8_21_4_1_3', '1', 'Minor or no extent');?>	
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:300px !important">d) Telephone banking?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_4_1_4, 'dimension_8_21_4_1_4', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_4_1_4, 'dimension_8_21_4_1_4', '1', 'Minor or no extent');?>	
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:300px !important">e) Automatic teller machines?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_4_1_5, 'dimension_8_21_4_1_5', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_4_1_5, 'dimension_8_21_4_1_5', '1', 'Minor or no extent');?>	
							</div>														
						</div>							
						<div class="answer-wrapper">
							<div class="answer" style="width:300px !important">f) Payment kiosks?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_4_1_6, 'dimension_8_21_4_1_6', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_4_1_6, 'dimension_8_21_4_1_6', '1', 'Minor or no extent');?>	
							</div>														
						</div>
						<?php form_create_notes_tadat($dimension_8_21_4_1_notes, 'dimension_8_21_4_1_notes','What other methods for payment of all or some core tax liabilities are available and used?');?>	
					<?php end_accordion_panel();?>
					<!--END ACCORDION -->									


					<!--START ACCORDION -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_8_21_4_2_1, 'dimension_8_21_4_2_1', 'd', 'd2', '8.21.4.2 To what extent are electronic payment facilities available and used for:');?>
						<div class="answer-wrapper">
							<div class="answer" style="width:200px !important">a) CIT</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_4_2_1, 'dimension_8_21_4_2_1', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_4_2_1, 'dimension_8_21_4_2_1', '1', 'Minor or no extent');?>	
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:200px !important">b) PIT</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_4_2_2, 'dimension_8_21_4_2_2', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_4_2_2, 'dimension_8_21_4_2_2', '1', 'Minor or no extent');?>	
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:200px !important">c) VAT</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_4_2_3, 'dimension_8_21_4_2_3', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_4_2_3, 'dimension_8_21_4_2_3', '1', 'Minor or no extent');?>	
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:200px !important">d) PAYE witholding</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_4_2_4, 'dimension_8_21_4_2_4', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_4_2_4, 'dimension_8_21_4_2_4', '1', 'Minor or no extent');?>	
							</div>														
						</div>
						<?php form_create_notes_tadat($dimension_8_21_4_2_notes, 'dimension_8_21_4_2_notes');?>	
					<?php end_accordion_panel();?>
					<!--END ACCORDION -->


					<!--START ACCORDION -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_8_21_4_3_1, 'dimension_8_21_4_3_1', 'd', 'd3', '8.21.4.3 To what extent are electronic payment facilities available and used by:');?>
						<div class="answer-wrapper">
							<div class="answer" style="width:350px !important">a) Large taxpayers</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_4_3_1, 'dimension_8_21_4_3_1', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_4_3_1, 'dimension_8_21_4_3_1', '1', 'Minor or no extent');?>	
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:350px !important">b) Medium-size taxpayers</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_4_3_2, 'dimension_8_21_4_3_2', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_4_3_2, 'dimension_8_21_4_3_2', '1', 'Minor or no extent');?>	
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:350px !important">c) Small businesses</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_4_3_3, 'dimension_8_21_4_3_3', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_4_3_3, 'dimension_8_21_4_3_3', '1', 'Minor or no extent');?>	
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:350px !important">d) Non-business individuals</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_4_3_4, 'dimension_8_21_4_3_4', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_4_3_4, 'dimension_8_21_4_3_4', '1', 'Minor or no extent');?>	
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:350px !important">e) Tax intermediaries (tax agents/ preparers/ tax professionals)</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_8_21_4_3_5, 'dimension_8_21_4_3_5', '2', 'Large extent');?>
								<?php form_create_radio_tadat($dimension_8_21_4_3_5, 'dimension_8_21_4_3_5', '1', 'Minor or no extent');?>	
							</div>														
						</div>
						
						<?php form_create_notes_tadat($dimension_8_21_4_3_notes, 'dimension_8_21_4_3_notes');?>							
					<?php end_accordion_panel();?>
					<!--END ACCORDION -->	

					<?php
		
						$cit_1 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'cit_electronic_payments_value_1', $numRecords = null);
						$cit_2 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'cit_electronic_payments_value_2', $numRecords = null);
						$cit_3 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'cit_electronic_payments_value_3', $numRecords = null);
						$cit_total = $cit_1 + $cit_2 + $cit_3;

						$pit_1 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'pit_electronic_payments_value_1', $numRecords = null);
						$pit_2 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'pit_electronic_payments_value_2', $numRecords = null);
						$pit_3 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'pit_electronic_payments_value_3', $numRecords = null);
						$pit_total = $pit_1 + $pit_2 + $pit_3;

						$vat_1 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'vat_electronic_payments_value_1', $numRecords = null);
						$vat_2 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'vat_electronic_payments_value_2', $numRecords = null);
						$vat_3 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'vat_electronic_payments_value_3', $numRecords = null);
						$vat_total = $vat_1 + $vat_2 + $vat_3;

						$paye_1 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'paye_electronic_payments_value_1', $numRecords = null);
						$paye_2 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'paye_electronic_payments_value_2', $numRecords = null);
						$paye_3 = _get_field_by_id_single_row('db_b','pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'), 'paye_electronic_payments_value_3', $numRecords = null);
						$paye_total = $paye_1 + $paye_2 + $paye_3;
						
						$average_period_1 = ($cit_1 + $pit_1 + $vat_1 + $paye_1) / 4;
						$average_period_2 = ($cit_2 + $pit_2 + $vat_2 + $paye_2) / 4;
						$average_period_3 = ($cit_3 + $pit_3 + $vat_3 + $paye_3) / 4;
						$overall_average = ($average_period_1 + $average_period_2 + $average_period_3)/3;
									
						$dimension_8_21_4_7 = number_format(($cit_total/3),0);
						echo form_hidden('dimension_8_21_4_7', $dimension_8_21_4_7);
						
						$dimension_8_21_4_8 = number_format(($pit_total/3),0);
						echo form_hidden('dimension_8_21_4_8', $dimension_8_21_4_8);

						$dimension_8_21_4_9 =  number_format(($vat_total/3),0);
						echo form_hidden('dimension_8_21_4_9', $dimension_8_21_4_9);

						$dimension_8_21_4_10 =  number_format(($paye_total/3),0);
						echo form_hidden('dimension_8_21_4_10', $dimension_8_21_4_10);						
						
					?>
					
													
					<!--START ACCORDION -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_8_21_4_4, 'dimension_8_21_4_4', 'd', 'd4', '8.21.4.4 Does the tax administration pay tax refunds electronically (i.e. via direct credits to taxpayer bank accounts)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_8_21_4_4, 'dimension_8_21_4_4', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_8_21_4_4, 'dimension_8_21_4_4', '1', 'No');?>
								</div>
							</div>
							<?php form_create_notes_tadat($dimension_8_21_4_4_notes, 'dimension_8_21_4_4_notes');?>							
					<?php end_accordion_panel();?>
					<!--END ACCORDION -->											
					<!--START ACCORDION -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_8_21_4_5, 'dimension_8_21_4_5', 'd', 'd5', '8.21.4.5 Does the tax administration actively promote use of electronic payment? ');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_8_21_4_5, 'dimension_8_21_4_5', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_8_21_4_5, 'dimension_8_21_4_5', '1', 'No');?>
								</div>
							</div>
							<?php form_create_notes_tadat($dimension_8_21_4_5_notes, 'dimension_8_21_4_5_notes');?>							
					<?php end_accordion_panel();?>
					<!--END ACCORDION -->											
					<!--START ACCORDION -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_8_21_4_6, 'dimension_8_21_4_6', 'd', 'd6', '8.21.4.6 What plans does the tax administration have to expand use of electronic payment in the medium term (2-5 years)?');?>
							<?php form_create_notes_tadat($dimension_8_21_4_6, 'dimension_8_21_4_6',' ');?>	
					<?php end_accordion_panel();?>

				<!--END ACCORDION -->									
				</div>
				<!--END ACCORDION PANEL -->				
				<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
			
		</div>
		<!--END TAB PANEL -->	
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