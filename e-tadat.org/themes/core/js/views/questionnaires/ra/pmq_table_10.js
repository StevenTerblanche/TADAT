$(document).ready(function() {
	$('.pmq-percentage-input').inputmask("percentage", {suffix: "%", removeMaskOnSubmit:true});	
	$('.pmq-percentage-input').prop('tabIndex', -1);
	
	// Parses potentially grouped inputs e.g. 123,456.00 to 123456.00 and also checks and returns negative values
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
	
	function calculateTotals(val,field){
		var vat_paid_value = $('#id_filing_vat_paid_value').val();
		var vat_due_value = $('#id_filing_vat_due_value').val();
		var vat_value_percentage = 0;		
		if (val){
			if(field ==='number'){
				val = returnNumber(val);
				var vat_paid_number = returnNumber($('#id_filing_vat_paid_number').val());
				var vat_due_number = returnNumber($('#id_filing_vat_due_number').val());
				$('#id_filing_vat_payment_number').val((vat_paid_number / vat_due_number * 100).toFixed(1));			
			}
			if(field ==='value'){
				val = returnNumber(val);
				var vat_paid_value = returnNumber($('#id_filing_vat_paid_value').val());
				var vat_due_value = returnNumber($('#id_filing_vat_due_value').val());
				$('#id_filing_vat_payment_value').val((vat_paid_value / vat_due_value * 100).toFixed(1));			
			}
		}
	}
	
	$('#id_filing_vat_due_number').on('change', function(){
		calculateTotals($(this).val(),'number');	
	});
	$('#id_filing_vat_due_value').on('change', function(){
		calculateTotals($(this).val(),'value');
	});	
	
	
});