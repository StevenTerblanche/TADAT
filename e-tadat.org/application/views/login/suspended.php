<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
//session_destroy();
//session_start();
//echo ini_get('session.gc_maxlifetime');
//ini_set('session.gc_maxlifetime');
//$this->session->sess_expire_on_close = TRUE;
// Unset all of the session variables.
//$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
/*if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
	//var_dump($params);
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();
*/
?>
<div class="container" id="login-block">
	<div class="row">
		<div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
			<div class="login-box clearfix animated flipInY">
				<div class="page-icon animated bounceInDown"><img src="/themes/core/img/user-icon.png" alt="<?php echo lang('lock_icon');?>"></div>
				<div class="login-logo"><img src="/themes/core/img/login-logo.png" alt="<?php echo $this->config->item('application_name').' '.lang('logo'); ?>"></div> 
				<hr>
				<div class="login-form">
				<?php
					if ($this->session->flashdata('message')){
						echo '<div class="alert alert-success center mb20">';
						echo '<h4 class="login_heading">'.lang('password_reset_heading').'</h4>';
						echo $this->session->flashdata('message');
						echo '</div>';	
					}else{
						if ($this->session->flashdata('error') || validation_errors()){
							echo '<div class="alert alert-danger tadat-danger center mb20">';
							echo '<h4 class="login_heading">'.lang('authentication_error').'</h4>';
							echo ($this->session->flashdata('error') ? $this->session->flashdata('error') : "" );
							echo (validation_errors() ? validation_errors() : "" );
							echo '</div>';
						}
							echo form_open('', array('class'=>'form-signin','method'=>'post')); 
							echo form_input(array('name'=>'username', 'id'=>'username', 'class'=>'input-field', 'required'=>'', 'placeholder'=>lang('email_address'), 'autocomplete'=>'off'));
		                    echo form_password(array('name'=>'password', 'id'=>'password', 'class'=>'input-field', 'required'=>'', 'placeholder'=>lang('password'), 'autocomplete'=>'off'));
		                    echo form_submit(array('name'=>'submit', 'class'=>'btn btn-login btn-block'), lang('login'));
		                    echo form_close();
							echo '<div class="login-links"><a href="' . base_url('forgot') . '">' . lang('forgot_password_link') . '</a></div>';
						}
				?>
				</div> 
			</div>
		</div>
	</div>
</div>
<?  





/*


$this->load->helper('cookie');
$domain = '.e-tadat.org';
$path = '/';
delete_cookie('tadat_session', $domain, $path); 

delete_cookie("etd_csrf_cookie");
delete_cookie("_firstImpression");
//$this->session->sess_destroy();
echo $_COOKIE["tadat_session"];
		//if($this->input->cookie('tadat_session')!=''){
			
				if (isset($_SERVER['HTTP_COOKIE'])){
							echo 'here<pre>';
					
					$cookies = explode(';', $_SERVER['HTTP_COOKIE']);
					var_dump($cookies);
					foreach($cookies as $cookie) {
						$parts = explode('=', $cookie);
						$name = trim($parts[0]);
						setcookie($name, '', time()-1000);
						setcookie($name, '', time()-1000, '/');
					}
				}
		//	}
$this->session->unset_userdata('tadat_session'); 		
$this->session->unset_userdata('logged_in');
$this->session->sess_destroy();
		
*/










?>