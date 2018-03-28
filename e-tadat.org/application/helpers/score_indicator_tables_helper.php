<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
function _score_indicator_tables($table = null){
	if($table){
		$obj =& get_instance();
		// Set the initial scores to null for the min max array values
		$score_number_dimension_1 = null;
		$score_number_dimension_2 = null;
		$score_number_dimension_3 = null;
		$score_number_dimension_4 = null;
		$score_number_dimension_5 = null;
		$score_overall = 0;	

		switch ($table){
			# SCORING FOR indicator_table_1_1 #
			case 'indicator_table_1_1': 
				# DIMENSION 1.1.1
				// Set the score to 4(D) as default and test to change
				$score_number_dimension_1 = 4;
				if( $obj->form_data['dimension_1_1_1_1'] == 2 && 
					$obj->form_data['dimension_1_1_1_2'] == 2 && 
					$obj->form_data['dimension_1_1_1_3'] == 2 && 
					$obj->form_data['dimension_1_1_1_4'] == 2 && 
					$obj->form_data['dimension_1_1_1_5'] == 2 && 
					$obj->form_data['dimension_1_1_1_6'] == 2 && 
					$obj->form_data['dimension_1_1_1_7'] == 2 && 
					$obj->form_data['dimension_1_1_1_8'] == 2 && 
					$obj->form_data['dimension_1_1_1_9'] == 2 && 
					$obj->form_data['dimension_1_1_1_10'] == 2 && 
					$obj->form_data['dimension_1_1_1_11'] == 2 && 
					$obj->form_data['dimension_1_1_1_12'] == 2) 
					$score_number_dimension_1 = 1;
					
				if(	$obj->form_data['dimension_1_1_1_1'] == 2 && 
					$obj->form_data['dimension_1_1_1_2'] == 2 && 
					$obj->form_data['dimension_1_1_1_3'] == 2 && 
					$obj->form_data['dimension_1_1_1_4'] == 2 && 
					($obj->form_data['dimension_1_1_1_5'] == 1 || $obj->form_data['dimension_1_1_1_5'] == 2) && 
//					$obj->form_data['dimension_1_1_1_5_a'] == 2 &&					
					$obj->form_data['dimension_1_1_1_6'] == 2 && 
					$obj->form_data['dimension_1_1_1_7'] == 2 && 
					$obj->form_data['dimension_1_1_1_8'] == 2 && 
					$obj->form_data['dimension_1_1_1_9'] == 2) 
					$score_number_dimension_1 = 2;
					
				if( $obj->form_data['dimension_1_1_1_1'] == 2 && 
					$obj->form_data['dimension_1_1_1_2'] == 2 && 
					$obj->form_data['dimension_1_1_1_3'] == 2 && 
					$obj->form_data['dimension_1_1_1_4'] == 1 && 
					$obj->form_data['dimension_1_1_1_5'] == 1 && 
					$obj->form_data['dimension_1_1_1_5_a'] == 2 &&
					$obj->form_data['dimension_1_1_1_6'] == 2 && 
					$obj->form_data['dimension_1_1_1_7'] == 2 && 
					$obj->form_data['dimension_1_1_1_8'] == 2 && 
					$obj->form_data['dimension_1_1_1_9'] == 2) 
					$score_number_dimension_1 = 3;	

				# DIMENSION 1.1.2
				// Set the score to 4(D) as default and test to change				
				$score_number_dimension_2 = 4;
				if( $obj->form_data['dimension_1_1_2_1'] == 2 &&
					$obj->form_data['dimension_1_1_2_1_a'] == 2 &&				 
					$obj->form_data['dimension_1_1_2_2'] == 2 && 
					$obj->form_data['dimension_1_1_2_3'] == 2 && 
					$obj->form_data['dimension_1_1_2_4'] == 2 && 
					$obj->form_data['dimension_1_1_2_4_a'] == 2 && 
					$obj->form_data['dimension_1_1_2_4_b'] == 2 && 
					$obj->form_data['dimension_1_1_2_4_c'] == 2 && 
					$obj->form_data['dimension_1_1_2_5_a'] == 2 && 
					$obj->form_data['dimension_1_1_2_5_b'] == 2 && 
					$obj->form_data['dimension_1_1_2_5_c'] == 2 && 
					$obj->form_data['dimension_1_1_2_5_d'] == 2 && 
					$obj->form_data['dimension_1_1_2_6'] == 2) 
					$score_number_dimension_2 = 1;
					
				if( $obj->form_data['dimension_1_1_2_1'] == 2 &&
					$obj->form_data['dimension_1_1_2_1_a'] == 2 &&				 
					$obj->form_data['dimension_1_1_2_2'] == 2 && 
					$obj->form_data['dimension_1_1_2_3'] == 2 && 
					$obj->form_data['dimension_1_1_2_4'] == 2 && 
					$obj->form_data['dimension_1_1_2_4_a'] == 2 && 
					$obj->form_data['dimension_1_1_2_4_b'] == 2 && 
					$obj->form_data['dimension_1_1_2_4_c'] == 3 && 
					$obj->form_data['dimension_1_1_2_5_a'] == 2 && 
					$obj->form_data['dimension_1_1_2_5_b'] == 2 && 
					$obj->form_data['dimension_1_1_2_5_c'] == 2 && 
					$obj->form_data['dimension_1_1_2_5_d'] == 2 && 
					$obj->form_data['dimension_1_1_2_6'] == 2) 
					$score_number_dimension_2 = 2;
					
				if( $obj->form_data['dimension_1_1_2_1'] == 2 &&
					$obj->form_data['dimension_1_1_2_1_a'] == 2 &&				 
					$obj->form_data['dimension_1_1_2_2'] == 2 && 
					$obj->form_data['dimension_1_1_2_3'] == 2 && 
					$obj->form_data['dimension_1_1_2_4'] == 2 && 
					$obj->form_data['dimension_1_1_2_4_a'] == 2 && 
					$obj->form_data['dimension_1_1_2_4_b'] == 1 && 
					$obj->form_data['dimension_1_1_2_4_c'] == 3 && 
					$obj->form_data['dimension_1_1_2_6'] == 2) 
					$score_number_dimension_2 = 3;
					
			break;
			# SCORING FOR indicator_table_1_2 #			
			case 'indicator_table_1_2':
				# DIMENSION 1.2.1
				$score_number_dimension_1 = 4;
				if( $obj->form_data['dimension_1_2_1_1'] == 2 && 
					$obj->form_data['dimension_1_2_1_1_a'] == 2 && 
					$obj->form_data['dimension_1_2_1_1_b'] == 2 && 
					$obj->form_data['dimension_1_2_1_1_c'] == 2 ) 
					$score_number_dimension_1 = 1;

				if( $obj->form_data['dimension_1_2_1_1'] == 2 && 
					$obj->form_data['dimension_1_2_1_1_a'] == 2 && 
					$obj->form_data['dimension_1_2_1_1_b'] == 1 && 
					$obj->form_data['dimension_1_2_1_1_c'] == 2 ) 
					$score_number_dimension_1 = 2;
					
				if( $obj->form_data['dimension_1_2_1_1'] == 2 && 
					$obj->form_data['dimension_1_2_1_1_a'] == 1 && 
					$obj->form_data['dimension_1_2_1_1_b'] == 1 && 
					$obj->form_data['dimension_1_2_1_1_c'] == 2 ) 
					$score_number_dimension_1 = 3;
			break;

			# SCORING FOR indicator_table_2_3 #			
			case 'indicator_table_2_3':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				$sumCombinedA = $obj->form_data['dimension_2_3_1_1'];
				$sumCombinedB = $obj->form_data['dimension_2_3_1_2'] + $obj->form_data['dimension_2_3_1_3'] + $obj->form_data['dimension_2_3_1_4'] + $obj->form_data['dimension_2_3_1_5'];
				$sumCombinedC = $obj->form_data['dimension_2_3_1_6'] + $obj->form_data['dimension_2_3_1_7'] + $obj->form_data['dimension_2_3_1_8'];				
				$sumCombinedD = $obj->form_data['dimension_2_3_1_10'] + $obj->form_data['dimension_2_3_1_11'] + $obj->form_data['dimension_2_3_1_12'] + $obj->form_data['dimension_2_3_1_13'] + $obj->form_data['dimension_2_3_1_14'];				
				if($sumCombinedA == 2 && $sumCombinedB == 8 && $sumCombinedC == 6 && $sumCombinedD == 10) $score_number_dimension_1 = 1;
				if($sumCombinedA == 2 && $sumCombinedB == 7 && $sumCombinedC == 6 && $sumCombinedD >= 10) $score_number_dimension_1 = 2;
				if($sumCombinedA == 2 && $sumCombinedB == 4 && ($obj->form_data['dimension_2_3_1_6'] == 2 && $sumCombinedC == 6) && $sumCombinedD >= 4) $score_number_dimension_1 = 3;

				# DIMENSION 2
				$score_number_dimension_2 = 4;
				$sumCombinedA = $obj->form_data['dimension_2_3_2_2'] + $obj->form_data['dimension_2_3_2_3'];
				if( $obj->form_data['dimension_2_3_2_1'] == 2 && 
				    $sumCombinedA == 4 &&
					$obj->form_data['dimension_2_3_2_5'] == 2 &&
					$obj->form_data['dimension_2_3_2_6'] == 2 && $obj->form_data['dimension_2_3_2_8'] == 2 && $obj->form_data['dimension_2_3_2_9'] == 2 && 
					$obj->form_data['dimension_2_3_2_10'] == 2 && $obj->form_data['dimension_2_3_2_11'] == 2 && $obj->form_data['dimension_2_3_2_12'] == 2 && $obj->form_data['dimension_2_3_2_13'] == 2 ) $score_number_dimension_2 = 1;

				if( $obj->form_data['dimension_2_3_2_1'] == 2 && 
				    ($sumCombinedA == 2 || $sumCombinedA == 3) && 
					$obj->form_data['dimension_2_3_2_5'] == 2 &&					
					$obj->form_data['dimension_2_3_2_6'] == 2 && $obj->form_data['dimension_2_3_2_8'] == 2 && $obj->form_data['dimension_2_3_2_9'] == 2 && 
					$obj->form_data['dimension_2_3_2_10'] == 2 && $obj->form_data['dimension_2_3_2_11'] == 2 && $obj->form_data['dimension_2_3_2_12'] == 2 && $obj->form_data['dimension_2_3_2_13'] == 2 ) $score_number_dimension_2 = 2;

				if( $obj->form_data['dimension_2_3_2_1'] == 1 && 
					($obj->form_data['dimension_2_3_2_5'] == 1 || $obj->form_data['dimension_2_3_2_5'] == 2) &&
				    ($sumCombinedA == 2 || $sumCombinedA == 3 || $sumCombinedA == 4) && 
					$obj->form_data['dimension_2_3_2_6'] == 2 && $obj->form_data['dimension_2_3_2_8'] == 2 && $obj->form_data['dimension_2_3_2_9'] == 2 && 
					($obj->form_data['dimension_2_3_2_10'] == 2 || $obj->form_data['dimension_2_3_2_11'] == 2 || $obj->form_data['dimension_2_3_2_12'] == 2 || $obj->form_data['dimension_2_3_2_13'] == 2) ) $score_number_dimension_2 = 3;

			break;
			# SCORING FOR indicator_table_2_4 #			
			case 'indicator_table_2_4':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				$sumCombinedA = $obj->form_data['dimension_2_4_1_1'];
				$sumCombinedB = $obj->form_data['dimension_2_4_1_2'] + $obj->form_data['dimension_2_4_1_3'] + $obj->form_data['dimension_2_4_1_4'] + $obj->form_data['dimension_2_4_1_5'];
				$sumCombinedC = $obj->form_data['dimension_2_4_1_8'] + $obj->form_data['dimension_2_4_1_9'];				
				$sumCombinedD = $obj->form_data['dimension_2_4_1_11'];
				if($sumCombinedA == 2 && $sumCombinedB == 8 && $sumCombinedC == 4 && $sumCombinedD == 2)$score_number_dimension_1 = 1;
				if($sumCombinedA == 2 && $sumCombinedB == 7  && $obj->form_data['dimension_2_4_1_8'] == 2 && ($obj->form_data['dimension_2_4_1_9'] == 1 || $obj->form_data['dimension_2_4_1_9'] == 2) && $sumCombinedD == 2)$score_number_dimension_1 = 2;
				if($sumCombinedA == 2 && $sumCombinedB < 7  && $sumCombinedD == 2)$score_number_dimension_1 = 3;
			break;

			# SCORING FOR indicator_table_2_5 #			
			case 'indicator_table_2_5':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				$sumCombinedA = $obj->form_data['dimension_2_5_1_1'];
				$sumCombinedB = $obj->form_data['dimension_2_5_1_2'];
				$sumCombinedC = $obj->form_data['dimension_2_5_1_3'];
				$sumCombinedD = $obj->form_data['dimension_2_5_1_4'];
				if($obj->form_data['dimension_2_5_1_1'] == 2 && $obj->form_data['dimension_2_5_1_5'] == 2 && $obj->form_data['dimension_2_5_1_4'] == 2)$score_number_dimension_1 = 1;
				if($obj->form_data['dimension_2_5_1_1'] == 2 && $obj->form_data['dimension_2_5_1_5'] == 1 && $obj->form_data['dimension_2_5_1_4'] == 2)$score_number_dimension_1 = 2;
				if($obj->form_data['dimension_2_5_1_1'] == 2 && $obj->form_data['dimension_2_5_1_5'] == 1 && $obj->form_data['dimension_2_5_1_4'] == 1)$score_number_dimension_1 = 3;
			break;

			# SCORING FOR indicator_table_2_6 #			
			case 'indicator_table_2_6':
				# DIMENSION 1
			
				$score_number_dimension_1 = 4;
			if(isset($obj->form_data['dimension_2_6_1_6_a'])){
				if($obj->form_data['dimension_2_6_1_1_c'] == 3 && $obj->form_data['dimension_2_6_1_1_a'] == 2 && $obj->form_data['dimension_2_6_1_6_a'] == 2) $score_number_dimension_1 = 3;
				if(($obj->form_data['dimension_2_6_1_1_c'] == 1 || $obj->form_data['dimension_2_6_1_1_c'] == 2) && $obj->form_data['dimension_2_6_1_2'] == 2 && ($obj->form_data['dimension_2_6_1_3_a'] == 1 || $obj->form_data['dimension_2_6_1_3_a'] == 2) && $obj->form_data['dimension_2_6_1_6_a'] == 2)$score_number_dimension_1 = 2;
				if($obj->form_data['dimension_2_6_1_1_c'] == 1 && $obj->form_data['dimension_2_6_1_2'] == 2 && $obj->form_data['dimension_2_6_1_3'] == 2 && $obj->form_data['dimension_2_6_1_6_a'] == 2)$score_number_dimension_1 = 1;				
			}
			break;			
			
			# SCORING FOR indicator_table_3_7 #			
			case 'indicator_table_3_7':
				# DIMENSION 1
				$score_number_dimension_1 = 4;

/*	echo '<pre>';
	print_r($obj->form_data);
	echo '</pre>';
	*/


				$sumCombinedA = $obj->form_data['dimension_3_7_1_1'] + $obj->form_data['dimension_3_7_1_2'];
				$sumCombinedB = $obj->form_data['dimension_3_7_1_3'] + $obj->form_data['dimension_3_7_1_4'] + $obj->form_data['dimension_3_7_1_5'] + $obj->form_data['dimension_3_7_1_6'];
				if($sumCombinedA == 4 && $sumCombinedB == 8 && $obj->form_data['dimension_3_7_1_7'] == 2)$score_number_dimension_1 = 1;
				if($sumCombinedA == 4 && ($sumCombinedB >= 6 && $sumCombinedB <= 7) && $obj->form_data['dimension_3_7_1_7'] == 2)$score_number_dimension_1 = 2;
				if($sumCombinedA != 4 || $sumCombinedB == 6 || $obj->form_data['dimension_3_7_1_7'] == 1)$score_number_dimension_1 = 3;

				# DIMENSION 2
				$score_number_dimension_2 = 4;
				if($obj->form_data['dimension_3_7_2_1'] == 2 && $obj->form_data['dimension_3_7_2_2'] == 2 && $obj->form_data['dimension_3_7_2_4'] == 2  && $obj->form_data['dimension_3_7_2_6'] == 2)$score_number_dimension_2 = 1;
				if($obj->form_data['dimension_3_7_2_1'] == 2 && $obj->form_data['dimension_3_7_2_2'] == 2 && $obj->form_data['dimension_3_7_2_4'] == 1 && $obj->form_data['dimension_3_7_2_5'] == 2  && $obj->form_data['dimension_3_7_2_6'] == 2)$score_number_dimension_2 = 2;
				if($obj->form_data['dimension_3_7_2_1'] == 1 || $obj->form_data['dimension_3_7_2_2'] == 1 || $obj->form_data['dimension_3_7_2_6'] == 1)$score_number_dimension_2 = 3;				

				# DIMENSION 3
				$score_number_dimension_3 = 4;
				$sumCombinedA = $obj->form_data['dimension_3_7_3_1'] + $obj->form_data['dimension_3_7_3_2'] + $obj->form_data['dimension_3_7_3_3'] + $obj->form_data['dimension_3_7_3_4'] + $obj->form_data['dimension_3_7_3_5'] + $obj->form_data['dimension_3_7_3_6'] + $obj->form_data['dimension_3_7_3_7'] + $obj->form_data['dimension_3_7_3_8'] + $obj->form_data['dimension_3_7_3_9'] + $obj->form_data['dimension_3_7_3_10'];				
				if($obj->form_data['dimension_3_7_3_11'] == 2 && $obj->form_data['dimension_3_7_3_12'] == 2 && ($obj->form_data['dimension_3_7_3_13'] == 1 || $obj->form_data['dimension_3_7_3_13'] == 2) && $sumCombinedA >= 14 && $obj->form_data['dimension_3_7_3_15'] == 2)$score_number_dimension_3 = 1;
				if($obj->form_data['dimension_3_7_3_11'] == 1 && $obj->form_data['dimension_3_7_3_12'] == 2 && ($obj->form_data['dimension_3_7_3_13'] == 1 || $obj->form_data['dimension_3_7_3_13'] == 2) && $sumCombinedA >= 14 && $obj->form_data['dimension_3_7_3_15'] == 2)$score_number_dimension_3 = 2;
				if($obj->form_data['dimension_3_7_3_11'] == 3 && $obj->form_data['dimension_3_7_3_12'] == 2 && ($obj->form_data['dimension_3_7_3_13'] == 1 || $obj->form_data['dimension_3_7_3_13'] == 2) && $sumCombinedA >= 14 && $obj->form_data['dimension_3_7_3_15'] == 2)$score_number_dimension_3 = 3;

				# DIMENSION 4
				$score_number_dimension_4 = 4;
				if($obj->form_data['dimension_3_7_4_1'] == 2 && $obj->form_data['dimension_3_7_4_2'] == 2 && $obj->form_data['dimension_3_7_4_3'] == 2 )$score_number_dimension_4 = 1;
				if($obj->form_data['dimension_3_7_4_1'] == 2 && $obj->form_data['dimension_3_7_4_2'] == 2 && $obj->form_data['dimension_3_7_4_3'] == 1 )$score_number_dimension_4 = 2;
				if($obj->form_data['dimension_3_7_4_1'] == 2 && $obj->form_data['dimension_3_7_4_2'] == 1 && $obj->form_data['dimension_3_7_4_3'] == 2 )$score_number_dimension_4 = 3;
				
			break;			

			# SCORING FOR indicator_table_3_8 #			
			case 'indicator_table_3_8':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				if($obj->form_data['dimension_3_8_1_2'] == 1 && $obj->form_data['dimension_3_8_1_4'] == 2)$score_number_dimension_1 = 3;
				if($obj->form_data['dimension_3_8_1_1'] == 2 && $obj->form_data['dimension_3_8_1_1'] == 1 && $obj->form_data['dimension_3_8_1_4'] == 2 && $obj->form_data['dimension_3_8_1_3'] == 2 && $obj->form_data['dimension_3_8_1_5'] == 2 )$score_number_dimension_1 = 2;
				if($obj->form_data['dimension_3_8_1_1'] == 2 && $obj->form_data['dimension_3_8_1_2'] == 2 && $obj->form_data['dimension_3_8_1_4'] == 2 && $obj->form_data['dimension_3_8_1_3'] == 2 && $obj->form_data['dimension_3_8_1_5'] == 2 )$score_number_dimension_1 = 1;
			break;

			# SCORING FOR indicator_table_3_9 #			
			case 'indicator_table_3_9':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				$sumCombinedA = $obj->form_data['dimension_3_9_1_2'] + $obj->form_data['dimension_3_9_1_3'] + $obj->form_data['dimension_3_9_1_4'] + $obj->form_data['dimension_3_9_1_5'] + $obj->form_data['dimension_3_9_1_6'] + $obj->form_data['dimension_3_9_1_7'] + $obj->form_data['dimension_3_9_1_8'];	
				if($sumCombinedA >= 11 && $obj->form_data['dimension_3_9_1_9'] == 2 && $obj->form_data['dimension_3_9_1_11'] == 2)$score_number_dimension_1 = 1;
				if($sumCombinedA >= 10 && $obj->form_data['dimension_3_9_1_9'] == 1 && $obj->form_data['dimension_3_9_1_11'] == 2)$score_number_dimension_1 = 2;
				if($sumCombinedA >= 8 && $obj->form_data['dimension_3_9_1_9'] == 3 && $obj->form_data['dimension_3_9_1_11'] == 2)$score_number_dimension_1 = 3;

				# DIMENSION 2
				$score_number_dimension_2 = 4;
				if($obj->form_data['dimension_3_9_2_1'] == 2 && $obj->form_data['dimension_3_9_2_2'] == 2)$score_number_dimension_2 = 1;
				if($obj->form_data['dimension_3_9_2_1'] == 2 && $obj->form_data['dimension_3_9_2_2'] == 1)$score_number_dimension_2 = 2;
				if($obj->form_data['dimension_3_9_2_1'] == 2 && $obj->form_data['dimension_3_9_2_2'] == 3)$score_number_dimension_2 = 3;
			break;			

			# SCORING FOR indicator_table_4_10 #			
			case 'indicator_table_4_10':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				if($obj->form_data['dimension_4_10_1_1'] == 2 && $obj->form_data['dimension_4_10_1_percentage'] >= 91)$score_number_dimension_1 = 1;
				if($obj->form_data['dimension_4_10_1_1'] == 2 && $obj->form_data['dimension_4_10_1_percentage'] >= 75 && $obj->form_data['dimension_4_10_1_percentage'] <= 90)$score_number_dimension_1 = 2;
				if($obj->form_data['dimension_4_10_1_1'] == 2 && $obj->form_data['dimension_4_10_1_percentage'] >= 50 && $obj->form_data['dimension_4_10_1_percentage'] <= 74)$score_number_dimension_1 = 3;

				# DIMENSION 2
				$score_number_dimension_2 = 4;
				if($obj->form_data['dimension_4_10_2_1'] == 2 && $obj->form_data['dimension_4_10_2_percentage'] >= 91)$score_number_dimension_2 = 1;
				if($obj->form_data['dimension_4_10_2_1'] == 2 && $obj->form_data['dimension_4_10_2_percentage'] >= 75 && $obj->form_data['dimension_4_10_2_percentage'] <= 90)$score_number_dimension_2 = 2;
				if($obj->form_data['dimension_4_10_2_1'] == 2 && $obj->form_data['dimension_4_10_2_percentage'] >= 50 && $obj->form_data['dimension_4_10_2_percentage'] <= 74)$score_number_dimension_2 = 3;

				# DIMENSION 3
				$score_number_dimension_3 = 4;
				if($obj->form_data['dimension_4_10_3_1'] == 2 && $obj->form_data['dimension_4_10_3_percentage'] >= 91)$score_number_dimension_3 = 1;
				if($obj->form_data['dimension_4_10_3_1'] == 2 && $obj->form_data['dimension_4_10_3_percentage'] >= 75 && $obj->form_data['dimension_4_10_3_percentage'] <= 90)$score_number_dimension_3 = 2;
				if($obj->form_data['dimension_4_10_3_1'] == 2 && $obj->form_data['dimension_4_10_3_percentage'] >= 50 && $obj->form_data['dimension_4_10_3_percentage'] <= 74)$score_number_dimension_3 = 3;

				# DIMENSION 4
				$score_number_dimension_4 = 4;
				if($obj->form_data['dimension_4_10_4_1'] == 2 && $obj->form_data['dimension_4_10_4_percentage'] >= 91)$score_number_dimension_4 = 1;
				if($obj->form_data['dimension_4_10_4_1'] == 2 && $obj->form_data['dimension_4_10_4_percentage'] >= 75 && $obj->form_data['dimension_4_10_4_percentage'] <= 90)$score_number_dimension_4 = 2;
				if($obj->form_data['dimension_4_10_4_1'] == 2 && $obj->form_data['dimension_4_10_4_percentage'] >= 50 && $obj->form_data['dimension_4_10_4_percentage'] <= 74)$score_number_dimension_4 = 3;
			break;

			# SCORING FOR indicator_table_4_11 #			
			case 'indicator_table_4_11':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				if(
					$obj->form_data['dimension_4_11_1_percentage'] > 84 && 
					$obj->form_data['dimension_4_11_2_percentage'] > 84 && 
					$obj->form_data['dimension_4_11_3_percentage'] > 84 && 
					$obj->form_data['dimension_4_11_4_percentage'] > 84 &&
					$obj->form_data['dimension_4_11_2_1'] == 1
					)$score_number_dimension_1 = 1;

				if(
					($obj->form_data['dimension_4_11_1_percentage'] >= 70 && $obj->form_data['dimension_4_11_1_percentage'] < 85) &&
					($obj->form_data['dimension_4_11_2_percentage'] >= 70 && $obj->form_data['dimension_4_11_2_percentage'] < 85) &&
					($obj->form_data['dimension_4_11_3_percentage'] >= 70 && $obj->form_data['dimension_4_11_3_percentage'] < 85) &&
					($obj->form_data['dimension_4_11_4_percentage'] >= 70 && $obj->form_data['dimension_4_11_4_percentage'] < 85) &&
					$obj->form_data['dimension_4_11_2_1'] == 2
					)$score_number_dimension_1 = 2;
				if(
					($obj->form_data['dimension_4_11_1_percentage'] >= 50 && $obj->form_data['dimension_4_11_1_percentage'] < 69) &&
					($obj->form_data['dimension_4_11_2_percentage'] >= 50 && $obj->form_data['dimension_4_11_2_percentage'] < 69) &&
					($obj->form_data['dimension_4_11_3_percentage'] >= 50 && $obj->form_data['dimension_4_11_3_percentage'] < 69) &&
					($obj->form_data['dimension_4_11_4_percentage'] >= 50 && $obj->form_data['dimension_4_11_4_percentage'] < 69)
					)$score_number_dimension_1 = 3;

			break;






			# SCORING FOR indicator_table_5_12 #			
			case 'indicator_table_5_12':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				if($obj->form_data['dimension_5_12_1_2_a'] == 2 && $obj->form_data['dimension_5_12_1_2_b'] == 2 && $obj->form_data['dimension_5_12_1_2_c'] == 2 && $obj->form_data['dimension_5_12_1_2_d'] == 2 && $obj->form_data['dimension_5_12_1_2_a_percentage'] >= 76 && $obj->form_data['dimension_5_12_1_2_b_percentage'] >= 76 && $obj->form_data['dimension_5_12_1_2_c_percentage'] >= 76 && $obj->form_data['dimension_5_12_1_2_d_percentage'] >= 76)$score_number_dimension_1 = 1;
				if($obj->form_data['dimension_5_12_1_2_a'] == 2 && $obj->form_data['dimension_5_12_1_2_b'] == 2 && $obj->form_data['dimension_5_12_1_2_c'] == 2 && $obj->form_data['dimension_5_12_1_2_d'] == 2 && 
					$obj->form_data['dimension_5_12_1_2_a_percentage'] >= 50 && $obj->form_data['dimension_5_12_1_2_a_percentage'] <= 75 && 
					$obj->form_data['dimension_5_12_1_2_b_percentage'] >= 50 && $obj->form_data['dimension_5_12_1_2_b_percentage'] <= 75 && 
					$obj->form_data['dimension_5_12_1_2_c_percentage'] >= 50 && $obj->form_data['dimension_5_12_1_2_c_percentage'] <= 75 && 
				$obj->form_data['dimension_5_12_1_2_d_percentage'] >= 50 && $obj->form_data['dimension_5_12_1_2_d_percentage'] <= 75 )$score_number_dimension_1 = 2;
				if(
					($obj->form_data['dimension_5_12_1_2_a_percentage'] >= 1 && $obj->form_data['dimension_5_12_1_2_a_percentage'] <= 49) || 
					($obj->form_data['dimension_5_12_1_2_b_percentage'] >= 1 && $obj->form_data['dimension_5_12_1_2_b_percentage'] <= 49) || 
					($obj->form_data['dimension_5_12_1_2_c_percentage'] >= 1 && $obj->form_data['dimension_5_12_1_2_c_percentage'] <= 49) ||
					($obj->form_data['dimension_5_12_1_2_d_percentage'] >= 1 && $obj->form_data['dimension_5_12_1_2_d_percentage'] <= 49))$score_number_dimension_1 = 3;
			break;						

			# SCORING FOR indicator_table_5_13 #
			case 'indicator_table_5_13':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				if($obj->form_data['dimension_5_13_1_1_a'] == 2 && $obj->form_data['dimension_5_13_1_2_a'] == 2)$score_number_dimension_1 = 3;				
				if($obj->form_data['dimension_5_13_1_1_a'] == 2 && $obj->form_data['dimension_5_13_1_2_a'] == 2 && $obj->form_data['dimension_5_13_1_2_b'] == 2)$score_number_dimension_1 = 2;				
				if($obj->form_data['dimension_5_13_1_1_a'] == 2 && $obj->form_data['dimension_5_13_1_1_b'] == 2 && $obj->form_data['dimension_5_13_1_1_c'] == 2 && $obj->form_data['dimension_5_13_1_2_a'] == 2 && $obj->form_data['dimension_5_13_1_2_b'] == 2)$score_number_dimension_1 = 1;
			break;						

			# SCORING FOR indicator_table_5_14 #
			case 'indicator_table_5_14':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				if($obj->form_data['dimension_5_14_1_1'] == 2 && $obj->form_data['dimension_5_14_1_1_percentage'] >= 91)$score_number_dimension_1 = 1;
				if($obj->form_data['dimension_5_14_1_1'] == 2 && $obj->form_data['dimension_5_14_1_1_percentage'] >= 75 && $obj->form_data['dimension_5_14_1_1_percentage'] <= 90)$score_number_dimension_1 = 2;
				if($obj->form_data['dimension_5_14_1_1'] == 2 && $obj->form_data['dimension_5_14_1_1_percentage'] >= 50 && $obj->form_data['dimension_5_14_1_1_percentage'] <= 74)$score_number_dimension_1 = 3;

				$score_number_dimension_2 = 4;
				if($obj->form_data['dimension_5_14_1_2'] == 2 && $obj->form_data['dimension_5_14_1_2_percentage'] >= 91)$score_number_dimension_2 = 1;
				if($obj->form_data['dimension_5_14_1_2'] == 2 && $obj->form_data['dimension_5_14_1_2_percentage'] >= 75 && $obj->form_data['dimension_5_14_1_2_percentage'] <= 90)$score_number_dimension_2 = 2;
				if($obj->form_data['dimension_5_14_1_2'] == 2 && $obj->form_data['dimension_5_14_1_2_percentage'] >= 50 && $obj->form_data['dimension_5_14_1_2_percentage'] <= 74)$score_number_dimension_2 = 3;
			break;						

			# SCORING FOR indicator_table_5_15 #
			case 'indicator_table_5_15':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				if($obj->form_data['dimension_5_15_2_1'] == 2 && $obj->form_data['dimension_5_15_2_percentage'] < 10)$score_number_dimension_1 = 1;
				if($obj->form_data['dimension_5_15_2_1'] == 2 && $obj->form_data['dimension_5_15_2_percentage'] >= 10 && $obj->form_data['dimension_5_15_2_percentage'] <= 20)$score_number_dimension_1 = 2;
				if($obj->form_data['dimension_5_15_2_1'] == 2 && $obj->form_data['dimension_5_15_2_percentage'] >= 21 && $obj->form_data['dimension_5_15_2_percentage'] <= 40)$score_number_dimension_1 = 3;

				$score_number_dimension_2 = 4;
				if($obj->form_data['dimension_5_15_2_1'] == 2 && $obj->form_data['dimension_5_15_2_percentage'] < 5)$score_number_dimension_2 = 1;
				if($obj->form_data['dimension_5_15_2_1'] == 2 && $obj->form_data['dimension_5_15_2_percentage'] >= 5 && $obj->form_data['dimension_5_15_2_percentage'] <= 10)$score_number_dimension_2 = 2;
				if($obj->form_data['dimension_5_15_2_1'] == 2 && $obj->form_data['dimension_5_15_2_percentage'] >= 11 && $obj->form_data['dimension_5_15_2_percentage'] <= 20)$score_number_dimension_2 = 3;

				$score_number_dimension_3 = 4;
				if($obj->form_data['dimension_5_15_3_1'] == 2 && $obj->form_data['dimension_5_15_3_percentage'] < 25)$score_number_dimension_3 = 1;
				if($obj->form_data['dimension_5_15_3_1'] == 2 && $obj->form_data['dimension_5_15_3_percentage'] >= 25 && $obj->form_data['dimension_5_15_3_percentage'] <= 50)$score_number_dimension_3 = 2;
				if($obj->form_data['dimension_5_15_3_1'] == 2 && $obj->form_data['dimension_5_15_3_percentage'] >= 51 && $obj->form_data['dimension_5_15_3_percentage'] <= 70)$score_number_dimension_3 = 3;

			break;						

			# SCORING FOR indicator_table_6_16 #
			case 'indicator_table_6_16':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				
				if($obj->form_data['dimension_6_16_1_1'] == 2){
					$sumCombinedA = $obj->form_data['dimension_6_16_1_2_a'] + $obj->form_data['dimension_6_16_1_2_b'] + $obj->form_data['dimension_6_16_1_2_c'] + $obj->form_data['dimension_6_16_1_2_d'];
					if($obj->form_data['dimension_6_16_1_1'] == 2 && $sumCombinedA == 8 && $obj->form_data['dimension_6_16_1_5'] == 1 && $obj->form_data['dimension_6_16_1_6'] == 2)$score_number_dimension_1 = 3;
					if($obj->form_data['dimension_6_16_1_1'] == 2 && $sumCombinedA == 8 && $obj->form_data['dimension_6_16_1_3_a'] == 2 && $obj->form_data['dimension_6_16_1_5'] == 2 && $obj->form_data['dimension_6_16_1_6'] == 2 && $obj->form_data['dimension_6_16_1_7'] == 2)$score_number_dimension_1 = 2;
					if($obj->form_data['dimension_6_16_1_1'] == 2 && $sumCombinedA == 8 && $obj->form_data['dimension_6_16_1_3_a'] == 2 && $obj->form_data['dimension_6_16_1_3_b'] == 2 && $obj->form_data['dimension_6_16_1_5'] == 2 && $obj->form_data['dimension_6_16_1_6'] == 2 && $obj->form_data['dimension_6_16_1_7'] == 2)$score_number_dimension_1 = 1;
				}

				# DIMENSION 2
				$score_number_dimension_2 = 4;
				if($obj->form_data['dimension_6_16_2_1'] == 2){  
					if($obj->form_data['dimension_6_16_2_1'] == 2  && $obj->form_data['dimension_6_16_2_2_a'] == 2 && $obj->form_data['dimension_6_16_2_2_c'] == 2 && $obj->form_data['dimension_6_16_2_2_d'] == 2)$score_number_dimension_2 = 3;
					
					if($obj->form_data['dimension_6_16_2_1'] == 2 
						&& $obj->form_data['dimension_6_16_2_2_a'] == 2
						&& $obj->form_data['dimension_6_16_2_2_b'] == 2
						&& $obj->form_data['dimension_6_16_2_2_c'] == 2
						&& $obj->form_data['dimension_6_16_2_2_d'] == 2
					)$score_number_dimension_2 = 2;
	
					if($obj->form_data['dimension_6_16_2_1'] == 2 
						&& $obj->form_data['dimension_6_16_2_2_a'] == 2
						&& $obj->form_data['dimension_6_16_2_2_b'] == 2
						&& $obj->form_data['dimension_6_16_2_2_c'] == 2
						&& $obj->form_data['dimension_6_16_2_2_d'] == 2
						&& $obj->form_data['dimension_6_16_2_2_e'] == 2
						&& $obj->form_data['dimension_6_16_2_2_f'] == 2
						&& $obj->form_data['dimension_6_16_2_2_g'] == 2				
					)$score_number_dimension_2 = 1;
				}
			break;						

			# SCORING FOR indicator_table_6_17 #
			case 'indicator_table_6_17':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				if($obj->form_data['dimension_6_17_1_1'] == 2 && $obj->form_data['dimension_6_17_1_2'] == 2 && $obj->form_data['dimension_6_17_1_2_a'] == 2 && $obj->form_data['dimension_6_17_1_2_a1'] == 2 && $obj->form_data['dimension_6_17_1_3'] == 2)$score_number_dimension_1 = 1;
				if($obj->form_data['dimension_6_17_1_1'] == 2 && $obj->form_data['dimension_6_17_1_2'] == 2 && $obj->form_data['dimension_6_17_1_2_a'] == 2 && $obj->form_data['dimension_6_17_1_2_a1'] == 2 && $obj->form_data['dimension_6_17_1_3'] == 1)$score_number_dimension_1 = 2;
				if($obj->form_data['dimension_6_17_1_1'] == 2 && $obj->form_data['dimension_6_17_1_2'] == 2 && $obj->form_data['dimension_6_17_1_2_a'] == 2 && $obj->form_data['dimension_6_17_1_2_a1'] == 1)$score_number_dimension_1 = 3;	
			break;
			
			# SCORING FOR indicator_table_6_15 #
			case 'indicator_table_6_18':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				if($obj->form_data['dimension_6_18_1_1'] == 2){ 
					if(
						$obj->form_data['dimension_6_18_1_1'] == 2 && 
						$obj->form_data['dimension_6_18_1_2_c'] == 2 && 
						$obj->form_data['dimension_6_18_1_3_a'] == 3
						)$score_number_dimension_1 = 3;
	
					if(
						$obj->form_data['dimension_6_18_1_1'] == 2 && 
						$obj->form_data['dimension_6_18_1_2_c'] == 2 && 
						$obj->form_data['dimension_6_18_1_3_a'] == 2 &&
						$obj->form_data['dimension_6_18_1_4_a'] == 2 &&
						$obj->form_data['dimension_6_18_1_4_b'] == 2 &&
						$obj->form_data['dimension_6_18_1_5_a'] == 2 					
						)$score_number_dimension_1 = 2;
					if(
						$obj->form_data['dimension_6_18_1_1'] == 2 && 
						$obj->form_data['dimension_6_18_1_2_c'] == 2 && 
						($obj->form_data['dimension_6_18_1_2_a'] == 2 ||$obj->form_data['dimension_6_18_1_2_b'] == 2 || $obj->form_data['dimension_6_18_1_2_d'] == 2) &&
						$obj->form_data['dimension_6_18_1_3_a'] == 1 &&
						$obj->form_data['dimension_6_18_1_4_a'] == 2 &&
						$obj->form_data['dimension_6_18_1_4_b'] == 2 &&
						$obj->form_data['dimension_6_18_1_5_a'] == 2 					
						)$score_number_dimension_1 = 1;
				}
			break;

			# SCORING FOR indicator_table_7_19 #
			case 'indicator_table_7_19':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				if(	$obj->form_data['dimension_7_19_1_1_a'] == 2 && $obj->form_data['dimension_7_19_1_1_b'] == 1 &&
					($obj->form_data['dimension_7_19_1_2_a'] == 1 || $obj->form_data['dimension_7_19_1_2_b'] == 1) && 
					$obj->form_data['dimension_7_19_1_3_a'] == 1 &&
					$obj->form_data['dimension_7_19_1_4'] == 2
				)$score_number_dimension_1 = 3;
				if(	$obj->form_data['dimension_7_19_1_1_a'] == 2 && $obj->form_data['dimension_7_19_1_1_b'] == 2 &&
					$obj->form_data['dimension_7_19_1_2_a'] == 2 && $obj->form_data['dimension_7_19_1_2_b'] == 2 && 
					$obj->form_data['dimension_7_19_1_3_a'] == 1 &&
					$obj->form_data['dimension_7_19_1_4'] == 2
				)$score_number_dimension_1 = 2;
				if(	$obj->form_data['dimension_7_19_1_1_a'] == 2 && $obj->form_data['dimension_7_19_1_1_b'] == 2 &&
					$obj->form_data['dimension_7_19_1_2_a'] == 2 && $obj->form_data['dimension_7_19_1_2_b'] == 2 && 
					$obj->form_data['dimension_7_19_1_3_a'] == 2 &&
					$obj->form_data['dimension_7_19_1_4'] == 2
				)$score_number_dimension_1 = 1;

				# DIMENSION 2
				$score_number_dimension_2 = 4;
				if($obj->form_data['dimension_7_19_2_1_a'] == 3 && $obj->form_data['dimension_7_19_2_b'] == 2)$score_number_dimension_2 = 3;
				if($obj->form_data['dimension_7_19_2_1_a'] == 2 && $obj->form_data['dimension_7_19_2_b'] == 2)$score_number_dimension_2 = 2;
				if($obj->form_data['dimension_7_19_2_1_a'] == 1 && $obj->form_data['dimension_7_19_2_b'] == 2)$score_number_dimension_2 = 1;


				# DIMENSION 3
				$score_number_dimension_3 = 4;
				
				if($obj->form_data['dimension_7_19_3_2'] == 2){
					if($obj->form_data['dimension_7_19_3_1'] == 2 && $obj->form_data['dimension_7_19_3_2_c'] == 2)$score_number_dimension_3 = 3;
					if(
						$obj->form_data['dimension_7_19_3_1'] == 2 &&
						$obj->form_data['dimension_7_19_3_2_c'] == 2 && 
						$obj->form_data['dimension_7_19_3_2_b'] == 2
					)$score_number_dimension_3 = 2;				
	
					if(
						$obj->form_data['dimension_7_19_3_1'] == 2 &&
						$obj->form_data['dimension_7_19_3_2_a'] == 2 && 
						$obj->form_data['dimension_7_19_3_2_b'] == 2 && 					
						$obj->form_data['dimension_7_19_3_2_c'] == 2
					)$score_number_dimension_3 = 1;				
				}
			break;

			# SCORING FOR indicator_table_7_20 #
			case 'indicator_table_7_20':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				if($obj->form_data['dimension_7_20_1_1'] == 2 && $obj->form_data['dimension_7_20_1_2_percentage'] >= 90)$score_number_dimension_1 = 1;
				if($obj->form_data['dimension_7_20_1_1'] == 2 && $obj->form_data['dimension_7_20_1_3_percentage'] >= 90)$score_number_dimension_1 = 2;
				if($obj->form_data['dimension_7_20_1_1'] == 2 && $obj->form_data['dimension_7_20_1_4_percentage'] >= 90)$score_number_dimension_1 = 3;

			break;
			# SCORING FOR indicator_table_7_21 #
			case 'indicator_table_7_21':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				if($obj->form_data['dimension_7_21_1_1'] == 2){
					if($obj->form_data['dimension_7_21_1_1'] == 2 && $obj->form_data['dimension_7_21_1_1_a'] == 2 && $obj->form_data['dimension_7_21_1_1_b'] == 1)$score_number_dimension_1 = 1;
					if($obj->form_data['dimension_7_21_1_1'] == 1 && $obj->form_data['dimension_7_21_1_1_a'] == 2 && $obj->form_data['dimension_7_21_1_1_b'] == 1)$score_number_dimension_1 = 2;
					if($obj->form_data['dimension_7_21_1_1'] == 2 && $obj->form_data['dimension_7_21_1_1_a'] == 2 && $obj->form_data['dimension_7_21_1_1_b'] == 2)$score_number_dimension_1 = 3;										
				}

			break;

			# SCORING FOR indicator_table_8_22 #
			case 'indicator_table_8_22':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				if(
					$obj->form_data['dimension_8_22_1_3'] == 2 && 
					$obj->form_data['dimension_8_22_1_5'] == 2)
				$score_number_dimension_1 = 3;

				if(
					$obj->form_data['dimension_8_22_1_3'] == 2 && 
					$obj->form_data['dimension_8_22_1_5'] == 2 && 
					$obj->form_data['dimension_8_22_1_6'] == 2)
				$score_number_dimension_1 = 2;

				if(
					$obj->form_data['dimension_8_22_1_3'] == 2 && 
					$obj->form_data['dimension_8_22_1_5'] == 2 && 
					$obj->form_data['dimension_8_22_1_6'] == 2 && 
					$obj->form_data['dimension_8_22_1_7'] == 2 && 
					$obj->form_data['dimension_8_22_1_8'] == 2)
				$score_number_dimension_1 = 1;

			break;

			# SCORING FOR indicator_table_8_23 #
			case 'indicator_table_8_23':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
					if(
						$obj->form_data['dimension_8_23_1_1'] == 2 && 
						$obj->form_data['dimension_8_23_1_2'] == 2 && 					
						$obj->form_data['dimension_8_23_1_3'] == 3)
					$score_number_dimension_1 = 3;

				if($obj->form_data['dimension_8_23_1_6'] == 2){
					if(
						$obj->form_data['dimension_8_23_1_1'] == 2 && 
						$obj->form_data['dimension_8_23_1_2'] == 2 && 					
						$obj->form_data['dimension_8_23_1_3'] == 2 && 					
						$obj->form_data['dimension_8_23_1_6'] == 2 && 										
						$obj->form_data['dimension_8_23_1_8'] == 2 || $obj->form_data['dimension_8_23_1_8'] == 3)
					$score_number_dimension_1 = 2;
	
					if(
						$obj->form_data['dimension_8_23_1_1'] == 2 && 
						$obj->form_data['dimension_8_23_1_2'] == 2 && 					
						$obj->form_data['dimension_8_23_1_3'] == 1 &&
						$obj->form_data['dimension_8_23_1_6'] == 2 && 															 					
						$obj->form_data['dimension_8_23_1_8'] == 3)
					$score_number_dimension_1 = 1;
				}
			break;

			# SCORING FOR indicator_table_8_24 #
			case 'indicator_table_8_24':
				# DIMENSION 1
				$score_number_dimension_1 = 4;

				if(
					$obj->form_data['dimension_8_24_1_2'] == 2)
				$score_number_dimension_1 = 3;

				if(
					$obj->form_data['dimension_8_24_1_2'] == 2 && 
					$obj->form_data['dimension_8_24_1_7'] == 2 && 
					$obj->form_data['dimension_8_24_1_6'] == 2)
				$score_number_dimension_1 = 2;

				if(
					$obj->form_data['dimension_8_24_1_2'] == 2 && 
					$obj->form_data['dimension_8_24_1_7'] == 2 && 
					$obj->form_data['dimension_8_24_1_6'] == 2 && 
					$obj->form_data['dimension_8_24_1_3'] == 2 && 
					$obj->form_data['dimension_8_24_1_5'] == 2)
				$score_number_dimension_1 = 1;

				# DIMENSION 2
				$score_number_dimension_2 = 4;

				if($obj->form_data['dimension_8_24_2_3_percentage'] >= 90)$score_number_dimension_2 = 1;
				if($obj->form_data['dimension_8_24_2_3_percentage'] >= 80 && $obj->form_data['dimension_8_24_2_3_percentage'] <= 89)$score_number_dimension_2 = 2;					
				if($obj->form_data['dimension_8_24_2_3_percentage'] >= 70 && $obj->form_data['dimension_8_24_2_3_percentage'] <= 79)$score_number_dimension_2 = 3;					

			break;

			# SCORING FOR indicator_table_9_25 #
			case 'indicator_table_9_25':
				# DIMENSION 1
				$score_number_dimension_1 = 4;

				if($obj->form_data['dimension_9_25_1_4'] != 0 && $obj->form_data['dimension_9_25_1_6'] == 2){
					if(
						$obj->form_data['dimension_9_25_1_1'] == 2 && 
						($obj->form_data['dimension_9_25_1_1_a'] == 2 || 
						$obj->form_data['dimension_9_25_1_1_b'] == 2 || 
						$obj->form_data['dimension_9_25_1_1_c'] == 2) && 
						$obj->form_data['dimension_9_25_1_3'] == 2 && 					
						$obj->form_data['dimension_9_25_1_3_a'] == 2 && 					
						$obj->form_data['dimension_9_25_1_3_b'] == 2 && 					
						$obj->form_data['dimension_9_25_1_3_c'] == 2 && 
						$obj->form_data['dimension_9_25_1_3_d'] == 2 &&
						$obj->form_data['dimension_9_25_1_3_e'] == 1 &&
						$obj->form_data['dimension_9_25_1_4_b'] == 1 &&
						($obj->form_data['dimension_9_25_1_6_a'] == 1 ||
						$obj->form_data['dimension_9_25_1_6_a'] == 2) &&
						$obj->form_data['dimension_9_25_1_7'] == 2 &&
						$obj->form_data['dimension_9_25_1_8'] == 2 &&
						$obj->form_data['dimension_9_25_1_8_a'] == 2 &&
						$obj->form_data['dimension_9_25_1_8_b'] == 2 &&
						$obj->form_data['dimension_9_25_1_8_c'] == 2 &&
						$obj->form_data['dimension_9_25_1_8_d'] == 2 &&																		
						$obj->form_data['dimension_9_25_1_8_e'] == 2)
					$score_number_dimension_1 = 2;					
if(
						$obj->form_data['dimension_9_25_1_1'] == 2 && 
						$obj->form_data['dimension_9_25_1_1_c'] == 2 && 
						$obj->form_data['dimension_9_25_1_3'] == 2 && 					
						$obj->form_data['dimension_9_25_1_3_a'] == 2 && 					
						$obj->form_data['dimension_9_25_1_3_b'] == 2 && 					
						$obj->form_data['dimension_9_25_1_3_c'] == 2 && 
						$obj->form_data['dimension_9_25_1_3_d'] == 2 &&
						$obj->form_data['dimension_9_25_1_3_e'] == 1 &&
						$obj->form_data['dimension_9_25_1_4_b'] == 1 &&
						$obj->form_data['dimension_9_25_1_6_a'] == 1 &&
						$obj->form_data['dimension_9_25_1_7'] == 2 &&
						$obj->form_data['dimension_9_25_1_8'] == 2 &&
						$obj->form_data['dimension_9_25_1_8_a'] == 2 &&
						$obj->form_data['dimension_9_25_1_8_b'] == 2 &&
						$obj->form_data['dimension_9_25_1_8_c'] == 2 &&
						$obj->form_data['dimension_9_25_1_8_d'] == 2 &&																		
						$obj->form_data['dimension_9_25_1_8_e'] == 2)
					$score_number_dimension_1 = 1;					
				}
				if($obj->form_data['dimension_9_25_1_4'] != 0){
					if(
						$obj->form_data['dimension_9_25_1_1'] == 2 && 
						$obj->form_data['dimension_9_25_1_1_a'] == 1 && 
						$obj->form_data['dimension_9_25_1_1_b'] == 1 && 
						$obj->form_data['dimension_9_25_1_1_c'] == 1 && 
						$obj->form_data['dimension_9_25_1_3'] == 2 && 					
						$obj->form_data['dimension_9_25_1_3_a'] == 2 && 					
						$obj->form_data['dimension_9_25_1_3_d'] == 2 &&
						$obj->form_data['dimension_9_25_1_4_b'] == 2 &&
						$obj->form_data['dimension_9_25_1_8'] == 2 &&
						$obj->form_data['dimension_9_25_1_8_a'] == 2 &&
						$obj->form_data['dimension_9_25_1_8_b'] == 2)
					$score_number_dimension_1 = 3;
		}
				# DIMENSION 2
				$score_number_dimension_2 = 4;
				if($obj->form_data['dimension_9_25_2_1'] == 2 &&
				$obj->form_data['dimension_9_25_2_1_a'] == 1 &&
				$obj->form_data['dimension_9_25_2_1_b'] == 1 &&
				$obj->form_data['dimension_9_25_2_2'] == 2 &&
				$obj->form_data['dimension_9_25_2_4'] == 2)
				$score_number_dimension_2 = 3;

				if($obj->form_data['dimension_9_25_2_1'] == 2 &&
				($obj->form_data['dimension_9_25_2_1_a'] == 2 ||
				$obj->form_data['dimension_9_25_2_1_b'] == 2) &&
				$obj->form_data['dimension_9_25_2_2'] == 2 &&
				$obj->form_data['dimension_9_25_2_4'] == 2 &&
				$obj->form_data['dimension_9_25_2_5'] == 2)
				$score_number_dimension_2 = 2;

				if($obj->form_data['dimension_9_25_2_1'] == 2 &&
				($obj->form_data['dimension_9_25_2_1_a'] == 2 ||
				$obj->form_data['dimension_9_25_2_1_b'] == 2) &&
				$obj->form_data['dimension_9_25_2_2'] == 2 &&
				$obj->form_data['dimension_9_25_2_4'] == 2 &&
				$obj->form_data['dimension_9_25_2_5'] == 2 &&
				$obj->form_data['dimension_9_25_2_6'] == 2 &&
				$obj->form_data['dimension_9_25_2_6_a'] == 2)
				$score_number_dimension_2 = 1;

			break;

			# SCORING FOR indicator_table_9_26 #
			case 'indicator_table_9_26':
				# DIMENSION 1
				$score_number_dimension_1 = 4;

				if(
					$obj->form_data['dimension_9_26_1_1'] == 2 && 
					$obj->form_data['dimension_9_26_1_2'] == 2 && 
					$obj->form_data['dimension_9_26_1_4'] == 2)
				$score_number_dimension_1 = 3;

				if(
					$obj->form_data['dimension_9_26_1_1'] == 2 && 
					$obj->form_data['dimension_9_26_1_2'] == 2 && 
					$obj->form_data['dimension_9_26_1_3'] == 2 && 
					$obj->form_data['dimension_9_26_1_4'] == 2)
				$score_number_dimension_1 = 2;

				if(
					$obj->form_data['dimension_9_26_1_1'] == 2 && 
					$obj->form_data['dimension_9_26_1_2'] == 2 && 
					$obj->form_data['dimension_9_26_1_3'] == 2 && 
					$obj->form_data['dimension_9_26_1_4'] == 2 && 
					$obj->form_data['dimension_9_26_1_5'] == 2)
				$score_number_dimension_1 = 1;

				# DIMENSION 2
				$score_number_dimension_2 = 4;

				if($obj->form_data['dimension_9_26_2_1'] == 2){

					if(
						$obj->form_data['dimension_9_26_2_1_a'] == 1 && 
						$obj->form_data['dimension_9_26_2_1_b'] == 2 && 										
						$obj->form_data['dimension_9_26_2_2'] == 2)
					$score_number_dimension_2 = 3;


					if(
						$obj->form_data['dimension_9_26_2_1_a'] == 2 && 
						$obj->form_data['dimension_9_26_2_1_b'] == 2 && 										
						$obj->form_data['dimension_9_26_2_2'] == 2)
					$score_number_dimension_2 = 2;

					if(
						$obj->form_data['dimension_9_26_2_1_a'] == 2 && 
						$obj->form_data['dimension_9_26_2_3'] == 2 &&
						$obj->form_data['dimension_9_26_2_1_b'] == 2 && 										
						$obj->form_data['dimension_9_26_2_2'] == 2)
					$score_number_dimension_2 = 1;
				}
			break;

		# SCORING FOR indicator_table_9_27 #
			case 'indicator_table_9_27':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				if($obj->form_data['dimension_9_27_1_1'] == 2){

					if(
						($obj->form_data['dimension_9_27_1_1_a'] == 2 || $obj->form_data['dimension_9_27_1_1_b'] == 2 || $obj->form_data['dimension_9_27_1_1_c'] == 2) && 
						($obj->form_data['dimension_9_27_1_3'] == 1 || $obj->form_data['dimension_9_27_1_3'] == 2 || $obj->form_data['dimension_9_27_1_3'] == 3))
					$score_number_dimension_1 = 3;

					if(
						$obj->form_data['dimension_9_27_1_1_a'] == 2 && 
						($obj->form_data['dimension_9_27_1_3'] == 1 || $obj->form_data['dimension_9_27_1_3'] == 2) &&
						($obj->form_data['dimension_9_27_1_4'] == 1 || $obj->form_data['dimension_9_27_1_4'] == 2) && 
						$obj->form_data['dimension_9_27_1_5'] == 2)
					$score_number_dimension_1 = 2;

					if(
						$obj->form_data['dimension_9_27_1_1_a'] == 2 && 
						$obj->form_data['dimension_9_27_1_3'] == 1 && 					
						$obj->form_data['dimension_9_27_1_4'] == 1 && 					
						$obj->form_data['dimension_9_27_1_5'] == 2)
					$score_number_dimension_1 = 1;
				}
			break;			


		# SCORING FOR indicator_table_9_28 #
			case 'indicator_table_9_28':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				if($obj->form_data['dimension_9_28_1_1'] == 2){
					if(	$obj->form_data['dimension_9_28_1_2'] == 2){
						if(	$obj->form_data['dimension_9_28_1_3'] == 1 || $obj->form_data['dimension_9_28_1_3'] == 2 || $obj->form_data['dimension_9_28_1_3'] == 3)
							$score_number_dimension_1 = 3;
	
						if($obj->form_data['dimension_9_28_1_3'] == 1 || $obj->form_data['dimension_9_28_1_3'] == 2)
							$score_number_dimension_1 = 2;
	
						if($obj->form_data['dimension_9_28_1_3'] == 1)
						$score_number_dimension_1 = 1;
					}
				}
				$score_number_dimension_2 = 4;
				if($obj->form_data['dimension_9_28_2_1'] == 2){

					if(
						$obj->form_data['dimension_9_28_2_2'] == 2 &&
						$obj->form_data['dimension_9_28_2_3'] == 2)
					$score_number_dimension_2 = 3;

					if(
						$obj->form_data['dimension_9_28_2_2'] == 1 &&
						$obj->form_data['dimension_9_28_2_3'] == 2)
					$score_number_dimension_2 = 2;

					if(
						$obj->form_data['dimension_9_28_2_2'] == 1 &&
						$obj->form_data['dimension_9_28_2_3'] == 1)
					$score_number_dimension_2 = 1;
				}
				
			break;			



		}
		_score_indicators($obj->session->userdata('indicator_id'),$score_number_dimension_1,$score_number_dimension_2,$score_number_dimension_3,$score_number_dimension_4,$score_number_dimension_5);
		return true;
	}else{
		return false;
	}
}
