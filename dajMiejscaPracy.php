<?php


require_once("con.php");



if(isset($_GET['dajMiejsca']) && $_GET['dajMiejsca'] == "daj"){
    
    
    
    
    $miejsce = $_GET['miejsce'];

if($miejsce == 'firmy'){
    
    $tabela = "firmy";
    
}elseif ($miejsce == 'wot') {
    
    $tabela = $miejsce;
    
}

$limit = $_GET["limit"];


$wojewodztwo = $_GET['filtrWojewodztwo'];

$q_firmy = "SELECT * FROM `".$tabela."` WHERE `wojewodztwo` ='".$wojewodztwo."'";


$filtrMiasto = isset($_GET["filtrMiasto"]) && $_GET["filtrMiasto"] != "" ? $_GET["filtrMiasto"] : null;

$filtrNazwa = isset($_GET["filtrNazwa"]) && $_GET["filtrNazwa"] != "" ? $_GET["filtrNazwa"] : null;

$filtrNip = isset($_GET["filtrNip"]) && $_GET["filtrNip"] != "" ? $_GET["filtrNip"] : null;
    
    
    if($filtrMiasto){
 $q_firmy .= " AND (`miasto` LIKE '%".mb_strtoupper($filtrMiasto)."%' OR `miasto` LIKE '%".mb_strtolower($filtrMiasto)."%' OR `miasto` LIKE '%".$filtrMiasto."%' OR `miasto` LIKE '%".ucfirst(mb_strtolower($filtrMiasto))."%' OR `miasto` LIKE '%".ucwords(mb_strtolower($filtrMiasto))."%')";
    }

    
    if($filtrNazwa){
   $q_firmy .= " AND (`nazwa` LIKE '%".mb_strtoupper($filtrNazwa)."%' OR `nazwa` LIKE '%".mb_strtolower($filtrNazwa)."%' OR `nazwa` LIKE '%".$filtrNazwa."%' OR `nazwa` LIKE '%".ucfirst(mb_strtolower($filtrNazwa))."%' OR `nazwa` LIKE '%".ucwords(mb_strtolower($filtrNazwa))."%')";
    }

    
    if($filtrNip){
   $q_firmy .= " AND `nip` LIKE '%".$filtrNip."%'";
    }

$q_firmy .= ' ORDER BY `miasto` LIMIT '.$limit.',10';


mysqli_set_charset($con, 'utf8');

mysqli_query($con,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");  
 
mysqli_query($con,"SET NAMES = 'utf8'");



$b_firmy = mysqli_query($con,$q_firmy);

 while($row = mysqli_fetch_assoc($b_firmy)){
    
    $tab[] = $row; 
  
}

echo json_encode($tab);

    
    
}elseif(isset($_GET['dajMiejsca']) && $_GET['dajMiejsca'] == "ile"){
    
    
       $miejsce = $_GET['miejsce'];

if($miejsce == 'firmy'){
    
    $tabela = "firmy";
    
}elseif ($miejsce == 'wot') {
    
    $tabela = $miejsce;
    
}

$limit = $_GET["limit"];


$wojewodztwo = $_GET['filtrWojewodztwo'];


if(!isset($_GET["sse"]) || $_GET['sse'] == null){
    
$q_firmy = "SELECT * FROM `".$tabela."` WHERE `wojewodztwo` ='".$wojewodztwo."'";
}else{
    
    $sse = $_GET['sse'];
    
        $q_firmy = "SELECT * FROM `firmy` WHERE `strefa` ='".$sse."'";
}



$filtrMiasto = isset($_GET["filtrMiasto"]) && $_GET["filtrMiasto"] != "" ? $_GET["filtrMiasto"] : null;

$filtrNazwa = isset($_GET["filtrNazwa"]) && $_GET["filtrNazwa"] != "" ? $_GET["filtrNazwa"] : null;

$filtrNip = isset($_GET["filtrNip"]) && $_GET["filtrNip"] != "" ? $_GET["filtrNip"] : null;
    
    
    if($filtrMiasto){
 $q_firmy .= " AND (`miasto` LIKE '%".mb_strtoupper($filtrMiasto)."%' OR `miasto` LIKE '%".mb_strtolower($filtrMiasto)."%' OR `miasto` LIKE '%".$filtrMiasto."%' OR `miasto` LIKE '%".ucfirst(mb_strtolower($filtrMiasto))."%' OR `miasto` LIKE '%".ucwords(mb_strtolower($filtrMiasto))."%')";
    }

    
     if($filtrNazwa){
   $q_firmy .= " AND (`nazwa` LIKE '%".mb_strtoupper($filtrNazwa)."%' OR `nazwa` LIKE '%".mb_strtolower($filtrNazwa)."%' OR `nazwa` LIKE '%".$filtrNazwa."%' OR `nazwa` LIKE '%".ucfirst(mb_strtolower($filtrNazwa))."%' OR `nazwa` LIKE '%".ucwords(mb_strtolower($filtrNazwa))."%')";
    }
    
    if($filtrNip){
   $q_firmy .= " AND `nip` LIKE '%".$filtrNip."%'";
    }
    

mysqli_set_charset($con, 'utf8');

mysqli_query($con,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");  
 
mysqli_query($con,"SET NAMES = 'utf8'");


$b_firmy = mysqli_query($con,$q_firmy);

$ile = mysqli_num_rows($b_firmy);
  
       
       echo $ile;

    
}elseif(isset($_GET['dajMiejsca']) && $_GET['dajMiejsca'] == "sse"){
    
    $sse = $_GET['sse'];
    $limit = $_GET["limit"];
    
    $q_firmy = "SELECT * FROM `firmy` WHERE `strefa` ='".$sse."'";
    
    $filtrMiasto = isset($_GET["filtrMiasto"]) && $_GET["filtrMiasto"] != "" ? $_GET["filtrMiasto"] : null;

$filtrNazwa = isset($_GET["filtrNazwa"]) && $_GET["filtrNazwa"] != "" ? $_GET["filtrNazwa"] : null;

$filtrNip = isset($_GET["filtrNip"]) && $_GET["filtrNip"] != "" ? $_GET["filtrNip"] : null;
    
    
      if($filtrMiasto){
 $q_firmy .= " AND (`miasto` LIKE '%".mb_strtoupper($filtrMiasto)."%' OR `miasto` LIKE '%".mb_strtolower($filtrMiasto)."%' OR `miasto` LIKE '%".$filtrMiasto."%' OR `miasto` LIKE '%".ucfirst(mb_strtolower($filtrMiasto))."%' OR `miasto` LIKE '%".ucwords(mb_strtolower($filtrMiasto))."%')";
    }


    if($filtrNazwa){
   $q_firmy .= " AND (`nazwa` LIKE '%".mb_strtoupper($filtrNazwa)."%' OR `nazwa` LIKE '%".mb_strtolower($filtrNazwa)."%' OR `nazwa` LIKE '%".$filtrNazwa."%' OR `nazwa` LIKE '%".ucfirst(mb_strtolower($filtrNazwa))."%' OR `nazwa` LIKE '%".ucwords(mb_strtolower($filtrNazwa))."%')";
    }
    
    if($filtrNip){
   $q_firmy .= " AND `nip` LIKE '%".$filtrNip."%'";
    }
    
    $q_firmy .= ' ORDER BY `miasto` LIMIT '.$limit.',10';

mysqli_set_charset($con, 'utf8');
mysqli_query($con,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");  
 
mysqli_query($con,"SET NAMES = 'utf8'");

$b_firmy = mysqli_query($con,$q_firmy);


while($row = mysqli_fetch_assoc($b_firmy)){
    
    $tab[] = $row; 
  
}

echo json_encode($tab);

    
}elseif(isset($_GET["autocomplete"]) && $_GET['autocomplete'] == true){
   
   $sse = $_GET["autocompletesse"] ?? null;
   $filtr = $_GET["filtr"];
   
   $wojewodztwo = $_GET["wojewodztwo"];
   $miejsce = $_GET["miejsce"];
  $keyword = $_GET["keyword"];
   
   $limit = 5;
   
   
   
   
   if($miejsce == "wot"){
       $tabela = "wot";
       
   }elseif($miejsce == "firmy" || $sse != null){
       $tabela = "firmy";
   }
   
  
   if($filtr == "filtrMiasto"){
        
        $kolumna = 'miasto';
        
    }else if($filtr == "filtrNazwa"){
        
        $kolumna = 'nazwa';
        
    }else if($filtr == "filtrNip"){
        
        $kolumna = 'nip';
        
    }
    
   
    if($sse != null){
    
    $q_firmy = "SELECT `".$kolumna."` FROM `".$tabela."` WHERE `strefa` = '".$sse."'";
    }else{
        $q_firmy = "SELECT `".$kolumna."` FROM `".$tabela."` WHERE `wojewodztwo` = '".$wojewodztwo."'";
    }
    
    
       $q_firmy .= " AND (`".$kolumna."` LIKE '%".mb_strtoupper($keyword)."%' OR `".$kolumna."` LIKE '%".mb_strtolower($keyword)."%' OR `".$kolumna."` LIKE '%".$keyword."%' OR `".$kolumna."` LIKE '%".ucfirst(mb_strtolower($keyword))."%' OR `".$kolumna."` LIKE '%".ucwords(mb_strtolower($keyword))."%')";
    
    $q_firmy .= ' LIMIT '.$limit;
    
    mysqli_set_charset($con, 'utf8');
mysqli_query($con,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");  

 
mysqli_query($con,"SET NAMES = 'utf8'");
    
    $b_firmy = mysqli_query($con,$q_firmy);
    
    
    while($row = mysqli_fetch_assoc($b_firmy)){
        $tags[] = $row[$kolumna];
    }
    
    
    if($tags){
    echo implode(',',$tags);
    }
    
}





?>