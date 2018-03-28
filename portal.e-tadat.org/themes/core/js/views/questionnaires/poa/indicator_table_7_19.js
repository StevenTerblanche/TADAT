$(document).ready(function() {
	function check_value_a(){
		var form = $('#form-submit');
		var checkedValueA = form.find('input[name=dimension_7_19_1_1_a]:checked').val();
		var arrRadioFields = ['dimension_7_19_1_1_b'];
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
	 
	function check_value_b(){
		var form = $('#form-submit');
		var checkedValueB = form.find('input[name=dimension_7_19_3_2]:checked').val();
		var arrRadioFields = ['dimension_7_19_3_2_a','dimension_7_19_3_2_b','dimension_7_19_3_2_c'];
		var arrTextFields = [];		
		var field_disabled;
		var field_enabled;
			if(checkedValueB != null && checkedValueB == 2){
				$('#show_checkedValueB').show();
				$.each(arrRadioFields,function(index, value) {
					var field_enabled = "input:radio[name='"+value+"']";
					$(field_enabled).prop('disabled', false);					
				});
				$.each(arrTextFields,function(index, value){
					document.getElementById('id_'+value).className = "form-control required-textarea-reason required-textarea-reason_tiny_mce";
				});				
			}else{
				$('#show_checkedValueB').hide();
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


	$('.check_value_b').click(function(){
		check_value_b();
	}) 
	
	 check_value_b();
	 
	 
});