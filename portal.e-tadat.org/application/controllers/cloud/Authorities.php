<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Authorities extends Core_Controller {

	public $action, $redirect, $form_data, $user_form_data, $id, $fkID, $tbl, $data, $content_data;
	function __construct(){
		parent::__construct();
		# Load specific js files here for the relevant section e.g. Mission, User, Authority etc.
		$this->add_external_js(array("/themes/core/js/jquery.dataTables.js", "/themes/core/js/dataTables.tableTools.js", "/themes/core/js/dataTables.bootstrap.js", "/themes/core/js/dataTables.responsive.js", "/themes/core/js/views/authorities.js"));
		# A CRUD model has been created that should handle most form crud operations but may be extended in future
		$this->load->model('crud_model');
        # Checks if delete / disable is sent as Action
		$this->action = ($this->input->get('a')) ? $this->input->get('a') : null;
		$this->form_data = ($this->input->post()) ? $this->input->post() : null;
		# Table operations are performed on
		$this->tbl = 'RevenueAuthorities';
        # Checks if id is sent and decrypts where necessary
        $this->id = ($this->input->get('id')) ? $this->encrypt->decode(base64_decode($this->input->get('id'))) : (($this->input->post('id')) ? $this->input->post('id') : null);
		# The database field that the id above corresponds to
		$this->fkID = 'id';
		$this->data = $this->includes;
		$this->content_data['submit_button'] = lang('action');
		# Change default page header, column size, panel icon and panel title as defined in Core_Controller
		$this->page_header = strtoupper(lang('manage_').lang('revenue_authorities'));
		$this->columns = 12;
		$this->panel_icon = 'fa fa-bank';
		$this->panel_title = lang('revenue_authorities').lang('_listing');
//		$this->output->enable_profiler(TRUE);
	}

	# Checks if id then show profile else shows listing
	function read(){
		if($this->id && !$this->action){
			$this->panel_title = lang('revenue_authority').lang('_profile');
			$this->columns = 12;
			$this->content_data['get_record_by_id_rev_auth'] = _get_record_by_id_rev_auth($this->id,'db_cloud_main');
			$this->content_data['get_record_by_id_rev_auth_ram'] = _get_record_by_id_rev_auth_ram($this->id,'db_portal');
			$this->content_data['get_record_by_id_rev_auth_counterpart'] = _get_record_by_id_rev_auth_counterpart($this->id,'db_portal');			
			$this->data['content'] = $this->load->view('cloud/authorities/profile', $this->content_data, true);
		}elseif(!$this->id && !$this->action){
			$this->panel_title = lang('revenue_authorities').lang('_listing');
			$this->columns = 12;			
			# Check if Secretariat or lower level and display disable records else display only enabled records	

			$this->content_data['get_record_all_rev_auth'] = ($this->user->fkidUserRole == 1) ?  _get_record_all_rev_auth(null,null,'db_cloud_main') : _get_record_all_rev_auth(1,$this->user->id,'db_cloud_main');

			$this->data['content'] = $this->load->view('cloud/authorities/list', $this->content_data, true);
		}
        $this->load->view($this->template, $this->data);
	}


	function create(){
		$this->columns = 12;
        $this->content_data['get_dropdown_all_region'] = _get_dropdown_all_region();
		$this->action = 'create';
		$this->panel_title = 'STEP 1: '.lang('create_').lang('revenue_authority');
		$this->panel_icon = 'fa fa-users';
		$this->content_data['submit_button'] = 'STEP 2: '.lang('add_a_').lang('revenue_authority_counterpart');
		$this->content_data['get_fields'] = $this->db_cloud_main->list_fields($this->tbl);
		$this->content_data['uri'] = current_url();
		$this->data['content'] = $this->load->view('cloud/authorities/create', $this->content_data, true);
		
		if($this->action && ($this->action !=='disable' || $this->action !=='delete')){
			$this->load->helper('form');
			$this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
			$this->form_validation->set_rules('authority',   lang('revenue_authority').lang('_name'), 'required|trim');

			if ($this->form_validation->run() == true && $this->session->flashdata('error') == false){
				$this->id = $this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID, 'db_cloud_main');
				redirect(base_url('authorities/counterpart/'.base64_encode($this->encrypt->encode($this->id))));
			}		
		}
		# Loads the template (view) and populates with $this->data
        $this->load->view($this->template, $this->data);
    }


	function counterpart(){
		$this->columns = 12;
		$this->id = $this->encrypt->decode(base64_decode($this->uri->segment('4')));
		$this->content_data['get_dropdown_all_languages'] = _get_dropdown_all_languages();
        $this->content_data['get_dropdown_all_titles'] = _get_dropdown_all_titles();		
        $this->content_data['get_dropdown_all_region'] = _get_dropdown_all_region();
		$this->content_data['get_dropdown_all_roles'] = _get_dropdown_all_roles(array(7));
		if($this->id){
			$this->panel_title = 'STEP 2: '.lang('add_a_').lang('revenue_authority_counterpart');
			$this->content_data['submit_button'] = 'STEP 2: '.lang('add_this_').lang('revenue_authority_counterpart');			
		    $this->content_data['uri'] = "http://portal.e-tadat.org/cloud/authorities/add_counterpart/?id=" . base64_encode($this->encrypt->encode($this->id)).'&r=save';
			$this->data['content'] = $this->load->view('cloud/authorities/create_step_2', $this->content_data, true);
		}
        $this->load->view($this->template, $this->data);
	}

	function add_counterpart(){
		$tmp_password = _generate_random_password();
		$tmp_salt = _generate_salt();
		$tmp_hash = _generate_hash ($tmp_password, $tmp_salt);
		$this->form_data['loginPasswordSalt'] = $tmp_salt;
		$this->form_data['loginPasswordHash'] = $tmp_hash;
		$created_id = $this->crud_model->crud('create', 'Users', $this->form_data, $this->id, $this->fkID);
		$this->user_form_data['fkidCounterpart'] = $created_id;
		$this->crud_model->crud('update', 'RevenueAuthorities', $this->user_form_data, $this->id, $this->fkID, 'db_cloud_main');
		
		$this->panel_title = lang('add_a_').lang('revenue_authority_counterpart');
		$this->content_data['submit_button'] = lang('add_this_').lang('revenue_authority_counterpart');			
		$this->content_data['uri'] = "http://portal.e-tadat.org/cloud/authorities/add_contact/?id=" . base64_encode($this->encrypt->encode($this->id)).'&r=save';
		$this->form_data = null;

		$this->redirect = ($this->input->get('r')) ? $this->input->get('r') : null;
		if($this->redirect == 'save'){
			redirect(base_url('cloud/authorities/profile/?id='.base64_encode($this->encrypt->encode($this->id))));	
		}else{
			redirect(base_url('cloud/authorities/contact/'.base64_encode($this->encrypt->encode($this->id))));		
		}

	
    }

	function contact(){
		# Used in Create and Update
		$this->columns = 12;
		$this->id = $this->encrypt->decode(base64_decode($this->uri->segment('3')));
        $this->content_data['get_dropdown_all_languages'] = _get_dropdown_all_languages();
        $this->content_data['get_dropdown_all_titles'] = _get_dropdown_all_titles();		
        $this->content_data['get_dropdown_all_region'] = _get_dropdown_all_region();
		$this->content_data['get_dropdown_all_roles'] = _get_dropdown_all_roles(array(6));
		if($this->id){
			# Tell the crud function what to do.
			$this->panel_title = lang('add_a_').lang('revenue_authority_contact');
			$this->content_data['submit_button'] = lang('add_this_').lang('revenue_authority_contact');			
		    $this->content_data['uri'] = "http://portal.e-tadat.org/cloud/authorities/add_contact/?id=" . base64_encode($this->encrypt->encode($this->id));
			$this->data['content'] = $this->load->view('cloud/authorities/create_step_3', $this->content_data, true);
		}
		# Loads the template (view) and populates with $this->data
        $this->load->view($this->template, $this->data);
	}

	function add_contact(){
		$tmp_password = _generate_random_password();
		$tmp_salt = _generate_salt();
		$tmp_hash = _generate_hash ($tmp_password, $tmp_salt);
		$this->form_data = ($this->input->post()) ? $this->input->post() : null;
		$this->form_data['loginPasswordSalt'] = $tmp_salt;
		$this->form_data['loginPasswordHash'] = $tmp_hash;
		$created_id = $this->crud_model->crud('create', 'Users', $this->form_data, $this->id, $this->fkID);
		$this->user_form_data['fkidUser'] = $created_id;
		$this->crud_model->crud('update', 'RevenueAuthorities', $this->user_form_data, $this->id, $this->fkID);
		
		$this->panel_title = lang('add_a_').lang('revenue_authority_contact');
		$this->content_data['submit_button'] = lang('add_this_').lang('revenue_authority_contact');			
		$this->content_data['uri'] = "http://portal.e-tadat.org/cloud/authorities/add_contact/?id=" . base64_encode($this->encrypt->encode($this->id));

		redirect(base_url('cloud/authorities/profile/?id='.base64_encode($this->encrypt->encode($this->id))));			
    }


	function modify(){
		# Used in Create and Update
		$this->columns = 12;
		# This populates the Revenue Authority Managers

		if($this->user->fkidUserRole == 1){
			$this->content_data['get_dropdown_all_ram'] = _get_dropdown_all_ram(array(0,1));
			$this->content_data['get_dropdown_all_counterpart'] = _get_dropdown_all_counterpart(array(0,1));
		}else{
			$this->content_data['get_dropdown_all_ram'] = _get_dropdown_all_ram(array(0));
			$this->content_data['get_dropdown_all_counterpart'] = _get_dropdown_all_counterpart(array(0));
		}


		# This populates the Regions
        $this->content_data['get_dropdown_all_region'] = _get_dropdown_all_region();

		# ** EDIT **
		# This shows the 'Edit view' with pre-populated form for the record if an ID is set with no action
		if($this->id && !$this->action){
			# Tell the crud function what to do.
			$this->action = 'update';
			$this->panel_title = lang('update_').lang('revenue_authority');
			$this->content_data['submit_button'] = lang('update_').lang('revenue_authority');
		    $this->content_data['uri'] = current_url () . "?id=" . base64_encode($this->encrypt->encode($this->id));
			$this->content_data['get_fields'] = $this->db->list_fields($this->tbl);
			$this->content_data['get_record_by_id_rev_auth'] = _get_record_by_id_rev_auth($this->id);
			$this->content_data['get_dropdown_all_country'] = _get_dropdown_by_id_country($this->content_data['get_record_by_id_rev_auth']->fkidRegion);
			$this->content_data['get_dropdown_all_states'] = _get_dropdown_by_id_state($this->content_data['get_record_by_id_rev_auth']->fkidCountry, 'FederalStates');
			$this->data['content'] = $this->load->view('cloud/authorities/edit', $this->content_data, true);
		}
		if($this->action && ($this->action !=='disable' || $this->action !=='delete')){
			$this->load->helper('form');
			$this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
			$this->form_validation->set_rules('authority',   lang('revenue_authority').lang('_name'), 'required|trim');

			if ($this->form_validation->run() == true && $this->session->flashdata('error') == false){
				redirect(base_url('cloud/authorities/profile/?id='.base64_encode($this->encrypt->encode($this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID)))));
			}		

		}
		# This shows the 'Edit view' with pre-populated form for the record if an ID is set with no action
		if($this->id && ($this->action ==='enable' || $this->action ==='disable' || $this->action ==='delete')){
			# Call crud function with relevant action
			$this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID);
			#redirect to listings View
			redirect(base_url('cloud/authorities/list'));
		}
		# Loads the template (view) and populates with $this->data
        $this->load->view($this->template, $this->data);
    }
}