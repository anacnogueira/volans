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
    <td width="639" align="left" valign="bottom"><h1 class="tit_administrador">Adicionar 
        Vôo</h1></td>
    <td width="91" align="left" valign="middle">&nbsp;</td>
  </tr>
</table>

<form name="aeronave " method="post" action="insere_voo2.php" class="form_login">
  <table height="220" border="0">
    <tr> 
      <td width="40" height="25">&nbsp;</td>
      <td width="100">
<p>Aeronave</p></td>
      <td colspan="2"><select name="aeronave">
          <option value="0">Selecione a aeronave &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
          <?
	 $query="SELECT id_aeronave, modelo FROM aeronaves";
			$st = mysql_query($query,$conn);
			while ($line = mysql_fetch_array($st, MYSQL_BOTH)) {
   			echo "<option value='".$line['id_aeronave']."'>".$line['modelo']."</option>";
   
   }
	 
	 ?>
        </select></td>
    </tr>
    <tr> 
      <td></td>
      <td><p>Origem</p></td>
      <td colspan="2"> <select name="origem">
          <option value="0">Selecione a origem &nbsp;&nbsp;&nbsp;</option>
          <? 
	 $query="SELECT * FROM aeroporto";
			$st = mysql_query($query, $conn);
			while ($line = mysql_fetch_array($st, MYSQL_BOTH)) {
			$x_origem=$line['cidade']." ".$line['estado']."(".$line['id_aeroporto'].")";
   			echo "<option value='".$x_origem."'>".$x_origem."</option>";
   
   }
	 
	 ?>
        </select> </td>
    </tr>
    <tr> 
      <td></td>
      <td><p>Destino</p></td>
      <td colspan="2"><select name="destino">
          <option value="0">Selecione o destino &nbsp;&nbsp;</option>
          <? 
	 $query="SELECT * FROM aeroporto";
			$st = mysql_query($query, $conn);
			while ($line = mysql_fetch_array($st, MYSQL_BOTH)) {
			$x_destino=$line['cidade']." ".$line['estado']."(".$line['id_aeroporto'].")";
   			echo "<option value='".$x_destino."'>".$x_destino."</option>";
   
   }
	 
	 ?>
        </select></td>
    </tr>

    <tr> 
      <td></td>
      <td><p>Tempo</p></td>
      <td colspan="2"><p>
          <input name="horas" type="text" size="2"> :  <input name="minutos" type="text" size="2">
          Hs</p></td>
    </tr>
    <tr> 
      <td></td>
      <td><p>Dist&acirc;ncia</p></td>
      <td colspan="2"><p>
          <input name="distancia" type="text" id="distancia" size="22">
          KM</td>
    </tr>
    <tr> 
      <td height="24"></td>
      <td><p>Valor</p></td>
      <td colspan="2"><p>
          <input name="valor" type="text" size="22">
          R$ </p></td>
    </tr>
    <tr> 
     
      <?
	  $query2 = "SELECT * FROM voo,aeronaves
				WHERE voo.id_aeronave=aeronaves.id_aeronave";
		$result=mysql_query($query2,$conn);
	while ($linha = mysql_fetch_array($result)){
		
	
      
	  }
	  	    ?>
    </tr>
    <tr> 
      <td colspan="2"></td>
      <td width="183" height="25" align="right" valign="top"> 
        <input type="submit" name="Submit" value="criar"></td>
      <td width="438">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>

