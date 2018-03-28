				<?php 
//				$numCounter = $counter;
					if(isset($measurement_dimensions[$numCounter]['evidence'])){?>
					<div class="panel-group accordion" id="accordion-<?php echo $numCounter;?>">
						<div class="panel panel-default">
							<div class="panel-heading"><h5 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-0" href="#collapseOne<?php echo $numCounter;?>">Suggested Evidentiary Documentation</a></h5></div>
							<div id="collapseOne<?php echo $numCounter;?>" class="panel-collapse">
								<div class="panel-body">
									<?php echo $measurement_dimensions[$numCounter]['evidence']; ?>
									<button style="margin-left:30px !important" type="button" id="upload_button" class="btn btn-primary white-text mt20" data-toggle="modal" data-target="#modal-style2"><i class="fa fa-cloud-upload mr5"></i>Upload Evidentiary Documents</button>
								</div>
							</div>
						</div>
					</div>
						<?php
					}
				?>
