<?php


require_once('con.php');

$w = "SELECT * FROM `emaile_firmy1`";
$b = mysqli_query($con,$w);

while($row = mysqli_fetch_assoc($b)){

echo $row["gdzie"]."<br>";

}

?>
