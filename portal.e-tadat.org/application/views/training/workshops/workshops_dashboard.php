<?php defined('BASEPATH') OR exit('No direct script access allowed');  ?>
<div class="row" style="margin:0px !important; margin-top:15px !important">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl5 pr5">
		<div class="panel panel-default plain toggle panelMove panelClose panelRefresh mb0">
			<div class="panel-body">
				<?php /* START OF HEADER GRIDS */ ?>
				<div class="header-grids">
					<?php /* WORKSHOPS */ ?>
					<?php if (_groupMembership('Workshops','Read')){ ?>				
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 header-grid-info"> 
						<a href="#">
							<div class="header-grid header-grid-heading green">
								<div class="header-grid-img"> <img src="../themes/core/img/dashboards/portal/connect.jpg" alt="">
									<h3>SCHEDULE A WORKSHOP</h3>
								</div>
							</div>
						</a> 
					</div>
					<?php }; ?>					

					<?php /* EDX TRAINING*/ ?>
					<?php if (_groupMembership('Training','Read')){ ?>
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 header-grid-info"> 
						<a href="#">
							<div class="header-grid header-grid-heading blue">
								<div class="header-grid-img header-grid-heading blue-grid"> <img src="../themes/core/img/dashboards/portal/e_tadat.jpg" alt="">
									<h3>EDX TRAINING</h3>
								</div>
							</div>
						</a> 
					</div>
					<?php }; ?>										



					<?php /* EXAMS */ ?>
					<?php if (_groupMembership('Exams','Read')){ ?>
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 header-grid-info"> 
						<a href="#">
							<div class="header-grid header-grid-heading light-blue">
								<div class="header-grid-img light-blue-grid"> <img src="../themes/core/img/dashboards/portal/edx.jpg" alt="">
									<h3>EXAMS</h3>
								</div>
							</div>
						</a> 
					</div>
					<?php }; ?>										



					<?php /* SURVEYS */ ?>
					<?php if (_groupMembership('Surveys','Read')){ ?>
					
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 header-grid-info"> 
						<a href="#">
							<div class="header-grid header-grid-heading orange">
								<div class="header-grid-img orange-grid"> <img src="../themes/core/img/dashboards/portal/surveys.jpg" alt="">
									<h3>PROCTORU RESULTS</h3>
								</div>
							</div>
						</a> 
					</div>
					<?php }; ?>										



					<?php /* TRAINING */ ?>
					<?php if (_groupMembership('Training','Read')){ ?>
					
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 header-grid-info"> 
						<a href="http://portal.e-tadat.org/training/dashboard">
						<div class="header-grid header-grid-heading purple">
							<div class="header-grid-img purple-grid"> <img src="../themes/core/img/dashboards/portal/training.jpg" alt="">
								<h3>TRAINING</h3>
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
