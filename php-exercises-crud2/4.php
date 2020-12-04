<?php
try{
    $db = new PDO('mysql:host=localhost;dbname=colyseum;charset=utf8', 'root', 'Password_1');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}
if (isset($_POST['firstName'],$_POST['lastName'])){
    if ($_POST['card']=="on"){$_POST['card']=1;}
    else {$_POST['card']=0;}
    $result = $db->query("UPDATE clients SET lastName='".$_POST['lastName']."', firstName='".$_POST['firstName']."', birthDate='".$_POST['birthDate']."', card=".$_POST['card'].", cardNumber=".$_POST['cardNumber']." WHERE firstName='".$_POST['firstName']."' AND lastName='".$_POST['lastName']."';");
    $result->closeCursor();
}
?>

<h1>Exercice 4</h1>
<!--
    Créer un formulaire comprenant les champs : 
    nom, prénom, date de naissance, carte de fidélité (case à cocher) 
    et numéro de carte de fidélité. Ce formulaire devra permettre de modifier un client.

    Dans ce formulaire, afficher les information de Gabriel Perry. 
    Modifier sa date de naissance : il est né le 9 avril 1994.
-->

<h2>display customer</h2>
<form action="" method="post">
<label for="firstName2">first name</label>
<input type="text" name="firstName2"><br />
<label for="lastName2">last name</label>
<input type="text" name="lastName2"><br />
<input type="submit" name="toModify">
</form>

<h2>modify customer info</h2>
<?php
if (isset($_POST['firstName2'],$_POST['lastName2'])){
    $result = $db->query("SELECT * FROM clients WHERE lastName='".$_POST['lastName2']."' AND firstName='".$_POST['firstName2']."';");
    $data = $result->fetch()
?>
    <form action="" method="POST">
    <label for="firstName">first name:</label>
    <input type="text" name="firstName" value="<?php echo $data['firstName'] ?>"><br />
    <label for="lastName">last name:</label>
    <input type="text" name="lastName" value="<?php echo $data['lastName'] ?>"><br />
    <label for="birthDate">birth date:</label>
    <input type="date" name="birthDate" value="<?php echo $data['birthDate'] ?>"><br />
    <label for="card">card</label>
    <input type="checkbox" id="card" name="card" <?php if ($data['card']==1) {echo "checked";}?>><br />
    <label for="cardNumber">card number</label>
    <input type="number" name="cardNumber" value="<?php echo $data['cardNumber'] ?>"><br />
    <input type="submit" name="submit">
    </form>
<?php
    $result->closeCursor();
}
?>