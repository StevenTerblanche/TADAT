<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	include('head.php');
?>
		
							<?php echo $content; ?>
		
		<?php


	# Load any js files as defined in the core and relevant controllers	
	if(isset($js_files) && is_array($js_files)){ 
		foreach ($js_files as $js){ 
			if(!is_null($js)){ 
				echo '<script type="text/javascript" src="'.$js.'"></script>'; 
				echo "\n";
			} 
		} 
	}
	# Load any js LANGUAGE files as defined in the core and relevant controllers	
	if (isset($js_files_i18n) && is_array($js_files_i18n)){ 
		foreach ($js_files_i18n as $js){ 
			if (!is_null($js)){ 
				echo '<script type="text/javascript">'.$js.'</script>'; 
				echo "\n";
			} 
		} 
	} 
	# Close html document
	include('end.php');
?>