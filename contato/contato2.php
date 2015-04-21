<? include ("../topo/topo_paginas.php"); ?>
<? include ("../bd/conexao.php");
   @session_start();
?>
<script language="JavaScript" src="../../scripts/valida_form.js"></script>
<? 
 $nome=$_POST["nome"];
  $email=$_POST["email"];
  $coment=$_POST["coment"];
  $incompleto=false;

  $data = date("Y-m-d");
  $hora = date("H:i:s");
  $novadata = substr($data,8,2) . "/" .substr($data,5,2) . "/" . substr($data,0,4);
  $novahora = substr($hora,0,2) . "h" .substr($hora,3,2) . "min";

if($nome==''){
	$erro1="<font class='erro'> - Preencha este campo com seu nome</font>";
	$incompleto=true;
	}
	else{
	$erro1='';
	}
if($email==''){
	$erro2="<font class='erro'> - Preencha este campo com o seu e-mail</font>";
	$incompleto=true;
	}
	else{
	$erro2='';
	}	
if($coment==''){
	$erro3="<font class='erro'> - Por favor, deixe a sua mensagem aqui!</font>";
	}
	else{
	$erro3='';
	}
if($incompleto==true){
?>
<table width="779" height="295" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="30" colspan="3" background="../fatias/barra_titulo_cont.gif"><table width="779" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="32">&nbsp;</td>
          <td width="195" height="25"> <p class = "tit_barra1"><strong><font color="#99CC66">Contato</font></strong></p></td>
          <td width="582" valign="top"><p class = "tit_barra2">Contato</p></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td width="653" height="257"> 
      <table width="680" height="242" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="51">&nbsp;</td>
          <td><p>Se voc&ecirc; tiver alguma d&uacute;vida, cr&iacute;tica, sugest&atilde;o 
              ou elogio, escreva para a Equipe da Volans. Basta preencher o formul&aacute;rio 
              abaixo:<br>
            </p>
            </td>
        </tr>
        <tr> 
          <td width="10" height="191"> 
            </td>
          <td> <FORM action="contato2.php" method="post" name="form1" class="form_compra">
              <TABLE width="612" border="0" cellspacing="4" cellpadding="0">
                <TR> 
                  <TD width="12%"><b>Nome:</b></TD>
                  <TD width="46%"><INPUT name="nome" type="text" size="40" maxlength="40" value="<?= $nome; ?>"> 
                  </TD>
                  <TD width="42%"> 
                    <?= $erro1; ?>
                  </TD>
                </TR>
                <TR> 
                  <TD><b>E-mail</b></TD>
                  <TD><INPUT name="email" type="text" id="email" size="40" maxlength="40" value="<?= $email; ?>"> 
                  </TD>
                  <TD> 
                    <?= $erro2; ?>
                  </TD>
                </TR>
                <TR> 
                  <TD valign="top"><b>Coment&aacute;rios</b></TD>
                  <TD valign="top"><TEXTAREA name="coment" cols="30" rows="5" id="coment"><?= $coment; ?></TEXTAREA> 
                  </TD>
                  <TD valign="top"> 
                    <?= $erro3; ?>
                  </TD>
                </TR>
                <TR> 
                  <TD>&nbsp;</TD>
                  <TD><div align="right"> 
                      <INPUT type="submit" name="Submit" value="Enviar">&nbsp;&nbsp;&nbsp;
                    </div></TD>
                  <TD>&nbsp;</TD>
                </TR>
              </TABLE>
            </FORM></td>
        </tr>
      </table>
      <div align="right">&nbsp;</div></td>
    <td width="6" align="center">&nbsp;</td>
    <td width="80" valign="top"> <table width="80" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td> <div align="center"></div></td>
        </tr>
        <tr> 
          <td><div align="center"></div></td>
        </tr>
        <tr> 
          <td height="45" valign="bottom"> <div align="center"></div></td>
        </tr>
        <tr> 
          <td><div align="center" ></div></td>
        </tr>
      </table></td>
  </tr>
  
      <? include ("../barra_inferior.php"); ?>
</table>
</body>
</html>
<?

}
else{

	
	
		$_SESSION['contato']['nome']=$nome;
        $_SESSION['contato']['email']=$email;
		$_SESSION['contato']['coment']=$coment;
		$_SESSION['contato']['data']=$data;
		$_SESSION['contato']['hora']=$hora;
		
		//echo "<p>".$_SESSION['contato']['data']."<p>";
		//echo "<p>".$_SESSION['contato']['hora']."</p>";
		
		echo "<script>
       window.location='contato_confirmar.php';
		</script>";


/*
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

} */
}
  ?>
