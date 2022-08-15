<?php


$lon = $_GET["lon"];
$lat = $_GET["lat"];

 $curl = curl_init("https://nominatim.openstreetmap.org/reverse?lat=".$lat."&lon=".$lon."&format=json&zoom=18");

        $userAgent = 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.2 (KHTML, like Gecko) Chrome/22.0.1216.0 Safari/537.2';
curl_setopt($curl, CURLOPT_USERAGENT, $userAgent );
         curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, false);
       $result = curl_exec($curl);
        curl_close($curl);

echo $result;
?>