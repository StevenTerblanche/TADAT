$(document).ready(function() {

var api_key = "<?php echo $your_var; ?>";

	$.ajax({
		type: "GET",
		url: "https://api.classmarker.com/v1.json? api_key=XXXX&signature=XXXX& timestamp=XXXX",
		data: {},
		dataType:'json',
		success: function (response) {
			var modelsData = response.data;
			$("#api_container").html(response.html);
		},
		error: function(){ alert('Ooops ... server problem'); }
	});  
});