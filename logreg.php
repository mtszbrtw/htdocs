<? 
session_start();
if(!isset($_SESSION["nick"])){
?>

<! DOCTYPE html>
<html>
<head>

     <title>eDojazdy.pl - Jedźmy Wspólnie do pracy</title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="Jedź do pracy wspólnie z drugą osobą. Pomożemy znaleźć Ci pasażera do Twojego auta lub kierowcę. Aktualnie w naszej aplikacji można oferować transport pracowniczy do fabryki Skoda Kvasiny i wszystkich zakładów pracy w Nachodzie">
<meta name="author" content="mtszbrtw">
<meta name="theme-color" content="#e9e9e9" />

<script async src="https://www.googletagmanager.com/gtag/js?id=G-KH3PNVWKT5"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-KH3PNVWKT5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-KH3PNVWKT5');
</script>


	<meta property="og:site_name" content="eDojazdy.pl" /> <!-- website name -->
	<meta property="og:site" content="eDojazdy.pl" /> <!-- website link -->
	<meta property=”og:image” content="images/logo.png" />
	<meta property="og:title" content="Jedźmy Wspólnie do pracy | Logowanie / Rejestracja"/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="Jedź do pracy wspólnie z drugą osobą i oszczędź czas i pieniądze" />
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/vegas.min.css">
     <link rel="stylesheet" href="css/font-awesome.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="css/templatemo-style.css?status=w8765">
<meta name="theme-color" content="#e9e9e9" />
</head>
<body>
   
     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>

<div id="zglos_blad"><div class="zglos_text">zgłoś<br>błąd</div><img src="images/blad.png"></div>
<div id="zglos_blad_pole">
    <div class="zglos_item" id="blad_log">błąd w logowaniu</div>
    <div class="zglos_item" id="blad_przyp">błąd w przypomnij hasło</div>
    <div class="zglos_item" id="blad_reg">błąd w rejestracji</div>
        <div class="zglos_item" id="blad_inne">inne:</div>
</div>

<div id="zglos_pole_input">
    <h4></h4>
    <p>Jeślij możesz napisz kilka słow o błędzie, który wystąpił lub o Twojej sugestii. Możesz też wysłać samo zgłoszenie klikając przycisk wyślij:</p>
    <input id="tresc_bledu" type="text"><button id="tresc_bledu_send" type="submit">Wyślij</button>
</div>

<div id="zglos_inne">
    <p style="color:white">napisz kilka słow o twoim błędzie lub sugestii: </p>
<input id="tresc_inne" type="text"><button id="tresc_bledu_send_inne" type="submit">Wyślij</button>
    
</div>



    <div class="menu-bg"></div>
    <div class="menu-burger">☰</div>

    <div class="menu-items">
       <div class="container">
         <div class="row">
           <div class="col-md-offset-2 col-md-4 col-sm-6">
            
             <ul class="menu">
                <li><a href="#"><div id="menu_log">Zaloguj</div></a></li>
                <li><a href="#"><div id="menu_reg">Rejestracja</div></a></li>
                <li><a href="#"><div id="menu_przyp">Przypomnij hasło</div></a></li>
                <li><a href="index.php">Strona główna</a></li>
                <li><a href="kontakt.php">Kontakt</a></li>
            </ul>
           </div>



         </div>
       </div>
    </div>

     <!-- HOME -->
     
     <div class="vegas-overlay"></div>
     <section id="home">
       
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="home-info">
                              <h1 id="dd">Jedźmy wspólnie do pracy</h1>
                    <div id="co_teraz"></div>
                              <div class="subscribe-form">
            <div id="wrlo"><img src="to/img/left-arrow.png"></div>
                     <div id="formularz">

    <div id="log">

                               <center> <form action="" method="post" id="form_log">
    <div id="log_error"></div>
    <div id="log_ok"></div>
    <div class="akap"><b>Login : </b></div>
                                  <input type="text" name="login" id="login_log"class="form-control" placeholder="login lub email" minlength="5" maxlength="32" required>
                                   <div class="akap"><b>Hasło : </b></div>
    
                                  <input type="password" class="form-control"
                              name="pass"    required
                 placeholder="hasło" id="pass_log"minlength="5" maxlength="32"></br>
                                  <input type="submit" class="form-control" value="Zaloguj" name="loguj" style="background-color:springgreen">
                                 <br><div id="daa"><div id="rej"><big>Załóż konto</big></div><div id="przywroc_pass_click">zapomniałem hasła</div>
                                  </br><p style="color:lightgreen" id="fftt"><a href="index.php" id="na_glowna">Strona główna</a></p></div>
                                </form></center>
    </div>

    <div id="reg">
           

                              
                               <center> <form id="form_reg">
                                 <div id="reg_error"></div>
                                  <br><br><div class="akap"><b>Login : </b></div>
    <input type="text" id="login_reg"class="form-control" placeholder="wpisz swój login" minlength="5" maxlength="32" required>  <div class="akap"><b>E-mail : </b></div>
    
                                  <input type="email" class="form-control" id="email_reg" placeholder="Wpisz swoj email" maxlength="32" minlength="6" required> <div class="akap"><b>Hasło : </b></div>
    
                                  <input type="password" class="form-control"
                                  id="pass_reg"
                 placeholder="Wpisz woje hasło" minlength="5" maxlength="32" required> <div class="akap"><b>Podaj hasło ponownie : </b></div>
    
                                  <input type="password" class="form-control"
                     id="pass_reg2"
                 placeholder="powtórz swoje hasło" minlength="5" maxlength="32" required></br>
              
                                  <input type="submit" class="form-control" value="Zarejestruj" id="zarejestruj"style="background-color:springgreen">
                                 
                                </form></center>
                              
    </div>
    


                              </div>
                              
                             
                         
                         
                       <div id="przywroc_pass">
                           
                           <div id="przywroc_email">
                               <form id="przywroc_email_form"><div id="przywroc_email_error"></div>
                                   <input type="email" minlength="5" class="form-control" maxlength="32"id="przywroc_email_val" placeholder="podaj swój e-mail" required>
                                  <br> <input type="submit" class="form-control" style="background-color:springgreen" value="prześlij" id="przyw1">
                               </form>
                           </div><!-- przywroc_email -->
                           
                           <div id="wpisz_kod">
                              <div id="wpisz_kod_info"></div><br>
                             <center><form id="wpisz_kod_form">
                                   <input type="number" class="form-control" maxlength="6" id="wpisz_kod_val" placeholder="podaj kod z e-mail" required>
                                  <br> <input type="submit" class="form-control" value="prześlij" style="background-color:springgreen" id="przyw2">
                               </form></center>
                               
                           </div><!-- wpisz_kod -->
                           
                            <div id="new_pass">
                                <div id="new_pass_info"></div>
                               
                               <form id="new_pass_form">
                                   <input type="password" class="form-control" minlength="5" maxlength="32" placeholder="podaj nowe hasło" id="new_pass_val" required>
                                  <br><input type="password" class="form-control" minlength="5" maxlength="32" placeholder="powtórz hasło" id="new_pass_val2" required><br>
                                  <input type="submit" class="form-control" style="background-color:springgreen" value="utwórz nowe hasło" id="przyw3">
                               </form>
                               
                           </div><!-- nowe pass-->
                           
                           
                           
                       </div><!-- przywroc_pass -->
                       
                         </div>
                         
                    </div>
                    
               </div>

          </div>
        
          
     </section>

    
    
     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/vegas.min.js"></script>
     <script src="js/countdown.js"></script>
     <script src="js/init.js?status=76543h"></script>
     <script src="js/custom.js"></script>

</body>
</html>
<? 
}else{
    header("location:to/index.php");
}
?>