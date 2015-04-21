 <? include("../bd/conexao.php");
 $nome=$_POST["nome"];
  $email=$_POST["email"];
  $coment=$_POST["coment"];
  $incompleto=false;

  $data = date("Y-m-d");
  $hora = date("H:i:s");
  $novadata = substr($data,8,2) . "/" .substr($data,5,2) . "/" . substr($data,0,4);
  $novahora = substr($hora,0,2) . "h" .substr($hora,3,2) . "min";

if($nome==''){
	$erro1="Preencha este campo com seu nome";
	$incompleto=true;
	}
	else{
	$erro1='';
	}
if($email==''){
	$erro2="Preencha este campo com o seu e-mail";
	$incompleto=true;
	}
	else{
	$erro2='';
	}	
if($coment==''){
	$erro3="Por favor, deixe a sua mensagem aqui!";
	}
	else{
	$erro3='';
	}
if($incompleto==true){
?>
	<FORM name="form1" method="post" action="insere_contato.php">
          <TABLE width="100%" border="0" cellspacing="4" cellpadding="0">
            <TR>
              <TD><b>Nome:</b></TD>
              <TD><INPUT name="nome" type="text" size="40" maxlength="40" value="<?= $nome; ?>"><?= $erro1; ?></TD>
            </TR>
            <TR>
              <TD><b>E-mail</b></TD>
              <TD><INPUT name="email" type="text" id="email" size="40" maxlength="40" value="<?= $email; ?>"><?= $erro2; ?></TD>
            </TR>
            <TR>
              <TD valign="top"><b>Coment&aacute;rios</b></TD>
              <TD valign="top"><TEXTAREA name="coment" cols="50" rows="5" id="coment"><?= $coment; ?></TEXTAREA><?= $erro3; ?></TD>
            </TR>
            <TR>
              <TD>&nbsp;</TD>
              <TD><INPUT type="submit" name="Submit" value="Enviar"></TD>
            </TR>
          </TABLE>
        </FORM>
<?

}
else{

  if (!mysql_query("INSERT INTO contato VALUES (' ',
  												'$data',
												'$hora',
												'$nome',
												'$email',
												'$coment')", $conn)) {
  die(mysql_error());
  }
  else {
  echo "<script>
	function voltar(){
	location='index.php';
	}
	setTimeout('voltar()',2000);
	document.write('A Volans agradece a sua a sua colaboração !');
</script>";
  //header("location:agr_contato.php");
  }

}
  mysql_close($conn);
  ?>
