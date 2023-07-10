<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('config.php');

$db = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$query = "SELECT state, latitude, longtitude, COUNT(DISTINCT id) AS count FROM users WHERE countryCode = ? GROUP BY state, latitude, longtitude";
$stmt = $db->prepare($query);
$stmt->execute([$_GET['countryCode']]);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <title>stats</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.js"></script>


    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">

    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <link rel="stylesheet" type="text/css" href="./style.css" />
    <script type="module" src="./maps.js"></script>

    <script>
        var array = <?php echo json_encode($users); ?>;
    </script>


</head>
<body class="bg-dark text-light">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom mb-5">
  <a class="navbar-brand ms-5" href="#">Zadanie 2</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Domov<span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="map.php">Mapa</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="stats.php">Štatistika</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container text-light">
    <div>
        <table id="tablesell" class="display table text-light">
            <thead>
            <tr>
                <td>Adresa</td>
                <td>Výška</td>
                <td>Šírka</td>
                <td>Počet</td>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($users as $user) {
                echo "<tr>
                    <td>" . $user["state"] . "</td>
                    <td>" . $user["latitude"] . "</td>
                    <td>" . $user["longtitude"] . "</td>
                    <td>" . $user["count"] . "</td>
                    </tr>";
            }
            ?>
            </tbody>
        </table>
        <br>
    </div>

</div>
</body>
</html>