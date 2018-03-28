			# SCORING FOR indicator_table_9_23 #
			case 'indicator_table_9_23':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				if($obj->form_data['dimension_9_23_1_1'] == 2 && $obj->form_data['dimension_9_23_1_2'] == 2 && $obj->form_data['dimension_9_23_1_3'] == 2 && $obj->form_data['dimension_9_23_1_4'] == 2 && $obj->form_data['dimension_9_23_1_5'] == 2)$score_number_dimension_1 = 1;
				if($obj->form_data['dimension_9_23_1_1'] == 2 && $obj->form_data['dimension_9_23_1_2'] == 2 && $obj->form_data['dimension_9_23_1_3'] == 2 && $obj->form_data['dimension_9_23_1_4'] == 2  && $obj->form_data['dimension_9_23_1_5'] != 2)$score_number_dimension_1 = 2;
				if($obj->form_data['dimension_9_23_1_1'] == 2 && $obj->form_data['dimension_9_23_1_2'] != 2 && $obj->form_data['dimension_9_23_1_3'] != 2 && $obj->form_data['dimension_9_23_1_4'] != 2  && $obj->form_data['dimension_9_23_1_5'] != 2)$score_number_dimension_1 = 3;

				# DIMENSION 2
				$score_number_dimension_2 = 4;
				if($obj->form_data['dimension_9_23_2_1'] == 2 && $obj->form_data['dimension_9_23_2_5'] == 2 && $obj->form_data['dimension_9_23_2_3'] == 2 && $obj->form_data['dimension_9_23_2_4'] == 2)$score_number_dimension_2 = 1;
				if($obj->form_data['dimension_9_23_2_1'] == 2 && $obj->form_data['dimension_9_23_2_5'] == 1 && $obj->form_data['dimension_9_23_2_3'] == 2 && $obj->form_data['dimension_9_23_2_4'] != 2)$score_number_dimension_2 = 2;
				if($obj->form_data['dimension_9_23_2_1'] == 2 && $obj->form_data['dimension_9_23_2_2'] != 2 && $obj->form_data['dimension_9_23_2_3'] != 2 && $obj->form_data['dimension_9_23_2_4'] != 2)$score_number_dimension_2 = 2;

			break;			
			# SCORING FOR indicator_table_9_24 #
			case 'indicator_table_9_24':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				$sumCombinedA = $obj->form_data['dimension_9_24_1_2_1'] + $obj->form_data['dimension_9_24_1_2_2'] + $obj->form_data['dimension_9_24_1_2_3'] + $obj->form_data['dimension_9_24_1_2_4'] + $obj->form_data['dimension_9_24_1_2_5'] + $obj->form_data['dimension_9_24_1_2_6'] + $obj->form_data['dimension_9_24_1_2_7'] + $obj->form_data['dimension_9_24_1_2_8'];
				$sumCombinedB = $obj->form_data['dimension_9_24_1_3_1'] + $obj->form_data['dimension_9_24_1_3_2'] + $obj->form_data['dimension_9_24_1_3_3'] + $obj->form_data['dimension_9_24_1_3_4'] + $obj->form_data['dimension_9_24_1_3_5'] + $obj->form_data['dimension_9_24_1_3_6'];				
				if($obj->form_data['dimension_9_24_1_1'] == 2 && $sumCombinedA >= 16 && $sumCombinedB == 12 && $obj->form_data['dimension_9_24_1_4'] == 2)$score_number_dimension_1 = 1;
				if($obj->form_data['dimension_9_24_1_1'] == 2 && ($sumCombinedA >= 13 && $sumCombinedA <= 14) && $sumCombinedB == 12 && $obj->form_data['dimension_9_24_1_4'] <= 2)$score_number_dimension_1 = 2;				
				if($obj->form_data['dimension_9_24_1_1'] == 2 && ($sumCombinedA >= 10 && $sumCombinedA <= 12) && $sumCombinedB == 12 && $obj->form_data['dimension_9_24_1_4'] == 3)$score_number_dimension_1 = 3;				

				# DIMENSION 2
				$score_number_dimension_2 = 4;
				if($obj->form_data['dimension_9_24_2_1'] == 2 && 
				($obj->form_data['dimension_9_24_2_2_1'] == 2 || $obj->form_data['dimension_9_24_2_2_2'] == 2 || $obj->form_data['dimension_9_24_2_2_3'] == 2) && 
				$obj->form_data['dimension_9_24_2_3_1'] == 2 && $obj->form_data['dimension_9_24_2_3_2'] == 2 && $obj->form_data['dimension_9_24_2_3_3'] == 2 &&
				$obj->form_data['dimension_9_24_2_4_1'] == 2 && $obj->form_data['dimension_9_24_2_4_2'] == 2 && $obj->form_data['dimension_9_24_2_4_3'] == 2 &&	
				$obj->form_data['dimension_9_24_2_8'] == 2)$score_number_dimension_2 = 1;

				if($obj->form_data['dimension_9_24_2_1'] == 2 && 
				($obj->form_data['dimension_9_24_2_2_1'] == 2 || $obj->form_data['dimension_9_24_2_2_2'] == 2 || $obj->form_data['dimension_9_24_2_2_3'] == 2) && 
				$obj->form_data['dimension_9_24_2_3_1'] == 2 && $obj->form_data['dimension_9_24_2_3_2'] == 2 && $obj->form_data['dimension_9_24_2_3_3'] == 2 &&
				$obj->form_data['dimension_9_24_2_4_2'] == 2 && $obj->form_data['dimension_9_24_2_4_3'] == 2 &&	
				$obj->form_data['dimension_9_24_2_8'] != 2)$score_number_dimension_2 = 2;
				if($obj->form_data['dimension_9_24_2_1'] == 2 && 
				$obj->form_data['dimension_9_24_2_3_1'] == 2 && $obj->form_data['dimension_9_24_2_3_3'] == 2 &&
				$obj->form_data['dimension_9_24_2_4_2'] == 2 && $obj->form_data['dimension_9_24_2_4_3'] == 2 &&	
				$obj->form_data['dimension_9_24_2_8'] != 2)$score_number_dimension_2 = 3;

				# DIMENSION 3
				$score_number_dimension_3 = 4;
				$sumCombinedA = $obj->form_data['dimension_9_24_3_3'] + $obj->form_data['dimension_9_24_3_4'] + $obj->form_data['dimension_9_24_3_5'] + $obj->form_data['dimension_9_24_3_6'] + $obj->form_data['dimension_9_24_3_7'];
				if($obj->form_data['dimension_9_24_3_1'] == 2 && $obj->form_data['dimension_9_24_3_2'] == 2 && $sumCombinedA == 10)$score_number_dimension_3 = 1;
				if($obj->form_data['dimension_9_24_3_1'] == 2 && $obj->form_data['dimension_9_24_3_2'] == 2  && ($sumCombinedA >= 8 && $sumCombinedA < 10))$score_number_dimension_3 = 2;
				if($obj->form_data['dimension_9_24_3_1'] == 2 && $obj->form_data['dimension_9_24_3_2'] == 1  && $sumCombinedA >= 7)$score_number_dimension_3 = 3;
			break;
			
			# SCORING FOR indicator_table_9_25 #
			case 'indicator_table_9_25':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				if($obj->form_data['dimension_9_25_1_1'] == 2 && $obj->form_data['dimension_9_25_1_2'] == 1)$score_number_dimension_1 = 1;
				if($obj->form_data['dimension_9_25_1_1'] == 2 && $obj->form_data['dimension_9_25_1_2'] == 2)$score_number_dimension_1 = 2;
				if($obj->form_data['dimension_9_25_1_1'] == 2 && $obj->form_data['dimension_9_25_1_2'] == 3)$score_number_dimension_1 = 3;
			break;
			# SCORING FOR indicator_table_9_26 #
			case 'indicator_table_9_26':
				# DIMENSION 1
				$score_number_dimension_1 = 4;
				if($obj->form_data['dimension_9_26_1_1'] == 2 && $obj->form_data['dimension_9_26_1_2'] == 1 && $obj->form_data['dimension_9_26_1_3'] == 2 && $obj->form_data['dimension_9_26_1_4'] == 2)$score_number_dimension_1 = 1;
				if($obj->form_data['dimension_9_26_1_1'] == 2 && $obj->form_data['dimension_9_26_1_2'] == 2 && $obj->form_data['dimension_9_26_1_3'] == 2)$score_number_dimension_1 = 2;
				if($obj->form_data['dimension_9_26_1_1'] == 2 && $obj->form_data['dimension_9_26_1_2'] == 3 && $obj->form_data['dimension_9_26_1_3'] == 2)$score_number_dimension_1 = 3;

				# DIMENSION 2
				$score_number_dimension_2 = 4;
				if($obj->form_data['dimension_9_26_2_1_1'] == 2 || $obj->form_data['dimension_9_26_2_1_2'] == 2 || $obj->form_data['dimension_9_26_2_1_3'] == 2)$score_number_dimension_2 = 3;
				if($obj->form_data['dimension_9_26_2_1_1'] == 2 && ($obj->form_data['dimension_9_26_2_1_2'] == 2 || $obj->form_data['dimension_9_26_2_1_3'] == 2))$score_number_dimension_2 = 2;
				if($obj->form_data['dimension_9_26_2_1_1'] == 2 && $obj->form_data['dimension_9_26_2_1_2'] == 2 && $obj->form_data['dimension_9_26_2_1_3'] == 2)$score_number_dimension_2 = 1;
			break;
