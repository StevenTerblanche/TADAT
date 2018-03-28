<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
			<div class="panel panel-success panel-blue-margin form-error">
				<div class="panel-heading tadat-info">	
				<h4 class="panel-title"><i class="fa fa-envelope"></i><?php echo strtoupper(lang('no_').lang('notifications') . lang('_found'));?></h4></div>
				<div class="panel-body center"><?php echo lang('no_notifications_found'). $this->user->name .' '.$this->user->surname;?>.</div>
			</div>