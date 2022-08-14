<?php 

require_once("../con.php");

$login = $_POST["login"];

$q_imie = "SELECT `imie` FROM `Ouser` WHERE `nick` = '".$login."'";

$b_imie = mysqli_query($con,$q_imie);

$imie = mysqli_fetch_assoc($b_imie);


echo $imie["imie"];


?>