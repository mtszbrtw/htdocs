<html>
    <head>
        <meta charset="UTF-8">
         <script src="js/jquery.js"></script>
         <script>
             
$(function() {
    
    var i = 0;
    
    function wyslij(){
    $.getJSON("wyslijdofirm.php","wyslij",function(odp){

          
          
          if(odp != "nie"){
              
              i++;
              
              if(odp == "wszystkie"){
                  $("#wyslane").append(odp);
               return false;
              }else{
             
              
              
              $("#wyslane").prepend("<div style='color:green'>"+odp+" Wysłano</div>"+i+"<br>");
              
              wyslij();
              
              
              }
              
          }else if(odp == 'nie'){
              
               $("#wyslane").append("<div style='color:red'>"+odp+" Wysłano</div><br>");
               
               return false;
              
          }
          
          
          
      });
    };
    
    
  $("#send").click(function(){
      
      
      wyslij();
      
      
      
  });
   
   
   
    
    
});
             
         </script>
    </head>
    
    
    <button id="send">Wyslij emaile</button>
    
    <div id="wyslane"></div>
    <body></body>
</html>
