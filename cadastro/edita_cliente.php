<?php 
      include("../funcoes/array_estados.php");
	  include("../header.php");
	   
	   	  
		  
	if((isset($_SESSION['x_login']))&& (isset($_SESSION['x_senha']))){ 

		
		$strsql = "SELECT * FROM cliente WHERE email='".$_SESSION['x_login']."'";
		$result = mysql_query($strsql);
		while($linha = mysql_fetch_array($result)) {
     	mysql_error();
			$x_id_cliente=$linha['id_user'];
			$x_cart_vantagem=$linha['cartao_vantagem'];
			$x_nome=$linha['nome'];
			$x_sobrenome=$linha['sobrenome'];
			$x_cidade=$linha['cidade'];
			$x_estado=$linha['estado'];
			$x_pais=$linha['pais'];
			$x_telefone=$linha['telefone'];
			$x_email=$linha['email'];
			$x_permite_pub=$linha['permite_pub'];
} 
?>

<form name="edita" action="edita_cliente2.php" method="post">
<input type="hidden" name="key" value=<? echo "$x_id_cliente"; ?>>

  <table border="0" cellspacing="1" cellpadding="4">
  <tr> 
      <td><b>Nome</b></td>
      <td><? echo $x_nome; ?></td>
    </tr>
	
    <tr> 
      <td><b>Sobrenome</b></td>
      <td><? echo $x_sobrenome; ?></td>
    </tr>
	
    <tr> 
      <td><b>Cidade</b></td>
      <td><input type="text" name="x_cidade" value="<?= $x_cidade; ?>"></td>
    </tr>
	
    <tr> 
      <td><b>estado</b></td>
      <td><select name="x_estado" size="1">
                 <?
            foreach($estados as $e=>$k){
               echo "<option value=\"$e\"";
               if($e==$x_estado){
                echo "selected";
                }
                 echo ">$e</option>";
                 }
                 ?>
            </select></td>
    </tr>
	
    <tr> 
      <td><b>País</b></td>
      <td><input type="text" name="x_pais" value="<?=@$x_pais; ?>"></td>
    </tr>
	
	<tr> 
      <td><b>Telefone</b></td>
      <td><input type="text" name="x_telefone" value="<?=@$x_telefone; ?>"></td>
    </tr>
	
		<tr> 
      <td><b>E-mail</b></td>
      <td><? echo $x_email; ?></td>
    </tr>
	
		<tr> 
      <td><b>Permite envio de publicidade?</b></td>
      <td>      <?
            if($permite_pub=='s'){
            ?>
                  <input type="radio" name="x_publicidade"  value="s" checked>Sim
                  <input type="radio" name="x_publicidade" value="n">Não</td>
          <?
             } else {
          ?>
                  <input type="radio" name="x_publicidade"  value="s">Sim
                  <input type="radio" name="x_publicidade" value="n" checked>Não</td>
          <?
          }
          ?></td>
    </tr>
	
	<tr><td colspan="2"><input type="submit" name="Action" value="Atualizar cadastro"></td></tr>
  </table>
</form>
<?
}
else{
header("location:index.php");
} 
?>
