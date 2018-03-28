$(document).ready(function() {
	function set_country(id, ignore){
		var data = (id !== undefined) ? 'id='+ id + '&ignore=' + ignore : 'ignore='+ignore;
		$.ajax({
			async:false, data:data,	url:'http://e-tadat.org/ajax/populateCountryForm/',
			success : function(data){if ($('#region').val() || $('#region').val() != ''){$("#country").html(data); $("#country_container").show();}}
		});
	};

	function set_state(id, table, ignore){
		var data = (id !== undefined && table !== undefined) ? 'id='+ id + '&table='+ table + '&ignore=' + ignore : 'table=' + table + '&ignore='+ignore;
		$.ajax({
			async:false, data:data,	url:'http://e-tadat.org/ajax/populateStateForm/',
			success : function(data){
				if ($('#country').val() || $('#country').val() != ''){
					if ($.trim(data) !== 'hide'){
						$("#state").html(data); $("#state_container").show();
					}else{
						$("#state").html('<option selected="selected" value="0"></option>');
						$("#state_container").hide();
					}						
				} else{
						$("#state").html('<option selected="selected" value="0"></option>');
						$("#state_container").hide();
				}
			}
		});
	};

	$('#region').change(function(){
		set_country($('#region option:selected').val(),'no');
		$("#state").html('<option selected="selected" value="0"></option>');
		$("#state_container").hide();
	});


	$('#country').change(function(){
		set_state($('#country option:selected').val(), 'FederalStates', 'no');
	});


	if ($('#region option:selected').val() || $('#region option:selected').val() != ''){$(
		"#country_container").show();
		$("#state_container").hide();
	}

	if ($('#country option:selected').val() || $('#country option:selected').val() != '' || $('#country option:selected').val() != 0){
		if ($('#country_container').is(":visible")){ 
			if ($('#state option:selected').val() && $('#state option:selected').val() != '' && $('#state option:selected').val() != 0){
				$("#state_container").show();
			}else{
				$("#state_container").hide();				
				}
		}
	}

	$('#responsive-datatables').dataTable({
		"sDom": "<'row'<'col-md-12 col-xs-12 no-margin'f>r>t<'row'<'col-md-4 col-xs-4 no-margin'l><'col-md-4 col-xs-4 no-margin center'i><'col-md-4 col-xs-4 no-margin'p>r>","pageLength": 5,
		"lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ], "columnDefs": [{ orderable: false, targets: [3,4] }], "fnDrawCallback": function(oSettings) {
			if (Math.ceil((this.fnSettings().fnRecordsDisplay()) / this.fnSettings()._iDisplayLength) > 1){$('.dataTables_paginate', '.dataTables_length', '.dataTables_filter').css("display", "block"); 
			}else{$('.dataTables_paginate').css("display", "none");};
			if(oSettings.fnRecordsTotal() < 6){$('.dataTables_length').hide(); $('.dataTables_paginate').hide();
			}else{$('.dataTables_length').show(); $('.dataTables_paginate').show();}}});
		$('#back_button').click(function(){var url = 'http://e-tadat.org/authorities/list'; $(location).attr('href',url); return false;});	
		
	$('#id_add_contact').click(function(){
		var $myForm = $('#form-submit');
		var action = '';
		action = $('#form-submit').attr('action').replace('save','add');
		$('#form-submit').attr('action', action);
		$('<input type="submit">').hide().appendTo($myForm).click().remove();
		if (!$myForm[0].checkValidity()) {
			$myForm.find(':submit').click()
		}


/*		$(":input[required]").each(function () {                     
			var myForm = $('#form-submit');
			if (myForm[0].checkValidity()){                
				var action = '';
				action = $('#form-submit').attr('action').replace('/save','/add');
				$('#form-submit').attr('action', action);
				$("#form-submit").submit();
			}
		});
		*/
	});
			
		
});