<? include("../bd/conexao.php"); ?>
<? @session_start(); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Volans - Companhia Aérea</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../interface/interface.css" rel="stylesheet" type="text/css">
<script language="JavaScript">
<!--
function mmLoadMenus() {
  if (window.mm_menu_0421102427_0) return;
  window.mm_menu_0421102427_0 = new Menu("root",88,18,"",12,"#333333","#FFFFFF","#CCCCCC","#006699","left","middle",3,0,1000,-5,7,true,true,true,0,true,true);
  mm_menu_0421102427_0.addMenuItem("Novo&nbsp;item");
   mm_menu_0421102427_0.hideOnMouseOut=true;
   mm_menu_0421102427_0.bgColor='#333333';
   mm_menu_0421102427_0.menuBorder=1;
   mm_menu_0421102427_0.menuLiteBgColor='#FFFFFF';
   mm_menu_0421102427_0.menuBorderBgColor='#FFFFFF';

                                                                                        window.mm_menu_0421102600_0 = new Menu("root",130,18,"",12,"#333333","#FFFFFF","#FFFFFF","#666600","left","middle",3,0,300,-5,7,true,true,true,10,false,true);
  mm_menu_0421102600_0.addMenuItem("Histórico","location='../empresa/emp_historico.php'");
  mm_menu_0421102600_0.addMenuItem("Diferenciais","location='../empresa/emp_diferenciais.php'");
  mm_menu_0421102600_0.addMenuItem("Aeronaves","location='../empresa/emp_aeronaves.php'");
  mm_menu_0421102600_0.addMenuItem("Telefones","location='../empresa/emp_telefones.php'");
   mm_menu_0421102600_0.fontWeight="bold";
   mm_menu_0421102600_0.hideOnMouseOut=true;
   mm_menu_0421102600_0.bgColor='#CCCCCC';
   mm_menu_0421102600_0.menuBorder=1;
   mm_menu_0421102600_0.menuLiteBgColor='#FFFFFF';
   mm_menu_0421102600_0.menuBorderBgColor='#CCCCCC';
    window.mm_menu_0421112339_0_1 = new Menu("Serviços&nbsp;de&nbsp;Bordo",130,18,"",12,"#333333","#FFFFFF","#FFFFFF","#999900","left","middle",3,0,300,-5,7,true,true,true,10,false,true);
    mm_menu_0421112339_0_1.addMenuItem("Alimentação","location='../servicos/ser_alimentacao.php'");
    mm_menu_0421112339_0_1.addMenuItem("Entretenimento","location='../servicos/ser_entretenimento.php'");
     mm_menu_0421112339_0_1.fontWeight="bold";
     mm_menu_0421112339_0_1.hideOnMouseOut=true;
     mm_menu_0421112339_0_1.bgColor='#CCCCCC';
     mm_menu_0421112339_0_1.menuBorder=1;
     mm_menu_0421112339_0_1.menuLiteBgColor='#FFFFFF';
     mm_menu_0421112339_0_1.menuBorderBgColor='#CCCCCC';
  window.mm_menu_0421112339_0 = new Menu("root",130,18,"",12,"#333333","#FFFFFF","#FFFFFF","#999900","left","middle",3,0,300,-5,7,true,true,true,10,false,true);
  mm_menu_0421112339_0.addMenuItem("Destinos","location='../servicos/ser_destinos.php'");
  mm_menu_0421112339_0.addMenuItem("Tripulantes","location='../servicos/ser_tripulantes.php'");
  mm_menu_0421112339_0.addMenuItem(mm_menu_0421112339_0_1,"location='#'");
  mm_menu_0421112339_0.addMenuItem("Classes","location='../servicos/ser_classes.php'");
   mm_menu_0421112339_0.fontWeight="bold";
   mm_menu_0421112339_0.hideOnMouseOut=true;
   mm_menu_0421112339_0.childMenuIcon="../arrows.gif";
   mm_menu_0421112339_0.bgColor='#CCCCCC';
   mm_menu_0421112339_0.menuBorder=1;
   mm_menu_0421112339_0.menuLiteBgColor='#FFFFFF';
   mm_menu_0421112339_0.menuBorderBgColor='#CCCCCC';
  window.mm_menu_0421113619_0 = new Menu("root",130,18,"",12,"#333333","#FFFFFF","#FFFFFF","#CCCC33","left","middle",3,0,300,-5,7,true,true,true,10,false,true);
  mm_menu_0421113619_0.addMenuItem("Cadastrar","location='../cadastro/cad_cadastrar.php'");
  mm_menu_0421113619_0.addMenuItem("Atualizar","location='../cadastro/cad_atualizar.php'");
   mm_menu_0421113619_0.fontWeight="bold";
   mm_menu_0421113619_0.hideOnMouseOut=true;
   mm_menu_0421113619_0.bgColor='#CCCCCC';
   mm_menu_0421113619_0.menuBorder=1;
   mm_menu_0421113619_0.menuLiteBgColor='#FFFFFF';
   mm_menu_0421113619_0.menuBorderBgColor='#CCCCCC';
  window.mm_menu_0421115204_0 = new Menu("root",130,18,"",12,"#333333","#FFFFFF","#FFFFFF","#669933","left","middle",3,0,300,-5,7,true,true,true,10,false,true);
  mm_menu_0421115204_0.addMenuItem("Consulta","location='../compra/com_consulta.php'");
  mm_menu_0421115204_0.addMenuItem("Promoções","location='../compra/com_promocoes.php'");
   mm_menu_0421115204_0.fontWeight="bold";
   mm_menu_0421115204_0.hideOnMouseOut=true;
   mm_menu_0421115204_0.bgColor='#CCCCCC';
   mm_menu_0421115204_0.menuBorder=1;
   mm_menu_0421115204_0.menuLiteBgColor='#FFFFFF';
   mm_menu_0421115204_0.menuBorderBgColor='#CCCCCC';
  window.mm_menu_0421145146_0 = new Menu("root",130,18,"",12,"#333333","#FFFFFF","#FFFFFF","#669966","left","middle",3,0,300,-5,7,true,true,true,10,false,true);
  mm_menu_0421145146_0.addMenuItem("Dúvidas&nbsp;Frequêntes","location='../informacoes/inf_duvidas.php'");
  mm_menu_0421145146_0.addMenuItem("Bagagens","location='../informacoes/inf_bagagens.php'");
  mm_menu_0421145146_0.addMenuItem("Aeroportos","location='../informacoes/inf_aeroportos.php'");
   mm_menu_0421145146_0.fontWeight="bold";
   mm_menu_0421145146_0.hideOnMouseOut=true;
   mm_menu_0421145146_0.bgColor='#CCCCCC';
   mm_menu_0421145146_0.menuBorder=1;
   mm_menu_0421145146_0.menuLiteBgColor='#FFFFFF';
   mm_menu_0421145146_0.menuBorderBgColor='#CCCCCC';

mm_menu_0421145146_0.writeMenus();
} // mmLoadMenus()
//-->
</script>
<script language="JavaScript" src="../mm_menu.js"></script>
<script language="JavaScript" src="../scripts/msg_status.js"></script>
</head>

