<?
//Local
/*
$host="localhost";
$user="root";
$pass="";
$db="volans";
*/

//Remoto

$host="localhost";
$user="anacnogu_anac";
$pass="m3l3ka";
$db="'anacnogu_volans";

$conn = mysql_connect($host,$user,$pass);

	$st = mysql_select_db($db, $conn);
	if (!$st) {
	   echo mysql_error();
	}

?>
