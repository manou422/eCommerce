<?php 

include "connect.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title> Inscription </title>
</head>
<body>
    <div class="bulle">
    <h1> Inscription </h1>
    <form action="" method="post">
    <div class="items"><p id="nom"> Nom : <input type="text" name="nom" placeholder="Ton Nom :" required></div>
    <div class="items"><p id="prenom"> Prenom : <input type="text" name="prenom" placeholder="Ton Prénom :" required></div>
    <div class="items"><p id="mail"> E-mail : <input type="text" name="mail" placeholder="Ton Mail :" required></div>
    <div class="items"><p id="mdp"> Mot de passe : <input type="password" name="mdp" placeholder="Ton Mot de Passe :" required></div>
    <p>Déjà inscrit ? - Connecte toi <a href="connexion.php">ici</a></p>
	<input id="enregistrer" type="submit" value="Je m'enregistre !" name="soumettre">
</form>
</div>
    <?php
   if(isset($_POST["soumettre"])){
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $mail = $_POST["mail"];
    $mdp = $_POST["mdp"];    
    $req = "INSERT INTO users 
            VALUES (null, '$nom', '$prenom', '$mail', '$mdp', 0)";
    mysqli_query($id, $req);
    header("location:home.php");
}


    ?>

</body>
</html>