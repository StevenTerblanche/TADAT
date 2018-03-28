<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$config['base_url'] = 'https://e-tadat.org/';
$config['index_page'] = '';
$config['uri_protocol']	= 'REQUEST_URI';
$config['url_suffix'] = '';
$config['language']	= 'english';
$config['charset'] = 'UTF-8';
$config['enable_hooks'] = FALSE;
$config['subclass_prefix'] = 'Core_';
$config['composer_autoload'] = FALSE;
# Had to add + = for base64_encode + encrypt/decrypt to work - from codeigniter original: $config['permitted_uri_chars'] = 'a-z 0-9~%.:_\-';
$config['permitted_uri_chars'] = '+=\a-z 0-9~%.:_-';
$config['encryption_key'] = 'Ñ`╣ò╕n~Å╪‼╘♀Vσ≤♫';
$config['allow_get_array'] = TRUE;
$config['enable_query_strings'] = FALSE;
$config['controller_trigger'] = 'c';
$config['function_trigger'] = 'm';
$config['directory_trigger'] = 'd';
$config['error_views_path'] = '';
$config['cache_path'] = '';
$config['cache_query_string'] = FALSE;
$config['sess_driver'] = 'database';
$config['sess_save_path'] = 'system_sessions';
$config['sess_cookie_name'] = 'etd_ck';






$config['sess_expiration'] = 30000;
$config['sess_use_database'] = TRUE;
$config['sess_expire_on_close'] = TRUE;
$config['sess_match_ip'] = TRUE;
$config['sess_time_to_update'] = 300;









$config['sess_regenerate_destroy'] = TRUE;
$config['standardize_newlines'] = FALSE;

$config['global_xss_filtering'] = TRUE;
$config['csrf_protection'] = TRUE;
$config['csrf_token_name'] = 'csrf_token';															
$config['csrf_cookie_name'] = 'csrf_cookie';
$config['csrf_expire'] = 300;
$config['csrf_regenerate'] = FALSE;
$config['csrf_exclude_uris'] = array();
$config['compress_output'] = FALSE;
$config['time_reference'] = 'local';
$config['rewrite_short_tags'] = FALSE;
$config['proxy_ips'] = '';


ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 100);


/*
|--------------------------------------------------------------------------
| Cookie Related Variables
|--------------------------------------------------------------------------
| 'cookie_prefix'   = Set a cookie name prefix if you need to avoid collisions
| 'cookie_domain'   = Set to .your-domain.com for site-wide cookies
| 'cookie_path'     = Typically will be a forward slash
| 'cookie_secure'   = Cookie will only be set if a secure HTTPS connection exists.
| 'cookie_httponly' = Cookie will only be accessible via HTTP(S) (no javascript)
| Note: These settings (with the exception of 'cookie_prefix' and 'cookie_httponly') will also affect sessions.
*/
$config['cookie_prefix']	= 'etd_';
//$config['cookie_domain']	= '.e-tadat.org';
$config['cookie_path']		= '/';
$config['cookie_secure']	= TRUE;
$config['cookie_httponly'] 	= TRUE;

/* 
|--------------------------------------------------------------------------
| Error Logging Threshold
|--------------------------------------------------------------------------
| 0 = Disables logging, Error logging TURNED OFF
| 1 = Error Messages (including PHP errors)
| 2 = Debug Messages
| 3 = Informational Messages
| 4 = All Messages
*/
$config['log_threshold'] = 1;
$config['log_path'] = '';
$config['log_file_extension'] = 'log';
$config['log_file_permissions'] = 0644;
$config['log_date_format'] = 'Y-m-d H:i:s';
