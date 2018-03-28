<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	$this->form_data['scoreNumber'] = 1;
//echo '<pre>';
//print_r($get_record_table);
/*
	echo '<h4><strong>POA '.$get_record_table[0]['poa_number'].': '.$get_record_table[0]['poa'].'</strong></h4>';
	echo '<p>'.$get_record_table[0]['assessment_text'].'</p>';
	$arrDimensions = _get_record_by_id_score_md($this->session->userdata('pi_id'),'','db_b');
	$fieldsDimension_1 = array('dimension_1_1_1',
						 		'dimension_1_1_2',
						 		'dimension_1_1_3',
						 		'dimension_1_1_4',
						 		'dimension_1_1_5',
						 		'dimension_1_1_6',
						 		'dimension_1_1_7');
	$resultDimension_1 = array('Table'=>$get_record_table[0]['questionTable'],	_get_record_by_id_score_table($this->session->userdata('mission_id'), 'db_b', $get_record_table[0]['questionTable'], $fieldsDimension_1));
	$scoreDimension_1 = 4;	

	if(
	$resultDimension_1[0]['dimension_1_1_1'] == 2 && 
	$resultDimension_1[0]['dimension_1_1_2'] == 2 &&
	$resultDimension_1[0]['dimension_1_1_3'] == 2 &&
	$resultDimension_1[0]['dimension_1_1_4'] == 2 &&
	$resultDimension_1[0]['dimension_1_1_5'] == 2 &&
	$resultDimension_1[0]['dimension_1_1_6'] == 2 &&
	$resultDimension_1[0]['dimension_1_1_7'] == 2 
	) $scoreDimension_1 = 1;

	if(
	$resultDimension_1[0]['dimension_1_1_1'] == 2 && 
	$resultDimension_1[0]['dimension_1_1_2'] == 2 &&
	$resultDimension_1[0]['dimension_1_1_3'] == 2 &&
	$resultDimension_1[0]['dimension_1_1_4'] == 2 &&
	$resultDimension_1[0]['dimension_1_1_5'] == 1 &&
	$resultDimension_1[0]['dimension_1_1_6'] == 2 &&
	$resultDimension_1[0]['dimension_1_1_7'] == 2 
	) $scoreDimension_1 = 2;

	if(
	$resultDimension_1[0]['dimension_1_1_1'] == 2 && 
	$resultDimension_1[0]['dimension_1_1_2'] == 2 &&
	$resultDimension_1[0]['dimension_1_1_3'] == 2 &&
	$resultDimension_1[0]['dimension_1_1_4'] == 1 &&
	$resultDimension_1[0]['dimension_1_1_5'] == 1 &&
	$resultDimension_1[0]['dimension_1_1_6'] == 2 &&
	$resultDimension_1[0]['dimension_1_1_7'] == 1 
	) $scoreDimension_1 = 3;

	$methodDimension_1 = _get_record_by_id_score_method($arrDimensions[0]['id'], $scoreDimension_1, 'db_b', 'MeasurementDimensionsScoring', $fields = array('criteria'));
*/	
