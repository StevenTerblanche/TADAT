$(document).ready(function() {
	function check_value_a(){
		var form = $('#form-submit');
		var checkedValueA = form.find('input[name=dimension_5_13_1_2_a]:checked').val();
		var checkedValueB = form.find('input[name=dimension_5_13_1_2_b]:checked').val();		
			if(checkedValueA == 2 || checkedValueB == 2){
				$('#show_checkedValueA').show()
			}else{
				$('#show_checkedValueA').hide()
			}
	} 
	$('.check_value_a').click(function(){
		check_value_a();
	}) 
	
	check_value_a();
	
});