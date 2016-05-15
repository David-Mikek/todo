<?php
include_once './session.php';
    is_admin();
    include_once './database.php';
    //sprejmemo parameter
    $group_id = $_GET['group_id'];
    //pripravimo stavek
    $query = "DELETE FROM groups WHERE id = $group_id";
    //izvedemo stavek nad bazo
    mysqli_query($link, $query);

    //preusmerimo uporabnika
    header("Location: groups.php");
?>