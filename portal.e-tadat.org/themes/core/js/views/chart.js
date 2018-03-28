$(document).ready(function(){
//Legend titles
/*
var LegendOptions = [
	'POA 1 Integrity of the Registered Taxpayer Base',
	'POA 2 Effective Risk Management',
	'POA 3 Supporting Voluntary Compliance',
	'POA 4 Timely Filing of Tax Declarations',
	'POA 5 Timely Payment of Taxes',
	'POA 6 Accurate Reporting in Declarations',
	'POA 7 Effective Tax Dispute Resolution',
	'POA 8 Efficient Revenue Management',
	'POA 9 Accountability and Transparency'
];
*/
//Options for the Radar chart, other than default

var mycfg = {
	maxValue: 7,
	levels: 7,
	radius: 3,
	w: 530,
	h: 530,
	factor: 1,
	factorLegend: .85,
	radians: 2 * Math.PI,
	opacityArea: 0.5,
	ToRight: 5,
	TranslateX: 50,
	TranslateY: 30,
	ExtraWidthX: 150,
	ExtraWidthY: 150,	   
	color: d3.scale.ordinal().range(["#0a9345","#8ac543", "#6ccff5" , "#25aae0","#1175ba", "#29388f" , "#5c2e8a","#be1e2d", "#f69322" ])
//  legendColor: d3.scale.ordinal().range(["#008a36", "#48b91f", "#00a5e1", "#80b8e0", "#8099af", "#2f5379", "#897895", "#df0201", "#ff7500"])
}

//Call function to draw the Radar chart
RadarChart.draw("#chart", d, mycfg);

////////////////////////////////////////////
/////////// Initiate legend ////////////////
////////////////////////////////////////////

/*
var svg = d3.select('#body')
	.selectAll('svg')
	.append('svg')
	.attr("width", w+500)
	.attr("height", h)

//Create the title for the legend
var text = svg.append("text")
	.attr("class", "title")
	.attr('transform', 'translate(90,0)') 
	.attr("x", w + 20)
	.attr("y", 10)
	.attr("font-size", "12px")
	.attr("font-weight", "bold")	
	.attr("fill", "#404040")
	.text("TADAT RADAR CHART LEGEND");
		
//Initiate Legend	
var legend = svg.append("g")
	.attr("class", "legend")
	.attr("height", 100)
	.attr("width", 275)
	.attr('transform', 'translate(90,20)') 
	;
	//Create colour squares
	legend.selectAll('rect')
	  .data(LegendOptions)
	  .enter()
	  .append("rect")
	  .attr("x", w + 20)
	  .attr("y", function(d, i){ return i * 20;})
	  .attr("width", 13)
	  .attr("height", 13)
	  .style("fill", function(d, i){ return mycfg.legendColor(i);})
	  ;
	//Create text next to squares
	legend.selectAll('text')
	  .data(LegendOptions)
	  .enter()
	  .append("text")
	  .attr("x", w +34)
	  .attr("y", function(d, i){ return i * 20 + 9;})
	  .attr("font-size", "11px")
	  .attr("fill", "#737373")
	  .text(function(d) {return d;})
	  ;
*/

// Data Example for TADAT
/*
var d =[
		[
			{axis:"P9-28",value:4}, {axis:"P9-27",value:0}, {axis:"P9-26",value:0}, {axis:"P9-25",value:0},
			{axis:"P8-24",value:0}, {axis:"P8-23",value:0}, {axis:"P8-22",value:0},
			{axis:"P7-21",value:0},	{axis:"P7-20",value:0},	{axis:"P7-19",value:0},
			{axis:"P6-18",value:0},	{axis:"P6-17",value:0},	{axis:"P6-16",value:0},	
			{axis:"P5-15",value:0},	{axis:"P5-14",value:0}, {axis:"P5-13",value:0}, {axis:"P5-12",value:0},
			{axis:"P4-11",value:0},	{axis:"P4-10",value:0},
			{axis:"P3-9",value:0},	{axis:"P3-8",value:0},	{axis:"P3-7",value:0},
			{axis:"P2-6",value:0},	{axis:"P2-5",value:0},	{axis:"P2-4",value:0},	{axis:"P2-3",value:0},
			{axis:"P1-2",value:6},	{axis:"P1-1",value:5}				
		],
		[
			{axis:"P9-28",value:0}, {axis:"P9-27",value:0}, {axis:"P9-26",value:0}, {axis:"P9-25",value:0},
			{axis:"P8-24",value:0}, {axis:"P8-23",value:0}, {axis:"P8-22",value:0},
			{axis:"P7-21",value:0},	{axis:"P7-20",value:0},	{axis:"P7-19",value:0},
			{axis:"P6-18",value:0},	{axis:"P6-17",value:0},	{axis:"P6-16",value:0},	
			{axis:"P5-15",value:0},	{axis:"P5-14",value:0}, {axis:"P5-13",value:0}, {axis:"P5-12",value:0},
			{axis:"P4-11",value:0},	{axis:"P4-10",value:0},
			{axis:"P3-9",value:0},	{axis:"P3-8",value:0},	{axis:"P3-7",value:0},
			{axis:"P2-6",value:6},	{axis:"P2-5",value:5},	{axis:"P2-4",value:4},	{axis:"P2-3",value:3},
			{axis:"P1-2",value:6},	{axis:"P1-1",value:0}				
		],
		[
			{axis:"P9-28",value:0}, {axis:"P9-27",value:0}, {axis:"P9-26",value:0}, {axis:"P9-25",value:0},
			{axis:"P8-24",value:0}, {axis:"P8-23",value:0}, {axis:"P8-22",value:0},
			{axis:"P7-21",value:0},	{axis:"P7-20",value:0},	{axis:"P7-19",value:0},
			{axis:"P6-18",value:0},	{axis:"P6-17",value:0},	{axis:"P6-16",value:0},	
			{axis:"P5-15",value:0},	{axis:"P5-14",value:0}, {axis:"P5-13",value:0}, {axis:"P5-12",value:0},
			{axis:"P4-11",value:0},	{axis:"P4-10",value:0},
			{axis:"P3-9",value:6},	{axis:"P3-8",value:5},	{axis:"P3-7",value:4},
			{axis:"P2-6",value:6},	{axis:"P2-5",value:0},	{axis:"P2-4",value:0},	{axis:"P2-3",value:0},
			{axis:"P1-2",value:0},	{axis:"P1-1",value:0}		
		],
		[
			{axis:"P9-28",value:0}, {axis:"P9-27",value:0}, {axis:"P9-26",value:0}, {axis:"P9-25",value:0},
			{axis:"P8-24",value:0}, {axis:"P8-23",value:0}, {axis:"P8-22",value:0},
			{axis:"P7-21",value:0},	{axis:"P7-20",value:0},	{axis:"P7-19",value:0},
			{axis:"P6-18",value:0},	{axis:"P6-17",value:0},	{axis:"P6-16",value:0},	
			{axis:"P5-15",value:0},	{axis:"P5-14",value:0}, {axis:"P5-13",value:0}, {axis:"P5-12",value:0},
			{axis:"P4-11",value:6},	{axis:"P4-10",value:5},
			{axis:"P3-9",value:6},	{axis:"P3-8",value:0},	{axis:"P3-7",value:0},
			{axis:"P2-6",value:0},	{axis:"P2-5",value:0},	{axis:"P2-4",value:0},	{axis:"P2-3",value:0},
			{axis:"P1-2",value:0},	{axis:"P1-1",value:0}		
		],
		[
			{axis:"P9-28",value:0}, {axis:"P9-27",value:0}, {axis:"P9-26",value:0}, {axis:"P9-25",value:0},
			{axis:"P8-24",value:0}, {axis:"P8-23",value:0}, {axis:"P8-22",value:0},
			{axis:"P7-21",value:0},	{axis:"P7-20",value:0},	{axis:"P7-19",value:0},
			{axis:"P6-18",value:0},	{axis:"P6-17",value:0},	{axis:"P6-16",value:0},	
			{axis:"P5-15",value:6},	{axis:"P5-14",value:5}, {axis:"P5-13",value:4}, {axis:"P5-12",value:3},
			{axis:"P4-11",value:6},	{axis:"P4-10",value:0},
			{axis:"P3-9",value:0},	{axis:"P3-8",value:0},	{axis:"P3-7",value:0},
			{axis:"P2-6",value:0},	{axis:"P2-5",value:0},	{axis:"P2-4",value:0},	{axis:"P2-3",value:0},
			{axis:"P1-2",value:0},	{axis:"P1-1",value:0}		
		],
		[	
			{axis:"P9-28",value:0}, {axis:"P9-27",value:0}, {axis:"P9-26",value:0}, {axis:"P9-25",value:0},
			{axis:"P8-24",value:0}, {axis:"P8-23",value:0}, {axis:"P8-22",value:0},
			{axis:"P7-21",value:0},	{axis:"P7-20",value:0},	{axis:"P7-19",value:0},
			{axis:"P6-18",value:6},	{axis:"P6-17",value:5},	{axis:"P6-16",value:4},	
			{axis:"P5-15",value:6},	{axis:"P5-14",value:0}, {axis:"P5-13",value:0}, {axis:"P5-12",value:0},
			{axis:"P4-11",value:0},	{axis:"P4-10",value:0},
			{axis:"P3-9",value:0},	{axis:"P3-8",value:0},	{axis:"P3-7",value:0},
			{axis:"P2-6",value:0},	{axis:"P2-5",value:0},	{axis:"P2-4",value:0},	{axis:"P2-3",value:0},
			{axis:"P1-2",value:0},	{axis:"P1-1",value:0}		
		],
		[	
			{axis:"P9-28",value:0}, {axis:"P9-27",value:0}, {axis:"P9-26",value:0}, {axis:"P9-25",value:0},
			{axis:"P8-24",value:0}, {axis:"P8-23",value:0}, {axis:"P8-22",value:0},
			{axis:"P7-21",value:6},	{axis:"P7-20",value:5},	{axis:"P7-19",value:4},
			{axis:"P6-18",value:6},	{axis:"P6-17",value:0},	{axis:"P6-16",value:0},	
			{axis:"P5-15",value:0},	{axis:"P5-14",value:0}, {axis:"P5-13",value:0}, {axis:"P5-12",value:0},
			{axis:"P4-11",value:0},	{axis:"P4-10",value:0},
			{axis:"P3-9",value:0},	{axis:"P3-8",value:0},	{axis:"P3-7",value:0},
			{axis:"P2-6",value:0},	{axis:"P2-5",value:0},	{axis:"P2-4",value:0},	{axis:"P2-3",value:0},
			{axis:"P1-2",value:0},	{axis:"P1-1",value:0}		
		],
		[
			{axis:"P9-28",value:0}, {axis:"P9-27",value:0}, {axis:"P9-26",value:0}, {axis:"P9-25",value:0},
			{axis:"P8-24",value:6}, {axis:"P8-23",value:5}, {axis:"P8-22",value:4},
			{axis:"P7-21",value:6},	{axis:"P7-20",value:0},	{axis:"P7-19",value:0},
			{axis:"P6-18",value:0},	{axis:"P6-17",value:0},	{axis:"P6-16",value:0},	
			{axis:"P5-15",value:0},	{axis:"P5-14",value:0}, {axis:"P5-13",value:0}, {axis:"P5-12",value:0},
			{axis:"P4-11",value:0},	{axis:"P4-10",value:0},
			{axis:"P3-9",value:0},	{axis:"P3-8",value:0},	{axis:"P3-7",value:0},
			{axis:"P2-6",value:0},	{axis:"P2-5",value:0},	{axis:"P2-4",value:0},	{axis:"P2-3",value:0},
			{axis:"P1-2",value:0},	{axis:"P1-1",value:0}
		],

		[
			{axis:"P9-28",value:4}, {axis:"P9-27",value:6}, {axis:"P9-26",value:4}, {axis:"P9-25",value:3},
			{axis:"P8-24",value:6}, {axis:"P8-23",value:0},	{axis:"P8-22",value:0},	
			{axis:"P7-21",value:0},	{axis:"P7-20",value:0},	{axis:"P7-19",value:0},	
			{axis:"P6-18",value:0},	{axis:"P6-17",value:0},	{axis:"P6-16",value:0},	
			{axis:"P5-15",value:0},	{axis:"P5-14",value:0}, {axis:"P5-13",value:0}, {axis:"P5-12",value:0},
			{axis:"P4-11",value:0},	{axis:"P4-10",value:0},
			{axis:"P3-9",value:0},	{axis:"P3-8",value:0},	{axis:"P3-7",value:0},
			{axis:"P2-6",value:0},	{axis:"P2-5",value:0},	{axis:"P2-4",value:0},	{axis:"P2-3",value:0},
			{axis:"P1-2",value:0},	{axis:"P1-1",value:0}
		]

	];
*/
	
/*	
	console.log($('#svg-container').html());
	$.ajax({
			async:false, 
			data: form.serialize()
			data:data,	
			url:'http://e-tadat.org/reporting/test.php',
			success : function(data){
				alert('done');
			}
		});
*/


$("#form-svg").submit(function(event) {
    event.preventDefault();
	var data = '<?xml version="1.0" encoding="UTF-8" standalone="no"?><svg xmlns="http://www.w3.org/2000/svg" version="1.1" height="650" width="650">'+$('#svg-container').html()+'</svg>';
	$("#id-svg").val(data);
    var form = $(this);
    $.ajax({
      type: 'POST',
      url:'http://e-tadat.org/themes/core/js/views/par/convert_svg.php',
      data: form.serialize()
    }).done(function(data) {
      // Optionally alert the user of success here...
    }).fail(function(data) {
      // Optionally alert the user of an error here...
    });
  });

$("#form-svg").trigger('submit');



});