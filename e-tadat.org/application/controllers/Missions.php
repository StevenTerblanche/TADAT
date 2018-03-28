<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Missions extends Core_Controller {

	public $action, $form_data, $users_form_data, $id, $fkID, $tbl, $data, $content_data, $notify_array, $assigned_user;
	/*
		action 		 = Required by crud function in Crud_model
					 = create  - Creates and returns inserted id
					 = update  - Updates and returns updated id
					 = disable - Marks status = 0 in db where id = fkID
					 = delete  - Deletes entire row in db where id = fkID
		form_data 	 = gets posted data from view
		id 			 = The id returned via url that corresponds to an actual record in the database
		fkID 		 = The database field that the id above corresponds to
		tbl 		 = the table used for the current crud operations
		data		 = What gets loaded into the view and consists also of content_data
		content_data = Data array that is returned to page
					 = page_title: Title to appear at very top of page e.g. Manage Mission, Manage Users, Manage Authorities. The title is set via the core language file
					 = panel_icon: Icon to appear at top of panel and button
	*/
	function __construct(){
		parent::__construct();
		# Load specific js files here for the relevant section e.g. Mission, User, Authority etc.
		$this->add_external_js(array("/themes/core/js/jquery.dataTables.js", "/themes/core/js/dataTables.tableTools.js", "/themes/core/js/dataTables.bootstrap.js", "/themes/core/js/dataTables.responsive.js","/themes/core/js/bootstrap-datepicker.js", "/themes/core/js/views/missions.js"));

		# A CRUD model has been created that should handle most form crud operations but may be extended in future
		$this->load->model('crud_model');
        # Checks if delete / disable is sent as Action
		$this->action = ($this->input->get('a')) ? $this->input->get('a') : null;
		$this->form_data = ($this->input->post()) ? $this->input->post() : null;
		# Table operations are performed on
		$this->tbl = 'Missions';
        # Checks if id is sent and decrypts where necessary
        $this->id = ($this->input->get('id')) ? $this->encrypt->decode(base64_decode($this->input->get('id'))) : (($this->input->post('id')) ? $this->input->post('id') : null);
		# The database field that the id above corresponds to
		$this->fkID = 'id';
		$this->data = $this->includes;

		$this->page_header = strtoupper(lang('manage_').lang('missions'));
		$this->columns = 12;
		$this->panel_icon = 'fa fa-globe';
		$this->panel_title = lang('missions').lang('_listing');
		$this->content_data['submit_button'] = lang('action');
		$this->output->enable_profiler(false);
	}

	# Checks if id then show profile else shows listing

	function pdf(){
		$this->load->library('Pdf');
		$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->SetCreator(PDF_CREATOR);
		// Add a page
		$pdf->AddPage();
		$this->columns = 12;			
		$this->panel_title = lang('missions').lang('_listing');
		$this->content_data['get_record_all_missions'] = _get_record_all_missions();
		
		$html = $this->load->view('missions/list', $this->content_data, true);
		$pdf->writeHTML($html, true, false, true, false, '');
		$pdf->Output('asdf','D');
	}

	function read(){
		if($this->id && !$this->action){
			$this->columns = 12;
			$this->panel_title = lang('mission').lang('_profile');
			$this->content_data['get_record_by_id_mission'] = _get_record_by_id_missions($this->id);
			$this->content_data['get_record_by_id_rev_auth'] = _get_record_by_id_rev_auth($this->content_data['get_record_by_id_mission']->fkidRevenueAuthority);
			$this->content_data['get_record_by_id_rev_auth_ram'] = _get_record_by_id_rev_auth_ram($this->content_data['get_record_by_id_mission']->fkidRevenueAuthority);
			$this->content_data['get_record_by_id_rev_auth_counterpart'] = _get_record_by_id_rev_auth_counterpart($this->content_data['get_record_by_id_mission']->fkidRevenueAuthority);
	
			$this->content_data['get_record_by_id_team_leader'] = _get_record_by_id_team_leader($this->content_data['get_record_by_id_mission']->fkidTeamLeader);
			$this->data['content'] = $this->load->view('missions/profile', $this->content_data, true);
		}elseif(!$this->id && !$this->action){
			$this->columns = 12;			
			$this->panel_title = lang('missions').lang('_listing');

			if($this->user->fkidUserRole == 1){
				$this->content_data['get_record_all_missions'] = _get_record_all_missions();	
			}elseif($this->user->fkidUserRole == 2){
				$this->content_data['get_record_all_missions'] = _get_record_all_missions();
			}elseif($this->user->fkidUserRole == 4){
				$this->content_data['get_record_all_missions'] = _get_record_all_missions(1,$this->user->id,'4');
			}elseif($this->user->fkidUserRole == 5){
				$this->content_data['get_record_all_missions'] = _get_record_all_assigned_missions($this->user->id);
			}
		
			$this->data['content'] = $this->load->view('missions/list', $this->content_data, true);
		}
        $this->load->view($this->template, $this->data);
	}

/* TO DELETE
	function read_mtl(){
		if($this->id && !$this->action){
			$this->columns = 12;
			$this->panel_title = lang('mission').lang('_profile');
			$this->content_data['get_record_by_id_mission'] = _get_record_by_id_missions($this->id);
			$this->content_data['get_record_by_id_rev_auth'] = _get_record_by_id_rev_auth($this->content_data['get_record_by_id_mission']->fkidRevenueAuthority);
			$this->content_data['get_record_by_id_rev_auth_ram'] = _get_record_by_id_rev_auth_ram($this->content_data['get_record_by_id_mission']->fkidRevenueAuthority);
			$this->content_data['get_record_by_id_rev_auth_counterpart'] = _get_record_by_id_rev_auth_counterpart($this->content_data['get_record_by_id_mission']->fkidRevenueAuthority);
			$this->content_data['get_record_by_id_team_leader'] = _get_record_by_id_team_leader($this->content_data['get_record_by_id_mission']->fkidTeamLeader);
			$this->data['content'] = $this->load->view('missions/profile_mtl', $this->content_data, true);
		}elseif(!$this->id && !$this->action){
			$this->columns = 12;			
			$this->panel_title = lang('missions').lang('_listing');

			if($this->user->fkidUserRole == 1){
				$this->content_data['get_record_all_missions'] = _get_record_all_missions();	
			}elseif($this->user->fkidUserRole == 2){
				$this->content_data['get_record_all_missions'] = _get_record_all_missions(1,$this->user->id);
			}elseif($this->user->fkidUserRole == 4){
				$this->content_data['get_record_all_missions'] = _get_record_all_missions(1,$this->user->id,'4');
			}
		
			$this->data['content'] = $this->load->view('missions/list_mtl', $this->content_data, true);
		}
        $this->load->view($this->template, $this->data);
	}
	
	function manage_mtl(){
		if($this->id && !$this->action){
			$this->columns = 12;
			$this->panel_title = lang('mission').lang('_profile');
			$this->content_data['get_mission_details'] = _get_mission_by_assigned_id($this->id);
			$this->data['content'] = $this->load->view('missions/manage_mtl', $this->content_data, true);
		}
        $this->load->view($this->template, $this->data);
	}	

*/


	function modify(){
		# Used in Create and Update
		# This populates the Missions
		if($this->user->fkidUserRole == 2){

			$this->content_data['get_dropdown_all_rev_auth'] = ($this->user->fkidUserRole == 1 || $this->user->fkidUserRole == 2) ?  _get_dropdown_all_rev_auth_user() : _get_dropdown_all_rev_auth_user($this->user->id);
			$this->content_data['get_dropdown_all_team_leaders'] = ($this->user->fkidUserRole == 1 || $this->user->fkidUserRole == 2) ?  _get_dropdown_all_team_leaders() : _get_dropdown_all_team_leaders($this->user->id);

			# This populates the Revenue Authorities
			$this->content_data['get_dropdown_all_period'] = _get_dropdown_all_period();
			$this->content_data['get_dropdown_all_status'] = _get_dropdown_all_status();		

			#** CREATE ** 
			# This shows the 'create view' for a NEW record if no ID OR action 
			if(!$this->id && !$this->action){
				# Tell the crud function what to do.
				$this->action = 'create';
				# Populate view variables according to type
				$this->panel_title = lang('create_').lang('mission');;
				$this->content_data['submit_button'] = lang('create_').lang('mission');
				# This gets all the fields from the DB for the specified table and populates values in the view AFTER validation
				$this->content_data['get_fields'] = $this->db->list_fields($this->tbl);
				$this->content_data['uri'] = current_url();
				$this->data['content'] = $this->load->view('missions/create', $this->content_data, true);
			}

			# ** EDIT **
			# This shows the 'Edit view' with pre-populated form for the record if an ID is set with no action
			if($this->id && !$this->action){
				# Tell the crud function what to do.
				$this->action = 'update';
				# Populate view variables according to type			
				$this->panel_title = lang('update_').lang('mission');
				$this->content_data['submit_button'] = lang('update_').lang('mission');
				# Encrypts and encodes the id and sets URL
				$this->content_data['uri'] = current_url () . "?id=" . base64_encode($this->encrypt->encode($this->id));
				# Get the entire row as specified by the id
				$this->content_data['get_record_by_id'] = _get_record_by_id_missions($this->id);
				# Get the countries only for the current region as retreived from the Authority fkidRegion
				$this->data['content'] = $this->load->view('missions/create', $this->content_data, true);
			}

			# If there is an action and it is NOT delete OR disable run form validation
			if($this->action && ($this->action !=='disable' || $this->action !=='delete')){
				$this->load->helper('form');
				$this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
				$this->form_validation->set_rules('mission',   lang('mission').lang('_name'), 'required|trim');

				# If there is no errors and form validation passed
				if ($this->form_validation->run() == true && $this->session->flashdata('error') == false){
					$this->form_data['dateStart'] = date('Y-m-d', strtotime($this->form_data['dateStart']));
					$this->form_data['dateEnd'] = date('Y-m-d', strtotime($this->form_data['dateEnd']));				

					if($this->action === 'create'){
						$this->id = $this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID);
						$this->notify($this->id);
					}else{
						# This redirects after successfull create or update with the encrypted id as returned from the crud function to the Profiles page.
						redirect(base_url('missions/profile/?id='.base64_encode($this->encrypt->encode($this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID)))));					
					}


				}		
			}
			# This shows the 'Edit view' with pre-populated form for the record if an ID is set with no action
			if($this->id && ($this->action ==='enable' ||$this->action ==='disable' || $this->action ==='delete')){
				# Call crud function with relevant action
				$this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID);
				#redirect to listings View
				redirect(base_url('missions/list'));
			}
			
		}else{
			$this->page_header = "ACCESS DENIED";
			$this->panel_title = "UNAUTHORIZED ACCESS DETECTED";
			$this->data['content'] = $this->load->view('users/denied', $this->content_data, true);
		}		

			
			
		# Loads the template (view) and populates with $this->data
        $this->load->view($this->template, $this->data);
    }
	
	function notify($id = null){
		if($id){
			$this->notify_array = _get_ra_users_by_id_missions($id);
			
//			print_r($this->notify_array);
		
			foreach($this->notify_array as $row => $value){
				if($value && $value !== 0){
					$this->assigned_user = '';
					$this->assigned_user = _get_record_by_id_users($value);
					# Generate a password from Core Helper
					$tmp_password = _generate_random_password();
					# Generate a SALT from Core Helper
					$tmp_salt = _generate_salt();
					# Generate a HASH from the Password and SALT combined from Core Helper
					$tmp_hash = _generate_hash ($tmp_password, $tmp_salt);
					# Set the SALTED Password value in the posted form_data
					$this->users_form_data['loginPasswordSalt'] = $tmp_salt;
					# Set the HASH value in the posted form_data
					$this->users_form_data['loginPasswordHash'] = $tmp_hash;
					$this->users_form_data['mailSent'] = 1;
					$this->users_form_data['assignment_mail_sent'] = 0;							
	
					$this->crud_model->crud('update', 'Users', $this->users_form_data, $value, $this->fkID);
	
					# Build the e-mail message for a new user
					$email_subject = "LOGIN DETAILS";
					$email_msg =
						$this->config->item('start_html_email').
						'<p><strong>' . lang('dear_')._get_fields_by_id('Titles', 'id' ,$this->assigned_user->fkidTitle, array('title')).' '.$this->assigned_user->name.' '.$this->assigned_user->surname.'</strong></p>'.
						'<p>This serves to confirm that you have been added as a '._get_fields_by_id('UserRoles', 'id', $this->assigned_user->fkidUserRole, $out = array('role'), ' ')  .' on the e-Tadat Cloud platform.</p>'.
						'<p>Once logged in you will be able to complete the TADAT Pre Mission Questionnaire pertaining to the upcoming Tax Administration assessment.</p>'.
						'<p>'.lang('your_login_').lang('_platform').lang('_are').':</p>'.
						'<p><strong>'.lang('username_').'</strong>'.$this->assigned_user->email.'</p>'.
						'<p><strong>'.lang('password_').'</strong>'.$tmp_password.' (<i>'.lang('case_sensitive').'</i>)</p>'.
						'<p>'.lang('you_will_be_').'</p>'.
						'<p>'.lang('click_').'<a href="'.$this->config->item('base_url').'">'.lang('here').'</a>'.lang('_to_login_to_the_').$this->config->item('application_name').lang('_platform').'.</p>'.								
						'<p>'.lang('please_feel_free_').lang('_support').lang('_team').lang('_at_').'<a mailto:="'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a>'.lang('should_you_').lang('_platform').'.</p>'.
						'<p>'.lang('kind_regards').'</p>'.
						'<p><strong>'.$this->config->item('application_name').lang('_support').lang('_team').'</strong></p>'.
						'<p><a mailto:="'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a></p>'.
						$this->config->item('end_html_email');
				
					$this->load->helper('notify');
					# Send the E-mail
					_send_email(
								$this->config->item('support_from_address'),
								strtoupper($this->config->item('application_name')), 
								$this->config->item('support_reply_to_address'), 
								strtoupper($this->config->item('application_name')), 								
								$this->assigned_user->email, 
								$email_subject, 
								$email_msg);
				}					

			}
	
		}

		redirect(base_url('missions/profile/?id='.base64_encode($this->encrypt->encode($this->id))));
	}
	
}