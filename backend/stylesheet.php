<?php
$style = $_GET['style'];

switch($style){

case 'red':
	$pcb_view_background_color="#301010";
	$pcb_background_background_color="#701010";
	$frame_fill="#701010";
	$board_stroke="#600707";
	$rect_board_fill="#701010";
	$circle_board_fill="#600707";
	$path_draw_stroke="#c03030";
	$path_pads_stroke="#D0D0D0";
	$circle_draw_fill="#C03030";
	$circle_hi_fill="#FFFA20";
	$rect_draw_fill="#C03030";
	$circle_draw2_fill="#902020";
	$rect_draw2_fill="#902020";
	$path_draw2_stroke="#902020";
	$trace_hi_stroke="#F0F020";
	$trace_hi2_stroke="#C0C020";
	$trace_xray_stroke="#FFFF30";
	$pads_fill="#D0D0D0";
	$pads_hi_fill="#FAFA20";
	$pads_sel_hover="#FAFA20";
break;

case 'green':
	$pcb_view_background_color="#103010";
	$pcb_background_background_color="#107010";
	$frame_fill="#107010";
	$board_stroke="#076707";
	$rect_board_fill="#107010";
	$circle_board_fill="#076707";
	$path_draw_stroke="#30c030";
	$path_pads_stroke="#D0D0D0";
	$circle_draw_fill="#30c030";
	$circle_hi_fill="#FFFF00";
	$rect_draw_fill="#30c030";
	$circle_draw2_fill="#209020";
	$rect_draw2_fill="#209020";
	$path_draw2_stroke="#209020";
	$trace_hi_stroke="#F0F020";
	$trace_hi2_stroke="#C0C020";
	$trace_xray_stroke="#FFFF30";
	$pads_fill="#D0D0D0";
	$pads_hi_fill="#FFFF00";
	$pads_sel_hover="#FAFA20";
break;

case 'blue':
	$pcb_view_background_color="#101030";
	$pcb_background_background_color="#101070";
	$frame_fill="#101070";
	$board_stroke="#070767";
	$rect_board_fill="#101070";
	$circle_board_fill="#070767";
	$path_draw_stroke="#3030c0";
	$path_pads_stroke="#D0D0D0";
	$circle_draw_fill="#3030c0";
	$circle_hi_fill="#FFFA20";
	$rect_draw_fill="#3030c0";
	$circle_draw2_fill="#202090";
	$rect_draw2_fill="#202090";
	$path_draw2_stroke="#202090";
	$trace_hi_stroke="#F0F020";
	$trace_hi2_stroke="#C0C020";
	$trace_xray_stroke="#FFFF30";
	$pads_fill="#D0D0D0";
	$pads_hi_fill="#FFFF00";
	$pads_sel_hover="#FAFA20";
break;

case 'proto':
	$pcb_view_background_color="#201000";
	$pcb_background_background_color="#504030";
	$frame_fill="#504030";
	$board_stroke="#473727";
	$rect_board_fill="#504030";
	$circle_board_fill="#473727";
	$path_draw_stroke="#b08050";
	$path_pads_stroke="#D0D0D0";
	$circle_draw_fill="#b08050";
	$circle_hi_fill="#FFFA20";
	$rect_draw_fill="#b08050";
	$circle_draw2_fill="#806020";
	$rect_draw2_fill="#806020";
	$path_draw2_stroke="#806020";
	$trace_hi_stroke="#F0F020";
	$trace_hi2_stroke="#C0C020";
	$trace_xray_stroke="#FFFF30";
	$pads_fill="#D0D0D0";
	$pads_hi_fill="#FFFF00";
	$pads_sel_hover="#FAFA20";
break;

case 'dark':
	$pcb_view_background_color="#000000";
	$pcb_background_background_color="#101010";
	$frame_fill="#101010";
	$board_stroke="#070707";
	$rect_board_fill="#101010";
	$circle_board_fill="#070707";
	$path_draw_stroke="#404040";
	$path_pads_stroke="#D0D0D0";
	$circle_draw_fill="#404040";
	$circle_hi_fill="#FFFA20";
	$rect_draw_fill="#404040";
	$circle_draw2_fill="#202020";
	$rect_draw2_fill="#202020";
	$path_draw2_stroke="#202020";
	$trace_hi_stroke="#F0F020";
	$trace_hi2_stroke="#C0C020";
	$trace_xray_stroke="#FFFF30";
	$pads_fill="#D0D0D0";
	$pads_hi_fill="#FFFF00";
	$pads_sel_hover="#FAFA20";
break;
}

