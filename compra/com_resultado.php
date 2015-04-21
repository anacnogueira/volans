<? include ("../topo/topo_paginas.php"); ?>
<? include ("../bd/conexao.php"); ?>
<? require_once("../funcoes/pilha.php");
require_once("../funcoes/calc_chegada.php");
require_once("../funcoes/conversor_data.php");

$hora_partida ='';
$hora_chegada ='';
$id_voo       ='';
$usu_origem     = $_POST["origem"];
$usu_destino    = $_POST["destino"];
$qtde_adultos   = $_POST["adultos"];
$qtde_criancas1 = $_POST["criancas1"];
$qtde_criancas2 = $_POST["criancas2"];
$qtde_total     = $qtde_adultos+$qtde_criancas2;
$tipo_voo       = $_POST["tipo_voo"];

$data_ida       = date('Y')."-".$_POST["mes_ida"]."-".$_POST["dia_ida"];
$data_volta     = date('Y')."-".$_POST["mes_volta"]."-".$_POST["dia_volta"];


?>
<? if($tipo_voo=="ida"){ ?>
<script language="JavaScript" src="../../scripts/valida_form2.js"></script>
<? }else{ ?>
<script language="JavaScript" src="../../scripts/valida_form3.js"></script>
<? } ?>
<? @session_start();
$hora_partida='';
$hora_chegada='';
$id_voo='';



?>
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
    <td width="613" height="257">
      <table width="600" height="242" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="51">&nbsp;</td>
          <td rowspan="2" valign="top">
		  <!--inicio-->
		  <?
		  function cria_tab($res) {

// Cria tabela de desitâncias.

      global $T,$cidade,$dados_voo;

      $t=0;

      while ($linha = mysql_fetch_array($res, MYSQL_ASSOC)) {

         $origem       = $linha["origem"];
         $destino      = $linha["destino"];
         $classe1      = $linha["1classe_data"];
         $executiva    = $linha["executiva_data"];
         $economica    = $linha["economica_data"];
         $tempo        = $linha["tempo_voo"];
         $tempo_voo    = $linha["tempo_voo"];
         $hora_partida = $linha["hora"];
         $aeronave     = $linha["modelo"];
         $id_voo       = $linha["id_voo"];
         $id_voo_data  = $linha["id_voo_data"];
		 $tarifa       = $linha["valor"];

			
         $aux=split(":",$tempo);
         $h = $aux[0];
         $m = $aux[1];
         $s = $aux[2];

         $t++;

         $T[$origem][$destino]=$h + $m/60.0 + $s/3600.0;
    
		  
         $cidade[$origem]=1;
         $cidade[$destino]=1;

         $dados_voo[$origem][$destino] = $id_voo . ", " . $aeronave . "," . $hora_partida .",". $tempo_voo . "," .$classe1 .",". $executiva. "," . $economica .",".$tarifa;
     }

     $cidade2 = $cidade;

// Atribui 10000 para os parese de cidadas para os quais não há rota.

     foreach ($cidade as $o => $v){
        foreach ($cidade2 as $d => $v){
           if (!isset ($T[$o][$d])) {
              $T[$o][$d]=10000;
           }
        }
     }
}

function rota($usu_origem, $usu_destino) {

      global $T,$cidade;

//Inicializa os arrays D e R.

	if (!isset($T[$usu_origem][$usu_destino])) {
		return "nada";
	}
	
	
      foreach ($cidade as $c => $v) {
         $D[$c] = $T[$usu_origem][$c];
         $R[$c] = $usu_origem;
       }
	   
	
		
      $S[$usu_origem]=1;

//Determina a rota mais curta entre a origem e as demais cidades.

	  
      while (count($cidade) != count($S)) {
	
	
		 
		// if ($vezes++ > 10) return "nada";
		 
         $m=10000;
         foreach ($cidade as $c => $v) {
              if (!isset ($S[$c])) {
                 if ($D[$c] <= $m) {
                      $m=$D[$c];
                      $w=$c;
                 }
              }
         }
		
         $S[$w]=1;
         foreach ($cidade as $c => $v)  {
            if (!isset ($S[$c])) {
              if ($D[$w] + $T[$w][$c] < $D[$c]) {
                 $D[$c]=$D[$w] + $T[$w][$c];
                 $R[$c]=$w;
              }
            }
         }
	
      }
	 
	 
	$x = $R[$usu_destino];
	$t = $T[$x][$usu_destino];
	
	
//Inverte a sequência do array R.
	  if ($t == 10000) {
	  	return "nada";
	  }
	  
      limpa();
      push($usu_destino);
      $c = $R[$usu_destino];
      while ($c != $usu_origem) {
              push($c);
              $c = $R[$c];
      }
      push($c);

//Monta o array da rota.

      $n = 0;
      while (!vazia()) {
         $rota[$n] = pop();
         $n++;
      }

	
      return $rota;
}

