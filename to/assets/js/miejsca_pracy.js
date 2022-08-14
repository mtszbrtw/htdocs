$(function() {
    
    var pathname = window.location.pathname; 
   var s = pathname.split("/");
    //s[2] nazwa miejsca pracy 
   
   
   $("#"+s[2]).prop("selected",true);
    
  
    $("#miejsce_pracy").on("change",function(){
        
        var miejsce = $("#miejsce_pracy option:selected").attr("id");
        
         location.replace("../../"+miejsce+"/dojazdy/index.php");
              
        
    });
    
  
  
  
  
});