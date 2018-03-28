$(document).ready(function() {

$("input[name=filing_vat_rate_1]").prop('tabIndex', -1);
$("input[name=filing_vat_rate_2]").prop('tabIndex', -1);
$("input[name=filing_vat_rate_3]").prop('tabIndex', -1);
$("input[name=filing_vat_rate_4]").prop('tabIndex', -1);
$("input[name=filing_vat_rate_5]").prop('tabIndex', -1);
$("input[name=filing_vat_rate_6]").prop('tabIndex', -1);
$("input[name=filing_vat_rate_7]").prop('tabIndex', -1);
$("input[name=filing_vat_rate_8]").prop('tabIndex', -1);
$("input[name=filing_vat_rate_9]").prop('tabIndex', -1);
$("input[name=filing_vat_rate_10]").prop('tabIndex', -1);
$("input[name=filing_vat_rate_11]").prop('tabIndex', -1);
$("input[name=filing_vat_rate_12]").prop('tabIndex', -1);

$('.pmq-percentage-input').inputmask("percentage", {suffix: "%", min:0, max:1000, removeMaskOnSubmit:true});


	// Parses potentially grouped inputs e.g. 123,456.00 to 123456.00 and also checks and returns negative values
	function returnNumber(stringValue) {
		if(stringValue){
			var result = stringValue.replace(/[^-0-9]/g, '');
			return parseFloat(result);
		}
	}


	$('.pmq-number-input').inputmask("numeric", {
		autoGroup: true, 
		groupSeparator: ",", 
		groupSize:3, 
		removeMaskOnSubmit:true, 
		allowMinus:true,
		onBeforePaste: function (pastedValue) {
		var processedValue = pastedValue.replace(/[^-0-9]/g, '');
		return processedValue;
	  }
	});	

	function calculateTotals(val,field){
		var filing_vat_filed_total = Number(0);
		var filing_vat_expected_total = Number(0);
		var filing_vat_rate_total = Number(0);
		$('.calculate').each(function (i){
				i = (i++)+1;
				var field_filed = 'input[name="filing_vat_filed_'+i+'"]';
				var field_expected = 'input[name="filing_vat_expected_'+i+'"]';
				var field_percentage = 'input[name="filing_vat_rate_'+i+'"]';

			// This calculates the running Total
			if (val !== '' && !isNaN(val)) {
				if($('input[name="filing_vat_filed_'+i+'"]').val()){
					filing_vat_filed_total += returnNumber($('input[name="filing_vat_filed_'+i+'"]').val());
					$('#id_filing_vat_filed_total').val(filing_vat_filed_total);					
				}

				if($('input[name="filing_vat_expected_'+i+'"]').val()){
					filing_vat_expected_total += returnNumber($('input[name="filing_vat_expected_'+i+'"]').val());
					$('#id_filing_vat_expected_total').val(filing_vat_expected_total );					
				}

				// This is the PERCENTAGE on the final Column
				if($('#id_filing_vat_expected_total').val() && $('#id_filing_vat_filed_total').val()){					
					filing_vat_rate_total = (returnNumber($('#id_filing_vat_filed_total').val()) / returnNumber($('#id_filing_vat_expected_total').val()) * 100).toFixed(1);
					$('#id_filing_vat_rate_total').val(filing_vat_rate_total);
					$('#id_filing_vat_rate_total').inputmask("percentage", {suffix: "%", min:1, max:1000, removeMaskOnSubmit:true});
				}				

				if(field === 'filing_vat_expected_'+i){
					var percentage = returnNumber($(field_filed).val()) / val *100;
					$(field_percentage).val((percentage * 100 / 100).toFixed(1));
					$(field_percentage).inputmask("percentage", {suffix: "%", min:0, max:1000, removeMaskOnSubmit:true});
				}


			}else{
				if(field === 'filing_vat_expected_'+i){
					$(field_percentage).val();
				}
			}
		});
	}
	
	$('.calculate').on('change', function(){
		calculateTotals(returnNumber($(this).val()),$(this).prop('name'));
	});
});