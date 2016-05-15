<?php
    include_once './session.php';
    is_admin();
    
    include_once './header.php';
    include_once './database.php';
    
    
    $group_id = $_GET['group_id'];
    
    $e = $_GET['e'];
    $ime = $_GET['ime'];
    
    $query = "SELECT * FROM groups WHERE id = $group_id";
    $result = mysqli_query($link, $query);
    $group = mysqli_fetch_array($result);
    
    echo '<h2>'.$group['title'].'</h2>';
    echo '<p>'.$group['description'].'</p>';
    
    echo '<a href="group_edit.php?group_id='.$group_id.'" >Uredi</a>';
    echo ' <a href="group_delete.php?group_id='.$group_id.'" onclick="return confirm(\'Prepričani?\')">Briši</a>';
    
    echo '<br />';
    echo $e;
    echo '<br />';
    echo $ime;
?>            


<?php
    include_once './footer.php';
?>