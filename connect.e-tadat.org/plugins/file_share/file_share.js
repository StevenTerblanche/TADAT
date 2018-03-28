$(document).ready(function() {
	$(document).on("click", "label#file-share-button", function() {
		// Clean the old selected files
		$('#file-share-list').empty();
		$('#file-share-list').removeAttr('class');
		$('#file-share-files, #my_file').val('');
		$('#form-value').val(' ');
		
		// Hide all the current plugin divs
		$('#plugins-forms, #plugins-forms div').hide();
		$('.message-form-input, .selected-files').hide();
		
		// Place the inputs
		$('#plugins-forms').append($('#file-share-location'));
		
		// Show the inputs
		$('#file-share-location, #file-share-location div').show();
		$('#plugins-forms').show('fast');

		// Deselect any other event type if selected
		$('#values label').addClass('selected').siblings().removeClass('selected');
		
		// Add the selected state to the button
		$('#file-share-button').addClass('selected');
	});
	
	$(document).on("change", "#file-share-files", function() {
		// Empty the file lists
		$('#file-share-list').empty();
		
		$('#file-share-list').attr('class', 'file-share-list');
		
		// Read the current files
		var files = $('#file-share-files').prop('files');
		
		// Show the current files
        for (i = 0; i < files.length; i++){
			$('#file-share-list').append('<div class="file-share-element">'+files[i].name+' <span class="file-share-value">('+file_share_sizeFormat(files[i].size)+')</span></div>');
        }
	});
});
function file_share_sizeFormat(bytes,decimals) {
   if(bytes == 0) return '0 Byte';
   var k = 1024;
   var dm = decimals + 1 || 3;
   var sizes = ['B', 'KiB', 'MiB', 'GiB', 'TiB', 'PiB', 'EiB', 'ZiB', 'YiB'];
   var i = Math.floor(Math.log(bytes) / Math.log(k));
   return (bytes / Math.pow(k, i)).toPrecision(dm) + ' ' + sizes[i];
}