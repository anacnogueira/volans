<? include ("../topo/topo_paginas.php"); ?>
<? include ("../bd/conexao.php"); ?>
<? include ("../funcoes/sessao.php");
	


	

?>

<? require_once("../funcoes/calc_chegada.php");
   require_once("../funcoes/conversor_data.php"); ?>
<script type='text/javascript'>
function valida_form(form){
var elem=form.elements;
for(var x=0; x < elem.length; x++){
if(elem[x].type.indexOf("text")==0 || elem[x].type.indexOf("password")==0 || elem[x].type.indexOf("select")==0){
if(elem[x].value < 1){
alert("Por favor, preencha o campo "+elem[x].id);
elem[x].focus();
return false;
}
}
else{
grupoelem = form[elem[x].name];
if (grupoelem && grupoelem.length){
chkd = false;
for(var c=0; c < grupoelem.length; c++){
if(grupoelem[c].checked==true){
chkd = true;
break
}
}
if(chkd==false){
alert("Por favor, preencha o campo "+elem[x].id);
elem[x].focus();
return false;
        }
      }
   }
}
if(document.pagamento.aceito.checked==false){
 alert("Para continuar, você precisa  ler e aceitar as restrições desa compra");
 return false;
  }
}

</script>

<table width="779" height="295" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" colspan="3" background="../fatias/barra_titulo_com.gif"><table width="779" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="32">&nbsp;</td>
          <td width="195" height="25"> <p class = "tit_barra1"><strong><font color="#669933">Compra
              On-line</font></strong></p></td>
          <td width="582" valign="top"><p class = "tit_barra2">Compra On-line 
              - Compra</p></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td width="613" height="257">
      <table width="680" height="242" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="51">&nbsp;</td>
          <td width="680" rowspan="2" valign="top"> 
            <!--inicio-->
            <table width="680" border="0">
              <tr bgcolor="#006699"> 
                <td colspan="6"><p class="branco"><b>Ida</b></p></td>
              </tr>
              <tr> 
                <td width="148" valign="top"><p>v&ocirc;o </p></td>
                <td colspan="2"><p>Partida(data-hor&aacute;rio)</p></td>
                <td colspan="3"><p>Chegada (data-hor&aacute;rio)</p></td>
              </tr>
              <tr> 
              <?
               for($i=0;$i<$_SESSION["reserva"]["cont_escala_ida"];$i++){

               ?>
                <td><p> 
                    <?= $_SESSION["reserva"]["voo_".$i."_ida"]; ?>
                  </p></td>
                <td colspan="2"><p> 
                    <?= $_SESSION["reserva"]["origem_".$i."_ida"]; ?>
                    - 
                    <?= conversor($_SESSION["reserva"]["data_ida"]); ?>
                    - 
                    <?= substr($_SESSION["reserva"]["hora_partida_".$i."_ida"],0,5); ?>
                </td>
                <td colspan="3"><p> 
                    <?= $_SESSION["reserva"]["destino_".$i."_ida"]; ?>
                    - 
                    <?= conversor($_SESSION["reserva"]["data_ida"]); ?>
                    - 
                    <?= substr($_SESSION["reserva"]["hora_chegada_".$i."_ida"],0,5); ?>
                  </p></td>
              </tr>
              <?  }
  /*********
     volta
  *********/
    if($_SESSION['reserva']['tipo_voo']=="ida e volta"){
  
  ?>
              <tr> 
                <td colspan="6" bgcolor="#006699"> <p class="branco"><b>Volta</b></p></td>
              </tr>
              <tr> 
                <td><p>v&ocirc;o </p></td>
                <td colspan="2"><p>Partida(data-hor&aacute;rio)</p></td>
                <td colspan="3"><p>Chegada (data-hor&aacute;rio)</p></td>
              </tr>
              <tr>
			   <?
               for($i=0;$i<$_SESSION["reserva"]["cont_escala_volta"];$i++){

               ?> 
                <td><p><?= $_SESSION["reserva"]["voo_".$i."_volta"]; ?></p> </td>
                <td colspan="2"><p> 
                    <?= $_SESSION["reserva"]["destino_".$i."_volta"]; ?>
                    - 
                    <?= conversor($_SESSION["reserva"]["data_volta"]); ?>
                    - 
                    <?= substr($_SESSION["reserva"]["hora_partida_".$i."_volta"],0,5); ?>
                  </p></td>
                <td colspan="3"><p> 
                    <?= $_SESSION["reserva"]["origem_".$i."_volta"]; ?>
                    - 
                    <?= conversor($_SESSION["reserva"]["data_volta"]); ?>
                    - 
                    <?= substr($_SESSION["reserva"]["hora_chegada_".$i."_volta"],0,5); ?>
                  </p></td>
              </tr>
              <?
    }
}	
	
  ?>
              <tr> 
                <td colspan="6" bgcolor="#00659C"> <p class="branco"><b>Pre&ccedil;o 
                    para 
                    <?= $_SESSION['reserva']['tipo_voo']; ?>
                    </b></p></td>
              </tr>
              <tr> 
                <td>&nbsp;</td>
                <td width="111"><p>Quantidade</p></td>
                <td width="124"><p>Tarifa Unit&aacute;ria</p></td>
                <td width="95"><p>Tarifa Total</p></td>
                <td width="102"><p>Taxas</p></td>
                <td width="74"><p>Subtotal</p></td>
              </tr>
              <tr> 
                <td><p>Adulto(s)</p></td>
                <td><p> 
                    <?= $_SESSION['reserva']['adultos']; ?>
                  </p></td>
                <td><p>R$ 
                    <?= number_format($_SESSION['reserva']['tarifa_unit_a'],2,",","."); ?>
                  </p></td>
                <td><p>R$ 
                    <?= number_format($_SESSION['reserva']['total_tarifa_a'],2,",","."); ?>
                  </p></td>
                <td><p>R$ 
                    <?= number_format($_SESSION['reserva']['taxas_adultos'],2,",","."); ?>
                  </p></td>
                <td><p>R$ 
                    <?=  number_format($_SESSION['reserva']['subtotal_adultos'],2,",",".");?>
                  </p></td>
              </tr>
              <?
  if($_SESSION['reserva']['criancas1']<>0){
  ?>
              <tr> 
                <td><p>Criança(s) de 0 a 1 ano</p></td>
                <td><p> 
                    <?= $_SESSION['reserva']['criancas1']; ?>
                  </p></td>
                <td><p>R$ 
                    <?=  number_format($_SESSION['reserva']['tarifa_unit_c1'],2,",","."); ?>
                  </p></td>
                <td><p>R$ 
                    <?=  number_format($_SESSION['reserva']['total_tarifa_c1'],2,",","."); ?>
                  </p></td>
                <td><p>R$ 
                    <?=  number_format($_SESSION['reserva']['taxas_c1'],2,",","."); ?>
                  </p></td>
                <td><p>R$ 
                    <?=  number_format($_SESSION['reserva']['subtotal_c1'],2,",","."); ?>
                  </p></td>
              </tr>
              <? }
  if($_SESSION['reserva']['criancas2']<>0){
  ?>
              <tr> 
                <td><p>Criança(s) de 2 a 11 anos</p></td>
                <td><p> 
                    <?= $_SESSION['reserva']['criancas2']; ?>
                  </p></td>
                <td><p>R$ 
                    <?=  number_format($_SESSION['reserva']['tarifa_unit_c2'],2,",","."); ?>
                  </p></td>
                <td><p>R$ 
                    <?=  number_format($_SESSION['reserva']['total_tarifa_c2'],2,",","."); ?>
                  </p></td>
                <td><p>R$ 
                    <?=  number_format($_SESSION['reserva']['taxas_c2'],2,",","."); ?>
                  </p></td>
                <td><p>R$ 
                    <?=  number_format($_SESSION['reserva']['subtotal_c2'],2,",",".");?>
                  </p></td>
              </tr>
              <? } ?>
              <tr> 
                <td><p>Total</p></td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><p>R$ 
                    <?=  number_format($_SESSION['reserva']['tot_tarifa'],2,",","."); ?>
                  </p></td>
                <td><p>R$ 
                    <?=  number_format($_SESSION['reserva']['tot_taxa'],2,",","."); ?>
                  </p></td>
                <td><p>R$ 
                    <?=  number_format($_SESSION['reserva']['total'],2,",","."); ?>
                  </p></td>
              </tr>
            </table><br>
           
            <br>
