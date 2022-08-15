<?php

require_once('../../../con.php');

if(isset($_GET["city_hint"]))
{
   
   $value = $_GET['keyword'];
   $miejsce = $_GET['miejsce'];
   
  $tab = [];
   
   
   $q_woj = "SELECT `wojewodztwo` FROM `firmyowg1` WHERE `nazwa` = '".$miejsce."'";
   $b_woj = mysqli_fetch_assoc(mysqli_query($con,$q_woj));
   $b_woj = $b_woj["wojewodztwo"];
   
  
   
   $q_id = "SELECT `WOJ` FROM `regiony` WHERE `NAZWA` = '".$b_woj."'";
   $b_id = mysqli_fetch_assoc(mysqli_query($con,$q_id));
   $b_id = (int) $b_id["WOJ"];
   
 
   
   $q_hint = "SELECT `NAZWA` FROM `miasta` WHERE (`NAZWA` LIKE '%".mb_strtoupper($value)."%' OR `NAZWA` LIKE '%".mb_strtolower($value)."%' OR `NAZWA` LIKE '%".$value."%' OR `NAZWA` LIKE '%".ucfirst(mb_strtolower($value))."%' OR `NAZWA` LIKE '%".ucwords(mb_strtolower($value))."%') LIMIT 20";
   
   
   
   mysqli_set_charset($con, 'utf8');

mysqli_query($con,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");  
 
mysqli_query($con,"SET NAMES = 'utf8'");


    
   $b_hint = mysqli_query($con,$q_hint);
   
   while($row = mysqli_fetch_assoc($b_hint)){
       $tab[] = $row["NAZWA"];
   }
    
    echo implode(",",$tab);
    
}


?>