<? include ("../topo/topo_paginas.php"); ?>
<? include("../funcoes/array_estados.php"); ?>
<? include("../funcoes/array_paises.php"); ?>
<table width="779" height="434" border="0" cellpadding="0" cellspacing="0">
  <tr> 
    <td height="30" colspan="3" background="../fatias/barra_titulo_cad.gif"><table width="779" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="32">&nbsp;</td>
          <td width="195" height="25"> <p class = "tit_barra1"><strong><font color="#CCCC33">Cadastrar</font></strong></p></td>
          <td width="582" valign="top"><p class = "tit_barra2">Cadastro - Cadastrar</p></td>
        </tr>
      </table></td>
  </tr>
  <td width="34"><tr> 
    <td width="653" height="430"> <table width="680" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="10"> <div align="center"></div>
            <p><br>
            </p></td>
          <td>
<p>Os campos com * são obrigatórios </p>
            <div id="conteudo"> 
              <form name="cadastro" action="cad_cadastrar2.php" method="post" class="form_cadastro">
                <table width="600" border="0" cellpadding="2" cellspacing="2">
                  <tr> 
                    <td width="102"><p>Nome</p></td>
                    <td width="420"><input name="nome" type="text" size="30">
                      * </td>
                    <td width="8">&nbsp;</td>
                  </tr>
                  <tr> 
                    <td><p>Sobrenome</p></td>
                    <td><input name="sobrenome" type="text" size="30">
                      * </td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr> 
                    <td><p>Cidade</p></td>
                    <td><input name="cidade" type="text" size="30">
                      *</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr> 
                    <td><p>Estado</p></td>
                    <td><select name="estado" size="1">
                        <?
            foreach($estados as $e=>$k){
               echo "<option value=\"$e\"";
               if($k==1){
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
               if($k==1){
                echo "selected";
                }
                 echo ">$e</option>";
                 }
                 ?></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr> 
                    <td><p>Telefone</p></td>
                    <td><input name="telefone" type="text" id="telefone2" size="30"></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr> 
                    <td><p>E-mail</p></td>
                    <td><input name="email" type="text" id="email2" size="30">
                      *</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr> 
                    <td><p>Sexo</p></td>
                    <td><p>
                        <input name="sexo" type="radio" value="m" checked>
                        Masculino 
                        <input name="sexo" type="radio"  value="f">
                        Feminino</p></td>
                    <td> <p>&nbsp; </p></td>
                  </tr>
                  <tr> 
                    <td><p>RG</p></td>
                    <td><p><input name="rg" type="text" id="rg2" size="30"  maxlength="9">
                      * somente números</p></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr> 
                    <td><p>CPF</p></td>
                    <td><p><input name="cpf" type="text" id="cpf2" size="30" maxlength="11">
                      * somente números</p></td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr> 
                    <td><p>Senha</p></td>
                    <td><input name="senha" type="password" id="senha2" size="30">
                      *</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr> 
                    <td><p>Redigitar senha</p></td>
                    <td><input name="conf_senha" type="password" id="conf_senha" size="30">
                      *</td>
                    <td>&nbsp;</td>
                  </tr>
                  <tr> 
                    <td><p>Permite envio </p>
                      <p>de publicidade?</p></td>
                    <td valign="top"><p>
                        <input type="radio" name="publicidade" value="s" checked>
                        Sim 
                        <input type="radio" name="publicidade" value="n">
                        N&atilde;o </p></td>
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
      </table>
    <td width="1" align="left" valign="bottom" background="../fatias/pontilhado_vert_pag.gif">&nbsp;</td>
    <td width="744" valign="top"> <table width="84" border="0" align="left" cellpadding="0" cellspacing="0">
        <tr> 
          <td width="84"> <div align="center"><img src="cadastrar_sombra.gif" width="36" height="36"></div></td>
        </tr>
        <tr> 
          <td><div align="center" class="link_icones">Cadastrar</div></td>
        </tr>
        <tr> 
          <td height="45" valign="bottom"> <div align="center"><a href="cad_atualizar.php" onMouseOver="infoLink('Cadastro - Atualizar');return document.valourtrue" onMouseOut="vazio()"><img src="atualizar.gif" width="36" height="36" border="0"></a></div></td>
        </tr>
        <tr> 
          <td><div align="center" ><a href="cad_atualizar.php" class="link_icones" onMouseOver="infoLink('Cadastro - Atualizar');return document.valourtrue" onMouseOut="vazio()">Atualizar</a></div>
            <div align="center"></div></td>
        </tr>
      </table></td>
  </tr>
  <? include ("../barra_inferior.php"); ?>
</table>
</table>
</body>
</html>
