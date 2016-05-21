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
    
    //$date_add = date("Y-m-d");
    
    //echo $date_add;
    
    if ((!empty($title))&&(!empty($group_id))&&(!empty($priority))){
                
        $query = sprintf("INSERT INTO tasks (title,description,deadline,"
                . "priority,group_id,user_id,team_id) "
                . " VALUES ('%s','%s','%s',$priority,$group_id,$user_id,$team_id)",
                mysqli_real_escape_string($link,$title),
                mysqli_real_escape_string($link,$description),
                mysqli_real_escape_string($link,$deadline));
        
        //echo $query; die();
        
        mysqli_query($link, $query);
        
        /*$date_z=date("Y-m-d");
        
        $query_task_id="SELECT tasks.id AS memTotal "
                . "FROM tasks "
                . "WHERE tasks.date_add=$date_add;";
        
        $task_id=mysqli_query($link, $query_task_id);
        
        echo $task_id->fetch_object()->memTotal;
        
        $query2 = "INSERT INTO `history` (`id`, `state`, `task_id`, `date_z`) "
            . "VALUES (NULL,'V čakanju','".$task_id."','".$date_z."');";
        
        mysqli_query($link, $query2);*/
        
        header("Location:tasks.php");
    }

?>