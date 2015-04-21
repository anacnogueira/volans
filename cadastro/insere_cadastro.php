<?php include("../adm/conexao.php");
      include("array_estados.php");

	$ncartao=$_POST["ncartao"];
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
$erro1 = "<font color='#FF0000'> - Preencha este campo com seu nome </font>";
	$incompleto = true;
}
else{
    $erro1='';
}

if ($sobrenome==""){
$erro2 = "<font color='#FF0000'> - Preencha este campo com seu nome </font>";
	$incompleto = true;
}
else{
    $erro2='';
}
if($cidade==''){
	$erro3="<font color='#FF0000'> - Preencha este campo com seu cidade</font>";
	$incompleto = true;
}

else{
	$erro3='';
}
if($pais==''){
	$erro4="<font color='#FF0000'> - Preencha este campo com seu pais</font>";
	$incompleto = true;
}

else{
	$erro4='';

}

if(($telefone != "") && (!is_numeric($telefone))){
		$erro5="<font color='#FF0000'> - Este campo deve conter apenas números</font>";
		$incompleto=true;
		}
else{
	$erro5='';
}
if($email==''){
	$erro6="<font color='#FF0000'> - Preencha este campo com seu e-mail</font>";
	$incompleto = true;

}
/*elseif(!checaEmail($email)){
		
		$erro6="<font color='#FF0000'> - Preencha este campo com um e-mail válido</font>";
		$incompleto=true;
} */	
elseif(mysql_query("SELECT * FROM usuarios WHERE email='$email'", $conn)){
		$erro6="<font color='#FF0000'> - Esse E-mail já existe!</font>";
		$incompleto=true;
}
else{
	$erro6='';
}

if ($rg==""){
	$erro7 = "<font color='#FF0000'> - Preencha este campo com rg</font>";
	$incompleto = true;
}
elseif (!is_numeric($rg)){
    $erro7="<font color='#FF0000'> -Preencha este campo apenas com números</font>";
	$incompleto = true;
}
elseif (strlen($rg)!=9){
    $erro7="<font color='#FF0000'> -Este campo deve conter 9 caracteres</font>";
	$incompleto = true;
}

elseif(mysql_query("SELECT * FROM usuarios WHERE rg='$rg'", $conn)){
		$erro7="<font color='#FF0000'> - Esse número de já existe!</font>";
		$incompleto=true;
}
else{
	$erro7='';
}
if($cpf==''){
	$erro8="<font color='#FF0000'> - Preencha este campo com seu cpf</font>";
	$incompleto=true;
}
elseif(!is_numeric($cpf)){
		$erro8="<font color='#FF0000'> - Preencha este campo apenas com números</font>";
		$incompleto=true;
		}
		elseif(strlen($cpf)!=11){
		$erro8="<font color='#FF0000'> - Este campo deve conter 11 caracteres</font>";
		$incompleto=true;
		}
		else{
		
  //VERIFICA
  if( ($cpf == '11111111111') || ($cpf == '22222222222') ||
   ($cpf == '33333333333') || ($cpf == '44444444444') ||
   ($cpf == '55555555555') || ($cpf == '66666666666') ||
   ($cpf == '77777777777') || ($cpf == '88888888888') ||
   ($cpf == '99999999999') || ($cpf == '00000000000') ) {
   $erro8="<font color=#ff0000>CPF Inválido!</font>";
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
  $erro8="<font color=#ff0000>CPF Inválido!</font>";
   $status = false;
  }
  elseif(mysql_query("SELECT * FROM usuarios WHERE cpf='$cpf'", $conn)){
		$erro8="<font color='#FF0000'> - Esse CPF já existe em nossa base de dados</font>";
		$status=false;
  }
  else
  
   $status = true;
}}
if(!$status){
	$incompleto=true;		
		}
else{
	$erro8='';
}	

if($senha==''){
	$erro9="<font color=#ff0000>Preencha este campo com sua senha</font>";
	$incompleto=true;
}
elseif((strlen($senha)<6) ||(strlen($senha)>10)){
	$erro9="<font color=#ff0000>A senha deve conter no minímo 6 caracteres e no máximo 10 caracteres</font>";
	$incompleto=true;
}	
else{
	$erro9='';
}

