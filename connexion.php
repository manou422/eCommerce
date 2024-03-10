<?php
include "connect.php";
    if(isset($_POST["bout"])) {
        session_start();
        $mail = $_POST["mail"];
        $mdp = $_POST["mdp"];
        $req = "SELECT * FROM users WHERE mail = '$mail' and mdp = '$mdp'";
        $res = mysqli_query($id, $req);
        $ligne = mysqli_fetch_assoc($res);
        if(mysqli_num_rows($res) > 0) {
            $_SESSION["prenom"] = $ligne["prenom"];
            $_SESSION["nom"] = $ligne["nom"];
            $_SESSION["mail"] = $ligne["mail"];
            $_SESSION["mdp"] = $mdp;
            $_SESSION["admin"] = $ligne["admin"];
            header("location:home.php");
        }  else {
            $erreur =  "<h3> Erreur de login ou de mot de passe!!! </h3>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title> Connexion </title>
</head>
<body>
    <div class="carte">
    <h1> Connexion </h1>
    <form action="" method="post">
       <div class="items"><p id="mail"> E-mail : <input type="text" name="mail" placeholder="Ton mail : " required></div>
       <div class="items"><p id="mdp"> Mot de passe : <input type="password" name="mdp" placeholder="Ton mot de passe :" required></div>
       <?php if(isset($erreur)) echo $erreur;?>
       <p> Pas encore inscrit ? - Créer un compte <a href="inscription.php">ici</a></p>
        <div><input id="connexion" type="submit" value="Connexion" name="bout"><div>
    </form>
    </div>
    
</body>
</html>