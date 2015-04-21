<? include ("../bd/conexao.php"); ?>
<? include("sessao.php"); ?>

<table width="779" height="119" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="80" colspan="3" background="../fatias/topo.jpg"><table width="779" height="80" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr align="right" valign="top"> 
          <td height="55" colspan="4" class="login">Seja Bem Vindo(a), <? echo $_SESSION['x_nome']; ?>&nbsp;</td>
        </tr>
        <tr> 
          <td width="341" height="25"> <div align="right"><a href="index.php"><img src="fatias/casa.gif" width="17" height="17" border="0"></a></div></td>
          <td width="68" height="25"> <div align="center"><a href="ajuda.php">Ajuda</a></div></td>
          <td width="54" height="25"> <div align="center"><a href="logout.php">Sair</a></div></td>
          <td width="317" height="25">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td width="127" height="20" bgcolor="#006699" class="setor_adm">Setor Administrativo</td>
    <td width="350" height="20" bgcolor="#006699">&nbsp;</td>
    <td width="302" rowspan="2" valign="top"> <div align="right"><img src="fatias/menu_dir.gif" width="302" height="33" border="0" usemap="#Map"></div></td>
  </tr>
  <tr> 
    <td height="19" colspan="2">&nbsp;</td>
  </tr>
</table>
<map name="Map">
  <area shape="rect" coords="29,2,61,25" href="administradores/lista_administrador.php">
  <area shape="rect" coords="75,2,109,25" href="aeronaves/lista_aeronave.php">
  <area shape="rect" coords="122,2,159,25" href="aeroportos/lista_aeroporto.php">
  <area shape="rect" coords="170,2,201,25" href="clientes/lista_clientes.php">
  <area shape="rect" coords="213,2,240,25" href="reservas/lista_reserva.php">
  <area shape="rect" coords="251,2,287,25" href="voos/lista_voo.php">
</map>
