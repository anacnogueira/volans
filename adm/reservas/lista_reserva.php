<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<? include ("../../funcoes/conversor_data.php"); ?>
<html>
<head>
<title>Gerenciamento de Reservas</title>
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
  
    <td width="639" align="left" valign="bottom"> <h1 class="tit_administrador">Gerenciamento de Reservas</h1></td>
<br>
  <table border="0" cellpadding="0" cellspacing="1"  width="779">
<tr align='center' height='20'>
<tr align='center'>
      <td width="40"><b>ID</b></td>
      <td width="40"><b>Vôo</b></td>
      <td width="60"><b>Cliente</b></td>
      <td width="80"><b>Adultos</b></td>
      <td width="80"><b>Crianças <br>
        0 -1 ano</b></td>
      <td width="80"><b>Crianças<br>
        2 -11 anos</b></td>
<td><b>Data</b></td>
<td><b>Horário</b></td>
<td><b>Tipo</b></td>
<td><b>Classe</b></td>
<td><b>Pagamento</b></td>
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
$query = "SELECT * FROM reserva,voo_data,voo_dia_semana
           WHERE voo_data.id_voo_semana=voo_dia_semana.id_dia_semana
           AND reserva.id_voo_data=voo_data.id_voo_data LIMIT $inicio,$maximo";
		   
		 
	$result=mysql_query($query,$conn);
	  
		   
		   $t=0;
	while ($linha = mysql_fetch_array($result)){

$id_reserva=$linha['id_reserva'];
$id_voo=$linha['id_voo'];
$id_cliente=$linha['id_cliente'];
$adultos=$linha['adultos'];
$criancas1=$linha['criancas1'];
$criancas2=$linha['criancas2'];
$data_voo=conversor($linha['data']);
$hora=substr($linha['hora'],0,5);
$classe=$linha['classe'];
$tipo=$linha["tipo_voo"];

$t++;
            if ($t % 2 == 0) {
			$cor="#EFEFEF";
			}
            else {
			  $cor="#CCCCCC";
			} 
echo "
<tr align='center' valign='middle' bgcolor='$cor' height='30'>
<td><p>$id_reserva</p></td>
<td><a href=\"#\" class='link2' onclick=\"window.open('../voos/lista_voos_detalhes.php?key=".$id_voo."','detalhes','width=300, height=100, top=200, left=120')\">$id_voo</a></td>
<td><a href=\"#\" class='link2' onclick=\"window.open('../clientes/lista_clientes_detalhes.php?key=".$id_cliente."','detalhes','width=400, height=300, top=150, left=190')\">$id_cliente</a></td>
<td><p>$adultos</p></td>
<td><p>$criancas1</p></td>
<td><p>$criancas2</p></td>
<td><p>$data_voo</p></td>
<td><p>$hora</p></td>
<td><p>$tipo</p></td>
<td><p>$classe</p></td>
<td><a href=\"#\" class='link2' onclick=\"window.open('lista_reserva_detalhes.php?key=".$id_reserva."','detalhes','width=300, height=200, top=150, left=190')\">Detalhes</a></td>

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
$p_query=mysql_query("SELECT * FROM reserva LIMIT $p_ini,$maximo"); 
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


