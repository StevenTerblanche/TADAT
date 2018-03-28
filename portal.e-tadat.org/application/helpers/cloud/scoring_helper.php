<?php defined('BASEPATH') OR exit('No direct script access allowed');

//  ONTHOU OM DIE DONNERSE PLUSSE UIT TE HAAL!!!!!!!!!!!!

function _check_score_type_method_one($score){
	$strScore = '';
	switch ($score){
	    case 1: $strScore = 'A';
		break;
	    case 1.5: $strScore = 'B+';
		break;
    	case 2: $strScore = 'B';
		break;
    	case 2.5: $strScore = 'B+';
		break;
	    case 3: $strScore = 'C';
		break;
	    case 3.5: $strScore = 'C+';
		break;		
	    case 4: $strScore = 'D';
    	break;
	    case 4.5: $strScore = 'D+';
    	break;
		
	}
	return $strScore;
}

function _check_score_type_method_two($conversion_array, $attained_score){
	foreach($conversion_array as $key => $value){
		if($value['Score'] == $attained_score) return $value['Symbol'];
	}
}

function _score_indicators($indicatorId,$score_number_dimension_1,$score_number_dimension_2,$score_number_dimension_3,$score_number_dimension_4,$score_number_dimension_5){
	if($indicatorId){
		$obj =& get_instance();
		#	SCORING START
		#	Get all Scoring Methods by Dimension for the specified Performance Indicator
			$scoring_method_array = _get_scoring_method_by_indicator('cloud_questions', 'MeasurementDimensions', $indicatorId, array('fkidScoringMethod','fkidDimensionType'));

		#	Initialise the scores_attained_method array
			$scores_attained_method = array();
			$i = 0;
			foreach($scoring_method_array as $key => $value){
				$i++;
				$score_number = 'score_number_dimension_'.$value['dimension'];
				$scores_attained_method[$key]['Dimension'] = $i;
				$scores_attained_method[$key]['Score'] = $$score_number;
				$scores_attained_method[$key]['Method'] = $value['method'];
			}
			
		#	Get the highest scoring Dimension where min = 1 and max = 4
			$min = 1; $max = 4; $accumulated_score = 0;
			foreach ($scores_attained_method as $key){
				$accumulated_score += $key['Score'];
				$score[]=$key['Score'];
			}
			$min = min(array_filter($score));
			$max = max(array_filter($score));

		#	Create Dimensions Conversion array from scoring matrix in TADAT Field Guide
			$dimension_conversion_array = array('2'=> array(array('Score'=> 2, 'Symbol' =>'A'),	array('Score'=> 3, 'Symbol' =>'B+'), array('Score'=> 4, 'Symbol' =>'B'), array('Score'=> 5, 'Symbol' =>'C+'), array('Score'=> 6, 'Symbol' =>'C'), array('Score'=> 7, 'Symbol' =>'D+'), array('Score'=> 8, 'Symbol' =>'D')),
												'3'=> array(array('Score'=> 3, 'Symbol' =>'A'), array('Score'=> 4,  'Symbol' =>'A'), array('Score'=> 5,  'Symbol' =>'B+'), array('Score'=> 6,  'Symbol' =>'B'), array('Score'=> 7,  'Symbol' =>'B'), array('Score'=> 8,  'Symbol' =>'C+'), array('Score'=> 9,  'Symbol' =>'C'), array('Score'=> 10, 'Symbol' =>'D+'), array('Score'=> 11, 'Symbol' =>'D+'), array('Score'=> 12, 'Symbol' =>'D')),
												'4'=> array(array('Score'=> 4, 'Symbol' =>'A'),array('Score'=> 5,  'Symbol' =>'A'),array('Score'=> 6,  'Symbol' =>'B+'),array('Score'=> 7,  'Symbol' =>'B+'),array('Score'=> 8,  'Symbol' =>'B'),array('Score'=> 9,  'Symbol' =>'B'),array('Score'=> 10,  'Symbol' =>'C+'),array('Score'=> 11,  'Symbol' =>'C+'),array('Score'=> 12,  'Symbol' =>'C'),array('Score'=> 13,  'Symbol' =>'D+'),array('Score'=> 14,  'Symbol' =>'D+'), array('Score'=> 15,  'Symbol' =>'D'), array('Score'=> 16,  'Symbol' =>'D'))
												);

		#	SCORE THE INDICATOR
			$cnt = 0;
			foreach($scores_attained_method as $key => $value){
							$cnt++;
			}

			$accumulated_score = $accumulated_score;
			foreach($scores_attained_method as $key => $value){
				$score_number = 'score_number_dimension_'.$value['Dimension'];
				$score_symbol = 'score_symbol_dimension_'.$value['Dimension'];
				$score = $value['Score'];
				$$score_number = $score;
				$symbol = _check_score_type_method_one($score);
				$$score_symbol = $symbol;
				if($value['Method'] == 1){
					$score_overall = ($min != $max) ? $max + 0 : $max;
//					$score_overall = ($min != $max) ? $max + 0.5 : $max;					
					$score_symbol_overall = _check_score_type_method_one($score_overall);					
				}
				if($value['Method'] == 2){
					$score_overall = $accumulated_score;
					if($i == 1){
						$score_symbol_overall = _check_score_type_method_one($score_overall);
					}else{
						$score_symbol_overall = _check_score_type_method_two($dimension_conversion_array[$i],$accumulated_score);
					}	
				}

				if($cnt == 1){
					$score_overall = $score_overall;
				}else{
					$score_overall = ($score_overall / $cnt);
				}
				if(substr($score_overall, strpos($score_overall, ".") + 1) > 5){
					$score_overall = round($score_overall / .5) * .5;
				}else{
					$score_overall = round($score_overall / .5) * .5;
				}
				$obj->form_data['score_number_overall'] = $score_overall;
				$obj->form_data['score_symbol_overall'] = $score_symbol_overall;
				$obj->form_data[$score_number] = $score;
				$obj->form_data[$score_symbol] = $symbol;
			}

		return true;
	}else{
		return false;
	}
	# END SCORING
}



