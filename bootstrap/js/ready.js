//***************************
//Catch Fully loaded
//****************************************************************
var checkExist = setInterval(function() {
   if ($('#pcb_view').length) {
		console.log("Fully Loaded"); 
		//GoTo Layer TOP
		
		$('head script[src*="base.js"]').remove();
		$('head script[src*="ready.js"]').remove();
		let pcb_css_property = { "display": "block", "color": "green", "font-size": "20px" }  ;	$("#pcb_view").css(pcb_css_property);
		$("#loaderDiv").html("");
		window.GeXsizeFromSvg = $(pcb_view).attr("xx"); window.GeYsizeFromSvg = $(pcb_view).attr("yy");
		if(GeXsizeFromSvg && GeYsizeFromSvg) {
				document.getElementById("pcb_div").style.width=GeXsizeFromSvg+"px"; document.getElementById("pcb_div").style.height=GeYsizeFromSvg+"px";
			}
			else { console.log("WARNING : Can't retreive width and height from svg file."); }
		
		document.getElementById("viewer_panel").style.overflow="auto";
		document.getElementById("viewer_div").style.overflow="auto";
		

		
		var BarProgress = document.getElementById("amigapcb-info-modal");
		BarProgress.setAttribute("style", "display: none;") ;
		document.getElementById("amigapcb-info-modal").classList = "modal fade";
		
		include("bootstrap/js/custom.js");
		clearInterval(checkExist); }}, 500); // check every 100ms
		
//****************************************************************