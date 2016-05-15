<?php
    include_once './header.php';
    include_once './database.php';
    //sprejmem parameter, katero skupino urejam
    $team_id = (int) $_GET['team_id'];
    //iz baze preberem vse podatke o tej skupini
    $query = "SELECT * FROM teams WHERE id=$team_id";
    $result = mysqli_query($link, $query);
    $team = mysqli_fetch_array($result);    
?>

<h1>Uredi ekipo</h1>

<form action="team_update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $team_id;?>" />
    <label id="title">Naziv</label>
    <input type="text" name="title" value="<?php echo $team['title'];?>" /><br />
    <label id="description">Opis</label>
    <textarea name="description" rows="7"><?php echo $team['description'];?></textarea><br />
    <input type="submit" value="Potrdi" />
    <input type="reset" value="Prekliči"/>
</form>

<?php
    include_once './footer.php';
?>