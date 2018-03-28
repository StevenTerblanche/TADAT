<?php defined('BASEPATH') OR exit('No direct script access allowed');

	// Get specific Revenue Authority Manager by ID
    function _get_ram($id = null){
		$CI =& get_instance();
        if (!$id) return false;
        $obj = $CI->db->get_where($CI->config->item('_tblRevenueAuthority'), array ('idMissionAuthority'=>$intID), 1);
        if ($obj->num_rows()) return $obj->row();
        return false;
    }

    function _get_mission($id = null){
		$CI =& get_instance();
        if (!$id) return false;
        $obj = $CI->db->get_where($CI->_tblMissions, array ('idMissions'=>$id), 1);
        if ($obj->num_rows()) return $obj->row();
        return false;
    }

    function _get_missions_all (){
		$CI =& get_instance();
//        $CI->db->order_by('creationDate', 'DESC');

/*
SELECT Missions.*, RevenueAuthority.nameRA, MissionRegion.nameMissionRegion, MissionCountry.nameMissionCountry
FROM Missions
    JOIN RevenueAuthority
        ON RevenueAuthority.idMissionAuthority = Missions.fkidMissionAuthority
    JOIN MissionRegion
        ON MissionRegion.idMissionRegion = RevenueAuthority.fkidMissionRegion
	JOIN MissionCountry
        ON MissionCountry.idMissionCountry = RevenueAuthority.fkidMissionCountry

*/

        $CI->db->join($CI->config->item('_tblRevenueAuthority'), $CI->config->item('_tblRevenueAuthority') . ".idMissionAuthority = " . $CI->config->item('_tblMissions') . ".fkidMissionAuthority" );
        $obj = $CI->db->get($CI->config->item('_tblMissions'));

//1.		foreach ( $obj->row_array() as $dbRow ) $result[$dbRow['idMissions']][] = $dbRow;

//2.		foreach ( $obj->row_array() as $dbRow ) $result[] = $dbRow;

        if ($obj->num_rows())return array('results'=>$arr);
        return false; 
    }

## -- FINAL TESTED FUNCTIONS -- #

	# ASSESSMENT PERIODS - Used in the following Controllers:
	#	- Missions
	function _get_ap_all(){
		$CI =& get_instance();
        $CI->db->order_by("assessmentPeriod", "ASC" );
        $obj = $CI->db->get($CI->config->item('_tblMissionAssessmentPeriod'));
        if ($obj->num_rows()){
            $arr = array();
            foreach ($obj->result_array() as $arrRow) $arr[$arrRow['idAssessmentPeriod']] = $arrRow['assessmentPeriod'];
			$arr = array('' => lang('core dropdown ap')) + $arr;
            return $arr;
        }
        return array('' => lang('core dropdown no_ap'));
    }

	# REVENUE AUTHORITIES - Used in the following Controllers:
	#	- Missions
    function _get_ra_all(){
		$CI =& get_instance();
        $obj = $CI->db->get_where($CI->config->item('_tblRevenueAuthority'), array('status'=>'1'));
        if ($obj->num_rows()){
			$arr = array();
            foreach ($obj->result_array() as $arrRow) $arr[$arrRow['idMissionAuthority']] = $arrRow['nameRA'] . " (" .  $arrRow['addressCityRA'] . ")";
			$arr = array('' => lang('core dropdown ra')) + $arr;
            return $arr;
        }
        return array('' => lang('core dropdown no_ra'));
    }

	# REVENUE AUTHORITIES BY ID - Used in the following Controllers:
	#	- Authority
	#	- Missions
    function _get_ra($id = null){
        if (!$id) return false;
		$CI =& get_instance();
        $obj = $CI->db->get_where($CI->config->item('_tblRevenueAuthority'), array ('idMissionAuthority'=>$id), 1);
        if ($obj->num_rows()) return $obj->row();
        return false;
    }

	# REVENUE AUTHORITY MANAGERS - Used in the following Controllers:
	#	- Authority
	#	- Missions
    function _get_ram_all(){
		$CI =& get_instance();
        $obj = $CI->db->get_where($CI->config->item('_tblUsers'), array('fkidUserRole'=>'5'));
        if ($obj->num_rows()){
			$arr = array();
            foreach ($obj->result_array() as $arrRow) $arr[$arrRow['idUser']] = $arrRow['nameUser'] . " " . $arrRow['surnameUser'] . " - " .  $arrRow['designationUser'] . " (" .  $arrRow['cityUser'] . ")";
			$arr = array('' => lang('core dropdown ram')) + $arr;
            return $arr;
        }
        return array('' => lang('core dropdown no_ram'));
    }

	# REGIONS - Used in the following Controllers:
	#	- Authority
	#	- Missions
	#	- Users
	function _get_region_all(){
		$CI =& get_instance();
		$CI->db->order_by("nameMissionRegion", "ASC");
		$obj = $CI->db->get($CI->config->item('_tblRegion'));
		if ($obj->num_rows()){
			$arr = array();
			foreach ($obj->result_array() as $arrRow) if (strpos($arrRow['nameMissionRegion'], "[reserved]" ) === false) $arr[$arrRow['idMissionRegion']] = $arrRow['nameMissionRegion'];
			$arr = array('' => lang('core dropdown region')) + $arr;
			return $arr;
		}
		return array('' => lang('core dropdown no_region'));
	}

	# COUNTRIES - Used in the following Controllers:
	#	- Authority
	#	- Missions
	#	- Users
	function _get_country_all(){
		$CI =& get_instance();
		$CI->db->order_by("nameMissionCountry", "ASC" );
		$obj = $CI->db->get($CI->config->item('_tblCountry'));
		if ($obj->num_rows()){
			$arr = array();
			foreach ($obj->result_array() as $arrRow) if (strpos($arrRow['nameMissionCountry'], "[reserved]" ) === false ) $arr[$arrRow['idMissionCountry']] = $arrRow['nameMissionCountry'];
			$arr = array('' => lang('core dropdown country')) + $arr;			
			return $arr;
		}
		return array('' => lang('core dropdown no_country'));
	}
	
	# COUNTRIEY BY ID - Used in the following Controllers:
	#	- Authority
	#	- Missions
	#	- Users

	function _get_country($id = null){
		$CI =& get_instance();
		if (!$id) return array ('' => lang('core dropdown country'));
		$CI->db->order_by ('nameMissionCountry', 'ASC');
		$obj = $CI->db->get_where($CI->config->item('_tblCountry'), array('fkidMissionRegion'=>$id));
		if ($obj->num_rows()){
			$arr = array();
			foreach ($obj->result_array() as $arrRow) $arr[$arrRow['idMissionCountry']] = $arrRow['nameMissionCountry'];
			$arr = array('' => lang('core dropdown country')) + $arr;
			return $arr;
		}
		return array('' => lang('core dropdown no_country'));
	}	