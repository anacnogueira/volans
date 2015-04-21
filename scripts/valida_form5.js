// JavaScript Document
function valida_form(form){
var elem=form.elements;
for(var x=0; x < elem.length; x++){
if(elem[x].type.indexOf("text")==0 || elem[x].type.indexOf("password")==0 || elem[x].type.indexOf("select")==0){
if(elem[x].value < 1){
alert("Por favor, preencha o campo "+elem[x].id);
elem[x].focus();
return false;
}
}
else{
grupoelem = form[elem[x].name];
if (grupoelem && grupoelem.length){
chkd = false;
for(var c=0; c < grupoelem.length; c++){
if(grupoelem[c].checked==true){
chkd = true;
break
}
}
if(chkd==false){
alert("Por favor, preencha o campo "+elem[x].name);
elem[x].focus();
return false;
}
}
}
}

}
