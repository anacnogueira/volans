<? include ("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<html>
<head>
<title>Adicionar Aeronave</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
    <td align="left" valign="bottom"> <h1 class="tit_administrador">Adicionar 
        Aeronave</h1></td>
  </tr>
 </table>
<form name="administrador" method="post" action="insere_aeronave2.php" enctype="multipart/form-data">
  <table width="779" border="0">
    <tr> 
      <td width="38" height="25">&nbsp;</td>
      <td width="102"> <p>Fabricante</p></td>
      <td colspan="3"><input name="fabricante" type="text" size="29"></td>
    </tr>
    <tr> 
      <td width="38">&nbsp;</td>
      <td> <p>Modelo</p></td>
      <td colspan="3"><input name="modelo" type="text" size="29"></td>
    </tr>
    <tr> 
      <td width="38">&nbsp;</td>
      <td> <p>Motores</p></td>
      <td colspan="3"><input name="motores" type="text" size="29"></td>
    </tr>
    <tr> 
      <td width="38">&nbsp;</td>
      <td colspan="4"><b>Capacidade</b></td>
    </tr>
	
	<tr> 
      <td width="38">&nbsp;</td>
      <td> <p>1<sup>a</sup> Classe</p></td>
      <td width="120"><input name="classe1" type="text" size="20"> </td>
      <td width="50"><p>pessoas</p></td>
      <td width="447"></td>
    </tr>
	
	<tr> 
      <td width="38">&nbsp;</td>
      <td> <p>Executiva</p></td>
      <td width="120"><input name="executiva" type="text" size="20"> </td>
      <td width="50"><p>pessoas</p></td>
      <td width="447"></td>
    </tr>
	
	<tr> 
      <td width="38">&nbsp;</td>
      <td> <p>Econômica</p></td>
      <td width="120"><input name="economica" type="text" size="20"> </td>
      <td width="50"><p>pessoas</p></td>
      <td width="447"></td>
    </tr>
	
    <tr> 
      <td>&nbsp;</td>
      <td> <p>Velocidade</p></td>
      <td><input name="velocidade" type="text" size="20"> </td>
      <td><p>Km/h</p></td>
      <td></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td> <p>Imagem</p></td>
      <td colspan="3"><input name="foto" type="file" id="foto" size="15"> </td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="2"> <div align="right"> 
          <input type="submit" name="Submit" value="criar">
        </div></td>
      <td><div align="left"> </div></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>

