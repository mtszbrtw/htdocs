<?php

session_start();

// po wyborze filtra z menu wiafomosc wysyla kilka razy 
//sprovuje zabezpieczyc yo w php tak ze sprawdze date poprzednich wiafomosci i jesli bedzie taka sama co do sekundy to nie wysle po prostu 

require_once('../con.php');

$nick = $_SESSION['nick'];

if(isset($_GET["tresc"])){
    
  //zrob8c drugie tresc wyslas z main id ogl i druga strone nie musze robic pierwszego zapytania

    
    
    $miejsce = explode("_",$_GET['tresc']);
    $miejsce = $miejsce[1];
   
 if($miejsce == "radomsko"){
       $miejsce = "radomsk";
   }
   
   if($miejsce != ""){
       $miejsce = $miejsce."_";
   }
   
$q_dokogo = "SELECT `kto` FROM `".$miejsce."ogloszenia` WHERE `id`='".$_GET['tresc']."'";
    
    
    
    
    $dokogo_baza = mysqli_fetch_assoc(mysqli_query($con,$q_dokogo));
    
    
    $dokogo = $dokogo_baza["kto"];
    $id_ogl = $_GET["tresc"];
    
    
    $kto = $nick;
  
  
 //echo "czytanie tresci".$miejsce." ".$id_ogl." ".$dokogo." ".$kto;
  
  
  //najpierw zrobic selecta 
  
  $q_wiad = "SELECT `id`,`tresc`,`data`,`nadawca` FROM `wiadomosci` WHERE (`nadawca`='".$kto."' AND `odbiorca`='".$dokogo."' AND `czyja` = '".$kto."' AND `id_ogl` = '".$id_ogl."') OR (`nadawca`='".$dokogo."' AND `odbiorca`='".$kto."' AND `czyja`= '".$kto."' AND `id_ogl` = '".$id_ogl."') ORDER BY data ASC";
  
  
  mysqli_query($con,"UPDATE `wiadomosci` SET `przeczytane` ='1' WHERE `ostatnia`!='".$kto."' AND `czyja`='".$kto."' AND `id_ogl` = '".$id_ogl."'");
  
  //kto to piok i do kpgo to tez piok 
  //musze pobrac nick nadawcy kto qyslal qoadomosc uczeatnik inny niz nivk 
  
  //select * from wiadomosci where id_ogl = id_ogl and (nadawca = kto or odbiorca = kto) and czyja = kto order by data asc
  
  
  $wiad_baza = mysqli_query($con,$q_wiad);
  

  while($row = mysqli_fetch_assoc($wiad_baza)){
       
       $tab[] = $row;
       
  }
  
  
  echo json_encode($tab);
 
    
    
}elseif(isset($_GET["zwykle_tresc"])){
    
    $q_dokogo = "SELECT `kto` FROM `zwykle_ogloszenia` WHERE `id`='".$_GET['zwykle_tresc']."'";
    
    
    
    $dokogo_baza = mysqli_fetch_assoc(mysqli_query($con,$q_dokogo));
    
    
    $dokogo = $dokogo_baza["kto"];
    $id_ogl = $_GET["zwykle_tresc"];
    
    
    $kto = $nick;
  
  
 //echo "czytanie tresci".$miejsce." ".$id_ogl." ".$dokogo." ".$kto;
  
  
  //najpierw zrobic selecta 
  
  $q_wiad = "SELECT `id`,`tresc`,`data`,`nadawca` FROM `wiadomosci` WHERE (`nadawca`='".$kto."' AND `odbiorca`='".$dokogo."' AND `czyja` = '".$kto."' AND `id_ogl` = '".$id_ogl."') OR (`nadawca`='".$dokogo."' AND `odbiorca`='".$kto."' AND `czyja`= '".$kto."' AND `id_ogl` = '".$id_ogl."') ORDER BY data ASC";
  
  
  mysqli_query($con,"UPDATE `wiadomosci` SET `przeczytane` ='1' WHERE `ostatnia`!='".$kto."' AND `czyja`='".$kto."' AND `id_ogl` = '".$id_ogl."'");
  
  //kto to piok i do kpgo to tez piok 
  //musze pobrac nick nadawcy kto qyslal qoadomosc uczeatnik inny niz nivk 
  
  //select * from wiadomosci where id_ogl = id_ogl and (nadawca = kto or odbiorca = kto) and czyja = kto order by data asc
  
  
  $wiad_baza = mysqli_query($con,$q_wiad);
  

  while($row = mysqli_fetch_assoc($wiad_baza)){
       
       $tab[] = $row;
       
  }
  
 
  
  echo json_encode($tab);
 
    
    
}elseif(isset($_GET["tresc_w"])){
    
    $dokogo = $_GET["tresc_w"];
    $id_ogl = $_GET["id_ogl"];
    $kto = $nick;
    
  //  echo $dokogo." ".$id_ogl." ".$kto;
    
    
  
  $q_wiad = "SELECT * FROM `wiadomosci` WHERE (`nadawca`='".$kto."' AND `odbiorca`='".$dokogo."' AND `czyja` = '".$kto."' AND `id_ogl` = '".$id_ogl."') OR (`nadawca`='".$dokogo."' AND `odbiorca`='".$kto."' AND `czyja`= '".$kto."' AND `id_ogl` = '".$id_ogl."') ORDER BY data ASC";
  
 mysqli_query($con,"UPDATE `wiadomosci` SET `przeczytane` ='1' WHERE `ostatnia`!='".$kto."' AND `czyja`='".$kto."' AND `id_ogl` = '".$id_ogl."'");
  
  //kto to piok i do kpgo to tez piok 
  //musze pobrac nick nadawcy kto qyslal qoadomosc uczeatnik inny niz nivk 
  
  //select * from wiadomosci where id_ogl = id_ogl and (nadawca = kto or odbiorca = kto) and czyja = kto order by data asc
  
  
  $wiad_baza = mysqli_query($con,$q_wiad);
  
  
  
  /*if($wiad_baza){
      echo "baza ok";
  }else{
      echo "baza no";
  }*/
  
  while($row = mysqli_fetch_assoc($wiad_baza)){
       
       $tab[] = $row;
       
  }
  
  
  
  if(isset($tab)){
  
  echo json_encode($tab);
  }
    
    
}elseif(isset($_POST["ilosc"])){
    
    
    $id_ogl = $_POST["id"];
    $kto = $nick;
   //* na odb nad 
     $q_dokogo = "SELECT `odbiorca`,`nadawca` FROM `wiadomosci` WHERE `id_pokaz` = '".$id_ogl."' AND `czyja` = '".$kto."'";
    $b_dokogo = mysqli_fetch_assoc(mysqli_query($con,$q_dokogo));

    
    if($b_dokogo["odbiorca"] == $kto){
        $druga = $b_dokogo["nadawca"];
    }if($b_dokogo["nadawca"] == $kto){
        $druga = $b_dokogo["odbiorca"];
    }
    
    
  //* na id
  
  $q_ile = "SELECT `id` FROM `wiadomosci` WHERE (`nadawca`='".$kto."' AND `odbiorca`='".$druga."' AND `czyja` = '".$kto."' AND `id_ogl` = '".$id_ogl."') OR (`nadawca`='".$druga."' AND `odbiorca`='".$kto."' AND `czyja`= '".$kto."' AND `id_ogl` = '".$id_ogl."')";
  
  
  $b_ile = mysqli_query($con,$q_ile);
  
  $ile = mysqli_num_rows($b_ile);

 // echo "dokogo>".$druga." <".$ile." idogl".$id_ogl." kto".$kto;
 
 echo $ile;

}elseif(isset($_POST['wyslij'])){
    
    $miejsce = explode("_",$_POST['id']);
    $miejsce = $miejsce[1];
   
   if($miejsce == "radomsko"){
       $miejsce = "radomsk";
   }
   
   if($miejsce != ""){
       $miejsce = $miejsce."_";
   }
   
   $q_dokogo = "SELECT `kto` FROM `".$miejsce."ogloszenia` WHERE `id`='".$_POST['id']."'";

  




    $dokogo_baza = mysqli_fetch_assoc(mysqli_query($con,$q_dokogo));
   
    $dokogo = $dokogo_baza['kto'];
    $kto = $nick;
    $tresc = filtruj($con,$_POST['wyslij']);
    
   //echo "wysyłanoe <>".$_POST['id']." ->".$miejsce."<-->".$dokogo."<-- ".$kto." ".$tresc;
    
   //* na id
$q_ogl_id = "SELECT `id` FROM `wiadomosci` WHERE (`czyja` = '".$kto."' OR `czyja` = '".$dokogo."') AND `id_ogl` = '".$_POST['id']."' AND `id_pokaz` != '0'";


$qile = mysqli_num_rows(mysqli_query($con,$q_ogl_id));

$q_wiad_data = "SELECT `data` FROM `wiadomosci` WHERE `nadawca` = '".$kto."' AND `id_ogl` = '".$_POST['id']."' ORDER BY `data` DESC LIMIT 1";
$b_wiad_data = mysqli_query($con,$q_wiad_data);
$row = mysqli_fetch_assoc($b_wiad_data);

date_default_timezone_set('Europe/Warsaw');

 
$akt_czas = date("Y-m-d H:i:s",time());
 
 
if($akt_czas == $row["data"] || $row["data"] == date("Y-m-d H:i:s",time()-0.3)){
  //nic
  
}else{
    


 if($qile == '0'){
  
    
    // echo $kto." ".$dokogo." ".$tresc." ".$_POST["id"];
   
 $q_wyslij_wiad = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`, `id_pokaz`, `ostatnia`,`ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '1', NOW(), '".$kto."','".$_POST['id']."','".$_POST["id"]."', '".$kto."', NOW()), (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '0', NOW(), '".$dokogo."','".$_POST['id']."','".$_POST["id"]."', '".$kto."', NOW())";
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad);
    
   
   /*
   
    
$q_wyslij_wiad2 = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`, `id_pokaz`, `ostatnia`,`ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '0', NOW(), '".$dokogo."','".$_POST['id']."','".$_POST["id"]."', '".$kto."', NOW())";
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad2);
    
    */
   
    }elseif($qile == '1'){
        
        //1 bo ktos usuna swoja wersje trzeba sprawdxic kto byl taki madry i jemu do pokaz przypisac id a w kopi 0 
        
        
        
 $q_czyja =  "SELECT `czyja` FROM `wiadomosci` WHERE (`czyja` = '".$kto."' OR `czyja` = '".$dokogo."') AND `id_ogl` = '".$_POST['id']."' AND `id_pokaz` = '".$_POST['id']."'";
        
 $b_czyja = mysqli_fetch_assoc(mysqli_query($con,$q_czyja));
   
   if($b_czyja["czyja"] == $nick){
     
     //nadawaca kto ostatniadsta null

 $q_wyslij_wiad = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`, `id_pokaz`, `ostatnia`,`ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '1', NOW(), '".$kto."','".$_POST['id']."','0', '0', NOW()), (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '0', NOW(), '".$dokogo."','".$_POST['id']."','".$_POST["id"]."', '".$kto."',NOW())";
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad);
    
    /*
$q_wyslij_wiad2 = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`, `id_pokaz`, `ostatnia`,`ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '0', NOW(), '".$dokogo."','".$_POST['id']."','".$_POST["id"]."', '".$kto."',NOW())";

    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad2);
    */
    
