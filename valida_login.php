<? include("bd/conexao.php"); ?>
<? session_start(); 
$msg_erro='';


$login=$_POST['login'];
$senha=$_POST['senha'];
$incompleto=false;
$query="SELECT * FROM cliente WHERE email='$login' AND senha='$senha'";
$resultado=mysql_query($query,$conn);
$linha=mysql_num_rows($resultado);

    if($linha==0){
     $msg_erro="<font class='erro'>Usuário e/ou senha incorretos!</font>";
     $incompleto=true;
     }
	else{
	$msg_erro='';
	}
  if($incompleto==true){
  ?>
  
  <? include ("topo_principal.php"); ?>
  <script type='text/javascript' src="../scripts/valida_form.js"></script>

<table width="779" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="28" height="31" valign="top"><img src="fatias/asa_bordo.gif" width="28" height="23"></td>
    <td width="410" class="bordo">Passagens</td>
    <td width="49" align="right" valign="bottom"><img src="fatias/asa_laranja.gif" width="28" height="23"></td>
    <td width="42" valign="bottom" class="laranja">Login</td>
    <td width="250">&nbsp;</td>
  </tr>
  <tr> 
    <td height="25" colspan="5" background="fatias/aba_passagens.gif"><table width="189" height="20" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="189"> <div align="left">
              <p align="center" class="branco">Nacionais e Internacionais</p>
            </div></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td colspan="4" rowspan="2"><img src="fatias/fundo_meio_passagens.gif" width="529" height="121"></td>
    <td width="250" height="77" valign="top" bgcolor="#CCCCCC"> 

	  
	  <?  //Se o usuário estiver logado mostrar 
	  if((isset($_SESSION['x_login'])) && (isset($_SESSION['x_senha'])))
	{
		$query="SELECT * FROM cliente WHERE email='".$_SESSION['x_login']."'";
		$result=mysql_query($query,$conn);
		while($linha=mysql_fetch_array($result)){
		$nome=$linha["nome"];
		}
	  ?>
	  <table width="220" border="0" cellpadding="0" cellspacing="0">
            <tr> 
              <td height="30"></td>
              <td height="30" align="center" colspan="2"><p><b>Usu&aacute;rio Logado</b></p></td>
              
            </tr>
            <tr> 
              <td height="30"></td>
              <td height="30" align="center" colspan="2"><p><? echo $nome; ?></p></td>
            </tr>
            <tr valign="bottom"> 
              <td height="18" colspan="2"></td>
              <td height="18" align="right"><a href="logout.php" class="link2" 
			  onMouseOver="infoLink('Sair');return document.valourtrue" onMouseOut="vazio()">Sair</a></td>
            </tr>
          </table>
		  
	  <?  }  
	      else{ 
	   //Se Não mostrar ?>
        <form name="form1" method="post" action="valida_login.php">
          <table width="220" border="0" cellpadding="0" cellspacing="0">
            <tr> 
              <td height="30"> <p>E-mail:</p></td>
              <td height="30"> <input name="login" type="text" id="login" size="20" value="<?= $login; ?>"> </td>
              <td rowspan="2" valign="bottom"><input name="submit_log" type="image" src="fatias/botao_ok.gif"></td>
            </tr>
            <tr> 
              <td height="30"> <p>Senha:</p></td>
              <td height="30" valign="top"><input name="senha" type="password" size="20">
			  </td>
            </tr>
            <tr valign="bottom"> 
              <td height="18" colspan="2"><?= $msg_erro; ?> <p align="right"><a href="cadastro/cad_cadastrar.php" class="link2" 
			  onMouseOver="infoLink('Cadastre-se');return document.valourtrue" onMouseOut="vazio()">Cadastre-se</a></p></td>
              <td height="18"></td>
            </tr>
          </table>
        </form>
		<? } ?>
      </td>
  </tr>
  <tr> 
    <td class="azul"><img src="fatias/asa_azul.gif" width="28" height="23" align="absbottom">Promo&ccedil;&otilde;es</td>
  </tr>
  <tr> 
    <td height="292" colspan="5" align="right" valign="top"> 
      <table width="779" height="288" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td height="42" colspan="6" valign="top"><img src="fatias/fundo_inf_passagens.gif" width="433" height="42"></td>
          <td colspan="5" rowspan="4" valign="top"><img src="fatias/foto_promo_aba.jpg" width="346" height="185"></td>
        </tr>
        <tr> 
          <td height="28" colspan="5" class="verde"><img src="fatias/asa_verde.gif" width="28" height="23" align="absbottom">Cidades</td>
          <td width="14" rowspan="5" align="center"><div align="center"><img src="fatias/pontilhado_vert.gif" width="6" height="250" align="top"></div></td>
        </tr>
        <tr> 
          <td height="73" valign="middle"> 
            <div align="center"><img src="fatias/i_foz_do_iguaçu.jpg" width="115" height="65"></div></td>
          <td width="10" valign="middle"> 
            <div align="center"></div></td>
          <td valign="middle"> 
            <div align="center"><img src="fatias/i_natal.jpg" width="115" height="65"></div></td>
          <td width="10" valign="middle"> 
            <div align="center"></div></td>
          <td valign="middle"> 
            <div align="center"><img src="fatias/i_orlando.jpg" width="115" height="65"></div></td>
        </tr>
        <tr> 
          <td height="19" valign="top" class="link_cinza"> 
            <div align="center">Foz do Igua&ccedil;u</div></td>
          <td valign="top" class="link_cinza"> 
            <div align="center"></div></td>
          <td valign="top" class="link_cinza"> 
            <div align="center">Natal</div></td>
          <td valign="top" class="link_cinza"> 
            <div align="center"></div></td>
          <td valign="top" class="link_cinza"> 
            <div align="center">Orlando</div></td>
        </tr>
        <tr> 
          <td height="106" rowspan="2" valign="top"><p>Al&eacute;m das exuberantes 
              Cataratas, possui em seu interior outras atra&ccedil;&otilde;es 
              como a fauna.</p></td>
          <td rowspan="2" valign="top"> <p>&nbsp;</p>
            <br></td>
          <td rowspan="2" valign="top"><p>As piscinas naturais, mares cristalinos, 
              coqueirais e fal&eacute;sias, mostram que Natal tem atrativos diferentes 
              das outras cidades.</p></td>
          <td rowspan="2" valign="top"> <p>&nbsp;</p></td>
          <td rowspan="2" valign="top"><p>Universal Studios, Sea World, MGM Studios, 
            Magic Kingdom e Epcot Center, um verdadeiro playground para crian&ccedil;as 
            e adultos.</p></td>
          <td width="71" height="45" valign="bottom">
  <div align="center"><img src="fatias/i_aeronaves.gif" width="55" height="45"></div></td>
          <td width="68" valign="bottom"> <div align="center"><img src="fatias/i_classes.gif" width="55" height="45"></div></td>
          <td width="68" valign="bottom"> <div align="center"><img src="fatias/i_lista_destinos.gif" width="55" height="45"></div></td>
          <td width="68" valign="bottom"> <div align="center"><img src="fatias/i_bagagens.gif" width="55" height="45"></div></td>
          <td width="71" valign="bottom"> <div align="center"><img src="fatias/i_aeroporto.gif" width="55" height="45"></div></td>
        </tr>
        <tr> 
          <td height="28" valign="top" class="link_icones"> 
            <div align="center">Aeronaves</div></td>
          <td valign="top" class="link_icones"><div align="center">Classes</div></td>
          <td valign="top" class="link_icones"><div align="center">Lista de<br>
              Destinos</div></td>
          <td valign="top" class="link_icones"><div align="center">Bagagens</div></td>
          <td valign="top" class="link_icones"><div align="center">Aeroportos</div></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td colspan="5" bgcolor="#006699">&nbsp;</td>
  </tr>
</table>
<div id="rotas"> 
  <form name="consulta_voo" method="post" action="compra/com_resultado.php" onSubmit="return valida_form()">
    <table width="471" border="0" cellpadding="0" cellspacing="2">
      <tr> 
        <td height="24" colspan="3" valign="top"><p class="branco"><input type="radio" name="tipo_voo" value="ida">Ida</p></td>
        <td width="5%"> <p class="branco">&nbsp; </p></td>
        <td colspan="3" valign="top"><p class="branco"><input type="radio" name="tipo_voo" value="ida e volta">Ida e volta</p></td>
      </tr>
      <tr> 
        <td width="10%"><p class="branco">Origem</p></td>
        <td colspan="2"><select name="origem">
          <option value="0">Selecione a origem</option>
          <? 
	 $query="SELECT * FROM aeroporto ORDER BY cidade";
			$st = mysql_query($query, $conn);
			while ($line = mysql_fetch_array($st, MYSQL_BOTH)) {
			$x_origem=$line['cidade']." ".$line['estado']."(".$line['id_aeroporto'].")";
   			echo "<option value='".$x_origem."'>".$x_origem."</option>";
   
   }
	 
	 ?>
        </select></td>
        <td align="left">&nbsp; </td>
        <td width="16%" align="left" nowrap> <p class="branco">Data da ida </p></td>
        <td width="10%" align="left"><select name="dia_ida">
            <?
	  for($i=1;$i<32;$i++){
	   if (strlen ($i)<2) $i="0".$i;
	  echo "<option value=$i";
	   if($i==date('d')){
	  	echo " selected";
		}
	  echo ">$i</option>";
	  }
	  ?>
          </select> </td>
        <td><select name="mes_ida">
            <?
	  $meses = array (1=> "Janeiro",
					  2=> "Fevereiro",
					  3=> "Março",
					  4=> "Abril",
                      5=> "Maio",
                      6=> "Junho",
                      7=> "Julho",
                      8=> "Agosto",
					  9=> "Setembro",
                      10=> "Outubro",
                      11=> "Novembro",
                      12=> "Dezembro");
 for($i=1;$i<13;$i++){
 echo "<option value=$i";
 if($i==date('n')){
  echo " selected";
 }
  echo ">$meses[$i]</option>";
 }
	  ?>
          </select></td>
      </tr>
      <tr> 
        <td height="27"><p class="branco">Destino</p></td>
        <td colspan="2"><select name="destino">
            <option>Selecione o destino</option>
            <? 
	 $query="SELECT * FROM aeroporto ORDER BY cidade";
			$st = mysql_query($query, $conn);
			while ($line = mysql_fetch_array($st, MYSQL_BOTH)) {
			$x_destino=$line['cidade']." ".$line['estado']."(".$line['id_aeroporto'].")";
   			echo "<option value='".$x_destino."'>".$x_destino."</option>";
   
   }
	 
	 ?>
          </select></td>
        <td align="left" bordercolor="0">&nbsp; </td>
        <td align="left" nowrap> <p class="branco">Data da volta </p></td>
        <td align="left"><select name="dia_volta">
          <?
	  for($i=1;$i<32;$i++){
	   if (strlen ($i)<2) $i="0".$i;
	  echo "<option value=$i";
	  if($i==date('d')){
	  	echo " selected";
		}
	  echo ">$i</option>";
	  }
	  ?>
        </select></td>
        <td width="31%"><select name="mes_volta">
            <?
	   for($i=1;$i<13;$i++){
 echo "<option value=$i";
 if($i==date('n')){
  echo " selected";
 }
  echo ">$meses[$i]</option>";
 }
	  ?>
          </select></td>
      </tr>
      <tr> 
        <td height="27" colspan="7"> <table width="473" border="0" cellspacing="0" cellpadding="0">
            <tr> 
              <td width="48" height="32"> <p class="branco">Adultos</p></td>
              <td width="52"><select name="adultos">
                  <?
	  for($i=1;$i<7;$i++){
	  echo "<option value=$i>$i</option>";
	  }
	  ?>
                </select></td>
              <td width="117"><p class="branco">Crian&ccedil;as (at&eacute; 1 
                  ano)</p></td>
              <td width="56"><select name="criancas1">
                  <?
	  for($i=0;$i<7;$i++){
	  echo "<option value=$i>$i</option>";
	  }
	  ?>
                </select></td>
              <td width="131"><p class="branco">Crian&ccedil;as (2 a 11 anos)</p></td>
              <td width="69"><select name="criancas2">
                  <?
	  for($i=0;$i<7;$i++){
	  echo "<option value=$i>$i</option>";
	  }
	  ?>
                </select></td>
            </tr>
          </table></td>
      </tr>
      <tr> 
        <td colspan="6">&nbsp; </td>
        <td align="center"> <input type="submit" name="Submit" value="&nbsp;&nbsp;ok&nbsp;&nbsp;"> 
        </td>
      </tr>
    </table>
  </form>
</div>
</body>
</html>
<?
  
  }
  else{
  $x_login = mysql_result($resultado, 0, "email"); 
  $x_senha = mysql_result($resultado, 0, "senha");
  
  //GRAVA AS VARIÁVEIS NA SESSÃO 
$_SESSION['x_login'] = $x_login; 
$_SESSION['x_senha'] = $x_senha; 
header("Location: index.php");
  }

?>
