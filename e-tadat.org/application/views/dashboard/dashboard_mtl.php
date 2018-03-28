<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
?>
<div class="row" style="margin:0px !important; margin-top:15px !important">
	<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 pl5 pr5">
		<div class="panel dashboard-blue-panel tile panelClose toggle pl0 pr0">
			<div class="panel-heading pl5 pr5">
				<h4 class="panel-title fs14">MISSIONS ASSIGNED TO YOU</h4>
			</div>
			<div class="panel-body pt0 pl5 pr5 pb10">
				<div class="progressbar-stats-1">
					<div class="stats">
						<i class="fa fa-globe"></i>
						<div class="stats-number" data-from="0" data-to="<?php echo $missions_count;?>">0</div>
					</div>
					<div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
						<div class="progress-bar progress-bar-white" role="progressbar" data-transitiongoal="15"></div>
					</div>
			<?php if($missions_count >= 1){ ?>
					<div class="comparison">
						<p class="mb0 mt10"><i class="fa fa-arrow-circle-o-right s20 mr5 pull-left"></i><a class="white-text fs12 lh20" href="<?php echo base_url().'missions/list';?>">View assigned Missions</a></p>
					</div>
					<?php }else{?>										
					<div class="comparison">
						<p class="mb0"><i class="fa fa-arrow-circle-o-right s20 mr5 pull-left"></i></p>					
					</div>
					<?php }?>

				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 pl5 pr5">
		<div class="panel dashboard-red-panel tile panelClose toggle">
			<div class="panel-heading pl5 pr5">
				<h4 class="panel-title fs14">POA'S ASSIGNED TO YOU</h4>
			</div>
			<div class="panel-body pt0 pl5 pr5 pb10">
				<div class="progressbar-stats-1">
					<div class="stats">
						<i class="fa fa-bank"></i> 
						<div class="stats-number" data-from="0" data-to="<?php echo $poa_count;?>">0</div>
					</div>
					<div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
						<div class="progress-bar progress-bar-white" role="progressbar" data-transitiongoal="63"></div>
					</div>
			<?php if($poa_count >= 1){ ?>					
					<div class="comparison">
						<p class="mb0"><i class="fa fa-arrow-circle-o-right s20 mr5 pull-left"></i><a class="white-text fs12 lh20" href="<?php echo base_url().'missions/list';?>">View assigned POA's</a></p>
					</div>
					<?php }else{?>										
					<div class="comparison">
						<p class="mb0"><i class="fa fa-arrow-circle-o-right s20 mr5 pull-left"></i></p>					
					</div>
			<?php }?>

				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 pl5 pr5">
		<div class="panel dashboard-green-panel tile panelClose toggle">
			<div class="panel-heading pl5 pr5">
				<h4 class="panel-title fs14">VIEW ASSIGNED ASSESSORS</h4>
			</div>
			<div class="panel-body pt0 pl5 pr5 pb10">
				<div class="progressbar-stats-1">
					<div class="stats">
						<i class="fa fa-briefcase"></i> 
						<div class="stats-number" data-from="0" data-to="<?php echo $assessors_count;?>">0</div>
					</div>
					<div class="progress animated-bar flat transparent progress-bar-xs mb10 mt0">
						<div class="progress-bar progress-bar-white" role="progressbar" data-transitiongoal="86"></div>
					</div>
			<?php if($assessors_count >= 1){ ?>										
					<div class="comparison">
						<p class="mb0"><i class="fa fa-arrow-circle-o-right s20 mr5 pull-left"></i><a class="white-text fs12 lh20" href="<?php echo base_url().'assignments/list';?>">View assigned Assessors</a></p>
					</div>
					<?php }else{?>										
					<div class="comparison">
						<p class="mb0"><i class="fa fa-arrow-circle-o-right s20 mr5 pull-left"></i></p>					
					</div>
					<?php }?>
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