header("Content-type: text/css");
echo "
/*Version 4.6b */
	
path.trace_hi {
	fill:			none;
	stroke:			${trace_hi_stroke};
	stroke-linecap:		round;
	stroke-linejoin:	round;
	stroke-opacity:		1.0;
	fill-opacity:		1.0;
}

#pcb_view {
	background-color:	${pcb_view_background_color};
}

.pcb_background {
	background-color:	${pcb_background_background_color};
}

.frame {
	fill:			${frame_fill};
	stroke:			black;
	stroke-linejoin:	round;
}
	
.board {
	fill:			none;
	stroke:			${board_stroke};
	stroke-linecap:		round;
	stroke-linejoin:	round;
	stroke-opacity:		1.0;
	fill-opacity:		1.0;
}

rect.board {
	fill:			${rect_board_fill};
}

circle.board {
	fill:			${circle_board_fill};
}

path.draw {
	fill:			none;
	stroke:			${path_draw_stroke};
	stroke-linecap:		round;
	stroke-linejoin:	round;
	stroke-opacity:		1.0;
	fill-opacity:		1.0;
}

path.pads {
	stroke-opacity:		1.0;
	fill-opacity:		1.0;
	stroke:			${path_pads_stroke};
	fill:			none;
}

circle.draw {
	fill:			${circle_draw_fill};
	stroke-width:		72;
}

circle.hi {
	fill:			${circle_hi_fill};
	stroke-width:		72;
}

rect.draw {
	fill:			${rect_draw_fill};
	stroke-width:		72;
}

circle.draw2 {
	fill:			${circle_draw2_fill};
	stroke-width:		72;
}

rect.draw2 {
	fill:			${rect_draw2_fill};
	stroke-width:		72;
}

path.draw2 {
	fill:			none;
	stroke:			${path_draw2_stroke};
	stroke-linecap:		round;
	stroke-linejoin:	round;
	stroke-opacity:		1.0;
	fill-opacity:		1.0;
}


.trace_hi2 {
	fill:			none;
	stroke:			${trace_hi2_stroke};
	stroke-linecap:		round;
	stroke-linejoin:	round;
	stroke-opacity:		1.0;
	fill-opacity:		1.0;
	stroke-dasharray:	1,4;
}

.trace_xray {
	fill:			none;
	stroke:			${trace_xray_stroke};
	stroke-linecap:		round;
	stroke-linejoin:	round;
	stroke-opacity:		0.6;
	fill-opacity:		0.6;
	stroke-dasharray:	4,4;
}

.pads {
	stroke-opacity:		1.0;
	fill-opacity:		1.0;
	fill:			${pads_fill};
	pointer-events:		all;
}

.pads_hi {
	fill:			${pads_hi_fill};
	cursor:			pointer;
}

.selhover {
	fill:			${pads_sel_hover};
	cursor:			pointer;
}

.pads_xray {
	fill:			#FFFF30;
	stroke-linecap:		round;
	stroke-linejoin:	round;
	stroke-opacity:		0.6;
	fill-opacity:		0.4;
	stroke-dasharray:	4,4;
}

.pads_click {
	stroke-opacity:		0.0;
	fill-opacity:		0.0;
	fill:			#FF00FF;
	cursor:			pointer;
}

.silk {
	fill:			none;
	stroke:			#FFFFFF;
	stroke-linecap:		round;
	stroke-linejoin:	round;
	stroke-opacity:		1.0;
	fill-opacity:		0.0;
}

.svghidden {
	fill:			none !important;
	stroke-opacity:		0.0 !important;
	fill-opacity:		0.0 !important;
}

@keyframes silk_blink {
	0%	{ stroke: #FA2020; fill: none;    fill-opacity: 0.25; }
	50%	{ stroke: #FFFFFF; fill: #000000; fill-opacity: 0.25; }
	100%	{ stroke: #FA2020; fill: none;    fill-opacity: 0.25; }
}

path.silk_blink {
	animation: silk_blink 1s linear infinite;
}

path.draw_connect {
	fill:				none;
	stroke:				##D0D0D0;
	stroke-linecap:		round;
	stroke-linejoin:	round;
	stroke-opacity:		1.0;
	fill-opacity:		1.0;
}

";

?>
