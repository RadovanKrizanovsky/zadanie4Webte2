<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$ip_address = $_SERVER['REMOTE_ADDR'];

require_once('config.php');

$db = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT state, countryCode, COUNT(DISTINCT id) AS count FROM users GROUP BY state, countryCode";
$stmt = $db->query($query);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

$query = "SELECT time FROM users";
$stmt = $db->query($query);
$times = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="sk" class="text-light">
<head>
    <meta charset="UTF-8">
    <title>Stat</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.js"></script>
    <script>
        var times = <?php echo json_encode($times); ?>;
    </script>

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    
    <script>
        $(document).ready(function () {
            var table = $('#tablesell').DataTable();
            $('#tablesell tbody').on('click', 'tr', function () {
                var data = table.row(this).data()[2];
                console.log(data);
                window.location.replace(window.location.protocol + "//" + window.location.host + "/stvrteZadanie/statsTwo.php?countryCode=" + data);
            });
        });
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
    </div>
    <div>
        <table id="tablesell" class="display table text-light">
            <thead>
            <tr>
                <td>Vlajka</td>
                <td>Štát</td>
                <td>Skratka</td>
                <td>Počet</td>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($users as $user) {
                echo "<tr>
                    <td><img src='https://www.geonames.org/flags/x/" . strtolower($user["countryCode"]) . ".gif' alt='flag' width='50' height='25'></td>
                    <td>" . $user["state"] . "</td>
                    <td>" . $user["countryCode"] . "</td>
                    <td>" . $user["count"] . "</td>
                    </tr>";
            }
            ?>
            </tbody>
        </table>
        <h3>6:00-15:00</h3>
        <h4 id="six"></h4>
        <h3>15:00-21:00</h3>
        <h4 id="fiveteen"></h4>
        <h3>21:00-24:00</h3>
        <h4 id="twentyOne"></h4>
        <h3>24:00-6:00</h3>
        <h4 id="twentyFour"></h4>
    </div>
    <script type="module" src="stats.js"></script>
</div>
</body>
</html>
