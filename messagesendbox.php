<?php
include_once 'session.php';
include_once 'database.php';
include_once './header.php';

$id= $_SESSION['user_id'];
$prej = "se ne ve";

$sporocila = "SELECT * FROM messages WHERE (idsend = '".$id."')";
$list = mysqli_query($link, $sporocila);
echo"<table border = '1'><tr><th>Naslov sporočila</th><th>Prejemnik</th><th>Odpri</th></tr>";
while ($row = mysqli_fetch_array($list)) {
    $posiljatelj= "SELECT first_name,last_name FROM users WHERE id = '".$row['idget']."' ";
    $pre = mysqli_query($link, $posiljatelj);
    while($row2 = mysqli_fetch_array($pre))
    {
        $prej="$row2[first_name]  $row2[last_name]";
    }
    echo "<tr><td>".$row['title']."</td><td>".$prej.'</td><td><a href ="messageread.php?ids='.$row[0].'">Poglej</a></td></tr>';
    
}
echo "</table>";
echo "<a href = 'profile.php'>Nazaj</a>";
include_once './footer.php';