<? include ("../topo/topo_paginas.php"); ?>
<? include ("../bd/conexao.php"); ?>
<? include("../funcoes/gera_passwd.php");
   include("../funcoes/conversor_data.php");
	@session_start();
	
?>
<?
$_SESSION['reserva']['id_cliente'] = 1;
require_once("../funcoes/calc_chegada.php");
   require_once("../funcoes/conversor_data.php"); ?>
<script type='text/javascript' src="scripts/valida_form4.js"></script>

<table width="779" height="295" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="30" colspan="3" background="../fatias/barra_titulo_com.gif"><table width="779" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="32">&nbsp;</td>
          <td width="195" height="25"> <p class = "tit_barra1"><strong><font color="#669933">Compra
              On-line</font></strong></p></td>
          <td width="582" valign="top"><p class = "tit_barra2">Compra On-line 
              - Confirma&ccedil;&atilde;o de reserva</p></td>
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
			<?
            //Inserir valores da reserva na tabela  reserva
   
            
    //Se for so ida
	


	
		
	$senha=gera_passwd();
  if($_SESSION['reserva']['tipo_voo']=="ida"){
  $voo_ida='';
      for($i=0;$i<$_SESSION["reserva"]["cont_escala_ida"];$i++){
        $voo_ida[$i]=$_SESSION["reserva"]["voo_".$i."_dataida"];
        
			}
$todos_voos_dataida=implode(",",$voo_ida);
echo "voo".$todos_voos_dataida."<br />";
  
  
  $sql1="INSERT INTO reserva
	(
	id_voo_data,
	id_cliente,
	senha,
	adultos,
	criancas1,
	criancas2,
	classe,
	tipo_voo,
	cartao,
	pagamento,
	preco_total
	)
	VALUES(

  '".$todos_voos_dataida."',
  '".$_SESSION['reserva']['id_cliente']."',
  '".$senha."',
  '".$_SESSION['reserva']['adultos']."',
  '".$_SESSION['reserva']['criancas1']."',
  '".$_SESSION['reserva']['criancas2']."',
  '".$_SESSION['reserva']['classe_ida']."',
  '".$_SESSION['reserva']['tipo_voo']."', 
  
  '".$_SESSION['reserva']['parcelamento']."x". $_SESSION['reserva']['val_parcela']."', 
  '".$_SESSION['reserva']['cartao']."',
  '".$_SESSION['reserva']['total']."')";

 $result=mysql_query($sql1,$conn) or die($sql1.mysql_error());
 
 //Editar a tabela voo_data(somar adultos e criancas de 2 a 11 anos , retirar esse valor do voo e da classe selecionad)
 $soma_pass=$_SESSION['reserva']['adultos'] + $_SESSION['reserva']['criancas1']; 
  
  if($_SESSION['reserva']['classe_ida']=="1classe"){
     $sql2="UPDATE voo_data SET 1classe_data='1classe_data -".$soma_pass."'
	 WHERE id_voo_data=".$_SESSION['reserva']['id_voo_dataida'];
	 
  	}
	
	 if($_SESSION['reserva']['classe_ida']=="executiva"){
     $sql2="UPDATE voo_data SET executiva_data=executiva_data -".$soma_pass."
	 WHERE id_voo_data=".$_SESSION['reserva']['id_voo_dataida'];
  	}
	
	else{
	//$sql2="UPDATE voo_data SET economica_data=economica_data -".$soma_pass."
	// WHERE id_voo_data='".$_SESSION['reserva']['id_voo_dataida']."'";
	 
	  $sql2="UPDATE voo_data SET economica_data=economica_data -".$soma_pass."
	 WHERE id_voo_data=52";
  	}
  	//echo $sql2."<br />";
	$result0=mysql_query($sql2,$conn) or die("2".mysql_error());
  }
  //se for ida e volta
  if($_SESSION['reserva']['tipo_voo']=="idavolta"){
  
  $voo_ida='';
      for($i=0;$i<$_SESSION["reserva"]["cont_escala_volta"];$i++){
        $voo_volta[$i]=$_SESSION["reserva"]["voo_".$i."_datavolta"];
        
			}
          $todos_voos_datavolta=implode(",",$voo_volta);
          echo $todos_voos_datavolta;
  
  $sql1="INSERT INTO reserva VALUES(
  '',
  '".$todos_voos_dataida.",".$todos_voos_datavolta."',
  '".$_SESSION['reserva']['id_cliente']."', 
  '".$senha."',
  '".$_SESSION['reserva']['adultos']."',
   '".$_SESSION['reserva']['criancas1']."',
   '".$_SESSION['reserva']['criancas2']."',
    '".$_SESSION['reserva']['classe_ida']."-".$_SESSION['reserva']['classe_volta']."',
    '".$_SESSION['reserva']['tipo_voo']."', 
    '".$_SESSION['reserva']['cartao']."',
    '".$_SESSION['reserva']['parcelamento']."x". $_SESSION['reserva']['val_parcela']."',
	'".$_SESSION['reserva']['total']."');";

 $result=mysql_query($sql1,$conn) or die("3".mysql_error());
 if($_SESSION['reserva']['classe_ida']=="1classe"){
 $classe="1<sup>a</sup> classe";
 
 }
 //Editar a tabela voo_data(somar adultos e criancas de 2 a 11 anos , retirar esse valor do voo e da classe selecionad)
 $soma_pass=$_SESSION['reserva']['adultos'] + $_SESSION['reserva']['criancas1']; 
  //ida
  if($_SESSION['reserva']['classe_ida']=="1classe"){
     $sql2="UPDATE voo_data SET 1classe_data='1classe_data -".$soma_pass."'
	 WHERE id_voo_data=".$_SESSION['reserva']['id_voo_dataida'];
  	}
	
	 if($_SESSION['reserva']['classe_ida']=="executiva"){
     $sql2="UPDATE voo_data SET executiva_data='executiva_data -".$soma_pass."'
	 WHERE id_voo_data=".$_SESSION['reserva']['id_voo_dataida'];
  	}
	
	else{
	$sql2="UPDATE voo_data SET economica_data='economica_data -".$soma_pass."'
	 WHERE id_voo_data=".$_SESSION['reserva']['id_voo_dataida'];
  	}
	
  $result2=mysql_query($sql2,$conn) or die("4".mysql_error());

  //volta
  if($_SESSION['reserva']['classe_ida']=="1classe"){
     $sql3="UPDATE voo_data SET 1classe_data='1classe_data -".$soma_pass."'
	 WHERE id_voo_data=".$_SESSION['reserva']['id_voo_datavolta'];
  	}
	
	 if($_SESSION['reserva']['classe_ida']=="executiva"){
     $sql3="UPDATE voo_data SET executiva_data='executiva_data -".$soma_pass."'
	 WHERE id_voo_data=".$_SESSION['reserva']['id_voo_datavolta'];
  	}
	
	else{
	$sql3="UPDATE voo_data SET economica_data='economica_data -".$soma_pass."'
	 WHERE id_voo_data=".$_SESSION['reserva']['id_voo_datavolta'];
  	}
	
  $result3=mysql_query($sql3,$conn) or die("5".mysql_error());
  }
  
  
  //Exibir os dados
  $select1="SELECT * FROM reserva ORDER BY id_reserva desc limit 0,1;";
  $result4=mysql_query($select1)or die("6".mysql_error());
  while($linha=mysql_fetch_array($result4,MYSQL_ASSOC)){
  $id_reserva=$linha["id_reserva"];
  $senha=$linha["senha"];
  $cartao=$linha["cartao"];
  $parcelas=explode("x",$linha["pagamento"]);
  $preco_total=$linha["preco_total"];
  }
  //Inserir os nomes dos passageiros na tabela passageiros
  
   for($i=1;$i<=$_SESSION['reserva']['adultos'];$i++){
  $sql[$i]="INSERT INTO passageiros (id_resp,
	id_reserva,
	nome,
	faixa_etaria
	) VALUES('".$_SESSION['reserva']['id_cliente']."','".$id_reserva ."','".$_SESSION["reserva"]["nome_adulto_$i"]." ".$_SESSION['reserva']["sobrenome_adulto_$i"]."','Adulto')";
  $result=mysql_query($sql[$i],$conn) or die("7".mysql_error());
    }
	
	if($_SESSION['reserva']['criancas1']<>0){
		 for($i=1;$i<=$_SESSION['reserva']['criancas1'];$i++){
  		 $sql[$i]="INSERT INTO passageiros VALUES('','".$_SESSION['reserva']['id_cliente']."','".$id_reserva ."','".$_SESSION["reserva"]["nome_crianca1_$i"]." ". $_SESSION["reserva"]["sobrenome_crianca1_$i"]."','Criança de 0 a 1 ano')";
  		 $result=mysql_query($sql[$i],$conn) or die("8".mysql_error());
          }
	}
	
	if($_SESSION['reserva']['criancas2']<>0){
		 for($i=1;$i<=$_SESSION['reserva']['criancas2'];$i++){
  		 $sql[$i]="INSERT INTO passageiros VALUES('','.".$_SESSION['reserva']['id_cliente']."','".$id_reserva ."','".$_SESSION["reserva"]["nome_crianca2_$i"]." ". $_SESSION["reserva"]["sobrenome_crianca2_$i"]."','Criança de 2 a 11 anos')";
  		 $result=mysql_query($sql[$i],$conn) or die("9".mysql_error());
          }
	}
	
  //Matar sessao
  
  
  
  
  $select2="SELECT * FROM passageiros WHERE id_reserva=".$id_reserva; 
   $result5=mysql_query($select2,$conn);
  
  echo "<p>código da reserva: <b>$senha</b></p><br>
  <table border= '0' width='680'>
  <tr bgcolor='#006699'>
  <td width='375'><p class='branco'><b>Nome do Passageiro</b></p></td>
  <td with='305'><p class='branco'><b>Nº da passagem</b></p></td>
  </tr>";
  
  while($linha=mysql_fetch_array($result5)){
  $id_pass=$linha['id_pass'];
  $nome=$linha['nome'];
  
   echo "<tr>
  <td><p>$nome</p></td>
  <td><p>$id_pass</p></td>
  </tr>";
  }
  echo "</table>";
  
  echo "<br><table width='680' border='0'>
  <tr bgcolor='#006699'>
  <td width='184'><p class='branco'><b>Partida(horário)</b></p></td>
  <td width='184'><p class='branco'><b>Chegada(horário)</b></p></td>
  <td><p class='branco'><b>Vôo</b></p></td>
  <td><p class='branco'><b>Classe</b></p></td>
  </tr>
  
  <tr>
  <td><p>".$_SESSION['reserva']['origem']."<br>
          ".conversor($_SESSION['reserva']['data_ida'])."- (23:01)</p></td>
  <td><p>".$_SESSION['reserva']['destino']."<br>
          ".conversor($_SESSION['reserva']['data_ida'])."- (02:20)</p></td>
  <td><p>1</p></td>
  <td><p>".$classe."</p></td>
  </tr>";
  if($_SESSION['reserva']['tipo_voo']=="idavolta"){
  echo "  <tr>
           <td><p>".$_SESSION['reserva']['destino']."<br>
          ".conversor($_SESSION['reserva']['data_volta'])."- (23:01)</p></td>
           <td><p>".$_SESSION['reserva']['origem']."<br>
          ".conversor($_SESSION['reserva']['data_volta'])."- (02:20)</p></td>
          <td><p>1</p></td>
          <td><p>".$_SESSION['reserva']['classe_volta']."</p></td>
          </tr>";
  
  }
   echo "</table>";
   
   echo "<br><table border='0' width='680'>
   <tr bgcolor='#006699'><td><p class='branco'><b>Procedimento de embarque</b></p></td></tr>
   <tr><td><p>O(s) passagegeiro(s) devem apresentar ao local do check-in de embarque portando o
   código da reserva, nº da passagem e o RG com pelo menos 1 hora de antes do vôo<br>
   Caso seja necessário a assinatura do titular do cartão de crédito, é obrigatória a presença
   do mesmo no ato do check-in para a autorização do embarque</p></td></tr>
   
   </table>";
   echo "<br><table border='0' width='680'>
   <tr bgcolor='#006699'>
   <td colspan='2'><p class='branco'><b>Informações sobre a compra</b></p></tr>
   
   <tr>
   <td width='150'><p>Cartão de crédito</p></td>
   <td><p>$cartao</p></td></tr>
   
      <tr>
   <td width='150'><p>Nº de parcelas</p></td>
   <td><p>".$parcelas[0]."</p></td></tr>
   
   <tr>
   <td width='150'><p>Tarifa</p></td>
   <td><p></p></td></tr>
   
     <tr>
   <td width='150'><p>Taxa de embarque</p></td>
   <td><p></p></td></tr>
   
     <tr>
   <td width='150'><p>Valor total</p></td>
   <td><p>R$ ".number_format($preco_total,2,",",".")."</p></td></tr>
   </table>";
  //Botao para voltar para a home2.php
  echo "<input type='button' onclick=\"javascript: window.location='../index.php'\" value= 'Finalizar'>";
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

