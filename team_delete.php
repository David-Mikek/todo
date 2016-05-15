<?php
    include_once './database.php';
    include_once './session.php';
    //sprejmemo parameter
    $team_id = (int) $_GET['team_id'];
    //pripravimo stavek
    $query = "DELETE FROM teams WHERE id = $team_id";
    //izvedemo stavek nad bazo
    mysqli_query($link, $query);
    $_SESSION['msg'] = 'Izbrisano.';
    $_SESSION['type'] = 'success';
    //preusmerimo uporabnika
    header("Location: teams.php");
?>