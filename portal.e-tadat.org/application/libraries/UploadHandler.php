<?php
class UsersUploadHandler{
	protected $options;
    protected $error_messages = array(
        1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
        2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
        3 => 'The uploaded file was only partially uploaded',
        4 => 'No file was uploaded',
        6 => 'Missing a temporary folder',
        7 => 'Failed to write file to disk',
        8 => 'A PHP extension stopped the file upload',
        'post_max_size' => 'The uploaded file exceeds the post_max_size directive in php.ini',
        'max_file_size' => 'File is too big',
        'min_file_size' => 'File is too small',
        'accept_file_types' => 'Filetype not allowed',
        'max_number_of_files' => 'Maximum number of files exceeded',
        'max_width' => 'Image exceeds maximum width',
        'min_width' => 'Image requires a minimum width',
        'max_height' => 'Image exceeds maximum height',
        'min_height' => 'Image requires a minimum height',
        'abort' => 'File upload aborted',
        'image_resize' => 'Failed to resize image'
    );

    protected $image_objects = array();

    function __construct($options = null, $initialize = true, $error_messages = null){
        $this->response = array();
        $this->options = array(
            'mkdir_mode' => 0755,
            'param_name' => 'files',
            'delete_type' => 'DELETE',
            'access_control_allow_origin' => '*',
            'access_control_allow_credentials' => false,
            'access_control_allow_methods' => array('OPTIONS','HEAD', 'GET', 'POST', 'PUT', 'PATCH','DELETE'),
            'access_control_allow_headers' => array('Content-Type', 'Content-Range', 'Content-Disposition'),
            'redirect_allow_target' => '/^'.preg_quote(parse_url($this->get_server_var('HTTP_REFERER'), PHP_URL_SCHEME).'://'.parse_url($this->get_server_var('HTTP_REFERER'), PHP_URL_HOST).'/','/' ).'/',
            'download_via_php' => false,
            'readfile_chunk_size' => 10 * 1024 * 1024,
            'inline_file_types' => '/\.(gif|jpe?g|png)$/i',
//            'accept_file_types' => '/.+$/i',
			'accept_file_types' => '/\.(gif|jpe?g|png|bmp|pdf|zip|gz|doc|docx|rtf|xls|xlsx|csv|txt|ppt|pptx|pps|ppsx|zip|rar)$/i',
            'max_file_size' => null,
            'min_file_size' => 1,
            'max_number_of_files' => null,
            'image_file_types' => '/\.(gif|jpe?g|png)$/i',
            'correct_image_extensions' => false,
            'max_width' => null,
            'max_height' => null,
            'min_width' => 1,
            'min_height' => 1,
            'discard_aborted_uploads' => true,
            'image_library' => 1,
            'convert_bin' => 'convert',
            'identify_bin' => 'identify',
            'image_versions' => array('' => array('auto_orient' => true),
             'thumbnail' => array('max_width' => 80, 'max_height' => 80)
            ),
            'print_response' => true
        );
        if ($options){
            $this->options = $options + $this->options;
        }
        if ($error_messages){
            $this->error_messages = $error_messages + $this->error_messages;
        }
        if ($initialize){
            $this->initialize();
        }
    }

    protected function initialize(){
        switch ($this->get_server_var('REQUEST_METHOD')){
            case 'OPTIONS':
            case 'HEAD':
                $this->head();
                break;
            case 'GET':
                $this->get($this->options['print_response']);
                break;
            case 'PATCH':
            case 'PUT':
            case 'POST':
                $this->post($this->options['print_response']);
                break;
            case 'DELETE':
                $this->delete($this->options['print_response']);
                break;
            default:
                $this->header('HTTP/1.1 405 Method Not Allowed');
        }
    }

    protected function get_full_url(){
		$https = !empty($_SERVER['HTTPS']) && strcasecmp($_SERVER['HTTPS'], 'on') === 0 || !empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && strcasecmp($_SERVER['HTTP_X_FORWARDED_PROTO'], 'https') === 0;
		return($https ? 'https://' : 'http://').(!empty($_SERVER['REMOTE_USER']) ? $_SERVER['REMOTE_USER'].'@' : '').(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : ($_SERVER['SERVER_NAME'].($https && $_SERVER['SERVER_PORT'] === 443 || $_SERVER['SERVER_PORT'] === 80 ? '' : ':'.$_SERVER['SERVER_PORT']))).substr($_SERVER['SCRIPT_NAME'],0, strrpos($_SERVER['SCRIPT_NAME'], '/'));
    }

    protected function get_user_id(){
//		$userId = $this->options['fkidUser'].'/'.$this->options['fkidMission'].'/'.$this->options['fkidPi'];
		$userId = $this->options['fkidUserReference'];		
		return $userId;
	}

    protected function get_user_path(){
        if ($this->options['user_dirs']){
            return $this->get_user_id().'/';
        }
        return '';
    }

    protected function get_upload_path($file_name = null, $version = null){
        $file_name = $file_name ? $file_name : '';
        if (empty($version)){
            $version_path = '';
        }else{
            $version_dir = @$this->options['image_versions'][$version]['upload_dir'];
            if ($version_dir){return $version_dir.$this->get_user_path().$file_name;}
            $version_path = $version.'/';
        }
        return $this->options['upload_dir'].$this->get_user_path().$version_path.$file_name;
    }

