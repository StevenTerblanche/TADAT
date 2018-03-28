<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
$arrFile = _get_record_by_id_document_data($id);
$contentType = $arrFile->documentType;
header("Content-type: $contentType"); 
echo $arrFile->documentData;
?>