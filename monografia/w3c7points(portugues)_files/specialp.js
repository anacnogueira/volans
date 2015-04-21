
var loc
var newwind
function go(loc,newwind){
	if(newwind != "new"){
		self.location="http://www."+loc
	}else{
		loc="http://www."+loc
		window.open(loc,"","width=760,height=500,screenX=20,screenY=20,left=20,top=20,toolbar,menubar,status,resizable,scrollbars,location")
	}
}



var loc
var newwind
function godir(loc,newwind){
	if(newwind != "new"){
		self.location="http://"+loc
	}else{
		loc="http://"+loc
		window.open(loc,"","width=760,height=500,screenX=20,screenY=20,left=20,top=20,toolbar,menubar,status,resizable,scrollbars,location")
	}
}



function owframes(centroW,esqW){
parent.left.location.href
=esqW;
parent.body.location.href=centroW;
}




function wopf(centro2,esq2){
window.open(centro2, 'body');
parent.left.location. href=esq2;
}


function xframecheck()       {var awqtr = 'awqqtr';
       }


function framecheck()
       {var parentframe = 'frindex.html';

       if (parent.location.href == self.location.href)
        	{var current = window.self.location.pathname;
            window.location.replace (parentframe + '?' + current);      
            }
       };


function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}


function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}


function MM_preloadImages() { //v3.0
 var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
   var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
   if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}


function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}


