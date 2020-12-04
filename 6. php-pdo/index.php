<?php

try {
    $bdd = new PDO('mysql:host=localhost;dbname=weatherapp;charset=utf8', 'root', 'Password_1');
}
catch(Exception $e) {
    die('Error : '.$e->getMessage());
}

if(isset($_POST['ville'],$_POST['bas'],$_POST['haut'])){
    $results = $bdd->query("INSERT INTO Météo VALUES (NULL,'".$_POST['ville']."','".$_POST['bas']."','".$_POST['haut']."');");
    $results->closeCursor();
    $_POST = array();
    header('Location: index.php');
}

if(isset($_POST['delete'])){
    $string ='';
    foreach($_POST['delete'] as $elem){
        $string = $string.$elem.',';
    }
    echo substr($string, 0, -1);
    $result = $bdd->query("DELETE FROM Météo WHERE PK IN (".substr($string, 0, -1).")");
    $result->closeCursor();
    $_POST = array();
    header('Location: index.php');
}

$result = $bdd->query("SELECT * FROM Météo;");

echo '<form action="" method="post"><table>';
    echo '<tr>';
        echo '<th style="border: 1px solid black">PK</th>';
        echo '<th style="border: 2px outset red">Ville</th>';
        echo '<th style="border: 2px outset red">Minima</th>';
        echo '<th style="border: 2px outset red">Maxima</th>';
        echo '<th style="border: 1px solid black">delete</th>';
    echo '</tr>';

while ($data = $result->fetch()) {
    echo '<tr>';
        echo '<td style="border: 1px solid black">'.$data['PK'].'</td>';
        echo '<td style="border: 1px solid black">'.$data['ville'].'</td>';
        echo '<td style="border: 1px solid black">'.$data['bas'].'</td>';
        echo '<td style="border: 1px solid black">'.$data['haut'].'</td>';
        echo '<td style="border: 1px solid black"><input type="checkbox" value="'.$data['PK'].'" name="delete[]"></td>';
    echo '</tr>';
}
echo '</table><input type="submit" value="Submit"></form>';

$result->closeCursor();

?>

<form action="" method="post">
    <label for="ville">Ville:</label>
    <input type="text" id="ville" name="ville"><br>

    <label for="bas">Minima:</label>
    <input type="text" id="bas" name="bas"><br>

    <label for="haut">Maxima:</label>
    <input type="text" id="haut" name="haut"><br>
    
    <input type="submit" value="Submit">
</form>