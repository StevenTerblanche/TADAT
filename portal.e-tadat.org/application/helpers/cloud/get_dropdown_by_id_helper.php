<?php defined('BASEPATH') OR exit('No direct script access allowed');
	/* 
		STATUS = COMPLETE!
		LANGUAGE = DONE!
		NORMALISE = DONE!
		COMMENTS = DONE!
		TESTED = DONE!
	 */

	# ONLY DROPDOWNS FOR AJAX GO HERE!!!
	
	# Use 'real-world' table names as defined in application/config/tables.php	
	# GET COUNTRIES BY ID
	# This gets called by the Ajax controller to populate countries as specified by Regions dropdown - see relevant .js files in themes/core/js/view folder/view_name.js
	function _get_dropdown_by_id_country($id = null, $ignore = null){
		get_instance()->db->order_by ('country', 'ASC');
		// If an id is passed via javascript (edit mode) get relevant country, else get all countries for specified region
		$query = ($id) ? get_instance()->db->get_where('Countries', array('fkidRegion'=>$id)) : get_instance()->db->get('Countries');
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row) $result[$row['id']] = $row['country'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options if ignore is not set
			# Else this will return the result to the Ajax model, which in turn will select the appropriate name for auto select display
			return $result = ($ignore === 'no')? array('' => lang('select_a_').lang('country'))+$result : $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('countries').lang('_found'));
	}
	
	# GET POA ASSIGNMENTS BY ID
	# This gets called by the Ajax controller to populate POA assignments as specified by authority, mission and user dropdown - see relevant .js files in themes/core/js/view folder/view_name.js
	function _get_dropdown_by_id_poa_assignments($authorityId = null, $missionId = null, $userId = null, $table = null, $ignore = null){
//		$query = get_instance()->db->get_where($table, array('fkidAuthority'=>$authorityId,'fkidMission'=>$missionId,'fkidUser'=>$userId));

	
	$arrIndicatorString = array('P1-1','P1-2','P2-3','P2-4','P2-5','P2-6','P3-7','P3-8','P3-9','P4-10','P4-11','P5-12','P5-13','P5-14','P5-15','P6-16','P6-17','P6-18','P7-19','P7-20','P7-21','P8-22','P8-23','P8-24','P9-25','P9-26','P9-27','P9-28');
	$numItems = count($arrIndicatorString);
	$sql = "SELECT ";
	$i = 0;
	$sqlEnd = ", ";
	foreach($arrIndicatorString as $indicator){
		if(++$i === $numItems) {
			$sqlEnd = "";
		 }
		$sql .= "SUM(CASE WHEN `$indicator` IS NULL THEN 0 ELSE 1 END) AS `$indicator` $sqlEnd ";
//		$sql .= "SELECT `$indicator` FROM `RightsAssignmentsIndicators` WHERE `$indicator` IS NULL AND fkidAuthority = '$authorityId' AND fkidMission = '$missionId' HAVING COUNT(*) $sqlEnd ";
	}
	$sql .=" FROM `RightsAssignmentsIndicators`";

/*	
	
	

	
	
SELECT
	SUM(CASE WHEN `P1-1` IS NULL THEN 0 ELSE 1 END) AS `P1-1`,
	SUM(CASE WHEN `P1-2` IS NULL THEN 0 ELSE 1 END) AS `P1-2`,
	SUM(CASE WHEN `P2-4` IS NULL THEN 0 ELSE 1 END) AS `P2-4`
FROM `RightsAssignmentsIndicators`
	
*/
//echo $sql;
//return;
/*
		$sql = "
		SELECT 'poa'
		  FROM   `RightsAssignments`
		  WHERE `poa_1` IS NULL AND fkidAuthority = '$authorityId' AND fkidMission = '$missionId'
		  HAVING COUNT(*)
		UNION ALL
		  SELECT 'poa_2'
		  FROM   `RightsAssignments`
		  WHERE `poa_2` IS NULL AND fkidAuthority = '$authorityId' AND fkidMission = '$missionId'
		  HAVING COUNT(*)
		UNION ALL
		  SELECT 'poa_3'
		  FROM   `RightsAssignments`
		  WHERE `poa_3` IS NULL AND fkidAuthority = '$authorityId' AND fkidMission = '$missionId'
		  HAVING COUNT(*)
		UNION ALL
		  SELECT 'poa_4'
		  FROM   `RightsAssignments`
		  WHERE `poa_4` IS NULL AND fkidAuthority = '$authorityId' AND fkidMission = '$missionId'
		  HAVING COUNT(*)
		UNION ALL
		  SELECT 'poa_5'
		  FROM   `RightsAssignments`
		  WHERE `poa_5` IS NULL AND fkidAuthority = '$authorityId' AND fkidMission = '$missionId'
		  HAVING COUNT(*)
		UNION ALL
		  SELECT 'poa_6'
		  FROM   `RightsAssignments`
		  WHERE `poa_6` IS NULL AND fkidAuthority = '$authorityId' AND fkidMission = '$missionId'
		  HAVING COUNT(*)
		UNION ALL
		  SELECT 'poa_7'
		  FROM   `RightsAssignments`
		  WHERE `poa_7` IS NULL AND fkidAuthority = '$authorityId' AND fkidMission = '$missionId'
		  HAVING COUNT(*)
		UNION ALL
		  SELECT 'poa_8'
		  FROM   `RightsAssignments`
		  WHERE `poa_8` IS NULL AND fkidAuthority = '$authorityId' AND fkidMission = '$missionId'
		  HAVING COUNT(*)
		UNION ALL
		  SELECT 'poa_9'
		  FROM   `RightsAssignments`
		  WHERE `poa_9` IS NULL AND fkidAuthority = '$authorityId' AND fkidMission = '$missionId'
		  HAVING COUNT(*)";
*/
//		return $sql;

//		$query = get_instance()->db->query($sql,false);
		$query = get_instance()->db->get_where('RightsAssignmentsIndicators', array('fkidAuthority'=>$authorityId,'fkidMission'=>$missionId));
		if ($query->num_rows()){return $query->result_array();}
		return false;

	}		
	
	# GET FEDERAL STATES BY ID
	# This gets called by the Ajax controller to populate federal states as specified by country dropdown - see relevant .js files in themes/core/js/view folder/view_name.js
	function _get_dropdown_by_id_state($id = null, $table = null, $ignore = null){
		get_instance()->db->order_by ('state', 'ASC');
		// If an id is passed via javascript (edit mode) get relevant states by country, else get all states for specified countries
		$query = ($id) ? get_instance()->db->get_where($table, array('fkidCountry'=>$id)) : get_instance()->db->get($table);
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row) $result[$row['id']] = $row['state'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options if ignore is not set
			# Else this will return the result to the Ajax model, which in turn will select the appropriate name for auto select display
			return $result = ($ignore === 'no')? array('' => lang('select_a_').lang('federal').lang('_state'))+$result : $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return false;
	}	
	
	# GET MISSIONS BY ID
	# This gets called by the Ajax controller to populate Missions as specified by the Revenue Authority dropdown - see relevant .js files in themes/core/js/view folder/view_name.js
	function _get_dropdown_by_id_mission($id = null, $table = null, $ignore = null){
		get_instance()->db->order_by ('mission', 'ASC');
		// If an id is passed via javascript (edit mode) get relevant states by country, else get all states for specified countries
		$query = ($id) ? get_instance()->db->get_where($table, array('fkidRevenueAuthority'=>$id)) : get_instance()->db->get($table);
		if ($query->num_rows()){
			$result = array();
			foreach ($query->result_array() as $row) $result[$row['id']] = $row['mission'];
			# This add the default "Please Select ... " from Lang file as specified to the start of the array of options if ignore is not set
			# Else this will return the result to the Ajax model, which in turn will select the appropriate name for auto select display
			return $result = ($ignore === 'no')? array('' => lang('select_a_').lang('mission'))+$result : $result;
		}
		# This add the default "No Records found ... " from Lang file as specified to the array if no records found
		return array('' => lang('no_').lang('missions').lang('_found'));
	}		