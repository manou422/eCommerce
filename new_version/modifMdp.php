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
    	<input required="" class="input" type="password" name="mdp">
        <p><button><input class="modif" type="submit" value="Modifier" name="modif"></button></p>
    </form>
</div>

<?php
        if(isset($_POST["modif"])){
			$mdp = $_POST["mdp"];

            $req = "UPDATE users
						SET mdp = '$mdp'
						WHERE idu = $idu";
            $result = $id->query($req);
            header("Location:produits.php");
        }

        include "footer.php";


        ?>
		
	
</body>
</html>