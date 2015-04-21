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

if (empty($mes)) {
$mes = date("m");
$ano = date("Y");
}
if(isset($_GET["mes"]) AND isset($_GET["ano"])){
$mes=$_GET["mes"];
$ano=$_GET["ano"];

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
<tr> 
    <td width="35" bgcolor="#003399">
     <div align="center"><a href="calendario.php?mes=<? echo $prevmes; ?>&ano=<? echo $prevano; ?>">&lt;=</a></div></td>
    <td colspan="5" bgcolor="#003399"><div align="center"><p class='branco'><? echo $mesext." / ". $ano?></p></div></td>
    <td width="35" bgcolor="#003399">
<div align="center"><a href="calendario.php?mes=<? echo $nextmes; ?>&ano=<? echo $nextano; ?>">=&gt;</a></div></td>
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
	echo "<td><div align=center><a href='#' class='link2' onClick=\"continuar('insere_voo_diasemana.php?dia=".$linha."&mes=".$mes."&ano=".$ano."')\">".$linha."</a></div></td>";
	
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