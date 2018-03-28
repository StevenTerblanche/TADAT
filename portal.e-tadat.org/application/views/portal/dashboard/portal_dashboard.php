<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
	$arrHash = _get_hash_by_id($this->user->id);
//_show_array($this->user);
?>
<div class="row" style="margin:0px !important; margin-top:15px !important">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl5 pr5">
		<div class="panel panel-default plain toggle panelMove panelClose panelRefresh mb0">
			<div class="panel-body">
			
			
			
			
			
			
			
				<?php /* START OF HEADER GRIDS */ ?>
				<div class="header-grids">
					<?php /* CONNECT */ 
					
//					_show_array(get_instance()->user->GroupsAssigned);
					
					
					?>
					<?php if (_groupMembership('Connect')){ ?>				
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 header-grid-info"> 
						<a id="connect_button" href="#">
							<div class="header-grid header-grid-heading green">
								<div class="header-grid-img"> <img src="<?php echo base_url()?>themes/core/img/dashboards/portal/connect.jpg" alt="">
									<h3>CONNECT</h3>
								</div>
							</div>
						</a> 
					</div>

					<form id="connect_form" name="form1" method="post" action="https://connect.e-tadat.org/index.php" target="_blank">
						<input type="hidden" name="login" id="hiddenField" value="1">
						<input type="hidden" name="remember" id="hiddenField" value="0">
						<input type="hidden" name="username" id="hiddenField" value="<? echo $this->user->email; ?>">
						<input type="hidden" name="password" id="hiddenField" value="<? echo $arrHash['loginPasswordHash']; ?>">
					</form>
					<?php }; ?>					




					<?php /* SECRETARIAT */ ?>
					<?php if (_groupMembership('Secretariat')){ ?>
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 header-grid-info"> 
						<a href="<?php echo base_url()?>secretariat/dashboard">
							<div class="header-grid header-grid-heading light-blue">
								<div class="header-grid-img light-blue-grid"> <img src="<?php echo base_url()?>themes/core/img/dashboards/portal/edx.jpg" alt="">
									<h3>SECRETARIAT</h3>
								</div>
							</div>
						</a> 
					</div>
					<?php }; ?>										


					<?php /* TRAINING */ ?>
					<?php if (_groupMembership('Training')){ ?>
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 header-grid-info"> 
						<a href="<?php echo base_url()?>training/dashboard">
						<div class="header-grid header-grid-heading purple">
							<div class="header-grid-img purple-grid"> <img src="<?php echo base_url()?>themes/core/img/dashboards/portal/training.jpg" alt="">
								<h3>TRAINING</h3>
							</div>
						</div>
						</a>
					</div>
					<?php }; ?>															

					<?php /* SURVEYS */ ?>
					<?php if (_groupMembership('Surveys')){ ?>
					
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 header-grid-info"> 
						<a href="<?php echo base_url()?>surveys/list">
							<div class="header-grid header-grid-heading orange">
								<div class="header-grid-img orange-grid"> <img src="<?php echo base_url()?>themes/core/img/dashboards/portal/surveys.jpg" alt="">
									<h3>SURVEYS</h3>
								</div>
							</div>
						</a> 
					</div>
					<?php }; ?>										

					<?php /* E-TADAT */ ?>
					<?php if (_groupMembership('eTadat')){ ?>
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 header-grid-info"> 
						<a href="http://www.e-tadat.org" target="_blank">
							<div class="header-grid header-grid-heading blue">
								<div class="header-grid-img header-grid-heading blue-grid"> <img src="<?php echo base_url()?>themes/core/img/dashboards/portal/e_tadat.jpg" alt="">
									<h3>e-TADAT</h3>
								</div>
							</div>
						</a> 
					</div>
					<?php }; ?>										



					<div class="clearfix"> </div>
				</div> <?php /* END OF HEADER GRIDS */ ?>
			</div>
		</div>
	</div>
</div>


<!--
<a class="quick-btn" href="#">
<i class="fa fa-signal fa-2x"></i>
<span>warning</span>
<span class="label label-warning">+25</span>
</a>
-->






