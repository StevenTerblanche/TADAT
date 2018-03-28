<?php
// Load the configuration file
require_once(__DIR__ .'/config.php');

function weather_sidebar($values) {
	// Define the location
	if($values['country'] && $values['location']) {
		$location = $values['location'].', '.$values['country'];
	} elseif($values['country']) {
		$location = $values['country'];
	} elseif($values['location']) {
		$location = $values['location'];
	} else {
		$location = $GLOBALS['weather_location'];
	}
	
	// Define the format
	if($_GET['weather_format'] == 1 && isset($_GET['weather_format'])) {
		setcookie("format", "1", $time);
		$cf = 'F';
		$f = '1';
	} elseif($_GET['weather_format'] == 0 && isset($_GET['weather_format'])) {
		setcookie("format", "0", $time);
		$cf = 'C';
		$f = '0';
	} elseif($_COOKIE['format'] == '') {
		$f = $GLOBALS['weather_format'];
		$cf = ($f) ? 'F' : 'C';
	} elseif($_COOKIE['format'] == 1) {
		$cf = 'F';
		$f = '1';
	} elseif($_COOKIE['format'] == 0) {
		$cf = 'C';
		$f = '0';
	}
	
	$weather = new Weather($GLOBALS['weather_api'], $f);
	$weather_current = $weather->get($location, 0, 0, null, null);
	if($GLOBALS['weather_forecast'] > 0) {
		$weather_forecast = $weather->get($location, 1, 0, $GLOBALS['weather_forecast'], null);
	}
	
	$now = $weather->data(0, $weather_current);
	$forecasts = $weather->data(1, $weather_forecast);
	
	$style = '
	<style type = "text/css" scoped>
		.weather-now {
			font-size: 22px;
			font-weight: lighter;
			line-height: 45px;
			padding-left: 10px;
			float: left;
		}
		.weather-icon {
			float: left;
		}
		.weather-icon img {
			height: 45px;
			width: 45px;
		}
		.forecast {
			float: right;
		}
		.low {
			color: #507ACC;
		}
		.high {
			color: #CC5055;
		}
		.forecast img {
			width: 16px;
			height: 16px;
			padding-right: 5px;
			margin-top: -2px;
		}
		.weather-now-info {
			float: right;
			width: 50%;
			text-align: right;
			padding-top: 3px;
		}
		.weather-now-info img {
			width: 10px;
			height: 10px;
			padding-right: 5px;
		}
    </style>';
	
	foreach($forecasts as $x) {
		$forecast .= '<div class="sidebar-list">'.$x['day'].' <div class="forecast"><img src="'.$values['site_url'].'/plugins/weather/icons/'.$x['icon'].'.png'.'"><span class="low">'.$x['min'].'&deg;</span> / <span class="high">'.$x['max'].'&deg;</span></div></div>';
	}
	
	$output = '
	<div class="sidebar-container widget-weather-plugin">'.$style.'
		<div class="sidebar-content">
			<div class="sidebar-header">Weather in '.$location.'</div>
			<div class="sidebar-inner" style="overflow: auto"><div class="weather-icon"><div style="float: left;"><img src="'.$values['site_url'].'/plugins/weather/icons/'.$now['icon'].'.png'.'"></div><div class="weather-now">'.$now['temperature'].'&deg; <a href="'.$values['site_url'].'/index.php?a=feed&weather_format='.(($cf == 'C') ? '1' : '0').'" title="'.(($cf == 'C') ? 'Change to Fahrenheit' : 'Change to Celsius').'">'.$cf.'</a></div></div>
			<div class="weather-now-info" title="Windspeed"><img src="'.$values['site_url'].'/plugins/weather/icons/wind.png'.'">'.$now['windspeed'].'</div>
			<div class="weather-now-info" title="Humidity"><img src="'.$values['site_url'].'/plugins/weather/icons/drop.png'.'">'.$now['humidity'].'%'.'</div></div>
			'.$forecast.'
		</div>
	</div>';
	return $output;
}

class Weather {
   /**
	* Retrieves the forecast for a location
	*
	* Retrieves forecast details from an API endpoint and formats the results to be used universally
	*
	* PHP version 5
	*
	* @copyright	2015 Pricop Alexandru - Mihai
	* @author		Pricop Alexandru - Mihai
	* @link			http://pricop.info
	*/
	
	private $api_key;
	public $units;
	
	public function __construct($api_key = null, $units = null) {
		$this->api_key	= $api_key;
		$this->units	= $units;
	}
	
