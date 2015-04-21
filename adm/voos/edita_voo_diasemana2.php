<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<?
$key=$_POST["key"];
$tkey = "" . $key . "";

$id_voo=$_POST['x_id_voo'];
$dia_de=$_POST['x_dia_de'];
$mes_de=$_POST['x_mes_de'];
$ano_de=$_POST['x_ano_de'];
$dia_ate=$_POST['x_dia_ate'];
$mes_ate=$_POST['x_mes_ate'];
$ano_ate=$_POST['x_ano_ate'];
$horas=$_POST["x_horas"];
$minutos=$_POST["x_minutos"];

$data_de=$ano_de."-".$mes_de."-".$dia_de;
$data_ate=$ano_ate."-".$mes_ate."-".$dia_ate;
$hora_completa=$horas.":".$minutos;

if($_POST["Seg"]!=''){
$sem="S";
}
else{
$sem.=0;
}

if($_POST["Ter"]!=''){
$sem.="T";
}
else{
$sem.=0;
}

if($_POST["Qua"]!=''){
$sem.="Q";
}
else{
$sem.=0;
}
if($_POST["Qui"]!=''){
$sem.="Q";
}
else{
$sem.=0;
}

if($_POST["Sex"]!=''){
$sem.="S";
}
else{
$sem.=0;
}

if($_POST["Sab"]!=''){
$sem.="S";
}
else{
$sem.=0;
}

if($_POST["Dom"]!=''){
$sem.="D";
}
else{
$sem.=0;
}	
	     // update
		 $updateSQL = "UPDATE voo_dia_semana SET
		 									id_voo='".$id_voo. "'," .
											"de='".$data_de. "'," .
											"ate='".$data_ate. "'," .
											"hora='".$hora_completa. "'," .
											"dia_semana='".$sem. "' " .											
					"WHERE id_dia_semana=".$tkey;							
		
  	$rs = mysql_query($updateSQL, $conn) or die(mysql_error());
		
		
		
		
		//echo "<br>rs=$updateSQL";
		
		header("location: lista_voo_diasemana.php");
		
?>
