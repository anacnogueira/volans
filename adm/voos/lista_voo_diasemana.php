<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<? include("../../funcoes/conversor_data.php"); ?>
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
<table cellpadding="0" cellspacing="0" align="right">
<tr>

<?	$query="SELECT * FROM administrador WHERE nome='".$_SESSION['x_nome']."'";
$resultado=mysql_query($query);
$x_resultado = mysql_result($resultado, 0, "permissao"); 
if(($x_resultado==1) || ($x_resultado==2)){
?>
 <table width="779" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td width="50" rowspan="2"><img src="../fatias/asa_azul.gif" width="42" height="34" hspace="0" vspace="0" align="bottom" class="img"></td>
    <td colspan=3> </td>
  </tr>
  <tr> 
    <td width="639" align="left" valign="bottom"> <h1 class="tit_administrador">Gerenciamento de Vôos Semanais</h1></td>
    <td width="91" align="left" valign="middle"><select name="menu1" onChange="MM_jumpMenu('parent',this,0)">
      <option value="#">selecione...</option>
      <option value="lista_voo.php">V&ocirc;os</option>
      <option value="lista_voo_data.php">V&ocirc;os Marcados</option>
    </select>
</form></td>
  </tr>
  <tr>
<td colspan="3" align="right">
<a href="insere_voo_diasemana.php"><img src="../../icones/adm/i_adicionar.gif" width="81" height="19" border="0"></a>

  
</td>
</tr>
</table>
<?
}
?>
</tr>
</table>

<br>
<table border="0" cellpadding="0" cellspacing="1" width="779">
  <tr align='center'> 
    <td width="72"><b>ID</b></td>
    <td width="77"><b>V&ocirc;o </b></td>
    <td colspan="2"><b>Programa&ccedil;&atilde;o</b></td>
    <td width="51"><b>Hora</b></td>
    <td colspan="7"><b>Dia da semanha</b></td>
    <td width="73">&nbsp;</td>
    <td width="79">&nbsp;</td>
  </tr>
  <tr align='center' bgcolor="#EFEFEF"> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="84"><b>de</b></td>
    <td width="73"><b>at&eacute;</b></td>
    <td>&nbsp;</td>
    <td width="34"><b>S</b></td>
    <td width="34"><b>T</b></td>
    <td width="34"><b>Q</b></td>
    <td width="34"><b>Q</b></td>
    <td width="34"><b>S</b></td>
    <td width="34"><b>S</b></td>
    <td width="34"><b>D</b></td>
    <td>&nbsp;</td>

  </tr>
  <?
  
  function semana($dia,$pos){
    $sem= $dia{$pos};
	if($sem=='0'){
	$select=" ";
	
	}
	else{
	 $select="X";
	 }
	return $select;
    }
	
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
$query = "SELECT * FROM voo_dia_semana LIMIT $inicio,$maximo";
	$result=mysql_query($query,$conn) or die(mysql_error());
	$t=0;
	while ($linha = mysql_fetch_array($result)){

$id_dia_semana=$linha['id_dia_semana'];
$id_voo=$linha['id_voo'];
$de=$linha['de'];
$ate=$linha['ate']; 
$hora=$linha['hora']; 
$dia_semana=$linha['dia_semana'];


$t++;
	
            if ($t % 2 == 0) {
			$cor="#EFEFEF";
			}
            else {
			  $cor="#CCCCCC";
			} 

echo "
<tr align='center' bgcolor=$cor>
    <td width='80'><p>".$id_dia_semana."</p></td>
    <td><a href=\"#\" class='link2' onclick=\"window.open('lista_voos_detalhes.php?key=".$id_voo."','detalhes','width=300, height=100, top=200, left=120')\">$id_voo</a></td>
    <td><p>".conversor($de)."</p</td>
    <td><p>".conversor($ate)."</p></td>
    <td><p>".substr($hora,0,5)."</p</td>
    <td><p>".semana($dia_semana,0)."</p</td>
    <td><p>".semana($dia_semana,1)."</p</td>
    <td><p>".semana($dia_semana,2)."</p</td>
    <td><p>".semana($dia_semana,3)."</p</td>
    <td><p>".semana($dia_semana,4)."</p</td>
	<td><p>".semana($dia_semana,5)."</p</td>
    <td><p>".semana($dia_semana,6)."</p</td>";

/*
if(($x_resultado==1) || ($x_resultado==2)){
echo "<td>
<form name='edita' method='post' action='edita_voo_diasemana.php'>
<input type='hidden' name='key' value=\"$id_dia_semana\">
<input type='submit' name='editar' value='editar'></form>
</td>";
}
*/

if($x_resultado==1){
echo "<td>
<form name='excluir' action='excluir_voo_diasemana.php'  method='post'>
<input type='hidden' name='key' value=\"$id_dia_semana\">
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
$p_query=mysql_query("SELECT * FROM voo_dia_semana LIMIT $p_ini,$maximo"); 
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