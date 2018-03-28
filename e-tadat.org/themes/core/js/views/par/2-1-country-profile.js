$(document).ready(function() {
var action = '';
	tinymce.init({
		setup : function(ed) {
			ed.on('change', function(e) {
				$('#mceu_0').attr('aria-disabled', 'false');
				$('#mceu_0').removeClass("mce-widget mce-btn mce-first mce-btn-has-text mce-disabled").addClass("mce-widget mce-btn mce-first mce-btn-has-text");                  
			});
		},
		menubar:false,
		statusbar: false,
		selector: 'div.editable',
		inline: true,
		plugins: [
		'save advlist autolink lists link image charmap print preview anchor',
		'searchreplace visualblocks code fullscreen',
		'insertdatetime media table contextmenu paste'
		],
		toolbar: 'save undo redo | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link',
		save_onsavecallback: function() {
			action = 'save';
				$('#mceu_0').attr('aria-disabled', 'true');
				$('#mceu_0').removeClass("mce-widget mce-btn mce-first mce-btn-has-text").addClass("mce-widget mce-btn mce-first mce-btn-has-text mce-disabled");
				$("#id_save_button").show();
		}
		
	});
});