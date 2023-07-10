<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


?>
<!DOCTYPE html>
<!DOCTYPE html>

<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <title>Google map Places Autocomplete - Tutsmake.com</title>
 <style>
    .container{
    padding: 10%;
    text-align: center;
   } 
 </style>
</head>
<body class="bg-dark text-light">

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


<div class="container d-flex justify-content-center text-dark">

<div class="card m-5" style="width: 18rem;">
  <div class="card-body card-header">
    <input id="autocompleteSearch" name="autocomplete_search" type="text" class="form-control" placeholder="Search" />

  </div>
  <ul id="invisibleTwo" style="display: none;" class="list-group list-group-flush">
    <li id="day1" class="list-group-item"></li>
    <li id="day2" class="list-group-item"></li>
    <li id="day3" class="list-group-item"></li>
    <li id="day4" class="list-group-item"></li>
    <li id="day5" class="list-group-item"></li>
    <li id="day6" class="list-group-item"></li>
    <li id="day7" class="list-group-item"></li>
  </ul>
</div>

<div id="invisible" class="card m-5" style="width: 18rem; display: none;">
  <div class="card-body card-header">
    <h3 id="place"></h3>
  </div>
  <ul class="list-group list-group-flush">
    <li id="gps" class="list-group-item"></li>
    <li id="gpsTwo" class="list-group-item"></li>
    <li id="state" class="list-group-item"></li>
    <li  id="capital" class="list-group-item"></li>
    <li class="list-group-item"></li>
  </ul>
</div>

</div>
</body>
<script async
    src="https://maps.googleapis.com/maps/api/js?key=*SENSITIVE_DATA*&libraries=places&callback=initMap">
</script>

<script type = "text/javascript" src="index.js"></script>




</html>

