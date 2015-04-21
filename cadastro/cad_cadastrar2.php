<? include("../bd/conexao.php");   ?>
<? include ("../topo/topo_paginas.php"); ?>
<? include("../funcoes/array_estados.php");   ?>
<? include("../funcoes/array_paises.php");   ?>

<?
	
	$nome=$_POST["nome"];
	$sobrenome=$_POST["sobrenome"];
	$cidade=$_POST["cidade"];
	$estado=$_POST["estado"];
	$pais=$_POST["pais"];
	$telefone=$_POST["telefone"];
	$email=$_POST["email"];
	$sexo=$_POST["sexo"];
	$rg=$_POST["rg"];
	$cpf=$_POST["cpf"];
	$senha=$_POST["senha"];
	$conf_senha=$_POST["conf_senha"];
	$publicidade=$_POST["publicidade"];
    $incompleto=false;
      $estados[$estado]=1;
	   $paises[$pais]=1;
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


if ($nome==""){
$erro1 = "<font class='erro'> - Preencha com seu nome </font>";
	$incompleto = true;
}
else{
    $erro1='';
}

if ($sobrenome==""){
$erro2 = "<font class='erro'> - Preencha com seu sobrenome </font>";
	$incompleto = true;
}
else{
    $erro2='';
}
if($cidade==''){
	$erro3="<font class='erro'> - Preencha  com seu cidade</font>";
	$incompleto = true;
}

else{
	$erro3='';
}
if($pais==''){
	$erro4="<font class='erro'> - Preencha com seu pais</font>";
	$incompleto = true;
}

else{
	$erro4='';

}

if(($telefone != "") && (!is_numeric($telefone))){
		$erro5="<font class='erro'> - Este campo deve conter apenas números</font>";
		$incompleto=true;
		}
else{
	$erro5='';
}
if($email==''){
	$erro6="<font class='erro'> - Preencha este campo com seu e-mail</font>";
	$incompleto = true;

}
/*elseif(!checaEmail($email)){
		
		$erro6="<font class='erro'> - Preencha este campo com um e-mail válido</font>";
		$incompleto=true;
} */	
elseif(mysql_query("SELECT * FROM usuarios WHERE email='$email'", $conn)){
		$erro6="<font class='erro'> - Esse E-mail já existe!</font>";
		$incompleto=true;
}
else{
	$erro6='';
}

if ($rg==""){
	$erro7 = "<font class='erro'> - Preencha este campo com rg</font>";
	$incompleto = true;
}
elseif (!is_numeric($rg)){
    $erro7="<font class='erro'> -Preencha este campo apenas com números</font>";
	$incompleto = true;
}
elseif (strlen($rg)!=9){
    $erro7="<font class='erro'> -Este campo deve conter 9 caracteres</font>";
	$incompleto = true;
}

elseif(mysql_query("SELECT * FROM usuarios WHERE rg='$rg'", $conn)){
		$erro7="<font class='erro'> - Esse número de já existe!</font>";
		$incompleto=true;
}
else{
	$erro7='';
}
if($cpf==''){
	$erro8="<font class='erro'> - Preencha este campo com seu cpf</font>";
	$incompleto=true;
}
elseif(!is_numeric($cpf)){
		$erro8="<font class='erro'> - Preencha este campo apenas com números</font>";
		$incompleto=true;
		}
		elseif(strlen($cpf)!=11){
		$erro8="<font class='erro'> - Este campo deve conter 11 caracteres</font>";
		$incompleto=true;
		}
		else{
		
  //VERIFICA
  if( ($cpf == '11111111111') || ($cpf == '22222222222') ||
   ($cpf == '33333333333') || ($cpf == '44444444444') ||
   ($cpf == '55555555555') || ($cpf == '66666666666') ||
   ($cpf == '77777777777') || ($cpf == '88888888888') ||
   ($cpf == '99999999999') || ($cpf == '00000000000') ) {
   $erro8="<font class='erro'> - CPF Inválido!</font>";
   $status = false;
  }

  else {
   //PEGA O DIGITO VERIFIACADOR
   $dv_informado = substr($cpf, 9,2);

   for($i=0; $i<=8; $i++) {
    $digito[$i] = substr($cpf, $i,1);
   }

   //CALCULA O VALOR DO 10º DIGITO DE VERIFICAÇÂO
   $posicao = 10;
   $soma = 0;

   for($i=0; $i<=8; $i++) {
    $soma = $soma + $digito[$i] * $posicao;
    $posicao = $posicao - 1;
   }

   $digito[9] = $soma % 11;

   if($digito[9] < 2) {
    $digito[9] = 0;
   }
   else {
    $digito[9] = 11 - $digito[9];
   }

   //CALCULA O VALOR DO 11º DIGITO DE VERIFICAÇÃO
   $posicao = 11;
   $soma = 0;

   for ($i=0; $i<=9; $i++) {
    $soma = $soma + $digito[$i] * $posicao;
    $posicao = $posicao - 1;
   }

   $digito[10] = $soma % 11;

   if ($digito[10] < 2) {
    $digito[10] = 0; 
   }
   else {
    $digito[10] = 11 - $digito[10];
   }

  //VERIFICA SE O DV CALCULADO É IGUAL AO INFORMADO
  $dv = $digito[9] * 10 + $digito[10];
  if ($dv != $dv_informado) {
  $erro8="<font class='erro'>CPF Inválido!</font>";
   $status = false;
  }
  elseif(mysql_query("SELECT * FROM usuarios WHERE cpf='$cpf'", $conn)){
		$erro8="<font class='erro'> - Esse CPF já existe em nossa base de dados</font>";
		$status=false;
  }
  else
  
   $status = true;

if($status!=true){
	$incompleto=true;		
		}
else{
	$erro8='';
}	}}

