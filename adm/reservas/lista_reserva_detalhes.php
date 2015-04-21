<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<html>
<head>
<title>Detalhes do Pagamento</title>
<link href="../../interface/interface.css" rel="stylesheet" type="text/css">
</head>
<body>
<table border="0" cellpadding="2" cellspacing="2"  align="center">
<?
$key=$_GET["key"];
$tkey="".$key."";

$query = "SELECT * FROM reserva WHERE id_reserva=".$tkey;
	$result=mysql_query($query,$conn);
	while ($linha = mysql_fetch_array($result)){

$id_reserva=$linha['id_reserva'];
$senha=$linha['senha'];
$pagemento=$linha['pagamento'];
$cartao=$linha['cartao'];
$valor_total=$linha['preco_total'];
$senha=$linha['senha'];
}
echo "<tr><td colspan='2'><h2 align='center'>Detalhes de Pagamento</h3><br></td></tr>";
echo "<tr>
	  <td><b>Id</b></td>
	  <td><p>".$id_reserva."</p></td>
	  </tr>";
echo "<tr>
      <td><b>Senha</b></td>
      <td><p>".$senha."</p></td>
	  </tr>";

echo "<tr><td><b>Pagamento</b></td>
      <td><p>".$pagemento."</p></td>
	  </tr>";
echo "<tr>
      <td><b>Cartão</b></td>
      <td><p>".$cartao."</p></td>
	  </tr>";
echo "<tr>
      <td><b>Valor_total</b></td>
	  <td><p>R$ ".number_format($valor_total,2,",",".")."</p></td>
	  </tr>";

?>
<tr>
<td colspan="2" align="center"><input type="button" onclick="window.close()" name="fechar" value="fechar">
<tr>
</table>
</blockquote>
<a href="#" >Fechar</a>
