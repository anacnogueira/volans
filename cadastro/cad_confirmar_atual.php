<? include("../bd/conexao.php");   ?>
<? include ("../topo/topo_paginas.php"); ?>
<? @session_start(); ?>
<table width="779" height="475" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="30" colspan="3" background="../fatias/barra_titulo_cad.gif"><table width="779" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="32">&nbsp;</td>
          <td width="195" height="25"><p class = "tit_barra1"><strong><font color="#CCCC33">Atualizar</font></strong></p></td>
          <td width="582" valign="top"><p class = "tit_barra2">atualizar - Confirmar 
              atualiza&ccedil;&atilde;o</p></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td width="653" height="430" valign="top"> <table width="680" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="10"> </td>
          <td><p>Por favor, confirme seus dados<br>
              <br>
            </p>
             <form name="atualiza" action="cad_confirmar_atual.php" method="post" class="form_atualiza">
                
              <table width="580" border="0" cellpadding="2" cellspacing="2">
                <tr> 
                  <td width="99"><p>Nome</p></td>
                  <td width="70"><p> 
                      <?= $_SESSION['atualiza']['nome']; ?>
                    </p></td>
                  <td></td>
                </tr>
                <tr> 
                  <td><p>Sobrenome</p></td>
                  <td><p> 
                      <?= $_SESSION['atualiza']['sobrenome']; ?>
                    </p></td>
                  <td></td>
                </tr>
                <tr> 
                  <td><p>Cidade</p></td>
                  <td><p> 
                      <?= $_SESSION['atualiza']['cidade']; ?>
                    </p></td>
                  <td></td>
                </tr>
                <tr> 
                  <td><p>Estado</p></td>
                  <td><p> 
                      <?= $_SESSION['atualiza']['estado']; ?>
                    </p></td>
                  <td>&nbsp; </td>
                </tr>
                <tr> 
                  <td><p>Pa&iacute;s</p></td>
                  <td><p> 
                      <?= $_SESSION['atualiza']['pais']; ?>
                    </p></td>
                  <td></td>
                </tr>
                <tr> 
                  <td><p>Telefone</p></td>
                  <td><p> 
                      <?= $_SESSION['atualiza']['telefone']; ?>
                    </p></td>
                  <td></td>
                </tr>
                <tr> 
                  <td><p>E-mail</p></td>
                  <td><p> 
                      <?= $_SESSION['atualiza']['email']; ?>
                    </p></td>
                  <td></td>
                </tr>               
              
                <tr> 
                  <td><p>Permite envio </p>
                    <p>de publicidade?</p></td>
                  <td valign="top"><p> 
                      <? 
					  if($_SESSION['atualiza']['publicidade']=='s')
					   echo "Sim"; 
					   else
					   echo "Não";
					  ?>
                    </p></td>
                  <td valign="top"></td>
                </tr>
                <tr> 
                  <td></td>
                  <td colspan="2"><input type="button" name="voltar" value="Voltar" onClick="javascript: location='cad_atualizar.php'">
                    <input type="submit" name="submit" value="Confirmar">
                  </td>
                </tr>
              </table>
              </form>
            </div>
</td>
<td valign="bottom"><div align="right"><a href="javascript:history.back()" class="link_bordo" onMouseOver="infoLink('Voltar à página Anterior');return document.valourtrue" onMouseOut="vazio()">Voltar</a></div></td>
        </tr>
      </table></td>
    <td width="6" align="center" background="../fatias/pontilhado_vert_pag.gif">&nbsp;</td>
    <td width="80" valign="top"> <table width="80" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td> <div align="center"><a href="cad_cadastrar.php" onMouseOver="infoLink('Cadastro - Cadastrar');return document.valourtrue" onMouseOut="vazio()"><img src="cadastrar_sombra.gif" width="36" height="36" border="0"></a></div></td>
        </tr>
        <tr> 
          <td><div align="center" class="link_icones"><a href="cad_cadastrar.php" class="link_icones" onMouseOver="infoLink('Cadastro - Cadastrar');return document.valourtrue" onMouseOut="vazio()">Cadastrar</a></div></td>
        </tr>
        <tr> 
          <td height="45" valign="bottom"><div align="center"><a href="cad_atualizar.php" onMouseOver="infoLink('Cadastro - Atualizar');return document.valourtrue" onMouseOut="vazio()"><img src="atualizar_sombra.gif" width="36" height="36" border="0"></a></div></td>
        </tr>
        <tr> 
          <td><div align="center" class="link_icones"><a href="cad_atualizar.php" class="link_icones" onMouseOver="infoLink('Cadastro - Atualizar');return document.valourtrue" onMouseOut="vazio()">Atualizar</a></div></td>
        </tr>
        <tr> 
          <td valign="bottom"> <div align="center"></div>
            <div align="center" class="link_icones"></div>
            <div align="center"></div>
            <div align="center" class="link_icones"></div></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?
if(isset($_POST["submit"])){
$result=mysql_query("UPDATE cliente SET 
	   '".$_SESSION['atualiza']['nome']     ."',
	   '".$_SESSION['atualiza']['sobrenome']."',
	   '".$_SESSION['atualiza']['cidade']   ."',
       '". $_SESSION['atualiza']['estado']  ."',
	   '".$_SESSION['atualiza']['pais']     ."',
	   '".$_SESSION['atualiza']['telefone'] ."',
	   '".$_SESSION['atualiza']['email']    ."',
	   '".$_SESSION['atualiza']['publicidade']."',
		'".$_SESSION['atualiza']['senha']."' 
		WHERE id_user='".$id_cliente."';");
	

echo "<script>
        alert('Dados Alterados!');
        window.location='../index.php';
        </script>";
		}
		mysql_close($conn);
?>

