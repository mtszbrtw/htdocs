<?php



function returnCoords($miasto,$wojewodztwo,$query){
    
    
//header('Content-Type: text/html; charset=utf-8');
  
$miasto = str_replace("-","+",$miasto);
        $miasto = str_replace(" ","+",$miasto);
    $keyword = $miasto.'+'.$wojewodztwo;
    
    $tab = [];

    //musze zmiwnic api bo te jest niedokladne i czesto wali e chua i pokazuje oceam alvo gore
    
    
    require '../../../vendor/autoload.php';

$queryk = $query ? '&query='.$query : '';

 $client = new \GuzzleHttp\Client();
$response = $client->request('GET','https://address.geocoding.api.ongeo.pl/1.0/search?api_key=3fa317ba-9a2f-4aff-8594-562dc0aa59d6&country=Polska&city='.$miasto.$queryk.'&maxresults=1');


$res = \GuzzleHttp\json_decode($response->getBody(),JSON_UNESCAPED_UNICODE); 

$lat = $res[0]["point"]["coordinates"][1];
$lon = $res[0]["point"]["coordinates"][0];

$gdzie = "start+";


if($query OR $query != ""){
    
    
    
    if(!$lat OR $lat ==0){
        
        $gdzie = "query1";
        
        
          $client = new \GuzzleHttp\Client();
$response = $client->request('GET','https://address.geocoding.api.ongeo.pl/1.0/search/?api_key=3fa317ba-9a2f-4aff-8594-562dc0aa59d6&query='.$query.'&city='.$miasto.'country=Polska&state=&maxresults=1');



$res = \GuzzleHttp\json_decode($response->getBody(),JSON_UNESCAPED_UNICODE); 

$lat = $res[0]["point"]["coordinates"][1];
$lon = $res[0]["point"]["coordinates"][0];
       
      
        
        
        if(!$lat){
            $gdzie = "query2";
            
                   $curl = curl_init("https://nominatim.openstreetmap.org/search?q=".$query."&country=PL&format=json&limit=1");

        $userAgent = 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.2 (KHTML, like Gecko) Chrome/22.0.1216.0 Safari/537.2';
curl_setopt($curl, CURLOPT_USERAGENT, $userAgent );
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, false);
       $result = json_decode(curl_exec($curl));
        curl_close($curl);
        
        $lat = $result[0]->lat;
        $lon = $result[0]->lon;
     
        }
        
    }
    
}else{

 if(!$lat){
     
     $gdzie="lat1";
       
       $curl = curl_init("https://nominatim.openstreetmap.org/search?city=".$miasto."&country=PL&format=json&limit=1");

        $userAgent = 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.2 (KHTML, like Gecko) Chrome/22.0.1216.0 Safari/537.2';
curl_setopt( $curl, CURLOPT_USERAGENT, $userAgent );
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, false);
       $result = json_decode(curl_exec($curl));
        curl_close($curl);
        
        $lat = $result[0]->lat;
        $lon = $result[0]->lon;
     
       
     
       
       if(!$lat){
           $gdzie = "lat2".$miasto;
            
       
        $client = new \GuzzleHttp\Client();
$response = $client->request('GET','https://address.geocoding.api.ongeo.pl/1.0/search/?api_key=3fa317ba-9a2f-4aff-8594-562dc0aa59d6&query='.$keyword.'&country=Polska&maxresults=1');



$res = \GuzzleHttp\json_decode($response->getBody(),JSON_UNESCAPED_UNICODE); 

$lat = $res[0]["point"]["coordinates"][1];
$lon = $res[0]["point"]["coordinates"][0];
       
      
           
       }
       
       
       
   }
   
   
}
   
   
   
    $tab[0]["coordinates"] = [
        'lat' => $lon,
        'lon' => $lat
        ];
        
    
           return json_encode($tab);
        
}
    
    if(isset($_GET["return_coords_from_city"])){
        
        $miasto = $_GET["city"];
    $wojewodztwo = $_GET["wojewodztwo"];
    
        
      echo returnCoords($miasto,$wojewodztwo,null);
    
    }



?>