<?php

$GLOBALS['dbname'] = $_POST['PCBREV']; 
include "ConnectOnceToMyDB.php";

switch($_POST['comm'])
{
 case 'loadpcb':
	$SEC_VALUE = $_POST['PCBREV'];

	if ( $SEC_VALUE == "" ) { echo "Input error" ; break ;}

	$instance = ConnectOnceToMyDB::getInstance();
	$conn = $instance->getConnection();

	// Check connection
	if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
	mysqli_set_charset($conn,"utf8");

	$sql = "SELECT * FROM DATA_SVG WHERE 1 ";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) { while($row = $result->fetch_assoc()) { if ($row["_LINE"] != "-") { echo "" .$row["_LINE"]. "\n"; }}}
	break;
}
?>