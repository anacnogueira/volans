<?
include("../bd/conexao.php");
$valSenha=true;
$nome=$_POST['nome'];
$senha=$_POST['senha'];
$incompleto=false;

if($_POST['nome']==''){
	$erro1="<font class='erro'> - Preencher com seu Nome de login!</font>";
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
	if($incompleto==true){
?>
<html>
<head>
<title>Login - Área Restrita</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../interface/interface.css" rel="stylesheet" type="text/css">
</head>

<body>
<table width="779" height="100" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="80" background="fatias/topo_adm_login.jpg">&nbsp;</td>
  </tr>
  <tr> 
    <td height="20" bgcolor="#006699" class="setor_adm">Setor 
      Administrativo <font color="#006699" size="2" face="Arial, Helvetica, sans-serif">l</font> 
      <div align="left"></div></td>
  </tr>
</table>

<table width="779" height="326" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="174" valign="bottom"> 
      <form action="valida_login.php" method="post" name="login" id="login" class="form_login">
        <table width="460" border="0" align="center">
          <tr> 
            <td>&nbsp;</td>
            <td colspan="3">&nbsp;</td>
          </tr>
          <tr> 
            <td width="42"> <div align="right"><b><img src="../icones/adm/i_login.gif" width="42" height="42" align="absmiddle"></b></div></td>
            <td colspan="3"><h2>Login - &Aacute;rea Restrita</h2></td>
          </tr>
          <tr> 
            <td width="42">&nbsp;</td>
            <td width="47"> <p>Nome</p></td>
            <td colspan="2"> <input name="nome" type="text" id="nome" value="<?= $nome; ?>"> 
              <?= $erro1; ?>
            </td>
          </tr>
          <tr> 
            <td height="25">&nbsp;</td>
            <td><p>Senha</p></td>
            <td colspan="2"> <input name="senha" type="password" id="senha"> 
              <?= $erro2; ?>
            </td>
          </tr>
          <tr> 
            <td>&nbsp;</td>
            <td align="right">&nbsp; </td>
            <td width="141" align="right"><input type="submit" name="submit" value="entrar"></td>
            <td width="212" align="right">&nbsp;</td>
          </tr>
        </table>
      </form>
      <div align="right"><img src="fatias/marca_dagua.gif" width="252" height="120"></div></td>
  </tr>
  <tr>
    <td height="20" bgcolor="#006699">&nbsp;</td>
  </tr>
</table>
</body>
</html>
<?
} else{
$query="SELECT * FROM administrador WHERE nome='$nome' AND senha='$senha'";
$result=mysql_query($query,$conn);

$linha=mysql_num_rows($result);

if($linha==0){
?>
<html>
<head>
<title>Login - &Aacute;rea Restrita</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../interface/interface.css" rel="stylesheet" type="text/css">
<script>
	function voltar(){
	location='login.php';
	}
	setTimeout('voltar()',2000);
	
</script>
</head>

<body onBlur="voltar()">
<table width="779" height="100" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="80" background="fatias/topo_adm_login.jpg">&nbsp;</td>
  </tr>
  <tr> 
    <td height="20" bgcolor="#006699" class="setor_adm">Setor 
      Administrativo <font color="#006699" size="2" face="Arial, Helvetica, sans-serif">l</font> 
      <div align="left"></div></td>
  </tr>
</table>
<table width="779" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td width="50" rowspan="2"></td>
    <td colspan=2> </td>
  </tr>
  <tr> 
    <td align="left" valign="bottom"><h1 class="tit_erro">Erro!</h1></td>
  </tr>
</table>
<p>&nbsp;</p>
<table width="303" border="0" align="center">
                    <tr> 
                    <td width="300" height="80"> 
                    <font class='erro2'>Senha e/ou nome de usuário incorreto(s)!</font>
                   <div align="center"></div></td>
                  </tr>
                  </table>

</td>
  </tr>
  <tr>
    <td height="20" bgcolor="#006699">&nbsp;</td>
  </tr>
</table>
<?	 
   }
	else{
	$x_nome=mysql_result($result,0, "nome");
	$x_senha=mysql_result($result,0,"senha");
	
	session_start();
	$_SESSION['x_nome']=$x_nome;
	$_SESSION['x_senha']=$x_senha;
	header("location: index.php");
		  
  }
}
?>