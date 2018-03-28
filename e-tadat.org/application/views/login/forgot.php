<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
	/* 
		STATUS 		= DONE
		LANGUAGE 	= DONE
		NORMALISE 	= DONE
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
							# Gets returned when password successfully reset 
							echo '<div class="alert alert-success tadat-success center mb20">';
							echo '<h4 class="login_heading">'.lang('password_reset_heading').'</h4>';
							echo $this->session->flashdata('message');
							echo '</div>';
					}else{
						if ($this->session->flashdata('error')){
							# Gets returned when email NOT FOUND in db
							echo '<div class="alert alert-danger tadat-danger center mb20">';
							echo '<h4 class="login_heading">'.lang('authentication_error').'</h4>';
							echo $this->session->flashdata('error'); 
							echo '</div>';
						}elseif (validation_errors()){
							# Gets returned when text submitted IS NOT an e-mail
							echo '<div class="alert alert-danger tadat-danger center mb20">';
							echo '<h4 class="login_heading">'.lang('validation_error').'</h4>';
							echo validation_errors(); 
							echo '</div>';
						}elseif ($this->session->flashdata('system_error')){
							echo '<div class="alert alert-danger tadat-danger center mb20">';
							echo '<h4 class="login_heading">'.lang('system_error').'</h4>';
							echo $this->session->flashdata('system_error'); 
							echo '</div>';
						}
						# Show the form
						echo '<div class="forgot-text">'.lang('forgot_password_text').'</div>';
						echo form_open('', array('role'=>'form')); 
						echo form_input(array('name'=>'username', 'value'=>set_value('username'), 'class'=>'input-field center', 'required'=>'', 'placeholder'=>lang('email_address'))); 
						echo '<button type="submit" name="submit" class="btn btn-login btn-reset">' . lang('reset_password') . '</button>';
						echo form_close();
					}
				?>
				</div> 			        	
			</div>
		</div>
	</div>
</div>