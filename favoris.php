<?php
	session_start();
	include "liseret.php";
    include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="produits.css">
    <title>Mes favoris</title>
</head>
<body>
    <h1> Mes favoris <h1>
    <div class="recherche">
        <form action="favoris.php" method="POST">
            <div class="InputContainer">
                <input placeholder="Search.." class="input" type="text" name="recherche">
                <input class="bouttonRecherche" type="submit" value="Rechercher" name="envoyer">
            </div>
        </form>
    </div>
    
    <div class="cartes-container">
    <?php
        $idUser = $_SESSION['idu'];
        $req = "SELECT produits.idp,produits.nom,produits.couleur,produits.stock,produits.prix,produits.description,produits.photo from produits INNER JOIN favoris ON produits.idp = favoris.idp WHERE favoris.idu = $idUser";
        if (isset($_POST["envoyer"])) {
            $rech = $_POST["recherche"];
            if($_POST["recherche"]!=="") {
                $req = "SELECT produits.idp,produits.nom,produits.couleur,produits.stock,produits.prix,produits.description,produits.photo from produits INNER JOIN favoris ON produits.idp = favoris.idp WHERE favoris.idu = $idUser AND produits.nom like '%$rech%'";
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
                <button><form action="" method="post" class=fav>
                    <input type="hidden" name="product_id" value="<?php echo $ligne["idp"] ?>">
                    <input type="submit" value="Supprimer des favoris">
                </form></button>
            </div>
        </div>
        <?php
        }

        if(isset($_POST['product_id'])) {
            $productId = $_POST['product_id'];
            $userId = $_SESSION["idu"];
            $req = "DELETE FROM favoris WHERE idu = $userId AND idp = $productId";
            $result = $id->query($req);
            header("Refresh:0");
        }
        ?>



 
</body>
</html>