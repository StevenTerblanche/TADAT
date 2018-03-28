$(document).ready(function() {
	function check_value_a(){
		var form = $('#form-submit');

		var checkedValueA = form.find('input[name=dimension_6_16_1_1]:checked').val();
		var arrFields = ['dimension_6_16_1_2_a','dimension_6_16_1_2_b','dimension_6_16_1_2_c','dimension_6_16_1_2_d','dimension_6_16_1_3_a','dimension_6_16_1_3_b','dimension_6_16_1_3_c','dimension_6_16_1_3_d','dimension_6_16_1_4','dimension_6_16_1_5','dimension_6_16_1_6'];		
		var field_disabled;
		var field_enabled;
		
			if(checkedValueA != null && checkedValueA == 2){
				$('#show_checkedValueA').show()
				$.each(arrFields,function(index, value) {
					var field_enabled = "input:radio[name='"+value+"']";
					$(field_enabled).prop('disabled', false);					
				});
			}else{
				$('#show_checkedValueA').hide()
				$.each(arrFields,function(index, value) {
					var field_disabled = "input:radio[name='"+value+"']";
					$(field_disabled).prop('checked', false);
					$(field_disabled).prop('disabled', true);
				});
			}
	} 

	function check_value_b(){
		var form = $('#form-submit');

		var checkedValueA = form.find('input[name=dimension_6_16_2_1]:checked').val();
		var arrFields = ['dimension_6_16_2_2_a','dimension_6_16_2_2_b','dimension_6_16_2_2_c','dimension_6_16_2_2_d','dimension_6_16_2_2_e','dimension_6_16_2_2_f','dimension_6_16_2_2_g'];		
		var field_disabled;
		var field_enabled;
		
			if(checkedValueA != null && checkedValueA == 2){
				$('#show_checkedValueB').show()
				$.each(arrFields,function(index, value) {
					var field_enabled = "input:radio[name='"+value+"']";
					$(field_enabled).prop('disabled', false);					
				});
			}else{
				$('#show_checkedValueB').hide()				
				$.each(arrFields,function(index, value) {
					var field_disabled = "input:radio[name='"+value+"']";
					$(field_disabled).prop('checked', false);
					$(field_disabled).prop('disabled', true);
				});
			}
	} 
	$('.check_value_b').click(function(){
		check_value_b();
	}) 

	$('.check_value_a').click(function(){
		check_value_a();
	}) 
	
	check_value_a();
	check_value_b();

});