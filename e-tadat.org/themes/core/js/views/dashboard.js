$(document).ready(function() {

	//------------- Animated progressbars on tiles -------------//
	$('.animated-bar .progress-bar').waypoint(function(direction) {
		$(this).progressbar({display_text: 'none'});
	}, { offset: 'bottom-in-view' });
	
	//------------- CounTo for tiles -------------//
	$('.stats-number').countTo({
        speed: 1000,
        refreshInterval: 50
    });


	//------------- Mission maps -------------//
		$.ajax({
			async:false, 
			dataType : "json",
			url:'https://e-tadat.org/ajax/populateCountrymap/',
			success : function(markers){
					$('#world-map-markers').vectorMap({
						map: 'world_mill_en',
						scaleColors: ['#f7f9fe', '#29b6d8'],
						normalizeFunction: 'polynomial',
						hoverOpacity: 0.7,
						hoverColor: false,
						focusOn:{x: 0.5, y: 0.5, scale: 1.0},
						zoomMin:0.85,
						markerStyle: {initial: {fill: '#0f77bd', stroke: '#125b8c', r: 6}},
						backgroundColor: '#fff',
						regionStyle:{initial: {fill: '#777', "fill-opacity": 0.7, stroke: '#f7f9fe', "stroke-width": 0, "stroke-opacity": 0},
						hover: {"fill-opacity": 0.8},
						selected: {fill: 'yellow'}},
						markers: markers, 
						style: {fill: 'rgba(0,0,255,0.1)', r:30},
						onMarkerClick: function(events, index) {
						var MissionName = markers[index].name;
						var MissionDetail = '\
						<div class="panel panel-default panel-map-margin left"> \
							<div class="panel-heading dark-blue-bg"><h4 class="panel-title mb0 pb0">\
								<i class="fa fa-globe"></i>'+MissionName.toUpperCase()+'</h4>\
							</div>\
							<div class="panel-body pt5">\
								<div class="col-md-12 pl0 pr0 ml0 mr0">\
									<h4>Brief Mission Synopsis</h4>\
									<p>The '+markers[index].name+' is located in '+markers[index].city+', '+markers[index].country+', and is managed locally by '+markers[index].rtitle+' \
									'+markers[index].rname+' '+markers[index].rsurname+' in the capacity of Revenue Authority Manager.</p>\
									<p>The '+markers[index].name+' runs from '+markers[index].dateStart+' to '+markers[index].dateEnd+'.</p>\
									</div>\
							</div>\
						</div>';
							swal({
							  html: MissionDetail,
							  padding: 10,
							  showCancelButton: true,
							  confirmButtonClass: 'btn btn-primary mr5 mb10',
							  confirmButtonText: 'View this Mission',
							  cancelButtonClass: 'btn btn-primary mr5 mb10',							  
							  cancelButtonText: 'Close this Window',
							  closeOnConfirm: false
							},
							function(){
							  var url = markers[index].weburl; $(location).attr('href',url);
							});
							}
					});
				}
		});

		
});