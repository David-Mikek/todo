<?php
    include_once './database.php';
    include_once './session.php';
    
    //sprejmem podatke z vnosnega obrzca
    $team_id = (int) $_POST['team_id']; 
    $group_id = (int) $_POST['group_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = (int) $_POST['priority'];
    $deadline = $_POST['deadline'];
    
    $user_id = $_SESSION['user_id'];
    
    if ((!empty($title))&&(!empty($group_id))&&(!empty($priority))){
                
        $query = sprintf("INSERT INTO tasks (title,description,deadline,"
                . "priority,group_id,user_id,team_id) "
                . " VALUES ('%s','%s','%s',$priority,$group_id,$user_id,$team_id)",
                mysqli_real_escape_string($link,$title),
                mysqli_real_escape_string($link,$description),
                mysqli_real_escape_string($link,$deadline));
        //echo $query; die();
        
        mysqli_query($link, $query);
        
        header("Location:tasks.php");
    }

?>