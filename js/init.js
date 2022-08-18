//Hook up the tweet display

$(function() {
    
    var reg = $('#reg');
    reg.hide();
    var log = $('#log');
    
    $("#przywroc_pass").hide();
    $("#co_teraz").html("Logowanie");
    
    $("#wrlo").hide();
    
    
    
    $("#zglos_blad").click(function(){
        
        $("#zglos_blad_pole").toggle();
        $('#zglos_pole_input').hide();
        $("#zglos_inne").hide();
        $("#tresc_bledu").val("");
       
       
    });
    
    
    $(".zglos_item").click(function(){
        
       
       if(rodz != "blad_inne"){
        
       var rodz = $(this).attr("id");
       
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
       
       
       $.get("to/zglos.php","rodz="+rodz+"&tresc="+tresc,function(odp){
           
          
           
           alert("Dziękujemy za przesłanie zgłoszenia!");
           
           $("#zglos_blad").click();
           
       });
         
         
         return false;
     });
    
         $("#tresc_bledu_send_inne").click(function(){
         
         
                 
       var rodz = "inny_logowanie";
       var tresc = $("#tresc_inne").val();
       
       
       $.get("to/zglos.php","rodz="+rodz+"&tresc="+tresc,function(odp){
           
          
          
           alert("Dziękujemy za przesłanie zgłoszenia!");
           
           $("#zglos_blad").click();
           
       });
         
         
         return false;
     });

    
    $("#rej").click(function(){
        
        log.hide();
        reg.show();
        $("#wrlo").show();
        $("#rej").hide();
        $("#przywroc_pass").hide();
        $("#log_error").html("").hide();
        $("#reg_error").html("").hide();
        $("#co_teraz").html("Rejestracja");
        
    });
    
        $("#menu_reg").click(function(){
        
        $("#rej").click();
        $(".menu-burger").click();
        
    });
    
    $("#wrlo").click(function(){
        
        reg.hide();
        log.show();
        $("#rej").show();
        $("#wrlo").hide();
        $("#przywroc_pass").hide();
        $("#co_teraz").html("Logowanie");
        $("#przywroc_email_error").hide();
        $("#log_error").html("").hide();
        $("#reg_error").html("").hide();
    });
    
    $("#menu_log").click(function(){
        
        $("#wrlo").click();
        $(".menu-burger").click();
        $("#log_error").html("").hide();
        $("reg_error").html("").hide();
        
    });
    
    
    
    
    $("#przywroc_pass_click").click(function(){
        $("#co_teraz").html("Przywracanie hasła");
        reg.hide();
        log.hide();
        $("#rej").hide();
        $("#wrlo").show();
        $("#przywroc_pass").show();
        
        $("#przywroc_email").show();
        $("#wpisz_kod").hide();
        $("#new_pass").hide();
        
        $("#przywroc_email_error").html("");
        $("#wpisz_kod_info").html("");
        $("#new_pass_info").html("");
       
       $("#log_error").html("").hide();
        $("#reg_error").html("").hide();
        
        //jesli ten user ma kod podany w tabeli to od razu pokazuje pole do wpisaniu pola a po ustawieniu nowego hasla usuwany jest ten rekord jednak w ciasteczku zapisz
        
        
        
        
    });
    
    $("#menu_przyp").click(function(){
        
        $("#przywroc_pass_click").click();
        $(".menu-burger").click();
        
    });
    
    
     $("#przywroc_email_form").submit(function(){
            
            var emailval = $("#przywroc_email_val").val();
            
            $.getJSON("przywroc.php","email="+emailval,function(odp){
                
                if(odp == "gutmail"){
                    
                    $("#przywroc_email_error").hide().html("");
                    
                    $("#wpisz_kod_info").show().html("Na email <b>"+emailval+"</b> został wysłany 6-cio cyfrowy kod weryfikacyjny przepisz go w poniższym polu aby kontynuować<br><small><small>(sprawdź również folder spam)</small></small><br>");
                    
                    $("#wpisz_kod_form").attr("email",emailval);
                    
                    $("#przywroc_email_val").val("");
                    
                    $("#przywroc_email").hide();
        $("#wpisz_kod").show();
        $("#new_pass").hide();
                    ("#przywroc_email_val").val("");
                    
                    $("#co_teraz").show().html("Logowanie");
                    
                }else if(odp == "badmail"){
                    
                    
                    $("#przywroc_email_val").val("");
                    
                    $("#przywroc_email_error").show().html("Nie znaleziono nikogo z takim emailem");
                    
                }else{
                    
                    alert(odp);
                }
                
            });
            
            return false;
        });

     $("#wpisz_kod_form").submit(function(){
         
         var kod = $("#wpisz_kod_val").val();
         
         var email = $(this).attr("email");
         
         $.getJSON("przywroc.php","kod="+kod+"&email2="+email,function(odp){
             
             if(odp == "dobry"){
                 
                  $("#przywroc_email").hide();
                $("#wpisz_kod").hide();
                $("#new_pass").show();
                $("#new_pass_form").attr("email",email);
               $("#new_pass_info").show().html("wpisz nowe hasło");
               $("#wpisz_kod_val").val("");
                 
             }else if(odp == "zly"){
                 
                 $("#wpisz_kod_val").val("");
                 $("#wpisz_kod_info").css({"background-color":"#FF8C80"}).show().html("Podany kod jest nieprawidłowy wpisz kod ponownie");
                 
                 
             }
             
         });
         
         
         return false;
     });
    
    
    $("#new_pass_form").submit(function(){
        
        var email = $(this).attr("email");
        var pass = $("#new_pass_val").val();
        var pass2 = $("#new_pass_val2").val();
        
       
        
        if(pass == pass2){
            
            $.get("przywroc.php","pass="+pass+"&email3="+email,function(odp){
               
                reg.hide();
        log.show();
        $("#rej").show();
        $("#wrlo").hide();
        $("#przywroc_pass").hide();
        
        $("#przywroc_email").hide();
        $("#wpisz_kod").hide();
        $("#new_pass").hide();
        
        $("#przywroc_email_error").html("");
        $("#wpisz_kod_info").html("");
        $("#new_pass_info").html("");
       
       $("#log_ok").show().html("Hasło zostało zmienione, możesz sie zalogować");
       
           $("#new_pass_val").val("");
           $("#new_pass_val2").val("");
                
            });
            
        }else{
            
            $("#new_pass_info").show().css({"background-color":"#FF8C80"}).html("hasła nie są takie same");
            
        }
        
        
        return false;
    });
    
//::*'jxhvbbj' petla each po json 390str

    //logowanie/////////

    
    $("#form_log").submit(function(){
        
        var login_log = $('#login_log').val();
        var pass_log = $('#pass_log').val();
        
        var dane_log= {
            'login_log':login_log,
            'pass_log':pass_log
        };
        

       $.post('logowanie.php',dane_log).done(function(oserv){
          
           
           if(oserv == "zalogowano"){
              location.replace("to/index.php");
              
              $('#login_log').val("");
              $('#pass_log').val("");
              
           }else{
               
               $('#log_error').show().html(oserv);
           };
           
    
       }).fail(function(){
            $('#log_error').show().html('błąd połączenia z serwerem');
       });
      return false;
    });
    
    
    //koniec logowania //////////
    
    //////  rejestracja ////////
    
        
       
    $("#form_reg").submit(function(){
        
        var login_reg = $("#login_reg").val();
       
       if(login_reg.includes("@") == false){
           
       
        var email_reg = $("#email_reg").val();
        var pass_reg = $("#pass_reg").val();
        var pass_reg2 = $("#pass_reg2").val();
        
        
        var dane_reg = {
            'login_reg':login_reg,

            'email_reg':email_reg,
            'pass_reg':pass_reg,
            'pass_reg2':pass_reg2
        };
        
        if(pass_reg == pass_reg2){
       
          $.post('rejestracja.php',dane_reg).done(function(odser){
              
              if(odser == "utworzono"){
                  
                  reg.hide();
                  log.show();
                  $("#wrlo").hide();
                  $("#rej").show();
                  
                 
                                    
                  $.get("powitalny.php","email="+email_reg+"&login="+login_reg,function(odp){
               
                  });
                  
                  
                  
      
                   $("#reg_error").hide();
                  location.replace("to/index.php");
              }else{
            
              $("#reg_error").show().html(odser);
              };
            
       }).fail(function(){
            $("#reg_error").show().html("błąd połączenia z serwerem");
       });
          
        }else{
             $("#reg_error").show().html("podane hasła są różne!");
             $("#pass_reg").val("");
       $("#pass_reg2").val("");
        }
        
       }else{
           $("#reg_error").show().html("login nie może być emailem");
       }
     
       return false;
    });
    
    
    
    /////// koniec rejesteacji /////

});	