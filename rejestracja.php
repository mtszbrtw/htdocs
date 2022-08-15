<?php
session_start();
if(!isset($_SESSION['nick'])){
    
    if(isset($_POST['login_reg']) && isset($_POST["pass_reg2"])){
        
        require_once("con.php");
      
    
      
      
      $login = filtruj($con,$_POST["login_reg"]);
      $imie = filtruj($con,$_POST["imie_reg"]);
      $email = filtruj($con,$_POST["email_reg"]);
      $pass = filtruj($con,$_POST["pass_reg"]);
      $pass = md5($pass);
     
    
     
      
     
      
      $istnieje_login = "SELECT `nick` FROM `Ouser` WHERE `nick`= '".$login."'LIMIT 1";
      if(mysqli_num_rows(mysqli_query($con,$istnieje_login)) == 0){
    //sprawdzam czy podany login jest uzywany jesli nie to sprawdzam email 
          $istnieje_email = "SELECT `email` FROM `Ouser` WHERE `email`= '".$email."'";
          if(mysqli_num_rows(mysqli_query($con,$istnieje_email)) == 0){
              //jesli login i email wolny 
              
              ;
              
$create_user = "INSERT INTO `Ouser` (`id`, `nick`, `pass`, `email`, `imie`, `kod_przy`, `nr_tel`, `miasto`, `miejsce_pracy`, `data_rej`) VALUES (NULL, '".$login."', '".$pass."', '".$email."', 0, 0, 0, 0, 0, NOW())";
              
               if(mysqli_query($con,$create_user)){
                   $_SESSION['nick']= $login;
                  echo "utworzono";
                  
                  
              }else{
                  echo "Błąd bazy6 danych ";
              }
              
             
              
          }else{
              echo "Podany emai jest zajęty";
          }
          
      }else{
          echo "Podany login jest zajęty";
      }
      
    }else{
        echo 'błąd przesyłu danych';
    }
    
}else{
    echo "zalogowany";
}

?>