<form name="pagamento" method="post" action="com_pagamento.php" onSubmit="return valida_form(this)" class="form_compra">
              <table width="680" border="0">
                <tr bgcolor="#006699"> 
                  <td colspan="4"> 
                    <p class="branco"><b>Informa&ccedil;&otilde;es do(s) passageiro(s):</b></p></td>
  </tr>
  <tr>
    <td width='30'>&nbsp;</td>
    <td><p>Nome</p></td>
    <td><p>Sobrenome</p></td>
                  <td><p>Faixa Et&aacute;ria</p></td>
  </tr>
  <?
   for($i=1;$i<=$_SESSION['reserva']['adultos'];$i++){
   echo "<tr>
        <td><select name='trat'>
        <option value='1'>- - -</option>
        <option value='2'>Sr.</option>
        <option value='3'>Sra.</option>
        </select></td>
		<td><input type='text' name='nome_adulto_$i' id='nome de todos os adultos'></td>
		<td><input type='text' name='sobrenome_adulto_$i' id='sobrenome de todos os adultos'></td>
		<td><p>Adulto<p></td>
		</tr>";
	}
		
  if($_SESSION['reserva']['criancas1']<>0){
    for($i=1;$i<=$_SESSION['reserva']['criancas1'];$i++){
    echo "<tr>
        <td><select name='trat'>
        <option value='1'>- - -</option>
        <option value='2'>Sr.</option>
        <option value='3'>Sra.</option>
        </select></td>
		<td><input type='text' name='nome_c1_$i' id='nome de todas as criançcas de 0 a 1 ano'></td>
		<td><input type='text' name='sobrenome_c1_$i' id='sobrenome de todas as criancas de 0 a 1 ano' ></td>
		<td><p>Criança de 0 a 1 ano</p></td>
		</tr>";
    }
  }
  
   if($_SESSION['reserva']['criancas2']<>0){
    for($i=1;$i<=$_SESSION['reserva']['criancas2'];$i++){
    echo "<tr>
       <td><select name='trat'>
        <option value='1'>- - -</option>
        <option value='2'>Sr.</option>
        <option value='3'>Sra.</option>
        </select></td>
		<td><input type='text' name='nome_c2_$i' id='nome de todas as criançcas de 2 a 11 anos'></td>
		<td><input type='text' name='sobrenome_c2_$i' id='sobrenome de todas as criançcas de 2 a 11 anos'></td>
		<td><p>Criança de 2 a 11 anos</p></td>
		</tr>";
    }
  }
  
 
  ?>
 
