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


	// Receives a 'field' name to set with 'column' totals as 'field_type'
	function calculateTotals(val, column){
		var objections_tomu = parseFloat($('#id_objections_tomu_'+column).val());
		var objections_audit = parseFloat($('#id_objections_audit_'+column).val());
		var judicial_appeals = parseFloat($('#id_judicial_appeals_'+column).val());		

		if(typeof(objections_tomu) === 'undefined' || objections_tomu === '' || isNaN(objections_tomu)){objections_tomu = 0;}
		if(typeof(objections_audit) === 'undefined' || objections_audit === '' || isNaN(objections_audit)){objections_audit = 0;}
		if(typeof(judicial_appeals) === 'undefined' || judicial_appeals === '' || isNaN(judicial_appeals)){judicial_appeals = 0;}

		// First get the total of collected and uncollected
		$('#id_unfinalized_cases_'+column).val(parseFloat(objections_tomu + objections_audit + judicial_appeals).toFixed(0));
	}

	$('#id_objections_tomu_0, #id_objections_audit_0, #id_judicial_appeals_0').on('change', function(){
		calculateTotals($(this).val(),0);
	});
	$('#id_objections_tomu_1, #id_objections_audit_1, #id_judicial_appeals_1').on('change', function(){
		calculateTotals($(this).val(),1);
	});
	$('#id_objections_tomu_2, #id_objections_audit_2, #id_judicial_appeals_2').on('change', function(){
		calculateTotals($(this).val(),2);
	});
	$('#id_objections_tomu_3, #id_objections_audit_3, #id_judicial_appeals_3').on('change', function(){
		calculateTotals($(this).val(),3);
	});			
});