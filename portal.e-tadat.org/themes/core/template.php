<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	/* 
		STATUS = FINAL
		LANGUAGE = NONE NEEDED
		NORMALISE = DONE
		COMMENTS = DONE
		NOTES: I have broken the template.php file up into sections. This will be necessary for other sites that require different styles and menus e.g. ScreenWorx etc.
	 */
	# Start html document with relevant meta and head tags.	
	include('head.php');
	# If a user is logged in, show the menus, otherwise only show login content
	if ($this->session->userdata('logged_in') === 1){
		# Top bar of the site
		include('navbar.php');
		# Left drop-down menu
		include('menu.php');
		include('notifications.php');		
		include('content.php');
		include('footer.php');
	}else{
		# Content injected from controller without any menus
		include('content.php');
	}
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