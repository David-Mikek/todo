<?php
    session_start();
    //include_once './database.php';
    //preveri, če je uporabnik logiran
    if (!isset($_SESSION['user_id']) &&
            ($_SERVER['REQUEST_URI'] != '/todo/login.php')
     && ($_SERVER['REQUEST_URI'] != '/todo/user_add.php')
     && ($_SERVER['REQUEST_URI'] != '/todo/login_check.php')) {
        //preusmeri ga na login
        header("Location: login.php");
        die();
    }
    
    //funkcija, ki preveri ali je uporabnik admin
    function is_admin() {
        //$user_id = $_SESSION['user_id'];
        if ($_SESSION['admin'] == 0) {
            $_SESSION['msg'] = 'Prepovedano območje, nisi admin!';
            $_SESSION['type'] = 'error';
            header("Location: index.php");
            die();
        }
    }
    
    /*function is_admin() {
        $user_id = $_SESSION['user_id'];
        //
        $query = "SELECT admin FROM users WHERE id = $user_id";
        $result = mysqli_query($link, $query);
        $user = mysqli_fetch_array($result);
        if ($user['admin'] == 1) {
            $_SESSION['msg'] = 'Prepovedano območje, nisi admin!';
            $_SESSION['type'] = 'error';
            header("Location: index.php");
            die();
        }
    }*/
?>