    protected function get_query_separator($url){
        return strpos($url, '?') === false ? '?' : '&';
    }

    protected function get_download_url($file_name, $version = null, $direct = false){
        if (!$direct && $this->options['download_via_php']){
            $url = $this->options['script_url'].$this->get_query_separator($this->options['script_url']).$this->get_singular_param_name().'='.rawurlencode($file_name);
            if ($version){$url .= '&version='.rawurlencode($version);}
            return $url.'&download=1';
        }
        if (empty($version)){
            $version_path = '';
        } else {
            $version_url = @$this->options['image_versions'][$version]['upload_url'];
            if ($version_url){
                return $version_url.$this->get_user_path().rawurlencode($file_name);
            }
            $version_path = rawurlencode($version).'/';
        }
        return $this->options['upload_url'].$this->get_user_path().$version_path.rawurlencode($file_name);
    }

    protected function set_additional_file_properties($file){
        $file->deleteUrl = $this->options['script_url'].$this->get_query_separator($this->options['script_url']).$this->get_singular_param_name().'='.rawurlencode($file->name);
		$file->deleteType = $this->options['delete_type'];
		if ($file->deleteType !== 'DELETE'){
			$file->deleteUrl .= '&_method=DELETE';
		}
		if ($this->options['access_control_allow_credentials']){
			$file->deleteWithCredentials = true;
		}
    }

    protected function fix_integer_overflow($size){
		if ($size < 0) {$size += 2.0 * (PHP_INT_MAX + 1);} return $size;
	}

    protected function get_file_size($file_path, $clear_stat_cache = false){
        if ($clear_stat_cache){
            if (version_compare(PHP_VERSION, '5.3.0') >= 0){
                clearstatcache(true, $file_path);
            } else {
                clearstatcache();
            }
        }
        return $this->fix_integer_overflow(filesize($file_path));
    }

    protected function is_valid_file_object($file_name){
        $file_path = $this->get_upload_path($file_name);
        if (is_file($file_path) && $file_name[0] !== '.'){
            return true;
        }
        return false;
    }

    protected function get_file_object($file_name){
        if ($this->is_valid_file_object($file_name)){
            $file = new \stdClass();
            $file->name = $file_name;
            $file->size = $this->get_file_size($this->get_upload_path($file_name));
            $file->url = $this->get_download_url($file->name);
            foreach($this->options['image_versions'] as $version => $options){
				if (!empty($version)){
                    if (is_file($this->get_upload_path($file_name, $version))){
                        $file->{$version.'Url'} = $this->get_download_url($file->name, $version);
                    }
                }
            }
            $this->set_additional_file_properties($file);
            return $file;
        }
        return null;
    }

    protected function get_file_objects($iteration_method = 'get_file_object'){
        $upload_dir = $this->get_upload_path();
        if (!is_dir($upload_dir)){
            return array();
        }
        return array_values(array_filter(array_map(array($this, $iteration_method), scandir($upload_dir))));
    }

    protected function count_file_objects(){
        return count($this->get_file_objects('is_valid_file_object'));
    }

    protected function get_error_message($error){
        return isset($this->error_messages[$error]) ? $this->error_messages[$error] : $error;
    }

    function get_config_bytes($val){
        $val = trim($val);
        $last = strtolower($val[strlen($val)-1]);
        switch($last){
            case 'g':
                $val *= 1024;
            case 'm':
                $val *= 1024;
            case 'k':
                $val *= 1024;
        }
        return $this->fix_integer_overflow($val);
    }

    protected function validate($uploaded_file, $file, $error, $index){
        if ($error){
            $file->error = $this->get_error_message($error);
            return false;
        }
        $content_length = $this->fix_integer_overflow((int)$this->get_server_var('CONTENT_LENGTH'));
        $post_max_size = $this->get_config_bytes(ini_get('post_max_size'));
        if ($post_max_size && ($content_length > $post_max_size)){
            $file->error = $this->get_error_message('post_max_size');
            return false;
        }
        if (!preg_match($this->options['accept_file_types'], $file->name)){
            $file->error = $this->get_error_message('accept_file_types');
            return false;
        }
        if ($uploaded_file && is_uploaded_file($uploaded_file)){
            $file_size = $this->get_file_size($uploaded_file);
        } else {
            $file_size = $content_length;
        }
        if ($this->options['max_file_size'] && ($file_size > $this->options['max_file_size'] || $file->size > $this->options['max_file_size'])){
            $file->error = $this->get_error_message('max_file_size');
            return false;
        }
        if ($this->options['min_file_size'] && $file_size < $this->options['min_file_size']){
            $file->error = $this->get_error_message('min_file_size');
            return false;
        }
        if (is_int($this->options['max_number_of_files']) && ($this->count_file_objects() >= $this->options['max_number_of_files']) && !is_file($this->get_upload_path($file->name))){
            $file->error = $this->get_error_message('max_number_of_files');
            return false;
        }

        $max_width = @$this->options['max_width'];
        $max_height = @$this->options['max_height'];
        $min_width = @$this->options['min_width'];
        $min_height = @$this->options['min_height'];

        if (($max_width || $max_height || $min_width || $min_height) && preg_match($this->options['image_file_types'], $file->name)){
            list($img_width, $img_height) = $this->get_image_size($uploaded_file);
            if (@$this->options['image_versions']['']['auto_orient'] && function_exists('exif_read_data') && ($exif = @exif_read_data($uploaded_file)) && (((int) @$exif['Orientation']) >= 5 )){
              $tmp = $img_width;
              $img_width = $img_height;
              $img_height = $tmp;
              unset($tmp);
            }

        }
        if (!empty($img_width)){
            if ($max_width && $img_width > $max_width){
                $file->error = $this->get_error_message('max_width');
                return false;
            }
            if ($max_height && $img_height > $max_height){
                $file->error = $this->get_error_message('max_height');
                return false;
            }
            if ($min_width && $img_width < $min_width){
                $file->error = $this->get_error_message('min_width');
                return false;
            }
            if ($min_height && $img_height < $min_height){
                $file->error = $this->get_error_message('min_height');
                return false;
            }
        }
        return true;
    }

