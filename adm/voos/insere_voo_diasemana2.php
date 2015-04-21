<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>	  
<? include("../../funcoes/add_dia.php"); ?>
<? include("../../funcoes/dif_dias.php"); ?>
<?	  

	$voo=$_POST["voo"];
	$dia_de=$_POST["dia_de"];
	$mes_de=$_POST["mes_de"];
	$ano_de=$_POST["ano_de"];
	$dia_ate=$_POST["dia_ate"];
	$mes_ate=$_POST["mes_ate"];
	$ano_ate=$_POST["ano_ate"];
	$horas=$_POST["horas"];
	$minutos=$_POST["minutos"];
	
	$data_de=$ano_de."-".$mes_de."-".$dia_de;
	$data_ate=$ano_ate."-".$mes_ate."-".$dia_ate;	
	$incompleto=false;
	
	if($voo=="0"){
    $erro1="<font class='erro'> - Selecione o voo</font>";
	$incompleto=true;
}
else{
    $erro1='';
}
if($data_de==$data_ate){
 $erro2="<font class='erro'> - A data inicial não pode ser igual a data final</font>";
 $incompleto=true;
 }
 
 else if(date("w",mktime(0,0,0,$mes_de,$dia_de,$ano_de))!=1){
   $erro2="<font class='erro'> - A data inicial deve ser uma Segunda-feira</font>";
   $incompleto=true;
 }
 
 else{
 $erro2='';
 } 
 
 if($data_ate<$data_de){
 $erro3="<font class='erro'> - A data final deve ser maior que a data inicial</font>";
 $incompleto=true;
 }
 else if(diferenca_dias($data_de,$data_ate)!=6){
 $erro3="<font class='erro'> - O periodo entre as datas deve ser de 6 dias</font>";
 $incompleto=true;
 }
 
  else if(date("w",mktime(0,0,0,$mes_ate,$dia_ate,$ano_ate))!=0){
   $erro3="<font class='erro'> - A data inicial deve ser um Domingo</font>";
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
 
 else if($horas>23){
	$erro4="<font class='erro'> - Hora inválida</font>";
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
	$erro6="<font class='erro'> - Preencha este campo com as horas e minutos</font>";
	$incompleto = true;
}

else{
	$erro6='';
}

if($incompleto==true){

/****************
Código HTML
*****************/
?>
<html>
<head>
<title>Adicionar V&ocirc;o data</title>
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
  <table height="218" border="0">
    <tr> 
      <td width="40" height="25" nowrap>
	  <?

	 if(isset($_GET["dia_de"])){
	$dia_de=$_GET["dia_de"];
	
	}
	if(isset($_GET["mes_de"])){
	$mes_de=$_GET["mes_de"];
	 }
	
	
	if(isset($_GET["ano_de"])){
	$ano_de=$_GET["ano_de"];
	 }
	
	
	  ?>
	  </td>
      <td width="90" height="25"> 
        <p>Vôo</p></td>
      <td colspan="3"><select name="voo">
          <option value="0">Selecione o Vôo</option>
          <?
	 $query="SELECT * FROM voo ORDER BY id_voo";
			$st = mysql_query($query,$conn);
			while ($linha = mysql_fetch_array($st, MYSQL_BOTH)) {
			$id_voo=$linha["id_voo"];
   			echo "<option value='".$id_voo."' ";
			if($id_voo==$voo){
			echo "selected";
			}			
			echo ">".$id_voo."</option>";
   
   }
	 
	 ?>
        </select></td>
      <td> 
        <?= $erro1; ?>
      </td>
    </tr>
	
    <tr> 
      <td height="25">
	  <?
	 if(isset($_GET["dia_ate"]) AND !isset($_GET["dia_de"])) {
	$dia_ate=$_GET["dia_ate"];
	 }
	
	
	if(isset($_GET["mes_ate"])){
	$mes_ate=$_GET["mes_ate"];
	 }
	
	
	if(isset($_GET["ano_ate"])){
	$ano_ate=$_GET["ano_ate"];
	 }
	
	
	  ?>
	  
	  </td>
      <td><p>De</p></td>
      <td width="41"> 
        <select name="dia_de">
          <?
	  for($i=1;$i<=31;$i++){
	  if (strlen ($i)<2) $i="0".$i; 
	  echo "<option value=$i";
	  if($i==$dia_de){
	  echo " selected";
	  }
	  echo ">$i</option>";
	  }
	  ?>
        </select>
      </td>
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
 echo "<option value=$i";
 if($i==$mes_de){
 echo " selected";
 }
 echo ">$meses[$i]</option>";
 }
	  ?>
        </select></td>
      <td><select name="ano_de">
          <option value=2005
		  <?
		  if($ano_de==2005){
		   echo " selected";
		  }
		  ?>
		  >2005</option>
          <option value=2006
		  <?
		  if($ano_de==2006){
		   echo " selected";
		  }
		  ?>
		  >2006</option>
          <option value=2007
		  <?
		  if($ano_de==2007){
		   echo " selected";
		  }
		  ?>
		  >2007</option>
        </select>  </td>
        
      <td><a href="#" onclick="window.open('calendario_de.php?url=insere_voo_diasemana2.php','calendario','width=270, height=150, top=200, left=370')"> 
        <img src="calendario3.gif" width="24" height="20" border="0"></a> 
        <?= $erro2; ?>
      </td>
     
    </tr>
	
    <tr> 
      <td height="25">&nbsp;</td>
      <td><p>At&eacute;</p></td>
      <td><select name="dia_ate">
          <?
	  for($i=1;$i<=31;$i++){
	  if (strlen ($i)<2) $i="0".$i;
	  echo "<option value=$i";
	  if($i==$dia_ate){
	  echo " selected";
	  }
	  echo ">$i</option>";
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
 echo "<option value=$i";
 if($i==$mes_ate){
 echo " selected";
 }
 echo ">$meses[$i]</option>";
 }
	  ?>
	  ?>
          </select></td>
      <td><select name="ano_ate">
          <option value=2005
		  <?
		  if($ano_ate==2005){
		   echo " selected";
		  }
		  ?>
		  >2005</option>
          <option value=2006
		  <?
		  if($ano_ate==2006){
		   echo " selected";
		  }
		  ?>
		  >2006</option>
          <option value=2007
		  <?
		  if($ano_ate==2007){
		   echo " selected";
		  }
		  ?>
		  >2007</option>
        </select></td> 
        
      <td><a href="#" onclick="window.open('calendario_ate.php?url=insere_voo_diasemana2.php','calendario','width=270, height=150, top=200, left=370')"> 
        <img src="calendario3.gif" width="24" height="20" border="0"></a>
        <?= $erro3; ?>
      </td>
      
    </tr>
    <tr> 
      <td height="25">&nbsp;</td>
      <td><p>Hora</p></td>
      <td colspan="3" nowrap> <p> 
          <input name="horas" type="text" id="horas" size="2" value="<?= $horas; ?>">
          : 
          <input name="minutos" type="text" id="minutos" size="2" value="<?= $minutos; ?>">
          Hs </p></td>
      <td> 
        <?= $erro4; ?>
        <?= $erro5; ?>
        <?= $erro6; ?>
      </td>
    </tr>
    <tr> 
      <td height="25" align="center"> 
        <p>&nbsp;</p></td>
      <td align="left" valign="baseline"> 
        <p>Dia da semana</p></td>
      <td colspan="4"> <table width="219" border="0" cellpadding="0" cellspacing="0">
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
            <td> <input name="Seg" type="checkbox" id="Seg" value="S" 
			  <?
			  if(isset($_POST["Seg"])){
			    echo "checked";
				}			  
			  ?>
			  ></td>
            <td> <input name="Ter" type="checkbox" id="Ter" value="T"
			  
			   <?
			  if(isset($_POST["Ter"])){
			    echo "checked";
				}			  
			  ?>></td>
            <td> <input name="Qua" type="checkbox" id="Qua" value="Q"
			   <?
			  if(isset($_POST["Qua"])){
			    echo "checked";
				}			  
			  ?>
			  ></td>
            <td> <input name="Qui" type="checkbox" id="Qui" value="Q"
			   <?
			  if(isset($_POST["Qui"])){
			    echo "checked";
				}			  
			  ?>
			  ></td>
            <td> <input name="Sex" type="checkbox" id="Sex" value="S"
			   <?
			  if(isset($_POST["Sex"])){
			    echo "checked";
				}			  
			  ?>
			  ></td>
            <td> <input name="Sab" type="checkbox" id="Sab" value="S"
			   <?
			  if(isset($_POST["Sab"])){
			    echo "checked";
				}			  
			  ?>
			  ></td>
            <td> <input name="Dom" type="checkbox" id="Dom" value="D"
			   <?
			  if(isset($_POST["Dom"])){
			    echo "checked";
				}			  
			  ?>
			  ></td>
          </tr>
        </table></td>
    </tr>
    <tr> 
      <td height="32" colspan="6"> 
        <p>&nbsp;</p>
        <p>&nbsp; </td>
    </tr>
    <tr> 
      <td colspan="2"></td>
      <td height="25" colspan="3" align="right" valign="top"> <input type="submit" name="Submit" value="criar"></td>
      <td width="471">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
<?
}
else{
$hora_completa=$horas.':'.$minutos;

if(isset($_POST["Seg"])){
$sem="S";
}
else{
$sem=0;
}

if(isset($_POST["Ter"])){
$sem.="T";
}
else{
$sem.=0;
}

if(isset($_POST["Qua"])){
$sem.="Q";
}
else{
$sem.=0;
}
if(isset($_POST["Qui"])){
$sem.="Q";
}
else{
$sem.=0;
}

if(isset($_POST["Sex"])){
$sem.="S";
}
else{
$sem.=0;
}

if(isset($_POST["Sab"])){
$sem.="S";
}
else{
$sem.=0;
}

if(isset($_POST["Dom"])){
$sem.="D";
}
else{
$sem.=0;
}
//insere dias da semana
$query = "INSERT INTO voo_dia_semana
(
  id_voo,
	de,
	ate,
	hora,
	dia_semana
) VALUES (
     '$voo',
	   '$data_de',
	   '$data_ate',
	   '$hora_completa',
		'$sem'
		);" ;
	  $result=mysql_query($query, $conn) or die($query.mysql_error());

 //Insere data do voo
      $query1="SELECT * FROM voo_dia_semana
               ORDER BY id_dia_semana DESC
			   limit 0,1";

      $query2="SELECT * FROM voo_dia_semana,voo,aeronaves
               WHERE voo_dia_semana.id_voo=voo.id_voo AND
               voo.id_aeronave=aeronaves.id_Aeronave ORDER BY id_dia_semana DESC
			   limit 0,1";
      $result1=mysql_query($query1,$conn)or die(mysql_error());
      while($linha1=mysql_fetch_array($result1)){
      $id_dia_semana=$linha1["id_dia_semana"];
      $de=$linha1["de"];
      $dia_semana=$linha1["dia_semana"];
  
      
      $result2=mysql_query($query2,$conn) or die(mysql_error());
      while($linha2=mysql_fetch_array($result2)){
      $classe1=$linha2["1classe"];
	  $executiva=$linha2["executiva"];
	  $economica=$linha2["economica"];
      
      
      for($i=0;$i<=6;$i++){
      $data_dia=$dia_semana{$i};
	  if($data_dia!="0"){
        $data=add_dia($de,$i);
		
       $query3="INSERT INTO voo_data
			 (
         id_voo_semana,
				 data,
				 1classe_data,
				 executiva_data,
				 economica_data
			 )
			  VALUES(
                                            '$id_dia_semana',
                                            '$data',
                                            '$classe1',
											'$executiva',
											'$economica'
											);";

       $result3=mysql_query($query3,$conn)or die($query3.mysql_error());
        
  
        } //fecha if  
       } //fecha for 
     } // fecha while 2
   } //fecha while 1
   mysql_close($conn);
  echo "<script language='JavaScript'>
	
	window.location = 'lista_voo_data.php';
	
</script>";
   
   //header("Location: lista_voo_diasemana.php");
} //fecha else
	
	
?>

