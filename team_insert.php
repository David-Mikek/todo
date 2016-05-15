<?php
    include_once './database.php';
    include_once './session.php';

    //sprejmemeo podatke
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    //pripravim sql stavek
    $query = sprintf("INSERT INTO teams (title, description)"
            . " VALUES ('%s','%s')",
            mysqli_real_escape_string($link,$title),
            mysqli_real_escape_string($link,$description));
    //pošljemo podatke v bazo
    mysqli_query($link, $query);
    
    $_SESSION['msg'] = 'Uspešno ste dodali ekipo.';
    $_SESSION['type'] = 'success';
    
    //preusmerimo uporabnika
    header("Location: teams.php");
?>