<?php 



if(isset($_FILES["wiad_obrazek"])){
  if(is_uploaded_file($_FILES['wiad_obrazek']['tmp_name'])){
     
       $rozszerzenie = explode("/",$_FILES["wiad_obrazek"]["type"]);
     
       $cel = "skodakv/dojazdy/upload/".$_POST["no"]."_".$_POST["id"].".".$rozszerzenie[1];
        
        
        if(move_uploaded_file($_FILES["wiad_obrazek"]["tmp_name"],$cel)){
            echo $cel;
        }else{
            echo("nie udalo sie ");
        }
        
  }else{
      echo "nie wykolnao ";
  }
}else if(isset($_FILES["wiado_obrazek"])){
    
    
    
  if(is_uploaded_file($_FILES['wiado_obrazek']['tmp_name'])){
     
       $rozszerzenie = explode("/",$_FILES["wiado_obrazek"]["type"]);
     
       $cel = "skodakv/dojazdy/upload/".$_POST["no"]."_".$_POST["id"].".".$rozszerzenie[1];
        
        
        if(move_uploaded_file($_FILES["wiado_obrazek"]["tmp_name"],$cel)){
            echo $cel;
        }else{
            echo("nie udalo sie");
        }
        
  }else{
      echo "nn";
  }
      
}




?>