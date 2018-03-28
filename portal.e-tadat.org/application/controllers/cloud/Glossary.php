<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Glossary extends Core_Controller {
	public $action, $form_data, $id, $fkID, $tbl, $data, $content_data;	
    function __construct(){
        parent::__construct();
		$this->add_external_js(array("/themes/core/js/jquery.dataTables.js", "/themes/core/js/dataTables.tableTools.js", "/themes/core/js/dataTables.bootstrap.js", "/themes/core/js/dataTables.responsive.js","/themes/core/js/tinymce/tinymce.min.js", "/themes/core/js/views/glossary.js"));
		$this->load->library('encrypt');
		$this->load->helper('url');		
		# A CRUD model has been created that should handle most form crud operations but may be extended in future
		$this->load->model('crud_model');
        # Checks if delete / disable is sent as Action
		$this->action = ($this->input->get('a')) ? $this->input->get('a') : null;
		$this->form_data = ($this->input->post()) ? $this->input->post() : null;
		# Table operations are performed on
		$this->tbl = 'Glossary';
        # Checks if id is sent and decrypts where necessary
        $this->id = ($this->input->get('id')) ? $this->encrypt->decode(base64_decode($this->input->get('id'))) : (($this->input->post('id')) ? $this->input->post('id') : null);
		# The database field that the id above corresponds to
		$this->fkID = 'id';
		$this->data = $this->includes;
		$this->columns = 12;
		$this->page_header = strtoupper(lang('manage_').lang('g_o_t'));
		$this->panel_icon = 'fa fa-book';
		$this->panel_title = strtoupper(lang('g_o_t') . lang('_listing'));		
		$this->content_data['submit_button'] = lang('action');
		//$this->output->enable_profiler(TRUE);		
	}

	function read(){
	# Glossary of Terms
		$this->add_external_js(array("/themes/core/js/highlight.js"));
 		$data = $this->includes;
		$content_data['get_record_all'] = _get_record_all_glossary();
        $data['content'] = $this->load->view('glossary/list', $content_data, TRUE);
		$this->load->view($this->template, $data);
	}
	function modify(){
		#** CREATE ** 
		# This shows the 'create view' for a NEW record if no ID OR action 
	        $this->content_data['get_dropdown_all_languages'] = _get_dropdown_all_languages();
		if(!$this->id && !$this->action){
			# Tell the crud function what to do.
			$this->action = 'create';
			# Populate view variables according to type
			$this->panel_title = lang('create_').lang('g_o_t');
			$this->content_data['submit_button'] = lang('create_').lang('g_o_t');
			# This gets all the fields from the DB for the specified table and populates values in the view AFTER validation
			$this->content_data['get_fields'] = $this->db->list_fields($this->tbl);
			$this->content_data['uri'] = current_url();
			$this->data['content'] = $this->load->view('glossary/create', $this->content_data, true);
		}
		
		# ** EDIT **
		# This shows the 'Edit view' with pre-populated form for the record if an ID is set with no action
		if($this->id && !$this->action){
			# Tell the crud function what to do.
			$this->action = 'update';
			# Populate view variables according to type			
			$this->panel_title = lang('update_').lang('g_o_t');
			$this->content_data['submit_button'] = lang('update_').lang('g_o_t');
			# Encrypts and encodes the id and sets URL
		    $this->content_data['uri'] = current_url () . "?id=" . base64_encode($this->encrypt->encode($this->id));
			# Get the entire row as specified by the id
			$this->content_data['get_record_by_id'] = _get_record_by_id_glossary($this->id, '', '');
	        $this->content_data['get_dropdown_all_languages'] = _get_dropdown_all_languages();			
			# Get the countries only for the current region as retreived from the Authority fkidRegion
			$this->data['content'] = $this->load->view('glossary/create', $this->content_data, true);
		}

		# If there is an action and it is NOT delete OR disable run form validation
		if($this->action && ($this->action !=='disable' || $this->action !=='delete')){
			$this->load->helper('form');
			$this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
			$this->form_validation->set_rules('term', lang('term').lang('_name'), 'required|trim');
			$this->form_validation->set_rules('description', lang('description').lang('_name'), 'required|trim');

			# If there is no errors and form validation passed
			if ($this->form_validation->run() == true && $this->session->flashdata('error') == false){
				unset($this->form_data['files']);
			
				$this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID, 'db');
				# This redirects after successfull create or update. 
				redirect(base_url('glossary/list/'));
			}		
		}
		# This shows the 'Edit view' with pre-populated form for the record if an ID is set with no action
		if($this->id && ($this->action ==='enable' ||$this->action ==='disable' || $this->action ==='delete')){
			# Call crud function with relevant action
			$this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID, 'db');
			#redirect to listings View
				redirect(base_url('glossary/list'));
		}
		# Loads the template (view) and populates with $this->data
        $this->load->view($this->template, $this->data);
    }
}