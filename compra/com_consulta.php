<? include ("../topo/topo_paginas.php"); ?>
<? include ("../bd/conexao.php"); ?>
<script language="JavaScript" src="../scripts/valida_form.js"></script>
<table width="779" height="295" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="30" colspan="3" background="../fatias/barra_titulo_com.gif"><table width="779" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="32">&nbsp;</td>
          <td width="195" height="25"> <p class = "tit_barra1"><strong><font color="#669933">Compra 
              On-line</font></strong></p></td>
          <td width="582" valign="top"><p class = "tit_barra2">Compra On-line 
              - Consulta</p></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td width="653" height="257"> 
      <table width="680" height="242" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="51">&nbsp;</td>
          <td><p>Agora voc&ecirc; pode comprar o seu bilhete da Volans pela Internet, 
              sem perda de tempo e com toda a comodidade.</p>
            <p>Para consultar a nossa lista de cidades e escolher um destino, 
              selecionando os campos abaixo:</p>
                    </td>
        </tr>
        <tr> 
          <td width="10" height="191"> 
            <div align="center"></div>
            <p><br>
            </p></td>
          <td align="center">
<form name="consulta_voo" method="post" action="com_resultado3.php" onSubmit="return valida_form()" class="form_compra">
              <table width="619" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                  <td height="30" colspan="3"> <p> 
                      <input type="radio" name="tipo_voo" value="ida">
                      ida </p></td>
                  <td colspan="2"> <p> 
                      <input type="radio" name="tipo_voo" value="idavolta">
                      ida e volta</p></td>
                  <td width="106">&nbsp;</td>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr> 
                  <td width="46" height="40"> <p>Origem</p></td>
                  <td colspan="2"><p> 
                      <select name="origem">
                        <option>Selecione a origem</option>
                        <? 
	 $query="SELECT * FROM aeroporto ORDER BY cidade";
			$st = mysql_query($query, $conn);
			while ($line = mysql_fetch_array($st, MYSQL_BOTH)) {
			$x_origem=$line['cidade']." ".$line['estado']."(".$line['id_aeroporto'].")";
   			echo "<option value='".$x_origem."'>".$x_origem."</option>";
   
   }
	 
	 ?>
                      </select>
                    </p></td>
                  <td width="80"> <p>Data da ida</p></td>
                  <td width="52"><p> 
                      <select name="dia_ida">
                        <?
	  for($i=1;$i<32;$i++){
	   if (strlen ($i)<2) $i="0".$i;
	  echo "<option value=$i";
	  if($i==date('d')){
	  	echo " selected";
		}
	  echo ">$i</option>";
	  }
	  ?>
                      </select>
                    </p></td>
                  <td><p> 
                      <select name="mes_ida">
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

 echo "<option value=$i";
  if($i==date('n')){
  echo " selected";
 }
 echo ">$meses[$i]</option>";
 }
	  ?>
                      </select>
                    </p></td>
                  <td colspan="2"><p>&nbsp;

                    </p></td>
                </tr>
                <tr> 
                  <td height="30"> <p>Destino</p></td>
                  <td colspan="2"><p> 
                      <select name="destino">
                        <option>Selecione o destino</option>
                        <? 
	 $query="SELECT * FROM aeroporto ORDER BY cidade";
			$st = mysql_query($query, $conn);
			while ($line = mysql_fetch_array($st, MYSQL_BOTH)) {
			$x_destino=$line['cidade']." ".$line['estado']."(".$line['id_aeroporto'].")";
   			echo "<option value='".$x_destino."'>".$x_destino."</option>";
   
   }
	 
	 ?>
                      </select>
                    </p></td>
                  <td> <p>Data da volta</p></td>
                  <td><p> 
                      <select name="dia_volta">
                        <?
	  for($i=1;$i<32;$i++){
	   if (strlen ($i)<2) $i="0".$i;
	  echo "<option value=$i";
	  if($i==date('d')){
	  	echo " selected";
		}
	  echo ">$i</option>";
	  }
	  ?>
                      </select>
                    </p></td>
                  <td><p> 
                      <select name="mes_volta">
                        <?
	   for($i=1;$i<13;$i++){

 echo "<option value=$i";
  if($i==date('n')){
  echo " selected";
 } 
 echo ">$meses[$i]</option>";
 }
	  ?>
                      </select>
                    </p></td>
                  <td colspan="2">&nbsp;</td>
                </tr>
                <tr> 
                  <td colspan="8"> <table width="610" height="30" border="0" cellpadding="0" cellspacing="0">
                      <tr> 
                        <td width="47"><p>Adultos</p></td>
                        <td width="144"><select name="adultos">
                            <?
	  for($i=1;$i<7;$i++){
	  echo "<option value=$i>$i</option>";
	  }
	  ?>
                          </select></td>
                        <td width="117"><p>Crian&ccedil;as(at&eacute; 1 ano)</p></td>
                        <td width="132"><select name="criancas1">
                            <?
	  for($i=0;$i<7;$i++){
	  echo "<option value=$i>$i</option>";
	  }
	  ?>
                          </select></td>
                        <td width="127"><p>Crian&ccedil;as(2 a 11anos)</p></td>
                        <td width="43"><select name="criancas2">
                            <?
	  for($i=0;$i<7;$i++){
	  echo "<option value=$i>$i</option>";
	  }
	  ?>
                          </select></td>
                      </tr>
                    </table></td>
                </tr>
                <tr> 
                  <td height="50"> <p>&nbsp;</p></td>
                  <td width="45"> <p>&nbsp; </p></td>
                  <td width="137"><p>&nbsp;</p></td>
                  <td align="center"> <p>&nbsp; </p></td>
                  <td colspan="2"><p>&nbsp;</p></td>
                  <td width="97">&nbsp;</td>
                  <td width="56"><input type="submit" name="Submit" value="&nbsp;&nbsp;ok&nbsp;&nbsp;"></td>
                </tr>
              </table>
            </form></td>
        </tr>
      </table></td>
    <td width="6" align="center" background="../fatias/pontilhado_vert_pag.gif">&nbsp;</td>
    <td width="80" valign="top"> <table width="80" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td> <div align="center"><img src="consulta_sombra.gif" width="36" height="36"></div></td>
        </tr>
        <tr> 
          <td><div align="center" class="link_icones">Consulta</div></td>
        </tr>
        <tr> 
          <td height="45" valign="bottom"> <div align="center"><a href="com_promocoes.php"><img src="promocoes.gif" width="36" height="36" border="0"></a></div></td>
        </tr>
        <tr> 
          <td><div align="center" ><a href="com_promocoes.php" class="link_icones">Promo&ccedil;&otilde;es</a></div></td>
        </tr>
      </table></td>
  </tr>
  
      <? include ("../barra_inferior.php"); ?>
</table>
</body>
</html>
