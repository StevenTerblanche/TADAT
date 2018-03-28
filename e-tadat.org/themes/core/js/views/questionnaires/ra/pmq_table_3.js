$(document).ready(function() {
	$('.pmq-percentage-input').prop('tabIndex', -1);
	$('.pmq-percentage-input').inputmask("decimal", {suffix: "%", removeMaskOnSubmit:true});	
	
	$('.pmq-number-input').inputmask("numeric", {
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
	
	
	
	// Parses potentially grouped inputs e.g. 123,456.00 to 123456.00 and also checks and returns negative values
	function returnNumber(stringValue) {
//		alert('String Value is: '+stringValue);
		if(stringValue){
//			alert('IS STRINGVALUE - value is: '+stringValue);
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
			return false;	
		}			
	}
	
	function calculateTotals(val,field){
		var calls_received_total = Number(0);
		var calls_received_within_total = Number(0);
		var call_received_rate_total = Number(0);
		var input_value = returnNumber(val) || 0;
		$('.pmq-number-input').each(function (i){
			if (input_value !== '' && !isNaN(input_value)){
				i = (i++)+1;
				var field_filed = 'input[name="calls_received_'+i+'"]';
				var field_expected = 'input[name="calls_received_within_'+i+'"]';
				var field_percentage = 'input[name="call_received_rate_'+i+'"]';

				if(!isNaN(returnNumber($('input[name="calls_received_'+i+'"]').val()))){
					calls_received_total += +returnNumber($('input[name="calls_received_'+i+'"]').val());
					$('#id_calls_received_total').val(calls_received_total);
				}
				if(!isNaN(returnNumber($('input[name="calls_received_within_'+i+'"]').val()))){
					calls_received_within_total += +returnNumber($('input[name="calls_received_within_'+i+'"]').val());
					$('#id_calls_received_within_total').val(calls_received_within_total );					
				}
				if(!isNaN(returnNumber($('#id_calls_received_within_total').val())) && !isNaN(returnNumber($('#id_calls_received_total').val()))){					
					call_received_rate_total = (returnNumber($('#id_calls_received_within_total').val()) / returnNumber($('#id_calls_received_total').val()) * 100).toFixed(1);	
					$('#id_call_received_rate_total').val(call_received_rate_total);
					$('#id_call_received_rate_total').inputmask("decimal", {suffix: "%", min:1, max:100, removeMaskOnSubmit:true});
				}				




					if(!isNaN(returnNumber($(field_filed).val())) && !isNaN(returnNumber($(field_expected).val()))){
						var percentage = (returnNumber($(field_expected).val()) / returnNumber($(field_filed).val()) *100).toFixed(1);
						$(field_percentage).val(percentage);

					}
					


			}

		});
	}
	
	$('.pmq-number-input').on('change', function(){
		calculateTotals($(this).val(),$(this).prop('name'));		
	});
});