    protected function upcount_name_callback($matches){
        $index = isset($matches[1]) ? ((int)$matches[1]) + 1 : 1;
        $ext = isset($matches[2]) ? $matches[2] : '';
        return '('.$index.')'.$ext;
    }

    protected function upcount_name($name){
        return preg_replace_callback(
            '/(?:(?: \(([\d]+)\))?(\.[^.]+))?$/',
            array($this, 'upcount_name_callback'),
            $name,
            1
        );
    }

    protected function get_unique_filename($file_path, $name, $size, $type, $error, $index, $content_range){
        while(is_dir($this->get_upload_path($name))){
            $name = $this->upcount_name($name);
        }
        $uploaded_bytes = $this->fix_integer_overflow((int)$content_range[1]);
        while(is_file($this->get_upload_path($name))){
            if ($uploaded_bytes === $this->get_file_size($this->get_upload_path($name))){
                break;
            }
            $name = $this->upcount_name($name);
        }
        return $name;
    }

    protected function fix_file_extension($file_path, $name, $size, $type, $error, $index, $content_range){
        if (strpos($name, '.') === false && preg_match('/^image\/(gif|jpe?g|png)/', $type, $matches)){
            $name .= '.'.$matches[1];
        }
        if ($this->options['correct_image_extensions'] && function_exists('exif_imagetype')){
            switch(@exif_imagetype($file_path)){
                case IMAGETYPE_JPEG:
                    $extensions = array('jpg', 'jpeg');
                    break;
                case IMAGETYPE_PNG:
                    $extensions = array('png');
                    break;
                case IMAGETYPE_GIF:
                    $extensions = array('gif');
                    break;
            }
            if (!empty($extensions)){
                $parts = explode('.', $name);
                $extIndex = count($parts) - 1;
                $ext = strtolower(@$parts[$extIndex]);
                if (!in_array($ext, $extensions)){
                    $parts[$extIndex] = $extensions[0];
                    $name = implode('.', $parts);
                }
            }
        }
        return $name;
    }

    protected function trim_file_name($file_path, $name, $size, $type, $error, $index, $content_range){
        $name = trim(basename(stripslashes($name)), ".\x00..\x20");
        if (!$name){
            $name = str_replace('.', '-', microtime(true));
        }
        return $name;
    }

    protected function get_file_name($file_path, $name, $size, $type, $error, $index, $content_range){
        $name = $this->trim_file_name($file_path, $name, $size, $type, $error, $index, $content_range);
        return $this->get_unique_filename($file_path, $this->fix_file_extension($file_path, $name, $size, $type, $error, $index, $content_range), $size, $type, $error, $index, $content_range);
    }

    protected function get_scaled_image_file_paths($file_name, $version){
        $file_path = $this->get_upload_path($file_name);
        if (!empty($version)){
            $version_dir = $this->get_upload_path(null, $version);
            if (!is_dir($version_dir)){
                mkdir($version_dir, $this->options['mkdir_mode'], true);
            }
            $new_file_path = $version_dir.'/'.$file_name;
        } else {
            $new_file_path = $file_path;
        }
        return array($file_path, $new_file_path);
    }

    protected function gd_get_image_object($file_path, $func, $no_cache = false){
        if (empty($this->image_objects[$file_path]) || $no_cache){
            $this->gd_destroy_image_object($file_path);
            $this->image_objects[$file_path] = $func($file_path);
        }
        return $this->image_objects[$file_path];
    }

    protected function gd_set_image_object($file_path, $image){
        $this->gd_destroy_image_object($file_path);
        $this->image_objects[$file_path] = $image;
    }

    protected function gd_destroy_image_object($file_path){
        $image = (isset($this->image_objects[$file_path])) ? $this->image_objects[$file_path] : null ;
        return $image && imagedestroy($image);
    }

