<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
			echo '<div class="panel-body">';
			if ($get_record_all_templates){
				echo '<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">';
					echo '<thead>';
						echo '<tr>';
							echo '<th>' . strtoupper(lang('?')) . '</th>';
							echo '<th>' . strtoupper(lang('?')).'</th>';							
							echo '<th style="text-align:center !important">' . strtoupper(lang('?')) . '</th>';
					
							echo '<th class="force-width-145-px">' . strtoupper(lang('action')) . '</th>';
						echo '</tr>';
					echo '</thead>';
				echo '<tbody>';
				foreach ($get_record_all_templates as $key => $value){
					$strEditURI = base_url('templates/update/?id=')  . base64_encode($this->encrypt->encode($value['idTemplates']));
					$strViewURI = base_url('templates/details/?id=') . base64_encode($this->encrypt->encode($value['idTemplates']));
					$strDisableURI = base_url('templates/update/?a=disable&id=')  . base64_encode($this->encrypt->encode($value['idTemplates']));
					$strEnableURI = base_url('templates/update/?a=enable&id=')  . base64_encode($this->encrypt->encode($value['idTemplates']));
					$strDeleteURI = base_url('templates/update/?a=delete&id=')  . base64_encode($this->encrypt->encode($value['idTemplates']));
					
					echo "<tr class='va'>";
						echo "<td class='va'>" . $value['nameTemplates']. "</td>";
						echo "<td class='va'>"._get_fields_by_id('TemplateTypes', 'idTemplateTypes' ,$value['fkidTemplateType'], array('uinameTemplateType', ' '))."</td>";
						echo "<td class='va center'>" . date("j F Y",strtotime($value['creationDate'])). "</td>";
						echo '<td class="va center">';
							echo '<div class="btn-group mr0 mb0">';
								echo '<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-arrow-circle-down mr5"></i>' . lang('action') . '</button>';
								echo '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">' . lang('toggle_dropdown') . '</span></button>';
								echo '<ul class="dropdown-menu dropdown-blue-bg">';
									echo '<li><a href="' . $strViewURI . '"><i class="fa fa-globe"></i>' . lang('view').lang('_this').lang('?').lang('?'). '</a></li>';
									if($this->user->fkidUserRole < 4){
									echo '<li><a href="' . $strEditURI . '"><i class="fa fa-edit"></i>' . lang('update_').lang('_this').lang('?') . '</a></li>';																
											echo '<li><a href="' . $strDisableURI . '"><i class="fa fa-lock"></i>' . lang('disable_').lang('_this').lang('?') .'</a></li>';
									} 
									if($this->user->fkidUserRole < 2){
										echo '<li><a href="' . $strDeleteURI .'"><i class="fa fa-trash"></i>' . lang('delete_').lang('?') .'</a></li>';
									 } 								
								echo '</ul>';
							echo '</div>';
						echo '</td>';
					echo '</tr>';
				}
				echo '</tbody>';
				echo '</table>';
				}else{
					echo '<div class="panel panel-danger panelClose form-error">';
					echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>'.strtoupper(lang('a_system_error').lang('_occurred')).'</h4></div>';
					echo '<div class="panel-body center">'.lang('no_').lang('?').lang('_found').'!<br/>'.lang('click_').'<a href="'.base_url('templates/create').'">'.lang('here').'</a>'.lang('_to_create_a_').lang('?').'</div>';
					echo '</div>';				
				}
?>