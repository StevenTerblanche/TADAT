$(document).ready(function() {
$('#id_filing_pit_percentage_all').prop('tabIndex', -1);
$('#id_filing_pit_percentage_large').prop('tabIndex', -1);

$('#id_filing_pit_percentage_all').inputmask("percentage", {suffix: "%", min:0, max:500, removeMaskOnSubmit:true});


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
			if($('#id_filing_pit_paid_all').val() !== ''){
				var id_filing_pit_paid_all = returnNumber($('#id_filing_pit_paid_all').val());
			}

			if($('#id_filing_pit_due_all').val() !== ''){
				var id_filing_pit_due_all = returnNumber($('#id_filing_pit_due_all').val());
			}

			if(id_filing_pit_paid_all && id_filing_pit_due_all) {
				$('#id_filing_pit_percentage_all').val((id_filing_pit_paid_all / id_filing_pit_due_all * 100).toFixed(1));
				$('#id_filing_pit_percentage_all').inputmask("percentage", {suffix: "%", min:0, max:500, removeMaskOnSubmit:true});
			}else{
				$('#id_filing_pit_percentage_all').val('0');
				$('#id_filing_pit_percentage_all').inputmask("percentage", {suffix: "%", min:0, max:500, removeMaskOnSubmit:true});
			}
		}else{
				$('#id_filing_pit_percentage_all').val('0');
				$('#id_filing_pit_percentage_all').inputmask("percentage", {suffix: "%", min:0, max:500, removeMaskOnSubmit:true});
			}
	}
	
	$('#id_filing_pit_paid_all, #id_filing_pit_due_all').on("change blur", function(){
		calculateTotalsAll($(this).val());
		
	});
});