<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row" style="margin:0px !important; margin-top:15px !important">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl5 pr5">
		<div class="panel panel-default panel-blue-margin mb0">
			<div class="panel-heading dark-blue-bg" id="id-custom-panel-bg"><h4 class="panel-title mb0"><i class="<?php echo (!empty($this->panel_icon)) ? $this->panel_icon : '';?>"></i><?php echo (!empty($this->panel_title)) ? strtoupper($this->panel_title) : '';?></h4></div>
			<div class="panel-body">
				<?
					if ($workshop_id){
						$workshop_url = _global_get_fields_by_id('Workshops', 'id' ,$workshop_id, array('WorkshopLink'),null, 'db_training');
					}
				?>
				<iframe src="https://www.classmarker.com/online-test/start/?quiz=<?php echo $workshop_url?>&cm_user_id=<?php echo $this->user->id ?>" frameborder="0" style="width:100%;max-width:700px;" height="800"></iframe>				
			</div>
		</div>
	</div>
</div>		