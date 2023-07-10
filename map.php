<?php

require_once('config.php');

$db = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = "SELECT
longtitude, latitude
FROM users;";
$stmt = $db->query($query); 
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<!--
 @license
 Copyright 2019 Google LLC. All Rights Reserved.
 SPDX-License-Identifier: Apache-2.0
-->
<html>
  <head>
    <title>Add Map</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <link rel="stylesheet" type="text/css" href="style.css" />
    <script type="module" src="mapIndex.js"></script>
    <script>
        var passedArray = <?php echo json_encode($results); ?>;
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
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
    <!--The div element for the map -->
    <div class="container" id="map"></div>


    <!-- prettier-ignore -->
    <script>(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "*SENSITIVE_DATA*", v: "beta"});</script>
  </body>
</html>



