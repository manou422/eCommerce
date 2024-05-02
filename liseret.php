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

<ul>
    <li><a class="accueil" href="home.php"> Accueil</a></li>
    <li class="dropdown">
        <a href="javascript:void(0)" class="dropbtn">Les produits</a>
        <div class="dropdown-content">
            <a href="produits.php">Toutes les catégories</a>
            <a href="iphones.php">Les Iphones</a>
            <a href="samsungs.php">Les Samsungs</a>
        </div>
    </li>
    <?php
        if(isset($_SESSION["prenom"])) {
    ?>
            <?php
                if($_SESSION["admin"] == 0) {
            ?>
                    <li><a class="fav" href="favoris.php"> Mes favoris </a></li>
                    <li><a class="pan" href="panier.php"> Mon panier </a></li>
                    <li><a class="com" href="compte.php"> Mon compte </a></li>
                    <?php
                } else {
                    ?>
                    <li><a class="ut" href="utilisateurs.php"> Les utilisateurs </a></li>
                <?php
                }
                ?>
                <li><a class="co" href="deconnexion.php"> Deconnexion</a></li>
                <?php
        } else {
        ?>
            <li><a class="co" href="Connexion.php"> Connexion</a></li>
        <?php
        }
        ?>
</ul>

</body>
</html>


