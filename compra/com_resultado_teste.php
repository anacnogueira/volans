<? include ("../topo/topo_paginas.php"); ?>
<? include ("../bd/conexao.php"); ?>
<? require_once("../funcoes/pilha.php");
require_once("../funcoes/calc_chegada.php");
require_once("../funcoes/conversor_data.php"); ?>



<? @session_start();
$hora_partida='';
$hora_chegada='';
$id_voo='';

$usu_origem = $_POST["origem"];
$usu_destino = $_POST["destino"];
$qtde_adultos=$_POST["adultos"];
$qtde_criancas1=$_POST["criancas1"];
$qtde_criancas2=$_POST["criancas2"];
$qtde_total=$qtde_adultos+$qtde_criancas2;
$tipo_voo=$_POST["tipo_voo"];
$data_ida=date('Y')."-".$_POST["mes_ida"]."-".$_POST["dia_ida"];
$data_volta=date('Y')."-".$_POST["mes_volta"]."-".$_POST["dia_volta"];
$total_pass=$qtde_adultos+$qtde_criancas2;

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
         
		 $hora_chegada=calc_chegada($hora_partida,$tempo_voo);
		 
		 if(isset($cont_origem[$origem])){
		    $cont_origem[$origem]++;
			}
			else{
			 $cont_origem[$origem]=1;
			 }
			 echo $cont_origem[$origem];
		
		
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
$vezes = 0;
	  
      while (count($cidade) != count($S)) {
	
		 echo "<br> vezes = $vezes";
		 $vezes++;
		 
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
	echo "<br>x = $x    t = $t";
	
//Inverte a sequência do array R.
	  if ($t == 10000) {
	  	echo "<br>saindo...";
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

$hora_partida ='';
$hora_chegada ='';
$id_voo       ='';
echo "tipo_voo=$tipo_voo";
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
 echo  "<table width='680'><tr>
	       <td bgcolor='#006699' align='center' valign='center' height='40'>
           <p class='branco'><b>$msg_erro</b></p>
           </td></tr></table>";

} else {




 cria_tab($result);
 $t1 = time();
 $R = rota($usu_origem, $usu_destino);
 $t2 = time();
 echo "<br>tempo de execução:";
 
 $t = count($R);

if ($R == "nada") {

	echo $msg_erro;

}
else{
 echo "<table border='0' width='680' bgcolor='#EFEFEF' cellpdding='0' cellspacing='0'>";
 echo "<form name='consulta_voo_ida'>";
 echo "<tr bgcolor='#006699'>";
 echo "<td><p class='branco'>Opção</p></td>";
 echo "<td><p class='branco'>Escala</p></td>";
 echo "<td><p class='branco'>Partida</p></td>";
 echo "<td><p class='branco'>Chegada</p></td>";
 echo "<td><p class='branco'>Aeronave</p></td>";
 echo "<td><p class='branco'>Vôo nº</p></td>";
 echo "<td><p class='branco'>Classe</p></td>";
 echo "</tr>";
 
echo "<tr><td rowspan='2'><input type='radio' name='ida' onclick='teste()'></td>";
echo "<td rowspan='2'><p>".(count($R)-2)."</p></td>";
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

	if ($qtde_total>$classe1 AND $qtde_total>$executiva AND $qtde_total>$economica){
	
	
	}
       $hora_chegada=calc_chegada($hora_partida,$tempo_voo);
         echo "<td><input type='hidden' name='origem' value='$c1'><p> $c1 <br>
              (".substr($hora_partida,0,5) .")</p></td>
                   <td><input type='hidden' name='destino' value='$c2'><p> $c2<br>
               (".substr($hora_chegada,0,5).")</p></td>
                       <td><p>$aeronave</p.</td>
                       <td><p>$id</p></td>
               <td><select name='classe_ida_$i'>";
                       if($qtde_total<$classe1){
		echo "<option  value='1classe'>1<sup>a</sup> Classe</option>";
		}
		if($qtde_total<$executiva){
		echo "<option  value='executiva'>Executiva</option>";
		}
		if($qtde_total<$economica){
		echo "<option  value='economica'>Econômica</option>";
		}
                      echo "</select></td></tr>";
 }

       echo "</form></table>";


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

$result2 = mysql_query("SELECT * FROM voo_data,voo,aeronaves,voo_dia_semana
                         WHERE   data='$data_volta' AND
                                 voo_dia_semana.id_voo=voo.id_voo AND
                                 voo_dia_semana.id_dia_semana=voo_data.id_voo_semana AND 
								 voo.id_aeronave=aeronaves.id_aeronave;", $conn);
								 
								 
								 
								 
$nr = mysql_num_rows($result2);

								 
if (mysql_num_rows($result2)==''){

 $erro = 1;
 echo "<br>$msg_erro";

} else {

 cria_tab($result2);

 $S = rota($usu_destino,$usu_origem);
 $t = count($S);

echo "<tr><td rowspan='2' valign='top'><input type='radio' onclick='teste(1)'></td>";
echo "<td rowspan='2' valign='top'><p>".(count($S)-2)."</p></td>";
 for ($i = 0; $i < $t-1; $i++) {
      $c1 = $S[$i];
      $c2 = $S[$i+1];

     $aux = split(",",$dados_voo[$c1][$c2]);

       $id               = $aux[0];
       $aeronave         = $aux[1];
       $hora_partida     = $aux[2];
	   $tempo_voo        = $aux[3];
	   $classe1     	 = $aux[4];
	   $executiva        = $aux[5];
	   $economica		 = $aux[6];
	   $tarifa			 = $aux[7];
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




echo "if(chk1==true){\n";
 
 echo "      function teste(n){\n ";
       

            //n   -> radiobutton
           //n+1 -> origem
          //n+2 -> destino
           //n+3 -> classe;

  echo "          k=1; \n";
  echo "          classes = new Array('1a classe','executiva','economica'); \n";
  echo "            while(k<3*". (count($R)-1)."){ \n";
            
  echo "          origem  = document.consulta_voo_ida.elements[k].value; \n";
  echo "           destino = document.consulta_voo_ida.elements[k+1].value; \n";
  echo " 		classe =   document.consulta_voo_ida.elements[k+2].value; \n";
			
	  echo " 	  k=k+3; \n ";
            
         echo "      w = window.open('','teste','width=400,height=300'); \n";
              //w.document.writeln("indice = " + indice);
           echo "    w.document.writeln('classe = ' + classe+'<br>'); \n";
            echo "   w.document.writeln('Origem = ' + origem+'<br>');\n ";
           echo "    w.document.writeln('Destino = ' + destino+'<br>'); ";
		  echo " 	} \n";
          echo "   return true;";            
        echo "   }  \n";
    
 

 echo "  }\n";
 
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
	
?>

