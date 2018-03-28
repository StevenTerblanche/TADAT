<?php
class Ajax extends Core_Controller {
    function __construct(){
        parent::__construct();
				$this->output->enable_profiler(false);
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
	function populateCounterpartForm($id = null, $ignore = null){
		$id = $this->input->get('id');
		$ignore = $this->input->get('ignore');
		$arrCounterparts = _get_dropdown_by_id_counterparts($id, $ignore);
		foreach($arrCounterparts as $row => $value){
			echo '<option value="'.$row.'">'. $value.'</option>';
		}
	}


function populateDataTables(){
	$this->load->helper('training/users/users');
	 $arrData = _get_record_all_users_by_status(array(1,2,3,4,5));
	 echo json_encode($arrData);
}


	function populateUserDocuments($referenceNumber = null, $id = null){
		$referenceNumber = $this->input->get('reference');
		$arrDocuments = _get_documents_by_reference_or_id($referenceNumber, $id);
		$table_start = '<table id="responsive-datatables" class="table table-bordered table-striped table-hover dt-responsive non-responsive mb10" cellspacing="0" width="100%">';

		$thead = '<thead>
					<tr>
						<th>DOCUMENT NAME</th>
						<th>CATEGORY</th>
						<th>SIZE</th>
						<th>TYPE</th>
						<th>ACTION</th>

					</tr>
				</thead><tbody>';
		$table_end = '</tbody></table>';
		$table_row = '';		
		$arrImageTypes=array(	array('jpg', 'jpeg','type' => 'jpg'),
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
	
		if($arrDocuments){
			foreach($arrDocuments as $row => $value){
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
				
				$table_row .= '<tr>';
				$table_row .=  '<td>'.$value['documentTitle'].'</td>';
				$table_row .=  '<td>'.strtoupper($value['documentDescription']).'</td>';
				$table_row .=  '<td>'.formatBytes($value['documentSize']).'</td>';
				$table_row .=  '<td><img src="'. $strIconPath . '"></td>';															
				$table_row .=  '<td class="va center"><a '.$dataGallery.' href="'. base_url().$value['documentPath'] . '" target="_blank">Click to View</a></td>';			
				$table_row .= '</tr>';			
				
			}
			
			echo $table_start.$thead.$table_row.$table_end;
		
		}else{
			return false;	
			}
	}
	
}
?>