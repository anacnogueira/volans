<?
  include("../funcoes/array_estados.php")
  
  ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Documento sem t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="cadastro/interface.css" rel="stylesheet" type="text/css"> 
</head>

<body>
<div id="geral">
<div id="titulo">Cadastro de clientes</div>
Os campos com * são obrigatórios
  <div id="conteudo"> 
    <form name="cadastro" action="insere_cadastro.php" method="post">
      <table border="0" cellpadding="2" cellspacing="2">

		
        <tr> 
          <td>Nome</td>
          <td><input type="text" name="sobrenome">* </td>
        </tr>
        
		  <tr> 
          <td>Sobrenome</td>
          <td><input type="text" name="nome">* </td>
        </tr>
      
           <tr> 
          <td>Cidade</td>
          <td><input type="text" name="cidade">*</td>
        </tr>
        <tr> 
          <td>Estado</td>
          <td> <select name="estado" size="1">
              <?
            foreach($estados as $e=>$k){
               echo "<option value=\"$e\"";
               if($k==1){
                echo "selected";
                }
                 echo ">$e</option>";
                 }
                 ?>
            </select> </td>
        </tr>
        <tr> 
          <td>Pais</td>
          <td><input name="pais" type="text" id="pais" size="3" maxlength="3">
            *</td>
        </tr>
        <tr> 
          <td>Telefone</td>
          <td><input name="telefone" type="text" id="telefone"></td>
        </tr>
        <tr> 
          <td>E-mail</td>
          <td><input name="email" type="text" id="email">*</td>
        </tr>
        <tr> 
          <td>Sexo</td>
          <td> 
           <input name="sexo" type="radio" value="m" checked>
            Masculino 
            <input name="sexo" type="radio"  value="f">
            Feminino</td>
          
          </td>
         
        </tr>
        <tr> 
          <td>RG</td>
          <td><input name="rg" type="text" id="rg"  maxlength="9">
            *</td>
        </tr>
        <tr> 
          <td>CPF</td>
          <td><input name="cpf" type="text" id="cpf" size="11" maxlength="11">
            *</td>
        </tr>
        <tr> 
          <td>senha</td>
          <td><input name="senha" type="password" id="senha">
            *</td>
        </tr>
        <tr> 
          <td>redigitar senha</td>
          <td><input name="conf_senha" type="password" id="senha">
            *</td>
        </tr>
        <tr> 
          <td>Permite envio de publicidade?</td>
          <td><input type="radio" name="publicidade" value="s" checked>
            Sim 
            <input type="radio" name="publicidade" value="n">
            N&atilde;o </td>
        </tr>
        <tr> 
          <td><input type="hidden" name="tipo_user" value="2"></td>
          <td><input type="submit" name="enviar" value="Enviar"> <input type="reset" name="limpar" value="limpar"></td>
        </tr>
      </table>
	  
      </form>
</div>
</div>
</body>
</html>
