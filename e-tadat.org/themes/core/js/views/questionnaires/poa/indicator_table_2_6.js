$(document).ready(function() {
	function check_value_a(){
		var form = $('#form-submit');
		var checkedValueA = form.find('input[name=dimension_2_6_1_1]:checked').val();
			if(checkedValueA == 2){
				$('#show_checkedValueA').show()
				$('input[name=dimension_2_6_1_1_a]').prop("disabled", false);				
				$('input[name=dimension_2_6_1_1_b]').prop("disabled", false);
				$('input[name=dimension_2_6_1_1_c]').prop("disabled", false);				
			}else{
				$('#show_checkedValueA').hide()
				$("input:radio[name='dimension_2_6_1_1_a']").each(function(i) {
					$(this).prop('checked', false);
					$(this).prop('disabled', true);
				});
				$("input:radio[name='dimension_2_6_1_1_b']").each(function(i) {
					$(this).prop('checked', false);
					$(this).prop('disabled', true);
				});
				$("input:radio[name='dimension_2_6_1_1_c']").each(function(i) {
					$(this).prop('checked', false);
					$(this).prop('disabled', true);
				});				
								
			}
	} 

	function check_value_b(){
		var form = $('#form-submit');
		var checkedValueB = form.find('input[name=dimension_2_6_1_3]:checked').val();
			if(checkedValueB == 2){
				$('#show_checkedValueB').show();
				$("input:radio[name='dimension_2_6_1_3_a']").each(function(i){
					$(this).prop('disabled', false);
				});			
			}else{
				$('#show_checkedValueB').hide();
				$("input:radio[name='dimension_2_6_1_3_a']").each(function(i){
					$(this).prop('checked', false);
					$(this).prop('disabled', true);	
				});
			}
	}

	function check_value_c(){
		var form = $('#form-submit');
		var checkedValueC = form.find('input[name=dimension_2_6_1_6]:checked').val();
			if(checkedValueC == 2){
				$('#show_checkedValueC').show();
				$("input:radio[name='dimension_2_6_1_6_a']").each(function(i){
					$(this).prop('disabled', false);
				});
				$("input:radio[name='dimension_2_6_1_6_b']").each(function(i){
					$(this).prop('disabled', false);				
				});
			}else{
				$('#show_checkedValueC').hide();
				$("input:radio[name='dimension_2_6_1_6_a']").each(function(i){
					$(this).prop('checked', false);
					$(this).prop('disabled', true);
				});
				$("input:radio[name='dimension_2_6_1_6_b']").each(function(i){
					$(this).prop('checked', false);
					$(this).prop('disabled', true);				
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