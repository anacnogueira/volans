<? include ("../../bd/conexao.php");  ?>
<? include("../sessao/sessao.php"); ?>
<html>
<head>
<title>Adicionar V&ocirc;o</title>
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
    <td width="639" align="left" valign="bottom"><h1 class="tit_administrador">Adicionar Vôo - Programação Semanal</h1></td>
    <td width="91" align="left" valign="middle">&nbsp;</td>
  </tr>
</table>

<form name="voo_semana " method="post" action="insere_voo_diasemana2.php" class="form_login">
  <table height="220" border="0">
  
    <tr> 
      <td width="50" height="25">
	  <?
	  $dia_de  =date('d');
	  $dia_ate =date('d');
	  $mes_de  =date('n');
	  $mes_ate =date('n');
	  $ano_de  =date('Y');
	  $ano_ate =date('Y');
	  
	  if(isset($_GET["dia_de"])){
	  $dia_de=$_GET["dia_de"];
	  }
	  
	  if(isset($_GET["dia_ate"])){ 
	  $dia_ate=$_GET["dia_ate"];
	  }
     
      if(isset($_GET["mes_de"])){ 
	  $mes_de=$_GET["mes_de"];
	  }
	  
	  if(isset($_GET["mes_ate"])){ 
	  $mes_ate=$_GET["mes_ate"];
	  }
	
	  if(isset($_GET["ano_de"])){ 
	  $ano_de=$_GET["ano_de"];
	  }
	  
	  if(isset($_GET["ano_ate"])){ 
	  $ano_ate=$_GET["ano_ate"];
	  }
	
	  ?>
	  
	  </td>
      <td width="85"><p>Vôo</p></td>
      <td colspan="2"><select name="voo">
          <option value="0">Selecione o Vôo</option>
          <?
	 $query="SELECT * FROM voo ORDER BY id_voo";
			$st = mysql_query($query,$conn);
			while ($linha = mysql_fetch_array($st, MYSQL_BOTH)) {
			$id_voo=$linha["id_voo"];
   			echo "<option value='".$id_voo."'>".$id_voo."</option>";
   
   }
	 
	 ?>
        </select></td>
      <td width="207">&nbsp;</td>
    </tr>
  
   <tr> 
      <td height="25">
       
      </td>
    <td><p>De</p></td>
    <td width="30"> <select name="dia_de">
          
        <?
	  for($i=1;$i<=31;$i++){
	  if (strlen ($i)<2) $i="0".$i; 
	  echo "<option value='".$i."'";
	  
	  if($i==$dia_de){
	  	echo " selected";
	  }
	   
	
	
	  echo ">".$i."</option>";
	  }
	  ?>
        </select> </td>
    <td><select name="mes_de">
          
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
 for($i=1;$i<=12;$i++){
 echo "<option value='".$i."'";
 if($i==$mes_de){
  echo " selected";
 } 
 
 echo ">".$meses[$i]."</option>";
 }
	  ?>
        </select></td>
		<td>
    <select name="ano_de">
           
      <?
	  for($i=2005;$i<=2007;$i++){
	  echo "<option value='".$i."'";
	  if($i==$ano_de) {
	    echo " selected";
	  }
	  
	  echo ">".$i."</option>";
	  }	  
	  ?></select>
        <a href="#" onclick="window.open('calendario_de.php?dia_ate=<?= $dia_ate; ?>
		&mes_ate=<?= $mes_ate; ?>&ano_ate=<?= $ano_ate; ?>','calendario','width=242, height=120, top=200, left=370')"> 
        <img src="calendario3.gif" border="0" align="absmiddle"></a> </td>
    </tr>
  
      <tr>
	  <td height="25">&nbsp;</td>
      <td><p>At&eacute;</p></td>
      <td><select name="dia_ate">
          
      <?
	  for($i=1;$i<=31;$i++){
	  if (strlen ($i)<2) $i="0".$i; 
	   echo "<option value='".$i."'";
	  if($i==$dia_ate){
	  	echo " selected";
	  }
	 	  echo ">".$i."</option>";
	  }
	  ?>
        
    </select></td>
      
    <td><select name="mes_ate">
          
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
 for($i=1;$i<=12;$i++){
 echo "<option value='".$i."'";
 if($i==$mes_ate){
  echo " selected";
 } 
 echo ">".$meses[$i]."</option>";
 }
	  ?>
        </select></td>
    <td width="85"><select name="ano_ate">
           
        <?
	  for($i=2005;$i<=2007;$i++){
	  echo "<option value='".$i."'";
	  if($i==$ano_ate){
	    echo " selected";
	  }
	  
	  echo ">".$i."</option>";
	  }	  
	  ?>
        </select>
        <a href="#" onclick="window.open('calendario_ate.php?dia_de=<?= $dia_de; ?>
		&mes_de=<?= $mes_de; ?>&ano_de=<?= $ano_de; ?>','calendario','width=242, height=120, top=200, left=370')"> 
        <img src="calendario3.gif" border="0" align="absmiddle"></a></td>
    </tr>
	
    <tr> 
      <td height="25">&nbsp;</td>
      <td><p>Hora</p></td>
      <td colspan="2"> 
        <p> <input name="horas" type="text" id="horas" size="2">
          : <input name="minutos" type="text" id="minutos" size="2">
          Hs</p></td>
      <td> <p>&nbsp;</p></td>
    </tr>
	
    <tr> 
      <td align="center" height="25"><p>&nbsp;</p></td>
      <td align="left" valign="baseline"> 
        <p>Dia da semana</p></td>
      <td colspan="3"> <table width="219" border="0" cellpadding="0" cellspacing="0">
          <tr align="center"> 
            <td width="27"> <p>S</p></td>
            <td width="27"> <p>T</p></td>
            <td width="27"> <p>Q</p></td>
            <td width="27"> <p>Q</p></td>
            <td width="27"> <p>S</p></td>
            <td width="27"> <p>S</p></td>
            <td width="27"> <p>D</p></td>
          </tr>
          <tr align="center"> 
            <td height="16"> <input name="Seg" type="checkbox" id="Seg2" value="S"></td>
            <td> <input name="Ter" type="checkbox" id="Ter2" value="T"></td>
            <td> <input name="Qua" type="checkbox" id="Qua2" value="Q"></td>
            <td> <input name="Qui" type="checkbox" id="Qui2" value="Q"></td>
            <td> <input name="Sex" type="checkbox" id="Sex2" value="S"></td>
            <td> <input name="Sab" type="checkbox" id="Sab2" value="S"></td>
            <td> <input name="Dom" type="checkbox" id="Dom2" value="D"></td>
          </tr>
        </table></td>
    </tr>
	
    <tr> 
      <td colspan="5" height="25">&nbsp;</td>
    </tr>
	
    <tr> 
      <td>&nbsp;</td>
      <td height="25" colspan="3" align="right" valign="top">&nbsp; </td>
      <td><input type="submit" name="Submit" value="criar"></td>
    </tr>
	

	
   
  
  </table>
</form>
</body>
</html>

