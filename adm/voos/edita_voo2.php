<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<?
$key=$_POST["key"];
$tkey = "" . $key . "";

$aeronave=$_POST['x_aeronave'];
$origem=$_POST['x_origem'];
$destino=$_POST['x_destino'];
$horas=$_POST['x_horas'];
$minutos=$_POST['x_minutos'];
$distancia=$_POST['x_distancia'];
$valor=$_POST['x_valor'];
$tempo_voo=$horas.":".$minutos;	
	     // update
		 $updateSQL = "UPDATE voo SET
		 									id_aeronave='".$aeronave. "'," .
											"origem='".$origem. "'," .
											"destino='".$destino. "'," .
											"tempo_voo='".$tempo_voo. "'," .
											"distancia='".$distancia. "'," .
											"valor='".$valor. "' " .
											"WHERE id_voo=".$tkey;							
		
  	$rs = mysql_query($updateSQL, $conn) or die(mysql_error());
		
		
		
		
		//echo "<br>rs=$updateSQL";
		
		header("location: lista_voo.php");
		
?>