    protected function gd_imageflip($image, $mode){
        if (function_exists('imageflip')){return imageflip($image, $mode);}
        $new_width = $src_width = imagesx($image);
        $new_height = $src_height = imagesy($image);
        $new_img = imagecreatetruecolor($new_width, $new_height);
        $src_x = 0;
        $src_y = 0;
        switch ($mode){
            case '1':
                $src_y = $new_height - 1;
                $src_height = -$new_height;
                break;
            case '2':
                $src_x  = $new_width - 1;
                $src_width = -$new_width;
                break;
            case '3':
                $src_y = $new_height - 1;
                $src_height = -$new_height;
                $src_x  = $new_width - 1;
                $src_width = -$new_width;
                break;
            default:
                return $image;
        }
		imagecopyresampled($new_img,$image,0,0,$src_x,$src_y,$new_width,$new_height,$src_width,$src_height);
        return $new_img;
    }

    protected function gd_orient_image($file_path, $src_img){
        if (!function_exists('exif_read_data')){return false;}
        $exif = @exif_read_data($file_path);
        if ($exif === false){return false;}
        $orientation = (int)@$exif['Orientation'];
        if ($orientation < 2 || $orientation > 8){return false;}
        switch ($orientation){
            case 2:
				$new_img = $this->gd_imageflip($src_img,defined('IMG_FLIP_VERTICAL') ? IMG_FLIP_VERTICAL : 2);
                break;
            case 3:
                $new_img = imagerotate($src_img, 180, 0);
                break;
            case 4:
				$new_img = $this->gd_imageflip($src_img,defined('IMG_FLIP_HORIZONTAL') ? IMG_FLIP_HORIZONTAL : 1);
                break;
            case 5:
				$tmp_img = $this->gd_imageflip($src_img,defined('IMG_FLIP_HORIZONTAL') ? IMG_FLIP_HORIZONTAL : 1);
                $new_img = imagerotate($tmp_img, 270, 0);
                imagedestroy($tmp_img);
                break;
            case 6:
                $new_img = imagerotate($src_img, 270, 0);
                break;
            case 7:
				$tmp_img = $this->gd_imageflip($src_img,defined('IMG_FLIP_VERTICAL') ? IMG_FLIP_VERTICAL : 2);
                $new_img = imagerotate($tmp_img, 270, 0);
                imagedestroy($tmp_img);
                break;
            case 8:
                $new_img = imagerotate($src_img, 90, 0);
                break;
            default:
                return false;
        }
        $this->gd_set_image_object($file_path, $new_img);
        return true;
    }

    protected function gd_create_scaled_image($file_name, $version, $options){
        if (!function_exists('imagecreatetruecolor')){
            error_log('Function not found: imagecreatetruecolor');
            return false;
        }
        list($file_path, $new_file_path) = $this->get_scaled_image_file_paths($file_name, $version);
        $type = strtolower(substr(strrchr($file_name, '.'), 1));
        switch ($type){
            case 'jpg':
            case 'jpeg':
                $src_func = 'imagecreatefromjpeg';
                $write_func = 'imagejpeg';
                $image_quality = isset($options['jpeg_quality']) ? $options['jpeg_quality'] : 75;
                break;
            case 'gif':
                $src_func = 'imagecreatefromgif';
                $write_func = 'imagegif';
                $image_quality = null;
                break;
            case 'png':
                $src_func = 'imagecreatefrompng';
                $write_func = 'imagepng';
                $image_quality = isset($options['png_quality']) ? $options['png_quality'] : 9;
                break;
            default:
                return false;
        }
        $src_img = $this->gd_get_image_object($file_path,$src_func,!empty($options['no_cache']));
        $image_oriented = false;
        if (!empty($options['auto_orient']) && $this->gd_orient_image($file_path,$src_img)){
            $image_oriented = true;
			$src_img = $this->gd_get_image_object($file_path,$src_func);
        }
        $max_width = $img_width = imagesx($src_img);
        $max_height = $img_height = imagesy($src_img);
        if (!empty($options['max_width'])){
            $max_width = $options['max_width'];
        }
        if (!empty($options['max_height'])){
            $max_height = $options['max_height'];
        }
		$scale = min($max_width / $img_width,$max_height / $img_height);
        if ($scale >= 1){
            if ($image_oriented){return $write_func($src_img, $new_file_path, $image_quality);}
            if ($file_path !== $new_file_path){return copy($file_path, $new_file_path);}
            return true;
        }
        if (empty($options['crop'])){
            $new_width = $img_width * $scale;
            $new_height = $img_height * $scale;
            $dst_x = 0;
            $dst_y = 0;
            $new_img = imagecreatetruecolor($new_width, $new_height);
        }else{
            if (($img_width / $img_height) >= ($max_width / $max_height)){
                $new_width = $img_width / ($img_height / $max_height);
                $new_height = $max_height;
            } else {
                $new_width = $max_width;
                $new_height = $img_height / ($img_width / $max_width);
            }
            $dst_x = 0 - ($new_width - $max_width) / 2;
            $dst_y = 0 - ($new_height - $max_height) / 2;
            $new_img = imagecreatetruecolor($max_width, $max_height);
        }
        switch ($type){
            case 'gif':
            case 'png':
                imagecolortransparent($new_img, imagecolorallocate($new_img, 0, 0, 0));
            case 'png':
                imagealphablending($new_img, false);
                imagesavealpha($new_img, true);
                break;
        }
		$success = imagecopyresampled($new_img, $src_img, $dst_x, $dst_y, 0, 0, $new_width, $new_height, $img_width, $img_height) && $write_func($new_img, $new_file_path, $image_quality);
        $this->gd_set_image_object($file_path, $new_img);
        return $success;
    }

