<?php
require_once('config.php');

$db = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//body: `state=${state}&time=${new Date()}&longtitude=${place.geometry.location.lng()}&latitude=${place.geometry.location.lat()}&countryCode=${"sk"}`,

$state = $_POST['state'];
$time = $_POST['time'];
$ip = $_SERVER['REMOTE_ADDR'];
$longtitude = $_POST['longtitude'];
$latitude = $_POST['latitude'];
$countryCode = $_POST['countryCode'];




$sql = "INSERT INTO users (state, time, ip, longtitude, latitude, countryCode) VALUES (:state, :time, :ip, :longtitude, :latitude, :countryCode)";
$stmt = $db->prepare($sql);

$stmt->bindParam(":state", $state, PDO::PARAM_STR);
$stmt->bindParam(":time", $time, PDO::PARAM_STR);
$stmt->bindParam(":ip", $ip, PDO::PARAM_STR);
$stmt->bindParam(":longtitude", $longtitude, PDO::PARAM_STR);
$stmt->bindParam(":latitude", $latitude, PDO::PARAM_STR);
$stmt->bindParam(":countryCode", $countryCode, PDO::PARAM_STR);



if ($stmt->execute()) {

} else {
    echo "Ups. Nieco sa pokazilo";
}
unset($stmt);



/*
document.cookie="state=" + state;
document.cookie="time=" + new Date();  ;
document.cookie="longtitude=" + place.geometry.location.lng();
document.cookie="latitude=" + place.geometry.location.lat();
document.cookie="countryCode=sk";


$state = $_COOKIE['state'];

$time = $_COOKIE['time'];
$longtitude = $_COOKIE['longtitude'];
$latitude = $_COOKIE['latitude'];
$countryCode = $_COOKIE['countryCode'];



echo $state;

echo $time;
echo $longtitude;
echo $latitude;
echo $countryCode;
*/
?>