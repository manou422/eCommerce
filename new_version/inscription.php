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
            <form action="" method="post">
                <div class="input-box"><input type="text" name="nom" placeholder="Ton Nom :" required></div>
                <div class="input-box"><input type="text" name="prenom" placeholder="Ton Prénom :" required></div>
                <div class="input-box"><input type="email" name="mail" placeholder="Ton Mail :" required></div>
                <div class="input-box"><input type="text" name="adresse" placeholder="Ton adresse :" required></div>
                <div class="input-box"><input type="password" name="mdp" placeholder="Ton Mot de Passe :" required></div>
    	        <button class="btn" type="submit" name="bout"> Inscription</button>
                <div class="register-link">
                    <p>Déjà inscrit ? - Connecte toi <a href="connexion.php">ici</a></p>
                </div>
            </form>
        </div>
        <?php
       if(isset($_POST["bout"])){
            $nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $mail = $_POST["mail"];
            $adresse = $_POST["adresse"];
            $mdp = $_POST["mdp"];    
            $req = "INSERT INTO users (idu,nom,prenom,mail,adresse,mdp,admin) 
                    VALUES (null, '$nom', '$prenom', '$mail', '$adresse', '$mdp', 0)";
            $id->query($req);
            header("location:connexion.php");
        }


        ?>

    </body>
</html>