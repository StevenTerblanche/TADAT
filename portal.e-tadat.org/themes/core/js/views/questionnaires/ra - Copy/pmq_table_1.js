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

	// Start the form by disabling all required fields
	$('#budget_a, #budget_b, #budget_c').prop('readonly', 'readonly');
	$('.column-a, .column-b, .column-c').each(function (){$(this).prop('readonly', 'readonly');});

	// Set the inputmask for GDP and Budget
//	$('#gdp_a, #gdp_b, #gdp_c, #budget_a, #budget_b, #budget_c').inputmask("decimal", {radixPoint: ".", autoGroup: true, groupSeparator: ",", groupSize:3, removeMaskOnSubmit:true, allowMinus:false});
	$('#a_total_revenue_collections_percentage, #b_total_revenue_collections_percentage, #c_total_revenue_collections_percentage').inputmask("integer", {suffix: "%", removeMaskOnSubmit:true});
	$('#a_total_revenue_collections_percentage_gdp, #b_total_revenue_collections_percentage_gdp, #c_total_revenue_collections_percentage_gdp').inputmask("decimal", {suffix: "%", removeMaskOnSubmit:true});	
	// Enable the relevant fields as changes are made
	$('#gdp_a').on('keydown', function(){$('#budget_a').prop('readonly', '');});
	$('#gdp_b').on('keydown', function(){$('#budget_b').prop('readonly', '');});
	$('#gdp_c').on('keydown', function(){$('#budget_c').prop('readonly', '');});

	// Enable the columns if the relevant Budget fields is completed
	$('#budget_a').on('keydown', function(){$('.column-a').each(function (){$(this).prop('readonly', '');});});
	$('#budget_b').on('keydown', function(){$('.column-b').each(function (){$(this).prop('readonly', '');});});
	$('#budget_c').on('keydown', function(){$('.column-c').each(function (){$(this).prop('readonly', '');});});

	function calculateTotals(val, column){
		var total_revenue_collections = +(Math.round(0.00)).toFixed(1);
			$('.column-'+column).each(function (){
				// Check that they are numbers and not blank
				if ($(this).val() !== '' && !isNaN($(this).val())) {

					//  This calculates the total revenue collections total
					total_revenue_collections += +(Math.round($(this).val()*100)/100).toFixed(1);
					$('#'+column+'_total_revenue_collections').val(+(Math.round(total_revenue_collections*100)/100).toFixed(1));
					
					// Percentages for GDP Column 
					var gdp_percentage = (parseFloat($(this).val()) / parseFloat($('#gdp_'+column).val())) *100;
					var gdp_field = 'input[name="'+changer("1_3_",$(this).prop('name'))+'"]';
					$(gdp_field).val(parseFloat(Math.round(gdp_percentage * 100) / 100).toFixed(2));
					$(gdp_field).inputmask("decimal", {suffix: "%", removeMaskOnSubmit:true});

				}

			});
	}

	// Receives a 'field' name to set with 'column' totals as 'field_type'
	function calculatePercentages(val, column){
		var trc_total_percentage = +(Math.round(0.00)).toFixed(2);
		var gdp_total_percentage = +(Math.round(0.00)).toFixed(2);		
			$('.column-'+column).each(function (){
				
				// Check that they are numbers and not blank
				if ($(this).val() !== '' && !isNaN($(this).val())) {
					//2. Percentage for Total Revenue Collections Column
					var revenue_percentage = (parseFloat($(this).val()) / parseFloat($('#'+column+'_total_revenue_collections').val())*100);
					var revenue_collections_percentage = 'input[name="'+changer("1_2_",$(this).prop('name'))+'"]';
					$(revenue_collections_percentage).val(parseFloat(Math.round(revenue_percentage * 100) / 100).toFixed(2));
					$(revenue_collections_percentage).inputmask("decimal", {suffix: "%", removeMaskOnSubmit:true});

					// This calculates the total revenue collections percentage
					trc_total_percentage += parseFloat($('input[name="'+changer("1_2_",$(this).prop('name'))+'"]').val());
					$('#'+column+'_total_revenue_collections_percentage').val(parseFloat(Math.round(trc_total_percentage * 100) / 100).toFixed(0));
					$('#'+column+'_total_revenue_collections_percentage').inputmask("decimal", {suffix: "%", removeMaskOnSubmit:true});

					// This calculates the total GDP percentage
					gdp_total_percentage += parseFloat($('input[name="'+changer("1_3_",$(this).prop('name'))+'"]').val());
					$('#'+column+'_total_revenue_collections_percentage_gdp').val(parseFloat(Math.round(gdp_total_percentage * 100) / 100).toFixed(2));
					$('#'+column+'_total_revenue_collections_percentage_gdp').inputmask("decimal", {suffix: "%", removeMaskOnSubmit:true});

				}

			});
	}
	
	$('.column-a').on('change', function(){
		var a_val = makeNumber(checkDecimal($(this).val()));		
		// 1. This calculates the total revenue collections total
		calculateTotals(a_val,'a');
		calculatePercentages('','a');
	});
	$('#a_end').on('change', function(){
//		calculatePercentages('','a');
	});
	
	$('.column-b').on('change', function(){
		var a_val = makeNumber(checkDecimal($(this).val()));		
		// 1. This calculates the total revenue collections total
		calculateTotals(a_val,'b');
		calculatePercentages('','b');
	});
	$('#b_end').on('change', function(){
	//	calculatePercentages('','b');
	});
	$('.column-c').on('change', function(){
		var a_val = makeNumber(checkDecimal($(this).val()));		
		// 1. This calculates the total revenue collections total
		calculateTotals(a_val,'c');
		calculatePercentages('','c');	
	});
	$('#c_end').on('change', function(){
	//	calculatePercentages('','c');
	});	
	
});