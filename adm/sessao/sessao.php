<?
	session_start();

	if((!isset($_SESSION['x_nome']))&& (!isset($_SESSION['x_senha'])))
	{
	header("location:../login.php");
	}	

?>
