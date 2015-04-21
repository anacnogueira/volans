<?
//Função para adicionar x dias a uma data

function add_dia($data,$qtde_dias){

$ano=substr($data,0,4);
$mes=substr($data,5,2);
$dia=substr($data,8,2);

  while($qtde_dias>0){
     $tira=0;
     $dia_ant=$dia;
     $max_dia=date('t',strtotime($ano.$mes.$dia));
     $dia+=$qtde_dias;
     if($dia>$max_dia){
       $dia=1;
       $mes++;
       $tira=1;
       if($mes>12){
         $mes=1;
         $ano++;
         }
       $qted_dias=$qtde_dias-($max_dia-$dia_ant)-$tira;
       }
       else{
       $qtde_dias=0;
       }
       if (strlen ($dia)<2) $dia="0".$dia; 
       if (strlen ($mes)<2) $mes="0".$mes;
      }
      return ($ano."-".$mes."-".$dia);
}

 ?>
