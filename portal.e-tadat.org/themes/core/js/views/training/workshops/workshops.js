$(document).ready(function() {

	$('#WorkshopStartTime-ID, #WorkshopEndTime-ID').datetimepicker({
		format: 'LT'
	});
	$('#WorkshopEndDate-ID, #WorkshopStartDate-ID').datetimepicker({
		format: 'dddd D MMMM YYYY'
	});
	
	

	function set_country(id, ignore){
		var data = (id !== undefined) ? 'id='+ id + '&ignore=' + ignore : 'ignore='+ignore;
		$.ajax({
			async:false, data:data,	url:'https://portal.e-tadat.org/global/ajax/populateCountryForm/',
			success : function(data){if ($('#region').val() || $('#region').val() != ''){$("#country").html(data); $("#country_container").show();}}
		});
	};
	$('#region').change(function(){set_country($('#region option:selected').val(),'no');});
	if ($('#region option:selected').val() || $('#region option:selected').val() != ''){$("#country_container").show();}
	
	
	$('#WorkshopRevenueAuthorityContact').change(function(){
	if ($('#WorkshopRevenueAuthorityContact option:selected').val() || $('#WorkshopRevenueAuthorityContact option:selected').val() != ''){
		$("#workshop-admin-create-button").hide();
		$("#show_rest_container").show();
	}else{
		$("#workshop-admin-create-button").show();		
		$("#show_rest_container").hide();		
	}
	});


$('#workshop-admin-create-button').click(function(){var url = 'https://portal.e-tadat.org/users/create'; $(location).attr('href',url); return false;});		

$('#workshop-invitee-button').click(function(){var url = 'https://portal.e-tadat.org/users/create'; $(location).attr('href',url); return false;});			


	function set_counterpart(id, ignore){
		var data = (id !== undefined) ? 'id='+ id + '&ignore=' + ignore : 'ignore='+ignore;
		$.ajax({
			async:false, data:data,	url:'https://portal.e-tadat.org/global/ajax/populateCounterpartForm/',
			success : function(data){if ($('#WorkshopRevenueAuthorityFkId').val() || $('#WorkshopRevenueAuthorityFkId').val() != ''){$("#WorkshopRevenueAuthorityContact").html(data); $("#counterpart_container").show();}}
		});
	};
	$('#RevenueAuthority').change(function(){set_counterpart($('#RevenueAuthority option:selected').val(),'no');});
	if ($('#RevenueAuthority option:selected').val() || $('#RevenueAuthority option:selected').val() != ''){$("#counterpart_container").show();}



	$('#country').change(function(){
		if ($('#country option:selected').val() || $('#country option:selected').val() != ''){$("#show_submit").show();}
	});

	$('#workshop-invitees-responsive-datatables').dataTable({
		"sDom": "<'row'<'col-md-12 col-xs-12 no-margin'f>r>t<'row'<'col-md-4 col-xs-4 no-margin'l><'col-md-4 col-xs-4 no-margin center'i><'col-md-4 col-xs-4 no-margin'p>r>","pageLength": 10,
		"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ], "fnDrawCallback": function(oSettings) {
			if (Math.ceil((this.fnSettings().fnRecordsDisplay()) / this.fnSettings()._iDisplayLength) > 1){$('.dataTables_paginate', '.dataTables_length', '.dataTables_filter').css("display", "block"); 
			}else{$('.dataTables_paginate').css("display", "none");};
			if(oSettings.fnRecordsTotal() < 6){$('.dataTables_length').hide(); $('.dataTables_paginate').hide();
			}else{$('.dataTables_length').show(); $('.dataTables_paginate').show();}}});


	

});