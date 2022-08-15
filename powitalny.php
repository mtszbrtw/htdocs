<?php 



use PHPmailer\PHPMailer\PHPMailer;
use PHPmailer\PHPMailer\Exception;

require_once("con.php");

if(isset($_GET["email"])){
    
    $email = $_GET["email"];
  $login = $_GET["login"];
  
     

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


$tresc = "Witaj w społeczności eDojazdy.pl, platformie która łączy tych którzy oferują dojazd do pracy i tych którzy go szukają. Dziękujemy za utworzenie konta. Oto Twoje dane: <br>E-mail: ".$email." <br>Login : ".$login." <br><br> Pozostałe informacje takie jak imię, nr. telefonu, miejsce pracy, uzupełnisz po pierwszym zalogowaniu. Zachęcamy do wystawiania i wyszukiwania ogłoszeń dojazdów do Twojego miejsca pracy.<br><br> <small style='color:gray'>ta wiadomość została wygenerowana automatycznie prosimy na nią nie odpowiadać.</small>";
$temat = "Witaj w eDojazdy.pl - Dziękujemy za utworzenie konta!";

$mail = new PHPMailer(true);

 $mail = new PHPMailer(true);

 $mail->isSMTP(); // Używamy SMT
 $mail->Host = 'websmtp.simply.com';
 $mail->SMTPAuth = true; // Autoryzacja (do) SMTP
 $mail->Username = 'witamy@edojazdy.pl';
 $mail->Password = "faberest1A"; // Hasło
 $mail->SMTPSecure = 'tls'; // Typ szyfrowania (TLS/SSL)
 $mail->Port = 587; // Port

 $mail->CharSet = "UTF-8";
 $mail->setLanguage('pl', 'phpmailer/language');


 $mail->setFrom('witamy@edojazdy.pl',"eDojazdy.pl Rejestracja");//od 
 $mail->addAddress($email);

 $mail->isHTML(true); // Format: HTML
 $mail->Subject = $temat;
 $mail->Body = $tresc;
 $mail->AltBody = 'By wyświetlić wiadomość należy skorzystać z czytnika obsługującego wiadomości w formie HTML';

 $mail->send();
 // Gdy OK:");
 
 
 
    
}


?>
