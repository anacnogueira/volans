<? include ("../topo/topo_paginas.php"); ?>
<? include ("../bd/conexao.php"); ?>
<? @session_start();
$email=$_POST['email'];
$senha=$_POST['senha'];
$incompleto=false;

if($_POST['email']==''){
	$erro1="<font class='erro'> - Preencher com seu E-mail de login!</font>";
	$incompleto=true;
	}
	else{
	$erro1='';
	}
if($_POST['senha']==''){
	$erro2="<font class='erro'> - Preencher com a sua Senha!";
	$incompleto=true;
	}	
	else{
	$erro2='';
	}
	
   $query="SELECT * FROM cliente WHERE email='$email' AND senha='$senha'";
   $result=mysql_query($query,$conn);

   $linha=mysql_num_rows($result);

if(($linha==0) AND($email<>'') AND ($senha<>'')){
   $erro3="<font class='erro'>E-mail e/ou senha incorretos</font>";
   $incompleto=true;
   }
   else{
   $erro3='';
   }
   
	if($incompleto==true){
?>
<script language="JavaScript" src="../../scripts/valida_form.js"></script>
<table width="779" height="295" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="30" colspan="3" background="../fatias/barra_titulo_cad.gif"><table width="779" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="32">&nbsp;</td>
          <td width="195" height="25"> <p class = "tit_barra1"><strong><font color="#CCCC33">Compra 
              On-line</font></strong></p></td>
          <td width="582" valign="top"><p class = "tit_barra2">Atualizar
              - Login</p></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td width="653" height="257"> 
      <table width="680" height="242" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="51">&nbsp;</td>
          <td><p>Para realizar as modifica&ccedil;&otilde;es do seu cadastro &eacute; necess&aacute;rio que voc&ecirc; seja cadastrado e logado em nosso sistema. Por favor preencha os campos abaixo com seu e-mail e senha do site:</p>
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
                  <td></td>
                  <td colspan="3"></td>
                </tr>
                <tr> 
                  <td width="12">&nbsp;</td>
                  <td width="77"><p>E-mail</p></td>
                  <td colspan="2"><input name="email" type="text" id="email" value="<?= $email; ?>">
                    <?= $erro1; ?>
                  </td>
                </tr>
                <tr> 
                  <td>&nbsp;</td>
                  <td><p>Senha</p></td>
                  <td colspan="2"><input name="senha" type="password" id="senha">
                    <?= $erro2; ?>
                     </td>
                </tr>
                <tr> 
                  <td>&nbsp;</td>
                  <td align="right">&nbsp; </td>
                  <td width="141" align="right"><input type="submit" name="submit" value="entrar"></td>
                  <td width="212" align="right">
                   
                  </td>
                </tr>
                <tr>
                  <td>&nbsp;</td>
                  <td align="right">&nbsp;</td>
                  <td colspan="2"><?= $erro3; ?></td>
                </tr>
              </table>
            </form>
</td>
<td valign="bottom"><div align="right"><a href="javascript:history.back()" class="link_bordo" onMouseOver="infoLink('Voltar à página Anterior');return document.valourtrue" onMouseOut="vazio()">Voltar</a></div></td>
        </tr>
      </table></td>
    <td width="6" align="center" background="../fatias/pontilhado_vert_pag.gif">&nbsp;</td>
    <td width="80" valign="top"> <table width="80" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td> <div align="center"><a href="cad_cadastrar.php" onMouseOver="infoLink('Cadastro - Cadastrar');return document.valourtrue" onMouseOut="vazio()"><img src="cadastrar.gif" width="36" height="36" border="0"></a></div></td>
        </tr>
        <tr> 
          <td><div align="center"><a href="cad_cadastrar.php" class="link_icones" onMouseOver="infoLink('Cadastro - Cadastrar');return document.valourtrue" onMouseOut="vazio()">Cadastrar</a></div></td>
        </tr>
        <tr> 
          <td height="45" valign="bottom"> <div align="center"><a href="cad_atualizar.php" onMouseOver="infoLink('Cadastro - Atualizar');return document.valourtrue" onMouseOut="vazio()"><img src="atualizar.gif" width="36" height="36" border="0"></a></div></td>
        </tr>
        <tr> 
          <td><div align="center" ><a href="cad_atualizar.php" class="link_icones" onMouseOver="infoLink('Cadastro - Atualizar');return document.valourtrue" onMouseOut="vazio()">Atualizar</a></div></td>
        </tr>
      </table></td>
  </tr>
  
      <? include ("../barra_inferior.php"); ?>
</table>
</body>
</html>
<?
}
	else{
	$x_login=mysql_result($result,0, "email");
	$x_senha=mysql_result($result,0,"senha");
	
	
	$_SESSION['x_login']=$x_login;
	$_SESSION['x_senha']=$x_senha;
	echo "<script>
	window.location='cad_atualizar.php';
	</script>";
		  
  }

 mysql_close($conn);
 ?>
