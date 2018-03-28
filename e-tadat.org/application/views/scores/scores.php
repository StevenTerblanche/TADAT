<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

//echo '<pre>';
//print_r($get_record_table);
//echo '</pre>';


	echo '<h4><strong>POA '.$get_record_table[0]['poa_number'].': '.$get_record_table[0]['poa'].'</strong></h4>';
	echo '<p>'.$get_record_table[0]['p_assessment_text'].'</p>';
	echo '<p>'.$get_record_table[0]['assessment_text'].'</p>';
	
	$arrDimensions = _get_record_by_id_score_md($this->session->userdata('indicator_id'),'','db_b');
	$fields = array('score_symbol_dimension_1', 'score_symbol_dimension_2','score_symbol_dimension_3','score_symbol_dimension_4','score_symbol_dimension_5','score_number_dimension_1', 'score_number_dimension_2','score_number_dimension_3','score_number_dimension_4','score_number_dimension_5', 'score_symbol_overall');
	$results = array('Table'=>$get_record_table[0]['questionTable'], _get_record_by_id_score_table($this->session->userdata('mission_id'), 'db_b', $get_record_table[0]['questionTable'], $fields));

echo 'mission_id:'.$this->session->userdata('mission_id').'<br>';
echo 'poa_id:'.$this->session->userdata('poa_id').'<br>';
echo 'indicator_id:'.$this->session->userdata('indicator_id').'<br>';
echo '<pre>';
print_r($results);
echo '</pre>';



//echo '<pre>';
//print_r($results);			

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
//echo '<pre>';
//print_r($arrDimensions);
//echo '<pre>';
//print_r($scoringCriteria);
			$cnt++;
		$scoringCriteria = _get_record_by_id_score_method($arrDimensions[$key]['id'], $results[0]['score_number_dimension_'.$cnt], 'db_b', 'MeasurementDimensionsScoring', $fields = array('criteria'));	
		$score_symbol_dimension = 'score_symbol_dimension_'.$cnt;


			if($key == 0) {
				echo '<tr class="va">';
					echo '<td class="va bld">'.$arrDimensions[$key]['dimensionName'].'</td>';
					echo '<td class="va center">'.$arrDimensions[$key]['methodType'].'</td>';
					echo '<td class="va center">'.$results[0][$score_symbol_dimension].'</td>';
					echo '<td rowspan="14" class="va center">'.$results[0]['score_symbol_overall'].'</td>';
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