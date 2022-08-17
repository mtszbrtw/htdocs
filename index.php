<?php

session_start();


if(isset($_SESSION["nick"])){
    
   return header("location:/to");
    
}



?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-KH3PNVWKT5"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-KH3PNVWKT5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-KH3PNVWKT5');
</script>
    <!-- SEO Meta Tags -->
    <meta name="description" content="Jedź do pracy wspólnie z drugą osobą i oszczędź czas i pieniądze">
    <meta name="author" content="mtszbrtw">
<meta name="theme-color" content="#e9e9e9" />
    <!-- OG Meta Tags to improve the way the post looks when you share the page on Facebook, Twitter, LinkedIn -->
	<meta property="og:site_name" content="eDojazdy.pl" /> <!-- website name -->
	<meta property="og:site" content="eDojazdy.pl" /> <!-- website link -->
	<meta property="og:title" content="Jedźmy Wspólnie do pracy"/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="Jedź do pracy wspólnie z drugą osobą i oszczędź czas i pieniądze" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="edojazdy.pl" /> <!-- where do you want your post to link to -->
	<meta name="twitter:card" content="summary_large_image"> <!-- to have large image post format in Twitter -->

    <!-- Webpage Title -->
    <title>eDojazdy - Jedźmy wspólnie do pracy</title>
    
    <!-- Styles -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;0,700;1,400&display=swap" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/magnific-popup.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
  
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	
	  <script src="js/init.js"></script>
	   <link rel="stylesheet" href="css/templatemo-style.css?status=w8765">
	<!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light">
        <div class="container">
            
            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Pavo</a> -->

            <!-- Image Logo -->
            


             
            
            <a class="navbar-brand logo-image" href="info.php"><img src="images/logo.png" alt="eDojazdy.pl"></a> 

            <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="info.php">Strona główna<span class="sr-only">(current)</span></a>
                    </li>
                                                     <li class="nav-item">
                        <a class="nav-link page-scroll" href="logreg.php">Logowanie / Rejestracja <span class="sr-only">(current)</span></a>
                    </li>
                    
                  <!--  <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Drop</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a class="dropdown-item page-scroll" href="article.html">Article Details</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item page-scroll" href="terms.html">Terms Conditions</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item page-scroll" href="privacy.html">Privacy Policy</a>
                        </div>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="kontakt.php">Kontakt</a>
                    </li>
                </ul>
               
            </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


   <div id="pole_logowania" style="          background-image: url('images/tloslide.jpg'); 
      opacity: 0.98;
      background-repeat: no-repeat;
     background-position:center;
      background-size: cover;
"><br>
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
                                 <br><div id="daa"><div id="rej">Załóż konto</div><br><div id="przywroc_pass_click">zapomniałem hasła</div>
                           </div>
                                </form></center>
                                <br>
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
                              
                             
                         
                         
                      <center> <div id="przywroc_pass">
                           
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
                       </center>
                         </div>
                         </div>

    <!-- Header -->
    
<div id="apap1">
    
    <p>Pracownicy <b>skody w Kvasinach, Nachodzie czy WSSE </b>od początku tego roku mają możliwośc darmowego i bardzo sprawnego dowawania ogłoszeń dojazu pracowniczego autami osobowymi z osobami które również dojeżdżają tam do pracy na platformie <a href="https://edojazdy.pl">eDojazdy. pl</a>. </p><br>

<p>
Pomimo transportu pracowniczego z wielu miejscowości osoby dojeżdżają do pracy własnym autem, dzięki tej platformie osoby te zrzeszają się i jeżdżą do pracy jednym autem zamiast kilkoma. </p>
<p>
Wiele osób które dotychczas jeżdżą autobusem wolałyby jeździć do pracy samochodem osobowym gdyby miały taką możliwość edojazdy dają właśnie tę możliwość. </p>
<p>
Często osoby, które dopiero zaczynają pracę w pierwsze dni dojeżdżają do miejsca pracy własnym samochodem a mogą od pierwszego dnia jechać wspólnie z drugą osobą. 
</p>
<p>
Do wielu miejscowości autobus/bus pracowniczy nie dojeżdża i osoby jeżdżące z tych miejscowości muszą dojeżdżać same. Są sytuację że jest po kilka osób z jednej miejscowości i nawet o sobie nie wiedzą w takim przypadku lepiej jakby zrzeszyly się one i pojechały jednym autem. </p>
<p>Tak bedzie oszczedniej dla nich i lepiej dla środowiska a pracodawca bedzie mial pewność , że pracownik zawsze dotrze do pracy na czas nawet w wyjątkowych sytuacjach. </p>

