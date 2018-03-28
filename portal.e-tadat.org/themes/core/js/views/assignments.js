$(document).ready(function() {
	$("#formAssignment").submit(function () {
		var allVals = [];
		var this_master = $(this);
		var this_submit = false;
		this_master.find('.check').each( function () {
			allVals.push($(this).val());
			var checkbox_this = $(this);
			if(checkbox_this.is(":checked") == true){ 
			}else{
				checkbox_this.prop('checked',true);
					checkbox_this.attr('value','0');
				}
			$('#poa_container').hide();
		})
		if($.inArray( '1', allVals )>=0){
			return true;
		}else{
			return false;
		}
		
	})


	function set_mission(id, table, ignore){
		var data = (id !== undefined && table !== undefined) ? 'id='+ id + '&table='+ table + '&ignore=' + ignore : 'table=' + table + '&ignore='+ignore;
		$.ajax({
			async:false, data:data,	url:'http://e-tadat.org/ajax/populateMissionsForm/',
			success : function(data){if ($('#authority').val() || $('#authority').val() != ''){$("#mission").html(data); $("#mission_container").show();}}
		});
	};


	// This populates the available users MTL + Assessors for selection when creating assignments
	function set_user(authorityId, missionId, table, ignore, action){
		if(authorityId !== undefined && missionId !== undefined && table !== undefined){
			var data = 'authorityId='+ authorityId + '&missionId='+ missionId + '&table='+ table + '&ignore=' + ignore + '&action=' + action;
		}else{
			var data ='table=' + table + '&ignore='+ignore;
		}
		$.ajax({
			async:false, data:data,	url:'http://e-tadat.org/ajax/populateUserPoaForm/',
			success : function(data){
						$("#user").html(''); 
						$("#user").html(data); 
						$("#user_container").show();
					}
		});
	};


	function set_poa(authorityId, missionId, userId, table, ignore, action){
		if(authorityId !== undefined && missionId !== undefined && userId !== undefined && table !== undefined){
			var data = 'authorityId='+ authorityId + '&missionId='+ missionId + '&userId='+ userId + '&table='+ table + '&ignore=' + ignore + '&action=' + action;
		}else{
			var data ='table=' + table + '&ignore='+ignore;
		}
		$.ajax({
			async:false, data:data,	url:'http://e-tadat.org/ajax/populatePoaForm/',
			success : function(data){
						$("#poa_data").html(''); 
						$("#poa_data").html(data); 
						$("#poa_container").show();
						$('#check-all').checkAll();
					}
		});
	};

	var authorityId = '';
	var missionId = '';
	var userId = '';
	
	$('#authority').change(function(){
	$("#user_container").hide();
		$("#poa_container").hide();
		if ($(this).val() || $(this).val() != ''){
			authorityId = $(this).val();
			set_mission($('#authority option:selected').val(),'Missions','no');
		}else{
			$("#mission_container").hide();
			$("#user_container").hide();
			$("#poa_container").hide();
		}
	});
	
	$('#mission').change(function(){
		if ($(this).val() || $(this).val() != ''){
			missionId = $(this).val();
			set_user(authorityId, missionId, 'RightsAssignmentsIndicators', '','create');			
			
		}else{
			$("#user_container").hide();
			$("#poa_container").hide();
		}	
	});
	
	$('#user').change(function(){
		if ($(this).val() || $(this).val() != ''){
			userId = $(this).val();
			set_poa(authorityId, missionId, userId, 'RightsAssignmentsIndicators', '','');
		}else{
			$("#poa_container").hide();
		}	
	});	

	// On edit
	if ($('#authority option:selected').val() || $('#authority option:selected').val() != ''){
			authorityId = $('#authority option:selected').val();
		$("#mission_container").show();
	}

	if ($('#mission').val() > 0 && $('#mission').val() !== ""){
		missionId = $('#mission option:selected').val();
		$("#user_container").show();
	}
	if ($('user option:selected').val() || $('#user option:selected').val() != '' || $('#user option:selected').val() != 0){
			userId = $('#user option:selected').val();
		set_poa(authorityId, missionId, userId, 'RightsAssignmentsIndicators', '', 'update');
	}	
	
		

	
	$('#responsive-datatables').dataTable({
		"sDom": "<'row'<'col-md-12 col-xs-12 no-margin'f>r>t<'row'<'col-md-4 col-xs-4 no-margin'l><'col-md-4 col-xs-4 no-margin center'i><'col-md-4 col-xs-4 no-margin'p>r>","pageLength": 5,
		"lengthMenu": [ [5, 10, 25, 50, -1], [5, 10, 25, 50, "All"] ], 

		"fnDrawCallback": function(oSettings){
			if (Math.ceil((this.fnSettings().fnRecordsDisplay()) / this.fnSettings()._iDisplayLength) > 1){
				$('.dataTables_paginate', '.dataTables_length', '.dataTables_filter').css("display", "block"); 
			}else{
				$('.dataTables_paginate').css("display", "none");
			};
			if(oSettings.fnRecordsTotal() < 6){
				$('.dataTables_length').hide(); $('.dataTables_paginate').hide();
			}else{
				$('.dataTables_length').show(); $('.dataTables_paginate').show();
				}}
		});
			
	$('#back_button').click(function(){var url = 'http://e-tadat.org/assignments/list'; $(location).attr('href',url); return false;});	

	$('#create_assignment').click(function(){window.location.replace("http://e-tadat.org/assignments/create");});		
});