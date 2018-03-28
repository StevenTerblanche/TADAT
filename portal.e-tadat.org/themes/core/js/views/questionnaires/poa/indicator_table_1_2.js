$(document).ready(function() {
	var form = $('#form-submit');
	
	var checkedValueA = form.find('input[name=dimension_1_2_1_1]:checked').val();
	if(checkedValueA == 2){$('#show_checkedValueA').show()}else{$('#show_checkedValueA').hide()}
	
	$('.check_value_a').click(function(){
		var form = $('#form-submit');
		var checkedValueA = form.find('input[name=dimension_1_2_1_1]:checked').val();
			if(checkedValueA == 2){
				$('#show_checkedValueA').show();
				$("input:radio[name='dimension_1_2_1_1_a']").each(function(i){
					$(this).prop('disabled', false);					
				});
				$("input:radio[name='dimension_1_2_1_1_b']").each(function(i){
					$(this).prop('disabled', false);										
				});
				$("input:radio[name='dimension_1_2_1_1_c']").each(function(i){
					$(this).prop('disabled', false);
				});								
				
			}else{
				$('#show_checkedValueA').hide();
				$("input:radio[name='dimension_1_2_1_1_a']").each(function(i){
					$(this).prop('checked', false);
					$(this).prop('disabled', true);					
				});
				$("input:radio[name='dimension_1_2_1_1_b']").each(function(i){
					$(this).prop('checked', false);
					$(this).prop('disabled', true);										
				});
				$("input:radio[name='dimension_1_2_1_1_c']").each(function(i){
					$(this).prop('checked', false);
					$(this).prop('disabled', true);										
				});								
			}
	}) 
});