<?php
    include_once './session.php';
    include_once './database.php';
    
    $user_id = $_SESSION['user_id'];
    
    $current = $_POST['current'];
    $new1 = $_POST['new1'];
    $new2 = $_POST['new2'];
    
    $current = code_password($current);
    
    //preverimo ali je dal pravo geslo
    $query = "SELECT * FROM users WHERE id = $user_id AND pass = '$current'";
    $result = mysqli_query($link, $query);
    //echo $query;
    
    if (mysqli_num_rows($result) == 1) {
        //vse je ok, preverimo če se nova gesla ujemajo in imajo vrednost 
        if ($new1 == $new2 && !empty($new1)) {
            //gesli se ujemata, vse je ok
            $pass = code_password($new1);
            $query = "UPDATE users SET pass = '$pass' "
                    . "WHERE id = $user_id";
            mysqli_query($link, $query);
            //uporabnika odjavimo
            header("Location: logout.php"); die();
        }
        else {
            //napaka, gesli se ne ujemata ali pa sta prazni
            $_SESSION['msg'] = 'Gesli se ne ujemata.';
            $_SESSION['type'] = 'error';
        }
    }
    else {
        //napaka v trenutnem geslu
        $_SESSION['msg'] = 'Napačno obsoječe geslo.';
        $_SESSION['type'] = 'error';
        
    }
    //preusmeritev ob napakah
    header("Location: profile.php");
?>