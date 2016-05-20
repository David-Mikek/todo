<?php
    include_once './header.php';
    include_once './database.php';
    
    $task_id = (int) $_GET['task_id'];
    
    $query = "SELECT * FROM tasks WHERE id = $task_id";
    $result = mysqli_query($link, $query);
    $task = mysqli_fetch_array($result);
    
?>

<h1>Uredi nalogo</h1>

<form action="task_update.php" method="post">
    <input type="hidden" name="id" value="<?php echo $task_id;?>" />
    <label id="groups">Skupine</label>
    <select name="group_id">
        <?php
            $query = "SELECT * FROM groups ORDER BY title";
            $result = mysqli_query($link, $query);
            while ($row = mysqli_fetch_array($result)) {
                if ($row['id'] == $task['group_id']) {
                    echo '<option value="'.$row['id'].'" selected="selected">'.$row['title'].'</option>';
                }
                else {
                    echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                }
            }
        ?>
    </select>    
    
    <br>
    <label id="title">Ime naloge</label>
    <input type="text" name="title" value="<?php echo $task['title']; ?>" />
    
    <br>
    <label id="description">Opis</label>
    <textarea name="description" rows="7"><?php echo $task['description']; ?></textarea>
    
    <br>
    <label id="deadline">Rok opravila</label>
    <input type="date" name="deadline" value="<?php echo date('Y-m-d',strtotime($task['deadline'])); ?>" />
    
    <br><br>
    <label id="priority">Prioriteta</label>
    <select name="priority">
        <?php
            for($i=1;$i<11;$i++) {
                if ($i == $task['priority']) {
                    echo '<option value="'.$i.'" selected="selected">'.$i.'</option>';
                }
                else {
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
            }
        ?>
    </select>
    
    <br>
    <label id="state">Stanje</label>
    <select name="state">
        <option value="V izdelavi">V izdelavi</option>
        <option value="Končan">Končan</option>
        <option value="Čakanje">Čakanje</option>
    </select>
    
    <br>
    <br>
    <input type="submit" value="Potrdi" />
    <input type="reset" value="Prekliči"/>
</form>

<?php
    include_once './footer.php';
?>