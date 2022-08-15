<?php
session_start();

require_once("../con.php");
$nick = $_SESSION["nick"];

if(isset($_GET["opinie"])){
    
    
    if($_GET["opinie"] == "tobie"){
        
        $q_tobie = "SELECT * FROM `opinie` WHERE `komu` = '".$nick."'";
        $b_tobie = mysqli_query($con,$q_tobie);
        
        while($row = mysqli_fetch_assoc($b_tobie)){
            $tab[] = $row;
        }
        
        echo json_encode($tab);
        
    }elseif($_GET["opinie"] == "pokaz_op"){
        
        $id = $_GET["id"];
        
        $q_pokaz_op = "SELECT `tresc` FROM `opinie` WHERE `id` = '".$id."'";
        
        $b_pokaz_op = mysqli_query($con,$q_pokaz_op);
        $row = mysqli_fetch_assoc($b_pokaz_op);
        echo $row["tresc"];
        
    }elseif($_GET["opinie"] == "pokaz_odp"){
        
        $odp_id = $_GET["id"];
        
        $q_pokaz_odp = "SELECT `tresc` FROM `opinie_odp` WHERE `id` = '".$odp_id."'";
        
        $b_pokaz_odp = mysqli_query($con,$q_pokaz_odp);
        $row = mysqli_fetch_assoc($b_pokaz_odp);
        echo $row["tresc"];
        
    }elseif($_GET["opinie"] == "dodaj_odp"){
        
        $id = $_GET["id"];
        $tresc = $_GET["tresc"];
        
        $q_dodaj_odp = "INSERT INTO `opinie_odp` (`id`,`tresc`) VALUES ('".$id."', '".$tresc."')";
        $b_dodaj_odp = mysqli_query($con,$q_dodaj_odp);
        if($b_dodaj_odp){
           
           $q_akt_op = "UPDATE `opinie` SET `odp` = '".$id."' WHERE `id` = '".$id."'";
           
           $b_akt_op = mysqli_query($con,$q_akt_op);
           
           if($b_akt_op){
               echo json_encode("dodano");
           }
            
        }
        
    }elseif($_GET["opinie"] == "usun_odp"){
        
        $id = $_GET["id"];
        

       $q_usun_odp = "DELETE FROM `opinie_odp` WHERE `id` = '".$id."'";
        
       $b_usun_odp = mysqli_query($con,$q_usun_odp);
       
       if($b_usun_odp){
           
            $q_akt_op = "UPDATE `opinie` SET `odp` = '0' WHERE `id` = '".$id."'";
           
           $b_akt_op = mysqli_query($con,$q_akt_op);
           
           if($b_akt_op){
               echo json_encode("del");
           }
            

        
       }
        
    }elseif($_GET["opinie"] == "edytuj"){
        
        $id = $_GET["id"];
        $tresc = $_GET["tresc"];
        
        $q_edytuj_odp = "UPDATE `opinie_odp` SET `tresc` = '".$tresc."' WHERE `id` = '".$id."'";
        $b_edytuj_odp = mysqli_query($con,$q_edytuj_odp);
        
        if($b_edytuj_odp){
            echo json_encode("ed");
        }
        
    }elseif($_GET["opinie"] == "twoje"){
        
    }
    
    
}



?>