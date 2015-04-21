<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<?
$id_user=@$_POST["key"];

	
		$strsql = "DELETE FROM cliente WHERE id_user='".$id_user."'";
		$resultado =	mysql_query($strsql) or die(mysql_error());
		mysql_close($conn);
		header("Location: lista_clientes.php");
		
?>

	
