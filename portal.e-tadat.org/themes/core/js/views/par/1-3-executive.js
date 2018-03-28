$(document).ready(function() {
	$('#id-table-without-border').removeClass("table-without-border");
/*
	$('#id-table-without-border').focusout(function() {
		$('#id-table-without-border').removeClass("table-without-border");
	});
*/
	var action = '';
	tinymce.init({
		setup : function(ed) {
			ed.on('change', function(e) {
				$('#mceu_0').attr('aria-disabled', 'false');
				$('#mceu_0').removeClass("mce-widget mce-btn mce-first mce-btn-has-text mce-disabled").addClass("mce-widget mce-btn mce-first mce-btn-has-text");                  
			})		
			
		},
		menubar:false,
		statusbar: false,
		selector: 'div.editable',
		inline: true,
		plugins: [
		'save advlist autolink lists link image charmap print preview anchor',
		'searchreplace visualblocks code fullscreen',
		'insertdatetime media table contextmenu paste noneditable'
		],
		toolbar: 'save undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link',
		save_onsavecallback: function() {
			action = 'save';
				$('#mceu_0').attr('aria-disabled', 'true');
				$('#id-table-without-border').removeClass("table-without-border");
				$("#id_save_button").show();				
				$('#id_back_button').focus();
		}
		
	});
	
	$("#id_back_button").focus(function(){
		$('#mceResizeHandlenw').removeClass("mce-resizehandle");
		$('#mceResizeHandlene').removeClass("mce-resizehandle");
		$('#mceResizeHandlese').removeClass("mce-resizehandle");
		$('#mceResizeHandlesw').removeClass("mce-resizehandle");
	});

});