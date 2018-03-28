<?php defined('BASEPATH') OR exit('No direct script access allowed');
/* 
	STATUS = DONE!
	LANGUAGE = DONE!
	NORMALISE = DONE!
	COMMENTS = DONE!
 */
class Core_Controller extends CI_Controller {
    public $user, $settings, $includes, $current_uri, $theTheme, $template, $registration_template, $pdf_template, $error, $columns, $page_header, $panel_icon, $panel_title;

	public $cloud_questions;

	function __construct(){
		parent::__construct();
		# Setup databases

		# PORTAL MAIN DATABASE	
		$this->db_portal = $this->load->database('portal', TRUE); 

		# CLOUD DATABASES
		$this->db_cloud_main = $this->load->database('cloud_main', TRUE); 
		$this->db_cloud_questions = $this->load->database('cloud_questions', TRUE); 		

		# TRAINING MAIN DATABASES	
		$this->db_training = $this->load->database('training', TRUE); 

		# CONNECT MAIN DATABASES	
		$this->db_connect = $this->load->database('connect', TRUE); 


		# Default Bootdtrap column if not set in controllers
		$this->columns = 12;
		$this->page_header = strtoupper($this->config->item('application_name'));
		$this->panel_icon = 'fa fa-user';
		$this->panel_title = $this->page_header;
//		$this->output->enable_profiler(TRUE);		
		# Set the user object to the session data if session data exists and is not empty: user is logged in and exists
		if(isset($this->session->userdata) !== false && empty($this->session->userdata) !== true){
		  if(!empty($this->session->userdata('logged_in')) !== false && empty($this->session->userdata('logged_in')) !== true){	  
			$this->user = (object) $this->session->userdata;
		  }else{
			  unset($this->user);
		  }
		}
		$this->current_uri = "/" . uri_string();
		$this->add_external_css(array("https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,700", base_url()."/themes/core/css/icons.css",base_url()."/themes/core/css/bootstrap.css",base_url()."/themes/core/css/plugins.css",base_url()."/themes/core/css/main.css",base_url()."/themes/core/css/custom.css","/themes/core/css/formValidation.css"));
		$this->add_external_js(array(base_url()."/themes/core/js/jquery-2.1.1.min.js", base_url()."/themes/core/js/jquery-ui-1.10.4.min.js", base_url()."/themes/core/js/bootstrap.js", base_url()."/themes/core/js/modernizr.custom.js", base_url()."/themes/core/js/jRespond.min.js", base_url()."/themes/core/js/jquery.slimscroll.min.js", base_url()."/themes/core/js/jquery.slimscroll.horizontal.min.js", base_url()."/themes/core/js/fastclick.js", base_url()."/themes/core/js/jquery.velocity.min.js", base_url()."/themes/core/js/jquery.quicksearch.js", base_url()."/themes/core/js/bootbox.js", base_url()."/themes/core/js/jquery.dynamic.js", base_url()."/themes/core/js/findAndReplaceDOMText.js", base_url()."/themes/core/js/jquery.dataTables.js", base_url()."/themes/core/js/dataTables.tableTools.js", base_url()."/themes/core/js/dataTables.bootstrap.js", base_url()."/themes/core/js/dataTables.responsive.js", base_url()."/themes/core/js/main.js", base_url()."/themes/core/js/zxcvbn.js", base_url()."/themes/core/js/validation/formValidation.js", base_url()."/themes/core/js/validation/bootstrap.js"));
		
//		$this->add_external_js(array("/themes/core/js/pace.min.js", "/themes/core/js/jquery-2.1.1.min.js", "/themes/core/js/jquery-ui-1.10.4.min.js", "/themes/core/js/bootstrap.js", "/themes/core/js/modernizr.custom.js", "/themes/core/js/jRespond.min.js", "/themes/core/js/jquery.slimscroll.min.js", "/themes/core/js/jquery.slimscroll.horizontal.min.js", "/themes/core/js/fastclick.js", "/themes/core/js/jquery.velocity.min.js", "/themes/core/js/jquery.quicksearch.js", "/themes/core/js/jquery.Dynamic.js", "/themes/core/js/bootbox.js", "/themes/core/js/jquery.dynamic.js", "/themes/core/js/findAndReplaceDOMText.js", "/themes/core/js/main.js"));		
		$this->load->library('encrypt');
		$this->theTheme = strtolower($this->config->item('base_theme'));
		$this->template = "../../themes/core/template.php";
		$this->dev_template = "../../themes/core/dev_template.php";		
		$this->registration_template = "../../themes/core/registration_template.php";		
		$this->pdf_template = "../../themes/core/pdf_template.php";		

		if ((empty($this->user->logged_in)) 
			&& (current_url() != base_url('register/complete')) 
			&& (current_url() != base_url('info')) 
			&& (current_url() != base_url('register')) 
			&& (current_url() != base_url('register/application')) 			
			&& (current_url() != base_url('register/resume')) 
			&& (current_url() != base_url('register/invitation')) 			
			&& (current_url() != base_url('register/selector')) 
			&& (current_url() != base_url('register/workshop/invitation')) 
			&& (current_url() != base_url('register/workshop/complete')) 
			&& (current_url() != base_url('users/awaiting/approval/profile/edit')) 
			&& (current_url() != base_url('register/decline')) 
			&& (current_url() != base_url('workshop/certificate')) 			
			&& (current_url() != base_url('portal/register/notify')) 			
			&& (current_url() != base_url('training/classmarker/classmarker/update_links')) 						
			&& (current_url() != base_url('portal/uploads/do_upload')) 
			&& (current_url() != base_url('uploads/do_upload')) 			
			&& (current_url() != base_url('global/ajax/populateUserDocuments')) 						
			&& (current_url() != base_url('check_mail')) 
			&& (current_url() != base_url('login')) 
			&& (current_url() != base_url('forgot')) 
			&& (current_url() != base_url('webhook')) 
			&& (current_url() != base_url('surveys/list')) 			
			&& (current_url() != base_url('reset'))){
			redirect('login');
  		}
		
		if(!empty($this->user->logged_in) && $this->user->loginPasswordChange == 0){
			$this->session->set_flashdata('persistent-message', array('heading'=>lang('password_change_required_heading'), 'message'=>lang('password_change_required_message')));
			$this->columns = 6;
			$this->content_data['uri'] = base_url () . "users/update/?m=p&id=" . base64_encode($this->encrypt->encode($this->session->userdata('id')));
			//echo current_url();
			if(current_url() !== "https://portal.e-tadat.org/users/update")
				
				redirect($this->content_data['uri']);
		}
		
		
	}
	