mysqli_query($con,"UPDATE `wiadomosci` SET `ostatnia`='".$kto."', `ostatnia_data` = NOW() WHERE `czyja`='".$kto."' AND `id_pokaz`='".$_POST['id']."'");

mysqli_query($con,"UPDATE `wiadomosci` SET `przeczytane` = '0' WHERE `czyja`='".$dokogo."' AND `id_pokaz` = '".$_POST['id']."'");
    
    
 
       
   }elseif($b_czyja["czyja"] == $dokogo){
     
    //OSTATNIA NULL GDZIE CZYJA DOKOHO BYLO NOE
       
 $q_wyslij_wiad = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`, `id_pokaz`, `ostatnia`,`ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '1', NOW(), '".$kto."','".$_POST['id']."','".$_POST["id"]."','".$kto."', NOW()), (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '0', NOW(), '".$dokogo."','".$_POST['id']."','0', '0', NOW())";
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad);
    
    /*
    
$q_wyslij_wiad2 = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`, `id_pokaz`, `ostatnia`,`ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '0', NOW(), '".$dokogo."','".$_POST['id']."','0', '0',NOW())";
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad2);
    */
    //dodalem przeczytane 0
mysqli_query($con,"UPDATE `wiadomosci` SET `ostatnia`='".$kto."', `ostatnia_data` = NOW(), `przeczytane` = '0'  WHERE `czyja`='".$dokogo."' AND `id_pokaz`='".$_POST['id']."'");
   
   
   /* 
    mysqli_query($con,"UPDATE `wiadomosci` SET `przeczytane` = '0' WHERE `czyja`='".$dokogo."' AND `id_pokaz` = '".$_POST['id']."'");
       */
   }
        
  
}elseif($qile == '2'){
        
       //nie zmienilem na null vk nie wysylalo
       
        
 $q_wyslij_wiad = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`,`id_pokaz`,`ostatnia`, `ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '0', NOW(), '".$dokogo."', '".$_POST["id"]."', '0', '0', NOW()), (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '1', NOW(), '".$kto."', '".$_POST["id"]."', '0', '0', NOW())";
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad);
        
        /*
        
$q_wyslij_wiad2 = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`,`id_pokaz`, `ostatnia`, `ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '1', NOW(), '".$kto."', '".$_POST["id"]."', '0', '0',NOW())";
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad2);
    */
    
    
