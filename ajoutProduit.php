<?php
	session_start();
	include "liseret.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ajoutProduit.css">
    <title> telephone </title>
</head>
<body>

    <h1>Ajouter un produit<h1>

<div class="container">
    <form action="" class="form" method="post" enctype="multipart/form-data">
    	<input  class="input" type="text" name="nom" placeholder="Nom du produit">
    	<input  class="input" type="text" name="categorie" placeholder="Catégorie">
		<input  class="input" type="text" name="couleur" placeholder="Couleur">
		<input  class="input" type="number" name="stock" placeholder="Stock">
		<input  class="input" type="number" name="prix" placeholder="prix">
		<input type="file" class="input" name="photo" id="photo" required>
		<div class="description">
    		<textarea class="input" placeholder="Description..." cols="50" rows="5" name="description"></textarea>
  		</div>
		  <button class="add-button" type="submit" name="add"> Ajouter </button>
    </form>
</div>

<?php
       if(isset($_POST["add"])){
			$categorie = $_POST["categorie"];
            $nom = $_POST["nom"];
            $couleur = $_POST["couleur"];
            $stock = $_POST["stock"];
			$prix = $_POST["prix"];
			$description = $_POST["description"];
			$photo = $_FILES['photo']['name'];
            $req = "INSERT INTO produits 
                    VALUES (null, '$categorie', '$nom', '$couleur', '$stock', '$prix', '$description', '$photo')";
            $result = $id->query($req);
            header("location:home.php");
        }


        ?>
		
	
</body>
</html>