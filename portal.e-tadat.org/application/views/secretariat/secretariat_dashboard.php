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
					<?php if (_groupMembership('Workshops', 'Read')&& $this->user->fkidUserRole != 12){ ?>				
					<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 header-grid-info"> 
						<div class="header-grid header-grid-heading green">
							<a href="<?php echo base_url();?>workshops/dashboard">							
								<div class="header-grid-img"> <img src="/themes/core/img/dashboards/training/users.jpg" alt=""></div>
									<h3>USER MANAGEMENT</h3>
							</a> 									

							<p><a class="header-grid-sub-links" href="<?php echo base_url('users/awaiting/approval?user_type='.base64_encode($this->encrypt->encode(8)))?>">Trainees Awaiting Approval</a></p>
							<p><a class="header-grid-sub-links" href="<?php echo base_url('users/awaiting/approval')?>">Users Awaiting Approval</a></p>							
							<p><a class="header-grid-sub-links" href="<?php echo base_url('users/approved')?>">All Approved Users</a></p>
							<p><a class="header-grid-sub-links" href="<?php echo base_url('users/imported')?>">Imported Users awaiting Activation</a></p>							
							<p><a class="header-grid-sub-links" href="<?php echo base_url('users/imported/connect')?>">Imported Ghana Connect Users</a></p>
							<p><a class="header-grid-sub-links" href="<?php echo base_url('users/all')?>">All Users</a></p>							
						</div>
					</div>
					<?php }; ?>

					
					
					
					
					
					
					<div class="clearfix"> </div>
				</div> <?php /* END OF HEADER GRIDS */ ?>
			</div>
		</div>
	</div>
</div>