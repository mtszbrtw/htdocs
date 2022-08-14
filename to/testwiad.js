
            $(".wyslij_optogl").click(function(){
                
                $("#wyslij_ogl_dojazdy").show();
 $("#ustawienia_wyslij").hide();
 $("#wyslij_usun_potwierdz").hide();
                
        $("#wyslij_ogl_dojazdy_zamknij").click(function(){
          
          $("#wyslij_input").val("");
          $("#wyslij_ogl_dojazdy").hide();
                });
                
                $("#wyslij_tresc").html("");
 $("#wyslij_usun_potw_tak").attr("class","");
              
               $.getJSON("wiadomosci.php","tresc="+id,function(odp){
                   
                  $(".kto_z_kim").html("");
                   
                   $.each(odp,function(k,w){
                       
                     
                       
                     
                       $(".kto_z_kim").html(w.nadawca+" - "+w.odbiorca);
                    $("#wyslij_usun_potw_tak").attr("class",w.id_ogl);
                       
                     if(w.nadawca == kto){
                        
                   $("#wyslij_tresc").append("<div><div class='wiad_prawa'><div class='ost'>"+w.tresc+"</div></div><div class='wiad_prawa_pomoc'></div></div><div style='clear:both;'></div>");
                     }else{
                  $("#wyslij_tresc").append("<div><div class='wiad_lewa'><div class='ost'>"+w.tresc+"</div></div><div class='wiad_prawa_pomoc'></div></div><div style='clear:both;'></div>");
                     }
                       
                   });//each 
                   
                   var i = 0;
                      
               setInterval(function(){
                     
               $.post("wiadomosci.php","ostatnia=true&id="+id,function(odp){
                   $(".ost").last().html(odp+i);
                   i++;
               });//post
                
                
                },2000);
                   
$('#wyslij_tresc').scrollTop($('#wyslij_tresc')[0].scrollHeight);
                
                
                 var id = $(this).attr("id");
             
                $("#wyslij_guzik").attr("class",id);
         
            
            $("#wyslij_guzik").click(function(){
                
              id_wiad = $(this).attr("class");
                
                
                var tresc_wiad = $("#wyslij_input").val();
              
               
              
                   
               $.post('wiadomosci.php',"wyslij="+tresc_wiad+"&id="+id_wiad,function(odp){
                  
                
                
                  
                  $("#wyslij_input").val("");
                 
                 var b=0;
                  $.post("wiadomosci.php","ostatnia=true&id="+id,function(odp){
                   $(".ost").last().html(odp+b);
                   b++;
                     });//post
                     
                     $('#wyslij_tresc').scrollTop($('#wyslij_tresc')[0].scrollHeight);
                   
               });
               
               
            });//jak jest poza to dodaje jeden tylko
            
                });//get tresc
                
             });// pokaz wiaf z gl9wnej
             
               
               
               
   function pokaz_konwersacje(id){
              
 $("#wyslij_tresc").html("");
 $("#wyslij_usun_potw_tak").attr("class","");
              
               $.getJSON("wiadomosci.php","tresc="+id,function(odp){
                   
                  $(".kto_z_kim").html("");
                   
                   $.each(odp,function(k,w){
                       
                     
                       
                     
                       $(".kto_z_kim").html(w.nadawca+" - "+w.odbiorca);
                    $("#wyslij_usun_potw_tak").attr("class",w.id_ogl);
                       
                     if(w.nadawca == kto){
                        
                   $("#wyslij_tresc").append("<div><div class='wiad_prawa'><div class='ost'>"+w.tresc+"</div></div><div class='wiad_prawa_pomoc'></div></div><div style='clear:both;'></div>");
                     }else{
                  $("#wyslij_tresc").append("<div><div class='wiad_lewa'><div class='ost'>"+w.tresc+"</div></div><div class='wiad_prawa_pomoc'></div></div><div style='clear:both;'></div>");
                     }
                       
                   });
                   
                   var i = 0;
                      
               setInterval(function(){
                     
               $.post("wiadomosci.php","ostatnia=true&id="+id,function(odp){
                   $(".ost").last().html(odp+i);
                   i++;
               });
                
                
                },2000);
                
                   
                   
$('#wyslij_tresc').scrollTop($('#wyslij_tresc')[0].scrollHeight);
                   
               });
            };//funkcja pokaz konwersacje 
            
       
       
          $("#wyslij_ogl_dojazdy").hide();
             
            $(".wyslij_optogl").click(function(){
                
                $("#wyslij_ogl_dojazdy").show();
 $("#ustawienia_wyslij").hide();
 $("#wyslij_usun_potwierdz").hide();
                
        $("#wyslij_ogl_dojazdy_zamknij").click(function(){
          
          $("#wyslij_input").val("");
          $("#wyslij_ogl_dojazdy").hide();
                });
                
                 var id = $(this).attr("id");
             
              
               
                $("#wyslij_guzik").attr("class",id);
            
         $("#wyslij_tresc").html();
         pokaz_konwersacje(id);
            
            
                
             });// pokaz wiaf z gl9wnej
             
               
   $("#wyslij_guzik").click(function(){
                
              id_wiad = $(this).attr("class");
                
                
                var tresc_wiad = $("#wyslij_input").val();
              
               
               if(id_wiad !=0){
                   
               $.post('wiadomosci.php',"wyslij="+tresc_wiad+"&id="+id_wiad,function(odp){
                  
                
                  
                  $("#wyslij_input").val("");
                 
                // $("#wyslij_tresc").html(odp);
                 $("#wyslij_tresc").html("");
                   pokaz_konwersacje(id_wiad);
                   
                  var id_wiad=0;
                   
               });
               }
               
            });//jak jest poza to dodaje jeden tylko            
   
           
 $("#wyslij_ustaw").click(function(){
                var pos = $(this).position();
            $("#ustawienia_wyslij").css({
            "position":"absolute",
            "background-color":"blue",
            "width":"200px",
            "height":"100px",
            "top":pos.top,
            "left":pos.left-200,
            "text-align":"center"
                }).toggle();
                
                
              $("#wyslij_usun").click(function(){
                 
                 var pos = $(this).position();
                 
                  $("#wyslij_usun_potwierdz").css({
            "position":"absolute",
            "background-color":"darkblue",
            "width":"200px",
            "height":"150px",
            "top":pos.top+25,
            "left":pos.left,
            "text-align":"center"
                  }).show();
              });
             
              $("#wyslij_usun_potw_nie").click(function(){
                  $("#ustawienia_wiad").hide();
                  $("#wyslij_usun_potwierdz").hide();
              });
              
            
            
             });//wyslij ustaw 
             
             
              $("#wyslij_usun_potw_tak").click(function(){
                  
                  var id = $(this).attr("class");
                 
                  
                  $.post("wiadomosci.php","usun="+id,function(odp){
                      
                      if(odp == "ok"){
             $("#wyslij_ogl_dojazdy").hide();
             $("#wyslij_usun_potwierdz").hide();
             $("#ustawienia_wiad").hide();
             $("#wyslij_usun_potwierdz").hide();
                      }
                      
                      
                  });
                  
              });
              