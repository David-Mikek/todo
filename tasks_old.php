<?php   
    include_once './header.php';
    include_once './database.php';
    
    $user_id = $_SESSION['user_id'];
    
    $query = "SELECT t.*, g.title AS gtitle "
            . "FROM tasks t INNER JOIN groups g "
            . "ON g.id = t.group_id "
            . "WHERE t.date_end = '0000-00-00 00:00:00' "
            . "AND t.user_id = $user_id "
            . "ORDER BY t.deadline ASC";
    $result = mysqli_query($link, $query);
    
    echo '<a href="task_add.php">Dodaj opravilo</a>';
    
    echo '<br />';
    echo '<h1>Aktivni</h1>';
    echo '<table border="1" cellspacing="0" cellpadding="0">';
    echo '<tr>'
            . '<th>Ime</th>'
            . '<th>Skupina</th>'
            . '<th>Prioriteta</th>'
            . '<th>Deadline</th>'
       . '</tr>';
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td><a href="task.php?task_id='.$row['id'].'">'.$row['title'].'</a></td>';
        echo '<td>'.$row['gtitle'].'</td>';
        echo '<td>'.$row['priority'].'</td>';
        echo '<td>'.date('d.m.Y',strtotime($row['deadline'])).'</td>';       
        echo '</tr>';
    }
    echo '</table>';
    
    $query = "SELECT t.*, g.title AS gtitle "
            . "FROM tasks t INNER JOIN groups g "
            . "ON g.id = t.group_id "
            . "WHERE t.date_end != '0000-00-00 00:00:00' "
            . "AND t.user_id = $user_id "
            . "ORDER BY t.deadline ASC";
    $result = mysqli_query($link, $query);
    
    echo '<h3>Namig</h3>';
    echo '<pre>WHERE t.date_end = \'0000-00-00 00:00:00\'</pre>';
    
    echo '<br />';
    echo '<h1>Opravljeni</h1>';
    echo '<table border="1" cellspacing="0" cellpadding="0">';
    echo '<tr>'
            . '<th>Ime</th>'
            . '<th>Skupina</th>'
            . '<th>Prioriteta</th>'
            . '<th>Deadline</th>'
       . '</tr>';
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td><a href="task.php?task_id='.$row['id'].'">'.$row['title'].'</a></td>';
        echo '<td>'.$row['gtitle'].'</td>';
        echo '<td>'.$row['priority'].'</td>';
        echo '<td>'.date('d.m.Y',strtotime($row['deadline'])).'</td>';       
        echo '</tr>';
    }
    echo '</table>';
?>

<?php   
    include_once './footer.php';
?>