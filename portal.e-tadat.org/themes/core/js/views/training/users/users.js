$(document).ready(function() {
	$('#responsive-datatables').dataTable({
		"sDom": "<'row'<'col-md-12 col-xs-12 no-margin'f>r>t<'row'<'col-md-4 col-xs-4 no-margin'l><'col-md-4 col-xs-4 no-margin center'i><'col-md-4 col-xs-4 no-margin'p>r>","pageLength": 10, 
		"deferRender": true,
		"lengthMenu": [ [10, 25, 50, 500, 1000, 2000 -1], [10, 25, 50,  500, 1000, 2000, "All"] ], 
		"columnDefs": [{ orderable: false, targets: [7] }], 
/*
		"processing": true,
        "serverSide": true,
        "ajax": "https://portal.e-tadat.org/global/ajax/populateDataTables/",
		*/
		"fnDrawCallback": function(oSettings) {
			if (Math.ceil((this.fnSettings().fnRecordsDisplay()) / this.fnSettings()._iDisplayLength) > 1){$('.dataTables_paginate', '.dataTables_length', '.dataTables_filter').css("display", "block"); 
			}else{$('.dataTables_paginate').css("display", "none");};
			if(oSettings.fnRecordsTotal() < 11){$('.dataTables_length').hide(); $('.dataTables_paginate').hide();
			}else{$('.dataTables_length').show(); $('.dataTables_paginate').show();}}});
});