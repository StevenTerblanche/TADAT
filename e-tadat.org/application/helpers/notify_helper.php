<?php defined('BASEPATH') OR exit('No direct script access allowed');
	# Send SMS via SMS aggregator
	# strMo is the Mobile Originator (Cellphone number) Text is the message being sent
	function _send_sms($strMo = "", $strText = "" ){
		# Confirm mobile number
		if (!is_numeric($strMo) || strlen($strMo) != 10 || !preg_match('/^0/', $strMo))  return false;
		# Enforce text length of the message being sent
		$strCapped = ((strlen($strText) > 160) ? substr($strText,0,160) : $strText);
		# Remove newline characters
		$strMessageText = preg_replace('#[\n]#', '', $strCapped);
		# Push to SMS aggregator as defined in config/core
		$strResponse = file_get_contents(config_item('sms_api_url')."USER=".config_item('sms_api_user')."&SERIAL=".config_item('sms_api_serial')."&SILENT=".config_item('sms_api_silent')."&MT=" . $strMo . "&SMS=" . urlencode($strMessageText));
		# Wait for correct API response
		if ($strResponse && strstr($strResponse, "DELIVERED")) return true;
		# Return false on failure
		return false;
	}

	# Send email using Email Class
	# Please note that all 'from' and 'reply' fields should be set from core/config in the calling function
	function _send_email($from_address = "", $from_name = "", $reply_to_address = "", $reply_to_name = "", $strRecipientAddress = "", $strSubject = "", $strMessage = ""){
		# Load the library instance
		get_instance()->load->library('email');
		# Initializes all the email variables to an empty state
		get_instance()->email->clear();
		# Sets the email address and name of the person sending the email
		get_instance()->email->from($from_address, $from_name);
		# Sets the reply-to address. If the information is not provided the information in the "from" function is used. 
		get_instance()->email->reply_to($reply_to_address, $reply_to_name);
		# Sets the email address(s) of the recipient(s). Can be a single email, a comma-delimited list or an array
		get_instance()->email->to($strRecipientAddress);
		# Sets the email subject
		get_instance()->email->subject($strSubject);
		# Sets the email message body
		get_instance()->email->message($strMessage);
	# Sends the mail. Returns boolean TRUE or FALSE based on success or failure
	return get_instance()->email->send();
	}