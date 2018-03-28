$(document).ready(function() {
	function check_value_a(){
		var form = $('#form-submit');
		var checkedValueA = form.find('input[name=dimension_9_28_1_1]:checked').val();
		var arrRadioFields = ['dimension_9_28_1_2','dimension_9_28_1_3'];
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

	$('.check_value_a').click(function(){
		check_value_a();
	}) 
		check_value_a();


	function check_value_b(){
		var form = $('#form-submit');
		var checkedValueB = form.find('input[name=dimension_9_28_1_2]:checked').val();
		var arrRadioFields = ['dimension_9_28_1_3'];
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

	function check_value_c(){
		var form = $('#form-submit');
		var checkedValueC = form.find('input[name=dimension_9_28_2_1]:checked').val();
		var arrRadioFields = ['dimension_9_28_2_2', 'dimension_9_28_2_3'];
		var arrTextFields = [];		
		var field_disabled;
		var field_enabled;
			if(checkedValueC != null && checkedValueC == 2){
				$('#show_checkedValueC').show();				
				$.each(arrRadioFields,function(index, value) {
					var field_enabled = "input:radio[name='"+value+"']";
					$(field_enabled).prop('disabled', false);					
				});
				$.each(arrTextFields,function(index, value){
					document.getElementById('id_'+value).className = "form-control required-textarea-reason required-textarea-reason_tiny_mce";
				});				
			}else{
				$('#show_checkedValueC').hide();				
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

	$('.check_value_c').click(function(){
		check_value_c();
	}) 
		check_value_c();

		
 });