$(document).ready(function() {
$('#id_filing_cit_percentage_all').prop('tabIndex', -1);
$('#id_filing_cit_percentage_large').prop('tabIndex', -1);

$('#id_filing_cit_percentage_all').inputmask("percentage", {suffix: "%", min:0, max:500, removeMaskOnSubmit:true});
$('#id_filing_cit_percentage_large').inputmask("percentage", {suffix: "%", min:0, max:500, removeMaskOnSubmit:true});

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

	function returnNumber(stringValue) {
		stringValue = stringValue.trim();
		var result = stringValue.replace(/[^-0-9]/g, '');
		return parseFloat(result);
	}
	
	function calculateTotalsAll(val){
		if (val) {
			if($('#id_filing_cit_paid_all').val() !== ''){
				var id_filing_cit_paid_all = returnNumber($('#id_filing_cit_paid_all').val());
			}

			if($('#id_filing_cit_due_all').val() !== ''){
				var id_filing_cit_due_all = returnNumber($('#id_filing_cit_due_all').val());
			}

			if(id_filing_cit_paid_all && id_filing_cit_due_all) {
				$('#id_filing_cit_percentage_all').val((id_filing_cit_paid_all / id_filing_cit_due_all * 100).toFixed(1));
				$('#id_filing_cit_percentage_all').inputmask("percentage", {suffix: "%", min:0, max:500, removeMaskOnSubmit:true});
			}else{
				$('#id_filing_cit_percentage_all').val('0');
				$('#id_filing_cit_percentage_all').inputmask("percentage", {suffix: "%", min:0, max:500, removeMaskOnSubmit:true});
			}
		}else{
				$('#id_filing_cit_percentage_all').val('0');
				$('#id_filing_cit_percentage_all').inputmask("percentage", {suffix: "%", min:0, max:500, removeMaskOnSubmit:true});
			}
	}
	
	$('#id_filing_cit_paid_all, #id_filing_cit_due_all').on("change blur", function(){
		calculateTotalsAll($(this).val());
		
	});

	function calculateTotalsLarge(val){
		if (val) {
			if($('#id_filing_cit_paid_large').val() !== ''){
				var id_filing_cit_paid_large = returnNumber($('#id_filing_cit_paid_large').val());
			}

			if($('#id_filing_cit_due_large').val() !== ''){
				var id_filing_cit_due_large = returnNumber($('#id_filing_cit_due_large').val());
			}

			if(id_filing_cit_paid_large && id_filing_cit_due_large) {
				$('#id_filing_cit_percentage_large').val((id_filing_cit_paid_large / id_filing_cit_due_large * 100).toFixed(1));
				$('#id_filing_cit_percentage_large').inputmask("percentage", {suffix: "%", min:0, max:500, removeMaskOnSubmit:true});
			}else{
				$('#id_filing_cit_percentage_large').val('0');
				$('#id_filing_cit_percentage_large').inputmask("percentage", {suffix: "%", min:0, max:500, removeMaskOnSubmit:true});
			}
		}else{
				$('#id_filing_cit_percentage_large').val('0');
				$('#id_filing_cit_percentage_large').inputmask("percentage", {suffix: "%", min:0, max:500, removeMaskOnSubmit:true});
			}
	}
	
	$('#id_filing_cit_paid_large, #id_filing_cit_due_large').on("change blur", function(){
		calculateTotalsLarge($(this).val());
		
	});
});