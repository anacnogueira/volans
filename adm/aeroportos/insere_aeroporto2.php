<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<? include("../../funcoes/array_estados.php"); ?>
<?
	$id_aeroporto=$_POST["id_aeroporto"];
	$nome=$_POST["nome"];
	$cidade=$_POST["cidade"];
	$estado=$_POST["estado"];
	$incompleto=false;
	$id_aeroporto=strtoupper($id_aeroporto);


if ($id_aeroporto==""){
$erro1 = "<font class='erro'> - Preencha este campo com a abreviatura do aeroporto</font>";
	$incompleto = true;
}
elseif(is_numeric($id_aeroporto)){
	$erro1="<font class='erro'> - Preencha este campo apenas com letras</font>";
	$incompleto=true;
}
else{
	 $erro1='';
}

if ($nome==""){
	$erro2="<font class='erro'> - Preencha este campo como o nome do aeroporto</font>";
	$incompleto = true;
     }
else{
    $erro2='';
}
if($cidade==''){
	$erro3="<font class='erro'> - Preencha este campo com a cidade do aeroporto</font>";
	$incompleto = true;
}

else{
	$erro3='';
}

if($incompleto==true){

/****************
Código HTML
*****************/
?>
<html>
<head>
<link href="../../interface/interface.css" rel="stylesheet" type="text/css">
<title>Adicionar Aeroporto</title></head>
<body>
<? include ("../topo/topo_adm.php"); ?>
<table width="778" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td width="50" rowspan="2"><img src="../fatias/asa_azul.gif" width="42" height="34" hspace="0" vspace="0" align="bottom" class="img"></td>
    <td width="734" colspan=2> </td>
  </tr>
  <tr> 
    <td align="left" valign="bottom"> <h1 class="tit_administrador">Adicionar 
        Aeroporto</h1></td>
  </tr>
</table>
<form name="administrador " method="post" action="insere_aeroporto2.php">
  <table width="779" border="0">
    <tr> 
      <td width="44" height="25"></td>
      <td width="106"> <p>Sigla aeroporto</p></td>
      <td colspan="2"><input name="id_aeroporto" type="text" id="id_aeroporto2"  maxlength="3"  size="29" value="<?=$id_aeroporto;?>">
        <?=$erro1;?>
      </td>
    </tr>
    <tr> 
      <td width="44" height="25"></td>
      <td height="25"><p>Aeroporto</p></td>
      <td colspan="2"><input name="nome" type="text" id="nome2" value="<?=$nome;?>" size="29">
        <?=$erro2;?>
      </td>
    </tr>
    <tr> 
      <td height="25"></td>
      <td height="25"><p>Cidade</p></td>
      <td colspan="2"><input name="cidade" type="text" id="cidade3" value="<?=$cidade;?>" size="29">
        <?=$erro3;?>
      </td>
    </tr>
    <tr> 
      <td></td>
      <td><p>Estado</p></td>
      <td colspan="2"><select name="estado" size="1">
          <?
            foreach($estados as $e=>$k){
               echo "<option value=\"$e\" ";
               if($e==$estado){
			      echo "selected";
                }
                 echo ">$e</option>";
                 }
                 ?>
        </select>
		
      </td>
    
    <tr> 
      <td colspan="2">&nbsp; </td>
      <td width="197"> <div align="right"> 
          <input type="submit" name="Submit" value="criar">
        </div></td>
      <td width="414">&nbsp;</td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
<?
}
else{
 if($estado=="Outros"){
 $estado=" ";
 
 }
	   if (!mysql_query("INSERT INTO aeroporto VALUES (
	   '$id_aeroporto', 
	   '$nome',
	   '$cidade',
		'$estado');", $conn)) {
		die(mysql_error());
	  }
	else{
	header("Location: lista_aeroporto.php");
	}
}

	
	mysql_close($conn);
?>

