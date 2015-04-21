<?
//Insere data do voo
      include("add_dia.php");
      $query1="SELECT * FROM voo_dia_semana
               ORDER BY id_dia_semana DESC
               limit 0,1;";
      $query2="SELECT * FROM voo_dia_semana,voo,aeronaves
               WHERE voo_dia_semana.id_voo=voo.id_voo AND
               voo.id_aeronave=aeronaves.id_Aeronave;";
      $result1=mysql_query($query1,$conn) or die(mysql_error());
      while($linha1=mysql_fetch_array($result1)){
      $id_dia_semana=$linha1["id_dia_semana"];
      $de=$linha1["de"];
      $dia_semana=$linha1["dia_semana"];
       echo "dia da semana: $dia_semana<br>";
      
      $result2=mysql_query($query2,$conn) or die(mysql_error());
      while($linha2=mysql_fetch_array($result2)){
      $assentos_disp=$linha2["capacidade"];

      
      for($i=0;$i<=6;$i++){
      $data_dia=$dia_semana{$i};
      if($data_dia!="0"){
        $data=add_dia($de,$i);
       $query3="INSERT INTO voo_data VALUES('',
                                            '$id_dia_semana',
                                            '$data',
                                            '$assentos_disp');";
       $result3=mysql_query($query3,$conn) or die(mysql_error());
        
       }
       

	header("Location: lista_voo_diasemana.php");
   }  }}
?>