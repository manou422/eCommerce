<?php
include "connect.php";

// Extraction des données de la table favoris
$sql_favoris = "SELECT idu, COUNT(idp) as nb_favoris FROM favoris GROUP BY idu";
$result_favoris = $id->query($sql_favoris);

$users_favoris = array();
$nb_favoris = array();

if ($result_favoris->rowCount() > 0) {
    while($row = $result_favoris->fetch(PDO::FETCH_ASSOC)) {
        $users_favoris[] = $row['idu'];
        $nb_favoris[] = $row['nb_favoris'];
    }
}

// Extraction des données de la table panier
$sql_panier = "SELECT idu, COUNT(idp) as nb_panier FROM panier GROUP BY idu";
$result_panier = $id->query($sql_panier);

$users_panier = array();
$nb_panier = array();

if ($result_panier->rowCount() > 0) {
    while($row = $result_panier->fetch(PDO::FETCH_ASSOC)) {
        $users_panier[] = $row['idu'];
        $nb_panier[] = $row['nb_panier'];
    }
}

$conn->close();

echo json_encode(array(
    'users_favoris' => $users_favoris,
    'nb_favoris' => $nb_favoris,
    'users_panier' => $users_panier,
    'nb_panier' => $nb_panier
));
?>
