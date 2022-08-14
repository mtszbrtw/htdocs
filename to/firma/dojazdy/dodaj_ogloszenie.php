<?php
session_start();

require_once("../../../con.php");


$miejsc = $_GET["miejsc"];
$dni = $_GET["dni"];
$miejsce_pracy = $_GET["miejsce_pracy"];
$trasa = $_GET["trasa"];
$kto = $_SESSION["nick"];
$zmiana = $_GET["zmiana"];
$tresc = filtruj($con,$_GET["tresc"]);
$auto = $_GET["auto"];


$coords = json_decode($_GET["coords"],JSON_UNESCAPED_UNICODE);



if(!$coords['lat']){
    
    $city = explode(",",$trasa);
       $city = $city[0];
       
       
       $curl = curl_init("https://nominatim.openstreetmap.org/search?city=".$city."&format=json&limit=1");

        $userAgent = 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.2 (KHTML, like Gecko) Chrome/22.0.1216.0 Safari/537.2';
curl_setopt( $curl, CURLOPT_USERAGENT, $userAgent );
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, false);
       $result = json_decode(curl_exec($curl));
        curl_close($curl);
       

       
      
      $coords = [
          'lat' => $result[0]->lon,
          'lon' => $result[0]->lat
          ];
}


if(is_array($trasa)){
    $trasa = implode(",",$trasa);
}

if(is_array($zmiana)){
    $zmiana = implode(",",$zmiana);
}

$dni = explode(",",$dni);



    $iledni = count($dni);
    
    
    
    if($iledni == 4){
        
     $dnibaza = "'".$dni[0]."','".$dni[1]."','".$dni[2]."','".$dni[3]."'";
        
    }elseif($iledni == 3){
        
    $dnibaza = "'".$dni[0]."','".$dni[1]."','".$dni[2]."', ''";
        
    }elseif($iledni == 2){
        
     $dnibaza = "'".$dni[0]."','".$dni[1]."', '', ''";
        
    }elseif($iledni == 1){
        
      $dnibaza = "'".$dni[0]."', '', '', ''";
    }




//teraz trzeba sprawdzic ile ogloszen ma dany uzytkownik ustalmy ze moze miec 3 

    
    $rad = mt_rand().mt_rand(2,time())."_".$miejsce_pracy;
    
    
    
$q_dod_ogl = "INSERT INTO `zwykle_ogloszenia` (`id`, `dodano`, `kto`, `zmiana`, `trasa`, `miejsc`, `czas`, `miejsce_pracy`, `dzien`, `dzien2`, `dzien3`, `dzien4`, `auto`, `tresc`, `znalazl`,  `geo`) VALUES ('".$rad."', NOW(), '".$kto."', '".$zmiana."', '".$trasa."', '".$miejsc."', '', '".$miejsce_pracy."', ".$dnibaza.", '".$auto."', '".$tresc."', '','".json_encode($coords,JSON_UNESCAPED_UNICODE)."')";

//4 dni dodano 
    
    if(mysqli_query($con,$q_dod_ogl)){
       echo "dodano";
       

    }else{
        echo "lipa";
    }
    

    
    

?>