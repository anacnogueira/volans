<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<html>
<head>
<title></title>
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
  
    <td width="639" align="left" valign="bottom"> <h1 class="tit_administrador">Gerenciamento de Aeroportos</h1></td>

<?
	$query="SELECT * FROM administrador WHERE nome='".$_SESSION['x_nome']."'";
    $resultado=mysql_query($query);
    $x_resultado = mysql_result($resultado, 0, "permissao"); 
    if(($x_resultado==1) || ($x_resultado==2)){
?>
    <td width="91" align="left" valign="middle"><a href="insere_aeroporto.php"><img src="../../icones/adm/i_adicionar.gif" width="81" height="19" border="0"></a></td>
	<?
       }
    ?>
</tr>
</table>
<br>
<table border="0" cellpadding="0" cellspacing="1" width="779">
<tr align='center' height='20'>
<td><b>Abreviatura</b></td>
<td><b>Nome</b></td>
<td><b>Cidade</b></td>
<td><b>Estado</b></td>
<td width='80'>&nbsp;</td>
<td width='80'>&nbsp;</td>
</tr>
<? $tabela="aeroporto"; 

// Verifica se a variável de complementação de link esta vazia 
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
?>


<?
 
// seleção de registro com limitação da variáveis de contagem 
$sql=mysql_query("SELECT * FROM $tabela LIMIT $inicio,$maximo"); 
$t=0;
// Mostragem dos dados 
while($linha=mysql_fetch_array($sql)) { 
$id_aeroporto=$linha['id_aeroporto'];
$nome=$linha['nome'];
$cidade=$linha['cidade'];
$estado=$linha['estado'];

$t++;
            if ($t % 2 == 0) {
			$cor="#EFEFEF";
			}
            else {
			  $cor="#CCCCCC";
			}
   ## EXIBA OS DADOS AQUI 
   echo "<tr align='center' bgcolor='$cor' valign='middle' height='30'>
<td><p> $id_aeroporto </p></td>
<td align='left'><p> &nbsp; &nbsp; $nome </p></td>
<td><p> $cidade </p></td>
<td><p> $estado </p></td>";

  if(($x_resultado==1) || ($x_resultado==2)){
echo "<td>
<form name='edita' method='post' action='edita_aeroporto.php'>
<input type='hidden' name='key' value=\"$id_aeroporto\">
<input type='submit' name='editar' value='editar'></form>
</td>";
}

if($x_resultado==1){

echo "<td>
<form name='excluir' action='excluir_aeroporto.php'  method='post'>
<input type='hidden' name='key' value=\"$id_aeroporto\">
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
$p_query=mysql_query("SELECT * FROM $tabela LIMIT $p_ini,$maximo"); 
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