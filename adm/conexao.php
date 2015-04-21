<?
$conn = mysql_connect("localhost","root", "");
	
	$st = mysql_select_db("volans", $conn);
	if (!$st) {
	   echo mysql_error();
	} 
?>
