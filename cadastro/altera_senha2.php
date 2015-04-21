<?
include("../bd/conexao.php");
include("sessao.php");

$key=$_POST["key"];
$tkey = "" . $key . "";

$x_senha=$_POST['x_senha'];
$x_conf_senha=$_POST['x_conf_senha'];
$incompleto=false;

if($x_senha==''){
	$erro1="Preencha este campo com a nova senha";
	$incompleto=true;
	}
elseif((strlen($x_senha)<6) ||(strlen($x_senha)>10)){
	$erro1="<font color=#ff0000>A senha deve conter no minímo 6 caracteres e no máximo 10 caracteres</font>";
	$incompleto=true;
}		
else{
	$erro1='';
}	
//////////
if($x_conf_senha==''){
	$erro2="Preencha este campo com a confirmação da nova senha";
	$incompleto=true;
	}
elseif(($x_conf_senha!=$x_senha) && ($x_conf_senha<>'')){
	$erro2="<font color=#ff0000>A confirmação da senha deve ser igual a senha</font>";
	$incompleto=true;
}		
else{
	$erro2='';
}	

if($incompleto==true){
?>
<form name="edita" action="altera_senha2.php" method="post">
<input type="hidden" name="key" value=<? echo "$key"; ?>>

  <table border="0" cellspacing="1" cellpadding="4">
  <tr> 
      <td><b>Nova senha</b></td>
      <td><input type="password" name="x_senha"><?= $erro1; ?></td>
    </tr>
	
    <tr> 
      <td><b>Regigitar senha</b></td>
      <td><input type="password" name="x_conf_senha"><?= $erro2; ?></td>
    </tr>
		
      <tr>
	  <td>&nbsp;</td>            
      <td><input type="submit" name="Action" value="altera senha"></td></tr>
  </table>
</form>
<?
}
else{
	     // update
		 $updateSQL = "UPDATE cliente SET
		 									senha='".$x_senha. "' " .																				
					                        "WHERE id_user=".$tkey;							
		
  	$rs = mysql_query($updateSQL, $conn) or die(mysql_error());
		if(!$rs){
		mysql_error();
		}
		//echo "<br>rs=$updateSQL";
		
		header("location: ../index.php");
	}	
?>
