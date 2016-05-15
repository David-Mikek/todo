<?php
    include_once './header.php';
    include_once './database.php';
?>

<h1>Dodaj nalogo</h1>

<form action="task_insert.php" method="post">
    <label id="teams">Ekipe</label>
    <fieldset>
    <?php
        $query = "SELECT * FROM teams";
        $result = mysqli_query($link, $query);
        while($row = mysqli_fetch_array($result)) {
            echo '<input type="radio" name="team_id" value="'.$row['id'].'" />'.$row['title'].'<br />';
        }
    ?>
    </fieldset>
    <label id="groups">Skupine</label>
    <select name="group_id">
        <?php
            $query = "SELECT * FROM groups ORDER BY title";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
            }
        ?>
    </select>    
    
    <label id="title">Ime naloge</label>
    <input type="text" name="title" />
    
    <label id="description">Opis</label>
    <textarea name="description" rows="7"></textarea><br />
    
    <label id="deadline">Rok opravila</label>
    <input type="date" name="deadline" />
    
    <label id="priority">Prioriteta</label>
    <select name="priority">
        <?php
            for($i=1;$i<11;$i++) {
                echo '<option value="'.$i.'">'.$i.'</option>';
            }
        ?>
    </select>
    
    <input type="submit" value="Potrdi" />
    <input type="reset" value="Prekliči"/>
</form>

<?php
    include_once './footer.php';
?>