function _score_indicators_final($indicatorId,$score_number_dimension_1,$score_number_dimension_2,$score_number_dimension_3,$score_number_dimension_4,$score_number_dimension_5){
	if($indicatorId){
		$obj =& get_instance();
		#	SCORING START
		#	Get all Scoring Methods by Dimension for the specified Performance Indicator
			$scoring_method_array = _get_scoring_method_by_indicator('cloud_questions', 'MeasurementDimensions', $indicatorId, array('fkidScoringMethod','fkidDimensionType'));

		#	Initialise the scores_attained_method array
			$scores_attained_method = array();
			$i = 0;
			foreach($scoring_method_array as $key => $value){
				$i++;
				$score_number = 'score_number_dimension_'.$value['dimension'];
				$scores_attained_method[$key]['Dimension'] = $i;
				$scores_attained_method[$key]['Score'] = $$score_number;
				$scores_attained_method[$key]['Method'] = $value['method'];
			}
			
		#	Get the highest scoring Dimension where min = 1 and max = 4
			$min = 1; $max = 4; $accumulated_score = 0;
			foreach ($scores_attained_method as $key){
				$accumulated_score += $key['Score'];
				$score[]=$key['Score'];
			}
			$min = min(array_filter($score));
			$max = max(array_filter($score));

		#	Create Dimensions Conversion array from scoring matrix in TADAT Field Guide
			$dimension_conversion_array = array(
			'2'=> array(
						array('Score'=> 2, 'Symbol' =>'A'),	
						array('Score'=> 3, 'Symbol' =>'B+'), 
						array('Score'=> 4, 'Symbol' =>'B'), 
						array('Score'=> 5, 'Symbol' =>'C+'), 
						array('Score'=> 6, 'Symbol' =>'C'), 
						array('Score'=> 7, 'Symbol' =>'D+'), 
						array('Score'=> 8, 'Symbol' =>'D')),
												'3'=> array(array('Score'=> 3,  'Symbol' =>'A'), array('Score'=> 4,  'Symbol' =>'A'), array('Score'=> 5,  'Symbol' =>'B+'), array('Score'=> 6,  'Symbol' =>'B'), array('Score'=> 7,  'Symbol' =>'B'), array('Score'=> 8,  'Symbol' =>'C+'), array('Score'=> 9,  'Symbol' =>'C'), array('Score'=> 10, 'Symbol' =>'D+'), array('Score'=> 11, 'Symbol' =>'D+'), array('Score'=> 12, 'Symbol' =>'D')),
												'4'=> array(array('Score'=> 4,  'Symbol' =>'A'),array('Score'=> 5,  'Symbol' =>'A'),array('Score'=> 6,  'Symbol' =>'B+'),array('Score'=> 7,  'Symbol' =>'B+'),array('Score'=> 8,  'Symbol' =>'B'),array('Score'=> 9,  'Symbol' =>'B'),array('Score'=> 10,  'Symbol' =>'C+'),array('Score'=> 11,  'Symbol' =>'C+'),array('Score'=> 12,  'Symbol' =>'C'),array('Score'=> 13,  'Symbol' =>'D+'),array('Score'=> 14,  'Symbol' =>'D+'), array('Score'=> 15,  'Symbol' =>'D'), array('Score'=> 16,  'Symbol' =>'D'))
												);

		#	SCORE THE INDICATOR
			$cnt = 0;
			foreach($scores_attained_method as $key => $value){
							$cnt++;
			}

			$accumulated_score = $accumulated_score;

			foreach($scores_attained_method as $key => $value){
				$score_number = 'score_number_dimension_'.$value['Dimension'];
				$score_symbol = 'score_symbol_dimension_'.$value['Dimension'];
				$score = $value['Score'];
				$$score_number = $score;
				$symbol = _check_score_type_method_one($score);
				$$score_symbol = $symbol;
				if($value['Method'] == 1){
					$score_overall = ($min != $max) ? $max + 0 : $max;
					$score_symbol_overall = _check_score_type_method_one($max);
				}
				if($value['Method'] == 2){
					$score_overall = $accumulated_score;
					if($i == 1){
						$score_symbol_overall = _check_score_type_method_one($score_overall);
					}else{
						$score_symbol_overall = _check_score_type_method_two($dimension_conversion_array[$i],$accumulated_score);
					}	
				}

				if($cnt == 1){
					$score_overall = $score_overall;
				}else{
					$score_overall = ($score_overall / $cnt);
				}
				if(substr($score_overall, strpos($score_overall, ".") + 1) > 5){
					$score_overall = round($score_overall / .5) * .5;
				}else{
					$score_overall = round($score_overall / .5) * .5;
				}
				$obj->form_data_final['score_number_overall_final'] = $max;
				$obj->form_data_final['score_symbol_overall_final'] = $score_symbol_overall;
				$obj->form_data_final[$score_number] = $score;
				$obj->form_data_final[$score_symbol] = $symbol;
				
				$arrFinalScoreReturn = array('score'=>$max,'symbol'=>$score_symbol_overall);
			}
/*echo 'xxxxxxxxxxxxxxxxxxxxxxxxxx';
		echo '<pre>';
		print_r($arrFinalScoreReturn);
		echo '</pre>';
echo 'xxxxxxxxxxxxxxxxxxxxxxxxxx';		
*/

		return $arrFinalScoreReturn;
	}else{
		return false;
	}
	# END SCORING
}