	function external_hook(){
		redirect('http://www.google.com');
	}

	function add_external_css( $css_files, $path = NULL ){
		if (!is_array($this->includes))
			$this->includes = array();
			$css_files = is_array( $css_files ) ? $css_files : explode( ",", $css_files );
			foreach($css_files as $css){
				$css = trim($css);
				if (empty($css)) continue;
				$this->includes['css_files'][sha1($css)] = is_null($path) ? $css : $path . $css;
			}
		return $this;
	}

	function add_external_js($js_files, $path = NULL){
		if (! is_array( $this->includes))
			$this->includes = array();
			$js_files = is_array($js_files) ? $js_files : explode(",", $js_files);
			foreach($js_files as $js){
				$js = trim($js);
				if (empty($js)) continue;
				$this->includes[ 'js_files' ][ sha1( $js ) ] = is_null( $path ) ? $js : $path . $js;
			}
		return $this;
	}

	function add_css_theme($css_files){
		if (! is_array($this->includes))
			$this->includes = array();
			$css_files = is_array($css_files) ? $css_files : explode(",", $css_files);
			foreach($css_files as $css){
				$css = trim($css);
				if (empty($css)) continue;
					$this->includes['css_files'][sha1($css)] = base_url("/themes/" . $this->theTheme . "/css") . "/{$css}";
			}
		return $this;
	}
	 
	function add_js_theme($js_files, $is_i18n = FALSE){
		if ($is_i18n)
			return $this->add_jsi18n_theme($js_files);
		if (! is_array($this->includes))

			$this->includes = array();
			$js_files = is_array($js_files) ? $js_files : explode(",", $js_files);
			foreach($js_files as $js){
				$js = trim($js);
				if (empty($js)) continue;
					$this->includes['js_files'][sha1($js)] = base_url("/themes/" . $this->theTheme . "/js") . "/{$js}";
			}
		return $this;
	}
	 
	function add_jsi18n_theme($js_files){
		if (! is_array( $this->includes))
			$this->includes = array();
			$js_files = is_array($js_files) ? $js_files : explode(",", $js_files);
			foreach($js_files as $js){
				$js = trim($js);
				if (empty($js)) continue;
				$this->includes['js_files_i18n'][ sha1($js)] = $this->jsi18n->translate("/themes/" . $this->theTheme . "/js/{$js}");
			}
		return $this;
	}

	function set_title($page_title){
		$this->includes['page_title'] = $page_title;
		$this->includes['page_header'] = isset($this->includes['page_header']) ? $this->includes['page_header'] : $page_title;
		return $this;
	}

	function set_page_header($page_header){
		$this->includes['page_header'] = $page_header;
		return $this;
	}
	
	function set_template($template_file = 'template.php'){
		$template_file = substr($template_file, -4) == '.php' ? $template_file : ($template_file . ".php");
		$this->template = "../../themes/" . $this->theTheme . "/{$template_file}";
	}
}