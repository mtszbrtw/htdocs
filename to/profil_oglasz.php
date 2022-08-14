<?php

require_once("../con.php");


if(isset($_GET["ogl"])){
    

if($_GET["ogl"] == "info_zwykle"){
    
      $id = $_GET["id"];
    
        
        $q_info_ogl = "SELECT *, `geo` -> '$.lat' AS lat,`geo` -> '$.lon' AS lon,
( 6371 *
    ACOS(
        COS( RADIANS( `geo` -> '$.lat') ) *
        COS( RADIANS(21.7658790787808) ) *
        COS( RADIANS(49.6872670420175) -
        RADIANS( `geo` -> '$.lon' ) ) +
        SIN( RADIANS( `geo` -> '$.lat' ) ) *
        SIN( RADIANS(21.7658790787808) )
    )
)
AS distance FROM `zwykle_ogloszenia` WHERE `id`='".$id."'";
        
    
    $b_info_ogl = mysqli_query($con,$q_info_ogl);
    
    
    while($row = mysqli_fetch_assoc($b_info_ogl)){
        $tab[] = $row;
    }
    
    echo json_encode($tab);
   

}elseif($_GET["ogl"] == "info"){
    
    $id = $_GET["id"];
    
    if(!isset($_GET["miejsce_pracy"])){
    
    $q_info_ogl = "SELECT * FROM `ogloszenia` WHERE `id`='".$id."'";
    }else{
        
        $miejsce_pracy = $_GET["miejsce_pracy"]."_ogloszenia";
        
        $q_info_ogl = "SELECT * FROM `$miejsce_pracy` WHERE `id`='".$id."'";
        
    }
    
    $b_info_ogl = mysqli_query($con,$q_info_ogl);
    
    
    while($row = mysqli_fetch_assoc($b_info_ogl)){
        $tab[] = $row;
    }
    
    echo json_encode($tab,JSON_UNESCAPED_UNICODE);
   
    
}elseif($_GET["ogl"] == "auto"){
    
    
    $id_auta = $_GET["id_auta"];
    
    $query_auto = "SELECT * FROM `auto` WHERE `id`='".$id_auta."'";
    
  
    
    
    $baza_auto = mysqli_query($con,$query_auto);
    
    
    while($row = mysqli_fetch_assoc($baza_auto)){
        $tab[] = $row;
    }
    
    echo json_encode($tab,JSON_UNESCAPED_UNICODE);
    
}
}

if(isset($_GET["profil"])){
    
if($_GET["profil"] == "opinie"){
    
     $ogl_id = $_GET["id_ogl"];
    
    $q = "SELECT `kto` FROM `ogloszenia` WHERE `id` = '".$ogl_id."'";
    $b = mysqli_query($con,$q);
    
    $nick = mysqli_fetch_array($b);
    $nick = $nick["kto"];
    
    $query_opinie = "SELECT * FROM `opinie` WHERE `komu`='".$nick."'";
    $baza_opinie = mysqli_query($con,$query_opinie);
    
  $tab = [];
    
    while($row = mysqli_fetch_assoc($baza_opinie)){
        $tab[] = $row;
    }

echo json_encode($tab);

}elseif($_GET["profil"] == "info"){
    
    $ogl_id = $_GET["id_ogl"];
    
    
     if(!isset($_GET["miejsce_pracy"])){
         
 $q = "SELECT `kto` FROM `ogloszenia` WHERE `id` = '".$ogl_id."'";
 
    }else{
        
          $miejsce_pracy = $_GET["miejsce_pracy"]."_ogloszenia";
        
        
        
         $q = "SELECT `kto` FROM `$miejsce_pracy` WHERE `id` = '".$ogl_id."'";
 
        
    }
    
    
    
    
   
    
    
    
    $b = mysqli_query($con,$q);
    
    $nick = mysqli_fetch_array($b);
    $nick = $nick["kto"];
    
    $q_profil_info = "SELECT * FROM `Ouser` WHERE `nick` = '".$nick."'";
    $b_profil_info = mysqli_query($con,$q_profil_info);
    
    while($row = mysqli_fetch_assoc($b_profil_info)){
        $tab[] = $row;
    }
    
    echo json_encode($tab,JSON_UNESCAPED_UNICODE);
    
    
}elseif($_GET["profil"] == "info_zwykle"){
    
    header('Content-Type: text/html; charset=utf-8');
    
    $ogl_id = $_GET["id_ogl"];
    
   
         
         $q = "SELECT * FROM `zwykle_ogloszenia` WHERE `id` = '".$ogl_id."'";
    
    
    $b = mysqli_query($con,$q);
    
    $nick = mysqli_fetch_array($b);
    $nick = $nick["kto"];
    
    $q_profil_info = "SELECT * FROM `Ouser` WHERE `nick` = '".$nick."'";
    $b_profil_info = mysqli_query($con,$q_profil_info);
    
    while($row = mysqli_fetch_assoc($b_profil_info)){
        $tab[] = $row;
    }
    
    echo json_encode($tab,JSON_UNESCAPED_UNICODE);
    
    
}


}

?>