<?php include ("file:///D|/VOLANS/ADM/conexao.php");
   	   
$key = @$_POST["key"];
$tkey = "" . $key . "";
		
		$strsql = "SELECT * FROM administrador WHERE id_admin=".$tkey;
		$result = mysql_query($strsql);
		while($linha = mysql_fetch_array($result)) {
     	mysql_error();
			$x_id_admin=$linha['id_admin'];
			$x_nome=$linha['nome'];
			$x_senha=$linha['senha'];
			$x_prioridade=$linha['prioridade'];
}
?>
<html>
<head>
<title>Excluir Administrador</title>
<link href="file:///D|/VOLANS/interface/interface.css" rel="stylesheet" type="text/css">.
<script language="JavaScript">
	function voltar(){ window.location = "lista_administrador.php";}
</script>
</head>
<body>
<? include ("file:///D|/VOLANS/ADM/topo/topo_adm.php"); ?>
<table width="779" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td width="50" rowspan="2"><img src="file:///D|/VOLANS/ADM/fatias/asa_azul.gif" width="42" height="34" hspace="0" vspace="0" align="bottom" class="img"></td>
    <td colspan=2> </td>
  </tr>
  <tr> 
    <td align="left" valign="bottom"> <h1 class="tit_administrador">Excluir Administrador</h1></td>
  </tr>
</table>
<p>&nbsp;</p>
<form name="edita" action="file:///D|/VOLANS/ADM/ADMINISTRADORES/excluir_administrador2.php" method="post">
  <p>
<table>
<tr>
<td colspan='2' class="texto2"></td>
</tr>
</table>

  <table width="250" border="0">
    <tr> 
      <td width="17" height="25"><input type="hidden" name="key" value=<? echo "$x_id_admin"; ?>></td>
      <td width="57"> <p>ID</p></td>
      <td colspan="2" bgcolor="#cccccc"> 
        <p><? echo $x_id_admin; ?></p></td>
    </tr>
    <tr> 
      <td width="17">&nbsp;</td>
      <td> <p>Nome</p></td>
      <td colspan="2" bgcolor="#EFEFEF"> 
        <p><? echo $x_nome; ?></p></td>
    </tr>
    <?/*
	<tr> 
      <td width="17">&nbsp;</td>
      <td> <p>Senha</p></td>
      <td><p><? echo $x_senha; ?></p></td></tr>
    */ ?> 
    <tr> 
      <td width="17">&nbsp;</td>
      <td> <p>Prioridade</p></td>
      <td colspan="2" bgcolor="#cccccc"> 
        <? 
	  			if($x_prioridade==1){
				$xx_prioridade="Leitura, Gravação e exclusão";
				}  
				else if($x_prioridade==2){
				$xx_prioridade="Leitura e Gravação";
				}
				else{
				$xx_prioridade="Leitura";
				}
	            echo "<p>$xx_prioridade</p>";
				?>
      </td>
    </tr>
    <tr> 
      <td height="26" colspan="2"></td>
      <td width="78" align="right"><button value="Voltar" onClick="voltar()">Voltar</button></td>
      <td width="78" align="right"><input type="submit" name="Action" value="Excluir"></td>
    </tr>
  </table>
</form>
