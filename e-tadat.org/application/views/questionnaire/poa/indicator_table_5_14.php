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
		<div class="tab-pane fade active in text-muted" id="dimension_a">
			
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '5.14.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_5_14_1_1, 'dimension_5_14_1_1', 'a', 'a1', '5.14.1.1 The number of VAT payments made by the statutory due date in percent of the total number of VAT payments due, expressed as a ratio.');?>
								<div class="answer-wrapper">
								<?php
										$dimension_5_14_1_1_percentage = _get_field_by_id_single_row('db_b', 'pmq_table_10', 'fkidMission', $this->session->userdata('mission_id'), 'filing_vat_payment_number', '');
										echo form_hidden('dimension_5_14_1_1_percentage', $dimension_5_14_1_1_percentage);
										if($dimension_5_14_1_1_percentage){
								?>
									<p>The Tax Administration indicated that the ratio of VAT payments made by the statutory due date in percent of the total number of VAT payments due was <strong><?php echo number_format($dimension_5_14_1_1_percentage,1);?>%</strong>.</p>
									<p>Does your research confirm these findings?</p>									
								<?php
									}else{
										$$dimension_5_14_1_1_percentage = 0;
										echo '<p>The Tax Administration has not supplied any figures.</p>';
									}
									echo form_hidden('dimension_5_14_1_1_percentage', $dimension_5_14_1_1_percentage);
								?>
								</div>								

								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_5_14_1_1, 'dimension_5_14_1_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_5_14_1_1, 'dimension_5_14_1_1', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($dimension_5_14_1_1_notes, 'dimension_5_14_1_1_notes');?>
						<?php end_accordion_panel();?>
						<!--END ACCORDION -->					
					</div>
					<!--END ACCORDION PANEL -->
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->


		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_b">
				<p><strong><?php $numCounter = 1; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '5.14.2 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_5_14_1_2, 'dimension_5_14_1_2', 'b', 'b1', '5.14.1.2 The value of VAT payments made by the statutory due date in percent of the total value of VAT payments due, expressed as a ratio.');?>
								<div class="answer-wrapper">
								<?php
										$dimension_5_14_1_2_percentage = _get_field_by_id_single_row('db_b', 'pmq_table_10', 'fkidMission', $this->session->userdata('mission_id'), 'filing_vat_payment_value', '');
										echo form_hidden('dimension_5_14_1_2_percentage', $dimension_5_14_1_2_percentage);
										if($dimension_5_14_1_2_percentage){
								?>
									<p>The Tax Administration indicated that the ratio of VAT payments made by the statutory due date in percent of the total number of VAT payments due was <strong><?php echo number_format($dimension_5_14_1_2_percentage,1);?>%</strong>.</p>
									<p>Does your research confirm these findings?</p>									
								<?php
									}else{
										$dimension_5_14_1_2_percentage = 0;
										echo '<p>The Tax Administration has not supplied any figures.</p>';
									}
									echo form_hidden('dimension_5_14_1_2_percentage', $dimension_5_14_1_2_percentage);
								?>
								</div>								

								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_5_14_1_2, 'dimension_5_14_1_2', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_5_14_1_2, 'dimension_5_14_1_2', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($dimension_5_14_1_2_notes, 'dimension_5_14_1_2_notes');?>
						<?php end_accordion_panel();?>
						<!--END ACCORDION -->					
					</div>
					<!--END ACCORDION PANEL -->
			
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