<?php

$host_db = 'mysql101.unoeuro.com:3306';
$user_db = 'edojazdy_pl';
$pass_db= 'xEeB36p4mhDz';
$db = 'edojazdy_pl_db';

$con = mysqli_connect($host_db, $user_db, $pass_db, $db);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

  function filtruj($con,$zmienna)
    {
        
            $zmienna = stripslashes($zmienna); // usuwamy slashe
        
        // usuwamy spacje, tagi html oraz niebezpieczne znaki
        return mysqli_real_escape_string($con,htmlspecialchars(trim($zmienna)));
    }
    
    mysqli_set_charset($con, 'utf8');

mysqli_query($con,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");  
 
mysqli_query($con,"SET NAMES = 'utf8'");

 


?>