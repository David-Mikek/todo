<?php
    include_once './header.php';
    include_once './database.php';
    
    $user_id = $_SESSION['user_id'];
    $task_id = $_POST["task_id"];
    
    
?>
<hr />
<h3>Naloga je:</h3>

<?php
    $query="SELECT h.state, h.date_z "
            . "FROM history h INNER JOIN "
            . "tasks t ON t.id=h.task_id "
            . "WHERE h.task_id=$task_id";
    
    $result = mysqli_query($link, $query);
    
    /*$query2="SELECT t.date_add "
            . "FROM tasks t "
            . "WHERE t.id=$task_id;";
    
    $date_add = mysqli_query($link, $query2);
    
    echo '<ol>';
        echo '<li>';
        echo '<h4>';
        echo 'V čakanju';
        echo '</h4>';
        //echo $date_add;
        echo '</li>';*/
    while ($row = mysqli_fetch_array($result)) 
    {
        echo '<li>';
        echo '<h4>';
        echo $row['state'];
        echo '</h4>';
        echo '<h5>';
        echo $row['date_z'];
        echo '</h5>';
        echo '<br>';
        //echo $row['task_id'];
        echo '</li>';
    }
    echo '</ol>';
    //echo '<a href="task.php?task_id=$id"> Nazaj </a>';
    include_once './footer.php';
?>
