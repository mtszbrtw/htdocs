$(function() {
    
    
    $("#wrlo").click(function(){
         location.replace("wyloguj.php");
    });
    
    
    $("#uzupelnij").click(function(){
        
        if($("#imie_uz").val() != "" && $("#miasto_uz").val() != ""){
            
        if($("#nr_tel_uz").val() == ""){
            $("#nr_tel_uz").val("Nie podano");
        }
        
        var dane_uzup = {
            
            "imie":$("#imie_uz").val(),
            "nr_tel": $("#nr_tel_uz").val(),
            "miasto": $("#miasto_uz").val(),
        };
        
       
        
       $.get("czyuzup.php",dane_uzup,function(odp){
           location.reload();
       });
        
        
        }else{
            
            $("#uz_error").show().html("Tylko pole nr. tel. może być puste!");
            
            
        }
        
        return false;
    });
    
    
});