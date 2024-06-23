<?php
	session_start();
	include "liseret.php";
	include "connect.php";
    $idu = $_SESSION['idu'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="compte.css">
    <title> telephone </title>
</head>
<body>

<h1>Mon compte<h1>


<div class="container">
    <form action="" class="form" method="post">
	<?php
		$req = "SELECT * from users WHERE idu = '$idu'";
		$result = $id->query($req);
		$ligne = $result->fetch(PDO::FETCH_ASSOC);
	?>
    	<input required="" class="input" type="text" name="nom"value="<?php echo $ligne["nom"]; ?>">
    	<input required="" class="input" type="text" name="prenom" value=" <?php echo $ligne["prenom"]; ?>">
		<input required="" class="input" type="text" name="mail" value=" <?php echo $ligne["mail"]; ?>">
		<p><button> <a href="modifMdp.php"> Modifier le mot de passe </a> </button></p>
        <p><button><input class="modif" type="submit" value="Modifier" name="modif"></button></p>
    </form>
</div>

<?php
        if(isset($_POST["modif"])){
			$nom = $_POST["nom"];
            $prenom = $_POST["prenom"];
            $mail = $_POST["mail"];

            $req = "UPDATE users
						SET nom = '$nom',
							prenom = '$prenom',
							mail = '$mail'
						WHERE idu = $idu";
            $result = $id->query($req);
			$_SESSION["prenom"] = $prenom;
            header("Location:produits.php");
        }


        ?>
		
	
</body>
</html>