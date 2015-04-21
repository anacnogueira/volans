<? include ("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>	 
<?	   	   
$key = $_POST["key"];
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
			$x_foto=$linha['foto'];
}
?>
<html>
<head>
<title>Editar aeronave</title>
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
    <td align="left" valign="bottom"> <h1 class="tit_administrador">Editar Aeronave</h1></td>
  </tr>
</table>
<form name="edita" enctype="multipart/form-data" action="edita_aeronave2.php" method="post" class="form_login">
<input type="hidden" name="key" value=<? echo "$x_id_aeronave"; ?>>
<p>

  <table border="0" cellspacing="1" cellpadding="4">
  
  <tr>
   <td width="44" height="25">&nbsp;</td> 
      <td width="105"><p>ID Aeronave</p></td>
      <td colspan="2"><p><? echo $x_id_aeronave; ?></p></td>
    </tr>
	
    <tr>
	 <td width="44" height="25">&nbsp;</td> 
      <td><p>Fabricante</p></td>
      <td colspan="2"><input type="text" name="x_fabricante" size="30" value="<?=@$x_fabricante; ?>"></td>
    </tr>
	
    <tr> 
	 <td width="44" height="25">&nbsp;</td>
      <td><p>Modelo</p></td>
      <td colspan="2"><input type="text" name="x_modelo" size="30"  value="<?=@$x_modelo; ?>"></td>
    </tr>
	
    <tr> 
	 <td width="44" height="25">&nbsp;</td>
      <td><p>Motores</p></td>
      <td colspan="2"><input type="text" name="x_motores" size="30" value="<?=@$x_motores; ?>"></td>
    </tr>
	
	 <tr> 
	 <td width="44" height="25">&nbsp;</td>
	 <td colspan="3"><b>Capacidade</b></td>
    </tr>
	
    <tr> 
	 <td width="44" height="25">&nbsp;</td>
      <td><p>1<sup>a</sup> classe</p></td>
      <td colspan="2"><input type="text" name="x_classe1" size="30" value="<?=@$x_classe1; ?>"></td>
    </tr>
	
	 <tr> 
	 <td width="44" height="25">&nbsp;</td>
      <td><p>Executiva</p></td>
      <td colspan="2"><input type="text" name="x_executiva" size="30" value="<?=@$x_executiva; ?>"></td>
    </tr>
	
	 <tr> 
	 <td width="44" height="25">&nbsp;</td>
      <td><p>Econômica</p></td>
      <td colspan="2"><input type="text" name="x_economica" size="30" value="<?=@$x_economica; ?>"></td>
    </tr>
	
	<tr> 
	 <td width="44" height="25">&nbsp;</td>
      <td><p>Velocidade</p></td>
      <td colspan="2"><input type="text" name="x_velocidade" size="30" value="<?=@$x_velocidade; ?>"></td>
    </tr>
	
	<tr valign="top">
	 <td width="44" height="25">&nbsp;</td>
      <td><p>Foto</p></td>
      <td colspan="2"><img src="<?= $caminho.$x_foto; ?>" width="205" height="105"><br><br>
		   <input name="x_foto" type="file" id="x_foto" size="16"> </td>
    </tr>
	
	<tr> 
      <td colspan="2"><div align="right"> </div></td>
      <td width="206" align="right"> 
        <input type="submit" name="Submit" value="editar"></td>
      <td width="392" align="right">&nbsp;</td>
    </tr>
  </table>
</form>
</html>
