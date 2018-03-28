<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container" id="login-block">
	<div class="row">
		<div class="col-xs-2"></div>
		<div class="col-xs-8">
			<div class="register-box clearfix animated flipInY">
				<div class="page-icon animated bounceInDown"><img src="/themes/core/img/user-icon.png" alt="<?php echo lang('lock_icon');?>"></div>
				<div class="login-logo"><img src="/themes/core/img/login-logo.png" alt="<?php echo $this->config->item('application_name').' '.lang('logo'); ?>"></div>
				<div class="login-form">
					<div class="col-xs-2"></div>
						<div class="col-xs-8">
							<div class="panel panel-default panel-blue-margin mb0">
								<div class="panel-heading dark-blue-bg" id="id-custom-panel-bg"><h4 class="panel-title mb0"><i class="<?php echo (!empty($this->panel_icon)) ? $this->panel_icon : '';?>"></i><?php echo (!empty($this->panel_title)) ? strtoupper($this->panel_title): '';?></h4></div>		
								<div class="panel-body standard-text">
								<p><b>YOU HAVE BEEN REMOVED FROM THE WORKSHOP INVITATION LIST.</b></p>								
								<p>Kind regards</p>
								<p><b>The <?php echo $this->config->item('application_name').lang('_support').lang('_team') ?></b></p>								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-2"></div>		
	</div>
</div>