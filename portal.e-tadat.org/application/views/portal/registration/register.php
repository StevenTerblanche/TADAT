<?php
defined('BASEPATH') OR exit('No direct script access allowed');?>

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
								<div class="panel-heading dark-blue-bg" id="id-custom-panel-bg"><h4 class="panel-title mb0"><i class="<?php echo (!empty($this->panel_icon)) ? $this->panel_icon : '';?>"></i><?php echo (!empty($this->panel_title)) ? strtoupper($this->panel_title) : '';?></h4></div>		
								<div class="panel-body">
									<?php echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal')); ?>
									<div class="form-group" style="margin-left:40px !important; margin-right:40px !important">
										<p style="color:#3B3B3B !important"> Registration is not an acknowledgement of acceptance for access to the TADAT Portal. On successfull registration you will be advised on the status of your application and what further information may be required. </p>
										<p style="color:#3B3B3B !important"> Kindly select the type of registration you would like to perform.</p>
										<div class="col-xs-2"></div>
											<div class="col-xs-8">
												<div class="input-group">
													<span class="input-group-addon"><span class="fa fa-user"></span></span> 
														<?php echo form_dropdown("selector", $get_dropdown_all_registration_roles ,'',  array('id'=>'role', 'required'=>'', 'class'=>'form-control')); ?> 
												</div>
											</div>
										<div class="col-xs-2"></div>
									</div>
									<div class="form-group">
										<div class="col-xs-12" style="text-align:center !important;">
										  <button type="submit" class="btn btn-primary white"><i class="<?php echo $this->panel_icon;?> mr5"></i>NEXT</button>
										</div>
									</div>
					
									<?php echo form_close(); ?>
	
	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-2"></div>		
	</div>
</div>