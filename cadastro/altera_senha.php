<?php 
      include("../header.php");
	   
	   	  
		  
	if((isset($_SESSION['x_login']))&& (isset($_SESSION['x_senha']))){ 

		
		$strsql = "SELECT * FROM cliente WHERE email='".$_SESSION['x_login']."'";
		$result = mysql_query($strsql);
		while($linha = mysql_fetch_array($result)) {
     	mysql_error();
			$x_id_user=$linha['id_user'];
			} 
?>

<form name="edita" action="altera_senha2.php" method="post">
<input type="hidden" name="key" value=<? echo "$x_id_user"; ?>>

  <table border="0" cellspacing="1" cellpadding="4">
  <tr> 
      <td><b>Nova senha</b></td>
      <td><input type="password" name="x_senha"></td>
    </tr>
	
    <tr> 
      <td><b>Redigitar senha</b></td>
      <td><input type="password" name="x_conf_senha"></td>
    </tr>
		
      <tr>
	  <td>&nbsp;</td>            
      <td><input type="submit" name="Action" value="altera senha"></td></tr>
  </table>
</form>
<?
}
else{
header("location:../index.php");
} 
?>
