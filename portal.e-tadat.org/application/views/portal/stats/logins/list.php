<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
			if ($get_record_all){
				echo '<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">';
					echo '<thead>';
						echo '<tr>';
							echo '<th style="text-align:center !important">' . strtoupper(lang('date').lang('_logged_in')) . '</th>';
							echo '<th style="text-align:center !important">' . strtoupper(lang('time').lang('_logged_in')) . '</th>';
							echo '<th style="text-align:center !important">' . strtoupper(lang('user').lang('_details')).'</th>';
							echo '<th style="text-align:center !important">' . strtoupper(lang('user').lang('_role')).'</th>';
						echo '</tr>';
					echo '</thead>';
				echo '<tbody>';
				foreach ($get_record_all as $key => $value){
					echo "<tr class='va'>";
						echo "<td class='va center'>" . date("j F Y",strtotime($value['date'])). "</td>";
						echo "<td class='va center'>" . date("h:i A",strtotime($value['date'])). "</td>";
						echo "<td class='va'>".$value['name']." ".$value['surname']."</td>";
						echo "<td class='va center'>"._get_fields_by_id('UserRoles', 'id', _get_fields_by_id('Users', 'id', $value['fkidUser'], $out = array('fkidUserRole')), $out = array('role'))."</td>";
					echo '</tr>';
				}
				echo '</tbody>';
				echo '</table>';
				}else{
					echo '<div class="panel panel-danger panelClose form-error">';
					echo '<div class="panel-heading"><h4 class="panel-title"><i class="fa fa-exclamation-circle"></i>'.strtoupper(lang('a_system_error').lang('_occurred')).'</h4></div>';
					echo '<div class="panel-body center">'.lang('no_').lang('performance_indicators').lang('_found').'!<br/>'.lang('click_').'<a href="'.base_url('pi/create').'">'.lang('here').'</a>'.lang('_to_create_a_').lang('performance_indicator').'</div>';
					echo '</div>';				
				}
?>