var score_memo = 0;
var score_radio = 0;
window.elementID = '';
window.assignedName = '';
window.elementCheck = 1;

$(document).ready(function() {
	$('#score_button').hide();				 
	$('#score_button').prop('disabled', true);

   	tinymce.init({
			menubar:false,
		    statusbar: false,
			selector: '.required-textarea-reason_tiny_mce',
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
	      		ed.on("init", function(ed){tinyMCE.activeEditor.dom.loadCSS('/themes/core/css/tinymce.css'); 
					tinymce.triggerSave();
				});
				ed.on("keyup", function(ed){
					tinymce.triggerSave();
					//var editorText = tinyMCE.activeEditor.getContent({format : 'text'});
					//window.validateTadatMemo(editorText);
					validateTadatMemo();
				});
			}
        });

	tinymce.init({
			menubar:false,
		    statusbar: false,
			selector: '.tadat-notes',
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
	      		ed.on("init", function(ed){tinyMCE.activeEditor.dom.loadCSS('/themes/core/css/tinymce.css'); 
				});
			}
        });

	 $('#accordProfile').on('shown', function () {
		   $(".icon-chevron-down").removeClass("icon-chevron-down").addClass("icon-chevron-up");
		});
	
		$('#accordProfile').on('hidden', function () {
		   $(".icon-chevron-up").removeClass("icon-chevron-up").addClass("icon-chevron-down");
		});
		
	$(document).on('keyup keypress', 'form input[type="text"]', function(e) {
	  if(e.which == 13) {
		e.preventDefault();
		return false;
	  }
	});
	
	function populateTab(){
		$('#uploader').tab('show');
		var url = $('#uploader').attr("data-url");
		var pane = $('#uploader');
		if(url !== ""){
			$('#uploaded').load(url,function(result){
				$('#responsive-datatables').dataTable({"sDom": "<'row'<'col-md-12 col-xs-12 no-margin'f>r>t<'row'<'col-md-4 col-xs-4 no-margin'l><'col-md-4 col-xs-4 no-margin center'i><'col-md-4 col-xs-4 no-margin'p>r>","pageLength": 10, "lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ], "columnDefs": [{ orderable: false, targets: [3,4,5] }], 
					"fnDrawCallback": function(oSettings) {
						if (Math.ceil((this.fnSettings().fnRecordsDisplay()) / this.fnSettings()._iDisplayLength) > 1){
							$('.dataTables_paginate', '.dataTables_length', '.dataTables_filter').css("display", "block"); 
						}else{
							$('.dataTables_paginate').css("display", "none");
						};
						if(oSettings.fnRecordsTotal() < 11){
							$('.dataTables_length').hide(); $('.dataTables_paginate').hide();
						}else{
							$('.dataTables_length').show(); $('.dataTables_paginate').show();
						}
					}
				});
			});
		}
	}
	
	$('#uploader').click(function (e){
		populateTab();
	});
	
	$('#modal-style2').on('hidden.bs.modal', function () {
		populateTab();
	})
	
	$('a[data-toggle=modal], button[data-toggle=modal]').click(function () {
		var data_id = '0';
		$('#fkidDimension_id').val(data_id);
	})
	
	function delaySubmit(){
		$("#form-submit").submit();
	}

	$("#form-submit").submit(function () {
		$('.question').hide();
		setTimeout($('.saving').show(), 15000) //wait ten seconds before continuing
	});

	$('.required-radio').bind('change', function(){validateTadatRadio();validateTadatMemo();});
	$('.required-textarea-reason').bind('keyup', function(){validateTadatMemo();});	
	

	function validateTadatMemo(){
		var flag = 0;
		var visibleLength = 0;			
		var required = $('.required-textarea-reason');
		var passedContent = '';
		var passedContentLength = 0;
		
		required.each(function(index, element){
			visibleLength++;
			passedContent = $(this).val();
			passedContentLength = passedContent.length;
			if (passedContentLength > 7){
				flag++;
			}
		});			
		if (flag==visibleLength){
			 score_memo = 1;
		 }else{
			score_memo = 0;
		 }	
			ShowScoreButton();
	}

	function validateTadatRadio(){
			var radioFlag = 0;
			var visibleLength = 0;
			var troubleShootCounted = '';
			var troubleShootUncounted = '';
			var required = $('.required-radio');
			required.each(function() {
				window.assignedName = $(this).attr("id");
				var AssignedId = '#'+$(this).attr("id");

				if ($(this).attr('disabled')) {
					visibleLength = visibleLength;
				}else{
					if(window.elementID === $(this).attr("id")){
						visibleLength = visibleLength;
					}else{
						visibleLength++;
					}
					if($(this).not(':checkbox, :radio').val() || $(this).filter(':checked').val()){
						radioFlag++;
					}
					window.elementID = window.assignedName;					
				}
				
				
			});			
		if (radioFlag==visibleLength){
			 score_radio = 1;
		 }else{
			score_radio = 0;
		 }	
			ShowScoreButton();
	}


	
	function ShowScoreButton(){
		if (score_memo == 1 && score_radio == 1){
			 $('#score_button').show();				 
			 $('#score_button').prop('disabled',false);
		 }else{
			 $('#score_button').hide();				 
			$('#score_button').prop('disabled', true);
		 }
	}	

	validateTadatRadio();
	validateTadatMemo();


	$('#save_button').click(function(){
		var url ='';
		var action = '';
		if ($('#form-submit').attr('action').indexOf("create") != -1){
			action = $('#form-submit').attr('action').replace('/create','/save');
		}else{
			action = $('#form-submit').attr('action').replace('/update','/save');
		}
		$('#form-submit').attr('action', action);
		$(".column-a-total").removeAttr('disabled');
		delaySubmit();
	});
	
	$('#score_button').click(function(){
		var url ='';
		var action = '';
		if ($('#form-submit').attr('action').indexOf("create") != -1){
			action = $('#form-submit').attr('action').replace('/create','/score');
		}else{
			action = $('#form-submit').attr('action').replace('/update','/score');
		}
		$('#form-submit').attr('action', action);
		$(".column-a-total").removeAttr('disabled');
		delaySubmit();
	});
	
	
});