// JavaScript Document
function valida_form(){
erro="A data de volta n�o pode ser anterior a data de ida"
d=document.consulta_voo;
if ((!d.tipo_voo[0].checked) && (!d.tipo_voo[1].checked)){
alert("Escolha a op��o de somente ida ou ida e volta");
return false;
}


if(d.origem.value==0){
alert("Escolha a origem");
return false;
}
if(d.destino.value==0){
alert("Escolha o destino");
return false;
}
if(d.origem.value==d.destino.value){
alert("A origem n�o pode ser igual ao destino")
return false;
}

  if(d.criancas1.value>d.adultos.value){
  alert("O n�mero de crian�as de colo deve ser menor ou igual ao n�mero de adultos");
  return false;
  }
if(d.tipo_voo[1].checked==true){
	if((d.dia_ida.value==d.dia_volta.value) && (d.mes_ida.value==d.mes_volta.value)){
	st=confirm("A data de ida � igual a a de volta, Deseja continuar?")	
		if (!st) {
		return false;
    	}
  	}

 if(d.dia_volta.value<d.dia_ida.value && d.mes_volta.value==d.mes_ida.value){
 alert(erro); 
  return false;
  }
  
  if (d.mes_volta.value<d.mes_ida.value){
  alert(erro); 
  return false;  
  }
  


}
 


return true;
}
