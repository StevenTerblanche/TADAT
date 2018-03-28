<?php defined('BASEPATH') OR exit('No direct script access allowed');


	function _show_array($passed_array, $heading = null){
		if($heading){
			echo '<pre>';
				echo '<b>'.$heading.'</b><br>';
		}else{
			echo '<pre>';
		}
		
		print_r($passed_array);
		echo '</pre>';		
	}




# GLOBAL GROUP MEMBERSHIP ERROR
	function _invalid(){
		get_instance()->page_header = 'GROUP MEMBERSHIP EXCEPTION';
		get_instance()->data['content'] =get_instance()->load->view('portal/errors/invalid_group_membership', get_instance()->content_data, true);
		get_instance()->load->view(get_instance()->template,get_instance()->data);		
	}

# Generates a random AlphaNumeric 8 Character long password for initital user registration
function _generate_random_password(){
	$characters = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
	$pass = array();
	$alpha_length = strlen($characters) - 1;
	for ($i = 0; $i < 8; $i++){
		$n = rand(0, $alpha_length);
		$pass[] = $characters[$n];
	}
	return implode($pass);
}
function _generate_random_reference($id, $length){
	if(!$id) $id='';
	$characters = 'ABCDEFGHIJKLMNOPQRSTUWXYZ123456789';
	$random_string_length = $length;
	$string = '';
	 $max = strlen($characters) - 1;
	 for ($i = 0; $i < $random_string_length; $i++) {
		  $string .= $characters[mt_rand(0, $max)];
	 }
	$reference = $id.$string;
	return $reference;
}



# Generates a SHA512 HASH from a random string
function _generate_salt (){
	return hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
}

# This is used for any strings that need to be hashed against a know (supplied) salt
function _generate_hash ($strString, $strSalt){
	return hash('sha512', $strString . $strSalt);
}

# This is used for the reset password 2 factor authentication SMS
function _generate_random_pin(){
	$characters = "0123456789";
	$pass = array();
	$alpha_length = strlen($characters) - 1;
	for ($i = 0; $i < 5; $i++){
		$n = rand(0, $alpha_length);
		$pass[] = $characters[$n];
	}
	return implode($pass);
}

# Compares the users hashed password from the LoginUser object against the hashed(sha512) supplied password + the SALT from the LoginUser object
function _check_hash ($strStored, $strPassed, $strSalt){
	if ($strStored == hash('sha512', $strPassed . $strSalt)) return true;
	return false;
}

function _groupMembership($group = null, $rights = null) {
   foreach (get_instance()->user->GroupsAssigned as $key => $val) {
		if($rights && $group){
		   if ($val['Group'] === $group && $val['Rights'] === $rights) {
			   return $val;
		   }
		}
		if(!$rights && $group){
		   if ($val['Group'] === $group) {
			   return $val;
		   }
		}
   }
   return null;
}

