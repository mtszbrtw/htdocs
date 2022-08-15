<?php

session_start();

require_once("../con.php");


if(isset($_GET["rodz"])){
    
    $rodz = $_GET["rodz"];
    $tresc = $_GET["tresc"];
    
    if(isset($_SESSION["nick"])){
        $login = $_SESSION["nick"];
    }else{
        $login = "nn";
    }
    
    
    $q_zglos = "INSERT INTO `bledy` (`id`, `rodz`, `tresc`, `data`, `kogo`) VALUES (NULL, '".$rodz."', '".$tresc."', NOW(), '".$login."')";
    
    $b_zglos = mysqli_query($con,$q_zglos);
    
}



?>