<? include ("../topo/topo_paginas.php"); ?>
<? include("../bd/conexao.php"); ?>
<table width="779" height="818" border="0" cellpadding="0" cellspacing="0">
  <tr > 
    <td height="30" colspan="3" background="../fatias/barra_titulo_inf.gif">
<table width="779" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="32">&nbsp;</td>
          <td width="195" height="25"> <p class = "tit_barra1"><strong><font color="#669966">Aeroportos</font></strong></p></td>
          <td width="582" valign="top"><p class = "tit_barra2">Informa&ccedil;&otilde;es 
              - Aeroportos</p></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td width="653" height="788" valign="top"> <table width="687" height="224" border="0" align="right" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="10" height="34"> <div align="center"></div>
            <p><br>
            </p></td>
          <td rowspan="2" valign="top">
<table border="0" cellpadding="0" cellspacing="1" width="680" align="center">
              <tr> 
                <td colspan="4"><div align="center">
                    <p align="left"><strong>Aeroportos Nacionais</strong></p>
                    <p align="left">&nbsp;</p>
                  </div></td>
              </tr>
			  
              <tr align='center' height='20'> 
                <td><b>Abreviatura</b></td>
                <td><b>Nome</b></td>
                <td><b>Cidade</b></td>
                <td><b>Estado</b></td>
              </tr>
              <? 
$query = "SELECT * FROM aeroporto LIMIT 0,38";
$resultado = mysql_query($query,$conn);
$t=0;
while ($linha = mysql_fetch_array($resultado)){
$id_aeroporto=$linha['id_aeroporto'];
$nome=$linha['nome'];
$cidade=$linha['cidade'];
$estado=$linha['estado'];
$t++;
            if ($t % 2 == 0) {
			$cor="#EFEFEF";
			}
            else {
			  $cor="#CCCCCC";
			} 

echo "<tr align='center' valign='middle' bgcolor='$cor' height='30'>
<td width='150'><p> $id_aeroporto </p></td>
<td align='left' width='800'><p> &nbsp; &nbsp; $nome </p></td>
<td width='200'><p> $cidade </p></td>
<td width='200'><p> $estado </p></td>";
}
?>
            </table>
			
			<br>
<!-- Vôos Internacionais-->
            <table border="0" cellpadding="0" cellspacing="1" width="680" align="center">
              <tr> 
                <td colspan="4"><p><strong>Aeroportos Internacionais</strong></p>
                  <p>&nbsp;</p></td>
              </tr>
              <td><div align="center"><b>Abreviatura</b></div></td>
              <td><div align="center"><b>Nome</b></div></td>
              <td><div align="center"><b>Cidade</b></div></td>
              <td><div align="center"><b>Estado</b></div></td>
              </tr>
              <? 
$query = "SELECT * FROM aeroporto LIMIT 38,50";
$resultado = mysql_query($query,$conn);
$t=0;
while ($linha = mysql_fetch_array($resultado)){
$id_aeroporto=$linha['id_aeroporto'];
$nome=$linha['nome'];
$cidade=$linha['cidade'];
$estado=$linha['estado'];
$t++;
            if ($t % 2 == 0) {
			$cor="#EFEFEF";
			}
            else {
			  $cor="#CCCCCC";
			} 

echo "<tr align='center' valign='middle' bgcolor='$cor' height='30'>
<td width='150'><p> $id_aeroporto </p></td>
<td align='left' width='800'><p> &nbsp; &nbsp; $nome </p></td>
<td width='200'><p> $cidade </p></td>
<td width='200'><p> $estado </p></td>";
}
?>
            </table>

<!--Fim  Vôos Interacionais-->
            </td>
        </tr>
        <tr> 
          <td height="156">&nbsp;</td>
        </tr>
        <tr> 
          <td height="18">&nbsp;</td>
          <td height="18"><div align="right"><a href="#topo" class="link_bordo" onMouseOver="infoLink('Voltar ao Topo');return document.valourtrue" onMouseOut="vazio()">Topo</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:history.back()" class="link_bordo" onMouseOver="infoLink('Voltar à página Anterior');return document.valourtrue" onMouseOut="vazio()">Voltar</a></div></td>
        </tr>
      </table></td>
    <td width="6" align="center" background="../fatias/pontilhado_vert_pag.gif">&nbsp;</td>
    <td width="80" valign="top"> <table width="80" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="100"> <div align="center"><a href="inf_duvidas.php" onMouseOver="infoLink('Informações - Dúvidas Frequentes');return document.valourtrue" onMouseOut="vazio()"><img src="duvidas.gif" width="36" height="36" border="0"></a></div></td>
        </tr>
        <tr> 
          <td height="28">
<div align="center" class="link_icones"><a href="inf_duvidas.php" class="link_icones" onMouseOver="infoLink('Informações - Dúvidas Frequentes');return document.valourtrue" onMouseOut="vazio()">D&uacute;vidas 
              Frequentes </a> </div></td>
        </tr>
        <tr> 
          <td height="45" valign="bottom"> <div align="center"><a href="inf_bagagens.php" onMouseOver="infoLink('Informações - Bagagens');return document.valourtrue" onMouseOut="vazio()"><img src="bagagens.gif" width="36" height="36" border="0"></a></div></td>
        </tr>
        <tr> 
          <td><div align="center"><a href="inf_bagagens.php" class="link_icones" onMouseOver="infoLink('Informações - Bagagens');return document.valourtrue" onMouseOut="vazio()">Bagagens</a></div></td>
        </tr>
        <tr> 
          <td height="45" valign="bottom"><div align="center"><img src="aeroportos_sombra.gif" width="36" height="36" border="0"></div></td>
        </tr>
        <tr> 
          <td height="12">
<div align="center" class="link_icones">Aeroportos</div></td>
        </tr>
      </table></td>
  </tr>
  <? include ("../barra_inferior.php"); ?>
</table>
</body>
</html>
