<? include ("../topo/topo_paginas.php"); ?>
<? include ("../bd/conexao.php"); ?>
<script language="JavaScript" src="../../scripts/valida_form.js"></script>
<table width="779" height="295" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="30" colspan="3" background="../fatias/barra_titulo_com.gif"><table width="779" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="32">&nbsp;</td>
          <td width="195" height="25"> <p class = "tit_barra1"><strong><font color="#669933">Compra 
              On-line</font></strong></p></td>
          <td width="582" valign="top"><p class = "tit_barra2">Compra On-line 
              - Login</p></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td width="653" height="257"> 
      <table width="680" height="242" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="51">&nbsp;</td>
          <td><p>Para realizar a sua compra &eacute; necess&aacute;rio que voc&ecirc; seja cadastrado e logado em nosso sistema. Por favor preencha os campos abaixo com seu e-mail e senha do site:</p>
            </td>
        </tr>
        <tr> 
          <td width="10" height="191"> 
            <div align="center"></div>
            <p><br>
            </p></td>
          <td valign="top">
<form action="login2.php" method="post" name="login" id="login">
              <table width="460" border="0">

                <tr>
                  <td><div align="right"><b></b></div></td>
                  <td colspan="3"><h2>&nbsp;</h2></td>
                </tr>
                <tr> 
                  <td width="12">&nbsp;</td>
                  <td width="77"><p>E-mail</p></td>
                  <td colspan="2"><input name="email" type="text" id="email"></td>
                </tr>
                <tr> 
                  <td>&nbsp;</td>
                  <td><p>Senha</p></td>
                  <td colspan="2"><input name="senha" type="password" id="senha"> </td>
                </tr>
                <tr> 
                  <td>&nbsp;</td>
                  <td align="right">&nbsp; </td>
                  <td width="141" align="right"><input type="submit" name="submit" value="entrar"></td>
                  <td width="212" align="right">&nbsp;</td>
                </tr>
              </table>
            </form>
</td>
        </tr>
      </table></td>
    <td width="6" align="center" background="../fatias/pontilhado_vert_pag.gif">&nbsp;</td>
    <td width="80" valign="top"> <table width="80" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td> <div align="center"><img src="consulta_sombra.gif" width="36" height="36"></div></td>
        </tr>
        <tr> 
          <td><div align="center"><a href="com_consulta.php" class="link_icones">Consulta</a></div></td>
        </tr>
        <tr> 
          <td height="45" valign="bottom"> <div align="center"><a href="emp_diferenciais.php"><img src="promocoes.gif" width="36" height="36" border="0"></a></div></td>
        </tr>
        <tr> 
          <td><div align="center" ><a href="com_promocoes.php" class="link_icones">Promo&ccedil;&otilde;es</a></div></td>
        </tr>
      </table></td>
  </tr>
  
      <? include ("../barra_inferior.php"); ?>
</table>
</body>
</html>
