<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Notification extends Core_Controller {
    function __construct(){
        parent::__construct();
		$this->add_external_js(array("/themes/core/js/jquery.dataTables.js", "/themes/core/js/dataTables.tableTools.js", "/themes/core/js/dataTables.bootstrap.js", "/themes/core/js/dataTables.responsive.js", "/themes/core/js/views/users.js"));
    }

    function notify_mtl($id = null){
		# Prepare the 'parameters' array (which will be passed to the Users Library Class) with the table to be queried as well as an array of fields to query
//		$parameters = array('table' => 'Users', 'fields'=>array('email' => $this->input->post('username', true)));

				// Select al die users vir die RA
					// Loop deur en assign nuwe temp passwords
					// Stuur e-mail

						# Generate a password from Core Helper
						$tmp_password = _generate_random_password();
						# Generate a SALT from Core Helper
						$tmp_salt = _generate_salt();
						# Generate a HASH from the Password and SALT combined from Core Helper
						$tmp_hash = _generate_hash ($tmp_password, $tmp_salt);
						# Set the SALTED Password value in the posted form_data
						$this->form_data['loginPasswordSalt'] = $tmp_salt;
						# Set the HASH value in the posted form_data
						$this->form_data['loginPasswordHash'] = $tmp_hash;
						# Create the user and grab the returned id (new or updated)
						$created_id = $this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID);
						# Set the usr object by taking the returned id and retreiving details from DB.







$parameters = array('table' => 'Users', 'fields'=>array('email' => 'counterpart.01@e-tadat.org'));		
		# Load the Users library with populated parameters array
		$this->load->library('users',$parameters);
		# If the e-mail is found then it returns objUser with all details for the specific e-mail address in the Users table
		if ($this->users->objUser){
			# If the e-mail is found and the user account is enabled 
			if($this->users->objUser->status == 1){
				# Check the password against the hash and salt
				echo 'ddddddddddddddddddddddd';
			}
		}


/*
function _check_hash ($strStored, $strPassed, $strSalt){
	if ($strStored == hash('sha512', $strPassed . $strSalt)) return true;
	return false;
}
*/
/*

				if (_check_hash($this->users->objUser->loginPasswordHash, $this->input->post('password', true), $this->users->objUser->loginPasswordSalt)){
					# Build the userdata session from the _create_user_session_helper
					_set_user_session_by_id(get_instance()->users->objUser->id);
					$this->login_model->update_stats(get_instance()->users->objUser->id);
	//				redirect(base_url());
				}else{
					$this->session->set_userdata('logged_in', 0);
					$this->session->set_flashdata('error', lang('incorrect_password'));	
				}
			}else{
				$this->session->set_userdata('logged_in', 0);
				$this->session->set_flashdata('error', lang('account_disabled'));
			}
		}else{
			# If the e-mail is not found then it returns an error message
			$this->session->set_flashdata('error', lang('email_not_exist'));
		}
*/
        $data = $this->includes;
        $data['content'] = $this->load->view('notifications/send_notifications', null, true);
        $this->load->view($this->template, $data);
		
	}
}