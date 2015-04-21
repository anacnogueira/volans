<? include ("../topo/topo_paginas.php"); ?>
<? include("../bd/conexao.php"); ?>
<? include("../funcoes/array_estados.php"); ?>
<? include("../funcoes/array_paises.php"); ?>
<? include("../funcoes/sessao.php"); ?>

<?
$id_cliente=$_POST['key'];
$nome=$_POST['nome'];
$sobrenome=$_POST['sobrenome'];
$cidade=$_POST['cidade'];
$estado=$_POST['estado'];
$email=$_POST['email'];
$pais=$_POST['pais'];
$telefone=$_POST['telefone'];
$publicidade=$_POST['publicidade'];
$senha=$_POST['senha'];
$conf_senha=$_POST['conf_senha'];
$incompleto=false;

function checaEmail($email) { 
    $e = explode("@",$email); 
    if(count($e) <= 1) { 
        return FALSE; 
    } elseif(count($e) == 2) { 
        $ip = gethostbyname($e[1]); 
        if($ip == $e[1]) { 
            return FALSE; 
        } elseif($ip != $e[1]) { 
            return TRUE; 
        } 
    } 
} 

if ($sobrenome==""){
$erro1 = "<font class='erro'> - Preencha este campo com seu nome </font>";
	$incompleto = true;
}
else{
    $erro1='';
}
if($cidade==''){
	$erro2="<font class='erro'> - Preencha este campo com seu cidade</font>";
	$incompleto = true;
}

else{
	$erro2='';
}


if(($telefone != "") && (!is_numeric($telefone))){
		$erro3="<font class='erro'> - Este campo deve conter apenas números</font>";
		$incompleto=true;
		}
else{
	$erro3='';
}
if($email==''){
	$erro4="<font class='erro'> - Preencha este campo com seu e-mail</font>";
	$incompleto = true;

}
/*
elseif(!checaEmail($email)){
		
		$erro4="<font class='erro'> - Preencha este campo com um e-mail válido</font>";
		$incompleto=true;
} 
*/	
elseif(mysql_query("SELECT * FROM usuarios WHERE email='$email'", $conn)){
		$erro4="<font class='erro'> - Esse E-mail já existe!</font>";
		$incompleto=true;
}
else{
	$erro4='';
}
if($senha==''){
	$erro5="<font class='erro'> - Preencha este campo com sua senha</font>";
	$incompleto=true;
}
elseif((strlen($senha)<6) ||(strlen($senha)>10)){
	$erro5="<font class='erro'> - A senha deve conter no minímo 6 caracteres e no máximo 10 caracteres</font>";
	$incompleto=true;
}	
else{
	$erro5='';
}

if($conf_senha==''){
	$erro6="<font class='erro'> - Preencha a confirmação da senha</font>";
	$incompleto=true;
}
elseif($conf_senha!=$senha){
	$erro6="<font class='erro'> - A confirmação da senha deve ser igual a senha</font>";
	$incompleto=true;
}
else{
		$erro6='';
}

