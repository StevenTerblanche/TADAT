$(document).ready(function() {
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

	// Returns integer as 'decimal' float
	function makeDecimal(input){
		return parseFloat(Math.round(input * 100) / 100).toFixed(2);
	}
	
	function makeDecimalOne(input){
		return parseFloat(Math.round(input * 100) / 100).toFixed(1);
	}

	// Returns integer as 'decimal' float
	function makeNumber(input){
		return Math.round(input * 100) / 100;
	}
	
	// Returns integer as 'decimal' float
	function makePercentage(input){
		return parseFloat(Math.round(input * 100) / 100).toFixed(0);
	}	

	// Function to set the target field names
	function changer(num, str) {
		return str.replace("1_1_", num);
	}


$('.pmq-percentage-input').inputmask("decimal", {digits: 1,suffix: "%", min:1, max:100, removeMaskOnSubmit:true});

	// Receives a 'field' name to set with 'column' totals as 'field_type'
	function calculatePercentages(val, column){
		var ttrc_number = parseFloat($('#id_ttrc_'+column).val());
		var percentage = +(Math.round(0.00)).toFixed(2);
		var arrears_collect = parseFloat($('#id_arrears_collect_'+column).val());
		var arrears_uncollect = parseFloat($('#id_arrears_uncollectable_'+column).val());

		if(typeof(arrears_uncollect) === 'undefined' || arrears_uncollect === '' || isNaN(arrears_uncollect)){arrears_uncollect = 0;}
		if(typeof(arrears_collect) === 'undefined' || arrears_collect === '' || isNaN(arrears_collect)){arrears_collect = 0;}

		// First get the total of collected and uncollected
		$('#id_arrears_total_'+column).val(parseFloat(arrears_uncollect + arrears_collect).toFixed(1));
		
		// Calculate the percentage of Ratio A
		if (arrears_collect !== '' && !isNaN(arrears_collect) || arrears_uncollect !== '' && !isNaN(arrears_uncollect)){
			percentage = (parseFloat($('#id_arrears_total_'+column).val()) / parseFloat(ttrc_number))*100;			
			$('#id_arrears_ratio_a_'+column).val(parseFloat(percentage).toFixed(1));
			$('#id_arrears_ratio_a_'+column).inputmask("decimal", {digits: 1, suffix: "%", removeMaskOnSubmit:true});
		}
		
		if (arrears_collect !== '' && !isNaN(arrears_collect)){
			$('#id_arrears_ratio_b_'+column).val(parseFloat((arrears_collect / ttrc_number *100)));			
			$('#id_arrears_ratio_b_'+column).inputmask("decimal", {digits: 1, suffix: "%", removeMaskOnSubmit:true});
		}
		var arrears_total = $('#id_arrears_total_'+column).val();
		var older_total = $('#id_arrears_old_'+column).val();
		if ((arrears_total !== '' || !isNaN(arrears_total)) && (older_total !== '' || !isNaN(older_total))){
			$('#id_arrears_ratio_c_'+column).val(Math.floor((older_total / arrears_total *100)*10)/10);			
			$('#id_arrears_ratio_c_'+column).inputmask("decimal", {digits: 1, suffix: "%", removeMaskOnSubmit:true});
		}



		
	}

	$('#id_arrears_collect_1, #id_arrears_uncollectable_1, #id_arrears_old_1').on('change', function(){
		calculatePercentages($(this).val(),1);
	});
	$('#id_arrears_collect_2, #id_arrears_uncollectable_2, #id_arrears_old_2').on('change', function(){
		calculatePercentages($(this).val(),2);
	});
	$('#id_arrears_collect_3, #id_arrears_uncollectable_3, #id_arrears_old_3').on('change', function(){
		calculatePercentages($(this).val(),3);		
	});

});