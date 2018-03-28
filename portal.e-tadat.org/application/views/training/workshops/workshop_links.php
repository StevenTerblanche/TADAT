<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="row" style="margin:0px !important; margin-top:15px !important">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 pl5 pr5">
		<div class="panel panel-default panel-blue-margin mb0">
			<div class="panel-heading dark-blue-bg" id="id-custom-panel-bg"><h4 class="panel-title mb0"><i class="<?php echo (!empty($this->panel_icon)) ? $this->panel_icon : '';?>"></i><?php echo (!empty($this->panel_title)) ? strtoupper($this->panel_title) : '';?></h4></div>
			<div class="panel-body">
				<?php
			if ($get_classmarker_links){
					echo '<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">';
						echo '<thead>';
							echo '<tr>';
								echo '<th>' . strtoupper('link '.' '. lang('name')) . '</th>';
								echo '<th>' . strtoupper('link URL').'</th>';
								echo '<th>' . strtoupper('date created') . '</th>';
								echo '<th style="text-align:center !important">' . strtoupper(lang('_status')).'</th>';							
//								echo '<th class="force-width-145-px" style="text-align:center !important">' . strtoupper(lang('action')) . '</th>';
							echo '</tr>';
						echo '</thead>';
					echo '<tbody>';
					foreach ($get_classmarker_links as $key => $value){
							$strEditURI = '#';
							$strViewURI = '#';
							$strDisableURI = '#';
							$strEnableURI = '#';
							$strDeleteURI = '#';
							echo "<tr class='va'>";
								echo "<td class='va'>". $value['link_name']."</td>";
								echo "<td class='va'>".$value['link_url']."</td>";							
								echo "<td class='va'>". $value['dateCreated']."</td>";
								echo "<td class='va center'>", ($value['status'] === '1')? lang('enabled'): lang('disabled') ,"</td>";
/*
								echo '<td class="va center">';
									echo '<div class="btn-group mr0 mb0">';
										echo '<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-arrow-circle-down mr5"></i>' . lang('action') . '</button>';
										echo '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">' . lang('toggle_dropdown') . '</span></button>';
										echo '<ul class="dropdown-menu dropdown-blue-bg">';
											echo '<li><a href="' . $strEditURI . '"><i class="fa fa-edit"></i>' . lang('update_').lang('this').' link' . '</a></li>';																
											echo '<li><a href="' . $strDisableURI . '"><i class="fa fa-lock"></i>' . lang('disable_').lang('this').' link' .'</a></li>';

										echo '</ul>';
									echo '</div>';
								echo '</td>';
*/
							echo '</tr>';
					}
					echo '</tbody>';
					echo '</table>';
					}else{
						echo '<div class="panel panel-info panelClose form-error">';
						echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>'.strtoupper(lang('no_').lang('users').lang('_found')).'</h4></div>';
						echo '<div class="panel-body center">'.lang('click_').'<a href="'.base_url('users/create').'">'.lang('here').'</a>'.lang('_to_create_a_').lang('user').'</div>';
						echo '</div>';				
					}
				?>
			</div>
		</div>
	</div>
</div>
