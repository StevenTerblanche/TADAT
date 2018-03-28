<?php
class Ajax extends Core_Controller {
    function __construct(){
        parent::__construct();
				$this->output->enable_profiler(false);
    }
	# This populates the POA Checboxes for Assignments
	function populateUserPoaForm($authorityId = null, $missionId = null, $table = null, $ignore = null){
		$this->load->helper('form');
		$authorityId = $this->input->get('authorityId');
		$missionId = $this->input->get('missionId');
		$table = $this->input->get('table');
		$ignore = $this->input->get('ignore');
		$action = $this->input->get('action');				
		$arrUsers = _get_dropdown_all_users_not_assigned($authorityId, $missionId, $table, $ignore);
		if($arrUsers){
			foreach($arrUsers as $row => $value){
				echo '<option value="'.$row.'">'. $value.'</option>';
			}
		}
	}
	
	# This populates the POA Checboxes for Assignments
	function populatePoaForm($authorityId = null, $missionId = null, $userId = null, $table = null, $ignore = null){
		$this->load->helper('form');
		$authorityId = $this->input->get('authorityId');
		$missionId = $this->input->get('missionId');
		$userId = $this->input->get('userId');				
		$table = $this->input->get('table');
		$ignore = $this->input->get('ignore');
		$action = $this->input->get('action');				
		$arrAssignments = _get_dropdown_by_id_poa_assignments($authorityId, $missionId, $userId, $table, $ignore);
		$arrPoas = _get_records_array('cloud_questions', 'Poa', 'status', '1', $out = array('poa_number','poa'), 'all');
		$arrIndicators = _get_records_array('cloud_questions', 'PerformanceIndicators', 'status', '1', $out = array('id','indicatorNumber','indicatorName'), 'all');
		$arrIndicatorsByPoa = _get_record_all_indicators_by_poa();

		$poa_number = '';
		$poa_name = '';


		if($arrAssignments){
			foreach($arrIndicatorsByPoa as $key => $indicators){
					$poa_number = $indicators['poa_number'];
					$poa_name = $indicators['poa'];					
					echo 'indicators[indicatorNumber]:  ';
					echo $indicators['indicatorNumber'];
					echo '<br>';

					if (isset($arrAssignments[0][$indicators['indicatorNumber']])) {

						if($arrAssignments[0][$indicators['indicatorNumber']] == 1 && $userId == $assigned['fkidUser']){
							$arrSelectedPoa[] = array('poa_number'=>$indicators['indicatorNumber'], 'status'=>'selected');
						}elseif($assigned[$indicators['indicatorNumber']] == 1 && $userId != $assigned['fkidUser']){
							$arrSelectedPoa[] = array('poa_number'=>$indicators['indicatorNumber'], 'status'=>'used');
						}elseif($assigned[$indicators['indicatorNumber']] != 1){
							$arrSelectedPoa[] = array('poa_number'=>$indicators['indicatorNumber'], 'status'=>'available');
						}					


						echo "arrAssignments[0][$indicators[indicatorNumber]]:  ";
						echo $arrAssignments[0][$indicators['indicatorNumber']];
						echo '<br>';
						echo 'POA Number: ';
						echo $poa_number;
						echo '<br>';
						echo 'POA Name: ';
						echo $poa_name;
						echo '<br>';
						echo '<br>';
						echo '<br>';												
					}					
					
				}

		}


/*
				if($assigned[$indicators['indicatorNumber']] == 1 && $userId == $assigned['fkidUser']){
				   $arrSelectedPoa[] = array('poa_number'=>$indicators['indicatorNumber'], 'status'=>'selected');
				}elseif($assigned[$indicators['indicatorNumber']] == 1 && $userId != $assigned['fkidUser']){
				   $arrSelectedPoa[] = array('poa_number'=>$indicators['indicatorNumber'], 'status'=>'used');
				}elseif($assigned[$indicators['indicatorNumber']] != 1){
				   $arrSelectedPoa[] = array('poa_number'=>$indicators['indicatorNumber'], 'status'=>'available');
				}					

*/
		echo '*** arrSelectedPoa  *** <br>';
		echo '<pre>';
		print_r($arrSelectedPoa);
		echo '</pre>';




		
		echo '*** arrIndicatorsByPoa*** <br>';
		echo '<pre>';
		print_r($arrIndicatorsByPoa);
		echo '</pre>';
			/*
			[poa_number] => 1
            [poa] => Integrity of the Registered Taxpayer Base
            [indicatorNumber] => P1-1
            [indicatorName] => Accurate and reliable taxpayer information.
			*/

		echo '*** arrAssignments *** <br>';
		echo '<pre>';
		print_r($arrAssignments);
		echo '</pre>';		
/*
			[P1-1] => 1
            [P1-2] => 1
            [P2-3] => 1
            [P2-4] => 0
            [P2-5] => 0
            [P2-6] => 0
            [P3-7] => 1
            [P3-8] => 0
            [P3-9] => 0
            [P4-10] => 0
            [P4-11] => 1
            [P5-12] => 1
            [P5-13] => 1
            [P5-14] => 0
            [P5-15] => 0
            [P6-16] => 0
            [P6-17] => 0
            [P6-18] => 0
            [P7-19] => 0
            [P7-20] => 0
            [P7-21] => 0
            [P8-22] => 0
            [P8-23] => 0
            [P8-24] => 0
            [P9-25] => 0
            [P9-26] => 0
            [P9-27] => 0
            [P9-28] => 0
*/

		
//		return "<pre>".print_r($arrIndicators);


/*
		if($arrAssignments){
			foreach($arrIndicatorsByPoa as $key => $indicators){
				foreach($arrAssignments as $key => $assigned){

					if($assigned[$indicators['indicatorNumber']] == 1 && $userId == $assigned['fkidUser']){
					   $arrSelectedPoa[] = array('poa_number'=>$indicators['indicatorNumber'], 'status'=>'selected');
					}elseif($assigned[$indicators['indicatorNumber']] == 1 && $userId != $assigned['fkidUser']){
					   $arrSelectedPoa[] = array('poa_number'=>$indicators['indicatorNumber'], 'status'=>'used');
					}elseif($assigned[$indicators['indicatorNumber']] != 1){
					   $arrSelectedPoa[] = array('poa_number'=>$indicators['indicatorNumber'], 'status'=>'available');
					}					

				}
			}


				for ($x = 1; $x <= count($arrPoas); $x++) {
				   if($assigned['poa_'.$x.'_1'] == 1 && $userId == $assigned['fkidUser']){
					   $arrSelectedPoa[] = array('poa_number'=>$x, 'status'=>'selected');
					}elseif($assigned['poa_'.$x.'_1'] == 1 && $userId != $assigned['fkidUser']){
					   $arrSelectedPoa[] = array('poa_number'=>$x, 'status'=>'used');
					}
				}

				

		}
		
*/


/*
		
		echo '<div class="children">';
		if($arrAssignments){
			$strChecked = '';
			foreach($arrPoas as $poa){
				foreach($arrSelectedPoa as $available){
					if($poa['poa_number'] == $available['poa_number'] && $available['status'] === 'selected'){
						$strChecked = 'checked';
						echo '<div class="checkbox-custom">';
						echo '<input class="check" type="checkbox" name="poa_'.$poa['poa_number'].'" value="1" id="'.$poa['poa_number'].'" '.$strChecked.'>';
						echo '<label class="poa_label" for="'.$available['poa_number'].'">POA '.$poa['poa_number'].': '.$poa['poa'].'</label>';
						echo '</div>';
					}elseif($poa['poa_number'] == $available['poa_number'] && $available['status'] === 'used'){
						$strChecked = 'disabled';
						echo '<div class="checkbox-custom">';
						echo '<input class="check" type="checkbox" name="poa_'.$poa['poa_number'].'" value="null" id="'.$poa['poa_number'].'" '.$strChecked.'>';
//						echo '<input class="check" type="checkbox" name="poa_'.$poa['poa_number'].'" value="null" id="'.$poa['poa_number'].'" '.$strChecked.'>';						
						echo '<label class="poa_label" for="'.$available['poa_number'].'">POA '.$poa['poa_number'].': '.$poa['poa'].'</label>';
						echo '</div>';
					}
				}
				if(!in_array($poa['poa_number'],array_column($arrSelectedPoa, 'poa_number'))){				
					$strChecked = '';
					echo '<div class="checkbox-custom">';
					echo '<input class="check" type="checkbox" name="poa_'.$poa['poa_number'].'" value="1" id="'.$poa['poa_number'].'" '.$strChecked.'>';
					echo '<label class="poa_label" for="'.$available['poa_number'].'">POA '.$poa['poa_number'].': '.$poa['poa'].'</label>';
					echo '</div>';
				}
			}
		}else{
			foreach($arrPoas as $poa){
				$strChecked = '';
				echo '<div class="checkbox-custom">';
				echo '<input class="check" type="checkbox" name="poa_'.$poa['poa_number'].'" value="1" id="'.$poa['poa_number'].'">';
				echo '<label class="poa_label" for="'.$poa['poa_number'].'">POA '.$poa['poa_number'].': '.$poa['poa'].'</label>';
				echo '</div>';
			}
		}
		echo '</div>';
		echo '<div class="checkbox-custom">
				<input type="checkbox" value="option1" id="check-all">
					<label class="poa_label" for="checkbox9">Select all</label>
			</div>';
*/
	}	