<p>Toyota - fabryka samochodow w Wałbrzychu zgodziła aię na współprace mówiąc o świetnej iniciatywie. </p>
   
   
</div>
    
    <header id="header" class="header">
                        <h2 class="h2-large">Znajdź swój transport do pracy lub sam go zaoferuj</h2>
                        

                
             <!--   <div class="container">
    <h1>Amazon Style Horizontal Scroller Example</h1>
    <p class="lead">A tiny jQuery script to replicate the Amazon-style product scroller that allows the user to horizontally scrolls through a group of items with prev/next buttons.</p>
    <div class="preview_control_area">
        <div class="data_preview_area">
            <div class="data_preview_frame"><div class="data_preview_content">Item 1</div></div>
            <div class="data_preview_frame"><div class="data_preview_content"><img src="images/1.jpg"></div></div>
            <div class="data_preview_frame"><div class="data_preview_content"><img src="images/2.jpg"></div></div>
            <div class="data_preview_frame"><div class="data_preview_content"><img src="images/3.jpg"></div></div>
            <div class="data_preview_frame"><div class="data_preview_content"><img src="images/4.jpg"></div></div>
            
        </div>
        <div class="control_button previous_button">Prev</div>
        <div class="control_button next_button">Next</div>
    </div>
</div> -->
           
        
    </header> <!-- end of header -->
    <!-- end of header -->
    
     <div id="text2"><center>Jedź do pracy wspólnie z drugą osobą. Pomożemy znaleźć Ci pasażera do Twojego auta lub kierowcę. Aktualnie w naszej aplikacji można oferować transport pracowniczy do fabryki Skoda Kvasiny i wszystkich zakładów pracy w Nachodzie<br>
     Nie masz jak się dostać do pracy?<br>
     Nie zwracają Ci się koszty dojazdów?
     <br><br>
     <b>Jedź wspólnie z drugą osobą dzięki <i>eDojazdy.pl</i></b>
     </center></div>


  <div id="suwanka">
    <div class="container">
    
    <div class="preview_control_area">
        <div class="data_preview_area">
            <div class="data_preview_frame"><div class="data_preview_content"><img src="images/ekran_apk1.jpg"></div></div>
            <div class="data_preview_frame"><div class="data_preview_content"><img src="images/ekran_apk2.jpg"></div></div>
            <div class="data_preview_frame"><div class="data_preview_content"><img src="images/ekran_apk3.jpg"></div></div>
            <div class="data_preview_frame"><div class="data_preview_content"><img src="images/ekran_apk4.jpg"></div></div>
            <div class="data_preview_frame"><div class="data_preview_content"><img src="images/ekran_apk5.jpg"></div></div>
            
        </div>
        <div class="control_button previous_button"><</div>
        <div class="control_button next_button">></div>
    </div>
    <center><a class="btn-solid-lg" href="logreg.php"><i class="fab"></i>Załóż konto teraz</a></center>
</div> 
</div>



