<?php
include "Connect.php";
$idu = "";
if(isset($_SESSION['idu'])) {
    $idu = $_SESSION["idu"];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="liseret.css">
</head>
<body>
<header class="liseret">
       <nav class="container">
            <a class="Accueil" href="home.php"> Accueil</a>
            <a class="Propos" href="recherche.php"> Rechercher</a>
            
            <?php
                if(isset($_SESSION["prenom"])) {
                    if($_SESSION["admin"] == 0) {
            ?>
                        <a class="fav" href="favoris.php"> Mes favoris </a>
                        <a class="pan" href="panier.php"> Mon panier </a>
                        <?php
                            } else {
                        ?>
                                <a class="co" href="AjoutAnnonce.php"> Ajouter Annonce</a>
                        <?php
                            }
                        ?>
                <a class="co" href="deconnexion.php"> Deconnexion</a>
            <?php
            }else{
            ?>
                <a class="co" href="Connexion.php"> Connexion</a>
            <?php
            }
            ?>
            
            <!-- Rajouter un if qd user connecté affiche connexion et sinon deconnexion -->
        </nav>
    </header>
</body>
</html>