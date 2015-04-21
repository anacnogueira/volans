<? include ("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>	  
<?	   	   
$key = @$_POST["key"];
$tkey = "" . $key . "";
		
		$strsql = "SELECT *
				FROM voo,aeronaves
				WHERE voo.id_aeronave=aeronaves.id_aeronave AND id_voo=".$tkey;
		$result = mysql_query($strsql);
		while($linha = mysql_fetch_array($result)) {
     	mysql_error();
			$x_id_voo=$linha['id_voo'];
			$x_id_aeronave=$linha['id_aeronave'];
			$x_aeronave=$linha['modelo'];
			$x_origem=$linha['origem'];
			$x_destino=$linha['destino'];
			$x_tempo_voo=$linha['tempo_voo'];
			$x_distancia=$linha['distancia'];
			$x_valor=$linha['valor'];
			
}
?>
<html>
<head>
<title>Excluir v&ocirc;o</title>
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

<form name="edita" action="excluir_voo2.php" method="post" class="form_login">
<input type="hidden" name="key" value=<? echo "$x_id_voo"; ?>>


  <table border="0"  cellpadding="0" cellspacing="0">
    <tr> 
      <td width="46" height="25">&nbsp;</td>
      <td width="119">
<p>ID voo</p></td>
      <td colspan="2"><p><? echo $x_id_voo; ?></p></td>
    </tr>
    <tr> 
      <td width="46" height="25">&nbsp;</td>
      <td><p>Aeronave</p></td>
      <td colspan="2"><p><? echo $x_aeronave; ?></p></td>
    </tr>
    <tr> 
      <td width="46" height="25">&nbsp;</td>
      <td><p>Origem</p></td>
      <td colspan="2"><p><? echo $x_origem; ?></p></td>
    </tr>
    <tr> 
      <td width="46" height="25">&nbsp;</td>
      <td><p>Destino</p></td>
      <td colspan="2"><p><? echo $x_destino; ?></p></td>
    </tr>
  
    <tr> 
      <td width="46" height="25">&nbsp;</td>
      <td><p>Tempo</p></td>
      <td colspan="2"><p><? echo $x_tempo_voo; ?></p></td>
    </tr>
    <tr> 
      <td width="46" height="25">&nbsp;</td>
      <td><p>Distância</p></td>
      <td colspan="2"><p><? echo $x_distancia; ?></p></td>
    </tr>
    <tr> 
      <td width="46" height="25">&nbsp;</td>
      <td><p>Valor</p></td>
      <td colspan="2"><p><? echo $x_valor; ?></p></td>
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
