<? include ("../topo/topo_paginas.php"); ?>
<? include ("../bd/conexao.php"); ?>
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
alert("Por favor, preencha o campo "+elem[x].name);
elem[x].focus();
return false;
}
}
}
}

}

</script>
<? //include ("../../funcoes/sessao.php"); 
	@session_start();
?>
<? require_once("../funcoes/calc_chegada.php");
   require_once("../funcoes/conversor_data.php"); ?>


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
          <td width="680" rowspan="2" valign="top" height="465"> 
            <!--inicio-->
            <? 
@session_start();

for($i=1;$i<=$_SESSION['reserva']['adultos'];$i++){
//echo $i;
$_SESSION["reserva"]["nome_adulto_$i"]= $_POST["nome_adulto_$i"];
$_SESSION["reserva"]["sobrenome_adulto_$i"]= $_POST["sobrenome_adulto_$i"];

}


if($_SESSION['reserva']['criancas1']<>0){

	for($i=1;$i<=$_SESSION['reserva']['criancas1'];$i++){
	
	$_SESSION["reserva"]["nome_crianca1_$i"]= $_POST["nome_c1_$i"];
    $_SESSION["reserva"]["sobrenome_crianca1_$i"]= $_POST["sobrenome_c1_$i"];
	
  }
}

if($_SESSION['reserva']['criancas2']<>0){

	for($i=1;$i<=$_SESSION['reserva']['criancas2'];$i++){

	$_SESSION["reserva"]["nome_crianca2_$i"]= $_POST["nome_c2_$i"];
    $_SESSION["reserva"]["sobrenome_crianca2_$i"]= $_POST["sobrenome_c2_$i"];
	
  }
}

$cartao=$_POST['cartao']; 
$_SESSION['reserva']['cartao']=$cartao;

$parcelamento=$_POST['parcelamento'];
$_SESSION['reserva']['parcelamento']=$parcelamento;
?>

            <table width="680" border="0">
              <tr bgcolor="#006699"> 
                <td colspan="4"><p class="branco"><b>Informa&ccedil;&otilde;es 
                    do pagamento</b></p></td>
              </tr>
              <tr> 
                <td colspan="4"><p>Op&ccedil;&atilde;o de pagamento selecionada.</p></td>
              </tr>
              <tr> 
                <td width="55"><p>Cart&atilde;o: </p></td>
                <td width="52"><p><b>
                    <?= $_SESSION['reserva']['cartao']; ?>
                  </b></p></td>
                <td width="82"><p>Valor total: </p></td>
                <td width="473"><p><b>
                  <? 
	echo "R$ ".number_format($_SESSION['reserva']['total'],2,",",".");
	$val_parcela=$_SESSION['reserva']['total']/$_SESSION['reserva']['parcelamento'];
	echo " ( ".$_SESSION['reserva']['parcelamento']." x R$".number_format($val_parcela,2,",",".")." )";
	$_SESSION['reserva']['val_parcela']=$val_parcela;
	//(parcelamento)
	?>
              </b></p></td>
              </tr>
            </table>
<br>
<form name="info_cartao" method="post" action="com_conf_reserva.php" onSubmit="return valida_form(this)">
              <table width="680" border="0">
                <tr bgcolor="#006699"> 
                  <td colspan="3"> 
                    <p class="branco"><b>Dados do cart&atilde;o de Cr&eacute;dito</b></p></td>
  </tr>
  <tr>
    <td><p>Titular</p></td>
    <td><p>CPF</p></td>
    <td><p>Data de Nascimento</p></td>
  </tr>
  <tr>
    <td><input type="text" name="titular" id="titular"></td>
    <td><input type="text" name="cpf" id="cpf"></td>
    <td><input type="text" name="dia"  id="dia de nascimento do titular" size="3">
/ 
      <input type="text" name="mes" id="mes de nascimento do titular" size="3">
/ 
      <input type="text" name="ano" id="ano de nascimento do titular" size="4"></td>
  </tr>
  <tr>
      <td height="25"><p>N&uacute;mero do Cart&atilde;o</p></td>
    <td><p>C&oacute;digo de Seguran&ccedil;a</p></td>
    <td><p>Validade</p></td>
  </tr>
  <tr>
    <td><input type="text" name="n_cartao" id="número do cartão"></td>
    <td><input type="password" name="senha_cartao" id="Senhade segurança do cartão">
      </td>
      <td><select name="mes_validade" id="mes_validade">
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
        <select name="ano_validade" id="select2">
          <?
	for($i=2005;$i<=2008;$i++){
	echo "<option value='$i'>$i</option>"; 
	}
	?>
        </select></td>
  </tr>
  <tr>
  <td colspan="3"><input type="submit" name="enviar" value="Confirmar reserva">
</table>
</form>
<?
$voo_ida='';
      for($i=0;$i<$_SESSION["reserva"]["cont_escala_ida"];$i++){
        $voo_ida[$i]=$_SESSION["reserva"]["voo_".$i."_ida"];
        
			}
$todos_voos_ida=implode(",",$voo_ida);
//echo $todos_voos_ida;
?>
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


?>