mysqli_query($con,"UPDATE `wiadomosci` SET `ostatnia`='".$kto."', `ostatnia_data` = NOW() WHERE `id_ogl`='".$_POST["id"]."' AND (`czyja`='".$dokogo."' OR `czyja` = '".$kto."') AND `id_pokaz`='".$_POST['id']."'");

   mysqli_query($con,"UPDATE `wiadomosci` SET `przeczytane` = '0' WHERE `czyja`='".$dokogo."' AND `id_pokaz` = '".$_POST['id']."'");

    }else{
        echo "???";
    }
    

}


}elseif(isset($_POST['zwykle_wyslij'])){
    
    $q_dokogo = "SELECT `kto` FROM `zwykle_ogloszenia` WHERE `id`='".$_POST['id']."'";


    $dokogo_baza = mysqli_fetch_assoc(mysqli_query($con,$q_dokogo));
   
    $dokogo = $dokogo_baza['kto'];
    $kto = $nick;
    $tresc = filtruj($con,$_POST['zwykle_wyslij']);
    
   //echo "wysyłanoe <>".$_POST['id']." ->".$miejsce."<-->".$dokogo."<-- ".$kto." ".$tresc;
    
   //* na id
$q_ogl_id = "SELECT `id` FROM `wiadomosci` WHERE (`czyja` = '".$kto."' OR `czyja` = '".$dokogo."') AND `id_ogl` = '".$_POST['id']."' AND `id_pokaz` != '0'";


$qile = mysqli_num_rows(mysqli_query($con,$q_ogl_id));

$q_wiad_data = "SELECT `data` FROM `wiadomosci` WHERE `nadawca` = '".$kto."' AND `id_ogl` = '".$_POST['id']."' ORDER BY `data` DESC LIMIT 1";
$b_wiad_data = mysqli_query($con,$q_wiad_data);
$row = mysqli_fetch_assoc($b_wiad_data);

date_default_timezone_set('Europe/Warsaw');

 
$akt_czas = date("Y-m-d H:i:s",time());
 
 
 echo "datawyslania ostanieho".$row["data"]." nie powinno wyslac jesli jest data ta i do +2s".date("Y-m-d H:i:s",time()+0.1);
 
if($akt_czas == $row["data"] || $row["data"] == date("Y-m-d H:i:s",time()+0.3) || $row["data"] == date("Y-m-d H:i:s",time()+0.2) || $row["data"] == date("Y-m-d H:i:s",time()+0.1)){
  
  echo "jjsjs";
  
}else{
    


 if($qile == '0'){
  
    
    // echo $kto." ".$dokogo." ".$tresc." ".$_POST["id"];
   
 $q_wyslij_wiad = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`, `id_pokaz`, `ostatnia`,`ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '1', NOW(), '".$kto."','".$_POST['id']."','".$_POST["id"]."', '".$kto."', NOW()), (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '0', NOW(), '".$dokogo."','".$_POST['id']."','".$_POST["id"]."', '".$kto."', NOW())";
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad);
    
   
   /*
   
    
$q_wyslij_wiad2 = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`, `id_pokaz`, `ostatnia`,`ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '0', NOW(), '".$dokogo."','".$_POST['id']."','".$_POST["id"]."', '".$kto."', NOW())";
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad2);
    
    */
   
    }elseif($qile == '1'){
        
        //1 bo ktos usuna swoja wersje trzeba sprawdxic kto byl taki madry i jemu do pokaz przypisac id a w kopi 0 
        
        
        
 $q_czyja =  "SELECT `czyja` FROM `wiadomosci` WHERE (`czyja` = '".$kto."' OR `czyja` = '".$dokogo."') AND `id_ogl` = '".$_POST['id']."' AND `id_pokaz` = '".$_POST['id']."'";
        
 $b_czyja = mysqli_fetch_assoc(mysqli_query($con,$q_czyja));
   
   if($b_czyja["czyja"] == $nick){
     
     //nadawaca kto ostatniadsta null

 $q_wyslij_wiad = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`, `id_pokaz`, `ostatnia`,`ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '1', NOW(), '".$kto."','".$_POST['id']."','0', '0', NOW()), (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '0', NOW(), '".$dokogo."','".$_POST['id']."','".$_POST["id"]."', '".$kto."',NOW())";
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad);
    
    /*
$q_wyslij_wiad2 = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`, `id_pokaz`, `ostatnia`,`ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '0', NOW(), '".$dokogo."','".$_POST['id']."','".$_POST["id"]."', '".$kto."',NOW())";

    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad2);
    */
    
