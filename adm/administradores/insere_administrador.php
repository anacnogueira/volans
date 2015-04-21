<? include ("../../bd/conexao.php");?>
<? include("../sessao/sessao.php"); ?>
<html>
<head>
<title>Adicionar Administrador</title>
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
        Administrador</h1></td>
  </tr>
</table>
<form name="administrador" method="post" action="insere_administrador2.php">

    
  <table width="779" border="0">
    <tr> 
      <td width="44" height="25">&nbsp;</td>
      <td width="105"> 
        <p>Nome</p></td>
      <td colspan="2"><input name="nome" type="text" size="29"></td>
    </tr>
    <tr> 
      <td width="44">&nbsp;</td>
      <td> 
        <p>Senha</p></td>
      <td colspan="2"><input name="senha" type="password" size="29"></td>
    </tr>
    <tr> 
      <td width="44">&nbsp;</td>
      <td> 
        <p>Confirmar senha</p></td>
      <td colspan="2"><input name="conf_senha" type="password" id="conf_senha" size="29"></td>
    </tr>
    <tr> 
      <td width="44">&nbsp;</td>
      <td> 
        <p>Permissão</p></td>
      <td colspan="2"><select name="permissao">
          <option value='0'>Selecione a permissão</option>
          <?
	 
			for($i=1;$i<4;$i++){
				if($i==1){
				$x_permissao="Leitura, Gravação e exclusão";
				}  else if($i==2){
				$x_permissao="Leitura e Gravação";
				}
				else{
				$x_permissao="Leitura";
				}
   			echo "<option value='".$i."'>".$x_permissao."</option>";
   
   }
	 
	 ?>
        </select> </td>
    </tr>
    <tr> 
      <td colspan="2"><div align="right"> </div></td>
      <td width="206" align="right"> 
        <input type="submit" name="Submit" value="criar"></td>
      <td width="392" align="right">&nbsp;</td>
    </tr>
  </table>
  </div>
</form>
</body>
</html>
