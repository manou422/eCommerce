<?php 

include "connect.php";

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="connexion.css">
        <title> Inscription </title>
    </head>
    <body>
        <div class="wrapper">
            <h1> Inscription </h1>
            <form method="post">
                <div class="input-box"><input type="text" name="nom" placeholder="Ton Nom :" required></div>
                <div class="input-box"><input type="text" name="prenom" placeholder="Ton Prénom :" required></div>
                <div class="input-box"><input type="email" name="mail" placeholder="Ton Mail :" required></div>
                <div class="input-box"><input type="text" name="adresse" placeholder="Ton adresse :" required></div>
                <div class="input-box"><input type="password" name="mdp" placeholder="Ton Mot de Passe :" required></div>
    	        <input class="btn" type="submit" value="Inscription" name="soumettre">
                <div class="register-link">
                    <p>Déjà inscrit ? - Connecte toi <a href="connexion.php">ici</a></p>
                </div>
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