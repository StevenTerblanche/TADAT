<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dompdf_gen {
	protected $CI;
	public function __construct() {

		require_once 'dompdf/dompdf_config.inc.php';
		$pdf = new Dompdf();
		
		$CI =& get_instance();
		$CI->dompdf = $pdf;
		
	}
	
}