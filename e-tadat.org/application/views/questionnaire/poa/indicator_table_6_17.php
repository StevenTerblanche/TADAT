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
		<li class=""><a id="uploader" href="#uploaded" data-url="https://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--START TAB PANEL -->
		<div class="tab-pane active in fade text-muted" id="dimension_a">
			
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '6.17.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<?php start_accordion_panel($strFieldsetStatus, $dimension_6_17_1_1, 'dimension_6_17_1_1', 'a', 'a1', '6.17.1.1 Does the tax administration undertake proactive (non-audit) initiatives to encourage and facilitate accurate reporting?');?>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_6_17_1_1, 'dimension_6_17_1_1', '2', 'Yes', 'check_value_a');?>
										<?php form_create_radio_tadat($dimension_6_17_1_1, 'dimension_6_17_1_1', '1', 'No', 'check_value_a');?>
									</div>
								</div>
							<?php form_create_notes_tadat($dimension_6_17_1_1_notes, 'dimension_6_17_1_1_notes');?>
						<?php end_accordion_panel();?>


					
<!-- START show_checkedValueA --><div id="show_checkedValueA">

						<?php start_accordion_panel($strFieldsetStatus, $dimension_6_17_1_2, 'dimension_6_17_1_2', 'a', 'a2', '6.17.1.2 Are rulings used to provide answers in real time about the tax treatment of specific transactions?');?>
						<div class="answer-wrapper">
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_6_17_1_2, 'dimension_6_17_1_2', '2', 'Yes', 'check_value_b');?>
								<?php form_create_radio_tadat($dimension_6_17_1_2, 'dimension_6_17_1_2', '1', 'No', 'check_value_b');?>
							</div>														
						</div>
						<?php form_create_notes_tadat($dimension_6_17_1_2_notes, 'dimension_6_17_1_2_notes');?>						
						<?php end_accordion_panel();?>
<!-- END show_checkedValueA --></div>


					
<!-- START show_checkedValueB --><div id="show_checkedValueB">
						<?php start_accordion_panel($strFieldsetStatus, $dimension_6_17_1_2_a, 'dimension_6_17_1_2_a', 'a', 'a3', '6.17.1.2 a) What types of ruling are provided?');?>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">Public Rulings:</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_6_17_1_2_a, 'dimension_6_17_1_2_a', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_6_17_1_2_a, 'dimension_6_17_1_2_a', '1', 'No');?>								
							</div>														
						</div>
						<div class="answer-wrapper">
							<div class="answer" style="width:450px !important">Private Rulings:</div>
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_6_17_1_2_a1, 'dimension_6_17_1_2_a1', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_6_17_1_2_a1, 'dimension_6_17_1_2_a1', '1', 'No');?>
							</div>														
						</div>
						<?php form_create_notes_tadat($dimension_6_17_1_2_a_notes, 'dimension_6_17_1_2_a_notes');?>						
						<?php end_accordion_panel();?>
		
						<?php start_accordion_panel($strFieldsetStatus, $dimension_6_17_1_2_b, 'dimension_6_17_1_2_b', 'a', 'a4', '6.17.1.2 b) Are they binding on the tax administration?');?>
						<div class="answer-wrapper">
							<div class="answer-container">
								<?php form_create_radio_tadat($dimension_6_17_1_2_b, 'dimension_6_17_1_2_b', '2', 'Yes');?>
								<?php form_create_radio_tadat($dimension_6_17_1_2_b, 'dimension_6_17_1_2_b', '1', 'No');?>								
							</div>														
						</div>
						<?php form_create_notes_tadat($dimension_6_17_1_2_b_notes, 'dimension_6_17_1_2_b_notes');?>	
					<?php end_accordion_panel();?>
					<?php form_create_memo_tadat($dimension_6_17_1_2_c, 'dimension_6_17_1_2_c', 'a', 'a5', '6.17.1.2 c) To which core taxes and taxpayer segments do rulings apply?','required-textarea-reason');?>
<!-- END show_checkedValueB --></div>
					
<div id="blanker" style="margin:5px !important;"></div>
<!-- START show_checkedValueD --><div id="show_checkedValueD">
					<?php start_accordion_panel($strFieldsetStatus, $dimension_6_17_1_3, 'dimension_6_17_1_3', 'a', 'a6', '6.17.1.3 Has the tax administration adopted cooperative compliance approaches to manage risks of inaccurate reporting?');?>
					<div class="answer-wrapper">
						<div class="answer-container">
							<?php form_create_radio_tadat($dimension_6_17_1_3, 'dimension_6_17_1_3', '2', 'Yes', 'check_value_c');?>
							<?php form_create_radio_tadat($dimension_6_17_1_3, 'dimension_6_17_1_3', '1', 'No', 'check_value_c');?>
						</div>														
					</div>
					<?php end_accordion_panel();?>
<!-- END show_checkedValueD --></div>

<div id="blanker" style="margin:5px !important;"></div>			
<!-- START show_checkedValueC --><div id="show_checkedValueC">
					<?php form_create_memo_tadat($dimension_6_17_1_3_a, 'dimension_6_17_1_3_a', 'a', 'a7', '6.17.1.3 a) What is the nature of the cooperative compliance arrangements?','required-textarea-reason');?>
					<?php form_create_memo_tadat($dimension_6_17_1_3_b, 'dimension_6_17_1_3_b', 'a', 'a8', '6.17.1.3 b) To which core taxes and taxpayer segments do the arrangements apply?','required-textarea-reason');?>					
					<?php start_accordion_panel($strFieldsetStatus, $dimension_6_17_1_4, 'dimension_6_17_1_4', 'a', 'a9', '6.17.1.4 Is the impact of the initiatives on taxpayer compliance evaluated?');?>
							<div class="answer-wrapper">
								<div class="answer">Answer: </div>
								<div class="answer-container">
									<?php form_create_radio_tadat($dimension_6_17_1_4, 'dimension_6_17_1_4', '2', 'Yes');?>
									<?php form_create_radio_tadat($dimension_6_17_1_4, 'dimension_6_17_1_4', '1', 'No');?>
								</div>
							</div>
						<?php form_create_notes_tadat($dimension_6_17_1_4_notes, 'dimension_6_17_1_4_notes');?>
					<?php end_accordion_panel();?>
<!-- END show_checkedValueC --></div>



				<!--END ACCORDION PANEL -->					
				</div>
					
			
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