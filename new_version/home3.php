
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="home.css">
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <title> home </title>
    </head>
    <body>

<?php
session_start();
include "connect.php";
include "liseret.php";
$req = "SELECT produits.nom, count(panier.idp) as nom_produits from produits inner join panier ON produits.idp = panier.idp group by produits.nom desc";
$result = $id->query($req);

$data = [
    ['labelgraphique' => 'Panier', 'values' => [1]],
    ['labelgraphique' => 'Graphique 2', 'values' => [1]],
    ['labelgraphique' => 'Graphique 3', 'values' => [1]]
];

// Ajouter les valeurs aux tableaux correspondants
if ($result->rowCount() > 0) {
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        foreach ($data as &$dataset) {
            if ($dataset['labelgraphique'] == $row['nom']) {
                $dataset['values'][] = $row['value'];
            }
        }
    }
} else {
    echo "0 results";
}

foreach ($data as $dataset): ?>
    <h2><?php echo $dataset['labelgraphique']; ?></h2>
    <ul>
        <?php foreach ($dataset['values'] as $value): ?>
            <li><?php echo $value; ?></li>
        <?php endforeach; ?>
    </ul>
<?php endforeach; ?>

</body>
</html>

?>
