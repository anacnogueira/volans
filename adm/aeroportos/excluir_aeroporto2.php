<?
include("../../bd/conexao.php");
include("../sessao.php");

$id_aeroporto=@$_POST["key"];

	
		$strsql = "DELETE FROM aeroporto WHERE id_aeroporto='".$id_aeroporto."'";
		$resultado =	mysql_query($strsql) or die(mysql_error());
		mysql_close($conn);
		header("Location: lista_aeroporto.php");
		
?>

	
