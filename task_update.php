<?php
    include_once './database.php';
    include_once './session.php';
    
    //sprejmem podatke z vnosnega obrzca
    $id = $_POST['id'];
    $group_id = (int) $_POST['group_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = (int) $_POST['priority'];
    $deadline = $_POST['deadline'];
    
    $user_id = $_SESSION['user_id'];
    
    if ((!empty($title))&&(!empty($group_id))&&(!empty($priority))){
                
        $query = sprintf("UPDATE tasks SET title = '%s', description='%s',"
                . "                      deadline='%s', priority = $priority,"
                . "                     group_id = $group_id "
                . "       WHERE id = $id AND user_id = $user_id",
                mysqli_real_escape_string($link,$title),
                mysqli_real_escape_string($link,$description),
                mysqli_real_escape_string($link,$deadline));
        //echo $query; die();
        
        mysqli_query($link, $query);
        
        header("Location:task.php?task_id=$id");
    }

?>