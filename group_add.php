<?php
include_once './session.php';
    is_admin();
    include_once './header.php';
    
?>

<h1>Dodaj skupino</h1>

<form action="group_insert.php" method="post">
    <label id="title">Naziv</label>
    <input type="text" name="title" /><br />
    <label id="description">Opis</label>
    <textarea name="description" rows="7"></textarea><br />
    <input type="submit" value="Potrdi" />
    <input type="reset" value="Prekliči"/>
</form>

<?php
    include_once './footer.php';
?>