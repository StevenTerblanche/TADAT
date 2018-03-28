$(document).ready(function() {
	$('#id_filing_cit_rate, #id_filing_pit_rate').inputmask("decimal", {suffix: "%", removeMaskOnSubmit:true});	
	// Parses potentially grouped inputs e.g. 123,456.00 to 123456.00 and also checks and returns negative values
	function checkDecimal(stringValue) {
		stringValue = stringValue.trim();
		/*	RegExp explanation:
			# [^ -  Start of negated character class							# ,     The literal character ,								
			# ] -   End of negated character class								# \.    Matches the character . literally
			# 0-9   A single character in the range between 0 and 9				# \d    Match a digit [0-9]
			# g     Modifier: global. All matches (don't return on first match)	# {2}   Quantifier: {2} Exactly 2 times
			# [,\.] Match a single character present in the list below			# $     Assert position at end of the string
		*/
		var result = stringValue.replace(/[^-0-9]/g, '');
		if (/[,\.]\d{2}$/.test(stringValue)) {
			result = result.replace(/(\d{2})$/, '.$1');
		}
		return parseFloat(result);
	}
	
	function calculateTotals(val,field){
		if (val !== '' && !isNaN(val)) {
			var percentage = (parseFloat($('#id_filing_'+field+'_filed').val()) / val) *100;
			$('#id_filing_'+field+'_rate').val(parseFloat(Math.round(percentage * 100) / 100).toFixed(1));
			$('#id_filing_'+field+'_rate').inputmask("decimal", {suffix: "%", min:1, max:100, removeMaskOnSubmit:true});
		}
	}
	
	$('#id_filing_cit_expected').on('change', function(){
		calculateTotals(checkDecimal($(this).val()),'cit');
	});
	$('#id_filing_pit_expected').on('change', function(){
		calculateTotals(checkDecimal($(this).val()),'pit');
	});	
	
});