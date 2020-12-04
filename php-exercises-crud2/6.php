<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'Password_1');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}

if (isset($_POST['firstName'],$_POST['lastName'],$_POST['birthDate'])){
    $result = $db->query("UPDATE clients SET lastName='".$_POST['lastName']."', firstName='".$_POST['firstName']."', birthDate='".$_POST['birthDate']."' WHERE id=".$_POST['id'].";");
    print_r($db->errorInfo()); // Display errors
    $result->closeCursor();
    $_POST = array();
    header('Location: 6.php');
}
?>

<h1>Exercice 6</h1>
<!--
    Créer un formulaire permettant de modifier un client. 
    Afficher les informations du client n°5. 
    Modifier son nom et son prénom : il s'appellera Nicolas Monteiro.
-->

<h2>display customer</h2>
<form action="" method="POST">
<label for="id2">id:</label>
<input type="number" name="id2"><br />
<input type="submit" name="toModify">
</form>

<h2>modify customer info</h2>
<?php
if (isset($_POST['id2'])){
    $result = $db->query("SELECT * FROM clients WHERE id='".$_POST['id2']."';");
    $data = $result->fetch();
?>
    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $_POST['id2']; ?>">
        <label for="firstName">first name:</label>
        <input type="text" name="firstName" value="<?php echo $data['firstName'] ?>"><br />
        <label for="lastName">last name:</label>
        <input type="text" name="lastName" value="<?php echo $data['lastName'] ?>"><br />
        <label for="birthDate">birth date:</label>
        <input type="date" name="birthDate" value="<?php echo $data['birthDate'] ?>"><br />
        <label for="card">card</label>
        <input type="checkbox" id="card" name="card" <?php if ($data['card']==1) {echo "checked";} ?>><br />
        <label for="cardNumber">card number</label>
        <input type="number" name="cardNumber" value="<?php echo $data['cardNumber'] ?>"><br />
        <input type="submit" name="submit">
    </form>
<?php
    $result->closeCursor();
}
?>