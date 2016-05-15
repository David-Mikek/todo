<?php
include_once './session.php';
    is_admin();
    include_once './database.php';

    //sprejmemeo podatke
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    //pripravim sql stavek
    $query = "INSERT INTO groups (title, description)"
            . " VALUES ('$title','$description')";
    //pošljemo podatke v bazo
    mysqli_query($link, $query);
    
    //preusmerimo uporabnika
    header("Location: groups.php");
?>