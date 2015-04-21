<? include ("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<?	  
$key = @$_POST["key"];
$tkey = "" . $key . "";
	
		$strsql = "SELECT * FROM administrador WHERE id_admin=".$tkey;
		$result = mysql_query($strsql);
		while($linha = mysql_fetch_array($result)) {
     	mysql_error();
			$x_id_admin=$linha['id_admin'];
			$x_nome=$linha['nome'];
			$x_senha=$linha['senha'];
			$x_permissao=$linha['permissao'];
}
?>
<html>
<head>
<title>Editar Administrador</title>
<link href="../../interface/interface.css" rel="stylesheet" type="text/css">
</head>
<body>
<? include ("../topo/topo_adm.php"); ?>
<table width="779" border="0" cellpadding="0" cellspacing="0">
  <tr valign="top"> 
    <td width="50" rowspan="2"><img src="../fatias/asa_azul.gif" width="42" height="34" hspace="0" vspace="0" align="bottom" class="img"></td>
    <td colspan=2> </td>
  </tr>
  <tr> 
    <td align="left" valign="bottom"> <h1 class="tit_administrador">Editar Administrador</h1></td>
  </tr>
</table>

<form name="edita" action="edita_administrador2.php" method="post" class="form_login">
  <table border="0">
    <tr> 
      <td width="43" height="25"><input type="hidden" name="key" value=<? echo "$x_id_admin"; ?>></td>
      <td width="77"> 
        <p>ID</p></td>
      
    <td colspan="2"><p><? echo $x_id_admin; ?></p></td>
    </tr>
    <tr> 
      <td width="43">&nbsp;</td>
      <td> 
        <p>Nome</p></td>
      
    <td colspan="2"><input name="x_nome" type="text" value="<?= $x_nome;?>" size="29"></td>
    </tr>
    <tr> 
      <td width="43">&nbsp;</td>
      <td> 
        <p>Senha</p></td>
      
    <td colspan="2"><input name="x_senha" type="password" value="<?= $x_senha;?>" size="29"></td>
    </tr>
    <tr> 
      <td width="43">&nbsp;</td>
     <?
	$query="SELECT * FROM administrador WHERE nome='".$_SESSION['x_nome']."'";
    $resultado=mysql_query($query);
	while($line=mysql_fetch_array($resultado)){
	$per=$line['permissao'];
	if($per==1){
	?> 
	<td> <p>Permissão</p></td>
    <td colspan="2">
	<select name="x_permissao">
        <option value="0">Selecione a permissão</option>
        <?
	 
			for($i=1;$i<4;$i++){
				if($i==1){
				$xx_permissao="Leitura, Gravação e exclusão";
				}  else if($i==2){
				$xx_permissao="Leitura e Gravação";
				}
				else{
				$xx_permissao="Leitura";
				}
   			echo "<option value='".$i."'";
					
			if($i==$x_permissao){
			   echo "selected";
			}
			echo ">".$xx_permissao."</option>";
      
   }
	 
	 ?>
      </select><? 
	  }else{
	  ?>
	  <td><p>Permissão</p></td>
	  <td><input type='hidden' name='x_permissao' value="<?= $x_permissao; ?>">
	  <?
	  if($x_permissao==1){
				$xx_permissao="Leitura, Gravação e exclusão";
				}  else if($x_permissao==2){
				$xx_permissao="Leitura e Gravação";
				}
				else{
				$xx_permissao="Leitura";
				}
	    echo $xx_permissao; ?>
	   </p></td>
	<?
	  }}
	  ?> </td>
    </tr>
    <tr>
      <td colspan="2"><div align="right"> </div></td>
      
    <td width="201" align="right"><input type="submit" name="editar" value="editar"> 
    </td>
      <td width="431" align="right">&nbsp;</td>
    </tr>
  </table>
</form>
</body>
</html>
