<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	# Gets called when submitted from view/login/forgot
	function update($newPassHash, $newSalt, $id, $loginPasswordChange){
		# Update the Users table with the new values
		$this->db->update('Users', array('loginPasswordChange'=>$loginPasswordChange, 'loginPasswordHash'=>$newPassHash, 'loginPasswordSalt'=>$newSalt, 'loginResetPasswordTill'=>date('Y-m-d H:i:s', strtotime('+1 hour'))), array('id'=>$id));
		# If Users updated, then update the UserPasswordResets table
		if ($this->db->affected_rows()){
			# update the UserPasswordResets table with the LoginUser id and ip address from where the request is made.
			$this->db->insert('UserPasswordResets', array('fkidUsers' => $id,'loginResetPasswordPINHash' => $newPinHash, 'emailSentTo' => $this->users->objUser->email, 'mobileSentTo' => $this->users->objUser->mobile, 'mobileSentAt' => date('Y-m-d H:i:s'), 'emailSentAt' => date('Y-m-d H:i:s'), 'ipResetRequest' => ip2long($this->input->ip_address())));
			if ($this->db->affected_rows())	return true;
		}
		return false;
	}

	function update_password($strNewPassword, $id) {
		if (is_null($strNewPassword) || is_null($id))return false;
		$this->db->update('Users', array('loginPasswordHash'=>generate_hash($strNewPassword, $this->users->objUser->loginPasswordSalt), 'loginResetPasswordPINHash'=>'', 'loginResetPasswordTill'=>''), array('id'=>$id));
	}
	
	function update_stats($id) {
		if (is_null($id))return false;
		$this->db->insert('UsersLogins', array('fkidUser'=>$this->users->objUser->id, 'date'=> date('Y-m-d H:i:s')));
	}	
}