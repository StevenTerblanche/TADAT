$(document).ready(function() {
	$(document).on('keyup keypress', 'form input[type="text"]', function(e) {
	  if(e.which == 13) {
		e.preventDefault();
		return false;
	  }
	});


 $('#modal-style2').on('shown.bs.modal', function(e) {
        var $modal = $(this), indicatorId = e.relatedTarget.id;
			$('#pmq_fkidIndicator').val(indicatorId);

    })
	
	$('#modal-style2').on('hidden.bs.modal', function () {
		location.reload();
	})
	

	function showUploaded(){
		$('#uploader').tab('show');
			var url = $('#uploader').attr("data-url");
			$('#uploadModal').modal({show:true});
//			var pane = $('#uploader');
			if(url !== ""){
				$('#uploaded').load(url,function(result){
					
				$('#responsive-datatables').dataTable({
					"sDom": "<'row'<'col-md-12 col-xs-12 no-margin'f>r>t<'row'<'col-md-4 col-xs-4 no-margin'l><'col-md-4 col-xs-4 no-margin center'i><'col-md-4 col-xs-4 no-margin'p>r>","pageLength": 10,
					"lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ], "columnDefs": [{ orderable: false, targets: [3,4,5] }], "fnDrawCallback": function(oSettings) {
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
				});
			}
	}
	
	$('.uploaded').click(function (e){
		showUploaded();
	});
	
	var elements = document.getElementsByTagName("input").type == "text";
	for (var i = 0; i < elements.length; i++) {
		elements[i].oninvalid = function(e) {
			e.target.setCustomValidity("");
			if (!e.target.validity.valid) {
				e.target.setCustomValidity("This field cannot be left blank");
			}
		};
		elements[i].oninput = function(e) {
			e.target.setCustomValidity("");
		};
	}

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
		$("#form-submit").submit();
	});
});
