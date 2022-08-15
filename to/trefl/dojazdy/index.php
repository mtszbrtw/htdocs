<?php
session_start();
if(isset($_SESSION['nick']) && $_SESSION['nick'] != ''){
?>
<html lang="pl">
<!-- 194 dodaj -->
<!-- 363 aktywne -->
<!-- 388 edytuj -->
<!-- 493 oloszenie click  -->
<!-- 543 usun ogl -->
<!-- 583 wyslij opt -->
<!--639 menu wiad -->
<!-- 725 profil -->

<!--1069 profil auto -->
<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <title>eDojazdy.pl - Katowicka SSE</title>


    <link rel="shortcut icon" href="../../../assets/images/favicon.png" type="image/png">


    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">

    <!--====== Line Icons css ======-->
    <link rel="stylesheet" href="../../assets/css/LineIcons.css">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="../../assets/css/magnific-popup.css">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="../../assets/css/slick.css">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="../../assets/css/animate.css">

    <!--====== Default css ======-->
    

    <!--====== Style css ======-->
    <link rel="stylesheet" href="../../assets/css/style.css?status=wersjakomp">


    <!--====== jquery js ======-->
    <script src="../../assets/js/vendor/modernizr-3.6.0.min.js"></script>
    <script src="../../assets/js/vendor/jquery-1.12.4.min.js"></script>
    
    <script src="../../assets/js/miejsca_pracy.js"></script>

    <!--====== Bootstrap js ======-->
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/popper.min.js"></script>

    <!--====== Slick js ======-->
    <script src="../../assets/js/slick.min.js"></script>
    
    <script language="JavaScript1.2">
function lock_enter()
 {
   if (event.keyCode==13)
    {
      window.event.returnValue=false;
    
    }
 }
</script>


<script src="../../assets/js/jquery.marquee.js"></script>

    <!--====== Isotope js ======-->
    <script src="../../assets/js/isotope.pkgd.min.js"></script>

    <!--====== Images Loaded js ======-->
    <script src="../../assets/js/imagesloaded.pkgd.min.js"></script>

    <!--====== Magnific Popup js ======-->
    <script src="../../assets/js/jquery.magnific-popup.min.js"></script>

    <!--====== Scrolling js ======-->
    <script src="../../assets/js/scrolling-nav.js"></script>
    <script src="../../assets/js/jquery.easing.min.js"></script>

    <!--====== wow js ======-->
    <script src="../../assets/js/wow.min.js"></script>

    <!--==== -->
    <script src="js/main.js?status=zamykaniewprof"></script>
    
 
<script type="text/javascript" src="node_modules/a-color-picker/dist/acolorpicker.js"></script>

 <script type="text/javascript">
  AColorPicker.from('.picker').on('change', (picker, color) => {
  document.body.style.backgroundColor = color;
})
  </script>



</head>

<body>
    <div id="zglos_blad"><div class="zglos_text">zgłoś<br>błąd</div><img src="../../../images/blad.png"></div>
<div id="zglos_blad_pole">
    <div class="zglos_item" id="blad_profil">błąd/sugestia profil</div>
    <div class="zglos_item" id="blad_user">profil użytkownik</div>
    <div class="zglos_item" id="blad_prof_ogl">profil ogł.</div>
    <div class="zglos_item" id="blad_prof_auto">profil auto</div>
    <div class="zglos_item" id="blad_w_wiad">wysyłanie wiad.</div>
    <div class="zglos_item" id="blad_wysz_ogl">wyszukiwanie ogł.</div>
    <div class="zglos_item" id="blad_add_ogl">dodawanie ogł.</div>
    <div class="zglos_item" id="blad_info">informacje o ogł.</div>
    <div class="zglos_item" id="blad_ed_ogl">edycja ogł.</div>
    <div class="zglos_item" id="blad_del_ogl">usuwanie ogł.</div>
    <div class="zglos_item" id="blad_inne">inne:</div>
</div>

<div id="zglos_pole_input">
    <h4 style="color:white"></h4>
    <p style="color:white">Jeślij możesz napisz kilka słow o błędzie, który wystąpił lub o Twojej sugestii. Możesz też wysłać samo zgłoszenie klikając przycisk wyślij:</p>
    <input id="tresc_bledu" type="text"><button id="tresc_bledu_send" type="submit">Wyślij</button>
</div>

<div id="zglos_inne">
    <p style="color:white">napisz kilka słow o twoim błędzie lub sugestii: </p>
<input id="tresc_inne" type="text"><button id="tresc_bledu_send_inne" type="submit">Wyślij</button>
    
</div>



    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->
    
    

    <!--====== NAVBAR PART START ======-->

    <section class="header-area">
        <div class="navbar-area">
            <div class="container">
                <div>
                    <div>
                       <nav class="navbar navbar-expand-lg">
                           <a id="navbar-brand" href="#">
                            
                         <? include('../../assets/html/menuMiejscePracy.html');
                         ?>
                                
                            </a>
                            
                            <a id="wiad_menu"><img class="obr_menu" src="../../img/tick.png"></a><div id="ile_wiad"></div>
                            <a id="profil_menu"><img class="obr_menu" src="../../img/user.png"></a>
                            <a id="wyloguj_menu" href="../../wyloguj.php"><img class="obr_menu" src="../../img/power-off.png"></a>

                          <!--  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarEight" aria-controls="navbarEight" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>-->
                            
            
                           <!--<div class="collapse navbar-collapse sub-menu-bar" id="navbarEight">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active">
                                        <a class="page-scroll" href="#home">HOME</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">ABOUT</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#portfolio">PORTFOLIO</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#pricing">PRICING</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#testimonial">CLIENTS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#contact">CONTACT</a>
                                    </li>
                                </ul>
                            </div>-->

                           <!-- <div class="navbar-btn d-none mt-15 d-lg-inline-block">
                                <a class="menu-bar" href="#side-menu-right"><i class="lni-menu"></i></a>
                            </div>-->
                            
                        </nav> <!-- navbar -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- navbar area -->
        
    

    </section>
  
    

<section id="sekcja_menu">
    
    <table>
        <tr>
            <td><div id="dojazdy_menu"></div></td>
        <!--
            <td><div id="droga_menu">droga do pracy</div></td>
            
            <td><div id="forum_menu">forum</div></td>
            <td><div id="czat_menu">czat</div></td>-->
        </tr>
    </table>
    
</section><!--sekcja menu-->



<section id="glowna">
    
  <section id="dojazdy">
      
     
      <p id="filtry_info">Pokaż ogłoszenie według:</p>
    <div id="filtry_dojazdy">
     
             <div id="dodaj_ogloszenie">Dodaj<img src="../../img/plus.png"/></div><!-- dodaj-->
     
             <div id="filtrdni_click">Wybór dni<img src='../../img/calendar.png'/></div>
           
		   
          <form id="filtrdni">
          <div id="calendar">
              
           <input type="text" id="dniinput" style="display:none" disabled>
          
            
          </form>
          </div>
   
        
           <select id="filtrmiejsca">
            
             <option id="1sit">1 miejsce</option>
             <option id="2sit">2 miejsca</option>
             <option id="3sit">3 miejsca</option>
             <option id="4sit">4 miejsca</option>
         </select>
       
              <select id="filtrzmiana">
                  <option id="all_zm">Wsz. zmiany</option>
                  <option id="ranka">Ranka</option>
                  <option id="popka">Popka</option>
                  <option id="nocka">Nocka</option>
              </select>
         
       <select id="filtrak" disabled>
           <option id="all_fab">miejsca pracy</option>
            <option id="fab_1">miejsce pracy 1</option>
          
         </select>
       
         <select id="filtrtrasa" disabled>
             <option id="tr_all">Wsz. trasy</option>
             <option id="tr1">Nowa Ruda - Ścinawka-Kvasiny</option>
             <option id="tr2">Nowa Ruda - Kłodzko - Kvasiny</option>
             <option id="tr3">Kłodzko - Kvasiny</option>
             <option id="tr4">Nysa - Kłodzko - Kvasiny</option>
             <option id="tr5">Bystrzyca Kł. - Spalona - Kvasiny</option>
             <option id="tr6">z Kudowy Zdr.</option>
             <option id="tr7">z lewina Kł.</option>
             <option id="tr8">Wałbrzych - Nachod - Kvasiny</option>
       
         </select>
         <div style="clear:both;"></div>
      
    </div><!--filtry dojazdy-->
    
    
    </div>
    </div>
    </section>
    
      <div id="dodaj_ogloszenie_strona" class="info_cala_strona">
         
          <div id="dodaj_zamknij" class="zamknij"><img src="../../img/cross.png"/></div>
            <div class="dod_ogl_aka">Dodaj ogłoszenie:</div>
            
 
         
<form id="dodaj_form">
      <div class="dod_ogl_akap">Podaj dni, na które szukasz pasażera:</div>
          <div id="dni_dodaj">
         
                
          </div>
          
         
<div class="dod_ogl_akap">Treść twojego ogłoszenia:</div>

                 <center><textarea id="tresc_dodaj" rows="4" cols="20" maxlegth="300" placeholder="Podaj treść ogłoszenia np.  dodatkowe miejsca zatrzymania, godzine odjazdu, dokładne miejsce lub inne informacje"></textarea></center>
         <div class="dod_ogl_akap">Wybierz auto, ktorym jedziesz:</div>
                 <center><select id="twoje_auto_dodaj"></select></center>
                 <div class="dod_ogl_male_info" >*Jeśli nie masz jeszcze dodanego auta możesz je dodać w ustawieniach profilu</div>  
<div class="dod_ogl_akap">Wybierz ilość wolnych miejsc:</div>
           <center><select id="miejsca_dodaj">
             <option class="1sit" value="1sit">1 miejsce</option>
             <option class="2sit" value="2sit">2 miejsca</option>
             <option class="3sit" value="3sit">3 miejsca</option>
             <option class="4sit" value="4sit">4 miejsca</option>
         </select></center>
          
      <div class="dod_ogl_akap">Wybierz zmianę:</div>  
          
           <center><div class="sekcja_zmiana">
               <label for="wiczm_dod" class="label_wiczm"><input id="wiczm_dod" type="checkbox">Wybierz więcej<img class="obr_wic" src="../../img/add.png"></label><div class="wiczm_info" >teraz możesz wybrać wiecej niż 1 zmianę</div>
              <select id="zmiana_dodaj">
                  <option class="ranka" value="ranka">Ranka</option>
                  <option class="popka" value="popka">Popka</option>
                  <option class="nocka" value="nocka">Nocka</option>
              </select>
              
              <div style="clear:both;margin:0px 0px"></div>
            </div></center>
            
<div class="dod_ogl_akap">Podaj trasę, którą jedziesz:</div>
         
         
         <center><div class="sekcja_trasa">
             <label class="label_wictr" for="wictr_dod" style="display:none" disabled>
             <input type="checkbox" id="wictr_dod">Wybierz więcej<img class="obr_wic"  src="../../img/add.png"></label><div class="wictr_info">teraz możesz wybrać więcej niż 1 trasę</div>
             <input type="text" id="trasa_dodaj"/><br>
              <div class="dod_ogl_male_info">Poszczególne miasta oddzielaj myślnikiem "-"</div>  
            
        
         <div style="clear:both"></div>
         </div></center>
     
     
            
                  <div class="sekcja_submit"><div id="submit_dod">Dodaj<img class="obr_wic" src="../../img/plus.png"/></div>
               <p id="infoarch"><img  src="../../img/about.png"></p>
             <div style="clear:both"></div>
             </div>
             
               <div id="dodaj_ogl_info"></div>
               
         
         </form>
         
         <div id="infooarch"><p style="text-align:center">Jeśli dodajesz ogłoszenie o parametrach podobnch do innego Twojego ogłoszenia , które zostało usunięte to możesz je dodać ponownie z archiwum które znajdziesz w<br> <p style="background-color:black;color:white;text-align:center">profil > ogłoszenia > archiwum</p></p></div>
        
      </div><!-- dodaj ohloszene strona -->
    
    
    <p id="aktywne_info">Aktywne filtry wyszukiwania:</p>
    <div id="jakie_filtry">
<div class="jakie_filtr" id="jakie_trasa"></div>
<div class="jakie_filtr" id="jakie_ak"></div>
<div class="jakie_filtr" id="jakie_zmiana"></div>
<div class="jakie_filtr" id="jakie_miejsca"></div>
<div class="jakie_filtr" id="jakie_dni"></div>
<div style="clear:both;display:none;"></div>
    </div><!-- jakie filtry -->
    
    <div id="wait_gora"><img class='wait' src="../../img/loader.gif"></div>
   
   <div id="okienko_info"></div>
      <div id="okienko_no_info"></div>
   
   <p id="ogl_info">Ogłoszenia:</p>
    <div id="ogloszenia">
    
        
    </div><!--ogloszeni@-->
     <div id="wait_dol"><img class='wait' src="../../img/loader.gif"></div>
    <div id="koniec"></div>
    
  
         
    
    <div id="edytuj_ogl_dojazdy" class="info_cala_strona">
        <div id="eod_close" class="zamknij"><img src="../../img/cross.png"/></div>
        
        <div class="dod_ogl_aka">Edytuj ogłoszenie:</div>
    
    <form action="" method="" id="edytuj_form">
     <div class="dod_ogl_akap">Dni :</div>
          <div id="dni_edytuj">
         
                
          </div>
          
          
    <div class="dod_ogl_akap">Treść twojego ogłoszenia:</div>
          
          
           <center><textarea id="tresc_edytuj" rows="4" cols="20" maxlegth="300"></textarea></center>
         <div class="dod_ogl_akap">Wybierz auto, którym jedziesz:</div>
                 <center><select id="twoje_auto_edytuj"></select></center>
                 <div class="dod_ogl_male_info" >*Jeśli nie masz jeszcze dodanego auta możesz je dodać w ustawieniach profilu</div>  
<div class="dod_ogl_akap">Wybierz ilość wolnych miejsc:</div>
          
                  <center><select id="miejsca_edytuj">
             <option class="1sit" value="1sit">1 miejsce</option>
             <option class="2sit" value="2sit">2 miejsca</option>
             <option class="3sit" value="3sit">3 miejsca</option>
             <option class="4sit" value="4sit">4 miejsca</option>
         </select></center>
          
      <div class="dod_ogl_akap">Wybierz zmianę:</div>  
          
           <center><div class="sekcja_zmiana">
               <label for="wiczm" class="label_wiczm"><input id="wiczm" type="checkbox">Wybierz więcej<img class="obr_wic" src="../../img/add.png"></label><div class="wiczm_info" >teraz możesz wybrać więcej niż 1 zmianę</div>
              <select id="zmiana_edytuj">
                  <option class="ranka" value="ranka">Ranka</option>
                  <option class="popka" value="popka">Popka</option>
                  <option class="nocka" value="nocka">Nocka</option>
              </select><div style="clear:both"></div>
              </center>
             
                 
         
<div class="dod_ogl_akap">Podaj trasę, którą jedziesz :</div>
                
      
       
        <center><div class="sekcja_trasa">
             <label class="label_wictr" for="wictr" style="display:none">
             <input type="checkbox" id="wictr" disabled>Wybierz więcej<img class="obr_wic"  src="../../img/add.png"></label><div class="wictr_info">teraz możesz wybrać wiecęj niż 1 trasę</div>
             <input type="text" id="trasa_edytuj"><br>
              <div class="dod_ogl_male_info">Poszczególne miasta oddzielaj myślnikiem "-"</div>  
        
         <div style="clear:both"></div>
         </div></center>
       
       
 <div id="edytuj_ogl_info"></div>
     
              <div class="sekcja_submit_ed">
              <div id="edytuj_submit">Edytuj</div>
              </div>
              
       
              
          
         </form>
    
        
     
        
    </div>
    
    <div id="ogloszenie_strona" class="info_cala_strona">
        <div id="ogloszenie_zamknij" class="zamknij"><img src="../../img/cross.png"/></div>
		<br>
        <div class="dod_ogl_aka">Informacje o ogłoszeniu i ogłaszającym:</div>
        
        <div id="sekcja_guziki_ogl">
            <div id="ogloszenie_click">Ogłoszenie</div>
            <div class="ogl_prof_click">Profil ogłaszającego</div>
        <div style="clear:both"></div>
        </div>
        
       
        
        <div id="ogloszenie">
            
            
            
        </div><!-- informacje o ogloszeniu -->
        
        
        
        <div id="ogl_prof">
            
            
           <!-- <div id="ogl_prof_opinie_click">Opinie</div>
            <div id="ogl_prof_auto_click">auto</div>-->
            
            <div id="ogl_prof_info">
                
            </div>
            
            
            
           <!-- <div id="ogl_prof_opinie">
                
            </div><br>
            <br>-->
            
            
            
      </div><!-- profil ogłaszajacego -->
        <div id="oglprofauto" class="dod_ogl_aka">info o samochodzie, którego dotyczy ogłoszenie :</div>
        <div id="ogl_prof_auto">
                
        </div>
        
    </div><!-- ogloszenie -->
    
    
    
    <div id="usun_ogl_dojazdy">
     <div id="usun_ogl_dojazdy_zamknij" class="zamknij"><img src="../../img/cross.png"/></div>
        
       <div class="dod_ogl_aka">Usuń ogłoszenie :</div>
        <div class="dod_ogl_akap">Dodane:</div>
            <div id="data_dod_usun"></div>
        <div class="dod_ogl_akap">Dni:</div>
            <div id="dni_usun"></div>
              <div style="clear:both"></div>
        <div class="dod_ogl_akap">Zmiany:</div>      
            <div id="zmiana_usun"></div>
             <div class="dod_ogl_akap">Miejsce pracy:</div>      
             <div id="miejsce_pracy_usun"></div>
        <div class="dod_ogl_akap">Trasy :</div>     
             <div id="trasa_usun"></div>
             
    
    <div id="usun_click">
      <div id="usun_ogl_doj_click">Usuń</div>
      <div class="usun_ogl_anuluj restrest usun_hover">Anuluj</div>
      <div style="clear:both"></div>
    </div>
    

        
       <div id="usun_click2">
       <div id="znalazl"><div class="dod_ogl_aka">Czy znalazłeś pasażera? :</div>
                <div class="usun_hover usun_ogl_ost" value="tak">Tak</div>

                <div class="usun_hover usun_ogl_ost" value="nie">Nie</div>
           <div style="clear:both"></div></div>
              <div class="usun_hover usun_ogl_anuluj">Anuluj</div>
               
       </div>
        
    
    
    </div><!-- usun ogl dojazdy glowna -->
    
    
    
    <div class="info_cala_strona" id="wyslij_ogl_dojazdy">
        
    <div class="sekcja_ust_wiad">
    <div id="wyslij_ogl_dojazdy_zamknij" class="zamknij"><img src="../../img/cross.png"/></div>
    <div class="kto_z_kim"></div>
    <div id="wyslij_ustaw"><img src="../../img/settings.png"/></div>
    
    
    
    
      <div id="ustawienia_wyslij">
          <div id="wyslij_usun">Usuń konwersację</div>
            <div id="wyslij_usun_potwierdz">
                     <div id="wyslij_usun_potw_tak">Usuń</div><div id="wyslij_usun_potw_nie">Anuluj</div>
                   <div style="clear:both"></div>
            </div>
          <div><!--zgłoś użytkownika--></div>
      </div>
    
    </div><div style="clear:both"></div>
    
    <div class="w_tresc" id="wyslij_tresc">
        
    
    </div>
     <div class="sekcja_wyslij">
    <div id="pole_obrazka"></div>
     <form id="wyslij_obrazek_form" action="" method="post" enctype="multipart/form-data" onKeyDown="lock_enter()"><button id="wyslij_obrazek_guzik" type="submit"><img src="../../img/chat.png"/></button>
     <div style="clear:both"></div>
     
    <input type="text" class="w_input" id="wyslij_input" maxlength="600">
           <input type="hidden" name="MAX_FILE_SIZE" value="5120000" /><input type="file" name="wiad_obrazek" id="wiad_obrazek" accept="image/jpeg,image/gif,image/png" style="display:none">
           </form>
            <label for="wiad_obrazek" id="wiad_obrazek_label"><img src="../../img/add-photo.png"/></label>
     <div id="wyslij_guzik"><img src="../../img/paper-plane.png"/></div></div>
     
        
        
    </div><!-- wyslij ogl glowna -->
    
    
  </section><!-- dojazdy -->
  
  <section id="droga">
      droga
  </section><!-- droga -->
  
  <section id="forum">
      forum
  </section><!--forum -->
  
  <section id="czat">
      czart
  </section><!--czat -->
  
  <section id="wiadomosci" class="info_cala_strona">
  
  <div class="wiadomosci_zamknij"><img src="../../img/cross.png"/></div>
<div class="dod_ogl_aka">Twoje konwersacje:</div>

    <div id="spis_wiad">
        
    
    </div>
    <div id="koniec_wiad"></div>
      
  </section><!-- wiadomosci-->
  
<div id="wyslij_wiad" class="info_cala_strona">
   <div class="sekcja_ust_wiad">
    <div class="wiadomosci_zamknij"><img src="../../img/cross.png"/></div><div id="wstecz"><img src="../../img/left-arrow.png"/></div>
    <div class="kto_z_kim">kto</div>
    <div class="wyslij_ustaw"><img src="../../img/settings.png"/></div>
    
    
    
    
      <div class="ustawienia_wyslij">
          <div class="wyslij_usun">Usuń konwersację</div>
            <div class="wyslij_usun_potwierdz">
                     <div id="wiad_usun_potw_tak">Usuń</div><div class="wyslij_usun_potw_nie">Anuluj</div>
                   <div style="clear:both"></div>
            </div>
          <div><!--zgłoś użytkownika--></div>
      </div>
    
    </div><div style="clear:both"></div>
    
    
    
    
    <div class="w_tresc" id="wiad_tresc">
        
    
    </div>
    
    <div id="infousunogl">Nie możesz odpowiedzeieć na ogłoszenie, które zostało usunięte</div>
     
     
      <div class="sekcja_wyslij">
    <div id="poole_obrazka"></div>
     <form id="wiado_obrazek_form" action="" method="post" enctype="multipart/form-data" onKeyDown="lock_enter()"><button id="wiado_obrazek_guzik" type="submit"><img src="../../img/chat.png"/></button>
     <div style="clear:both"></div>
     
    <input type="text" class="w_input" id="wiad_input" maxlength="600">
           <input type="hidden" name="MAX_FILE_SIZE" value="5120000" /><input type="file" name="wiado_obrazek" id="wiado_obrazek" accept="image/jpeg,image/gif,image/png" style="display:none">
           </form>
            <label for="wiado_obrazek" id="wiado_obrazek_label"><img src="../../img/add-photo.png"/></label>
     <div id="w_guzik"><img src="../../img/paper-plane.png"/></div></div>
     
        
        
    </div><!-- wiadomosci -->
    
    
    <!--
    
    
    <div id="poole_obrazka"></div>
     <form id="wiado_obrazek_form" action="" method="post" enctype="multipart/form-data"><input id="wiado_obrazek_guzik" type="submit" value="wyślij zdięcie">
     <tr>
         <td>
         <input type="text" class="w_input" id="wiad_input" maxlength="600">
     </td>
           <input type="hidden" name="MAX_FILE_SIZE" value="5120000" /><input type="file" name="wiado_obrazek" id="wiado_obrazek" accept="image/jpeg,image/gif,image/png" style="display:none"></form>
            <td><label for="wiado_obrazek" id="wiado_obrazek_label">zdj</label>
       </td>
       <td>
         <div id="w_guzik">
        wyslij
          </div>
        </td>
     </tr>
     
    
    -->
    
    
  
  <section id="profil" class="info_cala_strona">
      <div id="profil_zamknij" class="zamknij"><img src="../../img/cross.png"/></div>
      

<div class="dod_ogl_aka">Profil:</div>
      
      <div id="menu_profil">
         <div class="menu_profil" id="menu_profil_user"> użytkownik</div>
          <div class="menu_profil" id="menu_profil_ogl">ogłoszenia</div>
          <div class="menu_profil" id="menu_profil_auto">
              Twoje auto 
          </div>
          <div style="clear:both"></div>
         <!-- <div id="menu_profil_opinie">Opinie</div>-->
      </div><!--menu profil-->
      
      <div id="user_ustaw_menu">
         
          <div class="menu_profil_user" id="zmien_haslo_menu">Zmień hasło</div>
          <div class="menu_profil_user" id="edytuj_dane_menu">Edytuj dane</div>
           <div class="menu_profil_user" id="usun_konto_menu">Usuń konto</div>
           <div style="clear:both"></div>
          <div id="menu_profil_user_info">Informacje</div>
          </div>
          
          <div id="usun_konto_widok">
      <div id="usun_konto_wroc" ><img src="../../img/left-arrow.png"></div>
          <div class="dod_ogl_aka">Podaj hasło aby usunąć konto</div>
              <form id="podaj_haslo_usun">
                  <center><input type="password" placeholder="podaj hasło" id="usun_konto_haslo"/></center>
                  <center><div id="usun_konto_haslo_info"></div><button id="usun_konto_submit" type="submit">usuń konto</button></center>
              </form>

          </div><!-- usun konto widok -->
          <div id="usun_konto_potw">
                
              <div class="dod_ogl_aka">Czy chcesz usunąć konto?</div>
                    <div id="usun_potw">Usuń</div>
                    <div class="potw_zamknij">Wróć</div>
                 <div style="clear:both"></div>
              </div><!--usun konto potwierdzenie-->
          
          <div id="zmien_haslo_widok">
    
             <div class="dod_ogl_aka">Zmiana hasła</div>
              
              <form action="#" method="post" id="zmiana_hasla">
           <center><input type="password" id="now_pass" placeholder="teraźniejsze haslo" minlength="5" maxlength="32"/></center>
                  <center><input type="password" id="new_pass" placeholder="nowe hasło" minlength="5" maxlength="32"/></center>
                     <center><input type="password" id="new_pass_2"
                 placeholder="powtórz hasło" minlength="5" maxlength="32"/></center>
                                   <div id="zmien_haslo_info"></div><center><button type="submit" id="zmien_haslo_submit">Zmień hasło</button></center>
              </form>
              
          </div><!-- zmien haslo widok -->
          
          <div id="edytuj_dane_widok">
           
           
            
           
             <form id="edytuj_dane_form">
                 <div class='dod_ogl_akap'>Login:</div>
                 <center><input type="text" id="edytuj_login"></center>
                 <div class='dod_ogl_akap'>imie:</div>
                 <center><input type="text" id="edytuj_imie" minlength="3" maxlength="32"></center>
                 <div class='dod_ogl_akap'>email:</div>
                 <center><input type="text" id="edytuj_email"></center>
                 <div class='dod_ogl_akap'>miasto:</div>
                 <center><input type="text" id="edytuj_miasto" minlength="3" maxlength="32"></center>
                 <div class='dod_ogl_akap'>Nr. telefonu:</div>
                 <center><input type="text" id="edytuj_nr_tel" minlength="3" maxlength="32"></center>
                 <div class='dod_ogl_akap'>Miejsce pracy:</div>
                 <center>
                     <? include('../../assets/html/edytujMiejscePracy.html');
                         ?>
                 </center>
                 <div class='dod_ogl_akap'>hasło:</div>
                 <center><input type="password" id="edytuj_pass" placeholder="podaj hasło aby zatwierdzić" minlength="5" maxlength="32"></center>
                 <div id="edytuj_dane_info"></div>
                 <center><button id='edytuj_dane_submit' type="submit">Edytuj</button></center>
                 
             </form>
             
          </div><!-- edytuj dane widok -->
          
     
      
      <div id="profil_user">
          
      </div><!--profil user-->
      
      <div id="profil_ogl">
          
          
          <div id="menu_ogl">
          <div id="aktualne_ogl_menu">Ogłoszenia</div>
          <div id="archiwum_ogl_menu">Archiwum</div>
          <div style="clear:both"></div>
          </div>
          
          
          <div id="aktualne_ogl">
            <div id="ilosc_ogl"></div>
            <div id="twoje_ogl"></div>
          </div>
         
<div id="akt_info_strona" class="info_cala_strona">
             <div id="akt_info_zamknij" class="zamknij"><img src="../../img/cross.png"/></div>
              <div class="dod_ogl_aka">Informacje o ogłoszeniu:</div>
             <div id="akt_info">
                 
             </div>
             <div class="dod_ogl_aka">Informacje o aucie zawartym w ogłoszeniu:</div>
             
             <div id="akt_info_auto">
               
             </div>

             
    </div>
         
          
          <div id="archiwum_ogl">
              
              <div id="arch_list"></div>
              
              
          </div>
          
          
 
        
        
         <div id="arch_info_strona" class="info_cala_strona">
             <div id="arch_info_zamknij" class="zamknij"><img src="../../img/cross.png"/></div>
                           <div class="dod_ogl_aka">Informacje o ogłoszeniu:</div>
             <div id="arch_info">
                 
             </div>
             <div class="dod_ogl_aka">Informacje o aucie zawartym w ogłoszeniu:</div>
             <div id="arch_info_auto"></div>

             
         </div>
         
         <div id="arch_dod_pon" class="info_cala_strona">
            
        
         <div id="dod_pon_wstecz" class="zamknij"><img src="../../img/cross.png"/></div>
          <div class="dod_ogl_aka">Dodaj ogłoszenie ponownie:</div>
    
    <form action="" method="" id="dod_pon_form">
     <div class="dod_ogl_akap">Dni :</div>
          <div id="dni_dod_pon">
         
                
          </div>
         
         
          
    <div class="dod_ogl_akap">Treść twojego ogłoszenia:</div>
          
          
           <center><textarea id="tresc_dod_pon" rows="4" cols="20" maxlegth="300"></textarea></center>
         <div class="dod_ogl_akap">Wybierz auto, którym jedziesz:</div>
                 <center><select id="twoje_auto_dod_pon"></select></center>
                 <div class="dod_ogl_male_info" >*Jeśli nie masz jeszcze dodanego auta możesz je dodać w ustawieniach profilu</div>  
<div class="dod_ogl_akap">Wybierz ilość wolnych miejsc:</div>
          
                  <center><select id="miejsca_dod_pon">
             <option class="1sit" value="1sit">1 miejsce</option>
             <option class="2sit" value="2sit">2 miejsca</option>
             <option class="3sit" value="3sit">3 miejsca</option>
             <option class="4sit" value="4sit">4 miejsca</option>
         </select></center>
          
      <div class="dod_ogl_akap">Wybierz zmianę:</div>  
          
           <center><div class="sekcja_zmiana">
               <label for="wiczm_dod_pon" class="label_wiczm"><input id="wiczm_dod_pon" type="checkbox">Wybierz więcej<img class="obr_wic" src="../../img/add.png"></label><div class="wiczm_info" >teraz możesz wybrać więcej niż 1 zmianę</div>
              <select id="zmiana_dod_pon">
                  <option class="ranka" value="ranka">Ranka</option>
                  <option class="popka" value="popka">Popka</option>
                  <option class="nocka" value="nocka">Nocka</option>
              </select>
              
              <div style="clear:both;margin:0px 0px"></div>
            </div></center>
             
<div class="dod_ogl_akap">Wybierz trasę:</div>
                
      
       
        <center><div class="sekcja_trasa">
             <label class="label_wictr" for="wictr_dod_pon" style="display:none">
             <input type="checkbox" id="wictr_dod_pon">Wybierz więcej<img class="obr_wic"  src="../../img/add.png"></label><div class="wictr_info">teraz możesz wybrać więcej niż 1 trasę</div>
             <input id="trasa_dod_pon">
             <br>
              <div class="dod_ogl_male_info">Poszczególne miasta oddzielaj myślnikiem "-"</div>  
           <!--  <option class="tr1" value="tr1">Nowa Ruda - Ścinawka - Kvasiny</option>
             <option class="tr2" value="tr2">Nowa Ruda - Kłodzko - Kvasiny</option>
             <option class="tr3" value="tr3">Kłodzko - kvasiny</option>
             <option class="tr4" value="tr4">Nysa - Kłodzko - Kvasiny</option>
             <option class="tr5" value="tr5">Bystrzyca Kł. - Spalona - Kvasiny</option>
             <option class="tr6" value="tr6">z Kudowy Zdr.</option>
             <option class="tr7" value="tr7">z lewina Kł.</option>
             <option class="tr8" value="tr8">Wałbrzych - Nachod - Kvasiny</option>-->
         
         <div style="clear:both"></div>
         </div></center>
       
       
 <div id="dod_pon_ogl_info"></div>
     
              <div class="sekcja_submit">
              <button id="dod_pon_sub" type="submit">dodaj<img class="obr_wic" src="../../img/plus.png"/></button>
              </div>
             
              
          
         </form>
    
        
             
         </div>
        
         
      </div><!--profil ogloszenia -->
     
      <div id="profil_auto">
          
          <div id="profil_auto_lista">
              
          </div>
          
          <div id="profil_auto_usun">
              <div id="profil_auto_usun_nie" class="zamknij"><img src="../../img/left-arrow.png"></div>
           <center><div id="dod_ogl_aka">Usuń samochód</div></center>
              <div id="profil_auto_usun_info">
                  
                </div>
            <div id="profil_auto_usun_tak">Usuń</div>
          </div>
          
          <div id="profil_auto_edytuj">
              <div id="profil_auto_edytuj_anuluj" class="zamknij"><img src="../../img/left-arrow.png"></div>
           <center><div id="dod_ogl_aka">Edytuj samochód</div></center>
        
        <form id="profil_auto_edytuj_input">
                 <center><input type="text" id="profil_auto_edytuj_marka"  class="pole_dodaj_auto" maxlength="32"/></center>
                 <center><input type="text" class="pole_dodaj_auto" id="profil_auto_edytuj_model" maxlength="32"/></center>
                 <center><input type="text" class="pole_dodaj_auto" id="profil_auto_edytuj_kolor" maxlength="32"></center><div class="dod_ogl_akap">Podaj typ pojazdu:</div>
                 <center><select id="profil_auto_edytuj_typ" class="pole_dodaj_auto">
                     <option val="osobowy">osobowy</option>
                     <option val="bus">bus</option>
                 </select></center>
                 <center><input type="text" class="pole_dodaj_auto" id="profil_auto_edytuj_dwa" maxlength="2"></center>
                 <center> <div id="profil_auto_edytuj_info"></div><button type="submit" id="profil_auto_edytuj_click">edytuj<img src='../../img/pencil.png'/></button></center>
        </form>
              
              
          </div>
          
        <div id="profil_auto_dodaj">
          <div id="profil_auto_dodaj_anuluj" class="zamknij"><img src="../../img/left-arrow.png"></div>
          
        <center><div id="dod_ogl_aka">Dodaj samochód</div></center>
        
         <form id="profil_auto_input">
                 <center><input type="text" id="profil_auto_marka"  class="pole_dodaj_auto" placeholder="Podaj marke" minlength="4" maxlength="32"/></center>
                 <center><input type="text" class="pole_dodaj_auto" id="profil_auto_model" placeholder="Podaj model" maxlength="32"/></center>
                 <center><input type="text" class="pole_dodaj_auto" id="profil_auto_kolor" placeholder="podaj kolor" maxlength="32"></center><div class="dod_ogl_akap">Podaj typ pojazdu:</div>
                 <center><select id="profil_auto_typ" class="pole_dodaj_auto">
                     <option val="osobowy">osobowy</option>
                     <option val="bus">bus</option>
                 </select></center>
                 <center><input type="text" class="pole_dodaj_auto" id="profil_auto_dwa" placeholder="Podaj dwia ostatnie znaki z tablicy" maxlength="2"></center>
                 <center> <div id="profil_auto_info"></div><button type="submit" id="profil_auto_dodaj_click">dodaj<img src='../../img/plus.png'/></button></center>
        </form>

          </div>
          
      </div><!-- profil auto -->
       
     <!--  <div id="profil_op">
           
           
           <div id="profil_op_tobie">
               Opinie o Tobie
           </div>
           
           <div id="profil_op_usun">
             
               <p>Czy chcesz usunąć swoją odpowiedź?</p>
               <p id="usun_odp_info"></p>
               <p>Na Opinie:</p>
               <p id="usun_op_info"></p>
               
                  <div id="usun_odp_tak">USUN</div>
                <div class="odp_anuluj">ANULUJ</div>
               
                
            
           </div>
           
           <div id="profil_op_edytuj">
               <p id="profil_edytuj_op_info"></p>
               <p>Edytuj swoja Odpowiedź:</p>
               <input id="edytuj_odp_info"/>
               <input type="submit" id="edytuj_odp_input">
               <p>na opinie:</p>
               <p id="edytuj_op_info"></p>
               
               
               <div class="odp_anuluj">ANULUJ</div>
            </div>
           
           
           
           
           <div id="profil_op_twoje">
               Twoje opinie o innych
           </div>
           
           <div id="con_profil_op" style="height:75%;width:90%;overflow:auto">
               
           </div>
           
       </div><!-- profil opinie -->
      
  </section><!-- profil-->
  
</section><!-- glowna -->

<!--czy pala w busie zy zatrzymuja sie na stacji 
czy jezdzi powoli i bezpieczne czy ak debil-->

    

   

    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><img src='../../img/up-arrow.png'/></a>

    <!--====== BACK TOP TOP PART ENDS ======-->  

    <!--====== PART START ======-->



    <!--====== PART ENDS ======-->











    

</body>

</html>
<?php
}else{
    
   header("location:../../index.php");
}
?>