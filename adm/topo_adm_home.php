<? include ("../bd/conexao.php"); ?>

<link href="../interface/interface.css" rel="stylesheet" type="text/css">

<table width="779" height="100" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="80" background="fatias/topo.jpg"><table width="779" height="70" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr align="right" valign="top"> 
          <td height="54" colspan="4" class="login">Seja Bem Vindo(a), <? echo $_SESSION['x_nome']; ?>&nbsp;</td>
        </tr>
        <tr> 
          <td width="319" height="25"> <div align="right"></div></td>
          <td width="55" height="25"> <div align="center"><a href="#" onclick= "window.open('ajuda/ajuda.php','ajuda','width=420, height=300, top=150, left=190, scrollbars=yes')" onMouseOver="infoLink('Ajuda');return document.valourtrue" onMouseOut="vazio()">Ajuda</a></div></td>
          <td width="48" height="25"> <div align="center"><a href="logout.php" onMouseOver="infoLink('Sair');return document.valourtrue" onMouseOut="vazio()">Sair</a></div></td>
          <td width="357" height="25">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td height="20" bgcolor="#006699" class="setor_adm">Setor 
      Administrativo <font color="#006699" size="2" face="Arial, Helvetica, sans-serif">l</font> 
      <div align="left"></div></td>
  </tr>
</table>
