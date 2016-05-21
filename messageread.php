<?php
include_once './header.php';
include_once 'session.php';
include_once 'database.php';
$ids = $_GET['ids'];

$branje ="SELECT title,body FROM messages WHERE id = '".$ids."' ";
$izpis = mysqli_query($link, $branje);
while ($row = mysqli_fetch_array($izpis)) {
    echo $row['title']."<br>". $row['body'];
}

include_once './footer.php';