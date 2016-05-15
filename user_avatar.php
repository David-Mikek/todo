<?php
include_once './database.php';
include_once './session.php';

$user_id = $_SESSION['user_id'];
$timestamp = date('YmdHisu');
//ustvarimo naključno ime zato, da naložena datoteka
//Nikoli ne prepiše, kakšne obstoječe datoteke
$random_name = $user_id.'-'.$timestamp.'-';
$target_dir = "uploads/avatars/";
$target_file = $target_dir .$random_name. basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 1500000) {
    //echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 1) {
// if everything is ok, try to upload file
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //zapiši v bazo
        $query ="UPDATE users SET avatar='$target_file' WHERE id = $user_id";
        mysqli_query($link, $query);
        //spremenim v seji sliko za uporabnika
        $_SESSION['avatar'] = $target_file;
        
        $_SESSION['msg'] = 'Uspešno ste naložili sliko';
        $_SESSION['type'] = 'success';
        header("Location: profile.php");
    } else {
        //sporoči napako
    }
}
?>