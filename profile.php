<?php
include_once './header.php';
?>

<h2>Spremeni geslo</h2>
<form action="user_password.php" method="post">
    <label>Trenutno geslo</label>
    <input type="password" name="current" />
    <label>Novo geslo</label>
    <input type="password" name="new1" />
    <label>Ponovi geslo</label>
    <input type="password" name="new2" />
    <input type="submit" name="submit" value="Spremeni" />
</form>

<h2>Spremeni sliko</h2>
<form action="user_avatar.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" />
    <input type="submit" name="submit" value="Naloži" />
</form>

<?php
include_once './footer.php';
?>