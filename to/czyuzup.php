<?php
session_start();
    
    
    
    $login = $_SESSION['nick'];
    
    //najpierw reszta danych czy ma imie, miasto, fabryke 
    //nr tel
    
if(isset($_GET["imie"])){
    
    require_once("../con.php");
    
    $imie = filtruj($con,$_GET["imie"]);
    $nr_tel = filtruj($con,$_GET["nr_tel"]);
    $miasto = filtruj($con,$_GET["miasto"]);
  

    
    $q_uzup = "UPDATE `Ouser` SET `imie` = '".$imie."', `nr_tel` = '".$nr_tel."', `miasto` = '".$miasto."' WHERE `nick` = '".$login."'";
    $b_uzup = mysqli_query($con,$q_uzup);
    
    if($b_uzup){
        return true;
    }
    
}
?>