mysqli_query($con,"UPDATE `wiadomosci` SET `ostatnia`='".$kto."', `ostatnia_data` = NOW() WHERE `czyja`='".$kto."' AND `id_pokaz`='".$_POST['id']."'");

mysqli_query($con,"UPDATE `wiadomosci` SET `przeczytane` = '0' WHERE `czyja`='".$dokogo."' AND `id_pokaz` = '".$_POST['id']."'");
    
    
 
       
   }elseif($b_czyja["czyja"] == $dokogo){
     
    //OSTATNIA NULL GDZIE CZYJA DOKOHO BYLO NOE
       
 $q_wyslij_wiad = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`, `id_pokaz`, `ostatnia`,`ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '1', NOW(), '".$kto."','".$_POST['id']."','".$_POST["id"]."','".$kto."', NOW()), (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '0', NOW(), '".$dokogo."','".$_POST['id']."','0', '0', NOW())";
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad);
    
    /*
    
$q_wyslij_wiad2 = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`, `id_pokaz`, `ostatnia`,`ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '0', NOW(), '".$dokogo."','".$_POST['id']."','0', '0',NOW())";
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad2);
    */
    //dodalem przeczytane 0
mysqli_query($con,"UPDATE `wiadomosci` SET `ostatnia`='".$kto."', `ostatnia_data` = NOW(), `przeczytane` = '0'  WHERE `czyja`='".$dokogo."' AND `id_pokaz`='".$_POST['id']."'");
   
   
   /* 
    mysqli_query($con,"UPDATE `wiadomosci` SET `przeczytane` = '0' WHERE `czyja`='".$dokogo."' AND `id_pokaz` = '".$_POST['id']."'");
       */
   }
        
  
}elseif($qile == '2'){
        
       //nie zmienilem na null vk nie wysylalo
       
        
 $q_wyslij_wiad = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`,`id_pokaz`,`ostatnia`, `ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '0', NOW(), '".$dokogo."', '".$_POST["id"]."', '0', '0', NOW()), (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '1', NOW(), '".$kto."', '".$_POST["id"]."', '0', '0', NOW())";
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad);
        
        /*
        
$q_wyslij_wiad2 = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`,`id_pokaz`, `ostatnia`, `ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '1', NOW(), '".$kto."', '".$_POST["id"]."', '0', '0',NOW())";
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad2);
    */
    
    
