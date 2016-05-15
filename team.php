<?php
    include_once './header.php';
    include_once './database.php';
    
    
    $team_id = (int) $_GET['team_id'];
        
    $query = "SELECT * FROM teams WHERE id = $team_id";
    $result = mysqli_query($link, $query);
    $team = mysqli_fetch_array($result);
    
    echo '<h2>'.$team['title'].'</h2>';
    echo '<p>'.$team['description'].'</p>';
    
    echo '<a href="team_edit.php?team_id='.$team_id.'" >Uredi</a>';
    echo ' <a href="team_delete.php?team_id='.$team_id.'" onclick="return confirm(\'Prepričani?\')">Briši</a>';
    
?>            


<?php
    include_once './footer.php';
?>