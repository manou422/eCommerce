<?php
    session_start();
	include "liseret.php";
    include "connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="utilisateurs.css">
    <title>Les utilisateurs</title>
</head>
<body>

<h1>Les utilisateurs<h1>

<div class="page">

<table class="user">
  <thead>
    <tr>
      <th>Prénom</th>
      <th>Nom</th>
      <th>Mail</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $req = "SELECT nom,prenom,mail FROM users";
        $result = $id->query($req);
        while($ligne = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr><td>".$ligne["prenom"]."</td><td>".$ligne["nom"]."</td><td>".$ligne["mail"]."</td></tr>";
        }
        
    ?>
    </tbody>
    </table>
 
    </div>
</body>
</html>