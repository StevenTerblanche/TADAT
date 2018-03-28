$(document).ready(function() {
	$.ajax({
		async:false, dataType: 'json', url:'https://e-tadat.org/ajax/getGlossary/',
		success : function(data){
			var objGlossary = data;
			for (var key in objGlossary){
				if (objGlossary.hasOwnProperty(key)) {
					var finder = objGlossary[key]["term"];
					var glossaryTerm = objGlossary[key]["description"];
					var regex = new RegExp(finder, "gi");
					findAndReplaceDOMText(document.getElementById('glossary-content'),{find: regex, wrap: 'span'},glossaryTerm);
				}
			}
		}
	});

    //------------- Bootstrap tooltips -------------//
    $("[data-toggle=tooltip]").tooltip ({container:'body'});
    $(".tip").tooltip ({placement: 'top', container: 'body'});
    $(".tipR").tooltip ({placement: 'right', container: 'body'});
    $(".tipB").tooltip ({placement: 'bottom', container: 'body'});
    $(".tipL").tooltip ({placement: 'left', container: 'body'});
    //------------- Bootstrap popovers -------------//
    $("[data-toggle=popover]").popover ();
});	
