<?php
session_start();

require_once("../con.php");

$nick = $_SESSION["nick"];

if(isset($_GET["auto"])){
    
    if($_GET["auto"] == "ile"){
        
    $q_czy_posiada = "SELECT `dodal` FROM `auto` WHERE `dodal` ='".$nick."'";
    $b_czy_posiada = mysqli_query($con,$q_czy_posiada);
    $row = mysqli_num_rows($b_czy_posiada);
    
    if($row == 3){
        echo json_encode("duzo");
    }else{
        echo json_encode("ok");
    }
    
        
    }elseif($_GET["auto"] == "czy"){
    
    $q_czy_posiada = "SELECT `dodal` FROM `auto` WHERE `dodal` ='".$nick."'";
    $b_czy_posiada = mysqli_query($con,$q_czy_posiada);
    $row = mysqli_num_rows($b_czy_posiada);
    
    
    
   if($row == "0"){
        
        echo json_encode("0");
        
    }else{
    
        
        $q_pokaz = "SELECT * FROM `auto` WHERE `dodal` ='".$nick."'";
        $b_pokaz = mysqli_query($con,$q_pokaz);
        
        
        
        while($row = mysqli_fetch_assoc($b_pokaz)){
            $tab[] = $row;
        }
        
        echo json_encode($tab);
        
    }
    
    }elseif($_GET["auto"] == "wybrane"){
        
        $q_wybrane = "SELECT * FROM `auto` WHERE `dodal` ='".$nick."'";
        $b_wybrane = mysqli_query($con,$q_wybrane);
        
        if(mysqli_num_rows($b_wybrane) == 0){
        
        echo json_encode("0");
        
        }else{
            
        while($row = mysqli_fetch_assoc($b_wybrane)){
            $tab[] = $row;
        }
    
        
        echo json_encode($tab);
        }
        
    }elseif($_GET["auto"] == "dodaj"){
       
  $q_czy_posiada = "SELECT `dodal` FROM `auto` WHERE `dodal` ='".$nick."'";
    $b_czy_posiada = mysqli_query($con,$q_czy_posiada);
    $row = mysqli_num_rows($b_czy_posiada);
    
       
       if($row < 3){
       
        $marka = filtruj($con,$_GET["marka"]);
        $model = filtruj($con,$_GET["model"]);
        $kolor = filtruj($con,$_GET["kolor"]);
        $typ = filtruj($con,$_GET["typ"]);
        $dwa = filtruj($con,$_GET["dwa"]);
        
           
        $q_auto_dodaj = "INSERT INTO `auto` (`id`,`marka`,`model`,`kolor`,`typ`,`dodal`,`dwie_ost`,`wybrane`) VALUES (NULL, '".$marka."', '".$model."', '".$kolor."', '".$typ."', '".$nick."', '".$dwa."','1')";
        
       
        
       
       
       if($row == 0){
 $b_auto_dodaj = mysqli_query($con,$q_auto_dodaj);
 if($b_auto_dodaj){
            $odp = "dodano";
            echo json_encode($odp);
        }
        
     }elseif($row > 0){
         
         //trzeba w tym dodac wybrane 1 a w pozostalych edytowac na 0 zeby ten najnowszy byl tym wybranym
         
         $q_akt_wybr = "UPDATE `auto` SET `wybrane` = '0' WHERE `dodal` = '".$nick."'";
         
        $b_akt_wybr =  mysqli_query($con,$q_akt_wybr);
       
       if($b_akt_wybr){
 $b_auto_dodaj = mysqli_query($con,$q_auto_dodaj);
         if($b_auto_dodaj){
                $odp = "dodano";
                echo json_encode($odp);
               }
       }
     }
     
       }elseif($row == 3){
           echo json_encode("duzo");
       }
  
    }elseif($_GET["auto"] == "usun"){
        
        if(isset($_GET["usun_info"])){
            
            $id = $_GET["usun_info"];
            
            $q_usun_info = "SELECT * FROM `auto` WHERE `id`='".$id."'";
            
            $b_usun_info = mysqli_query($con,$q_usun_info);
            
            while($row = mysqli_fetch_assoc($b_usun_info)){
                $tab[] = $row;
            }
            
            echo json_encode($tab);
            
        }elseif(isset($_GET["usun_tak"])){
            
         $id = $_GET["usun_tak"];
            
         $q_usun = "DELETE FROM `auto` WHERE `id` = '".$id."'";
         
         $b_usun = mysqli_query($con,$q_usun);
         
 $q_czy_posiada = "SELECT `dodal` FROM `auto` WHERE `dodal` ='".$nick."'";
    $b_czy_posiada = mysqli_query($con,$q_czy_posiada);
    $row = mysqli_num_rows($b_czy_posiada);
    
    
    if($row == 1){
        //to ustawia jedyny jako wybrany 
        
   $q_akt_wybr = "UPDATE `auto` SET `wybrane` = '1' WHERE `dodal` = '".$nick."'";
    $b_akt_wybr =  mysqli_query($con,$q_akt_wybr);
        
        
    }
         
         if($b_usun){
             echo json_encode("del");
         }
            
        }
        
    }elseif($_GET["auto"] == "edytuj"){
        
        $id = $_GET["id"];
        $marka = filtruj($con,$_GET["marka"]);
        $model = filtruj($con,$_GET["model"]);
        $kolor = filtruj($con,$_GET["kolor"]);
        $typ = $_GET["typ"];
        $dwa = filtruj($con,$_GET["dwa"]);
        
        $q_edytuj = "UPDATE `auto` SET `marka` = '".$marka."', `model` = '".$model."', `kolor` = '".$kolor."', `typ` = '".$typ."', `dwie_ost` = '".$dwa."' WHERE `id` = '".$id."'";
        
       $b_edytuj = mysqli_query($con,$q_edytuj);
       
       if($b_edytuj){
           echo json_encode("edytowano");
       }
        
    }elseif($_GET["auto"] == "wybierz"){
        
        $id = $_GET["id"];
        
        $q_zmien_wybr = "UPDATE `auto` SET `wybrane` = '0' WHERE `dodal`='".$nick."' AND `id` !='".$id."'";
        if(mysqli_query($con,$q_zmien_wybr)){
            
            $q_zmien_wybr2 = "UPDATE `auto` SET `wybrane` = '1' WHERE `id` = '".$id."'";
            $b_zmien_wybr2 = mysqli_query($con,$q_zmien_wybr2);
            
            if($b_zmien_wybr2){
                echo json_encode("wybrano");
            }
            
        }
    }
    
}




?>