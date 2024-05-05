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
    <title>Les produits</title>
</head>
<body>
    <h1>Les produits<h1>
    <?php
        if(isset($_SESSION["prenom"])) {
            if($_SESSION["admin"] == 1) {
                ?>
            <a href="ajoutProduit.php" class="ajouter">
                <button>
                    <span class="text">
                        Ajouter 
                    </span>
                </button>
            </a>
        <?php
            }
        }
        ?>
    <div class="recherche">
        <form action="" method="POST">
            <div class="InputContainer">
                <input placeholder="Search.." class="input" type="text" name="recherche">
                <input class="bouttonRecherche" type="submit" value="Rechercher" name="envoyer">
            </div>
        </form>
    </div>
    
    <div class="cartes-container">
    <?php
        $req = "SELECT idp,nom,couleur,stock,prix,description,photo from produits";
        if (isset($_POST["envoyer"])) {
            $rech = $_POST["recherche"];
            if($_POST["recherche"]!=="") {
                $req = "select * from produits where nom like '%$rech%'";
            }
        }
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
                    if(isset($_SESSION["prenom"])) {
                        if($_SESSION["admin"] == 1) {
                ?>
                <br>
                <form action="modifProduit.php" method="post">
                    <input type="hidden" name="num" value="<?php echo $num; ?>">
                    <button><input class="modifier" type="submit" value="Modifier"></button>
                </form>
                <?php
                    } else {
                        $favorisName = "Ajouter aux favoris";
                        $idUser = $_SESSION['idu'];
                        $idp = "SELECT idp from favoris WHERE idu = $idUser";
                        $resId = $id->query($idp);
                        if($resId->rowCount() !=0) {
                            while ($row = $resId->fetch(PDO::FETCH_ASSOC)) {
                                if(($row['idp'] == $ligne["idp"])) {
                                    $favorisName = "Supprimer des favoris";
                                }
                            }
                        }

                        $panierName = "Ajouter au panier";
                        $idUser = $_SESSION['idu'];
                        $idp = "SELECT idp from panier WHERE idu = $idUser";
                        $resId = $id->query($idp);
                        if($resId->rowCount() !=0) {
                            while ($row = $resId->fetch(PDO::FETCH_ASSOC)) {
                                if(($row['idp'] == $ligne["idp"])) {
                                    $panierName = "Supprimer du panier";
                                }
                            }
                        }
                ?>      
                    <button><form action="" method="post" class=fav>
                        <input type="hidden" name="envoyerFavoris" value="<?php echo $ligne["idp"] ?>">
                        <input type="submit" value="<?php echo $favorisName ?>">
                    </form></button><br>
                    <button><form action="" method="post" class=panier>
                        <input type="hidden" name="envoyerPanier" value="<?php echo $ligne["idp"] ?>">
                        <input type="submit" value="<?php echo $panierName ?>">
                    </form></button>

                <?php
                    }
                }
                ?>
            </div>
        </div>
        <?php
        }

        if(isset($_POST['envoyerFavoris'])) {
            $productId = $_POST['envoyerFavoris'];
            $userId = $_SESSION["idu"];
            $req = "";
            $verif = "SELECT idu,idp from favoris WHERE idu = $userId AND idp = $productId";
            $result = $id->query($verif);
            if($result->rowCount() == 0) {
                $req = "INSERT INTO favoris (idf,idu,idp) VALUES (null,'$userId', '$productId')";
            } else {
                $req = "DELETE FROM favoris WHERE idu = $userId AND idp = $productId";
            }
            $id->query($req);
        }

        if(isset($_POST['envoyerPanier'])) {
            $productId = $_POST['envoyerPanier'];
            $userId = $_SESSION["idu"];
            $req = "";
            $verif = "SELECT idu,idp from panier WHERE idu = $userId AND idp = $productId";
            $result = $id->query($verif);
            if($result->rowCount() == 0) {
                $req = "INSERT INTO panier (id_panier,idu,idp) VALUES (null,'$userId', '$productId')";
            } else {
                $req = "DELETE FROM panier WHERE idu = $userId AND idp = $productId";
            }
            $id->query($req);
        }
        ?>



 
</body>
</html>