
<?
 //Criado em 15/02/2005
/* Calcula tempo de voo   */

    function calc_chegada($partida,$tempo){
    
    
        $aux=split(":",$partida);
		$p=mktime($aux[0],$aux[1],$aux[2]);

		$aux=split(":",$tempo);
		$t=$aux[0]*3600+$aux[1]*60+$aux[2];
		
		$c=strftime("%H:%M:%S",$p+$t);
		//echo "$p<br>";
		//echo "$t<br>";
         // echo $t+$p . "<br>";
        //echo "$c<br>";
		
		return $c;
    }

 function calc_espera($chegada,$partida){
    
    
        $aux=split(":",$chegada);
		$c=mktime($aux[0],$aux[1],$aux[2]);

		$aux=split(":",$partida);
		$p=$aux[0]*3600+$aux[1]*60+$aux[2];
		
		$e=strftime("%H:%M:%S",$c-$p);
		//echo "$p<br>";
		//echo "$t<br>";
         // echo $t+$p . "<br>";
        //echo "$c<br>";
		
		return $e;
    }


?>


