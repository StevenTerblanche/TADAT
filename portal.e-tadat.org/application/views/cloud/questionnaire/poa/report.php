<?php
	echo '<h4><strong>POA '.$get_record_table[0]['poa_number'].': '.$get_record_table[0]['poa'].'</strong></h4>';
	echo '<p>'.$get_record_table[0]['p_assessment_text'].'</p>';
	echo '<p>'.$get_record_table[0]['assessment_text'].'</p>';
/*	

	echo '<pre>';
	echo 'INDICATOR ID: '.$this->session->userdata('indicator_id');
	echo '</pre>';


*/

	$arrDimensions = _get_record_by_id_score_md($this->session->userdata('indicator_id'),'','cloud_questions');
	$fields = array('score_symbol_dimension_1_final', 'score_symbol_dimension_2_final','score_symbol_dimension_3_final','score_symbol_dimension_4_final','score_symbol_dimension_5_final','score_number_dimension_1_final', 'score_number_dimension_2_final','score_number_dimension_3_final','score_number_dimension_4_final','score_number_dimension_5_final', 'score_symbol_overall_final', 'score_symbol_overall','reportText');
	$results = array('Table'=>$get_record_table[0]['questionTable'], _get_record_by_id_score_table($this->session->userdata('mission_id'), 'cloud_questions', $get_record_table[0]['questionTable'], $fields));
	$reportText = $results[0]['reportText'];

/*
	echo '<pre>';
	print_r($results);
	echo '</pre>';
*/
	


/*
	echo '********************';
	echo 'score_number_dimension_1_final: '.$results[0]['score_number_dimension_1_final']; 
	echo '********************';	

*/
$arrFinalScore = _score_indicators_final($this->session->userdata('indicator_id'), $results[0]['score_number_dimension_1_final'], $results[0]['score_number_dimension_2_final'], $results[0]['score_number_dimension_3_final'], $results[0]['score_number_dimension_4_final'], $results[0]['score_number_dimension_5_final']);

	echo '<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">';
		echo '<thead>';
			echo '<tr>';
				echo '<th class="va">Measurement Dimensions</th>';
				echo '<th class="va center">Scoring<br>Method</th>';
				echo '<th class="va center">Dimensions<br>Score</th>';
				echo '<th class="va center">Overall<br>Score</th>';							
			echo '</tr>';
		echo '</thead>';
	echo '<tbody>';

	if($arrDimensions){
		$cnt = 0;
		foreach($arrDimensions as $key => $value){
			$cnt++;
			$scoringCriteria = _get_record_by_id_score_method($arrDimensions[$key]['id'], $results[0]['score_number_dimension_'.$cnt.'_final'], 'cloud_questions', 'MeasurementDimensionsScoring', $fields = array('criteria'));	
			$score_symbol_dimension = 'score_symbol_dimension_'.$cnt.'_final';
			
			if($key == 0) {
				echo '<tr class="va">';
					echo '<td class="va bld">'.$arrDimensions[$key]['dimensionName'].'</td>';
					echo '<td class="va center">'.$arrDimensions[$key]['methodType'].'</td>';
					echo '<td class="va center">'.$results[0][$score_symbol_dimension].'</td>';
//					echo '<td rowspan="14" class="va center">'.$results[0]['score_symbol_overall'].'</td>';
					echo '<td rowspan="14" class="va center">'.$arrFinalScore['symbol'].'</td>';					
				echo '</tr>';
				echo '<tr class="va">';
					echo '<td class="va" colspan="3">'.$scoringCriteria['criteria'].'</td>';
				echo '</tr>';
			}else{
				echo '<tr class="va">';
					echo '<td class="va bld">'.$arrDimensions[$key]['dimensionName'].'</td>';
					echo '<td class="va center">'.$arrDimensions[$key]['methodType'].'</td>';
					echo '<td class="va center">'.$results[0][$score_symbol_dimension].'</td>';
				echo '</tr>';
				echo '<tr class="va">';
					echo '<td class="va" colspan="3">'.$scoringCriteria['criteria'].'</td>';
				echo '</tr>';
			}
		}		
	}
	echo '</tbody>';
	echo '</table>';

	if(!isset($reportText)) $reportText = ''; 
	echo form_open($uri, array('class'=>'form-horizontal', 'id'=>'form-submit')); 
	echo form_create_notes_tadat($reportText, 'reportText','What are the findings, conclusions, and recommendations for the PAR?');
	echo form_hidden('score_symbol_overall_final', $arrFinalScore['symbol']);

?>
	<div class="form-group mt15">
		<div class="col-xs-12" style="text-align:center !important;">
			<button type="submit" id="submit_button" class="btn btn-primary white-text"><i class="fa fa-check-circle mr5"></i><?php echo $submit_button; ?></button>
		</div>
	</div>

<?php echo form_close(); ?>


