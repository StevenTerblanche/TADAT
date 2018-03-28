$(document).ready(function() {
	function check_value_a(){
		var form = $('#form-submit');
		var checkedValueA = form.find('input[name=dimension_6_18_1_1]:checked').val();
		var arrRadioFields = ['dimension_6_18_1_1_a','dimension_6_18_1_1_b','dimension_6_18_1_1_c','dimension_6_18_1_1_d','dimension_6_18_1_1_e',
								'dimension_6_18_1_2_a',
								'dimension_6_18_1_2_b',
								'dimension_6_18_1_2_c',
								'dimension_6_18_1_2_d',
								'dimension_6_18_1_3_a',
								'dimension_6_18_1_4_a',
								'dimension_6_18_1_4_b',
								'dimension_6_18_1_5_a'];
		var arrTextFields = [];		
		var field_disabled;
		var field_enabled;
			if(checkedValueA != null && checkedValueA == 2){
				$('#show_checkedValueA').show();
				$.each(arrRadioFields,function(index, value) {
					var field_enabled = "input:radio[name='"+value+"']";
					$(field_enabled).prop('disabled', false);					
				});
				$.each(arrTextFields,function(index, value){
					document.getElementById('id_'+value).className = "form-control required-textarea-reason required-textarea-reason_tiny_mce";
				});				
			}else{
				$('#show_checkedValueA').hide();
				$.each(arrRadioFields,function(index, value) {
					var field_disabled = "input:radio[name='"+value+"']";
					$(field_disabled).prop('checked', false);
					$(field_disabled).prop('disabled', true);
				});
				$.each(arrTextFields,function(index, value) {
					document.getElementById('id_'+value).className = "form-control required-textarea-reason_tiny_mce";
				});				
			}
	} 


	$('.check_value_a').click(function(){
		check_value_a();
	}) 
	
	 check_value_a();
});