if($conf_senha==''){
	$erro10="<font color=#ff0000>Preencha a confirmação da senha</font>";
	$incompleto=true;
}
elseif($conf_senha!=$senha){
	$erro10="<font color=#ff0000>A confirmação da senha deve ser igual a senha</font>";
	$incompleto=true;
}
else{
		$erro10='';
}

if($incompleto==true){

/****************
Código HTML
*****************/
?>


<div id="geral">
  <div id="titulo">Cadastro de clientes<br>
    <br>
    Os campos com asterisco(*) s&atilde;o obrigat&oacute;rios</div>
  <div id="conteudo"> 
    <form name="cadastro" action="insere_cadastro.php" method="post">
      <table border="0" cellpadding="2" cellspacing="2">
        <tr> 
          <td width="154">Numero cartao fidelidade</td>
          <td width="152"><input type="text" name="ncartao" value="<?=$ncartao;?>"></td>
        </tr>
		
        <tr> 
          <td>Nome</td>
          <td><input type="text" name="nome" value="<?=$nome;?>">*<?=$erro1;?>
          </td>
        </tr>
        
		   <tr> 
          <td>Sobrenome</td>
          <td><input type="text" name="sobrenome" value="<?=$sobrenome;?>">*<?=$erro2;?>
          </td>
        </tr>
        
       
          <td>Cidade</td>
          <td><input type="text" name="cidade" value="<?=$cidade;?>">*<?=$erro3;?></td>
        </tr>
        <tr> 
          <td>Estado</td>
          <td>
            <select name="estado" size="1">
                 <?
            foreach($estados as $e=>$k){
               echo "<option value=\"$e\"";
               if($k==1){
                echo "selected";
                }
                 echo ">$e</option>";
                 }
                 ?>
            </select>
            </td>
        </tr>
        <tr> 
          <td>Pais</td>
          <td><input name="pais" type="text" id="pais" size="3" maxlength="3" value="<?=$pais;?>">*<?=$erro4;?></td>
        </tr>
        <tr> 
          <td>Telefone</td>
          <td><input name="telefone" type="text" id="telefone" value="<?=$telefone;?>"><?=$erro5;?></td>
        </tr>
        <tr> 
          <td>E-mail</td>
          <td><input name="email" type="text" id="email" value="<?=$email;?>">*<?=$erro6;?></td>
        </tr>
        <tr> 
          <td>Sexo</td>
          <td>
              <?
            if($sexo=='m'){
            ?>
                  <input name="sexo" type="radio" value="m" checked>Masculino
                  <input type="radio" name="sexo" value="f">Feminino</td>
          <?
             } else {
          ?>
                  <input name="sexo" type="radio" value="m">Masculino
                  <input type="radio" name="sexo" value="f" checked>Feminino</td>
          <?
          }
          ?>
          </td>
        </tr>
        <tr> 
          <td>RG</td>
          <td><input name="rg" type="text" id="rg" value="<?=$rg;?>">*<?= $erro7;?>
          </td>
        </tr>
        <tr> 
          <td>CPF</td>
          <td><input name="cpf" type="text" id="cpf" value="<?=$cpf;?>">*<?= $erro8;?>
          </td>
        </tr>
        <tr> 
          <td>senha</td>
          <td><input name="senha" type="password" id="senha">*<?=$erro9;?></td>
        </tr>
        <tr> 
          <td>redigitar senha</td>
          <td><input name="conf_senha" type="password" id="senha">*<?=$erro10;?></td>
        </tr>
        <tr> 
          <td>Permite publicidade?</td>
          <td><?
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
          ?> </td>
        </tr>
        <tr>
          <td><input type="hidden" name="tipo_user" value="2"></td>
          <td><input type="submit" name="enviar" value="Enviar">
            <input type="reset" name="limpar" value="limpar"></td>
        </tr>
      </table>
	  
      </form>
</div>
</div>
</body>
</html>
<?
}
else{

	   if (!mysql_query("INSERT INTO cliente VALUES (
	   '', 
	   '$ncartao',
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
	
}

	
	mysql_close($conn);
?>

