<?php
session_start();
// echo "tu es bien déconnecté ". $_SESSION["nom"]." ". $_SESSION["prenom"]." , tu vas etre redirigé..";
session_destroy();
header("location:produits.php");
?>