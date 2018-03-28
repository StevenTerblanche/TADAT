$(document).ready(function() {
	$('.pmq-decimal-input').inputmask("numeric", {
		autoGroup: true, 
		groupSeparator: ",", 
		groupSize:3, 
		removeMaskOnSubmit:true, 
		allowMinus:true,
		onBeforePaste: function (pastedValue, opts) {
		var processedValue = pastedValue.replace(/[^-0-9-]/g, '');
		return processedValue;
	  }
	});

	$('#id_claims_ratio_number, #id_claims_ratio_value').inputmask("percentage", {suffix: "%", min:0, max:1000, removeMaskOnSubmit:true});

	// Parses potentially grouped inputs e.g. 123,456.00 to 123456.00 and also checks and returns negative values
	function checkNumber(stringValue) {
		if(stringValue && (stringValue != 0 || stringValue !== 0 || stringValue != '0' || stringValue !== '0')){
			stringValue = stringValue.trim();
			/*	RegExp explanation:
				# [^ -  Start of negated character class							# ,     The literal character ,								
				# ] -   End of negated character class								# \.    Matches the character . literally
				# 0-9   A single character in the range between 0 and 9				# \d    Match a digit [0-9]
				# g     Modifier: global. All matches (don't return on first match)	# {2}   Quantifier: {2} Exactly 2 times
				# [,\.] Match a single character present in the list below			# $     Assert position at end of the string
			*/
			var result = stringValue.replace(/[^-0-9-]/g, '');
			if (/[,\.]\d{2}$/.test(stringValue)) {
				result = result.replace(/(\d{2})$/, '.$1');
			}
			return parseFloat(result);
		}else{
			return stringValue;	
		}
	}

	function calculatePercentages(val){
		if(val){
			var id_claims_received_number = checkNumber($('#id_claims_received_number').val()) || 0;
			var id_claims_received_value = checkNumber($('#id_claims_received_value').val()) || 0;

			var id_paid_within_30_number = checkNumber($('#id_paid_within_30_number').val()) || 0;
			var id_paid_within_30_value = checkNumber($('#id_paid_within_30_value').val()) || 0;
			var id_paid_outside_30_number = checkNumber($('#id_paid_outside_30_number').val()) || 0;
			var id_paid_outside_30_value = checkNumber($('#id_paid_outside_30_value').val()) || 0;

			var id_claims_declined_number = checkNumber($('#id_claims_declined_number').val()) || 0;
			var id_claims_declined_value = checkNumber($('#id_claims_declined_value').val()) || 0;

			var id_claims_not_paid_number = checkNumber($('#id_claims_not_paid_number').val()) || 0;
			var id_claims_not_paid_value = checkNumber($('#id_claims_not_paid_value').val()) || 0;
			var id_claims_undecided_number = checkNumber($('#id_claims_undecided_number').val()) || 0;
			var id_claims_undecided_value = checkNumber($('#id_claims_undecided_value').val()) || 0;
			
			var id_claims_unprocessed_number = id_claims_not_paid_number + id_claims_undecided_number || 0;
			var id_claims_unprocessed_value = id_claims_not_paid_value + id_claims_undecided_value || 0;
			$('#id_claims_unprocessed_number').val(id_claims_unprocessed_number);
			$('#id_claims_unprocessed_value').val(id_claims_unprocessed_value);

			var id_refunds_paid_number_total = id_paid_within_30_number + id_paid_outside_30_number || 0;
			var id_refunds_paid_value_total = id_paid_within_30_value + id_paid_outside_30_value || 0;
			$('#id_refunds_paid_number_total').val(id_refunds_paid_number_total);
			$('#id_refunds_paid_value_total').val(id_refunds_paid_value_total);	

			var id_claims_ratio_number = +((id_paid_within_30_number / id_claims_received_number) * 100).toFixed(1);
			
			var id_claims_ratio_value = +((id_paid_within_30_value / id_claims_received_value) * 100).toFixed(1);
			$('#id_claims_ratio_number').val(id_claims_ratio_number);
			$('#id_claims_ratio_value').val(id_claims_ratio_value);	
			$('#id_claims_ratio_number, #id_claims_ratio_value').inputmask("percentage", {suffix: "%", min:0, max:1000, removeMaskOnSubmit:true});






		}
	}

/*
id_claims_received_number
id_claims_received_value
id_paid_within_30_number
id_paid_within_30_value
id_paid_outside_30_number
id_paid_outside_30_value
id_claims_declined_number
id_claims_declined_value
id_claims_unprocessed_number
id_claims_unprocessed_value
id_claims_undecided_number
id_claims_undecided_value

id_refunds_paid_number_total
id_refunds_paid_value_total
id_claims_not_paid_number
id_claims_not_paid_value
id_claims_ratio_number
id_claims_ratio_value

*/

	$('.calculate').on('change blur', function(){
		calculatePercentages($(this).val(),1);
	});

});