<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<?
$id_admin=@$_POST["key"];

$query="SELECT id_admin FROM administrador WHERE nome='".$_SESSION['x_nome']."'";
$resultado=mysql_query($query);
$x_resultado = mysql_result($resultado, 0, "id_admin"); 
if($x_resultado==$id_admin){

$erro = "<font class='erro2'>Usuário logado, não pode ser apagado!<br> </font>";
}
	else{
		$strsql = "DELETE FROM administrador WHERE id_admin='".$id_admin."'";
		$resultado =	mysql_query($strsql) or die(mysql_error());
		mysql_close($conn);
		header("Location: lista_administrador.php");
	}	
?>

<html>
<head>
<title>Excluir Administrador</title>
<link href="../../interface/interface.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
	function voltar(){ 
	window.location = "lista_administrador.php";
	}
</script>
</head>
<body>
<? include ("../topo/topo_adm.php"); ?>
<table width="779" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td width="50" rowspan="2"><img src="../fatias/asa_azul.gif" width="42" height="34" hspace="0" vspace="0" align="bottom" class="img"></td>
    <td colspan=2> </td>
  </tr>
  <tr> 
    <td align="left" valign="bottom"><h1 class="tit_erro">Erro!</h1></td>
  </tr>
  <tr>
    <td height="172">&nbsp;</td>
    <td align="center" valign="middle"><table width="303" border="0" align="center">
        <tr> 
          <td width="300"> 
            <?= $erro; ?>
            <div align="center"></div></td>
        </tr>
        <tr> 
          <td align="center"><input name="button" type="button" onClick="voltar()" value="voltar"></td>
        </tr>
      </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>	
