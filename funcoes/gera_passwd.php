<?
function gera_passwd(){
$sConso = 'bcdfghjklmnpqrstvwxyzbcdfghjklmnpqrstvwxyz'; 
$sVogal = 'aeiou';
$sNum = '123456789'; 
$passwd = '';

$y = strlen($sConso)-1; //conta o n� de caracteres da vari�vel $sConso
$z = strlen($sVogal)-1; //conta o n� de caracteres da vari�vel $sVogal
$r = strlen($sNum)-1; //conta o n� de caracteres da vari�vel $sNum

for($x=0;$x<=1;$x++)
{
$rand = rand(0,$y); //Fun�ao rand() - gera um valor rand�mico
$rand1 = rand(0,$z); 
$rand2 = rand(0,$r); 
$str = substr($sConso,$rand,1); // substr() - retorna parte de uma string
$str1 = substr($sVogal,$rand1,1); 
$str2 = substr($sNum,$rand2,1);

$passwd .= $str.$str1.$str2; 
} 
return $passwd;


}

?>
