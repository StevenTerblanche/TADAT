$(document).ready(function() {
   tinymce.init({
			height : 300,
		    selector: "#summernote",
			plugins: "advlist,paste",
		    advlist_number_styles: "lower-roman,lower-alpha",
			theme : "modern",
        	mode : "textareas",
    	    theme_advanced_buttons3_add : "pastetext,pasteword,selectall",
	        paste_auto_cleanup_on_paste : true,
			setup: function(ed) {
			ed.on("init", function(ed) {
				tinyMCE.activeEditor.dom.loadCSS('/themes/core/css/tinymce.css');
			});}
	});


		

	$('#responsive-datatables').dataTable({
		"sDom": "<'row'<'col-md-12 col-xs-12 no-margin'f>r><'row'<'col-md-4 col-xs-4 no-margin'l><'col-md-4 col-xs-4 no-margin center'i><'col-md-4 col-xs-4 no-margin'p>r>",
		"pageLength": 6,
		"lengthMenu": [[6, 12, 18, 24, -1], [6, 12, 18, 24, "All"]],
		"aaSorting": [], 
		"columnDefs": [{orderable: false, targets: [0] }], 
		"fnDrawCallback": function(oSettings) {
			if (Math.ceil((this.fnSettings().fnRecordsDisplay()) / this.fnSettings()._iDisplayLength) > 1){
				$('.dataTables_paginate', '.dataTables_length', '.dataTables_filter').css("display", "block"); 
			}else{
				$('.dataTables_paginate').css("display", "none");
			};
			if(oSettings.fnRecordsTotal() < 6){
				$('.dataTables_length').hide(); $('.dataTables_paginate').hide();
			}else{
				$('.dataTables_length').show(); $('.dataTables_paginate').show();
			}
		}
	});

});