<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<html>
<head>
<title>Gerenciamento de V&ocirc;os</title>
<link href="../../interface/interface.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
</head>
<body>
<? include ("../topo/topo_adm.php"); ?>
 

<table cellpadding="0" cellspacing="0" align="right" border="0">
<?
	$query="SELECT * FROM administrador WHERE nome='".$_SESSION['x_nome']."'";
$resultado=mysql_query($query);
$x_resultado = mysql_result($resultado, 0, "permissao"); 
if(($x_resultado==1) || ($x_resultado==2)){
?>
 <table width="779" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td width="50" rowspan="2"><img src="../fatias/asa_azul.gif" width="42" height="34" hspace="0" vspace="0" align="bottom" class="img"></td>
    <td> </td>
  </tr>
  <tr> 
    <td width="639" align="left" valign="bottom"> <h1 class="tit_administrador">Gerenciamento 
      de Cadastro de Vôos</h1></td>
    <td width="91" align="left" valign="middle"> <select name="menu1" onChange="MM_jumpMenu('parent',this,0)">
      <option value="#">selecione...</option>
      <option value="lista_voo_diasemana.php">V&ocirc;os semanais</option>
      <option value="lista_voo_data.php">V&ocirc;os Marcados</option>
    </select>
</form></td>
  </tr>

<?
}
?>
<tr>
<td colspan="3" align="right">
<a href="insere_voo.php"><img src="../../icones/adm/i_adicionar.gif" width="81" height="19" border="0"></a>

 
</td>
</tr>
<br>
<table border="0" cellpadding="0" cellspacing="1" width="779">
  <tr align='center'>
<td><b>ID</b></td>
<td><b>Aeronave</b></td>
<td><b>Origem</b></td>
<td><b>Destino</b></td>
<td><b>Tempo</b></td>
<td><b>Distância</b></td>
<td><b>Valor</b></td>
<td width="80">&nbsp;</td>
<td width="80">&nbsp;</td>
</tr>
<?

if(isset($_REQUEST["pagina"])=="") { 
  $pagina="1"; 
}else{ 
     $pagina=$_REQUEST["pagina"]; 
} 
// quantidade de registro por paginação 
$maximo="7";

// Variáveis de contagem de registro 
$inicio=$pagina-1; 
$inicio=$maximo*$inicio; 

// seleção de registro com limitação da variáveis de contagem
$query = "SELECT *
				FROM voo,aeronaves
				WHERE voo.id_aeronave=aeronaves.id_aeronave ORDER BY id_voo 
				LIMIT $inicio,$maximo";
	$result=mysql_query($query,$conn);
	$t=0;
	while ($linha = mysql_fetch_array($result)){

$id_voo=$linha['id_voo'];
$aeronave=$linha['modelo'];
$origem=$linha['origem'];
$destino=$linha['destino']; 
$tempo_voo=$linha['tempo_voo']; 
$distancia=$linha['distancia'];
$valor=$linha['valor'];

$t++;
	
            if ($t % 2 == 0) {
			$cor="#EFEFEF";
			}
            else {
			  $cor="#CCCCCC";
			} 

echo "
<tr align='center' bgcolor='$cor'>
<td><p>$id_voo</p></td>
<td><p>$aeronave</p></td>
<td><p>$origem</p></td>
<td><p>$destino</p></td>
<td><p>".substr($tempo_voo,0,5)."</p></td>
<td><p>$distancia</p></td>
<td><p>R$ ".number_format($valor,2,",",".")."</p></td>";


if(($x_resultado==1) || ($x_resultado==2)){
echo "<td>
<form name='edita' method='post' action='edita_voo.php'>
<input type='hidden' name='key' value=\"$id_voo\">
<input type='submit' name='editar' value='editar'></form>
</td>";
}

if($x_resultado==1){
echo "<td>
<form name='excluir' action='excluir_voo.php'  method='post'>
<input type='hidden' name='key' value=\"$id_voo\">
<input type='submit' name='excluir' value='excluir' ></form>
</td>";
}
echo "</tr>";
}


?>

</table>
</form>
<?
// Calculando pagina anterior 
$menos=$pagina-1; 

// Calculando pagina posterior 
$mais=$pagina+1; 

// Calculos para a mostragem de paginas 
$p_ini=$mais-1; 
$p_ini=$maximo*$p_ini; 

// Querys para a mostragem de paginas 
$p_query=mysql_query("SELECT * FROM voo LIMIT $p_ini,$maximo"); 
$p_total=mysql_num_rows($p_query); 
echo "<div align='center'>";
// Mostragem de pagina 
if($menos>0) { 
   echo "<a href=\"?pagina=$menos\" class='link2'><img src='../../icones/adm/i_anterior.gif' border='0' hspace='5'>Anterior</a> "; 
} if($p_total>0) { 
   echo  "<a href=\"?pagina=$mais\"  class='link2'>Próximo<img src='../../icones/adm/i_proximo.gif' border='0' hspace='5'></a>"; 
} 
echo "</div>";
?> 
</body>
</html>