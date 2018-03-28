<?php defined('BASEPATH') OR exit('No direct script access allowed');?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
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
if ( isset( $css_files ) && is_array( $css_files ) )
{ 
    foreach ( $css_files as $css )
    {
        if ( !is_null( $css ) )
        { 
            echo '			<link rel="stylesheet" href="'.$css .'">';
            echo "\n";				
        } 
    } 
} 
?>

    </head>
    <body style="background-color:#CCC">

<?php
#
#   header
#
#   ##  ##  ##  ##  ##  ##  ##  ##
#
#   banner
#

# user has authenticated
if ( isset( $_SESSION['logged_in'] ) )
{
    # store their access level
    $intUserRole = $_SESSION['logged_in']->fkidUserRole;
?>

        <div id="top">
            <nav class="navbar navbar-default navbar-fixed-top">
            <div class="top-master-outer">
                <div class="top-master top-a"></div>
                <div class="top-master top-b"></div>
                <div class="top-master top-c"></div>                        
                <div class="top-master top-d"></div>
                <div class="top-master top-e"></div>
                <div class="top-master top-f"></div>
                <div class="top-master top-g"></div>
                <div class="top-master top-h"></div>
                <div class="top-master top-i"></div>
            </div>
                <div class="container">
                    <header class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span> 
                            <span class="icon-bar"></span> 
                            <span class="icon-bar"></span> 
                            <span class="icon-bar"></span> 
                        </button>
                        <a href="<?php echo base_url('/dashboard'); ?>" class="navbar-brand"><img style="margin-top:2px !important; margin-right:8px !important" src="/themes/core/img/menu_logo.png" alt="Logo"></a> 
                    </header>
                    <div class="topnav">
                        <div class="btn-group">
							<?php $alertCount = 10; if($alertCount >0){echo'<a data-placement="bottom" data-original-title="'. lang('menu button errors').'" href="'. base_url('/errors').'" data-toggle="tooltip" class="btn btn-default btn-sm"><i class="fa fa-exclamation-triangle" style="padding-right:2px !important;"></i><span class="label label-danger">'.$alertCount.'</span></a> ';}?>
                            <a data-placement="bottom" data-original-title="<?php echo lang('menu button profile');?>" href="<?php echo base_url('/profile'); ?>" data-toggle="tooltip" class="btn btn-default btn-sm"><i class="fa fa-user"></i></a>
                            <a data-placement="bottom" data-original-title="<?php echo lang('menu button support');?>" href="<?php echo base_url('/support'); ?>" data-toggle="tooltip" class="btn btn-default btn-sm"><i class="fa fa-question-circle"></i></a>
	                    </div>
                        <div class="btn-group">
                            <a href="<?php echo base_url('/login/logout'); ?>" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom" class="btn btn-metis-1 btn-sm"><i class="fa fa-power-off"></i></a>
                        </div>
	                </div>



<?php
#
#   banner
#
#   ##  ##  ##  ##  ##  ##  ##  ##
#
#   MENU
#
?>

                    <div class="collapse navbar-collapse navbar-ex1-collapse">
                        <ul class="nav navbar-nav">

                            <li class='<?php echo (uri_string() == 'dashboard' || uri_string() == '') ? 'active' : ''; ?> divider-vertical'><a href="<?php echo base_url('/dashboard'); ?>"><i class="fa fa-dashboard fa-menu" style="padding-top:0px !important;"></i><span class="menu_text"><?php echo lang('menu button dashboard'); ?></span></a></li>



<?php
    #   and now for something completely messy: access by numbers
    #       (check `UserRoles` for definitions)
?>


                            <li class='dropdown  <?php echo (uri_string() == 'missions') ? 'active' : ''; ?> divider-vertical'><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-desktop fa-menu" style="padding-top:2px !important"></i><span class="menu_text"><?php echo lang('menu button missions'); ?><b class="caret"></b></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url('/missions'); ?>"><?php echo lang('menu button missionsview'); ?></a></li>

<?php
    #   register mission: lead, secretariat
    if ( $intUserRole < 4 || $intUserRole == 6 )
    {
?>

                                    <li><a href="<?php echo base_url('/missions/add'); ?>"><?php echo lang('menu button missionsadd'); ?></a></li>

<?php
    }

    #   view revenue authority: ram, secretariat
    if ( $intUserRole < 4 || $intUserRole == 5 )
    {
?>

                                    <li><hr /></li>
                                    <li><a href="<?php echo base_url('/missions/authority'); ?>"><?php echo lang('menu button missionsauthorityview'); ?></a></li>


<?php
    }

    #   add authority: secretariat
    if ( $intUserRole < 4 )
    {
?>

                                    <li><a href="<?php echo base_url('/missions/authority/add'); ?>"><?php echo lang('menu button missionsauthorityadd'); ?></a></li>

<?php
    }
?>

                                </ul>
                            </li>

<?php
    #   user menu: lead, secretariat
    if ( $intUserRole < 4 || $intUserRole == 6 )
    {
?>

                            <li class='dropdown <?php echo (uri_string() == 'users') ? 'active' : ''; ?> divider-vertical'><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa  fa-gears fa-menu"></i><span class="menu_text"><?php echo lang('menu button admin'); ?><b class="caret"></b></span></a>
                                <ul class="dropdown-menu">

<?php
        #   add all types: admin, root
        if ( $intUserRole < 3 )
        {
?>

                                    <li><a href="<?php echo base_url('/users/add'); ?>"><?php echo lang('menu admin add_users'); ?></a></li>

<?php
        }
        #   add assessor: lead, secretariat
        if ( $intUserRole == 6 || $intUserRole == 3 )
        {
?>

                                    <li><a href="<?php echo base_url('/users/add/4'); ?>"><?php echo lang('menu admin add_users_assessor'); ?></a></li>

<?php
        }
        #   add ram or lead: secretariat
        if ( $intUserRole == 3 )
        {
?>

                                    <li><a href="<?php echo base_url('/users/add/5'); ?>"><?php echo lang('menu admin add_users_ram'); ?></a></li>
                                    <li><a href="<?php echo base_url('/users/add/6'); ?>"><?php echo lang('menu admin add_users_lead'); ?></a></li>

<?php
        }
?>

                                    <li><hr /></li>

<?php
        #   view all types: admin, root
        if ( $intUserRole < 3 )
        {
?>

                                    <li><a href="<?php echo base_url('/users'); ?>"><?php echo lang('menu admin view_users'); ?></a></li>

<?php
        }
        #   view assessors: lead, secretariat
        if ( $intUserRole == 6 || $intUserRole == 3 )
        {
?>

                                    <li><a href="<?php echo base_url('/users/4'); ?>"><?php echo lang('menu admin view_users_assessor'); ?></a></li>

<?php
        }
        #   view rams and leads: secretariat
        if ( $intUserRole == 3 )
        {
?>

                                    <li><a href="<?php echo base_url('/users/5'); ?>"><?php echo lang('menu admin view_users_ram'); ?></a></li>
                                    <li><a href="<?php echo base_url('/users/6'); ?>"><?php echo lang('menu admin view_users_lead'); ?></a></li>

<?php
        }
?>

                                </ul>
                            </li>

<?php
    }

#
#       menu
#
    if ( 0 )
    {
#
#       menu: hidden
#

### FIXME: need to add access control check later, to avoid building
###         menu unnecessarily...
        $arrTTMenu = $this->templates_model->get_all_template_types();

        if ( $arrTTMenu )
        {
?>

                            <li class='dropdown <?php echo (uri_string() == 'templates') ? 'active' : ''; ?> divider-vertical'><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa  fa-gears fa-menu"></i><span class="menu_text"><?php echo lang('menu button templates'); ?><b class="caret"></b></span></a>
                                <ul class="dropdown-menu">

<?php
            $intLen = count ( $arrTTMenu );
            $intCount = 1;
            foreach ( $arrTTMenu as $arrType )
            {
?>

                                    <li><a href="<?php echo base_url('/templates?tt=' . $arrType['idTemplateTypes']); ?>"><?php echo sprintf( lang('menu button templatesview'), $arrType['nameTemplateType'] ); ?></a></li>
                                    <li><a href="<?php echo base_url('/templates/add?tt=' . $arrType['idTemplateTypes']); ?>"><?php echo sprintf( lang('menu button templatesadd'), $arrType['nameTemplateType'] ); ?></a></li>

<?php
                if ( $intCount < $intLen )
                {
?>

                                    <li><hr /></li>

<?php
                }
                $intCount++;
            }
?>

                                </ul>
                            </li>



<?php
        }

#       menu: hidden
#
#
#       menu: unused (tbd)
#
?>

                            <li class='dropdown  <?php echo (uri_string() == 'playlists') ? 'active' : ''; ?> divider-vertical'><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th-list fa-menu" style="padding-top:1px !important"></i><span class="menu_text"><?php echo lang('menu button playlists'); ?><b class="caret"></b></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url('/playlists'); ?>"><?php echo lang('menu button playlists'); ?></a></li>
                                </ul>
                            </li>
                            <li class='dropdown  <?php echo (uri_string() == 'library') ? 'active' : ''; ?> divider-vertical' ><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-film fa-menu"></i><span class="menu_text"><?php echo lang('menu button library'); ?><b class="caret"></b></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url('/library'); ?>"><?php echo lang('menu button library'); ?></a></li>
                                </ul>
                            </li>
                            <li class='dropdown  <?php echo (uri_string() == 'reports') ? 'active' : ''; ?> divider-vertical'><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa  fa-bar-chart-o fa-menu"></i><span class="menu_text"><?php echo lang('menu button reports'); ?><b class="caret"></b></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?php echo base_url('/reports'); ?>"><?php echo lang('menu button reports'); ?></a></li>
                                </ul>
                            </li>

<?php
    }

#
#       menu: unused (tbd)
#
?>

                        </ul>
                    </div>
                </div>
            </nav>
        </div>

<?php
}

#
#   MENU
#
#   ##  ##  ##  ##  ##  ##  ##  ##
#
#   content
#

		echo $content;

#
#   content
#
#   ##  ##  ##  ##  ##  ##  ##  ##
#
#   footer
#
?>

        <footer>
            <div class="container">
                <p class="application-name"><?php echo $this->config->item('application_name'); ?> v<?php echo $this->config->item('application_version'); ?></p>
                <p class="application-elapsed"><?php echo lang('core page rendered_in'); ?> {elapsed_time} <?php echo lang('core page seconds'); ?></p>
            </div>
        </footer>

<?php
if ( isset( $js_files ) && is_array( $js_files ) )
{ 
    foreach ( $js_files as $js )
    { 
        if ( !is_null( $js ) )
        { 
            echo '		<script type="text/javascript" src="'.$js.'"></script>'; 
            echo "\n";
        } 
    } 
}

if ( isset( $js_files_i18n ) && is_array( $js_files_i18n ) )
{ 
    foreach ( $js_files_i18n as $js )
    { 
        if ( !is_null( $js ) )
        { 
            echo '		<script type="text/javascript">'.$js.'</script>'; 
            echo "\n";
        } 
    } 
} 
?>

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    
    </body>
</html>