<?php


if(isset($_GET['miejsce'])){
    
   $miejsce_pracy_z_bazy = $_GET['miejsce'];
    
    if($miejsce_pracy_z_bazy == "skodakv")
    {
           $nazwa = "Skoda Kvasiny";
  
    }else if($miejsce_pracy_z_bazy == "nachod")
    {
          
          $nazwa = "w Nachodzie";
        
    }else if($miejsce_pracy_z_bazy == "wsse")
    {
          
           $nazwa = "WSSE Wałbrzych";
           
     }else if($miejsce_pracy_z_bazy == "radomsk")
     {
          
           $nazwa = "Radomsko SSE";
    
     }else if($miejsce_pracy_z_bazy == "katowicka")
     {
          
           $nazwa = "Katowicka SSE";
      
     }else if($miejsce_pracy_z_bazy == "tvggubin")
     {
          
           $nazwa = "TVG Gubin";
    
     }else if($miejsce_pracy_z_bazy == "ostaszewo")
     {
          
           $nazwa = "Ostaszewo";
   
     }else if($miejsce_pracy_z_bazy == "ypfzarow")
     {
          
           $nazwa = "YPF - Żarów";
   
     }else if($miejsce_pracy_z_bazy == "ulusMetal")
     {
          
           $nazwa = "Ulus Metal";
   
     }
       
       echo $nazwa;
                       
    
}




?>