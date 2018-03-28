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
							echo form_open('', array('class'=>'form-signin')); 
							echo form_input(array('name'=>'name', 'id'=>'name', 'class'=>'input-field', 'required'=>'', 'placeholder'=>'First Name'));
							echo form_input(array('name'=>'surname', 'id'=>'surname', 'class'=>'input-field', 'required'=>'', 'placeholder'=>'Surname'));
							echo form_input(array('name'=>'email', 'id'=>'username', 'class'=>'input-field', 'required'=>'', 'placeholder'=>'E-mail Address'));
		                    echo form_submit(array('name'=>'submit', 'class'=>'btn btn-login btn-block'), 'REGISTER');
		                    echo form_close();


				?>
				</div> 
			</div>
		</div>
	</div>
</div>