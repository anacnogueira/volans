<? include ("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<? include("../../funcoes/conversor_data.php"); ?>
<?	   	   
$key = $_POST["key"];
$tkey = "" . $key . "";
		
        $strsql = "SELECT * FROM voo_dia_semana  WHERE id_dia_semana=".$tkey;
		$result = mysql_query($strsql);
		while($linha = mysql_fetch_array($result)) {
     	mysql_error();
			$x_id_dia_semana=$linha['id_dia_semana'];
			$x_id_voo=$linha['id_voo'];
			$x_de=$linha['de'];
			$x_ate=$linha['ate'];
			$x_hora=$linha['hora'];
			

?>
<html>
<head>
<title>Excluir v&ocirc;o - Programação Semanal</title>
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
    <td width="639" align="left" valign="bottom"><h1 class="tit_administrador">Excluir Vôos</h1></td>
    <td width="91" align="left" valign="middle">&nbsp;</td>
  </tr>
</table>

<form name="edita" action="excluir_voo_diasemana2.php" method="post" class="form_login">
<input type="hidden" name="key" value=<? echo "$x_id_dia_semana"; ?>>


  <table border="0"  cellpadding="0" cellspacing="0">
    <tr> 
      <td width="46" height="25">&nbsp;</td>
      <td width="119"><p>ID</p></td>
      <td colspan="2"><p><? echo $x_id_dia_semana; ?></p></td>
    </tr>
    <tr> 
      <td width="46" height="25">&nbsp;</td>
      <td><p>Vôo</p></td>
      <td colspan="2"><p><? echo $x_id_voo; ?></p></td>
    </tr>
    <tr> 
      <td width="46" height="25">&nbsp;</td>
      <td><p>De</p></td>
      <td colspan="2"><p><? echo conversor($x_de); ?></p></td>
    </tr>
    <tr> 
      <td width="46" height="25">&nbsp;</td>
      <td><p>Ate</p></td>
      <td colspan="2"><p><? echo conversor($x_ate); ?></p></td>
    </tr>
  
    <tr> 
      <td width="46" height="25">&nbsp;</td>
      <td><p>Hora</p></td>
      <td colspan="2"><p><? echo $x_hora; ?></p></td>
    </tr>
    
   
  
    <tr> 
      <td align="right">&nbsp; </td>
      <td align="left"> 
        <input name="button" type="button" onClick="javascript:history.back()" value="voltar"></td>
      <td width="173" align="left"> 
        <input type="submit" name="Submit" value="confirmar exclus&atilde;o?"></td>
      <td width="432">&nbsp;</td>
    </tr>
  </table>
</form>
<?
}
?>
