function valida_form(url){
var form1=document.valida_radio_ida
var form2=document.valida_radio_volta
var elem1=form1.elements
var elem2=form2.elements;
var chk2;
var chk1;
for(var x=0; x < elem1.length; x++){
 if(elem1[x].checked==true){
 chk1=true;
 else
 alert('Preencha ida');
 }

}

for(var y=0; y < elem2.length; y++){
if(elem2[y].checked==true){
 chk2=true;
 }

}

if(chk1==true  && chk2==true){
    window.open('lista_detalhes_voo2.php','detalhes','width=450, height=230');
    return true;

}
}
