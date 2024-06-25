<?php
include "connect.php";
    if(isset($_POST["bout"])) {
        session_start();
        $mail = $_POST["mail"];
        $mdp = $_POST["mdp"];
        $req = "SELECT * FROM users WHERE mail = '$mail' and mdp = '$mdp'";
        $result = $id->query($req);
        $ligne = $result->fetch(PDO::FETCH_ASSOC);
        if($result->rowCount() > 0) {
            $_SESSION["idu"] = $ligne["idu"];
            $_SESSION["prenom"] = $ligne["prenom"];
            $_SESSION["nom"] = $ligne["nom"];
            $_SESSION["mail"] = $ligne["mail"];
            $_SESSION["mdp"] = $mdp;
            $_SESSION["admin"] = $ligne["admin"];
            
            if($_SESSION["admin"] == 1) {
                header("location:home.php");
            } else {
                header("location:produits.php");
            }
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
    <link rel="stylesheet" href="connexion.css">
    <title> Connexion </title>
</head>
<body>
    <div class="wrapper">
    <h1> Connexion </h1>
    <form action="" method="post">
        <div class="input-box">
            <input type="email" name="mail" placeholder="Ton mail : " required/>
        </div>
        <div class="input-box">
            <input type="password" name="mdp" placeholder="Ton mot de passe :" required/>
        </div>
       <?php if(isset($erreur)) echo $erreur;?>
            <button class="btn" type="submit" name="bout"> Connexion</button>
        <div class="register-link">
            <p> Pas encore inscrit ? - Créer un compte <a href="inscription.php"> Ici </a></p>
        </div>
    </form>
</div>

    
</body>
</html>