<?php
    //povezava na bazo
    $username = 'root';
    $password = '';
    $server = 'localhost';
    $database = 'todo';
    //povezava na podatkovno bazo
    $link = mysqli_connect($server, $username, $password, $database);
    //php, mysql, utf-8 driver problems
    mysqli_query($link, "SET NAMES 'utf8'");
    
    //soljenje gesla
    $salt = "0g8hurewhitugh3489";    
    
    function code_password($pass) {
        $salt = "0g8hurewhitugh3489";
        $pass = $salt.$pass;
        $pass = sha1($pass);
        return $pass;
    }
    
?>