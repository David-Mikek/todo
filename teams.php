<?php   
    include_once './header.php';
    include_once './database.php';
    
    $query = "SELECT * FROM teams";
    $result = mysqli_query($link, $query);
    
    echo '<a href="team_add.php">Dodaj ekipo</a>';
    
    echo '<table border="1" cellspacing="0" cellpadding="0">';
    echo '<tr>'
            . '<th>ID</th>'
            . '<th>Naziv</th>'
            . '<th>Akcije</th>'
       . '</tr>';
    while ($row = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td>'.$row['id'].'</td>';
        echo '<td>'.$row['title'].'</td>';
        echo '<td>'
                . '<a href="team.php?team_id='.$row['id'].'">Podrobno</a>'
             . '</td>';
        echo '</tr>';
    }
    echo '</table>';
?>

<?php   
    include_once './footer.php';
?>