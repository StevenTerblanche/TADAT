<?php	// Notify ClassMarker you have received the Webhook.
	http_response_code(200);
	
	// You are given a unique secret code when creating a Webhook.
	define('CLASSMARKER_WEBHOOK_SECRET', 'classmarker_secret_phrase');
	
	// Verification function.
	function verify_classmarker_webhook($json_data, $header_hmac_signature)
	{
	
		$calculated_signature = base64_encode(hash_hmac('sha256', $json_data, CLASSMARKER_WEBHOOK_SECRET, true));
		return ($header_hmac_signature == $calculated_signature);
	
	}
	
	
	// ClassMarker sent signature to check against.
	$header_hmac_signature = $_SERVER['HTTP_X_CLASSMARKER_HMAC_SHA256'];
	
	// ClassMarker JSON payload (The Test Results).
	$json_string_payload = file_get_contents('php://input');
	
	// Call verification function.
	$verified = verify_classmarker_webhook($json_string_payload, $header_hmac_signature);
	
	// Add JSON payload to array for referencing elements.
	$array_payload = json_decode($json_string_payload, true);
	
	if ($verified)
	{
	
		// Save results in your database.
		// Important: Do not use a script that will take a long time to respond.
	
	}

?>

dd