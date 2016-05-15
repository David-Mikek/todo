<?php
    include_once './session.php';
    
    //uničimo sejo
    session_destroy();
    
    header("Location:index.php");
?>