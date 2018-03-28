<?php defined('BASEPATH') OR exit('No direct script access allowed');

	/* 
		STATUS = COMPLETE!
		LANGUAGE = DONE!
		NORMALISE = DONE!
		COMMENTS = DONE!
		echo get_instance()->db->last_query();						
	 */
	
	# Use 'real-world' table names as defined in application/config/tables.php
	# _get_fields_by_id returns Single Record with value/s and seperator/s as specified by ID


	function _buildSo($userID  = null){
		/*
		echo '<pre>';
		print_r($this->user_assignments);
		[fkidAuthority] => 6
            [fkidMission] => 3
            [P1-1] => 1
            [P1-2] => 1
            [P2-3] => 0
            [P2-4] => 0
            [P2-5] => 0
            [P2-6] => 0
            [P3-7] => 0
            [P3-8] => 0
            [P3-9] => 0
            [P4-10] => 0
            [P4-11] => 0
            [P5-12] => 0
            [P5-13] => 0
            [P5-14] => 0
            [P5-15] => 0
            [P6-16] => 0
            [P6-17] => 0
            [P6-18] => 0
            [P7-19] => 0
            [P7-20] => 0
            [P7-21] => 0
            [P8-22] => 0
            [P8-23] => 0
            [P8-24] => 0
            [P9-25] => 0
            [P9-26] => 0
            [P9-27] => 0
            [P9-28] => 0
		*/

		if($this->user_assignments){
			$arrObject = array();
			$arrAssignedPoa = array();
			foreach($this->user_assignments as $key => $poa){
				for ($x = 1; $x <= 9; $x++){
				   if($poa['poa_'.$x] == 1){
					   $arrAssignedPoa[] = _get_poa_object_by_id($x);
					}
			}
				$arrObject[] = array('so'=>_get_super_object_by_id($poa['fkidAuthority'],$poa['fkidMission']),'poa'=>$arrAssignedPoa);
				$arrAssignedPoa = '';
			}
		}
		if(!empty($arrObject)){
			return $arrObject;
		}else{
			return false;				
		}

		
/*
		if($this->user_assignments){
			$arrObject = array();
			$arrAssignedPoa = array();
			foreach($this->user_assignments as $key => $poa){
				for ($x = 1; $x <= 9; $x++) {
				   if($poa['poa_'.$x] == 1){
					   $arrAssignedPoa[] = _get_poa_object_by_id($x);
					}
			}
				$arrObject[] = array('so'=>_get_super_object_by_id($poa['fkidAuthority'],$poa['fkidMission']),'poa'=>$arrAssignedPoa);
				$arrAssignedPoa = '';
			}
		}
		if(!empty($arrObject)){
			return $arrObject;
		}else{
			return false;				
		}
		*/
	}	





	# Usage: _get_field_by_id('TableName', 'Field to Query' ,'Value to Query[id]', 'Array of Fields to Return (can enclose fields with special characters excluding _ and -)', 'Fields Seperator')
	# preg_replace on $delimiter removes all Alphanumeric characters as well as _ and -
	# preg_replace on row removes all special characters except Alphanumeric characters, _ and -
    function _get_fields_by_id($table, $in, $id, $out = array(), $seperator = null, $db = null, $numRecords = null){
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($numRecords == null){$numRecords = 1;}else{$numRecords = $numRecords;}
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}		
		$query = get_instance()->$db_selector->get_where($table, array ($in=>$id), $numRecords);
        if ($query->num_rows()){
			$fields ='';
			$delimiter  = array();
			foreach($out as $field){				
				# Regular expression removes all AlphaNumeric characters as well as - and _ and returns an array of enclosures to wrap the specified fields in.
				$delimiter = preg_replace('/[\_^\da-zA-Z -]/', '', $field);
				# Regular expression removes all special characters excluding - and _ and returns the specified field name.
				$fields .= (!empty($delimiter[0])? $delimiter[0]:'') . $query->row(preg_replace('/[\'\/~`\!@#\$%\^&\*\(\) +=\{\}\[\]\|;:"\<\>,\.\?\\\]/', '', $field)).(!empty($delimiter[1])? $delimiter[1]:'') . $seperator;
			}
			# Removes seperator from end of line
			return rtrim($fields, $seperator);
			}
        return false;
    }
	
    function _get_fields_by_id_array($db = null,$table, $in, $id, $out = array(), $numRecords = null){
  		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		if($numRecords == null){$numRecords = 1;}else{$numRecords = $numRecords;}		
		$query = get_instance()->$db_selector->get_where($table, array ($in=>$id), $numRecords);
        if ($query->num_rows()){
			$fields = array();
			foreach($out as $field){
				# Regular expression removes all special characters excluding - and _ and returns the specified field name.
				$pre_field = $query->row(preg_replace('/[\'\/~`\!@#\$%\^&\*\(\) +=\{\}\[\]\|;:"\<\>,\.\?\\\]/', '', $field));
				 $fields[$field] = $pre_field;
			}
			return $fields;
			}
        return false;
    }
	
    function _get_fields_by_id_array_clean($db = null,$table, $in, $id, $out = array(), $numRecords = null){
  		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		if($numRecords == null){$numRecords = 1;}else{$numRecords = $numRecords;}		
		get_instance()->$db->select($out);
		$query = get_instance()->$db_selector->get_where($table, array ($in=>$id), $numRecords);
        if ($query->num_rows()){return $query->result_array();}
        return false;
    }


	// Gets Indicators and related POA's from RightsAssignmentsIndicators by ID