    protected function imagick_get_image_object($file_path, $no_cache = false){
        if (empty($this->image_objects[$file_path]) || $no_cache){
            $this->imagick_destroy_image_object($file_path);
            $image = new \Imagick();
            if (!empty($this->options['imagick_resource_limits'])){
                foreach ($this->options['imagick_resource_limits'] as $type => $limit){
                    $image->setResourceLimit($type, $limit);
                }
            }
            $image->readImage($file_path);
            $this->image_objects[$file_path] = $image;
        }
        return $this->image_objects[$file_path];
    }

    protected function imagick_set_image_object($file_path, $image){
        $this->imagick_destroy_image_object($file_path);
        $this->image_objects[$file_path] = $image;
    }

    protected function imagick_destroy_image_object($file_path){
        $image = (isset($this->image_objects[$file_path])) ? $this->image_objects[$file_path] : null ;
        return $image && $image->destroy();
    }

    protected function imagick_orient_image($image){
        $orientation = $image->getImageOrientation();
        $background = new \ImagickPixel('none');
        switch ($orientation){
            case \imagick::ORIENTATION_TOPRIGHT: 
                $image->flopImage();
                break;
            case \imagick::ORIENTATION_BOTTOMRIGHT:
                $image->rotateImage($background, 180);
                break;
            case \imagick::ORIENTATION_BOTTOMLEFT:
                $image->flipImage(); 
                break;
            case \imagick::ORIENTATION_LEFTTOP:
                $image->flopImage(); 
                $image->rotateImage($background, 270);
                break;
            case \imagick::ORIENTATION_RIGHTTOP:
                $image->rotateImage($background, 90);
                break;
            case \imagick::ORIENTATION_RIGHTBOTTOM:
                $image->flipImage(); 
                $image->rotateImage($background, 270);
                break;
            case \imagick::ORIENTATION_LEFTBOTTOM:
                $image->rotateImage($background, 270);
                break;
            default:
                return false;
        }
        $image->setImageOrientation(\imagick::ORIENTATION_TOPLEFT); 
        return true;
    }

    protected function imagick_create_scaled_image($file_name, $version, $options){
        list($file_path, $new_file_path) = $this->get_scaled_image_file_paths($file_name, $version);
        $image = $this->imagick_get_image_object($file_path, !empty($options['crop']) || !empty($options['no_cache']));
        if ($image->getImageFormat() === 'GIF'){
            $images = $image->coalesceImages();
            foreach ($images as $frame){
                $image = $frame;
                $this->imagick_set_image_object($file_name, $image);
                break;
            }
        }
        $image_oriented = false;
        if (!empty($options['auto_orient'])){$image_oriented = $this->imagick_orient_image($image);}
        $new_width = $max_width = $img_width = $image->getImageWidth();
        $new_height = $max_height = $img_height = $image->getImageHeight();
        if (!empty($options['max_width'])){$new_width = $max_width = $options['max_width'];}
        if (!empty($options['max_height'])){$new_height = $max_height = $options['max_height'];}
        if (!($image_oriented || $max_width < $img_width || $max_height < $img_height)){
            if ($file_path !== $new_file_path){return copy($file_path, $new_file_path);}
            return true;
        }
        $crop = !empty($options['crop']);
        if ($crop){
            $x = 0;
            $y = 0;
            if (($img_width / $img_height) >= ($max_width / $max_height)){
                $new_width = 0;
                $x = ($img_width / ($img_height / $max_height) - $max_width) / 2;
            }else{
                $new_height = 0;
                $y = ($img_height / ($img_width / $max_width) - $max_height) / 2;
            }
        }
        $success = $image->resizeImage($new_width, $new_height, isset($options['filter']) ? $options['filter'] : \imagick::FILTER_LANCZOS, isset($options['blur']) ? $options['blur'] : 1, $new_width && $new_height);
        if ($success && $crop){
			$success = $image->cropImage($max_width, $max_height, $x, $y);
            if ($success){$success = $image->setImagePage($max_width, $max_height, 0, 0);}
        }
        $type = strtolower(substr(strrchr($file_name, '.'), 1));
        switch ($type){
            case 'jpg':
            case 'jpeg':
                if (!empty($options['jpeg_quality'])){
                    $image->setImageCompression(\imagick::COMPRESSION_JPEG);
                    $image->setImageCompressionQuality($options['jpeg_quality']);
                }
                break;
        }
        if (!empty($options['strip'])){$image->stripImage();}
        return $success && $image->writeImage($new_file_path);
    }

