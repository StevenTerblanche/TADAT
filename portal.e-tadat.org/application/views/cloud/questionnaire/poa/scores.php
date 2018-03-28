<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	echo $this->load->view('upload/upload_dialog', '', true);
	echo '<h4><strong>POA '.$get_record_table[0]['poa_number'].': '.$get_record_table[0]['poa'].'</strong></h4>';
	echo '<h5><strong>INDICATOR '.$get_record_table[0]['indicatorNumber'].': '.$get_record_table[0]['indicatorName'].'</strong></h5>';
	
	$arrDimensions = _get_record_by_id_score_md($this->session->userdata('indicator_id'),'','cloud_questions');
	$fields = array('score_symbol_dimension_1', 'score_symbol_dimension_2', 'score_symbol_dimension_3', 'score_symbol_dimension_4', 'score_symbol_dimension_5', 'score_symbol_overall',
					'score_number_dimension_1', 'score_number_dimension_2', 'score_number_dimension_3', 'score_number_dimension_4', 'score_number_dimension_5', 
					'score_symbol_dimension_1_final', 'score_symbol_dimension_2_final', 'score_symbol_dimension_3_final', 'score_symbol_dimension_4_final', 'score_symbol_dimension_5_final', 'score_symbol_overall_final',
					'score_number_dimension_1_final', 'score_number_dimension_2_final', 'score_number_dimension_3_final', 'score_number_dimension_4_final', 'score_number_dimension_5_final', 
					'score_dimension_1_final_reason', 'score_dimension_2_final_reason', 'score_dimension_3_final_reason', 'score_dimension_4_final_reason', 'score_dimension_5_final_reason'																								
					);
	$results = array('Table'=>$get_record_table[0]['questionTable'], _get_record_by_id_score_table($this->session->userdata('mission_id'), 'cloud_questions', $get_record_table[0]['questionTable'], $fields));
	echo form_open($uri, array('class'=>'form-horizontal', 'id'=>'form-submit')); 
?>
		<input name="current_dimension_table" id="id_current_dimension_table" type="hidden" value="<?php echo $get_record_table[0]['questionTable']; ?>">	
<?php
	
	?>	
	<div class="tabs inside-panel">
		<ul id="myTabs" class="nav nav-tabs">
		<?php 
		if($arrDimensions){
			$cnt_a = 0;
			foreach($arrDimensions as $key => $value){
				$cnt_a++;
				if($cnt_a == 1){
					$activater = 'active';
				}else{
					$activater = '';
				}
				echo '<li class="'.$activater.'"><a href="#'.$cnt_a.'" data-toggle="tab"><strong>DIMENSION '.$cnt_a.'</strong></a></li>';
			}
		}
		?>		
		</ul>
	<div id="myTabContent" class="tab-content question">
