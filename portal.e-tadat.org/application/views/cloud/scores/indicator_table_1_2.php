<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	echo '<h4><strong>POA '.$get_record_table[0]['poa_number'].': '.$get_record_table[0]['poa'].'</strong></h4>';
	echo '<p>'.$get_record_table[0]['p_assessment_text'].'</p>';
	echo '<p>'.$get_record_table[0]['assessment_text'].'</p>';
	
	$arrDimensions = _get_record_by_id_score_md($this->session->userdata('pi_id'),'','cloud_questions');
	$fields = array('score_symbol_dimension_1', 'score_symbol_dimension_2','score_symbol_dimension_3','score_symbol_dimension_4','score_symbol_dimension_5','score_number_dimension_1', 'score_number_dimension_2','score_number_dimension_3','score_number_dimension_4','score_number_dimension_5', 'score_symbol_overall');

	$results = array('Table'=>$get_record_table[0]['questionTable'], _get_record_by_id_score_table($this->session->userdata('mission_id'), 'cloud_questions', $get_record_table[0]['questionTable'], $fields));

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
		$methodDimension_1 = _get_record_by_id_score_method($arrDimensions[$key]['id'], $results[0]['score_number_dimension_1'], 'cloud_questions', 'MeasurementDimensionsScoring', $fields = array('criteria'));	
			if($key == 0) {
				echo '<tr class="va">';
					echo '<td class="va">P1.1.1 '.$arrDimensions[$key]['dimensionName'].'</td>';
					echo '<td class="va center">'.$arrDimensions[$key]['methodType'].'</td>';
					echo '<td class="va center">'.$results[0]['score_symbol_dimension_1'].'</td>';
					echo '<td rowspan="4" class="va center">'.$results[0]['score_symbol_overall'].'</td>';
				echo '</tr>';
				echo '<tr class="va">';
					echo '<td class="va" colspan="3">'.$methodDimension_1['criteria'].'</td>';
				echo '</tr>';
			}else{
				echo '<tr class="va">';
					echo '<td class="va">P1.1.2 '.$arrDimensions[$key]['dimensionName'].'</td>';
					echo '<td class="va center">'.$arrDimensions[$key]['methodType'].'</td>';
					echo '<td class="va center">'.$results[0]['score_symbol_dimension_1'].'</td>';
				echo '</tr>';
				echo '<tr class="va">';
					echo '<td class="va" colspan="3">'.$methodDimension_1['criteria'].'</td>';
				echo '</tr>';
			}
		}		
	}
	echo '</tbody>';
	echo '</table>';