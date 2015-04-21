<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<?
$id_voo=@$_POST["key"];

	
		$strsql = "DELETE FROM voo WHERE id_voo='".$id_voo."'";
		$resultado =	mysql_query($strsql) or die(mysql_error());
		mysql_close($conn);
		header("Location: lista_voo.php");
		
?>

	
