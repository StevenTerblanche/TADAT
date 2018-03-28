<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

//echo '<pre>';
//print_r($get_record_table);

	echo '<h4><strong>POA '.$get_record_table[0]['poa_number'].': '.$get_record_table[0]['poa'].'</strong></h4>';
	echo '<p>'.$get_record_table[0]['assessment_text'].'</p>';
	$arrDimensions = _get_record_by_id_score_md($this->session->userdata('pi_id'),'','cloud_questions');

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
		echo '<tr class="va">';
			echo '<td class="va">P1.1.1 '.$arrDimensions[0]['dimensionName'].'</td>';
			echo '<td class="va center">'.$arrDimensions[0]['methodType'].'</td>';
			echo '<td class="va center">'._check_score_type($scoreDimension_1).'</td>';
			echo '<td rowspan="4" class="va center">Measurement Dimensions</td>';
		echo '</tr>';
		echo '<tr class="va">';
			echo '<td class="va" colspan="3">'.$methodDimension_1['criteria'].'</td>';
		echo '</tr>';
		echo '<tr class="va">';
			echo '<td class="va">P1.1.2 '.$arrDimensions[1]['dimensionName'].'</td>';
			echo '<td class="va center">'.$arrDimensions[1]['methodType'].'</td>';
			echo '<td class="va center">'._check_score_type($scoreDimension_2).'</td>';
		echo '</tr>';
		echo '<tr class="va">';
			echo '<td class="va" colspan="3">'.$methodDimension_2['criteria'].'</td>';
		echo '</tr>';
		
	echo '</tbody>';
	echo '</table>';
