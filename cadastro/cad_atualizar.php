<? include ("../topo/topo_paginas.php"); ?>
<? include("../bd/conexao.php"); ?>
<? include("../funcoes/array_estados.php"); ?>
<? include("../funcoes/array_paises.php"); ?>
<? include("../funcoes/sessao.php"); ?>

<?
$sql = "SELECT * FROM cliente WHERE email='".$_SESSION['x_login']."'";

		$result = mysql_query($sql);
			   
 
		while($linha = mysql_fetch_array($result)) {
     	
			$x_id_cliente=$linha['id_user'];
			$x_nome=$linha['nome'];
			$x_sobrenome=$linha['sobrenome'];
			$x_cidade=$linha['cidade'];
			$x_estado=$linha['estado'];
			$x_pais=$linha['pais'];
			$x_telefone=$linha['telefone'];
			$x_email=$linha['email'];
			$x_publicidade=$linha['permite_pub'];
			$x_senha=$linha['senha'];
			}
		

?>
<table width="779" height="475" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="30" colspan="3" background="../fatias/barra_titulo_cad.gif"><table width="779" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="32">&nbsp;</td>
          <td width="195" height="25"> <p class = "tit_barra1"><strong><font color="#CCCC33">Atualizar</font></strong></p></td>
          <td width="582" valign="top"><p class = "tit_barra2">Cadastro -Atualizar</p></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td width="653" height="430"> <table width="680" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="10"> <div align="center"></div>
            <p><br>
            </p></td>
          <td>
<p>Os campos com * são obrigatórios </p>
            <div id="conteudo"> 
              <form name="atualiza" action="cad_atualizar2.php" method="post" class="form_cadastro">
			  <input type="hidden" name="key" value=<? echo "$x_id_cliente"; ?>>
                <table width="351" border="0" cellpadding="2" cellspacing="2">
                  <tr> 
                    <td width="102"><p>Nome</p></td>
                    <td width="228"><p><input type="hidden" name="nome" value="<?= $x_nome; ?>">
					                <? echo $x_nome; ?>* </p></td>
                    <td width="8">&nbsp;</td>
                  </tr>
                  <tr> 
                    <td><p>Sobrenome</p></td>
                    <td><input name="sobrenome" type="text" size="30" value="<?= $x_sobrenome; ?>">
					
                      * </td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr> 
                    <td><p>Cidade</p></td>
                    <td><input name="cidade" type="text" size="30" value="<?= $x_cidade; ?>">
                      *</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr> 
                    <td><p>Estado</p></td>
                    <td><select name="estado" size="1">
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
                    <td>&nbsp; </td>
                  </tr>
                  <tr> 
                    <td><p>Pa&iacute;s</p></td>
                    <td><select name="pais" size="1">
                        <?
            foreach($paises as $e=>$k){
               echo "<option value=\"$e\"";
               if($e==$x_pais){
                echo "selected";
                }
                 echo ">$e</option>";
                 }
                 ?>
            </select></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr> 
                    <td><p>Telefone</p></td>
                    <td><input name="telefone" type="text" id="telefone" size="30" value="<?=@$x_telefone; ?>"></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr> 
                    <td><p>E-mail</p></td>
                    <td><input name="email" type="text" id="email" size="30" value="<?= $x_email; ?>">
                      *</td>
                    <td>&nbsp;</td>
                  </tr>
                  
                  
                  
                  <tr> 
                    <td><p>Senha</p></td>
                    <td><input name="senha" type="password" id="senha2" size="30" value="<?= $x_senha; ?>">
                      *</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr> 
                    <td><p>Redigitar senha</p></td>
                    <td><input name="conf_senha" type="password" id="conf_senha" size="30" value="<?= $x_senha; ?>">
                      *</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr> 
                    <td><p>Permite envio </p>
                      <p>de publicidade?</p></td>
                    <td valign="top"><p>
                        <?
            if($x_publicidade=='s'){
            ?>
                  <input type="radio" name="publicidade"  value="s" checked>Sim
                  <input type="radio" name="publicidade" value="n">Não</td>
          <?
             } else {
          ?>
                  <input type="radio" name="publicidade"  value="s">Sim
                  <input type="radio" name="publicidade" value="n" checked>Não</td>
          <?
          }
          ?> </p></td>
                    <td valign="top"> <p>&nbsp; </p></td>
                  </tr>
                  <tr> 
                    <td><input type="hidden" name="tipo_user" value="2"></td>
                    <td><input type="submit" name="enviar" value="Enviar">
                      <input type="reset" name="limpar" value="limpar"></td>
                    <td>&nbsp; </td>
                  </tr>
                </table>
              </form>
            </div>
</td>
<td valign="bottom"><div align="right"><a href="javascript:history.back()" class="link_bordo" onMouseOver="infoLink('Voltar à página Anterior');return document.valourtrue" onMouseOut="vazio()">Voltar</a></div></td>
        </tr>
      </table></td>
    <td width="6" align="center" background="../fatias/pontilhado_vert_pag.gif">&nbsp;</td>
    <td width="80" valign="top"> <table width="80" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td> <div align="center"><a href="cad_cadastrar.php" onMouseOver="infoLink('Cadastro - Cadastrar');return document.valourtrue" onMouseOut="vazio()"><img src="cadastrar.gif" width="36" height="36" border="0"></a></div></td>
        </tr>
        <tr> 
          <td><div align="center" class="link_icones"><a href="cad_cadastrar.php" class="link_icones" onMouseOver="infoLink('Cadastro - Cadastrar');return document.valourtrue" onMouseOut="vazio()">Cadastrar</a></div></td>
        </tr>
        <tr> 
          <td height="45"align="bottom"> <div align="center"><img src="atualizar_sombra.gif" width="36" height="36" border="0"></div></td>
        </tr>
        <tr> 
          <td><div align="center"class="link_icones">Atualizar</div></td>
        </tr>
        <tr> 
          <td valign="bottom"> <div align="center"></div>
            <div align="center" class="link_icones"></div>
            <div align="center"></div>
            <div align="center" class="link_icones"></div></td>
        </tr>
      </table></td>
  </tr>
  <tr> 
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
</body>
</html>
