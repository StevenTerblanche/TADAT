<?php defined('BASEPATH') OR exit('No direct script access allowed'); 



		if(!isset($get_dropdown_all_country)) $get_dropdown_all_country = ''; 
		if(!isset($fkidCountry)) $fkidCountry = ''; 
		if(!isset($get_dropdown_all_states)) $get_dropdown_all_states = ''; 
		if(!isset($fkidState)) $fkidState = ''; 

		 echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal', 'id'=>'form-submit')); 


		 ?>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('title');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-user"></span></span>
							<?php echo form_dropdown("fkidTitle", $get_dropdown_all_titles, '', array('id'=>'role', 'required'=>'', 'class'=>'form-control')); ?>
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
							<input type="hidden" name="fkidLanguage" value="1">
							<input type="hidden" name="fkidUserRole" value="7">
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('office_').lang('telephone');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-earphone lh0"></span></span>
							<?php echo form_input(array('name'=>'telephone', 'value'=>'', 'class'=>'form-control', 'placeholder'=>lang('eg_telephone'))); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('mobile');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-phone lh0"></span></span>
							<?php echo form_input(array('name'=>'mobile', 'value'=>'', 'class'=>'form-control', 'placeholder'=>lang('eg_mobile'))); ?>
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
					<label class="col-xs-3 control-label"><?php echo lang('skype').lang('_address');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-skype"></span></span>
							<?php echo form_input(array('name'=>'skype', 'value'=>'', 'class'=>'form-control', 'placeholder'=>lang('eg_skype'))); ?>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('city');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-institution"></span></span>
							<?php echo form_input(array('name'=>'city', 'value'=>'', 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('city'))); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('region');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
							<?php echo form_dropdown("fkidRegion", $get_dropdown_all_region, '', array('id'=>'region', 'required'=>'', 'class'=>'form-control')); ?>
						</div>
					</div>
				</div>	
				<div id="country_container" class="form-group" style="display:none">
					<label class="col-xs-3 control-label"><?php echo lang('country');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-flag lh"></span></span>
								<?php 
								echo form_dropdown("fkidCountry", $get_dropdown_all_country, $fkidCountry, 'class="form-control" id="country" required');?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-12" style="text-align:center !important;">
					  <button type="submit" id="id_submit" class="btn btn-success white-text"><i class="<?php echo $this->panel_icon;?> mr5"></i>Add this Contact and Finish</button>
					  <button type="button" id="id_add_contact" class="btn btn-primary white"><i class="fa fa-user mr5"></i>Add an Administrative Contact</button>					  
					</div>
				</div>
				<?php 
				if($this->user->fkidUserRole == 1){
					echo form_hidden('tester', '1');
				}else{
					echo form_hidden('tester', '0');
				}
				echo form_close(); ?>