// #####################################################
//
//      PROGRAMA PRINCIPAL
//
// #####################################################

$qtde_criancas2 = $_POST["criancas2"];
$_SESSION['reserva']['adultos']=$qtde_adultos;
$_SESSION['reserva']['criancas1']=$qtde_criancas1;
$_SESSION['reserva']['criancas2']=$qtde_criancas2;

$_SESSION['reserva']['id_voo']=$id_voo;
$_SESSION['reserva']['usu_origem']=$usu_origem;
$_SESSION['reserva']['usu_destino']=$usu_destino;
$_SESSION['reserva']['qtde_adultos']=$qtde_adultos;
$_SESSION['reserva']['qtde_criacas1']=$qtde_criancas1;
$_SESSION['reserva']['qtde_criacas2']=$qtde_criancas2;
$_SESSION['reserva']['qtde_total']=$qtde_total;
$_SESSION['reserva']['tipo_voo']=$qtde_criancas1;

?>
<table>
<tr><td><p>Ida: <b><?= conversor($data_ida); ?></b></p></td></tr>
<tr><td><p>Partindo de: <b><?= $usu_origem; ?></b></p></td></tr>
<tr><td><p>Chegando a : <b><?= $usu_destino; ?></b></p></td>
</tr>
</table>
<?
//Montar tabela


