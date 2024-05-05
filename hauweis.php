<?php
    session_start();
    include "liseret.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="produits.css">
    <title>Les Hauweis</title>
</head>
<body>

    <h1>Les Hauweis</h1>

    <?php
        if($_SESSION["admin"] == 1) {
            ?>
    <a href="ajoutProduit.php">
        <button>
            <span class="text">
                Ajouter 
            </span>
        </button>
    </a>
    <?php
        }
    ?>
 
<div class="cartes-container">
    <?php
    $req = "SELECT idp,nom,couleur,stock,prix,description,photo from produits WHERE categorie='hauwei'";
    $result = $id->query($req);
        while ($ligne = $result->fetch(PDO::FETCH_ASSOC)) {
            $num = $ligne["idp"];
        ?>
        <div class="card">
            <img class="card__image" src="images/<?php echo $ligne['photo'] ?>">
            <div class="card__content">
                <p class="card__title"> <?php echo $ligne['nom'] ?> </p>
                <p class="card__description"> <?php echo $ligne["description"] ?> </p>
                <p class="card__prix"> <?php echo $ligne["prix"]."€" ?> </p>
                <?php
                    if($_SESSION["admin"] == 1) {
                ?>
                <br>
                <form action="modifProduit.php" method="post">
                    <input type="hidden" name="num" value="<?php echo $num; ?>">
                    <button><input class="modifier" type="submit" value="Modifier"></button>
                </form>
                <?php
                    } else {
                ?>      
                    <button id="fav">Ajouter aux favoris</button><br>
                    <button>Ajouter au panier</button>

                <?php
                    }
                ?>
            </div>
        </div>
        <?php
        }
        ?>
</body>
</html>