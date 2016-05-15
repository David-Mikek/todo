<?php
    include_once './header.php';
    include_once './database.php';
?>
<h1>TESTIRAM</h1>

<?php

    echo $_SESSION['first_name'].'<br />';

    $query = "SELECT * FROM users";
    //pošljemo sql stavek v bazo in rezultat se shrani v $result
    $result = mysqli_query($link, $query);
    
    while ($row = mysqli_fetch_array($result)) {
        echo $row['id'].' - '.$row['first_name'].' - '.$row['last_name'];        
        echo '<br />';
    }
    
    $g = 'sakjdbasr23496hsdfg';
    echo sha1($g);
    
?>



<?php
    include_once './footer.php';
?>        