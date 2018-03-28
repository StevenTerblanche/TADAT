$(document).ready(function() {

	$('.pmq-percentage-input').inputmask("percentage", {suffix: "%",allowMinus:true, min:-1000, max:1000, removeMaskOnSubmit:true});

	// Parses potentially grouped inputs e.g. 123,456.00 to 123456.00 and also checks and returns negative values
	function returnNumber(stringValue) {
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

	// Takes the pasted input e.g. 123,456,789 and converts to 123456789
	$('.checkPastedValue, .column-a-total, .column-b-total, .column-c-total').inputmask("numeric", {
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

	// ****************  COLUMN A  ***********************
	function calculateTotalTaxRevenueCollectionsColumnA(){
		// Get the input value of GDP
		var field_value_of_gdp = returnNumber($('#id_gdp_a').val());

		// Get the input value of Budgeted Tax Revenue target
		var field_value_of_budgeted = returnNumber($('#id_budget_a').val());

		// Get the value of the different Taxes
		var tax_1_a = +returnNumber($("input[name=a_1_1_1]").val()) || 0;
		var tax_2_a = +returnNumber($("input[name=a_1_1_2]").val()) || 0;
		var tax_3_a = +returnNumber($("input[name=a_1_1_3]").val()) || 0;
		var tax_4_a = +returnNumber($("input[name=a_1_1_4]").val()) || 0;
		var tax_5_a = +returnNumber($("input[name=a_1_1_5]").val()) || 0;
		var tax_6_a = +returnNumber($("input[name=a_1_1_6]").val()) || 0;
		var tax_7_a = +returnNumber($("input[name=a_1_1_7]").val()) || 0;
		var tax_8_a = +returnNumber($("input[name=a_1_1_8]").val()) || 0;
		var tax_9_a = +returnNumber($("input[name=a_1_1_9]").val()) || 0;

		// Calculate the total of the different Taxes
		var calculated_total_tax_revenue_collections = tax_1_a + tax_2_a + tax_3_a + tax_4_a + tax_5_a + tax_6_a + tax_7_a + tax_8_a + tax_9_a;

		// Set the field value of total_tax_revenue_collections
		$('#id_a_total_revenue_collections').val(calculated_total_tax_revenue_collections);

		// Set the variables and values for the different Taxes (percentages)
		var percentage_tax_1_a = +(tax_1_a/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_2_a = +(tax_2_a/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_3_a = +(tax_3_a/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_4_a = +(tax_4_a/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_5_a = +(tax_5_a/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_6_a = +(tax_6_a/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_7_a = +(tax_7_a/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_8_a = +(tax_8_a/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_9_a = +(tax_9_a/calculated_total_tax_revenue_collections * 100).toFixed(1);
		// Calculate the total percentage of the different Taxes
		var calculated_total_tax_revenue_collections_percent = Math.round(percentage_tax_1_a + percentage_tax_2_a + percentage_tax_3_a + percentage_tax_4_a + percentage_tax_5_a + percentage_tax_6_a + percentage_tax_7_a + percentage_tax_8_a + percentage_tax_9_a).toFixed(2);

		// Set the display fields with the calculated percentages
		$("input[name=a_1_2_1]").val(percentage_tax_1_a) || 0;
		$("input[name=a_1_2_2]").val(percentage_tax_2_a) || 0;
		$("input[name=a_1_2_3]").val(percentage_tax_3_a) || 0;
		$("input[name=a_1_2_4]").val(percentage_tax_4_a) || 0;
		$("input[name=a_1_2_5]").val(percentage_tax_5_a) || 0;
		$("input[name=a_1_2_6]").val(percentage_tax_6_a) || 0;
		$("input[name=a_1_2_7]").val(percentage_tax_7_a) || 0;
		$("input[name=a_1_2_8]").val(percentage_tax_8_a) || 0;
		$("input[name=a_1_2_9]").val(percentage_tax_9_a) || 0;

		// Set the field value of total_tax_revenue_collections_percent
		$('#id_a_total_revenue_collections_percentage').val(calculated_total_tax_revenue_collections_percent);

		// Set the variables for the different Taxes (percentages) In Percent of GDP
		var percentage_gdp_1_a = +(tax_1_a/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_2_a = +(tax_2_a/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_3_a = +(tax_3_a/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_4_a = +(tax_4_a/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_5_a = +(tax_5_a/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_6_a = +(tax_6_a/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_7_a = +(tax_7_a/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_8_a = +(tax_8_a/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_9_a = +(tax_9_a/field_value_of_gdp * 100).toFixed(1);

		// Calculate the total percentage of the different Taxes
		var calculated_total_gdp_percent = (percentage_gdp_1_a + percentage_gdp_2_a + percentage_gdp_3_a + percentage_gdp_4_a + percentage_gdp_5_a + percentage_gdp_6_a + percentage_gdp_7_a + percentage_gdp_8_a + percentage_gdp_9_a).toFixed(1);

		// Set the values for the different Taxes (percentages) In Percent of GDP
		$("input[name=a_1_3_1]").val(percentage_gdp_1_a) || 0;
		$("input[name=a_1_3_2]").val(percentage_gdp_2_a) || 0;
		$("input[name=a_1_3_3]").val(percentage_gdp_3_a) || 0;
		$("input[name=a_1_3_4]").val(percentage_gdp_4_a) || 0;
		$("input[name=a_1_3_5]").val(percentage_gdp_5_a) || 0;
		$("input[name=a_1_3_6]").val(percentage_gdp_6_a) || 0;
		$("input[name=a_1_3_7]").val(percentage_gdp_7_a) || 0;
		$("input[name=a_1_3_8]").val(percentage_gdp_8_a) || 0;
		$("input[name=a_1_3_9]").val(percentage_gdp_9_a) || 0;

		// Set the field value of total_gdp_percent
		$('#id_a_total_revenue_collections_percentage_gdp').val(calculated_total_gdp_percent);
	}

	// ****************  COLUMN B  ***********************
	function calculateTotalTaxRevenueCollectionsColumnB(){
		// Get the input value of GDP
		var field_value_of_gdp = returnNumber($('#id_gdp_b').val());

		// Get the input value of Budgeted Tax Revenue target
		var field_value_of_budgeted = returnNumber($('#id_budget_b').val());

		// Get the value of the different Taxes
		var tax_1_b = +returnNumber($("input[name=b_1_1_1]").val()) || 0;
		var tax_2_b = +returnNumber($("input[name=b_1_1_2]").val()) || 0;
		var tax_3_b = +returnNumber($("input[name=b_1_1_3]").val()) || 0;
		var tax_4_b = +returnNumber($("input[name=b_1_1_4]").val()) || 0;
		var tax_5_b = +returnNumber($("input[name=b_1_1_5]").val()) || 0;
		var tax_6_b = +returnNumber($("input[name=b_1_1_6]").val()) || 0;
		var tax_7_b = +returnNumber($("input[name=b_1_1_7]").val()) || 0;
		var tax_8_b = +returnNumber($("input[name=b_1_1_8]").val()) || 0;
		var tax_9_b = +returnNumber($("input[name=b_1_1_9]").val()) || 0;
		
		// Calculate the total of the different Taxes
		var calculated_total_tax_revenue_collections = tax_1_b + tax_2_b + tax_3_b + tax_4_b + tax_5_b + tax_6_b + tax_7_b + tax_8_b + tax_9_b;

		// Set the field value of total_tax_revenue_collections
		$('#id_b_total_revenue_collections').val(calculated_total_tax_revenue_collections);

		// Set the variables and values for the different Taxes (percentages)
		var percentage_tax_1_b = +(tax_1_b/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_2_b = +(tax_2_b/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_3_b = +(tax_3_b/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_4_b = +(tax_4_b/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_5_b = +(tax_5_b/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_6_b = +(tax_6_b/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_7_b = +(tax_7_b/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_8_b = +(tax_8_b/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_9_b = +(tax_9_b/calculated_total_tax_revenue_collections * 100).toFixed(1);

		// Calculate the total percentage of the different Taxes
		var calculated_total_tax_revenue_collections_percent = Math.round(percentage_tax_1_b + percentage_tax_2_b + percentage_tax_3_b + percentage_tax_4_b + percentage_tax_5_b + percentage_tax_6_b + percentage_tax_7_b + percentage_tax_8_b + percentage_tax_9_b).toFixed(2);

		// Set the display fields with the calculated percentages
		$("input[name=b_1_2_1]").val(percentage_tax_1_b) || 0;
		$("input[name=b_1_2_2]").val(percentage_tax_2_b) || 0;
		$("input[name=b_1_2_3]").val(percentage_tax_3_b) || 0;
		$("input[name=b_1_2_4]").val(percentage_tax_4_b) || 0;
		$("input[name=b_1_2_5]").val(percentage_tax_5_b) || 0;
		$("input[name=b_1_2_6]").val(percentage_tax_6_b) || 0;
		$("input[name=b_1_2_7]").val(percentage_tax_7_b) || 0;
		$("input[name=b_1_2_8]").val(percentage_tax_8_b) || 0;
		$("input[name=b_1_2_9]").val(percentage_tax_9_b) || 0;

		// Set the field value of total_tax_revenue_collections_percent
		$('#id_b_total_revenue_collections_percentage').val(calculated_total_tax_revenue_collections_percent);

		// Set the variables for the different Taxes (percentages) In Percent of GDP
		var percentage_gdp_1_b = +(tax_1_b/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_2_b = +(tax_2_b/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_3_b = +(tax_3_b/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_4_b = +(tax_4_b/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_5_b = +(tax_5_b/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_6_b = +(tax_6_b/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_7_b = +(tax_7_b/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_8_b = +(tax_8_b/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_9_b = +(tax_9_b/field_value_of_gdp * 100).toFixed(1);

		// Calculate the total percentage of the different Taxes
		var calculated_total_gdp_percent = (percentage_gdp_1_b + percentage_gdp_2_b + percentage_gdp_3_b + percentage_gdp_4_b + percentage_gdp_5_b + percentage_gdp_6_b + percentage_gdp_7_b + percentage_gdp_8_b + percentage_gdp_9_b).toFixed(1);

		// Set the values for the different Taxes (percentages) In Percent of GDP
		$("input[name=b_1_3_1]").val(percentage_gdp_1_b) || 0;
		$("input[name=b_1_3_2]").val(percentage_gdp_2_b) || 0;
		$("input[name=b_1_3_3]").val(percentage_gdp_3_b) || 0;
		$("input[name=b_1_3_4]").val(percentage_gdp_4_b) || 0;
		$("input[name=b_1_3_5]").val(percentage_gdp_5_b) || 0;
		$("input[name=b_1_3_6]").val(percentage_gdp_6_b) || 0;
		$("input[name=b_1_3_7]").val(percentage_gdp_7_b) || 0;
		$("input[name=b_1_3_8]").val(percentage_gdp_8_b) || 0;
		$("input[name=b_1_3_9]").val(percentage_gdp_9_b) || 0;

		// Set the field value of total_gdp_percent
		$('#id_b_total_revenue_collections_percentage_gdp').val(calculated_total_gdp_percent);
	}	

	// ****************  COLUMN C  ***********************
	function calculateTotalTaxRevenueCollectionsColumnC(){
		// Get the input value of GDP
		var field_value_of_gdp = returnNumber($('#id_gdp_c').val());

		// Get the input value of Budgeted Tax Revenue target
		var field_value_of_budgeted = returnNumber($('#id_budget_c').val());

		// Get the value of the different Taxes
		var tax_1_c = +returnNumber($("input[name=c_1_1_1]").val()) || 0;
		var tax_2_c = +returnNumber($("input[name=c_1_1_2]").val()) || 0;
		var tax_3_c = +returnNumber($("input[name=c_1_1_3]").val()) || 0;
		var tax_4_c = +returnNumber($("input[name=c_1_1_4]").val()) || 0;
		var tax_5_c = +returnNumber($("input[name=c_1_1_5]").val()) || 0;
		var tax_6_c = +returnNumber($("input[name=c_1_1_6]").val()) || 0;
		var tax_7_c = +returnNumber($("input[name=c_1_1_7]").val()) || 0;
		var tax_8_c = +returnNumber($("input[name=c_1_1_8]").val()) || 0;
		var tax_9_c = +returnNumber($("input[name=c_1_1_9]").val()) || 0;
		
		// Calculate the total of the different Taxes
		var calculated_total_tax_revenue_collections = tax_1_c + tax_2_c + tax_3_c + tax_4_c + tax_5_c + tax_6_c + tax_7_c + tax_8_c + tax_9_c;

		// Set the field value of total_tax_revenue_collections
		$('#id_c_total_revenue_collections').val(calculated_total_tax_revenue_collections);

		// Set the variables and values for the different Taxes (percentages)
		var percentage_tax_1_c = +(tax_1_c/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_2_c = +(tax_2_c/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_3_c = +(tax_3_c/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_4_c = +(tax_4_c/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_5_c = +(tax_5_c/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_6_c = +(tax_6_c/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_7_c = +(tax_7_c/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_8_c = +(tax_8_c/calculated_total_tax_revenue_collections * 100).toFixed(1);
		var percentage_tax_9_c = +(tax_9_c/calculated_total_tax_revenue_collections * 100).toFixed(1);

		// Calculate the total percentage of the different Taxes
		var calculated_total_tax_revenue_collections_percent = Math.round(percentage_tax_1_c + percentage_tax_2_c + percentage_tax_3_c + percentage_tax_4_c + percentage_tax_5_c + percentage_tax_6_c + percentage_tax_7_c + percentage_tax_8_c + percentage_tax_9_c).toFixed(2);

		// Set the display fields with the calculated percentages
		$("input[name=c_1_2_1]").val(percentage_tax_1_c) || 0;
		$("input[name=c_1_2_2]").val(percentage_tax_2_c) || 0;
		$("input[name=c_1_2_3]").val(percentage_tax_3_c) || 0;
		$("input[name=c_1_2_4]").val(percentage_tax_4_c) || 0;
		$("input[name=c_1_2_5]").val(percentage_tax_5_c) || 0;
		$("input[name=c_1_2_6]").val(percentage_tax_6_c) || 0;
		$("input[name=c_1_2_7]").val(percentage_tax_7_c) || 0;
		$("input[name=c_1_2_8]").val(percentage_tax_8_c) || 0;
		$("input[name=c_1_2_9]").val(percentage_tax_9_c) || 0;

		// Set the field value of total_tax_revenue_collections_percent
		$('#id_c_total_revenue_collections_percentage').val(calculated_total_tax_revenue_collections_percent);

		// Set the variables for the different Taxes (percentages) In Percent of GDP
		var percentage_gdp_1_c = +(tax_1_c/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_2_c = +(tax_2_c/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_3_c = +(tax_3_c/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_4_c = +(tax_4_c/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_5_c = +(tax_5_c/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_6_c = +(tax_6_c/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_7_c = +(tax_7_c/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_8_c = +(tax_8_c/field_value_of_gdp * 100).toFixed(1);
		var percentage_gdp_9_c = +(tax_9_c/field_value_of_gdp * 100).toFixed(1);

		// Calculate the total percentage of the different Taxes
		var calculated_total_gdp_percent = (percentage_gdp_1_c + percentage_gdp_2_c + percentage_gdp_3_c + percentage_gdp_4_c + percentage_gdp_5_c + percentage_gdp_6_c + percentage_gdp_7_c + percentage_gdp_8_c + percentage_gdp_9_c).toFixed(1);

		// Set the values for the different Taxes (percentages) In Percent of GDP
		$("input[name=c_1_3_1]").val(percentage_gdp_1_c) || 0;
		$("input[name=c_1_3_2]").val(percentage_gdp_2_c) || 0;
		$("input[name=c_1_3_3]").val(percentage_gdp_3_c) || 0;
		$("input[name=c_1_3_4]").val(percentage_gdp_4_c) || 0;
		$("input[name=c_1_3_5]").val(percentage_gdp_5_c) || 0;
		$("input[name=c_1_3_6]").val(percentage_gdp_6_c) || 0;
		$("input[name=c_1_3_7]").val(percentage_gdp_7_c) || 0;
		$("input[name=c_1_3_8]").val(percentage_gdp_8_c) || 0;
		$("input[name=c_1_3_9]").val(percentage_gdp_9_c) || 0;

		// Set the field value of total_gdp_percent
		$('#id_c_total_revenue_collections_percentage_gdp').val(calculated_total_gdp_percent);
	}	
	
	$('.column-input-a, .column-a-gdp, .column-a-budget').on('change blur', function(){
		calculateTotalTaxRevenueCollectionsColumnA();
	});

	$('.column-input-b, .column-b-gdp, .column-b-budget').on('change blur', function(){
		calculateTotalTaxRevenueCollectionsColumnB();
	});	

	$('.column-input-c, .column-c-gdp, .column-c-budget').on('change blur', function(){
		calculateTotalTaxRevenueCollectionsColumnC();
	});	
	
});