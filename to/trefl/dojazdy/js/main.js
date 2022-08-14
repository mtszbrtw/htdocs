$(function() {
    
    
    
    
     function wypisz_miejsce_pracy(miejsce_pracy_z_bazy){
        
        $.ajax({
         type: "GET",
         url: "../../assets/php/wypiszMiejscePracy.php?miejsce="+miejsce_pracy_z_bazy,
         async: false,
         success: function(odp){
        miejsce = odp;
        
         }
        });
        
        return miejsce;

    };


    
var MIEJSCE_PRACY = 'trefl';
    
    //USUNIETA KONIECZNOSC PODAWANIA MOEJSCA PRACY W DODAWANIU EDYCJI PONOWNYM DODAWANIU OGLOSZENIA
    //trzeba usunac wszedzie ifa ze sprawdzaniem czy te pole jest wypelnione, usunac wypelnianie wartoscia tego pola i usunac z index te pole w tej kolejnosci 
    //na glownej trzeba zmienic nazwe bo jest ypfzarow zamiast YPF - ŻARÓW
    //w edyvji po stronie php zrobic zeby nie aktualixowalo pola ak miejsceprqcy 
    
    
    
    
      $("#zglos_blad").click(function(){
        
         $('#zglos_pole_input').hide();
        $("#zglos_inne").hide();
        $("#tresc_bledu").val("");
       
       
    });
    
    
    $(".zglos_item").click(function(){
        
       var rodz = $(this).attr("id");
       
       if(rodz != "blad_inne"){
       
       $("#tresc_bledu_send").attr("rodz",rodz);
       
     $("#zglos_pole_input").show();
        
        $("#zglos_pole_input > h4").html($(this).html());
        $("#zglos_inne").hide();
        $("#tresc_inne").val("");
       }
        
    });
    
    $("#blad_inne").click(function(){
        
        
        $("#zglos_pole_input").hide();
        $("#zglos_inne").show();
        $("#tresc_bledu").val("");
        
    });
    
     $("#tresc_bledu_send").click(function(){
         
         
                 
       var rodz = $(this).attr("rodz");
       var tresc = $("#tresc_bledu").val();
       
       
       $.get("../../zglos.php","rodz="+rodz+"&tresc="+tresc,function(odp){
           
          
          
           
           alert("Dziękujemy za przesłanie zgłoszenia! dzięki tobie aplikacja się rozwija");
           
           $("#zglos_blad").click();
           
       });
         
         
         return false;
     });
    
     $("#tresc_bledu_send_inne").click(function(){
         
         
                 
       var rodz = "inny";
       var tresc = $("#tresc_inne").val();
       
       
       $.get("../../zglos.php","rodz="+rodz+"&tresc="+tresc,function(odp){
           
          
          
           alert("Dziękujemy za przesłanie zgłoszenia!");
           
           $("#zglos_blad").click();
           
       });
         
         
         return false;
     });
    
    
    if( window.history && window.history.pushState ){

  history.pushState( "nohb", null, "" );
  $(window).on( "popstate", function(event){
    if( !event.originalEvent.state ){
      history.pushState( "nohb", null, "" );
      return;
    }
  });
}

 


//1438 ogloszwnie ak click 

//1881 zmiana efytuuj 
   //dni 2180

//2969 ogloszenie zmiana 

//2994 usun 
   
//3187 dni kalendarz 

//3224 wyslij zn

//3468 filtrdni change 

//4111 dodaj click

//wic zm dod click 4332

//5572 menu wiad 

//6386 profil

//6844 profil ogl
     //edytuj 9640

//8157 profil ogl usun 
   //8515 dodaj ponownie 

//9235 profil auto

//3600 zrobic funkcje ze pierwszy i trzeci jakie filtry maja margin right 
//a pierwsze 2 maja margin bottom
//i wykonywac ja przy kazdym change foltta 

//chyba submity trzeba powkladac do gunkcji bo nie wczytuje pierwsE 
   
   // sprawdzic czy wiad w ak noe wykonuje interwalu 2x po wyslaniu wiad raz dla pierwsze rqz dla ze zwiekszyly sie ogl jesli tak to po wyslajiu nie ustawiac pierwsze tylko zejsc w divie moze bedzie wolniej ale mniejsze obciazenie bazy 
    
    
 //jak wyglada droga zasniezona itp
 
 
 
  function kto(){
        
        $.ajax({
         type: "GET",
         url: "../../kto.php",
         async: false,
         success: function(odp){
        kto = odp;
        
         }
        });
        
        return kto;

    };
  var kto = kto();
  
  
  
  $(document).ajaxStart(function(){
    $('.wait').show();
 }).ajaxStop(function(){
    $('.wait').hide();
 });

 
  
  
  $("#usun_ogl_dojazdy").hide(); //to przed fuckcje 
  $("#wyslij_ogl_dojazdy").hide();
  
   $("#ustawienia_wyslij").hide();
 $("#wyslij_usun_potwierdz").hide();
 //te dwa przed 
 $("#pole_obrazka").hide();
             $("#wyslij_obrazek_guzik").hide();
             
//ak to jest miejsce pracy!!

var limit_ogl =0;
var usunietych =0;


    

function pokaz_ogl(zmiana,dni,trasa,miejsca,ak){

function ile_ogl(){
        
        $.ajax({
         type: "GET",
         url: "ogloszenia.php",
         data: 'ile=123&filtrzmiana='+zmiana+'&filtrdni='+dni+'&filtrtrasa='+trasa+'&filtrmiejsca='+miejsca+"&miejsce_pracy="+ak,
         async: false,
         success: function(odp){
             
        ile = odp;
        
         }
        });
        
        return ile;

    };
    
    
  var ile_ogl = ile_ogl();
     
     $("#ogl_info").html("Ilość ogłoszeń "+ile_ogl+" :");
    
     
       if(ile_ogl != "0"){
       
       
      
       
       $.getJSON('ogloszenia.php?pokazogl=123&filtrzmiana='+zmiana+'&filtrdni='+dni+'&filtrtrasa='+trasa+'&filtrmiejsca='+miejsca+"&limit="+limit_ogl+"&miejsce_pracy="+ak,function(odp) {
           
         
       
               
               $("#koniec").html("");
           
           if(limit_ogl == 0){
             $("#ogloszenia").html("");
           }
             
             
            
             $.each(odp, function(k,w){
                 
                 // o ktorej wyjezdza ze swojego miast
                 
              if(kto == w.kto){
                     
                  optogl = "<div class='optogl'><div class='edytuj_optogl' id="+w.id+">edytuj<img class='optogl_obr' src='../../img/pencil.png'/></div><div class='usun_optogl' id="+w.id+">usuń<img class='optogl_obr' src='../../img/trash.png'/></div><div style='clear:both'></div></div>";
                     
                 }else{
                     
                     optogl = "<div class='optogl'><div class='wyslij_optogl' id="+w.id+">Wyślij wiadomość<img class='optogl_obr' src='../../img/send.png'/></div></div>";
                     
                 }
                 
                 var dodano = w.dodano;
                 dodano = dodano.split("-");
                 dodano = dodano[2][0]+dodano[2][1]+"."+dodano[1]+" "+dodano[2][3]+dodano[2][4]+dodano[2][5]+dodano[2][6]+dodano[2][7];
                 
               /*  function imie(){
        
        $.ajax({
         type: "POST",
         url: "../../imie.php",
         data: { login : w.kto},
         async: false,
         success: function(odp){
        imie = odp;
        
         }
        });
        
        return imie;

    };
  var imie = imie();*/
  
  
  var jakiedni = [];
     
       if(w.dzien != ""){
       jakiedni.push(w.dzien);
       }
  if(w.dzien2 != ""){
       jakiedni.push(w.dzien2);
       }
  if(w.dzien3 != ""){
       jakiedni.push(w.dzien3);
       }
  if(w.dzien4 != ""){
       jakiedni.push(w.dzien4);
       }
       
  var jakiedn = jakiedni.join(", ");
                            
                 
                 
                 
                 
     var trasa = w.trasa;
    /* var tab_tr = [];
    trasa = trasa.split(",");
         
    for(let i =0;trasa.length> i;i++){
        
        tab_tr.push($("#"+trasa[i]).val());
        
        
        
    }
    
    
    
    tab_tr.join();
   */

   var miejsce = $("#"+w.miejsc).val();
                 
          if(jakiedn == "stale"){
     jakiedn = "na stałe";
 }       
                 
             $("#ogloszenia").append("<div class='ogloszenie' id="+w.id+" imie="+w.imie+"><div class='miejsce_pracy'>"+wypisz_miejsce_pracy(MIEJSCE_PRACY)+"<br></div><div class='rodzaj_zmiany'>"+w.zmiana+"</div><div class='ogl_trasa'>"+trasa+"</div><div class='ogl_jakie_dni'><hr>"+jakiedn+"<hr></div><div class='ogl_miejsce'>"+miejsce+"</div><div class='kto_kiedy_ogl'><img src='../../img/data.png'>"+dodano+" przez: "+w.imie+"</div></div>"+optogl);
            
              
             
             });//eavh
             
             //odtad 

             
                             $(".edytuj_optogl").click(function(){
                
                if(id_edytuj_ogl == undefined){
                
                var id_edytuj_ogl = $(this).attr("id");
                

                $("#edytuj_ogl_dojazdy").show().animate({
            scrollTop: 0,
        }, 100);
                
               $("body").css("overflow","hidden");
               
                
                $("#eod_close").click(function(){
                    $("body").css("overflow","auto");
                    $("#edytuj_ogl_dojazdy").hide();
                    
                     id_edytuj_ogl = undefined;
                     
                     ide = 0;
                  
                 $("#edytuj_ogl_info").html("");
                
  

                    $("#wiczm").prop("checked",false);
                     $("#wictr").prop("checked",false);
                    $("#zmiana_edytuj").attr("multiple",false);
                    
$("option").attr("selected",false);
                 $("input").attr("selected",false);
             $("input").attr("multiple",false);
                $("#tresc_edytuj").val("");
                
            
            $("#miejsca_edytuj option").attr("selected",false);
            $("#zmiana_edytuj option").attr("selected",false);
            $("#wiczm").attr("checked",false);
            
            $("#zmiana_edytuj").attr("multiple",false);
            
  
            $("#trasa_edytuj option").attr("selected",false);
            $("#wictr").attr("checked",false);
            
            $("#trasa_edytuj").attr("multiple",false);
             
             $("#zmiana_edytuj").prop("disabled",false);
            
             $("#wiczm").prop("disabled",false);
                 $(".wiczm_info").hide();
           
            $(".wictr_info").hide();

                
                 $(".label_wiczm").css({
              "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               $(".label_wicak").css({
              "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               $(".label_wictr").css({
              "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
             
           
                
                });//edytuj close 
    
    
               
                      
                
                //niektorzy jezdza na kilka ak na raz 
                
                
       
    if(id_edytuj_ogl != undefined && id_edytuj_ogl != 0){
                
   function uzeupelnij_pola_edycji(){
      
    
       
     $.getJSON("ogloszenia.php?po_edycji="+id_edytuj_ogl,function(odpo){
         
        //alert("ile pok 213");
                    
                    var tab_ogl = [];
                            $.each(odpo,function(k,w){
                  
                tab_ogl[id_edytuj_ogl] = {
                 "tresc":w.tresc,
                 "trasa":w.trasa,
                 "dzien":w.dzien,
                 "dzien2":w.dzien2,
                 "dzien3":w.dzien3,
                 "dzien4":w.dzien4,
                 "kto":w.kto,
                 "id":w.id,
                 "miejsce_pracy":w.miejsce_pracy,
                 "zmiana":w.zmiana,
                 "miejsc":w.miejsc,
                 "auto":w.auto
             };
                                
                             
                                
         });//utworzyc tablice tabogl po zaktualizowaniu danych i wyswietlic te dane za pomoca funkcji uzupelnij a jesli nie to kazdemu selectowi z osobna przypisac nawa wartosc a pozniej jeszcze zaktualizowac wyniki wyszukiwania na glownej
         
        
         
       $("#wiczm").click(function(){
            
            if($(this).prop("checked") == true){
                $("#zmiana_edytuj").attr("multiple","multiple");
                 $(".label_wiczm").css({
               "border":"0.1em inset grey",
               "background-color":"Honeydew"
               });
                
                $(".wiczm_info").show();
             
            }else{
                $("#zmiana_edytuj").attr("multiple",false);
                 $(".label_wiczm").css({
               "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               $(".wiczm_info").hide();
            }
            
            
            
            
        });
        

        
                $("#tresc_edytuj").val(tab_ogl[id_edytuj_ogl].tresc);
                
                $("#trasa_edytuj").val(tab_ogl[id_edytuj_ogl].trasa);
                
                $("."+tab_ogl[id_edytuj_ogl].miejsc).prop("selected",true);
               
              
                  $.getJSON("../../profil_auto.php","auto=wybrane",function(odpi){
              
               $("#twoje_auto_edytuj").html("");
             
         if(odpi == 0){
             
              $("#twoje_auto_edytuj").html("nie masz wybranego żadnego auta");
             
             
         }else{
              
            $.each(odpi,function(k,w){
                
                if(tab_ogl[id_edytuj_ogl].auto == w.id){
                    var wybr = "selected";
                }else{
                    var wybr = "";
                }
                
                
                
                 $("#twoje_auto_edytuj").append("<option value="+w.id+" "+wybr+">"+w.marka+" "+w.model+"</option>");
                
            });
              
         }
   });//auto edytuj get
                
               
        
              var tab_zmiana = tab_ogl[id_edytuj_ogl].zmiana.split(",");
                var ile_tab_zmiana = tab_zmiana.length;
                
                if(ile_tab_zmiana > 1){
                    $("#wiczm").click();
                    
                $("#zmiana_edytuj option").prop("selected",false);
                
                for(var i =0;i<=ile_tab_zmiana-1;i++){
                $("."+tab_zmiana[i]).prop("selected",true);
                }
                }else{
                   //tutej  
                    
                       $("."+tab_ogl[id_edytuj_ogl].zmiana ).prop("selected",true);
                    
                }
                

         

                
                var tab_trasa = tab_ogl[id_edytuj_ogl].trasa.split(",");
                var ile_tab_trasa = tab_trasa.length;
                
                
                
var jakiedni = [];
     
       if(tab_ogl[id_edytuj_ogl].dzien != ""){
       jakiedni.push(tab_ogl[id_edytuj_ogl].dzien);
       }
  if(tab_ogl[id_edytuj_ogl].dzien2 != ""){
       jakiedni.push(tab_ogl[id_edytuj_ogl].dzien2);
       }
  if(tab_ogl[id_edytuj_ogl].dzien3 != ""){
       jakiedni.push(tab_ogl[id_edytuj_ogl].dzien3);
       }
  if(tab_ogl[id_edytuj_ogl].dzien4 != ""){
       jakiedni.push(tab_ogl[id_edytuj_ogl].dzien4);
       }
       
      
   
   $.getJSON("../../podaj_dni.php",function(odp){
         var wybrane = [];
        //alert("3670");
       $("#dni_edytuj").html("");
    
        $("#dni_edytuj").prepend("<input type='text' id='dni_edytuj_input' style='display:none' disabled>");
            
    
                    $("#dni_edytuj_input").val(jakiedni);
            
            
             $("#dni_edytuj_input").after("<label for='stale_ed'><input class='dzien_ed' type='checkbox' value='stale' id='stale_ed'>na stałe</label>");
    
        $.each(odp,function(k,w){
            
            
         
            
                        $("#dni_edytuj").append("<label for='"+w+"_ed'><input class='dzien_ed' type='checkbox' id='"+w+"_ed' value="+w+">"+w+"</label>");
            
        
        });
        
          $("#dni_edytuj label[for='stale_ed']").css({
           "background-color":"azure",
           "font-weight":410
           
       });
      
       
      
      $(".dzien_ed").on("click",function(){
           
          if(!$(this).is(":checked")){
             
             
            var index = wybrane.indexOf($(this).val());
             
             wybrane.splice(index,1);
             
           
            $("#dni_edytuj label[for='"+$(this).attr("id")+"']").css({
               "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               

               
                 $("#dni_edytuj label[for='stale_ed']").css({
           "background-color":"azure",
           "font-weight":410
           
       });
      
              
                 
             
          }else{
              
              if($(this).attr("id") == "stale_ed")
              {
             
              $(".dzien_ed:not([id='stale_ed'])").attr("checked",false);
                  $("#dni_edytuj label").css({
            "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
       });
              
              wybrane.splice(0,4);
              
              }
              
              
              
              if(wybrane[0] == "stale"){
                    
                    wybrane.pop();//usuwa ostatni 
                  
                   $("#dni_edytuj label[for='stale_ed']").css({
               "border":"0.02em solid black",
               "background-color":"azure",
               "font-weight":410
               
               });
               
                  
                   $(".dzien_ed[id='stale_ed']").attr("checked",false);
                  
               }
              
               $("#dni_edytuj label[for='"+$(this).attr("id")+"']").css({
               "border":"0.1em inset grey",
               "background-color":"Honeydew"
               });
              
              if(wybrane.length == 4){
                  
                  //jesli jest juz wybrane 6 usuwa ostatni i dodaje ten vo kliknelismy 
                  var ostatnia = wybrane[3]+"_ed";
                  
                  
                  
                 
                  $(".dzien_ed[id='"+ostatnia+"']").prop("checked",false);
                  
      
                  
                  wybrane.pop();//usuwa ostatni 
                  
                  wybrane.push($(this).val());
                  
                  
               
               $("#dni_edytuj label[for='"+ostatnia+"']").css({
                "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               

                  
              }else{
              
              
              
              wybrane.push($(this).val());

              }
             
              
          }
          
        
          
          if(wybrane.length == 0){
              $("#dni_edytuj_input").val("podaj dni");
              
            
              
          }else{
          $("#dni_edytuj_input").val(wybrane);
          }
      
      });//.dnien click
      
      for(var i =0;jakiedni.length> i;i++){
           
           $(".dzien_ed[value='"+jakiedni[i]+"']").click();
       
           
           
           
       }
        
   });//get uzupelniajacy dniami edytuj dni
   
          
   
     });//get tworzacy tablice tabogl
                
   };//funkcja uzeupelnij_pola_edycji
   
   uzeupelnij_pola_edycji();
                
       $("#edytuj_submit").attr("oglo",0);
       $("#edytuj_submit").attr("ide",id_edytuj_ogl);
            
           
    }
                
    }//if id == undefined zeby nie nie uruchamiac baxy dla id0
             });//edytuj swoje ogl z glownej
             
             
             
             
            //dotad
                                               
               
             
               $("#edytuj_submit").click(function(){
    if($("#edytuj_submit").attr("oglo") == 0){
        
        
    
    if(ide == undefined){
      
   
    
    
   var ide = $(this).attr("ide");
                    
      var zmiana_ed = $("#zmiana_edytuj").val();
    
      var trasa_ed = $("#trasa_edytuj").val();
      
      var miejsc_ed = $("#miejsca_edytuj").val();
      
      var tresc_ed = $("#tresc_edytuj").val();
                    
      var auto_ed = $("#twoje_auto_edytuj").val();
              
                if(trasa_ed == ""){
               $("#edytuj_ogl_info").html("Podaj trasę").show();
           }else{
    
             
 $.getJSON("ogloszenia.php?po_edycji="+ide,function(odpo){
    
    //alert("580");
                    
                    var tab_ogl = [];
                            $.each(odpo,function(k,w){
                  
                tab_ogl[ide] = {
                 "tresc":w.tresc,
                 "trasa":w.trasa,
                 "dzien":w.dzien,
                 "dzien2":w.dzien2,
                 "dzien3":w.dzien3,
                 "dzien4":w.dzien4,
                 "kto":w.kto,
                 "id":w.ide,
                 "zmiana":w.zmiana,
                 "miejsc":w.miejsc,
                 "auto":w.auto
             };
                               
         /* if(tab_ogl[ide].ak == ""){
                 tab_ogl[ide].ak = null;
             }
              
              if(tab_ogl[ide].zmiana == ""){
                 tab_ogl[ide].zmiana = null;
             }   
             
             */
                                
                            });//utworzyc tablice tabogl po zaktualizowaniu danych i wyswietlic te dane za pomoca funkcji uzupelnij a jesli nie to kazdemu selectowi z osobna przypisac nawa wartosc a pozniej jeszcze zaktualizowac wyniki wyszukiwania na glownej
                            
                            

                            
 var jakiedni = [];
     
       if(tab_ogl[ide].dzien != ""){
       jakiedni.push(tab_ogl[ide].dzien);
       }
  if(tab_ogl[ide].dzien2 != ""){
       jakiedni.push(tab_ogl[ide].dzien2);
       }
  if(tab_ogl[ide].dzien3 != ""){
       jakiedni.push(tab_ogl[ide].dzien3);
       }
  if(tab_ogl[ide].dzien4 != ""){
       jakiedni.push(tab_ogl[ide].dzien4);
       }
       
  var jakiedn = jakiedni.join(",");
                            
 /* alert(zmiana_ed+"=="+tab_ogl[ide].zmiana+" && "+ak_ed+"=="+tab_ogl[ide].ak+" && "+trasa_ed+"=="+tab_ogl[ide].trasa+" && "+miejsc_ed+"=="+tab_ogl[ide].miejsc+" && "+jakiedn+"=="+$("#dni_edytuj_input").val()+" && "+tresc_ed+"=="+tab_ogl[ide].tresc+" && "+auto_ed+"=="+tab_ogl[ide].auto+" id="+ide);
 */
 
      if(auto_ed == null){
          auto_ed = "";
      }
             
              if(zmiana_ed == tab_ogl[ide].zmiana && trasa_ed == tab_ogl[ide].trasa && miejsc_ed == tab_ogl[ide].miejsc && jakiedn == $("#dni_edytuj_input").val() && tresc_ed == tab_ogl[ide].tresc && auto_ed == tab_ogl[ide].auto){
                   
                    $("#edytuj_ogl_info").html("Nic nie zostało zmienione");
                }else{
                                       
                       if($("#dni_edytuj_input").val() == "podaj dni"){
                           
                           $("#edytuj_ogl_info").html("Musisz podać dni");
                           
                       }else{
                    
                    var dane_ed = {
                        "edytuj":true,
                        "id":ide,
                        "zmiana":zmiana_ed,
                        "miejsce_pracy":MIEJSCE_PRACY,
                        "trasa":trasa_ed,
                        "miejsc":miejsc_ed,
                        "tresc":tresc_ed,
                        "dni":$("#dni_edytuj_input").val(),
                        "auto":auto_ed
                    };
                    
                    if(ide != undefined && ide != 0){
                    
                    $.getJSON("../../profil_ogl.php",dane_ed,function(odp){
                        
                       //alert(odp);
                       
                        
                    if(odp == "ok"){
                    
                    
                    
  function imie(){
        
        $.ajax({
         type: "POST",
         url: "../../imie.php",
         data: { login : kto},
         async: false,
         success: function(odp){
       
        meno = odp;
         }
        });
        
       return meno;

    };
    
    var meno = imie();
    
           var data = new Date();
      
      
      function addZero(i) {
  if (i < 10) {i = "0" + i}
  return i;
}

   data = addZero(data.getDate())+"."+addZero((data.getMonth()+1))+" "+addZero(data.getHours())+":"+addZero(data.getMinutes());
                 

     var trasa = trasa_ed;//bylo #trasa_ed.val
   
  var jakiedn = $("#dni_edytuj_input").val();
    jakiedn = jakiedn.split(",");
    
  jakiedn = jakiedn.join(", ");
     
     
    
   
   var miejsce = $("#"+miejsc_ed).val();
                 
              if(jakiedn=="stale"){
                  jakiedn = "na stałe";
              } 
                 
             $("div #"+ide).html("<div class='miejsce_pracy'>"+wypisz_miejsce_pracy(MIEJSCE_PRACY)+"<br></div><div class='rodzaj_zmiany'>"+zmiana_ed+"</div><div class='ogl_trasa'>"+trasa+"</div><div class='ogl_jakie_dni'><hr>"+jakiedn+"<hr></div><div class='ogl_miejsce'>"+miejsce+"</div><div class='kto_kiedy_ogl'>Edytowane: "+data+" przez: "+meno+"</div>");
            
              
             
             
             
                    
                    $("#eod_close").click();
       
                  
                     $("#okienko_info").show().html("<div class='okienko_info'>Ogłoszenie zostało edytowane!</div>").delay(2500).fadeOut(1000);
  
          id_edytuj_ogl = 0;
          ide = 0;

                    }else{
                       // alert("odp no");
                    }
                    
                    
                    
                    });
                    }
                    
                     }
                
                    
                }//if
                
 });//get
 
    }
    }
    }//if attr oglo
                    return false;
                });//submit

             
                 
             
               $(".usun_optogl").click(function(){
                
                if(id_usun_ogl == undefined){
                
                $("#usun_ogl_dojazdy").show();
                $("#usun_click").show();
                $("#usun_click2").hide();
                
           var id_usun_ogl = $(this).attr("id");
                
            $("#usun_ogl_dojazdy_zamknij,.usun_ogl_anuluj").click(function(){
                    $("#usun_ogl_dojazdy").hide();
                   id_usun_ogl = undefined;
                });
                
        
      
                
     $.getJSON("ogloszenia.php?po_edycji="+id_usun_ogl,function(odpo){
                   
                   //alert(odpo);
                   
                    var tab_ogl = [];
                            $.each(odpo,function(k,w){
                  
                tab_ogl[id_usun_ogl] = {
                 "tresc":w.tresc,
                 "trasa":w.trasa,
                 "dzien":w.dzien,
                 "dzien2":w.dzien2,
                 "dzien3":w.dzien3,
                 "dzien4":w.dzien4,
                 "kto":w.kto,
                 "id":w.id,
                 "miejsce_pracy":w.miejsce_pracy,
                 "zmiana":w.zmiana,
                 "miejsc":w.miejsc,
                 "dodano":w.dodano
             };
                                
                                
         });
         
         
           var dodano = tab_ogl[id_usun_ogl].dodano;
                 dodano = dodano.split("-");
                 dodano = dodano[2][0]+dodano[2][1]+"."+dodano[1]+" "+dodano[2][3]+dodano[2][4]+dodano[2][5]+dodano[2][6]+dodano[2][7];
                 
                  var dni = [];
                         if(tab_ogl[id_usun_ogl].dzien != ""){
                             dni.push(tab_ogl[id_usun_ogl].dzien);
                         }if(tab_ogl[id_usun_ogl].dzien2 != ""){
                             dni.push(tab_ogl[id_usun_ogl].dzien2);
                         }if(tab_ogl[id_usun_ogl].dzien3 != ""){
                             dni.push(tab_ogl[id_usun_ogl].dzien3);
                         }if(tab_ogl[id_usun_ogl].dzien4 != ""){
                             dni.push(tab_ogl[id_usun_ogl].dzien4);
                             
                         }
                         var tab_dni = [];
                         for(var i =0;dni.length> i;i++){
        
        if(dni[i] == "stale"){
            dni[i] = "na stałe";
        }
        
        tab_dni[i] = "<div class='info_dn'>"+dni[i]+"</div>";

    }
    
    tab_dni = tab_dni.join("");
                         
                         
                      
                   
    var zmiana = tab_ogl[id_usun_ogl].zmiana;
   
   
   
   var trasa = tab_ogl[id_usun_ogl].trasa;
     /*var tab_tr = [];
    trasa = trasa.split(",");
                
   for(var i =0;trasa.length> i;i++){
        
        tab_tr.push((i+1)+". "+$("#"+trasa[i]).val());
        tab_tr[i] = "<div class='inny_kolor123'>"+tab_tr[i]+"</div>";

    }
    
    
    
   tab_tr = tab_tr.join(" ");*/
   tab_tr = trasa.replaceAll("-","<img src='../../img/right-arrow.png' class='strzalka_trasa'/>");
                         
                       
         
         $("#data_dod_usun").html(dodano);
         $("#dni_usun").html(tab_dni);
         $("#zmiana_usun").html("<b>"+zmiana+"</b>");
         $("#miejsce_pracy_usun").html("<b>"+wypisz_miejsce_pracy(MIEJSCE_PRACY)+"</b>");
         $("#trasa_usun").html(tab_tr);
             
              
              
              
              
     });//get robiacy tab_ogl
     
         $("#usun_ogl_doj_click").click(function(){
             
             //teraz dodac zapytanie zy znalazles pasazera tak nie anuluj i ogl9szenie raczej dodam do osobistego archiwum a nie usune pozniej mozna je ponownie dodac itp
             
             //jak usuwam odtatnia wiadomosc albo dodaje ostatnie ogloszenie z arvhiwum to zostaje pomimo ze jest usuniete dopirto jak sie odsierzy to znika 
             
        
                   
                   $("#usun_ogl_dojazdy p").html("czy znalazłeś pasażera?");
                   
                   
                   $("#usun_click").hide();
                   $("#usun_click2").show();
                   
                   
                   
           $(".usun_ogl_ost").click(function(){
                  
                 var znalazl = $(this).attr("value");
                    
                    
                
                if(id_usun_ogl != undefined && id_usun_ogl != 0){
             $.getJSON("../../profil_ogl.php?usun="+id_usun_ogl+"&znalazl="+znalazl+"&miejsce_pracy="+MIEJSCE_PRACY,function(odp){
                 
              
                 if(odp == "ok"){
                 
                usunietych = usunietych +1;
                 
                 $("#usun_click2").hide();
                 $("#usun_ogl_dojazdy").hide();;
                
                
                
 $("#okienko_info").show().html("<div class='okienko_info'>Ogłoszenie zostało przeniesione do archiwum!</div>").delay(2500).fadeOut(1000);
               
              setTimeout(function(){ 
    $("div #"+id_usun_ogl+",div #"+id_usun_ogl+"+table[id="+id_usun_ogl+"],div #"+id_usun_ogl+"+br").fadeOut(400);
                id_usun_ogl = 0;
                    $("#ogl_info").html("Ilość ogłoszeń "+(ile_ogl-usunietych)+" :");
                $(".usun_ogl_anuluj").click();
                
}, 800);

                 
             }else{
                 /*alert(odp);*/
             }
                 
             });
                }
                    
                });
                   
                  
         });//usun ogl potw 
         
         
        }
                
             });//usun ogloszenie z glownej
     
     
       
                  
             function xxs(){
                
              
             
                
                  $("#ustawienia_wyslij").show();
           
            $("#wyslij_ustaw").unbind();
            
           
            $("#wyslij_ustaw").click(function(){

                $("#ustawienia_wyslij").hide();
                $("#wyslij_usun_potwierdz").hide();
                            $("#wyslij_ustaw").unbind();
                            $("#wyslij_usun").unbind();
           $("#wyslij_ustaw").click(function(){
               
               xxs();
               
           });
                
                  
                  $("#wyslij_usun").click(function(){
                  xxs2();
                  });
           
                              
            });//wyslij ustaw

                
            
                  $("#wyslij_usun_potwierdz").hide();
                  
             }
             
             
             
               $("#wyslij_ustaw").click(function(){
             
             xxs();
            
              });
              
            
            function xxs2(){
                
                 
                
                 
                 
                $("#wyslij_usun_potwierdz").show();
                  
                  $("#wyslij_usun").unbind();
                  $("#wyslij_usun").click(function(){
                      
                      
                      
                      $("#wyslij_usun_potwierdz").hide();
                      $("#wyslij_usun").unbind();
                      
                       $("#wyslij_usun").click(function(){
                           xxs2();
                       });
                      
                      
                  });
              
                
            }
               
             
               $("#wyslij_usun").click(function(){
                
               xxs2();
                   
               });//wyslij usun 
             
              $("#wyslij_usun_potw_nie").click(function(){
                  $("#wyslij_ustaw").unbind();
                  $("#wyslij_usun").unbind();
                  
                  $("#wyslij_usun_potwierdz").hide();
                   $("#ustawienia_wyslij").hide();
                  $("#wyslij_ustaw").click(function(){
                  xxs();
                  });
                  
                  $("#wyslij_usun").click(function(){
                  xxs2();
                  });
              });
             


  $(".wyslij_optogl").click(function(){
                
                var pierwsze = "pierwsze";
  
               $("body").css("overflow","hidden");

              
                $("#wyslij_ogl_dojazdy").show();
                $("#ustawienia_wyslij").hide();
                $("#wyslij_usun_potwierdz").hide();
                
         var id_wiad = $(this).attr("id");
              

              
              $(".kto_z_kim").html($(".ogloszenie[id='"+id_wiad+"']").attr("imie"));
              
                
                $("#wyslij_tresc").html("");
 $("#wyslij_usun_potw_tak").attr("class","");
 $("#wyslij_usun_potw_tak").attr("class",id_wiad);
 
              


             
              
             
                
                function ilosc(){
        
        $.ajax({
         type: "POST",
         url: "../../wiadomosci.php",
         data:"ilosc=i&id="+id_wiad,
         async: false,
         success: function(odp){
         ilo = odp;
       
         }
        });
        
        return ilo;

    };
 var ilosc = ilosc();
 
 
 

 var inter = setInterval(function(){
     
                   if(id_wiad != undefined && id_wiad != 0){
                    
                    $.post("../../wiadomosci.php","ilosc=i&id="+id_wiad,function(odp){
                    
                   
                    
                    if(odp == 0){
                         $("#wyslij_tresc").html("<div id='pusta_wiad'>Nie zaczęto jeszcze rozmowy napisz jako pierwszy!</div>");
                    }
   
            
                        
                     if(pierwsze == "pierwsze" || odp > ilosc){
                 
                 //alert("wyk inter");
                  
                     $.getJSON("../../wiadomosci.php","tresc="+id_wiad,function(odp){
                   
                      $("#wyslij_tresc").html("");
                      
                      //alert(odp);
                      
                       
                   
                   $.each(odp,function(k,w){
                       
                
                    var daty = w.data;
                 daty= daty.split("-");
                   daty = daty[2][0]+daty[2][1]+"."+daty[1]+" "+daty[2][3]+daty[2][4]+daty[2][5]+daty[2][6]+daty[2][7];
                   
                  var tresc = w.tresc;
                    if(tresc[0] == "o" && tresc[1] == "b" && tresc[2] == "r" && tresc[3] == "1" && tresc[4] == "3" && tresc[5] == "2" && tresc[6] == ";"){
                        tresc = tresc.split(";");
                        tresc = "<img src='../../"+tresc[1]+"' alt='Nie można pobrać zdięcia'>";
                    }
                    
                    
                     
                    
                    
                       
                      if(w.nadawca == kto){
                       
                   
                   $("#wyslij_tresc").append("<div class='wiado' data="+w.id+"><div><div class='wiad_prawa'>"+tresc+"</div><div class='wiad_prawa_pomoc'></div></div><div style='clear:both;'></div><div class='data' style='text-align:right;display:none' data="+w.id+"><img src='../../img/data.png'>"+daty+"</div></div>");
                     }else{
                  $("#wyslij_tresc").append("<div class='wiado' data="+w.id+"><div><div class='wiad_lewa'>"+tresc+"</div><div class='wiad_prawa_pomoc'></div><div style='clear:both;'></div><div class='data' style='text-align:left;display:none' data="+w.id+"><img src='../../img/data.png'>"+daty+"</div></div>");
                     }
                       
                      
                       
                   });//each 
                   
                   
                   
                  
                  
                  $(".wiado").click(function(){
                       
                       var dat = $(this).attr("data");
                       
                       $(".data:not([data="+dat+"])").hide();
                      
                       
                      $(".data[data="+dat+"]").toggle();
                       
                  
                       
                   });
                   
                    $(".wiado").last().click(function(){
                         $('#wyslij_tresc').scrollTop($('#wyslij_tresc')[0].scrollHeight);    
                   });
                   
                  
                   
                   
                     
                     
                     
                     });//get 
                     
                   
                    
                 if(pierwsze == 0){
                   
                   ilosc++;
                   
                   
                     }
                     
                     if(pierwsze == "pierwsze"){
                         
                      
                        setTimeout(function(){
                         
                         $('#wyslij_tresc').scrollTop($('#wyslij_tresc')[0].scrollHeight);
                         
                        //alert('wyk');
                             
                         }, 100);
                         
                         
                     }
                       
                    
                     
                     
                     pierwsze = 0;
                     
                     }
                     
                     
                     
                        
                    });
                    
                   }
                  
                },400);
                
                
                  
                
                
              
                           $("#wyslij_ogl_dojazdy_zamknij").click(function(){
                               
               $("#wiad_obrazek").val("");
             $("#wiad_obrazek").change();
               
              
         $("body").css("overflow","auto");
          
          $("#wyslij_input").val("");
          $("#wyslij_ogl_dojazdy").hide();
               id_wiad= undefined;
               pierwsze = "pierwsze";
              clearInterval(inter);
                });//wyslij zamknij
          
          
      $("#wyslij_obrazek_form").attr("class",id_wiad);
         $("#wyslij_guzik").attr("class",id_wiad);// dlavzegp bez tego noe dziala ?
             
             
              
         
          
                 $("#wiad_obrazek").change(function(){
                 
        var image= $("#wiad_obrazek").val();
        if (image!=''){
            
            var tab_obr = image.split('\\');
            
            image = tab_obr[tab_obr.length-1];
           $("#pole_obrazka").show().html("<tr><td><div id='usun_obrazek'><img src='../../img/delete-button.png'></div></td><td><div id='nazwa_obr'>"+image+"</div></td></tr>");
           $("#wyslij_obrazek_guzik").show();
           
          
           $("#usun_obrazek").click(function(){
               
               $("#wiad_obrazek").val("");
               $("#wiad_obrazek").change();
           });
           
        }else{
            $("#pole_obrazka").hide();
            $("#wyslij_obrazek_guzik").hide();
        }
    });//wyslii obrazek change
         
         $("#wyslij_obrazek_form").submit(function(){
            
          
          if(id_wiad != undefined && id_wiad != 0){
               
               var formData = new FormData($(this)[0]);

               var nazwa_obrazka = $.now();
               
               formData.append("no",nazwa_obrazka);
               formData.append("id",id_wiad);
          $.ajax({
     url:"../../sendimg.php",
     method:"POST",
     data: formData,
     contentType:false,
     processData:false,
     success: function(output){
         
         if(output != "nn"){
         
        output = 'obr132;'+output;
         
        
         
         $("#wiad_obrazek").val("");
               $("#wiad_obrazek").change();
        
        $.post('../../wiadomosci.php',"wyslij="+output+"&id="+id_wiad,function(odp){
            

                 //alert("wysłano obrazek"+id_wiad);
                 
                  setTimeout(function(){
                         
                         $('#wyslij_tresc').scrollTop($('#wyslij_tresc')[0].scrollHeight+10000);
                         
                       // alert('wyk 2');
                             
                         }, 100);
           
                      
               });// post wyslij wiad
         }
     }
     
          
 });
 
  
 
          
}

               return false;
           });// wyslij obrazek submit 
           

             
              $("#wyslij_guzik").click(function(){
                
              if(id_wiad != undefined && id_wiad != 0){
                
                
                var tresc_wiad = $("#wyslij_input").val();
             
                
                if(tresc_wiad != ""){
                   
               
             
                   
               $.post('../../wiadomosci.php',"wyslij="+tresc_wiad+"&id="+id_wiad,function(odp){
    
 
    
                  $("#wyslij_input").val("");
             
             
             
         //alert("wyslano wiad"+id_wiad);
          
 setTimeout(function(){
                         
                         $('#wyslij_tresc').scrollTop($('#wyslij_tresc')[0].scrollHeight);
                         
                       // alert('wyk 2');
                             
                         }, 100);
                  
                   
               });// post wyslij wiad
              
                }
               
              }
               
            });//jak jest poza to dodaje jeden tylko

             
           
             $("#wyslij_usun_potw_tak").click(function(){
                
               
                if($("#wyslij_usun_potw_tak").attr("class") != undefined && idu_wiad != 0){
                    
                     var idu_wiad = $(this).attr("class");
                
                
                
                  $.get("../../wiadomosci.php?usun="+id_wiad,function(odp){
                      
                    
                      
                      if(odp == "ok"){
                          
        $("body").css("overflow","auto");
                          
             $("#wyslij_ogl_dojazdy").hide();
             $("#wyslij_usun_potwierdz").hide();
              
             $("#ustawienia_wiad").hide();
             $("#wyslij_usun_potwierdz").hide();
           
             $("#okienko_info").show().html("<div class='okienko_info'>Konwersacja została usunięta!</div>").delay(2500).fadeOut(1000);
  
   $("#wyslij_ustaw").unbind();
                  $("#wyslij_usun").unbind();
                  
                 
                $("#wyslij_ustaw").click(function(){
                  xxs();
                  });
                  
                  $("#wyslij_usun").click(function(){
                  xxs2();
                  });
  
            
             
             $("#wyslij_usun_potw_tak").attr("class",undefined);
             clearInterval(inter);
             id_wiad = 0;
             
                      }else{
                         /* alert("blad");*/
                      }
                      
                      
                  });
                  
                }else{
                   /* alert(0);*/
                }
                  
              });//wysloj usun potw 
    
          
             });// pokaz wiaf z gl9wnej wiad optogl   

           
           
                      
           $(".ogloszenie").click(function(){
               
               $("body").css("overflow","hidden");
               if(id_ogl == undefined){
               
               
               $("#ogloszenie_strona").show();
              
              
               var id_ogl = $(this).attr("id");
               $("#ogloszenie_click").attr("class",id_ogl);
               $(".ogl_prof_click").attr("ide",id_ogl);
              
            
               
            $("#ogloszenie_zamknij").click(function(){
                $("body").css("overflow","auto");
                 $(".ogl_prof_click").attr("bylo",0);
               $("#ogloszenie_click").attr("bylo",0);
                $("#ogloszenie_strona").hide();
              id_ogl = 0;
             
            });//ogloszenie zamknij
     
              
              
            $("#ogloszenie_click").click();
             
              
            
              
              
           }
             
             });//ogloszenie click
               
                 $(".ogl_prof_click").click(function(){
                  
                 $(this).css({"border":"0.1em inset grey",
               "background-color":"Honeydew"});
               
               $("#ogloszenie_click").css({
               "border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
                 
                if($(".ogl_prof_click").attr("bylo") == undefined || $(".ogl_prof_click").attr("bylo") == 0){
                 
                  $("#ogl_prof_info").hide();
                   $("#ogl_prof_opinie").hide();
                 
                  $("#ogl_prof").show();
                 $("#ogl_prof_auto").show();
                 $("#oglprofauto").show();
                  $("#ogloszenie").hide();
                 
                 if(id_ogl == undefined){
                 
                  var id_ogl = $(this).attr("ide");
                 
              
                   
                   $("#ogl_prof_info").show();
                   $("#ogl_prof_opinie").hide();
                 
                 if(id_ogl != undefined && id_ogl != 0){
                 
                 $.getJSON("../../profil_oglasz.php?profil=info&id_ogl="+id_ogl+"&miejsce_pracy="+MIEJSCE_PRACY,function(odp){
                     

                     
                     
                   
                     
                    $.each(odp,function(k,w){
                         
                           if(w.data_rej.indexOf("0000") != -1){
           w.data_rej = "styczeń 2022";
       }
              
   
                         
                   $("#ogl_prof_info").html("<div class='dod_ogl_akap'>Imię :</div><div id='info_imie'>"+w.imie+"</div><div class='dod_ogl_akap'>Miasto :</div><div id='info_imie'>"+w.miasto+"</div><div class='dod_ogl_akap'>Miejsce Pracy: :</div><div id='info_imie'>"+wypisz_miejsce_pracy(w.miejsce_pracy)+"</div><div class='dod_ogl_akap'>Nr. telefonu :</div><div id='info_imie'>"+w.nr_tel+"</div><small><div class='dod_ogl_akap'>data dolączenia :</div><div id='info_imie'>"+w.data_rej+"</div></small>");
                         
               
                         
                     });
                     
                    
                     
                     
                 });
                 
                 }
                 
               
              
              /* 
               $("#ogl_prof_opinie_click").click(function(){
                   
                    $("#ogl_prof_info").hide();
                   $("#ogl_prof_opinie").show();
                   
               });
                 
             
              */
              
              $(".ogl_prof_click").attr("bylo",1);
                 }
                 
                
              
              
                }else if($(".ogl_prof_click").attr("bylo") == 1){
                    
                    $("#ogl_prof").show();
                  $("#ogl_prof_auto").show();
                   $("#oglprofauto").show();
                  $("#ogloszenie").hide();
                 
                  
                 
                    
                }
                
                
              
              });//ogl prof click
               
               $("#ogloszenie_click").click(function(){
                  
                  $(this).css({"border":"0.1em inset grey",
               "background-color":"Honeydew"});
               $(".ogl_prof_click").css({
               "border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
                  
                  $("#ogl_prof_auto").hide();
                   $("#oglprofauto").hide();
                  
                  if($("#ogloszenie_click").attr("bylo") == undefined || $("#ogloszenie_click").attr("bylo") == 0){
                  
                 $("#ogloszenie").show();
                 $("#ogl_prof_auto").hide();
                  $("#oglprofauto").hide();
                 $("#ogl_prof").hide();
                 
                 if(id_ogl == undefined){
                    
                    var id_ogl = $(this).attr("class");
                  
                 $.getJSON("../../profil_oglasz.php?ogl=info&id="+id_ogl+"&miejsce_pracy="+MIEJSCE_PRACY,function(odp){

                     
                     $.each(odp, function(k,w){
                         
                         var dni = [];
                         if(w.dzien != ""){
                             dni.push(w.dzien);
                         }if(w.dzien2 != ""){
                             dni.push(w.dzien2);
                         }if(w.dzien3 != ""){
                             dni.push(w.dzien3);
                         }if(w.dzien4 != ""){
                             dni.push(w.dzien4);
                             
                         }
                         var tab_dni = [];
                         for(var i =0;dni.length > i;i++){
        if(dni[i] == "stale"){
            dni[i] = "na stałe";
        }
        
        tab_dni[i] = "<div class='info_dn'>"+dni[i]+"</div>";

    }
    
    tab_dni = tab_dni.join("");
                         
                         
                      
                    
    var zmiana = w.zmiana;
    zmiana = zmiana.split(",");
     var tab_zm = [];
                      
                       for(var i =0;zmiana.length > i;i++){
        
        
        tab_zm[i] = "<div class='info_zm'>"+zmiana[i]+"</div>";

    }
    
    tab_zm = tab_zm.join(" ");
                     
                        
                           
                    var zmiana = tab_zm;
                        
                         
                  var miejsce_pracy = wypisz_miejsce_pracy(w.miejsce_pracy);
                         
                        
                   var dodano = w.dodano;
                 dodano = dodano.split("-");
                 dodano = dodano[2][0]+dodano[2][1]+"."+dodano[1]+" "+dodano[2][3]+dodano[2][4]+dodano[2][5]+dodano[2][6]+dodano[2][7];
            
                         function imie(){
        
        $.ajax({
         type: "POST",
         url: "../../imie.php",
         data: { login : w.kto},
         async: false,
         success: function(odp){
        imie = odp;
        
         }
        });
        
        return imie;

    };
  var imie = imie();
  
  
   var trasa = w.trasa;
   /*  var tab_tr = [];
    trasa = trasa.split(",");
                
   for(var i =0;trasa.length > i;i++){
        
        tab_tr.push((i+1)+". "+$("#"+trasa[i]).val());
        tab_tr[i] = "<div class='inny_kolor123'>"+tab_tr[i]+"</div>";

    }
    
    
    
   tab_tr = tab_tr.join(" ");
   */
   var tab_tr = trasa.replaceAll("-","<img src='../../img/right-arrow.png' class='strzalka_trasa'/>");
                        
                     
                        
                        $("#ogloszenie").html("<div class='dod_ogl_akap'>Trasa/y :</div><div id='info_trasa'>"+tab_tr+"</div><div class='dod_ogl_akap'>Zmiana/y :</div><div id='info_zmiana'>"+zmiana+"</div><div style='clear:both'></div><div class='dod_ogl_akap'>Miejsce Pracy:</div><div class='info_praca'>"+miejsce_pracy+"</div><div class='dod_ogl_akap'>Dni :</div><div id='info_dni'>"+tab_dni+"<div style='clear:both'></div></div><div class='dod_ogl_akap'>Treść :</div><div id='info_tresc'>"+w.tresc+"</div><div class='dod_ogl_akap'>Miejsc :</div><div id='info_miejsca'>"+$("#"+w.miejsc).val()+"</div><div id='info_dodano'>Dodane "+dodano+"</div>");      
                        $(".inny_kolor123:odd").css({"background-color":"#F9F9F9"});
                        
                         $(".info_ak:even").css({"background-color":"white"});
                     
                                            
                        
                        
                        $.getJSON("../../profil_oglasz.php?ogl=auto&id_auta="+w.auto,function(o){
                            

                           $.each(o,function(k,w){
                                
                       $("#ogl_prof_auto").html("<div class='dod_ogl_akap'>Marka :</div><div id='info_auto_marka' class='info_auto'>"+w.marka+"</div><div class='dod_ogl_akap'>Model :</div><div id='info_auto_model' class='info_auto'>"+w.model+"</div><div class='dod_ogl_akap'>Typ :</div><div id='info_auto_typ' class='info_auto'>"+w.typ+"</div><div class='dod_ogl_akap'>Kolor :</div><div id='info_auto_kolor' class='info_auto'>"+w.kolor+"</div><div id='img_auto'><img src='../../img/"+w.typ+".png'></div>");
                            });
                            
                        });//get auto 
                       
                         
                     });//each info ogl
                     
                     
                     
                 });//get info ogl
                 
                 }
                 
                  $("#ogloszenie_click").attr("bylo",1);
                  
                  }else if($("#ogloszenie_click").attr("bylo") == 1){
                      
                      $("#ogloszenie").show();
                 $("#ogl_prof_auto").hide();
                  $("#oglprofauto").hide()
                 $("#ogl_prof").hide();
                      
                      
                  }
                  
                  
              });
              
               
           
    

        
  $("#wait_dol").hide();
           
           
       });//get
      
       }else{
               $("#ogloszenia").html("<div class='koniec'>Brak ogłoszeń dla wybranych filtrów</div>");
               $("#koniec").html("");
           }
           
       
};




   //====== Menu
   
  var sekcja = $("#sekcja_menu");
 

  var dojazdy_menu = $("#dojazdy_menu");
  var droga_menu = $("#droga_menu");
  var forum_menu = $("#forum_menu");
  var czat_menu = $("#czat_menu");
  var profil_menu = $("#profil_menu");
  
 
    //== widok 
    
   var dojazdy = $("#dojazdy");
   var droga = $("#droga");
   var forum = $("#forum");
   var czat = $("#czat");
   
   var profil = $("#profil");
   
   var info = $("#info");
  
   
   var dodaj_ogloszenie_strona = $("#dodaj_ogloszenie_strona");
  
  dojazdy.hide();
  droga.hide();
  forum.hide();
  czat.hide();
  
  $("#edytuj_ogl_dojazdy").hide();
  
  profil.hide();
  
  info.hide();
  
  
  dodaj_ogloszenie_strona.hide();
  
  
    $("#dodaj_ogloszenie").click(function(){
         
         if(id_ogl == undefined){
         
         var id_ogl = 1;
         
         
         $("body").css("overflow","hidden");
         $("#infooarch").hide();
         $("#infoarch").click(function(){
            $("#infooarch").show("fast",function(){
                $("body").click(function(){
                    $("#infooarch").hide();
                    $("body").unbind();
                })
            });
            
         });
         
        
         
     
         
         dodaj_ogloszenie_strona.show().animate({
            scrollTop: 0,
        }, 100);
         
         
         $("#dodaj_zamknij").click(function(){
             
             $("#tresc_dodaj").val("");
            
            $("#miejsca_dodaj option").attr("selected",false);
            $("#zmiana_dodaj option").attr("selected",false);
            $("#wiczm_dod").attr("checked",false);
           
            $("#zmiana_dodaj").attr("multiple",false);
            
            $("#ak_dodaj").val("");
            
            
            $("#trasa_dodaj option").attr("selected",false);
            $("#wictr_dod").attr("checked",false);
            
            $("#trasa_dodaj").val("");
            
            $("#trasa_dodaj").attr("multiple",false);
             $("#dodaj_ogl_info").html("");
             
             $("#zmiana_dodaj").prop("disabled",false);
           
             $("#wiczm_dod").prop("disabled",false);
            
            
           
            
            $(".wiczm_info").hide();
           
            $(".wictr_info").hide();
 
  
            $(".label_wiczm").css({
              "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
              
               $(".label_wictr").css({
              "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
             
               
             
             dodaj_ogloszenie_strona.hide();
             $("body").css("overflow","auto");
             id_ogl =0;
             
           
         });//dodaj zamknij 
         
         
    
         
       // to oryginalny grt dni 
 $.getJSON("../../podaj_dni.php",function(odp){
         var wybrane = [];
        //alert("3670");
       $("#dni_dodaj").html("");
    
        $("#dni_dodaj").prepend("<input type='text' id='dni_dodaj_input' style='display:none' disabled>");
            
    
               $("#dni_dodaj_input").val("podaj dni");
            
            
             $("#dni_dodaj_input").after("<label for='stale_dod'><input class='dzien_dod' type='checkbox' value='stale' id='stale_dod'>na stałe</label>");
    
        $.each(odp,function(k,w){
            
            
         
            
                        $("#dni_dodaj").append("<label for='"+w+"_dod'><input class='dzien_dod' type='checkbox' id='"+w+"_dod' value="+w+">"+w+"</label>");
            
        
        });
        
          $("#dni_dodaj label[for='stale_dod']").css({
           "background-color":"azure",
           "font-weight":410
           
       });
      
      
      $(".dzien_dod").on("click",function(){
           
          if(!$(this).is(":checked")){
             
             
            var index = wybrane.indexOf($(this).val());
             
             wybrane.splice(index,1);
             
           
            $("#dni_dodaj label[for='"+$(this).attr("id")+"']").css({
               "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               

               
                 $("#dni_dodaj label[for='stale_dod']").css({
           "background-color":"azure",
           "font-weight":410
           
       });
      
              
                 
             
          }else{
              
              if($(this).attr("id") == "stale_dod")
              {
             
              $(".dzien_dod:not([id='stale_dod'])").attr("checked",false);
                  $("#dni_dodaj label").css({
            "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
       });
              
              wybrane.splice(0,4);
              
              }
              
              
              
              if(wybrane[0] == "stale"){
                    
                    wybrane.pop();//usuwa ostatni 
                  
                   $("#dni_dodaj label[for='stale_dod']").css({
               "border":"0.02em solid black",
               "background-color":"azure",
               "font-weight":410
               
               });
               
                  
                   $(".dzien_dod[id='stale_dod']").attr("checked",false);
                  
               }
              
               $("#dni_dodaj label[for='"+$(this).attr("id")+"']").css({
               "border":"0.1em inset grey",
               "background-color":"Honeydew"
               });
              
              if(wybrane.length == 4){
                  
                  //jesli jest juz wybrane 6 usuwa ostatni i dodaje ten vo kliknelismy 
                  var ostatnia = wybrane[3]+"_dod";
                  
                  
                  
                 
                  $(".dzien_dod[id='"+ostatnia+"']").prop("checked",false);
                  
      
                  
                  wybrane.pop();//usuwa ostatni 
                  
                  wybrane.push($(this).val());
                  
                  
               
               $("#dni_dodaj label[for='"+ostatnia+"']").css({
                "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               

                  
              }else{
              
              
              
              wybrane.push($(this).val());

              }
             
              
          }
          
        
          
          if(wybrane.length == 0){
              $("#dni_dodaj_input").val("podaj dni");
              
            
              
          }else{
          $("#dni_dodaj_input").val(wybrane);
          }
      
      });//.dnien click
      
      
        
   });//get uzupelniajacy dniami edytuj dni
   
   

   $.getJSON("../../profil_auto.php","auto=wybrane",function(odp){
              //alert("3742");
               $("#twoje_auto_dodaj").html("");
              
         if(odp == 0){
             
              $("#twoje_auto_dodaj").val("nie masz wybranego zadnego auta");
             
             
         }else{
              
            $.each(odp,function(k,w){
                
               if(w.wybrane == 1){
                    var wybr = "selected";
                }else{
                    var wybr = "";
                }
                
                
                var wybr;
                 $("#twoje_auto_dodaj").append("<option value="+w.id+" "+wybr+">"+w.marka+" "+w.model+"</option>");
                
            });
            
            
       
              
         }
   });//auto dodaj get
   
   
 $("#wiczm_dod").click(function(){
            
            if($(this).prop("checked") == true){
                $("#zmiana_dodaj").attr("multiple","multiple");
                
                $(".label_wiczm").css({
               "border":"0.1em inset grey",
               "background-color":"Honeydew"
               });
                
                $(".wiczm_info").show();
             
                
            }else{
                $("#zmiana_dodaj").attr("multiple",false);
                 $(".label_wiczm").css({
              "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               
                 $(".wiczm_info").hide();
            }
            
       });
   
        
/* $("#wictr_dod").click(function(){
            
            if($(this).prop("checked") == true){
                $("#trasa_dodaj").attr("multiple","multiple");
                
                
                 $(".label_wictr").css({
               "border":"0.1em inset grey",
               "background-color":"Honeydew"
               });
                
                $(".wictr_info").show();
                
            }else{
                $("#trasa_dodaj").attr("multiple",false);
                
                 $(".label_wictr").css({
              "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               
                 $(".wictr_info").hide();
            }
            
            
        });
        
        */


      
         }
         
     });//dodaj ohloszenie
    
      $("#submit_dod").click(function(){
           
          
           if($("#zmiana_dodaj").attr("disabled") == "disabled"){
               var zmiana_dod = "";
           }else{
               var zmiana_dod = $("#zmiana_dodaj").val();
           }
     
     
     
               
           
      var ak_dod = $("#ak_dodaj").val();
      
      var trasa_dod = $("#trasa_dodaj").val();
      
      var miejsc_dod = $("#miejsca_dodaj").val();
      
      var tresc_dod = $("#tresc_dodaj").val();
      
      var dni_dod = $("#dni_dodaj_input").val();
      
      var auto_dod = $("#twoje_auto_dodaj").val();
    
       if(dni_dod != "podaj dni"){
           
           if(trasa_dod == ""){
               $("#dodaj_ogl_info").html("Podaj trasę").show();
           }else{
    
        var dane_dod = {
            "miejsce_pracy":MIEJSCE_PRACY,
            "trasa":trasa_dod,
            "miejsc":miejsc_dod,
            "tresc":tresc_dod,
            "dni":dni_dod,
            "zmiana":zmiana_dod,
            "auto":auto_dod
        };
        
        
       
        $.get("dodaj_ogloszenie.php",dane_dod,function(odp){
        
     
        
        
        
           if(odp == "dodano"){
               //alert("dodank");
               
                 $("#okienko_info").show().html("<div class='okienko_info'>Ogłoszenie zostało dodane!</div>").delay(2500).fadeOut(1000);
               
              
               
      var filtrzmiana = $("#filtrzmiana option:selected").attr("id");
      
      var filtrak = $("#filtrak option:selected").attr("id");
    
      var filtrtrasa = $("#filtrtrasa option:selected").attr("id");
      
      var filtrmiejsca = $("#filtrmiejsca option:selected").attr("id");
  
               
  
 limit_ogl = 0;
               
  pokaz_ogl(filtrzmiana,$("#dniinput").val(),filtrtrasa,filtrmiejsca,filtrak);
 
    

               $("#dodaj_zamknij").click();
               
         
           }else if(odp == "duzo"){
               

               $("#okienko_no_info").show().html("<div class='okienko_info'>masz już 3 ogłoszenia, edytuj istniejące lub usuń a następnie spróbuj ponownie</div>").delay(3500).fadeOut(2000);
               
                $("#dodaj_zamknij").click();
               
               
           }else{
               
              // alert(odp);
               
           }
            
        });
           }
       }else{
           
          $("#dodaj_ogl_info").html("Podaj dni, w których jeździsz").show();
           
       }//if dni puste
           
           return false;
       });// dodaj form submit 
        
  
  
  
  
      //skrypt pokazujacy czy mamy jakies nieprzeczytane wiad 
          //u dolu
      function ile_wiad(){    
  $.post("../../wiadomosci.php","nieprzecz=g",function(odp){
      
      var posi = $("#wiad_menu").position();
      
     $("#ile_wiad").css({
          "position":"absolute",
          "background-color":"#93F0FF",
          "top":posi.top,
          "left":posi.left,
          "width":"1.5em",
          "height":"1.5em",
          "font-size":"0.6em",
          "border-radius":"100%",
          "text-align":"center"
      }).hide();
      
      if(odp > 0){
          $("#ile_wiad").html(odp).show();
      }
        
       });
      };//funkcja ile wiad
      
      ile_wiad();
      
      setInterval(ile_wiad,15000);
  
  
  
  dojazdy_menu.click(function(){
      droga.hide();
      forum.hide();
      czat.hide();
      
      // dodac filtry i to ze nie wyswietla twoich ogl9szen

   

   
   // potzrebuje tylko ustawic zmienna zmiana odpowiedn8a wartowscia i w razie zmiany pobrac z bazy dane 
      
    // get opaakowac w funkcje i jako argument podac ak i wywolywac ja najpierw przy ak pobranym z baxy a pozniej przy kazdej zmianie chcange ewt ustawic ak z bazy hako selected to chyba lepsza opcja
      
      
     $("#jakie_filtry").hide();
      $("#aktywne_info").hide();
      $("#ogloszenie_strona").hide();
      
     

   
     
   
  
  
     
    ////// filtry glowne 
    
   
    //zmienna musi byc wewnatrz change inaczej zawsze jest pierwsza opcja
   
     
   //piwrwszy change ustawia dana wartosc tak zeby byl9 mozna sie do niej odwołać a drugi wykonuje funkcje 
    
$("#filtrdni").hide();
    $("#filtrdni_click").click(function(){
       
       
       
        $("#filtrdni").toggle();// ustawic na click i jak dodam inny dzial np forum a pozniej wroce i kl8knedni to caly czas dodaje to samo append
        
       
        if($("#filtrdni").is(":visible")){
            
           poprzednie = $("#filtrdni_click").html();
            
           
            
        
        }
        
        
        
        if(!$("#filtrdni").is(":visible")){
            
           

            
            
           if(poprzednie != $("#dniinput").val()){
               
             
             
            
              var filtrzmiana = $("#filtrzmiana option:selected").attr("id");
      
      var filtrak = $("#filtrak option:selected").attr("id");
    
      var filtrtrasa = $("#filtrtrasa option:selected").attr("id");
      
      var filtrmiejsca = $("#filtrmiejsca option:selected").attr("id");
   
   if($("#dniinput").val() == "wszystkie"){
        $("#jakie_dni").html("");
    }else{
        $("#jakie_filtry").show();
         $("#aktywne_info").show();
         
         
         if($("#dniinput").val() == "stale"){
              $("#jakie_dni").show().html("<div id='dni_tresc_marquee'> <img src='../../img/cross.png' class='jakie_obr'/>na stałe</div>");
         }else{
        
        $("#jakie_dni").show().html("<div id='dni_tresc_marquee'> <img src='../../img/cross.png' class='jakie_obr'/>"+$("#dniinput").val()+"</div>");
}
       
       if($("#dniinput").val().length > 18){
        $("#dni_tresc_marquee").marquee({
            duration:4000,
            delayBeforeStart: 1000,
            duplicated: true,
        });
       }
        
        
    }
     
     limit_ogl =0;
     
   
    
   /* alert(filtrzmiana+' '+filtrak+' '+filtrtrasa+' '+$("#dniinput").val()+' '+filtrmiejsca);*/
       
       pokaz_ogl(filtrzmiana,$("#dniinput").val(),filtrtrasa,filtrmiejsca,filtrak);
 
       
        }
        }
        

    });
    
    $("#dniinput").val("wszystkie");
    
 $.getJSON("../../podaj_dni.php",function(odp){
      var wybrane = [];
        
         $("#dniinput").after("<label for='stale'><input class='dzien' type='checkbox' value='stale' id='stale'>na stałe</label>");
    
        $.each(odp,function(k,w){
            
          
            $("#calendar").append("<label for="+w+"><input class='dzien' type='checkbox' id="+w+" value="+w+">"+w+"</label>");
            
       
        
        
        });
        
        
        $("#calendar").append("<label id='dni_close'>Zastosuj<br><img src='../../img/cross.png' class='zas_obr'/></label><div style='clear:both'></div>");
        
        
               
               $('#dni_close').css({
           "background-color":"SpringGreen"
       });
       $("label[for='stale']").css({
           "background-color":"azure",
           "font-weight":410
           
       });
       
       $('#dni_close').click(function(){
          
          $(this).css({
               "border":"0.1em inset grey",
               "background-color":"Honeydew"
               }).delay(1000).css({
               "border":"0.02em solid black",
               "background-color":"SpringGreen"
               })
          
           $("#filtrdni_click").click();
           
          
       });//dni close
       
       
      
      $(".dzien").on("click",function(){
           
          if(!$(this).is(":checked")){
              
              
               
               
             
            $("#calendar label:contains("+$(this).attr("id")+")").css({
               "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
             
            var index = wybrane.indexOf($(this).val());
             
             wybrane.splice(index,1);
             
              $("#filtrdni_click").html(wybrane.join());
              
              if($("#filtrdni_click").html() == "stale"){
                   $("#filtrdni_click").html("na stałe");
              }
             
          // $(".dzien").attr("disabled",false);
           
           
           //zrobic ze ostatni element tez odznaczam bo natazie tylko zmieniam kolor a element jeat dalej zaznaczonu 
           
           if(wybrane.length == 0){
               $("#filtrdni_click").html("Wybór dni<img src='../../img/calendar.png'/>");
           }
           
           if($(this).val() == "stale")
              {
             
              $("#calendar label[for='stale']").css({
               "border":"0.02em solid black",
               "background-color":"azure",
                "font-weight":410
               });
             
              }
             
           
       
       
    
             
          }else{
              
                if($(this).val() == "stale")
              {
              
              $(".dzien:not([value='stale'])").attr("checked",false);
              
              $("#calendar label:not([for='stale'])").css({
               "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               $('#dni_close').css({
           "background-color":"SpringGreen"
       });
              
              wybrane.splice(0,6);
              
           
              }
              
               $("#calendar label:contains("+$(this).attr("id")+")").css({
               "border":"0.1em inset grey",
               "background-color":"Honeydew"
               });
               
               if(wybrane[0] == "stale"){
                   
                    wybrane.pop();//usuwa ostatni 
                  
                   $("#calendar label[for='stale']").css({
               "border":"0.02em solid black",
               "background-color":"azure",
               "font-weight":410
               
               });
               
                  
                   $("#calendar input[id='stale']").attr("checked",false);
                   
               }
               
              if(wybrane.length >= 6){
                  
                  //jesli jest juz wybrane 6 usuwa ostatni i dodaje ten vo kliknelismy 
                  var ostatnia = wybrane[5];
                  
                  
                  
                 
                  $("#calendar input[id='"+ostatnia+"']").prop("checked",false);
                  
      
                  
                  wybrane.pop();//usuwa ostatni 
                  
                  wybrane.push($(this).val());
                  
                  $("#calendar label:contains("+ostatnia+")").css({
               "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               
               
               
              
             
                
                  
              }else{
              
              
              
               
              
            
              
              wybrane.push($(this).val());

              }
              
              
             
              
              
              $("#filtrdni_click").html(wybrane.join());
              if($("#filtrdni_click").html() == "stale"){
                   $("#filtrdni_click").html("na stałe");
              }
              
              
              
          }
          
          
          $("#jakie_dni").click(function(){
              
      var filtrzmiana = $("#filtrzmiana option:selected").attr("id");
      
      var filtrak = $("#filtrak option:selected").attr("id");
    
      var filtrtrasa = $("#filtrtrasa option:selected").attr("id");
      
      var filtrmiejsca = $("#filtrmiejsca option:selected").attr("id");
      
       /*  alert(filtrzmiana+' '+filtrak+' '+filtrtrasa+' '+$("#dniinput").val()+' '+filtrmiejsca+"jakiedni");*/
         
         limit_ogl =0;
         
         pokaz_ogl(filtrzmiana,"wszystkie",filtrtrasa,filtrmiejsca,filtrak);
 

         
         
        wybrane=[];
        
           $('.dzien').attr({
             "checked":false,
             "disabled":false
         });
              $("#dniinput").val("wszystkie");
              $("#jakie_dni").html("").hide();
              
              $("#filtrdni_click").html("Wybór dni<img src='../../img/calendar.png'/>");
              
               $("#calendar label").css({
               "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
             
               
               $('#dni_close').css({
           "background-color":"SpringGreen"
       });
       $("label[for='stale']").css({
           "background-color":"azure",
               "font-weight":410
       });
              
              
              if($("#jakie_dni").html() == "" && $("#jakie_zmiana").html() == "" && $("#jakie_ak").html() == "" && $("#jakie_trasa").html() == "" && $("#jakie_miejsca").html() == ""){

              $("#jakie_filtry").hide();
              $("#aktywne_info").hide();
              }
              
              
          });//usuwa wartosc z aktywnych filtrow i zeruje wszystkie parametry
          
          if(wybrane.length == 0){
              $("#dniinput").val("wszystkie");
              $("#jakie_dni").html("").hide();
              $("#jakie_filtry").hide();
              $("#aktywne_info").hide();
              
          }else{
          $("#dniinput").val(wybrane);
          }
          
          
           
      
      });//.dnien click
      
      
     /* $("#all_day").click(function(){
          alert();
      });*/
        
   });//get uzupelniajacy dniami filtr dni
    
 
    $("#filtrzmiana").on("change",function(){
        
      var filtrzmiana = $("#filtrzmiana option:selected").attr("id");
      
      var filtrak = $("#filtrak option:selected").attr("id");
    
      var filtrtrasa = $("#filtrtrasa option:selected").attr("id");
      
      var filtrmiejsca = $("#filtrmiejsca option:selected").attr("id");
   
 if($("#"+filtrzmiana).attr("id") == "all_zm"){
        $("#jakie_zmiana").html("").hide();
    }else{
        $("#jakie_filtry").show();
        $("#aktywne_info").show();
       
        $("#jakie_zmiana").show().html("<img src='../../img/cross.png' class='jakie_obr'/>"+filtrzmiana);
        
       
    }


  /* alert(filtrzmiana+' '+filtrak+' '+filtrtrasa+' '+$("#dniinput").val()+' '+filtrmiejsca);*/
limit_ogl =0;
   pokaz_ogl(filtrzmiana,$("#dniinput").val(),filtrtrasa,filtrmiejsca,filtrak);
 
   
   /*
  
    alert("klasa zmiana "+$("#filtrzmiana").attr("class")+" klasa ak "+$("#filtrak").attr("class"));
   */

    }).change();
   
    $("#filtrak").on("change",function(){
      
       var filtrzmiana = $("#filtrzmiana option:selected").attr("id");
      
      var filtrak = $("#filtrak option:selected").attr("id");
    
      var filtrtrasa = $("#filtrtrasa option:selected").attr("id");
      
      var filtrmiejsca = $("#filtrmiejsca option:selected").attr("id");
   
 if($("#"+filtrak).attr("id") == "all_fab"){
        $("#jakie_ak").html("").hide();
    }else{
        $("#jakie_filtry").show();
        $("#aktywne_info").show();
       
        $("#jakie_ak").show().html("<img src='../../img/cross.png' class='jakie_obr'/>"+filtrak);
        
       
    }
limit_ogl =0;

   /*alert(filtrzmiana+' '+filtrak+' '+filtrtrasa+' '+$("#dniinput").val()+' '+filtrmiejsca);*/
 
   pokaz_ogl(filtrzmiana,$("#dniinput").val(),filtrtrasa,filtrmiejsca,filtrak);
 

    });
    
    
    
    $("#filtrtrasa").on("change",function(){
      
      
      var filtrzmiana = $("#filtrzmiana option:selected").attr("id");
      
      var filtrak = $("#filtrak option:selected").attr("id");
    
      var filtrtrasa = $("#filtrtrasa option:selected").attr("id");
      
      var filtrmiejsca = $("#filtrmiejsca option:selected").attr("id");
      

     if($("#"+filtrtrasa).attr("id") == "tr_all"){
        $("#jakie_trasa").html("");
    }else{
        $("#jakie_filtry").show();
        $("#aktywne_info").show();
        var trasa = $("#"+filtrtrasa).html();
       
        $("#jakie_trasa").show().html("<div id='trasa_tresc_marquee'> <img src='../../img/cross.png' class='jakie_obr'/>"+trasa+"</div>");

       
       if(trasa.length > 15){
        $("#trasa_tresc_marquee").marquee({
            duration:4200,
            delayBeforeStart: 1000,
            duplicated: true,
        });
       }
        
       
        
    }
    
   
 /* alert(filtrzmiana+' '+filtrak+' '+filtrtrasa+' '+$("#dniinput").val()+' '+filtrmiejsca);*/
    limit_ogl =0;
    pokaz_ogl(filtrzmiana,$("#dniinput").val(),filtrtrasa,filtrmiejsca,filtrak);
 
    
    });
    
    $("#filtrmiejsca").on("change",function(){
      
      var filtrzmiana = $("#filtrzmiana option:selected").attr("id");
      
      var filtrak = $("#filtrak option:selected").attr("id");
    
      var filtrtrasa = $("#filtrtrasa option:selected").attr("id");
      
      var filtrmiejsca = $("#filtrmiejsca option:selected").attr("id");
   
  
     if($("#"+filtrmiejsca).attr("id") == "all_sites"){
        $("#jakie_miejsca").html("").hide();
    }else{
        $("#jakie_filtry").show();
        $("#aktywne_info").show();
        var miejsca = $("#"+filtrmiejsca).html();
        $("#jakie_miejsca").show().html("<img src='../../img/cross.png' class='jakie_obr'/>"+miejsca);
        
    }
    
  
    
     
  /* alert(filtrzmiana+' '+filtrak+' '+filtrtrasa+' '+$("#dniinput").val()+' '+filtrmiejsca);*/
   limit_ogl =0;
   pokaz_ogl(filtrzmiana,$("#dniinput").val(),filtrtrasa,filtrmiejsca,filtrak);
 

      
  }); //filtr miejsca 2 change 



$(".jakie_filtr").click(function(){
    
    
    
         if($(this).attr("id") == "jakie_ak"){
             
              $("#filtrak option").attr("selected",false);
        
        $("#jakie_ak").html("").hide();
        
        
         
     var filtrzmiana = $("#filtrzmiana option:selected").attr("id");
      
      var filtrak = $("#filtrak option:selected").attr("id");
    
      var filtrtrasa = $("#filtrtrasa option:selected").attr("id");
      
      var filtrmiejsca = $("#filtrmiejsca option:selected").attr("id");
   
  /* alert(filtrzmiana+' '+filtrak+' '+filtrtrasa+' '+$("#dniinput").val()+' '+filtrmiejsca);*/
        
         if($("#jakie_dni").html() == "" && $("#jakie_zmiana").html() == "" && $("#jakie_ak").html() == "" && $("#jakie_trasa").html() == "" && $("#jakie_miejsca").html() == ""){
             
              $("#jakie_filtry").hide();
              $("#aktywne_info").hide();
              }
limit_ogl =0;

pokaz_ogl(filtrzmiana,$("#dniinput").val(),filtrtrasa,filtrmiejsca,filtrak);
 

        }else if($(this).attr("id") == "jakie_zmiana"){
             
       
        $("#filtrzmiana option").attr("selected",false);
        
        $("#jakie_zmiana").html("").hide();
        
        
         
     var filtrzmiana = $("#filtrzmiana option:selected").attr("id");
      
      var filtrak = $("#filtrak option:selected").attr("id");
    
      var filtrtrasa = $("#filtrtrasa option:selected").attr("id");
      
      var filtrmiejsca = $("#filtrmiejsca option:selected").attr("id");
   
   /*alert(filtrzmiana+' '+filtrak+' '+filtrtrasa+' '+$("#dniinput").val()+' '+filtrmiejsca);*/
        
         if($("#jakie_dni").html() == "" && $("#jakie_zmiana").html() == "" && $("#jakie_ak").html() == "" && $("#jakie_trasa").html() == "" && $("#jakie_miejsca").html() == ""){
             
              $("#jakie_filtry").hide();
              $("#aktywne_info").hide();
              }
limit_ogl =0;

pokaz_ogl(filtrzmiana,$("#dniinput").val(),filtrtrasa,filtrmiejsca,filtrak);
 

         }else if($(this).attr("id") == "jakie_miejsca"){
             
       
        $("#filtrmiejsca option").attr("selected",false);
        
        $("#jakie_miejsca").html("").hide();
        
 
     var filtrzmiana = $("#filtrzmiana option:selected").attr("id");
      
      var filtrak = $("#filtrak option:selected").attr("id");
    
      var filtrtrasa = $("#filtrtrasa option:selected").attr("id");
      
      var filtrmiejsca = $("#filtrmiejsca option:selected").attr("id");
   
 /*  alert(filtrzmiana+' '+filtrak+' '+filtrtrasa+' '+$("#dniinput").val()+' '+filtrmiejsca);*/
        if($("#jakie_dni").html() == "" && $("#jakie_zmiana").html() == "" && $("#jakie_ak").html() == "" && $("#jakie_trasa").html() == "" && $("#jakie_miejsca").html() == ""){

              $("#jakie_filtry").hide();
               $("#aktywne_info").hide();
              }
              
              limit_ogl =0;
              
              pokaz_ogl(filtrzmiana,$("#dniinput").val(),filtrtrasa,filtrmiejsca,filtrak);
 
         
         }else if($(this).attr("id") == "jakie_trasa"){
        
           
           $("#filtrtrasa option").attr("selected",false);
           
        $("#jakie_trasa").html("").hide();
          
          if($("#jakie_dni").html() == "" && $("#jakie_zmiana").html() == "" && $("#jakie_ak").html() == "" && $("#jakie_trasa").html() == "" && $("#jakie_miejsca").html() == ""){

              $("#jakie_filtry").hide();
               $("#aktywne_info").hide();
              }
          
        
     var filtrzmiana = $("#filtrzmiana option:selected").attr("id");
      
      var filtrak = $("#filtrak option:selected").attr("id");
    
      var filtrtrasa = $("#filtrtrasa option:selected").attr("id");
      
      var filtrmiejsca = $("#filtrmiejsca option:selected").attr("id");
   
  /* alert(filtrzmiana+' '+filtrak+' '+filtrtrasa+' '+$("#dniinput").val()+' '+filtrmiejsca);*/
    }
   
   limit_ogl =0;
   
     pokaz_ogl(filtrzmiana,$("#dniinput").val(),filtrtrasa,filtrmiejsca,filtrak);
 
     
    });

        
     dojazdy.show();
     
});//dojazdy menu
  
  droga_menu.click(function(){
      dojazdy.hide();
      forum.hide();
      czat.hide();
      droga.show();
  });
  
   
  
  forum_menu.click(function(){
      dojazdy.hide();
      forum.show();
      czat.hide();
      droga.hide();
  });
  
  
  czat_menu.click(function(){
      dojazdy.hide();
      forum.hide();
      czat.show();
      droga.hide();
  });
  
  
  var wiadomosci_menu = $("#wiad_menu");
  
  $("#wiadomosci").hide();
  $("#wyslij_wiad").hide();

          
   
          
          
  
  wiadomosci_menu.click(function(){
      

      
      $("#wiadomosci").show();
     $("body").css("overflow","hidden");
     
     
      
      $(".wiadomosci_zamknij").click(function(){
          
          $("#wiadomosci").hide();
          $("#wyslij_wiad").hide();
          $("body").css("overflow","auto");
          id_ogl = undefined;
          pierwsze = "pierwsze";
          $("#koniec_wiad").html("");
         
           
          
      });
      
      
     
      
      
      $.getJSON("../../wiadomosci.php","pokaz=pokaz",function(odp){
          
       
          
          if(odp == "pusto"){
              $("#spis_wiad").html("<div id='menu_wiad_pusto'>Nie nawiązałeś żadnej konwersacji</div>");
          }else{
          
           $("#spis_wiad").html("");
        
          
         $.each(odp,function(k,w){
   
         
        
         //tresc ok
         
         
         
        var stan;
       
       var miejsc = w.miejsc
       
       if(miejsc != undefined && w.trasa != undefined){
       
        
        var zmiana = w.zmiana;
        
        
         
          if(zmiana.length>6){
            zmiana = zmiana.substr(0,7);
            zmiana = zmiana+"...";
        }
 
         
                         
                         
                         
              var jakiedni = [];
     
       if(w.dzien != ""){
       jakiedni.push(w.dzien);
       }
  if(w.dzien2 != ""){
       jakiedni.push(w.dzien2);
       }
  if(w.dzien3 != ""){
       jakiedni.push(w.dzien3);
       }
  if(w.dzien4 != ""){
       jakiedni.push(w.dzien4);
       }           
                         
                  jakiedni = jakiedni.join(",");
                    
                    if(jakiedni.length > 11){
                        
                    
                      jakiedni = jakiedni.substr(0,12);
                    jakiedni += "...";
                        
                    }
                    
                    miejsc = $("#"+miejsc).val();
                    
                    
                  var id_oglo = w.id_ogl;
        id_ogli = id_oglo.split("_");
        
        if(id_ogli[1] == undefined){
        
        
        var ak = w.ak;
        
         if(w.zmiana == ""){
                 var rodzaj_zmiany = ak;
              
                         }else if(ak == ""){
                             var rodzaj_zmiany = zmiana;
                         }else{
                          
                    var rodzaj_zmiany = ak+" "+zmiana;
                         }
                         
                           var dane_wiad = jakiedni+" | "+miejsc+" | "+rodzaj_zmiany;
        
        var miejsce_pracy = "SKODA";
                         
        }else{
          
            
            var miejsce_pracy = id_oglo[1];
            miejsce_pracy = miejsce_pracy.toUpperCase();
            var rodzaj_zmiany = zmiana;
            
             var dane_wiad = jakiedni+" | "+miejsc+" | "+rodzaj_zmiany;
        
            
        }
 
        
        
       }else{
             var dane_wiad = "Ogłoszenie zostało usunięte!";
           stan = "del";
       }
         
                           var id_oglo = w.id_ogl;
        id_oglo = id_oglo.split("_");
         
         
        if(id_oglo[1] == undefined){
            
             var miejsce_pracy = "SKODA";
            
            }else{
                var miejsce_pracy = id_oglo[1];
            miejsce_pracy = miejsce_pracy.toUpperCase();
            }
            
        
       
           if(kto == w.nadawca){
               var druga = w.odbiorca;
           }else if(kto == w.odbiorca){
              var druga = w.nadawca;
           }
           
         
              
           
             
                
            
            
              
              var daty = w.ostatnia_data;
                 daty= daty.split("-");
                   daty = daty[2][0]+daty[2][1]+"."+daty[1]+" "+daty[2][3]+daty[2][4]+daty[2][5]+daty[2][6]+daty[2][7];
              
              var tresc = w.tresc;
                    if(tresc[0] == "o" && tresc[1] == "b" && tresc[2] == "r" && tresc[3] == "1" && tresc[4] == "3" && tresc[5] == "2" && tresc[6] == ";"){
                        tresc = "wysłano zdięcie";
                    }else if(tresc.length > 25){
                    
                    tresc = tresc.substr(0,25);
            tresc = tresc+"...";
         }
                    
                    
                    function imie(){
        
        $.ajax({
         type: "POST",
         url: "../../imie.php",
         data: { login : druga},
         async: false,
         success: function(odp){
        imie = odp;
        
         }
        });
        
        return imie;
  
  }
   var imie = imie();
  
  if(imie.length > 20){
      imie = imie.substr(0.20);
      imie += "...";
  }
  
  
     var id_oglo = w.id_ogl;
        id_oglo = id_oglo.split("_");
       
       
              
              $("#spis_wiad").append("<div id="+druga+" imie="+imie+" class='wiad' stan="+stan+" id_ogl="+w.id_ogl+"><div class='po_wsteczu1' id_ogl="+w.id_ogl+">"+miejsce_pracy+" "+imie+" : "+dane_wiad+"</div><div class='po_wsteczu' id_ogl="+w.id_ogl+"><div class='tresc_menu_wiad'>"+tresc+"</div></div><div class='kto_kiedy_ogl' id_ogl="+w.id_ogl+"><img src='../../img/data.png'>"+daty+"</div></div>");
              

    if(w.ostatnia != kto && w.przeczytane == 0){
                  $(".po_wsteczu1[id_ogl="+w.id_ogl+"]").css("font-weight",700);
              }
              
              
          });//eavh
          }
                      
      
          $(".wiad").click(function(){
              
              
                 
      $(".wiadomosci_zamknij").click(function(){
          clearInterval(inter);
          $("#wiadomosci").hide();
          $("#wyslij_wiad").hide();
          $("body").css("overflow","auto");
          id_ogl = undefined;
          pierwsze = "pierwsze";
          $("#koniec_wiad").html("");
         
           
          
      });
      
        
          var druga = $(this).attr("id");
          
          var pierwsze = "pierwsze";
          
          
          $(".kto_z_kim").html($(this).attr("imie"));
          
         id_ogl = $(this).attr("id_ogl");
          
         
         $("#wiado_obrazek_form").prop("class",id_ogl);
         $("#wiado_obrazek_form").attr("druga",druga);
         $("#wiado_obrazek_form").attr("miejsc",$(this).attr("miejsc"));
         
          $("#w_guzik").prop("class",id_ogl);
         $("#w_guzik").attr("druga",druga);
         $("#w_guzik").attr("stan",$(this).attr("stan"));
        
         $("#wiad_usun_potw_tak").attr("class",id_ogl);
         
         
        ;
         
              $("#wyslij_wiad").show();
              $("#wiad_tresc").html("");
            
       
     
       
    
        
                function ilosc(){
        
        $.ajax({
         type: "POST",
         url: "../../wiadomosci.php",
         data:"ilosc=i&id="+id_ogl,
         async: false,
         success: function(odp){
         ilo = odp;
        
         }
        });
        
        return ilo;

    };
 var ilosc = ilosc();
 
 if($(this).attr("miejsc") != "undefined" || pierwsze == "pierwsze"){
     
  var inter = setInterval(function(){
                    
                  //zrob8c tak ze co sekunde porownuje ilosc rekordow i jesli jest wiecej to odswieza robi each 
                  //trzeba w wiadomosciach wysylac ilosc ogloszen postem 
                 //alert("tresc_w="+druga+"&id_ogl="+id_ogl);
                   if(id_ogl != undefined && id_ogl != 0){
                    
                    $.post("../../wiadomosci.php","ilosc=i&id="+id_ogl,function(odp){

                    if(odp == 0){
                         $("#wiad_tresc").html("Nie zaczęto jeszcze rozmowy napisz jako pierwszy!");
                    }
                        
                      if(odp > ilosc || pierwsze == "pierwsze"){
                          
                   
                     $.getJSON("../../wiadomosci.php","tresc_w="+druga+"&id_ogl="+id_ogl,function(op){
                       
                        
                        
                          $("#wiad_tresc").html("");
                   
                   $.each(op,function(k,w){
                       
                
                
                    
                                           var daty = w.data;
                 daty= daty.split("-");
                   daty = daty[2][0]+daty[2][1]+"."+daty[1]+" "+daty[2][3]+daty[2][4]+daty[2][5]+daty[2][6]+daty[2][7];
                   
                   var tresc = w.tresc;
                    if(tresc[0] == "o" && tresc[1] == "b" && tresc[2] == "r" && tresc[3] == "1" && tresc[4] == "3" && tresc[5] == "2" && tresc[6] == ";"){
                        tresc = tresc.split(";");
                        tresc = "<img src='../../"+tresc[1]+"' alt='nie mozna pobrać zdięcia'>";
                        
                       // alert(tresc[1]);
                        
                    }
                   
                   if(w.nadawca == kto){
                        


                     $("#wiad_tresc").append("<div class='wiado' data="+w.id+"><div><div class='wiad_prawa' ost='ost'>"+tresc+"</div><div class='wiad_prawa_pomoc'></div></div><div style='clear:both;'></div></div><div class='data' style='text-align:right;display:none' data="+w.id+"><img src='../../img/data.png'>"+daty+"</div>");
                     }else{
                  $("#wiad_tresc").append("<div class='wiado' data="+w.id+"><div ost='ost' class='wiad_lewa'>"+tresc+"</div><div class='wiad_prawa_pomoc'></div><div style='clear:both;'></div></div><div class='data' style='text-align:left;display:none' data="+w.id+"><img src='../../img/data.png'>"+daty+"</div>");
                     }
                       
                     
                   });//each 
                   
                   $("#wiad_tresc").append("<br><br><br>");
                   
                  
                   
                   $(".wiado").click(function(){
                       
                       var dat = $(this).attr("data");
                       
                       $(".data:not([data="+dat+"])").hide();
                      
                       
                      $(".data[data="+dat+"]").toggle();
                       
                  
                       
                   });
                   
                    $(".wiado").last().click(function(){
                       $('#wiad_tresc').scrollTop($('#wiad_tresc')[0].scrollHeight);    
                   });
                   
                   
                 
                   
                  
                   });//get 
                   
                   if(pierwsze == 0){
                   
                   ilosc++;
                   
                   
                     }
                     
                     if(pierwsze == "pierwsze"){
                         
                      
                        setTimeout(function(){
                         
                  $('#wiad_tresc').scrollTop($('#wiad_tresc')[0].scrollHeight);   
                         }, 100);
                         
                         
                     }
                       
                    
                     
                     
                     pierwsze = 0;
                   
                   
                       }
                        
                    });
                    
                   
                   }
                  
                },300);
 } // chyba nie pokaze tresci w usunietym zrobiolem or pier == pier 
 
 
 $("#wstecz").click(function(){
     
      clearInterval(inter);
           
           
           
           if(id_ogl != undefined && id_ogl != 0){
           
          $(".po_wsteczu1[id_ogl="+id_ogl+"]").css("font-weight","normal");
           
           
             $("#wyslij_wiad").hide();
            
             
             pierwsze = "pierwsze";
            
            
             
             
             
             if($("#wiad_tresc div[ost=ost]").last().attr("class") == "wiad_lewa"){
                 
                 
                 if($(".po_wsteczu[id_ogl="+id_ogl+"]").html().indexOf($("#wiad_tresc div[ost=ost]").last().html()) == -1){
                     
                           
                var tresc = $("#wiad_tresc div[ost=ost]").last().html();
                
                if(tresc.indexOf("<img src") != -1){
                    tresc = "wysłano zdięcie";
                }
                
                var data = $("#wiad_tresc .data").last().html();
                 
                 
                                     $(".po_wsteczu[id_ogl="+id_ogl+"]").html("<div class='tresc_menu_wiad'>"+tresc+"</div>");
                   
                   $(".kto_kiedy_ogl[id_ogl="+id_ogl+"]").html(data);
                   
                  
                  $("#spis_wiad").prepend($(".wiad[id_ogl="+id_ogl+"]"));
                
                  
                 
                 
                     
                 }/*else{
                  var tresc = $("#wiad_tresc div[ost=ost]").last().html();
                
                if(tresc.indexOf("<img src") != -1){
                    tresc = "wysłano obrazek";
                }
                
                var data = $("#wiad_tresc .data").last().html();
                 
                 $(".po_wsteczu[id_ogl="+id_ogl+"]").html(data+" "+tresc+" nowe druga strona");
                  
             }*/

                 
             }
           
             
             id_ogl = undefined;
           
             
           }
             
          });//wstecz
          
 
 
          
     $("#poole_obrazka").hide();
             $("#wiado_obrazek_guzik").hide();
             
             
           
             $("#wiado_obrazek").change(function(){
                 
        var image= $("#wiado_obrazek").val();
        if (image!=''){
            
            var tab_obr = image.split('\\');
            
            image = tab_obr[tab_obr.length-1];
           $("#poole_obrazka").show().html("<tr><td><div id='usun_obrazek'><img src='../../img/delete-button.png'></div></td><td><div id='nazwa_obr'>"+image+"</div></td></tr>");
           $("#wiado_obrazek_guzik").show();
           
          
           $("#usun_obrazek").click(function(){
               
               $("#wiado_obrazek").val("");
               $("#wiado_obrazek").change();
           });
           
        }else{
            $("#poole_obrazka").hide();
            $("#wiado_obrazek_guzik").hide();
        }
    });//wyslii obrazek change
           
    
     $(".ustawienia_wyslij").hide();
     $(".wyslij_usun_potwierdz").hide();
            
     
             function xxs(){
                
              
             
                
                  $(".ustawienia_wyslij").show();
           
            $(".wyslij_ustaw").unbind();
            
           
            $(".wyslij_ustaw").click(function(){

                $(".ustawienia_wyslij").hide();
                $(".wyslij_usun_potwierdz").hide();
                            $(".wyslij_ustaw").unbind();
                            $(".wyslij_usun").unbind();
           $(".wyslij_ustaw").click(function(){
               
               xxs();
               
           });
                
                  
                  $(".wyslij_usun").click(function(){
                  xxs2();
                  });
           
                              
            });//wyslij ustaw

                
            
                  $(".wyslij_usun_potwierdz").hide();
                  
             }
             
             
             
               $(".wyslij_ustaw").click(function(){
             
             xxs();
            
              });
              
            
            function xxs2(){
                
                 
                
                 
                 
                $(".wyslij_usun_potwierdz").show();
                  
                  $(".wyslij_usun").unbind();
                  $(".wyslij_usun").click(function(){
                      
                      
                      
                      $(".wyslij_usun_potwierdz").hide();
                      $(".wyslij_usun").unbind();
                      
                       $(".wyslij_usun").click(function(){
                           xxs2();
                       });
                      
                      
                  });
              
                
            }
               
             
               $(".wyslij_usun").click(function(){
                
               xxs2();
                   
               });//wyslij usun 
             
              $(".wyslij_usun_potw_nie").click(function(){
                  $(".wyslij_ustaw").unbind();
                  $(".wyslij_usun").unbind();
                  
                  $(".wyslij_usun_potwierdz").hide();
                   $(".ustawienia_wyslij").hide();
                  $(".wyslij_ustaw").click(function(){
                  xxs();
                  });
                  
                  $(".wyslij_usun").click(function(){
                  xxs2();
                  });
              });
             

             $("#wiad_usun_potw_tak").click(function(){
                
               
                if($("#wiad_usun_potw_tak").attr("class") != undefined && id_wiad == undefined){
                    
                     var id_wiad = $(this).attr("class");
                
                if(id_wiad != undefined){
                  $.get("../../wiadomosci.php","usun="+id_wiad,function(odp){
                     
                      
                      if(odp == "ok"){
             
             $(".wiad_usun_potwierdz").hide();
              
             $(".ustawienia_wiad").hide();
             $(".wiad_usun_potwierdz").hide();
             
             $("#okienko_info").show().html("<div class='okienko_info'>Konwersacja została usunięta!</div>").delay(2500).fadeOut(1000);
  
   $(".wyslij_ustaw").unbind();
                  $(".wyslij_usun").unbind();
                  
                  
                  
                  $(".wyslij_ustaw").click(function(){
                  xxs();
                  });
                  
                  $(".wyslij_usun").click(function(){
                  xxs2();
                  });
  
            $(".wiad[id_ogl="+id_wiad+"]").fadeOut("slow");
             
             $("#wiad_usun_potw_tak").attr("class",undefined);
             

             id_wiad = undefined;
             clearInterval(inter);
             $("#wyslij_wiad").hide();
             
             
            
           
            
            
            
                      }
                      
                      
                  });
                }
                }else{
                   // alert(0);
                }
                  
              });//wysloj usun potw 
    
             
          });//wiad click
          
  
      
      });//get pokax
      

    
  });//wiadomosvi menu 
  

                            
$("#w_guzik").click(function(){
                
                
                if(id_ogl == undefined || id_ogl == 0){
                
                var id_ogl = $(this).attr("class");
            var druga = $(this).attr("druga");
            
            
            
            if($(this).attr("stan") == "del"){
               
                                  $("#wiad_input").val("");
       

            $("#infousunogl").show("fast",function(){
                $("body").click(function(){
                    $("#infousunogl").hide();
                    $("body").unbind();
                })
            });

         
                
                
            }else{
                
                var tresc_wiad = $("#wiad_input").val();
               
                

               //tu wszystko ok 
               if(tresc_wiad != ''){
                 
              if(id_ogl != 0 && id_ogl != undefined){
               $.post('../../wiadomosci.php',"wyslij_w="+tresc_wiad+"&druga="+druga+"&id_ogl="+id_ogl,function(odp){
                   

                  $("#wiad_input").val("");
                  
                
                         var data = new Date();
      
      
      function addZero(i) {
  if (i < 10) {i = "0" + i}
  return i;
}

   data = addZero(data.getDate())+"."+addZero((data.getMonth()+1))+" "+addZero(data.getHours())+":"+addZero(data.getMinutes());
                  
                  /*$(".po_wsteczu[id_ogl="+id_ogl+"]").html(data+" "+tresc_wiad+" nowee");*/
                 
                  if(tresc_wiad.length > 25){
                    
                    tresc_wiad = tresc_wiad.substr(0,25);
            tresc_wiad = tresc_wiad+"...";
         }
                  
                   $(".po_wsteczu[id_ogl="+id_ogl+"]").html("<div class='tresc_menu_wiad'>"+tresc_wiad+"</div>");
                   
                   $(".kto_kiedy_ogl[id_ogl="+id_ogl+"]").html("<img src='../../img/data.png'>"+data);
              
                  
                  
                  $("#spis_wiad").prepend($(".wiad[id_ogl="+id_ogl+"]"));
                
                  
                  //pierwsze = "pierwsze";
                  
                  
                 setTimeout(function(){
                         
                         $('#wiad_tresc').scrollTop($('#wiad_tresc')[0].scrollHeight);
                         
                        //alert('wyk 2 ');
                             
                         }, 100);
        
               });//0ost wyslij  wiaf
               
              }
              
              }
              
  }
                }
            });//wiad guzik
            
             

  
  $("#wiado_obrazek_form").submit(function(){
      
       if(id_obr == undefined || id_obr == 0){
            
            var id_obr = $(this).attr("class");
            var druga = $(this).attr("druga");
            
            
            
            if($("#w_guzik").attr("stan") == "del"){
                
                 
         $("#wiado_obrazek").val("");
               $("#wiado_obrazek").change();
                                 $("#wiad_input").val("");
       
        
                 $("#infousunogl").show("fast",function(){
                $("body").click(function(){
                    $("#infousunogl").hide();
                    $("body").unbind();
                })
            });

         
            }else{
               
               var formData = new FormData($(this)[0]);

               var nazwa_obrazka = $.now();
               
               formData.append("no",nazwa_obrazka);
               formData.append("id",id_obr);
               
              
                if(id_obr != undefined && id_obr != 0){
              
          $.ajax({
     url:"../../sendimg.php",
     method:"POST",
     data: formData,
     contentType:false,
     processData:false,
     success: function(output){
         

         if(output != "nn"){
         
        output = 'obr132;'+output;
         
        
         
         $("#wiado_obrazek").val("");
               $("#wiado_obrazek").change();
               
              
        
         $.post('../../wiadomosci.php',"wyslij_w="+output+"&druga="+druga+"&id_ogl="+id_obr,function(odp){
                 // alert("wysyla obrazek");
                  $("#wiad_input").val("");
       
                    
                   
                    
                     var data = new Date();
      
      
      function addZero(i) {
  if (i < 10) {i = "0" + i}
  return i;
}

   data = addZero(data.getDate())+"."+addZero((data.getMonth()+1))+" "+addZero(data.getHours())+":"+addZero(data.getMinutes());
                  
                 
                  
                   $(".po_wsteczu[id_ogl="+id_ogl+"]").html("<div class='tresc_menu_wiad'>Wysłano zdięcie</div>");
                   
                   $(".kto_kiedy_ogl[id_ogl="+id_ogl+"]").html("<img src='../../img/data.png'>"+data);
                  
                  $("#spis_wiad").prepend($(".wiad[data="+id_ogl+"]"));
                
                  
                  
                         
                          setTimeout(function(){
                         
                         $('#wiad_tresc').scrollTop($('#wiad_tresc')[0].scrollHeight);
                         
                        //alert('wyk 2 ');
                             
                         }, 100);
                 
               
               });//0ost wyslij  wiaf
       
         }
     }
 });// ajax
 
                }
     
 
  }


}
               return false;
           });// wyslij obrazek submit 

  

  
  profil_menu.click(function(){
      
      
      //////menu profil
      
      var menuprofiluser = $("#menu_profil_user");
      var menuprofilogl = $("#menu_profil_ogl");
     
      $("body").css("overflow","hidden");
     
     
      
      /////widok profil
     
     var profil_user = $("#profil_user");
   
     var user_ustaw_menu = $("#user_ustaw_menu");
    
    

     var profil_ogl = $("#profil_ogl");
     
     profil_ogl.hide();
     

    $("#profil").show();
      
       $("#arch_dod_pon").hide();
               
     
      $("#profil_zamknij").click(function(){
            $("body").css("overflow","auto");
     
     
        
             profil.hide();
             
                   var filtrzmiana = $("#filtrzmiana option:selected").attr("id");
      
      var filtrak = $("#filtrak option:selected").attr("id");
    
      var filtrtrasa = $("#filtrtrasa option:selected").attr("id");
      
      var filtrmiejsca = $("#filtrmiejsca option:selected").attr("id");
      
        /* alert(filtrzmiana+' '+filtrak+' '+filtrtrasa+' '+$("#dniinput").val()+' '+filtrmiejsca);
         */
         
         
         pokaz_ogl(filtrzmiana,$("#dniinput").val(),filtrtrasa,filtrmiejsca,filtrak);
 

         
             
             
       
       });
       
      
       menuprofiluser.click(function(){
           
           profil_ogl.hide();
           user_ustaw_menu.show();
           $("#profil_auto").hide();
           $("#profil_op").hide();
           
           $(this).css({"border":"0.1em inset grey",
               "background-color":"Honeydew"});
               $("#menu_profil_ogl").css({
               "border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
    $("#menu_profil_auto").css({
               "border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
    
     $(".menu_profil_user").css({"border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
           
           $("#edytuj_dane_info").html("");
                 $("#edytuj_pass").val("");
               $("#edytuj_imie").val("");
               
                $("#zmien_haslo_info").html("");
                $("#now_pass").val("");
                $("#new_pass").val("");
                $("#new_pass_2").val("");
           
       $.getJSON("../../profil_user.php","profil=info",function(odp) {
       
         $.each(odp, function(k,w){
             
              if(w.data_rej.indexOf("0000") != -1){
           w.data_rej = "styczeń 2022";
       }
                         
              

             $("#profil_user").html("<div class='dod_ogl_akap'>Login:</div><div class='menu_profil_item' id='menu_profil_login'>"+w.nick+"</div><div class='dod_ogl_akap'>Miasto:</div><div class='menu_profil_item'>"+w.miasto+"</div><div class='dod_ogl_akap'>email:</div><div class='menu_profil_item' id='menu_profil_email'>"+w.email+"</div><div class='dod_ogl_akap'>imię :</div><div class='menu_profil_item' id='menu_profil_imie'>"+w.imie+"</div><div class='dod_ogl_akap'>Nr. telefonu:</div><div class='menu_profil_item'>"+w.nr_tel+"</div><div class='dod_ogl_akap'>Miejsce pracy:</div><div class='menu_profil_item'>"+wypisz_miejsce_pracy(w.miejsce_pracy)+"</div><small><div class='dod_ogl_akap'>data dołączenia:</div><div class='menu_profil_item'>"+w.data_rej+"</div></small>"
                 );
         });
       
         });
     
         
        
             
             // menu ustawienia profilu 
             
             var usunkontomenu = $("#usun_konto_menu");
             var zmienhaslomenu = $("#zmien_haslo_menu");
             var edytujdanemenu = $("#edytuj_dane_menu");
             
             //widok ustawienia profilu 
             
             var usunkontowidok = $("#usun_konto_widok");
             var zmienhaslowidok = $("#zmien_haslo_widok");
             var edytujdanewidok = $("#edytuj_dane_widok");
             
             usunkontowidok.hide();
             $("#usun_konto_potw").hide();
             
             zmienhaslowidok.hide();
             edytujdanewidok.hide();
             
             
             $("#menu_profil_user_info").click(function(){
                 
                    $(this).css({"border":"0.1em inset grey",
               "background-color":"Honeydew"});
               
               $("#zmien_haslo_menu").css({
               "border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
    
    $("#edytuj_dane_menu").css({
               "border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
    
        $("#usun_konto_menu").css({
               "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"});
                 
                  zmienhaslowidok.hide();
                 edytujdanewidok.hide();
                 usunkontowidok.hide();
                 $("#usun_konto_potw").hide();
                 profil_user.show();
                 
                 
             }).click();
             
             usunkontomenu.click(function(){
                 
                 
                 
                 $("#usun_konto_haslo").val("");
               $("#usun_konto_haslo_info").html("");
                 
                 
                 $(this).css({"border":"0.1em inset grey",
               "background-color":"Honeydew"});
               $("#zmien_haslo_menu").css({
               "border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
    $("#edytuj_dane_menu").css({
               "border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
     $("#menu_profil_user_info").css({
               "border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
                 
                 $("#edytuj_dane_info").html("");
                 $("#edytuj_pass").val("");
               $("#edytuj_imie").val("");
                 
zmienhaslowidok.hide();
                 edytujdanewidok.hide();
                 usunkontowidok.hide();
                 $("#usun_konto_potw").hide();
                 profil_user.hide();
                 
                $("#usun_konto_potw").show();
                $(".potw_zamknij,#usun_konto_wroc").click(function(){
                    $("#usun_konto_potw").hide();
                    usunkontowidok.hide();
                    $("#menu_profil_user_info").click();

                });
                
                $("#usun_potw").click(function(){
                    
                    $("#usun_konto_potw").hide();
                    usunkontowidok.show();
                    $("#profil_user").hide();
                    
                });// usun potw click
                    
                $("#podaj_haslo_usun").submit(function(){
                     
                     var haslousun = $("#usun_konto_haslo").val();
                     
                
                if(haslousun == ""){
                      $("#usun_konto_haslo_info").html("<p style='color:red'>Wpisz hasło</p>");
                }else{
                   
                     $.post("../../profil_user.php","profil=usun&haslo="+haslousun,function(odp){
                        
                        if(odp == "usuniete"){
                            location.href="../../wyloguj.php";
                        }else if(odp == "niepoprawne"){
                                                  $("#usun_konto_haslo_info").html("<p style='color:red'>Podane hasło jest nieprawidłowe</p>");
                        }else{
                           // alert(odp);
                        }
                        
                         
                     });
                     
                }
                     return false;
                 });//usun konto form click
                    
         });//usun konto menu click 
             
             zmienhaslomenu.click(function(){
                 
                 $(this).css({"border":"0.1em inset grey",
               "background-color":"Honeydew"});
               $("#usun_konto_menu").css({
               "border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
    $("#edytuj_dane_menu").css({
               "border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
    $("#menu_profil_user_info").css({
               "border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
                 
                 
                 $("#edytuj_dane_info").html("");
                 $("#edytuj_pass").val("");
               $("#edytuj_imie").val("");
                 
                 
                  $("#zmien_haslo_info").html("");
                $("#now_pass").val("");
                $("#new_pass").val("");
                $("#new_pass_2").val("");
                 
               zmienhaslowidok.show();
                 edytujdanewidok.hide();
                 usunkontowidok.hide();
                 $("#usun_konto_potw").hide();
                 profil_user.hide();
            
          
             }); //zmienhaslomenu click   
                 
 
    
             edytujdanemenu.click(function(){
                 
                 
                 $(this).css({"border":"0.1em inset grey",
               "background-color":"Honeydew"});
               $("#usun_konto_menu").css({
               "border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
    $("#zmien_haslo_menu").css({
               "border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
    $("#menu_profil_user_info").css({
               "border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
                 
                 
                zmienhaslowidok.hide();
                 edytujdanewidok.show();
                 usunkontowidok.hide();
                 $("#usun_konto_potw").hide();
                 profil_user.hide();
                 
                 $("#edytuj_dane_info").html("");
                 $("#edytuj_pass").val("");
               $("#edytuj_imie").val("");
               
                $("#zmien_haslo_info").html("");
                $("#now_pass").val("");
                $("#new_pass").val("");
                $("#new_pass_2").val("");
                 
        $.getJSON("../../profil_user.php","profil=info",function(odp) {
       
        $.each(odp, function(k,w){
             $("#edytuj_login").attr({
                 "placeholder":w.nick,
                 "disabled":true
             });
             $("#edytuj_imie").attr("placeholder",w.imie);
             
             $("#edytuj_nr_tel").attr("placeholder",w.nr_tel);
             
             $("#edytuj_miasto").attr("placeholder",w.miasto);
             
             $("#"+w.miejsce_pracy).prop("selected",true);
              $("#edytuj_miejsce_pracy").prop("wartosc",w.miejsce_pracy);
             
             $("#edytuj_email").attr({
                 "placeholder":w.email,
                 "disabled":true
             });
         });
         
        });//getjson edytuj dane
        
 edytujdanewidok.show();
             });//edytuj dane menu click 
       
        
        $("#edytuj_dane_form").submit(function(){
            
            var edytujinfo = $("#edytuj_dane_info");
            
            var dane_pass = $("#edytuj_pass").val();
            var dane_imie = $("#edytuj_imie").val();
            
            var dane_nr_tel = $("#edytuj_nr_tel").val();
            
            var dane_miasto = $("#edytuj_miasto").val();
            var dane_miejsce = $("#edytuj_miejsce_pracy option:selected").attr("id");
            
            if(dane_pass == ""){
                
                
edytujinfo.html("<p style='color:red'>podaj hasło aby zatwierdzić zmiany</p>");
                
            }else{
            
            
            if($("#edytuj_imie").val() == "" && dane_miasto == "" && dane_nr_tel == "" && dane_miejsce == $("#edytuj_miejsce_pracy").attr("wartosc")){
                
                
                
                edytujinfo.html("<p style='color:red'>nie wprowadzono żadnych zmian</p>");
                
            }else{
            
            
             
                  
                //teraz trzeba sprawrzic czy haslo jest poprawne nie to przeslac odpowiedz a jesli tak to od razu zaktualizowax dane
                
                
                if($("#edytuj_imie").val() == ""){
                    dane_imie = $("#edytuj_imie").attr("placeholder");
                }
                
                if($("#edytuj_nr_tel").val() == ""){
                    dane_nr_tel = $("#edytuj_nr_tel").attr("placeholder");
                }
                
                if($("#edytuj_miasto").val() == ""){
                    dane_miasto = $("#edytuj_miasto").attr("placeholder");
                }
                
                
                var edytuj_dane = {
                "profil":"edytuj",
                "dane_imie":dane_imie,
                "dane_miasto":dane_miasto,
                "dane_nr_tel":dane_nr_tel,
                "dane_miejsce":dane_miejsce,
                "haslo":dane_pass
                  };
                
                $.post("../../profil_user.php",edytuj_dane,function(odp){
                    
                    
                    if(odp=="zle"){
                      
                       edytujinfo.html("<p style='color:red'>podane hasło jest nieprawidłowe!</p>");
                      
                    }else if(odp=="edytowano"){
                        
                        $("#menu_profil_imie").html(dane_imie);
                        $
                        
                        $("#edytuj_imie").val("");
                        $("#edytuj_imie").attr("placeholder",dane_imie);
                        $("#edytuj_pass").val("");
                        
                        $("#edytuj_miasto").val("");
                        $("#edytuj_miasto").attr("placeholder",dane_miasto);
                        $("#edytuj_nr_tel").val("");
                         $("#edytuj_nr_tel").attr("placeholder",dane_nr_tel);
                        
                        $("#edytuj_miejsce_pracy").prop("wartosc","");
                     
                      edytujinfo.html("<p style='color:green'>Zmieniono!</p>");
                        
                    };
                    
                });
                
                
                
                
           
           
              
            }
            
            }
            return false;
        });// edytuj dane form submit
        
       
       });//menu profil user click
       
      
       
       
        $("#zmiana_hasla").submit(function(event){
                   
                if($("#new_pass").val() == "" || $("#new_pass_2").val() == "" || $("#now_pass").val() == ""){
                    
                     $("#zmien_haslo_info").html("<p style='color:red'>Musisz wypełnić wszystkie pola!</p>");
                    
                }else{
                   
                 if($("#new_pass").val() == $("#new_pass_2").val()){
                   
                 var nowpass = $("#now_pass").val();
                 var newpass = $("#new_pass").val();
                 var newpass2 = $("#new_pass_2").val();
                 var dane = {
                     "profil":"zmien",
                     "tehaslo":nowpass,
                     "nowehaslo":newpass
                 };
                   
                   $.post("../../profil_user.php",dane,function(odp){
                       

                       
                       if(odp=="zle"){
                           $("#zmien_haslo_info").html("<p style='color:red'>Aktualne hasło jest nieprawidłowe</p>");
                        $("#now_pass").val("");
                       }else if(odp=="zmieniono"){
                        $("#zmien_haslo_info").html("<p style='color:green'>hasło zostało  zmienione</p>");
                        $("#now_pass").val("");
                        $("#new_pass").val("");
                        $("#new_pass_2").val("");
                        
                     $("#zmien_haslo_submit").attr("disabled", true);
                     
                     setTimeout(function() {
                     $("#zmien_haslo_submit").attr("disabled", false);
                     }, 5000);
                  
                       }else{
                           //alert(odp);
                       };
                       
                       
                   });
                 
                   
                 }else{
                     $("#zmien_haslo_info").html("<p style='color:red'>Nowe hasła nie pasują do siebie</p>");
                 };
                   
        }
                   
    
                   
                     event.preventDefault();
                 });//zmiana hasla submit
        
       
       menuprofilogl.click(function(){
           
           $(this).css({"border":"0.1em inset grey",
               "background-color":"Honeydew"});
               $("#menu_profil_user").css({
               "border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
    $("#menu_profil_auto").css({
               "border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
           
           $("#edytuj_dane_info").html("");
                 $("#edytuj_pass").val("");
               $("#edytuj_imie").val("");
           
            $("#zmien_haslo_info").html("");
                $("#now_pass").val("");
                $("#new_pass").val("");
                $("#new_pass_2").val("");
           
           profil_user.hide();
           
           user_ustaw_menu.hide();
           
           profil_ogl.show();
           
           $("#profil_auto").hide();
           $("#profil_op").hide();
           $("#arch_info_strona").hide();
           $("#akt_info_strona").hide();
              $("#zmien_haslo_widok").hide();
              $("#edytuj_dane_widok").hide();
                 $("#usun_konto_widok").hide();
                 $("#usun_konto_potw").hide();
           $("#profil_user").hide();

                 
  var miejsce_pr = MIEJSCE_PRACY;
  
 
           
           $("#aktualne_ogl_menu").click(function(){
               
               
                $(this).css({"border":"0.1em inset grey",
               "background-color":"Honeydew"});
               
               $("#archiwum_ogl_menu").css({
               "border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
               
              $("#aktualne_ogl").show();
              $("#archiwum_ogl").hide();
               
               
               
$.post("../../profil_ogl.php","ile=ile&miejsce_pracy_profil="+miejsce_pr,function(odp){
               $("#ilosc_ogl").html("liczba twoich ogłoszeń "+odp);
               
               if(odp == 0){
                 $("#twoje_ogl").html("<div id='brak_ogl_prof'>Nie masz żadnych ogłoszeń. Dodaj nowe na stronie głównej lub dodaj ponownie ogłoszenie, które usunąłeś</div>");
               }else{
       
           
           
           
           $.getJSON("../../profil_ogl.php","pokaz=w&miejsce_pracy_profil="+miejsce_pr,function(odp){
                               
             
             
            $("#twoje_ogl").html(' ');
            
              $.each(odp, function(k,w){
                  
                  
                   var optogl;
          
                     
                  optogl = "<div class='optogl'><div class='akt_edytuj' id="+w.id+">edytuj<img class='optogl_obr' src='../../img/pencil.png'/></div><div class='akt_usun' id="+w.id+">usun<img class='optogl_obr' src='../../img/trash.png'/></div><div style='clear:both'></div></div>";
               
                 var dodano = w.dodano;
                 dodano = dodano.split("-");
                 dodano = dodano[2][0]+dodano[2][1]+"."+dodano[1]+" "+dodano[2][3]+dodano[2][4]+dodano[2][5]+dodano[2][6]+dodano[2][7];
                 
               
  
  
  var jakiedni = [];
     
       if(w.dzien != ""){
       jakiedni.push(w.dzien);
       }
  if(w.dzien2 != ""){
       jakiedni.push(w.dzien2);
       }
  if(w.dzien3 != ""){
       jakiedni.push(w.dzien3);
       }
  if(w.dzien4 != ""){
       jakiedni.push(w.dzien4);
       }
       
  var jakiedn = jakiedni.join(", ");
                            
                 
                 
                 
                 
     var trasa = w.trasa;
    /* var tab_tr = [];
    trasa = trasa.split(",");
         
    for(let i =0;trasa.length > i;i++){
        
        tab_tr.push($("#"+trasa[i]).val());
        
    }
    
    tab_tr.join(",");*/
  
   
   var miejsce = $("#"+w.miejsc).val();
   
  
   
 if(jakiedn == "stale"){
            jakiedn = "na stałe";
        }
   
                 
           /*  $("#twoje_ogl").append("<div class='akt_info' id="+w.id+"><div class='rodzaj_zmiany'>"+ak+" "+w.zmiana+"</div><div class='ogl_trasa'>"+tab_tr+"</div><div class='ogl_jakie_dni'><hr>"+jakiedn+"<hr></div><div class='ogl_miejsce'>"+miejsce+"</div><div class='kto_kiedy_ogl'><img src='../../img/data.png'>"+dodano+"</div></div>"+optogl);
            */
                  $("#twoje_ogl").append("<div class='akt_info' id="+w.id+"><div class='miejsce_pracy'>"+wypisz_miejsce_pracy(MIEJSCE_PRACY)+"<br></div><div class='rodzaj_zmiany'>"+w.zmiana+"</div><div class='ogl_trasa'>"+trasa+"</div><div class='ogl_jakie_dni'><hr>"+jakiedn+"<hr></div><div class='ogl_miejsce'>"+miejsce+"</div><div class='kto_kiedy_ogl'><img src='../../img/data.png'>"+dodano+"</div></div>"+optogl);
               
                  
                                          $.getJSON("../../profil_oglasz.php?ogl=auto&id_auta="+w.auto,function(o){
                            
                         
                            
                           $.each(o,function(k,w){
                                
                  
                  
                   $("#akt_info_auto").html("<div class='dod_ogl_akap'>Marka :</div><div id='info_auto_marka' class='info_auto'>"+w.marka+"</div><div class='dod_ogl_akap'>Model :</div><div id='info_auto_model' class='info_auto'>"+w.model+"</div><div class='dod_ogl_akap'>Typ :</div><div id='info_auto_typ' class='info_auto'>"+w.typ+"</div><div class='dod_ogl_akap'>Kolor :</div><div id='info_auto_kolor' class='info_auto'>"+w.kolor+"</div><div id='img_auto'><img src='../../img/"+w.typ+".png'></div>");
                   
                            });
                            
                                          });
                  
              });//each
                
                $(".akt_info").click(function(){
                    
                    var id = $(this).attr("id");
    
            
                     $("#akt_info_strona").show();
                      $("#akt_info_zamknij").show();
                      $("#profil_zamknij").hide();
                     
                     $("#akt_info_zamknij").click(function(){
                         
                   $("#akt_info_strona").hide();
                   $("#profil_zamknij").show();
                         
                     });
                     
                    
                      
                      $.getJSON("ogloszenia.php?po_edycji="+id,function(odp){
                          
                          $("#akt_info").html("");
                          

                          
                          $.each(odp,function(k,w){
                              
          tab_ogl = {
                 "tresc":w.tresc,
                 "trasa":w.trasa,
                 "dzien":w.dzien,
                 "dzien2":w.dzien2,
                 "dzien3":w.dzien3,
                 "dzien4":w.dzien4,
                 "kto":w.kto,
                 "id":w.id,
                 "ak":w.miejsce_pracy,
                 "zmiana":w.zmiana,
                 "miejsc":w.miejsc,
                 "znalazl":w.znalazl,
                 "dodano":w.dodano
             };
             
             
             
                  var dni = [];
                         if(w.dzien != ""){
                             dni.push(w.dzien);
                         }if(w.dzien2 != ""){
                             dni.push(w.dzien2);
                         }if(w.dzien3 != ""){
                             dni.push(w.dzien3);
                         }if(w.dzien4 != ""){
                             dni.push(w.dzien4);
                             
                         }
                         var tab_dni = [];
                         for(var i =0;dni.length > i;i++){
        if(dni[i] == "stale"){
            dni[i] = "na stałe";
        }
        
        tab_dni[i] = "<div class='info_dn'>"+dni[i]+"</div>";

    }
    
    tab_dni = tab_dni.join("");
                         
                         
                      
                    
    var zmiana = w.zmiana;
    zmiana = zmiana.split(",");
     var tab_zm = [];
                      
                       for(var i =0;zmiana.length > i;i++){
        
        
        tab_zm[i] = "<div class='info_zm'>"+zmiana[i]+"</div>";

    }
    
    tab_zm = tab_zm.join(" ");
                     
                        
                           
                    var zmiana = tab_zm;
                        
                  var miejsce_pracy = wypisz_miejsce_pracy(w.miejsce_pracy);
                         
                        
                   var dodano = w.dodano;
                 dodano = dodano.split("-");
                 dodano = dodano[2][0]+dodano[2][1]+"."+dodano[1]+" "+dodano[2][3]+dodano[2][4]+dodano[2][5]+dodano[2][6]+dodano[2][7];
            
                         
  
   var trasa = w.trasa;
  /*   var tab_tr = [];
    trasa = trasa.split(",");
                
   for(var i =0;trasa.length> i;i++){
        
        tab_tr.push((i+1)+". "+$("#"+trasa[i]).val());
        tab_tr[i] = "<div class='inny_kolor123'>"+tab_tr[i]+"</div>";

    }
    
    
    
   tab_tr = tab_tr.join(" ");*/
   tab_tr = trasa.replaceAll("-","<img src='../../img/right-arrow.png' class='strzalka_trasa'/>");
                        
                     
                        
                        $("#akt_info").html("<div class='dod_ogl_akap'>Trasa/y :</div><div id='info_trasa'>"+tab_tr+"</div><div class='dod_ogl_akap'>Zmiana/y :</div><div id='info_zmiana'>"+zmiana+"</div><div style='clear:both'></div><div class='dod_ogl_akap'>Miejsce Pracy:</div><div class='info_praca'>"+miejsce_pracy+"</div><div class='dod_ogl_akap'>Dni :</div><div id='info_dni'>"+tab_dni+"<div style='clear:both'></div></div><div class='dod_ogl_akap'>Treść :</div><div id='info_tresc'>"+w.tresc+"</div><div class='dod_ogl_akap'>Miejsc :</div><div id='info_miejsca'>"+$("#"+w.miejsc).val()+"</div><div id='info_dodano'>Dodane "+dodano+"</div>");
                        
                     
                        
                      /*  $("#akt_info").html("<div class='dod_ogl_akap'>Trasa/y :</div><div id='info_trasa'>"+tab_tr+"</div><div class='dod_ogl_akap'>Zmiana/y :</div><div id='info_zmiana'>"+rodzaj_zmiany+"</div><div class='dod_ogl_akap'>Dni :</div><div id='info_dni'>"+tab_dni+"<div style='clear:both'></div></div><div class='dod_ogl_akap'>Treść :</div><div id='info_tresc'>"+w.tresc+"</div><div class='dod_ogl_akap'>Miejsc :</div><div id='info_miejsca'>"+$("#"+w.miejsc).val()+"</div><div id='info_dodano'>Dodane "+dodano+"</div>");      
                      */
                      
                       
                        
                        
                        
                        $(".inny_kolor123:odd").css({"background-color":"#F9F9F9"});
                        
                         $(".info_ak:even").css({"background-color":"white"});
                     
                                            
             
             
             
             
                          });//each
             
 
                  
                      });//get
                      
                
                });//akt info 

                
              $(".akt_edytuj").click(function(){
                    
                    var id = $(this).attr("id");
                    
 $("#edytuj_ogl_dojazdy").css("z-index",2000).show();
 $("#edytuj_ogl_dojazdy").show().animate({
            scrollTop: 0,
        }, 100);
        
        $("#profil_zamknij").hide();
               
                $("#eod_close").click(function(){
                    
                    $("#profil_zamknij").show();
                    
                    
                    
                    $("#edytuj_ogl_dojazdy").hide();
                    
                    
                     id = 0;
                  
                 $("#edytuj_ogl_info").html("");
                 
           
                    
                    $("#wiczm").prop("checked",false);
                    
                    $("#zmiana_edytuj").attr("multiple",false);
                    
                    $("#edytuj_form").attr("oglo",0);

                 $("body").css("overflow","auto");
                    $("#edytuj_ogl_dojazdy").hide();
                    

                  
                 $("#edytuj_ogl_info").html("");
                
                
                    $("#wiczm").prop("checked",false);
                     $("#wictr").prop("checked",false);
                    $("#zmiana_edytuj").attr("multiple",false);
                
                $("#tresc_edytuj").val("");
           $("option").attr("selected",false);
                 $("input").attr("selected",false);
             $("input").attr("multiple",false);
            $("#miejsca_edytuj option").attr("selected",false);
            $("#zmiana_edytuj option").attr("selected",false);
            $("#wiczm").attr("checked",false);
           
            $("#zmiana_edytuj").attr("multiple",false);
            
            
            $("#trasa_edytuj option").attr("selected",false);
            $("#wictr").attr("checked",false);
            
            $("#trasa_edytuj").attr("multiple",false);
             
             $("#zmiana_edytuj").prop("disabled",false);
           
             $("#wiczm").prop("disabled",false);

                
                 $(".wiczm_info").hide();
         
            $(".wictr_info").hide();

                 $(".label_wiczm").css({
              "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               $(".label_wicak").css({
              "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               $(".label_wictr").css({
              "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
             
             
              $(".label_wybzm").css({
               "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
                $(".label_wybak").css({
               "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
             
                
                
                });
    
    if(id != 0){
               
                //niektorzy jezdza na kilka ak na raz 
                
                
       $("#edytuj_submit").attr("ide",id);
       $("#edytuj_submit").attr("oglo",1);

                
   function uzeupelnij_pola_edycji(){
      
     $.getJSON("ogloszenia.php?po_edycji="+id,function(odpo){
                    
                    var tab_ogl = [];
                            $.each(odpo,function(k,w){
                  
                tab_ogl[id] = {
                 "tresc":w.tresc,
                 "trasa":w.trasa,
                 "dzien":w.dzien,
                 "dzien2":w.dzien2,
                 "dzien3":w.dzien3,
                 "dzien4":w.dzien4,
                 "kto":w.kto,
                 "id":w.id,
                 "ak":w.miejsce_pracy,
                 "zmiana":w.zmiana,
                 "miejsc":w.miejsc,
                 "auto":w.auto
             };
              
              /*alert(id+"pp wlacxeniu"+tab_ogl[id].ak);    */           
                                
         });//utworzyc tablice tabogl po zaktualizowaniu danych i wyswietlic te dane za pomoca funkcji uzupelnij a jesli nie to kazdemu selectowi z osobna przypisac nawa wartosc a pozniej jeszcze zaktualizowac wyniki wyszukiwania na glownej
                            
 
/* $("#wictr").click(function(){
            
            if($(this).prop("checked") == true){
                $("#trasa_edytuj").attr("multiple","multiple");
                
                  $(".label_wictr").css({
               "border":"0.1em inset grey",
               "background-color":"Honeydew"
               });
                
                $(".wictr_info").show()
                
            }else{
                $("#trasa_edytuj").attr("multiple",false);
                
                 $(".label_wictr").css({
               "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               $(".wictr_info").hide();
            }
            
            
        });
       */
       $("#wiczm").click(function(){
            
            if($(this).prop("checked") == true){
                $("#zmiana_edytuj").attr("multiple","multiple");
                 $(".label_wiczm").css({
               "border":"0.1em inset grey",
               "background-color":"Honeydew"
               });
                
                $(".wiczm_info").show();
             
            }else{
                $("#zmiana_edytuj").attr("multiple",false);
                 $(".label_wiczm").css({
               "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               $(".wiczm_info").hide();
            }
            
            
            
            
        });

                
                  $("#tresc_edytuj").val(tab_ogl[id].tresc);
                $("#trasa_edytuj").val(tab_ogl[id].trasa);
                
                
                $("."+tab_ogl[id].miejsc).prop("selected",true);
               
              
                  $.getJSON("../../profil_auto.php","auto=wybrane",function(odpi){
              
               $("#twoje_auto_edytuj").html("");
             
         if(odpi == 0){
             
              $("#twoje_auto_edytuj").html("nie masz wybranego żadnego auta");
             
             
         }else{
              
            $.each(odpi,function(k,w){
                
                if(tab_ogl[id].auto == w.id){
                    var wybr = "selected";
                }else{
                    var wybr = "";
                }
                
                
                
                 $("#twoje_auto_edytuj").append("<option value="+w.id+" "+wybr+">"+w.marka+" "+w.model+"</option>");
                
            });
              
         }
   });//auto edytuj get
                
     
              var tab_zmiana = tab_ogl[id].zmiana.split(",");
                var ile_tab_zmiana = tab_zmiana.length;
                
                if(ile_tab_zmiana > 1){
                    $("#wiczm").click();
                    
                
                
                $("#zmiana_edytuj option").prop("selected",false);
                
                for(var i =0;i<=ile_tab_zmiana-1;i++){
                $("."+tab_zmiana[i]).prop("selected",true);
                }
                }else{
                   //tutej  
                    
                       $("."+tab_ogl[id].zmiana ).prop("selected",true);
                    
                }
                
               /* $("#pom_zm_ed").prop("checked",false);
                 $("#zmiana_edytuj").prop("disabled",false);
            $("#wiczm").prop("disabled",false);
            $("#pom_ak_ed").prop("disabled",false);*/
         
         
      
                
                var tab_trasa = tab_ogl[id].trasa.split(",");
                var ile_tab_trasa = tab_trasa.length;
                
             /*   if(ile_tab_trasa > 1){
                    $("#wictr").click();

                
               $("#trasa_edytuj option").prop("selected",false);
                
                for(var i =0;i<=ile_tab_trasa-1;i++){
                $("."+tab_trasa[i]).prop("selected",true);
                }
                }else{
                   //tutej  
                    
                       $("."+tab_ogl[id].trasa ).prop("selected",true);
                    
                }*/
                
                
var jakiedni = [];
     
       if(tab_ogl[id].dzien != ""){
       jakiedni.push(tab_ogl[id].dzien);
       }
  if(tab_ogl[id].dzien2 != ""){
       jakiedni.push(tab_ogl[id].dzien2);
       }
  if(tab_ogl[id].dzien3 != ""){
       jakiedni.push(tab_ogl[id].dzien3);
       }
  if(tab_ogl[id].dzien4 != ""){
       jakiedni.push(tab_ogl[id].dzien4);
       }

   
      
   
   $.getJSON("../../podaj_dni.php",function(odp){
         var wybrane = [];
        //alert("3670");
       $("#dni_edytuj").html("");
    
        $("#dni_edytuj").prepend("<input type='text' id='dni_edytuj_input' style='display:none' disabled>");
            
    
                    $("#dni_edytuj_input").val(jakiedni);
            
            
             $("#dni_edytuj_input").after("<label for='stale_ed'><input class='dzien_ed' type='checkbox' value='stale' id='stale_ed'>na stałe</label>");
    
        $.each(odp,function(k,w){
            
            
         
            
                        $("#dni_edytuj").append("<label for='"+w+"_ed'><input class='dzien_ed' type='checkbox' id='"+w+"_ed' value="+w+">"+w+"</label>");
            
        
        });
        
          $("#dni_edytuj label[for='stale_ed']").css({
           "background-color":"azure",
           "font-weight":410
           
       });
      
       
      
      $(".dzien_ed").on("click",function(){
           
          if(!$(this).is(":checked")){
             
             
            var index = wybrane.indexOf($(this).val());
             
             wybrane.splice(index,1);
             
           
            $("#dni_edytuj label[for='"+$(this).attr("id")+"']").css({
               "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               

               
                 $("#dni_edytuj label[for='stale_ed']").css({
           "background-color":"azure",
           "font-weight":410
           
       });
      
              
                 
             
          }else{
              
              if($(this).attr("id") == "stale_ed")
              {
             
              $(".dzien_ed:not([id='stale_ed'])").attr("checked",false);
                  $("#dni_edytuj label").css({
            "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
       });
              
              wybrane.splice(0,4);
              
              }
              
              
              
              if(wybrane[0] == "stale"){
                    
                    wybrane.pop();//usuwa ostatni 
                  
                   $("#dni_edytuj label[for='stale_ed']").css({
               "border":"0.02em solid black",
               "background-color":"azure",
               "font-weight":410
               
               });
               
                  
                   $(".dzien_ed[id='stale_ed']").attr("checked",false);
                  
               }
              
               $("#dni_edytuj label[for='"+$(this).attr("id")+"']").css({
               "border":"0.1em inset grey",
               "background-color":"Honeydew"
               });
              
              if(wybrane.length == 4){
                  
                  //jesli jest juz wybrane 6 usuwa ostatni i dodaje ten vo kliknelismy 
                  var ostatnia = wybrane[3]+"_ed";
                  
                  
                  
                 
                  $(".dzien_ed[id='"+ostatnia+"']").prop("checked",false);
                  
      
                  
                  wybrane.pop();//usuwa ostatni 
                  
                  wybrane.push($(this).val());
                  
                  
               
               $("#dni_edytuj label[for='"+ostatnia+"']").css({
                "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               

                  
              }else{
              
              
              
              wybrane.push($(this).val());

              }
             
              
          }
          
        
          
          if(wybrane.length == 0){
              $("#dni_edytuj_input").val("podaj dni");
              
            
              
          }else{
          $("#dni_edytuj_input").val(wybrane);
          }
      
      });//.dnien click
      
      for(var i =0;jakiedni.length > i;i++){
           
           $(".dzien_ed[value='"+jakiedni[i]+"']").click();
       
           
           
           
       }
        
   });//get uzupelniajacy dniami edytuj dni
   
   
     });//get tworzacy tablice tabogl
                
   };//funkcja uzeupelnij_pola_edycji
   
   uzeupelnij_pola_edycji();
                
  
                  
             
                
    }//if id !=0 zeby nie nie uruchamiac baxy dla id0
                    
                 
                    
                });//akt edytuj
                
                 
                 // submit edytuj 9540 zeby wykonywalo raz 
              
        
         $(".akt_usun").click(function(){
                    
                    var id = $(this).attr("id");
                    
      
                $("#usun_ogl_dojazdy").show();
                $("#usun_click").show();
                $("#usun_click2").hide();
                
                
            $("#usun_ogl_dojazdy_zamknij,.usun_ogl_anuluj").click(function(){
                    $("#usun_ogl_dojazdy").hide();
                   id = 0;
                });
                
        
        if(id != 0){
                
     $.getJSON("ogloszenia.php?po_edycji="+id,function(odpo){
                    
                    var tab_ogl = [];
                            $.each(odpo,function(k,w){
                  
                tab_ogl[id] = {
                 "tresc":w.tresc,
                 "trasa":w.trasa,
                 "dzien":w.dzien,
                 "dzien2":w.dzien2,
                 "dzien3":w.dzien3,
                 "dzien4":w.dzien4,
                 "kto":w.kto,
                 "id":w.id,
                 "ak":w.miejsce_pracy,
                 "zmiana":w.zmiana,
                 "miejsc":w.miejsc,
                 "dodano":w.dodano,
                 "auto":w.auto
             };
                                
                                
         });
                

               
           var dodano = tab_ogl[id].dodano;
                 dodano = dodano.split("-");
                 dodano = dodano[2][0]+dodano[2][1]+"."+dodano[1]+" "+dodano[2][3]+dodano[2][4]+dodano[2][5]+dodano[2][6]+dodano[2][7];
                 
                  var dni = [];
                         if(tab_ogl[id].dzien != ""){
                             dni.push(tab_ogl[id].dzien);
                         }if(tab_ogl[id].dzien2 != ""){
                             dni.push(tab_ogl[id].dzien2);
                         }if(tab_ogl[id].dzien3 != ""){
                             dni.push(tab_ogl[id].dzien3);
                         }if(tab_ogl[id].dzien4 != ""){
                             dni.push(tab_ogl[id].dzien4);
                             
                         }
                         var tab_dni = [];
                         for(var i =0;dni.length> i;i++){
        
        if(dni[i] == "stale"){
            dni[i] = "na stałe";
        }
        
        tab_dni[i] = "<div class='info_dn'>"+dni[i]+"</div>";

    }
    
    tab_dni = tab_dni.join("");
                         
                         
                      
                    var ak = tab_ogl[id].ak;
                     
                      
    var zmiana = tab_ogl[id].zmiana;
    
   
   
   var trasa = tab_ogl[id].trasa;
   /*  var tab_tr = [];
    trasa = trasa.split(",");
                
   for(var i =0;trasa.length > i;i++){
        
        tab_tr.push((i+1)+". "+$("#"+trasa[i]).val());
        tab_tr[i] = "<div class='inny_kolor123'>"+tab_tr[i]+"</div>";

    }
    
    
    
   tab_tr = tab_tr.join(" ");*/
   tab_tr = trasa.replaceAll("-","<img src='../../img/right-arrow.png' class='strzalka_trasa'/>");
                         
                       
         
         $("#data_dod_usun").html(dodano);
         $("#dni_usun").html(tab_dni);
          $("#zmiana_usun").html("<b>"+zmiana+"</b>");
         $("#miejsce_pracy_usun").html("<b>"+wypisz_miejsce_pracy(MIEJSCE_PRACY)+"</b>");
         $("#trasa_usun").html(tab_tr);
             
              
              
              
              
     });//get robiacy tab_ogl
     
         $("#usun_ogl_doj_click").click(function(){
             
             //teraz dodac zapytanie zy znalazles pasazera tak nie anuluj i ogl9szenie raczej dodam do osobistego archiwum a nie usune pozniej mozna je ponownie dodac itp
             
             //jak usuwam odtatnia wiadomosc albo dodaje ostatnie ogloszenie z arvhiwum to zostaje pomimo ze jest usuniete dopirto jak sie odsierzy to znika 
    
               //dobrze pokazuje 


                   
                   $("#usun_ogl_dojazdy p").html("czy znalazłeś pasażera?");
                   
                   
                   $("#usun_click").hide();
                   $("#usun_click2").show();
                   
                   
                   
           $(".usun_ogl_ost").click(function(){
                  
                 var znalazl = $(this).attr("value");
                    
                    
                
                if(id != undefined && id != 0){
             $.getJSON("../../profil_ogl.php?usun="+id+"&znalazl="+znalazl+"&miejsce_pracy="+MIEJSCE_PRACY,function(odp){
                 
               //alert(795);
                 
                 if(odp == "ok"){
                 
               //  usunietych = usunietych +1;
                 
                 $("#usun_click2").hide();
               
                
                
                
 $("#okienko_info").show().html("<div class='okienko_info'>Ogłoszenie zostało przeniesione do archiwum!</div>").delay(2500).fadeOut(1000);
               
            
   $("#usun_ogl_dojazdy").hide();

setTimeout(function(){ 
    $(".akt_info[id="+id+"],.akt_edytuj[id="+id+"],.akt_usun[id="+id+"],.akt_usun[id="+id+"]+br").fadeOut(400);
                id = 0;
                $("#ogloszenia").prop("dd",1);
                
}, 800);
                 
            
                 
                 
             }else{
                 //alert(odp);
             }
                 
             });
                }
                    
                });
                   
                  
         });//usun ogl potw 
         
         
        }
              
                    
                    
                });//akt usun
        
        
//dpdac jeszcze ogloszenia pilne 
           });//get
           
           
               }
           
            });
           
           });//aktualne ogl menu 
           
          
           ///////archiwum dol 
           
           $("#archiwum_ogl_menu").click(function(){
               
                $(this).css({"border":"0.1em inset grey",
               "background-color":"Honeydew"});
               
              
               $("#aktualne_ogl_menu").css({
               "border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
               
              $("#aktualne_ogl").hide();
              $("#archiwum_ogl").show();
              $("#edytuj_ogl").hide();
              
             $.get("../../profil_ogl.php","ile_arch=ile&miejsce_pracy="+MIEJSCE_PRACY,function(odp){
              
             
              
              
              if(odp == 0){
                  $("#arch_list").html("<div id='brak_ogl_prof'>Nie  zarchiwizowałeś żadnych ogłoszeń</div>");
              }else{
              
              $.getJSON("../../profil_ogl.php?archiwum=pokaz&miejsce_pracy="+MIEJSCE_PRACY,function(odp){
                  $("#arch_list").html("");
                 
                  
                  
                  $.each(odp,function(k,w){
                      
                        var usunieto = w.usunieto;
                 usunieto = usunieto.split("-");
                 usunieto = usunieto[2][0]+usunieto[2][1]+"."+usunieto[1]+" "+usunieto[2][3]+usunieto[2][4]+usunieto[2][5]+usunieto[2][6]+usunieto[2][7];
                      
                   /*   $("#arch_list").append("<div class='arch_info' id="+w.id+">"+usunieto+" "+w.id+" "+"</div>");
                      */
                      
                       
               
  
  
  var jakiedni = [];
     
       if(w.dzien != ""){
       jakiedni.push(w.dzien);
       }
  if(w.dzien2 != ""){
       jakiedni.push(w.dzien2);
       }
  if(w.dzien3 != ""){
       jakiedni.push(w.dzien3);
       }
  if(w.dzien4 != ""){
       jakiedni.push(w.dzien4);
       }
       
  var jakiedn = jakiedni.join(", ");
                            
                 
                 
                 
                 
     var trasa = w.trasa;
   /*  var tab_tr = [];
    trasa = trasa.split(",");
         
    for(let i =0;trasa.length > i;i++){
        
        tab_tr.push($("#"+trasa[i]).val());
        
    }
    
    tab_tr.join(",");*/
    
   
   
     
     
     
    
   
   var miejsce = $("#"+w.miejsc).val();
   
  
   if(jakiedn == "stale"){
       jakiedn = "na stałe";
   }
 
                 
             $("#arch_list").append("<div class='arch_info' id="+w.id+"><div class='miejsce_pracy'>"+wypisz_miejsce_pracy(MIEJSCE_PRACY)+"<br></div><div class='rodzaj_zmiany'>"+w.zmiana+"</div><div class='ogl_trasa'>"+trasa+"</div><div class='ogl_jakie_dni'><hr>"+jakiedn+"<hr></div><div class='ogl_miejsce'>"+miejsce+"</div><div class='kto_kiedy_ogl'><img src='../../img/data.png'>usunięto "+usunieto+"</div></div><div class='optogl'><div class='dod_pon_wyg dodaj_ponownie' ide="+w.id+">Dodaj ponownie<img class='optogl_obr' src='../../img/plus.png'/></div></div>");
             
                  });
                  
                  
            
                     $(".dodaj_ponownie").click(function(){
                          
                       
                   var id_dod_pon = $(this).attr("ide");
                          
              
               
               $("#arch_dod_pon").show().animate({
            scrollTop: 0,
        }, 100);
        
        $("#profil_zamknij").hide();

             $("#dod_pon_wstecz").click(function(){
            $("#profil_zamknij").show();
                 
                 $("#dod_pon_ogl_info").html("");
               $("#wiczm_dod_pon").prop("checked",false);
                     $("#wictr").prop("checked",false);
                    $("#zmiana_dod_pon").attr("multiple",false);
                    
$("option").attr("selected",false);
                 $("input").attr("selected",false);
             $("input").attr("multiple",false);
                $("#tresc_dod_pon").val("");
                $("#ak_dod_pon").val("");
            
            $("#miejsca_dod_pon option").attr("selected",false);
            $("#zmiana_dod_pon option").attr("selected",false);
            $("#wiczm").attr("checked",false);
            
            $("#zmiana_dod_pon").attr("multiple",false);
            
  
            $("#trasa_dod_pon option").attr("selected",false);
            $("#wictr_dod_pon").attr("checked",false);
            
            $("#trasa_dod_pon").attr("multiple",false);
             
             $("#zmiana_dod_pon").prop("disabled",false);
            
             $("#wiczm_dod_pon").prop("disabled",false);
                 $(".wiczm_info").hide();
           
            $(".wictr_info").hide();

                
                 $(".label_wiczm").css({
              "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               $(".label_wicak").css({
              "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               $(".label_wictr").css({
              "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
             
           
               $("#arch_dod_pon").hide();
               
             });//dod_pon_wstecz
             
             
   function uzeupelnij_dod_pon(){
      
     $.getJSON("ogloszenia.php?po_edycji_arch="+id_dod_pon,function(odpo){
                    
                    var tab_ogl = [];
                            $.each(odpo,function(k,w){
                  
                tab_ogl = {
                 "tresc":w.tresc,
                 "trasa":w.trasa,
                 "dzien":w.dzien,
                 "dzien2":w.dzien2,
                 "dzien3":w.dzien3,
                 "dzien4":w.dzien4,
                 "kto":w.kto,
                 "id":w.id,
                
                 "zmiana":w.zmiana,
                 "miejsc":w.miejsc,
                 "znalazl":w.znalazl,
                 "auto":w.auto
             };
                            
                                
         });//utworzyc tablice tabogl po zaktualizowaniu danych i wyswietlic te dane za pomoca funkcji uzupelnij a jesli nie to kazdemu selectowi z osobna przypisac nawa wartosc a pozniej jeszcze zaktualizowac wyniki wyszukiwania na glownej
         
      
           /*    
        
 $("#wictr_dod_pon").click(function(){
            
            if($(this).prop("checked") == true){
                $("#trasa_dod_pon").attr("multiple","multiple");
                
                  $(".label_wictr").css({
               "border":"0.1em inset grey",
               "background-color":"Honeydew"
               });
                
                $(".wictr_info").show()
                
            }else{
                $("#trasa_dod_pon").attr("multiple",false);
                
                 $(".label_wictr").css({
               "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               $(".wictr_info").hide();
            }
            
            
        });
       */
       $("#wiczm_dod_pon").click(function(){
            
            if($(this).prop("checked") == true){
                $("#zmiana_dod_pon").attr("multiple","multiple");
                 $(".label_wiczm").css({
               "border":"0.1em inset grey",
               "background-color":"Honeydew"
               });
                
                $(".wiczm_info").show();
             
            }else{
                $("#zmiana_dod_pon").attr("multiple",false);
                 $(".label_wiczm").css({
               "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               $(".wiczm_info").hide();
            }
            
            
            
            
        });

  
                $("#tresc_dod_pon").val(tab_ogl.tresc);
                
                 $("#trasa_dod_pon").val(tab_ogl.trasa);
                
                
                $("."+tab_ogl.miejsc).prop("selected",true);
                
               
              
                $.getJSON("../../profil_auto.php","auto=wybrane",function(odp){
              
               $("#twoje_auto_dod_pon").html("");
             
         if(odp == 0){
             
              $("#twoje_auto_dod_pon").html("nie masz wybranego żadnego auta");
             
             
         }else{
              
            $.each(odp,function(k,w){
                
                
                if(tab_ogl.auto == w.id){
                    var wybr = "selected";
                }else{
                    var wybr = "";
                }
                
                 $("#twoje_auto_dod_pon").append("<option value="+w.id+" "+wybr+">"+w.marka+" "+w.model+"</option>");
                
            });
              
         }
   });//auto edytuj get

                

 
              var tab_zmiana = tab_ogl.zmiana.split(",");
                var ile_tab_zmiana = tab_zmiana.length;
                
                if(ile_tab_zmiana > 1){
                    $("#wiczm_dod_pon").click();
                    
                
               
                 $("#zmiana_dod_pon option").prop("selected",false);
                
                for(var i =0;i<=(ile_tab_zmiana-1);i++){
                $("."+tab_zmiana[i]).prop("selected",true);

                }
                }else{
                   //tutej  
                    
                       $("."+tab_ogl.zmiana ).prop("selected",true);
                    
                }
                
               /* $("#pom_zm_ed").prop("checked",false);
                 $("#zmiana_edytuj").prop("disabled",false);
            $("#wiczm").prop("disabled",false);
            $("#pom_ak_ed").prop("disabled",false);*/
         
         
                
                var tab_trasa = tab_ogl.trasa.split(",");
                var ile_tab_trasa = tab_trasa.length;
                
             /*   if(ile_tab_trasa > 1){
                    $("#wictr_dod_pon").click();

                
               $("#trasa_dod_pon option").prop("selected",false);
                
                for(var i =0;i<=ile_tab_trasa-1;i++){
                $("."+tab_trasa[i]).prop("selected",true);
                
                }
                }else{
                   //tutej  
                    
                       $("."+tab_ogl.trasa ).prop("selected",true);
                    
                }*/
   
   $.getJSON("../../podaj_dni.php",function(odp){
         var wybrane = [];
        //alert("3670");
       $("#dni_dod_pon").html("");
    
        $("#dni_dod_pon").prepend("<input type='text' id='dni_dod_pon_input' style='display:none' disabled>");
            
    
                    $("#dni_dod_pon_input").val("podaj Dni");
            
            
             $("#dni_dod_pon_input").after("<label for='stale_dod_pon'><input class='dzien_dod_pon' type='checkbox' value='stale' id='stale_dod_pon'>na stałe</label>");
    
        $.each(odp,function(k,w){
            
            
         
            
                        $("#dni_dod_pon").append("<label for='"+w+"_dod_pon'><input class='dzien_dod_pon' type='checkbox' id='"+w+"_dod_pon' value="+w+">"+w+"</label>");
            
        
        });
        
          $("#dni_dod_pon label[for='stale_dod_pon']").css({
           "background-color":"azure",
           "font-weight":410
           
       });
      
       
      
      $(".dzien_dod_pon").on("click",function(){
           
          if(!$(this).is(":checked")){
             
             
            var index = wybrane.indexOf($(this).val());
             
             wybrane.splice(index,1);
             
           
            $("#dni_dod_pon label[for='"+$(this).attr("id")+"']").css({
               "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               

               
                 $("#dni_dod_pon label[for='stale_dod_pon']").css({
           "background-color":"azure",
           "font-weight":410
           
       });
      
              
                 
             
          }else{
              
              if($(this).attr("id") == "stale_dod_pon")
              {
             
              $(".dzien_dod_pon:not([id='stale_dod_pon'])").attr("checked",false);
                  $("#dni_dod_pon label").css({
            "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
       });
              
              wybrane.splice(0,4);
              
              }
              
              
              
              if(wybrane[0] == "stale"){
                    
                    wybrane.pop();//usuwa ostatni 
                  
                   $("#dni_dod_pon label[for='stale_dod_pon']").css({
               "border":"0.02em solid black",
               "background-color":"azure",
               "font-weight":410
               
               });
               
                  
                   $(".dzien_dod_pon[id='stale_dod_pon']").attr("checked",false);
                  
               }
              
               $("#dni_dod_pon label[for='"+$(this).attr("id")+"']").css({
               "border":"0.1em inset grey",
               "background-color":"Honeydew"
               });
              
              if(wybrane.length == 4){
                  
                  //jesli jest juz wybrane 6 usuwa ostatni i dodaje ten vo kliknelismy 
                  var ostatnia = wybrane[3]+"_dod_pon";
                  
                  
                  
                 
                  $(".dzien_dod_pon[id='"+ostatnia+"']").prop("checked",false);
                  
      
                  
                  wybrane.pop();//usuwa ostatni 
                  
                  wybrane.push($(this).val());
                  
                  
               
               $("#dni_dod_pon label[for='"+ostatnia+"']").css({
                "border":"0.04em solid Gainsboro",
               "background-color":"MintCream"
               });
               

                  
              }else{
              
              
              
              wybrane.push($(this).val());

              }
             
              
          }
          
        
          
          if(wybrane.length == 0){
              $("#dni_dod_pon_input").val("podaj dni");
              
            
              
          }else{
          $("#dni_dod_pon_input").val(wybrane);
          }
      
      });//.dnien click
      
      /*for(var i =0;jakiedni.length > i;i++){
           
           $(".dzien_ed[value='"+jakiedni[i]+"']").click();
       
           
           
           
       }*/
        
   });//get uzupelniajacy dniami edytuj dni
   
     });//get tworzacy tablice tabogl
                
   };//funkcja uzeupelnij_pola_edycji
   
   uzeupelnij_dod_pon();
   
   $("#dod_pon_form").attr("ide",id_dod_pon);
                
   //submir ba 5885
                
                          
                          
                          
                       });//dodaj ponownie
                      
                      
                 
                  
                  $(".arch_info").click(function(){
                      

                      var id = $(this).attr("id");
                     
                      $("#arch_info_zamknij").show();
                      $("#profil_zamknij").hide();
                     
                     $("#arch_info_zamknij").click(function(){
                         
                   $("#arch_info_strona").hide();
                   $("#profil_zamknij").show();
                   
                   
                         
                     });
                      
                    
    
            
                     $("#arch_info_strona").show();
                     
                     
                      
                      
                      $.getJSON("ogloszenia.php?po_edycji_arch="+id,function(odp){
                          
                          $("#arch_info").html("");
                          
                          $.each(odp,function(k,w){
                              
          tab_ogl = {
                 "tresc":w.tresc,
                 "trasa":w.trasa,
                 "dzien":w.dzien,
                 "dzien2":w.dzien2,
                 "dzien3":w.dzien3,
                 "dzien4":w.dzien4,
                 "kto":w.kto,
                 "id":w.id,
                 "ak":w.miejsce_pracy,
                 "zmiana":w.zmiana,
                 "miejsc":w.miejsc,
                 "znalazl":w.znalazl,
                 "usunieto":w.usunieto,
                 "auto":w.auto
             };
             
             
             
                  var dni = [];
                         if(w.dzien != ""){
                             dni.push(w.dzien);
                         }if(w.dzien2 != ""){
                             dni.push(w.dzien2);
                         }if(w.dzien3 != ""){
                             dni.push(w.dzien3);
                         }if(w.dzien4 != ""){
                             dni.push(w.dzien4);
                             
                         }
                         var tab_dni = [];
                         for(var i =0;dni.length> i;i++){
        
        if(dni[i] == "stale"){
            dni[i] = "na stałe";
        }
        
        tab_dni[i] = "<div class='info_dn'>"+dni[i]+"</div>";

    }
    
    tab_dni = tab_dni.join("");
                         
                         
                      
                     
    
    var zmiana = w.zmiana;
    zmiana = zmiana.split(",");
     var tab_zm = [];
                      
                       for(var i =0;zmiana.length > i;i++){
        
        
        tab_zm[i] = "<div class='info_zm'>"+zmiana[i]+"</div>";

    }
    
    tab_zm = tab_zm.join(" ");
                    
                      
                           
                    var rodzaj_zmiany = "Zmiana :<br>"+tab_zm+"<div style='clear:both'></div>";
                         
                         
                         
                         
                        
                   var usunieto = w.usunieto;
                 usunieto = usunieto.split("-");
                 usunieto = usunieto[2][0]+usunieto[2][1]+"."+usunieto[1]+" "+usunieto[2][3]+usunieto[2][4]+usunieto[2][5]+usunieto[2][6]+usunieto[2][7];
            
                        
  
   var trasa = w.trasa;
  /*   var tab_tr = [];
    trasa = trasa.split(",");
                
   for(var i =0;trasa.length> i;i++){
        
        tab_tr.push((i+1)+". "+$("#"+trasa[i]).val());
        tab_tr[i] = "<div class='inny_kolor123'>"+tab_tr[i]+"</div>";

    }
    
    
    
   tab_tr = tab_tr.join(" ");*/
   tab_tr = trasa.replaceAll("-","<img src='../../img/right-arrow.png' class='strzalka_trasa'/>");
                        
                     
                        
                     /*   $("#arch_info").html("<div class='dod_ogl_akap'>Trasa/y :</div><div id='info_trasa'>"+tab_tr+"</div><div class='dod_ogl_akap'>Zmiana/y :</div><div id='info_zmiana'>"+rodzaj_zmiany+"</div><div class='dod_ogl_akap'>Dni :</div><div id='info_dni'>"+tab_dni+"<div style='clear:both'></div></div><div class='dod_ogl_akap'>Treść :</div><div id='info_tresc'>"+w.tresc+"</div><div class='dod_ogl_akap'>Miejsc :</div><div id='info_miejsca'>"+$("#"+w.miejsc).val()+"</div><div id='info_dodano'>Usunięto "+usunieto+"</div>");    
                        */
                          $("#arch_info").html("<div class='dod_ogl_akap'>Trasa/y :</div><div id='info_trasa'>"+trasa+"</div><div class='dod_ogl_akap'>Zmiana/y :</div><div id='info_zmiana'>"+rodzaj_zmiany+"</div><div style='clear:both'></div><div class='dod_ogl_akap'>Miejsce Pracy:</div><div class='info_praca'>"+wypisz_miejsce_pracy(MIEJSCE_PRACY)+"</div><div class='dod_ogl_akap'>Dni :</div><div id='info_dni'>"+tab_dni+"<div style='clear:both'></div></div><div class='dod_ogl_akap'>Treść :</div><div id='info_tresc'>"+w.tresc+"</div><div class='dod_ogl_akap'>Miejsc :</div><div id='info_miejsca'>"+$("#"+w.miejsc).val()+"</div><div class='dod_ogl_akap'>Czy udało się znaleźć pasażera:</div><div id='info_znalazl'>"+w.znalazl+"</div><div id='info_dodano'>Dodane "+usunieto+"</div>");
                        
                     
                        
                        
                        
                        $(".inny_kolor123:odd").css({"background-color":"#F9F9F9"});
                        
                         $(".info_ak:even").css({"background-color":"white"});
                     
                                            $.getJSON("../../profil_oglasz.php?ogl=auto&id_auta="+tab_ogl.auto,function(o){
                        
                           $.each(o,function(k,w){
                                
                  
                  
                   $("#arch_info_auto").html("<div class='dod_ogl_akap'>Marka :</div><div id='info_auto_marka' class='info_auto'>"+w.marka+"</div><div class='dod_ogl_akap'>Model :</div><div id='info_auto_model' class='info_auto'>"+w.model+"</div><div class='dod_ogl_akap'>Typ :</div><div id='info_auto_typ' class='info_auto'>"+w.typ+"</div><div class='dod_ogl_akap'>Kolor :</div><div id='info_auto_kolor' class='info_auto'>"+w.kolor+"</div><div id='img_auto'><img src='../../img/"+w.typ+".png'></div>");
                   
                            });
                            
                                          });
             
             
             
             
                          });//each
          
                  
                      });//get
                      
                      
                  });//.arch info click
                  
              });//get pokax ogl z arch 
              }//if odp 0
              
              
             });//ile jest ogl w arvh 
               
           });//archiwum click
           
           
           
           $("#aktualne_ogl_menu").click();
           
           
       
       });//menu profil ogloszenia click
       
        
       
       
         
           
       
       $("#menu_profil_auto").click(function(){
           
           $(this).css({"border":"0.1em inset grey",
               "background-color":"Honeydew"});
               $("#menu_profil_user").css({
               "border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
    $("#menu_profil_ogl").css({
               "border":"0.04em solid Gainsboro",
    "background-color":"MintCream"});
           
          $("#edytuj_dane_info").html("");
                 $("#edytuj_pass").val("");
               $("#edytuj_imie").val("");
               
                $("#zmien_haslo_info").html("");
                $("#now_pass").val("");
                $("#new_pass").val("");
                $("#new_pass_2").val("");
           
           $("#user_ustaw_menu").hide();
           $("#profil_ogl").hide();
           $("#profil_user").hide();
           $("#profil_auto").show();
          // $("#profil_op").hide();
         
           
           
           $("#profil_op").hide();
           $("#arch_info_strona").hide();
           $("#akt_info_strona").hide();
              $("#zmien_haslo_widok").hide();
              $("#edytuj_dane_widok").hide();
                 $("#usun_konto_widok").hide();
                 $("#usun_konto_potw").hide();
         
           
           $("#profil_auto_dodaj").hide();
          
           $("#profil_auto_usun").hide();
           
           $("#profil_auto_edytuj").hide();
           $("#profil_auto_input").hide();
           
           $.getJSON("../../profil_auto.php","auto=czy",function(odp){
              
              
               if(odp == 0){
            $("#profil_auto_info").html("");
            $("#profil_auto_input").show();
             $("#profil_auto_dodaj").show();
             $("#profil_auto_dodaj_anuluj").hide();
               
                   
               }else{
                   
        $("#profil_auto_lista").show().html("");
        
$("#profil_auto_lista").prepend("<div id='profil_auto_dodaj2'>dodaj auto<img src='../../img/plus.png'/></div>");

  $("#profil_auto_dodaj2").click(function(){
       
        
       $.getJSON("../../profil_auto.php","auto=ile",function(od){
                       
         
        if(od == "duzo"){
            
           
                    $("#okienko_no_info").show().html("<div class='okienko_info'>Dodałeś już maksymalną ilość pojazdów</div>").delay(2500).fadeOut(1000);     
                         
                       }else if(od == "ok"){
                           
           $("#profil_auto_info").html("");
            $("#profil_auto_input").show();
             $("#profil_auto_dodaj").show();
          $("#profil_auto_dodaj_anuluj").show();
          
            
          
                       }
                      
                       
                
                   });
    
    
        });//profil auto dodaj2 
        
        $("#profil_auto_dodaj_anuluj").click(function(){
            
           $("#profil_auto_info").html("");
           $("#profil_auto_dodaj").hide();
           
          $("#profil_auto_input input:not([type=submit])").val("");
          
          $("#profil_auto_typ option").prop("selected",false);
            
        });
        
        $.each(odp,function(k,w){
            
            var text_col;
            var wybierz;
            
            if(w.wybrane == 1){
                
                text_col = "blue";
 wybierz = "<div class='ff34 auto_optogl'>WYBRANE</div>";
                
            }else{
                text_col ="black";
            
                
 wybierz = "<div class='profil_auto_wybierz auto_optogl' id="+w.id+">wybierz</div>";
               
            }
            
 $("#profil_auto_lista").append("<div class='jakie_auto' id="+w.id+" style='color:"+text_col+"'><div id='img_auto'><img src='../../img/"+w.typ+".png'></div><div class='dod_ogl_akap'>Typ :</div><div class='profil_auto_typ ggy'>"+w.typ+"</div><div class='dod_ogl_akap'>marka :</div><div class='profil_auto_marka ggy'>"+w.marka+"</div><div class='dod_ogl_akap'>model :</div><div class='profil_auto_model ggy'>"+w.model+"</div><div class='dod_ogl_akap'>kolor :</div><div class='profil_auto_kolor ggy'>"+w.kolor+"</div><div class='dod_ogl_akap'>Dwie ost :</div><div class='profil_auto_dwie ggy'>"+w.dwie_ost+"</div></div><div ide="+w.id+" class='profil_auto_optogl'>"+wybierz+"<div class='profil_auto_edytuj auto_optogl' id="+w.id+">edytuj</div><div class='profil_auto_usun auto_optogl' id="+w.id+">usuń</div><div style='clear:both'></div></div>");
              
        });//each
        
      
                   
                   $(".profil_auto_usun").click(function(){
                       
                       var id = $(this).attr("id");
                       
                       $("#profil_auto_usun").show();
                       
                   $.getJSON("../../profil_auto.php?auto=usun&usun_info="+id,function(odp){
                               
                               $.each(odp,function(k,w){
                                   

                                $("#profil_auto_usun_info").html("<div id='img_auto'><img src='../../img/"+w.typ+".png'></div><div class='dod_ogl_akap'>Typ :</div><div class='profil_auto_typ ggy'>"+w.typ+"</div><div class='dod_ogl_akap'>marka :</div><div class='profil_auto_marka ggy'>"+w.marka+"</div><div class='dod_ogl_akap'>model :</div><div class='profil_auto_model ggy'>"+w.model+"</div><div class='dod_ogl_akap'>kolor :</div><div class='profil_auto_kolor ggy'>"+w.kolor+"</div><div class='dod_ogl_akap'>Dwie ost :</div><div class='profil_auto_dwie ggy'>"+w.dwie_ost+"</div></div>");
              
                                   
                               });
                               
                           });
                       
                       $("#profil_auto_usun_tak").click(function(){
                    
                    if(id != 0){
               $.getJSON("../../profil_auto.php?auto=usun&usun_tak="+id,function(odp){
                     
                     
                     if(odp == "del"){
                        
                        // $("#profil_auto_lista").html('');
                        
                        
                      $(".jakie_auto[id="+id+"]").fadeOut(1200);
                      
                       $(".profil_auto_optogl[ide="+id+"]").fadeOut(1200);
                        
                         
                        $("#okienko_info").show().html("<div class='okienko_info'>auto zostało usunięte!</div>").delay(2500).fadeOut(1000);  
                         
                         $("#profil_auto_usun_nie").click();
                        
                       
                      /*  $("#menu_profil_auto").click();*/
                 
                 
                 
                     }//if odp del 
                     
                    
                     
                     
                     });
                       }
                       });
                       
                       $("#profil_auto_usun_nie").click(function(){
                           $("#profil_auto_usun").hide();
                           
                           id=0;
                       });
                       
                   });//profil auto usun
                   
                   
                   $(".profil_auto_edytuj").click(function(){
                       
                       var id = $(this).attr("id");
                       
                       $("#profil_auto_edytuj_input").attr("ide",id);
                       
                       
                       $("#profil_auto_edytuj_info").html("");
                       
                       $("#profil_auto_edytuj").show();
                       
                       $("#profil_auto_edytuj_anuluj").click(function(){
                           
                           $("#profil_auto_edytuj").hide();
                           
                           $("#profil_auto_edytuj_input input:not([type=submit])").val("");
                           
                     
                       });//edytuj anuluj 
                       
                       
                   $.getJSON("../../profil_auto.php?auto=usun&usun_info="+id,function(odp){
                               
                               
                               $.each(odp,function(k,w){
                                   
                      $("#profil_auto_edytuj_marka").attr("placeholder",w.marka);
                      
                      $("#profil_auto_edytuj_model").attr("placeholder",w.model);
                      
                      $("#profil_auto_edytuj_kolor").attr("placeholder",w.kolor);
                      
                      $("[val="+w.typ+"]").prop("selected",true);
                      
                      $("#profil_auto_edytuj_typ").attr("typ",w.typ);
                      
                      $("#profil_auto_edytuj_dwa").attr("placeholder",w.dwie_ost);
                                   
                               });
                               
                           });//get uzupelniam dane inforacjami z get usun zeby nie tworzyc wiecej funkcji
                       
                       
      //auto edytuj submit na 9700
                       
                       
                   });//profil auto edytuj 
                                          
                   
                   
                   $(".profil_auto_wybierz").click(function(){
                       
                       var id = $(this).attr("id");
                       
                       $.getJSON("../../profil_auto.php?auto=wybierz&id="+id,function(odp){
                           
                         if(odp == "wybrano"){
                            $("#menu_profil_auto").click();
                             
                              
                             
                             
                         }
                           
                       });
                       
                   });//profil auto wybierz 
                   

                   
                   
               }
               

               
           });//get czy posiada auto 
           
           
       });//menu_profil_auto click
       
       
       //profil auto input submit 5900



       
    /*   $("#menu_profil_opinie").click(function $("#zmien_haslo_info").html("");
                $("#now_pass").val("");
                $("#new_pass").val("");
                $("#new_pass_2").val("");(){
           
           $("#user_ustaw_menu").hide();
           $("#profil_ogl").hide();
           $("#profil_user").hide();
           $("#profil_auto").hide();
           $("#profil_op").show();
           
           
           $("#profil_op_tobie").click(function(){
               
          $("#profil_op_usun").hide();
          $("#profil_op_edytuj").hide();
           
           
           
          $.getJSON("profil_opinie.php?opinie=tobie",function(odp){
                      
                      $("#con_profil_op").html("");
                      
                 $.each(odp,function(k,w){
                     
                     
                     
                 $("#con_profil_op").append("<div class='opinia_o_tobie' odp="+w.odp+" id="+w.id+">"+w.tresc+"</div><div class='odp_na_op' id="+w.id+"></div>");
                 
                 });//each 
                 
                 function opcje_odp(){
                 
                 $(".edytuj_odp").click(function(){
                        
                       $("#profil_edytuj_op_info").html("");
                        
                          id_edytuj = $(this).attr("id");
                          
                          
                 $("#profil_op_edytuj").show();
                
                     $.get("profil_opinie.php?opinie=pokaz_odp&id="+id_edytuj,function(odp){
                        
                  $("#edytuj_odp_info").attr("placeholder",odp);
                 
                        
                    });
                    
                      $.get("profil_opinie.php?opinie=pokaz_op&id="+id_edytuj,function(odp){
                        
                  $("#edytuj_op_info").html(odp);
                        
                    });
                    
                    
                    $("#edytuj_odp_input").click(function(){
                        
                        var tresc = $("#edytuj_odp_info").val();
                        
                        if(tresc == ""){
                              $("#profil_edytuj_op_info").html("Wprowadz odpowiedz na opinie");
                        }else if(tresc == $("#edytuj_odp_info").attr("placeholder")){
                            
                            $("#profil_edytuj_op_info").html("Nowa odpowiedz i stara są takie same");
                            
                        }else{
                            if(id_edytuj > 0){
                            $.getJSON("profil_opinie.php?opinie=edytuj&id="+id_edytuj+"&tresc="+tresc,function(odp){
                                
                             if(odp == "ed"){
                                
                    $(".opinia_o_tobie[id="+id_edytuj+"]").click().click();
                                 $("#edytuj_odp_info").val("");
                                 
                     $("#profil_op_edytuj").hide();
                                id = 0;
                             }
                            
                           id_edytuj =0;
                            
                           });//get edytuj
                            
                            };//if 0 
                        }
                        
                        //chcesz soe dzieloc robpta to dziel sie wyplata 
                    
                        
                        return false;
                    });
                
                          
                      });//edytuj odp
                      
                 
                    $(".usun_odp").click(function(){
                          
                           id_usun = $(this).attr("id");
                          
                           $.get("profil_opinie.php?opinie=pokaz_odp&id="+id_usun,function(odp){
                        
                  $("#usun_odp_info").html(odp);
                        
                    });
                    
                      $.get("profil_opinie.php?opinie=pokaz_op&id="+id_usun,function(odp){
                        
                  $("#usun_op_info").html(odp);
                        
                    });
                    
                    
                    if(id_usun > 0){
                    $("#usun_odp_tak").click(function(){
                        
                        
                    $.getJSON("profil_opinie.php?opinie=usun_odp&id="+id_usun,function(odp){
                    
                       if(odp == "del"){
                         
                          $(".opinia_o_tobie[id="+id_usun+"]").attr("odp",0);
                          
                          //odp =0 przenosi na nastepne odpowiedxi po klikniecii 
                          //dodalem id powinno byc dobrze 
                          
                       $(".opinia_o_tobie[id="+id_usun+"]").click().click();
                                 
                     $("#profil_op_usun").hide();
                          
                         id =0;
                      id_usun = 0;
                      
                     
                       };//if del
                       
                    });//get usun
                    
                    
                    
                    });//usun odp tak
                    
                    
                    };//if 0
                          
                          $("#profil_op_usun").show();
                          
                      });//usun odp click
        
                      
                      $(".odp_anuluj").click(function(){
                          
                   $("#profil_op_usun").hide();
                   id_usun = 0;
                    
                    $("#profil_op_edytuj").hide();
                    $("#edytuj_odp_info").val("");
                    id_edytuj = 0;
                          
                      });
                      
                 };//funckca opcje 
                 
                
                 
                      $(".odp_na_op").hide();
                      
                      
                      
                      $(".opinia_o_tobie").click(function(){
                          
                          id = $(this).attr("id");
                          
                          //ta funkcje co pobiera dane odp z baxy 
                          
                          $(".odp_na_op[id="+id+"]").toggle();
                          
                    
                    var odp = $(this).attr("odp");
      
                     var odpo;
                     if(odp == 0){
                         odpo = "<form class='odpo_na_op' id="+id+"><input type='text' id="+id+" placeholder='ODPOWIEDZ'><input type='submit' value='odpowiedz'></form>";
                     }else{
                         
                         
                         function opinia_odp(id_op){
        
                         $.ajax({
                           type: "GET",
                           url:"profil_opinie.php?opinie=pokaz_odp&id="+id_op,
                           async: false,
                           success: function(odp){
                            opinia_odp = odp;
                            }
                         });
        
                          return opinia_odp;

                          };
                        odpo = opinia_odp(id)+"<div class='usun_odp' id="+id+">usun</div><div class='edytuj_odp' id="+id+">edytuj</div><br>";
                      
                     
                         
                     };//if 0dp
      
      
                       $(".odp_na_op[id="+id+"]").html(odpo);
                          
                          $(".odpo_na_op").submit(function(){
                          
                         var id_dodaj = $(this).attr("id");
                         var tresc = $("input[id="+id_dodaj+"]").val();
                         
                        
                        
                        $.getJSON("profil_opinie.php?opinie=dodaj_odp&id="+id_dodaj+"&tresc="+tresc,function(odp){
                            
                            
                      if(odp == "dodano"){
                      
                     $(".opinia_o_tobie").attr("odp",id_dodaj);
                      
                    $(".opinia_o_tobie[id="+id_dodaj+"]").click().click();
                             
                     id=0;
                        };//if dodano
                            
                        });//get 
                          
                          return false;
                      });//submit 
                      
                          
                          opcje_odp();

                          
                      });//opinia o tobie click
                      
                      
                  });//get
                  
           }).click();//tobie click 
           
           $("#profil_op_twoje").click(function(){
               
               
         $("#profil_op_usun").hide();
         $("#profil_op_edytuj").hide();
           
           
               
               $("#con_profil_op").html("widzisz ttlko ty");
               
           });
           
       });*/
       
       
    menu_profil_user.click();
   

     

  });//profil menu click
  
  
  $("#profil_auto_edytuj_input").submit(function(){
                    
                    var ide = $(this).attr("ide");
                           
     var marka;   
     var model;
     var kolor;
     var typ;
     
     if($("#profil_auto_edytuj_marka").val() == ""){
          marka = $("#profil_auto_edytuj_marka").attr("placeholder");
                }else{
         marka = $("#profil_auto_edytuj_marka").val();
                }
                
 if($("#profil_auto_edytuj_model").val() == ""){
          model = $("#profil_auto_edytuj_model").attr("placeholder");
                }else{
         model = $("#profil_auto_edytuj_model").val();
                }
                
 if($("#profil_auto_edytuj_kolor").val() == ""){
          kolor = $("#profil_auto_edytuj_kolor").attr("placeholder");
                }else{
           kolor = $("#profil_auto_edytuj_kolor").val();
                }
                
    typ = $("#profil_auto_edytuj_typ").val();
                
 if($("#profil_auto_edytuj_dwa").val() == ""){
          dwa = $("#profil_auto_edytuj_dwa").attr("placeholder");
                }else{
         dwa = $("#profil_auto_edytuj_dwa").val();
                }
                
             if($("#profil_auto_edytuj_marka").val() == "" && $("#profil_auto_edytuj_model").val() == "" && $("#profil_auto_edytuj_kolor").val() == "" && $("#profil_auto_edytuj_dwa").val() == "" && $("#profil_auto_edytuj_typ").attr("typ") == $("#profil_auto_edytuj_typ").val()){
         
       $("#profil_auto_edytuj_info").html("<div style='color:red;'>Uzupełnij pole, które chcesz edytować</div>");
         
     }else{
                
                
                var data = {
                    "auto":"edytuj",
                    "id":ide,
                    "marka":marka,
                    "model":model,
                    "kolor":kolor,
                    "typ":typ,
                    "dwa":dwa
                };
                
                $.getJSON("../../profil_auto.php",data,function(odp){
                    
                  
                    
                    
                    if(odp == "edytowano"){
                       $("#menu_profil_auto").click();
                      
                      
                    /*  if($(".jakie_auto[id="+ide+"]").css("color") == "blue"){
                          
                          
                         var wybierz = "<div class='profil_auto_wybierz' id="+ide+">wybierz</div>";
                        var wybrane =1;
                      }else{
                          var wybrane= 0;
                          var wybierz = "";
                      }
                          
                          
                      $(".jakie_auto[id="+ide+"]").html(marka+" "+model+" "+dwa+" wybr "+wybrane+"<div class='profil_auto_usun' id="+ide+">usun swoje auto</div><div class='profil_auto_edytuj' id="+ide+">edytuj</div>"+wybierz);    
                          
                         */
                      
                      

                      
                      $("#profil_auto_edytuj_anuluj").click();
                      
                                        $("#okienko_info").show().html("<div class='okienko_info'>auto zostało edytowane</div>").delay(2500).fadeOut(1000);
                    }
                    
                    
                });
     }
                     return false;
                       });
                       
  
  $("#profil_auto_input").submit(function(){
                
                   
                   var marka = $("#profil_auto_marka").val();
                   var model = $("#profil_auto_model").val();
                   var kolor = $("#profil_auto_kolor").val();
                   var typ = $("#profil_auto_typ").val();
                   var dwa = $("#profil_auto_dwa").val();
                   
                   var dane = {
                       "auto":"dodaj",
                       "marka":marka,
                       "model":model,
                       "kolor":kolor,
                       "typ":typ,
                       "dwa":dwa
                   };
                  
                  
                  if(marka == "" || model == "" || kolor == "" || dwa == ""){
                      
                      $("#profil_auto_info").show().html("musisz wypełnić wszystkie pola");
                      
                  }else{
                
                   $.getJSON("../../profil_auto.php",dane,function(odp){
                       
    
                       if(odp == "dodano"){
                          
                         $("#menu_profil_auto").click();
                         
                         
                         
$("#profil_auto_input input:not([type=submit])").val("");
          
          $("#profil_auto_typ option").prop("selected",false);
                  
                  /*alert("fodano");*/
                  
                  $("#okienko_info").show().html("<div class='okienko_info'>auto zostało dodane</div>").delay(2500).fadeOut(1000);
                         
                       }else if(odp == "duzo"){
        $("#profil_auto_dodaj").show();
                           $("#profil_auto_input").hide();
                           
    $("#profil_auto_info").show().html("posiadasz za dużo, aut max 3");
     $("#profil_auto_dodaj_anuluj").show();
                       }
                      
                       
                
                   });
                  
                  }
                
                   return false;
               });//submit dodaj auto 
 
$("#dod_pon_form").submit(function(){
                    
                 var ide = $(this).attr("ide");
                    
                    
                   
                    
      var zmiana_dod_pon = $("#zmiana_dod_pon").val();
      
    
      var trasa_dod_pon = $("#trasa_dod_pon").val();
      
      var miejsc_dod_pon = $("#miejsca_dod_pon").val();
      
      var tresc_dod_pon = $("#tresc_dod_pon").val();
                    
      var auto_dod_pon = $("#twoje_auto_dod_pon").val();
              
              
              
             
 $.getJSON("ogloszenia.php?po_edycji_arch="+ide,function(odpo){
                    
                    var tab_ogl = [];
                            $.each(odpo,function(k,w){
                  
                tab_ogl = {
                 "tresc":w.tresc,
                 "trasa":w.trasa,
                 "dzien":w.dzien,
                 "dzien2":w.dzien2,
                 "dzien3":w.dzien3,
                 "dzien4":w.dzien4,
                 "kto":w.kto,
                 "id":w.ide,
                 "zmiana":w.zmiana,
                 "miejsc":w.miejsc,
                 "znalazl":w.znalazl,
                 "auto":w.auto
             };
                                
                                
                            });//utworzyc tablice tabogl po zaktualizowaniu danych i wyswietlic te dane za pomoca funkcji uzupelnij a jesli nie to kazdemu selectowi z osobna przypisac nawa wartosc a pozniej jeszcze zaktualizowac wyniki wyszukiwania na glownej
                       
                   /*    if(tab_ogl.ak == ""){
                           tab_ogl.ak = null;
                       }
                       
                        if(tab_ogl.zmiana == ""){
                           tab_ogl.zmiana = null;
                       }
                       */
                    

                      
   
                            
 /*alert(zmiana_dod_pon+"=="+tab_ogl.zmiana+" && "+ak_dod_pon+"=="+tab_ogl.ak+" && "+trasa_dod_pon+"=="+tab_ogl.trasa+" && "+miejsc_dod_pon+"=="+tab_ogl.miejsc+" && "+$("#dni_dod_pon_input").val()+" && "+tresc_dod_pon+"=="+tab_ogl.tresc+" && "+auto_dod_pon+" == "+tab_ogl.auto+" ide = "+ide);*/
 
              if($("#dni_dod_pon_input").val() == "podaj Dni"){
                   
                    $("#dod_pon_ogl_info").html("Musisz podać dni");
                }else{
                    
                    if(zmiana_dod_pon == null){
                          $("#dod_pon_ogl_info").html("pole zmiana nie może być puste");
                     }else{
                         
                          if(trasa_dod_pon == ""){
               $("#dod_pon_ogl_info").html("Podaj trasę").show();
           }else{
    
                    
                    var dane_dod_pon = {
                        "dod_pon":true,
                        "miejsce_pracy":MIEJSCE_PRACY,
                        "id":ide,
                        "zmiana":zmiana_dod_pon,
                        "trasa":trasa_dod_pon,
                        "miejsc":miejsc_dod_pon,
                        "tresc":tresc_dod_pon,
                        "dni":$("#dni_dod_pon_input").val(),
                        "auto":auto_dod_pon
                    };
                    
                    $.getJSON("../../profil_ogl.php",dane_dod_pon,function(odp){
                        
                    
                        
                        if(odp == "dodano"){
                            
            /*                
                       
      var filtrzmiana = $("#filtrzmiana option:selected").attr("id");
      
      var filtrak = $("#filtrak option:selected").attr("id");
    
      var filtrtrasa = $("#filtrtrasa option:selected").attr("id");
      
      var filtrmiejsca = $("#filtrmiejsca option:selected").attr("id");
   
         /* alert(filtrak+filtrzmiana+filtrtrasa+filtrmiejsca+$("#dniinput").val());
               
               alert($("#filtrzmiana").attr("class"));
alert($("#filtrak").attr("class"));*/
               //dobrze pokazuje 
               
              
               /*
if($("#filtrzmiana").attr("class") == "pierwszy"){
 
        filtry_zmiana(filtrzmiana,$("#dniinput").val(),filtrtrasa,filtrmiejsca);
        
       
    }else if($("#filtrak").attr("class") == "pierwszy"){
        filtry_ak(filtrak,$("#dniinput").val(),filtrtrasa,filtrmiejsca);
        
    }*/
     $("#okienko_info").show().html("<div class='okienko_info'>Ogłoszenie zostało dodane ponownie!</div>").delay(1500).fadeOut(1000);
    
  $("#dod_pon_wstecz").click();
    
    $(".arch_info[id="+ide+"]").fadeOut(2000);
    $(".dodaj_ponownie[ide="+ide+"]").fadeOut(2000);
   
     $("#dod_pon_ogl_info").html("");
     
     $("#ogloszenia").prop("dd",1);
    
       }else if(odp == "duzo"){
           
  
   $("#okienko_no_info").show().html("<div class='okienko_info'>masz już 3 ogłoszenia, edytuj istniejące lub usuń a następnie spróbuj ponownie</div>").delay(3500).fadeOut(2000);
            $("#dod_pon_wstecz").click();
       }
                        
                    });
                    
                     }
                    
                } 
                    
                }//if
                
 });//get
                    
                    return false;
                });//submit 
  
  
  $("#edytuj_submit").click(function(){
             
             
             
             
             if($("#edytuj_submit").attr("oglo") == 1){
                    
               id = $(this).attr("ide");
                   
      var zmiana_ed = $("#zmiana_edytuj").val();
      
    
      var trasa_ed = $("#trasa_edytuj").val();
      
      var miejsc_ed = $("#miejsca_edytuj").val();
      
      var tresc_ed = $("#tresc_edytuj").val();
                    
      var auto_ed = $("#twoje_auto_edytuj").val();
              
              
          if(id !=0){
             
              if(trasa_ed == ""){
               $("#edytuj_ogl_info").html("Podaj trasę").show();
           }else{
    
             
 $.getJSON("ogloszenia.php?po_edycji="+id,function(odpo){
                    
                    var tab_ogl = [];
                            $.each(odpo,function(k,w){
                  
                tab_ogl = {
                 "tresc":w.tresc,
                 "trasa":w.trasa,
                 "dzien":w.dzien,
                 "dzien2":w.dzien2,
                 "dzien3":w.dzien3,
                 "dzien4":w.dzien4,
                 "kto":w.kto,
                 "id":w.id,
                 "miejsce_pracy":MIEJSCE_PRACY,
                 "zmiana":w.zmiana,
                 "miejsc":w.miejsc,
                 "auto":w.auto
             };
                                
                                
                            });//utworzyc tablice tabogl po zaktualizowaniu danych i wyswietlic te dane za pomoca funkcji uzupelnij a jesli nie to kazdemu selectowi z osobna przypisac nawa wartosc a pozniej jeszcze zaktualizowac wyniki wyszukiwania na glownej
                         
 var jakiedni = [];
     
       if(tab_ogl.dzien != ""){
       jakiedni.push(tab_ogl.dzien);
       }
  if(tab_ogl.dzien2 != ""){
       jakiedni.push(tab_ogl.dzien2);
       }
  if(tab_ogl.dzien3 != ""){
       jakiedni.push(tab_ogl.dzien3);
       }
  if(tab_ogl.dzien4 != ""){
       jakiedni.push(tab_ogl.dzien4);
       }
       
  var jakiedn = jakiedni.join(",");
 
 
 
          if(auto_ed == null){
              auto_ed = "";
          }
             

                                 
/* alert(zmiana_ed+"=="+tab_ogl.zmiana+" && "+ak_ed+"=="+tab_ogl.ak+" && "+trasa_ed+"=="+tab_ogl.trasa+" && "+miejsc_ed+"=="+tab_ogl.miejsc+" && "+jakiedn+"=="+$("#dni_edytuj_input").val()+" && "+tresc_ed+"=="+tab_ogl.tresc+" && "+auto_ed+"=="+tab_ogl.auto);*/
             
             
              if(zmiana_ed == tab_ogl.zmiana && trasa_ed == tab_ogl.trasa && miejsc_ed == tab_ogl.miejsc && jakiedn == $("#dni_edytuj_input").val() && tresc_ed == tab_ogl.tresc && auto_ed == tab_ogl.auto){
                   
                    $("#edytuj_ogl_info").html("nie zmieniono ");
                    id=0;
                }else{
                    
                    if(zmiana_ed == ""){
                          $("#edytuj_ogl_info").html("pole zmiana nie może buć puste");
                          id=0;
                     }else{
                    
                 
                     var dane_ed = {
                        "edytuj":true,
                        "id":id,
                        "zmiana":zmiana_ed,
                        "miejsce_pracy":MIEJSCE_PRACY,
                        "trasa":trasa_ed,
                        "miejsc":miejsc_ed,
                        "tresc":tresc_ed,
                        "dni":$("#dni_edytuj_input").val(),
                        "auto":auto_ed
                    };
                    
                    
                   /* alert(id+" "+tab_ogl.ak);*/
                    
                    $.getJSON("../../profil_ogl.php",dane_ed,function(odp){
                        
                        
                        
                        if(odp== "ok"){
                        
      /*
var filtrzmiana = $("#filtrzmiana option:selected").attr("id");
      
      var filtrak = $("#filtrak option:selected").attr("id");
    
      var filtrtrasa = $("#filtrtrasa option:selected").attr("id");
      
      var filtrmiejsca = $("#filtrmiejsca option:selected").attr("id");
  
         
               unbinduj();
               
if($("#filtrzmiana").attr("class") == "pierwszy"){
 
        filtry_zmiana(filtrzmiana,$("#dniinput").val(),filtrtrasa,filtrmiejsca);
        
       
    }else if($("#filtrak").attr("class") == "pierwszy"){
        filtry_ak(filtrak,$("#dniinput").val(),filtrtrasa,filtrmiejsca);
        
    }*/
    
           
           $("#eod_close").click();
          
              var data = new Date();
      
      
      function addZero(i) {
  if (i < 10) {i = "0" + i}
  return i;
}

   data = addZero(data.getDate())+"."+addZero((data.getMonth()+1))+" "+addZero(data.getHours())+":"+addZero(data.getMinutes());
   
   
                 
var trasa = trasa_ed;//bylo #+trasa_ed.html()
var miejsce = $("#"+miejsc_ed).html();
             var dni_ed = $("#dni_edytuj_input").val();
             
             if(dni_ed == "stale"){
                 dni_ed = "na stałe";
             }
             
            /* $(".akt_info[id="+id+"]").html("<div class='rodzaj_zmiany'>"+ak_ed+" "+zmiana_ed+"</div><div class='ogl_trasa'>"+trasa+"</div><div class='ogl_jakie_dni'><hr>"+dni_ed+"<hr></div><div class='ogl_miejsce'>"+miejsce+"</div><div class='kto_kiedy_ogl'><img src='../../img/data.png'>"+data+"</div>");*/
             
             $(".akt_info[id="+id+"]").html("<div class='miejsce_pracy'>"+wypisz_miejsce_pracy(MIEJSCE_PRACY)+"<br></div><div class='rodzaj_zmiany'>"+zmiana_ed+"</div><div class='ogl_trasa'>"+trasa+"</div><div class='ogl_jakie_dni'><hr>"+dni_ed+"<hr></div><div class='ogl_miejsce'>"+miejsce+"</div><div class='kto_kiedy_ogl'>Edytowane: "+data+"</div>");
            
           
           
           $("#okienko_info").show().html("<div class='okienko_info'>Ogłoszenie zostało edytowane!</div>").delay(2500).fadeOut(1000);
           
           $("#ogloszenia").prop("dd",1);
    
                        }
                        
                    });
                    
                }
                    
                }//if 
             
                
 });//get
          }
 
          }
         }//if attr oglo
                    return false;
                });//submit
                           
                
   
      dojazdy_menu.click();
      
  
  //wydzukaj kierpwcy po zmianie aby sie go zapytac czy ms miejsce 
   
   
   //==== koniec menu
   
   
      
    $(window).scroll(function(){
        
         if($(window).scrollTop() > 524){
            $('.back-to-top').fadeIn(200);
        }else{
            $('.back-to-top').fadeOut(200);
        }
        
        
    
});//window scroll 


    
    //===== Prealoder
    
    $(window).on('load', function(event) {
        $('.preloader').delay(500).fadeOut(500);
    });
    
    
    //===== Sticky
    
    $(window).on('scroll', function(event) {    
        
        
            
    if($(window).scrollTop() + ($(window).height()+70) > $(document).height()) {
       
     
       
       $("#wait_dol").show();
       
       //2201 + 631 > 2888
       //2832 > 2888
       //brakuje 56
       
       
       //4882 + 631 > 5570
       //brakuje 57 
     
    
       
       var filtrzmiana = $("#filtrzmiana option:selected").attr("id");
      
      var filtrak = $("#filtrak option:selected").attr("id");
    
      var filtrtrasa = $("#filtrtrasa option:selected").attr("id");
      
      var filtrmiejsca = $("#filtrmiejsca option:selected").attr("id");

    
  function ile_og(){
        
        $.ajax({
         type: "GET",
         url: "ogloszenia.php",
         data: 'ile=123&filtrzmiana='+filtrzmiana+'&filtrdni='+$("#dniinput").val()+'&filtrtrasa='+filtrtrasa+'&filtrmiejsca='+filtrmiejsca+"&miejsce_pracy="+filtrak,
         async: false,
         success: function(odp){
             
        ile = odp;
        
         }
        });
        
        return ile;

    };
    
  var ile_oglo = ile_og();
 
 

 
   if(ile_oglo != "0"){
     
    if(ile_oglo >= limit_ogl){
         
         limit_ogl = limit_ogl+10;
         
    $("#koniec").html("")
    
/*alert(filtrtrasa+" "+$("#dniinput").val()+" "+filtrtrasa+" "+filtrmiejsca+" "+filtrak+" limit"+limit_ogl);
 */
 pokaz_ogl(filtrzmiana,$("#dniinput").val(),filtrtrasa,filtrmiejsca,filtrak);
        
    }else{
        $("#koniec").html("<div class='koniec' >Obejżałeś już wszystkie ogłoszenia w wybranych filtrach</div>");
    }
    
   }
   
   /*else{
       $("#koniec").html("nie ma wynikow yo nie laduje");
   }*/
   
   
   
   }//if
   
   
        
        
        
        var scroll = $(window).scrollTop();
        if (scroll < 10) {
            $(".navbar-area").removeClass("sticky");
        } else{
            $(".navbar-area").addClass("sticky");
        }
      
      
        
    });
    
     //===== close navbar-collapse when a  clicked
    
    $(".navbar-nav a").on('click', function () {
        $(".navbar-collapse").removeClass("show");
    });
    
    //===== Mobile Menu
    
    $(".navbar-toggler").on('click', function(){
        $(this).toggleClass("active");
    });
    
    $(".navbar-nav a").on('click', function() {
        $(".navbar-toggler").removeClass('active');
    });
    
    
    //===== Section Menu Active

    var scrollLink = $('.page-scroll');
        // Active link switching
        $(window).scroll(function() {
        var scrollbarLocation = $(this).scrollTop();

        scrollLink.each(function() {

          var sectionOffset = $(this.hash).offset().top - 73;

          if ( sectionOffset <= scrollbarLocation ) {
            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');
          }
        });
    });    
    
    
    //===== Sidebar

        
    //===== Back to top
    
    // Show or hide the sticky footer button
    
    // $('.back-to-top').fadeIn(200);
    
   
    
   
    
    
    //Animate the scroll to yop
    $('.back-to-top').on('click', function(){
       
      
        
        $(document).animate({
            scrollTop: 0,
        }, 1500);
    });
    
    
    //=====  AOS
    
    new WOW().init();
    
    
    //===== 
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

});