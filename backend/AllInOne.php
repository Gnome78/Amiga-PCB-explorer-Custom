<?php
//Version 4.9
//*************

$GLOBALS['dbname'] = $_POST['PCBREV']; 
include ("ConnectOnceToMyDB.php");


switch($_POST['comm'])
{
//*******************************************************************************************************************************************************************************************************
 case 'listover':
	$SEC_VALUE = $_POST['line'];

	if ( $SEC_VALUE == "" ) { echo "Input Error" ; break ;}

	$instance = ConnectOnceToMyDB::getInstance();
	$conn = $instance->getConnection();

	// Check connection
	if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
	mysqli_set_charset($conn,"utf8");

	$sql = "SELECT * FROM FULL_SET WHERE _LINE = '$SEC_VALUE' ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	echo "<div id=\"listview_" .$SEC_VALUE. "\" style=\"position: absolute; width: 400px; height: auto; display: none\">";
	echo '<div class="panel panel-info collapse" style="border: 1px solid black; display: block; border-top-left-radius: 0px; border-top-right-radius: 0px; height: auto; top: 0px; left: 0px;">';
	echo '<div>';

	echo "<div tab_id=\"" .$SEC_VALUE. "\" id=\"list_view_" .$SEC_VALUE. "_content\" role=\"tabpanel\" class=\"panel-collapse collapse in\" style=\"margin: 2px; width: calc(100% - 6px);\">";
	echo "<div class=\"table-responsive\" style=\"max-height: 250px; width: 394px;\">";
	echo "<table class=\"table table-bordered table-hover\" style=\"margin-bottom: 1px;\">";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Layer</th>";
	echo"<th>Location</th>";
	echo "<th>Part / Value</th>";
	echo "<th>Pin</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";

	while($row = $result->fetch_assoc()) {
	if ($row["_PARTVALUE"] != "-") {
	echo "<tr class=\"clickable-row\" style=\"cursor: pointer;\">";
	echo "<td>" .$row["_LAYER"]. "</td>";
	echo "<td onclick='BlinkThis(\"" .$row["_FINGER"]. "\")'>" .$row["_NAME"]. "</td>";
	echo "<td>" .$row["_PARTVALUE"]. "</td>";
	echo "<td>" .$row["_PININFO"]. "</td>";
	echo "</tr>";
       					 }
						}
	echo "</table></tbody></table></div></div>";
	echo "</div></div></div>";
	}
  	break;
//*******************************************************************************************************************************************************************************************************
 case 'searchsignal':
 	$SEC_VALUE = $_POST['searchSignal'];
	
	if ( $SEC_VALUE == "" ) { echo "Input Error" ; break ;}

	$instance = ConnectOnceToMyDB::getInstance();
	$conn = $instance->getConnection();

	// Check connection
	if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
	mysqli_set_charset($conn,"utf8");

	$sql = "SELECT * FROM FULL_SET WHERE _SIGNAL LIKE '$SEC_VALUE%' ORDER BY _SIGNAL ASC ";
	$result = $conn->query($sql);
	
		if ($result->num_rows > 0) {
	echo "<div id=\"list_view\" class=\"panel panel-info\" style=\"border: 1px solid black; display: block; width: 400px; height: auto; top: 42px; left: 1331px;\">";
	echo "<div class=\"table-responsive\" style=\"max-height: 250px; width: 100%;\">";
	echo "<table class=\"divClass table table-bordered table-hover\" style=\"margin-bottom: 1px;\">";	// onclick='SeeID()'
	echo "<thead>";
	echo "<tr>";
	echo "<th>Layer</th>";
	echo"<th>Name/Type/Pin</th>";
	echo "<th>Part Value</th>";
	echo "<th>Signal</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";

    while($row = $result->fetch_assoc()) {
       if ($row["_PART_VALUE"] != "-") {
		   echo "<tr class=\"table-row\" data-id=\"" .$row["_FINGER"]. "\" data-layer=\"" .$row["_LAYER"]. "\" style=\"cursor: pointer;\">";
	       echo "<td>" .$row["_LAYER"]. "</td>";
	       if ($row["_NAME"] != "Via") { echo "<td>" .$row["_NAME"]. " [ " .$row["_PININFO"]. " ]</td>"; echo "<td>" .$row["_PARTVALUE"]. "</td>";}
	       else { echo "<td>" .$row["_NAME"]. "" .$row["_PARTVALUE"]. "</td><td></td>"; }

	       echo "<td>" .$row["_SIGNAL"]. "</td>";
	       echo "</tr>";
        }
    }
	echo "</table></tbody></table></div></div></div></div></div>";
							}
  	break;
