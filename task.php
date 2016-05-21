<?php
    include_once './header.php';
    include_once './database.php';
    
    $user_id = $_SESSION['user_id'];
    
    $task_id = (int) $_GET['task_id'];
    
    $query = "SELECT t.*, g.title AS gtitle "
            . "FROM tasks t INNER JOIN groups g "
            . "ON g.id = t.group_id "
            . "WHERE t.id = $task_id "
            . "AND t.user_id = $user_id ";
    $result = mysqli_query($link, $query);
    $task = mysqli_fetch_array($result);
    
    echo '<h2>'.$task['title'].'</h2>';
    echo '<i>'.date('d. m. Y',strtotime($task['deadline'])).'</i>';
    echo '<h4>'.$task['gtitle'].'</h4>';
    echo '<h2>'.$task['priority'].'</h2>';
    echo '<p>'.$task['description'].'</p>';
    /*echo 'Naloga: ';
    if(isset($_SESSION['state']))
    {
        echo $_SESSION['state'];
        echo '<br>';
        echo '<br>';
    }*/
    
    if (($task['date_end'] == '0000-00-00 00:00:00')) {
        echo '<a href="task_done.php?task_id='.$task_id.'" >Opravil </a>';
    }
    else {
        echo '<a href="task_activate.php?task_id='.$task_id.'" >Aktiviraj </a>';
    }
    echo '<a href="task_edit.php?task_id='.$task_id.'" > Uredi </a>';
    echo ' <a href="task_delete.php?task_id='.$task_id.'" onclick="return confirm(\'Prepričani?\')"> Briši </a>';
    //echo '<a href="state.php?task_id='.$task_id.'" > Stanje </a>'; //
    
?>
<br>
<br>
<form action="state_history.php" method="post">
    <input type="hidden" name="task_id" value="<?php echo "$task_id";?>">
    <input type="submit" value="Zgodovina stanj naloge" />
</form>
<!--<a href="state_history.php"> Zgodovina stanj naloge</a>
<br>-->
<hr />
<h3>Datoteke</h3>
<form action="file_upload.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="task_id" value="<?php echo $task_id; ?>"/>
    <label>Ime datoteke</label>
    <input type="text" name="title" />
    <input type="file" name="fileToUpload" />
    <input type="submit" name="submit" value="Naloži" />
</form>



<?php 
    $query = "SELECT * FROM files WHERE task_id = $task_id";
    $result = mysqli_query($link, $query);
    echo '<ol>';
    while ($row = mysqli_fetch_array($result)) {
        echo '<li>';
        echo '<a href="'.$row['url'].'">'.$row['title'].'</a>';
        echo ' (<a href="file_delete.php?id='.$row['id'].'">Briši</a>)';
        echo '</li>';
    }
    echo '</ol>';
    include_once './footer.php';
?>