<?php
include_once './session.php';
    is_admin();
    include_once './database.php';

    //sprejmemeo podatke
    $title = $_POST['title'];
    $description = $_POST['description'];
    $id = $_POST['id'];
    
    //pripravim sql stavek
    $query = "UPDATE groups SET title='$title',"
            . "                 description='$description'"
            . " WHERE id = $id";
    //pošljemo podatke v bazo
    mysqli_query($link, $query);
    
    //preusmerimo uporabnika
    header("Location: group.php?group_id=$id");
?>