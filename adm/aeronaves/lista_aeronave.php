<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<html>
<head>
<title>Gerenciamento de Aeronaves</title>
<link href="../../interface/interface.css" rel="stylesheet" type="text/css">
</head>
<body>
<? include ("../topo/topo_adm.php"); ?>

<table width="779" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td width="50" rowspan="2"><img src="../fatias/asa_azul.gif" width="42" height="34" hspace="0" vspace="0" align="bottom" class="img"></td>
    <td colspan=3> </td>
  </tr>
  <tr>
  
    <td width="639" align="left" valign="bottom"> <h1 class="tit_administrador">Gerenciamento de Aeronaves</h1></td>
	<?
	$query="SELECT * FROM administrador WHERE nome='".$_SESSION['x_nome']."'";
    $resultado=mysql_query($query);
     $x_resultado = mysql_result($resultado, 0, "permissao"); 
if(($x_resultado==1) || ($x_resultado==2)){
?>
    <td width="91" align="left" valign="middle"><a href="insere_aeronave.php"><img src="../../icones/adm/i_adicionar.gif" width="81" height="19" border="0"></a></td>
	<?
       }
     ?>
  </tr>
</table>

<br>
<table border="0" cellpadding="0" cellspacing="1" width="779">
  <tr align='center' height='20'>
<td width="22"><b>ID</b></td>
<td width='102'><b>Modelo</b></td>
<td  colspan="3" align="center"><b>Capacidade</b></td>
<td width="66">&nbsp;</td>
<td width="51"><b>Foto</b></td>
<td width='80'>&nbsp;</td>
<td width='80'>&nbsp;</td>
</tr>

<tr align='center' height='20'  bgcolor="#EFEFEF">
<td>&nbsp;</td>
<td>&nbsp;</td>
    <td width="109"><b>1<sup>a</sup> classe</b></td>
    <td width="109"><b>Executiva</b></td>
    <td width="110"><b>Econômica</b></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
<? if($x_resultado==1) {
echo "
<td>&nbsp;</td>
<td>&nbsp;</td>";
}

?>

<? if($x_resultado==2){
echo "
<td>&nbsp;</td>";
}
?>

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


$query = "SELECT * FROM aeronaves LIMIT $inicio,$maximo";

$resultado = mysql_query($query,$conn);
$t=0;
while ($linha = mysql_fetch_array($resultado)){
  $id_aeronave=$linha['id_aeronave'];
  $modelo=$linha['modelo'];
  $classe1=$linha['1classe']; 
  $executiva=$linha['executiva']; 
  $economica=$linha['economica']; 
 

  $t++;
            if ($t % 2 == 0) {
			$cor="#EFEFEF";
			}
            else {
			  $cor="#CCCCCC";
			} 
			 ## EXIBA OS DADOS AQUI 
echo "
<tr align='center' valign='middle' bgcolor='$cor' height='30'>
<td><p> $id_aeronave </p></td>
<td><p> $modelo </p></td>
<td><p> $classe1 </p></td>
<td><p> $executiva </p></td>
<td><p> $economica</p></td>
<td><a href=\"#\" class='link2' onclick=\"window.open('lista_aeronaves_detalhes.php?key=".$id_aeronave."','detalhes','width=300, height=200, top=150, left=190')\">Detalhes</a></td>
<td><a href=\"#\" onclick=\"window.open('visualiza_foto_aeronave.php?key=".$id_aeronave."','detalhes','width=610, height=370, top=100, left=90')\"><img src='../../icones/adm/i_foto.gif' border='0'></td> ";

if(($x_resultado==1) || ($x_resultado==2)){
echo "
<td width='80'>
<form name='edita' method='post' action='edita_aeronave.php'>
<input type='hidden' name='key' value=\"$id_aeronave\">
<input type='submit' name='editar' value='editar'></form>
</td>";

}

if($x_resultado==1){

 echo "
<td width='80'>
<form name='excluir' action='excluir_aeronave.php'  method='post'>
<input type='hidden' name='key' value=\"$id_aeronave\">
<input type='submit' name='excluir' value='excluir' ></form>
</td>";

}
echo "</tr>";
}

?>
</table>
<br>
<?
// Calculando pagina anterior 
$menos=$pagina-1; 

// Calculando pagina posterior 
$mais=$pagina+1; 

// Calculos para a mostragem de paginas 
$p_ini=$mais-1; 
$p_ini=$maximo*$p_ini; 

// Querys para a mostragem de paginas 
$p_query=mysql_query("SELECT * FROM aeronaves LIMIT $p_ini,$maximo"); 
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

