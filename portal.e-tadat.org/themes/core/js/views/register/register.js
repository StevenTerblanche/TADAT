$(document).ready(function() {

	$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
		var target = $(e.target).attr("href") // activated tab
		if(target === '#tab2' || target === '#tab4' ||  target === '#tab6' || target === '#tab7' || target === '#tab8'){
			$('#save_button_display').show();
		}else{
			$('#save_button_display').hide(); 
		}
	});


// STEP 3 - PROFESSIONAL INFORMATION
	$('.show-other-occupation-input').hide();	
	$('.show-other-organization-input').hide();		

	$('#fkid_occupation_id').change(function() {
		var value = $('#fkid_occupation_id :selected').val();
		if(value == 11){
			$('.show-other-occupation-input').show();	
		}else{
			$('.show-other-occupation-input').hide();	
		}
	});

	// RETURN
		if($('#fkid_occupation_id').val() === '11'){
			$('.show-other-occupation-input').show();	
		}else{
			$('.show-other-occupation-input').hide();	
		}






	$('#organization_id').change(function() {
		var value = $('#organization_id :selected').val();
		if(value == 10){
			$('.show-other-organization-input').show();	
		}else{
			$('.show-other-organization-input').hide();	
		}
	});

	// RETURN
		if($('#organization_id').val() === '10'){
			$('.show-other-organization-input').show();
		}else{
			$('.show-other-organization-input').hide();	
		}



// STEP 4 - TAX ADMINISTRATION EXPERIENCE

	$('.hider-diagnostic-program-details').hide();
	$('.hider-administration-experience-other').hide();	
	$('.hider-interest-other').hide();		

	$('.administration-interest').click(function() {
		$('.administration-interest:checked').each(function(){
			 value = $(this).val();
			if(value == 10){
			$('.hider-interest-other').show();
		}else{
			$('.hider-interest-other').hide();
			}
		  });
	});

	$('.administration-interest:checked').each(function(){
		 value = $(this).val();
		if(value == 10){
			$('.hider-interest-other').show();
		}else{
			$('.hider-interest-other').hide();
		}
	  });


	$('.administration-experience').click(function() {
		$('.administration-experience:checked').each(function(){
			 value = $(this).val();
			if(value == 10){
				$('.hider-administration-experience-other').show();
			}else{
				$('.hider-administration-experience-other').hide();
			}
		  });
	});

	$('.administration-experience:checked').each(function(){
		 value = $(this).val();
		if(value == 10){
			$('.hider-administration-experience-other').show();
		}else{
			$('.hider-administration-experience-other').hide();
		}
	  });


	$('.diagnostic-program').click(function() {
		var value = $(this).val();
		if(value == 1){
			$('.hider-diagnostic-program-details').show();
		}else{
			$('.hider-diagnostic-program-details').hide();
		}
	});



	if($('input[name=diagnostic_program]:checked', '#register-form').val() === '1'){
		$('.hider-diagnostic-program-details').show();
	}else{
		$('.hider-diagnostic-program-details').hide();
	}


	$('#register-form')
			.bootstrapValidator({
				excluded: [':disabled'],
				feedbackIcons: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'
				},
				fields: {
					fkidTitle: {
						validators: {
							notEmpty: {
								message: 'Your title is required'
							}
						}
					},
					name: {
						validators: {
							notEmpty: {
								message: 'Your first name is required'
							}
						}
					},
					surname: {
						validators: {
							notEmpty: {
								message: 'Your surname is required'
							}
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'Your e-mail address is required'
							}
						}
					},
					telephone: {
						validators: {
							notEmpty: {
								message: 'Your telephone is required'
							}
						}
					},
					
					fkidLanguage: {
						validators: {
							notEmpty: {
								message: 'Your language is required'
							}
						}
					},															
					fkid_gender: {
						validators: {
							notEmpty: {
								message: 'Your gender is required'
							}
						}
					},
					fkid_country_citizen: {
						validators: {
							notEmpty: {
								message: 'Your Country of Primary Citizenship is required'
							}
						}
					},
					fkid_country_residence: {
						validators: {
							notEmpty: {
								message: 'Your Country of Residence is required'
							}
						}
					}

					
				}
			})
			.on('status.field.bv', function(e, data) {
				var $form     = $(e.target),
					validator = data.bv,
					$tabPane  = data.element.parents('.tab-pane'),
					tabId     = $tabPane.attr('id');
				
				if (tabId) {
					var $icon = $('a[href="#' + tabId + '"][data-toggle="tab"]').parent().find('i');
	
					// Add custom class to tab containing the field
					if (data.status == validator.STATUS_INVALID) {
						$icon.removeClass('fa-check').addClass('fa-times');
					} else if (data.status == validator.STATUS_VALID) {
						var isValidTab = validator.isValidContainer($tabPane);
						$icon.removeClass('fa-check fa-times')
							 .addClass(isValidTab ? 'fa-check' : 'fa-times');
                }
            }
			data.status == validator.STATUS_VALID;
        });

   		$("#dob").datepicker({startView: 2, format: 'd MM, yyyy',autoclose: true, todayHighlight: false, endDate: '-18y'});
   		$("#current_start_date").datepicker({minViewMode: 1, maxViewMode: 2, startView: 2,format: 'MM, yyyy',autoclose: true, todayHighlight: true, endDate: '-2y'});		
   		$("#previous_start_date").datepicker({minViewMode: 1, maxViewMode: 2, startView: 2,format: 'MM, yyyy',autoclose: true, todayHighlight: true, endDate: '-2y'});		
   		$("#previous_end_date").datepicker({minViewMode: 1, maxViewMode: 2, startView: 2, format: 'MM, yyyy',autoclose: true, todayHighlight: true, endDate: '-2y'});						
   		$("#academic_start_date_1").datepicker({minViewMode: 2, maxViewMode: 2, startView: 2,format: 'yyyy',autoclose: true, todayHighlight: true, endDate: '-5y'});		
   		$("#academic_end_date_1").datepicker({minViewMode: 2, maxViewMode: 2, startView: 2,format: 'yyyy',autoclose: true, todayHighlight: true, endDate: '-2y'});						
   		$("#academic_start_date_2").datepicker({minViewMode: 2, maxViewMode: 2, startView: 2,format: 'yyyy',autoclose: true, todayHighlight: true, endDate: '-2y'});		
   		$("#academic_end_date_2").datepicker({minViewMode: 2, maxViewMode: 2, startView: 2,format: 'yyyy',autoclose: true, todayHighlight: true, endDate: '-2y'});								



	$('#save_button_display').click(function() {
		$('.hidden-progress').val('0');
	});


	$('#submit_application_button').click(function() {
		$('.hidden-progress').val('1');
	});


	
	function get_user_documents(reference){
		var data = '';
		if(reference !== undefined){
			data = 'reference='+ reference;
		} 
		$.ajax({
			async: true,
			data:data,	
			url:'https://portal.e-tadat.org/global/ajax/populateUserDocuments/',
			success : function(data){
				$('#uploaded-documents').html(data);
				$('#modal-style2').modal('toggle');
			}
		});
	}

	$('#upload-dialog-closer').click(function() {
		get_user_documents($(this).attr('data-reference'));	
	});
	
	
	

	$('#connect_button').click(function() {
		$('#connect_form').submit();
	});

	$('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
		var $total = navigation.find('li').length;
		var $current = index+1;
		var $percent = ($current/$total) * 100;
		$('#rootwizard .progress-bar').css({width:$percent+'%'});
	}});
});