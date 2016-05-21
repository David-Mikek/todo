<?php
include_once 'session.php';
include_once 'database.php';

$ime = $_POST['mime'];
$pime = $_POST['mpime'];
$naslov = $_POST['mnaslov'];
$sporocilo = $_POST['msporocilo'];
$prejemnik = 0;



$preid="SELECT u.id FROM users u WHERE ((u.first_name = '".$ime."')AND(u.last_name = '".$pime."'))";
$idp = mysqli_query($link, $preid);

while ($row = mysqli_fetch_array($idp)) {
    echo "prejemnik je biv izbran";
    $prejemnik = $row['id'];
}
        
$posid = $_SESSION['user_id'];
$spo = "INSERT INTO messages (idsend,idget,title,body) VALUES ('".$posid."','".$prejemnik."','".$naslov."','".$sporocilo."')";
mysqli_query($link, $spo);
 header("location: profile.php");
