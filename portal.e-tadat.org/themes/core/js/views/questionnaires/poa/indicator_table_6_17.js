$(document).ready(function() {
	function check_value_a(){
		var form = $('#form-submit');
		var checkedValueA = form.find('input[name=dimension_6_17_1_1]:checked').val();
		var arrRadioFields = ['dimension_6_17_1_2','dimension_6_17_1_2_a','dimension_6_17_1_2_a1','dimension_6_17_1_2_b','dimension_6_17_1_3','dimension_6_17_1_3_a','dimension_6_17_1_4'];
		var arrTextFields = ['dimension_6_17_1_2_c','dimension_6_17_1_3_a','dimension_6_17_1_3_b'];		
		var field_disabled;
		var field_enabled;
			if(checkedValueA != null && checkedValueA == 2){
				$('#show_checkedValueA').show();
				$('#show_checkedValueD').show();
				$.each(arrRadioFields,function(index, value) {
					var field_enabled = "input:radio[name='"+value+"']";
					$(field_enabled).prop('disabled', false);					
				});
				$.each(arrTextFields,function(index, value) {
					document.getElementById('id_'+value).className = "form-control required-textarea-reason required-textarea-reason_tiny_mce";
				});				
			}else{
				$('#show_checkedValueA').hide();
				$('#show_checkedValueB').hide();
				$('#show_checkedValueC').hide();								
				$('#show_checkedValueD').hide();
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

	function check_value_b(){
		var form = $('#form-submit');
		var checkedValueB = form.find('input[name=dimension_6_17_1_2]:checked').val();
		var arrRadioFields = ['dimension_6_17_1_2_a','dimension_6_17_1_2_a1','dimension_6_17_1_2_b','dimension_6_17_1_4'];
		var arrTextFields = ['dimension_6_17_1_2_c'];		
		var field_disabled;
		var field_enabled;
			if(checkedValueB != null && checkedValueB == 2){
				$('#show_checkedValueB').show()
				$.each(arrRadioFields,function(index, value) {
					var field_enabled = "input:radio[name='"+value+"']";
					$(field_enabled).prop('disabled', false);					
				});
				$.each(arrTextFields,function(index, value) {
					document.getElementById('id_'+value).className = "form-control required-textarea-reason required-textarea-reason_tiny_mce";
				});				
			}else{
				$('#show_checkedValueB').hide()
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


	function check_value_c(){
		var form = $('#form-submit');
		var checkedValueC = form.find('input[name=dimension_6_17_1_3]:checked').val();
		var arrRadioFields = [];
		var arrTextFields = ['dimension_6_17_1_3_a','dimension_6_17_1_3_b'];				
		var field_disabled;
		var field_enabled;
			if(checkedValueC != null && checkedValueC == 2){
				$('#show_checkedValueC').show()
				$.each(arrRadioFields,function(index, value) {
					var field_enabled = "input:radio[name='"+value+"']";
					$(field_enabled).prop('disabled', false);					
				});
				$.each(arrTextFields,function(index, value) {
					document.getElementById('id_'+value).className = "form-control required-textarea-reason required-textarea-reason_tiny_mce";
				});				
			
			}else{
				$('#show_checkedValueC').hide()
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
	$('.check_value_b').click(function(){
		check_value_b();
	}) 
	$('.check_value_c').click(function(){
		check_value_c();
	}) 
	
	 check_value_a();
	 check_value_b();	
	 check_value_c();		 
	
});