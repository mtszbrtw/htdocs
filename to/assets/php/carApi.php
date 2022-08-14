<?php

require_once('../../../con.php');



if(isset($_GET["autocomplete_marki"])){
    
    $value = $_GET["value"];
        
        $tabela = "marki";
        

    
    $q_auta = "SELECT `marka` FROM `".$tabela."` WHERE (`marka` LIKE '%".mb_strtoupper($value)."%' OR `marka` LIKE '%".mb_strtolower($value)."%' OR `marka` LIKE '%".$value."%' OR `marka` LIKE '%".ucfirst(mb_strtolower($value))."%' OR `marka` LIKE '%".ucwords(mb_strtolower($value))."%')";

 $b_auta = mysqli_query($con,$q_auta);
    
    
    while($row = mysqli_fetch_assoc($b_auta)){
        $tags[] = $row['marka'];
    }
    
    
    if($tags){
    echo implode(',',$tags);
    }
    
 
    
    
}elseif(isset($_GET["autocomplete_modele"])){
    
    $value = $_GET["value"];
    $marka = $_GET["marka"];
        
        $tabela = "modele";
        

    
    $q_auta = "SELECT `model` FROM `".$tabela."` WHERE `marka` ='".$marka."' AND (`model` LIKE '%".mb_strtoupper($value)."%' OR `model` LIKE '%".mb_strtolower($value)."%' OR `model` LIKE '%".$value."%' OR `model` LIKE '%".ucfirst(mb_strtolower($value))."%' OR `model` LIKE '%".ucwords(mb_strtolower($value))."%')";

 $b_auta = mysqli_query($con,$q_auta);
    
    
    while($row = mysqli_fetch_assoc($b_auta)){
        $tags[] = $row['model'];
    }
    
    
    if($tags){
    echo implode(',',$tags);
    }
    
 
    
    
    
}else{


$q_make = "SELECT * FROM `marki` WHERE `has_model` IS NULL OR `has_model` = ''";

$b_make = mysqli_query($con,$q_make);



while($row = mysqli_fetch_assoc($b_make)){

$makeId = $row["make_id"];



$curl = curl_init("https://vpic.nhtsa.dot.gov/api/vehicles/GetModelsForMakeId/".$makeId."?format=json");


        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
       $result = json_decode(curl_exec($curl));
        curl_close($curl);
        
        print_r($result);
        
        if($result->Results != ""){
        
        foreach($result->Results as $model){
            
            $marka = $model->Make_Name;
            $model = $model->Model_Name;
            
            
            mysqli_query($con,"INSERT INTO `modele` (`id`,`marka`,`model`,`make_id`) VALUES (NULL, '".$marka."', '".$model."','".$makeId."')");
            
        }
        
        mysqli_query($con,"UPDATE `marki` SET `has_model` = '1' WHERE `make_id` = '".$makeId."'");
}

}


}
?>