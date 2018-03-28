<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row" style="margin:0px !important; margin-top:15px !important">
	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 pl5 pr5">
		<div class="panel dashboard-red-panel tile panelClose toggle">
			<div class="panel-heading pl5 pr5">
				<h4 class="panel-title fs14"><?php echo lang('revenue_authorities').lang('_registered');?></h4>
			</div>
			<div class="panel-body pt0 pl5 pr5 pb10">
				<div class="progressbar-stats-1">
					<div class="stats">
						<i class="fa fa-bank"></i> 
						<div class="stats-number" data-from="0" data-to="<?php echo $authorities_count;?>">0</div>
					</div>
					<div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
						<div class="progress-bar progress-bar-white" role="progressbar" data-transitiongoal="100"></div>
					</div>
					<div class="comparison">
						<p class="mb0"><i class="fa fa-arrow-circle-o-right s20 mr0 pull-left"></i>
						<?php if($authorities_count >0){ ?>
						<a class="white-text fs12 lh20" href="<?php echo base_url().'authorities/list';?>"><?php echo lang('click_').lang('here').lang('_to_').strtolower(lang('view_')).lang('revenue_authorities'); ?></a>
						<?php }else{?>
						<a class="white-text fs12 lh20" href="<?php echo base_url().'authorities/create';?>"><?php echo lang('click_').lang('here').lang('_to_').strtolower(lang('create_a_')).lang('revenue_authority'); ?></a>
						<?php }?>						
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 pl5 pr5">
		<div class="panel dashboard-blue-panel tile panelClose toggle pl0 pr0">
			<div class="panel-heading pl5 pr5">
				<h4 class="panel-title fs14"><?php echo lang('missions').lang('_registered');?></h4>
			</div>
			<div class="panel-body pt0 pl5 pr5 pb10">
				<div class="progressbar-stats-1">
					<div class="stats">
						<i class="fa fa-globe"></i>
						<div class="stats-number" data-from="0" data-to="<?php echo $missions_count;?>">0</div>
					</div>
					<div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
						<div class="progress-bar progress-bar-white" role="progressbar" data-transitiongoal="100"></div>
					</div>
					<div class="comparison">
						<p class="mb0 mt10"><i class="fa fa-arrow-circle-o-right s20 mr5 pull-left"></i>
						<?php if($missions_count >0){ ?>
						<a class="white-text fs12 lh20" href="<?php echo base_url().'missions/list';?>"><?php echo lang('click_').lang('here').lang('_to_').strtolower(lang('view_')).lang('missions'); ?></a>
						<?php }else{?>
						<a class="white-text fs12 lh20" href="<?php echo base_url().'missions/create';?>"><?php echo lang('click_').lang('here').lang('_to_').strtolower(lang('create_a_')).lang('mission'); ?></a>
						<?php }?>						
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 pl5 pr5">
		<div class="panel dashboard-green-panel tile panelClose toggle">
			<div class="panel-heading pl5 pr5">
				<h4 class="panel-title fs14"><?php echo lang('users').lang('_registered');?></h4>
			</div>
			<div class="panel-body pt0 pl5 pr5 pb10">
				<div class="progressbar-stats-1">
					<div class="stats">
						<i class="fa fa-users"></i> 
						<div class="stats-number" data-from="0" data-to="<?php echo $users_count;?>">0</div>
					</div>
					<div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
						<div class="progress-bar progress-bar-white" role="progressbar" data-transitiongoal="100"></div>
					</div>
					<div class="comparison">
						<p class="mb0"><i class="fa fa-arrow-circle-o-right s20 mr5 pull-left"></i><a class="white-text fs12 lh20" href="<?php echo base_url().'users/list';?>"><?php echo lang('click_').lang('here').lang('_to_').strtolower(lang('view_')).lang('users'); ?></a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 pl5 pr5">
		<div class="panel dashboard-purple-panel tile panelClose toggle">
			<div class="panel-heading pl5 pr5">
				<h4 class="panel-title fs14"><?php echo lang('logins').lang('_to_').lang('date');?></h4>
			</div>
			<div class="panel-body pt0 pl5 pr5 pb10">
				<div class="progressbar-stats-1">
					<div class="stats">
						<i class="fa fa-lock"></i> 
						<div class="stats-number" data-from="0" data-to="<?php echo $logins_count;?>">0</div>
					</div>
					<div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
						<div class="progress-bar progress-bar-white" role="progressbar" data-transitiongoal="100"></div>
					</div>
					<div class="comparison">
						<p class="mb0"><i class="fa fa-arrow-circle-o-right s20 mr5 pull-left"></i><a class="white-text fs12 lh20" href="<?php echo base_url().'stats/login';?>"><?php echo lang('click_').lang('here').lang('_to_').strtolower(lang('view_')).lang('usage_').lang('statistics'); ?></a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row" style="margin:0px !important; margin-top:15px !important">
	<div class="col-lg-12 pl5 pr5">
		<div class="panel panel-default plain toggle panelMove panelClose panelRefresh mb0">
			<div class="panel-heading pl5 pr5">
				<h4 class="panel-title">TADAT Mission Map</h4>
			</div>
			<div class="panel-body">
				<div id="world-map-markers" style="width: 100%; height: 470px"></div>
			</div>
		</div>
	</div>
</div>