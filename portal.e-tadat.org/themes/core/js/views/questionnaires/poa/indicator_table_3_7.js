$(document).ready(function() {
	function check_value_a(){
		var form = $('#form-submit');
		var checkedValueA = form.find('input[name=dimension_3_7_4_1]:checked').val();
			if(checkedValueA == 2){
				$('#show_checkedValueA').show()
				$('input[name=dimension_3_7_4_1_a]').prop("disabled", false);				
			}else{
				$('#show_checkedValueA').hide()
				$("input:radio[name='dimension_3_7_4_1_a']").each(function(i) {
					$(this).prop('checked', false);
					$(this).prop('disabled', true);
				});
			}
	} 



	$('.check_value_a').click(function(){
		check_value_a();
	}) 

	
		check_value_a();

});