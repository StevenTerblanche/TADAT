<?php
// Load the configuration file
require_once(__DIR__ .'/config.php');

function url_parser($values) {
	$value		= $values['value'];
	$type 		= $values['type'];
	$message	= $values['message'];
	
	// If the event type and values are empty (prevents interfering with event based plugins)
	if(empty($type) && empty($value) && !empty($message)) {
		preg_match_all('/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:\'".,<>?«»“”‘’]))/', $message, $link);
		
		// Get the first URL in the message
		$url = $link[0][0];
		
		// If the message contains an URL
		if($url) {
			// If match www. at the beginning of the string, add http before
			if(substr($link[0][0], 0, 4) == 'www.') {
				$url = 'http://'.$link[0][0];
			}
			
			// Fetch the URL content
			$content = fetch($url);
			
			// Get the metadata content
			$meta = getMetaTags($content);

			// Site Title	
			$title = $meta['title'];
		
			// Site Description
			$description = $meta['description'];

			// If the page has a title
			if($title) {
				$api_query = fetch('https://www.googleapis.com/pagespeedonline/v2/runPagespeed?url='.urlencode($url).'&strategy=desktop&screenshot=true&key='.$GLOBALS['url_parser_api_key']);
				$api_result = json_decode($api_query, true);

				// If the API returns a screenshot
				if($api_result['screenshot']['data']) {
					// Generate the domain name based on the fetched domain name
					$image_name = md5($url).'.jpg';
					
					// Decode the base64 image
					$image = base64_decode(str_replace(array('_', '-'), array('/', '+'), $api_result['screenshot']['data']));
					
					// If the image can't be saved
					if(!file_put_contents(__DIR__ .'/screenshots/'.$image_name, $image)) {
						$image_name = '';
					}
				}
				
				// Check if the string can be JSON encoded
				$json_encode = json_encode(array('url' => $title, 'description' => $description));
				$json_decode = json_decode($json_encode, true);
				
				if(empty($json_decode['title'])) {
					// If there's a title available in the API response
					if($api_result['title']) {
						$title = $api_result['title'];
					} else {
						$title = utf8_encode($title);
					}
				}
				
				if(empty($json_decode['description'])) {
					$description = utf8_encode($description);
				}
				
				// Cache date
				$cache_date = time();
				
				// Build the URL information
				$array = array('url' => (strlen($url) > 350 ? substr($url, 0, 350).'#' : $url), 'title' => (strlen($title) > 64 ? substr($title, 0, 64).'...' : $title), 'description' => (strlen($description) > 350 ? substr($description, 0, 350).'...' : $description), 'image' => $image_name, 'cache_date' => $cache_date);

				// Return the formatted result (prefix:{json_value})
				return 'url:'.json_encode($array);
			} else {
				return $value;
			}
		} else {
			return $value;
		}
	}
}
function getMetaTags($value) {
	$array = array();

	// Match the meta tags
	$pattern = '
	~<\s*meta\s

	# using lookahead to capture type to $1
	(?=[^>]*?
	\b(?:name|property|http-equiv)\s*=\s*
	(?|"\s*([^"]*?)\s*"|\'\s*([^\']*?)\s*\'|
	([^"\'>]*?)(?=\s*/?\s*>|\s\w+\s*=))
	)

	# capture content to $2
	[^>]*?\bcontent\s*=\s*
	(?|"\s*([^"]*?)\s*"|\'\s*([^\']*?)\s*\'|
	([^"\'>]*?)(?=\s*/?\s*>|\s\w+\s*=))
	[^>]*>

	~ix';
	if(preg_match_all($pattern, $value, $out)) {
		$array = array_combine(array_map('strtolower', $out[1]), $out[2]);
	}
	
	// Match the title tags
	preg_match("/<title[^>]*>(.*?)<\/title>/is", $value, $title);
	$array['title'] = $title[1];
	
	// Return the result
	return $array;
}
?>