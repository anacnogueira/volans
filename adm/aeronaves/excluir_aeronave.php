<? include ("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<?	  	   	   
$key = @$_POST["key"];
$tkey = "" . $key . "";
		$caminho="../../imagens/aeronaves/externos/";
		$strsql = "SELECT * FROM aeronaves WHERE id_aeronave=".$tkey;
		$result = mysql_query($strsql);
		while($linha = mysql_fetch_array($result)) {
     	mysql_error();
			
			$x_id_aeronave=$linha['id_aeronave'];
			$x_fabricante=$linha['fabricante'];
			$x_modelo=$linha['modelo'];
			$x_motores=$linha['motores'];
			$x_classe1=$linha['1classe'];
			$x_executiva=$linha['executiva'];
			$x_economica=$linha['economica'];
			$x_velocidade=$linha['velocidade'];
			$x_imagem=$linha['foto'];
}
?>
<html>
<head>
<title>Excluir Aeronave</title>
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
    <td align="left" valign="bottom"> <h1 class="tit_administrador">Excluir Aeronave</h1></td>
  </tr>
</table>
<form name="exclui" action="excluir_aeronave2.php" method="post" class="form_login">
<input type="hidden" name="key" value=<? echo "$x_id_aeronave"; ?>>

  <table border="0" cellpadding="0" cellspacing="1">
    <tr> 
      <td width="47" height="25">&nbsp;</td>
      <td width="103"><p>ID Aeronave</p></td>
      <td colspan="2"></p><? echo $x_id_aeronave; ?></p></td>
    </tr>
    <tr> 
      <td width="42" height="25">&nbsp;</td>
      <td><p>Fabricante</p></td>
      <td colspan="2"><p><? echo $x_fabricante; ?></p></td>
    </tr>
    <tr> 
      <td width="42" height="25">&nbsp;</td>
      <td><p>Modelo</p></td>
      <td colspan="2"><p><? echo $x_modelo; ?></p></td>
    </tr>
    <tr> 
      <td width="42" height="25">&nbsp;</td>
      <td><p>Motores</p></td>
      <td colspan="2"><p><? echo $x_motores; ?></p></td>
    </tr>
	
    <tr> 
      <td width="42" height="25">&nbsp;</td>
      <td colspan="3"><b>Capacidade</b></td>
    </tr>
	<tr> 
      <td width="42" height="25">&nbsp;</td>
      <td><p>1<sup>a</sup> classe</p></td>
      <td colspan="2"><p><? echo $x_classe1; ?></p></td>
    </tr>
	<tr> 
      <td width="42" height="25">&nbsp;</td>
      <td><p>Executiva</p></td>
      <td colspan="2"><p><? echo $x_executiva; ?></p></td>
    </tr>
	<tr> 
      <td width="42" height="25">&nbsp;</td>
      <td><p>Econômica</p></td>
      <td colspan="2"><p><? echo $x_economica; ?></p></td>
    </tr>
    <tr> 
      <td width="42" height="25">&nbsp;</td>
      <td><p>Velocidade</p></td>
      <td colspan="2"><p><? echo $x_velocidade; ?></p></td>
    </tr>
    <tr valign="top"> 
      <td width="42" height="25">&nbsp;</td>
      <td><p>Foto</p></td>
      <td colspan="2" height="110"><img src="<?= $caminho.$x_imagem; ?>" width="205" height="105"></td>
    </tr>
    <tr> 
      <td align="right">&nbsp; </td>
      <td align="left"> 
        <input name="button" type="button" onClick="javascript:history.back()" value="voltar"></td>
      <td width="205" align="left"> 
        <input type="submit" name="Submit" value="confirmar exclus&atilde;o?"> 
      </td>
      <td width="415" align="left">&nbsp;</td>
    </tr>
  </table>
</form>
<a href="javascript:history.back()">Voltar</a>
