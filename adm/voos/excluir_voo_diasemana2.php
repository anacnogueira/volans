<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<?
$id_voo=$_POST["key"];

	
		$strsql = "DELETE FROM voo_dia_semana WHERE id_dia_semana='".$id_voo."'";
		$resultado =	mysql_query($strsql,$conn) or die(mysql_error());
		
		
		$strsql_a="DELETE FROM voo_data WHERE id_voo_semana='".$id_voo."'";
		$resultado2 =	mysql_query($strsql_a) or die(mysql_error());
		
		header("Location: lista_voo_diasemana.php");
		
		
		mysql_close($conn);
		
?>

	
