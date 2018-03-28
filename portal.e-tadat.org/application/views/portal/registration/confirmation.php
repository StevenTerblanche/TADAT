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
								<div class="panel-heading dark-blue-bg" id="id-custom-panel-bg"><h4 class="panel-title mb0"><i class="<?php echo (!empty($this->panel_icon)) ? $this->panel_icon : '';?>"></i><?php echo (!empty($this->panel_title)) ? strtoupper($this->panel_title).' CONFIRMATION' : '';?></h4></div>		
								<div class="panel-body standard-text">
								<p><b>Dear 
									<?php 
										echo _global_convert_id_to_name('Title', 'Titles', $get_record_registration_user->fkidTitle).' '.$get_record_registration_user->name.' '.$get_record_registration_user->surname; 
									?>	
								</b></p>
								<? if($get_record_registration_user->progress === '0'){ ?>
									<p>This serves to confirm that you are in the process to apply for access to the TADAT Portal as a <?php echo _global_convert_id_to_name('role', 'UserRoles', $get_record_registration_user->fkidUserRole)?>.</p>
									<p>Your registration reference number is <?php echo $get_record_registration_user->referenceNumber?> and should be used when resuming your application.</p>
									<p> To resume your application, you must visit <a href="https://portal.e-tadat.org/register/resume">https://portal.e-tadat.org/register/resume</a>.</p>
									<p>An electronic confirmation has been sent to <?php echo $get_record_registration_user->email?> and will arrive shortly.</p>

								<? }else{ ?>
									<p>This serves to confirm that you have applied for access to the TADAT Portal as a <?php echo _global_convert_id_to_name('role', 'UserRoles', $get_record_registration_user->fkidUserRole)?>.</p>
									<p>Your application will be reviewed shortly by the TADAT Secretariat and you will be notified via e-mail to <?php echo $get_record_registration_user->email?> of the status of your application and what further information, if any, may be required.</p>
									<p>Your registration reference number is <?php echo $get_record_registration_user->referenceNumber?> and should be included in any correspondence with the TADAT Secretariat regarding your registration status.</p>
									<p>An electronic confirmation has been sent to <?php echo $get_record_registration_user->email?> and will arrive shortly.</p>
								<? }?>								
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