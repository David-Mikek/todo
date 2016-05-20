<?php
    include_once './header.php';
    include_once './database.php';
    
    $user_id = $_SESSION['user_id'];
    
    
?>
<hr />
<h3>Zgodovina</h3>

<?php
    $query="SELECT * "
            . "FROM history h INNER JOIN "
            . "tasks t ON t.id=h.task_id "
            . "WHERE h.task_id=t.id";
    
    $result = mysqli_query($link, $query);

    /*if(isset($_SESSION['state']))
    {
        echo $_SESSION['state'];
    }*/
    
    echo '<ol>';
    while ($row = mysqli_fetch_array($result)) 
    {
        echo '<li>';
        echo $row['state'];
        echo '<br>';
        echo $row['task_id'];
        echo '</li>';
    }
    echo '</ol>';
    //echo '<a href="task.php?task_id=$id"> Nazaj </a>';
    include_once './footer.php';
?>