function fwLoadMenus() {;

  if (window.fw_menu_0) return;
  window.fw_menu_0 = new Menu("root",125,18,"Verdana, Arial, Helvetica, sans-serif",11,"#ffffff","#ffffff","#000000","#f77d18");
  fw_menu_0.addMenuItem("Benefícios","wopf('beneficios.asp','leftbar.asp')");
  fw_menu_0.addMenuItem("Mapa do Site","wopf('indice.asp','leftbar.asp')");
   fw_menu_0.hideOnMouseOut=true;

    window.fw_menu_1_4 = new Menu("Gerência de Laptops e PCs",88,18,"Verdana, Arial, Helvetica, sans-serif",11,"#ffffff","#ffffff","#000000","#f77d18");
    fw_menu_1_4.addMenuItem("Software",   "wopf('solutions_detail05a.asp','leftbar.asp')");
    fw_menu_1_4.addMenuItem("Inventário", "wopf('solutions_detail05b.asp','leftbar.asp')");
    fw_menu_1_4.addMenuItem("Subscrições","wopf('solutions_detail05c.asp','leftbar.asp')");
    fw_menu_1_4.addMenuItem("Migrações",  "wopf('solutions_detail05d.asp','leftbar.asp')");
     fw_menu_1_4.hideOnMouseOut=true;

    window.fw_menu_1_5 = new Menu("Gerência de Servidores",175,18,"Verdana, Arial, Helvetica, sans-serif",11,"#ffffff","#ffffff","#000000","#f77d18");
    fw_menu_1_5.addMenuItem("Software","wopf('solutions_detail06a.asp','leftbar.asp')");
    fw_menu_1_5.addMenuItem("Conteúdo","wopf('solutions_detail06b.asp','leftbar.asp')");
    fw_menu_1_5.addMenuItem("Inventário","wopf('solutions_detail06c.asp','leftbar.asp')");
    fw_menu_1_5.addMenuItem("Módulos de Integração","wopf('solutions_detail06d.asp','leftbar.asp')");
    fw_menu_1_5.addMenuItem("Windows Terminal Services","wopf('solutions_detail06e.asp','leftbar.asp')");
     fw_menu_1_5.hideOnMouseOut=true;

    window.fw_menu_1_6 = new Menu("Documentação técnica e Relatórios",218,18,"Verdana, Arial, Helvetica, sans-serif",11,"#ffffff","#ffffff","#000000","#f77d18");
    fw_menu_1_6.addMenuItem("Diferencial Marimba","top.location='http://www.amtechs.com/index_files/diferencialmarimba.html';");
    fw_menu_1_6.addMenuItem("Inventário","top.location='http://www.amtechs.com/index_files/wpinventario.html';");
    fw_menu_1_6.addMenuItem("Migração Sistemas Operacionais","top.location='http://www.amtechs.com/index_files/migrsistoper.html';");
    fw_menu_1_6.addMenuItem("Gerenciamento Servidores","top.location='http://www.amtechs.com/index_files/conteudoservidores.html';");
    fw_menu_1_6.addMenuItem("Gerenciamento Centralizado Farms","top.location='http://www.amtechs.com/index_files/GerenciamentoCentralizado.html';");
    fw_menu_1_6.addMenuItem("Requisitos - Solução Corporativa","top.location='requisitos_solucao.html';");
    fw_menu_1_6.addMenuItem("Informações Técnicas","top.location='informacoes_tecnicas.html';");
    fw_menu_1_6.addMenuItem("FAQ - Perguntas frequentes","top.location='http://www.amtechs.com/index_files/faq.html';");
     fw_menu_1_6.hideOnMouseOut=true;

    window.fw_menu_1_7 = new Menu("Demonstração da Solução",175,18,"Verdana, Arial, Helvetica, sans-serif",11,"#ffffff","#ffffff","#000000","#f77d18");
    fw_menu_1_7.addMenuItem("PCs, notebooks, handhelds",   "wopf('demo_desktops.asp','leftbar.asp')");
    fw_menu_1_7.addMenuItem("Servidores distribuidos", "wopf('demo_servidores.asp','leftbar.asp')");
     fw_menu_1_7.hideOnMouseOut=true;

  window.fw_menu_1 = new Menu("root",229,18,"Verdana, Arial, Helvetica, sans-serif",11,"#ffffff","#ffffff","#000000","#f77d18");
  fw_menu_1.addMenuItem("Gerência de Hardware e Software","wopf('solutions_stream01.asp','leftbar.asp')");
  fw_menu_1.addMenuItem("Migração de Sistemas Operacionais","wopf('solutions_stream02.asp','leftbar.asp')");
  fw_menu_1.addMenuItem("Informação de utilização de licenças","wopf('solutions_stream03.asp','leftbar.asp')");
  fw_menu_1.addMenuItem("Instalação de Patches de Segurança","wopf('solutions_stream04.asp','leftbar.asp')");
  fw_menu_1.addMenuItem(fw_menu_1_4,"wopf('solutions_stream05.asp','leftbar.asp')");
  fw_menu_1.addMenuItem(fw_menu_1_5,"wopf('solutions_stream06.asp','leftbar.asp')");
  fw_menu_1.addMenuItem(fw_menu_1_6,"wopf('wp.asp','leftbar.asp')");
  fw_menu_1.addMenuItem(fw_menu_1_7,"wopf('demos.html','leftbar.asp')");

   fw_menu_1.hideOnMouseOut=true;
   fw_menu_1.childMenuIcon="images/arrows.gif";

  window.fw_menu_2 = new Menu("root",125,18,"Verdana, Arial, Helvetica, sans-serif",11,"#ffffff","#ffffff","#000000","#f77d18");
  fw_menu_2.addMenuItem("Oportunidades","wopf('programa_parcerias_01.html','leftbar.asp')");
  fw_menu_2.addMenuItem("Venda Integral","wopf('programa_parcerias_02.html','leftbar.asp')");
  fw_menu_2.addMenuItem("Tecnologia","wopf('parceiros_tecnologia.html','left_parceiros_tecnologia.asp')");
   fw_menu_2.hideOnMouseOut=true;
   fw_menu_2.childMenuIcon="images/arrows.gif";

  window.fw_menu_3 = new Menu("root",171,18,"Verdana, Arial, Helvetica, sans-serif",11,"#ffffff","#ffffff","#000000","#f77d18");
  fw_menu_3.addMenuItem("Perfil da Empresa","wopf('company_profile.asp','leftbar.asp')");
  fw_menu_3.addMenuItem("Oportunidades de Trabalho","wopf('Oportunidades_carreira.html','leftbar.asp')");
  fw_menu_3.addMenuItem("Logos","wopf('logo.asp','leftbar.asp')");
   fw_menu_3.hideOnMouseOut=true;
   fw_menu_3.childMenuIcon="images/arrows.gif";


  window.fw_menu_4 = new Menu("root",90,18,"Verdana, Arial, Helvetica, sans-serif",11,"#ffffff","#ffffff","#000000","#f77d18");
  fw_menu_4.addMenuItem("Notícias","wopf('news.asp','leftbar.asp')");
  fw_menu_4.addMenuItem("Eventos","wopf('events.asp','leftbar.asp')");
  fw_menu_4.addMenuItem("Clientes","wopf('clientes_Marimba.html','leftbar.asp')");
  fw_menu_4.addMenuItem("Links","wopf('visitas.html','leftbar.asp')");
   fw_menu_4.hideOnMouseOut=true;

  fw_menu_4.writeMenus();
} // fwLoadMenus()

