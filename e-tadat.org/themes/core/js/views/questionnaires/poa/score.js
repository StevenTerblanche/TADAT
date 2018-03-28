$(document).ready(function() {
	 tinymce.init({
			menubar:false,
		    statusbar: false,
			height : 200,
			mode : "textareas",
			plugins: ["advlist autolink link preview hr spellchecker", "searchreplace wordcount fullscreen insertdatetime ", "save table contextmenu paste"],
		    advlist_number_styles: "default,lower-alpha,lower-greek,lower-roman,upper-alpha,upper-roman",			
			theme : "modern",
			toolbar: "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | table link | preview fullpage", 
			   style_formats: [
					{title: "Bold", icon: "bold", format: "bold"},
					{title: "Italic", icon: "italic", format: "italic"},
					{title: "Underline", icon: "underline", format: "underline"},
					{title: "Strikethrough", icon: "strikethrough", format: "strikethrough"},
					{title: "Superscript", icon: "superscript", format: "superscript"},
					{title: "Subscript", icon: "subscript", format: "subscript"},
				],
	        paste_auto_cleanup_on_paste : true,
			setup: function(ed) {
	      ed.on("init", function(ed){tinyMCE.activeEditor.dom.loadCSS('/themes/core/css/tinymce.css');});}
        });
		


// Check if final scores have value, if not assign generated score to final score

	function checkValues(dimension){
		var id_score_symbol_dimension_generated = $('#id_score_symbol_dimension_'+dimension);
		var id_score_symbol_dimension_final = $('#id_score_symbol_dimension_'+dimension+'_final');		

		var id_score_number_dimension_generated = $('#id_score_number_dimension_'+dimension);
		var id_score_number_dimension_final = $('#id_score_number_dimension_'+dimension+'_final');		

		// Reason Memo field
		var div_id_dimension_reason = $('#div_id_dimension_'+dimension+'_reason');
		var id_text_dimension_final_reason = $('#id_score_dimension_'+dimension+'_final_reason');

		// Reason upload button
		var div_id_dimension_reason_upload_button = $('#div_id_dimension_'+dimension+'_reason_upload_button');		

		// Reason files uploaded
		var div_id_dimension_1_reason_uploaded = $('#div_id_dimension_'+dimension+'_reason_uploaded');		


		var uploader_field = $('#uploader_'+dimension);
		var uploader_url = uploader_field.attr("data-url");;
		var uploader_field = $('#uploaded_'+dimension);
		
		if(id_score_symbol_dimension_generated.val()){

			if(id_score_symbol_dimension_final.val() && id_score_symbol_dimension_final.val() === id_score_symbol_dimension_generated.val()){
				// Check if the Reason memo has text, then display else hide
				if(id_text_dimension_final_reason.val() === ''){
					div_id_dimension_reason.hide();
					div_id_dimension_reason_upload_button.hide();
					div_id_dimension_1_reason_uploaded.hide();
				}else{
					div_id_dimension_reason.show();
					div_id_dimension_reason_upload_button.show();
					div_id_dimension_1_reason_uploaded.show();
				}
				
			}else{
				// Show Uploads
				if(uploader_url !== ""){
					uploader_field.load(uploader_url,function(result){});
					div_id_dimension_reason.show();									
					div_id_dimension_reason_upload_button.show();
					div_id_dimension_1_reason_uploaded.show();
				}
			}
				if(id_score_symbol_dimension_final.val()){
					switch (id_score_symbol_dimension_final.val()){
						case "A": id_score_number_dimension_final.val(1); break;
						case "B": id_score_number_dimension_final.val(2); break;
						case "C": id_score_number_dimension_final.val(3); break;
						case "D": id_score_number_dimension_final.val(4); break;
					}
				}
			
		}
	}

	function PopulateFields(){
		for(i = 1; i < 6; i++){
			checkValues(i);
		}	
	}

	$('#id_score_symbol_dimension_1_final').change(function(){checkValues(1);});
	$('#id_score_symbol_dimension_2_final').change(function(){checkValues(2);});
	$('#id_score_symbol_dimension_3_final').change(function(){checkValues(3);});
	$('#id_score_symbol_dimension_4_final').change(function(){checkValues(4);});
	$('#id_score_symbol_dimension_5_final').change(function(){checkValues(5);});				


	$('a[data-toggle=modal], button[data-toggle=modal]').click(function () {
		var data_id = '';
		if (typeof $(this).data('id') !== 'undefined') {
			data_id = $(this).data('id');
		}else{
			data_id = $(this).data('id');
		}
		$('#fkidDimension_id').val(data_id);
	})
	
	$('#modal-style2').on('hidden.bs.modal', function () {
		PopulateFields();
	})
	
	PopulateFields()

});