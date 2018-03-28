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
		<li class=""><a id="uploader" href="#uploaded" data-url="https://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--STATR TAB PANEL -->
		<div class="tab-pane active in fade text-muted" id="dimension_a">
			
				<?php $numCounter = 0;?>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<?php form_create_memo_tadat($background_a, 'background_a', 'a', 'a1', 'a) What organizational unit of the tax administration is responsible for setting risk management policy and overseeing its implementation?','required-textarea-reason');?>
					</div>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<?php form_create_memo_tadat($background_b, 'background_b', 'a', 'a2', 'b) Are any active committees of senior managers in place to manage compliance and/or institutional risks?','required-textarea-reason');?>
					</div>
					<!--END ACCORDION PANEL -->
					
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!--END TAB PANEL -->
		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_b">
			
				<p><strong><?php $numCounter = 1; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '2.3.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
				<!--START ACCORDION -->
				<div class="panel-group accordion" id="accordion-b">
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_1_1, 'dimension_2_3_1_1', 'b', 'b1', '2.3.1.1 Does the tax administration undertake intelligence gathering and research initiatives to build knowledge of compliance levels and risks in respect the key tax obligations (registration, filing, payment, and accurate reporting in returns)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_1_1, 'dimension_2_3_1_1', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_1_1, 'dimension_2_3_1_1', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_1_1_notes, 'dimension_2_3_1_1_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
				
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_1_2, 'dimension_2_3_1_2', 'b', 'b2', '2.3.1.2 Does the tax administration undertake intelligence gathering and research to build knowledge of compliance levels and risks in respect of PIT?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_1_2, 'dimension_2_3_1_2', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_1_2, 'dimension_2_3_1_2', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_1_2_notes, 'dimension_2_3_1_2_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_1_3, 'dimension_2_3_1_3', 'b', 'b3', '2.3.1.3 Does the tax administration undertake intelligence gathering and research to build knowledge of compliance levels and risks in respect of CIT?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_1_3, 'dimension_2_3_1_3', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_1_3, 'dimension_2_3_1_3', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_1_3_notes, 'dimension_2_3_1_3_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_1_4, 'dimension_2_3_1_4', 'b', 'b4', '2.3.1.4 Does the tax administration undertake intelligence gathering and research to build knowledge of compliance levels and risks in respect of VAT?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_1_4, 'dimension_2_3_1_4', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_1_4, 'dimension_2_3_1_4', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_1_4_notes, 'dimension_2_3_1_4_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_1_5, 'dimension_2_3_1_5', 'b', 'b5', '2.3.1.5  Does the tax administration undertake intelligence gathering and research to build knowledge of compliance levels and risks in respect of PAYE?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_1_5, 'dimension_2_3_1_5', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_1_5, 'dimension_2_3_1_5', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_1_5_notes, 'dimension_2_3_1_5_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_1_6, 'dimension_2_3_1_6', 'b', 'b6', '2.3.1.6 Does the tax administration undertake intelligence gathering and research to build knowledge of compliance levels and risks in respect of large business segments?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_1_6, 'dimension_2_3_1_6', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_1_6, 'dimension_2_3_1_6', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_1_6_notes, 'dimension_2_3_1_6_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_1_7, 'dimension_2_3_1_7', 'b', 'b7', '2.3.1.7 Does the tax administration undertake intelligence gathering and research to build knowledge of compliance levels and risks in respect of medium business segments?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_1_7, 'dimension_2_3_1_7', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_1_7, 'dimension_2_3_1_7', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_1_7_notes, 'dimension_2_3_1_7_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_1_8, 'dimension_2_3_1_8', 'b', 'b8', '2.3.1.8 Does the tax administration undertake intelligence gathering and research to build knowledge of compliance levels and risks in respect of small business segments?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_1_8, 'dimension_2_3_1_8', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_1_8, 'dimension_2_3_1_8', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_1_8_notes, 'dimension_2_3_1_8_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_1_9, 'dimension_2_3_1_9', 'b', 'b9', '2.3.1.Analysis of the results of environmental scans undertaken by the tax administration as part of its multi-year strategic planning?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_1_9, 'dimension_2_3_1_9', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_1_9, 'dimension_2_3_1_9', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_1_9_notes, 'dimension_2_3_1_9_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_1_10, 'dimension_2_3_1_10', 'b', 'b10', '2.3.1.10 Are analysis of tax returns and financial statements undertaken?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_1_10, 'dimension_2_3_1_10', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_1_10, 'dimension_2_3_1_10', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_1_10_notes, 'dimension_2_3_1_10_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_1_11, 'dimension_2_3_1_11', 'b', 'b11', '2.3.1.11 Are analysis of audit results including results from random audits conducted as a component of the tax administration\'s wider audit program to test compliance levels across a representative sample of the target taxpayer population (e.g., vendors registered for VAT or business income taxpayers within a particular industry segment) undertaken?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_1_11, 'dimension_2_3_1_11', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_1_11, 'dimension_2_3_1_11', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_1_11_notes, 'dimension_2_3_1_11_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_1_12, 'dimension_2_3_1_12', 'b', 'b12', '2.3.1.12 Are research into hidden economic activity of registered and unregistered businesses with the intention of evading taxes (e.g., through selling and buying goods and services in cash and falsifying accounting records) undertaken?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_1_12, 'dimension_2_3_1_12', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_1_12, 'dimension_2_3_1_12', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_1_12_notes, 'dimension_2_3_1_12_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_1_13, 'dimension_2_3_1_13', 'b', 'b13', '2.3.1.13 Are studies into topical compliance issues internationally, such as transfer pricing and other forms of profit shifting by large taxpayers with cross border operations, and aggressive tax planning of high-wealth and high-income taxpayers undertaken?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_1_13, 'dimension_2_3_1_13', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_1_13, 'dimension_2_3_1_13', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_1_13_notes, 'dimension_2_3_1_13_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_1_14, 'dimension_2_3_1_14', 'b', 'b14', '2.3.1.14 Are analysis of environmental factors that influence taxpayer compliance behavior (e.g., business, industry, sociological, economic, and psychological factors) undertaken?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_1_14, 'dimension_2_3_1_14', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_1_14, 'dimension_2_3_1_14', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_1_14_notes, 'dimension_2_3_1_14_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_1_15, 'dimension_2_3_1_15', 'b', 'b15', '2.3.1.15 Are analysis of third party information gathered from, for example, banks, stock exchange, and government agencies such as the anti-money laundering agency and registrar of land and property ownership undertaken?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_1_15, 'dimension_2_3_1_15', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_1_15, 'dimension_2_3_1_15', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_1_15_notes, 'dimension_2_3_1_15_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_1_16, 'dimension_2_3_1_16', 'b', 'b16', '2.3.1.16 Are tax gap studies undertaken? ? [Note: This is a general question given that tax gap analysis is covered in depth in POA 6.]');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_1_16, 'dimension_2_3_1_16', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_1_16, 'dimension_2_3_1_16', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_1_16_notes, 'dimension_2_3_1_16_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					
				<!--END ACCORDION -->
				</div>
				<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
			
		</div>
		<!--END TAB PANEL -->	
		
		<!-- ************************************************************ START TAB PANEL ************************************************************ -->
		<div class="tab-pane fade text-muted" id="dimension_c">
			
				<p><strong><?php $numCounter = 2; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '2.3.2 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
				<!--START ACCORDION -->
				<div class="panel-group accordion" id="accordion-c">
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_2_1, 'dimension_2_3_2_1', 'c', 'c1', '2.3.2.1 Does the tax administration have a structured process—of the kind endorsed by the IMF and OECD—in place to assess and prioritize compliance risks?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_2_1, 'dimension_2_3_2_1', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_2_1, 'dimension_2_3_2_1', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_2_1_notes, 'dimension_2_3_2_1_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_2_2, 'dimension_2_3_2_2', 'c', 'c2', '2.3.2.2 Does the process cover all core taxes?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_2_2, 'dimension_2_3_2_2', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_2_2, 'dimension_2_3_2_2', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_2_2_notes, 'dimension_2_3_2_2_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_2_3, 'dimension_2_3_2_3', 'c', 'c3', '2.3.2.3 Does the process cover all key taxpayer segments?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_2_3, 'dimension_2_3_2_3', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_2_3, 'dimension_2_3_2_3', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_2_3_notes, 'dimension_2_3_2_3_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_2_4, 'dimension_2_3_2_4', 'c', 'c4', '2.3.2.4 Does the process use information gathered from the variety of sources discussed in Dimension 1?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_2_4, 'dimension_2_3_2_4', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_2_4, 'dimension_2_3_2_4', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_2_4_notes, 'dimension_2_3_2_4_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_2_5, 'dimension_2_3_2_5', 'c', 'c5', '2.3.2.5 Does the process form part of the tax administration\'s planning process so that compliance risks and associated responses are determined in a context of the administration\'s broader objectives and capabilities? If so, is the risk process tied to a multi-year strategic planning process? Alternatively, is it linked to the tax administration\'s annual business planning process?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_2_5, 'dimension_2_3_2_5', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_2_5, 'dimension_2_3_2_5', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_2_5_notes, 'dimension_2_3_2_5_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_2_6, 'dimension_2_3_2_6', 'c', 'c6', '2.3.2.6 Does the tax administration make estimates of tax revenue lost as a result of taxpayer noncompliance? (By their nature, such estimates are likely to be approximate and intended to inform the process of assessing and responding to the risks.)');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_2_6, 'dimension_2_3_2_6', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_2_6, 'dimension_2_3_2_6', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_2_6_notes, 'dimension_2_3_2_6_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->

					<!--START ACCORDION PANEL -->
						<?php form_create_memo_tadat($dimension_2_3_2_7, 'dimension_2_3_2_7', 'c', 'c7', '2.3.2.7 How often are estimates made?');?>
					<!--END ACCORDION PANEL -->

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_2_8, 'dimension_2_3_2_8', 'c', 'c8', '2.3.2.8 Is the estimation methodology documented, including the assumptions upon which estimates are based?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_2_8, 'dimension_2_3_2_8', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_2_8, 'dimension_2_3_2_8', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_2_8_notes, 'dimension_2_3_2_8_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_2_9, 'dimension_2_3_2_9', 'c', 'c9', '2.3.2.9 Is the methodology consistently applied?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_2_9, 'dimension_2_3_2_9', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_2_9, 'dimension_2_3_2_9', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_2_9_notes, 'dimension_2_3_2_9_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_2_10, 'dimension_2_3_2_10', 'c', 'c10', '2.3.2.10 Are tax revenue leakage estimates made in respect of unregistered businesses?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_2_10, 'dimension_2_3_2_10', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_2_10, 'dimension_2_3_2_10', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_2_10_notes, 'dimension_2_3_2_10_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_2_11, 'dimension_2_3_2_11', 'c', 'c11', '2.3.2.11 Are tax revenue leakage estimates made in respect of illegal tax evasion (e.g., unreported business income and over-claimed deductions and rebates)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_2_11, 'dimension_2_3_2_11', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_2_11, 'dimension_2_3_2_11', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_2_11_notes, 'dimension_2_3_2_11_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_2_12, 'dimension_2_3_2_12', 'c', 'c12', '2.3.2.12 Are tax revenue leakage estimates made in respect of tax avoidance through aggressive tax planning (e.g., avoidance involving transfer pricing and other forms of profit shifting by large taxpayers with cross border operations, and avoidance schemes of high wealth and high income taxpayers)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_2_12, 'dimension_2_3_2_12', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_2_12, 'dimension_2_3_2_12', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_2_12_notes, 'dimension_2_3_2_12_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_2_13, 'dimension_2_3_2_13', 'c', 'c13', '2.3.2.13 Are tax revenue leakage estimates made in respect of tax fraud (e.g., fraudulent VAT and income tax refund claims)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_2_13, 'dimension_2_3_2_13', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_2_13, 'dimension_2_3_2_13', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_2_13_notes, 'dimension_2_3_2_13_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_2_14, 'dimension_2_3_2_14', 'c', 'c14', '2.3.2.14 Are all core taxes covered when tax revenue leakage estimates are made?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_2_14, 'dimension_2_3_2_14', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_2_14, 'dimension_2_3_2_14', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_2_14_notes, 'dimension_2_3_2_14_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_2_3_2_15, 'dimension_2_3_2_15', 'c', 'c15', '2.3.2.15 Are tax revenue leakage estimates publicly reported?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_2_3_2_15, 'dimension_2_3_2_15', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_2_3_2_15, 'dimension_2_3_2_15', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_2_3_2_15_notes, 'dimension_2_3_2_15_notes');?>
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