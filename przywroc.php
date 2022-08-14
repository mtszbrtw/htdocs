<?php

use PHPmailer\PHPMailer\PHPMailer;
use PHPmailer\PHPMailer\Exception;

require_once("con.php");

if(isset($_GET["email"])){
    
    $email = filtruj($con,$_GET["email"]);
    
    $q_email = "SELECT `email` FROM `Ouser` WHERE `email` = '".$email."'";
    $b_email = mysqli_query($con,$q_email);
    if(mysqli_num_rows($b_email) > "0"){
        
        $l[0] = rand(1,9);
        $l[1] = rand(1,9);
        $l[2] = rand(1,9);
        $l[3] = rand(1,9);
        $l[4] = rand(1,9);
        $l[5] = rand(1,9);

    $kod = $l[1].$l[0].$l[3].$l[4].$l[5].$l[2];


require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


$tresc = "<center>Twój kod przywracania hasła jest następujący: <br><br>
<div style='color:white;background-color:blue'>$kod</div><br>
<b>skopiuj go lub przepisz w formularzu przywracania hasła.</b><br><small>(kod jest ważny 24 godziny)</small><br><br>
Pozdrawiamy zespół <b>eDojazdy.pl</b>, życzymy miłego dnia!<br><br>
<small>Jeśli to nie ty podiąłeś działania mające na celu przywrócenie hasła zignoruj tą wiadomość.</small>
</center><br><small style='color:gray'>ta wiadomość została wygenerowana automatycznie prosimy na nią nie odpowiadać.</small>";
$temat = "Kod przywracania hasła eDojazdy.pl";

$mail = new PHPMailer(true);

 $mail->isSMTP(); // Używamy SMT
 $mail->Host = 'websmtp.simply.com';
 $mail->SMTPAuth = true; // Autoryzacja (do) SMTP
 $mail->Username = 'przywrochaslo@edojazdy.pl';
 $mail->Password = "faberest1A"; // Hasło
 $mail->SMTPSecure = 'tls'; // Typ szyfrowania (TLS/SSL)
 $mail->Port = 587; // Port

 $mail->CharSet = "UTF-8";
 $mail->setLanguage('pl', 'phpmailer/language');

 $mail->setFrom('przywrochaslo@edojazdy.pl',"eDojazdy.pl Odzyskaj Hasło");//od 
 $mail->addAddress($email);

 $mail->isHTML(true); // Format: HTML
 $mail->Subject = $temat;
 $mail->Body = $tresc;
 $mail->AltBody = 'By wyświetlić wiadomość należy skorzystać z czytnika obsługującego wiadomości w formie HTML';

 $mail->send();
 // Gdy OK:");
 
 
 $q_kod = "UPDATE `Ouser` SET `kod_przy` = '".$kod."' WHERE `email` = '".$email."'";
  $b_kod = mysqli_query($con,$q_kod);

        echo json_encode("gutmail");
       
        
    }else{
        echo json_encode("badmail");
    }
    
}elseif(isset($_GET["kod"])){
    
    $kod = filtruj($con,$_GET["kod"]);
    $email = filtruj($con,$_GET["email2"]);
    
    
    $q_check = "SELECT `id` FROM `Ouser` WHERE `email` = '".$email."' AND `kod_przy` = '".$kod."'";
    $b_check = mysqli_query($con,$q_check);
    
    if(mysqli_num_rows($b_check) > 0){
        echo json_encode("dobry");
    }else{
       echo json_encode("zly");
    }
}elseif(isset($_GET["pass"])){
    
    $pass = md5(filtruj($con,$_GET["pass"]));
    $email = filtruj($con,$_GET["email3"]);
    
    
    $q_pass = "UPDATE `Ouser` SET `pass` = '".$pass."', `kod_przy` = '0' WHERE `email` = '".$email."'";
    $b_pass = mysqli_query($con,$q_pass);
   
    
    
}



?>
