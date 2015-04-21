<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<?	  
	$nome=$_POST["nome"];
	$senha=$_POST["senha"];
	$conf_senha=$_POST["conf_senha"];
	$permissao=$_POST["permissao"];
	
	$incompleto=false;

if ($nome==""){
$erro1 = "<font class='erro'> - Preencha este campo com o nome do administrador</font>";
	$incompleto = true;
}
else{
	 $erro1='';
}

if ($senha==""){
	$erro2="<font class='erro'> - Preencha este campo com a senha</font>";
	$incompleto = true;
     }
elseif((strlen($senha)<6) ||(strlen($senha)>10)){
	$erro2="<font class='erro'> - A senha deve conter no minímo 6 caracteres e no máximo 10</font>";
	$incompleto = true;
     }
	 else{
    $erro2='';
}
if($conf_senha==''){
	$erro3="<font class='erro'> - Preencha a confirmação da senha</font>";
	$incompleto=true;
}
elseif($conf_senha!=$senha){
	$erro3="<font class='erro'> - A confirmação da senha deve ser igual a senha</font>";
	$incompleto=true;
}
else{
		$erro3='';
}
if ( $permissao == 0){
		$erro4="<font class='erro'> - Selecione a permissão </font>";
		$incompleto= true;
	}
else {
		$erro4='';
	}

if($incompleto==true){

/****************
Código HTML
*****************/
?>
<html>
<head>
<link href="../../interface/interface.css" rel="stylesheet" type="text/css">
<title>Adicionar Administrador</title></head>
<body>
<? include ("../topo/topo_adm.php"); ?>
<table width="778" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td width="50" rowspan="2"><img src="../fatias/asa_azul.gif" width="42" height="34" hspace="0" vspace="0" align="bottom" class="img"></td>
    <td width="734" colspan=2> </td>
  </tr>
  <tr> 
    <td align="left" valign="bottom"> <h1 class="tit_administrador">Adicionar Administrador</h1></td>
  </tr>
</table>
<form name="administrador " method="post" action="insere_administrador2.php">
  <table width="779" border="0">
    <tr> 
      <td width="42" height="25"></td>
      <td width="106"> 
        <p>Nome</p></td>
      <td colspan="2"><input name="nome" type="text" value="<?= $nome; ?>" size="29"> 
        <?= $erro1; ?>
      </td>
    </tr>
    <tr> 
      <td width="44" height="25"></td>
      <td height="25"><p>Senha</p></td>
      <td colspan="2"><input name="senha" type="password" value="<?= $senha; ?>" size="29"> 
        <?= $erro2; ?>
      </td>
    </tr>
    <tr> 
      <td height="25"></td>
      <td height="25"><p>Confirmar senha</p></td>
      <td colspan="2"><input name="conf_senha" type="password" value="<?= $conf_senha; ?>" size="29"> 
        <?= $erro3; ?>
      </td>
    </tr>
    <tr> 
      <td></td>
      <td><p>Permissão</p></td>
      <td colspan="2"><select name="permissao">
          <option value='0'>Selecione a permissão</option>
          <?                        
	 $query="SELECT * FROM administrador";
			$st = mysql_query($query,$conn);
			
				for($i=1;$i<4;$i++){
				if($i==1){
				$x_permissao="Leitura, Gravação e exclusão";
				}  else if($i==2){
				$x_permissaoe="Leitura e Gravação";
				}
				else{
				$x_permissao="Leitura";
				}
   			echo "<option value='".$i."'";
			if($i==$permissao){
			echo "selected";
			}
			echo ">".$x_permissao."</option>";
   
   }
	 ?>
        </select> 
        <?= $erro4; ?>
      </td>
    <tr> 
      <td colspan="2">&nbsp; </td>
      <td width="205"> 
        <div align="right"> 
          <input type="submit" name="Submit" value="criar">
        </div></td>
      <td width="402">&nbsp;</td>
    </tr>
  </table>
</form>

</body>
</html>
<?
}
else{

	   if (!mysql_query("INSERT INTO administrador VALUES (
	   '',
	   '$nome', 
	   '$senha',
	   '$permissao'
	   	);", $conn)) {
		die(mysql_error());
	  }
	else{
	header("Location: lista_administrador.php");
	}
}

	
	mysql_close($conn);
?>

