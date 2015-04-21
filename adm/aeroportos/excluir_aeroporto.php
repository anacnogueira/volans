<? include ("../../bd/conexao.php"); ?>
<? include ("../sessao/sessao.php"); ?>

	 
<? 	   
$key = @$_POST["key"];

		
		$strsql = "SELECT * FROM aeroporto WHERE id_aeroporto='" .$key."'";
		$result = mysql_query($strsql);
		while($linha = mysql_fetch_array($result)) {
     	mysql_error();
			
			$x_id_aeroporto=$linha['id_aeroporto'];
			$x_nome=$linha['nome'];
			$x_cidade=$linha['cidade'];
			$x_estado=$linha['estado'];
}
?>
<html>
<head>
<title>Excluir Aeroporto</title>
<link href="../../interface/interface.css" rel="stylesheet" type="text/css">
</head>
<body>
<? include ("../topo/topo_adm.php"); ?>
<table width="779" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td width="50" rowspan="2"><img src="../fatias/asa_azul.gif" width="42" height="34" hspace="0" vspace="0" align="bottom" class="img"></td>
    <td colspan=2> </td>
  </tr>
  <tr> 
    <td align="left" valign="bottom"> <h1 class="tit_administrador">Excluir Aeroporto</h1></td>
  </tr>
</table>
<form name="edita" action="excluir_aeroporto2.php" method="post" class="form_login">
<input type="hidden" name="key" value=<? echo "$x_id_aeroporto"; ?>>

  <table border="0" cellpadding="0" cellspacing="1">
    <tr> 
      <td width="47" height="25"> 
      <td width="77"><p>Abreviatura</p></td>
      <td colspan="2"><p><? echo $x_id_aeroporto; ?></p></td>
    </tr>
    <tr> 
      <td width="43" height="25"> 
      <td><p>Nome</p></td>
      <td colspan="2"><p><? echo $x_nome; ?></p></td>
    </tr>
    <tr> 
      <td width="43" height="25"> 
      <td><p>Cidade</p></td>
      <td colspan="2"><p><? echo $x_cidade; ?></p></td>
    </tr>
    <tr> 
      <td width="43" height="25"> 
      <td><p>Estado</p></td>
      <td colspan="2"><p><? echo $x_estado; ?></p></td>
    </tr>
    <tr> 
      <td align="right">&nbsp;</td>
      <td align="left"> 
        <input name="button" type="button" onClick="javascript:history.back()" value="voltar"></td>
      <td width="220" align="left"> 
        <input type="submit" name="Submit" value="confirmar exclus&atilde;o?"></td>
      <td width="411" align="left">&nbsp;</td>
    </tr>
  </table>
</form>
<a href="javascript:history.back()">Voltar</a>
