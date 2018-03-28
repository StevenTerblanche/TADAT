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
			<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '8.20.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
			
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_8_20_1_1, 'dimension_8_20_1_1', 'a', 'a1', '8.20.1.1 What is the ratio of tax revenue collections to budgeted tax revenues for each of the past three fiscal years?');?>
								<?php
									$period_1 = _get_field_by_id_single_row('db_b','pmq_table_1', 'fkidMission', $this->session->userdata('mission_id'), 'period_year_1', $numRecords = null);
									$period_2 = _get_field_by_id_single_row('db_b','pmq_table_1', 'fkidMission', $this->session->userdata('mission_id'), 'period_year_2', $numRecords = null);
									$period_3 = _get_field_by_id_single_row('db_b','pmq_table_1', 'fkidMission', $this->session->userdata('mission_id'), 'period_year_3', $numRecords = null);
									
									$tax_collected_1 = _get_field_by_id_single_row('db_b','pmq_table_1', 'fkidMission', $this->session->userdata('mission_id'), 'a_total_revenue_collections', $numRecords = null);
									$tax_collected_2 = _get_field_by_id_single_row('db_b','pmq_table_1', 'fkidMission', $this->session->userdata('mission_id'), 'b_total_revenue_collections', $numRecords = null);
									$tax_collected_3 = _get_field_by_id_single_row('db_b','pmq_table_1', 'fkidMission', $this->session->userdata('mission_id'), 'c_total_revenue_collections', $numRecords = null);
									$tax_collected_total = $tax_collected_1 + $tax_collected_2 + $tax_collected_3;

									$tax_budgeted_1 = _get_field_by_id_single_row('db_b','pmq_table_1', 'fkidMission', $this->session->userdata('mission_id'), 'a_budgeted_revenue', $numRecords = null);
									$tax_budgeted_2 = _get_field_by_id_single_row('db_b','pmq_table_1', 'fkidMission', $this->session->userdata('mission_id'), 'b_budgeted_revenue', $numRecords = null);
									$tax_budgeted_3 = _get_field_by_id_single_row('db_b','pmq_table_1', 'fkidMission', $this->session->userdata('mission_id'), 'c_budgeted_revenue', $numRecords = null);
									$tax_budgeted_total = $tax_budgeted_1 + $tax_budgeted_2 + $tax_budgeted_3;
								?>
								<div class="answer-wrapper">
									<table class="table table-bordered table-striped" style="width:400px !important">
										<tr>
											<th>&nbsp;</th>
											<th class="center"><?php echo $period_1; ?></th>
											<th class="center"><?php echo $period_2; ?></th>
											<th class="center"><?php echo $period_3; ?></th>
										</tr>
										<tr>
											<td>Actual Collections</td>
											<td class="center"><?php echo number_format($tax_collected_1,0);?></td>
											<td class="center"><?php echo number_format($tax_collected_2,0);?></td>
											<td class="center"><?php echo number_format($tax_collected_3,0);?></td>
										</tr>
										<tr>
											<td>Budgeted Collections</td>
											<td class="center"><?php echo number_format($tax_budgeted_1,0);?></td>
											<td class="center"><?php echo number_format($tax_budgeted_2,0);?></td>
											<td class="center"><?php echo number_format($tax_budgeted_3,0);?></td>									
										</tr>
										<tr>
											<td>Ratio</td>
											<td class="center"><?php echo number_format(($tax_collected_1 / $tax_budgeted_1)*100,2);?>%</td>
											<td class="center"><?php echo number_format(($tax_collected_2 / $tax_budgeted_2)*100,2);?>%</td>
											<td class="center"><?php echo number_format(($tax_collected_3 / $tax_budgeted_3)*100,2);?>%</td>
										</tr>
									</table>
								</div>
								<?php
									$dimension_8_20_1_2 = ($tax_collected_1 / $tax_budgeted_1) * 100;
									echo form_hidden('dimension_8_20_1_2', $dimension_8_20_1_2);
									$dimension_8_20_1_3 = ($tax_collected_2 / $tax_budgeted_2) * 100;
									echo form_hidden('dimension_8_20_1_3', $dimension_8_20_1_3);
									$dimension_8_20_1_4 = ($tax_collected_3 / $tax_budgeted_3) * 100;
									echo form_hidden('dimension_8_20_1_4', $dimension_8_20_1_4);																		
								?>
								<div class="answer-wrapper">
									<p>The Tax Administration indicated that over the past 3 years of <?php echo $period_1;?>, <?php echo $period_2;?>, <?php echo $period_3;?> 
									the budgeted collections was <strong><?php echo number_format($tax_budgeted_total,0);?></strong> with actual collections for the past three fiscal years being <strong><?php echo number_format($tax_collected_total,0);?></strong>, resulting in a tax collection ratio of
									<?php echo number_format(($tax_collected_total / $tax_budgeted_total) * 100,2);?>%.
									</p>
									<p>Does your research confirm these findings?</p>
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_8_20_1_1, 'dimension_8_20_1_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_8_20_1_1, 'dimension_8_20_1_1', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($dimension_8_20_1_1_notes, 'dimension_8_20_1_1_notes');?>
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

<?php //if($this->action !== 'completed'){?>
	<div class="form-group mt15">
		<div class="col-xs-12" style="text-align:center !important;">
			<button type="button" id="save_button" class="btn btn-success white-text" formnovalidate><i class="fa fa-save mr5"></i><?php echo $save_button; ?></button>
			<button type="submit" id="submit_button" class="btn btn-primary white-text"><i class="fa fa-check-circle mr5"></i><?php echo $submit_button; ?></button>
		</div>
	</div>
<?php //}	?>
<?php echo form_close();?>
</div>