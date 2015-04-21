<? require_once("sessao.php"); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>&Aacute;rea Restrita - Gerenciamento</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript" src="../scripts/msg_status.js"></script>
<link href="../interface/interface.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="0" topmargin="0">
<? include("topo_adm_home.php"); ?>
<table width="779" height="289" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="32" colspan="4">&nbsp;</td>
  </tr>
  <tr> 
    <td width="234" height="60"> 
      <div align="right"><a href="administradores/lista_administrador.php" onMouseOver="infoLink('Administradores');return document.valourtrue" onMouseOut="vazio()"><img src="../icones/adm/i_administrador.gif" width="42" height="42" border="0"></a></div></td>
    <td width="158"><a href="administradores/lista_administrador.php" class="link" onMouseOver="infoLink('Administradores');return document.valourtrue" onMouseOut="vazio()">Administradores</a></td>
    <td width="131"> 
      <div align="right"><a href="reservas/lista_reserva.php" onMouseOver="infoLink('Reservas');return document.valourtrue" onMouseOut="vazio()"><img src="../icones/adm/i_reserva.gif" width="41" height="42" border="0"></a></div></td>
    <td width="256"><a href="reservas/lista_reserva.php" class="link" onMouseOver="infoLink('Reservas');return document.valourtrue" onMouseOut="vazio()">Reservas</a></td>
  </tr>
  <tr> 
    <td height="60"> 
      <div align="right"><a href="aeronaves/lista_aeronave.php" onMouseOver="infoLink('Aeronaves');return document.valourtrue" onMouseOut="vazio()"><img src="../icones/adm/i_aeronave.gif" width="50" height="42" border="0"></a></div></td>
    <td><a href="aeronaves/lista_aeronave.php" class="link" onMouseOver="infoLink('Aeronaves');return document.valourtrue" onMouseOut="vazio()">Aeronaves</a></td>
    <td> 
      <div align="right"><a href="voos/lista_voo.php" onMouseOver="infoLink('Vôos');return document.valourtrue" onMouseOut="vazio()"><img src="../icones/adm/i_voo.gif" width="50" height="42" border="0"></a></div></td>
    <td><a href="voos/lista_voo.php" class="link" onMouseOver="infoLink('Vôos');return document.valourtrue" onMouseOut="vazio()">V&ocirc;os</a></td>
  </tr>
  <tr> 
    <td height="60"> 
      <div align="right"><a href="aeroportos/lista_aeroporto.php" onMouseOver="infoLink('Aeroportos');return document.valourtrue" onMouseOut="vazio()"><img src="../icones/adm/i_aeroporto.gif" width="50" height="42" border="0"></a></div></td>
    <td><a href="aeroportos/lista_aeroporto.php" class="link" onMouseOver="infoLink('Aeroportos');return document.valourtrue" onMouseOut="vazio()">Aeroportos</a></td>
    <td>
<div align="right" ><a href="passageiros/lista_passageiros.php" onMouseOver="infoLink('Passageiros');return document.valourtrue" onMouseOut="vazio()"><img src="../icones/adm/i_passageiro.gif" width="42" height="42" border="0"></a></div></td>
    <td><a href="passageiros/lista_passageiros.php" class="link" onMouseOver="infoLink('Passageiros');return document.valourtrue" onMouseOut="vazio()">Passageiros</a></td>
  </tr>
  <tr> 
    <td height="60"> 
      <div align="right"><a href="clientes/lista_clientes.php" onMouseOver="infoLink('Clientes');return document.valourtrue" onMouseOut="vazio()"><img src="../icones/adm/i_cliente.gif" width="43" height="42" border="0"></a></div></td>
    <td><a href="clientes/lista_clientes.php" class="link" onMouseOver="infoLink('Clientes');return document.valourtrue" onMouseOut="vazio()">Clientes</a></td>
    <td> 
      <div align="right"><a href="contato/lista_contato.php" onMouseOver="infoLink('Contatos');return document.valourtrue" onMouseOut="vazio()"><img src="../icones/adm/i_contato.gif" width="42" height="42" border="0"></a></div></td>
    <td><a href="contato/lista_contato.php" class="link" onMouseOver="infoLink('Contatos');return document.valourtrue" onMouseOut="vazio()">Contatos</a></td>
  </tr>
  <tr> 
    <td height="34" colspan="4">&nbsp;</td>
  </tr>
  <tr> 
    <td height="20" colspan="4" bgcolor="#006699">&nbsp;</td>
  </tr>
</table>
</body>
</html>
