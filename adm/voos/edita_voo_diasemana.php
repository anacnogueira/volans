<? include ("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>	 
<?	   	   
$key = @$_POST["key"];
$tkey = "" . $key . "";
		function semana($dia,$pos){
       $sem= $dia{$pos};
	   if($sem!='0'){
	  echo "checked";
	}   }
	
		$strsql = "SELECT * FROM voo_dia_semana WHERE id_dia_semana=".$tkey;
		$result = mysql_query($strsql);
		while($linha = mysql_fetch_array($result)) {
     	mysql_error();
			$x_id_dia_semana=$linha['id_dia_semana'];
			$x_id_voo=$linha['id_voo'];
			$x_de=$linha['de'];
			$x_ate=$linha['ate'];
			$x_hora=$linha['hora'];
			$x_dia_semana=$linha['dia_semana'];
					
}

		$data_de=explode("-",$x_de);
		$data_ate=explode("-",$x_ate);
		$hora=explode(":",$x_hora);
?>
<html>
<head>
<title>Editar V&ocirc;o Programação Semanal</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../../interface/interface.css" rel="stylesheet" type="text/css">
</head>
<body>
<? include ("../topo/topo_adm.php"); ?>
<table width="779" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td width="50" rowspan="2"><img src="../fatias/asa_azul.gif" width="42" height="34" hspace="0" vspace="0" align="bottom" class="img"></td>
    <td colspan=3> </td>
  </tr>
  <tr> 
    <td width="639" align="left" valign="bottom"><h1 class="tit_administrador">Editar Vôo - Programação Semanal</h1></td>
    <td width="91" align="left" valign="middle">&nbsp;</td>
  </tr>
</table>

<form name="voo_semana " method="post" action="edita_voo_diasemana2.php" class="form_login">
<input type="hidden" name="key" value="<?= $x_id_dia_semana; ?>">
  <table height="220" border="0">
    <tr> 
      <td width="22" height="25">&nbsp;</td>
      <td width="56"> 
        <p>Vôo</p></td>
      <td colspan="3"><select name="x_id_voo" id="x_id_voo">
          <option value="0">Selecione o Vôo</option>
          <?
	 $query="SELECT * FROM voo";
			$st = mysql_query($query,$conn);
			while ($linha = mysql_fetch_array($st, MYSQL_BOTH)) {
			$id_voo=$linha['id_voo'];
   			echo "<option value='".$id_voo."'";
			if($id_voo==$x_id_voo){
			  echo " selected";
			}
			echo ">".$id_voo."</option>";
         }
	 
	 ?>
        </select></td>
      <td>&nbsp;</td>
    </tr>
    <tr> 
      <td>&nbsp;</td>
      <td><p>De</p></td>
      <td width="72"><select name="x_dia_de" id="x_dia_de">
          <?
	  for($i=1;$i<=31;$i++){
	  echo "<option value='".$i."'";
	  if($i==$data_de[2]){
	  echo " selected";
	  }	  
	  echo ">".$i."</option>";
	  }
	  ?>
        </select> </td>
      <td colspan="2"><select name="x_mes_de" id="x_mes_de">
          <?
	  $meses = array (1=> "Janeiro",
					  2=> "Fevereiro",
					  3=> "Março",
					  4=> "Abril",
                      5=> "Maio",
                      6=> "Junho",
                      7=> "Julho",
                      8=> "Agosto",
					  9=> "Setembro",
                      10=> "Outubro",
                      11=> "Novembro",
                      12=> "Dezembro");
 for($i=1;$i<13;$i++){
 echo "<option value='".$i."'";
 if($i==$data_de[1]){
 	echo " selected";
 } 
 echo ">".$meses[$i]."</option>";
 }
	  ?>
        </select></td>
      <td><select name="x_ano_de" id="x_ano_de">
          <?
	  for($i=2005;$i<2008;$i++){
	  echo "<option value='".$i."'";
	  if($i==$data_de[0]){
	  	echo " selected";
	    }
		echo ">".$i."</option>";
	  }
	  
	  ?>
        </select></td>
    </tr>
    <tr> 
      <td></td>
      <td><p>At&eacute;</p></td>
      <td><select name="x_dia_ate" id="x_dia_ate">
          <?
	  for($i=1;$i<=31;$i++){
	  echo "<option value='".$i."'";
	  if($i==$data_ate[2]){
	  echo " selected";
	  }	  
	  echo ">".$i."</option>";
	  }
	  ?>
        </select></td>
      <td colspan="2"><select name="x_mes_ate" id="x_mes_ate">
          <?
	  $meses = array (1=> "Janeiro",
					  2=> "Fevereiro",
					  3=> "Março",
					  4=> "Abril",
                      5=> "Maio",
                      6=> "Junho",
                      7=> "Julho",
                      8=> "Agosto",
					  9=> "Setembro",
                      10=> "Outubro",
                      11=> "Novembro",
                      12=> "Dezembro");
  for($i=1;$i<13;$i++){
 echo "<option value='".$i."'";
 if($i==$data_ate[1]){
 	echo " selected";
 } 
 echo ">".$meses[$i]."</option>";
 }
	  ?>
        </select></td>
      <td><select name="x_ano_ate" id="x_ano_ate">
          <?
	  for($i=2005;$i<2008;$i++){
	  echo "<option value='".$i."'";
	  if($i==$data_de[0]){
	  	echo " selected";
	    }
		echo ">".$i."</option>";
	  }
	  
	  ?>
        </select></td>
    </tr>
    <tr> 
      <td></td>
      <td><p>Hora</p></td>
      <td nowrap> <p> 
          <input name="x_horas" type="text" id="x_horas" size="2" value="<?= $hora[0]; ?>">
          :</p></td>
      <td width="80"><input name="x_minutos" type="text" id="x_minutos" size="2" value="<?= $hora[1]; ?>">
        Hs</td>
      <td colspan="2"> <p>&nbsp;</p></td>
    </tr>
    <tr> 
      <td align="center"> 
        <p>&nbsp;</p></td>
      <td align="left"> <p>Dia da semana</p></td>
      <td colspan="4">
<table width="219" border="0">
          <tr align="center"> 
            <td width="27"> 
              <p>S</p></td>
            <td width="27"> 
              <p>T</p></td>
            <td width="27"> 
              <p>Q</p></td>
            <td width="27"> 
              <p>Q</p></td>
            <td width="27"> 
              <p>S</p></td>
            <td width="27"> 
              <p>S</p></td>
            <td width="27"> 
              <p>D</p></td>
          </tr>
          <tr align="center"> 
            <td> 
            <input name="Seg" type="checkbox" id="Seg" value="S" <?= semana($x_dia_semana,0); ?>></td>
            <td> 
              <input name="Ter" type="checkbox" id="Ter" value="T" <?= semana($x_dia_semana,1); ?>></td>
            <td> 
              <input name="Qua" type="checkbox" id="Qua" value="Q" <?= semana($x_dia_semana,2); ?>></td>
            <td> 
              <input name="Qui" type="checkbox" id="Qui" value="Q" <?= semana($x_dia_semana,3); ?>></td>
            <td> 
              <input name="Sex" type="checkbox" id="Sex" value="S" <?= semana($x_dia_semana,4); ?>></td>
            <td> 
              <input name="Sab" type="checkbox" id="Sab" value="S" <?= semana($x_dia_semana,5); ?>></td>
            <td> 
              <input name="Dom" type="checkbox" id="Dom" value="D" <?= semana($x_dia_semana,6); ?>></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td colspan="6">
<p>&nbsp;</p>
        <p>&nbsp; </td>
    </tr>
    <tr> 
      <td colspan="2"></td>
      <td height="25" colspan="3" align="right" valign="top"> <input type="submit" name="Submit" value="editar"></td>
      <td width="510">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
