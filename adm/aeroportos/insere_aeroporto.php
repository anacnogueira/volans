<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<? include("../../funcoes/array_estados.php");?>
<html>
<head>
<title>Adicionar Aeroporto</title>
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
    <td height="39" align="left" valign="bottom"> 
      <h1 class="tit_administrador">Adicionar Aeroporto</h1></td>
  </tr>
</table>
<form name="administrador" method="post" action="insere_aeroporto2.php">
  <table width="779" border="0">
    <tr> 
      <td width="44" height="25">&nbsp;</td>
      <td width="107"> <p>Sigla aeroporto</p></td>
      <td colspan="2"><input name="id_aeroporto" type="text" size="29"></td>
    </tr>
    <tr> 
      <td width="44">&nbsp;</td>
      <td> <p>Aeroporto</p></td>
      <td colspan="2"><input name="nome" type="text" id="nome2" size="29"></td>
    </tr>
    <tr> 
      <td width="44">&nbsp;</td>
      <td> <p>Cidade</p></td>
      <td colspan="2"> <input name="cidade" type="text" id="cidade2" size="29"> 
      </td>
    </tr>
    <tr> 
      <td width="44">&nbsp;</td>
      <td> <p>Estado</p></td>
      <td colspan="2"><select name="estado" size="1">
          <?
            foreach($estados as $e=>$k){
               echo "<option value=\"$e\"";
               if($k==1){
                echo "selected";
                }
                 echo ">$e</option>";
                 }
                 ?>
        </select> </td>
    </tr>
    <tr> 
      <td colspan="2"><div align="right"> </div></td>
      <td width="197" align="right"> <input type="submit" name="Submit" value="criar"></td>
      <td width="413" align="right">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>

