<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Assignments extends Core_Controller {
	public $action, $notify_array, $form_data, $users_form_data, $id, $fkID, $tbl, $data, $content_data, $assigned_user;
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
		$this->add_external_js(array("/themes/core/js/jquery.dataTables.js", "/themes/core/js/dataTables.tableTools.js", "/themes/core/js/dataTables.bootstrap.js", "/themes/core/js/dataTables.responsive.js","/themes/core/js/jquery-check-all.js", "/themes/core/js/views/assignments.js"));
		# The encrypt library is loaded to allow for id obfuscation. Usage =  $this->encrypt->decode(base64_decode(var_name))
		$this->load->library('encrypt');
		$this->load->helper('url');		
		# A CRUD model has been created that should handle most form crud operations but may be extended in future
		$this->load->model('crud_model');
        # Checks if delete / disable is sent as Action
		$this->database = 'db_b';
		# Table operations are performed on
		$this->tbl = 'RightsAssignmentsIndicators';
		$this->action = ($this->uri->segment('3') && $this->uri->segment('3') !== 'pna') ? $this->uri->segment('3') : '';
        $this->id = ($this->uri->segment('4') && $this->uri->segment('4') !== 'pni') ? $this->encrypt->decode(base64_decode($this->uri->segment('4'))) : (($this->input->post('id')) ? $this->input->post('id') : '');

		$this->form_data = ($this->input->post()) ? $this->input->post() : null;
		# The database field that the id above corresponds to
		$this->fkID = 'id';
		$this->data = $this->includes;
		$this->columns = 12;
		$this->page_header = strtoupper(lang('manage_').lang('assignments'));
		$this->panel_icon = 'fa fa-sliders';
		$this->panel_title = strtoupper(lang('assignment') . lang('_listing'));		
		$this->content_data['submit_button'] = lang('action');
		$this->output->enable_profiler(false);		
	}

	function read(){
		if(!$this->id){
			$this->panel_title = strtoupper(lang('assignment') . lang('_listing'));

			if($this->user->fkidUserRole == 1){
				$this->content_data['arrAllAssignments'] = _get_record_all_assignments();
			}elseif($this->user->fkidUserRole == 2 || $this->user->fkidUserRole == 4){
				if(isset($this->user->assignedMission)) {
					$this->content_data['arrAllAssignments'] = _get_record_all_assignments($this->user->assignedMission);
				}else{
					$this->content_data['arrAllAssignments'] = null;
					
				}
			}
			$this->data['content'] = $this->load->view('assignments/list', $this->content_data, true);
		}
        $this->load->view($this->template, $this->data);
	}
	
	# NORMAL ASSIGNMENTS -Authority - Mission - Performance Indicator - Assessor
	function modify(){
		
		if($this->user->fkidUserRole == 2 || $this->user->fkidUserRole == 4){

					#** CREATE ** 
					# This shows the 'create view' for a NEW record if no ID OR action 
					if(!$this->id && !$this->action){
						# Tell the crud function what to do.
						$this->action = 'create';
						# Populate view variables according to type
						$this->panel_title = lang('assign_').lang('a_').lang('user');
						$this->content_data['submit_button'] = lang('assign_').lang('user');
						# This gets all the fields from the DB for the specified table and populates values in the view AFTER validation
						$this->content_data['get_fields'] = $this->db->list_fields($this->tbl);

						if(isset($this->user->assignedTa)){
							$this->content_data['get_dropdown_all_authorities'] = _get_dropdown_all_rev_auth($this->user->assignedTa);
						}else{
							$this->content_data['get_dropdown_all_authorities'] = null;
						}

						$this->content_data['get_dropdown_all_users'] = _get_dropdown_all_users_assignments();
						$this->content_data['uri'] = current_url();
						$this->data['content'] = $this->load->view('assignments/create', $this->content_data, true);
					}

					# ** EDIT **
					# This shows the 'Edit view' with pre-populated form for the record if an ID is set with no action
					if($this->id && $this->action === 'update'){
						# Populate view variables according to type			
						$this->panel_title = lang('update_').lang('assignment');
						$this->content_data['submit_button'] = lang('update_').lang('assignment');
						# Encrypts and encodes the id and sets URL
						$this->content_data['uri'] = current_url ();
						# Get the entire row as specified by the id
						$this->content_data['arrAllAssignments'] = _get_record_by_id_assignment($this->id);
						$this->content_data['get_dropdown_all_authorities'] = _get_dropdown_all_rev_auth();
						$this->content_data['get_dropdown_all_missions'] = _get_dropdown_all_missions();
						$this->content_data['get_dropdown_all_indicators'] = _get_dropdown_all_poas();
						$this->content_data['get_dropdown_all_users'] = _get_dropdown_all_users_assignments();
						$this->content_data['updater'] = 'yes';			
						$this->data['content'] = $this->load->view('assignments/create', $this->content_data, true);
					}

					# If there is an action and it is NOT delete OR disable run form validation
					if($this->action && ($this->action !=='disable' || $this->action !=='delete')){
						$this->load->helper('form');
						$this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
						$this->form_validation->set_rules('fkidMission', lang('mission').lang('_name'), 'required|trim');
						# If there is no errors and form validation passed
						if ($this->form_validation->run() == true && $this->session->flashdata('error') == false){
						# Check if all assignements are removed
							if(
								(!isset($this->form_data['P1-1']) || $this->form_data['P1-1'] == 0) && 
								(!isset($this->form_data['P1-2']) || $this->form_data['P1-2'] == 0) && 
								(!isset($this->form_data['P2-3']) || $this->form_data['P2-3'] == 0) && 
								(!isset($this->form_data['P2-4']) || $this->form_data['P2-4'] == 0) && 
								(!isset($this->form_data['P2-5']) || $this->form_data['P2-5'] == 0) && 
								(!isset($this->form_data['P2-6']) || $this->form_data['P2-6'] == 0) && 
								(!isset($this->form_data['P3-7']) || $this->form_data['P3-7'] == 0) && 
								(!isset($this->form_data['P3-8']) || $this->form_data['P3-8'] == 0) && 
								(!isset($this->form_data['P3-9']) || $this->form_data['P3-9'] == 0) && 
								(!isset($this->form_data['P4-10']) || $this->form_data['P4-10'] == 0) && 
								(!isset($this->form_data['P4-11']) || $this->form_data['P4-11'] == 0) && 
								(!isset($this->form_data['P5-12']) || $this->form_data['P5-12'] == 0) && 
								(!isset($this->form_data['P5-13']) || $this->form_data['P5-13'] == 0) && 
								(!isset($this->form_data['P5-14']) || $this->form_data['P5-14'] == 0) && 
								(!isset($this->form_data['P5-15']) || $this->form_data['P5-15'] == 0) && 
								(!isset($this->form_data['P6-16']) || $this->form_data['P6-16'] == 0) && 
								(!isset($this->form_data['P6-17']) || $this->form_data['P6-17'] == 0) && 
								(!isset($this->form_data['P6-18']) || $this->form_data['P6-18'] == 0) && 
								(!isset($this->form_data['P7-19']) || $this->form_data['P7-19'] == 0) && 
								(!isset($this->form_data['P7-20']) || $this->form_data['P7-20'] == 0) && 
								(!isset($this->form_data['P7-21']) || $this->form_data['P7-21'] == 0) && 
								(!isset($this->form_data['P8-22']) || $this->form_data['P8-22'] == 0) && 
								(!isset($this->form_data['P8-23']) || $this->form_data['P8-23'] == 0) && 
								(!isset($this->form_data['P8-24']) || $this->form_data['P8-24'] == 0) && 
								(!isset($this->form_data['P9-25']) || $this->form_data['P9-25'] == 0) && 
								(!isset($this->form_data['P9-26']) || $this->form_data['P9-26'] == 0) && 
								(!isset($this->form_data['P9-27']) || $this->form_data['P9-27'] == 0) && 																																																																																																																																		
								(!isset($this->form_data['P9-28']) || $this->form_data['P9-28'] == 0)){
								$this->action = 'delete';
							}


			//echo '<pre>';
			//print_r($this->form_data);

							$assignmentId = $this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID);

				//			echo $assignmentId;



							if($this->action === 'create' && $assignmentId != null){
								$this->notify($assignmentId);
							}else{
								redirect(base_url('assignments/list'));
							}

						}		
					}
					# This shows the 'Edit view' with pre-populated form for the record if an ID is set with no action
					if($this->id && ($this->action ==='enable' || $this->action ==='disable' || $this->action ==='delete')){
						# Call crud function with relevant action
						$this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID);
						#redirect to listings View
							redirect(base_url('assignments/list'));
					}
		}else{
			$this->page_header = "ACCESS DENIED";
			$this->panel_title = "UNAUTHORIZED ACCESS DETECTED";
			$this->data['content'] = $this->load->view('users/denied', $this->content_data, true);
		}
		# Loads the template (view) and populates with $this->data
        $this->load->view($this->template, $this->data);
    }
	function notify($assignmentId = null){
		if ($assignmentId == null) return false;
		$this->notify_array = _get_user_assignments_by_id_missions($assignmentId);
		$country = _get_fields_by_id('Countries', 'id', $this->notify_array->authority_country, $out = array('country'));
		$region = _get_fields_by_id('Regions', 'id', $this->notify_array->authority_region, $out = array('region'));
		
		$this->assigned_user = _get_record_by_id_users($this->form_data['fkidUser']);

		$arrIndicatorString = array('P1-1','P1-2','P2-3','P2-4','P2-5','P2-6','P3-7','P3-8','P3-9','P4-10','P4-11','P5-12','P5-13','P5-14','P5-15','P6-16','P6-17','P6-18','P7-19','P7-20','P7-21','P8-22','P8-23','P8-24','P9-25','P9-26','P9-27','P9-28');

		$strAssignedPoas = array();
		foreach($this->form_data as $key => $value){
			if(in_array($key,$arrIndicatorString)){
				if($value == 1){
				$strAssignedPoas[] =  _get_fields_by_id('PerformanceIndicators', 'indicatorNumber', $key, array('indicatorNumber','indicatorName'), ' - ', 'db_b').'';
				}
			}						
		}
		$poa_names = '';

		foreach($strAssignedPoas as $row => $value){$poa_names .= '<li>'.$value.'</li>';}
			# Build the e-mail message for a new user
			$email_subject = 'TADAT PERFORMANCE INDICATOR ASSIGNMENTS';
			$email_msg =
				$this->config->item('start_html_email').
				'<p><strong>' . lang('dear_')._get_fields_by_id('Titles', 'id' ,$this->assigned_user->fkidTitle, array('title')).' '.$this->assigned_user->name.' '.$this->assigned_user->surname.'</strong></p>'.
				'<p>This serves to confirm that you have been assigned as '. _get_fields_by_id('UserRoles', 'id', $this->assigned_user->fkidUserRole, $out = array('role'), ' ') .' for the '. $this->notify_array->mission_name .' mission.</p>'.
				'<p>The mission takes place at the '. $this->notify_array->authority_name . ' Tax Administration offices from ' . date("j F Y",strtotime($this->notify_array->startDate)) . ' to ' . date("j F Y",strtotime($this->notify_array->endDate)) . ' and is geographically located in the city of '. $this->notify_array->authority_city . ',  ' . $country. ', '. $region. '.</p>'.
				'<p>You are tasked to assess the following Performance Indicator/s:</p><ul>'.$poa_names.'</ul>';
				$email_msg .= '<p>'.lang('please_feel_free_').lang('_support').lang('_team').lang('_at_').'<a mailto:="'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a>'.lang('should_you_').lang('_platform').'.</p>'.
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
						$this->config->item('application_name'), 
						$this->assigned_user->email, 
						$email_subject, 
						$email_msg
					);
		
	redirect(base_url('assignments/list/'));
	}
}