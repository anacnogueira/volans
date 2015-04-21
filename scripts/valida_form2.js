// JavaScript Document
function valida_form(url){
  var form1=document.consulta_voo_ida;
  var elem1=form1.elements;
  var chk1;
  for(var x=0; x < elem1.length; x++){
      if(elem1[x].checked==true){
        chk1=true;
      }
   }




   if(chk1==true){
    window.open(url,'detalhes','width=450, height=230');
    return true;
   }
}
