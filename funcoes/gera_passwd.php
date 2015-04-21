<?
function gera_passwd(){
$sConso = 'bcdfghjklmnpqrstvwxyzbcdfghjklmnpqrstvwxyz'; 
$sVogal = 'aeiou';
$sNum = '123456789'; 
$passwd = '';

$y = strlen($sConso)-1; //conta o nº de caracteres da variável $sConso
$z = strlen($sVogal)-1; //conta o nº de caracteres da variável $sVogal
$r = strlen($sNum)-1; //conta o nº de caracteres da variável $sNum

for($x=0;$x<=1;$x++)
{
$rand = rand(0,$y); //Funçao rand() - gera um valor randômico
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
