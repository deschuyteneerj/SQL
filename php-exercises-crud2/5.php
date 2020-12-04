<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'Password_1');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

if (isset($_POST['title'],$_POST['performer'],$_POST['date'],$_POST['showTypesId'],$_POST['firstGenresId'],$_POST['secondGenreId'],$_POST['duration'],$_POST['startTime'])){
    $result = $db->query("UPDATE shows SET title='".$_POST['title']."', performer='".$_POST['performer']."', date='".$_POST['date']."', showTypesId=".$_POST['showTypesId'].", firstGenresId=".$_POST['firstGenresId'].", secondGenreId=".$_POST['secondGenreId'].", duration='".$_POST['duration']."', startTime='".$_POST['startTime']."' WHERE title='".$_POST['title']."';");
    print_r($db->errorInfo()); // Display errors
    $result->closeCursor();
    $_POST = array();
    header('Location: 5.php');
}
?>

<h1>Exercice 5</h1>
<!--
    Créer un formulaire permettant de modifier un spectacle. 
    Afficher les informations de Vestibulum accumsan. 
    Modifier la date du spectacle : il est repoussé au 1er janvier 2017 à 21h.
-->

<h2>display show</h2>
<form action="" method="POST">
<label for="title2">title:</label>
<input type="text" name="title2"><br />
<input type="submit" name="toModify">
</form>

<h2>modify show info</h2>

<?php
if (isset($_POST['title2'])){
    $result = $db->query("SELECT * FROM shows WHERE title='".$_POST['title2']."';");
    $data = $result->fetch()
?>
    <form action="" method="POST">
        <label for="title">show title:</label>
        <input type="text" id="title" name="title" required value="<?php echo $data['title'] ?>"><br />

        <label for="performer">performer:</label>
        <input type="text" id="performer" name="performer" required value="<?php echo $data['performer'] ?>"><br />

        <label for="date">date:</label>
        <input type="date" id="date" name="date" required value="<?php echo $data['date'] ?>"><br />

        <label for="showTypesId">show type:</label>
        <select name="showTypesId" id="showTypesId">
            <?php
                $result = $db->query("SELECT * FROM showTypes ORDER BY type ASC;");
                while($data = $result->fetch()){
                    echo '<option value="'.$data['id'].'">'.$data['type'].'</option>';
                }
                $result->closeCursor();
            ?>
        </select><br />

        <label for="firstGenresId">genre 1:</label>
        <select name="firstGenresId" id="firstGenresId">
            <?php
                $result = $db->query("SELECT * FROM genres WHERE showTypesId = 1 ORDER BY genre ASC;");
                while($data = $result->fetch()){
                    echo '<option value="'.$data['id'].'">'.$data['genre'].'</option>';
                }
                $result->closeCursor();
            ?>
        </select><br />
        <label for="secondGenreId">genre 2:</label>
        <select name="secondGenreId" id="secondGenreId">
            <?php
                $result = $db->query("SELECT * FROM genres WHERE showTypesId = 1 ORDER BY genre ASC;");
                while($data = $result->fetch()){
                    echo '<option value="'.$data['id'].'".>'.$data['genre'].'</option>';
                }
                $result->closeCursor();
            ?>
        </select><br />

        <label for="duration">duration:</label>
        <input type="time" id="duration" name="duration" step="2" value="<?php echo $data['duration'] ?>"> hours<br />

        <label for="startTime">beginning:</label>
        <input type="time" id="startTime" name="startTime" step="2" value="<?php echo $data['startTime'] ?>"><br />

        <input type="submit" value="Submit">
    </form>
<?php
    $result->closeCursor();
}
?>