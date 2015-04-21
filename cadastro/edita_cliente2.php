<?
include("../bd/conexao.php");
include("sessao.php");

$key=$_POST["key"];
$tkey = "" . $key . "";

$cidade=$_POST['x_cidade'];
$estado=$_POST['x_estado'];
$pais=$_POST['x_pais'];
$telefone=$_POST['x_telefone'];
$permite_pub=$_POST['x_publicidade'];
		
	     // update
		 $updateSQL = "UPDATE cliente SET
		 									cidade='".$cidade. "'," .
											"estado='".$estado. "'," .
											"pais='".$pais. "'," .
											"telefone='".$telefone. "'," .
											"permite_pub='".$permite_pub. "' " .
															
					"WHERE id_user=".$tkey;							
		
  	$rs = mysql_query($updateSQL, $conn) or die(mysql_error());
		
		
		
		
		//echo "<br>rs=$updateSQL";
		
		header("location: index.php");
		
?>
