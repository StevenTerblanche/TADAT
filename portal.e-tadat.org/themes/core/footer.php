<?php defined('BASEPATH') OR exit('No direct script access allowed');
	/* 
		STATUS = FINAL
		LANGUAGE = DONE
		NORMALISE = DONE
	 */
?>
<div id="footer" class="clearfix sidebar-page right-sidebar-page">
	<p class="pull-left"><?php echo $this->config->item('application_name'); ?> v<?php echo $this->config->item('application_version'); ?></p>
	<p class="pull-right"><?php echo lang('page').lang('_rendered_in_'); ?> {elapsed_time} <?php echo lang('_seconds'); ?></p>
</div>
<div id="back-to-top"><a href="#"><?php echo lang('back_to_').lang('top')?></a></div>