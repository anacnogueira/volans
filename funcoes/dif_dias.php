<?
//funcao diferença entre dias
function diferenca_dias($de,$ate){
list($de_ano,$de_mes,$de_dia) = explode("-",$de);
list($ate_ano,$ate_mes,$ate_dia)= explode("-",$ate);

$de_data=mktime(0,0,0,$de_mes,$de_dia,$de_ano);
$ate_data=mktime(0,0,0,$ate_mes,$ate_dia,$ate_ano);

$dias=($ate_data - $de_data)/86400;

return ceil($dias);

}

?>
