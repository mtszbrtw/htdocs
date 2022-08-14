<?php

require_once("con.php");

/*

$response = [];
$response = file_get_contents('https://postal-code.search.api.ongeo.pl/1.0/autocomplete/?api_key=3fa317ba-9a2f-4aff-8594-562dc0aa59d6&query=Krak%C3%B3w%20J%C3%B3zefa%20Marcika%204&additionalData=address&types=city,street,houseNumber');

//$response = utf8_decode($response);
$response = json_decode($response);

print_r($response);

 echo("<br><br>".utf8_decode($response[0]->address->state)); //wojewodztwo

echo("<br><br>".utf8_decode($response[0]->address->city));//miasto

echo("<br><br>".utf8_decode($response[0]->label)); //adres

*/


//pousuwac "" z adresow


//pobieram z bazy wszystkie nazwy robie petle po tych nazwach i w loopie wysylan zadanie do api zeby mi zwrocilo dane (najbardzien potrzebuje sam nip) i przypisuje te dane do tego rekordu  i tyle
//+ email i www
//miejscowosc i adres stad (vhyba nie trzeba bedzie wl-wapi)
//nip i regon 
//nazwa sktocona 

//pozniej ten nip wrzuce do innego api https://wl-api.mf.gov.pl/ i tam poda mi ades i jakies podstawowe dane 
// jak ten adres wrzuce do api ongeo to bede mial dokladne info o lokalozacji 

//wsystkie nazwy musze spolaczczyc i pochowac jakies tam biprzyjazne znaki
/*

 mysqli_query($con,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");  
 
mysqli_query($con,"SET NAMES = 'utf8'");

$q_firmy = "SELECT * FROM `firmy` WHERE `byl_w_api` = 0 LIMIT 1";



$b_firmy = mysqli_query($con,$q_firmy);


while($row = mysqli_fetch_assoc($b_firmy)){
    
$nazwa_do_api = str_replace(" ","+",$row["nazwa"]);
     
$curl = curl_init("https://rejestr.io/api/v2/org?nazwa=".$nazwa_do_api."&terc_wojewodztwo="+$row["terc"]);

//$curl = curl_init("https://rejestr.io/api/v2/org?ile_na_strone=100");

$headers = array(
   "Authorization:57828a34-0b17-49a7-820e-1518fd54e5e5",
   "Content-Type: application/json",
);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
       $result = json_decode(curl_exec($curl));
        curl_close($curl);
        
      
        print_r($result);
      
      die();
       
       if(count($result->wyniki) >0){
    
   $miasto = $result->wyniki[0]->adres->miejscowosc;
    
       $adres =  $result->wyniki[0]->adres->kod.' '.$result->wyniki[0]->adres->miejscowosc.' '.$result->wyniki[0]->adres->ulica.' '.$result->wyniki[0]->adres->nr_domu;
        

$emails =is_array($result->wyniki[0]->kontakt->emaile) ? implode(",",$result->wyniki[0]->kontakt->emaile) : $result->wyniki[0]->kontakt->emaile;

$www = $result->wyniki[0]->kontakt->www;


$short_name = strtoupper(str_replace([" ","-"],'_',str_replace([",",".",'"'],"",$result->wyniki[0]->nazwy->skrocona)));

$nip = $result->wyniki[0]->numery->nip;
$regon = $result->wyniki[0]->numery->regon;

$branza = $result->wyniki[0]->stan->pkd_przewazajace_dzial;

$q_update = "UPDATE `firmy` SET `nip` = '".$nip."',`regon` = '".$regon."', `adres` = '".$adres."',`www` = '".$www."',`email` = '".$emails."',`skrocona` ='".$short_name."',`miasto` = '".$miasto."'";

if($row['branza'] == ""){
$q_update .= ",`branza` = '".$branza."'";
}


$q_update .= " WHERE `nazwa` = '".$row["nazwa"]."'";



$b_update = mysqli_query($con,$q_update);

$ret = ["uzupelniony"=>$row["nazwa"]];

}else{
    
    $ret = ["nieuzupelniony"=>$row["nazwa"]];
    
}

mysqli_query($con,"UPDATE `firmy` SET `byl_w_api` = 1 WHERE `nazwa` ='".$row['nazwa']."'");

echo json_encode($ret);
}*/

require 'vendor/autoload.php';



 $client = new \GuzzleHttp\Client();
$response = $client->request('GET','https://address.geocoding.api.ongeo.pl/1.0/search?api_key=3fa317ba-9a2f-4aff-8594-562dc0aa59d6&city=kłodzko&maxresults=1');


$res = \GuzzleHttp\json_decode($response->getBody(),JSON_UNESCAPED_UNICODE); 

$lat = $res[0]["point"]["coordinates"][1];
$lon = $res[0]["point"]["coordinates"][0];

echo $lon;

?>