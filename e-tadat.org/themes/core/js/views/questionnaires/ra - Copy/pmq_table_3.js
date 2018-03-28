$(document).ready(function() {
	$('.pmq-percentage-input').inputmask("decimal", {suffix: "%", removeMaskOnSubmit:true});	
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
		var filing_vat_filed_total = Number(0);
		var filing_vat_expected_total = Number(0);
		var filing_vat_rate_total = Number(0);
		$('.calculate').each(function (i){
				i = (i++)+1;
				var field_filed = 'input[name="filing_vat_filed_'+i+'"]';
				var field_expected = 'input[name="filing_vat_expected_'+i+'"]';
				var field_percentage = 'input[name="filing_vat_rate_'+i+'"]';
			if (val !== '' && !isNaN(val)) {
				if(!isNaN(checkDecimal($('input[name="filing_vat_filed_'+i+'"]').val()))){
					filing_vat_filed_total += +checkDecimal($('input[name="filing_vat_filed_'+i+'"]').val());
					$('#id_filing_vat_filed_total').val(filing_vat_filed_total);					
				}

				if(!isNaN(checkDecimal($('input[name="filing_vat_expected_'+i+'"]').val()))){
					filing_vat_expected_total += +checkDecimal($('input[name="filing_vat_expected_'+i+'"]').val());
					$('#id_filing_vat_expected_total').val(filing_vat_expected_total );					
				}
				
				if(!isNaN($('#id_filing_vat_expected_total').val()) && !isNaN($('#id_filing_vat_filed_total').val())){					
					filing_vat_rate_total = parseFloat(parseFloat($('#id_filing_vat_filed_total').val()) / parseFloat($('#id_filing_vat_expected_total').val()) * 100).toFixed(2);
					$('#id_filing_vat_rate_total').val(filing_vat_rate_total);
					$('#id_filing_vat_rate_total').inputmask("decimal", {suffix: "%", min:1, max:100, removeMaskOnSubmit:true});
				}				
				
				if(field === 'filing_vat_expected_'+i){
					var percentage = (parseFloat($(field_filed).val()) / val) *100;				
					$(field_percentage).val(parseFloat(Math.round(percentage * 100) / 100).toFixed(1));
					$(field_percentage).inputmask("decimal", {suffix: "%", min:1, max:100, removeMaskOnSubmit:true});
				}
			}else{
				if(field === 'filing_vat_expected_'+i){
					$(field_percentage).val();
				}
			}
		});
	}
	
	$('.calculate').on('change blur', function(){
		calculateTotals(checkDecimal($(this).val()),$(this).prop('name'));
	});
});