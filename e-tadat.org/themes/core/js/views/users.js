$(document).ready(function() {
	
$('#passwordForm').formValidation({
        framework: 'bootstrap',
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    },
                    stringLength: {
                    	min: 10,
						max: 20,
                        message: 'The password length must be more than 10 characters and less than 20 characters.'
                    },
                    callback: {
                        callback: function(value, validator, $field) {
                            
							var password = $field.val();
							if (password == '') {
                                return true;
                            }

                            var result  = zxcvbn(password),
                                score   = result.score,
                                message = result.feedback.warning || 'The password is weak';


                            // Update the progress bar width and add alert class
                            var $bar = $('#strengthBar');
                            switch (score) {
                                case 0:
                                    $bar.attr('class', 'progress-bar progress-bar-danger')
                                        .css('width', '1%');
                                    break;
                                case 1:
                                    $bar.attr('class', 'progress-bar progress-bar-danger')
                                        .css('width', '25%');
                                    break;
                                case 2:
                                    $bar.attr('class', 'progress-bar progress-bar-danger')
                                        .css('width', '50%');
                                    break;
                                case 3:
                                    $bar.attr('class', 'progress-bar progress-bar-warning')
                                        .css('width', '75%');
                                    break;
                                case 4:
                                    $bar.attr('class', 'progress-bar progress-bar-success')
                                        .css('width', '100%');
                                    break;
                            }

                            if (score < 3) {
                                return {
                                    valid: false,
                                    message: message
                                }
                            }

                            return true;
                        }
                    }
                }
            }
        }
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
	
	$('#country').change(function(){$("#city_container").show();});
	var check_country = $('#country option:selected').val();
	if (check_country && check_country != '' && check_country != 0){
		$("#city_container").show();
		}	


	$('#responsive-datatables').dataTable({
		"sDom": "<'row'<'col-md-12 col-xs-12 no-margin'f>r>t<'row'<'col-md-4 col-xs-4 no-margin'l><'col-md-4 col-xs-4 no-margin center'i><'col-md-4 col-xs-4 no-margin'p>r>","pageLength": 10,
		"lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ], "columnDefs": [{ orderable: false, targets: [3,4] }], "fnDrawCallback": function(oSettings) {
			if (Math.ceil((this.fnSettings().fnRecordsDisplay()) / this.fnSettings()._iDisplayLength) > 1){$('.dataTables_paginate', '.dataTables_length', '.dataTables_filter').css("display", "block"); 
			}else{$('.dataTables_paginate').css("display", "none");};
			if(oSettings.fnRecordsTotal() < 11){$('.dataTables_length').hide(); $('.dataTables_paginate').hide();
			}else{$('.dataTables_length').show(); $('.dataTables_paginate').show();}}});
	$('#back_button').click(function(){var url = 'https://e-tadat.org/users/list'; $(location).attr('href',url); return false;});	
});