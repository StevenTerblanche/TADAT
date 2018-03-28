<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Workshops extends Core_Controller {

	public $data, $assets, $content_data, $id, $action;

	function __construct() {
		parent::__construct();
		$this->load->model('cm_model');	
        $this->id = ($this->input->get('id')) ? $this->encrypt->decode(base64_decode($this->input->get('id'))) : (($this->input->post('id')) ? $this->input->post('id') : null);
		$this->action = ($this->input->get('a')) ? $this->input->get('a') : null;		
		$this->form_data = ($this->input->post()) ? $this->input->post() : null;
		$this->data = $this->includes;
		$this->load->helper('training/workshops/workshop');
		$this->load->model('crud_model');
		$this->page_header = 'MANAGE WORKSHOPS';		
	}
	
	function read(){
		$this->panel_title = 'CURRENT WORKSHOPS';
		$this->panel_icon = 'fa fa-th-list';

		if($this->user->fkidUserRole === '11'){
	        $this->content_data['get_record_all_workshops'] = _get_record_all_workshops($this->user->id);
		}else if($this->user->fkidUserRole === '12'){
	        $this->content_data['get_record_all_workshops'] = _get_record_all_workshop_by_attendees($this->user->id);
		}else{
			$this->content_data['get_record_all_workshops'] = _get_record_all_workshops();	
		}
		$this->data['content'] = $this->load->view('training/workshops/workshop_list', $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}
	
	function test_result(){
		$this->panel_title = 'CURRENT TEST RESULT';
		$this->panel_icon = 'fa fa-graduation-cap';
        $this->content_data['get_record_workshop_test_result'] = _get_record_workshop_test_result();
		$this->data['content'] = $this->load->view('training/workshops/workshop_test_result', $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}	

	function test_result_by_id(){
		$this->panel_title = 'TEST RESULTs';
		$this->panel_icon = 'fa fa-graduation-cap';
        $this->content_data['get_record_workshop_test_result_by_id'] = _get_record_workshop_test_result_by_id($this->id);
		$this->data['content'] = $this->load->view('training/workshops/workshop_test_result_by_id', $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}	
	
	function test(){
		$this->panel_title = 'WORKSHOP TEST';
		$this->panel_icon = 'fa fa-graduation-cap';
        $this->content_data['workshop_id'] = $this->id;
		$this->data['content'] = $this->load->view('training/workshops/workshop_test', $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}		



	function modify(){
		$this->panel_title = 'CREATE A WORKSHOP';
		$this->add_external_css(array("/themes/core/css/bootstrap-datetimepicker.css"));
		$this->add_external_js(array("/themes/core/js/date-time-picker/moment.js", "/themes/core/js/date-time-picker/transition.js", "/themes/core/js/date-time-picker/collapse.js", "/themes/core/js/date-time-picker/bootstrap-datetimepicker.js", "/themes/core/js/views/training/workshops/workshops.js"));
		$this->data = $this->includes;		

		#** CREATE ** 
		# This shows the 'create view' for a NEW record if no ID OR action 
		if(!$this->id && !$this->action){
			# Tell the crud function what to do.
			# Populate view variables according to type
			$this->panel_title = lang('create').' '.lang('workshop');;
			$this->content_data['submit_button'] = lang('create') . ' ' .lang('workshop');
			# This gets all the fields from the DB for the specified table and populates values in the view AFTER validation
			$this->content_data['get_fields'] = $this->db_training->list_fields('Workshops');
			$this->content_data['uri'] = base_url('workshops/insert');
			$this->content_data['get_dropdown_all_region'] = _get_dropdown_all_region();
			$this->content_data['get_dropdown_all_workshop_ra_administrators'] = _get_dropdown_all_workshop_ra_administrators();		
			$this->content_data['get_dropdown_all_secretariats'] = _get_dropdown_all_secretariat();
			$this->content_data['get_dropdown_all_workshop_types'] = _get_dropdown_all_workshop_types();
			$this->content_data['get_dropdown_all_workshop_links'] = _get_dropdown_all_workshop_links();			
			$this->content_data['get_dropdown_all_workshop_duration'] = _get_dropdown_all_workshop_duration();			
			$this->data['content'] = $this->load->view('training/workshops/workshop_create', $this->content_data, true);
			# Loads the template (view) and populates with $this->data
    	    $this->load->view($this->template, $this->data);			
		}
    }
	function insert(){
		$this->panel_title = 'CREATE A WORKSHOP';
		
		$this->add_external_css(array("/themes/core/css/bootstrap-datetimepicker.css"));
		$this->add_external_js(array("/themes/core/js/date-time-picker/moment.js", "/themes/core/js/date-time-picker/transition.js", "/themes/core/js/date-time-picker/collapse.js", "/themes/core/js/date-time-picker/bootstrap-datetimepicker.js", "/themes/core/js/views/training/workshops/workshops.js"));
		$this->data = $this->includes;		

			# Tell the crud function what to do.
			$this->action = 'create';
			$this->id = $this->crud_model->crud($this->action, 'Workshops', $this->form_data, null, null, 'db_training');

			$this->notify($this->id, $this->form_data['WorkshopRevenueAuthorityContactFkId']);
    }	



/* REGISTER AND INVITE WORKSHOP ATTENDEES */
	function invite_workshop_attendees_create(){
		$this->content_data['uri'] = base_url('workshops/invite/register');
        $this->content_data['get_dropdown_all_titles'] = _get_dropdown_all_titles();		
		$this->content_data['submit_button'] = lang('invite_').lang('attendee');				
		$this->panel_title = 'ADD WORKSHOP ATTENDEES';
		$this->add_external_css(array("/themes/core/css/bootstrap-datetimepicker.css"));
		$this->add_external_js(array("/themes/core/js/date-time-picker/moment.js", "/themes/core/js/date-time-picker/transition.js", "/themes/core/js/date-time-picker/collapse.js", "/themes/core/js/date-time-picker/bootstrap-datetimepicker.js", "/themes/core/js/views/training/workshops/workshops.js"));
		$this->data = $this->includes;		
		$this->content_data['workshopId'] = $this->id;
		$this->data['content'] = $this->load->view('training/workshops/workshop_attendees_add', $this->content_data, true);
   	    $this->load->view($this->template, $this->data);
    }	

	function invite_workshop_attendees_register(){
		$this->add_external_css(array("/themes/core/css/bootstrap-datetimepicker.css"));
		$this->add_external_js(array("/themes/core/js/date-time-picker/moment.js", "/themes/core/js/date-time-picker/transition.js", "/themes/core/js/date-time-picker/collapse.js", "/themes/core/js/date-time-picker/bootstrap-datetimepicker.js", "/themes/core/js/views/training/workshops/workshops.js"));
		$this->data = $this->includes;		
		$workshop_id = $this->form_data['WorkshopFkId'];
		$this->session->set_flashdata('workshop_id', $workshop_id);
		$this->form_data['referenceNumber'] = _generate_random_reference($workshop_id, 8);
		$this->action = 'create';
		$this->id = $this->crud_model->crud($this->action, 'WorkshopInvitees', $this->form_data, null, null, 'db_training');
	
		/* NOTIFY ATTENDEES */
		$this->load->helper('cloud/get_record_by_id');	

		if($this->id){
			$workshop_administratorFkid = _global_get_fields_by_id('Workshops', 'id' ,$workshop_id, array('WorkshopRevenueAuthorityContactFkId'),null, 'db_training');					
			$workshop_administrator = _global_get_user_full_name($workshop_administratorFkid);
			$workshop_name = _global_get_fields_by_id('Workshops', 'id' ,$workshop_id, array('WorkshopName'),null, 'db_training');		
			$workshop_start = _global_get_fields_by_id('Workshops', 'id' ,$workshop_id, array('WorkshopStartDate'),null, 'db_training');					
			$workshop_end = _global_get_fields_by_id('Workshops', 'id' ,$workshop_id, array('WorkshopEndDate'),null, 'db_training');					
			$workshop_facilitator = _global_get_fields_by_id('Workshops', 'id' ,$workshop_id, array('WorkshopFacilitator'),null, 'db_training');					
			$workshop_address = _global_get_fields_by_id('Workshops', 'id' ,$workshop_id, array('WorkshopAddress'),null, 'db_training');																	
			$workshop_city = _global_get_fields_by_id('Workshops', 'id' ,$workshop_id, array('WorkshopCity'),null, 'db_training');																				

			$workshop_message = '<p> You have been invited by '.$workshop_administrator.
								'  to attend a TADAT Workshop, '.$workshop_name.', being facilitated by '.$workshop_facilitator.', 
								that has been scheduled from '.$workshop_start.' to '.$workshop_end.' taking place at '.$workshop_address. ' located in '.$workshop_city.'.</p>';
			$workshop_message .= '<p>Your invitation code is: '.$this->form_data['referenceNumber'].'</p>';
			$workshop_message .= '<p>To <b>accept</b> the invitation, you may click <a href="'. base_url('register/invitation').'/?type='.$this->encrypt->encode('invitation').'">'.lang('here').'</a> to complete a brief registration form. </p><p>This registration will then allow you access to the following:</p>';
			$workshop_message .= '<ul>';
			$workshop_message .= '<li>TADAT Workshops in your region, including the above mentioned workshop. </li>';
			$workshop_message .= '<li>TADAT Connect - The TADAT social media platform for Tax Administrators</li>';						
			$workshop_message .= '<li>TADAT Surveys - A TADAT platform to gauge your views on TADAT related activities.</li>';			
			$workshop_message .= '</ul>';			
			$workshop_message .= '<p>To <b>decline</b> the invitation, kindly click <a href="'. base_url('register/decline').'/?id='.$this->form_data['referenceNumber'].'">'.lang('here').'</a> to notify '.$workshop_administrator.' that you will not be able to attend.</p>';
				# Build the e-mail message for a new user
				$email_subject = "TADAT WORKSHOP INVITATION";
				$email_msg =
					$this->config->item('start_html_email').
					'<p><strong>' . lang('dear_')._global_get_fields_by_id('Titles', 'id', $this->form_data['fkidTitle'], array('title'),null, 'db_portal').' '.$this->form_data['name'].' '.$this->form_data['surname'].'</strong></p>'.
					$workshop_message.
					'<p>'.lang('please_feel_free_').lang('_support').lang('_team').lang('_at_').'<a mailto:="'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a>'.lang('should_you_').lang('_platform').'.</p>'.
					'<p>'.lang('kind_regards').'</p>'.
					'<p><strong>'.$this->config->item('application_name').lang('_support').lang('_team').'</strong></p>'.
					'<p><a mailto:="'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a></p>'.
					$this->config->item('end_html_email');
			
					$this->load->helper('portal/notify');
					# Send the E-mail
					_send_email(
								$this->config->item('support_from_address'),
								strtoupper($this->config->item('application_name')), 
								$this->config->item('support_reply_to_address'), 
								strtoupper($this->config->item('application_name')), 								
								$this->form_data['email'], 
								$email_subject, 
								$email_msg);
				}			
		
		$this->content_data['get_record_all_workshop_invitees'] = _get_record_all_workshop_invitees($workshop_id);
		$this->data['content'] = $this->load->view('training/workshops/workshop_invitees_list', $this->content_data, true);
   	    $this->load->view($this->template, $this->data);
   }	


	function select_workshop(){
		$this->panel_title = 'CURRENT WORKSHOPS';
		$this->panel_icon = 'fa fa-th-list';
		$this->content_data['uri'] = base_url('workshops/select/submit');
		$this->content_data['submit_button'] = "Next";
		if($this->user->fkidUserRole === '11'){
	        $this->content_data['get_record_all_workshops'] = _get_record_list_workshops($this->user->id);
		}else{
			$this->content_data['get_record_all_workshops'] = _get_record_list_workshops();
		}
		$this->data['content'] = $this->load->view('training/workshops/workshop_selector', $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}
	
	function select_workshop_submit(){
		$this->content_data['uri'] = base_url('workshops/invite/register');
        $this->content_data['get_dropdown_all_titles'] = _get_dropdown_all_titles();		
		$this->content_data['submit_button'] = lang('invite_').lang('attendee');				
		$this->panel_title = 'ADD WORKSHOP ATTENDEES';
		$this->add_external_css(array("/themes/core/css/bootstrap-datetimepicker.css"));
		$this->add_external_js(array("/themes/core/js/date-time-picker/moment.js", "/themes/core/js/date-time-picker/transition.js", "/themes/core/js/date-time-picker/collapse.js", "/themes/core/js/date-time-picker/bootstrap-datetimepicker.js", "/themes/core/js/views/training/workshops/workshops.js"));
		$this->data = $this->includes;		
		$this->content_data['workshopId'] = $this->form_data['workshopId'];
		$this->data['content'] = $this->load->view('training/workshops/workshop_attendees_add', $this->content_data, true);
   	    $this->load->view($this->template, $this->data);
	}
	
	function list_attendees_by_workshop_select(){
		$this->panel_title = 'CURRENT WORKSHOPS';
		$this->panel_icon = 'fa fa-th-list';
		$this->content_data['uri'] = base_url('workshops/select/list/invitees/submit');
		$this->content_data['submit_button'] = "Next";
		if($this->user->fkidUserRole === '11'){
	        $this->content_data['get_record_all_workshops'] = _get_record_list_workshops($this->user->id);
		}else{
			$this->content_data['get_record_all_workshops'] = _get_record_list_workshops();
		}
		$this->data['content'] = $this->load->view('training/workshops/workshop_selector', $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}


	function list_attendees_by_workshop(){
		$this->panel_title = 'WORKSHOP ATTENDEES';
		$this->add_external_css(array("/themes/core/css/bootstrap-datetimepicker.css"));
		$this->add_external_js(array("/themes/core/js/date-time-picker/moment.js", "/themes/core/js/date-time-picker/transition.js", "/themes/core/js/date-time-picker/collapse.js", "/themes/core/js/date-time-picker/bootstrap-datetimepicker.js", "/themes/core/js/views/training/workshops/workshops.js"));
		$this->data = $this->includes;		
		$workshop_id = $this->form_data['workshopId'];
		$this->content_data['get_record_all_workshop_invitees'] = _get_record_all_workshop_invitees($workshop_id);
		$this->data['content'] = $this->load->view('training/workshops/workshop_invitees_list', $this->content_data, true);
		# Loads the template (view) and populates with $this->data
   	    $this->load->view($this->template, $this->data);
		
   }	





	
	function notify($workshop_id, $user_id){

		$this->load->helper('cloud/get_record_by_id');	

		if($user_id && $workshop_id){

			$workshop_name = _global_get_fields_by_id('Workshops', 'id' ,$workshop_id, array('WorkshopName'),null, 'db_training');		
			$workshop_start = _global_get_fields_by_id('Workshops', 'id' ,$workshop_id, array('WorkshopStartDate'),null, 'db_training');					
			$workshop_end = _global_get_fields_by_id('Workshops', 'id' ,$workshop_id, array('WorkshopEndDate'),null, 'db_training');					
			$workshop_facilitator = _global_get_fields_by_id('Workshops', 'id' ,$workshop_id, array('WorkshopFacilitator'),null, 'db_training');					
			$workshop_address = _global_get_fields_by_id('Workshops', 'id' ,$workshop_id, array('WorkshopAddress'),null, 'db_training');																	
			$workshop_city = _global_get_fields_by_id('Workshops', 'id' ,$workshop_id, array('WorkshopCity'),null, 'db_training');																				

			$workshop_message = 'This serves to confirm that a TADAT Workshop, '.$workshop_name.', being facilitated by '.$workshop_facilitator.', 
			has been scheduled from '.$workshop_start.' to '.$workshop_end.' and will take place at '.$workshop_address. ' located in '.$workshop_city.'.';

					$this->assigned_user = _get_record_by_id_users($user_id);
					# Build the e-mail message for a new user
					$email_subject = "NEW WORKSHOP ASSIGNMENT";
					$email_msg =
						$this->config->item('start_html_email').
						'<p><strong>' . lang('dear_')._global_get_fields_by_id('Titles', 'id' ,$this->assigned_user->fkidTitle, array('title'),null, 'db_portal').' '.$this->assigned_user->name.' '.$this->assigned_user->surname.'</strong></p>'.
						'<p>'.$workshop_message.'</p>'.
						'<p> Kindly click '.'<a href="'.$this->config->item('base_url').'">'.lang('here').'</a>'.lang('_to_login_to_the_').$this->config->item('application_name').lang('_platform').' and add Tax Administration attendees to the workshop.</p>'.								
						'<p>'.lang('please_feel_free_').lang('_support').lang('_team').lang('_at_').'<a mailto:="'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a>'.lang('should_you_').lang('_platform').'.</p>'.
						'<p>'.lang('kind_regards').'</p>'.
						'<p><strong>'.$this->config->item('application_name').lang('_support').lang('_team').'</strong></p>'.
						'<p><a mailto:="'.$this->config->item('support_from_address').'">'.$this->config->item('support_from_address').'</a></p>'.
						$this->config->item('end_html_email');
				
					$this->load->helper('portal/notify');
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
	
			redirect(base_url('workshops/list'));
	}


	function pdf_certificate(){
		$user = _get_certificate_recipient($this->id);
		$this->content_data['recipient'] = $user;
		$this->data['content'] = $this->load->view("training/certificates/workshop-pdf", $this->content_data, true);
		$html = $this->load->view($this->pdf_template, $this->data);
		$html = $this->output->get_output();

		$this->load->library('dompdf_gen');
		$this->dompdf->load_html($html);
		$this->dompdf->set_paper('A4', 'landscape');		
		$this->dompdf->render();
		$canvas = $this->dompdf->get_canvas();
		$font = Font_Metrics::get_font("Vladimir", "normal");
		$this->dompdf->stream("TADAT Certificate - ".$user.".pdf",array('Attachment'=>1));
	}

	
}