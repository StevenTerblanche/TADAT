<?php defined('BASEPATH') OR exit('No direct script access allowed'); 


		if($this->user->termsAccepted == 0){ ?>
			<div class="panel panel-success panel-blue-margin form-error">
				<div class="panel-heading tadat-info">	
				<h4 class="panel-title"><i class="fa fa-envelope"></i>TADAT CONNECT TERMS OF USE</h4></div>
				<div class="panel-body">
					<p><b>Dear <?php echo $this->user->name .' '.$this->user->surname;?>.</b></p>
					<p>To continue using the TADAT Portal, you must agree to the standard rules of use below:</p>
						<div>
							<ul>
								<li>No abusive language</li>
								<li>No unsubstantiated allegations</li>
								<li>No incitement to ethnic, religious or sectarian hatred</li>
								<li>No incitement to violence</li>
								<li>No spam</li>
								<li>No impersonating other people </li>
								<li>Offending comments will be deleted without notice.</li>
							</ul>
					</div>
					<?php echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal')); ?>
					<?php echo form_hidden('fkidUserId', $this->user->id); ?>
				<div class="form-group">
					<div class="col-xs-12" style="margin-left:15px !important">
						<div class="input-group">
							<?php 
								$data = array(
									'name'          => 'termsAccepted',
									'value'         => '1',
									'required'       => TRUE,
									'style'         => 'margin:0px'
								);
							
							
							
							echo form_checkbox($data);?> <label>By ticking this box you agree to abide by the rules as set out above.</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12" id="button-hider" style="text-align:center !important;">
					  <button type="submit" class="btn btn-primary white"><i class="<?php echo $this->panel_icon;?> mr5"></i>I AGREE TO THE RULES OF USE</button>
					</div>
				</div>

				<?php echo form_close(); ?>
				</div>
			</div>
	<?
		}else{

	?>
				<div class="panel panel-success panel-blue-margin form-error">
				<div class="panel-heading tadat-info">	
				<h4 class="panel-title"><i class="fa fa-envelope"></i><?php echo strtoupper(lang('no_').lang('notifications') . lang('_found'));?></h4></div>
				<div class="panel-body center"><?php echo lang('no_notifications_found'). $this->user->name .' '.$this->user->surname;?>.</div>
			</div>
			
	<? } ?>