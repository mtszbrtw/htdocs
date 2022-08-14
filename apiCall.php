<html>
    <head>
        <meta charset="UTF-8">
         <script src="js/jquery.js"></script>
         <script>
             
$(function() {
    
    var i = 0;
    
    function wyslij(){
    $.getJSON("teryt.php","wyslij",function(odp){
   
   
   $.each(odp,function(k,w){
       
       if(k = "uzupelniony"){
           var color = "green";
       }else{
           var color = "red";
       }
       
       $("#wyslane").prepend("<div style='color:"+color+"'>"+k+" "+w+"</div>");
              wyslij();
       
       
   });
              
              
   
      });
    };
    
    
  $("#send").click(function(){
      
      
      wyslij();
      
      
      
  });
   
   
   
    
    
});
             
         </script>
    </head>
    
    
    <button id="send">Wyslij</button>
    
    <div id="wyslane"></div>
    <body></body>
</html>