<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<?
$id_aeronave=$_POST["key"];

	
		$strsql = "DELETE FROM aeronaves WHERE id_aeronave='".$id_aeronave."'";
		$resultado =	mysql_query($strsql) or die(mysql_error());
		mysql_close($conn);
		header("Location: lista_aeronave.php");
		
?>

	
