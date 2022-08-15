<?php 
session_start();

  $login = $_SESSION["nick"];
   
   require_once("../con.php");
   
  // dane z bazy email miasto 
  //ilosc ogloszen 
  //odnosnik do oloszen 
  
  if(isset($_GET["profil"]) && $_GET["profil"]=="info"){
   
   $q_baza_user = "SELECT * FROM `Ouser` WHERE `nick`='".$login."'";
   
   $user = mysqli_query($con,$q_baza_user);
   
   while($row = mysqli_fetch_assoc($user)){
       $array[] = $row;
   }
   
   echo json_encode($array);
}else if($_POST["profil"] == "usun"){
    
    $przeslanehaslo = filtruj($con,$_POST["haslo"]);
    $przeslanehaslo = md5($przeslanehaslo);
    
    $q_sprawdzhaslo = "SELECT `pass` FROM `Ouser` WHERE `nick`='".$login."' AND `pass`='".$przeslanehaslo."'";
    
    if(mysqli_num_rows(mysqli_query($con,$q_sprawdzhaslo)) != 0){
        
        $q_deleteuser = "DELETE FROM `Ouser` WHERE `nick`='".$login."'";
        mysqli_query($con,$q_deleteuser);
        
       $q_usun = "DELETE FROM `ogloszenia` WHERE `kto` = '".$login."'";
        mysqli_query($con,$q_usun);
    
        
        echo "usuniete";
        
        //jeszze tzeba usunac wszystko tego uzytkoenika ogloszenia 
        
    }else{
        echo "niepoprawne";
    }
    
    

    
}elseif($_POST["profil"] == "zmien"){
    

    $teraz = md5(filtruj($con,$_POST["tehaslo"]));
    $nowe = md5(filtruj($con,$_POST["nowehaslo"]));
    
        
    
    $q_sprawdzhaslo = "SELECT `pass` FROM `Ouser` WHERE `nick`='".$login."' AND `pass`='".$teraz."'";
    
    if(mysqli_num_rows(mysqli_query($con,$q_sprawdzhaslo)) != 0){
        
        
        $q_zmienhaslo = "UPDATE `Ouser` SET `pass` ='".$nowe."' WHERE `nick`='".$login."'";
        
        mysqli_query($con,$q_zmienhaslo);
        
        echo "zmieniono";
        
        die();
        
    }else{
        echo "zle";
        die();
    }
    
    
}elseif($_POST["profil"] == "edytuj"){
    //jaki kurs w jakim kantorze 
    
    $imie = filtruj($con,$_POST["dane_imie"]);
    $miasto = filtruj($con,$_POST["dane_miasto"]);
    $nr_tel = filtruj($con,$_POST["dane_nr_tel"]);
    $miejsce = filtruj($con,$_POST["dane_miejsce"]);
    
    
    
    $haslo = md5(filtruj($con,$_POST["haslo"]));
    
    $q_sprawdzhaslo = "SELECT `imie` FROM `Ouser` WHERE `nick`='".$login."' AND `pass`='".$haslo."'";
    
    if(mysqli_num_rows(mysqli_query($con,$q_sprawdzhaslo)) != 0){
        
        $q_edytujimie = "UPDATE `Ouser` SET `imie`='".$imie."', `miasto` = '".$miasto."', `nr_tel` = '".$nr_tel."', `miejsce_pracy` = '".$miejsce."' WHERE `nick`='".$login."'";
        
        if(mysqli_query($con,$q_edytujimie)){
            echo "edytowano";
        }
        
    }else{
        echo "zle";
    }
    
}
   
   mysqli_close($con);
?>