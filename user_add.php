<?php
    include_once './header.php';
?>

<h1>Registracija</h1>

<form action="user_insert.php" method="post" onsubmit="">
    <label for="first_name">Ime</label>
    <input type="text" name="first_name" required="required" />
    <label for="last_name">Priimek</label>
    <input type="text" name="last_name" required="required" />
    <label for="email">E-pošta</label>
    <input type="email" name="email" required="required"/>
    <label for="pass1">Geslo</label>
    <input type="password" name="pass1" id="pass1" required="required"/>
    <label for="pass2">Geslo drugič</label>
    <input type="password" name="pass2" id="pass2" required="required" onkeyup="checkPass();"/>
    <div id="passwordMsg"></div>
    <input type="submit" value="Potrdi" />
    <input type="reset" value="Prekliči" />
</form>
<script type="text/javascript">
function checkPass() {
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('passwordMsg');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}   
</script>

<?php
    include_once './footer.php';
?>