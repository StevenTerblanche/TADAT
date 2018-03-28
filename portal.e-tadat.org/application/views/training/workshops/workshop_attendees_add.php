<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row" style="margin:0px !important; margin-top:15px !important">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl5 pr5">
		<div class="panel panel-default panel-blue-margin mb0">
			<div class="panel-heading dark-blue-bg" id="id-custom-panel-bg"><h4 class="panel-title mb0"><i class="<?php echo (!empty($this->panel_icon)) ? $this->panel_icon : '';?>"></i><?php echo (!empty($this->panel_title)) ? strtoupper($this->panel_title) : '';?></h4></div>
			<div class="panel-body">

		<?php
		 echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal')); ?>

				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('title');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-user"></span></span>
							<?php echo form_dropdown("fkidTitle", $get_dropdown_all_titles, set_value("fkidTitle",''), array('id'=>'role', 'required'=>'', 'class'=>'form-control')); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('firstname');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-user"></span></span>
							<?php echo form_input(array('name'=>'name', 'value'=>'', 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('firstname'))); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('surname');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-user"></span></span>
							<?php echo form_input(array('name'=>'surname', 'value'=>'', 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('surname')));?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('email').lang('_address');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-envelope"></span></span>
							<?php echo form_input(array('name'=>'email', 'value'=>'', 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('email').lang('_address'))); ?>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<div class="col-xs-12" style="text-align:center !important;">
					  <button type="submit" class="btn btn-primary white" id="show_submit"><i class="<?php echo $this->panel_icon;?> mr5"></i><?php echo $submit_button; ?></button>
					</div>
				</div>
				<?php 
				echo form_hidden('WorkshopFkId', $workshopId);
				echo form_close(); ?>
				

			</div>
		</div>
	</div>
</div>
				