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

    if($_POST['card'] == 0){
        $_POST['cardNumber'] = 0;
        $result = $db->query("INSERT INTO clients VALUES (NULL,'".$_POST['lastName']."', '".$_POST['firstName']."','".$_POST['birthDate']."',".$_POST['card'].",".$_POST['cardNumber'].");");
        print_r($db->errorInfo()); // Display errors
        $result->closeCursor();
        $_POST = array();
        header('Location: 2.php');
    }
    else{
        $result2 = $db->query("INSERT INTO clients VALUES (NULL,'".$_POST['lastName']."', '".$_POST['firstName']."','".$_POST['birthDate']."',".$_POST['card'].",".$_POST['cardNumber'].");");
        $result3 = $db->query("INSERT INTO cards VALUES (NULL,".$_POST['cardNumber'].",(SELECT id FROM cardTypes WHERE id = ".$_POST['cardType']."));");
        print_r($db->errorInfo()); // Display errors
        $result2->closeCursor();
        $_POST = array();
        header('Location: 2.php');
    }  
}
?>

<h1>Exercice 2</h1>
<!--
    Créer un formulaire permettant d'ajouter un client dans la base de données. 
    Ajouter à ce formulaire les champs permettant de créer une carte de fidélité : numéro de carte et type de carte.

    Ajouter, grâce à ce formulaire, Louise Ciccone née le 16 août 1958 et possédant une carte de fidélité. 
    Ajouter sa carte de fidélité n°7125. C'est une carte de type 2.
-->
<h2>new customer + card type</h2>
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
    
    <input type="radio" id="cardType" name="cardType" value="1" checked>
    <label for="cardType1">fidelity</label>
    <input type="radio" id="cardType" name="cardType" value="2">
    <label for="cardType2">large family</label>
    <input type="radio" id="cardType" name="cardType" value="3">
    <label for="cardType3">student</label>
    <input type="radio" id="cardType" name="cardType" value="4">
    <label for="cardType4">employee</label><br />

    <input type="submit" value="Submit">
</form>