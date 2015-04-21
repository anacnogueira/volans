<?  include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<html>
<head>
<title>Gerenciamento de Administradores</title>
<link href="../../interface/interface.css" rel="stylesheet" type="text/css">
</head>
<? include ("../topo/topo_adm.php"); ?>
<body>
<table width="779" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td width="50" rowspan="2"><img src="../fatias/asa_azul.gif" width="42" height="34" hspace="0" vspace="0" align="bottom" class="img"></td>
    <td colspan=3> </td>
  </tr>
  <tr> 
    <td width="639" align="left" valign="bottom"> <h1 class="tit_administrador">Gerenciamento de Administradores</h1></td>
	<?
	$query="SELECT * FROM administrador WHERE nome='".$_SESSION['x_nome']."'";
    $resultado=mysql_query($query);
	while($line=mysql_fetch_array($resultado)){
	$id=$line['id_admin'];
	$per=$line['permissao'];
	
if($per==1) {
?>
    <td width="91" align="left" valign="middle"><a href="insere_administrador.php"><img src="../../icones/adm/i_adicionar.gif" width="81" height="19" border="0"></a></td>
<?
  }
?>
  </tr>
</table>

<br>
<table border="0" cellpadding="0" cellspacing="1" width="779">
<tr align='center'>
<td><b>ID</b></td>
<td><b>Nome</b></td>
<td><b>Permiss&atilde;o</b></td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>

<?
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

// seleção de registro com limitação da variáveis de contagem 


    $query = "SELECT * FROM administrador LIMIT $inicio,$maximo"; 
	$result=mysql_query($query,$conn);
	
	$t=0;
	// Mostragem dos dados 
	while ($linha = mysql_fetch_array($result)){
	   $id_admin=$linha['id_admin'];
       $nome=$linha['nome'];
       $senha=$linha['senha'];
       $permissao=$linha['permissao']; 
	
	   $t++;
	
            if ($t % 2 == 0) {
			$cor="#EFEFEF";
			}
            else {
			  $cor="#CCCCCC";
			} 

if($permissao==1){
	$x_permissao="Leitura, Gravação e exclusão";
	}  else if($permissao==2){
	$x_permissao="Leitura e Gravação";
	}
	else{
	$x_permissao="Leitura";
	}
 ## EXIBA OS DADOS AQUI 
echo "
<tr valign='middle' align='center' bgcolor='$cor'>
<td height='26'><p>".$id_admin."</p></td>
<td><p>".$nome."</p></td>
<td><p>".$x_permissao."</p></td>";

if(($per==1) || ($id==$id_admin)) {
echo "<td width='80'>
<form name='edita' method='post' action='edita_administrador.php'>
<input type='hidden' name='key' value=\"$id_admin\">
<input type='submit' name='editar' value='editar'></form>
</td>

<td width='80'>
<form name='excluir' action='excluir_administrador.php'  method='post'>
<input type='hidden' name='key' value=\"$id_admin\">
<input type='submit' name='excluir' value='excluir' ></form>
</td>";
}
else{
 echo "<td width='80'>&nbsp;</td>
       <td width='80'>&nbsp;</td>";

}
echo "</tr>";
}
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
$p_query=mysql_query("SELECT * FROM administrador LIMIT $p_ini,$maximo"); 
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
