<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	if(isset($this->action) && ($this->action === 'update' || $this->action === 'save' || $this->action === 'completed')){
		foreach($get_record_by_id as $field => $value){$$field = $value;}
	}elseif($this->input->post()){
		foreach($this->input->post() as $field => $value){$$field = $value;}
	}else{
		foreach($get_fields as $field){$$field = '';}
	}
	if(isset($this->action) && $this->action === 'completed'){
		$strFieldsetStatus = 'disabled="disabled"';
	}else{
		$strFieldsetStatus = '';
	}
	$counter = array();
	echo $this->load->view('upload/upload_dialog', '', true);
	$missionId = $this->session->userdata('mission_id');
	$statusClass = 'question-red-panel';
	echo form_open($uri, array('class'=>'form-horizontal', 'id'=>'form-submit')); 
?>


<div class="tabs inside-panel">
	<ul id="myTabs" class="nav nav-tabs">
		<li class="active"><a href="#dimension_a" data-toggle="tab"><strong>DIMENSION 1</strong></a></li>
		<li class=""><a id="uploader" href="#uploaded" data-url="https://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<div class="tab-pane active in fade text-muted" id="dimension_a">
			
				
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '1.2.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<div class="panel-group accordion" id="accordion-a">
					<!--START ACCORDION PANEL -->
					<?php start_accordion_panel($strFieldsetStatus, $dimension_1_2_1_1, 'dimension_1_2_1_1', 'a', 'a1', '1.2.1.1 Does the tax administration undertake initiatives to detect unregistered businesses and individuals?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_1_2_1_1, 'dimension_1_2_1_1', '2', 'Yes', 'check_value_a');?>
									<?php form_create_radio_tadat($dimension_1_2_1_1, 'dimension_1_2_1_1', '1', 'No', 'check_value_a');?>
								</div>
							</div>
							<div id="show_checkedValueA" style="margin-top:10px !important">
								<div class="answer-wrapper">
								<p>1.2.1.2 Does the tax administration use third party information to identify new business start-ups and economic activity of existing businesses that have failed to register?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container" style="width:180px !important">
										<?php form_create_radio_tadat($dimension_1_2_1_1_a, 'dimension_1_2_1_1_a', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_1_2_1_1_a, 'dimension_1_2_1_1_a', '1', 'No');?>
									</div>
								</div>
								<div class="answer-wrapper" style="margin-top:10px !important">
								<p>1.2.1.3 Does the tax administration make unannounced visits to commercial districts to detect unregistered businesses and/or unregistered workers?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container" style="width:180px !important">
										<?php form_create_radio_tadat($dimension_1_2_1_1_b, 'dimension_1_2_1_1_b', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_1_2_1_1_b, 'dimension_1_2_1_1_b', '1', 'No');?>
									</div>
								</div>								
								<div class="answer-wrapper" style="margin-top:10px !important">
								<p>1.2.1.4 In relation to initiatives undertaken during the past 1-2 years, were outcomes monitored and reported upon?</p>
									<div class="answer">Answer: </div>
									<div class="answer-container" style="width:180px !important">
										<?php form_create_radio_tadat($dimension_1_2_1_1_c, 'dimension_1_2_1_1_c', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_1_2_1_1_c, 'dimension_1_2_1_1_c', '1', 'No');?>
									</div>
								</div>								
							
								<?php form_create_notes_tadat($dimension_1_2_1_1_notes, 'dimension_1_2_1_1_notes');?>
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