<?php
	if($arrDimensions){
		$options = array('A' => 'A', 'B' => 'B', 'C' => 'C', 'D' => 'D');		
		$cnt = 0;
		foreach($arrDimensions as $key => $value){
			$cnt++;
			if($cnt == 1){
				$active_tab = 'tab-pane active in fade text-muted';
			}else{
				$active_tab = 'tab-pane fade text-muted';
			}

			echo '<div class="'.$active_tab.'" id="'.$cnt.'">';

			$scoringCriteria = _get_record_by_id_score_method($arrDimensions[$key]['id'], $results[0]['score_number_dimension_'.$cnt], 'cloud_questions', 'MeasurementDimensionsScoring', $fields = array('criteria'));	
			$score_symbol_dimension_generated = 'score_symbol_dimension_'.$cnt;
			$score_number_dimension_generated = 'score_number_dimension_'.$cnt;
			$score_number_dimension_final = 'score_number_dimension_'.$cnt.'_final';
			$score_symbol_dimension_final = 'score_symbol_dimension_'.$cnt.'_final';			
			$score_dimension_final_reason = 'score_dimension_'.$cnt.'_final_reason';
			$display_reason = $results[0][$score_dimension_final_reason];
//			$display_score_final = '';
			$display_symbol_final = '';			
			if($results[0][$score_number_dimension_final] == 0){
	//			$display_score_final = $results[0][$score_number_dimension_generated];
				$display_symbol_final = $results[0][$score_symbol_dimension_generated];				
			}else{
		//		$display_score_final = $results[0][$score_number_dimension_final];
				$display_symbol_final = $results[0][$score_symbol_dimension_final];				
			}
			?>
				<table class="table table-bordered table-striped dt-responsive non-responsive mb10" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th class="va">Dimension <?php echo $cnt.': '.$arrDimensions[$key]['dimensionName'];?></th>
							<th class="va center" style="width:80px !important;">Scoring<br>Method</th>
							<th class="va center" style="width:80px !important;">Generated<br>Score</th>
							<th class="va center" style="width:80px !important;">Final<br>Score</th>
						</tr>
					</thead>
					<tbody>
						<tr class="va">
							<td class="va"><?php echo $scoringCriteria['criteria']; ?></td>
							<td class="va center"><?php echo $arrDimensions[$key]['methodType'];?></td>
							<td class="va center">
								<input style="background-color:#f9f9f9; border:none; width:40px; text-align:center" name="<?php echo $score_symbol_dimension_generated; ?>" id="id_<?php echo $score_symbol_dimension_generated; ?>" type="text" disabled value="<?php echo $results[0][$score_symbol_dimension_generated]; ?>">
								<input name="<?php echo $score_number_dimension_generated; ?>" id="id_<?php echo $score_number_dimension_generated; ?>" type="hidden" value="<?php echo $results[0][$score_number_dimension_generated]; ?>">
							</td>
							<td class="va center">
								<?php echo form_dropdown($score_symbol_dimension_final, $options, set_value($score_symbol_dimension_final, $display_symbol_final), array('id'=>'id_'.$score_symbol_dimension_final, 'class'=>'form-control')); ?>
								<input name="<?php echo $score_number_dimension_final;?>" id="id_<?php echo $score_number_dimension_final; ?>" type="hidden" value="<?php echo $results[0][$score_number_dimension_final]; ?>">
							</td>
						</tr>
						<tr class="va" id="div_id_dimension_<?php echo $cnt; ?>_reason" style="display:none">
							<td class="va" colspan="4">
								<p><strong>Please indicate the reason below why the score has been changed.</strong></p><?php echo form_textarea(array('name'=>$score_dimension_final_reason,
								'id'=>'id_'.$score_dimension_final_reason, 'value'=>$display_reason, 'class'=>'form-control')); ?>
							</td>
						</tr>
						<tr class="va" id="div_id_dimension_<?php echo $cnt; ?>_reason_uploaded">
							<td class="va" colspan="4">
								<div id="uploader_<?php echo $cnt; ?>" data-url="http://e-tadat.org/ajax/populateUploadedForm/?upload_type=1&missionId=<?php echo $this->session->userdata('mission_id').'&indicatorId='.$this->session->userdata('indicator_id').'&dimensionId='.$cnt; ?>"></div>
								<div id="uploaded_<?php echo $cnt; ?>"></div>						
							</td>
						</tr>
						<tr class="va" id="div_id_dimension_<?php echo $cnt; ?>_reason_upload_button" style="display:none">
							<td class="va" colspan="4">
								<p><strong>Upload evidentiary documentation to support the new score, by clicking on the upload button below.</strong></p><button style="margin-left:0px !important" type="button" id="upload_button" class="btn btn-primary white-text" data-toggle="modal" data-target="#modal-style2" data-id="<?php echo $cnt; ?>" ><i class="fa fa-cloud-upload mr5"></i>Upload Evidentiary Documents</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
<?php				
			}
		}		
?>

		</div>
	</div>
	<div class="form-group mt15">
		<div class="col-xs-12" style="text-align:center !important;">
			<button type="submit" id="submit_button" class="btn btn-primary white-text"><i class="fa fa-check-circle mr5"></i><?php echo $submit_button; ?></button>
		</div>
	</div>

<?php echo form_close(); ?>