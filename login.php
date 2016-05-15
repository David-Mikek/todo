<?php
    include_once './header.php';
?>

<h1>Prijava</h1>

<form action="login_check.php" method="post">
    <label id="email">E-pošta</label>
    <input type="email" name="email" />
    <label id="pass">Geslo</label>
    <input type="password" name="pass" />
    <input type="submit" value="Prijavi" />    
</form>


<?php
    include_once './footer.php';
?>