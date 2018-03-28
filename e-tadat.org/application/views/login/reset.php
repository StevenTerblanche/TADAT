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
					if ( $this->session->flashdata('fatal_error')){
								echo '<div class="alert alert-danger center tadat-danger mb10">';
								echo '<h4 class="login_heading">'.lang('token_error').'</h4>';
								echo '<p>'.$this->session->flashdata('fatal_error').'</p>';
								echo '<p><a class="white-link" href="' . base_url('forgot') . '">'.lang('click_here_to_request').'<br>'.lang('a_new_token').'</a></p>';
								echo '</div>';
					}else{
						if ( $this->session->flashdata('message')){
							echo '<div class="alert alert-success tadat-success center mb10">';
							echo '<h4 class="login_heading">'.lang('password_reset_heading').'</h4>';
							echo $this->session->flashdata('message');
							echo '</div>';	
						}else{
							if ( $this->session->flashdata('error') || validation_errors()){
								echo '<div class="alert alert-danger center tadat-danger mb10">';
								echo '<h4 class="login_heading">'.lang('authentication_error').'</h4>';
								echo ( $this->session->flashdata('error') ? $this->session->flashdata('error') : "" );
								echo ( validation_errors() ? validation_errors() : "" );
								echo '</div>';
							}
							echo '<div class="forgot-text">'.lang('instructions').'</div>';
							echo form_open( $hash , array('role'=>'form')); 
							echo form_password(array('name'=>'sent_password', 'value'=>'', 'class'=>'input-field', 'required'=>'', 'placeholder'=>lang('sent_password'))); 
							echo form_password(array('name'=>'sent_pin', 'value'=>'', 'class'=>'input-field', 'required'=>'', 'placeholder'=>lang('sent_pin'))); 
							echo form_password(array('name'=>'new_password', 'id'=>'new_password', 'value'=>'', 'class'=>'input-field', 'required'=>'', 'placeholder'=>lang('new_password'))); 
							echo form_password(array('name'=>'new_password_confirm', 'value'=>'', 'class'=>'input-field', 'required'=>'', 'placeholder'=>lang('new_password_confirm'))); 
							echo '<button type="submit" name="submit" class="btn btn-login btn-reset">' . lang('create_password') . '</button>';
							echo form_close();
						}
					}
				?>
				</div>
			</div>
		</div>
	</div>
</div>