$msg_erro = "Não existem vôos disponiveis para esta data e período ou todos os vôos estão lotados.";
$cone = mysql_connect("localhost","root", "");
$result = mysql_query("SELECT * FROM voo_data,voo,aeronaves,voo_dia_semana
                         WHERE   data='$data_ida' AND
                                 voo_dia_semana.id_voo=voo.id_voo AND
                                 voo_dia_semana.id_dia_semana=voo_data.id_voo_semana AND
								 voo.id_aeronave=aeronaves.id_aeronave;", $cone);

$nr = mysql_num_rows($result);


mysql_close($conn);

if ($nr==0){

 $erro = 1;
 echo  "<table width='680'>\n
            <tr>
	       <td bgcolor='#006699' align='center' valign='center' height='40'>
           <p class='branco'><b>$msg_erro </b></p>
           </td></tr></table>";

} else {




 cria_tab($result);
 //$t1 = time();
 $R = rota($usu_origem, $usu_destino);
 //$t2 = time();
 
 
 $t = count($R);

if ($R == "nada") {

	 echo  "<table width='680'><tr>
	       <td bgcolor='#006699' align='center' valign='center' height='40'>
           <p class='branco'><b>$msg_erro</b></p>
           </td></tr></table>";
}
else{
 echo "<table border='0' width='680' bgcolor='#EFEFEF' cellpdding='0' cellspacing='0'>\n";
 echo "<form name='consulta_voo_ida'>\n";
 echo "<tr bgcolor='#006699'>\n";
 echo "<td><p class='branco'>Opção</p></td>\n";
 echo "<td><p class='branco'>Escala</p></td>\n";
 echo "<td><p class='branco'>Partida</p></td>\n";
 echo "<td><p class='branco'>Chegada</p></td>\n";
 echo "<td><p class='branco'>Aeronave</p></td>\n";
 echo "<td><p class='branco'>Vôo nº</p></td>\n";
 echo "<td><p class='branco'>Classe</p></td>\n";
 echo "</tr>\n";
 
echo "<tr><td rowspan='2'><input type='radio' name='ida' onclick=\"valida_form('ver_preco.php')\"></td>\n";
echo "<td rowspan='2'><p>".(count($R)-2)."</p></td>\n";
 for ($i = 0; $i < $t-1; $i++) {
      $c1 = $R[$i];
      $c2 = $R[$i+1];
	  
	  

     $aux = split(",",$dados_voo[$c1][$c2]);

       $id               = $aux[0];
       $aeronave         = $aux[1];
       $hora_partida     = $aux[2];
	   $tempo_voo        = $aux[3];
	   $classe1     	 = $aux[4];
	   $executiva        = $aux[5];
	   $economica		 = $aux[6];
	   $total			 = $aux[7];
	   
	   $soma_preco += $total;

	if ($qtde_total>$classe1 AND $qtde_total>$executiva AND $qtde_total>$economica){
	 echo  "<table width='680'><tr>
	       <td bgcolor='#006699' align='center' valign='center' height='40'>
           <p class='branco'><b>$msg_erro</b></p>
           </td></tr></table>";
	exit;
	}
       $hora_chegada=calc_chegada($hora_partida,$tempo_voo);
         echo "<td><input type='hidden' name='origem' value='$c1'><p> $c1 <br>
              (".substr($hora_partida,0,5) .")</p></td>\n
                   <td><input type='hidden' name='destino' value='$c2'><p> $c2<br>
               (".substr($hora_chegada,0,5).")</p></td>\n
                       <td><p>$aeronave</p.</td>\n
                       <td><p>$id</p></td>\n
               <td><select name='classe_ida_$i'>\n";
                       if($qtde_total<$classe1){
		echo "<option  value='1classe'>1<sup>a</sup> Classe</option>\n";
		}
		if($qtde_total<$executiva){
		echo "<option  value='executiva'>Executiva</option>\n";
		}
		if($qtde_total<$economica){
		echo "<option  value='economica'>Econômica</option>\n";
		}
                      echo "</select></td></tr>\n";
 }




       echo "</form></table>\n";
$_SESSION['reserva']['tarifa_total'] = $soma_preco;

} }
mysql_free_result($result);
/*********************
       VOLTA
********************/

if($tipo_voo=="idavolta"){


?>
<br>
<table>
<tr><td><p>Volta: <b><?= conversor($data_volta); ?></b></p></td></tr>
<tr><td><p>Partindo de: <b><?= $usu_destino; ?></b></p></td></tr>
<tr><td><p>Chegando a : <b><?= $usu_origem; ?></b></p></td>
</tr>
</table>
<?


$result2 = mysql_query("SELECT * FROM voo_data,voo,aeronaves,voo_dia_semana
                         WHERE   data='$data_volta' AND
                                 voo_dia_semana.id_voo=voo.id_voo AND
                                 voo_dia_semana.id_dia_semana=voo_data.id_voo_semana AND 
								 voo.id_aeronave=aeronaves.id_aeronave;", $conn);
								 
					 
$nr = mysql_num_rows($result2);

							 
if ($nr==0){

 $erro = 1;
 echo  "<table width='680'><tr>
	       <td bgcolor='#006699' align='center' valign='center' height='40'>
           <p class='branco'><b>$msg_erro</b></p>
           </td></tr></table>";

} else {

 cria_tab($result2);

  $S = rota($usu_destino, $usu_origem);
 $t = count($S);
if ($S== "nada") {

	 echo  "<table width='680'><tr>
	       <td bgcolor='#006699' align='center' valign='center' height='40'>
           <p class='branco'><b>$msg_erro </b></p>
           </td></tr></table>";
}
else{

 echo "<table border='0' width='680' bgcolor='#EFEFEF'>";
  echo "<form name='consulta_voo_volta'>";
 echo "<tr bgcolor='#006699'>";
 echo "<td><p class='branco'>Opção</p></td>";
 echo "<td><p class='branco'>Escala</p></td>";
 echo "<td><p class='branco'>Partida</p></td>";
 echo "<td><p class='branco'>Chegada</p></td>";
 echo "<td><p class='branco'>Aeronave</p></td>";
 echo "<td><p class='branco'>Vôo nº</p></td>";
 echo "<td><p class='branco'>Classe</p></td>";
 echo "</tr>";
 
echo "<tr><td rowspan='2' valign='top'><input type='radio' onclick='teste(1)'></td>";
echo "<td rowspan='2' valign='top'><p>".(count($S)-2)."</p></td>";
 for ($i = 0; $i < $t-1; $i++) {
      $c1 = $S[$i];
      $c2 = $S[$i+1];

     $aux1 = split(",",$dados_voo[$c1][$c2]);

       $id               = $aux1[0];
       $aeronave         = $aux1[1];
       $hora_partida     = $aux1[2];
	   $tempo_voo        = $aux1[3];
	   $classe1     	 = $aux1[4];
	   $executiva        = $aux1[5];
	   $economica		 = $aux1[6];
	   $tarifa			 = $aux1[7];
       $hora_chegada=calc_chegada($hora_partida,$tempo_voo);
	   
         echo "<td><input type='hidden' name='origem' value='$c1'><p> $c1<br>
              (".substr($hora_partida,0,5) .")</p></td>
                   <td><input type='hidden' name='origem' value='$c2'><p> $c2<br>
               (".substr($hora_chegada,0,5).")</p></td>
                       <td><p>$aeronave</p></td>
                       <td><p>$id</p></td>
               <td><select name='classe_ida_$i'>";
                       if($qtde_total<$classe1){
		echo "<option  value='1classe'>1<sup>a</sup> Classe</option>";
		}
		if($qtde_total<$executiva){
		echo "<option  value='Executiva'>Executiva</option>";
		}
		if($qtde_total<$economica){
		echo "<option  value='economica'>Econômica</option>";
		}
                      echo "</select></td></tr>";
 }

       echo "</form></table>";


}}

}
?>
 <!--fim-->
		  </td>
        </tr>
        <tr>
          <td width="10" height="191"> <div align="center"></div>
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
          <td height="45" valign="bottom"> <div align="center"><a href="com_promocoes.php.php" onMouseOver="infoLink('Compra on line - Promoções');return document.valourtrue" onMouseOut="vazio()"><img src="promocoes.gif" width="36" height="36" border="0"></a></div></td>
        </tr>
        <tr>
          <td><div align="center" ><a href="com_promocoes.php" class="link_icones">Promo&ccedil;&otilde;es</a></div></td>
        </tr>
      </table></td>
  

      <? include ("../barra_inferior.php"); ?>
</table>
</body>
</html>
<?
/**************



if($tipo_voo=="ida"){
echo "<script>\n";
echo " var form1=document.consulta_voo_ida;\n ";
echo " var elem1=form1.elements;\n ";
echo "  var chk1;\n ";
echo "  for(var x=0; x < elem1.length; x++){ \n";
echo " if(elem1[x].checked==true){ \n"; 
echo " chk1=true;\n";
echo "   } \n";
echo " }\n";
//echo "if(chk1==true){\n";
 
echo "var nao_abri = 1;\n";

 echo "      function teste(){\n ";
       

            //n   -> radiobutton
           //n+1 -> origem
          //n+2 -> destino
           //n+3 -> classe;

  echo "          k=1; \n";
  echo "          classes = new Array('1a classe','executiva','economica'); \n";
  echo "            while(k<3*".count($R)."){ \n";
            
  echo "         origem  = document.consulta_voo_ida.elements[k].value; \n";
  echo "        destino = document.consulta_voo_ida.elements[k+1].value; \n";
  echo " 		classe =   document.consulta_voo_ida.elements[k+2].value; \n";
			
	  echo " 	  k=k+3; \n ";
            
         echo "      w = window.open('','teste','width=400,height=300'); \n";

              //w.document.writeln("indice = " + indice);
echo "	 	if (nao_abri) {\n ";

 echo "   w.document.writeln('<body>');\n ";
echo "   w.document.writeln(\"<form name='compra' method='post' onSubmit=continuar('com_compra.php')>\");\n ";
echo "   w.document.writeln(\"<td colspan='6' bgcolor='#006699' height='25'><p class='branco'><b> &nbsp;Preço para ".$tipo_voo."</b></p></td>\");\n ";
echo "   w.document.writeln('    </tr>     ');\n ";
echo "   w.document.writeln('    <tr>      ');\n ";
echo "   w.document.writeln('      <td>&nbsp;</td> ');\n ";
echo "   w.document.writeln('      <td><p>Qtde</p></td> ');\n ";
      
echo "   w.document.writeln(\"    <td align='center'> \");\n ";
echo "   w.document.writeln('<p>Tarifa Unit</p></td> ');\n ";
      
echo "   w.document.writeln(\"    <td align='center'> \");\n ";
echo "   w.document.writeln('<p>Tarifa total</p></td> ');\n ";
      
echo "   w.document.writeln(\"    <td align='center'> \");\n ";
echo "   w.document.writeln('<p>Taxas</p></td> ');\n ";
      
echo "   w.document.writeln(\"    <td align='center'> \");\n ";
echo "   w.document.writeln('<p>Subtotal</p></td> ');\n ";
echo "   w.document.writeln('    </tr> ');\n ";

echo "total_taxa_c1=0;\n";
echo "total_taxa_c2=0;\n";
echo "total_tarifa_c1=0;\n";
echo "total_tarifa_c2=0;\n";
echo "taxa_fixa= 9.9;\n";
echo "total_tarifa_a=".$_SESSION['reserva']['adultos']."*valor_unit_a\n";
	//	 $taxa_unit_a=taxa_fixa;
      //   $total_taxa_a=taxa_fixa*$_SESSION['reserva']['adultos'];
        // $subtotal_a=$total_tarifa_a+$total_taxa_a;




    //criancas de 0 a 1 ano
    //if($_SESSION['reserva']['criancas1']<>0){
    //$valor_unit_c1=$linha["valor"]*0.1;
    //$total_tarifa_c1=$_SESSION['reserva']['criancas1']*$valor_unit_c1;
    //$total_taxa_c1=taxa_fixa*$_SESSION['reserva']['criancas1'];
    //$subtotal_c1=$total_tarifa_c1+$total_taxa_c1;
    

	  

     
       //criancas de 2 a 11 anos
      //if($_SESSION['reserva']['criancas2']<>0){ //inicio if 2
      //$valor_unit_c2=$linha["valor"]*0.75;
      //$total_tarifa_c2=$_SESSION['reserva']['criancas2']*$valor_unit_c2;
      //$total_taxa_c2=taxa_fixa*$_SESSION['reserva']['criancas2'];
       //$subtotal_c2=$total_tarifa_c2+$total_taxa_c2;
       //  }
  // }
echo "    w.document.writeln('classe = ' + classe+'<br>'); \n";
            echo "   w.document.writeln('Origem = ' + origem+'<br>');\n ";
           echo "    w.document.writeln('Destino = ' + destino+'<br>'); ";
		  
echo "		}\n ";
echo "		nao_abri = 0;\n ";

           
		  echo " 	} \n";
          echo "   return true;";            
        echo "   }  \n";
    
 

// echo "  }\n";
 
echo "       </script>\n ";
}	
	if($tipo_voo=="idavolta"){
	echo "<script>\n";
echo "	var form1=document.consulta_voo_ida; \n";
echo "var form2=document.consulta_voo_volta;\n ";
echo "var elem1=form1.elements;\n ";
echo "var elem2=form2.elements; \n";
echo "var chk2; \n";
echo "var chk1; \n";
echo "for(var x=0; x < elem1.length; x++){\n ";
echo " if(elem1[x].checked==true){\n ";
echo " chk1=true; ";
echo " }\n ";

echo "} \n";

echo "for(var y=0; y < elem2.length; y++){\n ";
echo "if(elem2[y].checked==true){ \n";
echo " chk2=true; \n";
echo " }\n ";

echo "} ";

echo "if(chk1==true  && chk2==true){\n ";
   
    
 echo " }\n ";
  echo "      function teste(n){ ";
       

            //n   -> radiobutton
           //n+1 -> origem
          //n+2 -> destino
           //n+3 -> classe;

  echo "          k=1; \n";
  echo "          classes = new Array('','1a classe','executiva','economica');\n";
  echo "            while(k<3*". (count($S)-1)."){ \n";
            
  echo "          origem  = document.consulta_voo_volta.elements[k].value;\n ";
  echo "           destino = document.consulta_voo_volta.elements[k+1].value; \n";
  echo "indice0  = document.consulta_voo_volta.elements[k+2].selectedIndex; \n";
  echo " 		classe = classes[indice0]; \n";

   

			
	  echo " 	  k=k+3;  \n";
            
         echo "      w = window.open('','teste','width=400,height=300');\n; ";
              //w.document.writeln("indice = " + indice);
           echo "    w.document.writeln('classe = ' + classe+'<br>'); \n";
            echo "   w.document.writeln('Origem = ' + origem+'<br>'); \n";
           echo "    w.document.writeln('Destino = ' + destino+'<br>');\n ";
		  echo " 	}\n ";
          //
		  echo "          m=1; \n";
  echo "          classes = new Array('1a classe','executiva','economica'); \n";
  echo "            while(m<3*". (count($R)-1)."){ \n";
            
  echo "          origem  = document.consulta_voo_ida.elements[m].value; \n";
  echo "           destino = document.consulta_voo_ida.elements[m+1].value; \n";
   echo "indice  = document.consulta_voo_ida.elements[k+2].selectedIndex; \n";
  echo " 		classe = classes[indice]; \n";

			
	  echo " 	  m=m+3; \n ";
            
         echo "      w = window.open('','teste','width=400,height=300'); \n";
              //w.document.writeln("indice = " + indice);
           echo "    w.document.writeln('classe = ' + classe+'<br>'); \n";
            echo "   w.document.writeln('Origem = ' + origem+'<br>');\n ";
           echo "    w.document.writeln('Destino = ' + destino+'<br>'); ";
		  echo " 	} \n";
                echo " return true; ";
        echo "   }  \n";
              
        //
		
	
    echo "       </script> ";
	
	 
	}
	***********/ 
?>

