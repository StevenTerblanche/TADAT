$(document).ready(function() {
	$("#message_container").hide();
	$("#submit_status_button").hide();
	$('#UserStatus').change(function(){
		if($('#UserStatus').val() !== ''){
			$("#message_container").show();
			$("#submit_status_button").show();		
			$("#back_to_applicant_listing").hide();
		}else{
			$("#message_container").hide();
			$("#submit_status_button").hide();		
			$("#back_to_applicant_listing").show();
		}
	});

   		$("#dob").datepicker({startView: 2, format: 'd MM, yyyy',autoclose: true, todayHighlight: false, endDate: '-18y'});
   		$("#current_start_date").datepicker({minViewMode: 1, maxViewMode: 2, startView: 2,format: 'MM, yyyy',autoclose: true, todayHighlight: true, endDate: '-2y'});		
   		$("#previous_start_date").datepicker({minViewMode: 1, maxViewMode: 2, startView: 2,format: 'MM, yyyy',autoclose: true, todayHighlight: true, endDate: '-2y'});		
   		$("#previous_end_date").datepicker({minViewMode: 1, maxViewMode: 2, startView: 2, format: 'MM, yyyy',autoclose: true, todayHighlight: true, endDate: '-2y'});						
   		$("#academic_start_date_1").datepicker({minViewMode: 2, maxViewMode: 2, startView: 2,format: 'yyyy',autoclose: true, todayHighlight: true, endDate: '-5y'});		
   		$("#academic_end_date_1").datepicker({minViewMode: 2, maxViewMode: 2, startView: 2,format: 'yyyy',autoclose: true, todayHighlight: true, endDate: '-2y'});						
   		$("#academic_start_date_2").datepicker({minViewMode: 2, maxViewMode: 2, startView: 2,format: 'yyyy',autoclose: true, todayHighlight: true, endDate: '-2y'});		
   		$("#academic_end_date_2").datepicker({minViewMode: 2, maxViewMode: 2, startView: 2,format: 'yyyy',autoclose: true, todayHighlight: true, endDate: '-2y'});								

	
});