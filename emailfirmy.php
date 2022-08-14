<?php

use PHPmailer\PHPMailer\PHPMailer;
use PHPmailer\PHPMailer\Exception;




if(isset($_POST["emailfirmy"])){
    


require_once("con.php");

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
    
  
    


$emaile = ["biuro@maranistrefa.pl", "b.malinowska-skital@jbstalserwis.pl", "biuro@jbstalserwis.pl", "sales@q-bev.com", "q-bev@q-bev.com", "info@cellfast.com.pl", "marcin.maksimek@wobistal.pl", "bagpak@bagpak.pl", "domostal@obrobkaskrawaniem.com", "biuro@rakoczy.pl", "finance@iwamet.com", "sekretariat@iwamet.com", "info@eko-swiat.pl", "mcs@mcsservice.pl", "post@thoni-alutec.pl", "wieslaw.stasiak@ATImetals.com", "firma@metaltecms.eu", "alumetal@alumetal.pl", "biuro@bkglass.pl", "mail@tarkon.pl", "p.kupiec@fenixmetals.com", "info@fenixmetals.com", "sekretariat@piotrowice.pl", "biuro@technomal.pl", "e.samulak@profund.com.pl", "kontakt@profund.com.pl", "biuro@marma.com.pl", "dezamet@dezamet.com.pl", "sekretariat@dezamet.com.pl", "klamal@onet.pl", "almech@almech.com.pl", "info@grupapronicel.pl", "a.szczechowska@jkrzyzanowski.pl", "supron@supron.pl", "info.pmp@tembo.eu", "info@pmp.tembo.eu", "info@kamelsteel.pl", "sekretariat@fabrykabroni.pl", "stalgast@stalgast.com", "biuro@rohrbogen.ch", "techmatik@techmatik.pl", "rekrutacja@trendglass.pl", "office@trendglass.pl", "altha@altha.com.pl", "hartmet@hartmet.pl", "toho@toho.pl", "sprzedaz@tasomix.pl", "soudalmf@soudal.pl", "soudal@soudal.pl", "drewup@drewup.pl", "info@vigo.com.pl", "biuro@start.waw.pl", "danpol@danpol-danielak.com", "adam@polymernet.pl", "office@rymatex.com.pl", "info@nowystylgroup.com", "andrzej.fal@pol-panel.pl", "violetta.kupczak@pol-panel.pl", "info@balticwood.pl", "inprint@inprint.pl", "kessel@kessel.pl", "service@uhlmann.de", "kalmar-pac@post.pl", "biuro@steinblau.pl", "wroclaw@carcoustics.com", "r.nawrocki@neodynamic.pl", "a.powaska@neodynamic.pl", "inquiry@aluwind.com", "ialegre@ialegre.com", "zapytania@pl.linde-gas.com", "SALES@POSCO.COM.PL", "kamila.sobieraj@dongyang.pl", "m.sobkowiak@dongyang.pl", "biuro@dyepm.pl", "rekrutacja@lginnotek.com", "rekrutacja@lgchem.com", "iwona.lassota@fagum.pl", "marbud.spzoo@gmail.com", "info@lukpasz.pl", "ksierociuk@stok-rol.pl", "rekrutacja@arkadruk.com", "mkurelek@mayenne.com.pl", "pzalewski@mayenne.com.pl", "biuro@mayenne.com.pl", "kontakt@harperhygienics.com", "eurosystemprospzoo@gmail.com", "sklep@kawmet.pl", "office@hensfort.pl"];
    
foreach($emaile as $email){
    

$q_sprawdz_mail = "SELECT * FROM `emaile_firmy1` WHERE `email` = '".$email."'";
$b_sprawdz_mail = mysqli_query($con,$q_sprawdz_mail);

if(mysqli_num_rows($b_sprawdz_mail) > 0){
    
    echo $email." email wysłany wczesniej<br> ";
    
}else{
  

        $q_dodaj_email = "INSERT INTO `emaile_firmy1` (`id`,`email`,`data_dodania`,`data_wyslania`,`wyslano`,`gdzie`) VALUES (NULL, '".$email."',NOW(),NULL,'NIE','TSSE')";
        
        $b_dodaj_email = mysqli_query($con,$q_dodaj_email);
        
        if($b_dodaj_email){
        
    echo $email." DODANO<br>";
    
        }else{
            echo $email." NIE DODANO<br>";
        }
}
    
}
}

?>

<form method="post" action="">
    
    
    <input type="submit" name="emailfirmy">
    
    
</form>



Nie możesz znaleźć dojazdu do swojej pracy? v znajdź go na <i>edojazdy.pl</i> już teraz! 