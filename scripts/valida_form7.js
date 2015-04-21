function valida_form(){
d=document.valida_radio;
d=document.valida_radio2;
if((document.valida_radio.ida.checked) && (document.valida_radio2.volta.checked))
{
	window.open('lista_detalhes_voo2.php','detalhes','width=450, height=230');
	return true;
}
}
