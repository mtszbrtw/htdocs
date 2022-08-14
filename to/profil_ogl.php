<?php
session_start();



$nick = $_SESSION["nick"];



require_once("../con.php");


if(isset($_POST["ile_zwykle"])){
    
    
    $q_ilosc = "SELECT `id` FROM `zwykle_ogloszenia` WHERE `miejsce_pracy` = '".$_POST["miejsce_pracy_profil"]."' AND `kto`='".$nick."'";
    
       $m = mysqli_query($con,$q_ilosc);
   
    $ile = mysqli_num_rows($m);
    
    echo $ile;
    

}elseif(isset($_POST["ile"])){
    
    
    
    if($_POST["miejsce_pracy_profil"] == "skodakv"){
        
         
    $q_ilosc = "SELECT `id` FROM `ogloszenia` WHERE `kto`='".$nick."'";
        
    }else{
        
        $tabela = $_POST["miejsce_pracy_profil"]."_ogloszenia";
        
    $q_ilosc = "SELECT id FROM ".$tabela." WHERE kto = '".$nick."'";
        
    }
    
 
    
    $m = mysqli_query($con,$q_ilosc);
   
    $ile = mysqli_num_rows($m);
    
    echo $ile;
    
}elseif(isset($_GET["usun"])){
    
   $id = $_GET['usun'];
   $znalazl = $_GET["znalazl"];
   
   if(isset($_GET["miejsce_pracy"])){
   
   $tabela = $_GET["miejsce_pracy"]."_archiwum";
   $tabela2 = $_GET["miejsce_pracy"]."_ogloszenia";
   
    $q_arch = "INSERT INTO `".$tabela."` SELECT * FROM `".$tabela2."` WHERE `id`='".$id."'";
    
   
    
    $m = mysqli_query($con,$q_arch);
 
 
 
 if($m){
     
 if(mysqli_query($con,"UPDATE `".$tabela."` SET `znalazl`='".$znalazl."',`usunieto` = NOW() WHERE `id`='".$id."'")){
     
     
    
     $q_usun_ogl = "DELETE FROM `".$tabela2."` WHERE `id`='".$id."'";
    
    $b_usun_ogl = mysqli_query($con,$q_usun_ogl);
     
     
    if($b_usun_ogl){
        
        $odp = "ok";
    }else{
        
        $odp = "delete";
    }
     
   }else{
       
       $odp = "update";
   }
 }else{
     
     $odp = "insert";
 }
    
    
 
   }else{
       
    
       
       
       
       $q_arch = "INSERT INTO `archiwum` SELECT * FROM `ogloszenia` WHERE `id`='".$id."'";
       
      
       
       $m = mysqli_query($con,$q_arch);
 


 
 
 if($m){
     
 if(mysqli_query($con,"UPDATE `archiwum` SET `znalazl`='".$znalazl."',`usunieto` = NOW() WHERE `id`='".$id."'")){
     
     
     $q_usun_ogl = "DELETE FROM `ogloszenia` WHERE `id`='".$id."'";

    $b_usun_ogl = mysqli_query($con,$q_usun_ogl);
     
     
    if($b_usun_ogl){
        
        $odp = "ok2";
    }else{
        
        $odp = "delete2";
    }
     
   }else{
       
       $odp = "update2";
   }
 }else{
     
     $odp = "insert2";
 }
       
   }
 
 
 
 
 echo json_encode($odp);

}else if(isset($_GET["usun_zwykle"])){
    
    
   
      $id = $_GET['usun_zwykle'];
      $znalazl = $_GET["znalazl"];
   
      $q_arch = "INSERT INTO `zwykle_archiwum` SELECT * FROM `zwykle_ogloszenia` WHERE `id`='".$id."'";
    
   
    
       $m = mysqli_query($con,$q_arch);
 
 
 
 if($m){
 
 
 if(mysqli_query($con,"UPDATE `zwykle_archiwum` SET `znalazl`='".$znalazl."',`usunieto` = NOW() WHERE `id`='".$id."'")){
     
     
     $q_usun_ogl = "DELETE FROM `zwykle_ogloszenia` WHERE `id`='".$id."'";

    $b_usun_ogl = mysqli_query($con,$q_usun_ogl);
     
     
    if($b_usun_ogl){
        
        $odp = "ok";
    }else{
        
        $odp = "delete2";
    }
     
   }else{
       
       $odp = "update2";
   }
 }else{
     
     $odp = "insert2";
 }
       
   
 
 echo json_encode($odp);
 
    

}else if(isset($_GET["pokaz"])){
    
    
    
    if($_GET["miejsce_pracy_profil"] == "skodakv"){
        
         
    $q_ilosc = "SELECT * FROM `ogloszenia` WHERE `kto`='".$nick."' ORDER BY `dodano` DESC";
        
    }else{
        
        $tabela = $_GET["miejsce_pracy_profil"]."_ogloszenia";
        
   $q_ilosc = "SELECT * FROM `".$tabela."` WHERE `kto`='".$nick."' ORDER BY `dodano` DESC";
    }
    
    

    
    $m = mysqli_query($con,$q_ilosc);

    while($row = mysqli_fetch_assoc($m)){
        $array[]= $row;
    }
    
    echo json_encode($array,JSON_UNESCAPED_UNICODE);
    
}else if(isset($_GET["zwykle_pokaz"])){
    
    
       $q_ilosc = "SELECT * FROM `zwykle_ogloszenia` WHERE `kto`='".$nick."' AND `miejsce_pracy` = '".$_GET["miejsce_pracy_profil"]."' ORDER BY `dodano` DESC";
       
        $m = mysqli_query($con,$q_ilosc);

    while($row = mysqli_fetch_assoc($m)){
        $array[]= $row;
    }
    
    echo json_encode($array,JSON_UNESCAPED_UNICODE);
    
    
}else if(isset($_GET["pokaz_edit"])){
    
    $id=$_GET["pokaz_edit"];
    
    $q_edytuj="SELECT * FROM `ogloszenia` WHERE `kto`='".$nick."' AND `id`='".$id."'";
     
    $baza = mysqli_query($con,$q_edytuj);
    
    while($row = mysqli_fetch_assoc($baza)){
        $array[] = $row;
    }
    
    echo json_encode($array,JSON_UNESCAPED_UNICODE);
    
}elseif(isset($_GET["zwykle_edytuj"])){
    
     $id = $_GET["id"];
    $miejsc = $_GET["miejsc"];
    $dni = $_GET["dni"];
    $zmiana = $_GET["zmiana"];
    $trasa = $_GET["trasa"];
    $ak = $_GET["ak"];
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
        
     $dnibaza = " `dzien`='".$dni[0]."', `dzien2`='".$dni[1]."', `dzien3`='".$dni[2]."', `dzien4`='".$dni[3]."'";
        
    }elseif($iledni == 3){
        
    $dnibaza = " `dzien`='".$dni[0]."', `dzien2`='".$dni[1]."', `dzien3`='".$dni[2]."', `dzien4`=''";
        
    }elseif($iledni == 2){
        
     $dnibaza = " `dzien`='".$dni[0]."', `dzien2`='".$dni[1]."', `dzien3`='', `dzien4`=''";
        
    }elseif($iledni == 1){
        
      $dnibaza = " `dzien`='".$dni[0]."', `dzien2`='', `dzien3`='', `dzien4`=''";
    }
    
   
    
    $q_edytuj = "UPDATE `zwykle_ogloszenia` SET `miejsc`='".$miejsc."', `zmiana`='".$zmiana."', `trasa`='".$trasa."', `tresc`='".$tresc."',".$dnibaza.", `auto`='".$auto."', `dodano` = NOW() WHERE `id`='".$id."' LIMIT 1";
    
        
    
    
    if(mysqli_query($con,$q_edytuj)){
        $odp = "ok";
    }else{
        $odp = "nie";
    }
    
    echo json_encode($odp,JSON_UNESCAPED_UNICODE);
    
}elseif(isset($_GET["edytuj"])){
    
    $id = $_GET["id"];
    $miejsc = $_GET["miejsc"];
    $dni = $_GET["dni"];
    $zmiana = $_GET["zmiana"];
    $trasa = $_GET["trasa"];
    $ak = $_GET["ak"];
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
        
     $dnibaza = " `dzien`='".$dni[0]."', `dzien2`='".$dni[1]."', `dzien3`='".$dni[2]."', `dzien4`='".$dni[3]."'";
        
    }elseif($iledni == 3){
        
    $dnibaza = " `dzien`='".$dni[0]."', `dzien2`='".$dni[1]."', `dzien3`='".$dni[2]."', `dzien4`=''";
        
    }elseif($iledni == 2){
        
     $dnibaza = " `dzien`='".$dni[0]."', `dzien2`='".$dni[1]."', `dzien3`='', `dzien4`=''";
        
    }elseif($iledni == 1){
        
      $dnibaza = " `dzien`='".$dni[0]."', `dzien2`='', `dzien3`='', `dzien4`=''";
    }
    
    if(isset($_GET["miejsce_pracy"])){
        
        $miejce_pracy = $_GET["miejsce_pracy"]."_ogloszenia";
        
            $q_edytuj = "UPDATE `".$miejce_pracy."` SET `miejsc`='".$miejsc."', `zmiana`='".$zmiana."', `trasa`='".$trasa."', `miejsce_pracy` ='".$_GET["miejsce_pracy"]."', `tresc`='".$tresc."',".$dnibaza.", `auto`='".$auto."', `dodano` = NOW() WHERE `id`='".$id."' LIMIT 1";
      
    }else{
        
        
        
          if(is_array($ak)){
    $ak = implode(",",$ak);
    }
    
    $q_edytuj = "UPDATE `ogloszenia` SET `miejsc`='".$miejsc."', `zmiana`='".$zmiana."', `trasa`='".$trasa."', `ak` ='".$ak."', `tresc`='".$tresc."',".$dnibaza.", `auto`='".$auto."', `dodano` = NOW() WHERE `id`='".$id."' LIMIT 1";
    
        
    }
    
    if(mysqli_query($con,$q_edytuj)){
        $odp = "ok";
    }else{
        $odp = "nie";
    }
    
    echo json_encode($odp);
    
}elseif(isset($_GET["archiwum"])){
    
    
    if(isset($_GET["miejsce_pracy"])){
        
        $tabela = $_GET["miejsce_pracy"]."_archiwum";
        
        $q_arch_pokaz = "SELECT * FROM `".$tabela."` WHERE `kto` = '".$nick."' order by `usunieto` DESC";
        
    }else{
    
    $q_arch_pokaz = "SELECT * FROM `archiwum` WHERE `kto` = '".$nick."' order by `usunieto` DESC";
    }
    
    
    $b_arch_pokaz = mysqli_query($con,$q_arch_pokaz);
    
    while($row = mysqli_fetch_assoc($b_arch_pokaz)){
        $tab[] = $row;
    }
    
    echo json_encode($tab,JSON_UNESCAPED_UNICODE);
    
    
}elseif(isset($_GET["zwykle_archiwum"])){
    
    
    $q_arch_pokaz = "SELECT * FROM `zwykle_archiwum` WHERE `kto` = '".$nick."' AND `miejsce_pracy` = '".$_GET["miejsce_pracy"]."' order by `usunieto` DESC";
    
    
    
    $b_arch_pokaz = mysqli_query($con,$q_arch_pokaz);
    
    while($row = mysqli_fetch_assoc($b_arch_pokaz)){
        $tab[] = $row;
    }
    
    echo json_encode($tab,JSON_UNESCAPED_UNICODE);
    
    
}elseif(isset($_GET["dod_pon"])){
    
    $id = $_GET["id"];
    $miejsc = $_GET["miejsc"];
    $dni = $_GET["dni"];
    $zmiana = $_GET["zmiana"];
    $trasa = $_GET["trasa"];
    $ak = $_GET["ak"];
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
    
    //normalny insert na danych ktore dostalem i odp ok pozniej zamykam i aktalizuje 
    
if(isset($_GET["miejsce_pracy"])){ 
    
    $tabela = $_GET["miejsce_pracy"]."_ogloszenia";
    $tabela2 = $_GET["miejsce_pracy"]."_archiwum";
    
    $q_ile_ogl = "SELECT `id` FROM `".$tabela."` WHERE `kto` ='".$nick."'";

$b_ile_ogl = mysqli_query($con,$q_ile_ogl);

if(mysqli_num_rows($b_ile_ogl) < 3){
    
$nach = mt_rand().mt_rand(2,time())."_".$_GET["miejsce_pracy"];
    
$q_dod_ogl = "INSERT INTO `".$tabela."` (`id`, `dodano`, `kto`, `zmiana`, `trasa`, `miejsc`, `czas`, `miejsce_pracy`, `dzien`, `dzien2`, `dzien3`, `dzien4`, `auto`, `tresc`, `znalazl`) VALUES ('".$nach."', NOW(), '".$nick."', '".$zmiana."', '".$trasa."', '".$miejsc."', '', '".$ak."', ".$dnibaza.", '".$auto."', '".$tresc."', '')";

//4 dni dodano 

$q_usun_arch = "DELETE FROM `".$tabela2."` WHERE `id` ='".$id."'";
$b_usun_arch = mysqli_query($con,$q_usun_arch);

    
    if(mysqli_query($con,$q_dod_ogl)){
      echo json_encode("dodano");
    }else{
        echo json_encode("lipa");
    }
    
    
}else{
    echo json_encode("duzo");
    
}
    
    
}else{
    
    if(is_array($ak)){
    $ak = implode(",",$ak);
}
    
$q_ile_ogl = "SELECT `id` FROM `ogloszenia` WHERE `kto` ='".$nick."'";

$b_ile_ogl = mysqli_query($con,$q_ile_ogl);

if(mysqli_num_rows($b_ile_ogl) < 3){
    

    
$q_dod_ogl = "INSERT INTO `ogloszenia` (`id`, `dodano`, `kto`, `zmiana`, `trasa`, `miejsc`, `czas`, `ak`, `dzien`, `dzien2`, `dzien3`, `dzien4`, `auto`, `tresc`, `znalazl`) VALUES (NULL, NOW(), '".$nick."', '".$zmiana."', '".$trasa."', '".$miejsc."', '', '".$ak."', ".$dnibaza.", '".$auto."', '".$tresc."', '')";

//4 dni dodano 

$q_usun_arch = "DELETE FROM `archiwum` WHERE `id` ='".$id."'";
$b_usun_arch = mysqli_query($con,$q_usun_arch);

    
    if(mysqli_query($con,$q_dod_ogl)){
      echo json_encode("dodano");
    }else{
        echo json_encode("lipa");
    }
    
    
}else{
    echo json_encode("duzo");
    
}
    
    
}

}elseif(isset($_GET["zwykle_dod_pon"])){
    
    
    $id = $_GET["id"];
    $miejsc = $_GET["miejsc"];
    $dni = $_GET["dni"];
    $zmiana = $_GET["zmiana"];
    $trasa = $_GET["trasa"];
    
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
    
    //normalny insert na danych ktore dostalem i odp ok pozniej zamykam i aktalizuje 

    
    $tabela = $_GET["miejsce_pracy"]."_ogloszenia";
    $tabela2 = $_GET["miejsce_pracy"]."_archiwum";
    
    $q_ile_ogl = "SELECT `id` FROM `zwykle_ogloszenia` WHERE `kto` ='".$nick."' AND `miejsce_pracy` = '".$_GET["miejsce_pracy"]."'";

$b_ile_ogl = mysqli_query($con,$q_ile_ogl);

if(mysqli_num_rows($b_ile_ogl) < 3){
    
$nach = mt_rand().mt_rand(3,time())."_".$_GET["miejsce_pracy"];
    
$q_dod_ogl = "INSERT INTO `zwykle_ogloszenia` (`id`, `dodano`, `kto`, `zmiana`, `trasa`, `miejsc`, `czas`, `miejsce_pracy`, `dzien`, `dzien2`, `dzien3`, `dzien4`, `auto`, `tresc`, `znalazl`) VALUES ('".$nach."', NOW(), '".$nick."', '".$zmiana."', '".$trasa."', '".$miejsc."', '', '".$_GET["miejsce_pracy"]."', ".$dnibaza.", '".$auto."', '".$tresc."', '')";

//4 dni dodano 

$q_usun_arch = "DELETE FROM `zwykle_archiwum` WHERE `id` ='".$id."'";
$b_usun_arch = mysqli_query($con,$q_usun_arch);

    
    if(mysqli_query($con,$q_dod_ogl)){
      echo json_encode("dodano");
    }else{
        echo json_encode("lipa");
    }
    
    
}else{
    echo json_encode("duzo");
    
}
    
    
 
    
}elseif(isset($_GET["ile_arch"])){
    
    
    if(isset($_GET["miejsce_pracy"])){
        
        $tabela = $_GET["miejsce_pracy"]."_archiwum";
        
        $q_ile_arch = "SELECT `id` FROM `".$tabela."` WHERE `kto`='".$nick."'";
        
    }else{
    
    $q_ile_arch = "SELECT `id` FROM `archiwum` WHERE `kto`='".$nick."'";
}
    
    $b_ile_arch = mysqli_query($con,$q_ile_arch);
    
    $ile = mysqli_num_rows($b_ile_arch);
    
    echo $ile;
    
}elseif(isset($_GET["zwykle_ile_arch"])){

$q_ile_arch = "SELECT `id` FROM `zwykle_archiwum` WHERE `kto`='".$nick."' AND `miejsce_pracy` = '".$_GET["miejsce_pracy"]."'";

    
    $b_ile_arch = mysqli_query($con,$q_ile_arch);
    
    $ile = mysqli_num_rows($b_ile_arch);
    
    echo $ile;

}

//radio dpjazdy cos hak open f


// jeslo zaloze konto to niepamietam zeby same mi sie pola wypelnaly przy lohowaniu mtszbrtw
/// BUG jesli usune konto i zrobir a te fane konto yo nie tworzy mi sesji
// jeslo zaloze jakiekolwiek konto to przy pierwsxym logowaniu nie tworzy zmiennych sesujnych
//albo po wylogowaniu nie robi sesji

//przelofowywanie kozna zalatwic tak ze przy logowaniu odsypa do innego skryptu php ktory sprawdza czy jest sesja 

mysqli_close($con);

?>

