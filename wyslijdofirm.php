<?php

use PHPmailer\PHPMailer\PHPMailer;
use PHPmailer\PHPMailer\Exception;

//78


if(isset($_GET["wyslij"])){
    

require_once("con.php");

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
    
 mysqli_query($con,"SET NAMES 'utf8'");
    
$q_daj_email = "SELECT `email` FROM `emaile_firmy1` WHERE `status` IS NULL AND `wyslano` = 'NIE' LIMIT 1";

//mysqli_query($con,"SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_connection = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");

$b_daj_email = mysqli_query($con,$q_daj_email);

$row = mysqli_fetch_assoc($b_daj_email);
    
if($row['email'] != ""){


$tresc = "<div style='width:90%;padding:6%;text-align:center;'>
    
    <h2>Propozycja Współpracy</h2>
    
<p>Witam, nazywam się Mateusz Bartków i reprezentuję platformę internetową https://edojazdy.pl, która daje możliwość oferowania ogłoszeń dojazdów do pracy i tym samym możliwość wspólnej jazdy, w czym pomaga osobom jeżdżącym razem zaoszczędzić pieniądze oraz pomaga osobą, które nie mają możliwości dojazdu do pracy na własną rękę.</p>
<p>
Aktualnie korzystają z niej pracownicy wielu firm dzięki owocnej współpracy z pracodawcami.</p>



</br>
<p>
Jako że rozszerzamy ofertę, chcemy zaproponować wam niezobowiązującą współpracę.
My stworzymy indywidualną wydzieloną część jako profil waszej firmy w naszej aplikacji, dzięki czemu wasi pracownicy będą mogli za darmo i bez limitów wystawiać oferty dojazdy do pracy, a w zamian wy wydrukujecie ulotkę z załącznika i położycie na stołach w jadalni, przywiesicie na tablicy informacyjnej lub przekażecie pracownikom.
<p>



<p>Nie podpisujemy żadnej umowy, nie chcemy żadnych pieniędzy. Wystarczy zgoda na dodanie waszej firmy do platformy edojazdy oraz deklaracja że poinformujecie swoich pracowników że mogą znaleźć oraz oferować dojazd pracowniczy do waszej firmy u nas. Możecie po prostu wywiesić ulotkę czy napisać post na waszej stronie internetowej. Nie wymagamy dowodu że to zrobicie, uwieżymy na słowo :) </p>
    </br>
    
    <p>Jeśli chcecie możemy stworzyć dla was własną, indywidualną sekcje tylko dla pracowników waszej firmy. Polega ona na tym, że pracownicy innych firm nie będą mogli zamieszczać tam ogłoszeń, polecam wam tą opcję ponieważ będzie także możliwość zamieszczania aktualizacji na temat firm i ogłoszeń przez pracodawcę oraz pracowników, więc lepiej mieć osobna sekcję aby te informacje nie były wymieszane z innymi firmami z którymi bylibyście w sekcji. Indywidualna sekcja będzie udostępniona oczywiście za darmo i na dokładnie tych samych warunkach.    Nie podpisujemy żadnej umowy, nie chcemy żadnych pieniędzy. Wystarczy zgoda na dodanie waszej firmy do platformy edojazdy oraz deklaracja że poinformujecie swoich pracowników że mogą znaleźć oraz oferować dojazd pracowniczy do waszej firmy u nas. </p>

<h3>Co zyska wasza firma?</h3>


<ul style='text-align:left'>
<li>
Oszczędzicie na liczbie miejsc parkingowych, ponieważ wiele osób będzie jeździło mniejszą liczbą samochodów,
</li><br>
<li>
Przyczynicie się do mniejszego zużycia CO2 i tym samym do ekologii środowiska,
</li><br>
<li>
Będziecie mieli pewność, że pracownik będzie miał, zawsze jak dostać się do pracy na czas nawet w wyjątkowych sytuacjach.
</li>
</ul><br>
    
<p>
Platforma edojazdy.pl zdobyła I miejsce w kategorii ekologia w konkursie organizowanym przez <i>Droplo</i>, którego partnerami są m.in.<i> Prezydent miasta Wałbrzych,</i> czy <i>patronat honorowy marszałka województwa dolnośląskiego.</i>
</p>

<p>
Edojazdy nie pobierają żadnych opłat za korzystanie z aplikacji ani nie zarabia na reklamach, jesteśmy organizacją non-profit.
</p>

<p>Tylko w tym roku podjęliśmy wspópracę z  m.in. następującymi firmami :</p>

<ul>
<li>Yagi Poland Factory Sp. z.o.o. (YPF) - Żarów - Wałbrzyska specialna strefa ekonomiczna</li>

<li>PRESS GLASS - Radomsko - Łudzka SSE </li>

<li>Hengst Filtration Poland Sp. z o.o. - Gogolin - Katowicka SSE </li>

<li>TVG sp. z o.o. - Gubin - Kostrzyńsko-Słubicka SSE</li>

<li>Poland Tokai Okaya Manufacturing Sp. z o.o. (PTOM) - Ostaszewo - Pomorska SSE</li>
<li>i inne..</li>
</ul>


<small><p>W załączniku przesyłam ulotkę, którą można przekazać pracownikom w sposób wymieniony wyżej oraz kilka zdjęć pokazujących, na czym polega platforma.</p><br></small><br>

<p>W razie pytań proszę pisać na mojego prywatnego emaila mtszbrtw@gmail.com lub odpisać na tę wiadomość.</p>

<b style='text-align:right'><p>
Proszę o rozważenie mojej propozycji.</p>
<p>Mateusz Bartków.</p></b>


</div>";

$temat = "Ekologiczny dojazd do waszej firmy";

$mail = new PHPMailer(true);

 $mail = new PHPMailer(true);

 $mail->isSMTP(); // Używamy SMT
 $mail->Host = 'smtp.freshmail.com';
 $mail->SMTPAuth = true; // Autoryzacja (do) SMTP
 $mail->Username = 'smtp@freshmail.com';
 $mail->Password = "MawOzX.qqMav4AnwkHzJvL3oq4DI0OwNeO7ybTMZ7X"; // Hasło
 $mail->SMTPSecure = 'tls'; // Typ szyfrowania (TLS/SSL)
 $mail->Port = 587; // Port

 $mail->CharSet = "UTF-8";
 $mail->setLanguage('pl', 'phpmailer/language');


 $mail->setFrom('kontakt@edojazdy.pl',$temat." - platforma eDojazdy.pl");//od 
 $mail->addAddress($row['email']);

 $mail->isHTML(true); // Format: HTML
 $mail->Subject = $temat;
 $mail->Body = $tresc;
 $mail->AltBody = 'By wyświetlić wiadomość należy skorzystać z czytnika obsługującego wiadomości w formie HTML';
 
 //Załączniki !!! 

$file_to_attach = 'images/screen-komp-1.PNG';
$mail->AddAttachment($file_to_attach , 'screen-komp-1.PNG');

$file_to_attach = 'images/screen-komp-1.PNG';
$mail->AddAttachment($file_to_attach , 'screen-komp-1.PNG');

$file_to_attach = 'images/ulotka-plakat.pdf';
$mail->AddAttachment($file_to_attach , 'ulotka-plakat.pdf');

$file_to_attach = 'images/ekran_apk1.jpg';
$mail->AddAttachment($file_to_attach , 'ekran_apk1.jpg');

 $mail->send();
 // Gdy OK:");
 
    
 
 //tutaj dodac tego emaila do bazy a na poczatku sprawdzac czy nie zostalo juz do niego wylane a kesli wyslane to go pominie i wyswitli ze jiz byl 
    
        
     $q_edytuj_email = "UPDATE `emaile_firmy1` SET `wyslano` = '1' WHERE `email` = '".$row["email"]."'";
        
        $b_edytuj_email = mysqli_query($con,$q_edytuj_email);
        
        if($b_edytuj_email){
        
         echo json_encode($row["email"]);
    
        }else{
            
            echo json_encode('nie');
            
        }

    }else{
    echo json_encode("wszystkie");
}



}

?>
