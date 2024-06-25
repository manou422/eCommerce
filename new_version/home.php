<?php
session_start();
include "connect.php";
include "liseret.php";

$req = "SELECT produits.nom, count(panier.idp) as nom_produits from produits inner join panier ON produits.idp = panier.idp group by produits.nom desc";
$result = $id->query($req);

$req2 = "SELECT produits.nom, count(favoris.idp) as nom_produits from produits inner join favoris ON produits.idp = favoris.idp group by produits.nom desc";
$result2 = $id->query($req);

$data = [];
$labels = [];
$values = [];

$data2 = [];
$labels2 = [];
$values2 = [];

if ($result->rowCount() > 0) {
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $labels[] = $row['nom'];
        $values[] = $row['nom_produits'];
    }
}

if ($result2->rowCount() > 0) {
    while($row = $result2->fetch(PDO::FETCH_ASSOC)) {
        $labels2[] = $row['nom'];
        $values2[] = $row['nom_produits'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Graphiques Circulaires</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="home.css">
</head>
<body>

<h1> Les Statistiques </h1>
<div class="product-grid">

<div class='card'>
    <h1> Panier </h1>
<canvas id="pieChart1" width="200" height="200"></canvas>
</div>

<div class='card'>
<h1> Favoris </h1>
<canvas id="pieChart2" width="200" height="200"></canvas>
</div>

</div>



<script>
    var ctx = document.getElementById('pieChart1').getContext('2d');
    var pieChart1 = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                data: <?php echo json_encode($values); ?>,
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', 'red', 'blue'],
                hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', 'blue', 'red']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
</script>

<script>
    var ctx = document.getElementById('pieChart2').getContext('2d');
    var pieChart2 = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($labels2); ?>,
            datasets: [{
                data: <?php echo json_encode($values2); ?>,
                backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56'],
                hoverBackgroundColor: ['#FF6384', '#36A2EB', '#FFCE56']
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
</script>

<?php
    include "footer.php";
?>

</body>
</html>