//*******************************************************************************************************************************************************************************************************
 case 'searchcomponent':
 	$SEC_VALUE = $_POST['searchName'];

	if ( $SEC_VALUE == "" ) { echo "Input Error" ; break ;}

	$instance = ConnectOnceToMyDB::getInstance();
	$conn = $instance->getConnection();

	// Check connection
	if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
	mysqli_set_charset($conn,"utf8");

	$sql = "SELECT * FROM COMPONENT WHERE ID LIKE '$SEC_VALUE%' OR upper(PART_VALUE) LIKE '$SEC_VALUE%' ORDER BY ID ASC ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	echo "<div id=\"list_view\" class=\"panel panel-info\" style=\"border: 1px solid black; display: block; width: 400px; height: auto; top: 42px; left: 1331px;\">";
	echo "<div class=\"table-responsive\" style=\"max-height: 250px; width: 100%;\">";
	echo "<table class=\"divClass table table-bordered table-hover\" style=\"margin-bottom: 1px;\">";		//onclick='SeeID()'
	echo "<thead>";
	echo "<tr bgcolor=\"#DDFFDD\" title=\"click here to select all elements\">";
	echo "<th>Layer</th>";
	echo"<th>Location</th>";
	echo "<th>Type</th>";
	echo "<th>Part / Value</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";

    while($row = $result->fetch_assoc()) {
       if ($row["PART_VALUE"] != "-") {
		   echo "<tr class=\"table-row\" data-id=\"" .$row["FINGER"]. "\" data-layer=\"" .$row["LAYER"]. "\" style=\"cursor: pointer;\">";
	       echo "<td>" .$row["LAYER"]. "</td>";
	       echo "<td>" .$row["ID"]. "</td>";
	       echo "<td>" .$row["COMPONENT"]. "</td>";
	       echo "<td>" .$row["PART_VALUE"]. "</td>";
	       echo "</tr>";
        }
    }
	echo "</table></tbody></table></div></div></div></div></div>";
							}
  	break;
 //*******************************************************************************************************************************************************************************************************
 case 'searchover':
 	$SEC_VALUE = $_POST['ID'];

	if ( $SEC_VALUE == "" ) { echo "Input Error" ; break ;}

	$yMousePos  = $_POST['X'] + 10;
	$xMousePos  = $_POST['Y'] + 10;
	$instance = ConnectOnceToMyDB::getInstance();
	$conn = $instance->getConnection();

	// Check connection
	if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
	mysqli_set_charset($conn,"utf8");

	$sql = "SELECT * FROM FULL_SET WHERE _DOT LIKE '$SEC_VALUE'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	echo "<div class=\"panel amigapcb-rooltip amigapcb-window\" style=\"display: block; opacity: 1; width: auto; height: auto; position: absolute; top: " .$xMousePos. "px; left: " .$yMousePos. "px;\">";
	echo "<div style=\"font-size: 12px; padding-left: 5px; padding-right: 5px;\">";

    while($row = $result->fetch_assoc()) {
       if ($row["_NAME"] != "Via") {
	       echo "<b>" .$row["_NAME"]. ":</b>&nbsp;" .$row["_PARTVALUE"]. "</b><br>";
	       echo "<b>Pin:</b>&nbsp;" .$row["_PININFO"]. "</b>";
	       echo "<br>" ; 
	       echo "<b>Signal:</b>&nbsp;" .$row["_SIGNAL"]. "</b>";
	       echo "</div></div>";
        }
        else
        { 
           echo "<b>" .$row["_NAME"]. ":</b>&nbsp;, <b>Signal:</b>&nbsp;" .$row["_SIGNAL"]. "</b>";
	       echo "</div></div>";
        }
    }
}
else { echo "Error : no SIGNAL find for this DOT"; exit();}
break;
//*******************************************************************************************************************************************************************************************************		
case 'traceline':
 	$SEC_VALUE = $_POST['IDD'];
	$SIDE = $_POST['SIDE'];
	$TRACEGND = $_POST['TRACEGND'];
	
	if ( $SEC_VALUE == "" ) { echo "Input Error" ; break ;}

	$instance = ConnectOnceToMyDB::getInstance();
	$conn = $instance->getConnection();

	// Check connection
	if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
	mysqli_set_charset($conn,"utf8");
	
	//Get '_LINE' in 'Dots' list. 
	$sql = "SELECT * FROM FULL_SET WHERE _DOT LIKE '${SEC_VALUE}'";
	$result = $conn->query($sql);
	if ($result->num_rows == 0) { echo "Error : no Data for this DOT : " .$SEC_VALUE. " on Database" .$GLOBALS['dbname']. ""; exit(); }
	
	//If valid reply, then set the _LINE to LINE retrieved
    while($row = $result->fetch_assoc()) { if ($row["_LINE"] != "") { $LINE = $row["_LINE"]; $SIGNAL = $row["_SIGNAL"]; $SIGNAL_LINE = $row["SIGNAL_LINE"]; }}

	//Get All Data Line for this 'LINE'.
	$sql = "SELECT * FROM `LINE` WHERE _LINE = '$LINE'";
		
	$result = $conn->query($sql);
	if ($result->num_rows == 0) { echo "Error : no Data for this DOT : " .$SEC_VALUE. " on Database " .$GLOBALS['dbname']. ""; exit(); }
	
    while($row = $result->fetch_assoc()) {
       if ($row["_LINE"] != "") {
			echo "<div NAME_SIGNAL=\"" .$SIGNAL. "\" style=\"visibility:hidden;\" ";
			
			if ($SIDE == "TOP" && $LINE == "LINE1" && $TRACEGND == "true") { echo "LINETOP=\"" .$row["LINETOP"]. "\" "; echo "LINEBOT=\"\""; }
			if ($SIDE == "BOT" && $LINE == "LINE1" && $TRACEGND == "true") { echo "LINETOP=\"\" "; echo "LINEBOT=\"" .$row["LINEBOT"]. "\" "; }
			if ($LINE != "LINE1") { echo "LINETOP=\"" .$row["LINETOP"]. "\" "; echo "LINEBOT=\"" .$row["LINEBOT"]. "\" "; }
			
			if ($TRACEGND == "false" && $LINE == "LINE1") { 
			echo "flash_BOT=\"\" flash_TOP=\"\" flash_SMT=\"\" flash_SMB=\"\" flash_CPT=\"\" flash_CPB=\"\" PAD_TOP=\"\" PAD_BOT=\"\" DOT_CLICKed=\"\" LINE=\"\""; }
			else {
			echo "flash_BOT=\"" .$row["flash_BOT"]. "\" ";
			echo "flash_TOP=\"" .$row["flash_TOP"]. "\" ";
			echo "flash_SMT=\"" .$row["flash_SMT"]. "\" ";
			echo "flash_SMB=\"" .$row["flash_SMB"]. "\" ";
			echo "flash_CPT=\"" .$row["CPT"]. "\" ";
			echo "flash_CPB=\"" .$row["CPB"]. "\" ";
			echo "PAD_TOP=\"" .$row["PAD_TOP"]. "\" ";
			echo "PAD_BOT=\"" .$row["PAD_BOT"]. "\" ";
			echo "DOT_CLICKed=\"" .$row["_DOT"]. "\" ";
			echo "LINE=\"" .$row["_LINE"]. "\" ";
			}
				
			echo ">";
			echo "</div></div></div>\n";
        }
    }
    echo "</div>\n";

