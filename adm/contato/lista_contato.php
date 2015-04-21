<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<? include ("../../funcoes/conversor_data.php"); ?>
<html>
<head>
<title>Gerenciamento de contato</title>
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
  <td width="639" align="left" valign="bottom"> <h1 class="tit_administrador">Gerenciamento de Contatos</h1></td>
 <?
	$query="SELECT * FROM administrador WHERE nome='".$_SESSION['x_nome']."'";
    $resultado=mysql_query($query);
    $x_resultado = mysql_result($resultado, 0, "permissao"); 
    
?>  
<br>
<table width="679" border='0'>
<?
if(isset($_REQUEST["pagina"])=="") { 
  $pagina="1"; 
}else{ 
     $pagina=$_REQUEST["pagina"]; 
} 
// quantidade de registro por paginação 
$maximo="1";

// Variáveis de contagem de registro 
$inicio=$pagina-1; 
$inicio=$maximo*$inicio; 

// seleção de registro com limitação da variáveis de contagem
$query = "SELECT * FROM contato ORDER BY data_agora,hora desc LIMIT $inicio,$maximo";
$resultado = mysql_query($query,$conn);
while ($linha = mysql_fetch_array($resultado)) {
$id_contato=$linha['id_contato'];
$data_agora=$linha['data_agora'];
$hora=$linha['hora'];
$nome=$linha['nome'];
$email=$linha['email'];
$coment=$linha['coment'];

## EXIBA OS DADOS AQUI 
echo "<tr>
<td width='24'>&nbsp; </td>
<td width='70'><b>Registro n&deg;</b></td>
<td width='25'>".$id_contato."</td>
<td width=85'>".conversor($data_agora)."</td>
<td width='500'>".substr($hora,0,5)."</td>
</tr>

<tr>
<td width='24'>&nbsp; </td>
<td><b>Nome</b></td>
<td colspan='3'>".$nome."</td>
</tr>

<tr>
<td width='24'>&nbsp; </td>
<td><b>E-mail</b></td>
<td colspan='3'> ".$email."</td>
</tr>

<tr>
<td width='24'>&nbsp; </td>
<td><b>Comentário</b></td>
<td colspan='3'> ".$coment ."</td>
</tr>";

if($x_resultado==1){

echo "<tr>
<td width='24'>&nbsp; </td>
<td>&nbsp;</td>
<td colspan='3' align='right'>
<form name='excluir' action='excluir_contato.php'  method='post'>
<input type='hidden' name='key' value=\"$id_contato\">
<input type='submit' name='excluir' value='excluir'></form>
</td>
</tr>";
}

echo "<tr><td colspan='5'><hr></td></tr>";

}

echo  "</table>";

// Calculando pagina anterior 
$menos=$pagina-1; 

// Calculando pagina posterior 
$mais=$pagina+1; 

// Calculos para a mostragem de paginas 
$p_ini=$mais-1; 
$p_ini=$maximo*$p_ini; 

// Querys para a mostragem de paginas 
$p_query=mysql_query("SELECT * FROM contato LIMIT $p_ini,$maximo"); 
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
