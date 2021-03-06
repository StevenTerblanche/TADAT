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
   tinymce.init({
			height : 300,
		    selector: "#summernote1",
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
	function set_country(id, ignore){
		var data = (id !== undefined) ? 'id='+ id + '&ignore=' + ignore : 'ignore='+ignore;
		$.ajax({
			async:false, data:data,	url:'https://e-tadat.org/ajax/populateCountryForm/',
			success : function(data){if ($('#region').val() || $('#region').val() != ''){$("#country").html(data); $("#country_container").show();}}
		});
	};
	$('#region').change(function(){set_country($('#region option:selected').val(),'no');});
	if ($('#region option:selected').val() || $('#region option:selected').val() != ''){$("#country_container").show();}

	$('#responsive-datatables').dataTable({
		"sDom": "<'row'<'col-md-12 col-xs-12 no-margin'f>r>t<'row'<'col-md-4 col-xs-4 no-margin'l><'col-md-4 col-xs-4 no-margin center'i><'col-md-4 col-xs-4 no-margin'p>r>","pageLength": 10,
		"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ], 
		"columnDefs": [{ orderable: false, targets: [2,3] }], 
		"fnDrawCallback": function(oSettings){
			if (Math.ceil((this.fnSettings().fnRecordsDisplay()) / this.fnSettings()._iDisplayLength) > 1){
				$('.dataTables_paginate', '.dataTables_length', '.dataTables_filter').css("display", "block"); 
			}else{
				$('.dataTables_paginate').css("display", "none");
			};
			if(oSettings.fnRecordsTotal() < 11){
				$('.dataTables_length').hide(); $('.dataTables_paginate').hide();
			}else{
				$('.dataTables_length').show(); $('.dataTables_paginate').show();
				}}
		});
			
	$('#back_button').click(function(){var url = 'https://e-tadat.org/pi/list'; $(location).attr('href',url); return false;});	
});