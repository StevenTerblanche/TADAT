$(document).ready(function() {
	function check_value_a(){
		var form = $('#form-submit');
		var checkedValueA = form.find('input[name=dimension_3_8_1_3]:checked').val();
		if(checkedValueA == 2){
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