<?php defined('BASEPATH') OR exit('No direct script access allowed');  

		foreach($get_fields as $field){$$field = '';}
		if(!isset($get_dropdown_all_country)) $get_dropdown_all_country = ''; 
		if(!isset($get_dropdown_all_ra_contacts)) $get_dropdown_all_ra_contacts = ''; 		
		if(!isset($fkidRegion)) $fkidRegion = ''; 
		if(!isset($fkidCountry)) $fkidCountry = ''; 
?>
<div class="row" style="margin:0px !important; margin-top:15px !important">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl5 pr5">
		<div class="panel panel-default panel-blue-margin mb0">
			<div class="panel-heading dark-blue-bg" id="id-custom-panel-bg"><h4 class="panel-title mb0"><i class="<?php echo (!empty($this->panel_icon)) ? $this->panel_icon : '';?>"></i><?php echo (!empty($this->panel_title)) ? strtoupper($this->panel_title) : '';?></h4></div>		
			<div class="panel-body">
			<?php echo form_open($uri, array('role'=>'form', 'class'=>'form-horizontal')); ?>

				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('workshop_administrator');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-user"></span></span>
							<?php echo form_dropdown("WorkshopRevenueAuthorityContactFkId", $get_dropdown_all_workshop_ra_administrators, $WorkshopRevenueAuthorityContactFkId, 'id="WorkshopRevenueAuthorityContact" class="form-control" required');?>
						</div>
					</div>
					<div class="col-xs-2" style="margin-left:15px">
						<div class="input-group">
								<button type="button" class="btn btn-primary white" id="workshop-admin-create-button"><i class="<?php echo $this->panel_icon;?>"></i>&nbsp;<? echo lang('create_a_').' '. lang('workshop_administrator')?></button>
						</div>
					</div>
				</div>

			<div id="show_rest_container" class="form-group" style="display:none">
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('workshop').' '.lang('name');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-graduation-cap"></span></span>
							<?php echo form_input(array('name'=>'WorkshopName', 'value'=>$WorkshopName, 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('workshop').' '.lang('name')));?>
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('workshop').' '.lang('type');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-file-text"></span></span>
							<?php echo form_dropdown("WorkshopTypeFkId", $get_dropdown_all_workshop_types, $WorkshopTypeFkId, 'class="form-control" required');?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('workshop').' '.lang('duration');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<?php echo form_dropdown("WorkshopDuration", $get_dropdown_all_workshop_duration, $WorkshopDuration, 'class="form-control" required');?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('workshop').' '.lang('link');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-link"></span></span>
							<?php echo form_dropdown("WorkshopLink", $get_dropdown_all_workshop_links, $WorkshopLink, 'class="form-control" required');?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('workshop').' Passmark';?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-file-text"></span></span>
							<?php 
							$arrWorkshopPassMark = array(''=>'Select a Passmark','50'=>'50%','60'=>'60%','70'=>'70%','80'=>'80%','90'=>'90%','100'=>'100%');							
							echo form_dropdown("WorkshopPassMark", $arrWorkshopPassMark, $WorkshopPassMark, 'class="form-control" required');?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('workshop').' '.lang('facilitator');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-user"></span></span>
							<?php echo form_dropdown("WorkshopFacilitator", $get_dropdown_all_secretariats, $WorkshopFacilitator, 'class="form-control" required');?>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('workshop').' '.lang('start').' '.lang('date');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<?php echo form_input(array('name'=>'WorkshopStartDate', 'value'=>$WorkshopStartDate, 'class'=>'form-control', 'id'=>'WorkshopStartDate-ID', 'required'=>'', 'placeholder'=>lang('start').' '.lang('date'))); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('workshop').' '.lang('end').' '.lang('date');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-calendar"></span></span>
							<?php echo form_input(array('name'=>'WorkshopEndDate', 'value'=>$WorkshopEndDate, 'class'=>'form-control', 'id'=>'WorkshopEndDate-ID', 'placeholder'=>lang('end').' '.lang('date'))); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('workshop').' '.lang('start').' '.lang('time');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-clock-o"></span></span>
							<?php echo form_input(array('name'=>'WorkshopStartTime', 'value'=>$WorkshopStartTime, 'class'=>'form-control', 'id'=>'WorkshopStartTime-ID', 'required'=>'', 'placeholder'=>lang('start').' '.lang('time'))); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('workshop').' '.lang('end').' '.lang('time');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-clock-o"></span></span>
							<?php echo form_input(array('name'=>'WorkshopEndTime', 'value'=>$WorkshopEndTime, 'class'=>'form-control', 'id'=>'WorkshopEndTime-ID', 'placeholder'=>lang('end').' '.lang('time'))); ?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('workshop').' '.lang('address');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-map-marker"></span></span>
							<?php echo form_input(array('name'=>'WorkshopAddress', 'value'=>$WorkshopAddress, 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('workshop').' '.lang('address')));?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('workshop').' '.lang('city');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="fa fa-home"></span></span>
							<?php echo form_input(array('name'=>'WorkshopCity', 'value'=>$WorkshopCity, 'class'=>'form-control', 'required'=>'', 'placeholder'=>lang('workshop').' '.lang('city')));?>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-3 control-label"><?php echo lang('workshop').' '.lang('region');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
							<?php echo form_dropdown("WorkshopRegionFkId", $get_dropdown_all_region, set_value("WorkshopRegionFkId",$WorkshopRegionFkId), array('id'=>'region', 'class'=>'form-control', 'required'=>'')); ?>
						</div>
					</div>
				</div>	
			</div>
				<div id="country_container" class="form-group" style="display:none">
					<label class="col-xs-3 control-label"><?php echo lang('workshop').' '.lang('country');?></label>
					<div class="col-xs-6">
						<div class="input-group">
							<span class="input-group-addon"><span class="glyphicon glyphicon-flag lh"></span></span>
								<?php 
								echo form_dropdown("WorkshopCountryFkId", $get_dropdown_all_country, $WorkshopCountryFkId, 'class="form-control" id="country" required');?>
						</div>
					</div>
				</div>	
				<div class="form-group" style="display:none" id="show_submit">
					<div class="col-xs-12" style="text-align:center !important;">
					  <button type="submit" class="btn btn-primary white"><i class="<?php echo $this->panel_icon;?> mr5"></i><?php echo $submit_button; ?></button>
					</div>
				</div>

				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>