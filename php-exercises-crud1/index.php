<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'Password_1');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}
catch(Exception $e){
    die('Error : '.$e->getMessage());
}

// Exercice 1: Afficher tous les clients.
echo '<h2>Exercice 1: Afficher tous les clients.</h2>';

$result = $db->query("SELECT * FROM clients;");

echo '<table>';
    echo '<tr>';
        echo '<th style="border: 1px solid black">ID</th>';
        echo '<th style="border: 2px outset red">Lastname</th>';
        echo '<th style="border: 2px outset red">Firstname</th>';
        echo '<th style="border: 2px outset red">Birthdate</th>';
    echo '</tr>';

while ($data = $result->fetch()) {
    echo '<tr>';
        echo '<td style="border: 1px solid black">'.$data['id'].'</td>';
        echo '<td style="border: 1px solid black">'.$data['lastName'].'</td>';
        echo '<td style="border: 1px solid black">'.$data['firstName'].'</td>';
        echo '<td style="border: 1px solid black">'.$data['birthDate'].'</td>';
    echo '</tr>';
}
echo '</table>';

// Exercice 2: Afficher tous les types de spectacles possibles.
echo '<h2>Exercice 2: Afficher tous les types de spectacles possibles.</h2>';

$result = $db->query("SELECT * FROM showTypes;");

echo '<table>';
    echo '<tr>';
        echo '<th style="border: 1px solid black">ID</th>';
        echo '<th style="border: 2px outset red">Type</th>';
    echo '</tr>';

while ($data = $result->fetch()) {
    echo '<tr>';
        echo '<td style="border: 1px solid black">'.$data['id'].'</td>';
        echo '<td style="border: 1px solid black">'.$data['type'].'</td>';
    echo '</tr>';
}
echo '</table>';

// Exercice 3: Afficher les 20 premiers clients.
echo '<h2>Exercice 3: Afficher les 20 premiers clients.</h2>';

$result = $db->query("SELECT * FROM clients LIMIT 0,20;");

echo '<table>';
    echo '<tr>';
        echo '<th style="border: 1px solid black">ID</th>';
        echo '<th style="border: 2px outset red">Lastname</th>';
        echo '<th style="border: 2px outset red">Firstname</th>';
        echo '<th style="border: 2px outset red">Birthdate</th>';
    echo '</tr>';

while ($data = $result->fetch()) {
    echo '<tr>';
        echo '<td style="border: 1px solid black">'.$data['id'].'</td>';
        echo '<td style="border: 1px solid black">'.$data['lastName'].'</td>';
        echo '<td style="border: 1px solid black">'.$data['firstName'].'</td>';
        echo '<td style="border: 1px solid black">'.$data['birthDate'].'</td>';
    echo '</tr>';
}
echo '</table>';

// Exercice 4: N'afficher que les clients possédant une carte de fidélité.
echo '<h2>Exercice 4: N\'afficher que les clients possédant une carte de fidélité.</h2>';

$result = $db->query("SELECT * FROM clients WHERE card = 1;");

echo '<table>';
    echo '<tr>';
        echo '<th style="border: 2px outset red">ID</th>';
        echo '<th style="border: 2px outset red">Lastname</th>';
        echo '<th style="border: 2px outset red">Firstname</th>';
        echo '<th style="border: 2px outset red">Birthdate</th>';
    echo '</tr>';

while ($data = $result->fetch()) {
    echo '<tr>';
        echo '<td style="border: 1px solid black">'.$data['id'].'</td>';
        echo '<td style="border: 1px solid black">'.$data['lastName'].'</td>';
        echo '<td style="border: 1px solid black">'.$data['firstName'].'</td>';
        echo '<td style="border: 1px solid black">'.$data['birthDate'].'</td>';
    echo '</tr>';
}
echo '</table>';

// Exercice 5: Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M". Trier les noms par ordre alphabétique.
echo '<h2>Exercice 5: Afficher uniquement le nom et le prénom de tous les clients dont le nom commence par la lettre "M". Trier les noms par ordre alphabétique.</h2>';

$result = $db->query("SELECT lastName, firstName FROM clients WHERE lastName LIKE 'M%' ORDER BY lastName ASC;");

while ($data = $result->fetch()) {
        echo '<p>Nom: '.$data['lastName'].'</p>';
        echo '<p>Prénom: '.$data['firstName'].'</p>';
        echo '<br />';
}

// Exercice 6: Afficher le titre de tous les spectacles ainsi que l\'artiste, la date et l\'heure. Trier les titres par ordre alphabétique. Afficher les résultat comme ceci : Spectacle par artiste, le date à heure.
echo '<h2>Exercice 6: Afficher le titre de tous les spectacles ainsi que l\'artiste, la date et l\'heure. Trier les titres par ordre alphabétique. Afficher les résultat comme ceci : Spectacle par artiste, le date à heure.</h2>';

$result = $db->query("SELECT title, performer,  date, startTime FROM shows;");

while ($data = $result->fetch()) {
    echo "<p>".$data['title']." par ".$data['performer']." le ".$data['date']." à ".$data['startTime']."</p>";
    echo '<br />';
}

// Exercice 7: Afficher tous les clients.
echo '<h2>Exercice 7: Afficher tous les clients.</h2>';

$result = $db->query("SELECT CONCAT('Nom: ', lastName, '<br />Prénom: ', firstName, '<br />Date de naissance: ', birthDate,IF(card <> 0,CONCAT('<br />Carte de fidélité: Oui<br />Numéro de carte: ',cardNumber), '<br />Carte de fidélité: Non')) AS Clients FROM clients;");

while ($data = $result->fetch()) {
        echo '<p>'.$data['Clients'].'</p>';
}