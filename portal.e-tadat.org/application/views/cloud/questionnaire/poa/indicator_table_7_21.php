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
		<li class=""><a id="uploader" href="#uploaded" data-url="http://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--START TAB PANEL -->
		<div class="tab-pane active in fade text-muted" id="dimension_a">
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '7.21.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<?php start_accordion_panel($strFieldsetStatus, $dimension_7_21_1_1, 'dimension_7_21_1_1', 'a', 'a1', '7.21.1.1 Does the tax administration monitor dispute outcomes of a material nature?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_7_21_1_1, 'dimension_7_21_1_1', '2', 'Yes', 'check_value_a');?>
										<?php form_create_radio_tadat($dimension_7_21_1_1, 'dimension_7_21_1_1', '1', 'No', 'check_value_a');?>
									</div>														
								</div>
							<div id="show_checkedValueA"><!-- START show_checkedValueA -->
								<div class="answer-wrapper" style="margin-top:25px !important">
									<div class="answer-550-h-58">a) Does the tax administration take account of these in the determination of policy, legislation, and administrative procedures?:</div>
									<div class="answer-container-550-h-58" style="width:120px !important">
										<?php form_create_radio_tadat($dimension_7_21_1_1_a, 'dimension_7_21_1_1_a', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_7_21_1_1_a, 'dimension_7_21_1_1_a', '1', 'No');?>								
									</div>														
								</div>
								<div class="answer-wrapper" style="margin-top:25px !important">
									<div class="answer-550">b) Is there regular monitoring (involving, for example, preparation of decision impact statements)</div>
									<div class="answer-container-550" style="width:120px !important; text-align:center !important">
										<?php form_create_radio_tadat($dimension_7_21_1_1_b, 'dimension_7_21_1_1_b', '1', 'Yes');?>	
									</div>														
								</div>
								<div style="width:625px !important; margin-top:5px !important; margin-bottom:5px !important; line-height:10px !important; text-align:center !important; font-weight:bold !important">OR</div>
								<div class="answer-wrapper">
									<div class="answer-550">c) Is the monitoring undertaken on an ad hoc basis (i.e. as an unplanned infrequent activity).?</div>
									<div class="answer-container-550" style="width:120px !important; text-align:center !important">
										<?php form_create_radio_tadat($dimension_7_21_1_1_b, 'dimension_7_21_1_1_b', '2', 'Yes');?>	
									</div>														
								</div>
							</div><!-- END show_checkedValueA -->								
								<?php form_create_notes_tadat($dimension_7_21_1_1_notes, 'dimension_7_21_1_1_notes');?>								
						<?php end_accordion_panel();?>
						
						<?php start_accordion_panel($strFieldsetStatus, $dimension_7_21_1_2, 'dimension_7_21_1_2', 'a', 'a2', '7.21.1.1 Are outcomes of disputes made public, so far as confidentiality allows?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_7_21_1_2, 'dimension_7_21_1_2', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_7_21_1_2, 'dimension_7_21_1_2', '1', 'No');?>
									</div>														
								</div>
								<?php form_create_notes_tadat($dimension_7_21_1_2_notes, 'dimension_7_21_1_2_notes');?>	
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