<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Core_Controller extends CI_Controller {
    public $user, $settings, $includes, $current_uri, $theTheme, $template, $pdf_template, $error, $columns, $page_header, $panel_icon, $panel_title, $db_b;
	function __construct(){
		parent::__construct();
		# Setup second database
		$this->db_b = $this->load->database('db_b', TRUE); 
		# Default Bootdtrap column if not set in controllers
		$this->columns = 12;
		$this->page_header = strtoupper($this->config->item('application_name'));
		$this->panel_icon = 'fa fa-user';
		$this->panel_title = $this->page_header;
		$this->load->library('session');		
		/*

		
		$this->load->helper('cookie');
		delete_cookie("tadat_session");		
		
		*/
		# Set the user object to the session data if session data exists and is not empty: user is logged in and exists
		if(isset($this->session->userdata) !== false && empty($this->session->userdata) !== true){
		  if(!empty($this->session->userdata('logged_in')) !== false && empty($this->session->userdata('logged_in')) !== true){	  
		  //session_start();
			$this->user = (object) $this->session->userdata;
		  }else{
			  unset($this->user);
		  }
		}
		# Check if the user object is empty and the url is not part of the (login, forgot, reset) group - then redirect to login
		if ((empty($this->user->logged_in)) && (current_url() != base_url('login')) && (current_url() != base_url('forgot')) && (current_url() != base_url('reset'))){
			unset($this->user);
			redirect('login');
   		}
		
		$this->current_uri = "/" . uri_string();
		$this->add_external_css(array('https://fonts.googleapis.com/css?family=Quattrocento+Sans:400,700',"/themes/core/css/icons.css","/themes/core/css/bootstrap.css","/themes/core/css/plugins.css","/themes/core/css/main.css","/themes/core/css/custom.css","/themes/core/css/formValidation.css"));
		$this->add_external_js(array("/themes/core/js/jquery-2.1.1.min.js", "/themes/core/js/jquery-ui-1.10.4.min.js", "/themes/core/js/bootstrap.js", "/themes/core/js/modernizr.custom.js", "/themes/core/js/jRespond.min.js", "/themes/core/js/jquery.slimscroll.min.js", "/themes/core/js/jquery.slimscroll.horizontal.min.js", "/themes/core/js/fastclick.js", "/themes/core/js/jquery.velocity.min.js", "/themes/core/js/jquery.quicksearch.js", "/themes/core/js/jquery.Dynamic.js", "/themes/core/js/bootbox.js", "/themes/core/js/jquery.dynamic.js", "/themes/core/js/findAndReplaceDOMText.js", "/themes/core/js/main.js", "/themes/core/js/zxcvbn.js", "/themes/core/js/validation/formValidation.js", "/themes/core/js/validation/bootstrap.js"));
		$this->load->library('encrypt');
		$this->theTheme = strtolower($this->config->item('base_theme'));
		$this->template = "../../themes/" . $this->theTheme . "/template.php";
		$this->pdf_template = "../../themes/" . $this->theTheme . "/pdf_template.php";		
	
		if(!empty($this->user->logged_in) && $this->user->loginPasswordChange == 0){
			$this->session->set_flashdata('persistent-message', array('heading'=>lang('password_change_required_heading'), 'message'=>lang('password_change_required_message')));
			$this->columns = 6;
			$this->content_data['uri'] = base_url () . "users/update/?m=p&id=" . base64_encode($this->encrypt->encode($this->session->userdata('id')));
			if(current_url() !== "https://e-tadat.org/users/update")
				redirect($this->content_data['uri']);
		}
		if(!empty($this->user->logged_in)){
			$checkStatus = _get_account_status($this->user->id);
			if(!empty($this->user->logged_in) && $checkStatus == 0){
				$this->session->set_flashdata('persistent-message', array('heading'=>'ACCOUNT DISABLED!'));
				$this->columns = 6;
				if(current_url() !== "https://e-tadat.org/login")
					$this->session->unset_userdata('logged_in');
					$this->session->sess_destroy();
					$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
					foreach($cookies as $cookie) {
						$parts = explode('=', $cookie);
						$name = trim($parts[0]);
						setcookie($name, '', time()-1000);
						setcookie($name, '', time()-1000, '/');
					}
				redirect('login');
			}
	   }
		
		if(!empty($this->user->logged_in)){
			$checkUserLevel = _get_account_level($this->user->id);
			if(!empty($this->user->logged_in)){
				if($checkUserLevel !== $this->user->fkidUserRole){
					$this->session->set_flashdata('persistent-message', array('heading'=>'ACCOUNT ACCESS CHANGED!'));
					$this->columns = 6;
					if(current_url() !== "https://e-tadat.org/login")
						$this->session->unset_userdata('logged_in');
						$this->session->sess_destroy();
						$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
						foreach($cookies as $cookie) {
							$parts = explode('=', $cookie);
							$name = trim($parts[0]);
							setcookie($name, '', time()-1000);
							setcookie($name, '', time()-1000, '/');
						}
					redirect('login');
				}
			}
		}		
		
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