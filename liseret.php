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

<!-- <nav>
    <ul>
        <li><a href="#">Accueil</a></li>
        <li><a href="#">À Propos</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
</nav> -->
       <nav>
       <ul>
            <li><a class="accueil" href="home.php"> Accueil</a></li>
            <li><a class="recherche" href="recherche.php"> Rechercher</a></li>
            
            <?php
                if(isset($_SESSION["prenom"])) {
                    if($_SESSION["admin"] == 0) {
            ?>
                        <li><a class="fav" href="favoris.php"> Mes favoris </a></li>
                        <li><a class="pan" href="panier.php"> Mon panier </a></li>
                        <li><a class="com" href="compte.php"> Mon compte </a></li>
                        <?php
                            } else {
                        ?>
                                <li><a class="co" href="produits.php"> Les produits </a></li>
                        <?php
                            }
                        ?>
                <li><a class="co" href="deconnexion.php"> Deconnexion</a></li>
            <?php
            }else{
            ?>
                <li><a class="co" href="Connexion.php"> Connexion</a></li>
            <?php
            }
            ?>
            
            <!-- Rajouter un if qd user connecté affiche connexion et sinon deconnexion -->
        </ul>
        </nav>
    </header>
</body>
</html>