    protected function imagemagick_create_scaled_image($file_name, $version, $options){
        list($file_path, $new_file_path) = $this->get_scaled_image_file_paths($file_name, $version);
        $resize = @$options['max_width'].(empty($options['max_height']) ? '' : 'X'.$options['max_height']);
        if (!$resize && empty($options['auto_orient'])){
            if ($file_path !== $new_file_path){return copy($file_path, $new_file_path);}
            return true;
        }
        $cmd = $this->options['convert_bin'];
        if (!empty($this->options['convert_params'])){$cmd .= ' '.$this->options['convert_params'];}
        $cmd .= ' '.escapeshellarg($file_path);
        if (!empty($options['auto_orient'])){$cmd .= ' -auto-orient';}
        if ($resize){
            $cmd .= ' -coalesce';
            if (empty($options['crop'])){
                $cmd .= ' -resize '.escapeshellarg($resize.'>');
            }else{
                $cmd .= ' -resize '.escapeshellarg($resize.'^');
                $cmd .= ' -gravity center';
                $cmd .= ' -crop '.escapeshellarg($resize.'+0+0');
            }
            $cmd .= ' +repage';
        }
        if (!empty($options['convert_params'])){$cmd .= ' '.$options['convert_params'];}
        $cmd .= ' '.escapeshellarg($new_file_path);
        exec($cmd, $output, $error);
        if ($error){
            error_log(implode('\n', $output));
            return false;
        }
        return true;
    }

    protected function get_image_size($file_path){
        if ($this->options['image_library']){
            if (extension_loaded('imagick')){
                $image = new \Imagick();
                try {
                    if (@$image->pingImage($file_path)){
                        $dimensions = array($image->getImageWidth(), $image->getImageHeight());
                        $image->destroy();
                        return $dimensions;
                    }
                    return false;
                } catch (\Exception $e){
                    error_log($e->getMessage());
                }
            }
            if ($this->options['image_library'] === 2){
                $cmd = $this->options['identify_bin'];
                $cmd .= ' -ping '.escapeshellarg($file_path);
                exec($cmd, $output, $error);
                if (!$error && !empty($output)){
                    $infos = preg_split('/\s+/', substr($output[0], strlen($file_path)));
                    $dimensions = preg_split('/x/', $infos[2]);
                    return $dimensions;
                }
                return false;
            }
        }
        if (!function_exists('getimagesize')){
            error_log('Function not found: getimagesize');
            return false;
        }
        return @getimagesize($file_path);
    }

    protected function create_scaled_image($file_name, $version, $options){
		if ($this->options['image_library'] === 2){return $this->imagemagick_create_scaled_image($file_name, $version, $options);}
		if ($this->options['image_library'] && extension_loaded('imagick')){return $this->imagick_create_scaled_image($file_name, $version, $options);}
		return $this->gd_create_scaled_image($file_name, $version, $options);
	}

    protected function destroy_image_object($file_path){
        if ($this->options['image_library'] && extension_loaded('imagick')){return $this->imagick_destroy_image_object($file_path);}
    }

    protected function is_valid_image_file($file_path){
        if (!preg_match($this->options['image_file_types'], $file_path)){return false;}
        if (function_exists('exif_imagetype')){return @exif_imagetype($file_path);}
        $image_info = $this->get_image_size($file_path);
        return $image_info && $image_info[0] && $image_info[1];
    }

    protected function handle_image_file($file_path, $file){
        $failed_versions = array();
        foreach($this->options['image_versions'] as $version => $options){
            if ($this->create_scaled_image($file->name, $version, $options)){
                if (!empty($version)){
                    $file->{$version.'Url'} = $this->get_download_url($file->name, $version);
                }else{
                    $file->size = $this->get_file_size($file_path, true);
                }
            }else{
                $failed_versions[] = $version ? $version : 'original';
            }
        }
        if (count($failed_versions)){$file->error = $this->get_error_message('image_resize').' ('.implode($failed_versions,', ').')';}
        $this->destroy_image_object($file_path);
    }

	/* HIER */
    protected function handle_form_data($file, $index){
        $file->title = @$_REQUEST['title'][$index];
        $file->description = @$_REQUEST['description'][$index];
		$file->fkidUserReference = $this->options['fkidUserReference'];
		$file->uploadType = $this->options['uploadType'];

/*        $file->title = @$_REQUEST['title'][$index];
        $file->description = @$_REQUEST['description'][$index];
		$file->fkidUserCreated = $this->options['fkidUser'];
		$file->fkidMission = $this->options['fkidMission'];
		$file->fkidIndicator = $this->options['fkidPi'];
		$file->fkidDimension = $this->options['fkidDimension'];		
		$file->uploadType = $this->options['uploadType'];
		*/
    }

