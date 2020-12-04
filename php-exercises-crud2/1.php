<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'Password_1');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

if(isset($_POST['lastName'],$_POST['firstName'],$_POST['birthDate'])){
    if(isset($_POST['card'])){
        $_POST['card'] = 1;
    }else{
        $_POST['card'] = 0;
    }

    if($_POST['card'] == 0){$_POST['cardNumber'] = 'NULL';}

    $result = $db->query("INSERT INTO clients 
                          VALUES (NULL,'".$_POST['lastName']."', '".$_POST['firstName']."','".$_POST['birthDate']."',".$_POST['card'].",".$_POST['cardNumber'].");
                        ");

    $result->closeCursor();
    $_POST = array();
    header('Location: 1.php');
}
?>

<h1>Exercice 1</h1>
<!--
    Créer un formulaire permettant d'ajouter un client dans la base de données. 
    Il devra comporter les champs : nom, prénom, date de naissance, 
    carte de fidélité (case à cocher) et numéro de carte de fidélité.

    A l'aide de ce formulaire, ajouter à la liste des clients Alicia Moore 
    née le 8 septembre 1979 et ne possédant pas de carte de fidélité.
-->
<h2>new customer</h2>
<form action="" method="post">
    <label for="lastName">last name:</label>
    <input type="text" id="lastName" name="lastName"><br />
    <label for="firstName">first name:</label>
    <input type="text" id="firstName" name="firstName"><br />
    <label for="birthDate">birth date:</label>
    <input type="birthDate" id="birthDate" name="birthDate"><br />

    <label for="card">card</label>
    <input type="checkbox" id="card" name="card"><br />
    <label for="cardNumber">card number</label>
    <input type="cardNumber" id="cardNumber" name="cardNumber" min=0><br />

    <input type="submit" value="Submit">
</form>