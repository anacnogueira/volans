<? include ("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>	  
<?	   	   
$key = @$_POST["key"];
$tkey = "" . $key . "";
		
		$strsql = "SELECT * FROM administrador WHERE id_admin=".$tkey;
		$result = mysql_query($strsql);
		while($linha = mysql_fetch_array($result)) {
     	mysql_error();
			$x_id_admin=$linha['id_admin'];
			$x_nome=$linha['nome'];
			$x_senha=$linha['senha'];
			$x_permissao=$linha['permissao'];
}
?>
<html>
<head>
<title>Excluir Administrador</title>
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
    <td align="left" valign="bottom"> <h1 class="tit_administrador">Excluir Administrador</h1></td>
  </tr>
</table>

<form name="edita" action="excluir_administrador2.php" method="post" class="form_login">
<input type="hidden" name="key" value=<? echo "$x_id_admin"; ?>>


  <table border="0" cellpadding="0" cellspacing="0">
    <tr> 
      <td width="47" height="25">&nbsp;</td>
      <td width="72" height="25"><p>ID</p></td>
      <td colspan="2"><p><? echo $x_id_admin; ?></p></td>
    </tr>
    <tr> 
      <td width="44" height="25">&nbsp;</td>
      <td height="25"><p>Nome</p></td>
      <td colspan="2"><p><? echo $x_nome; ?></p></td>
    </tr>
    <tr> 
      <td width="44" height="25">&nbsp;</td>
      <td><p>Permissão</p></td>
      <td colspan="2">
        <? 
	  
	  			if($x_permissao==1){
				$xx_permissao="Leitura, Gravação e exclusão";
				}  
				else if($x_permissao==2){
				$xx_permissao="Leitura e Gravação";
				}
				else{
				$xx_permissao="Leitura";
				}
	            echo "<p>$xx_permissao</p>";
				?>
      </td>
    </tr>
    <tr> 
      <td align="right"> <div align="center"> </div></td>
      <td align="right"> <div align="left">
          <input name="button" type="button" onClick="javascript:history.back()" value="voltar">
        </div></td>
      <td width="220" align="right"> <div align="left"> 
          <input type="submit" name="Submit" value="confirmar exclus&atilde;o?">
        </div></td>
      <td width="411" align="left">&nbsp;</td>
    </tr>
  </table>
 
</form>
