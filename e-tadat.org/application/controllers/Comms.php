<?php defined('BASEPATH') OR exit('No direct script access allowed');


class Comms extends Core_Controller {

    # load assets
    function __construct()
    {
        parent::__construct();

    }


    function index ()
    {
    }








    function _build_messages ( $strNewPassword = "" )
    {
        # generate the SMS content including PIN,
        $this->load->helper('core');
        $strPIN = generate_random_pin();
        $strSMSText = lang("login msg sms_pin") . $strPIN . ". " . lang("login msg sms_pin_support");

        # build the email message including PIN hash
### FIXME: another call to a "private" method within another class... and duplicating same call in db update of set_pin()
        $strPINHash = $this->login_model->_generate_hash( $strPIN, $this->login_model->LoginUser->loginPasswordSalt );
        $email_msg  = lang('core email start');
### FIXME: site name should be configuration variable...
        $email_msg .= sprintf( lang( 'login msg email_password_reset' ), "eTadat Cloud", $strNewPassword, base_url('login/reset?h=' . $strPINHash ), base_url('login/reset?h=' . $strPINHash ) );
        $email_msg .= lang('core email end');

        return array ( 'sms_text'=>$strSMSText, 'email_msg'=>$email_msg, 'sms_pin'=>$strPIN );
    }


}  