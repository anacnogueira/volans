<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<html>
<head>
<title>Detalhes do Cliente</title>
<link href="../../interface/interface.css" rel="stylesheet" type="text/css">
</head>
<body>

<table border="0" cellpadding="2" cellspacing="2"  align="center">
<? 
$key=$_GET["key"];
$tkey="".$key."";

$query = "SELECT * FROM cliente WHERE id_user=".$tkey;
	$result=mysql_query($query,$conn);
	while ($linha = mysql_fetch_array($result)){

$id_user=$linha['id_user'];
$nome=$linha['nome'];
$sobrenome=$linha['sobrenome'];
$cidade=$linha['cidade']; 
$estado=$linha['estado']; 
$pais=$linha['pais']; 
$telefone=$linha['telefone'];
$email=$linha['email'];
$sexo=$linha['sexo'];
$rg=$linha['rg'];
$cpf=$linha['cpf'];
$permite_pub=$linha['permite_pub'];
}
echo "<tr><td colspan='2'><h2 align='center'>Detalhes de ".$nome." ".$sobrenome."</h3><br></td></tr>";
if($sexo=='f'){
	$sexo="Feminino";
	}
	else{
	$sexo="Masculino";
	}
if($permite_pub=='s'){
	$permite_pub="Sim";
}
else{
	$permite_pub="Não";
}


echo "<tr>
	  <td><b>Id</b></td>
	  <td><p>".$id_user."</p></td>
	  </tr>";
echo "<tr>
      <td><b>Cidade</b></td>
      <td><p>".$cidade."-".$estado."</p></td>
	  </tr>";

echo "<tr><td><b>País</b></td>
      <td><p>".$pais."</p></td>
	  </tr>";
echo "<tr>
      <td><b>Telefone</b></td>
      <td><p>".$telefone."</p></td>
	  </tr>";
echo "<tr>
      <td><b>E-mail</b></td> 
	  <td><p>".$email."</p></td>
	  </tr>";
echo "<tr>
      <td><b>Sexo</b></td>
	  <td><p>".$sexo."</p></td>
	  </tr>";
echo "<tr>
      <td><b>RG</b></td>
	  <td><p>".$rg."</p></td>
	  </tr>";
echo "<tr>
      <td><b>CPF</b></td>
	  <td><p>".$cpf."</p></td>
	  </tr>";
echo "<tr>
      <td><b>Publicidade</b></td>
	  <td><p>".$permite_pub."</p></td>
       </tr>";



?>
<tr>
<td colspan="2" align="center"><input type="button" onclick="window.close()" name="fechar" value="fechar">
<tr>
</table>
</blockquote>
<a href="#" >Fechar</a>
