<?php
include_once './session.php';
    is_admin();
    include_once './header.php';
    include_once './database.php';
    //sprejmem parameter, katero skupino urejam
    $group_id = $_GET['group_id'];
    //iz baze preberem vse podatke o tej skupini
    $query = "SELECT * FROM groups WHERE id=$group_id";
    $result = mysqli_query($link, $query);
    $group = mysqli_fetch_array($result);    
?>

<h1>Uredi skupino</h1>

<form action="group_update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $group_id;?>" />
    <label id="title">Naziv</label>
    <input type="text" name="title" value="<?php echo $group['title'];?>" /><br />
    <label id="description">Opis</label>
    <textarea name="description" rows="7"><?php echo $group['description'];?></textarea><br />
    <input type="submit" value="Potrdi" />
    <input type="reset" value="Prekliči"/>
</form>

<?php
    include_once './footer.php';
?>