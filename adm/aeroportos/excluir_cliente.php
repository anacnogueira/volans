<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<?	  	   
$key = @$_POST["key"];

		
		$strsql = "SELECT * FROM cliente WHERE id_user='" .$key."'";
		$result = mysql_query($strsql);
		while($linha = mysql_fetch_array($result)) {
     	mysql_error();
			
			$x_id_user=$linha['id_user'];
			$x_cartao_vantagem=$linha['n_cartao_vantagem'];
			$x_nome=$linha['nome'];
			$x_sobrenome=$linha['sobrenome'];
			$x_cidade=$linha['cidade'];
			$x_estado=$linha['estado'];
			$x_pais=$linha['pais'];
			$x_telefone=$linha['telefone'];
			$x_email=$linha['email'];
			$x_sexo=$linha['sexo'];
			$x_rg=$linha['rg'];
			$x_cpf=$linha['cpf'];
			$x_permite_pub=$linha['permite_pub'];
}
?>
<html>
<head>
<title>Excluir Cliente</title>
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
    <td align="left" valign="bottom"> <h1 class="tit_administrador">Excluir Cliente</h1></td>
  </tr>
</table>
<form name="excluir" action="excluir_cliente2.php" method="post" class="form_login">
<input type="hidden" name="key" value=<? echo "$x_id_user"; ?>>

  <table border="0" cellpadding="0" cellspacing="1">
  
    <tr>
	  <td width="43" height="25">
      <td width="77"><b>ID</b></td>
      <td colspan="2"><p><? echo $x_id_user; ?></p></td>
    </tr>
	
    <tr>
	  <td width="43" height="25">
      <td><b>N&deg; Cartão Vantagem</b></td>
      <td colspan="2"><p><? echo $x_cartao_vantagem; ?></p></td>
    </tr>
	
    <tr>
	  <td width="43" height="25"> 
      <td><b>cidade</b></td>
      <td colspan="2"><p><? echo $x_cidade; ?></p></td>
    </tr>
	
    <tr>
	  <td width="43" height="25">
      <td><b>Estado</b></td>
      <td colspan="2"><p><? echo $x_estado; ?></p></td>
    </tr>
	
	 <tr>
	  <td width="43" height="25">
      <td><b>País</b></td>
      <td colspan="2"><p><? echo $x_pais; ?></p></td>
    </tr>
	
	 <tr>
	  <td width="43" height="25">
      <td><b>Telefone</b></td>
      <td colspan="2"><p><? echo $x_telefone; ?></p></td>
    </tr>
	
	 <tr>
	  <td width="43" height="25">
      <td><b>E-mail</b></td>
      <td colspan="2"><p><? echo $x_email; ?></p></td>
    </tr>
	
	 <tr>
	  <td width="43" height="25">
      <td><b>RG</b></td>
      <td colspan="2"><p><? echo $x_rg; ?></p></td>
    </tr>
	
	 <tr>
	  <td width="43" height="25">
      <td><b>CPF</b></td>
      <td colspan="2"><p><? echo $x_cpf; ?></p></td>
    </tr>
	
	 <tr>
	  <td width="43" height="25">
      <td><b>Permite Publicidade</b></td>
      <td colspan="2"><p><? echo $x_permite_pub; ?></p></td>
    </tr>
	
	 <tr> 
      <td colspan="2" align="right"><input name="button" type="button" onClick="javascript:history.back()" value="voltar"></td>
      <td width="220" align="right"><input type="submit" name="Submit" value="Confirmar exclusão?"></td>
      <td width="411" align="left">&nbsp;</td>
    </tr>
	
  </table>
</form>
