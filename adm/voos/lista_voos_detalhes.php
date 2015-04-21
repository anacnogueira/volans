<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<?
 $key=$_GET["key"];
 $tkey="".$key."";
?>
<html>
<head>
<title>Detalhes do Voo <?= $key; ?></title>
<link href="../../interface/interface.css" rel="stylesheet" type="text/css">
</head>
<body>

<table border="0" cellpadding="2" cellspacing="2" align="center">
<? 

$query = "SELECT * FROM voo WHERE id_voo='$tkey'";
	$result=mysql_query($query,$conn);
	while ($linha = mysql_fetch_array($result)){

$id_voo=$linha['id_voo'];
$origem=$linha['origem'];
$destino=$linha['destino'];

}
echo "<tr>
      <td><b>ID do Vôo</p></td>
	  <td><p>".$id_voo."</p></td>
      </tr>";
echo "<td><b>Origem</b></td>
	  <td><p>".$origem."</p></td>
	  </tr>";
echo "<tr>
	  <td><b>Destino</b></td>
      <td><p>".$destino."</p></td>
      </tr>";






?>
<tr>
<td colspan="2" align="center"><input type="button" onclick="window.close()" name="fechar" value="fechar">
<tr>
</table>
</blockquote>
<a href="#" >Fechar</a>
