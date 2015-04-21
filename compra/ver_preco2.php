<? require_once("../../bd/conexao.php");  ?>
<? session_start(); ?>
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

<script>
function continuar(url){
if(!window.opener.closed) {
window.opener.location.href=url
} else {
void(window.open(url,'popwinpop','scrollbars=no,resizable=no,width=300,height=200'))
}
self.close();
}</script>
<link href="../interface/interface.css" rel="stylesheet" type="text/css">
</head>
 <?
 $id_voo_ida=$_GET["ida"];
 $_SESSION['reserva']['id_voo_dataida']=$_GET["id_voo_dataida"];
 ?>

<body>
<form name="compra" method="post" onSubmit="continuar('com_compra.php')">
  
<table border="0" width="450">
  <tr>
	<?
	if($_SESSION['reserva']['tipo_voo'] =="ida") $tipo_voo="Ida";
	else $tipo_voo="Ida e volta";
	?>
      
    <td colspan="6" bgcolor="#006699" height="25"><p class="branco"><b> &nbsp;Preço para <? echo  $tipo_voo; ?></b></p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><p>Qtde</p></td>
      
    <td align="center">
<p>Tarifa Unit</p></td>
      
    <td align="center">
<p>Tarifa total</p></td>
      
    <td align="center">
<p>Taxas</p></td>
      
    <td align="center">
<p>Subtotal</p></td>
    </tr>

    <?
    $total_taxa_c1=0;
    $total_taxa_c2=0;
    $total_tarifa_c1=0;
    $total_tarifa_c2=0;
define("taxa_fixa", 9.9);
$query="SELECT *
				FROM voo,aeronaves
				WHERE voo.id_aeronave=aeronaves.id_aeronave AND id_voo=".$id_voo_ida;

