<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<?
$key=$_POST["key"];
$tkey = "" . $key . "";

$id_aeroporto=$_POST['x_id_aeroporto'];
$nome=$_POST['x_nome'];
$cidade=$_POST['x_cidade'];
$estado=$_POST['x_estado'];

 if($estado=="Outros"){
   $estado=" ";
	}
		
	     // update
		 $updateSQL = "UPDATE `aeroporto` SET `id_aeroporto`='".$id_aeroporto."',
											 nome='".$nome."',
											cidade='".$cidade."',
											estado='".$estado."'
					WHERE `id_aeroporto`='".$tkey."'";							
		
  	$rs = mysql_query($updateSQL, $conn);

		//echo "<br>rs=$updateSQL";
		
		header("Location: lista_aeroporto.php");
		
?>
