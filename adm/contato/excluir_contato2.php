<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<?
$id_contato=@$_POST["key"];


		$strsql = "DELETE FROM contato WHERE id_contato='".$id_contato."'";
		$resultado =	mysql_query($strsql) or die(mysql_error());
		mysql_close($conn);
		header("Location: lista_contato.php");
		
?>

