<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<? include ("../../funcoes/conversor_data.php"); ?>
<html>
<head>
<title>Gerenciamento de Passageiros</title>
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
  
    <td width="639" align="left" valign="bottom"> <h1 class="tit_administrador">Gerenciamento de Passageiros</h1></td>
<br>
  <table border="0" cellpadding="0" cellspacing="1"  width="779">
    <tr align='center' height='20'>
<tr align='center'>
      <td><b>ID Passageiro</b></td>
      <td><b>ID Responsável</b></td>
      <td><b>ID Reserva</b></td>
      <td width="220"><b>Nome</b></td>
      <td><b>Faixa Etária</b></td>
      

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
$query = "SELECT * FROM passageiros LIMIT $inicio,$maximo";
	$result=mysql_query($query,$conn);
	$t=0;
	while ($linha = mysql_fetch_array($result)){
$id_pass=$linha['id_pass'];
$id_resp=$linha['id_resp'];
$id_reserva=$linha['id_reserva'];
$nome=$linha['nome'];
$faixa_etaria=$linha["faixa_etaria"];


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
<td><p>$id_pass</p></td>
<td><a href=\"#\" class='link2' onclick=\"window.open('../clientes/lista_clientes_detalhes.php?key=".$id_resp."','detalhes','width=400, height=300, top=150, left=190')\">$id_resp</a></td>
<td><p>$id_reserva</p></td>
<td><p>$nome</p></td>
<td><p>$faixa_etaria</p></td>

</tr>";
}
?>

</table>
<?
// Calculando pagina anterior 
$menos=$pagina-1; 

// Calculando pagina posterior 
$mais=$pagina+1; 

// Calculos para a mostragem de paginas 
$p_ini=$mais-1; 
$p_ini=$maximo*$p_ini; 

// Querys para a mostragem de paginas 
$p_query=mysql_query("SELECT * FROM passageiros LIMIT $p_ini,$maximo"); 
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