$result=mysql_query($query);
while($linha=mysql_fetch_array($result)){


         $valor_unit_a=$linha['valor'];
         $total_tarifa_a=$_SESSION['reserva']['adultos']*$valor_unit_a;
		 $taxa_unit_a=taxa_fixa;
         $total_taxa_a=taxa_fixa*$_SESSION['reserva']['adultos'];
         $subtotal_a=$total_tarifa_a+$total_taxa_a;




    //criancas de 0 a 1 ano
    if($_SESSION['reserva']['criancas1']<>0){
    $valor_unit_c1=$linha["valor"]*0.1;
    $total_tarifa_c1=$_SESSION['reserva']['criancas1']*$valor_unit_c1;
    $total_taxa_c1=taxa_fixa*$_SESSION['reserva']['criancas1'];
    $subtotal_c1=$total_tarifa_c1+$total_taxa_c1;
    

	  

     
       //criancas de 2 a 11 anos
      if($_SESSION['reserva']['criancas2']<>0){ //inicio if 2
      $valor_unit_c2=$linha["valor"]*0.75;
      $total_tarifa_c2=$_SESSION['reserva']['criancas2']*$valor_unit_c2;
      $total_taxa_c2=taxa_fixa*$_SESSION['reserva']['criancas2'];
       $subtotal_c2=$total_tarifa_c2+$total_taxa_c2;
       
     
	  

     }
   }
  //Se for ida e volta
 if($_SESSION['reserva']['tipo_voo']=="idavolta"){
 
 //Informaçoes do voo de volta
 $_SESSION['reserva']['id_voo_volta'];
 $_SESSION['reserva']['hora_partida_volta'];
 $_SESSION['reserva']['id_voo_datavolta'];
  
    $query="SELECT *
				FROM voo,aeronaves
				WHERE voo.id_aeronave=aeronaves.id_aeronave AND id_voo=".$_SESSION['reserva']['id_voo_volta'];
    $result=mysql_query($query);
    while($linha=mysql_fetch_array($result)){
	
      //Adultos
     $valor_unit_a+=$linha['valor'];
     $total_tarifa_a=$valor_unit_a*$_SESSION['reserva']['adultos'];
	 $total_taxa_a=(taxa_fixa*2)*$_SESSION['reserva']['adultos'];
	 $subtotal_a=$total_tarifa_a+$total_taxa_a;
     
	 //Crianças de 0 a 1 ano
	 if($_SESSION['reserva']['criancas1']<>0){
	 $valor_unit_c1+=$linha['valor']*0.1;
     $total_tarifa_c1=$valor_unit_c1*$_SESSION['reserva']['criancas1'];
	 $total_taxa_c1=(taxa_fixa*2)*$_SESSION['reserva']['criancas1'];
	 $subtotal_c1=$total_tarifa_c1+$total_taxa_c1;
	 }
	 //Crianças de 2 a 11 anos 
	 if($_SESSION['reserva']['criancas2']<>0){
	 $valor_unit_c2+=$linha['valor']*0.75;
     $total_tarifa_c2=$valor_unit_c2*$_SESSION['reserva']['criancas2'];
	 $total_taxa_c2=(taxa_fixa*2)*$_SESSION['reserva']['criancas2'];
	 $subtotal_c2=$total_tarifa_c2+$total_taxa_c2;
	 }
    }

}
 //Mostrar valores Adultos
 echo "<tr>
      <td><p>Adultos</></td>
      <td align='center'><p>".$_SESSION['reserva']['adultos']."</p></td>
	  <td><p>R$ ".number_format($valor_unit_a,2,",",".")."</p></td>
	  <td><p>R$ ".number_format($total_tarifa_a,2,",",".")."</p></td>
	  <td><p>R$ ".number_format($total_taxa_a,2,",",".")."</p></td>
	  <td><p>R$ ".number_format($subtotal_a,2,",",".")."</p></td>
	  </tr>";

     $_SESSION['reserva']['tarifa_unit_a']=$valor_unit_a;
     $_SESSION['reserva']['total_tarifa_a']=$total_tarifa_a;
     $_SESSION['reserva']['taxas_adultos']=$total_taxa_a;
     $_SESSION['reserva']['subtotal_adultos']=$subtotal_a;

    //Mostrar valores Crianças de 0 a 1 ano
	  if($_SESSION['reserva']['criancas1']<>0){
	   echo "<tr>
      <td><p>Crianças até 1 ano</p></td>
      <td align='center'><p>".$_SESSION['reserva']['criancas1']."</p></td>
	  <td><p>R$ ".number_format($valor_unit_c1,2,",",".")."</p></td>
	  <td><p>R$ ".number_format($total_tarifa_c1,2,",",".")."</p></td>
	  <td><p>R$ ".number_format($total_taxa_c1,2,",",".")."</p></td>
	  <td><p>R$ ".number_format($subtotal_c1,2,",",".")."</p></td>
	  </tr>";
	  
	 $_SESSION['reserva']['tarifa_unit_c1']=$valor_unit_c1;
     $_SESSION['reserva']['total_tarifa_c1']=$total_tarifa_c1;
     $_SESSION['reserva']['taxas_c1']=$total_taxa_c1;
     $_SESSION['reserva']['subtotal_c1']=$subtotal_c1;
	  }

       //Mostrar valores Crianças de 2 a 11 anos
	  if($_SESSION['reserva']['criancas2']<>0){
	   echo "<tr>
      <td><p>Crianças de 2 a 11 anos</p></td>
      <td><p align='center'>".$_SESSION['reserva']['criancas2']."</p></td>
	  <td><p>R$ ".number_format($valor_unit_c2,2,",",".")."</p></td>
	  <td><p>R$ ".number_format($total_tarifa_c2,2,",",".")."</p></td>
	  <td><p>R$ ".number_format($total_taxa_c2,2,",",".")."</p></td>
	  <td><p>R$ ".number_format($subtotal_c2,2,",",".")."</p></td>
	  </tr>";

     $_SESSION['reserva']['tarifa_unit_c2']=$valor_unit_c2;
     $_SESSION['reserva']['total_tarifa_c2']=$total_tarifa_c2;
     $_SESSION['reserva']['taxas_c2']=$total_taxa_c2;
     $_SESSION['reserva']['subtotal_c2']=$subtotal_c2;

	  }
	  
$total_taxa=$total_taxa_a+$total_taxa_c1+$total_taxa_c2;
$total_tarifa=$total_tarifa_a+$total_tarifa_c1+$total_tarifa_c2;
$total=$total_taxa+$total_tarifa;

     $_SESSION['reserva']['tot_taxa']=$total_taxa;
     $_SESSION['reserva']['tot_tarifa']=$total_tarifa;
     $_SESSION['reserva']['total']=$total;


echo "<tr>
	<td><p>Total</p></td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td><p>R$ ".number_format($total_tarifa,2,",",".")."</p></td>
	<td><p>R$ ".number_format($total_taxa,2,",",".")."</p></td>
	<td><p>R$ ".number_format($total,2,",",".")."</p></td>
	</tr>";

}
	  
?>
  <tr>
  <td colspan='6'>
  <input type="button" name='enviar' value="fechar" onClick="javascript: window.close();">
  <input type="submit" name='enviar' value="Continuar Compra">
  </td>
  </tr>
  </table>

</body>
</html>
