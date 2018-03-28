$(document).ready(function() {
$('.pmq-percentage-input-center, .pmq-total-input').prop('tabIndex', -1);
	// Parses potentially grouped inputs e.g. 123,456.00 to 123456.00 and also checks and returns negative values
	function returnNumber(stringValue) {
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
	}


	$('.pmq-percentage-input-center').inputmask("percentage", {suffix: "%",allowMinus:true, min:-1000, max:1000, removeMaskOnSubmit:true});

	$('.calculated, .pmq-total-input, .pmq-number-input').inputmask("numeric", {
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


	function calculateTotals(val, field_name){
		var field_name_clean = field_name.substring(0,field_name.length-1);
		var field_number = field_name.substr(-1);
		
		var field_active = field_name_clean+1;
		var field_inactive = field_name_clean+2;	
		var field_total = field_name_clean+3;	
		var field_percentage = field_name_clean+4;
		
		var field_active_val = $('input[name="'+field_active+'"]').val();
		var field_inactive_val = $('input[name="'+field_inactive+'"]').val();	
		
		var field_sum = returnNumber(field_active_val) + returnNumber(field_inactive_val);

		if(!isNaN(field_sum)){
			$('input[name="'+field_total+'"]').val(field_sum);
			var field_percentage_val = (((returnNumber(field_inactive_val) / field_sum) *100)).toFixed(1);			
		}
		
		if(!isNaN(field_percentage_val)){
			$('input[name="'+field_percentage+'"]').val(field_percentage_val);
		}		
				
		
	}

	$('.calculated').on('change', function(){
		calculateTotals($(this).val(),$(this).attr('name'));
	});


});