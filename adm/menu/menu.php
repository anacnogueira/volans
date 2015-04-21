<? include ("../conexao.php"); ?>
<table width="100%" border="0">
  <tr>
    <td width="31%">Seja Bem vindo, <? echo $_SESSION['x_nome']; ?></td>
    <td width="54%"><a href="../logout.php">sair</a></td>
    <td width="15%"><a href="../index.php">Home</a></td>
  </tr>
</table>


<table width="100%" border="0" align="center">
  <tr> 
    <?
$query="SELECT prioridade FROM administrador WHERE nome='".$_SESSION['x_nome']."'";
$resultado=mysql_query($query);
$x_resultado = @mysql_result($resultado, 0, 'prioridade'); 
if($x_resultado==1){
?>
    <td width="16%"><center>
        <b> <a href="../administrador/lista_administrador.php">Administrador</a></b>
</center></td>
    <td width="14%"><center>
        <b> <a href="../aeronave/lista_aeronave.php">Aeronaves</a></b>
</center></td>
<?
}
?>
    <td width="14%"><center>
        <b> <a href="../aeroporto/lista_aeroporto.php">Aeroportos</a></b> 
      </center></td>
    <td width="14%"><center>
        <b> <a href="../clientes/lista_clientes.php">Clientes</a></b> 
      </center></td>
    <td width="14%"><center>
        <b> Contato</b></center></td>
    <td width="14%"><center>
        <b> <a href="../reserva/lista_reserva.php">Reserva</a></b> 
      </center></td>
    <td width="14%"><center>
        <b> <a href="../voo/lista_voo.php">Voo</a></b> 
      </center></td>
  </tr>
</table>

