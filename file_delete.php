<?php
    include_once './database.php';
    include_once './session.php';
    
    $id = (int) $_GET['id'];
    $user_id = $_SESSION['user_id'];
    
    //preverimo, ali ima prijavljeni uporabnik pravico brisanja te slike
    $query = "SELECT t.* FROM tasks t INNER JOIN files f "
            . "ON f.task_id = t.id "
            . "WHERE (f.id=$id) AND (t.user_id=$user_id)";
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) == 1) {
        //vse je ok, lastnik je pravi        
        //zapomnimo si kam ga preusmerit
        $task = mysqli_fetch_array($result);
        $task_id = $task['id'];
        //izbrišemo file
        $query = "DELETE FROM files WHERE id = $id";
        mysqli_query($link, $query);
        
        header("Location: task.php?task_id=$task_id");
    }
?>