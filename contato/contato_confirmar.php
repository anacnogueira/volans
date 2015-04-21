<? include("../bd/conexao.php");   ?>
<? include ("../topo/topo_paginas.php"); ?>
<? @session_start(); ?>
<table width="779" height="475" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="30" colspan="3" background="../fatias/barra_titulo_cont.gif"><table width="779" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="32">&nbsp;</td>
          <td width="195" height="25"> <p class = "tit_barra1"><strong><font color="#99CC66">Contato</font></strong></p></td>
          <td width="582" valign="top"><p class = "tit_barra2">Contato - Confirmar 
              contato</p></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td width="653" height="430" valign="top"> <table width="680" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="10"> </td>
          <td><p>Por favor, confirme seus dados<br>
              <br>
            </p>
             <form name="cadastro" action="contato_confirmar.php" method="post" class="form_contato">
                
              <table width="580" border="0" cellpadding="2" cellspacing="2">
                <tr> 
                  <td width="99"><p>Nome</p></td>
                  <td width="70"><p> 
                      <?= $_SESSION['contato']['nome']; ?>
                    </p></td>
                  <td></td>
                </tr>
                <tr> 
                  <td><p>Email</p></td>
                  <td><p> 
                      <?= $_SESSION['contato']['email']; ?>
                    </p></td>
                  <td></td>
                </tr>
                <tr> 
                  <td valign="top">
<p>Comentario</p></td>
                  <td><p> 
                      <?= $_SESSION['contato']['coment']; ?>
                    </p></td>
                  <td></td>
                </tr>
                <tr> 
                  <td></td>
                  <td colspan="2"> <div align="left">
                      <input type="button" name="voltar" value="Voltar" onClick="javascript:  window.location='contato.php';">
                      <input type="submit" name="submit" value="Confirmar">
                    </div></td>
                </tr>
              </table>
              </form>
            </div>
</td>
        </tr>
      </table>
      <div align="right"></div></td>
    <td width="6" align="center">&nbsp;</td>
    <td width="80" valign="top"> <table width="80" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td> <div align="center"></div></td>
        </tr>
        <tr> 
          <td><div align="center" class="link_icones"></div></td>
        </tr>
        <tr> 
          <td height="45" valign="bottom"> <div align="center"></div></td>
        </tr>
        <tr> 
          <td><div align="center" ></div></td>
        </tr>
        <tr> 
          <td valign="bottom"> <div align="center"></div>
            <div align="center" class="link_icones"></div>
            <div align="center"></div>
            <div align="center" class="link_icones"></div></td>
        </tr>
      </table></td>
  </tr>
    <? include ("../barra_inferior.php"); ?>
</table>
</body>
</html>
<?
if(isset($_POST["submit"])){
$result=mysql_query("INSERT INTO contato VALUES (
	   '', 
	   '".$_SESSION['contato']['data']     ."',
	   '".$_SESSION['contato']['hora']."',
	   '".$_SESSION['contato']['nome']   ."',
       '". $_SESSION['contato']['email']  ."',
	   '".$_SESSION['contato']['coment']     ."'
	    );", $conn)or die(mysql_error());
	 
	  @session_unset();
      @session_destroy();
	  

echo "<script>
        alert('Mensagem enviada!');
        window.location='../home.php';
        </script>";
		}
		mysql_close($conn);
?>

