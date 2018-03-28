$(document).ready(function() {
	$('.pmq-percentage-input').inputmask("decimal", {suffix: "%", removeMaskOnSubmit:true});
	$('.pmq-percentage-input, .notab').prop('tabIndex', -1);
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
		if(stringValue){
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


	function calculateTotals(val, field_number){
		var i = field_number;

		if($('#id_finalized_30_'+i).val()){var field_30 = returnNumber($('#id_finalized_30_'+i).val())}else{var field_30 = 0;}
		if($('#id_finalized_60_'+i).val()){var field_60 = returnNumber($('#id_finalized_60_'+i).val())}else{var field_60 = 0;}
		if($('#id_finalized_90_'+i).val()){var field_90 = returnNumber($('#id_finalized_90_'+i).val())}else{var field_90 = 0;}

		var field_total = parseFloat(field_30)+parseFloat(field_60)+parseFloat(field_90);
		
		var field_30_rate = 0;
		var field_60_rate = 0;
		var field_90_rate = 0;		

		var total_30 = 0;		
		var total_60 = 0;
		var total_90 = 0;

		var finalized_total_all = 0;
		var finalized_total_rate_30 = 0;
		var finalized_total_rate_60 = 0;
		var finalized_total_rate_90 = 0;
				
		if(field_total){
			field_30_rate = parseFloat(field_30 / field_total * 100).toFixed(1);
			field_60_rate = parseFloat(field_60 / field_total * 100).toFixed(1);
			field_90_rate = parseFloat(field_90 / field_total * 100).toFixed(1);
		}

		$('#id_finalized_total_'+i).val(parseFloat(field_total));
		$('#id_finalized_30_rate_'+i).val(parseFloat(field_30_rate).toFixed(1));		
		$('#id_finalized_60_rate_'+i).val(parseFloat(field_60_rate).toFixed(1));				
		$('#id_finalized_90_rate_'+i).val(parseFloat(field_90_rate).toFixed(1));		
		
		for (z = 1; z < 12; z++) {
    		if($('#id_finalized_30_'+z).val()){total_30 += returnNumber($('#id_finalized_30_'+z).val());}
    		if($('#id_finalized_60_'+z).val()){total_60 += returnNumber($('#id_finalized_60_'+z).val());}
    		if($('#id_finalized_90_'+z).val()){total_90 += returnNumber($('#id_finalized_90_'+z).val());}
		}		

		$('#id_finalized_total_30').val(total_30);
		$('#id_finalized_total_60').val(total_60);
		$('#id_finalized_total_90').val(total_90);
		
		finalized_total_all = total_30+total_60+total_90;

		if(finalized_total_all){
			finalized_total_rate_30 = (total_30 / finalized_total_all * 100).toFixed(1);
			finalized_total_rate_60 = (total_60 / finalized_total_all * 100).toFixed(2);
			finalized_total_rate_90 = (total_90 / finalized_total_all * 100).toFixed(1);						
			$('#id_finalized_total_rate_30').val(parseFloat(finalized_total_rate_30));
			$('#id_finalized_total_rate_60').val(parseFloat(finalized_total_rate_60));
			$('#id_finalized_total_rate_90').val(parseFloat(finalized_total_rate_90));
			$('#id_finalized_total_all').val(parseFloat(finalized_total_all));
		}

/*
		$('#id_finalized_30_rate_'+i).inputmask("decimal",{suffix: "%", min:1, max:100, removeMaskOnSubmit:true});
		$('#id_finalized_60_rate_'+i).inputmask("decimal",{suffix: "%", min:1, max:100, removeMaskOnSubmit:true});
		$('#id_finalized_90_rate_'+i).inputmask("decimal",{suffix: "%", min:1, max:100, removeMaskOnSubmit:true});

		$('#id_finalized_total_rate_30').inputmask("decimal",{suffix: "%", min:1, max:100, removeMaskOnSubmit:true});
		$('#id_finalized_total_rate_60').inputmask("decimal",{suffix: "%", min:1, max:100, removeMaskOnSubmit:true});
		$('#id_finalized_total_rate_90').inputmask("decimal",{suffix: "%", min:1, max:100, removeMaskOnSubmit:true});
*/

	}

	$('.month_1').on('change blur', function(){calculateTotals($(this).val(),1);});
	$('.month_2').on('change blur', function(){calculateTotals($(this).val(),2);});
	$('.month_3').on('change blur', function(){calculateTotals($(this).val(),3);});
	$('.month_4').on('change blur', function(){calculateTotals($(this).val(),4);});
	$('.month_5').on('change blur', function(){calculateTotals($(this).val(),5);});
	$('.month_6').on('change blur', function(){calculateTotals($(this).val(),6);});
	$('.month_7').on('change blur', function(){calculateTotals($(this).val(),7);});
	$('.month_8').on('change blur', function(){calculateTotals($(this).val(),8);});
	$('.month_9').on('change blur', function(){calculateTotals($(this).val(),9);});
	$('.month_10').on('change blur', function(){calculateTotals($(this).val(),10);});
	$('.month_11').on('change blur', function(){calculateTotals($(this).val(),11);});
	$('.month_12').on('change blur', function(){calculateTotals($(this).val(),12);});


});