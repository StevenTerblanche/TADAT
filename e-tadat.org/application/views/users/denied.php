<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
$correct_ip_address = $_SERVER['REMOTE_ADDR'];  
        


?>
<h3 style="color: crimson">You do not have sufficient privileges to perform this action!</h3>
<h4>Your IP Address (<? echo  $correct_ip_address; ?>) has been recorded and this action has been logged!</h4>
