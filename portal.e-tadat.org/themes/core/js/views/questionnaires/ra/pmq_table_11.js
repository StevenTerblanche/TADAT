$(document).ready(function() {

	$('#id_ttrc_1, #id_ttrc_2, #id_ttrc_3').inputmask("numeric", {
		autoGroup: true, 
		groupSeparator: ",", 
		groupSize:3, 
		removeMaskOnSubmit:true, 
		allowMinus:true
	});

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


	$('#id_arrears_ratio_a_1, #id_arrears_ratio_a_2, #id_arrears_ratio_a_3, #id_arrears_ratio_b_1, #id_arrears_ratio_b_2, #id_arrears_ratio_b_3, #id_arrears_ratio_c_1, #id_arrears_ratio_c_2, #id_arrears_ratio_c_3').inputmask("percentage", {suffix: "%",allowMinus:true, min:-1000, max:1000, removeMaskOnSubmit:true});




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
		var result = stringValue.replace(/[^-0-9-]/g, '');
		if (/[,\.]\d{2}$/.test(stringValue)) {
			result = result.replace(/(\d{2})$/, '.$1');
		}
		return parseFloat(result);
	
	}

	// Receives a 'field' name to set with 'column' totals as 'field_type'
	function calculatePercentages(val, column){
		if($('#id_ttrc_'+column).val()){
			var ttrc_number = checkDecimal($('#id_ttrc_'+column).val());
			
			if($('#id_arrears_collect_'+column).val()){
				var arrears_collect = +checkDecimal($('#id_arrears_collect_'+column).val());
			}else{
				var arrears_collect = 0;
			}

			if($('#id_arrears_old_'+column).val()){
				var arrears_old = +checkDecimal($('#id_arrears_old_'+column).val());
			}else{
				var arrears_old = 0;
			}
			
			if(!isNaN(arrears_collect) && !isNaN(arrears_old)){				
				var arrears_total = arrears_collect + arrears_old;
				$('#id_arrears_total_'+column).val(arrears_total);
				$('#id_arrears_ratio_a_'+column).val(((arrears_total / ttrc_number)*100).toFixed(1));
				$('#id_arrears_ratio_b_'+column).val((arrears_collect / ttrc_number *100).toFixed(1));
				$('#id_arrears_ratio_c_'+column).val((arrears_old / arrears_total *100).toFixed(1));
			}
		}
	}

	$('#id_arrears_collect_1, #id_arrears_old_1').on('change input', function(){
		calculatePercentages($(this).val(),1);
	});
	$('#id_arrears_collect_2, #id_arrears_old_2').on('change input', function(){
		calculatePercentages($(this).val(),2);
	});
	$('#id_arrears_collect_3, #id_arrears_old_3').on('change input', function(){
		calculatePercentages($(this).val(),3);		
	});

});