mysqli_query($con,"UPDATE `wiadomosci` SET `ostatnia`='".$kto."', `ostatnia_data` = NOW() WHERE `id_ogl`='".$_POST["id"]."' AND (`czyja`='".$dokogo."' OR `czyja` = '".$kto."') AND `id_pokaz`='".$_POST['id']."'");

   mysqli_query($con,"UPDATE `wiadomosci` SET `przeczytane` = '0' WHERE `czyja`='".$dokogo."' AND `id_pokaz` = '".$_POST['id']."'");

    }else{
        echo "???";
    }
    

}

    
}elseif(isset($_POST["wyslij_w"])){
    

   
    $dokogo = $_POST["druga"];
    $kto = $nick;
    $id_ogl = $_POST["id_ogl"];
    $tresc = filtruj($con,$_POST['wyslij_w']);
    
//echo $dokogo." ".$kto." ".$id_ogl." ".$tresc;

echo $dokogo;

$q_ogl_id = "SELECT `id` FROM `wiadomosci` WHERE (`czyja` = '".$kto."' OR `czyja` = '".$dokogo."') AND `id_ogl` = '".$id_ogl."' AND `id_pokaz` != '0'";


$qile = mysqli_num_rows(mysqli_query($con,$q_ogl_id));

$q_wiad_data = "SELECT `data` FROM `wiadomosci` WHERE `nadawca` = '".$kto."' AND `id_ogl` = '".$id_ogl."' ORDER BY `data` DESC LIMIT 1";
$b_wiad_data = mysqli_query($con,$q_wiad_data);
$row = mysqli_fetch_assoc($b_wiad_data);

date_default_timezone_set('Europe/Warsaw');

 
$akt_czas = date("Y-m-d H:i:s",time());
 
 
if($akt_czas == $row["data"] || $row["data"] == date("Y-m-d H:i:s",time()-1)){
  //nic 
}else{
    




 if($qile == '0'){
     
    
   
 $q_wyslij_wiad = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`, `id_pokaz,`ostatnia`,`ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '1', NOW(), '".$kto."','".$id_ogl."','".$id_ogl."', '".$kto."',NOW()), (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '0', NOW(), '".$dokogo."','".$id_ogl."','".$id_ogl."', '".$kto."', NOW())";
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad);
    
    if($wyslij_baza){
        echo "ok";
    }else{
        echo "blad 307";
    }
    
    /*
$q_wyslij_wiad2 = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`, `id_pokaz`, `ostatnia`, `ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '0', NOW(), '".$dokogo."','".$id_ogl."','".$id_ogl."', '".$kto."', NOW())";
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad2);
    */
    
    }elseif($qile == '1'){
        
        //1 bo ktos usuna swoja wersje trzeba sprawdxic kto byl taki madry i jemu do pokaz przypisac id a w kopi 0 
        
 $q_czyja =  "SELECT `czyja` FROM `wiadomosci` WHERE (`czyja` = '".$kto."' OR `czyja` = '".$dokogo."') AND `id_ogl` = '".$id_ogl."' AND `id_pokaz` = '".$id_ogl."'";
        
 $b_czyja = mysqli_fetch_assoc(mysqli_query($con,$q_czyja));

 
   
   if($b_czyja["czyja"] == $nick){
     
     
     
       
 $q_wyslij_wiad = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`, `id_pokaz`, `ostatnia`,`ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '1', NOW(), '".$kto."','".$id_ogl."','0', '0', NOW()), (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '0', NOW(), '".$dokogo."','".$id_ogl."','".$id_ogl."', '".$kto."',NOW())";
 
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad);
    
    if($wyslij_baza){
        echo "ok";
    }else{
        echo "blad 335";
        
        echo $tresc." ".$kto." ".$dokogo." ".$id_ogl." ";
    }
    
    /*
$q_wyslij_wiad2 = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`, `id_pokaz`, `ostatnia`,`ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '0', NOW(), '".$dokogo."','".$id_ogl."','".$id_ogl."', '".$kto."',NOW())";
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad2);
    */
  mysqli_query($con,"UPDATE `wiadomosci` SET `ostatnia`='".$kto."',`ostatnia_data` = NOW() WHERE `czyja`='".$kto."' AND `id_pokaz`='".$_POST['id_ogl']."'");
  
  mysqli_query($con,"UPDATE `wiadomosci` SET `przeczytane` = '0' WHERE `czyja`='".$dokogo."' AND `id_pokaz` = '".$_POST['id_ogl']."'");
       
   }elseif($b_czyja["czyja"] == $dokogo){
     
       
 $q_wyslij_wiad = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`, `id_pokaz`, `ostatnia`,`ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '1', NOW(), '".$kto."','".$_POST['id']."','".$_POST['id_ogl']."', '".$kto."', NOW()), (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '0', NOW(), '".$dokogo."','".$id_ogl."','0', '0',NOW())";
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad);
    
    if($wyslij_baza){
        echo "ok";
    }else{
        echo "blad 357";
    }
    
    
   /* 
$q_wyslij_wiad2 = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`, `id_pokaz`, `ostatnia`,`ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '0', NOW(), '".$dokogo."','".$id_ogl."','0', '0',NOW())";
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad2);
       */
   
 /*mysqli_query($con,"UPDATE `wiadomosci` SET `przeczytane` = '0', `ostatnia`='".$kto."' WHERE `id_ogl`='".$id_ogl."' AND (`czyja`='".$dokogo."' OR `czyja` = '".$kto."') AND `id_pokaz`='".$id_ogl."'");*/
 
    mysqli_query($con,"UPDATE `wiadomosci` SET `ostatnia`='".$kto."', `przecztane` = '0', `ostatnia_data` = NOW() WHERE `czyja`='".$dokogo."' AND `id_pokaz`='".$_POST['id_ogl']."'");
    
       
   }
        
  
}elseif($qile == '2'){
        
        
 $q_wyslij_wiad = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`,`id_pokaz`, `ostatnia`,`ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '0', NOW(), '".$dokogo."', '".$id_ogl."', '0', '0',NOW()), (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '1', NOW(), '".$kto."', '".$id_ogl."', '0', '0', NOW())";
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad);
        
        if($wyslij_baza){
        echo "ok";
    }else{
        echo "blad 383";
    }
        
        
        /*
$q_wyslij_wiad2 = "INSERT INTO `wiadomosci` (`id`, `tresc`, `nadawca`, `odbiorca`, `przeczytane`,`data`, `czyja`, `id_ogl`,`id_pokaz`, `ostatnia`,`ostatnia_data`) VALUES (NULL, '".$tresc."', '".$kto."', '".$dokogo."', '1', NOW(), '".$kto."', '".$id_ogl."', '0', '0', NOW())";
    
    $wyslij_baza = mysqli_query($con,$q_wyslij_wiad2);
    */
    
 mysqli_query($con,"UPDATE `wiadomosci` SET `ostatnia`='".$kto."', `ostatnia_data` = NOW() WHERE (`czyja`='".$dokogo."' OR `czyja` = '".$kto."') AND `id_pokaz`='".$id_ogl."'");
  
 mysqli_query($con,"UPDATE `wiadomosci` SET `przeczytane` = '0' WHERE `czyja`='".$dokogo."' AND `id_pokaz` = '".$id_ogl."'");
 
 
        
    }
    
}

}elseif(isset($_GET['pokaz'])){
    

    
function merge_common_keys() {
$arrays = func_get_args();
$result = [];

foreach ((array)$arrays as $array) {
foreach ((array)$array as $key => $value) {
if ( ! array_key_exists($key, $result)) {
$result[$key] = [];
}

$result[$key] = array_merge($result[$key], $value);
}
}

return $result;
}

    
 
$q2 = "SELECT * FROM `wiadomosci` WHERE (`nadawca` = '".$nick."' OR `odbiorca` = '".$nick."') AND `id_pokaz` != '0' AND `czyja` = '".$nick."' ORDER BY `ostatnia_data` DESC";

$b2 = mysqli_query($con,$q2);

if(mysqli_num_rows($b2) != 0){

while($row = mysqli_fetch_assoc($b2)){
     
   
   $q_ogl = "SELECT zwykle_ogloszenia.*,Ouser.imie FROM `zwykle_ogloszenia` INNER JOIN `Ouser` ON zwykle_ogloszenia.kto = Ouser.nick WHERE zwykle_ogloszenia.id='".$row['id_ogl']."'";
  

    
    $b_ogl = mysqli_query($con,$q_ogl);
    
   while($wiersz = mysqli_fetch_assoc($b_ogl)){
       
     $ogl[]= $wiersz;
   }
   
   $qq = "SELECT `tresc` FROM `wiadomosci` WHERE `id_ogl` = '".$row['id_ogl']."' AND `czyja` = '".$nick."' ORDER BY `data` DESC LIMIT 1";
   
   $qb = mysqli_query($con,$qq);
   
   $qc = mysqli_fetch_assoc($qb);
   
    $row["tresc"] = $qc['tresc'];

   $tab[] = $row;
    
}

 $tar = merge_common_keys($ogl,$tab);
 
 
 
echo json_encode($tar);


//echo json_encode($tab);
}else{
    echo json_encode("pusto");
}
    
}elseif(isset($_GET["usun"])){
    
    $id = $_GET["usun"];
    
    //and nadawca = nick 
    //wtedy usuwa tylko wyslane a odrbrane xostaja
    //trzeva dav czyja 
    $q_usun = "DELETE FROM `wiadomosci` WHERE `id_ogl`='".$id."' AND `czyja`='".$nick."'";
    
    
    $baza_usun = mysqli_query($con,$q_usun);
    
    if($baza_usun){
        echo "ok";
    }else{
        echo "no";
    }
    
    //robic w bazie dwa takie same wiersze i w czyja zapisywac czyja to kopia nastepnie usunac wszystkie gdzie id tp id tego ohloszenia and czyja to nick
    
}elseif(isset($_POST["nieprzecz"])){
   
   
  $q_ile = "SELECT `id` FROM `wiadomosci` WHERE `czyja`='".$nick."' AND `przeczytane`='0' AND `id_pokaz` !='0'";
  $b_ile = mysqli_query($con,$q_ile);
 
  echo mysqli_num_rows($b_ile);
  
//jak Piok wysle wiad do mtsz yo pokazue ze nie przeczytana u mtsz ale jak mtsz na nia odpowie to nie poazuke pipkowi ze ma wiafomosc 
 //juzchyba pokazuje po usunieciu idpokaz ale w query nie pokazuje 
 //musi vyc idpokaz bo liczy kazda osobna wiad 

//przy dodawaniu wiad trzeba akyualizowac przeczytane 1 na 0 przy id pokaz != 0

//przy 1 albo 2 

//dodawac do pierwszej wiad idpokaz != 0 tabele ostatbia wiad i vo ktos wysle to bedzie jego nick 
//potem w main if ostatnia = nas nick yo ni pogtubia a jesli inny a przy okazji przeczytane = 0 to pogrubia 


}elseif(isset($_GET["ile_wiad"])){
    //* na id
    
    
    $q_ile_wiad = "SELECT `id` FROM `wiadomosci` WHERE (`nadawca` = '".$nick."' OR `odbiorca` = '".$nick."') AND `id_pokaz` != '0' AND `czyja` = '".$nick."'";
    
    $b_ile_wiad = mysqli_query($con,$q_ile_wiad);
   
    echo mysqli_num_rows($b_ile_wiad);
    
}



?>