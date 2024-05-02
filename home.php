<?php
    session_start();
    include "connect.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="home.css">
        <title>Home</title>
    </head>
    <body>
        <div class="page">
            <?php
                if(isset($_SESSION["prenom"])){
                    $prenom = $_SESSION['prenom'];
                    $idu = $_SESSION['idu'];
                    echo "<h1>".'Bienvenue'." ".$prenom."</h1>";
                } else {
                    echo "<h1>".'Bienvenue invité'."</h1>";
                }
                include "liseret.php";
                $sql = "SELECT * FROM produits";
                $result = mysqli_query($id,$sql);

                if ($result->num_rows > 0) {
                    $products = array();
                    while($row = $result->fetch_assoc()) {
                        $products[] = $row;
                    }
                } else {
                    echo "Aucun produit trouvé dans la base de données.";
                }

                $max_price = 0;
                $max_product = null;

                foreach ($products as $product) {
                    if ($product["prix"] > $max_price) {
                        $max_price = $product["prix"];
                        $max_product = $product;
                    }
                }

                ?>

                <h1> Le produit le plus cher </h1>

        <div>
            <div class="card">
                <img class="card__image" src="images/<?php echo $max_product['photo'] ?>">
                <div class="card__content">
                    <p class="card__title"> <?php echo $max_product['nom'] ?> </p>
                    <p class="card__description"> <?php echo $max_product["description"] ?> </p>
                    <p class="card__prix"> <?php echo $max_product["prix"]."€" ?> </p>
                </div>
            </div>
        </div>
    </body>
</html>