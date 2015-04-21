<title>Calendario</title>
<script>
function continuar(url){
if(!window.opener.closed) {
window.opener.location.href=url
} else {
void(window.open(url,'popwinpop','scrollbars=no,resizable=no,width=300,height=200'))
}
self.close();
}</script>
<?
$dia_de=@$_GET["dia_de"];
$mes_de=@$_GET["mes_de"];
$ano_de=@$_GET["ano_de"];

if (empty($mes)) {
$mes = date("m");
$ano = date("Y");
}
if(isset($_GET["mes_c"]) AND isset($_GET["ano_c"])){
$mes=$_GET["mes_c"];
$ano=$_GET["ano_c"];

}
switch($mes)
{
case "01" : $mesext = "Janeiro";	 break;
case "02" : $mesext = "Fevereiro";	 break;
case "03" : $mesext = "Março";		 break;
case "04" : $mesext = "Abril";		 break;
case "05" : $mesext = "Maio";		 break;
case "06" : $mesext = "Junho";		 break;
case "07" : $mesext = "Julho";		 break;
case "08" : $mesext = "Agosto";		 break;
case "09" : $mesext = "Setembro";	 break;
case "10" : $mesext = "Outubro";	 break;
case "11" : $mesext = "Novembro";	 break;
case "12" : $mesext = "Dezembro";	 break;
}

$next = mktime(0,0,0,$mes + 1,1,$ano);
$nextano = date("Y",$next);
$nextmes = date("m",$next);

$prev = mktime(0,0,0,$mes - 1,1,$ano);
$prevano = date("Y",$prev);
$prevmes = date("m",$prev);

$d = mktime(0,0,0,$mes,1,$ano);
$diaSem = date('w',$d);
?>
<link href="../../interface/interface.css" rel="stylesheet" type="text/css">


<table width="245" border="0" align="center" cellpadding="0" cellspacing="0">
<tr bgcolor="#006699"> 
    <td width="35">
     <div align="center"><a href="calendario_ate.php?mes_c=<? echo $prevmes; ?>&ano_c=<? echo $prevano; ?>"><img src="../../icones/adm/i_anterior_branco.gif" border="0"></a></div></td>
    <td colspan="5"><div align="center"><p class='branco'><? echo $mesext." / ". $ano?></p></div></td>
    <td width="35">
<div align="center"><a href="calendario_ate.php?mes_c=<? echo $nextmes; ?>&ano_c=<? echo $nextano; ?>"><img src="../../icones/adm/i_proximo_branco.gif" border="0"></a></div></td>
  </tr>
  <tr> 
    <td width="35"><div align="center"><p>Dom</p></div></td>
    <td width="35"><div align="center"><p>Seg</p></div></td>
    <td width="35"><div align="center"><p>Ter</p></div></td>
    <td width="35"><div align="center"><p>Qua</p></div></td>
    <td width="35"><div align="center"><p>Qui</p></div></td>
    <td width="35"><div align="center"><p>Sex</p></div></td>
    <td width="35"><div align="center"><p>S&aacute;b</p></div></td>
  </tr>
  <?  
//Enquanto hover dias 
	echo "<tr>";
// Coloca os dias em Branco
for($i = 0; $i < $diaSem; $i++)
{
	echo "<td width=35>&nbsp;</td>";
}	
for($i = 2; $i < 33; $i++)
{
	$linha = date('d',$d);
	if($i > 3) {
}
	echo "<td><div align=center><a href='#' class='link2' onClick=\"continuar('insere_voo_diasemana.php?dia_ate=".$linha."&mes_ate=".$mes."&ano_ate=".$ano.
	"&dia_de=".$dia_de."mes_de=".$mes_de."&ano_de=".$ano_de."')\">".$linha."</a></div></td>";
	
// Se Sábado desce uma linha
	
if (date('w',$d) == 6){	echo "</tr>"; }

	$d = mktime(0,0,0,$mes ,$i, $ano);
	if(date('d',$d) == "01") { break; }
}
?>
  <tr> 
    <td width="35">&nbsp;</td>
    <td width="35">&nbsp;</td>
    <td width="35">&nbsp;</td>
    <td width="35">&nbsp;</td>
    <td width="35">&nbsp;</td>
    <td width="35">&nbsp;</td>
    <td width="35">&nbsp;</td>
  </tr>
</table>