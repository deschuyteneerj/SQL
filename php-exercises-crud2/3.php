<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'Password_1');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

if(isset($_POST['title'],$_POST['performer'],$_POST['date'],$_POST['duration'],$_POST['startTime'])){
    $result3 = $db->query("INSERT INTO shows VALUES (NULL,'".$_POST['title']."','".$_POST['performer']."','".$_POST['date']."',".$_POST['showtypesId'].",".$_POST['firstGenresId'].",".$_POST['secondGenreId'].",'".$_POST['duration']."','".$_POST['startTime']."');");
    print_r($db->errorInfo()); // Display errors
    $result3->closeCursor();
    $_POST = array();
    header('Location: 3.php');
}
?>

<h1>Exercice 3</h1>
<!--
    Créer un formulaire permettant d'ajouter un spectacle. Il contiendra les champs : 
    titre, artiste, date, type de spectacle, genre 1, genre 2, durée, heure de début.

    Ajouter le spectacle "I love techno" de David Guetta qui a lieu le 20 septembre 2019. 
    C'est un concert (showTypesId : 1) de musique électronique (firstGenresId : 4) et clubbing (secondGenreId : 10) 
    qui dure 3 heures et qui commence à 21h.
-->
<h2>add show</h2>
<form action="" method="post">
    <label for="title">show title:</label>
    <input type="text" id="title" name="title" required><br />

    <label for="performer">performer:</label>
    <input type="text" id="performer" name="performer" required><br />

    <label for="date">date:</label>
    <input type="date" id="date" name="date" required><br />

    <label for="showtypesId">show type:</label>
    <select name="showtypesId" id="showtypesId">
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
                echo '<option value="'.$data['id'].'">'.$data['genre'].'</option>';
            }
            $result->closeCursor();
        ?>
    </select><br />

    <label for="duration">duration:</label>
    <input type="time" id="duration" name="duration" required> hours<br />

    <label for="startTime">beginning:</label>
    <input type="time" id="startTime" name="startTime" min="14:00" max="23:00" required><br />

    <input type="submit" value="Submit">
</form>