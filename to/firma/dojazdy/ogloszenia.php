<?php
session_start();



require_once('../../../con.php');




//mezimest brumov nochod



$nick = $_SESSION["nick"];

if(isset($_POST["miejsce_pracy"])){
    
    
    
    $_SESSION["miejsce_pracy"] = $_POST["miejsce_pracy"];
    
    $miejsce_baza = $_SESSION["miejsce_pracy"];
    
}else{
    
    $q_miejsce = "SELECT `miejsce_pracy` FROM `Ouser` WHERE `nick` ='".$nick."'";
    $b_miejsce = mysqli_fetch_assoc(mysqli_query($con,$q_miejsce));
    $miejsce_baza = $b_miejsce['miejsce_pracy'];
    
}

//po ponownym wczytaniu strony juz nie wczytuje posta i bedzue szukalo w bazie a jesli ktos jest na nie swojej sekcjii? Po przelafowaniu przeniesie go z rej sekcji na sekcje ktora ma w baxie rozwiazabiem moga byc sesje jesli dostabie postem cos tam to tworzt sesje z tym i miejsce pracy pobieram z sesji dzieki czemu nie hedzie tego problemu 

if(isset($_SESSION['miejsce_pracy'])){
    $miejsce_baza = $_SESSION['miejsce_pracy'];
}


if(isset($_GET['miejsce_pracy_obj'])){
 
  
  
    
    $q_miejsce = "SELECT * FROM `firmyowg1` WHERE `id` ='".$miejsce_baza."' LIMIT 1";
    
    
    
    $b_miejsce = mysqli_query($con,$q_miejsce);
    
    while($row = mysqli_fetch_assoc($b_miejsce)){
        $tab[] = $row;
    }
   
   
        
  if($tab[0]["lat"] == "0" OR !$tab[0]["lat"]){
       
        require_once('../../assets/php/returnCoords.php');
        
        $query = [$tab[0]['miasto'],$tab[0]['ulica'],$tab[0]['nazwa']];
        
        $query = str_replace("-"," ",$query);
        
        $query = str_replace([",","'","/","ul."],"",implode("+",$query));
        
        
        $coords = json_decode(returnCoords($tab[0]['miasto'],$tab[0]['wojewodztwo'],$query));
        


$tab[0]['lat'] = $coords[0]->coordinates->lat;
$tab[0]['lon'] = $coords[0]->coordinates->lon;
    
  }
  
 
   
        
   
       echo json_encode($tab,JSON_UNESCAPED_UNICODE);
        
 
    
    
    //if corrynaty z bazy sa puste to jesli mam nip to wysylam requesta zeby mi podalo dokladne dane z api o lokalizacji i pozniej wysyam to do api ktore zwroci mi lat i lon 
    //jesli nie ma tego i teyo to wysylam to c9 mam do api o lat i lon 
    //jesli lokalizavja jeet noe dokladna to user moze ja popra2ic 
    return;
    
}

//do js stad 0rzekazac nazwe miejsca bi w js nie odwolam sie do posta 
//trzeba wyslac requesta z main.js tutaj podac ta nazwe i tyle 



