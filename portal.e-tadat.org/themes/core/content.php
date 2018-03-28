<?php 	defined('BASEPATH') OR exit('No direct script access allowed');
	/* 
		STATUS    = DONE
		LANGUAGE  = DONE
		NORMALISE = DONE
		COMMENTS  = DONE
	 */
 # Content injected from controller
?>

	<div class="page-content clearfix sidebar-page">
		<div class="page-content-wrapper">
			<div class="page-content-inner">
				<div class="row">
					<div class="col-lg-12">
						<div class="col-md-<?php echo (empty($this->columns))?'12':$this->columns;?>">
<!--							<div class="panel panel-default panel-blue-margin" id="page-start-panel" style="margin-bottom:10px !important">
								<div class="panel-heading dark-blue-bg" id="id-custom-panel-bg"><h4 class="panel-title mb0"><i class="<?php echo (!empty($this->panel_icon)) ? $this->panel_icon : '';?>"></i><?php echo (!empty($this->panel_title)) ? strtoupper($this->panel_title) : '';?></h4></div>-->
<!--								<div class="panel-body" id="glossary-content">-->
								<?php echo $content; ?>
<!--								</div>-->
<!--							</div>-->
						</div>
					</div>
				</div>
			</div>
			<div style="height:100px !important; width:100% !important; margin:auto !important;"></div>
		</div>
	</div>
</div>		