<div id="text3"><center><small><p>*Aplilacja jest stworzona dla pracowników <b>Skody Kvasiny</b> i <b>Terenu całego Nachodu </b> dojeżdżających z terenu <b>Kotliny kłodzkiej i okolic</b></p></small></center></div>



    <!-- Features -->
    <div id="features" class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                  <h2>Znajdź dojazd do pracy w 3 krokach</h2>
                    
                    <br>
                 
                    <!-- Card -->
                    <div class="card">
                       
                        <div class="card-body">
                            <h5 class="card-title">krok 1 : Wyszukaj ogłoszenie</h5>
                        <div class="card-image"><br>
                            <img class="img-fluid" src="images/search.png" alt="alternative">
                        </div>
                           <p>Wystarczy ustawić kilka parametrów min. dni na które szukasz transportu, trasę czy rodzaj zmiany, ak</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">krok 2 :  Umów się z osobą która dodała ogłoszenie</h5>
                     <div class="card-image"><br>
                            <img class="img-fluid" src="images/chat.png" alt="alternative">
                        </div>
                            <p>Możesz napisac używając wbudowanego czatu i ustalić szczegóły</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                      
                        <div class="card-body">
                            <h5 class="card-title">krok 3 : jedziecie </h5>
                       <div class="card-image"><br>
                            <img class="img-fluid" src="images/check.png" alt="alternative">
                        </div>
                     <p>miłej drogi ;)</p>
                        </div>
                    </div>
                    <!-- end of card -->

                   

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of features -->


    <!-- Features -->
    <div id="features" class="cards-1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                  <h2>Zaoferuj dojazd do pracy w 3 krokach</h2>
                    <br>
                    <!-- Card -->
                    <div class="card">
                       
                        <div class="card-body">
                            <h5 class="card-title">krok 1 : Dodaj ogłoszenie</h5>
                         <div class="card-image"><br>
                            <img class="img-fluid" src="images/plus.png" alt="alternative">
                        </div>
                            <p>Ustawisz tam wszystkie niezdbędne parametry potrzebne osobie, która szuka transportu</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                      
                        <div class="card-body">
                            <h5 class="card-title">krok 2 :  Umów się z zainteresowanym</h5>
                             <div class="card-image"><br>
                            <img class="img-fluid" src="images/chat.png" alt="alternative">
                        </div>

                            <p>Być może ktoś szuka właśnie Ciebie wtedy wyśle wiadomość oby się dogadać</p>
                        </div>
                    </div>
                    <!-- end of card -->

                    <!-- Card -->
                    <div class="card">
                      <div class="card-body">
                            <h5 class="card-title">krok 3 : jedziecie </h5>
                       <div class="card-image"><br>
                            <img class="img-fluid" src="images/check.png" alt="alternative">
                        </div>
                     <p>miłej drogi ;)</p>
                        </div>
                    </div>
                    <!-- end of card -->

                   

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of cards-1 -->
    <!-- end of features -->

    





    <!--
    <div class="counter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                   
                    <div id="counter">
                        <div class="cell">
                            <div class="counter-value number-count" data-count="231">1</div>
                            <p class="counter-info">Happy Users</p>
                        </div>
                        <div class="cell">
                            <div class="counter-value number-count" data-count="385">1</div>
                            <p class="counter-info">Issues Solved</p>
                        </div>
                        <div class="cell">
                            <div class="counter-value number-count" data-count="159">1</div>
                            <p class="counter-info">Good Reviews</p>
                        </div>
                        <div class="cell">
                            <div class="counter-value number-count" data-count="127">1</div>
                            <p class="counter-info">Case Studies</p>
                        </div>
                        <div class="cell">
                            <div class="counter-value number-count" data-count="211">1</div>
                            <p class="counter-info">Orders Received</p>
                        </div>
                    </div>
                    <!-- end of counte

                </div> <!-- end of col
            </div> <!-- end of ro
        </div> <!-- end of container
    </div> <!-- end of counter
    <!-- end of statistics -->



    <!-- Conclusion -->
    <div id="download" class="basic-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image-container">
                        <img class="img-fluid" src="images/logo.png" alt="alternative">
                    </div> <!-- end of image-container -->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                   <div class="text-container">
                        <h1 class="h1-large">Znajdź swój transport do pracy lub sam go zaoferuj</h1>
                        <p class="p-large">Pomożemy Ci znaleź samochód, którym pojedziesz do pracy lub pasażerów do Twojego samchodu</p>
                        <a class="btn-solid-lg" href="logreg.php"><i class="fab"></i>załóż konto</a>
                       
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-5 -->
    <!-- end of conclusion -->


    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h5>Kontakt w celu współpracy lub sugestii : <a class="purple" href="mailto:kontakt@edojazdy.pl">kontakt@edojazdy.pl</a></h5>
                    <div class="social-container">
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-pinterest-p fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-youtube fa-stack-1x"></i>
                            </a>
                        </span>
                    </div> <!-- end of social-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of footer -->  
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                  <!--  <ul class="list-unstyled li-space-lg p-small">
                        <li><a href="article.html">Article Details</a></li>
                        <li><a href="terms.html">Terms & Conditions</a></li>
                        <li><a href="privacy.html">Privacy Policy</a></li>
                    </ul>-->
                </div> <!-- end of col -->
                <div class="col-lg-6">
                    <p class="p-small statement"> © <a href="/tablica">eDojazdy.pl 2021</a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->
    
    	
    <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>