if(isset($_GET["pokazogl"])){
    
    $zmiana = $_GET["filtrzmiana"];
    $filtrdni = $_GET["filtrdni"];
   
    $filtrmiejsca = $_GET["filtrmiejsca"];
   
    $filtrmiejsce_pracy = $miejsce_baza;
    //raczej nie bedzie 
    //kazda firma bedzie miala osobna sekcje wiec bie bedxietakiej na ktorej mizna wyvrac kilka 
    
    $limit = $_GET["limit"];
    
    
    $filtrDystans = json_decode($_GET["filtrdystans"],JSON_UNESCAPED_UNICODE);

$dystansLat = $filtrDystans["coords"]["lat"];
$dystansLon = $filtrDystans["coords"]["lon"];
$dystansQty = $filtrDystans["qty"];

    
   
    
    
  /*  echo $jakazmiana." ".$filtrdni." ".$filtrtrasa." ".$_GET["filtrzmiana"];*/
    
   //dodac opcje ze ogl9szenie zostaje usuniete po 2 tug i dopiero zostana wyswietlone dobre
  

      
        
        if($zmiana == "null" OR !$zmiana){
            
            $zmiana = "";
            $przeddni = " WHERE ";
            
        }else{
        
//jesli jest kilka opcji to czesto zaznacza tez pierwsza pomomo ze ona nie jest
//domiejsc tez trzea cosrozkminic inaczej bo jeslijaszukam 1 miejsca a ktosblb ma 2 to mi go nie wyszuka 
            
            $zmiana = " WHERE (`zmiana` RLIKE '".$zmiana."+')";
          
            $przeddni = " AND ";
        }
      
    
    
    
    if($filtrdni != "wszystkie" && $filtrdni){
     
     $filtrdni = explode(",",$filtrdni);
     
     $iledni = count($filtrdni);
     
     for($i=0;$i<=($iledni-1);$i++){

    $dnipetla = "(`dzien` = '".$filtrdni[$i]."' OR `dzien2` = '".$filtrdni[$i]."' OR `dzien3` = '".$filtrdni[$i]."' OR `dzien4` = '".$filtrdni[$i]."')";
    
    if($iledni > 1 && $i == 0){
        $dnipetla = "(".$dnipetla;
    }// jesli powyzej 1 na poczatku nawias teraz jeszcze na koniec ostatniego
    if($iledni > 1 && ($iledni-1) == $i){
        $dnipetla = $dnipetla.")";
    }
    
    
    $tabpetla[] = $dnipetla;
    // moze zwracac blad lub rozne wyniki 
    //trzeba to opakowac w nawias wszystkie dni ((dni or dni) or (dni or dni) or (dni or dni)) na poczatku pierwssej i na koncu ostatbiej jesli jest powyzej jednej
     }
     
     $dnibaza = implode(" OR ",$tabpetla);
     $dnibaza = $przeddni.$dnibaza;
     
   }else{
       $dnibaza = "";
   }
   
 if($filtrtrasa == "null" OR !$filtrtrasa){
        $trasa = "";
    }else{
   
     if($zmiana == "" && $dnibaza == ""){
       $przedtrasa = " WHERE ";
     }else{
       $przedtrasa = " AND ";
     }
     
     $trasa = $przedtrasa."(`trasa` LIKE '%".$filtrtrasa."%')";
   
    }
  
   
   if($filtrmiejsca == "all_sites"){
       $miejsca="";
   }else{
       
       if($zmiana == "" && $dnibaza == "" && $trasa == ""){
           $przedmiejsca = " WHERE ";
       }else{
           $przedmiejsca = " AND ";
       }
       
   $filtrmiejsca = (int)$filtrmiejsca;


   if($filtrmiejsca == 1){
    
   $zap = "((`miejsc` = '1sit') OR (`miejsc` = '2sit') OR (`miejsc` = '3sit') OR (`miejsc` = '4sit'))";

   }elseif($filtrmiejsca == 2){

   $zap = "((`miejsc` = '2sit') OR (`miejsc` = '3sit') OR (`miejsc` = '4sit'))";
    
   }elseif($filtrmiejsca == 3){
    
   $zap = "((`miejsc` = '3sit') OR (`miejsc` = '4sit'))";
    
   }elseif($filtrmiejsca == 4){
    
   $zap = "(`miejsc` = '4sit')";
    
   }
       
       
       $miejsca = $przedmiejsca.$zap;
       
   }
   
       if($filtrmiejsce_pracy == "all_fab"){
        $miejsce_pracy = "";
    }else{
        
        if($zmiana == "" AND $dnibaza  =="" AND $trasa == "" AND $miejsca == ""){
            
                    $miejsce_pracy = " WHERE zwykle_ogloszenia.miejsce_pracy = '".$filtrmiejsce_pracy."'";
            
        }else{
        
        
        $miejsce_pracy = " AND zwykle_ogloszenia.miejsce_pracy = '".$filtrmiejsce_pracy."'";
        }
    }
    
  //  Tak pobierac imie SELECT Ouser.imie FROM `ogloszenia` INNER JOIN `Ouser` ON ogloszenia.kto = Ouser.nick reoacja 
  
  
   $dystans = "";
   if($dystansQty){
       $dystans = " HAVING distance <= '".$dystansQty."'";
   }
   

   
   $zapytanie = "SELECT zwykle_ogloszenia.*,`geo` -> '$.lat' AS lat,`geo` -> '$.lon' AS lon,( 6371 *
    ACOS(
        COS( RADIANS( `geo` -> '$.lat') ) *
        COS( RADIANS(".$dystansLat.") ) *
        COS( RADIANS(".$dystansLon.") -
        RADIANS( `geo` -> '$.lon' ) ) +
        SIN( RADIANS( `geo` -> '$.lat' ) ) *
        SIN( RADIANS(".$dystansLat.") )
    )
)
AS distance, Ouser.imie FROM `zwykle_ogloszenia` INNER JOIN `Ouser` ON zwykle_ogloszenia.kto = Ouser.nick".$zmiana.$dnibaza.$trasa.$miejsca.$miejsce_pracy.$dystans." ORDER BY `dodano` DESC LIMIT ".$limit.",10";
   
 
   $tab = [];
   
    
   
   $baza = mysqli_query($con,$zapytanie);
 
   
   while($row = mysqli_fetch_assoc($baza)){
      $tab[] = $row;
    }
    
    
    echo json_encode($tab,JSON_UNESCAPED_UNICODE);
   
   
   
}elseif(isset($_GET["all_ogl_for_map"])){

 

$zmiana = $_GET["filtrzmiana"];
    $filtrdni = $_GET["filtrdni"];
    $filtrmiejsca = $_GET["filtrmiejsca"];
   
    $filtrmiejsce_pracy = $miejsce_baza;
    //raczej nie bedzie 
    //kazda firma bedzie miala osobna sekcje wiec bie bedxietakiej na ktorej mizna wyvrac kilka 
    
$filtrDystans = json_decode($_GET["dystans"],JSON_UNESCAPED_UNICODE);

$dystansLat = $filtrDystans["coords"]["lat"];
$dystansLon = $filtrDystans["coords"]["lon"];
$dystansQty = $filtrDystans["qty"];

    
  /*  echo $jakazmiana." ".$filtrdni." ".$filtrtrasa." ".$_GET["filtrzmiana"];*/
    
   //dodac opcje ze ogl9szenie zostaje usuniete po 2 tug i dopiero zostana wyswietlone dobre
  

      
        
        if($zmiana == "null" OR !$zmiana){
            
            $zmiana = "";
            $przeddni = " WHERE ";
            
        }else{
        
//jesli jest kilka opcji to czesto zaznacza tez pierwsza pomomo ze ona nie jest
//domiejsc tez trzea cosrozkminic inaczej bo jeslijaszukam 1 miejsca a ktosblb ma 2 to mi go nie wyszuka 
            
            $zmiana = " WHERE (`zmiana` RLIKE '".$zmiana."+')";
          
            $przeddni = " AND ";
        }
      
    
    
    
    if($filtrdni != "wszystkie" && $filtrdni){
     
     $filtrdni = explode(",",$filtrdni);
     
     $iledni = count($filtrdni);
     
     for($i=0;$i<=($iledni-1);$i++){

    $dnipetla = "(`dzien` = '".$filtrdni[$i]."' OR `dzien2` = '".$filtrdni[$i]."' OR `dzien3` = '".$filtrdni[$i]."' OR `dzien4` = '".$filtrdni[$i]."')";
    
    if($iledni > 1 && $i == 0){
        $dnipetla = "(".$dnipetla;
    }// jesli powyzej 1 na poczatku nawias teraz jeszcze na koniec ostatniego
    if($iledni > 1 && ($iledni-1) == $i){
        $dnipetla = $dnipetla.")";
    }
    
    
    $tabpetla[] = $dnipetla;
    // moze zwracac blad lub rozne wyniki 
    //trzeba to opakowac w nawias wszystkie dni ((dni or dni) or (dni or dni) or (dni or dni)) na poczatku pierwssej i na koncu ostatbiej jesli jest powyzej jednej
     }
     
     $dnibaza = implode(" OR ",$tabpetla);
     $dnibaza = $przeddni.$dnibaza;
     
   }else{
       $dnibaza = "";
   }
   
 
   
   if($filtrmiejsca == "all_sites"){
       $miejsca="";
   }else{
       
       if($zmiana == "" && $dnibaza == "" && $trasa == ""){
           $przedmiejsca = " WHERE ";
       }else{
           $przedmiejsca = " AND ";
       }
       
   $filtrmiejsca = (int)$filtrmiejsca;


   if($filtrmiejsca == 1){
    
   $zap = "((`miejsc` = '1sit') OR (`miejsc` = '2sit') OR (`miejsc` = '3sit') OR (`miejsc` = '4sit'))";

   }elseif($filtrmiejsca == 2){

   $zap = "((`miejsc` = '2sit') OR (`miejsc` = '3sit') OR (`miejsc` = '4sit'))";
    
   }elseif($filtrmiejsca == 3){
    
   $zap = "((`miejsc` = '3sit') OR (`miejsc` = '4sit'))";
    
   }elseif($filtrmiejsca == 4){
    
   $zap = "(`miejsc` = '4sit')";
    
   }
       
       
       $miejsca = $przedmiejsca.$zap;
       
   }
   
       if($filtrmiejsce_pracy == "all_fab"){
        $miejsce_pracy = "";
    }else{
        
        if($zmiana == "" AND $dnibaza  =="" AND $trasa == "" AND $miejsca == ""){
            
                    $miejsce_pracy = " WHERE zwykle_ogloszenia.miejsce_pracy = '".$filtrmiejsce_pracy."'";
            
        }else{
        
        
        $miejsce_pracy = " AND zwykle_ogloszenia.miejsce_pracy = '".$filtrmiejsce_pracy."'";
        }
    }
    
  //  Tak pobierac imie SELECT Ouser.imie FROM `ogloszenia` INNER JOIN `Ouser` ON ogloszenia.kto = Ouser.nick reoacja 
   
    $user_lat = $dystansLat;
   $user_lon = $dystansLon;
   
  $zapytanie = "SELECT id, `geo` -> '$.lat' AS lat,`geo` -> '$.lon' AS lon,
( 6371 *
    ACOS(
        COS( RADIANS( `geo` -> '$.lat') ) *
        COS( RADIANS(".$user_lat.") ) *
        COS( RADIANS(".$user_lon.") -
        RADIANS( `geo` -> '$.lon' ) ) +
        SIN( RADIANS( `geo` -> '$.lat' ) ) *
        SIN( RADIANS(".$user_lat.") )
    )
)
AS distance FROM zwykle_ogloszenia".$zmiana.$dnibaza.$miejsca.$miejsce_pracy." HAVING distance <= '".$dystansQty."' ORDER BY distance ASC LIMIT 20";
   

   
   $tab = [];
   
   $baza = mysqli_query($con,$zapytanie);
 
   while($row = mysqli_fetch_assoc($baza)){
      $tab[] = $row;
     
    }
    
    
    echo json_encode($tab,JSON_UNESCAPED_UNICODE);
   


}elseif(isset($_GET["po_edycji"])){
    
    $id = $_GET["po_edycji"];
    
    $q_po_edycji = "SELECT * FROM `zwykle_ogloszenia` WHERE `id`='".$id."'";
    
    
    
    $baza_po_edycji = mysqli_query($con,$q_po_edycji) or die("błąd po edycji");

   while($row = mysqli_fetch_assoc($baza_po_edycji)){
      $tab[] = $row;
    }
    
    echo json_encode($tab,JSON_UNESCAPED_UNICODE);
    
    
}elseif(isset($_GET["po_edycji_arch"])){
    
    $id = $_GET["po_edycji_arch"];
    
    $q_po_edycji = "SELECT * FROM `zwykle_archiwum` WHERE `id`='".$id."'";
    
       
    
    $baza_po_edycji = mysqli_query($con,$q_po_edycji) or die("błąd po edycji");

   while($row = mysqli_fetch_assoc($baza_po_edycji)){
      $tab[] = $row;
    }
    
    echo json_encode($tab,JSON_UNESCAPED_UNICODE);
    
    
}elseif(isset($_GET["ile"])){
    
   $zmiana = $_GET["filtrzmiana"];
    $filtrdni = $_GET["filtrdni"];
  
    $filtrmiejsca = $_GET["filtrmiejsca"];
   
    $filtrmiejsce_pracy = $miejsce_baza;
    //raczej nie bedzie 
    //kazda firma bedzie miala osobna sekcje wiec bie bedxietakiej na ktorej mizna wyvrac kilka 
   


  $filtrDystans = json_decode($_GET["filtrdystans"],JSON_UNESCAPED_UNICODE);

$dystansLat = $filtrDystans["coords"]["lat"];
$dystansLon = $filtrDystans["coords"]["lon"];
$dystansQty = $filtrDystans["qty"];


  
    
  /*  echo $jakazmiana." ".$filtrdni." ".$filtrtrasa." ".$_GET["filtrzmiana"];*/
    
   //dodac opcje ze ogl9szenie zostaje usuniete po 2 tug i dopiero zostana wyswietlone dobre
  

      
        
        if($zmiana == "null" OR !$zmiana){
            
            $zmiana = "";
            $przeddni = " WHERE ";
            
        }else{
        
//jesli jest kilka opcji to czesto zaznacza tez pierwsza pomomo ze ona nie jest
//domiejsc tez trzea cosrozkminic inaczej bo jeslijaszukam 1 miejsca a ktosblb ma 2 to mi go nie wyszuka 
            
            $zmiana = " WHERE (`zmiana` RLIKE '".$zmiana."+')";
          
            $przeddni = " AND ";
        }
      
    
    
    
    if($filtrdni != "wszystkie" && $filtrdni){
     
     $filtrdni = explode(",",$filtrdni);
     
     $iledni = count($filtrdni);
     
     for($i=0;$i<=($iledni-1);$i++){

    $dnipetla = "(`dzien` = '".$filtrdni[$i]."' OR `dzien2` = '".$filtrdni[$i]."' OR `dzien3` = '".$filtrdni[$i]."' OR `dzien4` = '".$filtrdni[$i]."')";
    
    if($iledni > 1 && $i == 0){
        $dnipetla = "(".$dnipetla;
    }// jesli powyzej 1 na poczatku nawias teraz jeszcze na koniec ostatniego
    if($iledni > 1 && ($iledni-1) == $i){
        $dnipetla = $dnipetla.")";
    }
    
    
    $tabpetla[] = $dnipetla;
    // moze zwracac blad lub rozne wyniki 
    //trzeba to opakowac w nawias wszystkie dni ((dni or dni) or (dni or dni) or (dni or dni)) na poczatku pierwssej i na koncu ostatbiej jesli jest powyzej jednej
     }
     
     $dnibaza = implode(" OR ",$tabpetla);
     $dnibaza = $przeddni.$dnibaza;
     
   }else{
       $dnibaza = "";
   }
   
 if($filtrtrasa == "null" OR !$filtrtrasa){
        $trasa = "";
    }else{
   
     if($zmiana == "" && $dnibaza == ""){
       $przedtrasa = " WHERE ";
     }else{
       $przedtrasa = " AND ";
     }
     
     $trasa = $przedtrasa."(`trasa` LIKE '%".$filtrtrasa."%')";
   
    }
  
   
   if($filtrmiejsca == "all_sites"){
       $miejsca="";
   }else{
       
       if($zmiana == "" && $dnibaza == "" && $trasa == ""){
           $przedmiejsca = " WHERE ";
       }else{
           $przedmiejsca = " AND ";
       }
       
   $filtrmiejsca = (int)$filtrmiejsca;


   if($filtrmiejsca == 1){
    
   $zap = "((`miejsc` = '1sit') OR (`miejsc` = '2sit') OR (`miejsc` = '3sit') OR (`miejsc` = '4sit'))";

   }elseif($filtrmiejsca == 2){

   $zap = "((`miejsc` = '2sit') OR (`miejsc` = '3sit') OR (`miejsc` = '4sit'))";
    
   }elseif($filtrmiejsca == 3){
    
   $zap = "((`miejsc` = '3sit') OR (`miejsc` = '4sit'))";
    
   }elseif($filtrmiejsca == 4){
    
   $zap = "(`miejsc` = '4sit')";
    
   }
       
       
       $miejsca = $przedmiejsca.$zap;
       
   }
   
       if($filtrmiejsce_pracy == "all_fab"){
        $miejsce_pracy = "";
    }else{
        
        if($zmiana == "" AND $dnibaza  =="" AND $trasa == "" AND $miejsca == ""){
            
                    $miejsce_pracy = " WHERE zwykle_ogloszenia.miejsce_pracy = '".$filtrmiejsce_pracy."'";
            
        }else{
        
        
        $miejsce_pracy = " AND zwykle_ogloszenia.miejsce_pracy = '".$filtrmiejsce_pracy."'";
        }
    }
    
  //  Tak pobierac imie SELECT Ouser.imie FROM `ogloszenia` INNER JOIN `Ouser` ON ogloszenia.kto = Ouser.nick reoacja 
   
    $dystans = "";
   if($dystansQty){
       $dystans = " HAVING distance <= '".$dystansQty."'";
   }
   

   
   
   $zapytanie = "SELECT *,( 6371 *
    ACOS(
        COS( RADIANS( `geo` -> '$.lat') ) *
        COS( RADIANS(".$dystansLat.") ) *
        COS( RADIANS(".$dystansLon.") -
        RADIANS( `geo` -> '$.lon' ) ) +
        SIN( RADIANS( `geo` -> '$.lat' ) ) *
        SIN( RADIANS(".$dystansLat.") )
    )
)
AS distance FROM `zwykle_ogloszenia`".$zmiana.$dnibaza.$trasa.$miejsca.$miejsce_pracy.$dystans;
  

   $baza = mysqli_query($con,$zapytanie);
   

   $ile_ogl = mysqli_num_rows($baza);
   
  
       
       echo $ile_ogl;
       
      
       
    
    

}elseif(isset($_POST["ile_ma"])){
    
    $q_ile_ogl = "SELECT `id` FROM `zwykle_ogloszenia` WHERE `kto` ='".$nick."' AND `miejsce_pracy` = '".$miejsce_baza."'";
    
  
$b_ile_ogl = mysqli_query($con,$q_ile_ogl);

$ile = mysqli_num_rows($b_ile_ogl);

echo json_decode($ile);

}

  /*
for($i=01;$i<20;$i++){
    

$zapytanie = "INSERT INTO `dojazdy`.`ogloszenia` (`id`, `kto`, `zmiana`, `trasa`, `miejsc`, `czas`, `ak`, `dzien`) VALUES (NULL, 'mtszbrtw', 'nocka', 'tr".$i."', '".$i."', '".$i."', 'ak".$i."', '30.01-sob')";
    
    if(mysqli_query($con,$zapytanie)){
        echo "dodano ".$i."<br";
    }else{
        echo "lip";
    }

}
 */
    
   /*
$zapytanie ="SELECT * FROM `ogloszenia` WHERE `trasa`='tr7'";

$s = mysqli_query($con,$zapytanie);

while($row = mysqli_fetch_assoc($s)){
    $ar[] = $row;
}

print_r($ar);
*/

?>