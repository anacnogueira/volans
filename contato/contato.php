<? include ("../topo/topo_paginas.php"); ?>
<? include ("../bd/conexao.php"); ?>
<script language="JavaScript" src="../../scripts/valida_form.js"></script>
<table width="779" height="295" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="30" colspan="3" background="../fatias/barra_titulo_cont.gif"><table width="779" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="32">&nbsp;</td>
          <td width="195" height="25"> <p class = "tit_barra1"><strong><font color="#99CC66">Contato</font></strong></p></td>
          <td width="582" valign="top"><p class = "tit_barra2">Contato</p></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td width="653" height="257"> 
      <table width="680" height="242" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="51">&nbsp;</td>
          <td><p>Se voc&ecirc; tiver alguma d&uacute;vida, cr&iacute;tica, sugest&atilde;o 
              ou elogio, escreva para a Equipe da Volans. Basta preencher o formul&aacute;rio 
              abaixo:<br>
            </p>
            </td>
        </tr>
        <tr> 
          <td width="10" height="191"> 
            </td>
          <td> <FORM action="contato2.php" method="post" name="form1" class="form_compra">
              <TABLE border="0" cellspacing="4" cellpadding="0">
                <TR> 
                  <TD><p><b>Nome:</b></p></TD>
                  <TD><INPUT name="nome" type="text" id="nome" size="40" maxlength="40"></TD>
                </TR>
                <TR> 
                  <TD><p><b>E-mail</b></p></TD>
                  <TD><INPUT name="email" type="text" id="email" size="40" maxlength="40"> 
                  </TD>
                </TR>
                <TR> 
                  <TD valign="top"><b>Coment&aacute;rios</b></TD>
                  <TD><textarea name="coment" cols="30" rows="5" id="coment"></TEXTAREA></TD>
                </TR>
                <TR> 
                  <TD>&nbsp;</TD>
                  <TD> <div align="right">
                      <INPUT type="submit" name="Submit" value="Enviar">
                    </div></TD>
                </TR>
              </TABLE>
            </FORM></td>
        </tr>
      </table>
      <div align="right">&nbsp;<a href="javascript:history.back()" class="link_bordo" onMouseOver="infoLink('Voltar à página Anterior');return document.valourtrue" onMouseOut="vazio()">Voltar</a></div></td>
    <td width="6" align="center">&nbsp;</td>
    <td width="80" valign="top"> <table width="80" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td> <div align="center"></div></td>
        </tr>
        <tr> 
          <td><div align="center"></div></td>
        </tr>
        <tr> 
          <td height="45" valign="bottom"> <div align="center"></div></td>
        </tr>
        <tr> 
          <td><div align="center" ></div></td>
        </tr>
      </table></td>
  </tr>
  
      <? include ("../barra_inferior.php"); ?>
</table>
</body>
</html>
