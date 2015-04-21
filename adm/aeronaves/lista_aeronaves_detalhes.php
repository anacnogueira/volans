<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<?
$key = $_GET["key"];
$tkey = "" . $key . "";

$query = "SELECT * FROM aeronaves WHERE id_aeronave=".$tkey;
	$result=mysql_query($query,$conn);
	while ($linha = mysql_fetch_array($result)){

$id_aeronave=$linha['id_aeronave'];
$modelo=$linha['modelo'];
$fabricante=$linha['fabricante'];
$motores=$linha['motores'];
$velocidade=$linha['velocidade']; 
?>

<html>
<head>
<title>Detalhes do modelo <?= $modelo; ?></title>
<link href="../../interface/interface.css" rel="stylesheet" type="text/css">
</head>
<body>

<table border="0" cellpadding="2" cellspacing="2" align="center">
<?
}
echo "<tr><td colspan='2'><h2 align='center'>Detalhes do modelo  ".$modelo."</h3><br></td></tr>";
echo  "<tr>
	  <td><b>Id Aeronave</b></td>
	  <td><p>".$id_aeronave."</p></td>
	  </tr>";
echo "<tr>
	  <td><b>Modelo</b></td>
      <td><p>".$modelo."</p></td>
      </tr>";
echo "<tr>
      <td><b>Fabricante</b></td>
      <td><p>".$fabricante."</p></td>
	  </tr>";

echo "<tr><td><b>Motores</b></td>
      <td><p>".$motores."</p></td>
	  </tr>";
echo "<tr>
      <td><b>Velocidade</b></td>
      <td><p>".$velocidade."</p></td>
	  </tr>";
?>

<tr>
<td colspan="2" align="center"><input type="button" onclick="window.close()" name="fechar" value="fechar">
<tr>
</table>
</blockquote>
<a href="#" >Fechar</a>
