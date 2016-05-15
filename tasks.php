<?php   
    include_once './header.php';
    include_once './database.php';
    
    $user_id = $_SESSION['user_id'];
    
    $query = "SELECT t.*, g.title AS gtitle "
            . "FROM tasks t INNER JOIN groups g "
            . "ON g.id = t.group_id "
            . "WHERE t.user_id = $user_id "
            . "ORDER BY t.deadline ASC";
    $result = mysqli_query($link, $query);
    
    echo '<a href="task_add.php">Dodaj opravilo</a>';
    echo '<br />';
   
    echo '<div id="opravila">';
    while ($row = mysqli_fetch_array($result)) {
        echo '<div class="opravilo">';
        echo '<a href="task.php?task_id='.$row['id'].'">'.$row['title'].'</a>';
        echo '<div class="grouptype">'.$row['gtitle'].'</div>';
        echo '<div class="priority">'.$row['priority'].'</div>';
        echo '<div class="lastnosti">';
        echo '<div class="datum">'.date('d.m.Y',strtotime($row['deadline'])).'</div>';       
        $query2 = "SELECT * FROM files WHERE task_id=".$row['id'];
        $result2 = mysqli_query($link, $query2);
        if (mysqli_num_rows($result2) > 0) {
            echo '<img src="images/attachment.png" alt="priponka" />';
        }
        echo '<div class="clear"></div>';
        echo '</div>';
        echo '</div>';
    }
    echo '<div class="clear"></div>';
    echo '</div>';
    
    
?>

<?php   
    include_once './footer.php';
?>