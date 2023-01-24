<?php
  
    // original string
$OriginalString = "0-304L/2B-0.40X767";
      
    // Without optional parameter NoOfElements
$a=explode("-",$OriginalString,3);
$b = substr($a[2],0,4);
$c = floatval($b);
$d = "";
if($c<0.5){
      $d = "000";
}elseif ($c<=1) {
      $d = "001";
}else {
      $d="002";
}
// $e=explode("-",$OriginalString,3);
$e=substr($a[2],4);
$hasil = $a[0]."-".$a[1]."-".$d.$e;
print_r($hasil);

// $e = 0;
// print_r($a);
// print_r($b);
// print_r($c);
// print_r($d);
// print_r($e[0]);

//     print_r(explode("-",$OriginalString,3));
    // with positive NoOfElements
//     print_r(explode(" ",$OriginalString,3));
//     // with negative NoOfElements
//     print_r(explode(" ",$OriginalString,-1));
      
?>