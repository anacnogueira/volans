<? include ("../../bd/conexao.php"); ?>
<? include("../sessao/sessao.php"); ?>
<? include("../../funcoes/array_estados.php"); ?>
	  
<? 	   
$key = @$_POST["key"];

		
		$strsql = "SELECT * FROM aeroporto WHERE id_aeroporto='" .$key."'";
		$result = mysql_query($strsql);
		while($linha = mysql_fetch_array($result)) {
     	mysql_error();
			
			$x_id_aeroporto=$linha['id_aeroporto'];
			$x_nome=$linha['nome'];
			$x_cidade=$linha['cidade'];
			$x_estado=$linha['estado'];
}
?>
<html>
<head>
<title>Editar Aeroporto</title>
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
    <td align="left" valign="bottom"> <h1 class="tit_administrador">Editar Aeroporto</h1></td>
  </tr>
</table>
<form name="edita" action="edita_aeroporto2.php" method="post" class="form_login">
<input type="hidden" name="key" value=<? echo "$x_id_aeroporto"; ?>>

  <table border="0" cellpadding="1" cellspacing="0">
  
    <tr>
	<td width="30" height="25"> 
      <td width="73"><p>Abreviatura</p></td>
      <td><input type="text" name="x_id_aeroporto" size="50" value="<?=@$x_id_aeroporto; ?>" ></td>
    </tr>
	
    <tr>
	<td width="30" height="25">  
      <td><p>Nome</p></td>
      <td colspan="2"><input type="text" name="x_nome" size="50"  value="<?=@$x_nome; ?>"></td>
    </tr>
	
    <tr>
	<td width="30" height="25"> 
      <td><p>Cidade</p></td>
      <td colspan="2"><font size="-1"><input type="text" name="x_cidade" size="50" value="<?=@$x_cidade; ?>"></td>
    </tr>
	
    <tr>
	<td width="30" height="25"> 
      <td><p>Estado</p></td>
      <td colspan="2"><select name="x_estado" size="1">
                 <?
				 if($x_estado==""){
				   $x_estado="Outros";
				 }
            foreach($estados as $e=>$k){
               echo "<option value=\"$e\" ";
               if($e==$x_estado){
			      echo "selected";
                }
				
				
                 echo ">$e</option>";
                 }
                 ?>
            </select>
        </td>
    </tr>
	<tr> 
      <td colspan="2"><div align="right"> </div></td>
      <td width="326" align="right"><input name="Editar" type="submit" id="Editar" value="editar"> </td>
      <td width="333" align="right">&nbsp;</td>
    </tr>
  </table>
</form>
