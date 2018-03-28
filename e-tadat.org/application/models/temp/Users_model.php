<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Users_model extends CI_Model {
    private $_tblUsers;
    private $_tblRoles;
    private $_tblUserMissions;
    private $_tblUserLanguages;
    private $_tblUserRegion;
	private $_tblUserCountry;


    function __construct()
    {
        parent::__construct();
        $this->_tblUsers = 'Users';
        $this->_tblRoles = 'UserRoles';
        $this->_tblUserMissions = 'Missions';
        $this->_tblUserLanguages = 'Languages';		
        $this->_tblUserRegion = 'Regions';
        $this->_tblUserCountry = 'Countries';
    }


    function get_all_users( $intPerPage = NULL, $intOffset = 0, $intType = NULL )
    {
        if (!$intPerPage ) return FALSE;
        $this->db->limit( $intPerPage, $intOffset );
        $this->db->order_by( 'name', 'ASC' );
        if ( $intType ) $this->db->where( 'fkidUserRole', $intType );
        $this->db->join( $this->_tblRoles, $this->_tblRoles . ".id = " . $this->_tblUsers . ".fkidUserRole" );
        $objQ = $this->db->get( $this->_tblUsers );
        if ( $objQ->num_rows() )    return array(
                                        'total_rows'=>$this->db->count_all($this->_tblUsers),
                                        'results'=>$objQ
                                        );

        return FALSE; 
    }

    function get_user($intUserID = NULL)
    {
        if (!$intUserID) return FALSE;
        $objQ = $this->db->get_where( $this->_tblUsers, array ('id'=>$intUserID ), 1);
        if ($objQ->num_rows()) return $objQ->row();
        return FALSE;
    }

    function get_all_roles()
    {
        $this->db->select ('id, role');
        $this->db->order_by ('id');
        $objQ = $this->db->get($this->_tblRoles);
        if ( $objQ->num_rows())
        {
            $arrRoles = array ();
			$arrRoles[''] = lang('users placeholder role');			
            foreach ($objQ->result_array() as $arrRow) $arrRoles[$arrRow['id']] = $arrRow['role'];
            return $arrRoles;
        }
        return FALSE;
    }

    function get_all_languages()
    {
        $this->db->order_by ( 'language', 'ASC' );
        $objQ = $this->db->get( $this->_tblUserLanguages );
        if ( $objQ->num_rows())
        {
            $arrRoles = array ();
			$arrRoles[''] = lang('users placeholder language');	
            foreach ( $objQ->result_array() as $arrRow ) $arrRoles[$arrRow['id']] = $arrRow['language'];
            return $arrRoles;
        }
        return FALSE;
    }


    function get_all_regions()
    {
        $this->db->order_by ('region', 'ASC' );
        $objQ = $this->db->get( $this->_tblUserRegion );
        if ( $objQ->num_rows()){
            $arrRoles = array ();
			$arrRoles[''] = lang('users placeholder region');			
            foreach ( $objQ->result_array() as $arrRow ) if ( strpos( $arrRow['region'], "[reserved]" ) === FALSE ) $arrRoles[$arrRow['id']] = $arrRow['region'];
            return $arrRoles;
        }
        return FALSE;
    }	


    function get_all_countries()
    {
        $this->db->order_by ('country', 'ASC' );
        $obj = $this->db->get($this->config->item('_tblCountry'));
        if ( $objQ->num_rows()){
            $arr = array ();
            foreach ( $obj->result_array() as $arrRow ) if ( strpos( $arrRow['country'], "[reserved]" ) === FALSE ) $arrRoles[$arrRow['id']] = $arrRow['country'];
			$arr = array('' => lang('core dropdown country')) + $arr;			
            return $arr;
        }
        return FALSE;
    }



    function update_user($intUserID = NULL, $arrData = NULL)
    {
        if (!$intUserID || !$arrData) return FALSE;
        $objQ = $this->db->update( $this->_tblUsers, array(
															'titleUser'=>$arrData['title_user'], 
															'nameUser'=>$arrData['name_user'], 
															'surnameUser'=>$arrData['surname_user'], 
															'descriptionUser'=>$arrData['description_user'], 
															'emailUser'=>$arrData['email_user'], 
															'telephoneUser'=>$arrData['telephone_user'], 
															'mobileUser'=>$arrData['mobile_user'], 
															'fkidUserRole'=>$arrData['role_user'], 
															'passportNumberUser'=>$arrData['passport_number_user'], 
															'cityUser'=>$arrData['city_user'], 
															'fkidUserRegion'=>$arrData['region_user'], 
															'fkidUserCountry'=>$arrData['country_user'], 
															'fkidUserLanguage'=>$arrData['language_user'] 
															), array('idUser'=>$intUserID) );
        return $this->db->affected_rows();
    }


    function create_user ($arrData = NULL)
    {
        if (!$arrData) return FALSE;

        $arrPwd = $this->_generate_password();
        $objQ = $this->db->insert( $this->_tblUsers, array(
															'titleUser'=>$arrData['title_user'], 
															'nameUser'=>$arrData['name_user'], 
															'surnameUser'=>$arrData['surname_user'], 
															'descriptionUser'=>$arrData['description_user'], 
															'emailUser'=>$arrData['email_user'], 
															'telephoneUser'=>$arrData['telephone_user'], 
															'mobileUser'=>$arrData['mobile_user'], 
															'fkidUserRole'=>$arrData['role_user'], 
															'enabledUser'=>1, 
															'creationDate'=>date('Y-m-d H:i:s'), 
															'passportNumberUser'=>$arrData['passport_number_user'], 
															'cityUser'=>$arrData['city_user'], 
															'fkidUserRegion'=>$arrData['region_user'], 
															'fkidUserCountry'=>$arrData['country_user'], 
															'fkidUserLanguage'=>$arrData['language_user'], 
															'loginPasswordHash'=>$arrPwd['hash'], 
															'loginPasswordSalt'=>$arrPwd['salt']));
        return $this->db->affected_rows();
    }


    function able_user ($intUserID = NULL){
        if (!$intUserID) return FALSE;
        $this->db->query("UPDATE " . $this->_tblUsers . " SET enabledUser = NOT enabledUser WHERE idUser = " . $intUserID );
        return $this->db->affected_rows();
    }

    function _check_email_exists ($strEmail){
        $objQ = $this->db->get_where( $this->_tblUsers, array ( 'emailUser'=>$strEmail ), 1 );
        if ( $objQ->num_rows()) return TRUE;
        return FALSE;
    }

    function _check_passport_exists ( $strPassportNumber )
    {
        $objQ = $this->db->get_where( $this->_tblUsers, array ( 'passportNumberUser'=>$strPassportNumber ), 1 );
        if ( $objQ->num_rows()) return TRUE;
        return FALSE;
    }


    function _generate_password (){
        $strNewSalt = $this->_generate_salt();
        $strNewPass = generate_random_password();
        $strNewHash = $this->_generate_hash ( $strNewPass, $strNewSalt );
        return array ( 'salt'=>$strNewSalt, 'hash'=>$strNewHash );
    }

    function _generate_hash ($strString, $strSalt){
         return hash('sha512', $strString . $strSalt);
    }   

    function _generate_salt(){
        return hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), TRUE));
    }
}