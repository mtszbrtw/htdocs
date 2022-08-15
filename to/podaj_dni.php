<?php

//$dwatyg = time()+1209600;//od tetaz;
$jedendzien = 0;

$i =0;

date_default_timezone_set('Europe/Warsaw');


$nazwadnia = ["nd","pon","wt","śr","czw","pt","sob"];

while($i < 14){
    
    $d = date("d",time()+$jedendzien);
    $m = date("m",time()+$jedendzien);
    $D = $nazwadnia[date("w",time()+$jedendzien)];
    
    
    $dwa[] = $d.".".$m."-".$D;
    $jedendzien = $jedendzien + 86400;
    $i++;
}

echo json_encode($dwa);

//data z serwera bo eslo kyos mialby pzestawiona date do przodu na js to usunelobymi ogloszena z wczesniejszych dni bo planuje aby ogloszenia ktore noe zosaly podjete usuwaly sie auto
// jesli ktos dodaje ze szuka i pokaze sie ze jest taka oferta to moze dodac 0omimo yo bo moze noe chce z n8m jechac


/*
 
 

*/

       
        
       
        
?>