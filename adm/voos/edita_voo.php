<? include ("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>	 
<?	   	   
$key = @$_POST["key"];
$tkey = "" . $key . "";
		
		$strsql = "SELECT * FROM voo WHERE id_voo=".$tkey;
		$result = mysql_query($strsql);
		while($linha = mysql_fetch_array($result)) {
     	mysql_error();
			$x_id_voo=$linha['id_voo'];
			$x_id_aeronave=$linha['id_aeronave'];
			$x_origem=$linha['origem'];
			$x_destino=$linha['destino'];
			$x_tempo_voo=$linha['tempo_voo'];
			$x_distancia=$linha['distancia'];
			$x_valor=$linha['valor'];
			
			$hora=explode(":",$x_tempo_voo);
}
?>
<html>
<head>
<title>Editar V&ocirc;o</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../../interface/interface.css" rel="stylesheet" type="text/css">
</head>
<body>
<? include ("../topo/topo_adm.php"); ?>
<table width="779" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td width="50" rowspan="2"><img src="../fatias/asa_azul.gif" width="42" height="34" hspace="0" vspace="0" align="bottom" class="img"></td>
    <td colspan=2> </td>
  </tr>
  <tr> 
    <td align="left" valign="bottom"> <h1 class="tit_administrador">Editar V&ocirc;o</h1></td>
  </tr>
</table>
<form name="edita" action="edita_voo2.php" method="post" class="form_login">
<input type="hidden" name="key" value=<? echo "$x_id_voo"; ?>>


  <table border="0">
    <tr> 
      <td width="44" height="25">&nbsp;</td>
      <td width="105"><p>ID v&ocirc;o</pb></td>
      <td colspan="2"><p><? echo $x_id_voo; ?></p></td>
    </tr>
    <tr> 
      <td width="44" height="25">&nbsp;</td>
      <td><p>Aeronave</p></td>
      <td colspan="2"><select name="x_aeronave">
          <option>Selecione a aeronave &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <?                        
	 $query="SELECT id_aeronave, modelo FROM aeronaves";
			$st = mysql_query($query,$conn);
			while ($line = mysql_fetch_array($st, MYSQL_BOTH)) {
			$x_aeronave=$line[id_aeronave];
			echo "<option value=\"$x_aeronave\" ";
			if($x_aeronave==$x_id_aeronave){
			echo "selected";
			}
   echo ">".$line['modelo']."</option>";
   
   }
	 
	 ?>
        </select></td>
    </tr>
    <tr> 
      <td width="44" height="25">&nbsp;</td>
      <td><p>Origem</p></td>
      <td colspan="2"><select name="x_origem">
          <option>Selecione a origem</option>
          <? 
	 $query="SELECT * FROM aeroporto";
			$st = mysql_query($query, $conn);
			while ($line = mysql_fetch_array($st, MYSQL_BOTH)) {
			$xx_origem=$line['cidade']." ".$line['estado']."(".$line['id_aeroporto'].")";
   			echo "<option value='".$xx_origem."'";
			if($xx_origem==$x_origem){
			echo "selected";
			}
   			echo ">".$xx_origem."</option>";
   }
	 
	 ?>
        </select> </td>
    </tr>
    <tr> 
      <td width="44" height="25">&nbsp;</td>
      <td><p>Destino</pb></td>
      <td colspan="2"><select name="x_destino">
          <option>Selecione o destino</option>
          <? 
	 $query="SELECT * FROM aeroporto";
			$st = mysql_query($query, $conn);
			while ($line = mysql_fetch_array($st, MYSQL_BOTH)) {
			$xx_destino=$line['cidade']." ".$line['estado']."(".$line['id_aeroporto'].")";
   			echo "<option value='".$xx_destino."'";
			if($xx_destino==$x_destino){
			echo "selected";
			}
   			echo ">".$xx_destino."</option>";
   }
	 
	 ?>
        </select></td>
    </tr>
    
      <td width="44" height="25">&nbsp;</td>
      <td><p>Tempo</p></td>
      <td colspan="2"><input name="x_horas" type="text" id="x_horas" size="2" value="<?= $hora[0]; ?>">
        :
<input name="x_minutos" type="text" id="x_minutos" size="2" value="<?= $hora[1]; ?>"></td>
    </tr>
    <tr> 
      <td width="44" height="25">&nbsp;</td>
      <td><p>Distância</p></td>
      <td colspan="2"><input type="text" name="x_distancia" size="26" value="<?=@$x_distancia; ?>"></td>
    </tr>
    <tr> 
      <td width="44" height="25">&nbsp;</td>
      <td><p>Valor</p></td>
      <td colspan="2"><input type="text" name="x_valor" size="26" value="<?=@$x_valor; ?>"></td>
    </tr>
 
      <td colspan="2"></td>
      <td width="183" align="right">
<input type="submit" name="Submit" value="editar">
      </td>
	  <td width="438">&nbsp;</td>
    </tr>
  </table>
</form>
