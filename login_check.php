<?php
    include_once './database.php';
    include_once './session.php';
    
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    //geslo zakodiramo
    $pass = sha1($salt.$pass);
    
    $query = sprintf("SELECT * FROM users WHERE "
            . " (email = '%s') AND (pass = '%s')",
            mysqli_real_escape_string($link,$email),
            mysqli_real_escape_string($link,$pass));
    $result = mysqli_query($link, $query);
    //preverim, kakšen rezultat dobim
    if (mysqli_num_rows($result) == 1) {
        //vse je ok
        $user = mysqli_fetch_array($result);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['admin'] = $user['admin'];
        //v sejo si zapomnim pot do slike od uporabnika
        if (!empty($user['avatar'])) {
            $_SESSION['avatar'] = $user['avatar'];
        }
        else {
            $_SESSION['avatar'] = null;
        }
        //preusmerim na index
        header("Location: index.php");
    }
    else {
        //preusmeri nazaj na login
        header("Location: login.php");
    }
    
?>