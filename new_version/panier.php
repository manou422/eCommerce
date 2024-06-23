<?php
	session_start();
	include "connect.php";
	include "liseret.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <link rel="stylesheet" href="produits.css">
</head>
<body>

<div class="recherche">
	<form action="" method="POST">
			<input placeholder="Que cherchez vous?" class="input" type="text" name="recherche">
			<button type='submit' name='action' value='Rechercher'>Rechercher</button>
	</form>
</div>

<?php

    $idUser = $_SESSION['idu'];
        $req = "SELECT produits.idp,produits.nom,produits.couleur,produits.stock,produits.prix,produits.description,produits.photo from produits INNER JOIN panier ON produits.idp = panier.idp WHERE panier.idu = $idUser";
	if (isset($_POST["envoyer"])) {
		$rech = $_POST["recherche"];
		if($_POST["recherche"]!=="") {
			$req = "SELECT produits.idp,produits.nom,produits.couleur,produits.stock,produits.prix,produits.description,produits.photo from produits INNER JOIN panier ON produits.idp = panier.idp WHERE panier.idu = $idUser AND produits.nom like '%$rech%'";
		}
	}
	$result = $id->query($req);

    $count = $result->rowCount();

    echo "Vous avez ", $count, " produit(s) dans le panier";
	?>

	<div class="product-grid">

	<?php

    if ($result->rowCount() > 0) {
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
			?>
            <div class='product-card'>
                    
					<img class="image" src="images/<?php echo $row['photo'] ?>">
                    <h2> <?php echo $row["nom"] ?> </h2>
                    <p> <?php echo $row["description"] ?> </p>
                    <p class='price'> <?php echo $row["prix"] ?> € </p>
                    <form action="" method='post'>
                        <input type="hidden" name='produit_id' value="<?php echo $row['idp'] ?>" >
						<?php
						if(isset($_SESSION["prenom"])) {
							if($_SESSION["admin"] == 0) {
						?>
                        		<button type='submit' name='favoris'>Ajouter aux favoris</button>
                        		<button type='submit' name='panier'>Ajouter au panier</button>
						<?php
							} else if ($_SESSION["admin"] == 1) {
								?>
								<button type='submit' name='modifier'>Modifier</button>
                        		<button type='submit' name='supprimer'>Supprimer</button>
								<?php
							}
						}
							?>
                    </form>
                  </div>
			<?php
			}
    } else {
        echo "0 résultats";
    }
    ?>
    </div>

    <?php
        if(isset($_POST["favoris"])) {
            $productId = $_POST['favoris'];
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

        if(isset($_POST["panier"])) {
            $productId = $_POST["produit_id"];
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

        if(isset($_POST["supprimer"])) {
            $productId = $_POST["produit_id"];
            $req = "DELETE FROM produits WHERE idp = $productId";
            $id->query($req);
        }

        if(isset($_POST["modifier"])) {
            header("location:modifProduit.php");
        }

        include "footer.php";
        ?>
</body>
</html>