	protected function handle_file_upload($uploaded_file, $name, $size, $type, $error, $index = null, $content_range = null){
			$file = new \stdClass();
			$file->name = $this->get_file_name($uploaded_file, $name, $size, $type, $error,	$index, $content_range);
			$fileSize = $size;
			$file->size = $this->fix_integer_overflow((int)$size);
			$file->type = $type;
			$data = addslashes (file_get_contents($uploaded_file));
			$size = getimagesize($uploaded_file);     
			$this->handle_form_data($file, $index);
			if ($this->validate($uploaded_file, $file, $error, $index)){
				$this->handle_form_data($file, $index);
				$upload_dir = $this->get_upload_path();
				if (!is_dir($upload_dir)){mkdir($upload_dir, $this->options['mkdir_mode'], true);}
				$file_path = $this->get_upload_path($file->name);
				$short_path = $this->options['short_url'].$this->get_user_id().'/'.$file->name;
				$thumb_path = $this->options['short_url'].$this->get_user_id().'/thumbnail/'.$file->name;
				$append_file = $content_range && is_file($file_path) && $file->size > $this->get_file_size($file_path);
				if ($uploaded_file && is_uploaded_file($uploaded_file)){
					if ($append_file){
						file_put_contents($file_path, fopen($uploaded_file, 'r'), FILE_APPEND);
					}else{
						move_uploaded_file($uploaded_file, $file_path);
					}
				}else{
					file_put_contents($file_path, fopen('php://input', 'r'), $append_file ? FILE_APPEND : 0);
				}
				$file_size = $this->get_file_size($file_path, $append_file);
				if ($file_size === $file->size){
					$file->url = $this->get_download_url($file->name);
					if ($this->is_valid_image_file($file_path)){$this->handle_image_file($file_path, $file);}
				}else{
					$file->size = $file_size;
					if (!$content_range && $this->options['discard_aborted_uploads']){
						unlink($file_path);
						$file->error = $this->get_error_message('abort');
					}
				}
			$this->set_additional_file_properties($file);
			$dateCreated = date('Y-m-d H:i:s');
			$file->upload_to_db = $this->add_img($file->title, $file->description, $name, $fileSize, $file->type, $short_path, $thumb_path, $data, $dateCreated, $file->fkidUserReference, $this->options['uploadType']);	
		}
		return $file;
	}

