<?php
    include_once './database.php';
    include_once './session.php';
    
    $user_id = $_SESSION['user_id'];
    
    //sprejmemo parameter
    $task_id = (int) $_GET['task_id'];
    
    //pripravimo stavek
    $query = "DELETE FROM tasks WHERE id = $task_id "
            . "AND user_id = $user_id";
    //izvedemo stavek nad bazo
    mysqli_query($link, $query);

    //preusmerimo uporabnika
    header("Location: tasks.php");
?>