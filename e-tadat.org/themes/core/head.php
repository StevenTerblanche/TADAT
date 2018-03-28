<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 user-scalable=no">
        <meta name="keywords" content="<?php echo $this->config->item('keywords'); ?>">
        <meta name="description" content="<?php echo $this->config->item('description'); ?>">
        <meta name="author" content="<?php echo $this->config->item('author'); ?>">
        <meta name="robots" content="<?php echo $this->config->item('robots'); ?>">
        <meta name="revisit-after" content="<?php echo $this->config->item('revisit-after'); ?>">
        <meta name="apple-mobile-web-app-title" content="<?php echo $this->config->item('application_name'); ?>">
        <meta name="application-name" content="<?php echo $this->config->item('application_name'); ?>">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/themes/core/img/mstile-144x144.png?v=<?php echo $this->config->item('application_version'); ?>">
        <meta name="theme-color" content="#ffffff">
        <title><?php echo $this->config->item('application_name'); ?> v<?php echo $this->config->item('application_version'); ?></title>        
        <link rel="apple-touch-icon" sizes="57x57" href="/themes/core/img/apple-touch-icon-57x57.png?v=<?php echo $this->config->item('application_version'); ?>">
        <link rel="apple-touch-icon" sizes="60x60" href="/themes/core/img/apple-touch-icon-60x60.png?v=<?php echo $this->config->item('application_version'); ?>">
        <link rel="apple-touch-icon" sizes="72x72" href="/themes/core/img/apple-touch-icon-72x72.png?v=<?php echo $this->config->item('application_version'); ?>">
        <link rel="apple-touch-icon" sizes="76x76" href="/themes/core/img/apple-touch-icon-76x76.png?v=<?php echo $this->config->item('application_version'); ?>">
        <link rel="apple-touch-icon" sizes="114x114" href="/themes/core/img/apple-touch-icon-114x114.png?v=<?php echo $this->config->item('application_version'); ?>">
        <link rel="apple-touch-icon" sizes="120x120" href="/themes/core/img/apple-touch-icon-120x120.png?v=<?php echo $this->config->item('application_version'); ?>">
        <link rel="apple-touch-icon" sizes="144x144" href="/themes/core/img/apple-touch-icon-144x144.png?v=<?php echo $this->config->item('application_version'); ?>">
        <link rel="apple-touch-icon" sizes="152x152" href="/themes/core/img/apple-touch-icon-152x152.png?v=<?php echo $this->config->item('application_version'); ?>">
        <link rel="apple-touch-icon" sizes="180x180" href="/themes/core/img/apple-touch-icon-180x180.png?v=<?php echo $this->config->item('application_version'); ?>">
        <link rel="icon" type="image/png" href="/themes/core/img/favicon-32x32.png?v=<?php echo $this->config->item('application_version'); ?>" sizes="32x32">
        <link rel="icon" type="image/png" href="/themes/core/img/android-chrome-192x192.png?v=<?php echo $this->config->item('application_version'); ?>" sizes="192x192">
        <link rel="icon" type="image/png" href="/themes/core/img/favicon-96x96.png?v=<?php echo $this->config->item('application_version'); ?>" sizes="96x96">
        <link rel="icon" type="image/png" href="/themes/core/img/favicon-16x16.png?v=<?php echo $this->config->item('application_version'); ?>" sizes="16x16">
        <link rel="manifest" href="/themes/core/img/manifest.json?v=<?php echo $this->config->item('application_version'); ?>">
        <link rel="shortcut icon" type="image/x-icon" href="/themes/core/img/favicon.ico?v=<?php echo $this->config->item('application_version'); ?>">
        <link rel="icon" type="image/x-icon" href="/themes/core/img/favicon.ico?v=<?php echo $this->config->item('application_version'); ?>">

		<?php
		if (isset($css_files) && is_array($css_files)){
			foreach ($css_files as $css){
				if (!is_null($css)){
					echo '<link rel="stylesheet" type="text/css" href="'.$css .'">';
					echo "\n";
				}
			}
		}
		?>
    </head>
	    <body>
        <!--[if lt IE 9]>
        <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->