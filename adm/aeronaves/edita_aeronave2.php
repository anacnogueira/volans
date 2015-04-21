<? include("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<?	  
$key=$_POST["key"];
$tkey = "" . $key . "";

$fabricante=$_POST['x_fabricante'];
$modelo=$_POST['x_modelo'];
$motores=$_POST['x_motores'];
$classe1=$_POST['x_classe1'];
$executiva=$_POST['x_executiva'];
$economica=$_POST['x_economica'];
$velocidade=$_POST['x_velocidade'];
$imagem=$_FILES['x_foto']['name'];

	
		//select
		$query="SELECT * FROM aeronaves";
		$result=mysql_query($query);
		while ($linha = mysql_fetch_array($result)){
		if( !isset($_FILES['x_foto']['name']) or !$_FILES['x_foto']['name'] ){ 
			$imagem=$linha["foto"];
		} 
		else{
			$imagem=$_FILES['x_foto']['name'];
		}
		
	     // update
		 $updateSQL = "UPDATE aeronaves SET 
                              fabricante='"  . $fabricante . "'," .
                              "modelo='"     . $modelo     . "'," .
			                  "motores='"    . $motores    . "'," .
			      			  "1classe='"    . $classe1    . "'," .
				  			  "executiva='"  . $executiva  . "'," .
				              "economica='"  . $economica  . "'," .
			                  "velocidade='" . $velocidade . "', "  . 
				              "foto='"       . $imagem     . "' "  . 
			                  "WHERE id_aeronave =" . $tkey;							
		
  	$rs = mysql_query($updateSQL, $conn);

		//echo "<br>rs=$updateSQL";
		
		
		header("location: lista_aeronave.php");
		}
		
		//echo "<br><a href='lista_aeronave.php'>Listar</a>";
	//echo "<br>$imagem";
?>
