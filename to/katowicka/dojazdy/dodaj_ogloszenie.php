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

$q_ile_ogl = "SELECT `id` FROM `kato_ogloszenia` WHERE `kto` ='".$kto."'";

$b_ile_ogl = mysqli_query($con,$q_ile_ogl);

if(mysqli_num_rows($b_ile_ogl) < 3){
    
    $rad = mt_rand().mt_rand(2,time())."_kato";

    
$q_dod_ogl = "INSERT INTO `kato_ogloszenia` (`id`, `dodano`, `kto`, `zmiana`, `trasa`, `miejsc`, `czas`, `miejsce_pracy`, `dzien`, `dzien2`, `dzien3`, `dzien4`, `auto`, `tresc`, `znalazl`) VALUES ('".$rad."', NOW(), '".$kto."', '".$zmiana."', '".$trasa."', '".$miejsc."', '', '".$miejsce_pracy."', ".$dnibaza.", '".$auto."', '".$tresc."', '')";

//4 dni dodano 



    
    if(mysqli_query($con,$q_dod_ogl)){
       echo "dodano";
       

    }else{
        echo "lipa";
    }
    

    
    
}else{
    
    echo "duzo";
    
}


?>