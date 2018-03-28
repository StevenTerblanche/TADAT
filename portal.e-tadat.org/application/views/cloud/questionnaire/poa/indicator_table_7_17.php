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
		<li class=""><a id="uploader" href="#uploaded" data-url="http://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--START TAB PANEL -->
		<div class="tab-pane active in fade text-muted" id="dimension_a">
			
				<?php $numCounter = 0; ?>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_7_17_1_1, 'dimension_7_17_1_1', 'a', 'a1', '7.17.1.1 The value of tax in dispute at fiscal year-end in percent of total tax revenue collections for the fiscal year');?>
							<div class="answer-wrapper">						
								<?php
									$period_1 = _get_field_by_id_single_row('cloud_questions','pmq_table_1', 'fkidMission', $this->session->userdata('mission_id'), 'period_year_1', $numRecords = null);
									$period_2 = _get_field_by_id_single_row('cloud_questions','pmq_table_1', 'fkidMission', $this->session->userdata('mission_id'), 'period_year_2', $numRecords = null);
									$period_3 = _get_field_by_id_single_row('cloud_questions','pmq_table_1', 'fkidMission', $this->session->userdata('mission_id'), 'period_year_3', $numRecords = null);
									
									$tax_dispute_1 = _get_field_by_id_single_row('cloud_questions','pmq_table_8', 'fkidMission', $this->session->userdata('mission_id'), 'dispute_total_1', $numRecords = null);
									$tax_dispute_2 = _get_field_by_id_single_row('cloud_questions','pmq_table_8', 'fkidMission', $this->session->userdata('mission_id'), 'dispute_total_2', $numRecords = null);
									$tax_dispute_3 = _get_field_by_id_single_row('cloud_questions','pmq_table_8', 'fkidMission', $this->session->userdata('mission_id'), 'dispute_total_3', $numRecords = null);
									$tax_dispute_total = $tax_dispute_1 + $tax_dispute_2 + $tax_dispute_3; 
									
									$tax_collected_1 = _get_field_by_id_single_row('cloud_questions','pmq_table_1', 'fkidMission', $this->session->userdata('mission_id'), 'a_total_revenue_collections', $numRecords = null);
									$tax_collected_2 = _get_field_by_id_single_row('cloud_questions','pmq_table_1', 'fkidMission', $this->session->userdata('mission_id'), 'b_total_revenue_collections', $numRecords = null);
									$tax_collected_3 = _get_field_by_id_single_row('cloud_questions','pmq_table_1', 'fkidMission', $this->session->userdata('mission_id'), 'c_total_revenue_collections', $numRecords = null);
									$tax_collected_total = $tax_collected_1 + $tax_collected_2 + $tax_collected_3;
									
									if($tax_dispute_1){
										$tax_dispute_1_ratio = number_format(($tax_dispute_1 / $tax_collected_1)*100,2).'%';
									}else{
										$tax_dispute_1_ratio = 0;
									}
									if($tax_dispute_2){
										$tax_dispute_2_ratio = number_format(($tax_dispute_2 / $tax_collected_2)*100,2).'%';
									}else{
										$tax_dispute_2_ratio = 0;
									}
									if($tax_dispute_3){
										$tax_dispute_3_ratio = number_format(($tax_dispute_3 / $tax_collected_3)*100,2).'%';
									}else{
										$tax_dispute_3_ratio = 100000;
									}
									
									if($tax_dispute_total){
										$tax_dispute_total_ratio = ($tax_dispute_total / $tax_collected_total)*100;	
									}else{
										$tax_dispute_total_ratio = 0;	
									}
									$dimension_7_17_1_2 = $tax_dispute_total_ratio;
									echo form_hidden('dimension_7_17_1_2', $dimension_7_17_1_2);
									if($tax_dispute_1 && $tax_dispute_2 && $tax_dispute_3){
								?>
									<table class="table table-bordered table-striped" style="width:400px !important">
									<tr>
										<th>&nbsp;</th>
										<th class="center"><?php echo $period_1; ?></th>
										<th class="center"><?php echo $period_2; ?></th>
										<th class="center"><?php echo $period_3; ?></th>
									</tr>
									<tr>
										<td>Tax Dispute</td>
										<td class="center"><?php echo number_format($tax_dispute_1,0);?></td>
										<td class="center"><?php echo number_format($tax_dispute_2,0);?></td>
										<td class="center"><?php echo number_format($tax_dispute_3,0);?></td>
									</tr>
									<tr>
										<td>Tax Collected</td>
										<td class="center"><?php echo number_format($tax_collected_1,0);?></td>
										<td class="center"><?php echo number_format($tax_collected_2,0);?></td>
										<td class="center"><?php echo number_format($tax_collected_3,0);?></td>									</tr>
									<tr>
										<td>Ratio</td>
										<td class="center"><?php echo $tax_dispute_1_ratio;?></td>
										<td class="center"><?php echo $tax_dispute_2_ratio;?></td>
										<td class="center"><?php echo $tax_dispute_3_ratio;?></td>
									</tr>

									</table>
									<p style="font-size:10px; font-style:italic">Note: The numerator includes the value of all objections and judicial appeals.</p>
									<p>The Tax Administration indicated that the ratio of core tax disputes <strong>(<?php echo number_format($tax_dispute_total,0);?>)</strong> to annual core tax collections <strong>(<?php echo number_format($tax_collected_total,0);?>)</strong>, averaged over the past 3 years was <strong><?php echo number_format($tax_dispute_total_ratio,2);?>%</strong>.</p>
										<p>Does your research confirm these findings?</p>									
									<?php
									}else{
										echo '<p>The Tax Administration has not supplied any figures.</p>';											
									}
									?>
								</div>

								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_7_17_1_1, 'dimension_7_17_1_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_7_17_1_1, 'dimension_7_17_1_1', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($dimension_7_17_1_1_notes, 'dimension_7_17_1_1_notes');?>
						<?php end_accordion_panel();?>
						<!--END ACCORDION -->			
					</div>
					<!--END ACCORDION PANEL -->
					
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->
		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_b">
			
				<?php $numCounter = 1; ?>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-b">
						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_7_17_2_1, 'dimension_7_17_2_1', 'b', 'b1', '7.17.2.1 The number of objections and judicial appeal cases at fiscal year-end relative to the number of cases at the start of the year');?>
								<?php

									$period_0 = _get_field_by_id_single_row('cloud_questions','pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'period_year_0', $numRecords = null);
									$period_1 = _get_field_by_id_single_row('cloud_questions','pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'period_year_1', $numRecords = null);
									$period_2 = _get_field_by_id_single_row('cloud_questions','pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'period_year_2', $numRecords = null);
									$period_3 = _get_field_by_id_single_row('cloud_questions','pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'period_year_3', $numRecords = null);
									
									$objections_tomu_0 = _get_field_by_id_single_row('cloud_questions','pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'objections_tomu_0', $numRecords = null);
									$objections_tomu_1 = _get_field_by_id_single_row('cloud_questions','pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'objections_tomu_1', $numRecords = null);
									$objections_tomu_2 = _get_field_by_id_single_row('cloud_questions','pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'objections_tomu_2', $numRecords = null);
									$objections_tomu_3 = _get_field_by_id_single_row('cloud_questions','pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'objections_tomu_3', $numRecords = null);									
									$objections_tomu_average = $objections_tomu_0 + $objections_tomu_1 + $objections_tomu_2; 
									$objections_tomu_total = $objections_tomu_0 + $objections_tomu_1 + $objections_tomu_2 + $objections_tomu_3; 
									
									$objections_audit_0 = _get_field_by_id_single_row('cloud_questions','pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'objections_audit_0', $numRecords = null);
									$objections_audit_1 = _get_field_by_id_single_row('cloud_questions','pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'objections_audit_1', $numRecords = null);
									$objections_audit_2 = _get_field_by_id_single_row('cloud_questions','pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'objections_audit_2', $numRecords = null);
									$objections_audit_3 = _get_field_by_id_single_row('cloud_questions','pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'objections_audit_3', $numRecords = null);									
									$objections_audit_average = $objections_audit_0 + $objections_audit_1 + $objections_audit_2; 
									$objections_audit_total = $objections_audit_0 + $objections_audit_1 + $objections_audit_2 + $objections_audit_3; 

									$judicial_appeals_0 = _get_field_by_id_single_row('cloud_questions','pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'judicial_appeals_0', $numRecords = null);
									$judicial_appeals_1 = _get_field_by_id_single_row('cloud_questions','pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'judicial_appeals_1', $numRecords = null);
									$judicial_appeals_2 = _get_field_by_id_single_row('cloud_questions','pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'judicial_appeals_2', $numRecords = null);
									$judicial_appeals_3 = _get_field_by_id_single_row('cloud_questions','pmq_table_9', 'fkidMission', $this->session->userdata('mission_id'), 'judicial_appeals_3', $numRecords = null);									
									$judicial_appeals_average = $judicial_appeals_0 + $judicial_appeals_1 + $judicial_appeals_2; 
									$judicial_appeals_total = $judicial_appeals_0 + $judicial_appeals_1 + $judicial_appeals_2 + $judicial_appeals_3; 
									
									$total_0 = $objections_tomu_0 + $objections_audit_0 + $judicial_appeals_0;
									$total_1 = $objections_tomu_1 + $objections_audit_1 + $judicial_appeals_1;
									$total_2 = $objections_tomu_2 + $objections_audit_2 + $judicial_appeals_2;
									$total_3 = $objections_tomu_3 + $objections_audit_3 + $judicial_appeals_3;
									
									$three_year_average = $total_0 + $total_1 + $total_2 /3;
									
									$dimension_7_17_2_2 = ($total_3 / $three_year_average) * 100;
									echo form_hidden('dimension_7_17_2_2', $dimension_7_17_2_2);
									
								?>
								<div class="answer-wrapper">
									<table class="table table-bordered table-striped" style="width:500px !important">
									<tr>
										<th>&nbsp;</th>
										<th class="center"><?php echo $period_0; ?></th>
										<th class="center"><?php echo $period_1; ?></th>
										<th class="center"><?php echo $period_2; ?></th>
										<th class="center"><?php echo $period_3; ?></th>
									</tr>
									<tr>
										<td>TOMU Objections</td>
										<td class="center"><?php echo number_format($objections_tomu_0,0);?></td>
										<td class="center"><?php echo number_format($objections_tomu_1,0);?></td>
										<td class="center"><?php echo number_format($objections_tomu_2,0);?></td>
										<td class="center"><?php echo number_format($objections_tomu_3,0);?></td>																													
									</tr>
									<tr>
										<td>Audit Objections</td>
										<td class="center"><?php echo number_format($objections_audit_0,0);?></td>
										<td class="center"><?php echo number_format($objections_audit_1,0);?></td>
										<td class="center"><?php echo number_format($objections_audit_2,0);?></td>
										<td class="center"><?php echo number_format($objections_audit_3,0);?></td>																			
									</tr>
									<tr>
										<td>Judicial Appeals</td>
										<td class="center"><?php echo number_format($judicial_appeals_0,0);?></td>
										<td class="center"><?php echo number_format($judicial_appeals_1,0);?></td>
										<td class="center"><?php echo number_format($judicial_appeals_2,0);?></td>									
										<td class="center"><?php echo number_format($judicial_appeals_3,0);?></td>																			
									</tr>
									
									<tr>
										<td><strong>Total</strong></td>
										<td class="center"><strong><?php echo number_format($total_0,0);?></strong></td>
										<td class="center"><strong><?php echo number_format($total_1,0);?></strong></td>
										<td class="center"><strong><?php echo number_format($total_2,0);?></strong></td>
										<td class="center"><strong><?php echo number_format($total_3,0);?></strong></td>
									</tr>

									</table>
									<p style="font-size:10px; font-style:italic">Note: The numerator includes the value of all objections and judicial appeals.</p>
									<p>The Tax Administration indicated that the average tax dispute cases over the past 3 years (<?php echo $period_0;?>, <?php echo $period_1;?>, <?php echo $period_2;?>) 
									was <strong><?php echo number_format($three_year_average,0);?></strong> with total tax dispute cases for <?php echo $period_3;?> being <strong><?php echo $total_3;?></strong>, resulting in a ratio of
									<?php echo number_format(($total_3 / $three_year_average) * 100,2);?>% relative to past dispute cases for the current fiscal year.
									</p>
										<p>Does your research confirm these findings?</p>									
								</div>
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_7_17_2_1, 'dimension_7_17_2_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_7_17_2_1, 'dimension_7_17_2_1', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($dimension_7_17_2_1_notes, 'dimension_7_17_2_1_notes');?>
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