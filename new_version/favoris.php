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
			<button type='submit' name='recherche' value='Rechercher'>Rechercher</button>
	</form>
</div>

<?php
$idUser = $_SESSION["idu"];

$req = "SELECT produits.idp,produits.nom,produits.couleur,produits.stock,produits.prix,produits.description,produits.photo from produits INNER JOIN favoris ON produits.idp = favoris.idp WHERE favoris.idu = $idUser";
	if (isset($_POST["envoyer"])) {
		$rech = $_POST["recherche"];
		if($_POST["recherche"]!=="") {
			$req = "SELECT produits.idp,produits.nom,produits.couleur,produits.stock,produits.prix,produits.description,produits.photo from produits INNER JOIN favoris ON produits.idp = favoris.idp WHERE favoris.idu = $idUser AND produits.nom like '%$rech%'";
		}
	}
	$result = $id->query($req);
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
						<?php
						if(isset($_SESSION["prenom"])) {
							if($_SESSION["admin"] == 0) {
						?>
                                <form action="" method='POST'>
                                    <input type="hidden" name="num" value="<?php echo $row['idp']; ?>">
                        		    <button type='submit' name='favoris'>Supprimer des favoris</button>
                                </form>
						<?php
							} else if ($_SESSION["admin"] == 1) {
                               
                                

                                echo "<form action='' method='POST'>";
                                echo "<button><a href='modifProduit.php?num=" . $row['idp'] . "'>Modifier</a></button>";
                                echo "</form>";
							}
						}
							?>
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
            $productId = $_POST['num'];
            $userId = $_SESSION["idu"];
            $req = "";
            $verif = "SELECT count(*) from favoris WHERE idu = $userId AND idp = $productId";
            $result = $id->query($verif);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if($row["count(*)"] == 0) {
                $req = "INSERT INTO favoris (idf,idu,idp) VALUES (null,'$userId', '$productId')";
            } else {
                $req = "DELETE FROM favoris WHERE idu = $userId AND idp = $productId";
            }
            $id->query($req);
        }

        if(isset($_POST["panier"])) {
            $productId = $_POST["num"];
            $userId = $_SESSION["idu"];
            $req = "";
            $verif = "SELECT count(*) from panier WHERE idu = $userId AND idp = $productId";
            $result = $id->query($verif);
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if($row["count(*)"] == 0) {
                $req = "INSERT INTO panier (id_panier,idu,idp) VALUES (null,'$userId', '$productId')";
            } else {
                $req = "DELETE FROM panier WHERE idu = $userId AND idp = $productId";
            }
            $id->query($req);
        }

        include "footer.php";
        ?>
</body>
</html>
