<?php
include_once 'session.php';
include_once 'database.php';
include_once './header.php';

$id= $_SESSION['user_id'];
$posil = "se ne ve";

$sporocila = "SELECT * FROM messages WHERE (idget = '".$id."')";
$list = mysqli_query($link, $sporocila);
echo"<table border = '1'><tr><th>Naslov</th><th>Pošiljatelj</th><th>Odpri</th></tr>";
while ($row = mysqli_fetch_array($list)) {
    $posiljatelj= "SELECT first_name,last_name FROM users WHERE id = '".$row['idsend']."' ";
    $pos = mysqli_query($link, $posiljatelj);
    while($row2 = mysqli_fetch_array($pos))
    {
        $posil="$row2[first_name]  $row2[last_name]";
    }
    echo "<tr><td>".$row['title']."</td><td>".$posil.'</td><td><a href ="messageread.php?ids='.$row[0].'">Preberi</a></td></tr>';
    
}
echo "</table>";
echo "<a href = 'profile.php'>Nazaj</a>";
include_once './footer.php';