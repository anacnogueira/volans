<?
function conversor($entradata){
   $conv1 = explode("-",$entradata);
   $conv2 = array_reverse($conv1);
   $saidata = implode("/",$conv2);
   return $saidata;
}
?>