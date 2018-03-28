

#Outputs an array in a user-readable JSON format
if (! function_exists('display_json')){
    function display_json($array){
        $data = json_indent($array);
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');
        echo $data;
    }
}

#Convert an array to a user-readable JSON string
 if (! function_exists('json_indent')){
    function json_indent($array = array()){
        // make sure array is provided
        if (empty($array)) return NULL;
        $json = json_encode($array);
        $result        = '';
        $pos           = 0;
        $str_len       = strlen($json);
        $indent_str    = '  ';
        $new_line      = "\n";
        $prev_char     = '';
        $out_of_quotes = true;

        for ($i = 0; $i <= $str_len; $i++){
            $char = substr($json, $i, 1);
            if ($char == '"' && $prev_char != '\\'){
                $out_of_quotes = !$out_of_quotes;
            }elseif (($char == '}' OR $char == ']') && $out_of_quotes){
                $result .= $new_line;
                $pos--;
                for ($j = 0; $j < $pos; $j++){$result .= $indent_str;}}
            $result .= $char;
            if (($char == ',' OR $char == '{' OR $char == '[') && $out_of_quotes){
                $result .= $new_line;
                if ($char == '{' OR $char == '['){$pos++;}
                for ($j = 0; $j < $pos; $j++){$result .= $indent_str;}
            }
            $prev_char = $char;
        }
        return $result . $new_line;
    }
}


# Save data to a CSV file
if (! function_exists('array_to_csv')){
    function array_to_csv($array = array(), $filename = "export.csv"){
        $CI = get_instance();
        $CI->output->enable_profiler(FALSE);
        if (! empty($array)){
            if (!substr(strrchr($filename, '.csv'), 1)){
                $filename .= '.csv';
            }
            try{
                header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
                header("Last-Modified: " . gmdate("D, d M Y H:i:s") . "GMT");
                header("Cache-Control: no-cache, must-revalidate");
                header("Pragma: no-cache");
                header("Content-type: text/csv");
                header("Content-Description: File Transfer");
                header("Content-Disposition: attachment; filename={$filename}");
                $output = @fopen('php://output', 'w');
                $header_displayed = FALSE;
                foreach ($array as $row){
                    if (!$header_displayed){
                        fputcsv($output, array_keys($row));
                        $header_displayed = TRUE;
                    }
                    $allowed = '/[^a-zA-Z0-9_ %\|\[\]\.\(\)%&-]/s';
                    foreach ($row as $key => $value){
                        $row[$key] = preg_replace($allowed, '', $value);
                    }
                    fputcsv($output, $row);
                }
                fclose($output);
            }
            catch (Exception $e) {}
        }
        exit;
    }
}




# replace file_get_contents because of allow_url_fopen=0
function file_get_contents_curl($url, $retries=5){
    $ua = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)';
    if (extension_loaded('curl') === true){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url); // The URL to fetch. This can also be set when initializing a session with curl_init().
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it out directly.
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5); // The number of seconds to wait while trying to connect.
        curl_setopt($ch, CURLOPT_USERAGENT, $ua); // The contents of the "User-Agent: " header to be used in a HTTP request.
        curl_setopt($ch, CURLOPT_FAILONERROR, TRUE); // To fail silently if the HTTP code returned is greater than or equal to 400.
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); // To follow any "Location: " header that the server sends as part of the HTTP header.
        curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE); // To automatically set the Referer: field in requests where it follows a Location: redirect.
        curl_setopt($ch, CURLOPT_TIMEOUT, 5); // The maximum number of seconds to allow cURL functions to execute.
        curl_setopt($ch, CURLOPT_MAXREDIRS, 5); // The maximum number of redirects
        $result = trim(curl_exec($ch));
        curl_close($ch);
    }else{
        $result = trim(file_get_contents($url));
    }        

    if (empty($result) === true){
        $result = false;
        if ($retries >= 1){
            sleep(1);
            return file_get_contents_curl($url, --$retries);
        }
    }    
    return $result;
}