	# This populates the Missions Dropdown for Assignments
	function populateMissionsForm($id = null, $table = null, $ignore = null){
		$this->load->helper('form');
		$id = $this->input->get('id');
		$ignore = $this->input->get('ignore');
		$table = $this->input->get('table');		
		$arrMissions = _get_dropdown_by_id_mission($id, $table, $ignore);
		foreach($arrMissions as $row => $value){
			echo '<option value="'.$row.'">'. $value.'</option>';
		}
	}	

	# Get all Glossary terms
	function getGlossary(){
		echo json_encode(_get_records_array('','Glossary', null, null, $out = array('term','description'), ''));
	}

	# This function gets called by the relevant .js files to populate the Country dropdown according to region
	function populateCountryForm($id = null, $ignore = null){
		$this->load->helper('form');
		$id = $this->input->get('id');
		$ignore = $this->input->get('ignore');
		$arrCountries = _get_dropdown_by_id_country($id, $ignore);
		foreach($arrCountries as $row => $value){
			echo '<option value="'.$row.'">'. $value.'</option>';
		}
	}

	# This display the uploaded docs
	function populateUploadedForm($missionId = null, $indicatorId = null, $dimensionId = null){
		$this->load->helper('form');
		$missionId = $this->input->get('missionId');
		if($this->input->get('indicatorId')){$indicatorId = $this->input->get('indicatorId');}else{$indicatorId = null;}	
		if($this->input->get('dimensionId')){$dimensionId = $this->input->get('dimensionId');}else{$dimensionId = null;}
		if($this->input->get('upload_type')){$upload_type = $this->input->get('upload_type');}else{$upload_type = null;}		
		$table = 'EvidentiaryDocumentation';
		$action = $this->input->get('action');
		$result = _get_record_by_id_all_uploaded($missionId, $indicatorId, $dimensionId, 1, $table, 'cloud_questions');
		function formatBytes($size, $precision = 2){
		    $base = log($size, 1024);
		    $suffixes = array('', 'KB', 'MB', 'GB', 'TB');   
		    return round(pow(1024, $base - floor($base)), $precision) . ' '.$suffixes[floor($base)];
		}
		if($result){
			echo '<table id="responsive-datatables" class="table table-bordered table-striped table-hover non-responsive mb10" cellspacing="0" width="100%">';
				echo '<thead>';
					echo '<tr>';
						echo '<th>FILE&nbsp;NAME</th>';						
						echo '<th>DESCRIPTION</th>';
						echo '<th style="text-align:center !important; width:100px !important;">SIZE</th>';
						echo '<th style="text-align:center !important; width:100px !important;">TYPE</th>';
						echo '<th style="text-align:center !important; width:130px !important;">CREATED</th>';
						echo '<th style="text-align:center !important; width:130px !important;">ACTION</th>';
					echo '</tr>';
				echo '</thead>';
			echo '<tbody>';
				$arrImageTypes=array(
										array('jpg', 'jpeg','type' => 'jpg'),
										array('png','type' => 'png'),
										array('gif', 'type' => 'gif'),
										array('bmp','type' => 'bmp'),
										array('powerpoint', 'presentation','type' => 'presentation'),
										array('wordprocessingml','msword','type' => 'document'),
										array('spreadsheetml','excel','type' => 'spreadsheet'),
										array('plain','type' => 'text'),
										array('csv','type' => 'csv'),
										array('pdf','type' => 'pdf'),
										array('zip','type' => 'zip'),
										array('rar','type' => 'rar')
									);
			foreach($result as $row => $value){
				$strIconPath = base_url().'themes/core/img/icons/unknown.png';						
				$strFileType ='';
				$target = '';
				$needle = $value['documentType'];
				
				$stringtocheck = $value['documentType'];
				foreach($arrImageTypes as $item =>$items){	
					foreach($items as $key =>$keys){
						if(is_int($key) && strpos($needle, $keys) !== FALSE){
							$strFileType = $items['type'];

							if ($strFileType === 'text' || $strFileType === 'pdf'){
								$target = 'target="_blank"';
							}
							if ($strFileType === 'jpg' || $strFileType === 'png' || $strFileType === 'gif'|| $strFileType === 'bmp'){
								$strIconPath = base_url().'themes/core/img/icons/'.$strFileType.'.png';
								$dataGallery = 'data-gallery=""';
							}else{
								$strIconPath = base_url().'themes/core/img/icons/'.$strFileType.'.png';
								$dataGallery = '';				
							}
						}
					}
				}
				echo "<tr class='va'>";
					echo "<td class='va'>". $value['documentTitle'] . "</td>";
					echo "<td class='va'>". $value['documentDescription'] . "</td>";
					echo "<td class='va center'>". formatBytes($value['documentSize']) . "</td>";
					echo '<td class="va center"><img src="'. $strIconPath . '"></td>';
					echo "<td class='va center'>" . date("j F Y",strtotime($value['dateCreated'])). "</td>";
					echo '<td class="va center"><a '.$dataGallery.' href="'. base_url().$value['documentPath'] . '" '.$target.'>Click to View</a></td>';
					
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
		}else{
			if($upload_type != 1){
				echo '<p><strong>There are currently no Evidentiary Documents uploaded for this Indicator.</strong></p>';
				echo '<p>Click on the "Upload Evidentiary Documents" button below to upload supporting evidentiary documentation.</p>';			
				echo '<button type="button" id="upload_button" class="btn btn-primary white-text mt20" data-toggle="modal" data-target="#modal-style2"><i class="fa fa-cloud-upload mr5"></i>Upload Evidentiary Documents</button>';
			}
		}
	}


	function populateCountrymap(){
		$result = _get_record_by_all_map_missions();
		$map=array();
	if($result){
		foreach($result as $row => $value){
			$map[] = array(
				'latLng' => array($value['lat'], $value['lng']),
				'name' => $value['mission'],
				'country' => $value['country'],
				'dateStart' => $value['dateStart'],
				'dateEnd' => $value['dateEnd'],
				'dateCreated' => $value['dateCreated'],
				'status' => $value['status'],
				'authority' => $value['authority'],
				'telephone' => $value['telephone'],
				'fax' => $value['fax'],
				'email' => $value['email'],
				'website' => $value['website'],
				'address' => $value['address'],
				'city' => $value['city'],
				'country' => $value['country'],
				'code' => $value['code'],
				'rtitle' => $value['fkidTitle'],
				'rname' => $value['name'],
				'rsurname' => $value['surname'],
				'weburl' => base_url('missions/profile/?id='.base64_encode($this->encrypt->encode($value['MissionID'])))
				);
		}
	}
		echo json_encode($map);
	}
	
	# Populates the Federal State dropdown if exists.
	function populateStateForm($id = null, $table = null, $ignore = null){
		$this->load->helper('form');
		$id = $this->input->get('id');
		$table = $this->input->get('table');
		$ignore = $this->input->get('ignore');
		$result = _get_dropdown_by_id_state($id, $table, $ignore);
		if ($result){
			foreach($result as $row => $value){echo '<option value="'.$row.'">'. $value.'</option>';}
		}else{
			echo 'hide';
		}
	}
}
?>