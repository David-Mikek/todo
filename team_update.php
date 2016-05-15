<?php
    include_once './database.php';
    include_once './session.php';
    //sprejmemeo podatke
    $title = $_POST['title'];
    $description = $_POST['description'];
    $id = (int) $_POST['id'];    
    //pripravim sql stavek
    $query = sprintf("UPDATE teams SET title='%s',"
            . "                 description='%s'"
            . " WHERE id = $id",
            mysqli_real_escape_string($link,$title),
            mysqli_real_escape_string($link,$description));
    //pošljemo podatke v bazo
    mysqli_query($link, $query);    
    $_SESSION['msg'] = 'Posodobili ste uspešno.';
    $_SESSION['type'] = 'success';    
    //preusmerimo uporabnika
    header("Location: team.php?team_id=$id");
?>