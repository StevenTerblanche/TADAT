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
		<li class=""><a href="#dimension_e" data-toggle="tab"><strong>DIMENSION 4</strong></a></li>								
		<li class=""><a id="uploader" href="#uploaded" data-url="http://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--START TAB PANEL -->
		<div class="tab-pane active in fade text-muted" id="dimension_a">
				<?php $numCounter = 0;?>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<?php form_create_memo_tadat($background_a, 'background_a', 'a', 'a1', 'a) What organizational unit/s of the tax administration is/are responsible for taxpayer assistance and education?','required-textarea-reason');?>
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $background_b, 'background_b', 'a', 'a2', 'b) Does the tax administration have a dedicated call center(s) for taxpayer assistance?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($background_b, 'background_b', '2', 'Yes');?>
									<?php form_create_radio_tadat($background_b, 'background_b', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($background_b_notes, 'background_b_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->

					</div>
					<!--END ACCORDION PANEL -->
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->
		
		<!-- ************************************************************ START TAB PANEL ************************************************************ -->
		<div class="tab-pane fade text-muted" id="dimension_b">
			
				<p><strong><?php $numCounter = 1; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '3.7.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
				<!--START ACCORDION -->
				<div class="panel-group accordion" id="accordion-b">
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_1_1, 'dimension_3_7_1_1', 'b', 'b1', '3.7.1.1 Does the tax administration provide information to the public in respect of the main areas of taxpayer obligations (i.e. registration, filing, payment, and reporting of information in tax returns) and entitlements (e.g., refund claims)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_7_1_1, 'dimension_3_7_1_1', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_7_1_1, 'dimension_3_7_1_1', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_7_1_1_notes, 'dimension_3_7_1_1_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_1_2, 'dimension_3_7_1_2', 'b', 'b2', '3.7.1.2 Does the publicly available information cover all core taxes?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_7_1_2, 'dimension_3_7_1_2', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_7_1_2, 'dimension_3_7_1_2', '1', 'No');?>								
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_7_1_2_notes, 'dimension_3_7_1_2_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_1_3, 'dimension_3_7_1_3', 'b', 'b3', '3.7.1.3 Is the publicly available information tailored to the needs of large business taxpayer segments?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_7_1_3, 'dimension_3_7_1_3', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_7_1_3, 'dimension_3_7_1_3', '1', 'No');?>								
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_7_1_3_notes, 'dimension_3_7_1_3_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_1_4, 'dimension_3_7_1_4', 'b', 'b4', '3.7.1.4  Is the publicly available information tailored to the needs of medium-size business taxpayer segments?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_7_1_4, 'dimension_3_7_1_4', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_7_1_4, 'dimension_3_7_1_4', '1', 'No');?>								
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_7_1_4_notes, 'dimension_3_7_1_4_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_1_5, 'dimension_3_7_1_5', 'b', 'b5', '3.7.1.5  Is the publicly available information tailored to the needs of small business taxpayer segments?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_7_1_5, 'dimension_3_7_1_5', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_7_1_5, 'dimension_3_7_1_5', '1', 'No');?>								
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_7_1_5_notes, 'dimension_3_7_1_5_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_1_6, 'dimension_3_7_1_6', 'b', 'b6', '3.7.1.6  Is the publicly available information tailored to the needs of non-business individual taxpayer segments?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_7_1_6, 'dimension_3_7_1_6', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_7_1_6, 'dimension_3_7_1_6', '1', 'No');?>								
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_7_1_6_notes, 'dimension_3_7_1_6_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->





					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_1_7, 'dimension_3_7_1_7', 'b', 'b7', '3.7.1.7 Does the tax administration conduct or promote public education programs (e.g., tax seminars for people starting and running a business, and programs for teaching school students about taxes)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_7_1_7, 'dimension_3_7_1_7', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_7_1_7, 'dimension_3_7_1_7', '1', 'No');?>								
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_7_1_7_notes, 'dimension_3_7_1_7_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->															
				
				</div>
				<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
			
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->
		
		<!-- ************************************************************ START TAB PANEL ************************************************************ -->
		<div class="tab-pane fade text-muted" id="dimension_c">
			
				<p><strong><?php $numCounter = 2; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '3.7.2 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
				<!--START ACCORDION -->
				<div class="panel-group accordion" id="accordion-c">
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_2_1, 'dimension_3_7_2_1', 'c', 'c1', '3.7.2.1 Is all publicly available information current in terms of the law and administrative policy, noting that \'current\' would include changes not yet made but known to be coming (e.g., government announcements regarding intended changes to the tax laws)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_7_2_1, 'dimension_3_7_2_1', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_7_2_1, 'dimension_3_7_2_1', '1', 'No');?>								
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_7_2_1_notes, 'dimension_3_7_2_1_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->															
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_2_2, 'dimension_3_7_2_2', 'c', 'c2', '3.7.2.2 Do documented procedures exist to ensure regular and systematic updating of information (e.g., when there are changes to tax laws)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_7_2_2, 'dimension_3_7_2_2', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_7_2_2, 'dimension_3_7_2_2', '1', 'No');?>								
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_7_2_2_notes, 'dimension_3_7_2_2_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->															
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_2_3, 'dimension_3_7_2_3', 'c', 'c3', '3.7.2.3 Are the documented procedures consistently applied to ensure regular and systematic updating of information in practice?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_7_2_3, 'dimension_3_7_2_3', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_7_2_3, 'dimension_3_7_2_3', '1', 'No');?>								
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_7_2_3_notes, 'dimension_3_7_2_3_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->															
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_2_4, 'dimension_3_7_2_4', 'c', 'c4', '3.7.2.4 Are taxpayers made aware of changes, through direct communication in advance, to laws that affect them?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_7_2_4, 'dimension_3_7_2_4', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_7_2_4, 'dimension_3_7_2_4', '1', 'No');?>								
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_7_2_4_notes, 'dimension_3_7_2_4_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->															
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_2_5, 'dimension_3_7_2_5', 'c', 'c5', '3.7.2.5 Are taxpayers made aware of changes, through general media (e.g., web site and/or press release), to laws that affect them ');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_7_2_5, 'dimension_3_7_2_5', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_7_2_5, 'dimension_3_7_2_5', '1', 'No');?>								
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_7_2_5_notes, 'dimension_3_7_2_5_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->															
					
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_2_6, 'dimension_3_7_2_6', 'c', 'c6', '3.7.2.6 Are dedicated technical staff resources assigned to the task of keeping publicly available information up to date?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_7_2_6, 'dimension_3_7_2_6', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_7_2_6, 'dimension_3_7_2_6', '1', 'No');?>								
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_7_2_6_notes, 'dimension_3_7_2_6_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->															
		
				<!--END ACCORDION -->
				</div>
				<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
			
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->

		<!-- ************************************************************ START TAB PANEL ************************************************************ -->
		<div class="tab-pane fade text-muted" id="dimension_d">
			
				<p><strong><?php $numCounter = 3; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '3.7.3 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
				<!--START ACCORDION -->
				<div class="panel-group accordion" id="accordion-d">
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_3_1, 'dimension_3_7_3_1', 'd', 'd1', '3.7.3.1 By what means do taxpayers obtain information and advice from the tax administration? Specifically, is information obtained by way of:');?>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">a) A web site?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_7_3_1, 'dimension_3_7_3_1', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_3_7_3_1, 'dimension_3_7_3_1', '1', 'No');?>								
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">b) Guides, brochures, fact sheets, bulletins, and frequently asked questions?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_7_3_2, 'dimension_3_7_3_2', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_3_7_3_2, 'dimension_3_7_3_2', '1', 'No');?>								
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">c) Public education seminars?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_7_3_3, 'dimension_3_7_3_3', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_3_7_3_3, 'dimension_3_7_3_3', '1', 'No');?>								
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">d) Practice notes?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_7_3_4, 'dimension_3_7_3_4', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_3_7_3_4, 'dimension_3_7_3_4', '1', 'No');?>								
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">e) Rulings?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_7_3_5, 'dimension_3_7_3_5', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_3_7_3_5, 'dimension_3_7_3_5', '1', 'No');?>								
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">f) Telephone</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_7_3_6, 'dimension_3_7_3_6', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_3_7_3_6, 'dimension_3_7_3_6', '1', 'No');?>								
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">g) E-mail</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_7_3_7, 'dimension_3_7_3_7', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_3_7_3_7, 'dimension_3_7_3_7', '1', 'No');?>								
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">h) Text Messages</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_7_3_8, 'dimension_3_7_3_8', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_3_7_3_8, 'dimension_3_7_3_8', '1', 'No');?>								
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">i) Letters</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_7_3_9, 'dimension_3_7_3_9', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_3_7_3_9, 'dimension_3_7_3_9', '1', 'No');?>								
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">i) Face-to-face request at a tax administration enquiry counter?</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_7_3_10, 'dimension_3_7_3_10', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_3_7_3_10, 'dimension_3_7_3_10', '1', 'No');?>								
							</div>														
						</div>
						<?php form_create_notes_tadat($dimension_3_7_3_10_notes, 'dimension_3_7_3_10_notes');?>						
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->															


					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_3_11, 'dimension_3_7_3_11', 'd', 'd2', '3.7.3.2 On which core tax obligations and entitlements can taxpayers obtain information and advice on?');?>
						<div class="answer-wrapper">
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_7_3_11, 'dimension_3_7_3_11', '2', 'ALL tax obligations');?>
								<?php form_create_radio_tadat($dimension_3_7_3_11, 'dimension_3_7_3_11', '1', 'MOST tax obligations');?>
								<?php form_create_radio_tadat($dimension_3_7_3_11, 'dimension_3_7_3_11', '3', 'SOME tax obligations');?>
							</div>														
						</div>
						<?php form_create_notes_tadat($dimension_3_7_3_11_notes, 'dimension_3_7_3_11_notes');?>						
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->															
					
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_3_12, 'dimension_3_7_3_12', 'd', 'd3', '3.7.3.3 Can taxpayers easily (i.e. quickly and with minimal effort), obtain information and advice on obligations and entitlements?');?>
						<div class="answer-wrapper">
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_7_3_12, 'dimension_3_7_3_12', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_3_7_3_12, 'dimension_3_7_3_12', '1', 'No');?>								
							</div>														
						</div>
						<?php form_create_notes_tadat($dimension_3_7_3_12_notes, 'dimension_3_7_3_12_notes');?>	
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->															

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_3_13, 'dimension_3_7_3_13', 'd', 'd4', '3.7.3.4 Does the tax administration charge a fee for information and/or advice?');?>
						<div class="answer-wrapper">
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_7_3_13, 'dimension_3_7_3_13', '2', 'No');?>
								<?php form_create_radio_tadat($dimension_3_7_3_13, 'dimension_3_7_3_13', '1', 'Yes - Minimal Cost');?>
								<?php form_create_radio_tadat($dimension_3_7_3_13, 'dimension_3_7_3_13', '3', 'Yes - High Cost');?>

							</div>														
						</div>
						<?php form_create_notes_tadat($dimension_3_7_3_13_notes, 'dimension_3_7_3_13_notes','If yes, in what specific circumstances are fees charged, and how much is charged?');?>	
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->															

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_3_14, 'dimension_3_7_3_14', 'd', 'd5', '3.7.3.5 Does the tax administration maintain statistics on the costs incurred by taxpayers in obtaining information and advice from the tax administration?');?>
						<div class="answer-wrapper">
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_7_3_14, 'dimension_3_7_3_14', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_3_7_3_14, 'dimension_3_7_3_14', '1', 'No');?>								
							</div>														
						</div>
						<?php form_create_notes_tadat($dimension_3_7_3_14_notes, 'dimension_3_7_3_14_notes');?>	
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->															

					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_3_15, 'dimension_3_7_3_15', 'd', 'd6', '3.7.3.6 Does the tax administration have a documented service delivery channel strategy? (Typically, a delivery channel strategy describes the means by which the tax administration provides, or plans to provide, information to taxpayers in the most efficient, cost effective, and convenient manner.)');?>
						<div class="answer-wrapper">
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_3_7_3_15, 'dimension_3_7_3_15', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_3_7_3_15, 'dimension_3_7_3_15', '1', 'No');?>								
							</div>														
						</div>
						<?php form_create_notes_tadat($dimension_3_7_3_15_notes, 'dimension_3_7_3_15_notes');?>	
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->															
					
				
				<!--END ACCORDION -->
				</div>
				<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
			
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->
		<div class="tab-pane fade text-muted" id="dimension_e">
			
				<p><strong><?php $numCounter = 4; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '3.7.4 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-e">
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_4_1, 'dimension_3_7_4_1', 'e', 'e1', '3.7.4.1 Does the tax administration have service delivery standards in relation to time taken to respond to taxpayer and intermediary requests received by way of letter, email, telephone, and personal visits (where walk-in enquiry facilities exist)?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_7_4_1, 'dimension_3_7_4_1', '2', 'Yes', 'check_value_a');?>
									<?php form_create_radio_tadat($dimension_3_7_4_1, 'dimension_3_7_4_1', '1', 'No', 'check_value_a');?>
								</div>
							</div>
							<div id="show_checkedValueA" style="margin-top:10px !important">
								<div class="answer-wrapper">
								<p>3.7.4.2 Is performance against the service delivery standards routinely monitored and reported upon?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_3_7_4_1_a, 'dimension_3_7_4_1_a', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_3_7_4_1_a, 'dimension_3_7_4_1_a', '1', 'No');?>
									</div>
								</div>
							</div>							
								<?php form_create_notes_tadat($dimension_3_7_4_1_notes, 'dimension_3_7_4_1_notes');?>
					<?php end_accordion_panel();?>

					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_4_2, 'dimension_3_7_4_2', 'e', 'e2', '3.7.4.2 Are performance results publicly reported?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_7_4_2, 'dimension_3_7_4_2', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_7_4_2, 'dimension_3_7_4_2', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_7_4_2_notes, 'dimension_3_7_4_2_notes');?>
					<?php end_accordion_panel();?>					
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_3_7_4_3, 'dimension_3_7_4_3', 'e', 'e3', '3.7.4.3 In what percentage of cases are telephone enquiry calls (particularly through dedicated call centers) from taxpayers and intermediaries answered within 6 minutes\' waiting time?');?>
							<div class="answer-wrapper">
							<?php //$dimension_3_7_4_5 = 0;?>
							<?php  $dimension_3_7_4_4 = _get_field_by_id_single_row('cloud_questions', 'pmq_table_3', 'fkidMission', $this->session->userdata('mission_id'), 'call_received_rate_total', '');?>							
							<p>The Tax Administration indicated that this percentage is <strong><?php echo $dimension_3_7_4_4; ?>%</strong> over a period of 30 calendar days. Does your research confirm these findings</p>
								<?php echo form_hidden('dimension_3_7_4_4', $dimension_3_7_4_4);?>
							</div>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_3_7_4_3, 'dimension_3_7_4_3', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_3_7_4_3, 'dimension_3_7_4_3', '1', 'No');?>
								</div>
							</div>
								<?php form_create_notes_tadat($dimension_3_7_4_3_notes, 'dimension_3_7_4_3_notes');?>
					<?php end_accordion_panel();?>
					<!--END ACCORDION PANEL -->
					
					
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