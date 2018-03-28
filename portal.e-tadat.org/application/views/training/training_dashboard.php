<?php defined('BASEPATH') OR exit('No direct script access allowed');  
//_show_array($this->user);

?>
<div class="row" style="margin:0px !important; margin-top:15px !important">

	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl5 pr5">

		<div class="panel panel-default plain toggle panelMove panelClose panelRefresh mb0">
			<div class="panel-body">
				<?php /* START OF HEADER GRIDS */ ?>
				<div class="header-grids">
				<?php /* USERS */ ?>
					<?php // if (_groupMembership('Workshops', 'Read')&& $this->user->fkidUserRole != 12){ ?>				
<!--					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 header-grid-info"> 
						<div class="header-grid header-grid-heading green">
							<a href="<?php echo base_url();?>workshops/dashboard">							
								<div class="header-grid-img"> <img src="/themes/core/img/dashboards/training/users.jpg" alt=""></div>
									<h3>USER MANAGEMENT</h3>
							</a> 									

							<p><a class="header-grid-sub-links" href="<?php echo base_url('users/awaiting/approval')?>">Users Awaiting Approval</a></p>
							<p><a class="header-grid-sub-links" href="<?php echo base_url('users/approved')?>">All Approved Users</a></p>
						</div>
					</div> -->
					<?php // }; ?>

					<?php /* WORKSHOPS */ ?>
					<?php if (_groupMembership('Workshops')){ ?>				
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 header-grid-info"> 
						<div class="header-grid header-grid-heading green">
							<a href="#">							
								<div class="header-grid-img"> <img src="/themes/core/img/dashboards/training/workshops.jpg" alt=""></div>
									<h3>WORKSHOPS</h3>
							</a> 									
					<?php if (_groupMembership('Workshops', 'Add') && $this->user->fkidUserRole != 12){ ?>				
							<p><a class="header-grid-sub-links" href="<?php echo base_url('workshops/list')?>">View scheduled Workshops</a></p>
							<p><a class="header-grid-sub-links" href="<?php echo base_url('workshops/select')?>">Add Workshop Attendees </a></p>
							<p><a class="header-grid-sub-links" href="<?php echo base_url('workshops/select/list/invitees')?>">View Workshop Attendees</a></p>
							<p><a class="header-grid-sub-links" href="<?php echo base_url('workshops/completed')?>">View Workshop Results</a></p>
					<?php }; ?>
					<?php if (_groupMembership('Workshops', 'Read')&& $this->user->fkidUserRole != 12){ ?>				
							<p><a class="header-grid-sub-links" href="<?php echo base_url('workshops/schedule')?>">Schedule a Workshop</a></p>
							<p><a class="header-grid-sub-links" href="<?php echo base_url('workshops/list')?>">View scheduled Workshops</a></p>
<!--							<p><a class="header-grid-sub-links" href="<?php echo base_url('workshops/results')?>">View All Exam results</a></p>-->
							<p><a class="header-grid-sub-links" href="<?php echo base_url('workshops/completed')?>">View Workshop Results</a></p>
							<p><a class="header-grid-sub-links" href="<?php echo base_url('workshops/links')?>">View Workshop Links</a></p>							
					<?php }; ?>
					<?php if (_groupMembership('Workshops', 'Read') && $this->user->fkidUserRole == 12){ ?>				
							<p><a class="header-grid-sub-links" href="<?php echo base_url('workshops/list')?>">View scheduled Workshops</a></p>

					<?php }; ?>					
						</div>
					</div>
					<?php }; ?>
					
					<?php /* EDX */ ?>
					<?php if (_groupMembership('EDX','Read')){ ?>				
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 header-grid-info"> 
						<div class="header-grid header-grid-heading green">
							<a href="https://www.edx.org/" target="_blank">							
								<div class="header-grid-img"> <img src="/themes/core/img/dashboards/training/edx.jpg" alt=""></div>
									<h3>EDX</h3>
							</a> 									
						</div>
					</div>
					<?php }; ?>
					
					<?php /* PROCTORU */ ?>
					<?php if (_groupMembership('ProctorU','Read')){ ?>				
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 header-grid-info"> 
						<div class="header-grid header-grid-heading orange">
							<a href="https://www.proctoru.com/" target="_blank">							
								<div class="header-grid-img"> <img src="/themes/core/img/dashboards/training/workshops.jpg" alt=""></div>
									<h3>ProctorU</h3>
							</a> 									
						</div>
					</div>
					<?php }; ?>
					
					
					
					
					
					
					<div class="clearfix"> </div>
				</div> <?php /* END OF HEADER GRIDS */ ?>
			</div>
		</div>
	</div>
</div>