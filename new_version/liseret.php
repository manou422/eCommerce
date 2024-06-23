<?php
include "Connect.php";
$idu = "";
$count = 0;
if(isset($_SESSION['idu'])) {
    $idu = $_SESSION["idu"];

    $reqFavoris = "SELECT count(*) from favoris where idu = '$idu' ";
    $resultFavoris = $id->query($reqFavoris);
    $row = $resultFavoris->fetch(PDO::FETCH_ASSOC);
    $countFavoris = $row["count(*)"];

    $reqPanier = "SELECT count(*) from panier where idu = '$idu' ";
    $resultPanier = $id->query($reqPanier);
    $row = $resultPanier->fetch(PDO::FETCH_ASSOC);
    $countPanier = $row["count(*)"];

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

<nav class="navbar">
        <div class="navbar-line1">
            <?php
        if(isset($_SESSION["prenom"])) {
    ?>
            <?php
                if($_SESSION["admin"] == 0) {
            ?>
                    <a href="produits.php">Accueil</a>
                    <a href="favoris.php"> Mes favoris <?php echo $countFavoris ?></a>
                    <a href="panier.php"> Mon panier <?php echo $countPanier ?></a>
                    <a href="compte.php"> Mon compte </a>
                    <?php
                } else {
                    ?>
                    <a href="home.php">Accueil</a>
                    <a href="produits.php">Gérer les produits</a>
                    <a href="utilisateurs.php"> Les utilisateurs </a>
                <?php
                }
                ?>
                <a href="deconnexion.php"> Deconnexion</a>
                <?php
        } else {
        ?>
            <a href="Connexion.php"> Connexion</a>
        <?php
        }
        ?>
        </div>
        <div class="navbar-line2">
            <a href="iphones.php">Les Iphones</a>
            <a href="samsungs.php">Les Samsungs</a>
            <a href="sony.php">Les Sony</a>
        </div>
    </nav>

</body>
</html>


