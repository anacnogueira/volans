<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>	  
<?	  
	$aeronave=$_POST["aeronave"];
	$origem=$_POST["origem"];
	$destino=$_POST["destino"];
	$horas=$_POST["horas"];
	$minutos=$_POST["minutos"];
	$distancia=$_POST["distancia"];
	$valor=$_POST["valor"];
	$incompleto=false;
	
if($aeronave=="0"){
    $erro1="<font class='erro'> - Selecione a aeronave</font>";
	$incompleto=true;
}
else{
    $erro1='';
}

if($origem=="0"){
    $erro2="<font class='erro'> - Seleciona a origem</font>";
	$incompleto=true;
}
else{
    $erro2='';
}

if($destino=="0"){
    $erro3="<font class='erro'> - Seleciona o destino</font>";
	$incompleto=true;
}
else{
    $erro3='';
}

if(($horas=='') and ($minutos!='')){
	$erro4="<font class='erro'> - Preencha as horas</font>";
	$incompleto = true;
     }
else if(($horas!="") and (!is_numeric($horas))){
	$erro4="<font class='erro'> - Preencha as horas apenas com números</font>";
	$incompleto = true;
      }	 
	 
else{
    $erro4='';
}

if(($horas!='') and ($minutos=='')){
	$erro5="<font class='erro'> - Preencha os minutos</font>";
	$incompleto = true;
}
else if(($minutos!="") and (!is_numeric($minutos))){
	$erro5="<font class='erro'> - Preencha os minutos apenas com números</font>";
	$incompleto = true;
      }
else if($minutos>59){
	$erro5="<font class='erro'> - Valor de minutos inválido</font>";
	$incompleto = true;
      }

else{
	$erro5='';
}

if(($horas=='') and ($minutos=='')){
	$erro6="<font class='erro'> - Preencha com as horas e minutos</font>";
	$incompleto = true;
}

else{
	$erro6='';
}

if($distancia==''){
	$erro7="<font class='erro'> - Preencha este campo com a distância entre a origem e o destino</font>";
	$incompleto = true;
}

else{
	$erro7='';
}

if($valor==''){
	$erro8="<font class='erro'> - Preencha este campo com o valor do vôo</font>";
	$incompleto = true;
}

else{
	$erro8='';
}


if($incompleto==true){

/****************
Código HTML
*****************/
?>
<html>
<head>
<link href="../../interface/interface.css" rel="stylesheet" type="text/css">
<title>Adicionar V&ocirc;o</title></head>
<body>
<? include ("../topo/topo_adm.php"); ?>
<table border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td width="50" rowspan="2"><img src="../fatias/asa_azul.gif" width="42" height="34" hspace="0" vspace="0" align="bottom" class="img"></td>
    <td colspan=3> </td>
  </tr>
  <tr> 
    <td width="639" align="left" valign="bottom"><h1 class="tit_administrador">Adicionar 
        V&ocirc;o</h1></td>
	<td width="91" align="left" valign="middle">&nbsp;</td>
  </tr>
</table>

<form name="aeronave " method="post" action="insere_voo2.php" class="form_login">
  <table border="0">
    <tr> 
      <td width="40" height="25">&nbsp;</td>
      <td width="100"><p>Aeronave</p></td>
      <td colspan="2"><select name="aeronave">
          <option value="0">Selecione a aeronave &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <?                        
	 $query="SELECT id_aeronave, modelo FROM aeronaves";
			$st = mysql_query($query,$conn);
			while ($line = mysql_fetch_array($st, MYSQL_BOTH)) {
			$x_aeronave=$line[id_aeronave];
			echo "<option value=\"$x_aeronave\" ";
			if($x_aeronave==$aeronave){
			echo "selected";
			}
   echo ">".$line['modelo']."</option>";
   
   }
	 
	 ?>
        </select><?= $erro1; ?></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><p>Origem</p></td>
      <td colspan="2"> <select name="origem">
          <option value="0">Selecione a origem</option>
          <? 
	 $query="SELECT * FROM aeroporto ORDER BY cidade";
			$st = mysql_query($query, $conn);
			while ($line = mysql_fetch_array($st, MYSQL_BOTH)) {
			$x_origem=$line['cidade']." ".$line['estado']."(".$line['id_aeroporto'].")";
   			echo "<option value='".$x_origem."'";
			if($x_origem==$origem){
			echo "selected";
			}
   			echo ">".$x_origem."</option>";
   }
	 
	 ?>
        </select><?= $erro2; ?></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><p>Destino</p></td>
      <td colspan="2"><select name="destino">
          <option value="0">Selecione o destino</option>
          <? 
	 $query="SELECT * FROM aeroporto cidade";
			$st = mysql_query($query, $conn);
			while ($line = mysql_fetch_array($st, MYSQL_BOTH)) {
			$x_destino=$line['cidade']." ".$line['estado']."(".$line['id_aeroporto'].")";
   			echo "<option value='".$x_destino."'";
			if($x_destino==$destino){
			echo "selected";
			}
   			echo ">".$x_destino."</option>";
   }
	 
	 ?>
        </select><?= $erro3; ?></td>
    </tr>

    <tr> 
      <td>&nbsp;</td>
      <td><p>Tempo</p></td>
      <td colspan="2"><p>
         <input name="horas" type="text" id="horas" size="2" value="<?= $horas; ?>"> : 
		 <input name="minutos" type="text" id="minutos" size="2" value="<?= $minutos; ?>">Hs 
		 <?= $erro4; ?><?= $erro5; ?><?= $erro6; ?>
        </p></td></tr>
    <tr> 
      <td>&nbsp;</td>
      <td><p>Dist&acirc;ncia</p></td>
      <td colspan="2"><p> 
          <input name="distancia" type="text" id="distancia" value="<?= $distancia; ?>" size="22">
          KM 
          <?=$erro7; ?>
        </p></td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><p>Valor</p></td>
      <td colspan="2"><p>
          <input name="valor" type="text" value="<?= $valor; ?>" size="22">
          R$ 
          <?=$erro8; ?>
        </p></td>
        <tr> 
      <td colspan="2">&nbsp;</td>
      <td width="183" height="33" align="right" valign="middle"> 
        <input type="submit" name="Submit" value="criar"></td>
      <td width="438">&nbsp;</td>
    </tr>
  </table>
</form>

</body>
</html>
<?
}
else{
     $tempo=$horas.":".$minutos;
	   if (!mysql_query("INSERT INTO voo VALUES (
	   '',
	   '$aeronave', 
	   '$origem',
	   '$destino',
	   '$tempo',
		'$distancia',
		'$valor'
		);", $conn)) {
		die(mysql_error());
	  }
	else{
	echo "<script language='JavaScript'>
	
	window.location = 'lista_voo.php';
	
</script>";
	//header("Location: lista_voo.php");
	}
}

	
	mysql_close($conn);
?>

