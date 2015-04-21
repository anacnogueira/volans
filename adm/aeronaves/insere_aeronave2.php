<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<?	  
	$fabricante=$_POST["fabricante"];
	$modelo=$_POST["modelo"];
	$motores=$_POST["motores"];
	$classe1=$_POST["classe1"];
	$executiva=$_POST["executiva"];
	$economica=$_POST["economica"];
	$velocidade=$_POST["velocidade"];
	$imagem=$_FILES["foto"]["name"];
	$caminho="../../imagens/aeronaves/externos/";
	$incompleto=false;
	  

if ($fabricante==""){
$erro1 = "<font class='erro'> - Preencha este campo com o Fabricante da Aeronave</font>";
	$incompleto = true;
}
else{
	 $erro1='';
}

if ($modelo==""){
	$erro2="<font class='erro'> - Preencha este campo como o Modelo da Aeronave</font>";
	$incompleto = true;
     }
else{
    $erro2='';
}
if($motores==''){
	$erro3="<font class='erro'> - Preencha este campo com os Motores da Aeronave</font>";
	$incompleto = true;
}

else{
	$erro3='';
}

if($classe1==''){
	$erro4="<font class='erro'> - Preencha este campo com a Capacidade da 1<sup>a</sup> classe</font>";
	$incompleto = true;
}
elseif(!is_numeric($classe1)){
	$erro4="<font class='erro'> - Preencha este campo apenas com Números</font>";
	$incompleto = true;
}
else{
	$erro4='';
}

if($executiva==''){
	$erro5="<font class='erro'> - Preencha este campo com a Capacidade da classe executiva</font>";
	$incompleto = true;
}
elseif(!is_numeric($executiva)){
	$erro5="<font class='erro'> - Preencha este campo apenas com Números</font>";
	$incompleto = true;
}
else{
	$erro5='';
}

if($economica==''){
	$erro6="<font class='erro'> - Preencha este campo com a Capacidade da classe econômica</font>";
	$incompleto = true;
}
elseif(!is_numeric($economica)){
	$erro6="<font class='erro'> - Preencha este campo apenas com Números</font>";
	$incompleto = true;
}
else{
	$erro6='';
}

if($velocidade==''){
	$erro7="<font class='erro'> - Preencha este campo com a Velocidade da Aeronave</font>";
	$incompleto = true;
}
elseif(!is_numeric($velocidade)){
	$erro7="<font class='erro'> - Preencha este campo apenas com Números</font>";
	$incompleto = true;
}
else{
	$erro7='';
}


if($incompleto==true){

/****************
Código HTML
*****************/
?>

<html>
<head>
<title>Adicionar Aeronave</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<link href="../../interface/interface.css" rel="stylesheet" type="text/css">
</head>
<body>
<? include ("../topo/topo_adm.php"); ?>
<table width="778" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td width="50" rowspan="2"><img src="../fatias/asa_azul.gif" width="42" height="34" hspace="0" vspace="0" align="bottom" class="img"></td>
    <td width="734" colspan=2> </td>
  </tr>
  <tr> 
    <td align="left" valign="bottom"> <h1 class="tit_administrador">Adicionar 
        Aeronave</h1></td>
  </tr>
</table>
<form name="administrador " method="post" action="insere_aeronave2.php" enctype="multipart/form-data">
  <table width="779" border="0">
    <tr> 
      <td width="37" height="24"></td>
      <td width="101"> <p>Fabricante</p></td>
      <td colspan="3"><input name="fabricante" type="text"  value="<?=$fabricante;?>" size="29"> 
        <?=$erro1;?>
      </td>
    </tr>
    <tr> 
      <td width="36" height="25"></td>
      <td height="25"><p>Modelo</p></td>
      <td colspan="3"><input name="modelo" type="text"  value="<?=$modelo;?>" size="29"> 
        <?=$erro2;?>
      </td>
    </tr>
    <tr> 
      <td height="25"></td>
      <td height="25"><p>Motores</p></td>
      <td colspan="3"><input name="motores" type="text"  value="<?=$motores;?>" size="29"> 
        <?=$erro3;?>
      </td>
    </tr>
     
	  <tr> 
      <td></td>
      <td colspan="4"><b>Capacidade</b></td>
      </tr>
	  
	  <tr>
      <td></td>
      <td><p>1<sup>a</sup> classe</p></td>
      <td width="129"><input name="classe1" type="text"  value="<?=$classe1; ?>" size="20"></td>
      <td width="49"><p>pessoas</p></td>
      <td width="439"><?=$erro4;?> </td>  
	  </tr>
	  
	  <tr> 
      <td></td>
      <td><p>Executiva</p></td>
      <td width="129"><input name="executiva" type="text"  value="<?=$executiva; ?>" size="20"></td>
      <td width="49"><p>pessoas</p></td>
      <td width="439"><?=$erro5;?></td>
	  </tr> 
	  
	  <tr> 
      <td></td>
      <td><p>Econômica</p></td>
      <td width="129"><input name="economica" type="text"  value="<?=$economica; ?>" size="20"></td>
      <td width="49"><p>pessoas</p></td>
      <td width="439"><?=$erro6;?></td>
	  </tr>
	  
    <tr> 
      <td height="24"></td>
      <td><p>Velocidade</p></td>
      <td><input name="velocidade" type="text"  value="<?=$velocidade;?>" size="20"> 
      </td>
      <td><p>Km/h</p></td>
      <td><?=$erro7;?></td>
    </tr> 
	
	 <tr> 
      <td height="24">&nbsp;</td>
      <td> <p>Imagem</p></td>
      <td colspan="3"><input name="foto" type="file" id="foto" size="15"></td>
    </tr>
      <td></td>
      <td>&nbsp;</td>
      <td colspan="2"><div align="right"> 
          <input type="submit" name="Submit" value="criar">
        </div></td>
      <td>&nbsp;</td>
  </table>
</form>
</body>
</html>
<?
}
else{

	   if (!mysql_query("INSERT INTO aeronaves VALUES (
	   '',
	   '$fabricante', 
	   '$modelo',
	   '$motores',
	   '$classe1',
	   '$executiva',
	   '$economica',
		'$velocidade',
		'$imagem');", $conn)) {
		die(mysql_error());
	  }
	else{
	header("Location: lista_aeronave.php");
	}
}

	
	mysql_close($conn);
?>

