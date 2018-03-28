<?php 	defined('BASEPATH') OR exit('No direct script access allowed');
	/* 
		STATUS    = IN-PROGRESS
		LANGUAGE  = DONE!
		NORMALISE = DONE
		COMMENTS  = IN-PROGRESS
	 */

 # This <div id="wrapper"> closes in content.php
 $notificationAlerter = '<span class="badge badge-danger">0</span>';
 $notificationAlerter = '';
 ?>
<div id="header" class="page-navbar">
	<a href="<?php echo base_url('/dashboard'); ?>" class="navbar-brand hidden-xs hidden-sm">
		<img src="/themes/core/img/logo.png" class="logo hidden-xs" alt="<?php echo lang('logo');?>">
		<img src="/themes/core/img/logosm.png" class="logo-sm hidden-lg hidden-md" alt="<?php echo lang('logo');?>">
	</a>
	<div id="navbar-no-collapse" class="navbar-no-collapse">
		<ul class="nav navbar-nav">
			<li class="toggle-sidebar"><a class="toggle-white" href="#"><i class="fa fa-reorder"></i><span class="sr-only"><?php echo lang('collapse_sidebar');?></span></a></li>
		</ul>
		<div class="page_heading">
			<?php if(isset($this->page_header)) echo $this->page_header;?>
		</div>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="<?php echo base_url('/notifications'); ?>"><i class="fa fa-bell-o"></i><span class="text-below"><?php echo lang('notifications');?></span><?php echo $notificationAlerter;?></a>
			</li>
			<li class="dropdown">
				<a href="#" data-toggle="dropdown"><i class="fa fa-cog"></i><span class="text-below"><?php echo lang('settings');?></span></a>
				<ul class="dropdown-menu dropdown-form dynamic-settings right" role="menu">
					<li><a href="<?php echo base_url('/users/update/?m=s&id=') . base64_encode($this->encrypt->encode($this->user->id));?>" class="dropdown-menu-header"><i class="fa fa-user"></i><?php echo lang('manage_').lang('my').lang('_profile');?></a></li>
					<li><a href="<?php echo base_url('/users/update/?m=p&id=') . base64_encode($this->encrypt->encode($this->user->id));?>" class="dropdown-menu-header"><i class="fa fa-lock"></i><?php echo lang('change_').lang('my').lang('_password');?></a></li>
				</ul>
			</li>
			<li><a href="<?php echo base_url('/login/logout'); ?>"><i class="fa fa-power-off"></i><span class="text-below"><?php echo lang('logout');?></span></a></li>
		</ul>
	</div>
</div>