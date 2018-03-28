<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

	$score_number_dimension_1 = 3;
	$score_number_dimension_2 = 1;
	$score_number_dimension_3 = 2;
	$score_number_dimension_4 = 4;			
	$score_number_dimension_5 = null;
?>

<?php 
		_score_indicators(12,$score_number_dimension_1,$score_number_dimension_2,$score_number_dimension_3,$score_number_dimension_4,$score_number_dimension_5);
			


//			echo 'DIMENSIONS: '.$i.'<br>';
//			echo 'SCORE: '.$score_overall.'<br>';
			


echo '<pre>';
$obj =& get_instance();
print_r($obj->form_data);
//print_r($dimension_conversion_array);






					
/*
		if(substr($max,1) > .5){
			$score_overall = floor($max*2)/2;
		}else{
			$score_overall = ceil($max*2)/2;
		}					
*/




//	echo '<pre>';
	//print_r($scores_attained_method);

?>