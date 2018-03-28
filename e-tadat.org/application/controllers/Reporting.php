<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Reporting extends Core_Controller {
	public $tbl, $data, $content_data, $id, $parId, $editClass;
	function __construct(){
		parent::__construct();
		$this->add_external_js(array("/themes/core/js/tinymce/tinymce.min.js", "/themes/core/js/views/par/par.js"));
		$this->add_external_css(array("/themes/core/css/par.css"));
		$this->load->helper(array('form', 'url', '_get_par_records_by_id_helper'));
		$this->load->model('crud_model');		
//		$this->load->library("Pdf");
        $this->id = ($this->input->get('id')) ? $this->encrypt->decode(base64_decode($this->input->get('id'))) : (($this->input->post('fkidMission')) ? $this->input->post('fkidMission') : null);		

		# Check if Roles for editing of PAR
		$this->content_data['editClass'] = $this->editClass;
		$this->page_header = "DRAFT PERFORMANCE ASSESSMENT REPORT";
		$this->panel_title = "";
		$this->panel_icon = '';
		$this->columns = 11;
		$this->tbl = '';
 	}

	function missions(){
		$this->columns = 12;		
		$this->data = $this->includes;
		$this->panel_title = lang('missions').lang('_listing');
		
		
		/* REMINDER*/
		// Check who might see what ASSIGNED missions!!!!
		/* END REMINDER*/
		
		$this->content_data['get_record_all_missions'] = _get_record_all_missions();
		$this->data['content'] = $this->load->view('reporting/0-0-missions', $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}
	function toc(){
				$this->columns = 11;
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view('reporting/0-1-toc', $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function abbreviations(){
		$this->content_data['section_id'] = '1';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;				
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-1-abbreviations.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-1-abbreviations", $this->content_data, true);
		$this->load->view($this->template, $this->data);

	}
	
	function preface(){
		$this->content_data['section_id'] = '1';
		$arrEditClass = array($this->checkEditRights($editClass = 'preface-data-1'),$this->checkEditRights($editClass = 'preface-data-2'));
		$this->content_data['editClass'] = $arrEditClass;		
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-2-preface.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-2-preface", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function executive(){
		$this->columns = 11;
		$this->content_data['section_id'] = '1';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-3-executive.js","/themes/core/js/d3.v3.min.js","/themes/core/js/RadarChart.js","/themes/core/js/views/chart.js"));
		$this->data = $this->includes;
		$this->content_data['section_id'] = '1';
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-3-executive", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function introduction(){
		$this->content_data['section_id'] = '1';
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-4-introduction.js"));
		$this->data = $this->includes;
		$this->panel_title = "";
		$this->panel_icon = '';
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-4-introduction", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function profile(){
		$this->content_data['section_id'] = '2';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-1-country-profile.js","/themes/core/js/d3.v3.min.js","/themes/core/js/RadarChart.js","/themes/core/js/views/chart.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-1-country-profile", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function economic(){
		$this->content_data['section_id'] = '2';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-3-economic-situation.js","/themes/core/js/d3.v3.min.js","/themes/core/js/RadarChart.js","/themes/core/js/views/chart.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-3-economic-situation", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function taxes(){
		$this->content_data['section_id'] = '2';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-4-main-taxes.js","/themes/core/js/d3.v3.min.js","/themes/core/js/RadarChart.js","/themes/core/js/views/chart.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-4-main-taxes", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function institutional(){
		$this->content_data['section_id'] = '2';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-5-institutional-framework.js","/themes/core/js/d3.v3.min.js","/themes/core/js/RadarChart.js","/themes/core/js/views/chart.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-5-institutional-framework", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function exchange(){
		$this->content_data['section_id'] = '2';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-6-international-information-exchange.js","/themes/core/js/d3.v3.min.js","/themes/core/js/RadarChart.js","/themes/core/js/views/chart.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-6-international-information-exchange", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function poa_1_1(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '1-1';		
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}	

	function poa_1_2(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '1-2';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	

	function poa_2_3(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '2-3';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	

	function poa_2_4(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '2-4';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	

	function poa_2_5(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '2-5';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	

	function poa_2_6(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '2-6';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	

	function poa_3_7(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '3-7';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	
	function poa_3_8(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '3-8';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	
	function poa_3_9(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '3-9';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	
	function poa_4_10(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '4-10';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	
	function poa_4_11(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '4-11';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	
	function poa_5_12(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '5-12';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	
	function poa_5_13(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '5-13';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	
	function poa_5_14(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '5-14';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	
	function poa_5_15(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '5-15';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	
	function poa_6_16(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '6-16';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	
	function poa_6_17(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '6-17';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	
	function poa_6_18(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '6-18';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	
	function poa_7_19(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '7-19';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	
	function poa_7_20(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '7-20';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	
	function poa_7_21(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '7-21';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	
	function poa_8_22(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '8-22';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	
	function poa_8_23(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '8-23';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	
	function poa_8_24(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '8-24';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	
	function poa_9_25(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '9-25';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	
	function poa_9_26(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '9-26';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	
	function poa_9_27(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '9-27';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	
	function poa_9_28(){
		$this->content_data['section_id'] = '3';
		$this->content_data['poa'] = '9-28';
		$arrEditClass = array($this->checkEditRights());
		$this->content_data['editClass'] = $arrEditClass;	
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa.js"));
		$this->data = $this->includes;
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-".$this->content_data['poa']."-poa", $this->content_data, true);
		$this->load->view($this->template, $this->data);	
	}	



	function framework(){
		$this->content_data['section_id'] = '5';
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-1-framework.js"));
		$this->data = $this->includes;
		$this->panel_title = "";
		$this->panel_icon = '';
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-1-framework", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function sources(){
		$this->content_data['section_id'] = '5';
		$this->add_external_js(array("/themes/core/js/views/par/".$this->content_data['section_id']."-2-sources.js"));
		$this->data = $this->includes;
		$this->panel_title = "";
		$this->panel_icon = '';
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-3-sources", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function chart(){
		$this->content_data['section_id'] = '5';
		$this->data = $this->includes;
		$this->panel_title = "";
		$this->panel_icon = '';
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-2-org-chart", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}




	function table1(){
		$this->columns = 11;
		$this->content_data['section_id'] = '2';
		$this->data = $this->includes;
		$this->panel_title = "";
		$this->panel_icon = '';
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-2-table-1", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function table2(){
		$this->columns = 11;
		$this->content_data['section_id'] = '2';
		$this->data = $this->includes;
		$this->panel_title = "";
		$this->panel_icon = '';
		
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-2-table-2", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function table3(){
		$this->columns = 11;
		$this->content_data['section_id'] = '2';
		$this->data = $this->includes;
		$this->panel_title = "";
		$this->panel_icon = '';
		
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-2-table-3", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function table4(){
		$this->columns = 11;
		$this->content_data['section_id'] = '2';
		$this->data = $this->includes;
		$this->panel_title = "";
		$this->panel_icon = '';
		
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-2-table-4", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function table5(){
		$this->columns = 11;
		$this->content_data['section_id'] = '2';
		$this->data = $this->includes;
		$this->panel_title = "";
		$this->panel_icon = '';
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-2-table-5", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function table6(){
		$this->columns = 11;
		$this->content_data['section_id'] = '2';
		$this->data = $this->includes;
		$this->panel_title = "";
		$this->panel_icon = '';
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-2-table-6", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function table7(){
		$this->columns = 11;
		$this->content_data['section_id'] = '2';
		$this->data = $this->includes;
		$this->panel_title = "";
		$this->panel_icon = '';
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-2-table-7", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function table8(){
		$this->columns = 11;
		$this->content_data['section_id'] = '2';
		$this->data = $this->includes;
		$this->panel_title = "";
		$this->panel_icon = '';
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-2-table-8", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function table9(){
		$this->columns = 11;
		$this->content_data['section_id'] = '2';
		$this->data = $this->includes;
		$this->panel_title = "";
		$this->panel_icon = '';
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-2-table-9", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}

	function table10(){
		$this->columns = 11;
		$this->content_data['section_id'] = '2';
		$this->data = $this->includes;
		$this->panel_title = "";
		$this->panel_icon = '';
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-2-table-10", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}
	
	function table11(){
		$this->columns = 11;
		$this->content_data['section_id'] = '2';
		$this->data = $this->includes;
		$this->panel_title = "";
		$this->panel_icon = '';
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-2-table-11", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}		

	function table12(){
		$this->columns = 11;
		$this->content_data['section_id'] = '2';
		$this->data = $this->includes;
		$this->panel_title = "";
		$this->panel_icon = '';
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-2-table-12", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}			

	function table13(){
		$this->columns = 11;
		$this->content_data['section_id'] = '2';
		$this->data = $this->includes;
		$this->panel_title = "";
		$this->panel_icon = '';
		$this->content_data['mission_id'] = $this->id;
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-2-table-13", $this->content_data, true);
		$this->load->view($this->template, $this->data);
	}			
		
	function pdf(){
		$this->content_data['section_id'] = '1';
//		$this->content_data['mission_id'] = '23';
        $this->content_data['mission_id'] = ($this->input->get('id') ? $this->encrypt->decode(base64_decode($this->input->get('id'))) : null);

		$this->data['content'] = $this->load->view("reporting/generate-draft-par-pdf", $this->content_data, true);
		$html = $this->load->view($this->pdf_template, $this->data);
		$html = $this->output->get_output();

		$this->load->library('dompdf_gen');
		$this->dompdf->load_html($html);
//		$this->dompdf->set_base_path('');
		$this->dompdf->set_paper('A4', 'portrait');		
		$this->dompdf->render();
		$canvas = $this->dompdf->get_canvas();
		$font = Font_Metrics::get_font("helvetica", "bold");

	/*	$pdf->page_script('
		  $pageText = $PAGE_NUM . "/" . $PAGE_COUNT;
		  $y = $pdf->get_height() - 24;
		  $x = ($pdf->get_width() - Font_Metrics::get_text_width($pageText, $font, $size))/2;
		  $pdf->page_text($x, $y, $pageText, $font, $size);
		');
		*/
		$y = 825;

		
//		$canvas->page_text(300, 820, "{PAGE_NUM} | TADAT PERFORMANCE ASSESSMENT REPORT", $font, 7, array(64,99,88));
		$this->dompdf->stream("TADAT PERFORMANCE ASSESSMENT REPORT.pdf",array('Attachment'=>0));

/* WORKING*/

/*
		$html = $this->load->view('reporting/test');
		$html = $this->output->get_output();
		$this->load->library('dompdf_gen');
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$canvas = $this->dompdf->get_canvas();
		$font = Font_Metrics::get_font("helvetica", "bold");
		$canvas->page_text(72, 18, "Header: {PAGE_NUM} of {PAGE_COUNT}", $font, 6, array(0,0,0));
		$this->dompdf->stream("welcome.pdf",array('Attachment'=>0));
*/
	}
	function pdf_view(){
		$this->content_data['section_id'] = '1';
		$this->content_data['mission_id'] = '14';
		$this->data['content'] = $this->load->view("reporting/".$this->content_data['section_id']."-3-executive-pdf", $this->content_data, true);
		$html = $this->load->view($this->pdf_template, $this->data);
		$html = $this->output->get_output();
	}	



	function submit(){
		$this->data = $this->includes;
		$this->form_data = ($this->input->post()) ? $this->input->post() : null;
		if($this->form_data['fkidSection'] && $this->form_data['fkidSection'] !== ''){
			$this->tbl = 'par_section_'.$this->form_data['fkidSection'];
			$this->parId = _get_par_table_id_by_mission_id($this->id,$this->tbl);
		}
		
		if($this->parId){
			$this->action = 'update';
			$this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->parId, 'id', 'db_b');
		}else{
			$this->action = 'create';
			$this->crud_model->crud($this->action, $this->tbl, $this->form_data, $this->id,'', 'db_b');
		}
		$this->tbl = '';
		redirect(base_url('reporting/toc/?id='.base64_encode($this->encrypt->encode($this->id))));
	}
	
	function checkEditRights($editClass = null){
		if($this->user->fkidUserRole == 1 || $this->user->fkidUserRole == 2 || $this->user->fkidUserRole == 4){
			$editClass = 'editable '.$editClass;
			return $editClass;
		} else{
			$editClass = 'non-editable '.$editClass;
			return $editClass;
		}

	}	
	
}