</table>
<br>
              <table width="680" border="0">
                <tr> 
                  <td colspan="8"><p>Op&ccedil;&otilde;es de Pagamento</p></td>
                </tr>
                <tr> 
                  <td> <input type="radio" name="cartao" id="cartao" value="mastercard"></td>
                  <td width="150"><img src="cart_mastercard.gif" alt="Mastercard" width="42" height="25" align="left"></td>
                  <td><input type="radio" name="cartao" id="cartao" value="american">
                  </td>
                  <td width="150"><img src="cart_american.gif" alt="American Express" width="40" height="25"></td>
                  <td><input type="radio" name="cartao" id="cartao" value="visa"></td>
                  <td width="150"><img src="cart_visa.gif" width="42" height="25" align="left"></td>
                  <td><input type="radio" name="cartao" id="cartao" value="dinners"></td>
                  <td><img src="cart_dinners.gif" alt="Dinners Club" width="105" height="26"></td>
                </tr>
                <tr> 
                  <td colspan="8"><p>condi&ccedil;&otilde;es de pagamento 
                      <select name="parcelamento" id="parcelamento">
                        <option value='0'>- - - - - -</option>
                        <?
      for($i=1;$i<=7;$i++){
      echo "<option value='$i'>$i x sem juros</option>";
      
      }
      
      ?>
                      </select>
                    </p></td>
                </tr>
              </table>
