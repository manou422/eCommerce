<?php
	session_start();
	include "liseret.php";
	include "connect.php";
    $prenom = $_SESSION['idu'];
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

<?php
$req = "select * from users where prenom = $prenom";
$res = mysqli_query($id, $req);
$ligne = mysqli_fetch_assoc($res);
?>

<h1>Mon compte<h1>


<div class="container">
    <form action="" class="form" method="post">
    	<input required="" class="input" type="text" name="nom" placeholder="Nom du produit" value="<?=$ligne['nom']?>">
    	<input required="" class="input" type="text" name="categorie" placeholder="Catégorie" value=" <?php echo $ligne["categorie"]; ?>">
		<input required="" class="input" type="text" name="couleur" placeholder="Couleur" value=" <?php echo $ligne["couleur"]; ?>">
		<input required="" class="input" type="number" name="stock" placeholder="Stock" value="<?php echo $ligne["stock"]; ?>">
		<input required="" class="input" type="number" name="prix" placeholder="prix" value="<?php echo $ligne["prix"]; ?>">
		<input required="" class="input" type="file" name="photo" placeholder="photo" value="<?php echo $ligne["photo"]; ?>">
		<div class="description">
    		<textarea class="input" placeholder="Description..." cols="50" rows="5" name="description"> <?php echo $ligne["description"]; ?> </textarea>
  		</div>
          <input type="hidden" name="num" value="<?=$num?>">
          <p><input type="submit" value="Modifier" name="modif"></p>
    </form>
</div>

<?php
        if(isset($_POST["modif"])){
			$categorie = $_POST["categorie"];
            $nom = $_POST["nom"];
            $couleur = $_POST["couleur"];
            $stock = $_POST["stock"];
			$prix = $_POST["prix"];
			$description = $_POST["description"];
			$photo = $_POST["photo"];

            $req = "UPDATE produits
						SET categorie = '$categorie',
							nom = '$nom',
							couleur = '$couleur',
							stock = '$stock',
							prix = '$prix',
							description = '$description',
							photo = '$photo'
						WHERE idp = $num";
            mysqli_query($id, $req);
            header("Location:produits.php");
        }


        ?>
		
	
</body>
</html>