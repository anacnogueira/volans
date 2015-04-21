<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<?
 $caminho="../../imagens/aeronaves/externos/";   
 $key=$_GET["key"];
 $tkey="".$key."";
 $query = "SELECT * FROM aeronaves WHERE id_aeronave=".$tkey;

	$result=mysql_query($query,$conn);
	while ($linha = mysql_fetch_array($result)){
	$foto=$linha["foto"];
	$modelo=$linha["modelo"];
	?>
	<html>
<head>
<title>Visualização de foto Aeronave <?= $modelo; ?></title>
<link href="../../interface/interface.css" rel="stylesheet" type="text/css">
</head>
<body>
<?
 echo "<table border='0'cellpaddin='0' cellspacing='0'>
 <tr>
 <td align='center'><img src='$caminho$foto'></td>
 </tr>
 <tr>
 <td align='center'><p><b>Modelo: </b>$modelo</p></td>
 </tr>
 <tr>
 <td align='center'><input type='button' onclick='javascript:window.close()' name='fechar' value='fechar'></td>
 </tr>
 </table>";
 }
  ?>
</body>
</html>