<body>
<script language="JavaScript1.2">mmLoadMenus();</script>
<a name="topo"></a>
<table width="778" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td width="780"><img src="../fatias/topo_principal.jpg" width="779" height="90"></td>
  </tr>
  <tr> 
    <td bgcolor="#FFFFFF"> <table width="779" border="0" cellspacing="1" cellpadding="0">
        <tr> 
          <td width="130" height="20" bgcolor="#666600"> <div align="left"><a href="../index.php" onMouseOver="infoLink('Principal');return document.valourtrue" onMouseOut="vazio()"><img src="../fatias/i_home.gif" width="30" height="18" border="0" align="left"></a><a href="#" name="link5" id="link1" onMouseOver="MM_showMenu(window.mm_menu_0421102600_0,-38,18,null,'link5')" onMouseOut="MM_startTimeout();">A
              Empresa</a></div></td>
          <td width="130" bgcolor="#999900"> 
            <div align="center"><a href="#" name="link9" id="link2" onMouseOver="MM_showMenu(window.mm_menu_0421112339_0,-41,18,null,'link9')" onMouseOut="MM_startTimeout();">Servi&ccedil;os</a></div></td>
          <td width="130" bgcolor="#CCCC33"> 
            <div align="center"><a href="#" name="link8" id="link4" onMouseOver="MM_showMenu(window.mm_menu_0421113619_0,-41,18,null,'link8')" onMouseOut="MM_startTimeout();">Cadastro</a></div></td>
          <td width="130" bgcolor="#669933"> 
            <div align="center"><a href="#" name="link10" id="link7" onMouseOver="MM_showMenu(window.mm_menu_0421115204_0,-22,18,null,'link10')" onMouseOut="MM_startTimeout();">Compra 
              On-line</a></div></td>
          <td width="130" bgcolor="#669966"> 
            <div align="center"><a href="#" name="link3" id="link6" onMouseOver="MM_showMenu(window.mm_menu_0421145146_0,-30,19,null,'link3')" onMouseOut="MM_startTimeout();">Informa&ccedil;&otilde;es</a></div></td>
          <td bgcolor="#99CC66">
<div align="center"><a href="../contato/contato.php">Contato</a></div></td>
        </tr>
      </table></td>
  </tr>
</table>
<?
  if((isset($_SESSION['x_login'])) && (isset($_SESSION['x_senha'])))
	{
		$query="SELECT * FROM cliente WHERE email='".$_SESSION['x_login']."'";
		$result=mysql_query($query,$conn);
		while($linha=mysql_fetch_array($result)){
		$nome=$linha["nome"];
		}
		?>
<div id='top_login'><p class="branco"><b> Olá
  <?= $nome; ?>!
  &nbsp; &nbsp; &nbsp; &nbsp;</b><a href="../logout.php" class="login">Sair</a></p></div>
<? } ?>
