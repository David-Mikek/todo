
<?php
include_once './header.php';
?>
<h2>Novo sporočilo</h2>
<form method="POST" action="messagenew2.php">
    <label>Prejemnik</label>
    <input type="text" name="mime" value="Ime" required="required"/>
     <input type="text" name="mpime" value="Priimek" required="required" />
<label>Naslov</label>
<input type="text" name="mnaslov" required="required" />
 <label>Telo</label>
 <textarea name = "msporocilo" cols="50" rows="10" required="required"></textarea> 
<input type="submit" value="Pošlji" />  
</form>
<a href = 'profile.php'>Prekliči</a>

<?php
include_once './footer.php';
?>