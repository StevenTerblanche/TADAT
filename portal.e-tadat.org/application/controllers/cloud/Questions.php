<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Questions extends Core_Controller {

	public $action, $form_data, $id, $fkID, $tbl, $database, $data, $content_data, $missionId, $indicatorId, $get_poa_indicators, $arrObject;
	function __construct(){
		parent::__construct();
		$this->add_external_css(array("/themes/core/css/questionnaires/poa.css", "/themes/core/css/blue_imp/blueimp-gallery.min.css", "/themes/core/css/blue_imp/jquery.fileupload-ui.css", "/themes/core/css/blue_imp/jquery.fileupload.css"));
		$this->content_data['submit_button'] = lang('action');
        # Checks if id is sent and decrypts where necessary
        $this->missionId = ($this->input->get('id')) ? $this->encrypt->decode(base64_decode($this->input->get('id'))) : (($this->input->post('id')) ? $this->input->post('id') : null);

		$this->output->enable_profiler(false);	
	}

	#** VIEW INTRODUCTION **
	function introduction(){
		$this->add_external_js(array("/themes/core/js/jquery.dataTables.js", "/themes/core/js/dataTables.tableTools.js", "/themes/core/js/dataTables.bootstrap.js", "/themes/core/js/dataTables.responsive.js", "/themes/core/js/views/questionnaires/poa.js"));
		$this->session->set_userdata('mission_id', $this->encrypt->decode(base64_decode($this->uri->segment('3'))));
		$this->data = $this->includes;
		$this->page_header = 'TADAT MISSIONS';
		$this->columns = 12;			
		$this->panel_icon = 'fa fa-globe';
		$this->panel_title = 'MISSION SYNOPSIS';
		$this->content_data['objGetMissionDetails'] = _get_mission_by_assigned_id($this->missionId);		
		$this->data['content'] = $this->load->view('questionnaire/poa/introduction', $this->content_data, true);
        $this->load->view($this->template, $this->data);
	}

	#** VIEW INDICATORS BY POA ID**
	function indicators(){
		$this->session->set_userdata('mission_id', $this->encrypt->decode(base64_decode($this->uri->segment('3'))));
		$this->session->set_userdata('poa_id', $this->encrypt->decode(base64_decode($this->uri->segment('4'))));
		$this->add_external_js(array("/themes/core/js/jquery.dataTables.js", "/themes/core/js/dataTables.tableTools.js", "/themes/core/js/dataTables.bootstrap.js", "/themes/core/js/dataTables.responsive.js", "/themes/core/js/views/questionnaires/poa.js"));
		$this->add_external_js(array("/themes/core/js/highlight.js"));		
		$this->data = $this->includes;
		$this->columns = 12;
		$this->content_data['get_missions'] = _get_fields_by_id('Missions', 'id', $this->session->userdata('mission_id'), $out = array('mission'), $seperator = null, 'db');
		$this->page_header = strtoupper($this->content_data['get_missions']);
		$this->panel_icon = 'fa fa-globe';
		$this->content_data['get_poa_by_id'] = _get_poa_by_id($this->session->userdata('poa_id'));
		$this->panel_title = strtoupper('POA '.$this->content_data['get_poa_by_id'][0]['poa_number'].': '.$this->content_data['get_poa_by_id'][0]['poa']);
		$this->data['content'] = $this->load->view('questionnaire/poa/indicators', $this->content_data, true);
        $this->load->view($this->template, $this->data);
	}	


	function dimensions(){
		$this->database = 'cloud_questions';
		$this->load->model('crud_model');
		$this->form_data = ($this->input->post()) ? $this->input->post() : null;
		$this->action = ($this->uri->segment('3')) ? $this->uri->segment('3') : 'pna';
		$this->tbl = ($this->uri->segment('4')) ? $this->encrypt->decode(base64_decode($this->uri->segment('4'))) : 'pnt';
		$this->session->set_userdata('tbl', $this->tbl);
		$this->session->set_userdata('indicator_id', $this->encrypt->decode(base64_decode($this->uri->segment('5'))));
		$this->id = ($this->uri->segment('6')) ? $this->encrypt->decode(base64_decode($this->uri->segment('6'))) : 'pni';		
		$this->fkID = 'id';
		$this->add_external_js(array("/themes/core/js/jquery.dataTables.js", "/themes/core/js/dataTables.tableTools.js", "/themes/core/js/dataTables.bootstrap.js", "/themes/core/js/dataTables.responsive.js", "/themes/core/js/blue_imp/tmpl.min.js", "/themes/core/js/blue_imp/load-image.all.min.js", "/themes/core/js/blue_imp/canvas-to-blob.min.js", "/themes/core/js/blue_imp/jquery.blueimp-gallery.min.js", "/themes/core/js/blue_imp/jquery.iframe-transport.js", "/themes/core/js/blue_imp/jquery.fileupload.js", "/themes/core/js/blue_imp/jquery.fileupload-process.js", "/themes/core/js/blue_imp/jquery.fileupload-image.js", "/themes/core/js/blue_imp/jquery.fileupload-audio.js", "/themes/core/js/blue_imp/jquery.fileupload-video.js", "/themes/core/js/blue_imp/jquery.fileupload-validate.js", "/themes/core/js/blue_imp/jquery.fileupload-ui.js", "/themes/core/js/blue_imp/main.js", "/themes/core/js/validator.min.js","/themes/core/js/tinymce/tinymce.min.js"));
		$strView = $this->tbl;
		$this->columns = 12;
		$this->panel_icon = 'fa fa-table';
		$this->content_data['uri'] = current_url();	
		
		$this->content_data['save_button'] = lang('save_progress');		
		$this->content_data['score_button'] = lang('score_button');				

		$this->content_data['get_poa_by_id'] = _get_poa_by_id($this->session->userdata('poa_id'));
		$this->page_header = strtoupper('POA '.$this->content_data['get_poa_by_id'][0]['poa_number'].': '.$this->content_data['get_poa_by_id'][0]['poa']);
		$this->content_data['get_indicator_by_indicator_id'] = _get_indicator_by_indicator_id($this->session->userdata('indicator_id'));
		$this->panel_title = strtoupper($this->content_data['get_indicator_by_indicator_id'][0]['indicatorNumber'].' '.$this->content_data['get_indicator_by_indicator_id'][0]['indicatorName']);
		$this->content_data['measurement_dimensions'] = _get_record_by_fkid_md($this->session->userdata('indicator_id') ,'','cloud_questions');
		$this->content_data['get_fields'] = $this->cloud_questions->list_fields($this->tbl);

		# Build js filename from uri segment and table name
		$file_js = '/themes/core/js/views/questionnaires/poa/'.$this->tbl.'.js';
		$this->add_external_js(array("/themes/core/js/jquery.dataTables.js", "/themes/core/js/dataTables.tableTools.js", "/themes/core/js/dataTables.bootstrap.js", "/themes/core/js/dataTables.responsive.js", "/themes/core/js/jquery.inputmask.bundle.js",$file_js,"/themes/core/js/views/questionnaires/questionnaires.js"));
		$this->data = $this->includes;

		$this->load->helper('form');
		$this->load->helper('form_extended');
		$this->form_validation->set_error_delimiters($this->config->item('error_delimeter_left'), $this->config->item('error_delimeter_right'));
		$this->form_validation->set_rules('dimension_1_1_1', 'ssss', 'trim');

		$mystatus = '';
		unset($this->form_data['responsive-datatables_length']);

		# RETURN TO SAVED FORM
		if($this->id !== 'pni' && $this->action !== 'create'){
			$this->content_data['get_record_by_id'] = _get_all_fields_by_id('cloud_questions', $this->tbl, 'id', $this->id);
			# Populate view variables according to type
			$mystatus = 'RETURN TO SAVED FORM<br>';		
		}

		# SAVE PROGRESS FIRST CHECK FOR SAVE ACTION
		if($this->action === 'save'){
			$this->load->helper('form');	
			$this->form_data['fkidMission'] = $this->session->userdata('mission_id');
			if($this->id && $this->id !== 'pni'){
				$this->action = 'update';
				$this->form_data['status'] = 0;
			}else{
				$this->action = 'create';
				$this->form_data['status'] = 0;
			}
			
			$updateId = $this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID, 'cloud_questions');
			$this->content_data['get_record_by_id'] = _get_all_fields_by_id('cloud_questions', $this->tbl, 'id', $updateId);							
			redirect(base_url('questions/indicators') .'/'. base64_encode($this->encrypt->encode($this->session->userdata('mission_id'))).'/'. base64_encode($this->encrypt->encode($this->session->userdata('poa_id'))));
		}

		# SUBMIT AND FINALISE
		if($this->action && ($this->action !=='disable' || $this->action !=='delete' || $this->action !=='save')){
			
			
			# FORM VALIDATION

			foreach($_POST as $fields => $values){
//			    	$this->form_validation->set_rules($fields, form_label($fields, $fields), 'required|trim');
//					$this->form_validation->set_rules($fields, form_label($fields, $fields), 'required|trim|decimal|greater_than[0]');
			} 
			//$this->form_validation->set_rules('a_1_1_1', lang('?'), 'required|trim|decimal|greater_than[0]');			
			
			if ($this->form_validation->run() == true && $this->session->flashdata('error') == false){
				if($this->action === 'score'){
					$this->load->helper('score_indicator_tables');
					if(_score_indicator_tables($this->tbl)){
						$this->form_data['fkidMission'] = $this->session->userdata('mission_id');
						
						if($this->id && $this->id !== 'pni'){
							$this->action = 'update';
							$this->form_data['status'] = 0;
							$this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID, 'cloud_questions');							
						}else{
							$this->action = 'create';
							$this->form_data['status'] = 0;
							$this->id = $this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id, $this->fkID, 'cloud_questions');
						}
						redirect(base_url('questions/score') .'/'. base64_encode($this->encrypt->encode($this->id)).'/'. base64_encode($this->encrypt->encode($this->session->userdata('mission_id'))).'/'. base64_encode($this->encrypt->encode($this->session->userdata('poa_id'))).'/'. base64_encode($this->encrypt->encode($this->session->userdata('indicator_id'))));
					}
				}
			}
		}

			$this->data['content'] = $this->load->view('questionnaire/poa/'.$this->tbl, $this->content_data, true);
	        $this->load->view($this->template, $this->data);
		
	}

	function score(){
		$this->add_external_js(array("/themes/core/js/blue_imp/tmpl.min.js", "/themes/core/js/blue_imp/load-image.all.min.js", "/themes/core/js/blue_imp/canvas-to-blob.min.js", "/themes/core/js/blue_imp/jquery.blueimp-gallery.min.js", "/themes/core/js/blue_imp/jquery.iframe-transport.js", "/themes/core/js/blue_imp/jquery.fileupload.js", "/themes/core/js/blue_imp/jquery.fileupload-process.js", "/themes/core/js/blue_imp/jquery.fileupload-image.js", "/themes/core/js/blue_imp/jquery.fileupload-audio.js", "/themes/core/js/blue_imp/jquery.fileupload-video.js", "/themes/core/js/blue_imp/jquery.fileupload-validate.js", "/themes/core/js/blue_imp/jquery.fileupload-ui.js", "/themes/core/js/blue_imp/main.js", "/themes/core/js/validator.min.js","/themes/core/js/tinymce/tinymce.min.js","/themes/core/js/views/questionnaires/poa/score.js"));
		$this->data = $this->includes;
		$this->load->helper('form_extended');
		$this->page_header = 'INDICATOR SCORING';
		$this->columns = 12;			
		$this->panel_icon = 'fa fa-globe';
		$this->panel_title = 'SCORING SUMMARY';

		$this->id = $this->encrypt->decode(base64_decode($this->uri->segment('3')));		
		$this->session->set_userdata('mission_id', $this->encrypt->decode(base64_decode($this->uri->segment('4'))));
		$this->session->set_userdata('poa_id', $this->encrypt->decode(base64_decode($this->uri->segment('5'))));		
		$this->session->set_userdata('indicator_id', $this->encrypt->decode(base64_decode($this->uri->segment('6'))));						

		$this->content_data['submit_button'] = 'Proceed to PAR Summary';		
		$this->content_data['uri'] = 'http://e-tadat.org/questions/report/'.base64_encode($this->encrypt->encode($this->id)).'/'.base64_encode($this->encrypt->encode($this->session->userdata('mission_id'))).'/'.base64_encode($this->encrypt->encode($this->session->userdata('poa_id'))).'/'.base64_encode($this->encrypt->encode($this->session->userdata('indicator_id')));	
		$this->content_data['get_record_table'] = _get_score_by_id_all('cloud_questions','PerformanceIndicators','id',$this->session->userdata('indicator_id'));

		$this->data['content'] = $this->load->view('questionnaire/poa/scores', $this->content_data, true);
        $this->load->view($this->template, $this->data);
	}



	function report(){
		$this->add_external_js(array("/themes/core/js/blue_imp/tmpl.min.js", "/themes/core/js/blue_imp/load-image.all.min.js", "/themes/core/js/blue_imp/canvas-to-blob.min.js", "/themes/core/js/blue_imp/jquery.blueimp-gallery.min.js", "/themes/core/js/blue_imp/jquery.iframe-transport.js", "/themes/core/js/blue_imp/jquery.fileupload.js", "/themes/core/js/blue_imp/jquery.fileupload-process.js", "/themes/core/js/blue_imp/jquery.fileupload-image.js", "/themes/core/js/blue_imp/jquery.fileupload-audio.js", "/themes/core/js/blue_imp/jquery.fileupload-video.js", "/themes/core/js/blue_imp/jquery.fileupload-validate.js", "/themes/core/js/blue_imp/jquery.fileupload-ui.js", "/themes/core/js/blue_imp/main.js", "/themes/core/js/validator.min.js","/themes/core/js/tinymce/tinymce.min.js","/themes/core/js/views/questionnaires/poa/score.js"));
		$this->data = $this->includes;
		$this->load->helper('form_extended');
		$this->page_header = 'INDICATOR REPORTING';
		$this->columns = 12;			
		$this->panel_icon = 'fa fa-globe';
		$this->panel_title = 'PAR SUMMARY';

		$this->id = $this->encrypt->decode(base64_decode($this->uri->segment('3')));		

		$this->session->set_userdata('mission_id', $this->encrypt->decode(base64_decode($this->uri->segment('4'))));
		$this->session->set_userdata('poa_id', $this->encrypt->decode(base64_decode($this->uri->segment('5'))));		
		$this->session->set_userdata('indicator_id', $this->encrypt->decode(base64_decode($this->uri->segment('6'))));						
//		echo '**************************'.$this->session->userdata('indicator_id');

		$this->database = 'cloud_questions';
		$this->load->model('crud_model');
		$this->session->unset_userdata('tbl');

		$this->form_data = ($this->input->post()) ? $this->input->post() : null;
/*	
		echo 'userdata TBL before POST: '.$this->session->userdata('tbl').' :';		
		echo 'FORM DATA <pre>';
		print_r($this->form_data);
		echo '</pre>';
*/
		if(!$this->session->userdata('tbl') || $this->session->userdata('tbl') === ''){
			$this->session->set_userdata('tbl', $this->form_data['current_dimension_table']);		
			unset($this->form_data['current_dimension_table']);			
		}else{
			unset($this->form_data['current_dimension_table']);
		}


		
				
			


		$this->id = $this->encrypt->decode(base64_decode($this->uri->segment('3')));
		$this->fkID = 'id';		
//		$this->form_data['status'] = 6;
		$this->form_data['status'] = 1;		
		$this->crud_model->crud('update', $this->session->userdata('tbl'), $this->form_data, $this->id, $this->fkID, 'cloud_questions');

		if($this->user->fkidUserRole == 4 || $this->user->fkidUserRole == 2){
			$this->content_data['submit_button'] = 'Submit to Draft PAR';						
		}else{
			$this->content_data['submit_button'] = 'Submit to Mission Team Leader';						
		}

		$this->content_data['uri'] = 'http://e-tadat.org/questions/submit/'.base64_encode($this->encrypt->encode($this->id)).'/'.$this->session->userdata('mission_id').'/'.$this->session->userdata('poa_id');	
		$this->content_data['get_record_table'] = _get_score_by_id_all('cloud_questions','PerformanceIndicators','id',$this->session->userdata('indicator_id'));
		$this->data['content'] = $this->load->view('questionnaire/poa/report', $this->content_data, true);
        $this->load->view($this->template, $this->data);

	}

	function submit(){
		$this->data = $this->includes;
		$this->page_header = 'REGISTERED MISSIONS';
		$this->columns = 12;			
		$this->panel_icon = 'fa fa-globe';
		$this->panel_title = 'INTRODUCTION';
		$this->database = 'cloud_questions';
		$this->load->model('crud_model');
		$this->form_data = ($this->input->post()) ? $this->input->post() : null;
		/*
		echo 'FORM DATA <pre>';
		print_r($this->form_data);
		echo '</pre>';		
		echo 'TABLE: '.$this->session->userdata('tbl');	
		*/
		$this->id = $this->encrypt->decode(base64_decode($this->uri->segment('3')));
		$this->fkID = 'id';		
		$this->form_data['status'] = 1;
		$this->crud_model->crud('update', $this->session->userdata('tbl'), $this->form_data, $this->id, $this->fkID, 'cloud_questions');
		redirect(base_url('questions/indicators') .'/'. base64_encode($this->encrypt->encode($this->session->userdata('mission_id'))).'/'. base64_encode($this->encrypt->encode($this->session->userdata('poa_id'))));
	}
}