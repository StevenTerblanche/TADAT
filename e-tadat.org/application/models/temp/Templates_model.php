<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Templates_model extends CI_Model {

    private $_tblTemplateTypes;
    private $_tblTemplates;


    private $_tblUsers, $_tblRoles, $_tblUserLanguages, $_tblUserMissions;



    function __construct()
    {
        parent::__construct();

        # define tables
        $this->_tblTemplateTypes = 'TemplateTypes';
        $this->_tblTemplates = 'Templates';
    }






    function get_all_template_types ()
    {
        $this->db->order_by( 'nameTemplateType', 'ASC' );
        $objQ = $this->db->get( $this->_tblTemplateTypes );

        if ( $objQ->num_rows() )
        {
            $arrTypes = array ();
            foreach ( $objQ->result_array() as $arrRow ) $arrTypes[] = $arrRow;
            return $arrTypes;
        }
        return NULL;
    }


    function get_template_type ( $intTTID )
    {
        if ( !$intTTID )    return FALSE;

        $objQ = $this->db->get_where( $this->_tblTemplateTypes, array ( 'idTemplateTypes'=>$intTTID ), 1 );

        if ( $objQ->num_rows() ) return $objQ->row();

        return FALSE;
    }



### FIXME: rows per page pagination should be global variable...
    function get_all_templates ( $intTemplateType, $intPerPage = 20 )
    {
        $this->db->order_by( 'nameTemplates', 'ASC' );
        $this->db->join( $this->_tblTemplateTypes, $this->_tblTemplateTypes . ".idTemplateTypes = " . $this->_tblTemplates . ".fkidTemplateType" );
        $objQ = $this->db->get( $this->_tblTemplates );

        if ( $objQ->num_rows() )return array ( 
                                        'pagination'=>array(
                                                    'base_url'=>base_url("templates/index?tt=" . $intTemplateType), 
                                                    'total_rows'=>$objQ->num_rows(),
                                                    'per_page'=>$intPerPage
                                                    ),
                                        'results'=>$objQ
                                        );

        return FALSE; 
    }


    function get_user( $intUserID = NULL )
    {
        if ( !$intUserID )    return FALSE;

        $objQ = $this->db->get_where( $this->_tblUsers, array ( 'idUser'=>$intUserID ), 1 );

        if ( $objQ->num_rows() ) return $objQ->row();

        return FALSE;
    }


    function get_all_roles( )
    {
        $this->db->select ( 'idUserRole, uinameUserRole' );
        $this->db->order_by ( 'idUserRole' );
        $objQ = $this->db->get( $this->_tblRoles );

        if ( $objQ->num_rows() )
        {
            $arrRoles = array ();
            foreach ( $objQ->result_array() as $arrRow ) $arrRoles[$arrRow['idUserRole']] = $arrRow['uinameUserRole'];
            return $arrRoles;
        }

        return FALSE;
    }


    function get_all_languages( )
    {
        $this->db->order_by ( 'idUserLanguages' );
        $objQ = $this->db->get( $this->_tblUserLanguages );

        if ( $objQ->num_rows() )
        {
            $arrRoles = array ();
            foreach ( $objQ->result_array() as $arrRow ) $arrRoles[$arrRow['idUserLanguages']] = $arrRow['nameUserLanguage'];
            return $arrRoles;
        }

        return FALSE;
    }


    function get_all_missions( )
    {
        $this->db->order_by ( 'idUserMissions' );
        $objQ = $this->db->get( $this->_tblUserMissions );

        if ( $objQ->num_rows() )
        {
            $arrRoles = array ();
            foreach ( $objQ->result_array() as $arrRow ) $arrRoles[$arrRow['idMissions']] = $arrRow['nameUserLanguage'];
            return $arrRoles;
        }

        return FALSE;
    }


    function update_user ( $intUserID = NULL, $arrData = NULL )
    {
        if ( !$intUserID || !$arrData )    return FALSE;

        $objQ = $this->db->update( $this->_tblUsers, array('titleUser'=>$arrData['title_user'], 'nameUser'=>$arrData['name_user'], 'surnameUser'=>$arrData['surname_user'], 'descriptionUser'=>$arrData['description_user'], 'emailUser'=>$arrData['email_user'], 'telephoneUser'=>$arrData['telephone_user'], 'mobileUser'=>$arrData['mobile_user'], 'fkidUserRole'=>$arrData['role_user'], 'passportNumberUser'=>$arrData['passport_number_user'], 'fkidUserLanguage'=>$arrData['language_user'] ), array('idUser'=>$intUserID) );
        
        return $this->db->affected_rows();
    }


    function create_user ( $arrData = NULL )
    {
        if ( !$arrData )    return FALSE;
        if ( $this->_check_email_exists( $arrData['email_user']) )
        {
### FIXME: needs a lang()
            $this->set_flashdata ( 'error', 'Entered email address already exists.' );
            return FALSE;
        }

        $arrPwd = _generate_password();

        $objQ = $this->db->insert( $this->_tblUsers, array('titleUser'=>$arrData['title_user'], 'nameUser'=>$arrData['name_user'], 'surnameUser'=>$arrData['surname_user'], 'descriptionUser'=>$arrData['description_user'], 'emailUser'=>$arrData['email_user'], 'telephoneUser'=>$arrData['telephone_user'], 'mobileUser'=>$arrData['mobile_user'], 'fkidUserRole'=>$arrData['role_user'], 'enabledUser'=>1, 'creationDate'=>date('Y-m-d H:i:s'), 'passportNumberUser'=>$arrData['passport_number_user'], 'fkidUserLanguage'=>$arrData['language_user'], 'loginPasswordHash'=>$arrPwd['hash'], 'loginPasswordSalt'=>$arrPwd['salt'] ) );
        
        return $this->db->affected_rows();
    }


    function able_user ( $intUserID = NULL )
    {
        if ( !$intUserID )  return FALSE;

        $this->db->query("UPDATE " . $this->_tblUsers . " SET enabledUser = NOT enabledUser WHERE idUser = " . $intUserID );
        return $this->db->affected_rows();
    }


    function _check_email_exists ( $strEmail )
    {
        $objQ = $this->db->get_where( $this->_tblUsers, array ( 'emailUser'=>$strEmail ), 1 );

        if ( $objQ->num_rows() ) return TRUE;

        return FALSE;
    }


    function _generate_password ()
    {
        $strNewSalt = $this->_generate_salt();
        $strNewPass = generate_random_password();
        $strNewHash = $this->_generate_hash ( $strNewPass, $strNewSalt );

        return array ( 'salt'=>$strNewSalt, 'hash'=>$strNewHash );
    }


    function _generate_hash ( $strString, $strSalt )
    {
         return hash( 'sha512', $strString . $strSalt );
    }   


    function _generate_salt ()
    {
        return hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), TRUE));
    }




}
