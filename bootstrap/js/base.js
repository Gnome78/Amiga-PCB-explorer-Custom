window.listeLine="";

//Set based value
window.SIDE="TOP";
window.L_COPPER=1;
window.L_MASK=1;
window.L_SILK=1;
window.L_DRILL=1;
window.L_HOLES=1;
window.L_INNER=1;
window.xMousePos="0";
window.yMousePos="0";
	
//Colors lits declaration.
const ListCol = [
{color: '#ACD9E5', font: '#000000', token: '0'},
{color: '#800000', font: '#FFFFFF', token: '0'},
{color: '#FF80FF', font: '#000000', token: '0'},
{color: '#827E17', font: '#FFFFFF', token: '0'},
{color: '#00137E', font: '#FFFFFF', token: '0'},
{color: '#7E087E', font: '#FFFFFF', token: '0'},
{color: '#018180', font: '#FFFFFF', token: '0'},
{color: '#C0C0C0', font: '#000000', token: '0'},
{color: '#808080', font: '#FFFFFF', token: '0'},
{color: '#FF0000', font: '#FFFFFF', token: '0'},
{color: '#38FE39', font: '#000000', token: '0'},
{color: '#FFFB38', font: '#000000', token: '0'},
{color: '#0031FB', font: '#FFFFFF', token: '0'},
{color: '#FB1CFA', font: '#FFFFFF', token: '0'},
{color: '#06FFFF', font: '#000000', token: '0'},
{color: '#F96B1E', font: '#FFFFFF', token: '0'} ];
//*******************************************************************************************************************************************
function include(file) { 
var script = document.createElement('script');
script.src = file;
script.type = 'text/javascript';
script.defer = true;
document.getElementsByTagName('head').item(0).appendChild(script); }
//*******************************************************************************************************************************************
function LoadPCB_rev(file) { 

//$('#loaderDiv').html(" Please allow some time for PCB to finish Loading ! "); $('#pcb_div').html("");
	
	$.ajax({
		type: 'post',
		url: 'backend/downloadPCB.php', data: { comm:'loadpcb', PCBREV:file, },
		success: function (response)
			{
			let PCB_BOARD_NAME = file.replace(/_/g, ' ');	
			$("#board-name").html(PCB_BOARD_NAME);
			$('#pcb_div').html(response);
			include("bootstrap/js/ready.js");
			var BarProgress = document.getElementById("amigapcb-info-modal");
			BarProgress.setAttribute("style", "display: block; padding-right: 17px;") ;
			document.getElementById("amigapcb-info-modal").classList = "modal fade in";
			}
})}
//*******************************************************************************************************************************************