<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
			if ($get_record_all_authorities){
				echo '<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">';
					echo '<thead>';
						echo '<tr>';
							echo '<th style="width:180px !important;">' . strtoupper(lang('revenue_authority')) . '</th>';
							echo '<th>' . strtoupper(lang('city').', '.lang('country').lang('_and_').lang('region')) . '</th>';
							echo '<th>' . strtoupper(lang('revenue_authority').lang('_manager')).'</th>';
							echo '<th style="text-align:center !important">' . strtoupper(lang('_status')).'</th>';							
							echo '<th class="force-width-145-px" style="text-align:center !important">' . strtoupper(lang('action')) . '</th>';
						echo '</tr>';
					echo '</thead>';
				echo '<tbody>';
				foreach ($get_record_all_authorities as $key => $value){
					$strViewURI = base_url('scores/missions') .'/'. base64_encode($this->encrypt->encode($value['fkidMission']));

					echo "<tr class='va'>";
						echo "<td class='va'>". $value['authority']. "</td>";
						echo "<td class='va'>",$value['city'],($value['fkidState'] !== '0') ? ', '. _get_fields_by_id('FederalStates', 'id' ,$value['fkidState'], array('state')) : '',' in ', _get_fields_by_id('Countries', 'id' ,$value['fkidCountry'], array('country')),", ",_get_fields_by_id('Regions', 'id' ,$value['fkidRegion'], array('region')),"</td>";
						echo "<td class='va'>"._get_fields_by_id('Users', 'id' ,$value['fkidUser'], array('title', 'name', 'surname', '(designation)'), ' ')."</td>";

						echo "<td class='va center'>", ($value['status'] === '1')? lang('enabled'): lang('disabled') ,"</td>";
						echo '<td class="va center">';
							echo '<div class="btn-group mr0 mb0">';
								echo '<button type="button" class="btn btn-primary btn-sm "><i class="fa fa-arrow-circle-down mr5"></i>' . lang('action') . '</button>';
								echo '<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown"><span class="caret"></span><span class="sr-only">' . lang('toggle_dropdown') . '</span></button>';
								echo '<ul class="dropdown-menu dropdown-blue-bg">';
									echo '<li><a href="' . $strViewURI . '"><i class="fa fa-globe"></i>' . lang('view_').lang('missions'). '</a></li>';
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
					echo '<div class="panel-body center">'.lang('no_').lang('revenue_authorities').lang('_found').'!<br/>'.lang('click_').'<a href="'.base_url('authorities/create').'">'.lang('here').'</a>'.lang('_to_create_a_').lang('revenue_authority').'</div>';
					echo '</div>';				
				}
?>