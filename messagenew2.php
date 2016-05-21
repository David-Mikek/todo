<?php
include_once 'session.php';

$ime = $_POST['mime'];
$pime = $_POST['mpime'];
$naslov = $_POST['mnaslov'];
$sporocilo = $_POST['msporocilo'];


$preid="SELECT id FROM users WHERE (()AND())";

$posid = $_SESSION['user_id'];
$spo = "INSERT INTO messages (idsend) VALUES ".$posid."";
mysqli_query($link, $pos);
