<?php
    session_start();
    include "Connect.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="page">
            <?php // afficher les annonces à la suite des autres
                if(isset($_SESSION['prenom'])){
                    $prenom = $_SESSION['prenom'];
                    echo "<h1>".'Bienvenue'." ".$_SESSION['prenom']."</h1>";
                    include "liseret.php";
                } else {
                    echo "<h1>".'Bienvenue invité'."</h1>";
                    include "liseret.php";
                }
            ?>
            <!-- <img src="images/vetements.jpg"> -->
        </div>
    </body>
</html>