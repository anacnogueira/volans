
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<? include("topo_adm_home.php"); ?>
<p>&nbsp;</p>
<p>Sistema de gerenciamento Volans</p>
<p>&nbsp;</p>
<form action="valida_login.php" method="post" name="login" id="login">
  <table width="80%" border="0" align="center">
    <tr> 
      <td width="25%"><b>Area Restrita</b></td>
      <td width="75%">&nbsp;</td>
    </tr>
    <tr> 
      <td>Nome</td>
      <td><input name="nome" type="text" id="nome"></td>
    </tr>
    <tr> 
      <td>Senha</td>
      <td><input name="senha" type="password" id="senha"></td>
    </tr>
    <tr> 
      <td height="21">&nbsp;</td>
      <td><input type="submit" name="submit" value="Entrar"></td>
    </tr>
    
  </table>
</form>
</body>
</html>
