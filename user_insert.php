<?php
    include_once './database.php';
    
    //sprejet podatke z vnosnega obrzca
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $pass1 = $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    
    if (($pass1 == $pass2)&&(!empty($first_name))&& 
        (!empty($last_name))&&(!empty($email))&&(!empty($pass1))){
        
        $pass1 = $salt.$pass1; //dodam geslu "začinbo"
        $pass1 = sha1($pass1); //zakodiram geslo
        
        $query = sprintf("INSERT INTO users (first_name, last_name,email,pass) "
                . " VALUES ('%s','%s','%s','%s')",
                mysqli_real_escape_string($link,$first_name),
                mysqli_real_escape_string($link,$last_name),
                mysqli_real_escape_string($link,$email),
                mysqli_real_escape_string($link,$pass1));
        //echo $query; die();
        
        mysqli_query($link, $query);
        
        header("Location:index.php");
    }

?>