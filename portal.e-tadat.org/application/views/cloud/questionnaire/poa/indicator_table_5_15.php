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
		<li class=""><a id="uploader" href="#uploaded" data-url="http://e-tadat.org/ajax/populateUploadedForm/?missionId=<?php echo $this->session->userdata('mission_id');?>&indicatorId=<?php echo $this->session->userdata('indicator_id');?>" data-toggle="tab"><strong>UPLOADED</strong></a></li>
	</ul>
	<div id="myTabContent" class="tab-content question">
		<!--START TAB PANEL -->
		<div class="tab-pane fade active in text-muted" id="dimension_a">
			
				<p><strong><?php $numCounter = 0; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '5.15.1 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-a">
						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_5_15_1_1, 'dimension_5_15_1_1', 'a', 'a1', '5.15.1.1 The value of total core tax arrears at fiscal year-end as a percentage of total core tax revenue collections for the fiscal year, expressed as a ratio:');?>
								<div class="answer-wrapper">
								<?php
									$tax_collected = _get_field_by_id_tax_collected('cloud_questions', 'pmq_table_1', 'fkidMission', $this->session->userdata('mission_id'));
									$tax_arrears_a = _get_field_by_id_tax_arrears('cloud_questions', 'pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'));

									if($tax_arrears_a && $tax_collected){
									$collection_ratio_a = ($tax_arrears_a / $tax_collected)*100;
								?>
									<p>The Tax Administration indicated that the ratio of core tax arrears <strong>(<?php echo number_format($tax_arrears_a);?>)</strong> to annual core tax collections <strong>(<?php echo number_format($tax_collected);?>)</strong>, averaged over the past 3 years was <strong><?php echo number_format($collection_ratio_a,0);?>%</strong>.</p>
									<p>Note: The numerator includes all core tax arrears including penalties and interest, both collectible and uncollectible. The denominator includes the total amount of core tax collected (net of refunds) by the tax administration during the year. A ratio is computed for each of the past three fiscal years and a 3-year average taken to score this dimension.</p>
									<p>Does your research confirm these findings?</p>									
								<?php
									}else{
										$collection_ratio_a = 0;
										echo '<p>The Tax Administration has not supplied any figures.</p>';
									}
									$dimension_5_15_1_percentage = $collection_ratio_a;
									echo form_hidden('dimension_5_15_1_percentage', $dimension_5_15_1_percentage);
								?>
								</div>								

								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_5_15_1_1, 'dimension_5_15_1_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_5_15_1_1, 'dimension_5_15_1_1', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($dimension_5_15_1_1_notes, 'dimension_5_15_1_1_notes');?>
						<?php end_accordion_panel();?>
						<!--END ACCORDION -->					
					</div>
					<!--END ACCORDION PANEL -->
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->


		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_b">
			
				<p><strong><?php $numCounter = 1; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '5.15.2 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-b">
						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_5_15_2_1, 'dimension_5_15_2_1', 'b', 'b1', '5.15.2.1 What is the ratio of collectible core tax arrears to annual core tax collections, averaged over the past 3 years?');?>
								<div class="answer-wrapper">
								<?php
									$tax_arrears_b = _get_field_by_id_collectible_tax_arrears('cloud_questions', 'pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'));
									if($tax_arrears_b && $tax_collected){
										$collection_ratio_b = ($tax_arrears_b / $tax_collected)*100;								
								?>
										<p>The Tax Administration indicated that the ratio of core tax arrears <strong>(<?php echo number_format($tax_arrears_b);?>)</strong> to annual core tax collections <strong>(<?php echo number_format($tax_collected);?>)</strong>, averaged over the past 3 years was <strong><?php echo number_format($collection_ratio_b,0);?>%</strong>.</p>
										<p>Note: The numerator, collectible tax arrears, is defined in the glossary of terms (Appendix 1). A ratio is computed for each of the past three fiscal years and a 3-year average taken to score this dimension.</p>
										<p>Does your research confirm these findings?</p>									
								<?php
									}else{
										$collection_ratio_b = 0;
										echo '<p>The Tax Administration has not supplied any figures.</p>';
									}
									$dimension_5_15_2_percentage = $collection_ratio_b;
									echo form_hidden('dimension_5_15_2_percentage', $dimension_5_15_2_percentage);
								?>
								</div>								
								
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_5_15_2_1, 'dimension_5_15_2_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_5_15_2_1, 'dimension_5_15_2_1', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($dimension_5_15_2_1_notes, 'dimension_5_15_2_1_notes');?>
						<?php end_accordion_panel();?>
						<!--END ACCORDION -->					
					</div>
					<!--END ACCORDION PANEL -->
			
			<? $counter['numCounter'] = $numCounter; $this->load->view('upload/evidence', $counter);?>
		</div>
		<!-- ************************************************************ END TAB PANEL ************************************************************ -->

		<!--START TAB PANEL -->
		<div class="tab-pane fade text-muted" id="dimension_c">
			
				<p><strong><?php $numCounter = 2; if(isset($measurement_dimensions[$numCounter]['dimensionName'])){echo '5.15.3 '. $measurement_dimensions[$numCounter]['dimensionName'];}?></strong></p>
					<!--START ACCORDION PANEL -->
					<div class="panel-group accordion" id="accordion-c">
						<!--START ACCORDION -->
						<?php start_accordion_panel($strFieldsetStatus, $dimension_5_15_3_1, 'dimension_5_15_3_1', 'c', 'c1', '5.15.3.1 What is the ratio of core tax arrears greater than 12 months\' old to all core tax arrears?');?>
								<div class="answer-wrapper">
								<?php
									$tax_arrears_c = _get_field_by_id_tax_arrears_older('cloud_questions', 'pmq_table_11', 'fkidMission', $this->session->userdata('mission_id'));
									if($tax_arrears_c && $tax_arrears_a){
										$collection_ratio_c = ($tax_arrears_c / $tax_arrears_a)*100;
								?>
										<p>The Tax Administration indicated that the ratio of core tax arrears <strong>(<?php echo number_format($tax_arrears_c);?>)</strong> to all core tax arrears <strong>(<?php echo number_format($tax_arrears_a);?>)</strong>, over the past 3 years was <strong><?php echo number_format($collection_ratio_c,0);?>%</strong>.</p>
										<p>Note: This ratio gives an indication of the extent of old debt (i.e. core taxes which are significantly overdue), both collectible and uncollectible. A ratio is computed for each of the past three fiscal years and a 3-year average taken to score this dimension.</p>
										<p>Does your research confirm these findings?</p>
								<?php
									}else{
										$collection_ratio_c = 0;
										echo '<p>The Tax Administration has not supplied any figures.</p>';
									}
									$dimension_5_15_3_percentage = $collection_ratio_c;
									echo form_hidden('dimension_5_15_3_percentage', $dimension_5_15_3_percentage);
								?>
								</div>								
								<div class="answer-wrapper">
									<div class="answer">Answer: </div>
									<div class="answer-container">
										<?php form_create_radio_tadat($dimension_5_15_3_1, 'dimension_5_15_3_1', '2', 'Yes');?>
										<?php form_create_radio_tadat($dimension_5_15_3_1, 'dimension_5_15_3_1', '1', 'No');?>
									</div>
								</div>
									<?php form_create_notes_tadat($dimension_5_15_3_1_notes, 'dimension_5_15_3_1_notes');?>
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