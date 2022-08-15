<?php

use PHPmailer\PHPMailer\PHPMailer;
use PHPmailer\PHPMailer\Exception;




if(isset($_POST["emailwszyscy"])){
    


require_once("con.php");

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
    
    $q_pobierzemaile = "SELECT `email` FROM `Ouser`";
    
    $b_pobierzemaile = mysqli_query($con,$q_pobierzemaile);
    
    
    while($row = mysqli_fetch_assoc($b_pobierzemaile)){
        
       
        
    $email = $row["email"];

if(strpos($email,".pl") == true OR strpos($email,".com") == true OR strpos($email,".org") == true OR strpos($email,".net") ==true OR strpos($email,".eu") == true){
  

$tresc = "<div style='width:80%;text-align:center;margin:0 auto;background-color: rgba(89, 131, 252, 1)background-color: rgba(205, 216, 246, 1);
background-image: linear-gradient(179deg, rgba(205, 216, 246, 1) 0%, rgba(94, 111, 155, 1) 78%);padding:5%;color:#393B37;border-radius:100px;box-shadow: rgba(100, 100, 111, 0.6) 0px 3em 7em 0px;'>

<p>Witaj Chcieliśmy poinformować, że <b>rozszeżyliśmy działalność naszej aplikacji </b>o możliwość oferowania ogłoszeń dojazdów do wszystkich zakładów pracy w Nachodzie.
Od teraz jest oddzielny spersonalizowany dział poświęcony tylko i wyłącznie Nachodowi.</p>

<p>Zmiana miejsca pracy i ogłoszeń do niego należących jest banalna. 
Możesz je wybrać przy zakładaniu nowego konta, w edycji profilu lub w każdej chwili w górnym menu. </p><br>

<img style='width:50%' src='https://edojazdy.pl/images/search.png'>

<p><b>Szukanie</b> ogłoszenia zajmuje dosłownie kilka sekund wystarczy podać parametry które Cię interesują takie jak dni na które szukasz transportu, firmę, zmianę i ilość miejsc. Po tym zostaną wyświetlone wyłącznie te wyniki, których szukasz. Możesz napisać lub zadzwonić do osoby która dodała ogłoszenie i jechać razem już jutro i tyle :) </p><br>


<img style='width:50%' src='https://edojazdy.pl/images/plus.png'>

<p><b>Dodanie</b> ogłoszenia w Nachodzie przebiegnie równie sprawnie jak w przypadku Skody. Wystarczy podać dni w które szukasz pasażera, firmę , zmianę i trasę, która jedziesz.</p>

<p>Ogłoszenie to wyświetli się na samej górze tablicy z ogłoszeniami maksymalizując to, że ktoś się do Ciebie odezwie (w wbudowanym czacie lub zadzwoni jeśli podałeś numer telefonu)</p> 

<p>Możesz później do woli edytować ogłoszenie zmieniając poszczególne parametry (po edycji pojawi się u góry tablicy jako najnowsze) 
Możesz je usunąć. W tedy zostanie ono dodane do Twojego archiwum ogłoszeń i możesz w każdej chwili dodać je s powrotem gdy będziesz dodawał ogłoszenie o podobnych parametrach do tego, które usunąłeś. W takim przypadku dodasz ogłoszenie jeszcze szybciej</p>

<p><b>Grąco zachęcamy do podawania sugestii dotyczących innych miejsc pracy do których chcecie abyśmy poświęcili cały dział :) </b></p>

Życzymy miłego dnia 
zespół <i>edojazdy.pl</i>



<br><br>

<img style='width:100%' src='https://edojazdy.pl/images/logo.png'>
</div>";


$temat = "eDojazdy.pl - Dodaliśmy dojazdy do Nachodu";

$mail = new PHPMailer(true);

 $mail = new PHPMailer(true);

 $mail->isSMTP(); // Używamy SMT
 $mail->Host = 'websmtp.simply.com';
 $mail->SMTPAuth = true; // Autoryzacja (do) SMTP
 $mail->Username = 'aktualizacja@edojazdy.pl';
 $mail->Password = "faberest1A"; // Hasło
 $mail->SMTPSecure = 'tls'; // Typ szyfrowania (TLS/SSL)
 $mail->Port = 587; // Port

 $mail->CharSet = "UTF-8";
 $mail->setLanguage('pl', 'phpmailer/language');


 $mail->setFrom('aktualizacja@edojazdy.pl',"eDojazdy.pl Aktualizacja");//od 
 $mail->addAddress($email);

 $mail->isHTML(true); // Format: HTML
 $mail->Subject = $temat;
 $mail->Body = $tresc;
 $mail->AltBody = 'By wyświetlić wiadomość należy skorzystać z czytnika obsługującego wiadomości w formie HTML';

 $mail->send();
 // Gdy OK:");
 
 
 
    
        
        
        
        
    echo $row["email"]." ok<br>";
    
}else{
    
     echo $row["email"]." nie<br>";
    
    
}
    
}


}

?>

<form method="post" action="">
    
    <textarea rows="4" name="emailwszyscy" cols="50">
        
    </textarea>
    
    <input type="submit">
    
    
</form>



Nie możesz znaleźć dojazdu do swojej pracy? v znajdź go na <i>edojazdy.pl</i> już teraz! 