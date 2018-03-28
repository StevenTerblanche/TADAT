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
					<div class="alert alert-success tadat-success center mb10">
						<h4 class="login_heading">REGISTRATION SUCCESSFULL!</h4>
							<p>Please check your e-mail for a <Br>registration confirmation.</p><br> <p>This e-mail will also contain steps <br>on how to log into the TADAT Portal.</p>
							</div>
				</div> 
			</div>
		</div>
	</div>
</div>