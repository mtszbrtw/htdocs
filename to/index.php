<?php
session_start();
if(isset($_SESSION['nick'])){
    
    
    $login =$_SESSION['nick'];
    
    
    
    
//if(!isset($_COOKIE["miejsce_pracy"])){
    
    require_once("../con.php");
    
    
    $q_czy_imie_puste = "SELECT * FROM `Ouser` WHERE `nick` = '".$login."'" ;
    $b_czy_imie_puste = mysqli_query($con,$q_czy_imie_puste);
    
    
    $row = mysqli_fetch_assoc($b_czy_imie_puste);
    
  /* if(!$row['miejsce_pracy'){
       
    
 header("location:to/menu_wyboru.php");
       
    
   }else*/
   
   if(!$row["imie"]){
       
?>
<html>
<head>

     <title>eDojazdy.pl - Jedźmy Wspólnie do Skody</title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="Pomożemy Ci znaleź samochód, którym pojedziesz do skody lub pasażerów do Twojego samchodu">
<meta name="author" content="mtszbrtw">
<meta name="theme-color" content="#e9e9e9" />

	<meta property="og:site_name" content="eDojazdy.pl" /> <!-- website name -->
	<meta property="og:site" content="eDojazdy.pl" /> <!-- website link -->
	<meta property=”og:image” content="../images/logo.png" />
	<meta property="og:title" content="Jedźmy Wspólnie do Skody"/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="Pomożemy Ci znaleź samochód, którym pojedziesz do Skody lub pasażerów do Twojego samchodu" />
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/vegas.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/templatemo-style.css?kkhj=h54">
<meta name="theme-color" content="#e9e9e9" />
</head>

<body>
   
     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>


<div id="uzupelnij_dane">
    <form>
    <center>
    
    <div id="co_teraz">Uzupełnij reszte informacji:</div>

     <div id="wrlo"><img src="img/left-arrow.png"></div>
    <br><br>
    <p class="akap">Imię :</p>
     <input type="text" id="imie_uz"class="form-control" placeholder="wpisz swoje imię" maxlength="32">
                                <p class="akap">Nr. telefonu :</p>    
                                  <input type="tel" id="nr_tel_uz"class="form-control" placeholder="podaj nr.tel (nie obowiązkowe)" pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}" minlength="9"> 
                   <p class="akap_info">*W celu kontaktu z potencialnymi pasażerami</p><p class="akap">Miasto :</p>
                                  <input type="text" class="form-control" id="miasto_uz" placeholder="Wpisz swoje miasto"></br>
   
                                 <div id="uz_error"></div> 
                                 <input type="submit" class="form-control" value="prześlij" id="uzupelnij" style="background-color:springgreen">
                                 
                                </form></center>
                              
    
</div>




    
    
     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/vegas.min.js"></script>
     <script src=".js/countdown.js"></script>
     <script src="assets/js/sprawdzusera.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>
     
      
<?php
   }else{
       
        header("location:".$row["miejsce_pracy"]."/dojazdy?".$row['miejsce_pracy']);
       
       
   }
    
    
    //jesli w ciasteczku bedzie mial inna fabryke to dac ta inna 
    
    
/*}else{
    
   
   header("location: ".$_COOKIE['miejsce_pracy']."/dojazdy");
    
    
}*/
    
   
?>




<?php
}else{
    
 
    header('location: ../index.php');
}
?>