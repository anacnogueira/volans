<? include ("../../bd/conexao.php"); ?>
<script src="../../scripts/msg_status.js"></script>

<table width="779" height="119" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="80" colspan="3" background="../fatias/topo.jpg"><table width="779" height="80" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr align="right" valign="top"> 
          <td height="55" colspan="4" class="login">Seja Bem Vindo(a), <? echo $_SESSION['x_nome']; ?>&nbsp;</td>
        </tr>
        <tr> 
          <td width="335" height="25"> <div align="right"><a href="../index.php" onMouseOver="infoLink('Principal');return document.valourtrue" onMouseOut="vazio()"><img src="../fatias/casa.gif" width="19" height="19" border="0"></a></div></td>
          <td width="49" height="25"> <div align="center"><a href="#" onclick= "window.open('../ajuda/ajuda.php','ajuda','width=420, height=300, top=150, left=190, scrollbars=yes')" onMouseOver="infoLink('Ajuda');return document.valourtrue" onMouseOut="vazio()">Ajuda</a></div></td>
          <td width="42" height="25"> <div align="center"><a href="../logout.php" onMouseOver="infoLink('Sair');return document.valourtrue" onMouseOut="vazio()">Sair</a></div></td>
          <td width="353" height="25">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td width="127" height="20" bgcolor="#006699" class="setor_adm">Setor 
      Administrativo</td>
    <td width="320" height="20" bgcolor="#006699">&nbsp;</td>
    <td width="332" rowspan="2" valign="top"> <div align="right"><img src="../fatias/menu_dir.gif" width="333" height="33" border="0" usemap="#Map"></div></td>
  </tr>
  <tr> 
    <td height="19" colspan="2">&nbsp;</td>
  </tr>
</table>
<map name="Map">
  <area shape="rect" coords="57,2,89,27" href="../aeronaves/lista_aeronave.php" alt="Aeronaves">
  <area shape="rect" coords="97,2,134,27" href="../aeroportos/lista_aeroporto.php" alt="Aeroportos">
  <area shape="rect" coords="20,2,48,27" href="../administradores/lista_administrador.php" alt="Administradores">
  <area shape="rect" coords="144,2,173,27" href="../clientes/lista_clientes.php" alt="Clientes">
  <area shape="rect" coords="183,2,211,27" href="../reservas/lista_reserva.php" alt="Reservas">
  <area shape="rect" coords="220,2,257,27" href="../voos/lista_voo.php" alt="V&ocirc;os">
  <area shape="rect" coords="263,2,293,27" href="../passageiros/lista_passageiros.php" alt="Passageiros">
  <area shape="rect" coords="299,2,329,27" href="../contato/lista_contato.php" alt="Contato">
</map>