if($incompleto==true){
?>
<table width="779" height="475" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="30" colspan="3" background="../fatias/barra_titulo_cad.gif"><table width="779" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="32">&nbsp;</td>
          <td width="195" height="25"> <p class = "tit_barra1"><strong><font color="#CCCC33">Atualizar</font></strong></p></td>
          <td width="582" valign="top"><p class = "tit_barra2">atualiza -Atualizar</p></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td width="653" height="430"> <table width="680" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="10"> <div align="center"></div>
            <p><br>
            </p></td>
          <td>
<p>Os campos com * são obrigatórios </p>
            <div id="conteudo"> 
              <form name="atualiza" action="cad_atualizar2.php" method="post" class="form_atualiza">
			  <input type="hidden" name="key" value=<? echo "$id_cliente"; ?>>
                <table border="0" width="680" cellpadding="2" cellspacing="2">
                  <tr> 
                    <td width="102"><p>Nome</p></td>
                    <td width="245"><p><input type="hidden" name="nome" value=<? echo "$nome"; ?>>
					<? echo $nome; ?>* </p></td>
                    <td width="8"></td>
                  </tr>
                  <tr> 
                    <td><p>Sobrenome</p></td>
                    <td><input name="sobrenome" type="text" size="30" value="<?= $sobrenome; ?>">
                      * </td>
                    <td><?= $erro1; ?></td>
                  </tr>
                  <tr> 
                    <td><p>Cidade</p></td>
                    <td><input name="cidade" type="text" size="30" value="<?= $cidade; ?>">
                      *</td>
                    <td><?= $erro2; ?></td>
                  </tr>
                  <tr> 
                    <td><p>Estado</p></td>
                    <td><select name="estado" size="1">
                        <?
            foreach($estados as $e=>$k){
               echo "<option value=\"$e\"";
               if($e==$estado){
                echo "selected";
                }
                 echo ">$e</option>";
                 }
                 ?>
            </select></td>
                    <td>&nbsp; </td>
                  </tr>
                  <tr> 
                    <td><p>Pa&iacute;s</p></td>
                    <td><select name="pais" size="1">
                        <?
            foreach($paises as $e=>$k){
               echo "<option value=\"$e\"";
               if($e==$pais){
                echo "selected";
                }
                 echo ">$e</option>";
                 }
                 ?>
            </select></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr> 
                    <td><p>Telefone</p></td>
                    <td><input name="telefone" type="text" id="telefone2" size="30" value="<?= $telefone; ?>"></td>
                    <td><?= $erro3; ?></td>
                  </tr>
                  <tr> 
                    <td><p>E-mail</p></td>
                    <td><input name="email" type="text" id="email2" size="30" value="<?= $email; ?>">
                      *</td>
                    <td><?= $erro4; ?></td>
                  </tr>
                  
                  
                  
                  <tr> 
                    <td><p>Senha</p></td>
                    <td><input name="senha" type="password" id="senha2" size="30" value="<?= $senha; ?>">
                      *</td>
                    <td><?= $erro5; ?></td>
                  </tr>
                  <tr> 
                    <td><p>Redigitar senha</p></td>
                    <td><input name="conf_senha" type="password" id="conf_senha" size="30">
                      *</td>
                    <td><?= $erro6; ?></td>
                  </tr>
                  <tr> 
                    <td><p>Permite envio </p>
                      <p>de publicidade?</p></td>
                    <td valign="top"><p>
                        <?
            if($publicidade=='s'){
            ?>
                  <input type="radio" name="publicidade"  value="s" checked>Sim
                  <input type="radio" name="publicidade" value="n">Não</td>
          <?
             } else {
          ?>
                  <input type="radio" name="publicidade"  value="s">Sim
                  <input type="radio" name="publicidade" value="n" checked>Não</td>
          <?
          }
          ?> </p></td>
                    <td valign="top"> <p>&nbsp; </p></td>
                  </tr>
                  <tr> 
                    <td></td>
                    <td><input type="submit" name="enviar" value="Enviar">
                      <input type="reset" name="limpar" value="limpar"></td>
                    <td>&nbsp; </td>
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
          <td> <div align="center"><a href="cad_cadastrar.php" onMouseOver="infoLink('Cadastro - Cadastrar');return document.valourtrue" onMouseOut="vazio()"><img src="cadastrar.gif" width="36" height="36" border="0"></a></div></td>
        </tr>
        <tr> 
          <td><div align="center" class="link_icones"><a href="cad_cadastrar.php" class="link_icones" onMouseOver="infoLink('Cadastro - Cadastrar');return document.valourtrue" onMouseOut="vazio()">Cadastrar</a></div></td>
        </tr>
        <tr> 
          <td height="45" valign="bottom"> <div align="center"><img src="atualizar_sombra.gif" width="36" height="36" border="0"></div></td>
        </tr>
        <tr> 
          <td><div align="center" class="link_icones">Atualizar</div></td>
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
}
else{	
	
	    $_SESSION['atualiza']['id_clienta']=$id_cliente;
		$_SESSION['atualiza']['nome']=$nome;
        $_SESSION['atualiza']['sobrenome']=$sobrenome;
		$_SESSION['atualiza']['cidade']=$cidade;
		$_SESSION['atualiza']['estado']=$estado;
		$_SESSION['atualiza']['pais']=$pais;
		$_SESSION['atualiza']['telefone']=$telefone;
		$_SESSION['atualiza']['email']=$email;
		$_SESSION['atualiza']['senha']=$senha;
		$_SESSION['atualiza']['publicidade']=$publicidade;
		
      echo "<script>
       window.location='cad_confirmar_atual.php';
		</script>";
		}
?>
