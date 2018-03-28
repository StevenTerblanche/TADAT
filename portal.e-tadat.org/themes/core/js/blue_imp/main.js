$(document).ready(function() {
//    'use strict';

	$('.fileupload').each(function () {
		$(this).fileupload({url: '/uploads/do_upload'}).on('fileuploadsubmit', function (e, data){
			dropZone: $(this);
			var checker;
			$('input[name^=title], select[name^=description]').each(function() {
				if (!$(this).val() || $(this).val() === '' || $(this).val() === '0'){
					checker = 1;
					data.context.find('button').prop('disabled', false);
					$(this).focus();
					$(this).addClass('tadat-danger white-text placeholder-error');
					if ($(this).attr('name').indexOf("title") >= 0){
						$(this).attr("placeholder", "Document title is required");
					}else{
						$(this).attr("placeholder", "Document description is required");
					}
					$(this).blur(function(){
						$(this).removeClass('tadat-danger white-text placeholder-error');
					});	
				return false;
				}
			});
			if(checker == 1){
				return false;
			}else{
				data.context.find('button').prop('disabled', false);
				return true;
			}
			data.formData = data.context.find(':input, :select').serializeArray();
		});
	});
});