<br>
               <br>
              <table width="680" border="0">
                <tr>
                  <td colspan="5"><li>
                      <p>Concordo com as <a href="#" class="link2" onClick="javascript: window.open('regras_tarifarias.php', 'regras','width=400, height=400')">Regras T&aacute;rif&aacute;rias</a> 
                        e <a href="" class="link2"  onClick="javascript: window.open('termos_uso.php','termos','width=400, height=400')">Termos de Uso</a>.</p>
                    </li></td>
                </tr>
                <tr>
                  <td colspan="5"><li>
                      <p>Depois de connfirmada a compra, n&atilde;o ser&aacute; poss&iacute;vel fazer o cancelamento. Para fazer o reembolso, compare&ccedil;a a uma loja da Volans.</p>
                    </li></td>
                </tr>
                <tr>
                  <td colspan="5"><li>
                      <p>Informe abaixo os dados do respons&aacute;vel pela reserva:</p>
                    </li></td>
                </tr>
                <tr>
                  <td width="215"><p>Nome do respons&aacute;vel pela reserva</p></td>
                  <?
    $query="SELECT * FROM cliente WHERE email='". $_SESSION['x_login']."'";
    $result=mysql_query($query,$conn) or die(mysql_error());
    
    while($linha=mysql_fetch_array($result)){
     $_SESSION['reserva']['id_cliente']=$linha['id_user'];
    $nome_res=$linha['nome']." ". $linha['sobrenome'];
    $email_res=$linha['email'];
    $tel_res=$linha['telefone'];

    }
    ?>
                  <td width="150"><input type="text" name="nome_res" value="<?= $nome_res; ?>" id="Nome do responsável"></td>
                  <td width="8">&nbsp;</td>
                  <td width="35"><p>e-mail</p></td>
                  <td width="206"><input type="text" name="email_res" value="<?= $email_res; ?>" id="Email do responsável"></td>
                </tr>
                <tr>
                  <td><p>Telefone 
                      
                    </p></td>
                  <td><input type="text" name="tel_res" value="<?= $tel_res; ?>" id="Telefone do respons&aacute;vel"></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="5"><p><b>Importante:</b> Informe o contato do titular do cart&atilde;o de cr&eacute;dito e mantenha seu cadastro sempre atualizado. A Volans poder&aacute; entrar em contato para confirmar os dados da compra caso seja necess&aacute;rio</p></td>
                </tr>
                <tr>
                  <td><p>
                      <input type="checkbox" name="aceito" value="aceito">
                      Aceito Restri&ccedil;&otilde;es</p></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td><input type="button" name="voltar" value="voltar" onclick="javascript: history.back()"></td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td><input type="submit" name="comprar" value="comprar"></td>
                </tr>
              </table>
</form>
		  <!--fim-->
		  </td>
        </tr>
        <tr>
          <td width="1" height="191"> <div align="center"></div>
            <p><br>
            </p></td>
        </tr>
      </table>
  
    <td width="6" align="center" background="../fatias/pontilhado_vert_pag.gif">&nbsp;</td>
    <td width="80" valign="top"> <table width="80" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr>
          <td> <div align="center"><img src="consulta_sombra.gif" width="36" height="36"></div></td>
        </tr>
        <tr>
          <td><div align="center"><a href="com_consulta.php" class="link_icones">Consulta</a></div></td>
        </tr>
        <tr>
          <td height="45" valign="bottom"> <div align="center"><a href="emp_diferenciais.php"><img src="promocoes.gif" width="36" height="36" border="0"></a></div></td>
        </tr>
        <tr>
          <td><div align="center" ><a href="com_promocoes.php" class="link_icones">Promo&ccedil;&otilde;es</a></div></td>
        </tr>
      </table></td>
  

      <? include ("../barra_inferior.php"); ?>
</table>
</body>
</html>