if($senha==''){
	$erro9="<font class='erro'> - Preencha este campo com sua senha</font>";
	$incompleto=true;
}
elseif((strlen($senha)<6) ||(strlen($senha)>10)){
	$erro9="<font class='erro'> - A senha deve conter no minímo 6 caracteres e no máximo 10 caracteres</font>";
	$incompleto=true;
}	
else{
	$erro9='';
}

if($conf_senha==''){
	$erro10="<font class='erro'> - Preencha a confirmação da senha</font>";
	$incompleto=true;
}
elseif($conf_senha!=$senha){
	$erro10="<font class='erro'> - A confirmação da senha deve ser igual a senha</font>";
	$incompleto=true;
}
else{
		$erro10='';
}

if($incompleto==true){
?>

<table width="779" height="475" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="30" colspan="3" background="../fatias/barra_titulo_cad.gif"><table width="779" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="32">&nbsp;</td>
          <td width="195" height="25"> <p class = "tit_barra1"><strong><font color="#CCCC33">Cadastrar</font></strong></p></td>
          <td width="582" valign="top"><p class = "tit_barra2">Cadastro - Cadastrar</p></td>
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
              <form name="cadastro" action="cad_cadastrar2.php" method="post" class="form_cadastro">
                <table width="580" border="0" cellpadding="2" cellspacing="2">
                  <tr> 
                    <td width="99"><p>Nome</p></td>
                    <td width="70"><input name="nome" type="text" value="<?=$nome;?>" size="30">* </td>
                    <td><?=$erro1;?></td>
                  </tr>
                  <tr> 
                    <td><p>Sobrenome</p></td>
                    <td><input name="sobrenome" type="text" value="<?=$sobrenome;?>" size="30"> * </td>
                    <td><?=$erro2;?></td>
                  </tr>
                  <tr> 
                    <td><p>Cidade</p></td>
                    <td><input name="cidade" type="text" value="<?=$cidade;?>" size="30">
                      *</td>
                    <td><?=$erro3;?></td>
                  </tr>
                  <tr> 
                    <td><p>Estado</p></td>
                    <td><select name="estado" size="1">
                        <?
            foreach($estados as $e=>$k){
               echo "<option value=\"$e\"";
               if($k==1){
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
                   if($k==1){
                     echo "selected";
                      }
                   echo ">$e</option>";
                   }
                   ?></td>
                    <td></td>
                  </tr>
                  <tr> 
                    <td><p>Telefone</p></td>
                    <td><input name="telefone" type="text" id="telefone3" value="<?=$telefone;?>" size="30"></td>
                    <td><?=$erro5;?></td>
                  </tr>
                  <tr> 
                    <td><p>E-mail</p></td>
                    <td><input name="email" type="text" id="email3" value="<?=$email;?>" size="30">
                      *</td>
                    <td><?=$erro6;?></td>
                  </tr>
                  <tr> 
                    <td><p>Sexo</p></td>
                    <td><p> 
                       <?
            if($sexo=='m'){
            ?>
                  <input name="sexo" type="radio" value="m" checked>
                        Masculino 
                        <input type="radio" name="sexo" value="f">
                        Feminino 
                        <?
             } else {
          ?>
                        <input name="sexo" type="radio" value="m">
                        Masculino 
                        <input type="radio" name="sexo" value="f" checked>
                        Feminino 
                        <?
          }
          ?>
                      </p></td>
                    <td> <p>&nbsp; </p></td>
                  </tr>
                  <tr> 
                    <td><p>RG</p></td>
                    <td><input name="rg" type="text" id="rg3" value="<?=$rg;?>" size="30">
                      *</td>
                    <td><?=$erro7;?></td>
                  </tr>
                  <tr> 
                    <td><p>CPF</p></td>
                    <td><input name="cpf" type="text" id="cpf3" value="<?=$cpf;?>" size="30">
                      *</td>
                    <td><?=$erro8;?></td>
                  </tr>
                  <tr> 
                    <td><p>Senha</p></td>
                    <td><input name="senha" type="password" id="senha2" size="30">
                      *</td>
                    <td><?=$erro9;?></td>
                  </tr>
                  <tr> 
                    <td><p>Redigitar senha</p></td>
                    <td><input name="conf_senha" type="password" id="conf_senha" size="30">
                      *</td>
                    <td><?=$erro10;?></td>
                  </tr>
                  <tr> 
                    <td><p>Permite envio</p>
                      <p>de publicidade?</p></td>
                    <td valign="top"><p> 
                        <input type="radio" name="publicidade"  value="s" checked>
                        Sim 
                        <input type="radio" name="publicidade" value="n">
                        N&atilde;o </p></td>
                    <td valign="top"> <p>&nbsp; </p></td>
                  </tr>
                  <tr> 
                    <td><input type="hidden" name="tipo_user" value="2"></td>
                    <td><input type="submit" name="enviar" value="Enviar">
                      <input type="reset" name="limpar" value="limpar"></td>
                    <td>&nbsp; </td>
                  </tr>
                </table>
              </form>
            </div>
</td>
<td valign="bottom"></td>
        </tr>
      </table>
    <td width="6" align="center" background="../fatias/pontilhado_vert_pag.gif">&nbsp;</td>
    <td width="80" valign="top"> <table width="80" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td> <div align="center"><img src="cadastrar_sombra.gif" width="36" height="36"></div></td>
        </tr>
        <tr> 
          <td><div align="center" class="link_icones">Cadastrar</div></td>
        </tr>
        <tr> 
          <td height="45" valign="bottom"> <div align="center"><a href="cad_atualizar.php" onMouseOver="infoLink('Cadastro - Atualizar');return document.valourtrue" onMouseOut="vazio()"><img src="atualizar.gif" width="36" height="36" border="0"></a></div></td>
        </tr>
        <tr> 
          <td><div align="center" ><a href="cad_atualizar.php" class="link_icones" onMouseOver="infoLink('Cadastro - Atualizar');return document.valourtrue" onMouseOut="vazio()">Atualizar</a></div></td>
        </tr>
        <tr> 
          <td valign="bottom"> <div align="center"></div>
            <div align="center" class="link_icones"></div>
            <div align="center"></div>
            <div align="center" class="link_icones"></div></td>
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
	session_start();
		$_SESSION['cadastro']['nome']=$nome;
        $_SESSION['cadastro']['sobrenome']=$sobrenome;
		$_SESSION['cadastro']['cidade']=$cidade;
		$_SESSION['cadastro']['estado']=$estado;
		$_SESSION['cadastro']['pais']=$pais;
		$_SESSION['cadastro']['telefone']=$telefone;
		$_SESSION['cadastro']['email']=$email;
		$_SESSION['cadastro']['sexo']=$sexo;
		$_SESSION['cadastro']['rg']=$rg;
		$_SESSION['cadastro']['cpf']=$cpf;
		$_SESSION['cadastro']['senha']=$senha;
		$_SESSION['cadastro']['publicidade']=$publicidade;
		
      echo "<script>
       window.location='cad_confirmar.php';
		</script>";



/*	   if (!mysql_query("INSERT INTO cliente VALUES (
	   '', 
	   '$nome',
	   '$sobrenome',
	   '$cidade',
		'$estado',
		'$pais',
		'$telefone',
		'$email',
		'$sexo',
		'$rg',
		'$cpf',
		'$publicidade',
		'$senha');", $conn)) {
		die(mysql_error());
	  }
	


	    else  {
	    echo "<script>
        alert('Dados cadastrados!');
        window.location='../home2.php';
        </script>";
          }   */}
	mysql_close($conn);
	
?>