	function get($location = null, $end_point = null, $format = null, $days = null, $lang = null) {
	   /**
		* @param 	string	$location	The location to be searched
		* @param	int		$end_point	The endpoint link, 0 for current weather, 1 for forecast
		* @param	int 	$units		The units format, 0 for metrics and 1 for imperial
		* @param	int		$format		The format output, 0 for json, 1 for xml
		* @param	int		$days		The number of days to be returned
		* @return	string
		*/
		
		// Define the API endpoint
		if($end_point == 1) {
			$api_endpoint = 'http://api.openweathermap.org/data/2.5/forecast/daily?';
		} else {
			$api_endpoint = 'http://api.openweathermap.org/data/2.5/find?';
		}

		// Parameters to build the query URL
		$params = array(
			'q'		=> $location,
			'units' => ($this->units == 1) ? 'imperial' : 'metric',
			'cnt'	=> $days,
			'mode'	=> ($format) ? 'xml' : 'json',
			'lang'	=> ($lang) ? $lang : 'en',
			'APPID'	=> $this->api_key
		);
		
		// Build the request URL
		$url = $api_endpoint.http_build_query($params);
		
		// Check if the cURL is enabled and try to get a response
		if(function_exists('curl_exec')) {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
			curl_setopt($ch, CURLOPT_TIMEOUT, 60);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
			$response = curl_exec($ch);
			curl_close($ch);
		}
		
		// If there is no response using cURL
		if(empty($response)) {
			
			// Try using file_get_contents to get a response
			$response = file_get_contents($url);
		}
		
		// Return the result
		return $response;
	}
	
	function data($type, $data = null) {
	   /**
		* @param	int		$type	The type of the format, 0 for current weather, 1 for forecast
		* @param	string	$data	The data to be consumed
		* @return	string
		*/
		
		// Decode the JSON content into an array
		$data = json_decode($data, true);
		
		// Check if the response is valid
		if($data['cod'] != 200) return false;

		foreach($data['list'] as $key => $value) {
			
			// Format the content for universal use
			if($type == 1) {
				$output[$key]['min']			= round($value['temp']['min']);
				$output[$key]['max']			= round($value['temp']['max']);
				$output[$key]['condition']		= $value['weather'][0]['main'];
				$output[$key]['description']	= ucfirst($value['weather'][0]['description']);
				$output[$key]['windspeed']		= $this->transform(0, $value['speed']);
				$output[$key]['humidity']		= $value['humidity'];
				$output[$key]['pressure']		= $value['pressure'];
				$output[$key]['icon']			= $this->icons($value['weather'][0]['id']);
				$output[$key]['day']			= $this->transform(1, gmdate("w", $value['dt']));
				$output[$key]['date']			= gmdate("m-d-Y", $value['dt']);
			} else {
				$output['location']				= $value['name'];
				$output['country_code']			= $value['sys']['country'];
				$output['temperature']			= round($value['main']['temp']);
				$output['condition']			= $value['weather'][0]['main'];
				$output['description']			= ucfirst($value['weather'][0]['description']);
				$output['windspeed']			= $this->transform(0, $value['wind']['speed']);
				$output['humidity']				= $value['main']['humidity'];
				$output['pressure']				= $value['main']['pressure'];
				$output['icon']					= $this->icons($value['weather'][0]['id']);
				$output['day']					= $this->transform(1, gmdate("w", $value['dt']));
				$output['date']					= gmdate("m-d-Y", $value['dt']);
			}
		}
		
		// Return the result
		return $output;
	}
	
	function icons($code = null) {
	   /**
		* @param	string	$code	The code to be assigned to an image
		*/
		
		if(in_array($code, array(800, 951, 952))) {
			return "16";
		} elseif(in_array($code, array(801))) {
			return "15";
		} elseif(in_array($code, array(802))) {
			return "14"; 
		} elseif(in_array($code, array(803, 804))) {
			return "20";
		} elseif(in_array($code, array(300, 301, 302, 310, 311, 312, 313, 314, 321))) {
			return "09";
		} elseif(in_array($code, array(500, 501, 502, 503, 504))) {
			return "17";
		} elseif(in_array($code, array(200, 201, 202, 210, 211, 212, 221, 230, 231, 232))) {
			return "01";
		} elseif(in_array($code, array(511, 600, 601, 611, 612, 615, 616, 620, 621, 622, 906))) {
			return "19";
		} elseif(in_array($code, array(701, 711, 721, 731, 741, 751, 761, 771, 781))) {
			return "10";
		} elseif(in_array($code, array(900, 901, 902, 905, 953, 954, 955, 956, 957, 958, 959, 960, 961, 962))) {
			return "12";
		} elseif(in_array($code, array(903, 904))) {
			return "13";
		} else {
			return "na";
		}
	}
	
	function transform($type, $data) {
	   /**
		* @param	string	$type	The type of the transformation, 0 for units, 1 for days
		* @param	string	$data	The data to be consumed
		* @return	string
		*/
		
		if($type == 1) {
			$days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
			return $days[$data];
		} else {
			if($this->units) {
				return round($data, 2).' mp/h';
			} else {
				// Transform m/s to km/s
				return round($data * 3600 / 1000, 2).' km/h';
			}
		}
	}
}
?>