	function query($query){  
		$database = $this->options['database'];  
		$host = $this->options['host'];  
		$username = $this->options['username'];  
		$password = $this->options['password'];  

		$mysqli = new mysqli($host,$username,$password,$database);  
		if ($mysqli->connect_errno) {
			echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
		if(!$mysqli->query($query)) {
		    echo "Table creation failed: (" . $mysqli->errno . ") " . $mysqli->error;
		}
		return $mysqli;
	} 

	function add_img($title, $description, $name, $size, $type, $path, $thumb_path, $data, $dateCreated, $fkidUserReference, $uploadType){
		
		$add_to_db = $this->query("INSERT INTO UserDocuments(
			documentTitle ,documentDescription, documentName, documentSize, documentType, documentPath, thumbPath, documentData, dateCreated, fkidUserReference, uploadType 
		) VALUES(
			'{$title}',	'{$description}', '{$name}', '{$size}', '{$type}', '{$path}', '{$thumb_path}', '{$data}', '{$dateCreated}', '{$fkidUserReference}', '{$uploadType}'
		)") or die(mysql_error());  

		return $add_to_db;  
	}

    protected function readfile($file_path){
        $file_size = $this->get_file_size($file_path);
        $chunk_size = $this->options['readfile_chunk_size'];
        if ($chunk_size && $file_size > $chunk_size){
            $handle = fopen($file_path, 'rb');
            while (!feof($handle)){
                echo fread($handle, $chunk_size);
                @ob_flush();
                @flush();
            }
            fclose($handle);
            return $file_size;
        }
        return readfile($file_path);
    }

    protected function body($str){
        echo $str;
    }

    protected function header($str){
        header($str);
    }

    protected function get_upload_data($id){
        return @$_FILES[$id];
    }

    protected function get_post_param($id){
        return @$_POST[$id];
    }

    protected function get_query_param($id){
        return @$_GET[$id];
    }

    protected function get_server_var($id){
        return @$_SERVER[$id];
    }


    protected function get_version_param(){
        return basename(stripslashes($this->get_query_param('version')));
    }

    protected function get_singular_param_name(){
        return substr($this->options['param_name'], 0, -1);
    }

    protected function get_file_name_param(){
        $name = $this->get_singular_param_name();
        return basename(stripslashes($this->get_query_param($name)));
    }

    protected function get_file_names_params(){
        $params = $this->get_query_param($this->options['param_name']);
        if (!$params){return null;}
        foreach ($params as $key => $value){$params[$key] = basename(stripslashes($value));}
        return $params;
    }

    protected function get_file_type($file_path){
        switch (strtolower(pathinfo($file_path, PATHINFO_EXTENSION))){
            case 'jpeg':
            case 'jpg':
                return 'image/jpeg';
            case 'png':
                return 'image/png';
            case 'gif':
                return 'image/gif';
            default:
                return '';
        }
    }

    protected function download(){
        switch ($this->options['download_via_php']){
            case 1:
                $redirect_header = null;
                break;
            case 2:
                $redirect_header = 'X-Sendfile';
                break;
            case 3:
                $redirect_header = 'X-Accel-Redirect';
                break;
            default:
                return $this->header('HTTP/1.1 403 Forbidden');
        }
        $file_name = $this->get_file_name_param();
        if (!$this->is_valid_file_object($file_name)){return $this->header('HTTP/1.1 404 Not Found');}
        if ($redirect_header){return $this->header($redirect_header.': '.$this->get_download_url($file_name, $this->get_version_param(), true));}
        $file_path = $this->get_upload_path($file_name, $this->get_version_param());
        $this->header('X-Content-Type-Options: nosniff');
        if (!preg_match($this->options['inline_file_types'], $file_name)){
            $this->header('Content-Type: application/octet-stream');
            $this->header('Content-Disposition: attachment; filename="'.$file_name.'"');
        } else {
            $this->header('Content-Type: '.$this->get_file_type($file_path));
            $this->header('Content-Disposition: inline; filename="'.$file_name.'"');
        }
        $this->header('Content-Length: '.$this->get_file_size($file_path));
        $this->header('Last-Modified: '.gmdate('D, d M Y H:i:s T', filemtime($file_path)));
        $this->readfile($file_path);
    }

    protected function send_content_type_header(){
        $this->header('Vary: Accept');
        if (strpos($this->get_server_var('HTTP_ACCEPT'), 'application/json') !== false){
            $this->header('Content-type: application/json');
        } else {
            $this->header('Content-type: text/plain');
        }
    }

    protected function send_access_control_headers(){
        $this->header('Access-Control-Allow-Origin: '.$this->options['access_control_allow_origin']);
        $this->header('Access-Control-Allow-Credentials: '.($this->options['access_control_allow_credentials'] ? 'true' : 'false'));
        $this->header('Access-Control-Allow-Methods: '.implode(', ', $this->options['access_control_allow_methods']));
        $this->header('Access-Control-Allow-Headers: '.implode(', ', $this->options['access_control_allow_headers']));
    }

    public function generate_response($content, $print_response = true){
        $this->response = $content;
        if ($print_response){
            $json = json_encode($content);
            $redirect = stripslashes($this->get_post_param('redirect'));
            if ($redirect && preg_match($this->options['redirect_allow_target'], $redirect)){
                $this->header('Location: '.sprintf($redirect, rawurlencode($json)));
                return;
            }
            $this->head();
            if ($this->get_server_var('HTTP_CONTENT_RANGE')){
                $files = isset($content[$this->options['param_name']]) ? $content[$this->options['param_name']] : null;
                if ($files && is_array($files) && is_object($files[0]) && $files[0]->size){$this->header('Range: 0-'.($this->fix_integer_overflow((int)$files[0]->size) - 1));}
            }
            $this->body($json);
        }
        return $content;
    }

    public function get_response (){
        return $this->response;
    }

    public function head(){
        $this->header('Pragma: no-cache');
        $this->header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->header('Content-Disposition: inline; filename="files.json"');
        $this->header('X-Content-Type-Options: nosniff');
        if ($this->options['access_control_allow_origin']){$this->send_access_control_headers();}
        $this->send_content_type_header();
    }

    public function get($print_response = true){
        if ($print_response && $this->get_query_param('download')){return $this->download();}
        $file_name = $this->get_file_name_param();
        if ($file_name){
			$response = array($this->get_singular_param_name() => $this->get_file_object($file_name));
        }else{
            $response = array($this->options['param_name'] => $this->get_file_objects());
        }
        return $this->generate_response($response, $print_response);
    }

    public function post($print_response = true){
        if ($this->get_query_param('_method') === 'DELETE'){return $this->delete($print_response);}
        $upload = $this->get_upload_data($this->options['param_name']);
        $content_disposition_header = $this->get_server_var('HTTP_CONTENT_DISPOSITION');
        $file_name = $content_disposition_header ? rawurldecode(preg_replace('/(^[^"]+")|("$)/','', $content_disposition_header)) : null;
        $content_range_header = $this->get_server_var('HTTP_CONTENT_RANGE');
        $content_range = $content_range_header ? preg_split('/[^0-9]+/', $content_range_header) : null;
        $size =  $content_range ? $content_range[3] : null;
        $files = array();
        if ($upload){
            if (is_array($upload['tmp_name'])){
                foreach ($upload['tmp_name'] as $index => $value){
                    $files[] = $this->handle_file_upload(
                        $upload['tmp_name'][$index],
                        $file_name ? $file_name : $upload['name'][$index],
/*HIER*/
                        $size ? $size : $upload['size'][$index],
                        $upload['type'][$index],
                        $upload['error'][$index],
                        $index,
                        $content_range
                    );
                }
            } else {
                // param_name is a single object identifier like "file",
                // $upload is a one-dimensional array:
                $files[] = $this->handle_file_upload(
                    isset($upload['tmp_name']) ? $upload['tmp_name'] : null, $file_name ? $file_name : (isset($upload['name']) ? $upload['name'] : null),
                    $size ? $size : (isset($upload['size']) ? $upload['size'] : $this->get_server_var('CONTENT_LENGTH')),
                    isset($upload['type']) ? $upload['type'] : $this->get_server_var('CONTENT_TYPE'),
                    isset($upload['error']) ? $upload['error'] : null, null, $content_range);
            }
        }
        $response = array($this->options['param_name'] => $files);
        return $this->generate_response($response, $print_response);
    }

    public function delete($print_response = true){
        $file_names = $this->get_file_names_params();
        if (empty($file_names)){$file_names = array($this->get_file_name_param());}
        $response = array();
        foreach($file_names as $file_name){
            $file_path = $this->get_upload_path($file_name);
            $success = is_file($file_path) && $file_name[0] !== '.' && unlink($file_path);
            if ($success){
                foreach($this->options['image_versions'] as $version => $options){
                    if (!empty($version)){
                        $file = $this->get_upload_path($file_name, $version);
                        if (is_file($file)){
                            unlink($file);
                        }
                    }
                }
            }
            $response[$file_name] = $success;
        }
        return $this->generate_response($response, $print_response);
    }
}