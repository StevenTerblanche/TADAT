$(document).ready(function() {
	function check_value_a(){
		var form = $('#form-submit');
		var checkedValueA = form.find('input[name=dimension_9_25_1_1]:checked').val();
		var arrRadioFields = ['dimension_9_25_1_1_a','dimension_9_25_1_1_b','dimension_9_25_1_1_c'];
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
	
	function check_value_b(){
		var form = $('#form-submit');
		var checkedValueB = form.find('input[name=dimension_9_25_1_2]:checked').val();
		var arrRadioFields = [];
		var arrTextFields = ['dimension_9_25_1_2_notes'];		
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




	
		function check_value_c(){
		var form = $('#form-submit');
		var checkedValueC = form.find('input[name=dimension_9_25_1_3]:checked').val();
		var arrRadioFields = ['dimension_9_25_1_3_e', 'dimension_9_25_1_3_b', 'dimension_9_25_1_3_c', 'dimension_9_25_1_3_d', 'dimension_9_25_1_3_a'];
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
					console.log(field_disabled);
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
	
	function check_value_d(){
		var form = $('#form-submit');
		var checkedValueD = form.find('input[name=dimension_9_25_1_4]:checked').val();
		var arrRadioFields = ['dimension_9_25_1_4_b'];
		var arrTextFields = ['dimension_9_25_1_4_a_notes'];		
		var field_disabled;
		var field_enabled;
			if(checkedValueD != null && (checkedValueD == 1 || checkedValueD == 2 || checkedValueD == 3 || checkedValueD == 4)){
				$('#show_checkedValueD').show();
				$.each(arrRadioFields,function(index, value) {
					var field_enabled = "input:radio[name='"+value+"']";
					$(field_enabled).prop('disabled', false);					
				});
				$.each(arrTextFields,function(index, value){
					document.getElementById('id_'+value).className = "form-control required-textarea-reason required-textarea-reason_tiny_mce";
				});				
			}else{
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

	$('.check_value_d').click(function(){
		check_value_d();
	}) 
	
	function check_value_e(){
		var form = $('#form-submit');
		var checkedValueE = form.find('input[name=dimension_9_25_1_6]:checked').val();
		var arrRadioFields = ['dimension_9_25_1_6_a'];
		var arrTextFields = [];		
		var field_disabled;
		var field_enabled;
			if(checkedValueE != null && checkedValueE == 2){
				$('#show_checkedValueE').show();
				$.each(arrRadioFields,function(index, value) {
					var field_enabled = "input:radio[name='"+value+"']";
					$(field_enabled).prop('disabled', false);					
				});
				$.each(arrTextFields,function(index, value){
					document.getElementById('id_'+value).className = "form-control required-textarea-reason required-textarea-reason_tiny_mce";
				});				
			}else{
				$('#show_checkedValueE').hide();
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

	$('.check_value_e').click(function(){
		check_value_e();
	}) 
	
	function check_value_f(){
		var form = $('#form-submit');
		var checkedValueF = form.find('input[name=dimension_9_25_1_7]:checked').val();
		var arrRadioFields = ['dimension_9_25_1_7_b', 'dimension_9_25_1_7_c', 'dimension_9_25_1_7_d', 'dimension_9_25_1_7_e', 'dimension_9_25_1_7_f', 'dimension_9_25_1_7_g', 'dimension_9_25_1_7_h', 'dimension_9_25_1_7_i'];
		var arrTextFields = ['dimension_9_25_1_7_a_notes','dimension_9_25_1_7_b_notes'];		
		var field_disabled;
		var field_enabled;
			if(checkedValueF != null && checkedValueF == 2){
				$('#show_checkedValueF').show();
				$.each(arrRadioFields,function(index, value) {
					var field_enabled = "input:radio[name='"+value+"']";
					$(field_enabled).prop('disabled', false);					
				});
				$.each(arrTextFields,function(index, value){
					document.getElementById('id_'+value).className = "form-control required-textarea-reason required-textarea-reason_tiny_mce";
				});				
			}else{
				$('#show_checkedValueF').hide();
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

	$('.check_value_f').click(function(){
		check_value_f();
	}) 
	
	function check_value_g(){
		var form = $('#form-submit');
		var checkedValueG = form.find('input[name=dimension_9_25_1_8]:checked').val();
		var arrRadioFields = ['dimension_9_25_1_8_a','dimension_9_25_1_8_b','dimension_9_25_1_8_c','dimension_9_25_1_8_d','dimension_9_25_1_8_e'];
		var arrTextFields = [];		
		var field_disabled;
		var field_enabled;
			if(checkedValueG != null && checkedValueG == 2){
				$('#show_checkedValueG').show();
				$.each(arrRadioFields,function(index, value) {
					var field_enabled = "input:radio[name='"+value+"']";
					$(field_enabled).prop('disabled', false);					
				});
				$.each(arrTextFields,function(index, value){
					document.getElementById('id_'+value).className = "form-control required-textarea-reason required-textarea-reason_tiny_mce";
				});				
			}else{
				$('#show_checkedValueG').hide();
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

	$('.check_value_g').click(function(){
		check_value_g();
	}) 
	
	function check_value_h(){
		var form = $('#form-submit');
		var checkedValueH = form.find('input[name=dimension_9_25_2_1]:checked').val();
		var arrRadioFields = ['dimension_9_25_2_1_a','dimension_9_25_2_1_b'];
		var arrTextFields = [];		
		var field_disabled;
		var field_enabled;
			if(checkedValueH != null && checkedValueH == 2){
				$('#show_checkedValueH').show();
				$.each(arrRadioFields,function(index, value) {
					var field_enabled = "input:radio[name='"+value+"']";
					$(field_enabled).prop('disabled', false);					
				});
				$.each(arrTextFields,function(index, value){
					document.getElementById('id_'+value).className = "form-control required-textarea-reason required-textarea-reason_tiny_mce";
				});				
			}else{
				$('#show_checkedValueH').hide();
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

	$('.check_value_h').click(function(){
		check_value_h();
	}) 
	
	function check_value_i(){
		var form = $('#form-submit');
		var checkedValueI = form.find('input[name=dimension_9_25_2_3]:checked').val();
		var arrRadioFields = ['dimension_9_25_2_3_b'];
		var arrTextFields = ['dimension_9_25_2_3_a_notes'];		
		var field_disabled;
		var field_enabled;
			if(checkedValueI != null && (checkedValueI == 1 || checkedValueI == 2 || checkedValueI == 3 || checkedValueI == 4)){
				$('#show_checkedValueI').show();
				$.each(arrRadioFields,function(index, value) {
					var field_enabled = "input:radio[name='"+value+"']";
					$(field_enabled).prop('disabled', false);					
				});
				$.each(arrTextFields,function(index, value){
					document.getElementById('id_'+value).className = "form-control required-textarea-reason required-textarea-reason_tiny_mce";
				});				
			}else{
				$('#show_checkedValueI').hide();
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

	$('.check_value_i').click(function(){
		check_value_i();
	}) 
	
	function check_value_j(){
		var form = $('#form-submit');
		var checkedValueJ = form.find('input[name=dimension_9_25_2_6]:checked').val();
		var arrRadioFields = ['dimension_9_25_2_6_a'];
		var arrTextFields = [];		
		var field_disabled;
		var field_enabled;
			if(checkedValueJ != null && checkedValueJ == 2){
				$('#show_checkedValueJ').show();
				$.each(arrRadioFields,function(index, value) {
					var field_enabled = "input:radio[name='"+value+"']";
					$(field_enabled).prop('disabled', false);					
				});
				$.each(arrTextFields,function(index, value){
					document.getElementById('id_'+value).className = "form-control required-textarea-reason required-textarea-reason_tiny_mce";
				});				
			}else{
				$('#show_checkedValueJ').hide();
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

	$('.check_value_j').click(function(){
		check_value_j();
	}) 
	
	function checkAll(){

		check_value_a();
		check_value_b();
		check_value_c();
		check_value_d();
		check_value_e();
		check_value_f();
		check_value_g();

		check_value_h();
		check_value_i();			
		check_value_j();
	}
	checkAll();
	
 });