//		get_instance()->db->from('RightsAssignmentsIndicators');	
	
	
	
	
	// Gets Mission object for MTL
    function _get_mission_by_assigned_id($id = null){
		get_instance()->db->distinct();
		get_instance()->db->select('
			Missions.mission as missionName, Missions.dateStart as missionDateStart, Missions.dateEnd as missionDateEnd, AssessmentPeriod.period as missionAssessmentPeriod,
			Missions.status as missionEnabledStatus, MissionStatus.status as missionStatus, Missions.dateCreated as missionDateCreated,
			RevenueAuthorities.id as authorityId, RevenueAuthorities.authority as authorityName, RevenueAuthorities.city as authorityCity, 
			Regions.region as authorityRegion, Countries.country as authorityCountry, FederalStates.state as authorityState,
			RevenueAuthorities.status as authorityEnabledStatus,
			raUsers.id as raId, raTitles.title as raUserTitle, raUserRoles.role as raUserRole, raUsers.name as raUserName, raUsers.surname as raUserSurname, raUsers.email as raEmail,
			racUsers.id as racId, racTitles.title as racUserTitle, racUserRoles.role as racUserRole, racUsers.name as racUserName, racUsers.surname as racUserSurname, racUsers.email as racEmail,
			mtUsers.id as mtId, mtTitles.title as mtUserTitle, mtUserRoles.role as mtUserRole, mtUsers.name as mtUserName, mtUsers.surname as mtUserSurname, mtUsers.email as mtEmail,
			secUsers.id as secId, secTitles.title as secUserTitle, secUserRoles.role as secUserRole, secUsers.name as secUserName, secUsers.surname as secUserSurname, secUsers.email as secEmail,
			');
		get_instance()->db->from('Missions');	
		get_instance()->db->join('AssessmentPeriod', 'AssessmentPeriod.id = Missions.fkidAssessmentPeriod','left');
		get_instance()->db->join('RevenueAuthorities', 'RevenueAuthorities.id = Missions.fkidRevenueAuthority','left');			
		get_instance()->db->join('Regions', 'Regions.id = RevenueAuthorities.fkidRegion','left');
		get_instance()->db->join('Countries', 'Countries.id = RevenueAuthorities.fkidCountry','left');	
		get_instance()->db->join('FederalStates', 'FederalStates.id = RevenueAuthorities.fkidState','left');		
		get_instance()->db->join('Users AS raUsers', 'raUsers.id = RevenueAuthorities.fkidUser','left');
		get_instance()->db->join('Users AS racUsers', 'racUsers.id = RevenueAuthorities.fkidCounterpart','left');
		get_instance()->db->join('Users AS mtUsers', 'mtUsers.id = Missions.fkidTeamLeader','left');
		get_instance()->db->join('Users AS secUsers', 'secUsers.id = Missions.fkidUserCreated','left');
		get_instance()->db->join('Titles AS raTitles', 'raTitles.id = raUsers.fkidTitle','left');
		get_instance()->db->join('Titles AS racTitles', 'racTitles.id = racUsers.fkidTitle','left');	
		get_instance()->db->join('Titles AS mtTitles', 'mtTitles.id = mtUsers.fkidTitle','left');
		get_instance()->db->join('Titles AS secTitles', 'secTitles.id = secUsers.fkidTitle','left');			

		get_instance()->db->join('MissionStatus', 'MissionStatus.id = Missions.fkidMissionStatus','left');

		get_instance()->db->join('UserRoles AS racUserRoles', 'racUserRoles.id = racUsers.fkidUserRole','left');	
		get_instance()->db->join('UserRoles AS raUserRoles', 'raUserRoles.id = raUsers.fkidUserRole','left');	
		get_instance()->db->join('UserRoles AS mtUserRoles', 'mtUserRoles.id = mtUsers.fkidUserRole','left');
		get_instance()->db->join('UserRoles AS secUserRoles', 'secUserRoles.id = secUsers.fkidUserRole','left');			
        get_instance()->db->where('Missions.id', $id);
		$query = get_instance()->db->get();
//		echo get_instance()->db->last_query();								
        if ($query->num_rows()){return $query->row();}
        return false;
    }


//RevenueAuthorities.fkidUser as authorityAdminId, RevenueAuthorities.fkidCounterpart as authorityCounterpartId, 


	
    function _get_field_by_id_single_row($db = null,$table, $in, $id, $out, $numRecords = null){
  		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		if($numRecords == null){$numRecords = 1;}else{$numRecords = $numRecords;}		
		get_instance()->$db->select($out);
		$query = get_instance()->$db_selector->get_where($table, array ($in=>$id), $numRecords);
        if ($query->num_rows()){return $query->row($out);}
        return false;
    }
	

    function _get_scores_by_mission_id_all_tables($id,$poa_status){
  		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
				$db_selector = 'db_b';
				if ($poa_status === '1'){
					$status = ' AND status = 1';
				}else{
					$status = '';
				}
				

				// Complete SQL 
				$sql = '
				(SELECT "1-1" AS "table", score_symbol_overall_final AS "score" FROM `indicator_table_1_1` WHERE fkidMission = '.$id.' '.$status.')	UNION
				(SELECT "1-2", score_symbol_overall_final FROM `indicator_table_1_2`   WHERE fkidMission = '.$id.' '.$status.') UNION
				(SELECT "2-3", score_symbol_overall_final FROM `indicator_table_2_3`   WHERE fkidMission = '.$id.' '.$status.') UNION
				(SELECT "2-4", score_symbol_overall_final FROM `indicator_table_2_4`   WHERE fkidMission = '.$id.' '.$status.') UNION
				(SELECT "2-5", score_symbol_overall_final FROM `indicator_table_2_5`   WHERE fkidMission ='. $id.' '.$status.') UNION										
				(SELECT "2-6", score_symbol_overall_final FROM `indicator_table_2_6`   WHERE fkidMission = '.$id.' '.$status.') UNION	
				(SELECT "3-7", score_symbol_overall_final FROM `indicator_table_3_7`   WHERE fkidMission = '.$id.' '.$status.') UNION	
				(SELECT "3-8", score_symbol_overall_final FROM `indicator_table_3_8`   WHERE fkidMission = '.$id.' '.$status.') UNION	
				(SELECT "3-9", score_symbol_overall_final FROM `indicator_table_3_9`   WHERE fkidMission = '.$id.' '.$status.') UNION	
				(SELECT "4-10", score_symbol_overall_final FROM `indicator_table_4_10` WHERE fkidMission = '.$id.' '.$status.') UNION	
				(SELECT "4-11", score_symbol_overall_final FROM `indicator_table_4_11` WHERE fkidMission = '.$id.' '.$status.') UNION					
				(SELECT "5-12", score_symbol_overall_final FROM `indicator_table_5_12` WHERE fkidMission = '.$id.' '.$status.') UNION	
				(SELECT "5-13", score_symbol_overall_final FROM `indicator_table_5_13` WHERE fkidMission = '.$id.' '.$status.') UNION	
				(SELECT "5-14", score_symbol_overall_final FROM `indicator_table_5_14` WHERE fkidMission = '.$id.' '.$status.') UNION	
				(SELECT "5-15", score_symbol_overall_final FROM `indicator_table_5_15` WHERE fkidMission = '.$id.' '.$status.') UNION	
				(SELECT "6-16", score_symbol_overall_final FROM `indicator_table_6_16` WHERE fkidMission = '.$id.' '.$status.') UNION					
				(SELECT "6-17", score_symbol_overall_final FROM `indicator_table_6_17` WHERE fkidMission = '.$id.' '.$status.') UNION					
				(SELECT "6-18", score_symbol_overall_final FROM `indicator_table_6_18` WHERE fkidMission = '.$id.' '.$status.') UNION					
				(SELECT "7-19", score_symbol_overall_final FROM `indicator_table_7_19` WHERE fkidMission = '.$id.' '.$status.') UNION					
				(SELECT "7-20", score_symbol_overall_final FROM `indicator_table_7_20` WHERE fkidMission = '.$id.' '.$status.') UNION					
				(SELECT "7-21", score_symbol_overall_final FROM `indicator_table_7_21` WHERE fkidMission = '.$id.' '.$status.') UNION					
				(SELECT "8-22", score_symbol_overall_final FROM `indicator_table_8_22` WHERE fkidMission = '.$id.' '.$status.') UNION					
				(SELECT "8-23", score_symbol_overall_final FROM `indicator_table_8_23` WHERE fkidMission = '.$id.' '.$status.') UNION					
				(SELECT "8-24", score_symbol_overall_final FROM `indicator_table_8_24` WHERE fkidMission = '.$id.' '.$status.') UNION					
				(SELECT "9-25", score_symbol_overall_final FROM `indicator_table_9_25` WHERE fkidMission = '.$id.' '.$status.') UNION					
				(SELECT "9-26", score_symbol_overall_final FROM `indicator_table_9_26` WHERE fkidMission = '.$id.' '.$status.') UNION					
				(SELECT "9-27", score_symbol_overall_final FROM `indicator_table_9_27` WHERE fkidMission = '.$id.' '.$status.') UNION													
				(SELECT "9-28", score_symbol_overall_final FROM `indicator_table_9_28` WHERE fkidMission = '.$id.' '.$status.')'
				;
/*				$sql = '
				(SELECT "1-1" AS "table", score_symbol_overall_final AS "score" FROM `indicator_table_1_1` WHERE fkidMission = '.$id.'  AND status = '.$status.')	UNION
				(SELECT "1-2", score_symbol_overall_final FROM `indicator_table_1_2`   WHERE fkidMission = '.$id.'  AND status = '.$status.') UNION
				(SELECT "2-3", score_symbol_overall_final FROM `indicator_table_2_3`   WHERE fkidMission = '.$id.'  AND status = '.$status.') UNION
				(SELECT "2-4", score_symbol_overall_final FROM `indicator_table_2_4`   WHERE fkidMission = '.$id.'  AND status = '.$status.') UNION
				(SELECT "2-5", score_symbol_overall_final FROM `indicator_table_2_5`   WHERE fkidMission = '.$id.'  AND status = '.$status.') UNION										
				(SELECT "2-6", score_symbol_overall_final FROM `indicator_table_2_6`   WHERE fkidMission = '.$id.'  AND status = '.$status.')'
				;
*/
//echo $sql;
		$query = get_instance()->$db_selector->query($sql);
        if ($query->num_rows()){return $query->result_array();}
        return false;
    }
	


    function _get_field_by_id_tax_collected($db = null,$table, $in, $id, $numRecords = null){
  		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		if($numRecords == null){$numRecords = 1;}else{$numRecords = $numRecords;}
		get_instance()->$db->select('sum(a_total_revenue_collections+b_total_revenue_collections+c_total_revenue_collections) AS collected');

		$query = get_instance()->$db_selector->get_where($table, array ($in=>$id), $numRecords);
        if ($query->num_rows()){return $query->row('collected');}
        return false;
    }

    function _get_field_by_id_tax_arrears($db = null,$table, $in, $id, $numRecords = null){
  		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		if($numRecords == null){$numRecords = 1;}else{$numRecords = $numRecords;}
		get_instance()->$db->select('sum(arrears_total_2+arrears_total_1+arrears_total_3) AS collected');
		$query = get_instance()->$db_selector->get_where($table, array ($in=>$id), $numRecords);
        if ($query->num_rows()){return $query->row('collected');}
        return false;
    }

    function _get_field_by_id_tax_arrears_older($db = null,$table, $in, $id, $numRecords = null){
  		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		if($numRecords == null){$numRecords = 1;}else{$numRecords = $numRecords;}
		get_instance()->$db->select('sum(arrears_old_2+arrears_old_1+arrears_old_3) AS collected');		
		$query = get_instance()->$db_selector->get_where($table, array ($in=>$id), $numRecords);
        if ($query->num_rows()){return $query->row('collected');}
        return false;
    }

    function _get_field_by_id_collectible_tax_arrears($db = null,$table, $in, $id, $numRecords = null){
  		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		if($numRecords == null){$numRecords = 1;}else{$numRecords = $numRecords;}
		get_instance()->$db->select('sum(arrears_collect_2+arrears_collect_1+arrears_collect_3) AS collected');
		$query = get_instance()->$db_selector->get_where($table, array ($in=>$id), $numRecords);
        if ($query->num_rows()){return $query->row('collected');}
        return false;
    }

    function _get_field_by_id_collectible_tax_arrears_numbers($db = null,$table, $in, $id, $numRecords = null){
  		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		if($numRecords == null){$numRecords = 1;}else{$numRecords = $numRecords;}
		get_instance()->$db->select('sum(arrears_cases_0+arrears_cases_1+arrears_cases_2) AS collected');
		$query = get_instance()->$db_selector->get_where($table, array ($in=>$id), $numRecords);
        if ($query->num_rows()){return $query->row('collected');}
        return false;
    }



	
	    function _get_all_fields_by_id($db = null, $table, $in, $id){
  		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
	    if (!$id) return false;
		$query = get_instance()->$db_selector->get_where($table, array ($in=>$id), 1);
        if ($query->num_rows()){return $query->row_array();}
        return false;
    }

	    function _get_all_fields_by_id_array($db = null, $table, $in, $id){
  		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
	    if (!$id) return false;
		$query = get_instance()->$db_selector->get_where($table, array ($in=>$id));
        if ($query->num_rows()){return $query->result_array();}
        return false;
    	}

	function _get_status_by_id($db = null, $table, $id = null, $in=null){
   		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
	    if (!$id) return false;
		get_instance()->$db_selector->select(array('id','status'));
		get_instance()->$db_selector->from($table);
        get_instance()->$db_selector->where($in, $id);
		$query = get_instance()->$db_selector->get();
        if ($query->num_rows()){return $query->row_array();}
        return false;
}


	# This gets all the indicator Status from Indicator Tables
	function _get_status_by_id_all($db = null, $tbl = null, $mission_id = null, $poa_id = null){
        if (!$mission_id) return false;
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		get_instance()->db_b->select("PerformanceIndicators.questionTable AS piTable");
		get_instance()->db_b->from($tbl);
        get_instance()->db_b->where('PerformanceIndicators.fkidPoa', $poa_id);
		$query = get_instance()->db_b->get();
        if ($query->num_rows()){
			$score = 90;
			$accumulated_score = 0;			
			$cnt = 0;
			foreach($query->result_array() as $row => $value){
				get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
				get_instance()->db_b->select($value['piTable'].".status");
		        get_instance()->db_b->where($value['piTable'].'.fkidMission', $mission_id);
				get_instance()->db_b->from($value['piTable']);
				$cnt++;
				$query_b = get_instance()->db_b->get();
        		if ($query_b->num_rows()){
					$scores = $query_b->row_array();
					if($scores['status'] == 0){
						$score = 0;
						$accumulated_score = $accumulated_score + $score;
					}
					if($scores['status'] == 1){
						$score = 1;
						$accumulated_score = $accumulated_score + $score;						
					}
				}
			}
			if($accumulated_score != $cnt && $score != 90){
				$score = 0;
			}
			
			return $score;
		}
        return false;
	}

	# This gets all the indicator details by id to ??
	function _get_score_by_id_all($db = null, $tbl = null, $field = null, $id = null){
        if (!$id) return false;
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		get_instance()->db_b->select("PerformanceIndicators.id AS piId, PerformanceIndicators.indicatorNumber,PerformanceIndicators.indicatorName, PerformanceIndicators.questionTable, PerformanceIndicators.assessment_text, Poa.id as poaId, Poa.poa_number, Poa.poa, Poa.assessment_text AS p_assessment_text");
		get_instance()->db_b->from('PerformanceIndicators');
		get_instance()->db_b->join('Poa', 'PerformanceIndicators.fkidPoa = Poa.id', 'left');
        get_instance()->db_b->where(array('PerformanceIndicators.id' =>$id));
		$query = get_instance()->db_b->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
}

	function _get_record_by_id_score_md($id = null, $status = null, $db = null){
        if (!$id) return false;
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		get_instance()->$db_selector->select('MeasurementDimensions.id, MeasurementDimensions.dimensionName, ScoringMethods.methodType, ScoringMethods.methodName');
		get_instance()->$db_selector->from('MeasurementDimensions');
		get_instance()->db_b->join('ScoringMethods', 'MeasurementDimensions.fkidScoringMethod = ScoringMethods.id', 'right outer');				
       	get_instance()->$db_selector->where(array('MeasurementDimensions.fkidPi'=>$id,'MeasurementDimensions.fkidDimensionType !=' => '1'));
		$query = get_instance()->$db_selector->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
}

	function _get_record_by_id_score_table($id = null, $db = null, $tbl = null, $fields = array()){
        if (!$id) return false;
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{get_instance()->db_b = get_instance()->load->database('db_b', TRUE); $db_selector = $db;}
		get_instance()->$db_selector->select($fields);
		get_instance()->$db_selector->from($tbl);
       	get_instance()->$db_selector->where(array($tbl.'.fkidMission'=>$id));
		$query = get_instance()->$db_selector->get();
        if ($query->num_rows()){return $query->row_array();}
        return false;
}

	function _get_record_by_id_score_method($fkidMd = null, $fkidScore = null, $db = null, $tbl = null, $fields = array()){
        if (!$fkidMd) return false;
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{get_instance()->db_b = get_instance()->load->database('db_b', TRUE); $db_selector = $db;}
		get_instance()->$db_selector->select($fields);
		get_instance()->$db_selector->from($tbl);
       	get_instance()->$db_selector->where(array($tbl.'.fkidMd'=>$fkidMd, $tbl.'.fkidScore'=>$fkidScore));
		$query = get_instance()->$db_selector->get();
        if ($query->num_rows()){return $query->row_array();}
        return false;
}

	function _get_scoring_method_by_indicator($db = null, $tbl = null, $id = null, $fields = array()){
        if (!$id) return false;
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{get_instance()->db_b = get_instance()->load->database('db_b', TRUE); $db_selector = $db;}
		get_instance()->$db_selector->order_by("id", "asc"); 
		get_instance()->$db_selector->select($fields);
		get_instance()->$db_selector->from($tbl);
       	get_instance()->$db_selector->where('fkidPi',$id);
       	get_instance()->$db_selector->where('fkidDimensionType !=',1);
		$query = get_instance()->$db_selector->get();
        if ($query->num_rows()){
			$scoring_array = array();
			$cnt = 0;
			foreach($query->result_array() as $key => $indicator){
				$cnt++;
				$scoring_array[] = array('dimension'=> $cnt, 'method'=>$indicator['fkidScoringMethod']);
			}
			return $scoring_array;
		}
        return false;
	}



	# GETS SUPER OBJECT REVENUE AUTHORITY MANAGER, RA and MISSION by id
	function _get_super_object_by_id($rid = null, $mid = null){
        if (!$rid || !$mid) return false;
		get_instance()->db->select('
		RevenueAuthorities.authority AS ra_name, RevenueAuthorities.id AS ra_id, RevenueAuthorities.telephone AS ra_telephone, RevenueAuthorities.fax AS ra_fax,
		RevenueAuthorities.email AS ra_email, RevenueAuthorities.website AS ra_website, RevenueAuthorities.address AS ra_address,
		RevenueAuthorities.city AS ra_city, RevenueAuthorities.code AS ra_code,		
		ra_regions.region AS ra_region,	ra_countries.country AS ra_country, ra_state.state AS ra_state,
		ram_user.id as ram_id, ram_user.fkidTitle as ram_title, ram_user.name as ram_name, ram_user.surname as ram_surname, ram_user.designation as ram_designation, ram_user.email as ram_email, 
		ram_user.telephone as ram_telephone, ram_user.mobile as ram_mobile, ram_user.city as ram_city, ram_countries.country AS ram_country, ram_regions.region AS ram_region, ram_language.language as ram_language,
		Missions.id as mission_id, Missions.mission as mission_name, Missions.dateStart as mission_start, Missions.dateEnd as mission_end, AssessmentPeriod.period as mission_period, MissionStatus.status as mission_status, 
		mtl_user.id as mtl_id, mtl_user.fkidTitle as mtl_title, mtl_user.name as mtl_name, mtl_user.surname as mtl_surname, mtl_user.designation as mtl_designation, mtl_user.email as mtl_email, 
		mtl_user.telephone as mtl_telephone, mtl_user.mobile as mtl_mobile, mtl_user.city as mtl_city, mtl_countries.country AS mtl_country, mtl_regions.region AS mtl_region, mtl_language.language as mtl_language,
		');
		get_instance()->db->from('RevenueAuthorities');
		get_instance()->db->join('Regions AS ra_regions', 'RevenueAuthorities.fkidRegion = ra_regions.id');
		get_instance()->db->join('Countries AS ra_countries', 'RevenueAuthorities.fkidCountry = ra_countries.id');
		get_instance()->db->join('FederalStates AS ra_state', 'RevenueAuthorities.fkidState = ra_state.id', 'left');
		get_instance()->db->join('Users AS ram_user', 'ram_user.id = RevenueAuthorities.fkidUser');
		get_instance()->db->join('Languages AS ram_language', 'ram_user.fkidLanguage = ram_language.id');
		get_instance()->db->join('Regions AS ram_regions', 'ram_user.fkidRegion = ram_regions.id');
		get_instance()->db->join('Countries AS ram_countries', 'ram_user.fkidCountry = ram_countries.id');
		get_instance()->db->join('Missions', 'Missions.fkidRevenueAuthority = RevenueAuthorities.id');
		get_instance()->db->join('AssessmentPeriod', 'AssessmentPeriod.id = Missions.fkidAssessmentPeriod');
		get_instance()->db->join('MissionStatus', 'MissionStatus.id = Missions.fkidMissionStatus');
		get_instance()->db->join('Users AS mtl_user', 'mtl_user.id = Missions.fkidTeamLeader');
		get_instance()->db->join('Languages AS mtl_language', 'mtl_user.fkidLanguage = mtl_language.id');
		get_instance()->db->join('Regions AS mtl_regions', 'mtl_user.fkidRegion = mtl_regions.id');
		get_instance()->db->join('Countries AS mtl_countries', 'mtl_user.fkidCountry = mtl_countries.id');				

        get_instance()->db->where(array('RevenueAuthorities.id'=>$rid));
		$query = get_instance()->db->get();

        if ($query->num_rows()){
			return $query->result_array();
		}
        return false;	
	}	

	# GETS POA OBJECT by id
	function _get_poa_object_by_id($id = null){
       if (!$id) return false;
		get_instance()->db_b->select("Poa.id, Poa.poa_number, Poa.poa, Poa.description, Poa.desiredOutcome, Poa.background, Poa.indicators");

		get_instance()->db_b->from('Poa');
//		get_instance()->db_b->join('PerformanceIndicators', 'PerformanceIndicators.fkidPoa = Poa.id', 'left outer');
//		get_instance()->db_b->join('MeasurementDimensions', 'MeasurementDimensions.fkidPi = PerformanceIndicators.id');		
//		get_instance()->db_b->join('MeasurementDimensionTypes', 'MeasurementDimensions.fkidDimensionType = MeasurementDimensionTypes.id');		
        get_instance()->db_b->where(array('Poa.id'=>$id));	
		$query = get_instance()->db_b->get();
        if ($query->num_rows()){return $query->row_array();}
        return false;	
	}

	function _get_record_by_fkid_ev($id = null, $status = null, $db = null){
        if (!$id) return false;
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		get_instance()->$db_selector->select('*');
		get_instance()->$db_selector->from('EvidentiaryExamples');
        get_instance()->$db_selector->where('EvidentiaryExamples.id',$id, 1);
		$query = get_instance()->$db_selector->get();
        if ($query->num_rows()){return $query->row();}
        return false;
	}


	function _get_record_by_id_all_uploaded($missionId = null, $indicatorId = null, $dimensionId = null, $uploadType = null, $table = null, $db = null){
        if (!$missionId) return false;
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		get_instance()->$db_selector->select('id, documentTitle, documentDescription, documentSize, documentType, documentPath, thumbPath, dateCreated');
		get_instance()->$db_selector->from($table);
        if ($uploadType == 1){
	        if ($dimensionId  == null){
				get_instance()->$db_selector->where(array('fkidMission'=>$missionId, 'fkidIndicator'=>$indicatorId, 'fkidDimension'=>'0',  'uploadType'=>$uploadType));
			}else{
				get_instance()->$db_selector->where(array('fkidMission'=>$missionId, 'fkidIndicator'=>$indicatorId, 'fkidDimension'=>$dimensionId,  'uploadType'=>$uploadType));
			}
		}else{
			get_instance()->$db_selector->where(array('fkidMission'=>$missionId, 'uploadType'=>$uploadType));
		}
		$query = get_instance()->$db_selector->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
	}	


	function _get_record_by_id_document_data($id){
        if (!$id) return false;
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		
		get_instance()->db_b->select('*');
		get_instance()->db_b->from('EvidentiaryDocumentation');
		get_instance()->db_b->where('EvidentiaryDocumentation.id',$id);
		$query = get_instance()->db_b->get();
        if ($query->num_rows()){return $query->row();}
        return false;
	}	






	# GETS REVENUE AUTHORITY MANAGER, RA and MISSION by id
	function _get_current_missions_by_id($id = null, $role = null){
        if (!$id) return false;
		get_instance()->db->select('RevenueAuthorities.*,UserRoles.*, Missions.*, AssessmentPeriod.period, Countries.country,
		Missions.fkidTeamLeader, Missions.id AS MissionId, Users.id as mtlId, Users.fkidTitle as mtlTitle, Users.name as mtlName, Users.surname as mtlSurname');
		get_instance()->db->from('RevenueAuthorities');
		get_instance()->db->join('Missions', 'Missions.fkidRevenueAuthority = RevenueAuthorities.id');
		get_instance()->db->join('Countries', 'RevenueAuthorities.fkidCountry = Countries.id');
		get_instance()->db->join('AssessmentPeriod', 'AssessmentPeriod.id = Missions.fkidAssessmentPeriod');
		get_instance()->db->join('Users', 'Users.id = Missions.fkidTeamLeader');
		get_instance()->db->join('UserRoles', 'UserRoles.id = Users.fkidUserRole');

		if($role && $role == 7){
	        get_instance()->db->where(array('RevenueAuthorities.fkidCounterpart'=>$id, 'Missions.fkidMissionStatus'=>3));			
		}else{
	        get_instance()->db->where(array('RevenueAuthorities.fkidUser'=>$id, 'Missions.fkidMissionStatus'=>3));						
		}

		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;	
	}	
	
	function _get_record_count_by_id($table = null, $field = null, $id = null, $db = null){
        if (!$table || !$field) return false;
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}		
		get_instance()->$db_selector->select($field);
		get_instance()->$db_selector->from($table);
        get_instance()->$db_selector->where($field, $id);
		$query = get_instance()->$db_selector->count_all_results();
        if ($query)return $query;
        return 0;
	}
	
	function _get_upload_status_by_id($db = null, $table = null, $user = null, $mission = null, $indicator = null){
        if (!$table) return false;
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}		
		get_instance()->$db_selector->select('*');
		get_instance()->$db_selector->from($table);
        get_instance()->$db_selector->where(array('fkidUserCreated'=>$user,'fkidMission'=>$mission,'fkidIndicator'=>$indicator));
		$query = get_instance()->$db_selector->count_all_results();
        if ($query)return $query;
        return 0;
	}	


	function _get_record_count_by_status($table = null, $field = null, $id = null, $row = null, $db = null){
        if (!$table || !$field) return false;
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		get_instance()->$db_selector->select($row);
		get_instance()->$db_selector->from($table);
        get_instance()->$db_selector->where($field, $id);
		$query = get_instance()->$db_selector->get();
        if ($query->num_rows()){return $query->result_array();}
        return 0;
	}	

/*
	function _get_user_assignments_by_id($id = null){
        if (!$id) return false;
		get_instance()->db->select('fkidAuthority, fkidMission, pmq, poa_1, poa_2, poa_3, poa_4, poa_5, poa_6, poa_7, poa_8, poa_9');
		get_instance()->db->from('RightsAssignments');
		get_instance()->db->where('RightsAssignments.fkidUser',$id, 1);		
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
	}
*/	
	function _get_user_assignments_by_id($id = null){
        if (!$id) return false;
		get_instance()->db->select('fkidAuthority, fkidMission, `P1-1`, `P1-2`, `P2-3`, `P2-4`, `P2-5`, `P2-6`, `P3-7`, `P3-8`, `P3-9`, `P4-10`, `P4-11`, `P5-12`, `P5-13`, `P5-14`, `P5-15`, `P6-16`, `P6-17`, `P6-18`, `P7-19`, `P7-20`, `P7-21`, `P8-22`, `P8-23`, `P8-24`, `P9-25`, `P9-26`, `P9-27`, `P9-28`');
		get_instance()->db->from('RightsAssignmentsIndicators');
		get_instance()->db->where('RightsAssignmentsIndicators.fkidUser',$id, 1);		
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
	}	


	# This gets all the indicator details by id to ??
	function _get_record_by_id_indicators($id = null, $status = null, $db = null){
        if (!$id) return false;
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		get_instance()->db_b->select("Poa.id as poaId, Poa.poa_number, Poa.poa, PerformanceIndicators.id AS piId, PerformanceIndicators.indicatorNumber,PerformanceIndicators.indicatorName");
		get_instance()->db_b->from('PerformanceIndicators');
		get_instance()->db_b->join('Poa', 'PerformanceIndicators.fkidPoa = Poa.id', 'right outer');
        get_instance()->db_b->where('PerformanceIndicators.id',$id, 1);
		$query = get_instance()->db_b->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
}

	function _get_poa_by_id($id = null, $status = null, $db = null){
        if (!$id) return false;
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		get_instance()->db_b->select("Poa.id, Poa.poa_number, Poa.poa, Poa.description, Poa.desiredOutcome, Poa.background, Poa.indicators");
		get_instance()->db_b->from('Poa');
        get_instance()->db_b->where('Poa.id',$id, 1);
		$query = get_instance()->db_b->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
}

	function _get_indicators_by_poa_pi($id = null, $status = null, $db = null){
        if (!$id) return false;
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}

		get_instance()->$db_selector->select('*,PerformanceIndicators.id as piId, ScoringMethods.methodName, ScoringMethods.methodType');
		get_instance()->$db_selector->from('PerformanceIndicators');
		get_instance()->$db_selector->join('ScoringMethods', 'PerformanceIndicators.fkidScoringMethod = ScoringMethods.id','left');
        get_instance()->$db_selector->where('PerformanceIndicators.fkidPoa',$id);
		$query = get_instance()->$db_selector->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
	}

	function _get_indicator_by_indicator_id($id = null, $status = null){
        if (!$id) return false;
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		get_instance()->db_b->select('*,PerformanceIndicators.id as piId, ScoringMethods.methodName, ScoringMethods.methodType');
		get_instance()->db_b->from('PerformanceIndicators');
		get_instance()->db_b->join('ScoringMethods', 'PerformanceIndicators.fkidScoringMethod = ScoringMethods.id','left');
        get_instance()->db_b->where('PerformanceIndicators.id',$id);
		$query = get_instance()->db_b->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
	}





	function _get_record_by_id_assignment($id = null, $status = null){
        if (!$id) return false;
		get_instance()->db->select('*');
		get_instance()->db->from('RightsAssignmentsIndicators');
        get_instance()->db->where('RightsAssignmentsIndicators.id',$id, 1);
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->row();}
        return false;
	}

	function _get_record_by_id_glossary($id = null, $status = null){
        if (!$id) return false;
		get_instance()->db->order_by("Glossary.term", "ASC");	
		get_instance()->db->select('*');
		get_instance()->db->from('Glossary');
        get_instance()->db->where('Glossary.id',$id, 1);
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->row();}
        return false;
	}

	function _get_record_by_id_score($id = null, $status = null){
        if (!$id) return false;
		get_instance()->db_b->select('*');
		get_instance()->db_b->from('MeasurementDimensionsScoring');
        get_instance()->db_b->where('MeasurementDimensionsScoring.id',$id, 1);
		$query = get_instance()->db_b->get();
        if ($query->num_rows()){return $query->row();}
        return false;
	}



	function _get_record_by_id_ev($id = null, $status = null, $db = null){
        if (!$id) return false;
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		get_instance()->$db_selector->select('*');
		get_instance()->$db_selector->from('EvidentiaryExamples');
        get_instance()->$db_selector->where('EvidentiaryExamples.id',$id, 1);
		$query = get_instance()->$db_selector->get();
        if ($query->num_rows()){return $query->row();}
        return false;
	}
	
	function _get_fields_by_id_poa_ev($id = null, $status = null){
        if (!$id) return false;
		get_instance()->db_b->select("CONCAT(PerformanceIndicators.fkidPoa,'- Question ', PerformanceIndicators.indicatorNumber,' (', MeasurementDimensionTypes.typeName, '): ', MeasurementDimensions.dimensionName) AS 'poa'");
		get_instance()->db_b->from('MeasurementDimensions');
		get_instance()->db_b->join('PerformanceIndicators', 'MeasurementDimensions.fkidPi = PerformanceIndicators.id');
		get_instance()->db_b->join('MeasurementDimensionTypes', 'MeasurementDimensions.fkidDimensionType = MeasurementDimensionTypes.id');		
        get_instance()->db_b->where('MeasurementDimensions.id',$id, 1);
		$query = get_instance()->db_b->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
	}	

	function _get_record_by_id_poa($id = null, $status = null, $db = null){
        if (!$id) return false;
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		get_instance()->$db_selector->select('*');
		get_instance()->$db_selector->from('Poa');
        if($status) get_instance()->$db_selector->where('Poa.id',$id, 1);
		$query = get_instance()->$db_selector->get();
        if ($query->num_rows()){return $query->row();}
        return false;
}

	function _get_record_by_fkid_pi($id = null, $status = null, $db = null){
        if (!$id) return false;
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}

		get_instance()->$db_selector->select('*,PerformanceIndicators.id as piId, ScoringMethods.methodName, ScoringMethods.methodType');
		get_instance()->$db_selector->from('PerformanceIndicators');
		get_instance()->$db_selector->join('ScoringMethods', 'PerformanceIndicators.fkidScoringMethod = ScoringMethods.id','left');
        get_instance()->$db_selector->where('PerformanceIndicators.fkidPoa',$id);
		$query = get_instance()->$db_selector->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
	}

	function _get_record_by_fkid_md($id = null, $status = null, $db = null){
        if (!$id) return false;
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		get_instance()->$db_selector->select('*, EvidentiaryExamples.evidence,  EvidentiaryExamples.uploadable');
		get_instance()->$db_selector->from('MeasurementDimensions');
		get_instance()->$db_selector->join('EvidentiaryExamples', 'EvidentiaryExamples.fkidDimension = MeasurementDimensions.id','left');
       	get_instance()->$db_selector->where('fkidPi',$id, 1);
		$query = get_instance()->$db_selector->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
	}

	function _get_record_by_id_build_poa($id = null, $status = null, $db = null){
        if (!$id) return false;
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		get_instance()->$db_selector->select('MeasurementDimensions.dimensionName, Poa.poa, Poa.poa_number, PerformanceIndicators.indicatorNumber, PerformanceIndicators.indicatorName, MeasurementDimensions.fkidDimensionType, MeasurementDimensionTypes.typeName');
		get_instance()->$db_selector->from('MeasurementDimensions');
		get_instance()->$db_selector->join('MeasurementDimensionTypes', 'MeasurementDimensions.fkidDimensionType = MeasurementDimensionTypes.id','left');
		get_instance()->$db_selector->join('PerformanceIndicators', 'MeasurementDimensions.fkidPi = PerformanceIndicators.id','left');	
		get_instance()->$db_selector->join('Poa', 'PerformanceIndicators.fkidPoa= Poa.id','left');
        get_instance()->$db_selector->where('MeasurementDimensions.id',$id, 1);
		$query = get_instance()->$db_selector->get();
        if ($query->num_rows()){
			$arrFields = '';
			foreach($query->result_array() as $field => $fields){
				$arrFields .= '<strong>POA '.$fields['poa_number'] .': '. strtoupper($fields['poa']) .'</strong><br>'
				. '<strong>Indicator '.$fields['indicatorNumber'] .': '. $fields['indicatorName'] .'</strong><br>'
				. ''.$fields['typeName'].': '.$fields['dimensionName'] .'<br>';
				}
			return $arrFields;
			}
        return false;
}

	function _get_record_by_id_pi($id = null, $status = null, $db = null){
        if (!$id) return false;
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		get_instance()->$db_selector->select('*');
		get_instance()->$db_selector->from('PerformanceIndicators');
        get_instance()->$db_selector->where('PerformanceIndicators.id',$id, 1);
		$query = get_instance()->$db_selector->get();
        if ($query->num_rows()){return $query->row();}
        return false;
}

	function _get_record_by_id_md($id = null, $status = null, $db = null){
        if (!$id) return false;
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE); 
		$db_selector = '';
		if($db == null){$db_selector = 'db';}else{$db_selector = $db;}
		get_instance()->$db_selector->select('*');
		get_instance()->$db_selector->from('MeasurementDimensions');
       	get_instance()->$db_selector->where('id',$id, 1);
		$query = get_instance()->$db_selector->get();
        if ($query->num_rows()){return $query->row();}
        return false;
}

	function _get_record_by_id_users($id = null, $status = null){
        if (!$id) return false;
		get_instance()->db->select('Users.*');
		get_instance()->db->from('Users');
		get_instance()->db->join('UserRoles', 'Users.fkidUserRole = UserRoles.id');
        get_instance()->db->where('Users.id',$id, 1);
        if($status) get_instance()->db->where('Users.status', $status, 1);
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->row();}
        return false;
}

	# MISSION BY ID	
	function _get_record_by_id_missions($id = null){
        if (!$id) return false;
		get_instance()->db->select('Missions.*, Users.fkidTitle as mTitle, Users.name as mName, Users.surname as mSurname, UserRoles.role as mRole');
		get_instance()->db->from('Missions');
		get_instance()->db->join('Users', 'Missions.fkidUserCreated = Users.id');
		get_instance()->db->join('UserRoles', 'Users.fkidUserRole = UserRoles.id');
		get_instance()->db->join('RevenueAuthorities', 'RevenueAuthorities.id = Missions.fkidRevenueAuthority');
        get_instance()->db->where('Missions.id',$id, 1);
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->row();}
        return false;
}


	# GET MISSION AND LINKED RA FOR USER BY TYPE - ASSESSORS AND MTLS
	function _get_record_by_id_missions_where_assigned($userid = null){
        if (!$userid) return false;
		get_instance()->db->select('*');
		get_instance()->db->from('Missions');
        get_instance()->db->where('Missions.fkidTeamLeader',$userid);
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->result_array();}
        return false;
}



	# MISSION BY ID	
	function _get_users_by_id_missions($id = null){
        if (!$id) return false;
		get_instance()->db->select('Missions.fkidTeamLeader as id_mtl, RevenueAuthorities.fkidCounterpart as id_counterpart, RevenueAuthorities.fkidUser as id_admin');
		get_instance()->db->from('Missions');
		get_instance()->db->join('RevenueAuthorities', 'RevenueAuthorities.id = Missions.fkidRevenueAuthority');
        get_instance()->db->where('Missions.id',$id, 1);
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->row();}
        return false;
}


	# GET RA CONTACTS BY MISSION ID AND MISSION STATUS
	function _get_ra_users_by_id_missions($id = null){
        if (!$id) return false;
		get_instance()->db->select('RevenueAuthorities.fkidCounterpart as id_counterpart, RevenueAuthorities.fkidUser as id_admin');
		get_instance()->db->from('Missions');
		get_instance()->db->join('RevenueAuthorities', 'RevenueAuthorities.id = Missions.fkidRevenueAuthority');
        get_instance()->db->where('Missions.id',$id, 1);
		$query = get_instance()->db->get();
		if ($query->num_rows()){return $query->row();}
        return false;
}



	# MISSION , REVENUE AUTHORITY AND POA ASSIGNMENTS BY ID	
	function _get_user_assignments_by_id_missions($assignment_id = null, $mission_id = null, $authority_id = null, $user_id = null){
        if (!$assignment_id) return false;
		get_instance()->db->select('Missions.mission as mission_name, Missions.dateStart as startDate, Missions.dateEnd as endDate, RevenueAuthorities.authority as authority_name, RevenueAuthorities.fkidRegion as authority_region, RevenueAuthorities.fkidCountry as authority_country, RevenueAuthorities.city as authority_city');
		get_instance()->db->from('RightsAssignmentsIndicators');
		get_instance()->db->join('RevenueAuthorities', 'RevenueAuthorities.id = RightsAssignmentsIndicators.fkidAuthority');
		get_instance()->db->join('Missions', 'Missions.id = RightsAssignmentsIndicators.fkidMission');
        get_instance()->db->where('RightsAssignmentsIndicators.id',$assignment_id);
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->row();}
        return false;
}

	# REVENUE AUTHORITIES BY ID
    function _get_record_by_id_poa_name($id = null){
		get_instance()->db_b = get_instance()->load->database('db_b', TRUE);
		get_instance()->db_b->select('poa');
		get_instance()->db_b->from('Poa');
        get_instance()->db_b->where('Poa.id',$id, 1);
		$query = get_instance()->db_b->get();
        if ($query->num_rows()){return $query->row();}
        return false;		
		
		}

	# REVENUE AUTHORITIES BY ID
    function _get_record_by_id_rev_auth($id = null){
        if (!$id) return false;
		get_instance()->db->select('RevenueAuthorities.*, Users.fkidTitle, Users.name, Users.surname, UserRoles.role, Countries.country, Regions.region');
		get_instance()->db->from('RevenueAuthorities');
		get_instance()->db->join('Users', 'RevenueAuthorities.fkidUserCreated = Users.id');
		get_instance()->db->join('UserRoles', 'Users.fkidUserRole = UserRoles.id');
		get_instance()->db->join('Countries', 'RevenueAuthorities.fkidCountry = Countries.id');
		get_instance()->db->join('Regions', 'RevenueAuthorities.fkidRegion = Regions.id');
        get_instance()->db->where('RevenueAuthorities.id',$id, 1);
        get_instance()->db->where('Users.status', 1, 1);
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->row();}
        return false;
    }
	
	# REVENUE AUTHORITY MANAGER BY ID
	function _get_record_by_id_rev_auth_ram($id = null){
        if (!$id) return false;
		get_instance()->db->select('Users.id as raId, Users.fkidTitle as raTitle, Users.name as raName, Users.surname as raSurname, Users.description as raDescription, 
									Users.email as raEmail, Users.telephone as raTelephone, Users.mobile as raMobile,	Users.designation as raDesignation, Users.dateCreated as raCreated, Users.status as raStatus,
									Users.skype as raSkype, 
									Users.city as raCity, Countries.country as raCountry, Regions.region as raRegion, 
									UserRoles.role  as raRole, Languages.language  as raLanguage');
		get_instance()->db->from('RevenueAuthorities');
		get_instance()->db->join('Users', 'RevenueAuthorities.fkidUser = Users.id');
		get_instance()->db->join('Languages', 'Users.fkidLanguage = Languages.id');
		get_instance()->db->join('Countries', 'Users.fkidCountry = Countries.id');
		get_instance()->db->join('Regions', 'Users.fkidRegion = Regions.id');
		get_instance()->db->join('UserRoles', 'Users.fkidUserRole = UserRoles.id');	
        get_instance()->db->where(array('RevenueAuthorities.id'=>$id), 1);
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->row();}
        return false;	
	}
	
	# REVENUE AUTHORITY MANAGER BY ID
	function _get_record_by_id_rev_auth_counterpart($id = null){
        if (!$id) return false;
		get_instance()->db->select('Users.id as raId, Users.fkidTitle as raTitle, Users.name as raName, Users.surname as raSurname, Users.description as raDescription, 
									Users.email as raEmail, Users.telephone as raTelephone, Users.mobile as raMobile,	Users.designation as raDesignation, Users.dateCreated as raCreated, Users.status as raStatus,
									Users.skype as raSkype, 
									Users.city as raCity, Countries.country as raCountry, Regions.region as raRegion, 
									UserRoles.role  as raRole, Languages.language  as raLanguage');
		get_instance()->db->from('RevenueAuthorities');
		get_instance()->db->join('Users', 'RevenueAuthorities.fkidCounterpart = Users.id');
		get_instance()->db->join('Languages', 'Users.fkidLanguage = Languages.id');
		get_instance()->db->join('Countries', 'Users.fkidCountry = Countries.id');
		get_instance()->db->join('Regions', 'Users.fkidRegion = Regions.id');
		get_instance()->db->join('UserRoles', 'Users.fkidUserRole = UserRoles.id');	
        get_instance()->db->where(array('RevenueAuthorities.id'=>$id), 1);
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->row();}
        return false;	
	}	
	
	# MISSION TEAM LEADER BY ID
	function _get_record_by_id_team_leader($id = null){
        if (!$id) return false;
		get_instance()->db->select('Users.id as tlId, Users.fkidTitle as tlTitle, Users.name as tlName, Users.surname as tlSurname, Users.description as tlDescription, 
									Users.email as tlEmail, Users.telephone as tlTelephone, Users.mobile as tlMobile,	Users.designation as tlDesignation, Users.dateCreated as tlCreated, Users.status as tlStatus,
									Users.skype as tlSkype, 
									Users.city as tlCity, Countries.country as tlCountry, Regions.region as tlRegion, 
									UserRoles.role  as tlRole, Languages.language  as tlLanguage');
		get_instance()->db->from('Missions');
		get_instance()->db->join('Users', 'Missions.fkidTeamLeader = Users.id');
		get_instance()->db->join('Languages', 'Users.fkidLanguage = Languages.id');
		get_instance()->db->join('Countries', 'Users.fkidCountry = Countries.id');
		get_instance()->db->join('Regions', 'Users.fkidRegion = Regions.id');
		get_instance()->db->join('UserRoles', 'Users.fkidUserRole = UserRoles.id');	
        get_instance()->db->where(array('Users.id'=>$id), 1);
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->row();}
        return false;	
	}	


	# TEMPLATE BY ID	
	function _get_record_by_id_templates($id = null){
        if (!$id) return false;
		get_instance()->db->select('Templates.*, TemplateTypes.nameTemplateType as ttName, TemplateTypes.uinameTemplateType as ttUIName, TemplateTypes.typeDueTime as ttDue, TemplateTypes.typePages as ttPages');
		get_instance()->db->from('Templates');
		get_instance()->db->join('TemplateTypes', 'Templates.fkidTemplateType = TemplateTypes.idTemplateTypes');
        get_instance()->db->where('Templates.idTemplates',$id, 1);
		$query = get_instance()->db->get();
        if ($query->num_rows()){return $query->row();}
        return false;
	}

	# TEMPLATE FIELD BY ID
	function _get_record_by_id_fields($id = null){
        if(!$id) return false;
		$query = get_instance()->db->get_where('TemplateFields', array('fkidTemplates' => $id));
        if($query->num_rows()){
        	foreach ($query->result_array() as $row) $arrRows[] = $row;
        	return $arrRows;
        }
        return false;
	}
	