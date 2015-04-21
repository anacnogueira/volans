<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
 <? include ("../../funcoes/conversor_data.php"); ?>
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
	$query="SELECT * FROM administrador WHERE nome='".$_SESSION['x_nome']."'";
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
    <td width="639" align="left" valign="bottom"> <h1 class="tit_administrador">Gerenciamento de Vôos Marcados</h1></td>
    <td width="91" align="left" valign="middle">&nbsp;</td>
  </tr>
  <tr>
<td colspan="3" align="right">


  <select name="menu1" onChange="MM_jumpMenu('parent',this,0)">
      <option value="#">selecione...</option>
      <option value="lista_voo.php">V&ocirc;os</option>
      <option value="lista_voo_diasemana.php">V&ocirc;os Semanais</option>
    </select>
</form>
</td>
</tr>
</table>
<?
}
?>
</tr>
</table>

<br>
<table border="0" cellpadding="0" cellspacing="1" width="631">
  <tr align='center'>
    <td width="22"><b>ID</b></td>      
    <td width="78"><b>Data</b></td>
	<td width="78"><b>Hora</b></td>
	<td width="119"><b>Voo</b></td>          
    <td width="163"  colspan="3"><b>Assento disponiveis</b></td>
  </tr>
  
   <tr align='center'>
    <td width="22">&nbsp;</td>      
    <td width="119">&nbsp;</td>        
    <td width="78">&nbsp;</td> 
	<td width="78">&nbsp;</td>         
    <td width="54"><b>1<sup>a</sup> classe</b></td>
    <td width="54"><b>Executiva</b></td>
	<td width="55"><b>Econômica</b></td>
  </tr>
  <?
if(isset($_REQUEST["pagina"])=="") { 
  $pagina="1"; 
}else{ 
     $pagina=$_REQUEST["pagina"]; 
} 
// quantidade de registro por paginação 
$maximo="6";

// Variáveis de contagem de registro 
$inicio=$pagina-1; 
$inicio=$maximo*$inicio; 

// seleção de registro com limitação da variáveis de contagem
$query= "SELECT * from voo_data,voo_dia_semana 
          WHERE voo_data.id_voo_semana=voo_dia_semana.id_dia_semana
          ORDER BY data,hora LIMIT $inicio,$maximo";
		  
	$result=mysql_query($query,$conn);
	$t=0;
	while ($linha = mysql_fetch_array($result)){
      
$id_voo=$linha['id_voo'];
$id_voo_data=$linha['id_voo_data'];
$data=conversor($linha['data']);
$hora=substr($linha['hora'],0,5);
$classe1=$linha['1classe_data'];
$executiva=$linha['executiva_data'];
$economica=$linha['economica_data'];

      

$t++;
	
            if ($t % 2 == 0) {
			$cor="#EFEFEF";
			}
            else {
			  $cor="#CCCCCC";
			} 

echo "
<tr align='center' bgcolor='$cor'>
<td height='27'><p>$id_voo_data</p></td>
<td><p>$data</p></td>
<td><p>$hora</p></td>
<td><a href=\"#\" class='link2' onclick=\"window.open('lista_voos_detalhes.php?key=".$id_voo."','detalhes','width=300, height=100, top=200, left=120')\">$id_voo</a></td>
<td><p>$classe1</p></td>
<td><p>$executiva</p></td>
<td><p>$economica</p></td>";
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
$p_query=mysql_query("SELECT * FROM voo_data LIMIT $p_ini,$maximo"); 
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