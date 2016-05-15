<?php
include_once './database.php';
include_once './session.php';

$task_id = (int) $_POST['task_id'];
$title = $_POST['title'];

$user_id = $_SESSION['user_id'];
$timestamp = date('YmdHisu');
//ustvarimo naključno ime zato, da naložena datoteka
//Nikoli ne prepiše, kakšne obstoječe datoteke
$random_name = $user_id.'-'.$timestamp.'-';

$target_dir = "uploads/";
//pregleda le ime datoteke in jo nastavi, kam naj bi jo prestavilo
$target_file = $target_dir . $random_name . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

// Check file size 15MB
if ($_FILES["fileToUpload"]["size"] > 1500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 1) {
// if everything is ok, try to upload file
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //zapiši v bazo
        $query = sprintf("INSERT INTO files (title,url,task_id) "
                . " VALUES ('%s','$target_file',$task_id)",
                mysqli_real_escape_string($link,$title));
        mysqli_query($link, $query);
        
        header("Location: task.php?task_id=$task_id");
    } else {
        //sporoči napako
    }
}
?> 