break;
//*******************************************************************************************************************************************************************************************************
case 'removeline':
 	$SEC_VALUE = $_POST['IDD'];

	if ( $SEC_VALUE == "" ) { echo "Input Error" ; break ;}

	$instance = ConnectOnceToMyDB::getInstance();
	$conn = $instance->getConnection();

	// Check connection
	if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
	mysqli_set_charset($conn,"utf8");

	//Get All Data Line for this 'LINE'.
	$sql = "SELECT * FROM `LINE` WHERE _LINE = '$SEC_VALUE'";
	
	$result = $conn->query($sql);
	if ($result->num_rows == 0) { echo "Error : no Data for the LINE : " .$SEC_VALUE. " on Database " .$GLOBALS['dbname']. ""; exit(); }
	
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
       if ($row["_LINE"] != "") {      	   
			echo "LINETOP=\"" .$row["LINETOP"]. "\" ";
			echo "LINEBOT=\"" .$row["LINEBOT"]. "\" ";
			echo "flash_BOT=\"" .$row["flash_BOT"]. "\" ";
			echo "flash_TOP=\"" .$row["flash_TOP"]. "\" ";
			echo "flash_SMT=\"" .$row["flash_SMT"]. "\" ";
			echo "flash_SMB=\"" .$row["flash_SMB"]. "\" ";
			echo "flash_CPT=\"" .$row["CPT"]. "\" ";
			echo "flash_CPB=\"" .$row["CPB"]. "\" ";
			echo "PAD_TOP=\"" .$row["PAD_TOP"]. "\" ";
			echo "PAD_BOT=\"" .$row["PAD_BOT"]. "\" ";
			echo "LINE=\"" .$row["_LINE"]. "\" "; 
        }
    }
}
else { echo "Error : no Data Found"; }
break;
//*******************************************************************************************************************************************************************************************************
default :
	echo 'Access denied';
	break;
}
//*******************************************************************************************************************************************************************************************************

?>