$(document).ready(function() {
/*
	var form = $('#form-submit');
	var checkedValueA = form.find('input[name=dimension_1_1_1_5]:checked').val();
	if(checkedValueA == 1){
		$('#show_checkedValueA').show();
	}else{
		$('#show_checkedValueA').hide();
	}
	
	var checkedValueB = form.find('input[name=dimension_1_1_2_1]:checked').val();
	if(checkedValueB == 2){$('#show_checkedValueB').show()}else{$('#show_checkedValueB').hide()}
	
	var checkedValueC = form.find('input[name=dimension_1_1_2_4]:checked').val();
	if(checkedValueC == 2){
		$('#show_checkedValueC').show();
		$('#show_checkedValueE').show();	
		$('#show_checkedValueF').hide();		
	}else if(checkedValueC == 1){
		$('#show_checkedValueC').hide();
		$('#show_checkedValueE').hide();	
		$('#show_checkedValueF').show();			
	}else{
		$('#show_checkedValueC').hide();
		$('#show_checkedValueE').hide();	
		$('#show_checkedValueF').hide();			
	}
	
	var checkedValueD = form.find('input[name=dimension_1_1_2_4_a]:checked').val();
	if(checkedValueD == 2){$('#show_checkedValueD').show()}else{$('#show_checkedValueD').hide()}

	var checkedValueG = form.find('input[name=dimension_1_1_2_6]:checked').val();
	if(checkedValueG == 2){$('#show_checkedValueG').show()}else{$('#show_checkedValueG').hide()}	
*/
	
	function check_value_a(){
		var form = $('#form-submit');
		var checkedValueA = form.find('input[name=dimension_1_1_1_5]:checked').val();
			if(checkedValueA == 1){
				$('#show_checkedValueA').show()
				$('input[name=dimension_1_1_1_5_a]').prop("disabled", false);				
			}else{
				$('#show_checkedValueA').hide()
				$("input:radio[name='dimension_1_1_1_5_a']").each(function(i) {
					$(this).prop('checked', false);
					$(this).prop('disabled', true);
				});
			}
	} 
	
	function check_value_c(){
		var form = $('#form-submit');
		var checkedValueC = form.find('input[name=dimension_1_1_2_4]:checked').val();
			if(checkedValueC == 2){
				$('#show_checkedValueC').show();
				$('#show_checkedValueE').show();	
				$('#show_checkedValueF').hide();
				$("input:radio[name='dimension_1_1_2_4_a']").each(function(i){
					$(this).prop('disabled', false);
				});
				$("input:radio[name='dimension_1_1_2_4_b']").each(function(i){
					$(this).prop('disabled', false);				
				});
				$("input:radio[name='dimension_1_1_2_4_c']").each(function(i){
					$(this).prop('disabled', false);
				});						
				
			}else{
				$('#show_checkedValueC').hide();
				$('#show_checkedValueE').hide();	
				$('#show_checkedValueF').show();
				$("input:radio[name='dimension_1_1_2_4_a']").each(function(i){
					$(this).prop('checked', false);
					$(this).prop('disabled', true);
				});
				$("input:radio[name='dimension_1_1_2_4_b']").each(function(i){
					$(this).prop('checked', false);
					$(this).prop('disabled', true);				
				});
				$("input:radio[name='dimension_1_1_2_4_c']").each(function(i){
					$(this).prop('checked', false);
					$(this).prop('disabled', true);				
				});						
			}
	} 
	
	function check_value_d(){
		var form = $('#form-submit');
		var checkedValueD = form.find('input[name=dimension_1_1_2_4_a]:checked').val();
			if(checkedValueD == 2){
				$('#show_checkedValueD').show()
				$("input:radio[name='dimension_1_1_2_4_b']").each(function(i){
					$(this).prop('disabled', false);
				});
				$("input:radio[name='dimension_1_1_2_4_c']").each(function(i){
					$(this).prop('disabled', false);
				});						
				
			}else{
				$('#show_checkedValueD').hide()
				$("input:radio[name='dimension_1_1_2_4_b']").each(function(i){
					$(this).prop('checked', false);
					$(this).prop('disabled', true);				
				});
				$("input:radio[name='dimension_1_1_2_4_c']").each(function(i){
					$(this).prop('checked', false);
					$(this).prop('disabled', true);				
				});						
			}
	} 
	
	function check_value_g(){
		var form = $('#form-submit');
		var checkedValueG = form.find('input[name=dimension_1_1_2_6]:checked').val();
			if(checkedValueG == 2){
				$('#show_checkedValueG').show()
				$("input:radio[name='dimension_1_1_2_6_a']").each(function(i){
					$(this).prop('disabled', false);
				});				
			}else{
				$('#show_checkedValueG').hide()
				$("input:radio[name='dimension_1_1_2_6_a']").each(function(i){
					$(this).prop('checked', false);
					$(this).prop('disabled', true);				
				});
			}
	} 

	function check_value_b(){
		var form = $('#form-submit');
		var checkedValueB = form.find('input[name=dimension_1_1_2_1]:checked').val();
			if(checkedValueB == 2){
				$('#show_checkedValueB').show();
				$("input:radio[name='dimension_1_1_2_1_a']").each(function(i){
					$(this).prop('disabled', false);
				});			
			}else{
				$('#show_checkedValueB').hide();
				$("input:radio[name='dimension_1_1_2_1_a']").each(function(i){
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
	$('.check_value_d').click(function(){
		check_value_d();
	}) 
	$('.check_value_g').click(function(){
		check_value_g();
	}) 				
	
		check_value_a();
		check_value_b();
		check_value_c();
		check_value_d();
		check_value_g();
});