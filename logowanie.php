<?php
session_start();
 
 
 require_once('con.php');
 
 $login = filtruj($con,$_GET['login_log']);
 $haslo = md5(filtruj($con,$_GET['pass_log']));
 
 
 

$zapytanie_log = "SELECT `nick` FROM `Ouser` WHERE `nick`= '".$login."' OR `email` = '".$login."' LIMIT 1";

if(mysqli_num_rows(mysqli_query($con,$zapytanie_log)) > 0){
    //istnieje uzytk o takim niku teraz trzeba zovaczyc czy zna haslo
    
$zapytanie_pass = "SELECT * FROM `Ouser` WHERE `nick`= '".$login."' AND `pass` = '".$haslo."' OR `email` = '".$login."' AND `pass` = '".$haslo."'";

if(mysqli_num_rows(mysqli_query($con,$zapytanie_pass)) > 0){
    
    
if(strpos($login,"@") != false AND strpos($login,".") != false ){
    
    $q_search_log = "SELECT `nick` FROM `Ouser` WHERE `email` = '".$login."'";
    $b_search_log = mysqli_query($con,$q_search_log);
    
    $login = mysqli_fetch_assoc($b_search_log);
    $login = $login["nick"];
    
}

    
    $_SESSION['nick']= $login;
    
    
    echo "zalogowano";
}else{
    echo "Podano złe hasło";
}
    
}else{
    
    echo "Podano błędny login lub email";
}




 

 
//;#;;&;&;#;#;; zapisanie w tablicy danych z azy i wyslanie fo jquery
/*
while($row = mysqli_fetch_assoc($zapytanie)){
    $tablica[] = $row;
} 
echo json_encode($tablica);*/



/*Język PHP 5.2 ma wbudowaną funkcję — json_encode() — ułatwiającą tworzenie obiektów JSON na podstawie standardowych tablic języka PHP. A zatem podczas tworzenia aplikacji ajaksowych można w prosty sposób przekształcić tablicę PHP na obiekt w formacie JSON i przesłać go do skryptu działającego w przeglądarce. */
?>