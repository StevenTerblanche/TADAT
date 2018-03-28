<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
	setcookie("etd_ck", "", 1);
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
