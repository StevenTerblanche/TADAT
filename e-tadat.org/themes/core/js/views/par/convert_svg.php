<?php 
//	$radar_chart = base_url('radar.svg');
	$im = new Imagick();
//	$svg = file_get_contents($radar_chart);


//print_r( $_POST);

$svg = $_POST['svg'];
$filename = $_POST['filename'];

	$im->readImageBlob($svg);
	
	
	/*jpeg*/
	$im->setImageFormat("jpeg");
	$im->cropImage(600, 600, 15, 5);
	//$im->adaptiveResizeImage(650, 650); /*Optional, if you need to resize*/
	

	$image_path = $_SERVER['DOCUMENT_ROOT'].'/data/poa/images/radar/radar_'.$filename.'.jpg';
//	echo $image_path;	
	$fileHandle = fopen($image_path, "w");
	
	file_put_contents ($image_path, $im);
	//$im->writeImage($fileHandle,true);/*(or .jpg)*/
	$im->clear();
	$im->destroy();	
?>
