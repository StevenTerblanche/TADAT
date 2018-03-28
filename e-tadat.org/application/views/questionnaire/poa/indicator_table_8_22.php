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
		<li class=""><a id="uploader" href="#uploaded" data-url="https://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--START TAB PANEL -->
		<div class="tab-pane active in fade text-muted" id="dimension_a">
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '8.22.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<?php form_create_memo_tadat($dimension_8_22_1_1, 'dimension_8_22_1_1', 'a', 'a1', '8.22.1.1 What organizational unit(s) within the tax administration is/are responsible for providing inputs to government budgeting processes of tax revenue forecasting and tax revenue estimating?','required-textarea-reason');?>
						<?php form_create_memo_tadat($dimension_8_22_1_2, 'dimension_8_22_1_2', 'a', 'a2', '8.22.1.2 How does the tax administration interact with the Ministry of Finance in developing tax revenue forecasts? Is there interaction on all core taxes?','required-textarea-reason');?>
						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_22_1_3, 'dimension_8_22_1_3', 'a', 'a3', '8.22.1.3 Does the tax administration gather data on tax revenue collection and economic conditions to provide input to government budgeting processes of tax revenue forecasting and tax revenue estimating.?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_22_1_3, 'dimension_8_22_1_3', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_8_22_1_3, 'dimension_8_22_1_3', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_8_22_1_3_notes, 'dimension_8_22_1_3_notes','What kind of data and analysis does the tax administration provide to government budgeting processes of tax revenue forecasting and tax revenue estimating?');?>
						<?php end_accordion_panel();?>
						<?php form_create_memo_tadat($dimension_8_22_1_4, 'dimension_8_22_1_4', 'a', 'a4', '8.22.1.4 How does the tax administration monitor actual tax revenue collections for core taxes?','required-textarea-reason');?>
						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_22_1_5, 'dimension_8_22_1_5', 'a', 'a5', '8.22.1.5 Does the tax administration report to the Ministry of Finance on material variances in actual collections from tax revenue forecasts?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_22_1_5, 'dimension_8_22_1_5', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_8_22_1_5, 'dimension_8_22_1_5', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_8_22_1_5_notes, 'dimension_8_22_1_5_notes','How is this done?');?>
						<?php end_accordion_panel();?>
						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_22_1_6, 'dimension_8_22_1_6', 'a', 'a6', '8.22.1.6 Does the tax administration monitor tax revenue foregone as a result of tax expenditures (exemptions, preferential rates etc.)?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_22_1_6, 'dimension_8_22_1_6', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_8_22_1_6, 'dimension_8_22_1_6', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_8_22_1_6_notes, 'dimension_8_22_1_6_notes','How is this done?');?>
						<?php end_accordion_panel();?>
						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_22_1_7, 'dimension_8_22_1_7', 'a', 'a7', '8.22.1.7 Does the tax administration monitor and forecast VAT refund levels to ensure that sufficient funds are available to meet all legitimate refund claims when they occur?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_22_1_7, 'dimension_8_22_1_7', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_8_22_1_7, 'dimension_8_22_1_7', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_8_22_1_7_notes, 'dimension_8_22_1_7_notes');?>
						<?php end_accordion_panel();?>
						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_22_1_8, 'dimension_8_22_1_8', 'a', 'a8', '8.22.1.8 Does the tax administration monitor the stock of tax losses carried forward by taxpayers that may be offset against future taxable income?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_22_1_8, 'dimension_8_22_1_8', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_8_22_1_8, 'dimension_8_22_1_8', '1', 'No');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_8_22_1_8_notes, 'dimension_8_22_1_8_notes','How is this done?');?>
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