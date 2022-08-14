<?php

session_start();


//mezimest brumov nochod
require_once('../../../con.php');

$nick = $_SESSION["nick"];
$miejsce_baza = "ulusMetal";

if(isset($_GET["pokazogl"])){
    
    $zmiana = $_GET["filtrzmiana"];
    $filtrdni = $_GET["filtrdni"];
    $filtrtrasa = $_GET["filtrtrasa"];
    $filtrmiejsca = $_GET["filtrmiejsca"];
   
    $filtrmiejsce_pracy = $_GET["miejsce_pracy"];
    
    $limit = $_GET["limit"];

    
  /*  echo $jakazmiana." ".$filtrdni." ".$filtrtrasa." ".$_GET["filtrzmiana"];*/
    
   //dodac opcje ze ogl9szenie zostaje usuniete po 2 tug i dopiero zostana wyswietlone dobre
  

      
        
        if($zmiana == "all_zm"){
            
            $zmiana = "";
            $przeddni = " WHERE ";
            
        }else{
        
//jesli jest kilka opcji to czesto zaznacza tez pierwsza pomomo ze ona nie jest
//domiejsc tez trzea cosrozkminic inaczej bo jeslijaszukam 1 miejsca a ktosblb ma 2 to mi go nie wyszuka 
            
            $zmiana = " WHERE (`zmiana` RLIKE '".$zmiana."+')";
          
            $przeddni = " AND ";
        }
      
    
    
    
    if($filtrdni != "wszystkie"){
     
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
   
 if($filtrtrasa == "tr_all"){
        $trasa = "";
    }else{
   
     if($zmiana == "" && $dnibaza == ""){
       $przedtrasa = " WHERE ";
     }else{
       $przedtrasa = " AND ";
     }
     
     $trasa = $przedtrasa."(`trasa` RLIKE '".$filtrtrasa."+')";
   
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
            
                    $miejsce_pracy = " WHERE `miejsce_pracy` = '".$filtrmiejsce_pracy."'";
            
        }else{
        
        
        $miejsce_pracy = "AND `miejsce_pracy` = '".$filtrmiejsce_pracy."'";
        }
    }
    
  //  Tak pobierac imie SELECT Ouser.imie FROM `ogloszenia` INNER JOIN `Ouser` ON ogloszenia.kto = Ouser.nick reoacja 
   
   $zapytanie = "SELECT ".$miejsce_baza."_ogloszenia.*, Ouser.imie FROM `".$miejsce_baza."_ogloszenia` INNER JOIN `Ouser` ON ".$miejsce_baza."_ogloszenia.kto = Ouser.nick".$zmiana.$dnibaza.$trasa.$miejsca.$miejsce_pracy." ORDER BY `dodano` DESC LIMIT ".$limit.",10";
   
 
   $tab = [];
   
   $baza = mysqli_query($con,$zapytanie);
   

   
   
   while($row = mysqli_fetch_assoc($baza)){
      $tab[] = $row;
    }
    
    
    echo json_encode($tab);
   
   
   
}elseif(isset($_GET["po_edycji"])){
    
    $id = $_GET["po_edycji"];
    
    $q_po_edycji = "SELECT * FROM `".$miejsce_baza."_ogloszenia` WHERE `id`='".$id."'";
    
    $baza_po_edycji = mysqli_query($con,$q_po_edycji) or die("błąd po edycji");

   while($row = mysqli_fetch_assoc($baza_po_edycji)){
      $tab[] = $row;
    }
    
    echo json_encode($tab);
    
    
}elseif(isset($_GET["po_edycji_arch"])){
    
    $id = $_GET["po_edycji_arch"];
    
    $q_po_edycji = "SELECT * FROM `".$miejsce_baza."_archiwum` WHERE `id`='".$id."'";
    
    $baza_po_edycji = mysqli_query($con,$q_po_edycji) or die("błąd po edycji");

   while($row = mysqli_fetch_assoc($baza_po_edycji)){
      $tab[] = $row;
    }
    
    echo json_encode($tab);
    
    
}elseif(isset($_GET["ile"])){
    
   $zmiana = $_GET["filtrzmiana"];
    $filtrdni = $_GET["filtrdni"];
    $filtrtrasa = $_GET["filtrtrasa"];
    $filtrmiejsca = $_GET["filtrmiejsca"];
   
    $filtrmiejsce_pracy = $_GET["miejsce_pracy"];
    
    $limit = $_GET["limit"];

    
  /*  echo $jakazmiana." ".$filtrdni." ".$filtrtrasa." ".$_GET["filtrzmiana"];*/
    
   //dodac opcje ze ogl9szenie zostaje usuniete po 2 tug i dopiero zostana wyswietlone dobre
  

      
        
        if($zmiana == "all_zm"){
            
            $zmiana = "";
            $przeddni = " WHERE ";
            
        }else{
        
//jesli jest kilka opcji to czesto zaznacza tez pierwsza pomomo ze ona nie jest
//domiejsc tez trzea cosrozkminic inaczej bo jeslijaszukam 1 miejsca a ktosblb ma 2 to mi go nie wyszuka 
            
            $zmiana = " WHERE (`zmiana` RLIKE '".$zmiana."+')";
          
            $przeddni = " AND ";
        }
      
    
    
    
    if($filtrdni != "wszystkie"){
     
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
   
 if($filtrtrasa == "tr_all"){
        $trasa = "";
    }else{
   
     if($zmiana == "" && $dnibaza == ""){
       $przedtrasa = " WHERE ";
     }else{
       $przedtrasa = " AND ";
     }
     
     $trasa = $przedtrasa."(`trasa` RLIKE '".$filtrtrasa."+')";
   
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
            
                    $miejsce_pracy = " WHERE `miejsce_pracy` = '".$filtrmiejsce_pracy."'";
            
        }else{
        
        
        $miejsce_pracy = "AND `miejsce_pracy` = '".$filtrmiejsce_pracy."'";
        }
    }
    
   
   $zapytanie = "SELECT * FROM `".$miejsce_baza."_ogloszenia`".$zmiana.$dnibaza.$trasa.$miejsca.$miejsce_pracy;
   
   
   $baza = mysqli_query($con,$zapytanie);
   
 
   
   $ile_ogl = mysqli_num_rows($baza);
  
       
       echo $ile_ogl;
       
    
    

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